<?php	
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller 
{  
	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('admin_model/Login_model');
		 $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
	}
	public function index()
	{
		$data['page_title']="Dashboard";
		if(isset($_POST['btn_login']))
		{
			
			$this->form_validation->set_rules('username','User Name','required');
			$this->form_validation->set_rules('admin_password','Admin Password','required');
			if($this->form_validation->run()!== FALSE)
			{
				
				$user_type='Admin';
				$username=$this->input->post('username');
				$admin_password=$this->input->post('admin_password');

				//echo md5($this->input->post('admin_password'));exit;
				$data = array('username' => $username,'password' =>$admin_password);

				$result1 = $this->Login_model->chk_login($data,0);

				#echo $this->db->last_query();exit;
				if ($result1>0) 
				{
					$result = $this->Login_model->chk_login($data,1);
					
					$status="";
					$user_type=$result[0]['user_type'];
					
						$status=$result[0]['status'];

					if($status=='active')
					{
						
						if($user_type=='admin')
						{
							$session_data = array('rstUser_id' => 0,
													'user_id' => $result[0]['patient_id'],
													'profile_pic' => $result[0]['profile_pic'],
													'full_name' => $result[0]['full_name'],
													'username' => $result[0]['username'],
													'mobile_number' => $result[0]['p_mobile'],
													'user_type' => 'admin',
													'status'=>$result[0]['status']);
						
						
							$this->session->set_userdata('logged_in', $session_data);
							
							redirect('backend/Dashboard', 'refresh');
						}
						else if($user_type=='user')
						{
							//print_r($user_type);exit;
							// $session_data = array('rstUser_id' => 0,
							// 						'user_id' => $result[0]['patient_id'],
							// 						'profile_pic' => $result[0]['profile_pic'],
							// 						'full_name' => $result[0]['full_name'],
							// 						'username' => $result[0]['username'],
							// 						'mobile_number' => $result[0]['p_mobile'],
							// 						'user_type' => 'user',
							// 						'status'=>$result[0]['status']);
						
						
							// $this->session->set_userdata('logged_in', $session_data);
							
							// redirect('backend/Dashboard', 'refresh');
							$this->session->set_flashdata('error', 'Invalid Creditionals.');
						redirect('Welcome/index_admin', 'refresh');
						}
					}
					else if($status=='inactive')
					{
						$this->session->set_flashdata('error', 'Inactive User.');
						redirect('Welcome/index_admin', 'refresh');
					}
					else  
					{
						$this->session->set_flashdata('error', 'Record deleted.');
						redirect('Welcome/index_admin', 'refresh');
					}
				}
				else
				{ 
					// $result2 = $this->Login_model->chk_customer_login($data,1);

					// if (count($result2)>0) 
					// {
					// 	$status=$result2[0]['active_status'];
					// 	if($status=='active')
					// 	{
					// 		$session_data = array(
					// 								'user_id' => $result2[0]['rid'],
					// 								'profile_pic' => $result2[0]['profile_pic'],
					// 								'full_name' => $result2[0]['name'],
					// 								'email' => $result2[0]['email'],
					// 								'mobile_number' => $result2[0]['mobileno'],
					// 								'user_type' => $result2[0]['user_type'],
					// 								'status'=>$result2[0]['active_status']);
						
						
					// 			$this->session->set_userdata('logged_in', $session_data);
					// 			redirect('backend/Dashboard/customer_dashboard', 'refresh');
					// 	}
					// 	else if($status=='inactive')
					// 	{
					// 		$this->session->set_flashdata('error', 'Inactive User.');
					// 		redirect('backend/Login/index', 'refresh');
					// 	}
					// 	else  
					// 	{
					// 		$this->session->set_flashdata('error', 'Record deleted.');
					// 		redirect('backend/Login/index', 'refresh');
					// 	}
					// }

					// $this->session->set_flashdata('error','Invalid Creditionals');
					// redirect('backend/Login/index', 'refresh');
					$this->session->set_flashdata('error', 'Invalid Creditionals.');
						redirect('Welcome/index_admin', 'refresh');
				}
			}
			else
			{
				$this->session->set_flashdata('error',$this->form_validation->error_string());
				redirect(base_url().'Welcome/index_admin');
			}
		}
		$this->load->view('login_header',$data);
		$this->load->view('login',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	public function editSignup()
	{
	    //$hospital_id=$this->session->userdata('hos_id');

	    $reg_id=base64_decode($this->uri->segment(4));
	    $txt_patient_first_name=trim($this->input->post('txt_patient_first_name'));
	    $txt_email=trim($this->input->post('txt_email'));
	    $txt_patient_mobile=trim($this->input->post('txt_patient_mobile'));
	    $txt_qualification=trim($this->input->post('txt_qualification'));
        $txt_patient_address=trim($this->input->post('txt_patient_address'));
        $sel_user_type="customer";//trim($this->input->post('sel_user_type'));

	    $txt_password=trim($this->input->post('txt_password'));
        //$txt_clinic_id=trim($this->input->post('txt_clinic_id'));
        //$txt_pic=$_POST['txt_pic'];
        
        $fle_option1='';
       
		
		date_default_timezone_set('Asia/Kolkata');
		//$date = date('Y-m-d H:i', time());
		$data['customerInfo']=$chkreg=$this->Login_model->get_user_by_idforupdate($reg_id);
		//$data['customerInfo']=$this->Dashboard_model->get_user_by_idforupdate($user_id);

	    $dt=date("Y-m-d");
	    if(count($chkreg)>0)
	    {
	    			if($_FILES['fle_option1']['size'] == 0)
					{
					  		$fle_option1=$chkreg[0]['profile_pic'];
					}
					else
					{	         
						$path = $_FILES['fle_option1']['name'];
						
					 	$ext = pathinfo($path,PATHINFO_EXTENSION);
						
						$target_dir = "asset/user_pic/";
						$fle_option1 = $target_dir.$path;
						move_uploaded_file($_FILES["fle_option1"]["tmp_name"], $fle_option1); 

					}

					
					$res2=$this->Login_model->get_user_by_id($reg_id);
					date_default_timezone_set('Asia/Kolkata');
					$timeda=date("Y-m-d");			

					 $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
					    $pass = array(); //remember to declare $pass as an array
					    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
					    for ($i = 0; $i < 8; $i++) {
					        $n = rand(0, $alphaLength);
					        $pass[] = $alphabet[$n];
					    }
					    $password=implode($pass); //turn the array into a string
			       
			       		$data3=array(

				         			'name'=>$txt_patient_first_name,
				         			'profile_pic'=>$fle_option1,
									'email'=>$txt_email,
									'mobileno'=>$txt_patient_mobile,
									'qualification'=>$txt_qualification,
									'address'=>$txt_patient_address,
									'password'=>$txt_password,
									'user_type'=>"customer",
									#'clinic_reg_id'=>$cid,
										
							);

			       		$this->db->where('reg.rid',$reg_id);
			         	$this->db->update('reg',$data3);
			         	
			         	
			         	//$this->session->set_flashdata('success','profile updated successfully.');
			         	//redirect('backend/Login/editSignup/'.base64_encode($reg_id));
	    }
	    $this->load->view('front/customer_header',$data);
				
				$this->load->view('front/editProfile',$data);
				$this->load->view('front/front_footer',$data);
        	    //redirect('Welcome/getUsername/'.$insid);
		//$this->load->view('profile/insert_contact_profile');
	}
	public function insert_user_signup()
	{
	    //$hospital_id=$this->session->userdata('hos_id');
	    $reg_id=$_POST['reg_id'];
	    $txt_patient_first_name=trim($this->input->post('txt_patient_first_name'));
	    $txt_email=trim($this->input->post('txt_email'));
	    $txt_patient_mobile=trim($this->input->post('txt_patient_mobile'));
	    $txt_qualification=trim($this->input->post('txt_qualification'));
        $txt_patient_address=trim($this->input->post('txt_patient_address'));
        $sel_user_type="customer";//trim($this->input->post('sel_user_type'));

	    $txt_password=trim($this->input->post('txt_password'));
        //$txt_clinic_id=trim($this->input->post('txt_clinic_id'));
        $txt_pic=$_POST['txt_pic'];
        
        $fle_option1='';
       
		
		date_default_timezone_set('Asia/Kolkata');
		//$date = date('Y-m-d H:i', time());
		
	    $dt=date("Y-m-d");
	    if($reg_id>0)
	    {
	    			if($_FILES['fle_option1']['size'] == 0)
					{
					  		$fle_option1=$txt_pic;
					}
					else
					{	         
						$path = $_FILES['fle_option1']['name'];
						
					 	$ext = pathinfo($path,PATHINFO_EXTENSION);
						
						$target_dir = "asset/user_pic/";
						$fle_option1 = $target_dir.$path;
						move_uploaded_file($_FILES["fle_option1"]["tmp_name"], $fle_option1); 

					}

					
					$res2=$this->Login_model->get_user_by_id($reg_id);
					date_default_timezone_set('Asia/Kolkata');
					$timeda=date("Y-m-d");			

					 $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
					    $pass = array(); //remember to declare $pass as an array
					    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
					    for ($i = 0; $i < 8; $i++) {
					        $n = rand(0, $alphaLength);
					        $pass[] = $alphabet[$n];
					    }
					    $password=implode($pass); //turn the array into a string
			       
			       		$data3=array(

				         			'name'=>$txt_patient_first_name,
				         			'profile_pic'=>$fle_option1,
									'email'=>$txt_email,
									'mobileno'=>$txt_patient_mobile,
									'qualification'=>$txt_qualification,
									'address'=>$txt_patient_address,
									'password'=>$txt_password,
									#'user_type'=>$sel_user_type,
									#'clinic_reg_id'=>$cid,
										
							);

			       		$this->db->where('reg.rid',$reg_id);
			         	$this->db->update('reg',$data3);
			         	
			         	

			         	redirect('backend/Dashboard/customer_dashboard');
	    }
	    else
	    {
	    			if($_FILES['fle_option1']['size'] == 0)
					{
					  		$fle_option1='';
					}
					else
					{	         
						$path = $_FILES['fle_option1']['name'];
						
					 	$ext = pathinfo($path,PATHINFO_EXTENSION);
						
						$target_dir = "asset/user_pic/";
						$fle_option1 = $target_dir.$path;
						move_uploaded_file($_FILES["fle_option1"]["tmp_name"], $fle_option1); 

					}

					$chk_email=$this->Login_model->get_email_exist($txt_email);

					if($chk_email == 0)
					{
							date_default_timezone_set('Asia/Kolkata');
						$timeda=date("Y-m-d");			

			       
			       		$data3=array(

				         			'name'=>$txt_patient_first_name,
				         			'profile_pic'=>$fle_option1,
									'email'=>$txt_email,
									'mobileno'=>$txt_patient_mobile,
									'qualification'=>$txt_qualification,
									'address'=>$txt_patient_address,
									'password'=>$txt_password,
									'user_type'=>$sel_user_type,
									'active_status'=>"inactive",
									
										
							);


			         	$this->db->insert('reg',$data3);
			         	$insid= $this->db->insert_id();
			         	if($insid>0)
			         	{
			         		$html="Your Username is - ".$txt_email."Password is - ".$txt_password." Click on below link to verify your account ".base_url()."backend/Login/verfiy_account/".base64_encode($insid);

			         		
			         		$this->load->library('email');

							$this->email->from('contact@photographymentor.in', 'Eseva');
							$this->email->to($txt_email);
							/*$this->email->cc('another@another-example.com');
							$this->email->bcc('them@their-example.com');*/

							$this->email->subject('Email Verification');
							$this->email->message($html);

							$this->email->send();

							redirect('backend/Login/regDone/'.$insid);
			         	}
			         	
					}
					else
					{
						$this->session->set_flashdata('error','email alrady exist.');
						redirect('backend/Login/index', 'refresh');
					}
					

			         	
	
	    }
        	    //redirect('Welcome/getUsername/'.$insid);
		//$this->load->view('profile/insert_contact_profile');
	}
	public function regDone($reg_id)
	{
		$reg_id=base64_decode($reg_id);
		$data['userData']=$this->Login_model->get_user_by_id($reg_id);

		$this->load->view('front/customer_header',$data);
		$this->load->view('regdone',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	public function verfiy_account($reg_id)
	{
		$reg_id=base64_decode($reg_id);
		if($reg_id>0)
		{
			$data3=array(

				         			'active_status'=>"active"
										
							);

			       		$this->db->where('reg.rid',$reg_id);
			         	$this->db->update('reg',$data3);

		}
		$data['userData']=$this->Login_model->get_user_by_id($reg_id);
		$this->load->view('header',$data);
		$this->load->view('verify_account_view',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	public function signin()
	{
		$data['page_title']="Sign In";
		if(isset($_POST['btn_login']))
		{
				 //$hospital_id=$this->session->userdata('hos_id');
	    $reg_id=trim($this->input->post('reg_id'));
	    $txt_patient_first_name=trim($this->input->post('txt_patient_first_name'));
	    $txt_email=trim($this->input->post('txt_email'));
	    $txt_patient_mobile=trim($this->input->post('txt_patient_mobile'));
        $txt_patient_address=trim($this->input->post('txt_patient_address'));
        $sel_user_type="customer";//trim($this->input->post('sel_user_type'));

	    $txt_password=trim($this->input->post('txt_password'));
        $txt_clinic_id=trim($this->input->post('txt_clinic_id'));
        $txt_pic=trim($this->input->post('txt_pic'));
        
        $fle_option1='';
       
		
		date_default_timezone_set('Asia/Kolkata');
		//$date = date('Y-m-d H:i', time());
		
	    $dt=date("Y-m-d");
	    if($reg_id>0)
	    {
	    			if($_FILES['fle_option1']['size'] == 0)
					{
					  		$fle_option1=$txt_pic;
					}
					else
					{	         
						$path = $_FILES['fle_option1']['name'];
						
					 	$ext = pathinfo($path,PATHINFO_EXTENSION);
						
						$target_dir = "asset/user_pic/";
						$fle_option1 = $target_dir.$path;
						move_uploaded_file($_FILES["fle_option1"]["tmp_name"], $fle_option1); 

					}

					
					$res2=$this->Login_model->get_user_by_id($reg_id);
					date_default_timezone_set('Asia/Kolkata');
					$timeda=date("Y-m-d");			

			       
			       		$data3=array(

				         			'name'=>$txt_patient_first_name,
				         			'profile_pic'=>$fle_option1,
									'email'=>$txt_email,
									'mobileno'=>$txt_patient_mobile,
									'address'=>$txt_patient_address,
									'password'=>$txt_password,
									'user_type'=>$sel_user_type,
									'clinic_reg_id'=>$cid,
										
							);

			       		$this->db->where('reg.rid',$reg_id);
			         	$this->db->update('reg',$data3);
			         	
			         	

			         	//redirect('Login/regDone/'.$data3);
	    }
	    else
	    {
	    			if($_FILES['fle_option1']['size'] == 0)
					{
					  		$fle_option1='';
					}
					else
					{	         
						$path = $_FILES['fle_option1']['name'];
						
					 	$ext = pathinfo($path,PATHINFO_EXTENSION);
						
						$target_dir = "asset/user_pic/";
						$fle_option1 = $target_dir.$path;
						move_uploaded_file($_FILES["fle_option1"]["tmp_name"], $fle_option1); 

					}

					$chk_email=$this->Login_model->get_email_exist($txt_email);

					if($chk_email == 0)
					{
							date_default_timezone_set('Asia/Kolkata');
						$timeda=date("Y-m-d");			

			       
			       		$data3=array(

				         			'name'=>$txt_patient_first_name,
				         			'profile_pic'=>$fle_option1,
									'email'=>$txt_email,
									'mobileno'=>$txt_patient_mobile,
									'address'=>$txt_patient_address,
									'password'=>$txt_password,
									'user_type'=>$sel_user_type,
									'active_status'=>"inactive",
									
										
							);


			         	$this->db->insert('reg',$data3);
			         	$insid= $this->db->insert_id();
			         	if($insid>0)
			         	{
			         		$html="Your Username is - ".$txt_email."Password is - ".$txt_password." Click on below link to verify your account ".base_url()."Login/verfiy_account/".base64_encode($insid);

			         		
			         		$this->load->library('email');

							$this->email->from('contact@photographymentor.in', 'Eseva');
							$this->email->to($txt_email);
							$this->email->cc('another@another-example.com');
							$this->email->bcc('them@their-example.com');

							$this->email->subject('Email Verification');
							$this->email->message($html);

							$this->email->send();

							redirect('backend/Login/regDone/'.$insid);
			         	}
			         	
					}
					else
					{
						$this->session->set_flashdata('error','email alrady exist.');
						redirect('backend/Login/index', 'refresh');
					}
					

			         	
	
	    }
		}

		$this->load->view('login_header',$data);
		$this->load->view('signin',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
}
?>