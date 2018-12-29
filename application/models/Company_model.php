<?php

class Company_model extends CI_model {

	public function getAll()
    {
        return $query = $this->db->get('company')->result_array();        
    }

    public function get($id)
    {
        $this->db->where('idcompany',$id);
        return $query = $this->db->where('idcompany',$id)->get('company')->row_array();
    }

    public function delete($id)
    {
        $this->db->delete('company', ['idcompany' => $id]);
    }

    public function add()
    {
    	$data = [
            "name" => $this->input->post('companyname',true)
        ];
        
        $this->db->insert('company', $data);
    }

    public function edit($id)
    {
    	$data = [
            "name" => $this->input->post('companyname',true)
        ];
        $this->db->where('idcompany',$this->input->post('idcompany'));
        $this->db->update('company', $data);
    }
}