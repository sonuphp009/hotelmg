<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model/Service_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
    }

    public function index() {
        $data['page_title']='Add Hotel Services';
        $data['services'] = $this->Service_model->get_all();
        $this->load->view('header',$data);
        $this->load->view('services/index', $data);
        $this->load->view('javascript',$data);
        
        $this->load->view('footer',$data);
    }

    public function create() {
        $this->_form();
    }

    public function edit($id) {
        $this->_form($id);
    }

    private function _form($id = null) {
        $service = $id ? $this->Service_model->get($id) : null;

        $this->form_validation->set_rules('service_name', 'Service Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $data['service'] = $service;
            $this->load->view('services/form', $data);
        } else {
            $save_data = [
                'service_name' => $this->input->post('service_name'),
                'description'  => $this->input->post('description'),
                'price'        => $this->input->post('price')
            ];

            if ($id) {
                $this->Service_model->update($id, $save_data);
                $this->session->set_flashdata('success', 'Service updated successfully');
            } else {
                $this->Service_model->insert($save_data);
                $this->session->set_flashdata('success', 'Service added successfully');
            }

            redirect('services');
        }
    }

    public function delete($id) {
        $this->Service_model->delete($id);
        $this->session->set_flashdata('success', 'Service deleted successfully');
        redirect('services');
    }
}
