<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{ 
		 parent::__construct();
		 $this->load->model('admin_model/User_model');
		 $this->load->model('admin_model/Login_model');
		 $this->load->library("pagination");	
		
	}
	public function index_admin()
	{
		$data['page_title']="Login";

		//$this->load->view('login_header',$data);
		$this->load->view('login_new',$data);
		//$this->load->view('javascript',$data);
		
		//$this->load->view('footer',$data);
	}
	public function about()
	{
		$data['page_title']="About Us";
		// print_r($data);
		// exit;
		$this->load->view('front/header',$data);
		$this->load->view('front/header_nav',$data);

		$this->load->view('front/aboutus',$data);
		
		$this->load->view('front/footer',$data);
		


	}
	public function contactus()
	{
		$data['page_title']="Contact Us";
		
		$this->load->view('front/header',$data);
		$this->load->view('front/header_nav',$data);

		$this->load->view('front/contactus',$data);
		
		$this->load->view('front/footer',$data);
		


	}
	public function index($type="")
	{
		$data['page_title'] = "Home";
		$logged_in = $this->session->userdata('logged_in');

		// Fix type assignment logic
		$type = ($type != 1) ? $type : 1;

		if (!empty($logged_in) && is_array($logged_in) && isset($logged_in['user_id'])) {
		    $data['userData'] = $this->User_model->getUserInfoById($logged_in['user_id'], 0);
		} else {
		    $data['userData'] = null; // or handle it as needed
		}


			$data['catData']=$user_exists=$this->User_model->getAllCategory(1);
			//$data['pTypeData']=$pTypeData=$this->User_model->getAllPTypeData(1,$type);
			$data['pTypeData']=$pTypeData=$this->User_model->getAllProductData(1,$type);
			// echo "<pre>";
			// print_r($pTypeData);
			// exit;
			$data['featureData']=$featureData=$this->User_model->getAllFeaturedData(1,5);
		$data['pType']=$type;
		$this->load->view('front/header',$data);
		//$this->load->view('front/categories',$data);
		$this->load->view('front/header_nav',$data);

		$this->load->view('front/home_new',$data);
		
		$this->load->view('front/footer',$data);
	}

	public function getIndexProductList($type)
	{
		$data['page_title']="Home";
		$logged_in = $this->session->userdata('logged_in');
		//$type=$_POST['id'];
		if($type!=1)
		{
			$type=$type;
		}
		else
		{
			$type=1;
		}
		$data['type']=$type;
		// if(isset($logged_in))
		// {
		// 	$data['userData']=$user_exists=$this->User_model->getUserInfoById($logged_in['user_id'],0);
		// }

			//$data['catData']=$user_exists=$this->User_model->getAllCategory(1);
			//$data['pTypeData']=$pTypeData=$this->User_model->getAllPTypeData(1,$type);
			$data['pTypeData']=$pTypeData=$this->User_model->getAllPCategoryData(1,$type);
			$data['category_list']=$pTypeData=$this->User_model->getAllCategory(1);

		$data['pType']=$type;
		$this->load->view('front/header',$data);
		$this->load->view('front/header_nav',$data);

		$this->load->view('front/category_filter',$data);
		
		$this->load->view('front/footer',$data);
		/*$output='';
		if($pTypeData)
		{
			foreach($pTypeData as $row)
			{
					$output.=' <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="product-details.html">
                                                    <img class="pri-img" src="'.base_url().$row['product_image'].'" alt="product" style="width: 250px;height: 250px;">
                                                    <img class="sec-img" src="'.base_url().$row['product_image'].'" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <div class="product-label '.$row['product_title'].'">
                                                        <span>'.$row['product_title'].'</span>
                                                    </div>
                                                    <div class="product-label discount">
                                                        <span>10%</span>
                                                    </div>
                                                </div>
                                                <div class="button-group">
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                                </div>
                                                <div class="cart-hover">
                                                    <button class="btn btn-cart">add to cart</button>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name"><a href="product-details.html">'.$row['product_title'].'</a></p>
                                                </div>
                                                <ul class="color-categories">
                                                    <li>
                                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-grey" href="#" title="Grey"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-brown" href="#" title="Brown"></a>
                                                    </li>
                                                </ul>
                                                <h6 class="product-name">
                                                    <a href="product-details.html">'.$row['product_description'].'</a>
                                                </h6>
                                                <div class="price-box">
                                                    <span class="price-regular">'.$row['product_price'].'</span>
                                                    <span class="price-old"><del><!-- $70.00 --></del></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->';
			}
		}
		echo $output;*/


	}
	public function getProductByCategory($type)
	{
		$data['page_title']="Home";
		$logged_in = $this->session->userdata('logged_in');
		//$type=$_POST['id'];
		$data['type']=$type;
		if($type!=1)
		{
			$type=$type;
		}
		else
		{
			$type=1;
		}
		// if(isset($logged_in))
		// {
		// 	$data['userData']=$user_exists=$this->User_model->getUserInfoById($logged_in['user_id'],0);
		// }

			//$data['catData']=$user_exists=$this->User_model->getAllCategory(1);
			$pdata=$this->User_model->getAllPByVategory(1,$type,"","");
			$data['category_list']=$pTypeData=$this->User_model->getAllCategory(1);
			$config = array();

        $config["base_url"] = base_url() . "Welcome/getProductByCategory/".$type;
        $data['votercnt']=count($pdata);


		$config['per_page'] = 5;

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

		$config["total_rows"] =$data['votercnt'];

		#echo "<pre>"; print_r($config); exit;

		$this->pagination->initialize($config);

				

		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$data["total_rows"] = $config["total_rows"]; 

		$data["links"] = $this->pagination->create_links();

		$data['page']=$page;

		$data['pTypeData']=$this->User_model->getAllPByVategory(1,$type,$config["per_page"],$page);
		
		

		$data['pType']=$type;
		$this->load->view('front/header',$data);
		$this->load->view('front/header_nav',$data);

		$this->load->view('front/category_filter',$data);
		
		$this->load->view('front/footer',$data);
		/*$output='';
		if($pTypeData)
		{
			foreach($pTypeData as $row)
			{
					$output.=' <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="product-details.html">
                                                    <img class="pri-img" src="'.base_url().$row['product_image'].'" alt="product" style="width: 250px;height: 250px;">
                                                    <img class="sec-img" src="'.base_url().$row['product_image'].'" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <div class="product-label '.$row['product_title'].'">
                                                        <span>'.$row['product_title'].'</span>
                                                    </div>
                                                    <div class="product-label discount">
                                                        <span>10%</span>
                                                    </div>
                                                </div>
                                                <div class="button-group">
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                                </div>
                                                <div class="cart-hover">
                                                    <button class="btn btn-cart">add to cart</button>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name"><a href="product-details.html">'.$row['product_title'].'</a></p>
                                                </div>
                                                <ul class="color-categories">
                                                    <li>
                                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-grey" href="#" title="Grey"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-brown" href="#" title="Brown"></a>
                                                    </li>
                                                </ul>
                                                <h6 class="product-name">
                                                    <a href="product-details.html">'.$row['product_description'].'</a>
                                                </h6>
                                                <div class="price-box">
                                                    <span class="price-regular">'.$row['product_price'].'</span>
                                                    <span class="price-old"><del><!-- $70.00 --></del></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->';
			}
		}
		echo $output;*/


	}
	public function logout_user()
	{
		//session_start();
		
		 session_destroy();
			redirect('Welcome/index');
		
		
	}
	public function login()
	{
		$data['page_title']="Login";

		if(isset($_POST['btn_login']))
		{
			
			$this->form_validation->set_rules('username','User Name','required');
			$this->form_validation->set_rules('password','Admin Password','required');
			if($this->form_validation->run()!== FALSE)
			{
				
				$user_type='Admin';
				$username=$this->input->post('username');
				$admin_password=$this->input->post('password');
				$checkout_page=$this->input->post('checkout_page');
				$session_user_id=$this->input->post('session_user_id');

				//echo md5($this->input->post('admin_password'));exit;
				$data = array('username' => $username,'password' =>$admin_password);

				$result1 = $this->Login_model->chk_customer_login($data,0);

				//echo $result1;exit;
				if ($result1>0) 
				{
					$result = $this->Login_model->chk_customer_login($data,1);

					$status="";
					$user_type=$result[0]['user_type'];
					
						$status=$result[0]['active_status'];

					if($status=='active')
					{
						
						if($user_type=='customer')
						{
							$user_id=$result[0]['rid'];
							$session_data = array('rstUser_id' => 0,
													'user_id' => $result[0]['rid'],
													'profile_pic' => $result[0]['profile_pic'],
													'full_name' => $result[0]['name'],
													'username' => $result[0]['email'],
													'mobile_number' => $result[0]['mobileno'],
													'user_type' => 'customer',
													'status'=>$result[0]['active_status']);
						
						
							$this->session->set_userdata('logged_in', $session_data);

							if(isset($checkout_page))
							{
								 $chkproduct=$this->User_model->checkSessionWiseCart($session_user_id);
								
								

								 if(count($chkproduct)>0)
								 {


									$input_image=array(	
													'session_id'=>$user_id,
													'user_id'=>$user_id,
													
												);
								
									$this->db->where('tbl_cart.session_id',$session_user_id);
									$this->db->update('tbl_cart',$input_image);
								 }

								$logged_in = $this->session->userdata('logged_in');
								$session_id ="";

								if($logged_in['user_id']>0)
								{
									redirect('Welcome/shopProduct/'.$logged_in['user_id'], 'refresh');
								}
							}
							else
							{
								redirect('Welcome', 'refresh');

							}
						}
						
					}
					else if($status=='inactive')
					{
						$this->session->set_flashdata('error', 'Inactive User.');
						if(isset($checkout_page))
						{
								$logged_in = $this->session->userdata('logged_in');
								$session_id ="";

								if($logged_in['user_id']>0)
								{

									redirect('Welcome/shopProduct/'.$logged_in['user_id'], 'refresh');
								}
						}
						else
						{
								redirect('Welcome/login', 'refresh');
						}
					}
					else  
					{
						$this->session->set_flashdata('error', 'Record deleted.');
						if(isset($checkout_page))
						{
								$logged_in = $this->session->userdata('logged_in');
								$session_id ="";

								if($logged_in['user_id']>0)
								{
									redirect('Welcome/shopProduct/'.$logged_in['user_id'], 'refresh');
								}
						}
						else
						{
							redirect('Welcome/login', 'refresh');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('error', 'Invalid Username or Password.');
					if(isset($checkout_page))
					{
							$logged_in = $this->session->userdata('logged_in');
								$session_id ="";

								if($logged_in['user_id']>0)
								{
									redirect('Welcome/shopProduct/'.$logged_in['user_id'], 'refresh');
								}
					}
					else
					{
						redirect('Welcome/login', 'refresh');
					}
				}
			}
			else
			{
				$this->session->set_flashdata('error',$this->form_validation->error_string());
				redirect(base_url().'Welcome');
			}
		}

		$this->load->view('front/login_header',$data);
		$this->load->view('front/login',$data);
		
		$this->load->view('front/login_footer',$data);
	}
	public function register()
	{
		$data['page_title']="Login";

		if(isset($_POST['btn_adduser']))
		{

			//$this->form_validation->set_rules('fle_option1','Profile Photo','required');
			$this->form_validation->set_rules('full_name','Full Name','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Mobile Number','required');
			
			
			if($this->form_validation->run())
			{
				$full_name=$this->input->post('full_name');		
						
				$email=$this->input->post('email');	
				$password=$this->input->post('password');		
						

				// check already category exists
				$user_exists=$this->User_model->check_pageName($email,0);
				//echo $this->db->last_query();exit;
				if($user_exists==0)
				{
					// $fle_option1='';
					// if($_FILES['fle_option1']['size'] == 0)
					// {
					//   		$fle_option1=$txt_pic;
					// }
					// else
					// {	         
					// 	$path = $_FILES['fle_option1']['name'];
						
					//  	$ext = pathinfo($path,PATHINFO_EXTENSION);
						
					// 	$target_dir = "asset/user_pic/";
					// 	$fle_option1 = $target_dir.$path;
					// 	move_uploaded_file($_FILES["fle_option1"]["tmp_name"], $fle_option1); 

					// }


					//  $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
				    // $pass = array(); //remember to declare $pass as an array
				    // $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
				    // for ($i = 0; $i < 8; $i++) {
				    //     $n = rand(0, $alphaLength);
				    //     $pass[] = $alphabet[$n];
				    // }
				    // $password=implode($pass); //turn the array into a string
						
						$input_data=array(
							'name'=>$full_name,
							'email'=>$email,
							'password'=>$password,
							'user_type'=>"customer",
							'active_status'=>"active",
						);
						
						$cms_id=$this->User_model->add_User($input_data);
						//echo $this->db->last_query();exit;
						if($cms_id>0)
						{
							$html="Your Username is - ".$email."Password is - ".$password;

			         		
			         		$this->load->library('email');

							$this->email->from('sendmail@wanoway.com', 'Wanoway');
							$this->email->to($email);
							//$this->email->cc('another@another-example.com');
							//$this->email->bcc('them@their-example.com');

							$this->email->subject('Login Authentication');
							$this->email->message($html);

							$this->email->send();

							$this->session->set_flashdata('success','Thank you for registered please login !');
							redirect(base_url().'Welcome/login');
						}
						else
						{
							$this->session->set_flashdata('success','Error while register User');
							redirect(base_url().'Welcome/register');
						}
				}
				else
				{
						$this->session->set_flashdata('error','User already exists.');
							redirect(base_url().'Welcome/register');
				}
			}
			else
			{
					$this->session->set_flashdata('error',$this->form_validation->error_string());
							redirect(base_url().'Welcome/register');
			}
		}

		$this->load->view('front/login_header',$data);
		$this->load->view('front/register',$data);
		
		$this->load->view('front/login_footer',$data);
	}

	public function profile($id)
	{
		$data['page_title']="profile";
		$user_id=base64_decode($id);
		$data['userData']=$user_exists=$this->User_model->getUserInfoById($user_id,0);
		/**/
		if(isset($_POST['btn_updateuser']))
		{

			
				$full_name=$this->input->post('full_name');		
						
				$email=$this->input->post('email');	
				$mobile_number=$this->input->post('mobile_number');		
				$address=$this->input->post('address');		
				$txt_pic=$this->input->post('txt_pic');		
						

				
					$fle_option1='';
					if($_FILES['fle_option1']['size'] == 0)
					{
					  		$fle_option1=$txt_pic;
					}
					else
					{	         
						$path = $_FILES['fle_option1']['name'];
						
					 	$ext = pathinfo($path,PATHINFO_EXTENSION);
						
						$target_dir = "assets/user_pic/";
						$fle_option1 = $target_dir.$path;
						move_uploaded_file($_FILES["fle_option1"]["tmp_name"], $fle_option1); 

					}
					
					
					//  $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
				    // $pass = array(); //remember to declare $pass as an array
				    // $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
				    // for ($i = 0; $i < 8; $i++) {
				    //     $n = rand(0, $alphaLength);
				    //     $pass[] = $alphabet[$n];
				    // }
				    // $password=implode($pass); //turn the array into a string
						
						$input_data=array(
							'name'=>$full_name,
							'email'=>$email,
							'profile_pic'=>$fle_option1,
							'mobileno'=>$mobile_number,
							'address'=>$address,
						);

						$cms_id=$this->User_model->updateUser($input_data,$user_id);
						//echo $this->db->last_query();exit;
						if($cms_id>0)
						{
							
							$this->session->set_flashdata('success','Profile updated successfully !');
							redirect(base_url().'Welcome/profile/'.base64_encode($user_id));
						}
						else
						{
							$this->session->set_flashdata('success','Error while update User');
							redirect(base_url().'Welcome/profile/'.base64_encode($user_id));
						}
				
			
		}

		$this->load->view('front/header',$data);
		$this->load->view('front/header_nav',$data);
		$this->load->view('front/profile',$data);
		
		$this->load->view('front/footer',$data);
	}
	public function getProductDetails($product_id)
	{
		$data['page_title'] = "Home";
		$logged_in = $this->session->userdata('logged_in');
		$product_id = base64_decode($product_id);

		$data['product_id'] = $product_id;

		// Initialize $user_id as null to avoid "undefined variable"
		$user_id = null;

		// Check if logged_in exists and is an array
		if (!empty($logged_in) && is_array($logged_in) && isset($logged_in['user_id'])) {
		    $user_id = $logged_in['user_id'];
		}

		// Assign user_id (will be null if not logged in)
		$data['user_id'] = $user_id;
		// if(isset($logged_in))
		// {
		// 	$data['userData']=$user_exists=$this->User_model->getUserInfoById($logged_in['user_id'],0);
		// }

			//$data['catData']=$user_exists=$this->User_model->getAllCategory(1);
			$data['productData']=$pTypeData=$this->User_model->getAllproductByproduct(1,$product_id);
			$data['wishdata']=$wishdata=$this->User_model->getCheckFavorite($product_id,$user_id);

			$data['pDetails']=$pDetails=$this->User_model->getProductImage($pTypeData['product_id']);
			

		$this->load->view('front/header',$data);
		$this->load->view('front/header_nav',$data);

		$this->load->view('front/product_details',$data);
		
		$this->load->view('front/footer',$data);
		


	}
	public function getAddWishlist($product_id)
	{
		$data['page_title']="Home";
		$logged_in = $this->session->userdata('logged_in');
		//$type=$_POST['id'];
		$product_id=base64_decode($product_id);
		
		$data['product_id']=$product_id;
		$user_id = $logged_in['user_id'];
		
		$input_image=array(	
									'product_id'=>$product_id,
									'user_id'=>$user_id,
									
									'added_date'=>date('Y-m-d H-i'),
								);
				
						
					$this->db->insert('tbl_favorite_products',$input_image);

			redirect('Welcome/getProductDetails/'.base64_encode($product_id));
		


	}
	public function getProductDetailsNoEnc($product_id)
	{
		$data['page_title']="Home";
		$logged_in = $this->session->userdata('logged_in');
		//$type=$_POST['id'];
		$product_id=$product_id;//base64_decode($product_id);
		
		$data['product_id']=$product_id;
		// if(isset($logged_in))
		// {
		// 	$data['userData']=$user_exists=$this->User_model->getUserInfoById($logged_in['user_id'],0);
		// }

			//$data['catData']=$user_exists=$this->User_model->getAllCategory(1);
			$data['productData']=$pTypeData=$this->User_model->getAllproductByproduct(1,$product_id);

			$data['pDetails']=$pDetails=$this->User_model->getProductImage($pTypeData['product_id']);
			

		$this->load->view('front/header',$data);
		$this->load->view('front/header_nav',$data);

		$this->load->view('front/product_details',$data);
		
		$this->load->view('front/footer',$data);
		


	}

	public function getAddProductToCart()
	{
		$data['page_title']="Home";
		$product_id=$_POST['product_id'];
		$product_price=$_POST['product_price'];
		$product_qty=$_POST['product_qty'];
		//$session_id=$_POST['session_id'];
		$session_data=$this->session->userdata('edit_session');

		$logged_in = $this->session->userdata('logged_in');
		$session_id ="";

		if(isset($logged_in['user_id']))
		{
			$session_id = $logged_in['user_id'];

				$session_data2 = array(
										'session_id' => $session_id,
										
									);
							
							
				$this->session->set_userdata('edit_session', $session_data2);

		}
		else
		{
			
			if($session_id!="")
			{
				$session_id = $session_data['session_id'];

			}
			else
			{
				$session_id = session_id();
				$session_data = array(
										'session_id' => $session_id,
										
									);
							
							
				$this->session->set_userdata('edit_session', $session_data);

			}
		}

		if($product_qty > 0)
		{
			 $chkproduct=$this->User_model->checkSessionWiseProduct($session_id,$product_id);
						$timeda=date("Y-m-d");	

				 if($chkproduct>0)
				 {
				 	$sub_total=$product_qty*$product_price;

					$input_image=array(	
									'product_id'=>$product_id,
									'product_price'=>$product_price,
									'product_quantity'=>$product_qty,
									'sub_total'=>$sub_total,
									'session_id'=>$session_id,
									'date_added'=>$timeda,
								);
				
					$this->db->where('tbl_cart.session_id',$session_id);
					$this->db->where('tbl_cart.product_id',$product_id);		
					$this->db->update('tbl_cart',$input_image);
				 }
				 else
				 {
				 	$sub_total=$product_qty*$product_price;

					$input_image=array(	
									'product_id'=>$product_id,
									'product_price'=>$product_price,
									'product_quantity'=>$product_qty,
									'sub_total'=>$sub_total,
									'session_id'=>$session_id,
									'date_added'=>$timeda,
								);
				
							
					$this->db->insert('tbl_cart',$input_image);
				 }

		}
		else
		{
			$this->db->where('product_id',$product_id);
			$this->db->where('session_id',$session_id);
			$this->db->delete('tbl_cart');
		}

				
		

		echo $session_id;
	}

	public function shoppingCart($session_id)
	{
		$data['page_title']="Home";
		$data['session_id']=$session_id;

		//$data['catData']=$user_exists=$this->User_model->getAllCategory(1);
		$data['productData']=$pTypeData=$this->User_model->getAllproductFromCart($session_id);
		$data['cart_count']=count($pTypeData);
		
		$this->load->view('front/header',$data);
		$this->load->view('front/header_nav',$data);

		$this->load->view('front/viewCart',$data);
		
		$this->load->view('front/footer',$data);
		


	}
	public function shopProduct($session_id)
	{
		$data['page_title']="Home";
		

		$data['user_id']=$session_id;
		//$data['catData']=$user_exists=$this->User_model->getAllCategory(1);
		$data['existUser']=$this->User_model->checkSessionInUser($session_id,0);
		$data['productData']=$pTypeData=$this->User_model->getAllproductFromCart($session_id);
		$data['cAddData']=$cAddData=$this->User_model->getAllUserAddresses($session_id);
				$data['cart_count']=count($pTypeData);

		if(count($cAddData)>0)
		{
			foreach($cAddData as $row)
			{
				if($row['is_selected']=="yes")
				{
					$data['address_id']=$row['address_id'];
				}
			}
		}

		$data['chkUser']=$chkUser=$this->User_model->getchkUser($session_id);
		// echo "<pre>";
		// print_r($chkUser);
		// exit;
		$this->load->view('front/header',$data);
		$this->load->view('front/header_nav',$data);

		$this->load->view('front/shop',$data);
		
		$this->load->view('front/footer',$data);

	}
	public function getSelectAddress($address_id,$session_id)
	{
		$data['page_title']="Home";
		
		
		$data['user_id']=$session_id;
		$data['address_id']=$address_id;

		$input_data=array(
							'is_selected'=>'no',
							'updated_date'=>date('Y-m-d H:i:s'),
						);
						
				$this->db->where('user_id',$session_id);
				$this->db->update('tbl_addresses',$input_data);

		$arrset=array('is_selected'=>"yes");
		$this->db->where('address_id',$address_id);
		$this->db->update('tbl_addresses',$arrset);

		//$data['catData']=$user_exists=$this->User_model->getAllCategory(1);
		$data['productData']=$pTypeData=$this->User_model->getAllproductFromCart($session_id);
		$data['cAddData']=$cAddData=$this->User_model->getAllUserAddresses($session_id);
		$data['chkUser']=$chkUser=$this->User_model->getchkUser($session_id);
		
		$this->load->view('front/header',$data);
		$this->load->view('front/header_nav',$data);

		$this->load->view('front/shop',$data);
		
		$this->load->view('front/footer',$data);

	}
	public function getEmailCheck()
	{
		$data['page_title']="Home";
		$email=$_POST['email'];

		//$data['catData']=$user_exists=$this->User_model->getAllCategory(1);
		$pTypeData=$this->User_model->getCheckEmail($email);
		
		echo $pTypeData;
	}
	public function addAddress($user_id)
	{
		$data['page_title']="Home";
		$data['user_id']=$user_id;

		if(isset($_POST['btn_save_address']) && $_POST['btn_save_address']=="save_address")
		{

			

				$first_name=$this->input->post('first_name');		
				$last_name=$this->input->post('last_name');		
				$email=$this->input->post('email');		
				$company_name=$this->input->post('company_name');		
				$country=$this->input->post('country');		
				$street_address1=$this->input->post('street_address1');		
				$street_address2=$this->input->post('street_address2');		
				$city=$this->input->post('city');		
				$state=$this->input->post('state');		
				$postcode=$this->input->post('postcode');		
				$phone=$this->input->post('phone');		
						
				
				$session_user_id=$this->input->post('session_user_id');		

				// print_r($session_user_id);
				// exit;
						
				$input_data=array(
							'is_selected'=>'no',
							'updated_date'=>date('Y-m-d H:i:s'),
						);
						
				$this->db->where('user_id',$session_user_id);
				$this->db->update('tbl_addresses',$input_data);


						$input_data=array(
							'user_id'=>$session_user_id,
							'first_name'=>$first_name,
							'last_name'=>$last_name,
							'email'=>$email,
							'company_name'=>$company_name,
							'country'=>$country,
							'street_address1'=>$street_address1,
							'street_address2'=>$street_address2,
							'city'=>$city,
							'state'=>$state,
							'postcode'=>$postcode,
							'phone'=>$phone,
							'is_selected'=>'yes',
							'added_date'=>date('Y-m-d H:i:s'),
							'status'=>"active",
						);
						
						$address_id=$this->User_model->add_address($input_data);

						$data['address_id']=$address_id;

						$this->session->set_flashdata('success','Address Save successfully !');
						redirect(base_url().'Welcome/shopProduct/'.$session_user_id);	
				
			
		}


		$this->load->view('front/header',$data);
		$this->load->view('front/header_nav',$data);
		$this->load->view('front/addAddress',$data);
		$this->load->view('front/footer',$data);
	}
	public function getDeleteCartproduct()
	{
		$data['page_title']="Home";
		$id=$_POST['id'];
		

		$this->db->where('cart_id',$id);
		$this->db->delete('tbl_cart');
	}
	public function checkoutRegister()
	{
		$data['page_title']="Login";
		
		if($_POST['btn_save_address']=="save_address")
		{

			//$this->form_validation->set_rules('fle_option1','Profile Photo','required');
			// $this->form_validation->set_rules('first_name','First Name','required');
			// $this->form_validation->set_rules('last_name','Last Name','required');
			// $this->form_validation->set_rules('email','Email','required');
			// $this->form_validation->set_rules('user_password','Password/','required');
			
			
			// if($this->form_validation->run())
			// {

				$first_name=$this->input->post('first_name');		
				$last_name=$this->input->post('last_name');		
				$email=$this->input->post('email');		
				$company_name=$this->input->post('company_name');		
				$country=$this->input->post('country');		
				$street_address1=$this->input->post('street_address1');		
				$street_address2=$this->input->post('street_address2');		
				$city=$this->input->post('city');		
				$state=$this->input->post('state');		
				$postcode=$this->input->post('postcode');		
				$phone=$this->input->post('phone');		
						
				$account_chk=$this->input->post('account_chk');	
				$user_password=$this->input->post('user_password');		
				$session_user_id=$this->input->post('session_user_id');		
						

				// check already category exists
				$user_exists=$this->User_model->check_pageName($email,0);
				//echo $this->db->last_query();exit;

				if($user_exists==0)
				{
					// session_destroy();
				    if(isset($account_chk))
					{
						$input_data=array(
							'name'=>$first_name.' '.$last_name,
							'email'=>$email,
							'password'=>$user_password,
							'user_type'=>"customer",
							'active_status'=>"active",
						);
						
						$cms_id=$this->User_model->add_User($input_data);

						$arrcart=array(
											"user_id"=>$cms_id,
											"session_id"=>$cms_id
										);
						$this->db->where('session_id',$session_user_id);
						$this->db->update('tbl_cart',$arrcart);

						$input_data=array(
							'user_id'=>$cms_id,
							'first_name'=>$first_name,
							'last_name'=>$last_name,
							'email'=>$email,
							'company_name'=>$company_name,
							'country'=>$country,
							'street_address1'=>$street_address1,
							'street_address2'=>$street_address2,
							'city'=>$city,
							'state'=>$state,
							'postcode'=>$postcode,
							'phone'=>$phone,
							'is_selected'=>'yes',
							'added_date'=>date('Y-m-d H:i:s'),
							'status'=>"active",
						);
						
						$address_id=$this->User_model->add_address($input_data);


						$session_data = array('rstUser_id' => 0,
												'user_id' => $cms_id,
												'profile_pic' => "",
												'full_name' => $first_name.' '.$last_name,
												'username' => $email,
												'mobile_number' => $phone,
												'user_type' => 'customer',
												'status'=>"active");
					
					
						$this->session->set_userdata('logged_in', $session_data);

						$session_id = $logged_in['user_id'];

						$session_data22 = array(
												'session_id' => $session_id,
												
											);
									
									
						$this->session->set_userdata('edit_session', $session_data22);

						$data['address_id']=$address_id;
						$this->session->set_flashdata('success','Thank you for registered !');
							redirect(base_url().'Welcome/shopProduct/'.$cms_id);
					}
					else
					{
						$input_data=array(
							'user_id'=>$session_user_id,
							'first_name'=>$first_name,
							'last_name'=>$last_name,
							'email'=>$email,
							'company_name'=>$company_name,
							'country'=>$country,
							'street_address1'=>$street_address1,
							'street_address2'=>$street_address2,
							'city'=>$city,
							'state'=>$state,
							'postcode'=>$postcode,
							'phone'=>$phone,
							'is_selected'=>'yes',
							'added_date'=>date('Y-m-d H:i:s'),
							'status'=>"active",
						);
						
						$address_id=$this->User_model->add_address($input_data);

						$data['address_id']=$address_id;

						$arrcart=array(
											"user_id"=>$cms_id
										);
						$this->db->where('session_id',$user_id);
						$this->db->update('tbl_cart',$arrcart);

					}
						
						//echo $this->db->last_query();exit;
						if($cms_id>0)
						{
							$html="Your Username is - ".$email."Password is - ".$user_password;

			         		
			         		$this->load->library('email');

							$this->email->from('sendmail@wanoway.com', 'Wanoway');
							$this->email->to($email);
							//$this->email->cc('another@another-example.com');
							//$this->email->bcc('them@their-example.com');

							$this->email->subject('Login Authentication');
							$this->email->message($html);

							$this->email->send();

							$this->session->set_flashdata('success','Thank you for registered please login !');
							redirect(base_url().'Welcome/shopProduct/'.$session_user_id);
						}
						else
						{
							$this->session->set_flashdata('success','Address added successfully.');
							redirect(base_url().'Welcome/shopProduct/'.$session_user_id);
						}
				// }
				// else
				// {
				// 		$this->session->set_flashdata('error','User already exists.');
				// 			redirect(base_url().'Welcome/shopProduct/'.$session_user_id);
				// }
			}
			else
			{
					$this->session->set_flashdata('error',$this->form_validation->error_string());
							redirect(base_url().'Welcome/shopProduct/'.$session_user_id);
			}
		}

		$this->load->view('front/header',$data);
		$this->load->view('front/header_nav',$data);
		$this->load->view('front/shop',$data);
		$this->load->view('front/footer',$data);
	}
	public function return()
	{
		print_r("ok");
		exit;
	}
	public function notify()
	{
		print_r("ok");
		exit;
	}
	 public function initiatePayment()
    {
        // Set your Cashfree API credentials
        $appId = 'TEST37257292c4643f92a5563eb82a275273';
        $secretKey = 'TEST9743594f51879786c456a2542e18d87d2cb431c3';

        // Set the order details
        $orderId = 'ORDER123';
        $orderAmount = 100.00;
        $orderCurrency = 'INR';
        $customerName = 'John Doe';
        $customerEmail = 'john@example.com';
        $customerPhone = '9876543210';
        $returnUrl = base_url('payment/return');
        $notifyUrl = base_url('payment/notify');

        // Generate the payment URL
        $postData = array(
            'appId' => $appId,
            'orderId' => $orderId,
            'orderAmount' => $orderAmount,
            'orderCurrency' => $orderCurrency,
            'customerName' => $customerName,
            'customerEmail' => $customerEmail,
            'customerPhone' => $customerPhone,
            'returnUrl' => $returnUrl,
            'notifyUrl' => $notifyUrl
        );

        $signature = hash_hmac('sha256', implode('|', $postData), $secretKey);
        $postData['signature'] = $signature;

        $paymentUrl = 'https://test.cashfree.com/billpay/checkout/post/submit';
        $paymentUrl .= '?' . http_build_query($postData);

        redirect($paymentUrl);
    }
    // public function return()
    // {
    //     // Handle the payment response from Cashfree
    //     $orderId = $this->input->get('orderId');
    //     $orderAmount = $this->input->get('orderAmount');
    //     $referenceId = $this->input->get('referenceId');
    //     $txStatus = $this->input->get('txStatus');
    //     $paymentMode = $this->input->get('paymentMode');

    //     // Process the payment response and update your database or perform necessary actions
    // }

    // public function notify()
    // {
    //     // Handle the payment notification from Cashfree
    //     // Verify the payment status using the transaction ID received in the notification
    //     $transactionId = $this->input->post('txnid');

    //     // Make an API call to Cashfree to verify the payment status
    //     // Process the response and update your database or perform necessary actions
    // }
	public function addOrder($user_id)
	{
		$data['page_title']="Home";
		$data['user_id']=$user_id;
		$this->load->library('cashfree_lib');
		if(isset($_POST['place_order']) && $_POST['place_order']=="place_order")
		{

			

				$paymentmethod=$this->input->post('paymentmethod');		
				$ordernote=$this->input->post('ordernote');		
				$address_selected=$this->input->post('address_selected');		
				
				$orderData=$this->User_model->getCartItems($user_id,1);
				$userData=$this->User_model->getUserInfoById($user_id);
				$ordno="";
				// print_r($paymentmethod);
				// exit;
				if($address_selected>0)
				{
					if(count($orderData)>0)
					{
						$total_amount=0;

						foreach($orderData as $row)
						{
							$total_amount+=$row['sub_total'];

						}
						$input_data2=array(
								'user_id'=>$user_id,
								'address_id'=>$address_selected,
								'total_amount'=>$total_amount,
								'order_date'=>date('Y-m-d H:i:s'),
								'order_note'=>$ordernote,
								'order_status'=>'Order Place',
								'payment_status'=>'pending',
								'payment_method'=>$paymentmethod,

								'added_date'=>date('Y-m-d H:i:s'),
							);
							
						$order_id=$this->User_model->add_order($input_data2);
						if($order_id > 0)
						{
							$ordno='ORD-'.$order_id;
							$ordarr=array('order_no'=>$ordno);
							$this->db->where('order_id',$order_id);
							$this->db->update('tbl_item_order',$ordarr);
							
								foreach($orderData as $row)
								{
									$input_data=array(
										'user_id'=>$user_id,
										'order_id'=>$order_id,
										'product_id'=>$row['product_id'],
										'product_quantity'=>$row['product_quantity'],
										'product_price'=>$row['product_price'],
										'sub_total'=>$row['sub_total'],
										
										'added_date'=>date('Y-m-d H:i:s'),
									);
									
									$address_id=$this->User_model->add_order_details($input_data);

								}
							if($paymentmethod=="paypal")
							{
								// $notifyurl=base_url()."Welcome/notify";
								// $returnurl=base_url()."Welcome/return";
								// $orderDetails=array();

								// $orderDetails['notifyUrl']=$notifyurl;
								// $orderDetails['returnUrl']=$returnurl;

								// $orderDetails['customerName']=$userData[0]['name'];
								// $orderDetails['customerEmail']=$userData[0]['email'];
								// $orderDetails['customerPhone']='9021205731';//$userData[0]['mobileno'];


								// $orderDetails['orderId']=$order_id;
								// $orderDetails['orderAmount']=$total_amount;
								// $orderDetails['orderNote']=$ordernote;
								// $orderDetails['orderCurrency']="INR";
								// $orderDetails['orderCurrency']="INR";

								// $orderDetails['appId']="TEST37257292c4643f92a5563eb82a275273";
								// $mode="TEST";
	  							// $orderDetails['secretKey'] = "TEST13cd0bf43e5a4242835e672da842b0b7a1dc5ebb";
	  							// $secretKey = "TEST13cd0bf43e5a4242835e672da842b0b7a1dc5ebb";

								//   //print_r($postData);exit;
								// ksort($orderDetails);
								// $signatureData = "";
								// foreach ($orderDetails as $key => $value){
								//     $signatureData .= $key.$value;
								// }
								// $signature = hash_hmac('sha256', $signatureData, $secretKey,true);
								// $signature = base64_encode($signature);
								// $url="";
								// if ($mode == "PROD") {
								//   $url = "https://www.cashfree.com/checkout/post/submit";
								// } else {
								//   $url = "https://test.cashfree.com/billpay/checkout/post/submit";

								// }
								// $this->load->helper('common_helper');
								 //$orderdata=getOrderData2222();
							
								//$this->initiatePayment();
								//$orderDetails["signature"] = $this->generateSignature($orderDetails);

									//echo json_encode($orderDetails);
								// echo "<pre>";
								// print_r($orderDetails);
								// exit;
															
								// 	echo '<form id="redirectForm" method="post" action="https://test.cashfree.com/billpay/checkout/post/submit">
								  //   <input type="hidden" name="appId" value="'.$orderDetails["appId"].'"/>
								  //   <input type="hidden" name="orderId" value="'.$orderDetails["orderId"].'"/>
								  //   <input type="hidden" name="orderAmount" value="'.$orderDetails["orderAmount"].'"/>
								  //   <input type="hidden" name="orderCurrency" value="'.$orderDetails["orderCurrency"].'"/>
								  //   <input type="hidden" name="orderNote" value="'.$orderDetails["orderNote"].'"/>
								  //   <input type="hidden" name="customerName" value="'.$orderDetails["customerName"].'"/>
								  //   <input type="hidden" name="customerEmail" value="'.$orderDetails["customerEmail"].'"/>
								  //   <input type="hidden" name="customerPhone" value="'.$orderDetails["customerPhone"].'"/>
								  //   <input type="hidden" name="returnUrl" value="'.$orderDetails["returnUrl"].'"/>
								  //   <input type="hidden" name="notifyUrl" value="'.$orderDetails["notifyUrl"].'"/>
								  //   <input type="hidden" name="signature" value="'.$orderDetails["signature"].'"/>
								  // </form>';


								  // echo '<script>document.getElementById("redirectForm").submit();</script>';
							
								$this->db->where('user_id',$user_id);
								$this->db->or_where('session_id',$user_id);
								$this->db->delete('tbl_cart');

								$this->load->view('front/header',$data);
								$this->load->view('front/header_nav',$data);
								$this->load->view('front/payment_checkout',['postData'=>$orderDetails,'signature'=>$signature,'url'=>$url]);
								$this->load->view('front/footer',$data);
							}
							else
							{
								$this->db->where('user_id',$user_id);
								$this->db->or_where('session_id',$user_id);
								$this->db->delete('tbl_cart');
								
								$this->session->set_flashdata('success','Order added successfully !');
								redirect(base_url().'Welcome/thankYou/'.$user_id.'/'.$ordno);
							}
						}
								

					}
					
				}
				else
				{
					$this->session->set_flashdata('error','Select Address Please.');
					redirect(base_url().'Welcome/shopProduct/'.$user_id);
				}
						
					


						
				
			
		}


		// $this->load->view('front/header',$data);
		// $this->load->view('front/header_nav',$data);
		// $this->load->view('front/addAddress',$data);
		// $this->load->view('front/footer',$data);
	}
	public function generateSignature($postData)
	{
	  	$secretKey = "TEST13cd0bf43e5a4242835e672da842b0b7a1dc5ebb";
		 ksort($postData);
		 $signatureData = "";
		 foreach ($postData as $key => $value)
		 {
		      $signatureData .= $key.$value;
		 }
		 $signature = hash_hmac('sha256', $signatureData, $secretKey,true);
		 $signature = base64_encode($signature);
		 return $signature;
	}
	public function thankYou($user_id,$ordno)
	{
		$data['page_title']="Home";
		$data['user_id']=$user_id;
		$data['order_no']=$ordno;

		

		$this->load->view('front/header',$data);
		$this->load->view('front/header_nav',$data);
		$this->load->view('front/thankYou',$data);
		$this->load->view('front/footer',$data);
	}
	// category search
	public function mcuisinesearch()
	{
		#print_r($_REQUEST); exit;
		$order_date='Na';
		
		if(isset($_POST['btn_clear']))
		{
			redirect(base_url().'Welcome/manageOrder/');
		}

		if(isset($_POST['btn_search']))
		{
			if($_POST['order_date']!="")
			{
				$order_date=trim($_POST['order_date']);
			}
			
			
			redirect(base_url().'Welcome/manageOrder/'.$order_date);
		}
		redirect('Welcome/manageOrder/', 'refresh');		
	}

	// code for manage Banners
	public function manageOrder($customer_id)
	{
		$data['page_title']='Manage Order';
		$order_date='Na';
		$data['user_id']=$customer_id;
		if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$order_date=urldecode($this->uri->segment(4));
			}
		}
		
				$data['userData']=$user_exists=$this->User_model->getUserInfoById($customer_id,0);

		
		$data['catcnt']= $config["total_rows"] = $this->User_model->getAllOrder($customer_id,$order_date,0,"","");

		$config = array();
		$config["base_url"] = base_url('') . "Welcome/manageOrder/".$order_date;
		$config['per_page'] = 10;
		$config["uri_segment"] = 5;
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

		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$data["total_rows"] = $config["total_rows"]; 
		$data["links"] = $this->pagination->create_links();
		$data['page']=$page;
		// echo "<pre>";
		// print_r($config["per_page"].",".$page);
		// exit;
		$data['orderData']=$this->User_model->getAllOrder($customer_id,$order_date,1,$config["per_page"],$page);

		$this->load->view('front/header',$data);
		$this->load->view('front/header_nav',$data);
		$this->load->view('front/customer_orders',$data);
		$this->load->view('front/footer',$data);
	}
	public function viewOrderDetails($banner_id)
	{

		$data['page_title']='Manage Order Details';

		$data['error_msg']='';

		$banner_id=base64_decode($banner_id);//base64_decode($this->uri->segment(4));


		if($banner_id)
		{
			$data['orderInfo']=$this->User_model->getSingleOrderInfo($banner_id,1);

		}
		else
		{

			$this->session->set_flashdata('error','Order is not found.');

			redirect(base_url().'Welcome/manageOrder/'.base64_encode($banner_id));

		}

		$this->load->view('front/header',$data);
		$this->load->view('front/header_nav',$data);
		$this->load->view('front/viewOrderDetails',$data);
		$this->load->view('front/footer',$data);

	}
	public function orderInvoice($banner_id)
	{

		$data['page_title']='Manage Order Details';

		$data['error_msg']='';

		$banner_id=base64_decode($banner_id);//base64_decode($this->uri->segment(4));


		if($banner_id)
		{
			$orderInfo=$this->User_model->getSingleOrderInfo($banner_id,1);

			$this->load->view('mpdf/vendor/autoload');
			$mpdf = new \Mpdf\Mpdf(['format' => 'A5']);

			$mpdf->setFooter('{PAGENO}');


			$mpdf->showImageErrors = true;
			$maincnt=0;

			$ht="";
					$ht.='<html lang="en">

						<head>

							<meta charset="utf-8">

							<title></title>

							<style>

								@page {

										margin-left: 15px;

										margin-top: 20px;

										margin-right: 15px;

										margin-bottom: 30px;


										}

								@font-face 

								{

									font-family: Kruti Dev;

									src: url("../../Content/CustomCSS/Kruti Dev 010.ttf") format("truetype")

								}

								body { font-family: freeserif;}

								#div_photo

								{

									border: 2px solid red;

									border-radius: 5px;

									height:130px;

									width:130px;

								}

								#getp_title

								{

									text-alignLcenter;

								}

								#tb1 

								{

									border: 1px solid black;

									width: 100%;

									border-collapse: collapse;

									padding:10px;

								}

								#tb2 

								{

									border:3px; solid red; 

									border-collapse: collapse; 

									border-color: blue; 

									text-align:left;

								}

								#tb3 

								{

									border:3px; solid red; 

									border-collapse: collapse; 

									border-color: blue; 

									text-align:left;

								}

								#tb4 

								{

									border:3px; solid red; 

									border-collapse: collapse; 

									border-color: blue; 

									text-align:left;

								}



								.rounded 

								{

									border:1mm dashed #220044;

								}
								';
								


						$ht.='	</style>

						';
						
						

					//$this->mpdf->SetDisplayMode('fullpage');

					$ht.='</head>

					<body>';
					$ht.='
                                                   
                                                         
                                                         <table border="0" class="tbl_head" style="border:3px; solid red; border-collapse: collapse; border-color: blue;" width="100%">
                                                         	<tr style="width:100%">
                                                         		<td style="width:70%"></td>
                                                         		<td style="width:30%"><img src="'.base_url().'assets/img/wanoway.jpeg" style="height:120px;width:120px;"></td>
                                                         	</tr>
   														</table>
														
   														 <div class="row card-body">
                                                             <div class="col-sm-8">
                                                             		<h4>To,</h4>
                                                                    <p>'.$orderInfo['name'].',<br/>
                                                                    '.$orderInfo['street_address1'].' '.$orderInfo['street_address2'].',<br/>
                                                                 
                                                                    '.$orderInfo['city'].','.$orderInfo['state'].','.$orderInfo['country'].',<br/>Postcode - '.$orderInfo['postcode'].'</p>,
                                                                </div>  
                                                         </div>

                                                         <table border="0" class="tbl_head" style="border:3px; solid red; border-collapse: collapse; border-color: blue;" width="100%">
                                                         	<tr style="width:100%">
                                                         		<td style="width:50%;text-align:left"><label>Order Date</label> - '.date('d M Y',strtotime($orderInfo['order_date'])).'</td>
                                                         		<td style="width:50%;text-align:right;"><label>Order ID</label> - '.$orderInfo['order_no'].'</td>
                                                         		
                                                         	</tr>
                                                         	<tr style="width:100%">
                                                         		<td style="width:50%;text-align:left;"><label>Order Status</label> - '.$orderInfo['order_status'].'</td>
                                                         		<td style="width:50%;text-align:right"><label>Order Note</label> - '.$orderInfo['order_note'].'</td>
                                                         		
                                                         	</tr>
   														</table><hr/>
                                                                
                                                        
                                                        <div class="row card-body">
                                                            <div class="col-sm-12 form-control">
                                                                <label><b>Order Details</b></label>
                                                            </div>
                                                        </div>
                                                        <hr/>
                                                         <div class="row card-body">
                                                            <div class="col-sm-12 form-control">';
                                                               
                                                        $orderData=$this->User_model->getOrderDetails($orderInfo['order_id'],1);
                                                        
                                                   
                                                                if(count($orderData)>0)
                                                                {

                                                                 
                                                                     $ht.='<table border="1" class="tbl_head" style="border:3px; solid red; border-collapse: collapse; border-color: blue;" width="100%">
                                                                        <thead>
                                                                            <tr style="text-align:center;">
                                                                                <td class="pro-thumbnail" style="text-align:center;" >Thumbnail</td>
                                                                                                                        <td style="text-align:center;"  class="pro-title">Product</td>
                                                                                                                        <td style="text-align:center;"  class="pro-price">Price</td>
                                                                                                                        <td style="text-align:center;"  class="pro-quantity">Quantity</td>
                                                                                                                        <td style="text-align:center;" class="pro-subtotal">Total</td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="searchTable2">';

                                                                      
                                                                                                                            $subtotal=0;
                                                                                                                            $totalamt=0;
                                                                                                                            if(isset($orderData))
                                                                                                                            {
                                                                                                                                $i=0;
                                                                                                                                foreach ($orderData as  $value) 
                                                                                                                                {
                                                                                                                                    $i++;
                                                                                                                                    $subtotal+=$value['sub_total'];

                                                                                                                            $ht.='<tr>
                                                                                                                                <td class="pr
                                                                                                                                o-thumbnail" style="text-align:center;"><a href="#"><img class="img-fluid" src="'.base_url().$value['product_image'].'" alt="Product" style="height: 30px;width: 30px;"/></a></td>
                                                                                                                                <td class="pro-title" style="text-align:center;">'.$value['product_title'].'</td>
                                                                                                                                <td class="pro-price" style="text-align:center;">
                                                                                                                                   
                                                                                                                                    <span>'.$value['product_price'].'</span>
                                                                                                                                </td>
                                                                                                                                <td class="pro-quantity" style="text-align:center;">
                                                                                                                                   '.$value['product_quantity'].'
                                                                                                                                </td>
                                                                                                                                <td class="pro-subtotal" style="text-align:center;"><span>'.round($value['sub_total'],2).'</span></td>
                                                                                                                                
                                                                                                                            </tr>';
                                                                                                                          }
                                                                                                                            $charges=0;
                                                                                                                           $totalamt=$subtotal+$charges;
                                                                                                                        }
                                                                                                                        $ht.=' <tr style="padding:10px;">
                                                                                                                                <td colspan="4" style="text-align:right;"><b>Total</b> &nbsp;</td>
                                                                                                                                <td colspan="" style="text-align:center;">'.round($subtotal,2).'</td>
                                                                                                                         </tr>
                                                                                                                       
                                                                        </tbody>
                                                                    </table>';

                                                                    }
                                                                
                                                            $ht.='</div>
                                                        </div>';
                                                        $ht.="

			<div style='position:absolute;bottom:7px;margin-right:20px;'><br/>
	  		 <table name='footer' width='100%'>
				           <tr>
				             <td ><span style='font-size: 12px;color: navy;' align='left'>Note : -  </span></td>
				           </tr>
				         </table>
			</div>";
					
							$ht.='</body>';

	
									$ht.='</html>';

					$mpdf->WriteHTML($ht);
								// if(count($partlist)<=$maincnt)
								// {
									//$mpdf->AddPage();
								//}
								
										
							



		}
		$mpdf->output();

	}
	public function getSearchProductList()
	{
		$data['page_title']="Home";
		$logged_in = $this->session->userdata('logged_in');
		$type=$_POST['pname'];
		if($type!=1)
		{
			$type=$type;
		}
		else
		{
			$type=1;
		}
		$data['type']=$type;
		// if(isset($logged_in))
		// {
		// 	$data['userData']=$user_exists=$this->User_model->getUserInfoById($logged_in['user_id'],0);
		// }

			//$data['catData']=$user_exists=$this->User_model->getAllCategory(1);
			//$data['pTypeData']=$pTypeData=$this->User_model->getAllPTypeData(1,$type);
			$data['pTypeData']=$pTypeData=$this->User_model->getAllPCategoryData(1,$type);
			// print_r($this->db->last_query());
			// exit;
			//$data['category_list']=$pTypeData=$this->User_model->getAllCategory(1);

		$data['pType']=$type;
		// $this->load->view('front/header',$data);
		// $this->load->view('front/header_nav',$data);

		// $this->load->view('front/category_filter',$data);
		
		// $this->load->view('front/footer',$data);
		$output='';
		if($pTypeData)
		{
			foreach($pTypeData as $row)
			{
					$output.=' <!-- product item start -->
								<div class="col-sm-4" >
                                      
                                        <div class="product-item" style="width: 100%; display: inline-block;">
                                            <figure class="product-thumb">
                                                <a href="'.site_url("Welcome/getProductDetails/".base64_encode($row['product_id'])).'" tabindex="0">
                                                    <img class="pri-img" src="'.base_url().$row['product_image'].'" style="height: 320px;width: 320px;" alt="product">
                                                    <img class="sec-img" src="'.base_url().$row['product_image'].'" style="height: 320px;width: 320px;" alt="product">
                                                </a>
                                                
                                               
                                            </figure>
                                            <div class="product-caption text-center">
                                               
                                                <h6 class="product-name">
                                                    <a href="product-details.html" tabindex="0">'.$row['product_title'].'</a>
                                                </h6>
                                                <div class="price-box">
                                                    <span class="price-regular">'.$row['product_price'].'</span>
                                                    <span class="price-old"><del>'.$row['mrp_price'].'</del></span>
                                                </div>
                                            </div>
                                        </div>
                                   


                                    </div>
                                        <!-- product item end -->';
			}
		}
		echo $output;


	}

	public function getPatientauto()
	{
		if(isset($_GET["term"]))
		{
				 $search = trim($_GET["term"]);

					 $data['pTypeData']=$pTypeData=$this->User_model->getAllPCategoryData(1,$search);
					 $response = array();

					 // if(count($pTypeData)>0)
					 // {
					 // 	foreach ($pTypeData as $row) 
					 // 	{
					 // 		$response[] = array("value"=>$row['product_id'],"label"=>'<img src="'.base_url().$row['product_image'].'"> '.$row['product_title'].'');
					 // 	}
					 // 	/*$response = array();
					// 	 while($row = mysqli_fetch_array($res) ){
					// 	   $response[] = array("value"=>$row['patient_id'],"label"=>$row['full_name']);
					// 	 }*/
					 // }

					 $output = array();


					    if($pTypeData > 0){
					      foreach($pTypeData as $row)
					      {
					       $temp_array = array();
					       $temp_array['value'] = $row['product_id'];
					       $temp_array['name'] = $row['product_title'];
					       $temp_array['label'] = '<img src="'.base_url().$row['product_image'].'" width="80" height="50" /> '.$row['product_title'].' ';
					       $output[] = $temp_array;
					      }
					    }else{
					      $output['value'] = '';
					      $output['label'] = 'No Record Found';
					    }
			 				echo json_encode($output);

					 //echo json_encode($response);
		 }
		 
		
	}
	public function getFavoriteProducts()
	{
		$data['page_title']="Home";
		$logged_in = $this->session->userdata('logged_in');
		//$type=$_POST['id'];
		
		$user_id=$logged_in['user_id'];
		// if(isset($logged_in))
		// {
		// 	$data['userData']=$user_exists=$this->User_model->getUserInfoById($logged_in['user_id'],0);
		// }

			//$data['catData']=$user_exists=$this->User_model->getAllCategory(1);
			//$data['pTypeData']=$pTypeData=$this->User_model->getAllPTypeData(1,$type);
			$data['pTypeData']=$pTypeData=$this->User_model->getAllFavorite(1,$user_id);

		$this->load->view('front/header',$data);
		$this->load->view('front/header_nav',$data);

		$this->load->view('front/favorite',$data);
		
		$this->load->view('front/footer',$data);
		


	}
}
