<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Banner extends CI_Controller {
	public function __construct()
	{ 
		 parent::__construct();
		 $this->load->model('admin_model/Banners_model');
		 $this->load->library("pagination");	
		 if(! $this->session->userdata('logged_in'))
		 {
			redirect('Login', 'refresh');
		 }
	}
	public function mbannersearch()
	{
		#print_r($_REQUEST); exit;
		$category_id=$subcategory_id=$banner_from_date=$banner_to_date='Na';
		
		if(isset($_POST['btn_clear']))
		{
			redirect(base_url().'backend/Banner/manageBanners');
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
			if($_POST['banner_from_date']!="")
			{
				$banner_from_date=trim($_POST['banner_from_date']);
			}
			if($_POST['banner_to_date']!="")
			{
				$banner_to_date=trim($_POST['banner_to_date']);
			}
			redirect(base_url().'backend/Banner/manageBanners/'.$category_id.'/'.$subcategory_id.'/'.$banner_from_date.'/'.$banner_to_date);
		}
		redirect('backend/Banner/manageBanners', 'refresh');		
	}
	// code for manage Banners
	public function manageBanners()
	{
		$data['page_title']='Manage banners';

		$category_id=$subcategory_id=$banner_from_date=$banner_to_date='Na';

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
				$banner_from_date=urldecode($this->uri->segment(6));
			}
		}
		
		if($this->uri->segment(7)!="")
		{
			if($this->uri->segment(7)!="Na")
			{
				$banner_to_date=urldecode($this->uri->segment(7));
			}  
		}

		
		$data['catcnt']= $config["total_rows"] = $this->Banners_model->getAllBanner($category_id,$subcategory_id,$banner_from_date,$banner_to_date,0,"","");
		$data['main_catlist']=$this->Banners_model->getAllCategoryForSub(1,"","");
		$data['main_subcatlist']=$this->Banners_model->getSubCategoryInfo(1);

		$config = array();
        $config["base_url"] = base_url('backend/') . "Banner/manageBanners/".$category_id."/".$subcategory_id."/".$banner_from_date."/".$banner_to_date;
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
		$data['bannermaster']=$this->Banners_model->getAllBanner($category_id,$subcategory_id,$banner_from_date,$banner_to_date,1,$config["per_page"],$page);

		$this->load->view('header',$data);
		$this->load->view('admin/manageBanners',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	public function addBanner()
	{
		$data['page_title']='Add banner';
		$data['catmaster']=$this->Banners_model->getAllCategory("","");

		if(isset($_POST['btn_addbanner']))
		{
			//print_r($_POST);
			if (empty($_FILES['banner_url']['name']))
			{
				    $this->form_validation->set_rules('banner_url', 'Post Image', 'required');
			}
			$this->form_validation->set_rules('category_id','Category','required');
			$this->form_validation->set_rules('subcategory_id','Sub Category','required');
			$this->form_validation->set_rules('banner_title','Banner Title','required');
			$this->form_validation->set_rules('banner_description','Banner Description','required');
			if($this->form_validation->run())
			{
				$category_id=$this->input->post('category_id');
				$subcategory_id=$this->input->post('subcategory_id');
				$banner_title=$this->input->post('banner_title');
				$banner_description=$this->input->post('banner_description');
				$from_date=$this->input->post('from_date');
				$to_date=$this->input->post('to_date');
				
				$txt_pic=$_POST['txt_pic'];

				
						$banner_url='';
						$allowed = array('gif', 'png', 'jpg', 'pdf', 'jpeg', 'jfif');
				
							if($_FILES['banner_url']['size'] == 0)
							{
							  		$banner_url=$txt_pic;
							}
							else
							{	

								$path = $_FILES['banner_url']['name'];
								
							 	$ext = pathinfo($path,PATHINFO_EXTENSION);
								if (in_array($ext, $allowed)) 
								{
									$target_dir = "assets/Banners/";
									$banner_url = $target_dir.$path;
									move_uploaded_file($_FILES["banner_url"]["tmp_name"], $banner_url); 
								}
								else
								{
									$this->session->set_flashdata('error','Upload Only gif, png, jpg, pdf, jpeg file type.');
									redirect(base_url().'backend/Banner/addBanner');
								}

							}

							

					$input_data=array(	
										'category_id'=>$category_id,
										'subcategory_id'=>$subcategory_id,
										'banner_url'=>$banner_url,
										'banner_title'=>$banner_title,
										'banner_description'=>$banner_description,
										'from_date'=>$from_date,
										'to_date'=>$to_date,
										'banner_status'=>"active",
										'date_added'=>date('Y-m-d H:i:s'),
										'date_updated'=>date('Y-m-d H:i:s'));
					
					$banner_id=$this->Banners_model->add_banner($input_data);
					//echo $this->db->last_query();exit;
					if($banner_id>0)
					{
						

						$this->session->set_flashdata('success','banner added successfully.');
						redirect(base_url().'backend/Banner/manageBanners');	
					}
					else
					{
						$this->session->set_flashdata('error','Error while adding banner.');
						redirect(base_url().'backend/Banner/addBanner');
					}
			}
			else
			{
				$this->session->set_flashdata('error',$this->form_validation->error_string());
				redirect(base_url().'backend/Banner/addBanner');
			}
		}
		$this->load->view('header',$data);
		$this->load->view('admin/addBanner',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	public function updateBanner()
	{

		$data['page_title']='Update banner';

		$data['error_msg']='';

		$banner_id=base64_decode($this->uri->segment(4));

		if($banner_id)
		{

			$catInfo=$this->Banners_model->getSingleproductsInfo($banner_id,0);

			if($catInfo>0)

			{

				$data['postInfo']=$this->Banners_model->getSingleproductsInfo($banner_id,1);

				$data['catmaster']=$this->Banners_model->getAllCategory("","");
				$data['subcatmaster']=$this->Banners_model->getAllSubCategory("","");

				if(isset($_POST['btn_updatebanner']))
				{
					if($_POST['txt_pic']=="")
					{
						if (empty($_FILES['banner_url']['name']))
						{
						    $this->form_validation->set_rules('banner_url', 'Banner url', 'required');
						}
					}
					else if (empty($_FILES['banner_url']['name']))
					{
						//$this->form_validation->set_rules('product_image', 'Document', 'required');
					}
					$this->form_validation->set_rules('category_id','Category','required');
					$this->form_validation->set_rules('subcategory_id','Sub Category','required');
					$this->form_validation->set_rules('banner_title','Banner Title','required');
					$this->form_validation->set_rules('banner_description','Banner Description','required');

					if($this->form_validation->run())
					{

						$category_id=$this->input->post('category_id');
						$subcategory_id=$this->input->post('subcategory_id');
						$banner_title=$this->input->post('banner_title');
						$banner_description=$this->input->post('banner_description');
						$from_date=$this->input->post('from_date');
						$to_date=$this->input->post('to_date');
						$banner_status=$this->input->post('banner_status');
						
						$txt_pic=$_POST['txt_pic'];

				
						$banner_url='';
						$allowed = array('gif', 'png', 'jpg', 'pdf', 'jpeg', 'jfif');
				
							if($_FILES['banner_url']['size'] == 0)
							{
							  		$banner_url=$txt_pic;
							}
							else
							{	

								$path = $_FILES['banner_url']['name'];
								
							 	$ext = pathinfo($path,PATHINFO_EXTENSION);
								if (in_array($ext, $allowed)) 
								{
									$target_dir = "assets/Banners/";
									$banner_url = $target_dir.$path;
									move_uploaded_file($_FILES["banner_url"]["tmp_name"], $banner_url); 
								}
								else
								{
									$this->session->set_flashdata('error','Upload Only gif, png, jpg, pdf, jpeg file type.');
									redirect(base_url().'backend/Banner/addBanner');
								}

							}

							

						$input_data=array(	
										'category_id'=>$category_id,
										'subcategory_id'=>$subcategory_id,
										'banner_url'=>$banner_url,
										'banner_title'=>$banner_title,
										'banner_description'=>$banner_description,
										'from_date'=>$from_date,
										'to_date'=>$to_date,
										'banner_status'=>$banner_status,
										'date_added'=>date('Y-m-d H:i:s'),
										'date_updated'=>date('Y-m-d H:i:s'));
													
						//echo print_r($input_data);exit;
							$banner_idww=$this->Banners_model->upt_banner($input_data,$banner_id);

						//echo ')))';	echo $this->db->last_query();exit;

							if($banner_idww)

							{	// echo '///';exit;

								$this->session->set_flashdata('success','banner updated successfully.');

								redirect(base_url().'backend/Banner/manageBanners');	

							}

							else

							{

								$this->session->set_flashdata('error','Error while updating banner.');

								redirect(base_url().'backend/Banner/updateBanner/'.base64_encode($banner_id));

							}	

					}

					else

					{

						$this->session->set_flashdata('error',$this->form_validation->error_string());

						redirect(base_url().'backend/Banner/updateBanner/'.base64_encode($banner_id));

					}

				}

			}

			else

			{

				$data['error_msg']='banner is not found.';

			}

		}

		else

		{

			$this->session->set_flashdata('error','Banner is not found.');

			redirect(base_url().'backend/Banner/updateBanner/'.base64_encode($banner_id));

		}

		$this->load->view('header',$data);
		$this->load->view('admin/updateBanner',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);

	}
	public function deleteBanner()
	{
		$data['error_msg']='';
		$banner_id=base64_decode($this->uri->segment(4));
		if($banner_id)
		{
			$bannerInfo=$data['bannerInfo']=$this->Banners_model->getSingleproductsInfo($banner_id,1);
			if(count($bannerInfo)>0)
			{
				$delbanner=$this->Banners_model->deleteBanner($banner_id);
				if($delbanner>0)
				{
					$this->session->set_flashdata('success','Banner deleted successfully.');
					redirect(base_url().'backend/Banner/manageBanners');	
				}
				else
				{
					$this->session->set_flashdata('error','Error while deleting banner.');
					redirect(base_url().'backend/Banner/manageBanners');
				}
			}
			else
			{
				$data['error_msg']='banner is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','banner is not found.');
			redirect(base_url().'backend/Banner/manageBanners');
		}
	}

}
?>