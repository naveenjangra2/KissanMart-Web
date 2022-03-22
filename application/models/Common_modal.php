<?php
class Common_modal extends CI_Model {
    function getAll($table){
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result();
	}
	function insert($table,$data){
		$this->db->insert($table, $data); 
		return  $this->db->insert_id();
	}
	function update($idName,$id,$table,$data){
		$this->db->where($idName, $id);
		$this->db->update($table, $data); 
	}
	function delete($table,$idName,$val){
        $this->db->where($idName, $val);
        $this->db->delete($table);
        if($this->db->affected_rows()>0){
            return $val;
          }else{
            return false;
          }
        }
        function getAllWhere($table,$idName,$val){
          $this->db->select('*');
          $this->db->from($table);
          $this->db->where($idName, $val);
          $this->db->limit(1);
          $query = $this->db->get();
          if($query->num_rows() == 1){
            return $query->row();
          }else{
            return false;
          }
        }
    function getAllMultipleWhere($table,$field,$val){
        $this->db->select('*'); 
        $this->db->from($table);
        $this->db->where($field, $val);
        $query = $this->db->get();
        return $query->result();
        
    }
        function getAllWhereGreaterThan($table,$idName){
          $this->db->select('*');
        $this->db->from($table);
        $this->db->where($idName.">", 0);
        $this->db->where('status', 0);
        $query = $this->db->get();
        if($query->num_rows() > 1){
          return $query->row();
        }else{
          return false;
        }
    }
    function getCountries(){
		$this->db->select('country_id,nicename');
		$this->db->from('country');
		$this->db->order_by('nicename', "asc");
		$query = $this->db->get();
		return $query->result();
	}
    function getRegion($country){
		$this->db->select('reg_id,region_name');
		$this->db->from('regions');
	   	$this->db->where('country_id', $country);
		$this->db->order_by('region_name', "asc");
		$query = $this->db->get();
		return $query->result();
	}
	function getCities($region){
		$this->db->select('city_id,city_name');
		$this->db->from('cities');
	   	$this->db->where('reg_id', $region);
		$this->db->order_by('city_name', "asc");
		$query = $this->db->get();
		return $query->result();
	}
	function checkField($table,$id,$value){
		$this->db->select($id);
		$this->db->from($table);
	   	$this->db->where($id, $value);
	   	$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}
	function getSingleField($table,$col,$id, $value){
        $this->db->select($col);
        $this->db->from($table);
        $this->db->where($id, $value);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row();
        }else{
          return false;
        }
    }
    
    private function get_child_categories($parent_id) {
        $this -> db -> select('*'); 
        $this -> db -> from('categories');
        $this -> db -> where('parent_id', $parent_id);
        $this -> db -> where('status', 0);
        $this->db->order_by("cate_id", "asc");
        $query = $this -> db -> get();
        $child_cats = $query -> result();
        
        foreach ($child_cats as $child_cat) {
            $child_2 = $this->get_child_categories($child_cat->cate_id);
            $child_cat->sub_cat = $child_2;
        }
        return $child_cats;
    }
    function getCateSubById($id){
        $this -> db -> select('cate_id'); 
        $this -> db -> from('categories');
        $this -> db -> where('parent_id', $id);
        $this -> db -> where('status', 0);
        $query = $this -> db -> get();
        $result = $query -> result();
        // $cate_ids = array_map(create_function('$o', 'return (integer)$o->cate_id;'), $result); Deprecated
        $cate_ids = array_map(function($o) {return (integer)$o->cate_id;}, $result); 
        foreach ($cate_ids as $cid) {
            $child = $this->getCateSubById($cid);
            $cate_ids = array_merge($child, $cate_ids);
        }
        return $cate_ids;
    }
    function getParentsById($id){
        $this -> db -> select('cate_id,parent_id'); 
        $this -> db -> from('categories');
        $this -> db -> where('cate_id', $id);
        $this -> db -> where('status', 0);
        $query = $this -> db -> get();
        $result = $query->row();
        $cate_ids = array();
        if ($result->parent_id!=0) {
            array_push( $cate_ids,$result->parent_id);
            $parents = $this->getParentsById($result->parent_id);
            $cate_ids = array_merge ($cate_ids, $parents);
        }
        return $cate_ids;
    }
    function getCateParentId($id){
        $this -> db -> select('cate_id,parent_id,category'); 
        $this -> db -> from('categories');
        $this -> db -> where('cate_id', $id);
        $this -> db -> where('status', 0);
        $this->db->limit(1);
        $query = $this -> db -> get();
        $result = $query->row();
        if ($result->parent_id!=0) {
            return $this->getCateParentId($result->parent_id);
        }else{
            return $result;
        }
    }
    function getNextMainCat($prev_id){
        $this->db->select('*');
        $this -> db -> from('categories');
        $this -> db -> where('cate_id >', $prev_id);
        $this -> db -> where('status', 0);
        $this -> db -> where('parent_id', 0);
        $this->db->order_by("cate_id", "asc");
        $this->db->limit(1);
         
        $query = $this->db->get();
        if(0<$query->num_rows()){
          return $query->row();
        }else{
          return false;
        }
    }
    function getMaxId($field,$table)
    {
    	$maxid = 0;
		$row = $this->db->query('SELECT MAX('.$field.') AS maxid FROM '.$table)->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
    }
	function getTablePhotos($table,$id){
        $this->db->select('*');
        $this->db->from('photo');
        $this->db->where('table', $table);
        $this->db->where('field_id', $id);
        $this->db->order_by("photo_order", "asc"); 
        $query = $this->db->get();
        if(0<$query->num_rows()){
          return $query->result();
        }else{
          return false;
        }
    }
    function getTableOnePhoto($table,$id){
        $this->db->select('*');
        $this->db->from('photo');
        $this->db->where('table', $table);
        $this->db->where('field_id', $id);
        $this->db->order_by("photo_order", "asc"); 
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row();
        }else{
          return false;
        }
    }
    function getFrontProducts($attr,$attrval,$limit){
        $this->db->select('p.pro_id,p.name,p.price,p.price_poi,p.quantity,p.weight,p.view_count,p.sales_count,p.added_date,p.status as pro_status,pt3.pid,pt3.photo_path,pt3.photo_title,c.cate_id,c.category');
        $this->db->from('products p');
        $this->db->where('p.status', 0);
        $this->db->where('pav.attr_id', $attr);
        $this->db->where('pav.av_id', $attrval);
        $this->db->join('(select * from photo pt1 right join
            (select pt.table as tabel2,pt.field_id as field_id2,min(pt.photo_order) as photo_order2 from photo pt 
            group by pt.table,pt.field_id) as pt2 on pt1.table=pt2.tabel2 and pt1.field_id=pt2.field_id2 
            and pt1.photo_order=pt2.photo_order2 where pt1.table = "products") pt3', 'pt3.field_id = p.pro_id', 'right outer');
        $this->db->join('categories c', 'c.cate_id = p.cate_id');
        $this->db->join('product_attr_val pav', 'pav.pro_id = p.pro_id');
        $this->db->group_by("p.pro_id");
        $this->db->order_by('p.pro_id', "RANDOM");
        $this->db->limit($limit);
        $tempdb = clone $this->db;
        $ret['rowcount'] = $tempdb->count_all_results();
        $query = $this->db->get();
        $ret['products']=$query->result();
        return $ret;
    }
    function getOrderProducts($id)
    {
        $q = "select od.det_id,od.qty,od.act_unit_price,od.discount_percentage,od.billed_unit_price,od.subtotal,od.sub_pro_id,p.name,p.pro_id,c.cate_id,c.category,pt.photo_path,pt.photo_title from order_details od left join products p on p.pro_id = od.pro_id left join categories c on c.cate_id = p.cate_id left outer join
            (select pt2.* from photo pt2 inner join 
            (select pt1.table,pt1.field_id,min(pt1.pid) as pt1_pid from photo pt1 group by pt1.table,pt1.field_id having min(pt1.photo_order)) pt1 
            on pt2.pid=pt1.pt1_pid where pt2.table='products') pt on pt.field_id = p.pro_id
            where od.order_id =".$id;
        $query = $this->db->query($q);
        $order_det = $query->result();
        foreach ($order_det as $row) {
            if ($row->sub_pro_id!=0) {
                $this->db->select('*');
                $this->db->from('sub_product');
                $this->db->where('sub_pro_id', $row->sub_pro_id);
                $this->db->limit(1);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                  $row->subProduct =  $query->row();
                }else{
                  $row->subProduct =  NULL;
                }
            }
            $this->db->select('attr.attr_id,attr.attribute,attr.type,av.av_id,av.value,av.description');
            $this->db->from('order_product_specs ods');
            $this->db->where('ods.odet_id', $row->det_id);
            $this->db->join('attributes attr', 'ods.attr_id = attr.attr_id');
            $this->db->join('attribute_value av', 'ods.av_id = av.av_id');
            $query = $this->db->get();
            $row->attributes = $query->result();
        }
        return $order_det;
    }
    function getAddressByOrder($order_id)
    {
        $this->db->select('a.add_id,a.fname,a.lname,a.address,co.nicename,r.region_name,ci.city_name,a.phone,o.order_email');
        $this->db->from('orders o');
        $this->db->where('o.order_id', $order_id);
        $this->db->join('addresses a', 'a.add_id = o.add_id');
        $this->db->join('country as co', 'co.country_id = a.country_id', 'left');
        $this->db->join('regions as r', 'r.reg_id = a.reg_id', 'left');
        $this->db->join('cities as ci', 'ci.city_id = a.city_id', 'left');
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row();
        }else{
          return false;
        }
    }
    function increaseField($idName,$id,$table,$field,$amount){
        $this->db->where($idName, $id);
        $this->db->set($field, $field.'+'.$amount, FALSE);
        $this->db->update($table); 
    }
    function decreaseField($idName,$id,$table,$field,$amount){
        $this->db->where($idName, $id);
        $this->db->set($field, $field.'-'.$amount, FALSE);
        $this->db->update($table); 
    }
    function getCateIdWithout($ids)
    {
        $this->db->select('c.cate_id');
        $this->db->from('products p');
        $this->db->where('c.parent_id', 0);
        if (!empty($ids)) {
            $this->db->where_not_in('c.cate_id', $ids);
        }
        $this->db->join('categories c', 'c.cate_id = p.cate_id');
        $this->db->order_by("cate_id", "desc");
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
            $cate = $query->row();
            $category = $this->getParentsById($cate->cate_id);
            array_push($category, $cate->cate_id);
            return $category;
        }else{
          return false;
        }
    }
}
