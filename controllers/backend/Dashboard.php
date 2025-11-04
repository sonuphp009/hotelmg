<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model/Dashboard_model');
		$this->load->model('admin_model/Posts_model');
		#	print "in";exit;
		$this->load->library("pagination");	
		if(! $this->session->userdata('logged_in'))
		{
			redirect('backend/login', 'refresh');
		}
	}
	public function index()
	{
		$data['page_title']='Dashboard';
		
		$session_data=$this->session->userdata('logged_in');
		$user_type=$session_data['user_type'];
		
		if($user_type!='')
		{
			$data['user_type']=$user_type;
			$data['posts']=$this->Dashboard_model->numofpost();
			$data['category_num']=$this->Dashboard_model->numofcategori();
			$data['subcategory_num']=$this->Dashboard_model->numofsubcategori();

			$data['completedposts']=$this->Dashboard_model->numofcompletedpost();
			$data['totalemp']=$this->Dashboard_model->numofemployees();
			$data['totalcustomer']=$this->Dashboard_model->numofcustomer();
			$data['completedposts']=$this->Dashboard_model->numofcompletedpost();
			$data['postmaster']=$this->Dashboard_model->get_cutomer_posts("","");
			$data['payment_amount']=$this->Dashboard_model->get_cutomer_posts_payment_count(1);
			
			$this->load->view('header',$data);
			
			$this->load->view('admin_dashboard',$data);
			$this->load->view('javascript',$data);
			
			$this->load->view('footer',$data);
		}
	}
	public function customer_dashboard()
	{
		$data['page_title']='Main Categories';
		
		$session_data=$this->session->userdata('logged_in');
		$user_type=$session_data['user_type'];
		if($user_type!="")
		{
			if($user_type=='customer')
			{
				$data['catmaster']=$this->Dashboard_model->getAllCategory("","");
				$data['postInfo']=$this->Dashboard_model->getAllPosts("","");
				$data['subcatinfo']=$this->Dashboard_model->getAllSubcategoryLast("","");
				//$data['catmaster']=$catmaster=$this->Posts_model->getAllpostByCat("","",$banner_id);

				$this->load->view('front/customer_header',$data);
				
				$this->load->view('front/customer_dashboard',$data);
				$this->load->view('front/front_footer',$data);
				
				//$this->load->view('footer',$data);
			}
		}
		else
		{
			redirect('Welcome');
		}
		
		
	}
	public function addMoney()
	{
		$data['page_title']='Add Money To Wallet';
		
		$session_data=$this->session->userdata('logged_in');
		$user_type=$session_data['user_type'];
		$user_id=base64_decode($this->uri->segment(4));
		
		if($user_type!="")
		{
			if($user_type=='customer')
			{
				$data['customerInfo']=$this->Dashboard_model->getCustomerWallet($user_id);
				$data['user_id']=$user_id;
				$this->load->view('front/customer_header',$data);
				
				$this->load->view('front/wallet',$data);
				$this->load->view('front/front_footer',$data);
				
				//$this->load->view('footer',$data);
			}
		}
		else
		{
			redirect('Welcome');
		}
		
		
	}
	public function editProfile()
	{
		$data['page_title']='Edit Profile';
		
		$session_data=$this->session->userdata('logged_in');
		$user_type=$session_data['user_type'];
		$user_id=base64_decode($this->uri->segment(4));
		
		if($user_type!="")
		{
			if($user_type=='customer')
			{
				$data['customerInfo']=$this->Dashboard_model->getCustomerById($user_id);
				
				$this->load->view('front/customer_header',$data);
				
				$this->load->view('front/editProfile',$data);
				$this->load->view('front/front_footer',$data);
				
				//$this->load->view('footer',$data);
			}
		}
		else
		{
			redirect('Welcome');
		}
		
		
	}
	public function uploadImage()
	{
		$data['page_title']='Upload Documents';
		
		$session_data=$this->session->userdata('logged_in');
		$user_type=$session_data['user_type'];
		$user_id=base64_decode($this->uri->segment(4));
		if($user_type!="")
		{
			$data['customerInfo']=$this->Dashboard_model->getCustomerById($user_id);
			$data['docdetailsInfo']=$this->Dashboard_model->getdocDetailsById($user_id);

			$data['documentInfo']=$this->Dashboard_model->getDocumentMaster();
			if(isset($_POST['btn_upload']))
			{

				
				$imgcnt=$_POST['cntimg'];
				


				
				
				$flag=0;
				for($i=1;$i<=$imgcnt;$i++)
				{
					
					$post_image='';
					
					$doc_id=$_POST['document_id'.$i];
					

					if($_FILES['fld_document'.$i]['size'] == 0)
					{


						$post_image="";
									  		//$this->session->set_flashdata('error',$this->form_validation->error_string());
										//redirect(base_url().'backend/Dashboard/uploadImage/'.base64_encode($user_id));
					}
					else
					{	  
										/*if($i==1)
										{*/
											/*$this->db->where('user_id',$user_id);
											$this->db->where('document_id',$doc_id);
											$this->db->delete('tbl_document_details');*/
											/*} */   
											
											

											$path = $_FILES['fld_document'.$i]['name'];
											
											$ext = pathinfo($path,PATHINFO_EXTENSION);
											
											$target_dir = "asset/user_documnets/";
											$post_image = $target_dir.$path;

											move_uploaded_file($_FILES["fld_document".$i]["tmp_name"], $post_image); 

											

											$chkdoc=$this->Dashboard_model->getdocDetailsByDocId($user_id,$doc_id);
											if(count($chkdoc)>0)
											{
												$input_data=array(
													'user_id'=>$user_id,
													'document_id'=>$doc_id,
													'document_image'=>$post_image
												);

												$this->db->where('tbl_document_details.user_id',$user_id);
												$this->db->where('tbl_document_details.document_id',$doc_id);
												$this->db->update('tbl_document_details',$input_data);
												$flag=1;
											}
											else
											{
												$input_data=array(
													'user_id'=>$user_id,
													'document_id'=>$doc_id,
													'document_image'=>$post_image
												);


												$this->db->insert('tbl_document_details',$input_data);

												$flag=1;
											}

											

										}
										

										
										
										
									}
									
									$banner_idww=$this->db->insert_id();

						//echo ')))';	echo $this->db->last_query();exit;

									if($flag==1)

							{	// echo '///';exit;

						$this->session->set_flashdata('success','Documents updated successfully.');

						redirect(base_url().'backend/Dashboard/uploadImage/'.base64_encode($user_id));	

					}

					else

					{

						$this->session->set_flashdata('error','Error while updating Post.');

						redirect(base_url().'backend/Dashboard/uploadImage/'.base64_encode($user_id));

					}	
					
					
					

				}

				
				$this->load->view('front/customer_header',$data);
				
				$this->load->view('front/image_upload',$data);
				$this->load->view('front/front_footer',$data);	

			}
			else
			{
				redirect('Welcome');
			}
			
			
		}
		public function notificationList()
		{
			$data['page_title']="Manage Notification";
			$user_type=$this->uri->segment(4);
			$cntqry=$this->Dashboard_model->get_notification_all("","",$user_type);

			$data['notimaster']=$this->Dashboard_model->getAllNotification($user_type);
			
			$data['bannercnt']= $config["total_rows"] = count($cntqry);
			$config = array();
			$config["base_url"] = base_url()."Welcome/userList/";
			$config['per_page'] = 10;
			$config["uri_segment"] = 3;
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
			$config["total_rows"] =$data['bannercnt'];
		#echo "<pre>"; print_r($config); exit;
			$this->pagination->initialize($config);
			
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["total_rows"] = $config["total_rows"]; 
			$data["links"] = $this->pagination->create_links();
			
			$data['page']=$page;
			$data['cntusermaster']=$this->Dashboard_model->get_notification_all($config["per_page"],$page,$user_type);
			
			$this->load->view('header',$data);
			$this->load->view('admin/notification',$data);
			$this->load->view('javascript',$data);
			
			$this->load->view('footer',$data);
		}
	// code for manage Banners
		public function completedPosts()
		{
			$data['page_title']='Manage Posts';
			$session_data=$this->session->userdata('logged_in');
			$user_id=$session_data['user_id'];
			
			$data['catcnt']= $config["total_rows"] = $this->Posts_model->posts_interest_completed("","",0,$user_id);
			$config = array();
			$config["base_url"] = base_url('backend/') . "Dashboard/completedPosts/";
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
			$data['postmaster']=$this->Posts_model->posts_interest_completed($config["per_page"],$page,1,$user_id);

			$this->load->view('front/customer_header',$data);
			
			$this->load->view('front/viewCompletedPost',$data);
			$this->load->view('front/front_footer',$data);	
		}
	}

