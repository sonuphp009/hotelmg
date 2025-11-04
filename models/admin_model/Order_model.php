<?php
Class Order_model extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	public function getAllOrder($order_date,$order_status,$qty,$per_page,$page)
	{
		//$this->db->where('tbl_category.status','active');

		if($order_date!="" && $order_date!='Na')
		{ 
			
			$this->db->where('tbl_item_order.order_date', $order_date);
		}
		if($order_status!="" && $order_status!='Na')
		{ 
			
			$this->db->where('tbl_item_order.order_status', $order_status);
		}
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
}
?>