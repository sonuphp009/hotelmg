<?php

Class Category_model extends CI_Model {

	function __construct()

	{

		// Call the Model constructor

		parent::__construct();

	}

	//Inserting code for category

	public function add_producttype($data) 
	{
		$res=$this->db->insert('tbl_product_type',$data);
		if($res)
		{
			$category_id=$this->db->insert_id();
			return $category_id;
		}

		else

		return false;

	}

	//Inserting code for category

	public function add_category($data) 
	{
		$res=$this->db->insert('tbl_category',$data);
		if($res)
		{
			$category_id=$this->db->insert_id();
			return $category_id;
		}

		else

		return false;

	}
	public function add_subcategory($data) 
	{
		$res=$this->db->insert('tbl_subcategory',$data);
		if($res)
		{
			$category_id=$this->db->insert_id();
			return $category_id;
		}

		else

		return false;

	}
	
	public function category_record_count($per_page,$page)

	{
		$this->db->where('tbl_category.status','active');
		$this->db->select('category_id');

		$res=$this->db->get('tbl_category');
		if($per_page!=""){
		$this->db->limit($per_page,$page);
		}
		return $tsr=$res->num_rows();

	}
	public function subcategory_record_count($per_page,$page)

	{

		$this->db->select('tbl_subcategory.*,tbl_category.category_name');
		$this->db->from('tbl_subcategory');
		$this->db->join('tbl_category','tbl_subcategory.category_id=tbl_category.category_id');
		$res=$this->db->get();

		if($per_page!=""){
		$this->db->limit($per_page,$page);
		}
		return $tsr=$res->num_rows();

	}
	public function getSingleProductTypeInfo($banner_id,$qury)
	{

		$this->db->select('*');

		$this->db->where('type_id',$banner_id);

		$query=$this->db->get("tbl_product_type");

		if($qury==1)

		{

			return $query->row_array();

		}

		else

		{

			return $query->num_rows();

		}		

	}
	public function getSingleCategoryInfo($banner_id,$qury)
	{

		$this->db->select('*');

		$this->db->where('category_id',$banner_id);

		$query=$this->db->get("tbl_category");

		if($qury==1)

		{

			return $query->result_array();

		}

		else

		{

			return $query->num_rows();

		}		

	}
	public function getSingleSubCategoryInfo($banner_id,$qury)
	{
		$this->db->select('*');
		$this->db->where('subcategory_id',$banner_id);
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
	
	public function deleteBanner($banner_id)

	{

		$this->db->set('status','delete');

		$this->db->where('category_id',$banner_id);

		$res=$this->db->update('tbl_category');

		if($res)

		{

			return true;

		}

		else

		return false;

	}
	public function deleteImage($banner_id)
	{


		$this->db->where('image_id',$banner_id);

		$res=$this->db->delete('tbl_product_images');

		if($res)

		{

			return true;

		}

		else

		return false;

	}
	public function deleteSubcategory($banner_id)
	{

		$this->db->set('status','delete');

		$this->db->where('subcategory_id',$banner_id);

		$res=$this->db->update('tbl_subcategory');

		if($res)

		{

			return true;

		}

		else

		return false;

	}
	
	public function deleteProductType($banner_id)
	{

		$this->db->set('status','delete');

		$this->db->where('type_id',$banner_id);

		$res=$this->db->update('tbl_product_type');

		if($res)

		{

			return true;

		}

		else

		return false;

	}

	
	public function getAllProductType($qty,$per_page,$page)
	{
		//$this->db->where('status','active');
		$this->db->select('*');

		$this->db->order_by('type_id','DESC');

		if($per_page!=""){
			
		$this->db->limit($per_page,$page);
		}
		$res=$this->db->get('tbl_product_type');

		if($qty==1)
			return $res->result_array();
		else
			return $res->num_rows();

	}

	public function getAllCategory($category_name,$status,$qty,$per_page,$page)
	{
		//$this->db->where('tbl_category.status','active');

		if($category_name!="" && $category_name!='Na')
		{ 
			$category_name = str_replace('_', ' ', $category_name);
			$this->db->like('tbl_category.category_name', $category_name);
		}

		if($status!="" && $status!='Na')
		{
			$this->db->where('tbl_category.status',  $status);
		}

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
	public function getAllSubCategory($cuisine_title,$cuisine_status,$main_cat_id,$qty,$per_page,$page)
	{
		if($cuisine_title!="" && $cuisine_title!='Na')
		{ 
			$cuisine_title = str_replace('_', ' ', $cuisine_title);
			$this->db->like('tbl_subcategory.subcategory_name', $cuisine_title, "both");
		}

		if($cuisine_status!="" && $cuisine_status!='Na')
		{
			$this->db->where('tbl_subcategory.status',  $cuisine_status);
		}
		if($main_cat_id!="" && $main_cat_id!='Na')
		{
			$this->db->where('tbl_subcategory.category_id',  $main_cat_id);
		}
		$this->db->select('tbl_subcategory.*,tbl_category.category_name');
		$this->db->from('tbl_subcategory');
		$this->db->join('tbl_category','tbl_subcategory.category_id=tbl_category.category_id');

		$this->db->order_by('subcategory_id','DESC');

		
		if($per_page!=""){
		$this->db->limit($per_page,$page);
		}
		$res=$this->db->get();
		if($qty==1)
			return $res->result_array();
		else
			return $res->num_rows();
	}


	public function upt_productType($input_data,$banner_id) 
	{
		$this->db->where('type_id',$banner_id);
		$res=$this->db->update('tbl_product_type',$input_data);
		if($res)
		{
			return true;
		}
		else
		return false;

	}
	public function upt_category($input_data,$banner_id) 
	{
		$this->db->where('category_id',$banner_id);
		$res=$this->db->update('tbl_category',$input_data);
		if($res)
		{
			return true;
		}
		else
		return false;

	}
	public function upt_subcategory($input_data,$banner_id) 
	{
		$this->db->where('subcategory_id',$banner_id);
		$res=$this->db->update('tbl_subcategory',$input_data);
		if($res)
		{
			return true;
		}
		else
		return false;

	}
	public function categoryReportRecord($cuisine_title,$cuisine_status,$per_page,$page,$qry)
	{

		

		if($cuisine_title!="" && $cuisine_title!="Na")
		{
			$this->db->like('tbl_category.category_name',$cuisine_title);

		}

		if($cuisine_status!="" && $cuisine_status!="Na")
		{
			$this->db->where('tbl_category.status',$cuisine_status);

		}

		


		$this->db->select('tbl_category.*');

		$this->db->order_by('category_id','DESC');



		if($per_page!=""){

		$this->db->limit($per_page,$page);

		}

		$res=$this->db->get('tbl_category');

		//$qry=mysql_set_charset( $res, 'utf8');

		if($qry==0)

		{

				return $tsr=$res->num_rows();

		}

		else

		{

				return $tsr=$res->result_array();

		}

		



	}
	public function subcategoryReportRecord($cuisine_title,$cuisine_status,$main_cat_id,$per_page,$page,$qry)
	{

		

		if($cuisine_title!="" && $cuisine_title!="Na")
		{
			$this->db->like('tbl_subcategory.subcategory_name',$cuisine_title);

		}

		if($cuisine_status!="" && $cuisine_status!="Na")
		{
			$this->db->where('tbl_subcategory.status',$cuisine_status);

		}

		if($main_cat_id!="" && $main_cat_id!="Na")
		{
			$this->db->where('tbl_subcategory.category_id',$main_cat_id);

		}

		


		$this->db->select('tbl_subcategory.*,tbl_category.category_name');
		$this->db->join('tbl_category','tbl_subcategory.category_id=tbl_category.category_id');
		$this->db->order_by('subcategory_id','DESC');



		if($per_page!=""){

		$this->db->limit($per_page,$page);

		}

		$res=$this->db->get('tbl_subcategory');

		//$qry=mysql_set_charset( $res, 'utf8');

		if($qry==0)

		{

				return $tsr=$res->num_rows();

		}

		else

		{

				return $tsr=$res->result_array();

		}

		



	}

}