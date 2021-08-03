<?php
/**
 * 
 */
class Produk extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model('m_produk');
	}

	public function index(){
		$data = array(
			'data_produk' => $this->m_produk->data_produk_all()->result(),
			'data_produk_bisa_dijual' => $this->m_produk->data_produk_bisa_dijual()->result(),
			'view' => 'v_produk',
		 );
		$this->load->view('v_template',$data);
	}

	//proses tambah produk
	public function add_produk(){
		$name_picture = $_FILES;
		// echo $name_picture;
		// die();
		// ambil data file
		$namaFile = $_FILES['berkas']['name'];
		$namaSementara = $_FILES['berkas']['tmp_name'];

		// tentukan lokasi file akan dipindahkan
		$dirUpload = "assets/img_produk/";
		// echo $namaSementara; //C:\xampp\tmp\phpB321.tmp
		// pindahkan file
		$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
		if ($terupload) {
			$this->m_produk->add_produk();
			$this->session->set_flashdata('pesan_sukses', 'Sukses Menambah Produk');
			$this->session->set_flashdata('pesan_gagal', 'Gagal Menambah Produk');
			redirect('produk','refresh');
		}else{
			$this->session->set_flashdata('pesan_gagal', 'Gagal Menyimpan Gambar');
		}
	}
	//untuk mengambil detail produk berdasarkan id produk yang diambil
	public function detail_produk($id){
		$data = $this->m_produk->data_produk_detail($id);
		echo json_encode($data);
	}

	//untuk mengubah produk berdasarkan id produk yang diambil
	public function edit_produk(){
		$name_picture = $_FILES['berkas']['name'];
		// ambil data file
		$namaFile = $_FILES['berkas']['name'];
		$namaSementara = $_FILES['berkas']['tmp_name'];

		// tentukan lokasi file akan dipindahkan
		$dirUpload = "assets/img_produk/";
		// echo $namaSementara; //C:\xampp\tmp\phpB321.tmp
		// pindahkan file
		$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
		if ($this->input->post('newgambar') != null) {
			if ($terupload) {
				$this->m_produk->edit_produk();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Mengubah Produk');
				$this->session->set_flashdata('pesan_gagal', 'Gagal Mengubah Produk');
				redirect('produk','refresh');
			}else{
				$this->session->set_flashdata('pesan_gagal', 'Gagal Menyimpan Gambar');
			}
		}else {
				$this->m_produk->edit_produk_without_gambar();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Mengubah Produk');
				$this->session->set_flashdata('pesan_gagal', 'Gagal Mengubah Produk');
				redirect('produk','refresh');
		}
		
	}
	//untuk menghapus produk berdasarkan id produk yang diambil
	public function delete_produk(){
		$this->m_produk->delete_produk();
		$this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Produk');
		$this->session->set_flashdata('pesan_gagal', 'Gagal Menghapus Produk');
		redirect('produk','refresh');
	}
}
?>