<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_model extends CI_Model
 { //start class


	public function __construct()
	{                           
	  parent:: __construct();
	   
	}
	
	public function get_user_all_admin_res($per_page,$page)
	{ 
		$this->db->where('tbl_user_master.user_type',"user");
		$this->db->select('tbl_user_master.*');

		$this->db->from('tbl_user_master');
		if($per_page!=""){
		$this->db->limit($per_page,$page);
		}
		$query=$this->db->get();
		return $query->result_array();
	
	}
	public function get_user_all_cutomer($per_page,$page)
	{ 
		//$this->db->where('reg.active_status',"active");
		$this->db->select('reg.*');

		$this->db->from('reg');
		if($per_page!=""){
		$this->db->limit($per_page,$page);
		}
		$query=$this->db->get();
		return $query->result_array();
	
	}
	public function getCustomerWalletAmountPending($qury,$per_page,$page)
	{

		$this->db->where('tbl_wallet.status',"pending");
		$this->db->select('tbl_wallet.*,reg.name');
		$this->db->join('reg','reg.rid=tbl_wallet.user_id');
		$res=$this->db->get('tbl_wallet');

		if($qury==1)
		{
			return $res->result_array();
		}
		else
		{
			return $res->num_rows();
		}	

	}
	public function get_cutomer_posts($per_page,$page)
	{ 
		//$this->db->where('tbl_post_details.active_status',"active");
		$this->db->select('tbl_post_details.*,tbl_posts.post_image,tbl_posts.post_title,post_description,tbl_category.category_name,reg.name,address,email');

		$this->db->from('tbl_post_details');
		$this->db->join('tbl_posts','tbl_posts.post_id=tbl_post_details.post_id','left');
		$this->db->join('tbl_category','tbl_category.category_id=tbl_post_details.category_id','left');
		$this->db->join('reg','reg.rid=tbl_post_details.customer_id','left');
		if($per_page!=""){
		$this->db->limit($per_page,$page);
		}
		$query=$this->db->get();
		return $query->result_array();
	
	}
	public function get_cutomer_posts_payment($qry,$per_page,$page)
	{ 
		//$this->db->where('tbl_post_details.active_status',"active");
		$this->db->select('tbl_post_details.*,tbl_posts.post_image,tbl_posts.post_title,post_description,tbl_category.category_name,reg.name,address,email,tbl_wallet.wallet_id,transaction_img');

		$this->db->from('tbl_post_details');
		$this->db->join('tbl_posts','tbl_posts.post_id=tbl_post_details.post_id','left');
		$this->db->join('tbl_category','tbl_category.category_id=tbl_post_details.category_id','left');
		$this->db->join('reg','reg.rid=tbl_post_details.customer_id','left');
		$this->db->join('tbl_wallet','tbl_wallet.user_id=tbl_post_details.customer_id','left');
		if($per_page!=""){
		$this->db->limit($per_page,$page);
		}
		$query=$this->db->get();
		if($qry==1)
		{
			return $query->result_array();
		}
		else
		{
			return $query->num_rows();
		}
		
	
	}
}
?>