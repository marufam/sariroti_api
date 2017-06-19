<?php

require APPPATH . '/libraries/REST_Controller.php';

class Laporan_api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model("API_Laporan_model");
    }

    // show data 
    function index_get() {
        $id = $this->get('id_karyawan');

        if ($id == '') {
            
            $this->db->join('jadwal', 'jadwal.id_jadwal = laporan.id_jadwal_laporan', 'left');
            $this->db->join('karyawan', 'karyawan.id_karyawan = jadwal.id_karyawan', 'left');
            $this->db->join('lokasi', 'lokasi.id_lokasi = jadwal.id_lokasi', 'left');
            $laporan=$this->db->get("laporan")->result();

        } else {
            $this->db->join('jadwal', 'jadwal.id_jadwal = laporan.id_jadwal_laporan', 'left');
            $this->db->join('karyawan', 'karyawan.id_karyawan = jadwal.id_karyawan', 'left');
            $this->db->join('lokasi', 'lokasi.id_lokasi = jadwal.id_lokasi', 'left');
            $this->db->where('karyawan.id_karyawan', $id);
            $laporan=$this->db->get("laporan")->result();
            
        }
        $data = array(
            "status"=>"success",
            "jumlah"=>$this->API_Laporan_model->total_rows(),
            "laporan"=> $laporan);

        $this->response($data, 200);
    }

    // insert new data to 
    function index_post() {
        if($this->post('action')=="POST"){
                
        $data = array(
            'id_laporan' => "",
            'id_jadwal_laporan' => $this->post('id_jadwal_laporan'),
            'foto_laporan' => date('d-m-Y-s-h-i').".png",
            'deskripsi' => $this->post('deskripsi'),
            'status' => $this->post('status')
            );
            if(!empty($_FILES)){
                $path = $_FILES['foto_laporan']['tmp_name'];
                move_uploaded_file($path,"upload/laporan/".date('d-m-Y-s-h-i').".png");
                
            }
            
        $insert = $this->db->insert('laporan', $data);
        $row1=$this->db->query("select * from laporan order by id_laporan DESC")->row();
        if ($insert) {
            $this->response(array("laporan"=> array($row1), "status"=>"success", 200));
        } else {
            $this->response(array("laporan"=>array($row1),'status' => 'failed', 502));
        }
        }elseif($this->post('action')=="PUT"){
            $id_jadwal_laporan = $this->post('id_laporan');
        $data = array(
            'id_laporan' => $this->post('id_laporan'),
            'id_jadwal_laporan' => $this->post('id_jadwal_laporan'),
            'foto_laporan' => date('d-m-Y-s-h-i').".png",
            'deskripsi' => $this->post('deskripsi'),
            'status' => $this->post('status'));
        $this->db->where('id_jadwal_laporan', $id_jadwal_laporan);
        if(!empty($_FILES)){
                $path = $_FILES['foto_laporan']['tmp_name'];
                move_uploaded_file($path,"upload/laporan/".$data['foto_laporan']);
                
            }
        $update = $this->db->update('laporan', $data);
        $row1=$this->db->query("select * from laporan order by id_laporan DESC")->row();
        if ($update) {
            $this->response(array("laporan"=>array($row1), "status"=>"success", 200));
        } else {
            $this->response(array("laporan"=>array($row1),'status' => 'failed', 502));
        }
        }
       
    }

    // update data 
    function index_put() {
        $id_jadwal_laporan = $this->post('id_jadwal_laporan');
        $data = array(
            'id_jadwal_laporan' => $this->post('id_jadwal_laporan'),
            'id_jadwal' => $this->post('id_jadwal'),
            'foto_laporan' => date('d-m-Y').".png",
            'deskripsi' => $this->post('deskripsi'),
            'status' => $this->post('status'));
        $this->db->where('id_jadwal_laporan', $id_jadwal_laporan);
        if(!empty($_FILES)){
                $path = $_FILES['foto_laporan']['tmp_name'];
                move_uploaded_file($path,"upload/".$data['foto_laporan']);
                
            }
        $update = $this->db->update('Laporan', $data);
        if ($update) {
            $this->response(array("laporan"=>array($data), "status"=>"success", 200));
        } else {
            $this->response(array("laporan"=>array($data),'status' => 'failed', 502));
        }
    }

    // delete 
    function index_delete() {
        $id_jadwal_laporan = $this->delete('id_jadwal_laporan');
        $this->db->where('id_jadwal_laporan', $id_jadwal_laporan);
        $delete = $this->db->delete('Laporan');
        if ($delete) {
            $this->response(array('status' => 'success'), 200);
        } else {
            $this->response(array('status' => 'failed', 502));
        }
    }
}
