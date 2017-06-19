<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer_model extends CI_Model
{

    public $table = 'customer';
    public $primary = 'no_customer';
 
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
        $this->db->like('no_customer', $cari);
	$this->db->or_like('nama', $cari);
	$this->db->or_like('alamat', $cari);
	$this->db->or_like('telp', $cari);
	$this->db->or_like('date_created', $cari);
	$this->db->or_like('date_edited', $cari);
	$this->db->or_like('email', $cari);
	$this->db->or_like('password', $cari);
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

/* End of file Customer_model.php */
/* Location: ./application/models/Customer_model.php */
/*  2016-10-09 09:55:20 */
/* Computer : Maruf */