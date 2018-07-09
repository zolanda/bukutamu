<?php
// include APPPATH.'libraries/PHPPDF/Pdf.php';
class ResetPassword extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('AdminModel','admin');
    $this->load->library('email');
  }

  public function index(){
    if(isset($_POST['email'])){
      $email=$this->input->post('email',TRUE);
      $cekemail=$this->admin->getAdminByEmail($email);
      if($cekemail!=FALSE){
        $token=md5(md5(rand(10,10000000000)));
        $updatetoken=$this->admin->updateToken($token,$email);
        if($updatetoken!=FALSE){
          $message="
          <h3>Reset Password</h3>
          <p>Untuk mereset password anda, silahkan klik link dibawah ini</p>
          <a href='".base_url()."reset/".$token."'>Reset disini</a>
          ";
          $kirim=$this->sendEmail('azolanda@gmail.com',$message);
          if ($kirim['success']){
            $respon['success']=true;
            $respon['pesan']="Email berhasil dikirim, silakan cek Inbox/Spam Email Anda!";
          }else{
            $respon['success']=true;
            $respon['pesan']=$kirim['error'];
          }
        }
      }else{
        $response['success']=false;
        $respon['pesan']="Email tidak ditemukan di daftar admin";
      }
    echo json_encode($respon);
    }

    $this->sendEmail('azolanda@gmail.com','halo zolaaa');
  }

  private function sendEmail($email,$isi){
     $subjek = "reset password bukutamu";
     $this->load->library('email');
     $this->email->set_newline("\r\n");
     $this->email->from('bukutamu.system@gmail.com'); //change it
     $this->email->to($email); //change it
     $this->email->subject($subjek);
     $this->email->message($isi);
     if ($this->email->send())
     {
        $data['success'] = true;
     }
     else
     {
        $data['success'] = false;
        $data['error'] = $this->email->print_debugger(array(
           'headers'
        ));
     }
     return $data;
  }
}
?>
