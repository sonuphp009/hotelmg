<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('admin_model/User_model');
		 $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		#	print "in";exit;
		 if(! $this->session->userdata('logged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	public function addUser()
	{
		$data['page_title']='Add User';
		
		$data['error_msg']='';
		if(isset($_POST['btn_adduser']))
		{

			//$this->form_validation->set_rules('fle_option1','Profile Photo','required');
			$this->form_validation->set_rules('txt_patient_first_name','Full Name','required');
			$this->form_validation->set_rules('txt_email','Email','required');
			$this->form_validation->set_rules('txt_patient_mobile','Mobile Number','required');
			$this->form_validation->set_rules('txt_patient_address','Address','required');
			
			
			if($this->form_validation->run())
			{
				$txt_patient_first_name=$this->input->post('txt_patient_first_name');		
						
				$txt_email=$this->input->post('txt_email');	
				$txt_patient_mobile=$this->input->post('txt_patient_mobile');		
						
				$txt_patient_address=$this->input->post('txt_patient_address');	

				// check already category exists
				$user_exists=$this->User_model->check_pageName($txt_email,0);
				//echo $this->db->last_query();exit;
				if($user_exists==0)
				{
					$fle_option1='';
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
					 $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
				    $pass = array(); //remember to declare $pass as an array
				    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
				    for ($i = 0; $i < 8; $i++) {
				        $n = rand(0, $alphaLength);
				        $pass[] = $alphabet[$n];
				    }
				    $password=implode($pass); //turn the array into a string
						
						$input_data=array(
							'full_name'=>$txt_patient_first_name,
							'username'=>$txt_email,
							'p_mobile'=>$txt_patient_mobile,
							'p_address'=>$txt_patient_address,
							'password'=>$password,
							'profile_pic'=>$fle_option1,
							'user_type'=>"user",
							'status'=>"inactive",
						);
						
						$cms_id=$this->User_model->add_User($input_data);
						//echo $this->db->last_query();exit;
						if($cms_id>0)
						{
							$html="Your Username is - ".$txt_email."Password is - ".$password;

			         		
			         		$this->load->library('email');

							$this->email->from('sonu.php009@gmail.com', 'Eseva');
							$this->email->to($txt_email);
							$this->email->cc('another@another-example.com');
							$this->email->bcc('them@their-example.com');

							$this->email->subject('Login Authentication');
							$this->email->message($html);

							$this->email->send();

							$this->session->set_flashdata('success','User added successfully');
							redirect(base_url().'Welcome/userList');
						}
						else
						{
							$this->session->set_flashdata('success','Error while adding User');
							redirect(base_url("backend/").'UserController/addUser');
						}
				}
				else
				{
						$this->session->set_flashdata('error','User already exists.');
						redirect(base_url("backend/").'UserController/addUser');			
				}
			}
			else
			{
					$this->session->set_flashdata('error',$this->form_validation->error_string());
					redirect(base_url("backend/").'UserController/addUser');			
			}
		}
		
		$this->load->view('header',$data);
		$this->load->view('admin/add_user',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	public function updateUser()
	{
		$data['page_title']='Update User';
		
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));
		if($page_id>0)
		{

			$data['userDate']=$this->User_model->getSingleUserInfo($page_id,1);
			if(isset($_POST['btn_updateuser']))
			{
				
				//$this->form_validation->set_rules('fle_option1','Profile Photo','required');
				$this->form_validation->set_rules('txt_patient_first_name','Full Name','required');
				$this->form_validation->set_rules('txt_email','Email','required');
				$this->form_validation->set_rules('txt_patient_mobile','Mobile Number','required');
				$this->form_validation->set_rules('txt_patient_address','Address','required');
				
				
				if($this->form_validation->run())
				{
	
					$txt_patient_first_name=$this->input->post('txt_patient_first_name');		
						
					$txt_email=$this->input->post('txt_email');	
					$txt_patient_mobile=$this->input->post('txt_patient_mobile');		
							
					$txt_patient_address=$this->input->post('txt_patient_address');	
					$userstatus=$this->input->post('userstatus');	
					$txt_pic=$_POST['txt_pic'];
					
						$fle_option1='';
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
						 $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
					    $pass = array(); //remember to declare $pass as an array
					    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
					    for ($i = 0; $i < 8; $i++) {
					        $n = rand(0, $alphaLength);
					        $pass[] = $alphabet[$n];
					    }
					    $password=implode($pass); //turn the array into a string
							
							$input_data=array(
								'full_name'=>$txt_patient_first_name,
								'username'=>$txt_email,
								'p_mobile'=>$txt_patient_mobile,
								'p_address'=>$txt_patient_address,
								#'password'=>$password,
								'profile_pic'=>$fle_option1,
								'user_type'=>"user",
								'status'=>$userstatus
							);
							$this->db->where('patient_id',$page_id);
							$this->db->update('tbl_user_master',$input_data);
							//echo $this->db->last_query();exit;
							
								$html="Your Username is - ".$txt_email."Password is - ".$password;

				         		
				         		$this->load->library('email');

								$this->email->from('sonu.php009@gmail.com', 'Eseva');
								$this->email->to($txt_email);
								$this->email->cc('another@another-example.com');
								$this->email->bcc('them@their-example.com');

								$this->email->subject('Login Authentication');
								$this->email->message($html);

								$this->email->send();

								$this->session->set_flashdata('success','User update successfully');
								redirect(base_url().'Welcome/userList');
							
				}
				else
				{
						$this->session->set_flashdata('error',$this->form_validation->error_string());
						redirect(base_url("backend/").'UserController/updateUser/'.base64_encode($page_id));			
				}
			}
			
		}
		else
		{
			$this->session->set_flashdata('error','User is not found.');
			redirect(base_url("backend/").'UserController/updateUser/'.base64_encode($page_id));
		}
		$this->load->view('header',$data);
		$this->load->view('admin/update_user',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	public function deleteUser()
	{
		$data['page_title']='Delete Product';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));
		if($page_id)
		{
			$delcat=$this->User_model->deleteUser($page_id);
			if($delcat>0)
			{
				$this->session->set_flashdata('success','User deleted successfully.');
				redirect(base_url().'Welcome/userList');	
			}
			else
			{
				$this->session->set_flashdata('error','Error while deleting User.');
				redirect(base_url().'Welcome/userList');
			}
		}
		else
		{
			$this->session->set_flashdata('error','User is not found.');
			redirect(base_url().'Welcome/userList');
		}
	}
	public function userDocuments()
	{
		$data['page_title']='View Documents';
		$user_id=base64_decode($this->uri->segment(4));
		
		
		$data['user_id']=$user_id;

		$data['userInfo']=$postInfo=$this->User_model->getUserInfoById($user_id);
		$data['docdetailsInfo']=$this->User_model->getdocDetailsById($user_id);
		$this->load->view('header',$data);
		$this->load->view('admin/viewDocumentAdmin',$data);
		$this->load->view('javascript',$data);
						
		$this->load->view('footer',$data);
	}
	
}
?>