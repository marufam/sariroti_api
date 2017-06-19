<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Form_model extends CI_Model
{

    public $table = 'form';
    public $primary = 'id';
 
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
        $this->db->like('id', $cari);
	$this->db->or_like('id_project', $cari);
	$this->db->or_like('nama_form', $cari);
	$this->db->or_like('keterangan', $cari);
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

/* End of file Form_model.php */
/* Location: ./application/models/Form_model.php */
/*  2016-10-09 09:55:37 */
/* Computer : Maruf */