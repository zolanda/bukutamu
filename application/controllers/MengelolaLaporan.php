<?php
  class MengelolaLaporan extends CI_Controller{
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
      function laporanHarian(){
      $data['content']='admin/laporan/harian';
      $this->load->view('template/admin_template',$data);
    }

    function laporanBulanan(){
      $data['content']='admin/laporan/bulanan';
      $this->load->view('template/admin_template',$data);
    }

    function laporanTahunan(){
      $data['content']='admin/laporan/tahunan';
      $this->load->view('template/admin_template',$data);
    }
    function laporanCustom(){
      $data['content']='admin/laporan/custom';
      $this->load->view('template/admin_template',$data);
    }
  }
  ?>
