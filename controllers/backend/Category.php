<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {
	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('Category_model');
		$this->load->library("pagination");	
		if(! $this->session->userdata('logged_in'))
		{
			redirect('Login', 'refresh');
		}
	}
	public function addProductType()
	{
		$data['page_title']='Add Product Type';
		
		if(isset($_POST['btn_addproducttype']))
		{
			
			//$this->form_validation->set_rules('category_image','Image','required');
			$this->form_validation->set_rules('product_type','Product Type','required');
			if($this->form_validation->run())
			{
				$product_type=$this->input->post('product_type');
				
				
				
				$input_data=array('type'=>$product_type,'status'=>"active",'added_date'=>date('Y-m-d H:i:s'));

				$category_id=$this->Category_model->add_producttype($input_data);
					//echo $this->db->last_query();exit;
				if($category_id>0)
				{
					$this->session->set_flashdata('success','Product type added successfully.');
					redirect(base_url().'backend/Category/manageProductType');	
				}
				else
				{
					$this->session->set_flashdata('error','Error while adding product type.');
					redirect(base_url().'backend/Category/addProductType');
				}
			}
			else
			{
				$this->session->set_flashdata('error',$this->form_validation->error_string());
				redirect(base_url().'backend/Category/addProductType');
			}
		}
		$this->load->view('header',$data);
		$this->load->view('admin/addProductType',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	public function addCategory()
	{
		$data['page_title']='Add Category';
		
		if(isset($_POST['btn_addcategory']))
		{
			//print_r($_POST);
			if (empty($_FILES['category_image']['name']))
			{
				$this->form_validation->set_rules('category_image', 'Category Image', 'required');
			}
			//$this->form_validation->set_rules('category_image','Image','required');
			$this->form_validation->set_rules('category_name','Category Name','required');
			if($this->form_validation->run())
			{
				$category_name=$this->input->post('category_name');
				
				
				$category_image='';
				if(isset($_FILES['category_image']))
				{
					if($_FILES['category_image']['name']!="")
					{
						$photo_imagename='';
						$new_image_name = rand(1, 99999).$_FILES['category_image']['name'];
						$config = array(
							'upload_path' => "assets/category/",
							'allowed_types' => "gif|jpg|png|bmp|jpeg",
							'max_size' => "0", 
							'file_name' =>$new_image_name
						);
						$this->load->library('upload', $config);
						if($this->upload->do_upload('category_image'))
						{ 
							$imageDetailArray = $this->upload->data();								
							$photo_imagename =  $imageDetailArray['file_name'];
						}
						else
						{
								//echo $this->upload->display_errors();
						}
						if($_FILES['category_image']['error']==0)
						{ 
							$category_image=$photo_imagename;
						}
					}
				}
				$input_data=array('category_name'=>$category_name,'category_image'=>$category_image,'status'=>"active",'added_date'=>date('Y-m-d H:i:s'));

				$category_id=$this->Category_model->add_category($input_data);
					//echo $this->db->last_query();exit;
				if($category_id>0)
				{
					$this->session->set_flashdata('success','Category added successfully.');
					redirect(base_url().'backend/Category/manageCategory');	
				}
				else
				{
					$this->session->set_flashdata('error','Error while adding banner.');
					redirect(base_url().'backend/Category/addCategory');
				}
			}
			else
			{
				$this->session->set_flashdata('error',$this->form_validation->error_string());
				redirect(base_url().'backend/Category/addCategory');
			}
		}
		$this->load->view('header',$data);
		$this->load->view('admin/addCategory',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	public function addSubCategory()
	{
		$data['page_title']='Add Sub Category';
		$data['category_info']=$this->Category_model->getAllCategoryForSub(1,"","");
		if(isset($_POST['btn_addsubcategory']))
		{
			
			//$this->form_validation->set_rules('category_image','Image','required');
			$this->form_validation->set_rules('category_id','Category','required');
			$this->form_validation->set_rules('subcategory_name','Sub Category Name ','required');
			if($this->form_validation->run())
			{
				$category_id=$this->input->post('category_id');
				$subcategory_name=$this->input->post('subcategory_name');

				$category_image='';
				if(isset($_FILES['category_image']))
				{
					if($_FILES['category_image']['name']!="")
					{
						$photo_imagename='';
						$new_image_name = rand(1, 99999).$_FILES['category_image']['name'];
						$config = array(
							'upload_path' => "assets/subcategory/",
							'allowed_types' => "gif|jpg|png|bmp|jpeg",
							'max_size' => "0", 
							'file_name' =>$new_image_name
						);
						$this->load->library('upload', $config);
						if($this->upload->do_upload('category_image'))
						{ 
							$imageDetailArray = $this->upload->data();								
							$photo_imagename =  $imageDetailArray['file_name'];
						}
						else
						{
								//echo $this->upload->display_errors();
						}
						if($_FILES['category_image']['error']==0)
						{ 
							$category_image=$photo_imagename;
						}
					}
				}

				$input_data=array('category_id'=>$category_id,'subcat_image'=>$category_image,'subcategory_name'=>$subcategory_name,'status'=>"active",'added_date'=>date('Y-m-d H:i:s'));

				$category_id=$this->Category_model->add_subcategory($input_data);
					//echo $this->db->last_query();exit;
				if($category_id>0)
				{
					$this->session->set_flashdata('success','Sub Category added successfully.');
					redirect(base_url().'backend/Category/manageSubCategory');	
				}
				else
				{
					$this->session->set_flashdata('error','Error while adding banner.');
					redirect(base_url().'backend/Category/addSubCategory');
				}
			}
			else
			{
				$this->session->set_flashdata('error',$this->form_validation->error_string());
				redirect(base_url().'backend/Category/addSubCategory');
			}
		}
		$this->load->view('header',$data);
		$this->load->view('admin/addSubCategory',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	// category search
	public function mcuisinesearch()
	{
		#print_r($_REQUEST); exit;
		$cuisine_title=$cuisine_status=$main_cat_id='Na';
		
		if(isset($_POST['btn_clear']))
		{
			redirect(base_url().'backend/Category/manageCategory');
		}

		if(isset($_POST['btn_search']))
		{
			if($_POST['cuisine_title']!="")
			{
				$cuisine_title=trim($_POST['cuisine_title']);
				$cuisine_title = str_replace(' ', '_', $cuisine_title);
			}
			if($_POST['cuisine_status']!="")
			{
				$cuisine_status=trim($_POST['cuisine_status']);
			}
			
			redirect(base_url().'backend/Category/manageCategory/'.$cuisine_title.'/'.$cuisine_status);
		}
		redirect('backend/Category/manageCategory', 'refresh');		
	}
	
	public function msubcatsearch()
	{
		#print_r($_REQUEST); exit;
		$cuisine_title=$cuisine_status=$main_cat_id='Na';
		
		if(isset($_POST['btn_clear']))
		{
			redirect(base_url().'backend/Category/manageSubCategory');
		}

		if(isset($_POST['btn_search']))
		{
			if($_POST['cuisine_title']!="")
			{
				$cuisine_title=trim($_POST['cuisine_title']);
				$cuisine_title = str_replace(' ', '_', $cuisine_title);
			}
			if($_POST['cuisine_status']!="")
			{
				$cuisine_status=trim($_POST['cuisine_status']);
			}
			if($_POST['main_cat_id']!="")
			{
				$main_cat_id=trim($_POST['main_cat_id']);
			}
			redirect(base_url().'backend/Category/manageSubCategory/'.$cuisine_title.'/'.$cuisine_status.'/'.$main_cat_id);
		}
		redirect('backend/Category/manageSubCategory', 'refresh');		
	}
	// code for manage Banners
	public function manageProductType()
	{
		$data['page_title']='Manage Product Type';
		$cuisine_title=$cuisine_status='Na';

		
		
		$data['catcnt']= $config["total_rows"] = $this->Category_model->getAllProductType(0,"","");

		$config = array();
		$config["base_url"] = base_url('backend/') . "Category/manageProductType/".$cuisine_title."/".$cuisine_status;
		$config['per_page'] = 10;
		$config["uri_segment"] = 6;
		$config['full_tag_open'] = '<ul class="pagination">'; 
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = "<li class='paginate_button  page-item'>";
		$config['first_tag_close'] = "</li>"; 
		$config['prev_tag_open'] =	"<li class='paginate_button  page-item'>"; 
		$config['prev_tag_close'] = "</li>";
		$config['next_tag_open'] = "<li class='paginate_button  page-item'>";
		$config['next_tag_close'] = "</li>"; 
		$config['last_tag_open'] = "<li class='paginate_button  page-item'>"; 
		$config['last_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='paginate_button  page-item active'><a class='page-link active' href=''>"; 
		$config['cur_tag_close'] = "</a></li>";
		$config['num_tag_open'] = "<li class='paginate_button  page-item'>";
		$config['num_tag_close'] = "</li>"; 
		$config['attributes'] =array('class' => 'page-link');
		$config["total_rows"] =$data['catcnt'];
		#echo "<pre>"; print_r($config); exit;
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
		$data["total_rows"] = $config["total_rows"]; 
		$data["links"] = $this->pagination->create_links();
		$data['page']=$page;
		// echo "<pre>";
		// print_r($config["per_page"].",".$page);
		// exit;
		$data['catmaster']=$this->Category_model->getAllProductType(1,$config["per_page"],$page);

		$this->load->view('header',$data);
		$this->load->view('admin/manageProdutType',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	// code for manage Banners
	public function manageCategory()
	{
		$data['page_title']='Manage Category';
		$cuisine_title=$cuisine_status='Na';

		if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$cuisine_title=urldecode($this->uri->segment(4));
			}
		}
		
		if($this->uri->segment(5)!="")
		{
			if($this->uri->segment(5)!="Na")
			{
				$cuisine_status=urldecode($this->uri->segment(5));
			}  
		}
		
		$data['catcnt']= $config["total_rows"] = $this->Category_model->getAllCategory($cuisine_title,$cuisine_status,0,"","");

		$config = array();
		$config["base_url"] = base_url('backend/') . "Category/manageCategory/".$cuisine_title."/".$cuisine_status;
		$config['per_page'] = 10;
		$config["uri_segment"] = 6;
		$config['full_tag_open'] = '<ul class="pagination">'; 
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = "<li class='paginate_button  page-item'>";
		$config['first_tag_close'] = "</li>"; 
		$config['prev_tag_open'] =	"<li class='paginate_button  page-item'>"; 
		$config['prev_tag_close'] = "</li>";
		$config['next_tag_open'] = "<li class='paginate_button  page-item'>";
		$config['next_tag_close'] = "</li>"; 
		$config['last_tag_open'] = "<li class='paginate_button  page-item'>"; 
		$config['last_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='paginate_button  page-item active'><a class='page-link active' href=''>"; 
		$config['cur_tag_close'] = "</a></li>";
		$config['num_tag_open'] = "<li class='paginate_button  page-item'>";
		$config['num_tag_close'] = "</li>"; 
		$config['attributes'] =array('class' => 'page-link');
		$config["total_rows"] =$data['catcnt'];
		#echo "<pre>"; print_r($config); exit;
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
		$data["total_rows"] = $config["total_rows"]; 
		$data["links"] = $this->pagination->create_links();
		$data['page']=$page;
		// echo "<pre>";
		// print_r($config["per_page"].",".$page);
		// exit;
		$data['catmaster']=$this->Category_model->getAllCategory($cuisine_title,$cuisine_status,1,$config["per_page"],$page);

		$this->load->view('header',$data);
		$this->load->view('admin/manageCategory',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	
	// code for manage Banners
	public function manageSubCategory()
	{
		$data['page_title']='Manage Sub Category';
		$cuisine_title=$cuisine_status=$main_cat_id='Na';
		if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$cuisine_title=urldecode($this->uri->segment(4));
			}
		}
		
		if($this->uri->segment(5)!="")
		{
			if($this->uri->segment(5)!="Na")
			{
				$cuisine_status=urldecode($this->uri->segment(5));
			}  
		}
		
		if($this->uri->segment(6)!='')
		{
			if($this->uri->segment(6)!="Na")
			{
				$main_cat_id=urldecode($this->uri->segment(6));
			}
		}

		$data['main_catlist']=$this->Category_model->getAllCategoryForSub(1,"","");

		// print_r($cuisine_title.'/'.$cuisine_status.'/'.$main_cat_id);
		// exit;
		$data['catcnt']= $this->Category_model->getAllSubCategory($cuisine_title,$cuisine_status,$main_cat_id,0,"","");
		$config = array();
		$config["base_url"] = base_url('backend/') . "Category/manageSubCategory/".$cuisine_title.'/'.$cuisine_status.'/'.$main_cat_id;
		$config['per_page'] = 10;
		$config["uri_segment"] =7 ;
		$config['full_tag_open'] = '<ul class="pagination">'; 
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = "<li class='paginate_button  page-item'>";
		$config['first_tag_close'] = "</li>"; 
		$config['prev_tag_open'] =	"<li class='paginate_button  page-item'>"; 
		$config['prev_tag_close'] = "</li>";
		$config['next_tag_open'] = "<li class='paginate_button  page-item'>";
		$config['next_tag_close'] = "</li>"; 
		$config['last_tag_open'] = "<li class='paginate_button  page-item'>"; 
		$config['last_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='paginate_button  page-item active'><a class='page-link active' href=''>"; 
		$config['cur_tag_close'] = "</a></li>";
		$config['num_tag_open'] = "<li class='paginate_button  page-item'>";
		$config['num_tag_close'] = "</li>"; 
		$config['attributes'] =array('class' => 'page-link');
		$config["total_rows"] =$data['catcnt'];
		#echo "<pre>"; print_r($config); exit;
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(7)) ? $this->uri->segment(7) : 0;
		$data["total_rows"] = $config["total_rows"]; 
		$data["links"] = $this->pagination->create_links();
		
		$data['page']=$page;

		$data['catmaster']=$this->Category_model->getAllSubCategory($cuisine_title,$cuisine_status,$main_cat_id,1,$config["per_page"],$page);

		$this->load->view('header',$data);
		$this->load->view('admin/manageSubCategory',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	
	// code for update product type

	public function updateProductType()
	{

		$data['page_title']='Update Category';
		
		$data['error_msg']='';

		$banner_id=base64_decode($this->uri->segment(4));

		if($banner_id)

		{

			$catInfo=$this->Category_model->getSingleProductTypeInfo($banner_id,0);

			if($catInfo>0)

			{

				$data['catInfo']=$this->Category_model->getSingleProductTypeInfo($banner_id,1);

				

				if(isset($_POST['btn_updateProductType']))

				{
					
					
					//$this->form_validation->set_rules('category_image','Image','required');
					$this->form_validation->set_rules('product_type','Product Type','required');
					if($this->form_validation->run())
					{
						$product_type=$this->input->post('product_type');
						$type_status=$this->input->post('type_status');

					


							$input_data=array('type'=>$product_type,'status'=>$type_status,'added_date'=>date('Y-m-d H:i:s'));


					//echo print_r($input_data);exit;
							$banner_idww=$this->Category_model->upt_productType($input_data,$banner_id);

							//echo ')))';	echo $this->db->last_query();exit;

							if($banner_idww)

							{	// echo '///';exit;

								$this->session->set_flashdata('success','Product type updated successfully.');

								redirect(base_url().'backend/Category/manageProductType');	

							}

							else

							{

								$this->session->set_flashdata('error','Error while updating product type.');

								redirect(base_url().'backend/Category/updateProductType/'.base64_encode($banner_id));

							}	

						}

						else

						{

							$this->session->set_flashdata('error',$this->form_validation->error_string());

							redirect(base_url().'backend/Category/updateProductType/'.base64_encode($banner_id));

						}

				}

			}

			else

			{

				$data['error_msg']='Product type is not found.';

			}

		}

		else

		{

			$this->session->set_flashdata('error','Product type is not found.');

			redirect(base_url().'backend/Category/updateProductType/'.base64_encode($banner_id));

		}

		$this->load->view('header',$data);
		$this->load->view('admin/updateProductType',$data);
		$this->load->view('javascript',$data);

		$this->load->view('footer',$data);

	}
	// code for update Banner

	public function updateCategory()
	{

		$data['page_title']='Update Category';
		
		$data['error_msg']='';

		$banner_id=base64_decode($this->uri->segment(4));

		if($banner_id)

		{

			$catInfo=$this->Category_model->getSingleCategoryInfo($banner_id,0);

			if($catInfo>0)

			{

				$data['catInfo']=$this->Category_model->getSingleCategoryInfo($banner_id,1);

				

				if(isset($_POST['btn_updatecategory']))

				{
					
					if($_POST['txt_pic']=="")
					{
						if (empty($_FILES['category_image']['name']))
						{
							$this->form_validation->set_rules('category_image', 'Document', 'required');
						}
					}
					else if (empty($_FILES['category_image']['name']))
					{
						//$this->form_validation->set_rules('category_image', 'Document', 'required');
					}
					//$this->form_validation->set_rules('category_image','Image','required');
					$this->form_validation->set_rules('category_name','Category Name','required');
					if($this->form_validation->run())
					{
						$category_name=$this->input->post('category_name');
						$category_status=$this->input->post('category_status');

						$txt_pic=$_POST['txt_pic'];
						
							//$banner_image='';

							if(isset($_FILES['category_image']))
							{

								if($_FILES['category_image']['name']!="")
								{

									$photo_imagename='';

									$new_image_name = rand(1, 99999).$_FILES['category_image']['name'];

									$config = array(

										'upload_path' => "assets/category/",

										'allowed_types' => "gif|jpg|png|bmp|jpeg",

										'max_size' => "0", 

										'file_name' =>$new_image_name

									);

									$this->load->library('upload', $config);

									if($this->upload->do_upload('category_image'))

									{ 

										$imageDetailArray = $this->upload->data();								

										$photo_imagename =  $imageDetailArray['file_name'];

									}

									else

									{

												//echo $this->upload->display_errors();

									}

									if($_FILES['category_image']['error']==0)

									{ 

										$category_image=$photo_imagename;
												//@unlink('uploads/banners/'.$old_banner_image);
									}

								}
								else
								{
									$category_image=$txt_pic;
								}

							}
							else
							{
								$category_image=$txt_pic;
							}


							$input_data=array('category_name'=>$category_name,'category_image'=>$category_image,'status'=>$category_status,'added_date'=>date('Y-m-d H:i:s'));


					//echo print_r($input_data);exit;
							$banner_idww=$this->Category_model->upt_category($input_data,$banner_id);

							//echo ')))';	echo $this->db->last_query();exit;

							if($banner_idww)

							{	// echo '///';exit;

								$this->session->set_flashdata('success','Category updated successfully.');

								redirect(base_url().'backend/Category/manageCategory');	

							}

							else

							{

								$this->session->set_flashdata('error','Error while updating banner.');

								redirect(base_url().'backend/Category/updateCategory/'.base64_encode($banner_id));

							}	

						}

						else

						{

							$this->session->set_flashdata('error',$this->form_validation->error_string());

							redirect(base_url().'backend/Category/updateCategory/'.base64_encode($banner_id));

						}

				}

			}

			else

			{

				$data['error_msg']='Category is not found.';

			}

		}

		else

		{

			$this->session->set_flashdata('error','Banner is not found.');

			redirect(base_url().'backend/Category/updateCategory/'.base64_encode($banner_id));

		}

		$this->load->view('header',$data);
		$this->load->view('admin/updateCategory',$data);
		$this->load->view('javascript',$data);

		$this->load->view('footer',$data);

	}

public function updateSubCategory()
{
	$data['page_title']='Update Sub Category';
	$data['error_msg']='';
	$banner_id=base64_decode($this->uri->segment(4));
	if($banner_id)
	{
		$catInfo=$this->Category_model->getSingleSubCategoryInfo($banner_id,0);
		if($catInfo>0)
		{
			$data['subcatInfo']=$this->Category_model->getSingleSubCategoryInfo($banner_id,1);
			$data['category_info']=$this->Category_model->getAllCategoryForSub(1,"","");
			if(isset($_POST['btn_updatesubcategory']))
			{

					//$this->form_validation->set_rules('category_image','Image','required');
				$this->form_validation->set_rules('category_id','Category Name','required');
				$this->form_validation->set_rules('subcategory_name','Sub Category Name','required');
				if($this->form_validation->run())
				{
					$category_name=$this->input->post('category_id');
					$subcategory_name=$this->input->post('subcategory_name');
					$subcategory_status=$this->input->post('subcategory_status');
					
					$category_image='';
					if(isset($_FILES['category_image']))
					{
						if($_FILES['category_image']['name']!="")
						{
							$photo_imagename='';
							$new_image_name = rand(1, 99999).$_FILES['category_image']['name'];
							$config = array(
								'upload_path' => "assets/subcategory/",
								'allowed_types' => "gif|jpg|png|bmp|jpeg",
								'max_size' => "0", 
								'file_name' =>$new_image_name
							);
							$this->load->library('upload', $config);
							if($this->upload->do_upload('category_image'))
							{ 
								$imageDetailArray = $this->upload->data();								
								$photo_imagename =  $imageDetailArray['file_name'];
							}
							else
							{
									//echo $this->upload->display_errors();
							}
							if($_FILES['category_image']['error']==0)
							{ 
								$category_image=$photo_imagename;
							}
						}
					}

					$input_data=array('category_id'=>$category_name,'subcategory_name'=>$subcategory_name,'subcat_image'=>$category_image,'status'=>$subcategory_status,'added_date'=>date('Y-m-d H:i:s'));


				//echo print_r($input_data);exit;
					$banner_idww=$this->Category_model->upt_subcategory($input_data,$banner_id);

						//echo ')))';	echo $this->db->last_query();exit;

					if($banner_idww)

							{	// echo '///';exit;

						$this->session->set_flashdata('success','Sub Category updated successfully.');

						redirect(base_url().'backend/Category/manageSubCategory');	

					}

					else

					{

						$this->session->set_flashdata('error','Error while updating banner.');

						redirect(base_url().'backend/Category/updateSubCategory/'.base64_encode($banner_id));

					}	

				}

				else

				{

					$this->session->set_flashdata('error',$this->form_validation->error_string());

					redirect(base_url().'backend/Category/updateSubCategory/'.base64_encode($banner_id));

				}

			}

		}

		else

		{

			$data['error_msg']='Category is not found.';

		}

	}

	else

	{

		$this->session->set_flashdata('error','Banner is not found.');

		redirect(base_url().'backend/Category/updateSubCategory/'.base64_encode($banner_id));

	}

	$this->load->view('header',$data);
	$this->load->view('admin/updateSubCategory',$data);
	$this->load->view('javascript',$data);

	$this->load->view('footer',$data);

}

	public function deleteCategory()
	{
		$data['error_msg']='';
		$banner_id=base64_decode($this->uri->segment(4));
		if($banner_id)
		{
			$bannerInfo=$data['bannerInfo']=$this->Category_model->getSingleCategoryInfo($banner_id,1);
			
			if(count($bannerInfo)>0)
			{
				$delbanner=$this->Category_model->deleteBanner($banner_id);
				if($delbanner>0)
				{
					$this->session->set_flashdata('success','Category deleted successfully.');
					redirect(base_url().'backend/Category/manageCategory');	
				}
				else
				{
					$this->session->set_flashdata('error','Error while deleting Category.');
					redirect(base_url().'backend/Category/manageCategory');
				}
			}
			else
			{
				$data['error_msg']='Category is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','Category is not found.');
			redirect(base_url().'backend/Category/manageCategory');
		}
	}
	public function deleteSubCategory()
	{
		$data['error_msg']='';
		$banner_id=base64_decode($this->uri->segment(4));
		if($banner_id)
		{
			$bannerInfo=$data['bannerInfo']=$this->Category_model->getSingleSubCategoryInfo($banner_id,1);
			
			if(count($bannerInfo)>0)
			{
				$delbanner=$this->Category_model->deleteSubcategory($banner_id);
				if($delbanner>0)
				{
					$this->session->set_flashdata('success','Sub Category deleted successfully.');
					redirect(base_url().'backend/Category/manageSubCategory');	
				}
				else
				{
					$this->session->set_flashdata('error','Error while deleting SUB Category.');
					redirect(base_url().'backend/Category/manageSubCategory');
				}
			}
			else
			{
				$data['error_msg']='Sub Category is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','Sub Category is not found.');
			redirect(base_url().'backend/Category/manageSubCategory');
		}
	}

	public function deleteProductType()
	{
		$data['error_msg']='';
		$banner_id=base64_decode($this->uri->segment(4));
		if($banner_id)
		{
			$bannerInfo=$data['bannerInfo']=$this->Category_model->getSingleProductTypeInfo($banner_id,1);
			
			if(count($bannerInfo)>0)
			{
				$delbanner=$this->Category_model->deleteProductType($banner_id);
				if($delbanner>0)
				{
					$this->session->set_flashdata('success','Product Type deleted successfully.');
					redirect(base_url().'backend/Category/manageProductType');	
				}
				else
				{
					$this->session->set_flashdata('error','Error while deleting product type.');
					redirect(base_url().'backend/Category/manageProductType');
				}
			}
			else
			{
				$data['error_msg']='Product type is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','Product type is not found.');
			redirect(base_url().'backend/Category/manageProductType');
		}
	}

	public function getCategoryReport()
	{

		$data['page_title']='Category Report';
		$cuisine_title=$this->uri->segment(4);
		$cuisine_status=$this->uri->segment(5);

		$session_data=$this->session->userdata('logged_in');

		$cuisine_title=str_replace('_',' ',$cuisine_title);
			$cuisine_status=str_replace('_',' ',$cuisine_status);

		
		$data['catmaster']=$resReport = $this->Category_model->categoryReportRecord($cuisine_title,$cuisine_status,"","",1);


		$this->load->view('header',$data);
		$this->load->view('admin/getCategoryReport',$data);
		$this->load->view('javascript',$data);

		$this->load->view('footer',$data);
	}
	public function getSubCategoryReport()
	{

		$data['page_title']='Sub Category Report';
		$cuisine_title=$this->uri->segment(4);
		$cuisine_status=$this->uri->segment(5);
		$main_cat_id=$this->uri->segment(6);

		$session_data=$this->session->userdata('logged_in');

		$cuisine_title=str_replace('_',' ',$cuisine_title);
			$cuisine_status=str_replace('_',' ',$cuisine_status);

		
		$data['catmaster']=$resReport = $this->Category_model->subcategoryReportRecord($cuisine_title,$cuisine_status,$main_cat_id,"","",1);


		$this->load->view('header',$data);
		$this->load->view('admin/getSubCategoryReport',$data);
		$this->load->view('javascript',$data);

		$this->load->view('footer',$data);
	}
}