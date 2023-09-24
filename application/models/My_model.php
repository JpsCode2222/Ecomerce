<?php
class My_model extends CI_model{
    function insert($tname,$data)
    {
        $this->db->insert($tname,$data);
        return $this->db->insert_id();
        // last_inserted_id
    }
    function select($tname){
        return $this->db->get($tname)->result_array();
    }
    function get_sub_category(){
       return $this->db->query("SELECT * FROM category,sub_category WHERE sub_category.category_id = category.category_id AND sub_category.status='active'")->result_array();
    }
    function select_where($tname,$cond){
        return $this->db->where($cond)->get($tname)->result_array();
    }
    function update($tname,$cond,$data){
        $this->db->where($cond)->update($tname,$data);
    }
    function delete($tname,$cond){
        $this->db->delete($tname,$cond);
    }
    function cartDetails(){
        $user_id = $_SESSION['user_id'];
        return $this->db->query("SELECT * FROM user_cart,product WHERE user_cart.product_id = product.product_id AND user_cart.user_id = '$user_id'")->result_array();
    }
    function getOrderDetails($status){
        return $this->db->query("SELECT * FROM order_tbl, users WHERE order_tbl.user_id = users.user_id AND order_tbl.order_status = '$status'")->result_array();
    }
}
?>