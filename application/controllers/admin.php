<?php

/**
 * 
 */
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model('m_admin');
	}

	public function index(){
		$data = array(
			'data_admin' => $this->m_admin->data_admin_all()->result(),
			'view' => 'v_admin',
		 );
		$this->load->view('v_template',$data);
	}

	//untuk mengambil detail admin berdasarkan id admin yang diambil
	public function detail_admin($id){
		$data = $this->m_admin->data_admin_detail($id);
		echo json_encode($data);
	}

	//proses tambah admin
	public function add_admin(){
		
		$this->m_admin->add_admin();
		$this->session->set_flashdata('pesan_sukses', 'Sukses Menambah Admin');
		$this->session->set_flashdata('pesan_gagal', 'Gagal Menambah Admin');
		redirect('admin','refresh');
		
	}

	//proses tambah admin
	public function edit_admin(){
		
		$this->m_admin->edit_admin();
		$this->session->set_flashdata('pesan_sukses', 'Sukses Menambah Admin');
		$this->session->set_flashdata('pesan_gagal', 'Gagal Menambah Admin');
		redirect('admin','refresh');
		
	}

	//untuk menghapus admin berdasarkan id admin yang diambil
	public function delete_admin(){
		$this->m_admin->delete_admin();
		$this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Admin');
		$this->session->set_flashdata('pesan_gagal', 'Gagal Menghapus Admin');
		redirect('admin','refresh');
	}
}

?>