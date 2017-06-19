<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Field_data_model extends CI_Model
{

    public $table = 'field_data';
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
	$this->db->or_like('id_form', $cari);
	$this->db->or_like('nama_field', $cari);
	$this->db->or_like('interface', $cari);
	$this->db->or_like('field_unique', $cari);
	$this->db->or_like('data_type', $cari);
	$this->db->or_like('field_length', $cari);
	$this->db->or_like('field_unsigned', $cari);
	$this->db->or_like('field_allow_null', $cari);
	$this->db->or_like('field_default', $cari);
	$this->db->or_like('adddate', $cari);
	$this->db->or_like('editdate', $cari);
	$this->db->or_like('deletedate', $cari);
	$this->db->or_like('tabletype', $cari);
	$this->db->or_like('sub_table_name', $cari);
	$this->db->or_like('sub_field_name', $cari);
	$this->db->or_like('sub_jenis', $cari);
	$this->db->or_like('alias_name', $cari);
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
    function updatedelete($id){
        $this->db->query("update field_data set deletedate='".date('d-m-Y')."' where id='$id'");
    }
    function delete($id)
    {
        $this->db->where($this->primary, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Field_data_model.php */
/* Location: ./application/models/Field_data_model.php */
/*  2016-10-09 09:55:32 */
/* Computer : Maruf */