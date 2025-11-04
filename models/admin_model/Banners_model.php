<?php

Class Banners_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor

		parent::__construct();

	}
	public function getAllBanner($category_id,$subcategory_id,$banner_from_date,$banner_to_date,$qury,$per_page,$page)
	{

		if($category_id!="" && $category_id!='Na')
		{
			$this->db->where('tbl_banners.category_id',  $category_id);
		}
		
		if($subcategory_id!="" && $subcategory_id!='Na')
		{
			$this->db->where('tbl_banners.subcategory_id',  $subcategory_id);
		}

		if($banner_from_date!="" && $banner_from_date!='Na')
		{ 
			//$product_title = str_replace('_', ' ', $product_title);
			$this->db->where('tbl_banners.from_date >=', $banner_from_date);
		}

		if($banner_to_date!="" && $banner_to_date!='Na')
		{
			$this->db->where('tbl_banners.to_date <=',  $banner_to_date);
		}


		$this->db->select('*');

		$this->db->order_by('banner_id','DESC');

		if($per_page!=""){
			$this->db->limit($per_page,$page);
		}
		$query=$this->db->get('tbl_banners');

		if($qury==1)
		{
			return $query->result_array();
		}
		else
		{
			return $query->num_rows();
		}	

	}
	public function getAllCategoryForSub($qty,$per_page,$page)
	{
		$this->db->where('tbl_category.status','active');

		
		$this->db->select('*');

		$this->db->order_by('category_id','DESC');

		if($per_page!=""){
			
			$this->db->limit($per_page,$page);
		}
		$res=$this->db->get('tbl_category');

		if($qty==1)
			return $res->result_array();
		else
			return $res->num_rows();

	}
	public function getSubCategoryInfo($qury)
	{
		$this->db->select('*');
		$this->db->where('status','active');
		$query=$this->db->get("tbl_subcategory");
		if($qury==1)
		{
			return $query->result_array();
		}
		else
		{
			return $query->num_rows();
		}		

	}
	public function add_banner($data) 

	{

		$res=$this->db->insert('tbl_banners',$data);

		if($res)

		{

			$product_id=$this->db->insert_id();

			return $product_id;

		}

		else

			return false;

	}
	public function getAllCategory($per_page,$page)
	{

		$this->db->select('*');

		$this->db->order_by('category_id','DESC');

		$res=$this->db->get('tbl_category');
		if($per_page!=""){
			$this->db->limit($per_page,$page);
		}
		return $res->result_array();

	}
	public function getAllSubCategory($per_page,$page)
	{

		$this->db->select('*');

		$this->db->order_by('subcategory_id','DESC');

		$res=$this->db->get('tbl_subcategory');
		if($per_page!=""){
			$this->db->limit($per_page,$page);
		}
		return $res->result_array();

	}
	public function getSingleproductsInfo($banner_id,$qury)
	{

		$this->db->select('tbl_banners.*,tbl_category.category_name');
		$this->db->where('tbl_banners.banner_id',$banner_id);
		$this->db->from("tbl_banners");
		$this->db->join('tbl_category','tbl_category.category_id=tbl_banners.category_id','left');
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
	
	public function deleteBanner($banner_id)
	{
		$this->db->set('banner_status','delete');
		$this->db->where('banner_id',$banner_id);
		$res=$this->db->update('tbl_banners');
		if($res)
		{
			return true;
		}
		else
			return false;

	}
	public function upt_banner($input_data,$banner_id) 
	{
		$this->db->where('banner_id',$banner_id);
		$res=$this->db->update('tbl_banners',$input_data);

		if($res)

		{

			return true;

		}

		else

			return false;

	}
}
?>