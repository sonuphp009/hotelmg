<?php
Class User_model extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	public function check_pageName($page_name,$page_id)
	{
		$this->db->select('*');
		$this->db->where('email',$page_name);
		
		$res=$this->db->get('reg');
		if($page_id==1)
		{
			return $res->result_array();
		}
		else
		{
			return $res->num_rows();
		}		
	}
	public function checkSessionInUser($user_id,$page_id)
	{
		$this->db->select('*');
		$this->db->where('rid',$user_id);
		
		$res=$this->db->get('reg');
		if($page_id==1)
		{
			return $res->result_array();
		}
		else
		{
			return $res->num_rows();
		}		
	}
	public function getCartItems($user_id,$page_id)
	{
		$this->db->select('*');
		$this->db->where('user_id',$user_id);
		$this->db->or_where('session_id',$user_id);
		
		$res=$this->db->get('tbl_cart');
		if($page_id==1)
		{
			return $res->result_array();
		}
		else
		{
			return $res->num_rows();
		}		
	}
	public function getAllCategory($qty)
	{
		
		$this->db->where('tbl_category.status',  'active');
		

		$this->db->select('*');

		$this->db->order_by('category_id','DESC');

		
		$res=$this->db->get('tbl_category');

		if($qty==1)
			return $res->result_array();
		else
			return $res->num_rows();

	}
	public function getAllPTypeData($qty,$type)
	{
		
		$this->db->where('tbl_typewise_products.status',  'active');
		if($type>0)
		{
			$this->db->where('tbl_typewise_products.type_id',  $type);
		}

		$this->db->select('tbl_typewise_products.*,tbl_product.product_title,tbl_product.product_description,tbl_product.product_price,tbl_product.product_image,tbl_product.product_size,tbl_product.mrp_price');
		$this->db->join('tbl_product','tbl_product.product_id=tbl_typewise_products.product_id');
		$this->db->limit(10);

		$this->db->group_by('tbl_product.product_id');
		$this->db->order_by('type_detail_id','DESC');

		$res=$this->db->get('tbl_typewise_products');

		if($qty==1)
			return $res->result_array();
		else
			return $res->num_rows();

	}
	public function getAllProductData($qty,$type)
	{
		
		$this->db->where('tbl_product.status',  'active');
		

		$this->db->select('tbl_product.product_id,tbl_product.product_title,tbl_product.product_description,tbl_product.product_price,tbl_product.product_image,tbl_product.product_size,tbl_product.mrp_price');
		$this->db->limit(10);

		$this->db->group_by('tbl_product.product_id');
		$this->db->order_by('tbl_product.product_id','DESC');

		$res=$this->db->get('tbl_product');

		if($qty==1)
			return $res->result_array();
		else
			return $res->num_rows();

	}
	public function getAllFeaturedData($qty,$type)
	{
		
		$this->db->where('tbl_typewise_products.status',  'active');
		if($type>0)
		{
			$this->db->where('tbl_typewise_products.type_id',  $type);
		}

		$this->db->select('tbl_typewise_products.*,tbl_product.product_title,tbl_product.product_description,tbl_product.product_price,tbl_product.product_image,tbl_product.product_size,tbl_product.mrp_price');
		$this->db->join('tbl_product','tbl_product.product_id=tbl_typewise_products.product_id');
		$this->db->limit(10);

		$this->db->group_by('tbl_product.product_id');
		$this->db->order_by('type_detail_id','DESC');

		$res=$this->db->get('tbl_typewise_products');

		if($qty==1)
			return $res->result_array();
		else
			return $res->num_rows();

	}
	public function getAllPCategoryData($qty,$type)
	{
		
		$this->db->where('tbl_product.status',  'active');
		if($type!="")
		{
			$this->db->like('tbl_product.product_title', $type);
		}

		$this->db->select('tbl_product.product_id,tbl_product.product_title,tbl_product.product_description,tbl_product.product_price,tbl_product.product_image,tbl_product.product_size,tbl_product.mrp_price');
		//$this->db->join('tbl_product','tbl_product.product_id=tbl_typewise_products.product_id');
		$this->db->group_by('tbl_product.product_id');
		$this->db->order_by('tbl_product.product_id','DESC');

		$res=$this->db->get('tbl_product');

		if($qty==1)
			return $res->result_array();
		else
			return $res->num_rows();

	}
	public function getAllFavorite($qty,$user_id)
	{
		
		$this->db->where('tbl_product.status',  'active');
		if($user_id>0)
		{
			$this->db->like('tbl_favorite_products.user_id', $user_id);
		}

		$this->db->select('tbl_product.product_id,tbl_product.product_title,tbl_product.product_description,tbl_product.product_price,tbl_product.product_image,tbl_product.product_size,tbl_product.mrp_price');
		//$this->db->from('tbl_favorite_products');
		$this->db->join('tbl_product','tbl_favorite_products.product_id=tbl_product.product_id');

		//$this->db->group_by('tbl_product.product_id');
		$this->db->order_by('tbl_favorite_products.favorite_id','DESC');

		$res=$this->db->get('tbl_favorite_products');

		if($qty==1)
			return $res->result_array();
		else
			return $res->num_rows();

	}
	public function getAllPByVategory($qty,$type,$per_page,$page)
	{
		
		$this->db->where('tbl_product.status','active');
		if($type>0)
		{
			$this->db->where('tbl_category.category_id',$type);
		}

		$this->db->select('tbl_category.*,tbl_product.product_id,tbl_product.product_title,tbl_product.product_description,tbl_product.product_price,tbl_product.product_image,tbl_product.product_size');
		$this->db->join('tbl_product','tbl_product.category_id=tbl_category.category_id');
		$this->db->group_by('tbl_product.product_id');
		$this->db->order_by('product_id','DESC');
		if($per_page!=""){

		$this->db->limit($per_page,$page);

		}
		$res=$this->db->get('tbl_category');

		if($qty==1)
		{
			return $res->result_array();
		}
		else
		{
			return $res->num_rows();
		}
		

	}
	public function getdocDetailsById($user_id)
	{
		$this->db->where('tbl_document_details.user_id',$user_id);
		$this->db->select('tbl_document_details.*,tbl_documents.document_name');
		$this->db->join('tbl_documents','tbl_documents.document_id=tbl_document_details.document_id','left');

		$res=$this->db->get('tbl_document_details');
		
		return $res->result_array();

	}
	public function getUserInfoById($rid)
	{
		$this->db->where('reg.rid',$rid);
		$this->db->where('reg.active_status','active');
		$this->db->select('reg.*');

		$res=$this->db->get('reg');
		
		return $tsr=$res->result_array();

	}
	public function getCheckFavorite($product_id,$user_id)
	{
		$this->db->where('tbl_favorite_products.product_id',$product_id);
		$this->db->where('tbl_favorite_products.user_id',$user_id);
		$this->db->select('tbl_favorite_products.*');

		$res=$this->db->get('tbl_favorite_products');
		
		return $tsr=$res->num_rows();

	}
	public function add_User($data) 
	{
		$res=$this->db->insert('reg',$data);
		if($res)
		{
			$category_id=$this->db->insert_id();
			return $category_id;
		}
		else
		return false;
	}
	public function add_address($data) 
	{
		$res=$this->db->insert('tbl_addresses',$data);
		if($res)
		{
			$category_id=$this->db->insert_id();
			return $category_id;
		}
		else
		return false;
	}
	public function getSingleUserInfo($page_id,$qury)
	{

		$this->db->where('patient_id',$page_id);
		$this->db->select('t.* ,
							');
		$this->db->from('tbl_user_master t');
		
		$query=$this->db->get();
		if($qury==1)
		{
			return $query->result_array();
		}
		else
		{
			return $query->num_rows();
		}		
	}
	public function updateUser($input_data,$user_id)
	{
		$this->db->where('rid',$user_id);
		$res=$this->db->update('reg',$input_data);
		if($res)
		{
			return true;
		}
		else
		return false;
	}
	public function deleteUser($page_id)
	{
		$this->db->set('status','inactive');
		$this->db->where('patient_id',$page_id);
		$res=$this->db->update('tbl_user_master');
		if($res)
		{
			return true;
		}
		else
		return false;
	}
	public function getAllproductByproduct($qury,$product_id)
	{

		$this->db->where('tbl_product.product_id',  $product_id);
		
		$this->db->select('tbl_product.*,tbl_category.category_name,tbl_subcategory.subcategory_name');
		$this->db->join('tbl_category','tbl_category.category_id=tbl_product.category_id','left');
		$this->db->join('tbl_subcategory','tbl_subcategory.subcategory_id=tbl_product.subcategory_id','left');


		
		$query=$this->db->get('tbl_product');

		if($qury==1)
		{
			return $query->row_array();
		}
		else
		{
			return $query->num_rows();
		}	

	}
	public function getProductImage($product_id)
	{

		
		$this->db->where('tbl_product_images.product_id',$product_id);
		$this->db->select('tbl_product_images.*');

		$res=$this->db->get('tbl_product_images');
		
		return $tsr=$res->result_array();

	}
	public function getAllproductFromCart($session_id)
	{
		$this->db->where('tbl_cart.session_id',$session_id);
		//$this->db->or_where('tbl_cart.user_id',$session_id);
		$this->db->select('tbl_cart.*,,tbl_product.product_title,tbl_product.product_description,tbl_product.product_price,tbl_product.product_image,tbl_product.product_size');
		$this->db->join('tbl_product','tbl_product.product_id=tbl_cart.product_id');

		$res=$this->db->get('tbl_cart');
		
		return $tsr=$res->result_array();

	}
	public function checkSessionWiseProduct($session_id,$product_id)
	{
		$this->db->where('tbl_cart.session_id',$session_id);
		$this->db->where('tbl_cart.product_id',$product_id);
		$this->db->select('tbl_cart.*');

		$res=$this->db->get('tbl_cart');
		
		return $tsr=$res->num_rows();

	}
	public function checkSessionWiseCart($session_id)
	{
		$this->db->where('tbl_cart.session_id',$session_id);
		$this->db->select('tbl_cart.*');

		$res=$this->db->get('tbl_cart');
		
		return $tsr=$res->result_array();

	}
	public function getCheckEmail($email)
	{
		$this->db->where('reg.email',$email);
		$this->db->select('reg.*');

		$res=$this->db->get('reg');
		
		return $tsr=$res->num_rows();

	}
	public function getchkUser($rid)
	{
		$this->db->like('reg.rid',$rid);
		$this->db->select('reg.*');

		$res=$this->db->get('reg');
		
		return $tsr=$res->num_rows();

	}
	public function getAllUserAddresses($session_id)
	{
		$this->db->where('tbl_addresses.user_id',$session_id);
		$this->db->select('tbl_addresses.*');

		$res=$this->db->get('tbl_addresses');
		
		return $tsr=$res->result_array();

	}
	public function add_order_details($data) 
	{
		$res=$this->db->insert('tbl_order_details',$data);
		if($res)
		{
			$category_id=$this->db->insert_id();
			return $category_id;
		}
		else
		return false;
	}
	public function add_order($data) 
	{
		$res=$this->db->insert('tbl_item_order',$data);
		if($res)
		{
			$category_id=$this->db->insert_id();
			return $category_id;
		}
		else
		return false;
	}
	public function getAllOrder($customer_id,$order_date,$qty,$per_page,$page)
	{
		//$this->db->where('tbl_category.status','active');

		if($order_date!="" && $order_date!='Na')
		{ 
			
			$this->db->where('tbl_item_order.order_date', $order_date);
		}
		$this->db->where('tbl_item_order.user_id', $customer_id);
		$this->db->select('tbl_item_order.*,reg.name,');
		$this->db->join('reg','reg.rid=tbl_item_order.user_id');
		$this->db->join('tbl_addresses','tbl_addresses.address_id=tbl_item_order.address_id','left');
		$this->db->order_by('order_id','DESC');

		if($per_page!=""){
			
		$this->db->limit($per_page,$page);
		}
		$res=$this->db->get('tbl_item_order');

		if($qty==1)
			return $res->result_array();
		else
			return $res->num_rows();

	}
	public function getSingleOrderInfo($banner_id,$qury)
	{

		$this->db->select('tbl_item_order.*,tbl_addresses.street_address1,tbl_addresses.street_address2,tbl_addresses.city,tbl_addresses.state,tbl_addresses.country,tbl_addresses.postcode,reg.name');
		$this->db->where('tbl_item_order.order_id',$banner_id);
		$this->db->from("tbl_item_order");
		$this->db->join('tbl_addresses','tbl_addresses.address_id=tbl_item_order.address_id','left');
		$this->db->join('reg','reg.rid=tbl_item_order.user_id','left');
		$query=$this->db->get();
		if($qury==1)
		{
			return $query->row_array();
		}
		else
		{
			return $query->num_rows();
		}		

	}
	public function getOrderDetails($banner_id)
	{

		$this->db->select('tbl_order_details.*,tbl_product.product_title,tbl_product.product_description,tbl_product.product_price,tbl_product.product_image,tbl_product.product_size,tbl_product.product_color,tbl_product.product_unit,tbl_product.status');
		$this->db->where('tbl_order_details.order_id',$banner_id);
		$this->db->from("tbl_order_details");
		$this->db->join('tbl_product','tbl_product.product_id=tbl_order_details.product_id','left');
		$query=$this->db->get();
		
		return $query->result_array();
				

	}
}?>