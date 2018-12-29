<?php defined('BASEPATH') OR exit('No direct script access allowed');
class City_model extends CI_model {

    public function getAll()
    {
        return $query = $this->db->get('city')->result_array();
    }

    public function get($id)
    {
        $this->db->where('idcity',$id);
        return $query = $this->db->where('idcity',$id)->get('city')->row_array();
    }

    public function delete($id)
    {
        $this->db->delete('city', ['idcity' => $id]);
    }

    public function add()
    {
        $data = [
            "cityname" => $this->input->post('cityname',true),
            "country" => $this->input->post('country',true)
        ];
        
        $this->db->insert('city', $data);
    }

    public function edit($id)
    {
        $data = [
            "cityname" => $this->input->post('cityname',true),
            "country" => $this->input->post('country',true)
        ];
        $this->db->where('idcity',$this->input->post('idcity'));
        $this->db->update('city', $data);
    }

}