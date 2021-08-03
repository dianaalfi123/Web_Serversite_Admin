<?php
/**
 * 
 */
class M_penjualan extends CI_Model
{
	//get all data penjualan
	public function data_penjualan_all(){
        $this->db->select('*');
        $this->db->from('penjualan');
        return $this->db->get();
    }

    //get all data penjualan detail
	public function data_penjualan_detail($a){
        $this->db->select('*');
        $this->db->from('penjualan_detail');
        $this->db->where('id_penjualan = "'.$a.'"');
        return $this->db->get()->row();
    }

 }
 ?>