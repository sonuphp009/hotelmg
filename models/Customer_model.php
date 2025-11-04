<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Customer_model extends CI_Model {
	
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			//date_default_timezone_set('Europe/Madrid');
			//global $strUserTable =TBPREFIX."users";
		}

		//Register functions
		function fetchsingledata($username = '' )
		{				
			$this->db->select('*');
			$this->db->from('reg');
			$this->db->where('mobileno',$username);
			return $this->db->get()->result_array();			
		}
        function get_email_exist($email)
        {
            //$conv_pwd= md5(trim($pwd));
            $this->db->where('email',$email); 
            
            $this->db->select("reg.*");
            $this->db->from('reg');
            $query= $this->db->get();
            return $query->num_rows();
        }
        function getUserCart($user_id)
		{				
			$this->db->select('*');
			$this->db->from('tbl_cart');
			$this->db->where('user_id',$user_id);
			$this->db->order_by('cart_id','desc');
			return $this->db->get()->result_array();			
		}
    }
?>