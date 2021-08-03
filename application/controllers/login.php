<?php
/**
 * 
 */
class Login extends CI_Controller
{
  
      function __construct()
      {
        parent::__construct();
        $this->load->model('m_admin');
      }

      public function index(){
        
        $this->load->view('v_login');
      }

      public function dologin(){
          $username = $this->input->post('username');
          $password = md5($this->input->post('password'));

              $query = $this->m_admin->get_data_admin();
              $query = $query->result();

              if($this->m_admin->get_data_admin()->num_rows()>0){
                 $data=$this->m_admin->get_data_admin()->result();
                 // var_dump($data);
                 // echo $data[0]->id_admin;
                 // die();
                  $array=array(
                      'status'=> TRUE,
                      'id_admin'=>$data[0]->id_admin,
                      'username'=>$data[0]->username,
                      'password'=>$data[0]->password,
                  );
                  $this->session->set_userdata($array);
                  $this->session->set_flashdata('pesan', 'Sukses Login');
                  // var_dump($array);
                  // die();
                  redirect('produk','refresh');
              }else{
                  $this->session->set_flashdata('pesan_gagal','Username Atau Password Yang Anda Masukkan Salah');
                  redirect('login','refresh');
              }

      }

      public function do_logout(){
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
    }

?>