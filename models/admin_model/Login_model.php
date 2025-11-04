<?php
Class Login_model extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	// Read data using username and password
	public function chk_login($data,$qty) 
	{
		
		
			$condition = "username =" . "'" . $data['username'] . "' 	
						  AND " . "password =" . "'" . $data['password'] . "'";
						  
			$this->db->select('*');
			$this->db->from('tbl_user_master');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			
			//echo $this->db->last_query();exit;
			if ($qty==0) 
			{
				return $query->num_rows();
			} 
			else 
			{
				return $query->result_array();
			}
		
	}
	public function chk_customer_login($data,$qty) 
	{
		
		
			$condition = "email =" . "'" . $data['username'] . "' 	
						  AND " . "password =" . "'" . $data['password'] . "'";
						  
			$this->db->select('*');
			$this->db->from('reg');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			
			//echo $this->db->last_query();exit;
			if ($qty==0) 
			{
				return $query->num_rows();
			} 
			else 
			{
				return $query->result_array();
			}
		
	}
	function get_user_by_id($id)
 	{
		 //$conv_pwd= md5(trim($pwd));
		  $this->db->where('rid',$id); 
		 
		  $this->db->select("reg.*");
		  $this->db->from('reg');
          $query= $this->db->get();
		  return $query->row_array();
     }
     function get_user_by_idforupdate($id)
 	{
		 //$conv_pwd= md5(trim($pwd));
		  $this->db->where('rid',$id); 
		 
		  $this->db->select("reg.*");
		  $this->db->from('reg');
          $query= $this->db->get();
		  return $query->result_array();
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



// Read  data from database to show data in admin page

	public function read_user_information($username) 
	{
			$condition = "user_name =" . "'" . $username . "'";
			$this->db->select('*');
			$this->db->from('cda_admin');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 1) 
			{
				return $query->result();
			} 
			else 
			{
				return false;
			}
	}
	public function resetPass($data){
		$sts = $this->db->query('Update cda_admin SET admin_password ="'.md5($data['password']).'" WHERE admin_email="'.$data['email'].'"');
		return $sts;
	}
	public function checkexist($email){
		$query = $this->db->query('select admin_id from cda_admin where admin_email="'.$email.'"');
		return $query->num_rows();
	}
}
?>