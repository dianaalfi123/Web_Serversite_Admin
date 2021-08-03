<?php
/**
 * 
 */
class M_produk extends CI_Model
{
	
	//query untuk mengambil semua data produk
	public function data_produk_all(){
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get();
    }
    //query untuk mengambil data produk dengan hanya status "bisa dijual"
    public function data_produk_bisa_dijual(){
        $this->db->select('* from produk where status="1"',false);
        return $this->db->get();
    }
    //query untuk mengambil data detail produk berdasarkan id produk yang diambil
    public function data_produk_detail($a){
        $this->db->select('* from produk where id_produk="'.$a.'"',false);
        return $this->db->get()->row();
    }
    //proses untuk menambah produk baru
    public function add_produk(){
    	$gambar = $_FILES['berkas']['name'];
    	$nama_produk = $this->input->post('nama');
    	$data_produk = $this->db->select('* from produk',false);
    	$data_produk = $this->db->get()->result();
    	$data_nama_produk = array();
    	$ada = '';
    	$ada2 = '';
    	foreach ($data_produk as $key => $value) {
    		$data_nama_produk = $value->{'nama'};
    		// echo $value->{'nama'};
    		if (strtolower($nama_produk) == strtolower($data_nama_produk)) {
    			$ada .= ","."ada";

	    	}else{
	    		$ada2 .= '';
	    	}
    	}
    	echo $ada;
    	echo "<br>";
    	echo "<br>";
    	if (strpos($ada , ","."ada") !== false) {
    		// echo "tidak ya";
    		echo '<script>alert("Maaf Nama produk yang Anda input telah ada!")</script>';
    		return FALSE;
    	}else{
    		// echo "oke lanjut";
    		// echo "<br>";
    		// echo "<br>";
    		$data = array(
		    		'nama' 		=> $this->input->post('nama'),
		    		'harga'				=> $this->input->post('harga'),
		    		'status'			=> $this->input->post('status'),
		    		'gambar'				=> $gambar,
		    		'deskripsi'				=> $this->input->post('deskripsi'),
		    	);
		    	$this->db->insert('produk',$data);
		    	if($this->db->affected_rows()>0){
		            return TRUE;
		        }else{
		            return FALSE;
		        }
    		
    	}
    	// var_dump($data_nama_produk);

    	

    	die();
    	

    }
    //proses untuk mengubah produk berdasarkan id produk yang diambil
    public function edit_produk(){
    	$id_produk = $this->input->post('id_produk');
    	$gambar = $_FILES['berkas']['name'];
    	$data = array(
    		'nama' 		=> $this->input->post('nama'),
    		'harga'				=> $this->input->post('harga'),
    		'status'			=> $this->input->post('status'),
    		'gambar'				=> $gambar,
    		'deskripsi'				=> $this->input->post('deskripsi'),
    	);
    	$this->db->update("produk", $data, array("id_produk" => $id_produk));
    	if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }

    }
    public function edit_produk_without_gambar(){
    	$id_produk = $this->input->post('id_produk');
    	$data = array(
    		'nama' 		=> $this->input->post('nama'),
    		'harga'				=> $this->input->post('harga'),
    		'status'			=> $this->input->post('status'),
    		'deskripsi'				=> $this->input->post('deskripsi'),
    	);
    	$this->db->update("produk", $data, array("id_produk" => $id_produk));
    	if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }

    }
    // proses untuk menghapus produk berdasarkan id produk yang diambil 
    public function delete_produk(){
    	$id_produk = $this->input->post('id_produk');
    	$this->db->delete("produk", array("id_produk" => $id_produk));
    }
}
?>