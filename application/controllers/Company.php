<?php

class Company extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Company_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
    	$data['title'] = 'Company | Home';
        $data['company'] = $this->Company_model->getAll();
        $this->load->view('parts/header',$data);
        $this->load->view('company/index',$data);
        $this->load->view('parts/footer');
    }

    public function delete($id)
    {
        $this->Company_model->delete($id);
        $this->session->set_flashdata('flash','Data berhasil dihapus');
        redirect('company');
    }

    public function add()
    {
        $data['title'] = 'Company | Add';
        $this->form_validation->set_rules('companyname','company Name','required');
        if($this->form_validation->run() == FALSE ) {

        $this->load->view('parts/header',$data);
        $this->load->view('Company/add');
        $this->load->view('parts/footer');

        } else {
            $this->Company_model->add();
            $this->session->set_flashdata('flash', 'Data berhasil ditambahkan');
            redirect('company');
            
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Company | Edit';
        $data['company'] = $this->Company_model->get($id);
        $this->form_validation->set_rules('companyname','Company Name','required');

        if($this->form_validation->run() == FALSE ) {

        $this->load->view('parts/header',$data);
        $this->load->view('company/edit',$data);
        $this->load->view('parts/footer');

        } else {
            $this->Company_model->ubahDataCompany($id);
            $this->session->set_flashdata('flash', 'Data berhasil diubah');
            redirect('company');
            
        }
    }
}