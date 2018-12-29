<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Members_model extends CI_Model
{
    private $_TABLE = "members";

    public function _construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('members');
        $this->db->join('city', 'city.idcity=members.idcity','left');
        $this->db->join('company', 'company.idcompany=members.idcompany','left');
        // $this->db->order_by('members.id','asc');
        $query = $this->db->get();
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    
    }
    
    public function get($id)
    {
        $this->db->select('*');
        $this->db->from('members');
        $this->db->join('city', 'city.idcity=members.idcity','left');
        $this->db->join('company', 'company.idcompany=members.idcompany','left');
        $this->db->where('members.id', $id);
        $query = $this->db->get();
        if($query->num_rows() != 0)
        {
            return $query->row_array();
        }
        else
        {
            return false;
        }
    }

    public function get_company()
    {
        return $this->db->get('company')->result_array();
    }
    public function get_city()
    {
        return $this->db->get('city')->result_array();
    }

    public function delete($id)
    {
        $this->db->delete('members', ['id' => $id]);
        // return $this->db->delete($this->_table, array("product_id" => $id));
    }

    public function edit($id)
    {  
    if($_FILES['gambar']['error'] === 4) {
		$foto = $this->input->post('fotoLama');
	} else {
            $data = [
                "fullname" => $this->input->post('fullname',true),
                "email" => $this->input->post('email',true),
                "address" => $this->input->post('address',true),
                "idcompany" => $this->input->post('company',true),
                "idcity" => $this->input->post('city',true)
            ];
            $this->db->where('id',$this->input->post('id'));
            $this->db->update('members', $data);
        }
    }

    public function add()
    {  
        $file = $_FILES;
        $filename = $_FILES['foto']['name'];
        $imgextValid = ['jpg', 'jpeg', 'png'];
        $imgext = explode('.', $filename);
        $imgext = strtolower(end($imgext));
        $newfilename = uniqid();

            if(!empty($file)){
                $config['upload_path']          = './uploads/img/';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['max_size']             = 2000;
                $config['file_name']			= $newfilename;
                $this->load->library('upload', $config);
                if ( !$this->upload->do_upload('foto')){
                    $data['error'] = $this->upload->display_errors();	
                }else{
                    $newfile = $this->upload->data();
                    $handle = fopen($config['upload_path'].$newfile['file_name'], "r");
                    fclose($handle);
                }
                $foto = $config['upload_path'].$config['file_name'].$config['allowed_types'];
                $filename = $config['file_name'] . '.' . $imgext;
                $data = [
                    "fullname" => $this->input->post('fullname',true),
                    "email" => $this->input->post('email',true),
                    "address" => $this->input->post('address',true),
                    "foto" => $filename,
                    "idcompany" => $this->input->post('company',true),
                    "idcity" => $this->input->post('city',true)
                ];
            
            $this->db->insert('members', $data);

        }
    }
}