<?php

require APPPATH . '/libraries/REST_Controller.php';

class Lokasi_api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model("API_Lokasi_model");
    }

    // show data 
    function index_get() {
        $id = $this->get('id');

        if ($id == '') {
            
            $lokasi=$this->db->get("lokasi")->result();

        } else {
         
            $this->db->where('id_lokasi', $id);
            $lokasi=$this->db->get("lokasi")->result();
            
        }
        $data = array(
            "status"=>"success",
            "jumlah"=>$this->API_Lokasi_model->total_rows(),
            "lokasi"=> $lokasi);

        $this->response($data, 200);
    }

    // insert new data to 
    function index_post() {
        $data = array(
            'id_lokasi' => "",
            'nama_lokasi' => $this->input->post('nama_lokasi'),
            'longtitude' => $this->input->post('longtitude'),
            'latitude' => $this->input->post('latitude')
            );
        $insert = $this->db->insert('lokasi', $data);
        if ($insert) {
             $this->response(array("lokasi"=>array($data), "status"=>"success", 200));
        } else {
            $this->response(array("lokasi"=>array($data),'status' => 'failed', 502));
        }
    }

    // update data 
    function index_put() {
        $id_lokasi = $this->put('id_lokasi');
        $data = array(
            'id_lokasi' => $this->put('id_lokasi'),
            'nama_lokasi' => $this->put('nama_lokasi'),
            'longtitude' => $this->put('longtitude'),
            'latitude' => $this->put('latitude'));
        $this->db->where('id_lokasi', $id_lokasi);
        $update = $this->db->update('lokasi', $data);
        if ($update) {
             $this->response(array("lokasi"=>array($data), "status"=>"success", 200));
        } else {
            $this->response(array("lokasi"=>array($data),'status' => 'failed', 502));
        }
    }

    // delete 
    function index_delete() {
        $id_lokasi = $this->delete('id_lokasi');
        $this->db->where('id_lokasi', $id_lokasi);
        $delete = $this->db->delete('lokasi');
        if ($delete) {
            $this->response(array('status' => 'success'), 200);
        } else {
            $this->response(array('status' => 'failed', 502));
        }
    }
}
