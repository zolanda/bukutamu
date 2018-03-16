<?php
  class Authenticate extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->model('admin');
    }
    public function index(){
      if($this->session->userdata('masuk_admin')){
        header('Location:'.base_url().'admin/dashboard');
      }
       $this->load->view('admin/login');
    }
    public function login(){
     if($this->session->userdata('masuk_admin')){
       header('Location:'.base_url().'admin/dashboard');
     }
     if(isset($_POST['username'])){
       $username=$this->input->post('username',true);
       $password=md5($this->input->post('password',true));
       $login=$this->admin->cek_login($username, $password);
       if($login!=FALSE){
         $session=array(
           'id'=>$login['id_admin'],
           'username'=>$username,
           'masuk_admin'=>true //untuk cek, masuknya benar atau tidak
         );
         $this->session->set_userdata($session);
         header('Location:'.base_url().'admin/dashboard');
       }else{
         $session=array(
           'masuk_admin'=>false
         );
         $this->session->set_userdata($session);
         header('Location:'.base_url().'authenticate/index');
       }
     }
    }

    public function logout(){
      session_destroy();
      header('Location:'.base_url().'authenticate/index');
    }

}
 ?>
