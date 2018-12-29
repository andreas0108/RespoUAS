<?php defined('BASEPATH') OR exit('No direct script access allowed');
class City extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('City_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
    	$data['title'] = 'City | Home';
        $data['city'] = $this->City_model->getAll();
        $this->load->view('parts/header',$data);
        $this->load->view('city/index');
        $this->load->view('parts/footer');
    }

    public function delete($id)
    {
        $this->City_model->delete($id);
        $this->session->set_flashdata('flash','Data berhasil dihapus');
        redirect('city');
    }

    public function add()
    {
        $data['title'] = 'City | Add';
        $this->form_validation->set_rules('cityname','City Name','required');
        $this->form_validation->set_rules('country','Country','required');
        if($this->form_validation->run() == FALSE ) {

        $this->load->view('parts/header',$data);
        $this->load->view('city/add');
        $this->load->view('parts/footer');

        } else {
            $this->City_model->add();
            $this->session->set_flashdata('flash', 'Data berhasil ditambahkan');
            redirect('city');
        }
    }
    public function edit($id)
    {
        
        $data['title'] = 'City | Edit';
        $data['city'] = $this->City_model->get($id);
        $this->form_validation->set_rules('cityname','City Name','required');
        $this->form_validation->set_rules('country','Country','required');
        if($this->form_validation->run() == FALSE ) {

        $this->load->view('parts/header',$data);
        $this->load->view('city/edit',$data);
        $this->load->view('parts/footer');

        } else {
            $this->City_model->ubahDataCity($id);
            $this->session->set_flashdata('flash', 'Data berhasil diubah');
            redirect('city');
            
        }
    }

}