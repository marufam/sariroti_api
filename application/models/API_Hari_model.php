<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class API_Hari_model extends CI_Model
{

    public $table = 'hari';
    public $primary = 'id_hari';
 
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

}

/*  2017-04-27 09:55:20 */
/* Computer : Maruf */