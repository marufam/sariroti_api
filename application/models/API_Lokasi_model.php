<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class API_Lokasi_model extends CI_Model
{

    public $table = 'lokasi';
    public $primary = 'id_lokasi';
 
    function __construct()
    {
        parent::__construct();
    }

   
    function selectByAll()
    {
        return $this->db->get($this->table)->result();
    }

    function selectById($id)
    {
        $this->db->where($this->primary, $id);
        return $this->db->get($this->table)->row();
    }
    
    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_limit_data($limit, $start = 0, $cari = NULL) {
        $this->db->like('id_lokasi', $cari);
        $this->db->or_like('nama_lokasi', $cari);
        $this->db->or_like('longtitude', $cari);
        $this->db->or_like('latitude', $cari);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update($id, $data)
    {
        $this->db->where($this->primary, $id);
        $this->db->update($this->table, $data);
    }

    function delete($id)
    {
        $this->db->where($this->primary, $id);
        $this->db->delete($this->table);
    }

}

/*  2017-04-27 09:55:20 */
/* Computer : Maruf */