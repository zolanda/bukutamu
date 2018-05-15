<?php
  class MengelolaPegawai extends CI_Controller{
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
    function fetchDataPegawai(){
      if(!isset($_POST['nomorinduk'])){
        echo "<script>window.history.back()</script>";
      } else {
        $no_induk=$this->input->post('nomorinduk',TRUE);
        $pegawai=$this->Pegawai->getPegawaiById($no_induk);

        echo json_encode(['pegawai'=>$pegawai]);
      }
    }
    function editPegawai(){
      if(isset($_POST['updatePegawai'])) {
        $nomorinduk=$this->input->post('nomorinduk',TRUE);
        $pegawai=$this->input->post('nama_pegawai',TRUE);
        // $bagian=$this->input->post('bagian',TRUE);
        $updatePegawai=$this->Pegawai->update($nomorinduk, $pegawai);
        if($updatePegawai){
          $this->session->set_flashdata(array('msg_editpertanyaan'=>'success'));
        }else{
          $this->session->set_flashdata(array('msg_editpertanyaan'=>'failed'));
        }
      }
      echo "<script>window.location.replace('".base_url()."admin/listpegawai')</script>";
      // die('test');
    }
    function hapusPegawai(){
      $id=$this->input->post('hapuspegawai',TRUE);
      $delete=$this->Pegawai->hapus($id);
      if($delete){
        $this->session->set_flashdata(array('msg_delete'=>'success'));
      }else{
        $this->session->set_flashdata(array('msg_delete'=>'failed'));
      }
      // header('location'.base_url('admin/pertanyaan'));
      echo "<script>window.location.replace('".base_url()."admin/listpegawai')</script>";
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
    function fetchBagian(){
      if(!isset($_POST['idBagian'])){
        echo "<script>window.history.back()</script>";
      }else{
        $idBagian=$this->input->post('idBagian',TRUE);
        $bagian=$this->Bagian->getBagianById($idBagian);
        echo json_encode(['bagian'=>$nama_bagian]);
      }
    }
    function editBagian(){
      if(isset($_POST['updateBagian'])){
        // $idbagian=$this->input->post('ideditbagian',TRUE);
        $namabagian=$this->input->post('detailbagian',TRUE);
        $update=$this->Bagian->update($id,$namabagian);
        if($update){
          $this->session->set_flashdata(array('msg_editbagian'=>'success'));
        }else{
          $this->session->set_flashdata(array('msg_editbagian'=>'failed'));
        }
      }echo "<script>window.location.replace('".base_url()."admin/pegawai/bagian')</script>";
    }

    function hapusBagian(){
      $id=$this->input->post('hapusbagian',TRUE);
      $delete=$this->Bagian->hapus($id);
      if($delete){
        $this->session->set_flashdata(array('msg_delete'=>'success'));
      }else{
        $this->session->set_flashdata(array('msg_delete'=>'failed'));
      }
      // header('location'.base_url('admin/pertanyaan'));
      echo "<script>window.location.replace('".base_url()."admin/bagian')</script>";
    }
  }
  ?>
