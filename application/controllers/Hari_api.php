<?php

require APPPATH . '/libraries/REST_Controller.php';

class Hari_api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model("API_Hari_model");
    }

    // show data 
    function index_get() {
        $id = $this->get('id_hari');

        if ($id == '') {
            
            $hari=$this->db->get("hari")->result();

        } else {

            $this->db->where('hari.id_hari', $id);
            $hari=$this->db->get("hari")->result();
            
        }
        $data = array(
            "status"=>"success",
            "jumlah"=>$this->API_Hari_model->total_rows(),
            "hari"=> $hari);

        $this->response($data, 200);
    }

    // insert new data to 
    function index_post() {
        if($this->post('action')=="POST"){
                
        $data = array(
            'id_hari' => "",
            'hari' => $this->post('hari')
            );
            
        $insert = $this->db->insert('hari', $data);
        $row1=$this->db->query("select * from hari order by id_hari DESC")->row();
        if ($insert) {
            $this->response(array("hari"=> array($row1), "status"=>"success", 200));
        } else {
            $this->response(array("hari"=>array($row1),'status' => 'failed', 502));
        }
        }elseif($this->post('action')=="PUT"){
            $id_hari = $this->post('id_hari');
        $data = array(
            'id_hari' => $this->post('id_hari'),
            'hari' => $this->post('hari'));
        $this->db->where('id_hari', $id_hari);
        
        $update = $this->db->update('hari', $data);
        $row1=$this->db->query("select * from hari order by id_hari DESC")->row();
        if ($update) {
            $this->response(array("hari"=>array($row1), "status"=>"success", 200));
        } else {
            $this->response(array("hari"=>array($row1),'status' => 'failed', 502));
        }
        }
       
    }


    // delete 
    function index_delete() {
        $id_hari= $this->delete('id_hari');
        $this->db->where('id_hari', $id_hari);
        $delete = $this->db->delete('hari');
        if ($delete) {
            $this->response(array('status' => 'success'), 200);
        } else {
            $this->response(array('status' => 'failed', 502));
        }
    }
}
