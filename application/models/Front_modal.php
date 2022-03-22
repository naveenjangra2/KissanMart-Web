<?php
class Front_modal extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->model("Common_modal");
    }
    function verify_mobile($phone){
        $this->db->select("*");
        $this->db->from("staff_users");
        $this->db->where("mobile", $phone);
        $query = $this->db->get();
        return $query->row();
    }
    function insert_otp($phone,$data){
        $this->db->select('*'); 
        $this->db->from('otp_verify');
        $this->db->where('phone', $phone);
        $this->db->where('status', 1);
        $query = $this->db->get();
        $verify = $query->result();             

        if ($verify) {
            $this->db->where("phone", $phone);
            $this->db->delete("otp_verify");
        }
        $this->db->insert('otp_verify', $data); 
        return $this->db->insert_id();  
        // return $verify;
    }
    function otp_verification($phone, $otp){
        $this->db->select('*');
        $this->db->from('otp_verify');
        $this->db->where('phone', $phone);
        $this->db->where('otp', $otp);
        $query = $this->db->get();
            if (0 < $query->num_rows()) {
                return true;
            }else{
                return false;
            }
    }






    public function getPage($id) {
        $this -> db -> select('*');
        $this -> db -> from('pages');
        $this -> db -> where('page_id', $id);
        $this -> db -> where('status', 0);
        $this -> db -> limit(1);
        $query = $this -> db -> get();
        return $query->row();
    }
    function getFrontCate(){
        $this -> db -> select('c.*,p.pid,p.photo_path,p.photo_title,p.status as img_status'); 
        $this -> db -> from('categories c');
        $this->db->join('photo p', 'p.table="categories" AND p.field_id = c.cate_id');
        $this->db->order_by("view_count", "desc");
        $this -> db -> limit(10);
        $tempdb = clone $this->db;
        $ret['cate_count'] = $tempdb->count_all_results();
        $query = $this->db->get();
        $ret['cateImg']=$query->result();
        return $ret;
    }
    
    function getBrands(){
        $this -> db -> select('b.*,p.pid,p.photo_path,p.photo_title,p.status as img_status'); 
        $this -> db -> from('brands b');
        $this -> db -> where('brand_status', 0);
        $this->db->join('photo p', 'p.table="brands" AND p.field_id = b.brand_id');
        $this->db->order_by("view_count", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    function getOffers(){
        $this -> db -> select('b.*,p.pid,p.photo_path,p.photo_title,p.status as img_status'); 
        $this -> db -> from('brands b');
        $this -> db -> where('brand_status', 0);
        $this->db->join('photo p', 'p.table="brands" AND p.field_id = b.brand_id');
        $this->db->order_by("view_count", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    function getProducts($search,$category,$brand,$sorting,$price_min,$price_max,$limit,$offset,$type)
    {
        $this->db->select('p.pro_id,p.name,p.description,p.price,p.price_poi,p.quantity,p.weight,p.view_count,p.sales_count,p.added_date,p.status as pro_status,c.cate_id,c.category,pt3.pid,pt3.photo_path,pt3.photo_title');
        $this->db->from('products p');
        if ($search!=''||$search!=null) {
            $this->db->like('p.name', $search);
        }
        if (!empty($category)) {
            $qu = 'p.pro_id in (select prdc.pro_id from product_categories prdc where prdc.cate_id in(';
            $k = 0;
            foreach ($category as $cat) {
                if($k!=0){
                    $qu = $qu.',';
                }
                $qu = $qu.$cat;
                $k++;
            }
            $qu = $qu.'))';
            $this->db->where($qu);
        }
        if ($brand!=''&&$brand!=null&&$brand!=0) {
            $this->db->where('p.brand_id', $brand);
        }
        if ($price_min!=''&&$price_min!=null&&$price_max!=''&&$price_max!=null) {
            $this->db->where("p.price BETWEEN '".$price_min."' AND '".$price_max."'");
        }
        $this->db->where('p.status', 0);
        $this->db->where('pas.ws_id', 1);
        $this->db->join('(select * from photo pt1 right join
            (select pt.table as tabel2,pt.field_id as field_id2,min(pt.photo_order) as photo_order2 from photo pt 
            group by pt.table,pt.field_id) as pt2 on pt1.table=pt2.tabel2 and pt1.field_id=pt2.field_id2 
            and pt1.photo_order=pt2.photo_order2 where pt1.table = "products") pt3', 'pt3.field_id = p.pro_id', 'right outer');
        $this->db->join('categories c', 'c.cate_id = p.cate_id');
        $this->db->join('product_available_sites pas','pas.pro_id=p.pro_id');
        $this->db->group_by("p.pro_id");
        if ($sorting=='price_asc'||$sorting=='price_desc') {
            list($part1, $part2) = explode('_', $sorting);
            $this->db->order_by('p.'.$part1, $part2);
        }elseif ($sorting=='added_date'||$sorting=='sales_count'||$sorting=='view_count') {
            $this->db->order_by('p.'.$sorting, "desc");
        }else{
            $this->db->order_by('p.pro_id', "desc");
        }
        $tempdb = clone $this->db;
        $ret['rowcount'] = $tempdb->count_all_results();
        if ($type == 0) {
            $this->db->limit($limit,$offset);
        }
        $query = $this->db->get();
        $ret['products']=$query->result();
        /*$this->db->select('MAX(p.price) as max_price, MIN(p.price) as min_price');
        $this->db->from('products p');
        if (!empty($category)) {
            $this->db->where_in('p.cate_id', $category);
        }
        if ($brand!=''&&$brand!=null&&$brand!=0) {
            $this->db->where('p.brand_id', $brand);
        }
        $query1 = $this->db->get();
        $ret['price_range']=$query1->row();*/
        return $ret;
    }

    // my edit
    function getProductsforDetails($type,$id)
    {
        $this->db->select('p.pro_id,p.name,p.description,p.price,p.price_poi,p.status as pro_status,c.cate_id,c.category,pt3.pid,pt3.photo_path,pt3.photo_title');
        $this->db->from('products p');
        
        $this->db->where('p.status', 0);
        $this->db->where('p.cate_id', $type);
        $this->db->where_not_in('p.pro_id', $id);
        $this->db->where('pas.ws_id', 1);
        $this->db->join('(select * from photo pt1 right join
            (select pt.table as tabel2,pt.field_id as field_id2,min(pt.photo_order) as photo_order2 from photo pt 
            group by pt.table,pt.field_id) as pt2 on pt1.table=pt2.tabel2 and pt1.field_id=pt2.field_id2 
            and pt1.photo_order=pt2.photo_order2 where pt1.table = "products") pt3', 'pt3.field_id = p.pro_id', 'right outer');
        $this->db->join('categories c', 'c.cate_id = p.cate_id');
        $this->db->join('product_available_sites pas','pas.pro_id=p.pro_id');
        $this->db->group_by("p.pro_id");
        $this->db->limit(2);
        $query = $this->db->get();
        return $query->result();
    }

    function getPriceRange($type,$cate)
    {
        $this->db->select('MAX(p.price) as max_price, MIN(p.price) as min_price');
        $this->db->from('products p');
        if ($type=='categories') {
            $this->db->where_in('p.cate_id', $cate);
        }elseif ($type=='brand') {
            $this->db->where('p.brand_id', $cate);
        }
        $this->db->where('p.status', 0);
        $query1 = $this->db->get();
        return $query1->row();
    }
    function getProCategories($cate){
        $this -> db -> select('*'); 
        $this -> db -> from('categories');
        $this -> db -> where('cate_id', $cate);
        $this -> db -> where('status', 0);
        $this->db->order_by("cate_id", "asc");
        $query = $this -> db -> get();
        $main_cats = $query -> result();
        foreach ($main_cats as $main_cat) {
            $child = $this->get_child_categories($main_cat->cate_id);
            $main_cat->sub_cat = $child;
        }
        return $main_cats;
    }
    private function get_child_categories($parent_id) {
        $this -> db -> select('*'); 
        $this -> db -> from('categories');
        $this -> db -> where('parent_id', $parent_id);
        $this -> db -> where('status', 0);
        $this->db->order_by("cate_id", "asc");
        $query = $this -> db -> get();
        return $query -> result();
    }
    function getCateBrands($cate_id,$tree){
        foreach ($tree as $key => $value) {
            $this->db->select('*');
            $this->db->from('category_brands');
            $this->db->where("cate_id", $value);
            $query = $this->db->get();
            if (0<$query->num_rows()) {
                $cate_id = $value;
                break;
            }
        }
        $this->db->select('*');
        $this->db->from('category_brands');
        $this->db->where('category_brands.cate_id', $cate_id);
        $this->db->join('brands', 'brands.brand_id = category_brands.brand_id');
        $query = $this->db->get();
        return $query->result();
    }
    function getProductDetails($id){
        $this->db->select('p.pro_id,p.pro_code,p.name,p.description,p.short_description,p.ingredients,p.how_to_use,p.price,p.price_poi,p.quantity,p.weight,p.view_count,p.sales_count,p.added_date,c.cate_id,c.parent_id,c.category,c.tree_path,b.brand_id,b.brand,(select count(distinct pav.attr_id) from product_attr_val as pav inner join attributes as atr on pav.attr_id = atr.attr_id
where pav.pro_id=p.pro_id and atr.attr_status =0 and atr.price_effect=0) as attr_count, sp.sub_pro_id, sp.sub_pro_code');
        $this->db->from("products p");
        $this->db->where("p.pro_id", $id);
        $this->db->where('p.status', 0);
        $this->db->join('categories c', 'c.cate_id = p.cate_id');
        $this->db->join('brands b', 'b.brand_id = p.brand_id');
        $this->db->join('sub_product sp','sp.pro_id=p.pro_id','left outer');
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row();
        }else{
          return false;
        }
    }
    function getHomeProDetails($id){
        $this->db->select('p.pro_id,p.name,c.category');
        $this->db->from("products p");
        $this->db->where("p.pro_id", $id);
        $this->db->where('p.status', 0);
        $this->db->join('categories c', 'c.cate_id = p.cate_id');
        $this->db->join('brands b', 'b.brand_id = p.brand_id');
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row();
        }else{
          return false;
        }
    }
    function getHomeCateDet($id){
        $this->db->select('c.cate_id,c.category');
        $this->db->from("categories c");
        $this->db->where("c.cate_id", $id);
        $this->db->where('c.status', 0);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row();
        }else{
          return false;
        }
    }
    function getProImages($id){
        $q1 = "select * from photo as p where (p.table = 'products' and p.field ='pro_id' and p.field_id=".$id." and status=0) ".
        "or (p.table = 'sub_product' and p.field ='pro_id' and p.field_id in (select sp.sub_pro_id from sub_product as sp where sp.pro_id=".$id.") and status=0) ".
        "order by p.photo_order asc";
        $query = $this->db->query($q1);
        return $query->result();
        /*$this->db->select('*');
        $this->db->from("photo");
        $this->db->where("table", 'products');
        $this->db->where("field", 'pro_id');
        $this->db->where("field_id", $id);
        $this->db->where("status", 0);
        $this->db->order_by("photo_order", "asc"); 
        $query = $this->db->get();
        return $query->result();*/
    }
    function getAttr($pro_id){
        $this->db->select('attributes.*,COUNT(product_attr_val.attr_id) as total');
        $this->db->from('product_attr_val');
        $this->db->where('product_attr_val.pro_id', $pro_id);
        $this->db->where('attributes.price_effect', 0);
        $this->db->where('attributes.attr_status', 0);
        $this->db->join('attributes', 'attributes.attr_id = product_attr_val.attr_id');
        $this->db->group_by("product_attr_val.attr_id");
        $query = $this->db->get();
        $ret['attributes']= $query->result();
        $this->db->select('product_attr_val.*,attribute_value.value,attribute_value.description');
        $this->db->from('product_attr_val');
        $this->db->where('product_attr_val.pro_id', $pro_id);
        $this->db->where('attribute_value.status', 0);
        $this->db->join('attribute_value', 'attribute_value.av_id = product_attr_val.av_id', 'left');
        $query = $this->db->get();
        $ret['pro_attribute_val']= $query->result();
        
        return $ret;
    }
    function getProCartDet($id){
        $this->db->select('p.pro_id,p.pro_code,p.name,p.price,p.quantity,p.weight,p.added_date,q.pid,q.photo_path,q.photo_title');
        $this->db->from("products p");
        $this->db->where("p.pro_id", $id);
        $this->db->where('p.status', 0);
        $this->db->join('photo q', 'q.table="products" AND q.field_id = p.pro_id');
        $this->db->order_by("photo_order", "asc");
        $this->db->group_by("p.pro_id");
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row();
        }else{
          return false;
        }
    }
    function getSubProCartDet($subproid){
        $this->db->select('p.pro_id,p.weight,p.added_date,s.sub_name as name,s.sub_pro_code as pro_code,s.stock as quantity,s.sub_price as price,q.pid,q.photo_path,q.photo_title');
        $this->db->from("sub_product s");
        $this->db->where("s.sub_pro_id", $subproid);
        $this->db->join('products p', 'p.pro_id = s.pro_id');
        $this->db->join('photo q', 'q.table="products" AND q.field_id = p.pro_id');
        $this->db->order_by("photo_order", "asc");
        $this->db->group_by("p.pro_id");
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row();
        }else{
          return false;
        }
    }
    function getSubPro($id,$attributes){
        $selected_sub_id = 0;
        $return_array  = array();
        if (!(empty($attributes))) {
            $q1 = "select distinct spc.sub_pro_id from sub_pro_sepc spc left join sub_product sp on spc.sub_pro_id = sp.sub_pro_id where  sp.pro_id=".$id.
                "  and (";
            $first = true;
            foreach ($attributes as $key => $value) {
                if(!$first){
                    $q1= $q1." or ";
                }
                $q1= $q1."(spc.attr_id=".$key." and spc.av_id=".$value.")";
                $first = false;
            }
            $q1= $q1.")";
            $query = $this->db->query($q1);
            $sub_prod_ids=$query->result();
            $sub_prod_ids = array_map(function($o) {return (integer)$o->sub_pro_id;}, $sub_prod_ids); 
            
            $is_match = true;
            foreach ($sub_prod_ids as $sub_prod_id) {
                $q2 = "select * from sub_pro_sepc where sub_pro_id =".$sub_prod_id;
                $query2 = $this->db->query($q2);
                $sub_prod_spcs=$query2->result();
                
                foreach ($sub_prod_spcs as $specs) {
                    if($specs->av_id != $attributes[$specs->attr_id]){
                        $is_match = false;
                        break;
                    }
                }
                if(!$is_match){
                    $is_match = true;
                }else{
                    $selected_sub_id = $sub_prod_id;
                    break;
                }
            }
        }
        if($selected_sub_id==0){
            $return_array['subprod_available'] = 0;
            $return_array['sub_pro_id'] = 0;
            $this->db->select('*');
            $this->db->from("products");
            $this->db->where("pro_id", $id);
            $this->db->limit(1);
            $query = $this->db->get();
            $product = $query->row();
            $return_array['quantity'] = $product->quantity;
            $return_array['price'] = $product->price;
            $return_array['poi_price'] = $product->price_poi;
            $return_array['sub_images'] = '';
        }else{
            $return_array['subprod_available'] = 1;
            $return_array['sub_pro_id'] = $selected_sub_id;
            $this->db->select('*');
            $this->db->from("sub_product");
            $this->db->where("sub_pro_id", $selected_sub_id);
            $this->db->limit(1);
            $query = $this->db->get();
            $sub_product = $query->row();
            $return_array['quantity'] = $sub_product->stock;
            $return_array['price'] = $sub_product->sub_price;
            $return_array['poi_price'] = $sub_product->sub_price_poi;
            $return_array['sub_product_name'] = $sub_product->sub_pro_code;
            $return_array['sub_product_attr_name'] = $sub_product->sub_name;
            /*$q1 = "select p.pid from photo as p where p.table = 'sub_product' OR p.table = NULL and p.field_id = ".$selected_sub_id." OR NULL ".
            "order by p.photo_order asc limit 0,1";*/
            /*$q1 = "select p.pid from photo as p where p.table = 'sub_product' and p.field ='pro_id' and p.field_id = ".$selected_sub_id."  and status=0 ".
            "order by p.photo_order asc limit 0,1";*/
            $this->db->select('p.pid');
            $this->db->from('sub_product s');
            $this->db->where("sub_pro_id", $selected_sub_id);
            $this->db->join('photo p', 'p.table="sub_product" AND p.field_id = s.sub_pro_id', 'left outer');
            $this->db->order_by('p.photo_order', "ACS");
            $this->db->group_by("s.sub_pro_id");
            $this->db->limit(1);
            $query = $this->db->get();
            $photo_id=$query->row();
            $return_array['sub_images'] = $photo_id->pid;
        }
        return $return_array;
        /*$attr_array = array();
        if (!(empty($attributes))) {
            foreach ($attributes as $key => $value) {
                $attr_arr = array(
                    'attr_id' => $key,
                    'av_id' => $value
                );
            }
        }
        $this->db->select('p.sub_pro_id,p.pro_id,p.sub_name,p.sub_pro_code,p.stock,p.sub_price,p.sub_weight,p.sub_price,p.sub_price_poi,q.photo_path,q.photo_title');
        $this->db->from("sub_product p");
        $this->db->where("p.pro_id", $id);
        $this->db->join('sub_pro_sepc s', 's.sub_pro_id = p.sub_pro_id', 'left');
        $this->db->join('photo q', 'q.table="sub_product" AND q.field_id = p.sub_pro_id' , 'left outer');
        $this->db->group_by("p.sub_pro_id");
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return false;
        }*/
    }
    function saveCust($user_array,$addr_array){
        $this->db->trans_start();
        $this->db->insert('customers',$user_array);
        $addr_array['user_id'] =  $this->db->insert_id();
        $this->db->insert('addresses',$addr_array);
        
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }
    function get_login_cust($email) {
        $this->db->select('customers.cust_id,customers.fname,customers.lname,customers.email,customers.password,customers.status,photo.photo_path,photo.photo_title'); 
        $this->db->from('customers');
        $this->db->where('email', $email);
        $this->db->join('photo', 'photo.table="customers" AND photo.field_id = customers.cust_id', 'left outer');
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row();
        }else{
          return false;
        }
    }
    public function place_order($order, $order_status, $order_details, $address, $coupon_id) {
        $this->db->trans_start();
        $this->db->insert('addresses',$address);
        $order['add_id'] = $this->db->insert_id();
        
        $this->db->insert('orders',$order);
        $data['order_id'] = $this->db->insert_id();
        $order_status['order_id'] = $data['order_id'];
        $this->db->insert('order_status_det',$order_status);
        $osd_id = $this->db->insert_id();
        
        $data['order_num'] = strval(ORDER_NUM_START+$data['order_id']);
        $this->db->where('order_id', $data['order_id']);
        $this->db->update('orders', array("order_code" => $data['order_num'],"order_status" => $osd_id));
        
        foreach ($order_details as $order_detail) {
            $prod_spec = $order_detail['specs'];
            unset($order_detail['specs']);
            $order_detail['order_id'] = $data['order_id'];
            $this->db->insert('order_details',$order_detail);
            $detail_id = $this->db->insert_id();
            foreach ($prod_spec as $spec) {
                $spec['order_id'] = $data['order_id'];
                $spec['odet_id'] = $detail_id;
                $this->db->insert('order_product_specs',$spec);
            }
        }
        if ($coupon_id!=0) {
            $this->db->set('coupon_count', 'coupon_count-1', false);
            $this->db->where('cp_id' , $coupon_id);
            $this->db->update('coupons');
        }
        
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            $this->db->trans_commit();
            return $data;
        }
    }
    function loadCustAddress($id)
    {
        $this -> db -> select('d.*,c.country_id,c.nicename,r.reg_id,r.region_name,i.city_id,i.city_name'); 
        $this -> db -> from('addresses d');
        $this->db->where("user_id",$id)->where("(add_type=0 OR add_type=1)");
        $this->db->join('country c', 'c.country_id = d.country_id');
        $this->db->join('regions r', 'r.reg_id = d.reg_id');
        $this->db->join('cities i', 'i.city_id = d.city_id');
        $query = $this->db->get();
        return $query->result();
    }
    function getSingleAddress($custid,$addid)
    {
        $this -> db -> select('addresses.*,customers.email');
        $this -> db -> from('addresses');
        $this->db->where("add_id",$addid)->where("user_id",$custid)->where("(add_type=0 OR add_type=1)");
        $this->db->join('customers', 'customers.cust_id = addresses.user_id');
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row();
        }else{
          return false;
        }
    }
    function get_delivery_charge($country_id, $region_id, $city_id){
        $this -> db -> select('*');
        $this -> db -> from('delivery_charges');
        $this -> db -> where('country_id', $country_id);
        $this -> db -> where('state_id', $region_id);
        $this -> db -> where('city_id', $city_id);
        $this -> db -> limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row();
        }else{
            $this -> db -> select('*');
            $this -> db -> from('delivery_charges');
            $this -> db -> where('country_id', $country_id);
            $this -> db -> where('state_id', $region_id);
            $this -> db -> where('all_of_state', 1);
            $this -> db -> limit(1);
            $this -> db -> limit(1);
            $query1 = $this->db->get();
            if($query1->num_rows() == 1){
                return $query1->row();
            }else{
                $this -> db -> select('*');
                $this -> db -> from('delivery_charges');
                $this -> db -> where('country_id', $country_id);
                $this -> db -> where('all_of_country', 1);
                $this -> db -> limit(1);
                $query1 = $this->db->get();
                if($query1->num_rows() == 1){
                    return $query1->row();
                }else{
                    return null;
                }
            }
        }
    }
    function hasSubCats($cate_id){
        $this->db->select('*');
        $this->db->from("categories");
        $this->db->where("parent_id", $cate_id);
        $query = $this->db->get();
        if($query->num_rows() == 0){
          return false;
        }else{
          return true;
        }
    }
    function update_order_succ_status($id, $order_det, $payment_det, $order_status) {
        $this->db->trans_start();
        if (!empty($order_status)) {
            $this->db->insert('order_status_det',$order_status);
            $order_det['order_status'] = $this->db->insert_id();
        }
        $this->db->where('order_id', $id);
        $this->db->update('orders', $order_det);
        $this->db->insert('order_payment_det',$payment_det);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }
    function update_order_fail_status($id, $order_det, $order_status) {
        $this->db->trans_start();
        if (!empty($order_status)) {
            $this->db->insert('order_status_det',$order_status);
            $order_det['order_status'] = $this->db->insert_id();
        }
        
        $this->db->where('order_id', $id);
        $this->db->update('orders', $order_det);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            $this->db->trans_commit();
        }
    }
    function getProCateAttr($cate_id)
    {
    }
    function check_user_wishlist($user_id,$pro_id){
        $this->db->select('wl_id');
        $this->db->from('wish_list');
        $this->db->where('cust_id', $user_id);
        $this->db->where('pro_id', $pro_id);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return true;
        }else{
          return false;
        }
    }
    /*function getFrontProducts($attr,$attrval){
        $this->db->select('p.pro_id,p.pro_code,p.name,p.price,p.quantity,p.weight,p.view_count,p.sales_count,p.status as pro_status,q.pid,q.photo_path,q.photo_title,q.status as img_status,c.cate_id,c.category');
        $this->db->from('products p');
        $this->db->where('p.status', 0);
        $this->db->where('pav.attr_id', $attr);
        $this->db->where('pav.av_id', $attrval);
        $this->db->join('photo q', 'q.table="products" AND q.field_id = p.pro_id');
        $this->db->join('categories c', 'c.cate_id = p.cate_id');
        $this->db->join('product_attr_val pav', 'pav.pro_id = p.pro_id');
        $this->db->group_by("p.pro_id");
        $this->db->order_by('p.pro_id', "desc");
        $this->db->limit(8);
        $tempdb = clone $this->db;
        $ret['rowcount'] = $tempdb->count_all_results();
        $query = $this->db->get();
        $ret['products']=$query->result();
        if ($ret['rowcount']<8) {
            $exist_ids = array();
            if (!(empty($ret['products']))) {
                foreach ($ret['products'] as $row) {
                    $exist_ids[] = $row->pro_id;
                }
            }
            $this->db->select('p.pro_id,p.pro_code,p.name,p.price,p.quantity,p.weight,p.view_count,p.sales_count,p.status as pro_status,q.pid,q.photo_path,q.photo_title,q.status as img_status,c.cate_id,c.category');
            $this->db->from('products p');
            if (!(empty($exist_ids))) {
                $this->db->where_not_in('p.pro_id', $exist_ids);
            }
            $this->db->where('p.status', 0);
            $this->db->join('photo q', 'q.table="products" AND q.field_id = p.pro_id');
            $this->db->join('categories c', 'c.cate_id = p.cate_id');
            $this->db->group_by("p.pro_id");
            $this->db->order_by('p.view_count', "desc");
            $this->db->limit(8-(int)$ret['rowcount']);
            $query = $this->db->get();
            array_push($ret['products'], $query->result());
            $tempdb = clone $this->db;
            $rowcount = 0;
            $rowcount = $tempdb->count_all_results();
            $ret['rowcount'] = (int)$rowcount+(int)$ret['rowcount'];
        }
        return $ret;
    }*/
    public function getCategory()
    {
        $this -> db -> select('*');
        $this -> db -> from('categories');
        $this -> db -> where('status', 0);
        $query = $this -> db -> get();
        return $query->result();
    }
    function user_name_exist_check($userName){
        $this -> db -> select('*');
        $this -> db -> from('staff_users');
        $this -> db -> where('username', $userName);
        $this -> db -> limit(1);
        $query = $this -> db -> get();
        $rowCount=$query -> num_rows();
        if($rowCount == 1){
            return true;
        }else{
            return false;
        }
    }
    function saveUser($user_array,$addr_array){
        $this->db->trans_start();
        $this->db->insert('staff_users',$user_array);
        $addr_array['user_id'] =  $this->db->insert_id();
        $this->db->insert('addresses',$addr_array);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }
    function getFrontCatePros($category,$limit){
        $this->db->select('p.pro_id,p.name,p.price,p.price_poi,p.quantity,p.weight,p.view_count,p.sales_count,p.added_date,p.status as pro_status,pt3.pid,pt3.photo_path,pt3.photo_title,c.cate_id,c.category');
        $this->db->from('products p');
        $this->db->where_in('p.cate_id', $category);
        $this->db->where('p.status', 0);
        $this->db->join('(select * from photo pt1 right join
            (select pt.table as tabel2,pt.field_id as field_id2,min(pt.photo_order) as photo_order2 from photo pt 
            group by pt.table,pt.field_id) as pt2 on pt1.table=pt2.tabel2 and pt1.field_id=pt2.field_id2 
            and pt1.photo_order=pt2.photo_order2 where pt1.table = "products") pt3', 'pt3.field_id = p.pro_id', 'right outer');
        $this->db->join('categories c', 'c.cate_id = p.cate_id');
        $this->db->group_by("p.pro_id");
        $this->db->order_by('p.pro_id', "RANDOM");
        $this->db->limit($limit);
        $tempdb = clone $this->db;
        $ret['rowcount'] = $tempdb->count_all_results();
        $query = $this->db->get();
        $ret['products']=$query->result();
        return $ret;
    }
    /*function getFrontCatePros($main_cat,$category,$limit){
        $this->db->select('p.pro_id,p.name,p.price,p.price_poi,p.quantity,p.weight,p.view_count,p.sales_count,p.added_date,p.status as pro_status,pt3.pid,pt3.photo_path,pt3.photo_title,c.cate_id,c.category');
        $this->db->from('products p');
        if (!empty($category)) {
            $this->db->where_in('p.cate_id', $category);
        }
        $this->db->where('s.user_type', 0);
        $this->db->where('p.status', 0);
        $this->db->join('(select * from photo pt1 right join
            (select pt.table as tabel2,pt.field_id as field_id2,min(pt.photo_order) as photo_order2 from photo pt 
            group by pt.table,pt.field_id) as pt2 on pt1.table=pt2.tabel2 and pt1.field_id=pt2.field_id2 
            and pt1.photo_order=pt2.photo_order2 where pt1.table = "products") pt3', 'pt3.field_id = p.pro_id', 'right outer');
        $this->db->join('categories c', 'c.cate_id = p.cate_id');
        $this->db->join('staff_users s', 's.user_id = p.user_id');
        $this->db->group_by("p.pro_id");
        $this->db->order_by("view_count", "desc");
        $this->db->limit($limit);
        $query = $this->db->get();
        if($query->num_rows() == 10){
            $tempdb = clone $this->db;
            $ret['rowcount'] = $tempdb->count_all_results();
            $query = $this->db->get();
            $ret['products']=$query->result();
            $ret['curr_cat_id'] = $main_cat;
            return $ret;
        }else{
            $next_category = $this->Common_modal->getNextMainCat($main_cat);
            if(!$next_category){
                return false;
            }
            $category = $this->Common_modal->getCateSubById($next_category->cate_id);
            array_push($category, $next_category->cate_id);
            return $this->getFrontCatePros($next_category->cate_id,$category,$limit);
        }
    }*/
    function checkPassField($link){
        $this->db->select('*');
        $this->db->from('forgot_password');
        $this->db->like('temp_link', $link, 'both');
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return false;
        }
    }
    function getProCateCount()
    {
        $this->db->select('cate_id, count(*) as count');
        $this->db->from('products');
        $this->db->order_by('count(*)', "desc");
        $this->db->group_by("cate_id");
        $query = $this -> db -> get();
        return $query->result();
    }
    function checkCoupon($code){
        $today = date("Y-m-d");
        $this->db->select('*');
        $this->db->from('coupons');
        $this->db->where('coupon_code', $code);
        $this->db->where('coupon_count > 0');
        $this->db->where("valid_from <=",$today)->where("valid_to >=",$today);
        $this->db->where('status', 0);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return false;
        }
    }
    
}
