<?php

/**
 * 
 */
class Customer extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model('m_customer');
	}

	public function index(){
		$data = array(
			'data_customer' => $this->m_customer->data_customer_all()->result(),
			'view' => 'v_customer',
		 );
		$this->load->view('v_template',$data);
	}

	//untuk mengambil detail customer berdasarkan id customer yang diambil
	public function detail_customer($id){
		$data = $this->m_customer->data_customer_detail($id);
		echo json_encode($data);
	}

	//proses tambah customer
	public function add_customer(){
		
		$this->m_customer->add_customer();
		$this->session->set_flashdata('pesan_sukses', 'Sukses Menambah Customer');
		$this->session->set_flashdata('pesan_gagal', 'Gagal Menambah Customer');
		redirect('customer','refresh');
		
	}

	//proses tambah customer
	public function edit_customer(){
		
		$this->m_customer->edit_customer();
		$this->session->set_flashdata('pesan_sukses', 'Sukses Menambah Customer');
		$this->session->set_flashdata('pesan_gagal', 'Gagal Menambah Customer');
		redirect('customer','refresh');
		
	}

	//untuk menghapus customer berdasarkan id customer yang diambil
	public function delete_customer(){
		$this->m_customer->delete_customer();
		$this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Customer');
		$this->session->set_flashdata('pesan_gagal', 'Gagal Menghapus Customer');
		redirect('customer','refresh');
	}
}

?>