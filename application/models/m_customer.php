<?php
/**
 * 
 */
class M_customer extends CI_Model
{
	//get all data customer
	public function data_customer_all(){
        $this->db->select('*');
        $this->db->from('customer');
        return $this->db->get();
    }

	//detail data customer
	public function get_data_customer(){
        $password = md5($this->input->post('password'));
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('username = "'.$this->input->post("username").'" and password="'.$password.'"');
        return $this->db->get();
    }

    //detail data customer
	public function data_customer_detail($a){
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('id_customer = "'.$a.'"');
        return $this->db->get()->row();
    }

    //proses untuk menambah customer baru
    public function add_customer(){
    	$data = array(
    		'nama' 			=> $this->input->post('nama'),
    		'username'		=> $this->input->post('username'),
    		'password'		=> md5($this->input->post('password')),
            'alamat'        => $this->input->post('alamat'),
    	);
    	$this->db->insert('customer',$data);
    	if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }

    }

    //proses untuk mengubah customer berdasarkan id customer yang diambil
    public function edit_customer(){
    	$id_customer = $this->input->post('id_customer');
    	if ($this->input->post('password') != null) {
	    	$data = array(
	    		'nama' 			=> $this->input->post('nama'),
	    		'username'		=> $this->input->post('username'),    		
	    		'password'		=> md5($this->input->post('password')),
                'alamat'        => $this->input->post('alamat'),
	    	);
    	}else{
    		$data = array(
	    		'nama' 			=> $this->input->post('nama'),
	    		'username'		=> $this->input->post('username'),
                'alamat'        => $this->input->post('alamat'),    		
	    	);
    	}
    	$this->db->update("customer", $data, array("id_customer" => $id_customer));
    	if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }

    }

    // proses untuk menghapus customer berdasarkan id customer yang diambil 
    public function delete_customer(){
    	$id_customer = $this->input->post('id_customer');
    	$this->db->delete("customer", array("id_customer" => $id_customer));
    }

}
?>