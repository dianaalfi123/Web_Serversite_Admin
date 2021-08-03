<?php
class Penjualan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model('m_penjualan');
	}

	public function index(){
		$data = array(
			'data_penjualan' => $this->m_penjualan->data_penjualan_all()->result(),
			'view' => 'v_penjualan',
		 );
		$this->load->view('v_template',$data);
	}
	public function penjualan_detail(){
		$data = array(
			'data_penjualan' => $this->m_penjualan->data_penjualan_detail()->result(),
			'view' => 'v_penjualan_detail',
		 );
		$this->load->view('v_template',$data);
	}

}
?>