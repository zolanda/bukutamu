<?php
  class Admin extends CI_Controller{
    function __construct(){
      parent:: __construct();
      $this->load->model('Tamu');
      $this->load->model('Pegawai');
      $this->load->model('Bagian');
      $this->load->model('Pertanyaan');
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

    function listpengunjung(){
      $data['pengunjung']=$this->Tamu->getAllData();
      $data['content']='admin/pengunjung';
      $this->load->view('template/admin_template',$data);
    }
    function tambahPegawai(){
      if(isset($_POST['submit'])){
        $no_induk=$this->input->post('nip',TRUE);
        $nama_pegawai=$this->input->post('namapegawai',TRUE);
        $id_bagian=$this->input->post('bagian',TRUE);

        $insert=$this->Pegawai->insert($no_induk,$nama_pegawai,$id_bagian);
        if($insert){
          $this->session->set_flashdata(array('msg'=>'success'));
        }else{
          $this->session->set_flashdata(array('msg'=>'failed'));
        }
        header('location'.base_url('admin/pegawai/tambahpegawai'));
      }
      $data['bagian']=$this->Bagian->getAllData();
      $data['content']='admin/pegawai/tambahpegawai';
      $this->load->view('template/admin_template',$data);
    }
    function listPegawai(){
      $data['pegawai']=$this->Pegawai->getAllData();
      $data['content']='admin/pegawai/daftarpegawai';
      $this->load->view('template/admin_template',$data);
    }
    function bagian(){
      if(isset($_POST['submit'])){
        $nama_bagian=$this->input->post('namabagian',TRUE);
        $insert=$this->Bagian->insert($nama_bagian);
        if($insert){
          $this->session->set_flashdata(array('msg'=>'success'));
        }else{
          $this->session->set_flashdata(array('msg'=>'failed'));
        }
        header('location'.base_url('admin/pegawai/bagian'));
      }
      $data['bagian']=$this->Bagian->getAllData();
      $data['content']='admin/pegawai/bagian';
      $this->load->view('template/admin_template',$data);
    }
    function pertanyaan(){
      if(isset($_POST['simpanpertanyaan' ])){
        $pertanyaan=$this->input->post('pertanyaan',TRUE);
        $insert=$this->Pertanyaan->insert($pertanyaan);
        if($insert){
          $this->session->set_flashdata(array('msg'=>'success'));
        }else{
          $this->session->set_flashdata(array('msg'=>'failed'));
        }
        header('location'.base_url('admin/pertanyaan'));
      }
      $data['pertanyaan']=$this->Pertanyaan->getAllPertanyaan();
      $data['content']='admin/pertanyaan';
      $this->load->view('template/admin_template',$data);
    }
    function fetchDataPertanyaan(){
      if(!isset($_POST['idPertanyaan'])){
        echo "<script>window.history.back()</script>";
      } else {
        $idPertanyaan=$this->input->post('idPertanyaan',TRUE);
        $pertanyaan=$this->Pertanyaan->getPertanyaanById($idPertanyaan);
        echo json_encode(['pertanyaan'=>$pertanyaan]);
      }
    }
    function editPertanyaan(){
      // echo header('location'.base_url('admin/pertanyaan'));
      if(isset($_POST['update'])) {
        $pertanyaan=$this->input->post('pertanyaan',TRUE);
        $idpertanyaan=$this->input->post('ideditpertanyaan',TRUE);
        $update=$this->Pertanyaan->update($pertanyaan, $idpertanyaan);
        if($update){
          $this->session->set_flashdata(array('msg_editpertanyaan'=>'success'));
        }else{
          $this->session->set_flashdata(array('msg_editpertanyaan'=>'failed'));
        }
      }
      echo "<script>window.location.replace('".base_url()."admin/pertanyaan')</script>";
      // die('test');
    }

    function hapusPertanyaan(){
      $id=$this->input->post('hapuspertanyaan',TRUE);
      $delete=$this->Pertanyaan->hapus($id);
      if($delete){
        $this->session->set_flashdata(array('msg_delete'=>'success'));
      }else{
        $this->session->set_flashdata(array('msg_delete'=>'failed'));
      }
      // header('location'.base_url('admin/pertanyaan'));
      echo "<script>window.location.replace('".base_url()."admin/pertanyaan')</script>";

  }
    function jawaban(){
      $data['content']='admin/jawaban';
      $this->load->view('template/admin_template',$data);
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
