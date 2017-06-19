<?php

require APPPATH . '/libraries/REST_Controller.php';

class Penjualan_api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        // $this->load->model("API_Jadwal_model");
    }

    // show data 
    function index_get() {
        // $id = $this->get('id');
        $id_laporan = $this->get('id_laporan');
       

        if ($id_laporan == '') {
            $this->db->join('roti', 'roti.id_roti = penjualan.id_roti', 'left');
            $this->db->join('laporan', 'laporan.id_laporan = penjualan.id_laporan', 'left');
            //  $this->db->where('penjualan.id_laporan', $id_laporan);
            $penjualan=$this->db->get("penjualan");
            $count=$penjualan->num_rows();
            $penjualan=$penjualan->result();
        } else {
           
            $this->db->join('roti', 'roti.id_roti = penjualan.id_roti', 'left');
            $this->db->join('laporan', 'laporan.id_laporan = penjualan.id_laporan', 'left');
             $this->db->where('penjualan.id_laporan', $id_laporan);
            $penjualan=$this->db->get("penjualan");
            $count=$penjualan->num_rows();
            $penjualan=$penjualan->result();
        }
        $data = array(
            "status"=>"success",
            "jumlah"=>$count,
            "penjualan"=>$penjualan );
        
        $this->response($data, 200);
    }

    // insert new data to 
    function index_post() {
        $data = array(
            'id_laporan' => $this->input->post('id_laporan'),
            'id_roti' => $this->input->post('id_roti'),
            'jumlah_jual' => $this->input->post('jumlah_jual')
            );
        $insert = $this->db->insert('penjualan', $data);
        if ($insert) {
            $this->response(array("penjualan"=>array($data), "status"=>"success", 200));
        } else {
            $this->response(array("penjualan"=>array($data),'status' => 'failed', 502));
        }
    }

}
