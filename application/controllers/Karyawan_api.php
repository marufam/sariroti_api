<?php

require APPPATH . '/libraries/REST_Controller.php';

class Karyawan_api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model("API_Karyawan_model");
    }

    // show data 
    function index_get() {
        $id = $this->get('id');
        

        if ($id == '') {

            $karyawan=$this->db->get("karyawan")->result();

        } else {
           
            $this->db->where('id_karyawan', $id);
            $karyawan=$this->db->get("karyawan")->result();
            
        }
         $data = array(
            "status"=>"success",
            "jumlah"=>$this->API_Karyawan_model->total_rows(),
            "karyawan"=> $karyawan);
        $this->response($data, 200);
    }

    // insert new data to 
    function index_post() {
        if($this->post('action')=="POST"){
            $data = array(
                'id_karyawan' => "",
                'nama_karyawan' => $this->post('nama_karyawan'),
                'tempat_lahir' => $this->post('tempat_lahir'),
                'tgl_lahir' => $this->post('tgl_lahir'),
                'alamat' => $this->post('alamat'),
                'jk' => $this->post('jk'),
                'username' => $this->post('username'),
                'password' => $this->post('password'),
                'foto' => date('d-m-Y-s-h-i').".png"
                );
                if(!empty($_FILES)){
                $path = $_FILES['foto']['tmp_name'];
                move_uploaded_file($path,"upload/karyawan/".$data['foto']);
                
            }
            $insert = $this->db->insert('karyawan', $data);
            if ($insert) {
                $this->response(array("karyawan"=>array($data), "status"=>"success", 200));
            } else {
                $this->response(array("karyawan"=>array($data),'status' => 'failed', 502));
            }
        }elseif($this->post('action')=="PUT"){
                $id_karyawan = $this->post('id_karyawan');
                
                    $data = array(
                    'id_karyawan' => $this->post('id_karyawan'),
                    'nama_karyawan' => $this->post('nama_karyawan'),
                    'tempat_lahir' => $this->post('tempat_lahir'),
                    'tgl_lahir' => $this->post('tgl_lahir'),
                    'alamat' => $this->post('alamat'),
                    'jk' => $this->post('jk'),
                    'username' => $this->post('username'),
                    'password' => $this->post('password'),
                    );
                    
                    $this->db->where('id_karyawan', $id_karyawan);
                    $update = $this->db->update('karyawan', $data);
                    if ($update) {
                    $this->response(array("karyawan"=>array($data), "status"=>"success", 200));
                    } else {
                        $this->response(array("karyawan"=>array($data),'status' => 'failed', 502));
                    }
                
        }elseif($this->post('action')=="foto"){
            $id_karyawan = $this->post('id_karyawan');
            $data = array(
                    'id_karyawan' => $this->post('id_karyawan'),
                    'nama_karyawan' => $this->post('nama_karyawan'),
                    'tempat_lahir' => $this->post('tempat_lahir'),
                    'tgl_lahir' => $this->post('tgl_lahir'),
                    'alamat' => $this->post('alamat'),
                    'jk' => $this->post('jk'),
                    'username' => $this->post('username'),
                    'password' => $this->post('password'),
                    'foto' => date('d-m-Y-s-h-i').".png");
                    if(!empty($_FILES)){
                    $path = $_FILES['foto']['tmp_name'];
                    move_uploaded_file($path,"upload/karyawan/".$data['foto']);
                    
                    }
                    $this->db->where('id_karyawan', $id_karyawan);
                    $update = $this->db->update('karyawan', $data);
                    if ($update) {
                    $this->response(array("karyawan"=>array($data), "status"=>"success", 200));
                    } else {
                        $this->response(array("karyawan"=>array($data),'status' => 'failed', 502));
                    }
        }
    }

    // update data 
    function index_put() {
        $id_karyawan = $this->put('id_karyawan');
        $data = array(
            'id_karyawan' => $this->put('id_karyawan'),
            'nama_karyawan' => $this->put('nama_karyawan'),
            'nama_karyawan' => $this->put('nama_karyawan'),
            'tempat_lahir' => $this->put('tempat_lahir'),
            'tgl_lahir' => $this->put('tgl_lahir'),
            'alamat' => $this->put('alamat'),
            'jk' => $this->put('jk'),
            'username' => $this->put('username'),
            'password' => $this->put('password'),
            'foto' => $this->put('foto'));
        $this->db->where('id_karyawan', $id_karyawan);
        $update = $this->db->update('karyawan', $data);
        if ($update) {
          $this->response(array("karyawan"=>array($data), "status"=>"success", 200));
        } else {
            $this->response(array("karyawan"=>array($data),'status' => 'failed', 502));
        }
    }

    // delete 
    function index_delete() {
        $id_karyawan = $this->delete('id_karyawan');
        $this->db->where('id_karyawan', $id_karyawan);
        $delete = $this->db->delete('karyawan');
        if ($delete) {
            $this->response(array('status' => 'success'), 200);
        } else {
            $this->response(array('status' => 'failed', 502));
        }
    }
}
