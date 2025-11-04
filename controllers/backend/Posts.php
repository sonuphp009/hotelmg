<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Posts extends CI_Controller {
	public function __construct()
	{ 
		 parent::__construct();
		 $this->load->model('admin_model/Posts_model');
		 $this->load->library("pagination");	
		 if(! $this->session->userdata('logged_in'))
		 {
			redirect('Login', 'refresh');
		 }
	}
	public function addProductByCsv()
	{
		$data['page_title']='Add product csv';
		if(isset($_POST['btn_addproductcsv']))
		{
			$file = $_FILES['product_csv']['tmp_name'];
			$filetype = $_FILES['product_csv']['type'];
			// echo "<pre>";
			// print_r($_FILES);
			// exit;
			//check file type
			if($filetype=="application/vnd.ms-excel" || $filetype=="text/csv")
			{
				$handle = fopen($file, "r");
				$c = 0;//
				$arrerror=array();
				$arrsuccess=array();
				$cnt=0;
				$flag=0;
  
				$this->load->library('csvimport');
				
				$new_image_name = $_FILES['product_csv']['name'];

				  $config = array(
									'upload_path' => "uploads/csv_import/",
									'allowed_types' => "csv",
									'max_size' => "1000", 
									'file_name' =>$new_image_name
									);

				 $this->load->library('upload', $config);

				 // If upload failed, display error
					        if (!$this->upload->do_upload('product_csv')) 
					        {
					            $data['error'] = $this->upload->display_errors();
					 			 print_r($data);
					 			 exit;
					            //$this->load->view('csvindex', $data);
					        } 
					        else 
					        {
					        	
					            $file_data = $this->upload->data();
					            $file_path =  'uploads/csv_import/'.$file_data['file_name'];
					 	  	
					            if ($this->csvimport->get_array($file_path)) 
					            {
					                $csv_array = $this->csvimport->get_array($file_path);
					                
					               $cnt=0;
					               $cnt1=0;
					               $cnt2=0;
					             
					                foreach ($csv_array as $row) 
					                {
					                	$cnt++;
										/*coding for checking commission*/
										$category= $row['Category'];
										$sub_category= $row['Sub Category'];
										$product_title = $row['Product Tilte'];								
										$product_price =trim($row['Product Price']);
										$mrp_price =$row['MRP Price'];								
										$product_description =$row['Product Descriptio'];
										$product_image =$row['Upload Product Image'];
										
										$refno=$this->Posts_model->chk_productName(trim($product_title));
										if($refno>0)
										{
											$arrerror[]=array('product_title'=>$product_title);
											$flag=1;
										}
										else
										{
												
											if($category!="" && $sub_category!="" && $product_title!="" && $product_price!="" && $product_price!="" && $mrp_price!="" && $product_description!="" && $product_image!="")
											{

												$categorydata=$this->Posts_model->get_categoryIdByName(trim($category));
						 							// echo "<pre>";
											        //  print_r($categorydata);
											        // exit;
												$category_id=0;
												if(isset($categorydata)>0)
												{
													$category_id=$categorydata['category_id'];
												}

												$subCategoryData=$this->Posts_model->getSubCategoryIdByName(trim($sub_category));

												$subcategory_id=0;
												if(isset($subCategoryData)>0)
												{
													$subcategory_id=$subCategoryData['subcategory_id'];
												}
												
												$product_image=str_replace(" ", "_", $product_image);
													$insert_arra=array('category_id'=>$category_id,
																		'subcategory_id'=>$subcategory_id,
																		'product_title'=>$product_title,
																		'product_description'=>$product_description,
																		'product_price'=>$product_price,
																		'mrp_price'=>$mrp_price,
																		'product_image'=>"assets/Products/".$product_image,
																		
																		'status'=>"active",
																		
																		'added_date'=>date('Y-m-d H:i:s'),
																		'update_date'=>date('Y-m-d H:i:s')
																		);
																		
													$item_id=$this->Posts_model->insertProductData($insert_arra);
													
												$flag=0;
													
											}
											else
											{
												$arrerror[]=array('empty_feild'=>"All Feilds Required of Product  ".$item_title." While Import CSV");
												$flag=1;
											}


										}             
				                	}

					                
					                //echo "<pre>"; print_r($insert_data);
					            } 
					           
					        } 
					        // echo "<pre>";
					        //  print_r($arrerror);
					        // exit;
							if($flag==0)
							{
								$data['success']= "sucessfully import data !";
								$this->session->set_flashdata('success','sucessfully import data !');
								redirect(base_url().'backend/Posts/addProductImages');
								
							}
							else
							{
								$data['error']= "while adding the same products -";
								$data['arr_not_importlist']=$arrerror;
								$data['arr_importlist']=$arrerror;
							}
					 		
			}
			else
			{
				$data['error_csv']= "Please upload .CSV file only";
			}
		}
		$this->load->view('header',$data);
		$this->load->view('admin/addPostCSV',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	private function set_upload_options()
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = 'assets/Products/';
	    $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg|tif';
	    $config['max_size']      = '70000';
	    $config['overwrite']     = FALSE;

	    return $config;
	}
	public function IsRemoteFile($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		// don't download content
		curl_setopt($ch, CURLOPT_NOBODY, 1);
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 
		$result = curl_exec($ch);
		curl_close($ch);
		if($result !== FALSE)
		{
			return 'image exists';
		}
		else
		{
			return 'image does not exist';
		}
	}
	public function addProductImages()
	{
		$data['page_title']='Add product';
		if(isset($_POST['btn_addpimages']))
		{

				
					
						$this->load->library('upload');
					    $dataInfo = array();
					    $files = $_FILES;

					    $cpt = count($_FILES['product_images']['name']);

					    $ftype="gif|jpg|png|bmp|jpeg|tif";
					    $ftypeerr=array();
						$upMenuImage='';
						$flag=0;
						$cnt=0;
						 for($i=0; $i<$cpt; $i++)
					    {   
					    	$filetype=$files['product_images']['type'][$i];
					    	//$cnt=$cnt+1;
					    	if($filetype=="image/gif" || $filetype=="image/jpg" || $filetype=="image/png" || $filetype=="image/bmp" || $filetype=="image/jpeg")
							{        
								$fname_upload=$files['product_images']['name'][$i];

								$fname_upload_url=base_url()."assets/Products/".$files['product_images']['name'][$i];

								// $check_img=$this->IsRemoteFile($fname_upload_url);
								// if($check_img=="image exists")
								// {
								// 	$source_url="assets/Products/" . $files['product_images']['name'][$i];
								// 	@unlink($source_url);
								// }

								 $_FILES['product_images']['name']= $files['product_images']['name'][$i];
						        $_FILES['product_images']['type']= $files['product_images']['type'][$i];
						        $_FILES['product_images']['tmp_name']= $files['product_images']['tmp_name'][$i];
						        $_FILES['product_images']['error']= $files['product_images']['error'][$i];
						        $_FILES['product_images']['size']= $files['product_images']['size'][$i];    

						        $this->upload->initialize($this->set_upload_options());
						        $this->upload->do_upload('product_images');
						        $dataInfo[] = $this->upload->data();

									
								

    						   
						        $flag=0;
						    }
						    else
						    {
						    	$ftypeerr[]=$files['product_images']['name'][$i];
						    	$flag=1;
						    }
					    }
					    
					    if($flag==1)
					    {
					    	$data['filename_error']=$ftype;
					    }
						else
						{
							$data['success']="Images Uploaded !";
						}
						$this->session->set_flashdata('success','Product images uploaded successfully.');
						redirect(base_url("backend/").'Posts/managePosts');
				
		}
		
		$this->load->view('header',$data);
		$this->load->view('admin/addProductCsvImage',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	public function addPost()
	{
		$data['page_title']='Add product';
		$data['catmaster']=$this->Posts_model->getAllCategory("","");

		if(isset($_POST['btn_addproduct']))
		{
			/*echo "<pre>";
			print_r($_FILES['product_image']['name']);
			exit;*/
			if (empty($_FILES['product_image']['name']))
			{
				    $this->form_validation->set_rules('product_image', 'Post Image', 'required');
			}
			$this->form_validation->set_rules('category_id','Category','required');
			$this->form_validation->set_rules('subcategory_id','Sub Category','required');
			$this->form_validation->set_rules('category_id','Post Title','required');
			$this->form_validation->set_rules('product_desc','Post Description','required');
			$this->form_validation->set_rules('product_price','Post Price','required');
			if($this->form_validation->run())
			{
				$category_id=$this->input->post('category_id');
				$subcategory_id=$this->input->post('subcategory_id');
				$category_id=$this->input->post('category_id');
				$product_desc=$this->input->post('product_desc');
				$product_title=$this->input->post('product_title');
				$product_price=$this->input->post('product_price');
				$mrp_price=$this->input->post('mrp_price');
				$product_size=$this->input->post('product_size');
				$product_color=$this->input->post('product_color');
				$select_unit=$this->input->post('select_unit');
				$txt_pic=$_POST['txt_pic'];
				
						$product_image='';
						$allowed = array('gif', 'png', 'jpg', 'pdf', 'jpeg');
											

					$input_data=array(	
										'category_id'=>$category_id,
										'subcategory_id'=>$subcategory_id,
										'category_id'=>$category_id,
										'product_title'=>$product_title,
										'product_size'=>$product_size,
										'product_color'=>$product_color,
										'product_unit'=>$select_unit,
										'product_description'=>$product_desc,
										'product_price'=>$product_price,
										'mrp_price'=>$mrp_price,
										'status'=>"active",
										'added_date'=>date('Y-m-d H:i:s'),
										'update_date'=>date('Y-m-d H:i:s'));
					
					$product_id=$this->Posts_model->add_products($input_data);
					//echo $this->db->last_query();exit;
					if($product_id>0)
					{
						$path3 = $_FILES['video_url']['name'];
							$ext = pathinfo($path3,PATHINFO_EXTENSION);
							
								$target_dir = "assets/product_videos/";

								$filename=rand().$ext;
								$video_url = $target_dir.$filename;
								move_uploaded_file($_FILES["video_url"]["tmp_name"], $video_url); 

								$input_image3=array(	
								'product_id'=>$product_id,
								'image_url'=>$video_url,
								'url_type'=>'video',
								);
			
								$image_id=$this->Posts_model->add_images($input_image3);

							


							if($_FILES['product_image']['size'] == 0)
							{
							  		$product_image=$txt_pic;
							}
							else
							{	

								$path = count($_FILES['product_image']['name']);
								if($path > 0 && isset($_FILES['product_image']['name']))
								{
										for($i=0;$i<$path;$i++)
										{
											$path2 = $_FILES['product_image']['name'][$i];
											$ext = pathinfo($path2,PATHINFO_EXTENSION);
											if (in_array($ext, $allowed)) 
											{
												$target_dir = "assets/Products/";
												$product_image = $target_dir.$path2;
												move_uploaded_file($_FILES["product_image"]["tmp_name"][$i], $product_image); 

												$input_image=array(	
												'product_id'=>$product_id,
												'image_url'=>$product_image,
												'url_type'=>'image',
												);
							
												$image_id=$this->Posts_model->add_images($input_image);

											}
											else
											{
												$this->session->set_flashdata('error','Upload Only gif, png, jpg, pdf, jpeg file type.');
												redirect(base_url().'backend/Posts/addPost');
											}
										}
								}
								$input_update_data=array(	
										
										'product_image'=>$product_image,
										);
					
								$product_id=$this->Posts_model->upt_products($input_update_data,$product_id);
							 	

							}

							
						$this->session->set_flashdata('success','product added successfully.');
						redirect(base_url().'backend/Posts/managePosts');	
					}
					else
					{
						$this->session->set_flashdata('error','Error while adding product.');
						redirect(base_url().'backend/Posts/addPost');
					}
			}
			else
			{
				$this->session->set_flashdata('error',$this->form_validation->error_string());
				redirect(base_url().'backend/Posts/addPost');
			}
		}
		$this->load->view('header',$data);
		$this->load->view('admin/addPost',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	public function msubcatsearch()
	{
		#print_r($_REQUEST); exit;
		$category_id=$subcategory_id=$product_title=$product_status='Na';
		
		if(isset($_POST['btn_clear']))
		{
			redirect(base_url().'backend/Posts/managePosts');
		}

		if(isset($_POST['btn_search']))
		{
			if($_POST['category_id']!="")
			{
				$category_id=trim($_POST['category_id']);
				$category_id = str_replace(' ', '_', $category_id);
			}
			if($_POST['subcategory_id']!="")
			{
				$subcategory_id=trim($_POST['subcategory_id']);
			}
			if($_POST['product_title']!="")
			{
				$product_title=trim($_POST['product_title']);
			}
			if($_POST['product_status']!="")
			{
				$product_status=trim($_POST['product_status']);
			}
			redirect(base_url().'backend/Posts/managePosts/'.$category_id.'/'.$subcategory_id.'/'.$product_title.'/'.$product_status);
		}
		redirect('backend/Posts/managePosts', 'refresh');		
	}
	// code for manage Banners
	public function managePosts()
	{
		$data['page_title']='Manage product';

		$category_id=$subcategory_id=$product_title=$product_status='Na';

		if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$category_id=urldecode($this->uri->segment(4));
			}
		}
		
		if($this->uri->segment(5)!="")
		{
			if($this->uri->segment(5)!="Na")
			{
				$subcategory_id=urldecode($this->uri->segment(5));
			}  
		}

		if($this->uri->segment(6)!='')
		{
			if($this->uri->segment(6)!="Na")
			{
				$product_title=urldecode($this->uri->segment(6));
			}
		}
		
		if($this->uri->segment(7)!="")
		{
			if($this->uri->segment(7)!="Na")
			{
				$product_status=urldecode($this->uri->segment(7));
			}  
		}

		
		$data['catcnt']= $config["total_rows"] = $this->Posts_model->getAllproduct($category_id,$subcategory_id,$product_title,$product_status,0,"","");
		$data['main_catlist']=$this->Posts_model->getAllCategoryForSub(1,"","");
		$data['main_subcatlist']=$this->Posts_model->getSubCategoryInfo(1);

		$config = array();
        $config["base_url"] = base_url('backend/') . "Posts/managePosts/".$category_id."/".$subcategory_id."/".$product_title."/".$product_status;
		$config['per_page'] = 10;
		$config["uri_segment"] = 8;
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
				
		$page = ($this->uri->segment(8)) ? $this->uri->segment(8) : 0;
		$data["total_rows"] = $config["total_rows"]; 
		$data["links"] = $this->pagination->create_links();
		$data['page']=$page;
		$data['catmaster']=$this->Posts_model->getAllproduct($category_id,$subcategory_id,$product_title,$product_status,1,$config["per_page"],$page);

		$this->load->view('header',$data);
		$this->load->view('admin/managePosts',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}

	// code for manage Banners
	public function managePostsInterest()
	{
		$data['page_title']='Manage product';
		 $session_data=$this->session->userdata('logged_in');
    	$user_id=$session_data['user_id'];
		
		$data['catcnt']= $config["total_rows"] = $this->Posts_model->product_interest_record_count("","",0,$user_id);
		$config = array();
        $config["base_url"] = base_url('backend/') . "Posts/managePostsInterest/";
		$config['per_page'] = 10;
		$config["uri_segment"] = 4;
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
				
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data["total_rows"] = $config["total_rows"]; 
		$data["links"] = $this->pagination->create_links();
		$data['page']=$page;
		$data['postmaster']=$this->Posts_model->product_interest_record_count($config["per_page"],$page,1,$user_id);

		$this->load->view('header',$data);
		$this->load->view('admin/managePostInterest',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	public function getSubcategory()
	{
		$category_id=$_POST['category_id'];
		$getsb=$this->Posts_model->getsubcatbycategory($category_id);
		$output="";
		if(count($getsb)>0)
		{
			$output.='<option value="">-Select-</option>';
			foreach ($getsb as $key) 
			{
				$output.='<option value="'.$key['subcategory_id'].'">'.$key['subcategory_name'].'</option>';
			}
		}
		echo $output;
	}
	// code for update Banner

	public function updateProduct()
	{

		$data['page_title']='Update product';

		$data['error_msg']='';

		$banner_id=base64_decode($this->uri->segment(4));

		if($banner_id)

		{

			$catInfo=$this->Posts_model->getSingleproductsInfo($banner_id,0);

			if($catInfo>0)

			{

				$data['postInfo']=$this->Posts_model->getSingleproductsInfo($banner_id,1);

				$data['catmaster']=$this->Posts_model->getAllCategory("","");
				$data['subcatmaster']=$this->Posts_model->getAllSubCategory("","");

				if(isset($_POST['btn_updateposts']))

				{
					if($_POST['txt_pic']=="")
					{
						if (empty($_FILES['product_image']['name']))
						{
						    $this->form_validation->set_rules('product_image', 'Document', 'required');
						}
					}
					else if (empty($_FILES['product_image']['name']))
					{
						//$this->form_validation->set_rules('product_image', 'Document', 'required');
					}
					//$this->form_validation->set_rules('product_image','Image','required');
					$this->form_validation->set_rules('category_id','Category','required');
					$this->form_validation->set_rules('product_title','Product Title','required');
					$this->form_validation->set_rules('product_desc','Product Description','required');
					$this->form_validation->set_rules('product_price','Product Price','required');

					if($this->form_validation->run())
					{

						$category_id=$this->input->post('category_id');
						$subcategory_id=$this->input->post('subcategory_id');
						$category_id=$this->input->post('category_id');
						$product_title=$this->input->post('product_title');
						$product_desc=$this->input->post('product_desc');
						$product_price=$this->input->post('product_price');
						$mrp_price=$this->input->post('mrp_price');
						$product_size=$this->input->post('product_size');
						$product_color=$this->input->post('product_color');
						$select_unit=$this->input->post('select_unit');
						$product_status=$this->input->post('product_status');
						$txt_pic=$_POST['txt_pic'];
						
							$product_image='';
						$allowed = array('gif', 'png', 'jpg', 'pdf', 'jpeg');
				
	
							if($_FILES['product_image']['size'] == 0)
							{
							  		$product_image=$txt_pic;
							}
							else
							{	

								$path = count($_FILES['product_image']['name']);


								
								for($i=0;$i<$path;$i++)
								{
									if($_FILES['product_image']['name'][$i]!="")
									{
										$path2 = $_FILES['product_image']['name'][$i];
										$ext = pathinfo($path2,PATHINFO_EXTENSION);
										if (in_array($ext, $allowed)) 
										{
											$target_dir = "assets/Products/";
											$product_image = $target_dir.$path2;
											move_uploaded_file($_FILES["product_image"]["tmp_name"][$i], $product_image); 

											$input_image=array(	
											'product_id'=>$banner_id,
											'image_url'=>$product_image,
											);
						
											$image_id=$this->Posts_model->add_images($input_image);

										}
										else
										{
											$this->session->set_flashdata('error','Upload Only gif, png, jpg, pdf, jpeg file type.');
											redirect(base_url().'backend/Posts/updateProduct/'.base64_encode($banner_id));
										}
									}
								}

								
								
							 	

							}

							$path3 ="";
							if(isset($_FILES['video_url']['name']))
							{
								$this->db->where('product_id',$banner_id);
								$this->db->where('url_type',"video");
								$this->db->delete('tbl_product_images');

								$path3 = $_FILES['video_url']['name'];
								$ext = pathinfo($path3,PATHINFO_EXTENSION);
							
								$target_dir = "assets/product_videos/";

								$filename=rand().$ext;
								$video_url = $target_dir.$filename;
								move_uploaded_file($_FILES["video_url"]["tmp_name"], $video_url); 

								$input_image3=array(	
								'product_id'=>$banner_id,
								'image_url'=>$video_url,
								'url_type'=>'video',
								);
			
								$image_id=$this->Posts_model->add_images($input_image3);
							}
							

							$banner_idww="";
							
							if($product_image!="")
							{
								$input_data=array(	
										'category_id'=>$category_id,
										'subcategory_id'=>$subcategory_id,
										'category_id'=>$category_id,
										'product_image'=>$product_image,
										'product_size'=>$product_size,
										'product_color'=>$product_color,
										'product_unit'=>$select_unit,
										'product_title'=>$product_title,
										'product_description'=>$product_desc,
										'product_price'=>$product_price,
										'mrp_price'=>$mrp_price,
										'status'=>$product_status,
										'update_date'=>date('Y-m-d H:i:s'));
													
									//echo print_r($input_data);exit;
									$banner_idww=$this->Posts_model->upt_products($input_data,$banner_id);
							}
							else
							{
									$input_data=array(	
										'category_id'=>$category_id,
										'subcategory_id'=>$subcategory_id,
										'category_id'=>$category_id,
										'product_size'=>$product_size,
										'product_color'=>$product_color,
										'product_unit'=>$select_unit,
										'product_title'=>$product_title,
										'product_description'=>$product_desc,
										'product_price'=>$product_price,
										'mrp_price'=>$mrp_price,
										'status'=>$product_status,
										'update_date'=>date('Y-m-d H:i:s'));
													
									//echo print_r($input_data);exit;
									$banner_idww=$this->Posts_model->upt_products($input_data,$banner_id);
							}
						

						//echo ')))';	echo $this->db->last_query();exit;

							if($banner_idww)

							{	// echo '///';exit;

								$this->session->set_flashdata('success','product updated successfully.');

								redirect(base_url().'backend/Posts/managePosts');	

							}

							else

							{

								$this->session->set_flashdata('error','Error while updating Post.');

								redirect(base_url().'backend/Posts/updateProduct/'.base64_encode($banner_id));

							}	

					}

					else

					{

						$this->session->set_flashdata('error',$this->form_validation->error_string());

						redirect(base_url().'backend/Posts/updateProduct/'.base64_encode($banner_id));

					}

				}

			}

			else

			{

				$data['error_msg']='product is not found.';

			}

		}

		else

		{

			$this->session->set_flashdata('error','Post is not found.');

			redirect(base_url().'backend/Posts/updatePosts/'.base64_encode($banner_id));

		}

		$this->load->view('header',$data);
		$this->load->view('admin/updatePost',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);

	}
	public function manageProductDetails()
	{

		$data['page_title']='Manage Product Details';

		$data['error_msg']='';

		$banner_id=base64_decode($this->uri->segment(4));


		if($banner_id)

		{
			$data['postInfo']=$this->Posts_model->getSingleproductsInfo($banner_id,1);
			$data['type_info']=$this->Posts_model->getAllproductType(1);

			
		}

		else

		{

			$this->session->set_flashdata('error','Product is not found.');

			redirect(base_url().'backend/Posts/manageProductDetails/'.base64_encode($banner_id));

		}

		$this->load->view('header',$data);
		$this->load->view('admin/manageProductDetails',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);

	}
	
	public function deleteProduct()
	{
		$data['error_msg']='';
		$banner_id=base64_decode($this->uri->segment(4));
		if($banner_id)
		{
			$bannerInfo=$data['bannerInfo']=$this->Posts_model->getSingleproductsInfo($banner_id,1);
			if(count($bannerInfo)>0)
			{
				$delbanner=$this->Posts_model->deleteBanner($banner_id);
				if($delbanner>0)
				{
					$this->session->set_flashdata('success','product deleted successfully.');
					redirect(base_url().'backend/Posts/managePosts');	
				}
				else
				{
					$this->session->set_flashdata('error','Error while deleting product.');
					redirect(base_url().'backend/Posts/managePosts');
				}
			}
			else
			{
				$data['error_msg']='product is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','product is not found.');
			redirect(base_url().'backend/Posts/managePosts');
		}
	}
	public function addPostToCustomer()
	{
		$data['page_title']='product';
		
		$session_data=$this->session->userdata('logged_in');
		$user_type=$session_data['user_type'];
		$customer_id=$session_data['user_id'];

		if($user_type!="")
		{
			if($user_type=='customer')
			{
				$product_id=base64_decode($this->uri->segment(4));
				$subcat_id=base64_decode($this->uri->segment(5));
				if($product_id)
				{
					
					$data['catmasterpost']=$postmaster=$this->Posts_model->getAllpostByPost($product_id);

					$data['postuser']=$postuser=$this->Posts_model->getpostByUserid($customer_id,$product_id);
					$data['subcatinfo']=$this->Posts_model->getAllSubcategoryLastByCategory("","",$postmaster['category_id']);
						if(isset($_POST['btn_interest']))
						{
							
							$mon=$this->Posts_model->getPostPrice($product_id);
							if(count($mon)>0)
							{
							

								$walletmpn=$this->Posts_model->getWalletMoney($customer_id);

								if($walletmpn['wallet_money'] > $mon['product_price'])
								{

									$input_data=array('product_id'=>$product_id,'customer_id'=>$customer_id,'category_id'=>$postmaster['category_id'],'subcategory_id'=>$postmaster['subcategory_id'],'product_price'=>$mon['product_price'],'added_date'=>date('Y-m-d H:i:s'));
									
									$product_id=$this->Posts_model->add_product_details($input_data);
									//echo $this->db->last_query();exit;
									if($product_id>0)
									{
										$userdata=$this->Posts_model->getUserInfoById($customer_id);

										$ntitle="New Post added";
										$ndesc="New post added by ".$userdata[0]['name'];
										$notitype="admin";

										$input_data_noti=array(
																'noti_title'=>$ntitle,
																'noti_desc'=>$ndesc,
																'noti_type'=>$notitype,
																'noti_type_id'=>$product_id,
																'noti_from'=>$userdata[0]['name'],
																'status'=>"unread",
																//'added_date'=>date('Y-m-d H:i:s')
															);

										$this->Posts_model->add_noti_details($input_data_noti);


										//$ntitle="New Post added";
										//$ndesc="New post added by ".$userdata[0]['name'];
										$notitype2="user";

										$input_data_noti2=array(
																'noti_title'=>$ntitle,
																'noti_desc'=>$ndesc,
																'noti_type'=>$notitype2,
																'noti_type_id'=>$product_id,
																'noti_from'=>$userdata[0]['name'],
																'status'=>"unread",
																//'added_date'=>date('Y-m-d H:i:s')
															);

										$this->Posts_model->add_noti_details($input_data_noti2);

										$this->session->set_flashdata('success','product submited successfully.');
										redirect(base_url().'backend/Dashboard/customer_dashboard/');	
									}
									else
									{
										$this->session->set_flashdata('error','Error while adding banner.');
										redirect(base_url().'backend/Posts/addPostToCustomer/'.base64_encode($product_id));
									}
								}
								else
								{
									$this->session->set_flashdata('error','Waallet amount is less than post price, please add wallet money');
										redirect(base_url().'backend/Posts/addPostToCustomer/'.base64_encode($product_id));
								}
							}
						}
						
						$this->load->view('front/customer_header',$data);
						
						$this->load->view('front/add_customer_new',$data);
						
						$this->load->view('front/front_footer',$data);
				}
			}
		}
		else
		{
			redirect('Welcome');
		}
		
		
	}
	public function getPostByCategiry()
	{
		$data['page_title']='Add product';
		
		$session_data=$this->session->userdata('logged_in');
		$user_type=$session_data['user_type'];
		$user_id=$session_data['user_id'];
		if($user_type!="")
		{
			if($user_type=='customer')
			{
				$banner_id=base64_decode($this->uri->segment(4));
				if($banner_id)
				{
						$data['postInfo']=$catmaster=$this->Posts_model->getAllpostByCat("","",$banner_id);
						$data['catmaster']=$this->Posts_model->getAllCategory("","");
						$data['subcatinfo']=$this->Posts_model->getAllSubcategoryLastByCategory("","",$banner_id);
						$data['user_id']=$user_id;
						//$postdetail=$this->Posts_model->chkpostdetails($catmaster['product_id'],"",$banner_id);
						
						$this->load->view('front/customer_header',$data);
				
						$this->load->view('front/postByCategory',$data);
						$this->load->view('front/front_footer',$data);
				}
			}
		}
		else
		{
			redirect('Welcome');
		}
		
		
	}
	public function getPostBySubCategiry()
	{
		$data['page_title']='Add product';
		
		$session_data=$this->session->userdata('logged_in');
		$user_type=$session_data['user_type'];
		$user_id=$session_data['user_id'];
		if($user_type!="")
		{
			if($user_type=='customer')
			{
				$banner_id=base64_decode($this->uri->segment(4));
				$cat_id=base64_decode($this->uri->segment(5));
				if($banner_id)
				{
						$data['postInfo']=$catmaster=$this->Posts_model->getAllpostBySubCat("","",$banner_id);
						$data['catmaster']=$this->Posts_model->getAllCategory("","");
						$data['subcatinfo']=$this->Posts_model->getAllSubcategoryLastByCategory("","",$cat_id);
						$data['user_id']=$user_id;
						//$postdetail=$this->Posts_model->chkpostdetails($catmaster['product_id'],"",$banner_id);
						
						$this->load->view('front/customer_header',$data);
				
						$this->load->view('front/customer_dashboard',$data);
						$this->load->view('front/front_footer',$data);
				}
			}
		}
		else
		{
			redirect('Welcome');
		}
		
		
	}
	public function assignPost()
	{
		$data['page_title']='View product Details';
		$product_id=base64_decode($this->uri->segment(4));
		$data['postInfo']=$postInfo=$this->Posts_model->getSingleproductInfo($product_id,1);
		$data['userInfo']=$postInfo=$this->Posts_model->getUserInfo();
		
		$this->load->view('header',$data);
		$this->load->view('admin/assignPost',$data);
		$this->load->view('javascript',$data);
						
		$this->load->view('footer',$data);
	}
	public function assignToEmployee()
	{

		$session_data=$this->session->userdata('logged_in');
	    $user_type=$session_data['user_type'];
	     $user_id=$session_data['user_id'];
	    $full_name="";
	    /*if(isset($session_data['username']))
	    {
	      $full_name=$session_data['username'];
	    }
	    else
	    {*/
	      $full_name=$session_data['full_name'];
	   // }
		
		$data['page_title']='Add Page';
		if(isset($_POST['btn_save_admin']))
		{

			//print_r($_POST);
			$this->form_validation->set_rules('sel_driver','Driver Name','required');
			

			if($this->form_validation->run())
			{
				$driver_id=$this->input->post('sel_driver');
				$txt_product_id=$_POST['txt_product_id'];
				$detail_id=$_POST['detail_id'];
				$tim=date("Y-m-d");

				
				date_default_timezone_set('Asia/Kolkata');
						

					$input_data2=array(
										
										'employee_id'=>$driver_id,
										
									);
					$this->db->where('tbl_product_details.detail_id',$detail_id);
					$this->db->update('tbl_product_details',$input_data2);


					$ntitle="Post Assign";
					$ndesc="New post assign by ".$full_name;
					$notitype="user";

					$input_data_noti=array(
											'noti_title'=>$ntitle,
											'noti_desc'=>$ndesc,
											'noti_type'=>$notitype,
											'noti_type_id'=>$txt_product_id,
											'noti_from'=>$full_name,
											'status'=>"unread",
											//'added_date'=>date('Y-m-d H:i:s')
										);

					$this->Posts_model->add_noti_details($input_data_noti);

					

					$this->session->set_flashdata('success','Task assign successfully.');
						redirect(base_url().'Welcome/productubmitList');	
					
				
				
			}
			else
			{
				$this->session->set_flashdata('error',$this->form_validation->error_string());
				redirect(base_url().'backend/Posts/assignPost/'.base64_encode($txt_product_id));
			}
			
		}
		$this->load->view('header',$data);
		$this->load->view('admin/assignPost',$data);
		$this->load->view('javascript',$data);
						
		$this->load->view('footer',$data);
		
	}
	public function userDocuments()
	{
		$data['page_title']='View Documents';
		$user_id=base64_decode($this->uri->segment(4));
		$product_id=base64_decode($this->uri->segment(5));
		$detail_id=base64_decode($this->uri->segment(6));
		$data['product_id']=$product_id;
		$data['user_id']=$user_id;
		$data['detail_id']=$detail_id;
		$data['userInfo']=$postInfo=$this->Posts_model->getUserInfoById($user_id);
		$data['docdetailsInfo']=$this->Posts_model->getdocDetailsById($user_id);
		$this->load->view('header',$data);
		$this->load->view('admin/viewDocument',$data);
		$this->load->view('javascript',$data);
						
		$this->load->view('footer',$data);
	}
	public function userCompleteDocument()
	{
		$data['page_title']='View Documents';
		$user_id=base64_decode($this->uri->segment(4));
		$product_id=base64_decode($this->uri->segment(5));
		$detail_id=base64_decode($this->uri->segment(6));
		$data['product_id']=$product_id;
		$data['user_id']=$user_id;
		$data['detail_id']=$detail_id;
		$data['userInfo']=$postInfo=$this->Posts_model->getUserInfoById($user_id);
		$data['docdetailsInfo']=$this->Posts_model->getdocDetailsById($user_id);
		$data['postInfo']=$this->Posts_model->getPostDetailsByDetailId($product_id);

		$this->load->view('front/customer_header',$data);
		$this->load->view('admin/viewDocumentCompleted',$data);
		$this->load->view('front/front_footer',$data);
						
		$this->load->view('footer',$data);
	}
	public function completeTask()
	{
		
		$data['page_title']='Complete Task';


		$session_data=$this->session->userdata('logged_in');
	    $user_type=$session_data['user_type'];
	     $user_id=$session_data['user_id'];
	    $full_name="";
	    /*if(isset($session_data['username']))
	    {
	      $full_name=$session_data['username'];
	    }
	    else
	    {*/
	      $full_name=$session_data['full_name'];
	   // }

		if(isset($_POST['btn_complete_task']))
		{
			$user_id=$this->uri->segment(4);
			$product_id=$this->uri->segment(5);
			$detail_id=$this->uri->segment(6);
			//print_r($_POST);
			$product_image='';
				$allowed = array('gif', 'png', 'jpg', 'pdf', 'jpeg');
				
				if($_FILES['product_image']['size'] == 0)
				{
				  		$product_image=$txt_pic;
				}
				else
				{	

					$path = $_FILES['product_image']['name'];
					
				 	$ext = pathinfo($path,PATHINFO_EXTENSION);
					if (in_array($ext, $allowed)) 
					{
						$target_dir = "asset/complete_documents/";
						$product_image = $target_dir.$path;
						move_uploaded_file($_FILES["product_image"]["tmp_name"], $product_image); 

						date_default_timezone_set('Asia/Kolkata');
						
						$mon=$this->Posts_model->getPostPrice($product_id);
						if(count($mon)>0)
						{
							

								$walletmpn=$this->Posts_model->getWalletMoney($user_id);

								if(count($walletmpn)>0)
								{

									$updatemn=$walletmpn['wallet_money']-$mon['product_price'];
									if($updatemn > 0)
									{
										$input_data2=array(
													
													'status'=>"complete",
													'complete_documet'=>$product_image,
													'product_price'=>$mon['product_price'],
													
													
												);
										$this->db->where('tbl_product_details.detail_id',$detail_id);
										$this->db->update('tbl_product_details',$input_data2);


										$input_data4=array(
														
														'wallet_money'=>$updatemn,
														
													);
										$this->db->where('tbl_wallet.user_id',$user_id);
										$this->db->update('tbl_wallet',$input_data4);

										$ntitle="Post Completed";
											$ndesc="Post assign by ".$full_name;
											$notitype="customer";

											$input_data_noti=array(
																	'noti_title'=>$ntitle,
																	'noti_desc'=>$ndesc,
																	'noti_type'=>$notitype,
																	'noti_type_id'=>$detail_id,
																	'noti_from'=>$full_name,
																	'status'=>"unread",
																	//'added_date'=>date('Y-m-d H:i:s')
																);

											$this->Posts_model->add_noti_details($input_data_noti);
											
											$this->session->set_flashdata('success','Task completed successfully.');

											redirect(base_url().'backend/Posts/managePostsInterest');
									}
									else
									{
										$this->session->set_flashdata('error','Wallet Amount Less Than Post Price Please Add Amount To Wallet.');

											redirect(base_url().'backend/Posts/managePostsInterest');
									}
									
								}

						}
			
					}
					else
					{
						$this->session->set_flashdata('error','Upload Only gif, png, jpg, pdf, jpeg file type.');
						redirect(base_url().'backend/Posts/managePostsInterest');
					}

				}
				
					
		}
		
		
	}
	public function addQrCode()
	{
		$data['page_title']='Add QR';
		$data['admin_qr']=$postInfo=$this->Posts_model->getadminqr();
		if(isset($_POST['btn_addqr']))
		{
			//print_r($_POST);
			if (empty($_FILES['qr_image']['name']))
			{
				    $this->form_validation->set_rules('qr_image', 'QR', 'required');
			}

				
				$photo_imagename='';
				if(isset($_FILES['qr_image']))
					{

						if($_FILES['qr_image']['name']!="")
						{
							$photo_imagename='';
							$new_image_name = rand(1, 99999).$_FILES['qr_image']['name'];
							$config = array(
									'upload_path' => "asset/clinic_logo/",
									'allowed_types' => "gif|jpg|png|bmp|jpeg",
									'max_size' => "0", 
									'file_name' =>$new_image_name
									);
							$this->load->library('upload', $config);
							if($this->upload->do_upload('qr_image'))
							{ 
								$imageDetailArray = $this->upload->data();								
								$photo_imagename =  $imageDetailArray['file_name'];
							}
							else
							{
								//echo $this->upload->display_errors();
							}
							if($_FILES['qr_image']['error']==0)
							{ 
								$category_image=$photo_imagename;
							}
						}
						$input_data3=array('qr_image'=>$photo_imagename);
						$this->db->where('tbl_user_master.user_type','admin');
						$category_id=$this->db->update('tbl_user_master',$input_data3);
						//echo $this->db->last_query();exit;
						if($category_id)
						{
							$this->session->set_flashdata('success','QR added successfully.');
							redirect(base_url().'backend/Posts/addQrCode');	
						}
						else
						{
							$this->session->set_flashdata('error','Error while adding qr.');
							redirect(base_url().'backend/Posts/addQrCode');
						}
					}
					else
					{
						$this->session->set_flashdata('error',$this->form_validation->error_string());
						redirect(base_url().'backend/Posts/addQrCode');
					}
			
			
		}
		$this->load->view('header',$data);
		$this->load->view('admin/addQr',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}

	public function deletePImage($imageid)
	{
		$data['error_msg']='';
		$banner_id=base64_decode($imageid);
		if($banner_id)
		{
			$bannerInfo=$data['bannerInfo']=$this->Posts_model->getSingleproductsImage($banner_id,1);
			if(count($bannerInfo)>0)
			{
				$delbanner=$this->Posts_model->deleteImage($banner_id);
				if($delbanner>0)
				{
					$this->session->set_flashdata('success','Image deleted successfully.');
					redirect(base_url().'backend/Posts/updateProduct/'.base64_encode($bannerInfo['product_id']));	
				}
				else
				{
					$this->session->set_flashdata('error','Error while deleting image.');
					redirect(base_url().'backend/Posts/updateProduct/'.base64_encode($bannerInfo['product_id']));
				}
			}
			else
			{
				$data['error_msg']='Image is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','Image is not found.');
			redirect(base_url().'backend/Posts/managePosts');
		}
	}
	public function gePostsReport()
	{

		$data['page_title']='Products Report';
		$category_id=$this->uri->segment(4);
		$subcategory_id=$this->uri->segment(5);
		$product_title=$this->uri->segment(6);
		$product_status=$this->uri->segment(7);

		$session_data=$this->session->userdata('logged_in');

		$product_title=str_replace('_',' ',$product_title);
			$product_status=str_replace('_',' ',$product_status);

		/*print_r($this->db->last_query());
		exit;*/
		$data['catmaster']=$resReport = $this->Posts_model->postReportRecord($product_title,$product_status,$category_id,$subcategory_id,"","",1);

		
		$this->load->view('header',$data);
		$this->load->view('admin/getProductReport',$data);
		$this->load->view('javascript',$data);

		$this->load->view('footer',$data);
	}

	public function addTypeToProduct()
	{
		
		$product_id=$_POST['product_id'];
		$type_id=$_POST['type_id'];
			
		$chktype=$this->Posts_model->getCheckProductType($product_id,$type_id,0);
			
		if($chktype>0)
		{

		}		
		else
		{
			$input_data=array('product_id'=>$product_id,'type_id'=>$type_id,'added_date'=>date('Y-m-d H:i:s'));

			$category_id=$this->Posts_model->add_producttypetotable($input_data);
					//echo $this->db->last_query();exit;
		}	

		$chktype2=$this->Posts_model->getCheckProductTypeByPId($product_id,1);

		$output='';

		if(count($chktype2)>0)
		{
			foreach ($chktype2 as $value) 
			{
				$output.='<tr>
								<td>'.$value['type'].'</td>
								<td><a onclick="getDeleteTypeDetails('.$value['type_detail_id'].')"><i class="fa fa-trash"></i></a></td>
							</tr>';
			}
		}
		
		echo $output;

			
	}
	public function deleteTypeToTable()
	{
		$data['error_msg']='';
		$banner_id=$_POST['detail_id'];

		$bannerInfo=$data['bannerInfo']=$this->Posts_model->getSingleProductTypeToTable($banner_id,1);

		if(count($bannerInfo)>0)
		{
				$delbanner=$this->Posts_model->deleteProductTypeToTable($banner_id);
					
				$chktype2=$this->Posts_model->getCheckProductTypeByPId($bannerInfo['product_id'],1);

				// if($delbanner>0)
				// {
				// 	$this->session->set_flashdata('success','Product Type deleted successfully.');
				// 	redirect(base_url().'backend/Posts/manageProductDetails/'.base64_encode($bannerInfo['product_id']));	
				// }
				// else
				// {
				// 	$this->session->set_flashdata('error','Error while deleting product type.');
				// 	redirect(base_url().'backend/Posts/manageProductDetails/'.base64_encode($bannerInfo['product_id']));
				// }

				$output='';

				if(count($chktype2)>0)
				{
					foreach ($chktype2 as $value) 
					{
						$output.='<tr>
										<td>'.$value['type'].'</td>
										<td><a onclick="getDeleteTypeDetails('.$value['type_detail_id'].')"><i class="fa fa-trash"></i></a></td>
									</tr>';
					}
				}
				
				echo $output;	
		}
				
		
	}
}