<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Documents extends CI_Controller {
	public function __construct()
	{ 
		 parent::__construct();
		 $this->load->model('admin_model/Document_model');
		 $this->load->library("pagination");	
		 if(! $this->session->userdata('logged_in'))
		 {
			redirect('Login', 'refresh');
		 }
	}
	public function addDocument()
	{
		$data['page_title']='Add Document';
		if(isset($_POST['btn_adddocument']))
		{
			
			//$this->form_validation->set_rules('Document_image','Image','required');
			$this->form_validation->set_rules('document_name','Banner Status','required');
			if($this->form_validation->run())
			{
				$document_name=$this->input->post('document_name');
				
				
					$input_data=array('document_name'=>$document_name,'status'=>"active",'dateadded'=>date('Y-m-d H:i:s'));
					
					$document_id=$this->Document_model->add_document($input_data);
					//echo $this->db->last_query();exit;
					if($document_id>0)
					{
						$this->session->set_flashdata('success','Document added successfully.');
						redirect(base_url().'backend/Documents/manageDocument');	
					}
					else
					{
						$this->session->set_flashdata('error','Error while adding banner.');
						redirect(base_url().'backend/Documents/addDocument');
					}
			}
			else
			{
				$this->session->set_flashdata('error',$this->form_validation->error_string());
				redirect(base_url().'backend/Documents/addDocument');
			}
		}
		$this->load->view('header',$data);
		$this->load->view('admin/addDocument',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	
	public function manageDocument()
	{
		$data['page_title']='Manage Document';
		$cntqry= $this->Document_model->getAllDocument(0,"","");
		
		//$data['catcnt']= $cnt;

		$data['bannercnt']= $config["total_rows"] = $cntqry;
		$config = array();
		$config["base_url"] = base_url('backend/')."Documents/manageDocument/";
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
		$data['catmaster2']=$this->Document_model->getAlldocument(1,$config["per_page"],$page);
		
		$this->load->view('header',$data);
		$this->load->view('admin/manageDocument',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}
	
	

	public function updateDocument()
	{

		$data['page_title']='Update Document';

		$data['error_msg']='';

		$banner_id=base64_decode($this->uri->segment(4));

		if($banner_id)

		{

			$catInfo=$this->Document_model->getSingledocumentInfo($banner_id,0);

			if($catInfo>0)

			{

				$data['catInfo']=$this->Document_model->getSingledocumentInfo($banner_id,1);

				

				if(isset($_POST['btn_updateDocument']))

				{
					
					//$this->form_validation->set_rules('Document_image','Image','required');
					$this->form_validation->set_rules('document_name','Document Name','required');
					if($this->form_validation->run())
					{
						$document_name=$this->input->post('document_name');
						$document_status=$this->input->post('document_status');
					
							
							
							$input_data=array('document_name'=>$document_name,'status'=>$document_status,'dateadded'=>date('Y-m-d H:i:s'));

													
				//echo print_r($input_data);exit;
							$banner_idww=$this->Document_model->upt_document($input_data,$banner_id);

						//echo ')))';	echo $this->db->last_query();exit;

							if($banner_idww)

							{	// echo '///';exit;

								$this->session->set_flashdata('success','Document updated successfully.');

								redirect(base_url().'backend/Documents/manageDocument');	

							}

							else

							{

								$this->session->set_flashdata('error','Error while updating banner.');

								redirect(base_url().'backend/Documents/updateDocument/'.base64_encode($banner_id));

							}	

					}

					else

					{

						$this->session->set_flashdata('error',$this->form_validation->error_string());

						redirect(base_url().'backend/Documents/updateDocument/'.base64_encode($banner_id));

					}

				}

			}

			else

			{

				$data['error_msg']='Document is not found.';

			}

		}

		else

		{

			$this->session->set_flashdata('error','Banner is not found.');

			redirect(base_url().'backend/Documents/updateDocument/'.base64_encode($banner_id));

		}

		$this->load->view('header',$data);
		$this->load->view('admin/updateDocument',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);

	}

	public function updateSubDocument()
	{
		$data['page_title']='Update Document';
		$data['error_msg']='';
		$banner_id=base64_decode($this->uri->segment(4));
		if($banner_id)
		{
			$catInfo=$this->Document_model->getSingleSubDocumentInfo($banner_id,0);
			if($catInfo>0)
			{
				$data['subcatInfo']=$this->Document_model->getSingleSubDocumentInfo($banner_id,1);
				$data['Document_info']=$this->Document_model->getAllDocument("","");
				if(isset($_POST['btn_updatesubDocument']))
				{
					
					//$this->form_validation->set_rules('Document_image','Image','required');
					$this->form_validation->set_rules('Document_id','Document Name','required');
					$this->form_validation->set_rules('subDocument_name','Sub Document Name','required');
					if($this->form_validation->run())
					{
						$Document_name=$this->input->post('Document_id');
						$subDocument_name=$this->input->post('subDocument_name');
						$subDocument_status=$this->input->post('subDocument_status');
					

							
							$input_data=array('Document_id'=>$Document_name,'subDocument_name'=>$subDocument_name,'status'=>$subDocument_status,'added_date'=>date('Y-m-d H:i:s'));

													
				//echo print_r($input_data);exit;
							$banner_idww=$this->Document_model->upt_subDocument($input_data,$banner_id);

						//echo ')))';	echo $this->db->last_query();exit;

							if($banner_idww)

							{	// echo '///';exit;

								$this->session->set_flashdata('success','Sub Document updated successfully.');

								redirect(base_url().'backend/Document/manageSubDocument');	

							}

							else

							{

								$this->session->set_flashdata('error','Error while updating banner.');

								redirect(base_url().'backend/Document/updateSubDocument/'.base64_encode($banner_id));

							}	

					}

					else

					{

						$this->session->set_flashdata('error',$this->form_validation->error_string());

						redirect(base_url().'backend/Document/updateSubDocument/'.base64_encode($banner_id));

					}

				}

			}

			else

			{

				$data['error_msg']='Document is not found.';

			}

		}

		else

		{

			$this->session->set_flashdata('error','Banner is not found.');

			redirect(base_url().'backend/Document/updateSubDocument/'.base64_encode($banner_id));

		}

		$this->load->view('header',$data);
		$this->load->view('admin/updateSubDocument',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);

	}
	
	public function deleteDocument()
	{
		$data['error_msg']='';
		$banner_id=base64_decode($this->uri->segment(4));
		if($banner_id)
		{
			$bannerInfo=$data['bannerInfo']=$this->Document_model->getSingleDocumentInfo($banner_id,1);
			if(count($bannerInfo)>0)
			{
				$delbanner=$this->Document_model->deleteBanner($banner_id);
				if($delbanner>0)
				{
					$this->session->set_flashdata('success','Document deleted successfully.');
					redirect(base_url().'backend/Documents/manageDocument');	
				}
				else
				{
					$this->session->set_flashdata('error','Error while deleting Document.');
					redirect(base_url().'backend/Documents/manageDocument');
				}
			}
			else
			{
				$data['error_msg']='Document is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','Document is not found.');
			redirect(base_url().'backend/Documents/manageDocument');
		}
	}
}