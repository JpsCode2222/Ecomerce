<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function navbar(){
		$data['cat_list'] = $this->My_model->select_where('category',['status'=>'active']);
		foreach($data['cat_list'] as $key=>$row){
			$data['cat_list'][$key]['sub_cat_list'] = $this->My_model->select_where('sub_category',['category_id'=>$row['category_id']]);
		}
		// echo "<pre>";
		// print_r($data['cat_list']);
		$this->load->view('user/navbar',$data);
	}
	public function footer(){
		$this->load->view('user/footer');
	}
	public function index(){
		$this->navbar();
		$data['slider'] = $this->My_model->select('slider');
		$data['trending_products'] = $this->My_model->select_where('product',['status'=>'active','product_lable'=>'Trending']);
		$data['all_products'] = $this->My_model->select_where('product',['status'=>'active']);
		$this->load->view('user/index.php',$data);
		$this->footer();
	}
	function product_information($product_id){
		$this->navbar();
		$data['product_info'] = $this->My_model->select_where('product',['product_id'=>$product_id]);
		if(isset($_SESSION['user_id'])){
			$cond = ['product_id'=>$product_id,'user_id'=>$_SESSION['user_id']];
			$data['cart'] = $this->My_model->select_where('user_cart',$cond);
		}
		else{
			$data['cart'] = [];
		}
		$this->load->view('user/product_information',$data);
		$this->footer();
	}
	function login(){
		$this->navbar();
		$this->load->view('user/login');
		$this->footer();
	}
	function register(){
		$this->navbar();
		$this->load->view('user/register');
		$this->footer();	
	}
	function registration_process(){
		// print_r($_POST);
		$this->My_model->insert('users',$_POST);
		$_SESSION['pop_msg'] = "Registration Successfull";
		redirect(base_url().'user/login');
	}
	function login_process(){
		if($_POST['user_email'] && $_POST['user_password']){
			$cond = ['user_email'=>$_POST['user_email'],'user_password'=>$_POST['user_password']];
			$data = $this->My_model->select_where('users',$cond);
			if(count($data)>0){
				$_SESSION['user_id'] = $data[0]['user_id'];
				$_SESSION['pop_msg'] = "welcom ".$data[0]['user_name']." Login Successfull";
				redirect('user/index');
			}
			else{
				$_SESSION['err_msg'] = "Login Failed Try again!";
				redirect(base_url().'user/login');
			}
		}
	}

	function add_to_cart($product_id){
		if(isset($_SESSION['user_id'])){
			$data = ['product_id'=>$product_id,'user_id'=>$_SESSION['user_id'],'qnt'=>1];
			$cond = ['product_id'=>$product_id,'user_id'=>$_SESSION['user_id']];
			$res = $this->My_model->select_where('user_cart',$cond);
			if(count($res) > 0){
				$_SESSION['pop_msg'] = 'Product Added in cart Successfully';
				redirect(base_url().'user/product_information/'.$product_id);
			}
			else{
				$_SESSION['pop_msg'] = 'Product Added in cart Successfully';
				$this->My_model->insert('user_cart',$data);
				redirect(base_url().'user/product_information/'.$product_id);
			}
		}
		else{
			$_SESSION['err_msg'] = 'Please Login first';
			redirect(base_url().'user/product_information/'.$product_id);
		}
	}
	function increaseQnt($product_id){
		if(isset($_SESSION['user_id'])){
			$cond = ['product_id'=>$product_id,'user_id'=>$_SESSION['user_id']];
			$data = $this->My_model->select_where('user_cart',$cond);
			$newqnt = $data[0]['qnt']+1;
			$data = $this->My_model->update('user_cart',$cond,['qnt'=>$newqnt]);
			echo json_encode($newqnt);
		}
		else{
			echo json_encode(['status'=>'failed','msg'=>'Invalid login']);
		}
	}
	function decreaseQnt($product_id){
		if(isset($_SESSION['user_id'])){
			$cond = ['product_id'=>$product_id,'user_id'=>$_SESSION['user_id']];
			$data = $this->My_model->select_where('user_cart',$cond);
			$newqnt = $data[0]['qnt']-1;
			if($newqnt >= 1){
				$data = $this->My_model->update('user_cart',$cond,['qnt'=>$newqnt]);
				echo json_encode($newqnt);
			}
			else{
				echo json_encode(1);
			}
		}
		else{
			echo json_encode(['status'=>'failed','msg'=>'Invalid login']);
		}
	}
	function cart(){
		if(isset($_SESSION['user_id'])){
			$this->navbar();
		$data['cart_info'] = $this->My_model->cartDetails();
		$this->load->view('user/cart',$data);
		$this->footer();
		}
	}
	function removeFromCart($product_id){
		if(isset($_SESSION['user_id'])){
			$cond = ['user_id'=>$_SESSION['user_id'],'product_id'=>$product_id];
			$this->My_model->delete('user_cart',$cond);
			redirect(base_url().'user/cart');
		}
		else{
			redirect(base_url().'user/login');
		}
	}
	// Remove multiple items in cart
	// function removeFromCartMultiple(){
	// 	if(isset($_POST['product_id'])){
	// 		print_r($_POST['product_id']);
	// 		for($i=0;$i<count($_POST['product_id']);$i++){
	// 			$cond = ['user_id'=>$_SESSION['user_id'],'product_id'=>$_POST['product_id'][$i]];
	// 			$this->My_model->delete('user_cart',$cond);
	// 		}	
	// 		redirect(base_url().'user/cart');
	// 	}
	// 	else{
	// 		redirect(base_url().'user/cart');
	// 	}
	// }

	function show_product_with_sub_category($product_id){
		$this->navbar();
		$cond = ['sub_category_id'=>$product_id];
		$data['product_info'] = $this->My_model->select_where('product',$cond);
		$data['category_name'] = $this->My_model->select_where('sub_category',$cond);
		$this->load->view('user/show_product',$data);
		$this->footer();
	}

	function profile(){
		if(isset($_SESSION['user_id'])){
			$this->navbar();
			$cond = ['user_id'=>$_SESSION['user_id']];
			$data['user'] = $this->My_model->select_where('users',$cond);
			$this->load->view('user/profile',$data);
			$this->footer();
		}
	}
	function logout(){
		$_SESSION['user_id'] = "";
		session_destroy();
		redirect(base_url().'user/index');
	}
	function confirm_address(){
		$this->navbar();
		$this->load->view('user/confirm_address');
		$this->footer();
	}
	function place_order(){
		echo "<pre>";
		print_r($_POST);
		$cart_info = $this->My_model->cartDetails();
		print_r($cart_info);
		$ttl = 0;
		foreach($cart_info as $row){
			$ttl += ($row['product_price']*$row['qnt']);
		}
		$_POST['user_id'] = $_SESSION['user_id'];
		$_POST['total_amount'] = $ttl;
		$_POST['order_date'] = date('Y-m-d');
		$_POST['order_status'] = 'pending';
		$_POST['status'] = 'active';
		// $sql = "CREATE TABLE order_tbl(order_id INT PRIMARY KEY AUTO_INCREMENT,user_id INT, deliver_to VARCHAR(200),state VARCHAR(50),district VARCHAR(50),city VARCHAR(50),area VARCHAR(100),pincode VARCHAR(7),total_amount INT,order_date DATE,order_status VARCHAR(20),status VARCHAR(20))";
		// $this->db->query($sql);
		$order_id = $this->My_model->insert('order_tbl',$_POST);
		foreach($cart_info as $row){
			$product['order_id'] = $order_id;
			$product['user_id'] = $_SESSION['user_id'];
			$product['product_id'] = $row['product_id'];
			$product['product_name'] = $row['product_name'];
			$product['product_price'] = $row['product_price'];
			$product['qnt'] = $row['qnt'];
			$product['product_lable'] = $row['product_lable'];
			$product['product_details'] = $row['product_details'];
			$product['product_image'] = $row['product_image'];
			$product['status'] = 'active';
			// $sql = "CREATE TABLE order_details (order_det_id INT PRIMARY KEY AUTO_INCREMENT,order_id INT, user_id INT,product_id INT,product_name TEXT,product_price INT,qnt INT,product_lable VARCHAR(200),product_details TEXT,product_image TEXt,status VARCHAR(20))";
			// $this->db->query($sql);
			$this->My_model->insert("order_details",$product);
		}	
		$this->My_model->delete("user_cart",['user_id'=>$_SESSION['user_id']]);
		redirect(base_url().'user/my_orders');
	}
	function my_orders(){
		$this->navbar();
		$data['orders'] = array_reverse($this->My_model->select_where("order_tbl",['user_id'=>$_SESSION['user_id'],'status'=>'active']));
		$this->load->view('user/my_orders',$data);
		$this->footer();
	}
	function open_invoice($order_id){
		$this->navbar();
		$data['order_det'] = $this->My_model->select_where("order_tbl",['order_id'=>$order_id]);
		$data['order_product'] = $this->My_model->select_where("order_details",['order_id'=>$order_id]);
		$this->load->view('user/open_invoice',$data);
		$this->footer();
	}
}
