<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class OrderController extends CI_Controller {
	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('admin_model/Order_model');
		$this->load->library("pagination");	
		if(! $this->session->userdata('logged_in'))
		{
			redirect('Login', 'refresh');
		}
	}
	// order search
	public function mcuisinesearch()
	{
		#print_r($_REQUEST); exit;
		$order_date=$order_status='Na';
		
		if(isset($_POST['btn_clear']))
		{
			redirect(base_url().'backend/OrderController/manageOrder');
		}

		if(isset($_POST['btn_search']))
		{
			if($_POST['order_date']!="")
			{
				$order_date=trim($_POST['order_date']);
			}
			if($_POST['order_status']!="")
			{
				$order_status=trim($_POST['order_status']);
				$order_status = str_replace('%20', ' ', $order_status);

			}
			
			redirect(base_url().'backend/OrderController/manageOrder/'.$order_date.'/'.$order_status);
		}
		redirect('backend/OrderController/manageOrder', 'refresh');		
	}
	
	// code for manage orders
	public function manageOrder()
	{
		$data['page_title']='Manage Order';
		$order_date=$order_status='Na';

		if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$order_date=urldecode($this->uri->segment(4));
			}
		}

		if($this->uri->segment(5)!='')
		{
			if($this->uri->segment(5)!="Na")
			{
				$order_status=urldecode($this->uri->segment(5));
			}
		}
		
		$data['catcnt']= $config["total_rows"] = $this->Order_model->getAllOrder($order_date,$order_status,0,"","");

		$config = array();
		$config["base_url"] = base_url() . "backend/OrderController/manageOrder/".$order_date."/".$order_status;
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
		$data['orderData']=$this->Order_model->getAllOrder($order_date,$order_status,1,$config["per_page"],$page);

		$this->load->view('header',$data);
		$this->load->view('admin/manageOrders',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);
	}

	public function viewOrder()
	{

		$data['page_title']='Manage Order Details';

		$data['error_msg']='';

		$banner_id=base64_decode($this->uri->segment(4));


		if($banner_id)
		{
			$data['orderInfo']=$this->Order_model->getSingleOrderInfo($banner_id,1);

		}
		else
		{

			$this->session->set_flashdata('error','Order is not found.');

			redirect(base_url().'backend/OrderController/manageOrderDetails/'.base64_encode($banner_id));

		}

		$this->load->view('header',$data);
		$this->load->view('admin/viewOrderDetails',$data);
		$this->load->view('javascript',$data);
		
		$this->load->view('footer',$data);

	}
}
?>