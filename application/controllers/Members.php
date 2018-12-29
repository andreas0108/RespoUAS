<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Members extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        // $this->load->database();
        $this->load->model('Members_model');
        $this->load->library('form_validation');
	}	
	
	public function index()
	{        
        $data['members'] = $this->Members_model->getAll();
		$file = $_FILES;
        if(!empty($file)){
            $config['upload_path']          = './uploads/csv/';
            $config['allowed_types']        = 'csv';
            $config['max_size']             = 100;
            $this->load->library('upload', $config);
            if ( !$this->upload->do_upload('csv')){
                $data['error'] = $this->upload->display_errors();   
            }else{
                $newfile = $this->upload->data();
        
                $handle = fopen($config['upload_path'].$newfile['file_name'], "r");
                $i = 1; $data['ok'] = ""; $data['error'] = "";
                while (($dt = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    // proses simpan ke db
                    $in['fullname'] = $dt[0];
                    $in['email'] = $dt[1];
                    $in['address'] = $dt[2];
                    $in['idcompany'] = $dt[3];
                    $in['idcity'] = $dt[4];    
                    $add = $this->Members_model->add($in);      
                    if($add['sts']){
                        $data['ok'] .= "Data berhasil ditambahkan ke baris ke ".$i.": ".$add['msg']."<br />";
                        
                    }else{
                        $data['error'] .="File gagal terupload, silahkan coba lagi"."<br />";
                        
                    }
                    $i++;   
                }
                fclose($handle);
            }
		}
		
        $data['title'] = 'Home';
		$this->load->view('parts/header', $data);
		$this->load->view('members/index');
		$this->load->view('parts/footer');
	}

	public function id($id)
	{
		$data['title'] = 'Members | View';
		$data['members'] = $this->Members_model->get($id);
		
        $this->load->view('parts/header',$data);
        $this->load->view('/members/show',$data);
        $this->load->view('parts/footer');
	}

	public function delete($id)
	{
		$this->Members_model->delete($id);
        $this->session->set_flashdata('flash','Data berhasil dihapus !');
        redirect('members');
	}

	public function edit($id)
	{
        $data['title'] = 'Members | Edit';
        $data['company'] = $this->Members_model->get_Company();
        $data['city'] = $this->Members_model->get_City();
        $data['members'] = $this->Members_model->get($id);
        $this->form_validation->set_rules('fullname','Nama','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        if($this->form_validation->run() == FALSE ) {
            $this->load->view('parts/header',$data);
            $this->load->view('members/edit');
            $this->load->view('parts/footer');

        } else {
            $this->Members_model->edit($id);
            $this->session->set_flashdata('flash', 'Perubahan data telah disimpan');
        redirect('members');
        }
	}

	public function add()
	{
        $data['title'] = 'Members | Add';
        $data['company'] = $this->Members_model->get_company();
        $data['city'] = $this->Members_model->get_city();

        $this->form_validation->set_rules('fullname','Nama','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        if($this->form_validation->run() == FALSE ) {

            $this->session->set_flashdata('flash', 'Data gagal ditambahkan, silahkan coba lagi.');
            
            $this->load->view('parts/header',$data);
            $this->load->view('members/add');
            $this->load->view('parts/footer');

			} else {
			$this->Members_model->add();
			$this->session->set_flashdata('flash', 'Data berhasil disimpan');
			redirect('members');
            
        }
	}
}