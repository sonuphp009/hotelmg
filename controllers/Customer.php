<?php
require(APPPATH.'/libraries/REST_Controller.php');
class Customer extends REST_Controller {
	public function __construct()
	{
		parent::__construct();
			//date_default_timezone_set(DEFAULT_TIME_ZONE);
		
		$this->load->model('Customer_model');
		$this->load->helper('url');
	}
	
	## add cart ###
	public function addCart_post()
	{ 
		//date_default_timezone_set(DEFAULT_TIME_ZONE);//"Europe/Madrid"
		
		#ini_set("display_errors",1);
		#error_reporting(E_ERROR);
		$product_id		 		= $this->input->post("product_id");
		$user_id 				= $this->input->post("user_id");
		
		$product_quantity			= $this->input->post("product_quantity");
		$product_price			= $this->input->post("product_price");

		$sub_total=0;

		$input_data=array(	
							'product_id'=>$product_id,
							'user_id'=>$user_id,
							'product_quantity'=>$product_quantity,
							'product_price'=>$product_price,
							'sub_total'=>$product_quantity*$product_price,
							'date_added'=>date('Y-m-d H:i:s'),
							'date_updated'=>date('Y-m-d H:i:s')
						);
					
		$this->db->insert('tbl_cart',$input_data);
		$cart_id=$this->db->insert_id();

		$getcart=$this->Customer_model->getUserCart($user_id);


		$response_array=array();
		if(count($getcart)>0)
		{
			$num = array(
						'data' => $getcart,
						'responsemessage' => 'Cart added successfully',
						'responsecode' => "200"
					); //create an array
				$obj = (object)$num;//Creating Object from array
				$response_array=json_encode($obj);
			
		}
		else
		{
			$num = array(
						
						'responsemessage' => 'No Data Found',
						'responsecode' => "204"
					); //create an array
				$obj = (object)$num;//Creating Object from array
				$response_array=json_encode($obj);
		}
		
				
		print_r($response_array);
		exit;
		
	}

	## add cart ###
	public function getCart_post()
	{ 
		
		$user_id 				= $this->input->post("user_id");

		$getcart=$this->Customer_model->getUserCart($user_id);


		$response_array=array();
		if(count($getcart)>0)
		{
			$num = array(
						'data' => $getcart,
						'responsemessage' => 'Cart added successfully',
						'responsecode' => "200"
					); //create an array
				$obj = (object)$num;//Creating Object from array
				$response_array=json_encode($obj);
			
		}
		else
		{
			$num = array(
						
						'responsemessage' => 'No Data Found',
						'responsecode' => "204"
					); //create an array
				$obj = (object)$num;//Creating Object from array
				$response_array=json_encode($obj);
		}
		
				
		print_r($response_array);
		exit;
		
	}

}

?>