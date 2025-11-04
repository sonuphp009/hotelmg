<?php

Class Document_model extends CI_Model {

	function __construct()

	{

		// Call the Model constructor

		parent::__construct();

	}

	//Inserting code for document

	public function add_document($data) 
	{
		$res=$this->db->insert('tbl_documents',$data);
		if($res)
		{
			$document_id=$this->db->insert_id();
			return $document_id;
		}

		else

		return false;

	}
	public function add_subdocument($data) 
	{
		$res=$this->db->insert('tbl_documents',$data);
		if($res)
		{
			$document_id=$this->db->insert_id();
			return $document_id;
		}

		else

		return false;

	}
	
	public function document_record_count($per_page,$page)

	{

		$this->db->select('document_id');

		$res=$this->db->get('tbl_documents');
		if($per_page!=""){
		$this->db->limit($per_page,$page);
		}
		return $res->num_rows();

	}
	public function subdocument_record_count($per_page,$page)

	{

		$this->db->select('tbl_documents.*,tbl_documents.document_name');
		$this->db->from('tbl_documents');
		$this->db->join('tbl_documents','tbl_documents.document_id=tbl_documents.document_id');
		$res=$this->db->get();

		if($per_page!=""){
		$this->db->limit($per_page,$page);
		}
		return $tsr=$res->num_rows();

	}
	
	public function getSingledocumentInfo($banner_id,$qury)

	{

		$this->db->select('*');

		$this->db->where('document_id',$banner_id);

		$query=$this->db->get("tbl_documents");

		if($qury==1)

		{

			return $query->result_array();

		}

		else

		{

			return $query->num_rows();

		}		

	}
	public function getSingleSubdocumentInfo($banner_id,$qury)
	{
		$this->db->select('*');
		$this->db->where('subdocument_id',$banner_id);
		$query=$this->db->get("tbl_documents");
		if($qury==1)
		{
			return $query->result_array();
		}
		else
		{
			return $query->num_rows();
		}		

	}
	
	public function deleteBanner($banner_id)

	{

		$this->db->set('status','inactive');

		$this->db->where('document_id',$banner_id);

		$res=$this->db->update('tbl_documents');

		if($res)

		{

			return true;

		}

		else

		return false;

	}
	
	

	

	public function getAlldocument($qty,$per_page,$page)
	{

		$this->db->select('*');		
		$this->db->from('tbl_documents');
		if($per_page!=""){
		$this->db->limit($per_page,$page);
		}
		$this->db->order_by('document_id','DESC');
		$query=$this->db->get();
		
		if($qty==1)
		{
			return $query->result_array();
		}
		else
		{
			return $query->num_rows();
		}	

	}
	public function getAllSubdocument($per_page,$page)

	{

		$this->db->select('tbl_documents.*,tbl_documents.document_name');
		$this->db->from('tbl_documents');
		$this->db->join('tbl_documents','tbl_documents.document_id=tbl_documents.document_id');

		$this->db->order_by('subdocument_id','DESC');

		//$this->db->limit($per_page,$page);

		$res=$this->db->get();
		if($per_page!=""){
		$this->db->limit($per_page,$page);
		}
		return $res->result_array();

	}


	
	public function upt_document($input_data,$banner_id) 
	{
		$this->db->where('document_id',$banner_id);
		$res=$this->db->update('tbl_documents',$input_data);
		if($res)
		{
			return true;
		}
		else
		return false;

	}
	public function upt_subdocument($input_data,$banner_id) 
	{
		$this->db->where('subdocument_id',$banner_id);
		$res=$this->db->update('tbl_documents',$input_data);
		if($res)
		{
			return true;
		}
		else
		return false;

	}
	

}