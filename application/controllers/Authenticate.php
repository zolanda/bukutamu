<?php
  class Authenticate extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->model('AdminModel','admin');
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
           'masuk_admin'=>true, //untuk cek, masuknya benar atau tidak
           'nama_user'=>$login['nama_admin'],
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
    public function forget_password(){
      $this->form_validation->set_rules('email','Email Address','xss_clean|required|valid_email|callback_reset_password');
    if($this->form_validation->run() == FALSE){
    $this->load->view('account/forget_password');
    }else{
        //send an email
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->from('me@gmail.com', 'Raju');
        $this->email->to('azolanda@gmail.com');
        $this->email->subject('Email my');
        $key = 1234567;
        $message = "Please click this url to change your password ". base_url()."reset_now/".$key ;
        $message .="<br/>Thank you very much";
        $this->email->message($message);
        if($this->email->send())
              {
              echo 'Please check your email to reset password.';
            }else{
              show_error($this->email->print_debugger());
            }
        }
    }
    function reset_password($email){
      $query=$this->db->get_where('members',array('email'=>$email));
      if(!$query->num_rows()>0){
        $this->form_validation->set_message('forget_email_check', 'The %s does not exists in our database');
        return FALSE;
    }else{
      echo '<br/>'. $email.'<br/>';
    }
    }
}
 ?>
