<?php

Class Posts_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor

		parent::__construct();

	}

	//Inserting code for products

	public function add_products($data) 
	{

		$res=$this->db->insert('tbl_product',$data);

		if($res)

		{

			$product_id=$this->db->insert_id();

			return $product_id;

		}

		else

			return false;

	}
	public function add_images($data) 
	{

		$res=$this->db->insert('tbl_product_images',$data);

		if($res)

		{

			$product_id=$this->db->insert_id();

			return $product_id;

		}

		else

			return false;

	}
	public function chk_productName($product_title)
	{
			$this->db->select('product_id');
			$this->db->from('tbl_product');
			$this->db->where('tbl_product.product_title',$product_title);
			$this->db->where('tbl_product.status','active');
			return $this->db->get()->num_rows();	
	}
	public function get_categoryIdByName($category)
	{
			$this->db->select('category_id');
			$this->db->from('tbl_category');
			$this->db->where('tbl_category.category_name',$category);
			$this->db->where('tbl_category.status','active');
			return $this->db->get()->row_array();	
	}
	public function getSubCategoryIdByName($sub_category)
	{
			$this->db->select('subcategory_id');
			$this->db->from('tbl_subcategory');
			$this->db->where('tbl_subcategory.subcategory_name',$sub_category);
			$this->db->where('tbl_subcategory.status','active');
			return $this->db->get()->row_array();	
	}
	public function insertProductData($insert_arra)
	{
		$query=$this->db->insert('tbl_product',$insert_arra);

		if($query)

			return $this->db->insert_id();

		else

			return false;
	}
	public function getSingleproductBasicInfo($product_id)
	{
		$this->db->select('cda_parcel.*,cda_users.fullname,cda_users.profile_id,cda_users.mobilenumber');
		$this->db->where('cda_parcel.parcel_id',$parcel_id);
		$this->db->join('cda_users','cda_users.user_id=cda_parcel.user_id','left');
		$query=$this->db->get("cda_parcel");
		return $query->result_array();			
	}
	public function add_product_details($data) 
	{

		$res=$this->db->insert('tbl_product_details',$data);

		if($res)

		{

			$product_id=$this->db->insert_id();

			return $product_id;

		}

		else

			return false;

	}
	public function add_noti_details($data) 
	{

		$res=$this->db->insert('tbl_notification',$data);

		if($res)

		{

			$product_id=$this->db->insert_id();

			return $product_id;

		}

		else

			return false;

	}
	public function products_record_count($per_page,$page)

	{

		$this->db->select('product_id');

		$res=$this->db->get('tbl_product');
		if($per_page!=""){
			$this->db->limit($per_page,$page);
		}
		return $tsr=$res->num_rows();

	}
	public function getadminqr()
	{
		$this->db->where('user_type',"admin");
		$this->db->select('qr_image');

		$res=$this->db->get('tbl_user_master');
		
		return $tsr=$res->row_array();

	}
	public function getUserInfo()

	{
		$this->db->where('user_type',"user");
		$this->db->select('*');

		$res=$this->db->get('tbl_user_master');
		
		return $tsr=$res->result_array();

	}
	public function getproductDetailsByDetailId($product_id)
	{
		$this->db->where('tbl_product_details.product_id',$product_id);
		$this->db->select('tbl_product_details.*');
		
		$res=$this->db->get('tbl_product_details');
		
		return $res->row_array();

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
		$this->db->select('reg.*');

		$res=$this->db->get('reg');
		
		return $tsr=$res->result_array();

	}
	public function getProductImage($product_id)
	{
		$this->db->where('tbl_product_images.product_id',$product_id);
		$this->db->select('tbl_product_images.*');

		$res=$this->db->get('tbl_product_images');
		
		return $tsr=$res->result_array();

	}
	public function products_interest_record_count($per_page,$page,$qury,$user_id)
	{

		//$this->db->where('tbl_product_details.employee_id',$user_id);
		$this->db->where('tbl_product_details.status',"pending");
		$this->db->select('tbl_product_details.*,tbl_product.product_image,tbl_product.product_title,product_description,tbl_category.category_name,reg.name,address,email');

		$this->db->from('tbl_product_details');
		$this->db->join('tbl_product','tbl_product.product_id=tbl_product_details.product_id','left');
		$this->db->join('tbl_category','tbl_category.category_id=tbl_product_details.category_id','left');
		$this->db->join('reg','reg.rid=tbl_product_details.customer_id','left');
		if($per_page!=""){
			$this->db->limit($per_page,$page);
		}
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
	public function products_interest_completed($per_page,$page,$qury,$user_id)
	{

		$this->db->where('tbl_product_details.customer_id',$user_id);
		$this->db->where('tbl_product_details.status',"complete");
		$this->db->select('tbl_product_details.*,tbl_product.product_image,tbl_product.product_title,product_description,tbl_category.category_name,reg.name,address,email');

		$this->db->from('tbl_product_details');
		$this->db->join('tbl_product','tbl_product.product_id=tbl_product_details.product_id','left');
		$this->db->join('tbl_category','tbl_category.category_id=tbl_product_details.category_id','left');
		$this->db->join('reg','reg.rid=tbl_product_details.customer_id','left');
		if($per_page!=""){
			$this->db->limit($per_page,$page);
		}
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
	public function getSingleproductsInfo($banner_id,$qury)
	{

		$this->db->select('tbl_product.*,tbl_category.category_name,tbl_product_details.detail_id,tbl_product.category_id');
		$this->db->where('tbl_product.product_id',$banner_id);
		$this->db->from("tbl_product");
		$this->db->join('tbl_category','tbl_category.category_id=tbl_product.category_id','left');
		$this->db->join('tbl_product_details','tbl_product_details.product_id=tbl_product.product_id','left');
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
	public function getSingleproductsImage($banner_id,$qury)
	{

		$this->db->select('tbl_product_images.*');
		$this->db->where('tbl_product_images.image_id',$banner_id);
		$this->db->from("tbl_product_images");
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
	public function deleteImage($banner_id)
	{


		$this->db->where('image_id',$banner_id);
		$this->db->where('url_type',"image");

		$res=$this->db->delete('tbl_product_images');

		if($res)

		{

			return true;

		}

		else

		return false;

	}
	public function deleteBanner($banner_id)
	{
		$this->db->set('status','delete');
		$this->db->where('product_id',$banner_id);
		$res=$this->db->update('tbl_product');
		if($res)
		{
			return true;
		}
		else
			return false;

	}
	
	public function updateWallet($wallet_id)
	{
		$this->db->set('status','approved');
		$this->db->where('wallet_id',$wallet_id);
		$res=$this->db->update('tbl_wallet');
		if($res)
		{
			return true;
		}
		else
			return false;

	}

	public function getAllSubcategoryLastByCategory($per_page,$page,$category_id)
	{

		$this->db->where('category_id',$category_id);
		$this->db->select('*');

		$this->db->order_by('subcategory_id','DESC');

		//$this->db->limit($per_page,$page);

		$res=$this->db->get('tbl_subcategory');

		return $res->result_array();

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
	public function getproductPrice($product_id)
	{

		$this->db->select('product_price');

		$this->db->where('product_id',$product_id);

		$res=$this->db->get('tbl_product');
		
		return $res->row_array();

	}
	public function getWalletMoney($user_id)
	{

		$this->db->select('wallet_money');

		$this->db->where('user_id',$user_id);

		$res=$this->db->get('tbl_wallet');
		
		return $res->row_array();

	}
	public function getsubcatbycategory($category_id)
	{
		$this->db->where('category_id',$category_id);
		$this->db->select('*');

		$this->db->order_by('subcategory_id','DESC');

		$res=$this->db->get('tbl_subcategory');
		
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
	public function chkproductdetails($product_id,$user_id,$category_id)
	{
		$this->db->where('product_id',$product_id);
		$this->db->where('customer_id',$user_id);
		$this->db->where('category_id',$category_id);
		$this->db->select('*');

		$res=$this->db->get('tbl_product_details');
		
		return $res->num_rows();

	}
	public function getAllproductByCat($per_page,$page,$category_id)
	{
		$this->db->where('category_id',$category_id);
		$this->db->select('*');

		$this->db->order_by('product_id','DESC');

		if($per_page!=""){
			$this->db->limit($per_page,$page);
		}
		$res=$this->db->get('tbl_product');

		return $res->result_array();

	}
	public function getAllproductBySubCat($per_page,$page,$subcategory_id)
	{
		$this->db->where('subcategory_id',$subcategory_id);
		$this->db->select('*');

		$this->db->order_by('product_id','DESC');

		if($per_page!=""){
			$this->db->limit($per_page,$page);
		}
		$res=$this->db->get('tbl_product');

		return $res->result_array();

	}
	public function getAllproductByproduct($product_id)
	{
		$this->db->where('product_id',$product_id);
		$this->db->select('*');

		$res=$this->db->get('tbl_product');

		return $res->row_array();

	}
	public function getproductByUserid($user_id,$product_id)
	{
		$this->db->where('customer_id',$user_id);
		$this->db->where('product_id',$product_id);
		$this->db->select('*');

		$res=$this->db->get('tbl_product_details');

		return $res->num_rows();

	}
	public function getAllproduct($category_id,$subcategory_id,$product_title,$product_status,$qury,$per_page,$page)
	{

		if($category_id!="" && $category_id!='Na')
		{
			$this->db->where('tbl_product.category_id',  $category_id);
		}
		
		if($subcategory_id!="" && $subcategory_id!='Na')
		{
			$this->db->where('tbl_product.subcategory_id',  $subcategory_id);
		}

		if($product_title!="" && $product_title!='Na')
		{ 
			$product_title = str_replace('_', ' ', $product_title);
			$this->db->like('tbl_product.product_title', $product_title);
		}

		if($product_status!="" && $product_status!='Na')
		{
			$this->db->where('tbl_product.status',  $product_status);
		}


		$this->db->select('tbl_product.*,tbl_category.category_name,tbl_subcategory.subcategory_name');
		$this->db->join('tbl_category','tbl_category.category_id=tbl_product.category_id','left');
		$this->db->join('tbl_subcategory','tbl_subcategory.subcategory_id=tbl_product.subcategory_id','left');

		$this->db->order_by('product_id','DESC');

		if($per_page!=""){
			$this->db->limit($per_page,$page);
		}
		$query=$this->db->get('tbl_product');

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

	
	public function upt_products($input_data,$banner_id) 
	{
		$this->db->where('product_id',$banner_id);
		$res=$this->db->update('tbl_product',$input_data);

		if($res)

		{

			return true;

		}

		else

			return false;

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
	public function postReportRecord($product_title,$product_status,$category_id,$subcategory_id,$per_page,$page,$qury)
	{
		
		if($product_title!="" && $product_title!="Na")
		{
			$this->db->like('tbl_product.product_title',$product_title);

		}

		if($product_status!="" && $product_status!="Na")
		{
			$this->db->where('tbl_product.status',$product_status);

		}

		if($category_id!="" && $category_id!="Na")
		{
			$this->db->where('tbl_product.category_id',$category_id);

		}

		if($subcategory_id!="" && $subcategory_id!="Na")
		{
			$this->db->where('tbl_product.subcategory_id',$subcategory_id);

		}

	// 	$this->db->select('tbl_product.*');
	// 	//$this->db->join('tbl_category','tbl_product.category_id = tbl_category.category_id');
	// 	//$this->db->join('tbl_subcategory','tbl_product.subcategory_id = tbl_subcategory.subcategory_id');
	// 	//$this->db->order_by('product_id','DESC');

		$this->db->select('tbl_product.*,tbl_category.category_name,tbl_subcategory.subcategory_name');
		$this->db->join('tbl_category','tbl_product.category_id = tbl_category.category_id');
		$this->db->join('tbl_subcategory','tbl_product.subcategory_id = tbl_subcategory.subcategory_id');
		$query=$this->db->get("tbl_product");
		if($qury==1)
		{
			return $query->result_array();
		}
		else
		{
			return $query->num_rows();
		}		

	}
	public function deleteProductTypeToTable($banner_id)
	{


		$this->db->where('type_detail_id',$banner_id);

		$res=$this->db->delete('tbl_typewise_products');

		if($res)

		{

			return true;

		}

		else

		return false;

	}
	public function getSingleProductTypeToTable($banner_id,$qury)
	{

		$this->db->select('*');

		$this->db->where('type_detail_id',$banner_id);

		$query=$this->db->get("tbl_typewise_products");

		if($qury==1)

		{

			return $query->row_array();

		}

		else

		{

			return $query->num_rows();

		}		

	}
	public function getAllProductType($qty)
	{
		//$this->db->where('status','active');
		$this->db->select('*');

		$this->db->order_by('type_id','DESC');

		
		$res=$this->db->get('tbl_product_type');

		if($qty==1)
			return $res->result_array();
		else
			return $res->num_rows();

	}

	public function getCheckProductType($product_id,$type_id,$qury)
	{

		$this->db->select('tbl_typewise_products.*,tbl_product_type.type');
		$this->db->where('tbl_typewise_products.product_id',$product_id);
		$this->db->where('tbl_typewise_products.type_id',$type_id);
		$this->db->join('tbl_product_type','tbl_product_type.type_id = tbl_typewise_products.type_id');
		$this->db->from("tbl_typewise_products");
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
	public function getCheckProductTypeByPId($product_id,$qury)
	{

		$this->db->select('tbl_typewise_products.*,tbl_product_type.type');
		$this->db->where('tbl_typewise_products.product_id',$product_id);
		$this->db->join('tbl_product_type','tbl_product_type.type_id = tbl_typewise_products.type_id');
		$this->db->from("tbl_typewise_products");
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
	public function add_producttypetotable($data) 
	{
		$res=$this->db->insert('tbl_typewise_products',$data);
		if($res)
		{
			$category_id=$this->db->insert_id();
			return $category_id;
		}

		else

		return false;

	}

	
	// public function postReportRecord($cuisine_title,$cuisine_status,$category_id,$subcategory_id,$per_page,$page,$qry)
	// {

		

	// 	if($cuisine_title!="" && $cuisine_title!="Na")
	// 	{
	// 		$this->db->like('tbl_product.product_title',$cuisine_title);

	// 	}

	// 	if($cuisine_status!="" && $cuisine_status!="Na")
	// 	{
	// 		$this->db->where('tbl_product.status',$cuisine_status);

	// 	}

	// 	if($category_id!="" && $category_id!="Na")
	// 	{
	// 		$this->db->where('tbl_product.category_id',$category_id);

	// 	}

	// 	if($subcategory_id!="" && $subcategory_id!="Na")
	// 	{
	// 		$this->db->where('tbl_product.subcategory_id',$subcategory_id);

	// 	}

	// 	$this->db->select('tbl_product.*');
	// 	//$this->db->join('tbl_category','tbl_product.category_id = tbl_category.category_id');
	// 	//$this->db->join('tbl_subcategory','tbl_product.subcategory_id = tbl_subcategory.subcategory_id');
	// 	//$this->db->order_by('product_id','DESC');



	// 	if($per_page!=""){

	// 	$this->db->limit($per_page,$page);

	// 	}

	// 	$res=$this->db->get();


	// 	if($qry==0)
	// 	{

	// 			return $tsr=$res->num_rows();

	// 	}

	// 	else

	// 	{

	// 			return $tsr=$res->result_array();

	// 	}

		



	// }
}