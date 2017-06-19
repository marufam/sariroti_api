<?php

require APPPATH . '/libraries/REST_Controller.php';

class Roti_api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        // $this->load->model("API_Karyawan_model");
    }

    // show data 
    function index_get() {
        $id = $this->get('id');
        

        if ($id == '') {

            $roti=$this->db->get("roti");
            $count=$roti->num_rows();
            $roti=$roti->result();

        } else {
           
            $this->db->where('id_roti', $id);
            $roti=$this->db->get("roti");
            $count=$roti->num_rows();
            $roti=$roti->result();
            
        }
         $data = array(
            "status"=>"success",
            "jumlah"=>$count,
            "roti"=> $roti);
        $this->response($data, 200);
    }

    
}
