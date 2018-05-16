<?php
  class MengelolaPengaturan extends CI_Controller{
    function __construct(){
      parent:: __construct();
      $this->load->model('Tamu');
      $this->load->model('Pegawai');
      $this->load->model('Bagian');
      $this->load->model('Pertanyaan');
      $this->load->model('Jawaban');
      $this->load->model('Keperluan');
      if(!$this->session->userdata('masuk_admin')){
        header('Location:'.base_url().'authenticate/index');
      }
    }
    function keperluan(){
      if(isset($_POST['simpankeperluan'])){
        $keperluan=$this->input->post('keperluan',TRUE);
        $insert=$this->Keperluan->insert($keperluan);
        if($insert){
          $this->session->set_flashdata(array('msg'=>'success'));
        }else{
          $this->session->set_flashdata(array('msg'=>'failed'));
        }
        header('locatioon'.base_url('admin/pengaturan/keperluan'));
      }
      $data['keperluan']=$this->Keperluan->getData();
      $data['content']='admin/pengaturan/keperluan';
      $this->load->view('template/admin_template',$data);
    }
    function fetchDataKeperluan(){
      if(!isset($_POST['idKeperluan'])){
        echo "<script>window.history.back()</script>";
      }else{
        $idKeperluan=$this->input->post('idKeperluan',TRUE);
        $keperluan=$this->Keperluan->getKeperluanById($idKeperluan);
        echo json_encode(['keperluan'=>$keperluan]);
      }
    }
    function editKeperluan(){
      if(isset($_POST['update'])){
        $keperluan=$this->input->post('keperluan',TRUE);
        $idkeperluan=$this->input->post('ideditkeperluan',TRUE);
        $update=$this->Keperluan->update($keperluan,$idkeperluan);
        if($update){
          $this->session->set_flashdata(array('msg_editkeperluan'=>'success'));
        }else{
          $this->session->set_flashdata(array('msg_editkeperluan'=>'failed'));
        }
      }
      echo "<script>window.location.replace('".base_url()."admin/pengaturan/keperluan')</script>";
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
        header('location'.base_url('admin/pengaturan/pertanyaan'));
      }
      $data['pertanyaan']=$this->Pertanyaan->getAllPertanyaan();
      $data['content']='admin/pengaturan/pertanyaan';
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
      echo "<script>window.location.replace('".base_url()."admin/pengaturan/pertanyaan')</script>";
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
      echo "<script>window.location.replace('".base_url()."admin/pengaturan/pertanyaan')</script>";
  }
    function jawaban($idpertanyaan){
      if(isset($_POST['simpanjawaban' ])){
        $jawaban=$this->input->post('jawaban',TRUE);
        $id_pengunjung=$this->input->post('id_pengunjung',TRUE);
        $id_pertanyaan=$this->input->post('id_pertanyaan',TRUE);
        $insert=$this->Jawaban->insert($jawaban,$id_pengunjung,$id_pertanyaan);
        if($insert){
          $this->session->set_flashdata(array('msg'=>'success'));
        }else{
          $this->session->set_flashdata(array('msg'=>'failed'));
        }
        header('location'.base_url('admin/pengaturan/jawaban'));
      }
      $data['jawaban']=$this->Jawaban->getJawabanByPertanyaan($idpertanyaan);
      $data['content']='admin/pengaturan/jawaban';
      $this->load->view('template/admin_template',$data);
    }
    function fetchJawaban(){
      if(!isset($_POST['idJawaban'])){
        echo "<script>window.history.back()</script>";
      } else {
        $idJawaban=$this->input->post('idJawaban',TRUE);
        $jawaban=$this->Jawaban->getJawabanById($idJawaban);
        echo json_encode(['jawaban'=>$jawaban]);
      }
    }
    function editJawaban(){
      if(isset($_POST['update'])) {
        $jawaban=$this->input->post('detailjawaban',TRUE);
        $idjawaban=$this->input->post('ideditjawaban',TRUE);
        $update=$this->Jawaban->update($jawaban,$idjawaban);
        if($update){
          $this->session->set_flashdata(array('msg_editjawaban'=>'success'));
        }else{
          $this->session->set_flashdata(array('msg_editjawaban'=>'failed'));
        }
      }
      echo "<script>window.location.replace('".base_url()."admin/pengaturan/jawaban')</script>";
      // die('test');
    }
    function hapusJawaban(){
      $id=$this->input->post('hapusjawaban',TRUE);
      $delete=$this->Jawaban->hapus($id);
      if($delete){
        $this->session->set_flashdata(array('msg_delete'=>'success'));
      }else{
        $this->session->set_flashdata(array('msg_delete'=>'failed'));
      }
      // header('location'.base_url('admin/pertanyaan'));
      echo "<script>window.history.back()</script>";
    }
    function kebutuhan(){
      $data['content']='admin/pengaturan/kebutuhan/kebutuhan';
      $this->load->view('template/admin_template',$data);
    }
  }
  ?>
