<?php
  class Admin extends CI_Controller{
    function __construct(){
      parent:: __construct();
      $this->load->model('AdminModel','Admin');
      $this->load->model('Tamu');
      $this->load->model('Pegawai');
      $this->load->model('Bagian');
      $this->load->model('Pertanyaan');
      $this->load->model('Jawaban');
      $this->load->library('form_validation');
      $this->load->library('session');
      if(!$this->session->userdata('masuk_admin')){
        header('Location:'.base_url().'authenticate/index');
      }
    }
    function page(){
      $this->load->view('template/admin_template');
    }
    function dashboard(){
      $data['content']='admin/dashboard';
      $this->load->view('template/admin_template',$data);
    }

    function editprofile(){
      if(isset($_POST['submit'])){
        $this->form_validation->set_rules('oldpassword','oldpassword','required|min_length[5]|max_length[18]|trim|strip_tags',array(''));
        $this->form_validation->set_rules('newpassword','newpassword','required|min_length[5]|max_length[18]|trim|strip_tags',array(''));
        $this->form_validation->set_rules('confirmpassword','confirmpassword', 'required|min_length[5]|max_length[18]|trim|strip_tags',array(''));
        if($this->form_validation->run()!=FALSE){
          $oldpass=$this->input->post('oldpassword',TRUE);
          //die(print_r($oldpass));
          $newpass=$this->input->post('newpassword',TRUE);
          // die();
          $konfirmasi=$this->input->post('confirmpassword',TRUE);
          $lama=md5($oldpass);
          $baru=md5($newpass);
          $konf=md5($konfirmasi);
          $cek=$this->Admin->cek_login($this->session->userdata('username'),$lama);
          // die(print_r($cek));
          // die();
          if($baru!=$konf){
            $this->session->set_flashdata(['msg_editprofile'=>'<div class="alert alert-danger"><p>Password Baru dan Konfirmasi Password tidak sesuai</p></div>']);
          }else if($cek==false){
            $this->session->set_flashdata(['msg_editprofile'=>'<div class="alert alert-danger"><p>Password Lama tidak sesuai</p></div>']);
          }else{
            $update=$this->Admin->updatePassword($this->session->userdata('id_admin'),$baru);
            if($update!=false){
              $this->session->set_flashdata(['msg_editprofile'=>'<div class="alert alert-success"><p>Password berhasil diubah</p></div>']);
            }else{
              $this->session->set_flashdata(['msg_editprofile'=>'<div class="alert alert-danger"><p>Password gagal dirubah</p></div>']);
            }
          }
        }else{
          $msg=array('password_validation'=>validation_errors());
          $this->session->set_flashdata($msg);
        }
        header('Location:'.base_url().'Admin/editprofile');
      }
          $data['content']='admin/profile';
          $data['nama_admin']=$this->session->username;
          $this->load->view('template/admin_template',$data);
      }
    function fetchDataPengunjungTahun(){
        if(!isset($_POST['tahun'])){
          echo "<script>window.history.back()</script>";
        }else{
          $tahun=$this->input->post('tahun',TRUE);
          $data=$this->Tamu->getTamuBySumTahun($tahun);
          echo json_encode($data);
        }
    }

    function listpengunjung(){
      $data['pengunjung']=$this->Tamu->getAllData();
      $data['content']='admin/pengunjung';
      $this->load->view('template/admin_template',$data);
    }

}
  ?>
