<?php
  class Admin extends CI_Controller{
    function __construct(){
      parent:: __construct();
      $this->load->model('Tamu');
      $this->load->model('Pegawai');
      $this->load->model('Bagian');
      $this->load->model('Pertanyaan');
      $this->load->model('Jawaban');
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
      $data['content']='admin/profile';
      $this->load->view('template/admin_template',$data);
    }
    function listpengunjung(){
      $data['pengunjung']=$this->Tamu->getAllData();
      $data['content']='admin/pengunjung';
      $this->load->view('template/admin_template',$data);
    }
    
  }
  ?>
