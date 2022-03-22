<?php

class Account_modal extends CI_Model {
    













    function getOrders($cust_id)
    {
        $this->db->select('*');
        $this->db->from('orders o');
        $this->db->where('o.cust_id', $cust_id);
        $this->db->join('order_status_det s', 's.osd_id = o.order_status');
        $this->db->join('order_statuses os', 'os.os_id = s.os_id');
        $this->db->order_by('o.order_date', "desc");
        $query = $this->db->get();
        return $query->result();
    }

    function getwishlist($cust_id)
    {
        $this->db->select('w.*,p.pro_id,p.name,p.price,p.status,c.cate_id,c.category,q.pid,q.photo_path,q.photo_title');
        $this->db->from('wish_list w');
        $this->db->where('w.cust_id', $cust_id);
        $this->db->join('products p', 'p.pro_id = w.pro_id');
        $this->db->join('photo q', 'q.table="products" AND q.field_id = p.pro_id');
        $this->db->join('categories c', 'c.cate_id = p.cate_id');
        $this->db->group_by("w.pro_id");
        $this->db->order_by('w.added_date', "desc");
        $query = $this->db->get();
        return $query->result();
    }

    function check_user_order($cust_id,$order_id){
        $this->db->select('order_id');
        $this->db->from('orders');
        $this->db->where('order_id', $order_id);
        $this->db->where('cust_id', $cust_id);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return true;
        }else{
          return false;
        }
    }

    function check_user_wishlist($cust_id,$id){
        $this->db->select('wl_id');
        $this->db->from('wish_list');
        $this->db->where('wl_id', $id);
        $this->db->where('cust_id', $cust_id);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return true;
        }else{
          return false;
        }
    }

    function check_user_address($cust_id,$id){
        $this->db->select('add_id');
        $this->db->from('addresses');
        $this->db->where('add_id', $id);
        $this->db->where("user_id",$cust_id)->where("(add_type=0 OR add_type=1)");
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return true;
        }else{
          return false;
        }
    }

    function getAddress($user_id)
    {
        $this -> db -> select('d.*,c.nicename,r.region_name,i.city_name'); 
        $this -> db -> from('addresses d');
        $this->db->where("user_id",$user_id)->where("(add_type=0 OR add_type=1)");
        $this->db->join('country c', 'c.country_id = d.country_id');
        $this->db->join('regions r', 'r.reg_id = d.reg_id');
        $this->db->join('cities i', 'i.city_id = d.city_id');
        $query = $this->db->get();
        return $query->result();
    }

    function getProfileDet($user_id)
    {
        $this -> db -> select('*'); 
        $this -> db -> from('addresses a');
        $this->db->where("a.user_id",$user_id)->where("(a.add_type=0)");
        $this->db->join('customers c', 'c.cust_id = a.user_id');
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row();
        }else{
          return false;
        }
    }

    function update_profile($user_id,$user_array,$addr_array){
        $this->db->trans_start();

        $this->db->where('cust_id', $user_id);
        $this->db->update('customers', $user_array);

        $this->db->where("user_id",$user_id)->where("(add_type=0)");
        $this->db->update('addresses', $addr_array);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    function getOrderPaydet($order_id)
    {
        $this->db->select('o.order_code,o.order_email,o.cart_total,o.del_charge,o.discount,o.paid_total,d.fname,d.lname,d.address,d.phone,,c.nicename,i.city_name');
        $this->db->from('orders o');
        $this->db->where('o.order_id', $order_id);
        $this->db->join('addresses d', 'd.add_id = o.add_id');
        $this->db->join('country c', 'c.country_id = d.country_id');
        $this->db->join('cities i', 'i.city_id = d.city_id');
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1){
          return $query->row();
        }else{
          return false;
        }
    }
}

