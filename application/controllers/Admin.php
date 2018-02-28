<?php
  class Admin extends CI_Controller{
    function __construct(){
      parent:: __construct();
      $this->load->model('Tamu');
      $this->load->model('Pegawai');
      $this->load->model('Jabatan');
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
        $id_jabatan=$this->input->post('jabatan',TRUE);

        $insert=$this->Pegawai->insert($no_induk,$nama_pegawai,$id_jabatan);
        if($insert){
          $this->session->set_flashdata(array('msg'=>'success'));
        }else{
          $this->session->set_flashdata(array('msg'=>'failed'));
        }
        header('location'.base_url('admin/pegawai/tambahpegawai'));
      }
      $data['jabatan']=$this->Jabatan->getAllData();
      $data['content']='admin/pegawai/tambahpegawai';
      $this->load->view('template/admin_template',$data);
    }
    function listPegawai(){
      $data['pegawai']=$this->Pegawai->getAllData();
      $data['content']='admin/pegawai/daftarpegawai';
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

    function laporanHarian(){
      $data['content']='admin/laporan/harian';
      $this->load->view('template/admin_template',$data);
    }

    function laporanBulanan(){
      $data['content']='admin/laporan/bulanan';
      $this->load->view('template/admin_template',$data);
    }
  }
  ?>
