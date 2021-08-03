<?php
/**
 * 
 */
class M_admin extends CI_Model
{
	//get all data admin
	public function data_admin_all(){
        $this->db->select('*');
        $this->db->from('admin');
        return $this->db->get();
    }

	//detail data admin
	public function get_data_admin(){
        $password = md5($this->input->post('password'));
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username = "'.$this->input->post("username").'" and password="'.$password.'"');
        return $this->db->get();
    }

    //detail data admin
	public function data_admin_detail($a){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id_admin = "'.$a.'"');
        return $this->db->get()->row();
    }

    //proses untuk menambah admin baru
    public function add_admin(){
    	$data = array(
    		'nama' 			=> $this->input->post('nama'),
    		'username'		=> $this->input->post('username'),
    		'password'		=> md5($this->input->post('password')),
    	);
    	$this->db->insert('admin',$data);
    	if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }

    }

    //proses untuk mengubah admin berdasarkan id admin yang diambil
    public function edit_admin(){
    	$id_admin = $this->input->post('id_admin');
    	if ($this->input->post('password') != null) {
	    	$data = array(
	    		'nama' 			=> $this->input->post('nama'),
	    		'username'		=> $this->input->post('username'),    		
	    		'password'		=> md5($this->input->post('password')),
	    	);
    	}else{
    		$data = array(
	    		'nama' 			=> $this->input->post('nama'),
	    		'username'		=> $this->input->post('username'),    		
	    	);
    	}
    	$this->db->update("admin", $data, array("id_admin" => $id_admin));
    	if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }

    }

    // proses untuk menghapus admin berdasarkan id admin yang diambil 
    public function delete_admin(){
    	$id_admin = $this->input->post('id_admin');
    	$this->db->delete("admin", array("id_admin" => $id_admin));
    }

}
?>