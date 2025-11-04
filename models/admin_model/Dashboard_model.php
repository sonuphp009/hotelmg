<?php

Class Dashboard_model extends CI_Model {

	function __construct()

	{

		// Call the Model constructor

		parent::__construct();

	}
	public function get_cutomer_posts_payment_count($qry)
	{ 
		$this->db->where('tbl_product_details.status',"complete");
		$this->db->select_sum('tbl_product_details.product_price');

		$this->db->from('tbl_product_details');
		
		$query=$this->db->get();
		if($qry==1)
		{
			return $query->row_array();
		}
		else
		{
			return $query->num_rows();
		}
		
	
	}
	public function get_notification_all($per_page,$page,$user_type)
	{ 
		$this->db->where('tbl_notification.noti_type',$user_type);
		$this->db->select('tbl_notification.*');

		$this->db->from('tbl_notification');
		if($per_page!=""){
		$this->db->limit($per_page,$page);
		}
		$query=$this->db->get();
		return $query->result_array();
	
	}
	public function getAllPosts($per_page,$page)
	{

		$this->db->select('*');

		$this->db->order_by('product_id','DESC');

		if($per_page!=""){
		$this->db->limit($per_page,$page);
		}
		$res=$this->db->get('tbl_product');

		return $res->result_array();

	}
	public function getCustomerWallet($user_id)
	{

		$this->db->where('user_id',$user_id);
		$this->db->where('status',"approved");
		$this->db->select_sum('wallet_money');

		$res=$this->db->get('tbl_wallet');

		return $res->row_array();

	}
	public function numofpost()
	{

		$this->db->select('*');

		$res=$this->db->get('tbl_product');

		return $res->num_rows();

	}
	public function numofcategori()
	{

		$this->db->select('*');

		$res=$this->db->get('tbl_category');

		return $res->num_rows();

	}
	public function numofsubcategori()
	{

		$this->db->select('*');

		$res=$this->db->get('tbl_subcategory');

		return $res->num_rows();

	}
	public function get_cutomer_posts($per_page,$page)
	{ 
		//$this->db->where('tbl_product_details.active_status',"active");
		$this->db->select('tbl_product_details.*,tbl_product.product_image,tbl_product.product_title,product_description,tbl_category.category_name,reg.name,address,email');

		$this->db->from('tbl_product_details');
		$this->db->join('tbl_product','tbl_product.product_id=tbl_product_details.product_id','left');
		$this->db->join('tbl_category','tbl_category.category_id=tbl_product_details.category_id','left');
		$this->db->join('reg','reg.rid=tbl_product_details.customer_id','left');
		$this->db->order_by('tbl_product_details.added_date','desc');
		$this->db->limit(5);
		
		$query=$this->db->get();
		return $query->result_array();
	
	}
	public function numofemployees()
	{
		$this->db->where('user_type','user');
		$this->db->select('*');

		$res=$this->db->get('tbl_user_master');

		return $res->num_rows();

	}
	public function numofcompletedpost()
	{
		$this->db->where('status','complete');
		$this->db->select('*');

		$res=$this->db->get('tbl_product_details');

		return $res->num_rows();

	}
	public function numofcustomer()
	{
		//$this->db->where('status','complete');
		$this->db->select('*');

		$res=$this->db->get('reg');

		return $res->num_rows();

	}
	public function getWalletMoneyForCustomer($noti_type)
	{

		$this->db->select('wallet_money');
		$this->db->where('user_id',$noti_type);
		$res=$this->db->get('tbl_wallet');
		
		return $res->row_array();

	}
	public function getUserInfoById($rid)
	{
		$this->db->where('reg.rid',$rid);
		$this->db->where('reg.active_status','active');
		$this->db->select('reg.*');

		$res=$this->db->get('reg');
		
		return $tsr=$res->result_array();

	}
	public function getAllproductFromCart($session_id)
	{
		$this->db->where('tbl_cart.session_id',$session_id);
		$this->db->or_where('tbl_cart.user_id',$session_id);
		$this->db->select('tbl_cart.*,,tbl_product.product_title,tbl_product.product_description,tbl_product.product_price,tbl_product.product_image,tbl_product.product_size');
		$this->db->join('tbl_product','tbl_product.product_id=tbl_cart.product_id');

		$res=$this->db->get('tbl_cart');
		
		return $tsr=$res->result_array();

	}
	public function getWalletMoneyForAdmin($noti_type)
	{
		if($noti_type=="Admin")
		{
			$this->db->select_sum('product_price');
			$this->db->where('status',"complete");
			$res=$this->db->get('tbl_product_details');
			
			return $res->row_array();
		}
		

	}
	public function getAllNotification($notitype)
	{

		$this->db->select('*');

		$this->db->where('noti_type',$notitype);
		$this->db->order_by('noti_id','desc');
		$this->db->limit(10);
		$res=$this->db->get('tbl_notification');
		
		return $res->result_array();

	}
	public function getAllCategory($per_page,$page)
	{

		$this->db->select('*');

		$this->db->order_by('category_id','DESC');

		//$this->db->limit($per_page,$page);

		$res=$this->db->get('tbl_category');
		if($per_page!=""){
		$this->db->limit($per_page,$page);
		}
		return $res->result_array();

	}
	public function getDocumentMaster()
	{

		$this->db->select('*');
		$res=$this->db->get('tbl_documents');
		return $res->result_array();

	}
	public function getAllSubcategoryLast($per_page,$page)
	{

		$this->db->select('*');

		$this->db->order_by('subcategory_id','DESC');

		$res=$this->db->get('tbl_subcategory');
				
		return $res->result_array();

	}
	public function getCustomerById($user_id)
	{

		$this->db->select('*');

		$this->db->where('rid',$user_id);

		$res=$this->db->get('reg');
		
		return $res->result_array();

	}
	public function getdocDetailsById($user_id)
	{
		$this->db->where('tbl_document_details.user_id',$user_id);
		$this->db->select('tbl_document_details.*,tbl_documents.document_name');
		$this->db->join('tbl_documents','tbl_documents.document_id=tbl_document_details.document_id','left');

		$res=$this->db->get('tbl_document_details');
		
		return $res->result_array();

	}
	public function getdocDetailsByDocId($user_id,$doc_id)
	{
		$this->db->where('tbl_document_details.user_id',$user_id);
		$this->db->where('tbl_document_details.document_id',$doc_id);
		$this->db->select('tbl_document_details.*');

		$res=$this->db->get('tbl_document_details');
		
		return $res->result_array();

	}
}
?>