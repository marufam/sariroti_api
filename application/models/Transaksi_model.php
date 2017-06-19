<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	function check($kode_transaksi){
		$sql=$this->db->query("select kode_transaksi, nama_project, tanggal, kode_customer from transaksi where kode_transaksi='$kode_transaksi' group by kode_transaksi");
		if($sql->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	function select_project($kode_transaksi){
		$sql=$this->db->query("select kode_transaksi, nama_project, tanggal, kode_customer from transaksi where kode_transaksi='$kode_transaksi' group by kode_transaksi");
		return $sql->result();
	}

	function select_table($kode_transaksi){
		$sql=$this->db->query("select nama_table from transaksi where kode_transaksi='$kode_transaksi' group by nama_table");
		return $sql->result();
	}

	function select_field($kode_transaksi){
		$sql=$this->db->query("select * from transaksi where kode_transaksi='$kode_transaksi'");
		return $sql->result();
	}
}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */