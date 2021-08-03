<?php
/**
 * 
 */
class Api extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	//query untuk mengambil data produk dengan hanya status "bisa dijual"
    public function data_produk(){
        $this->db->select('* from produk where status="1"',false);
        $result = $this->db->get()->result();
        echo json_encode($result);
    }


}
?>