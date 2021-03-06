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
      $this->load->model('Kebutuhan');
      $this->load->model('JawabanPengunjung');
      $this->load->model('ListPertanyaan','listpertanyaan');
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
        header('locatioon'.base_url('MengelolaPengaturan/keperluan'));
      }
      $data['keperluan']=$this->Keperluan->getData();
      $data['content']='admin/pengaturan/keperluan';
      $this->load->view('template/admin_template',$data);
    }
    function fetchDataKeperluan(){
      if(!isset($_POST['idKeperluan'])){
        echo "<script>window.history.back()</script>";
      }else{
        $id=$this->input->post('idKeperluan',TRUE);
        $keperluan=$this->Keperluan->getKeperluanById($id);
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
      echo "<script>window.location.replace('".base_url()."MengelolaPengaturan/keperluan')</script>";
    }
    function hapusKeperluan(){
      $id=$this->input->post('hapuskeperluan',TRUE);
      $delete=$this->Keperluan->hapus($id);
      if($delete){
        $this->session->set_flashdata(array('msg_delete'=>'success'));
      }else{
        $this->session->set_flashdata(array('msg_delete'=>'failed'));
      }
      echo "<script>window.location.replace('".base_url()."MengelolaPengaturan/keperluan')</script>";
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
        header('location'.base_url('MengelolaPengaturan/pertanyaan'));
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
      echo "<script>window.location.replace('".base_url()."MengelolaPengaturan/pertanyaan')</script>";
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
      echo "<script>window.location.replace('".base_url()."MengelolaPengaturan/pertanyaan')</script>";
  }
    function jawaban($idpertanyaan){
      if(isset($_POST['simpanjawaban' ])){
        $jawaban=$this->input->post('jawaban',TRUE);
        $id_pertanyaan=$this->input->post('idpertanyaan',TRUE);
        $point=$this->input->post('point',TRUE);
        $insert=$this->Jawaban->insert($jawaban,$id_pertanyaan,$point);
        if($insert){
          $this->session->set_flashdata(array('msg'=>'success'));
        }else{
          $this->session->set_flashdata(array('msg'=>'failed'));
        }
        header('location:'.base_url('MengelolaPengaturan/jawaban/'.$idpertanyaan.''));
      }
      $data['idpertanyaan']=$idpertanyaan;
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
        $point=$this->input->post('point',TRUE);
        $update=$this->Jawaban->update($jawaban,$idjawaban,$point);
        if($update){
          $this->session->set_flashdata(array('msg_editjawaban'=>'success'));
        }else{
          $this->session->set_flashdata(array('msg_editjawaban'=>'failed'));
        }
      }
      echo "<script>window.history.back()</script>";
    }
    function hapusJawaban(){
      $id=$this->input->post('hapusjawaban',TRUE);
      $delete=$this->Jawaban->hapus($id);
      if($delete){
        $this->session->set_flashdata(array('msg_delete'=>'success'));
      }else{
        $this->session->set_flashdata(array('msg_delete'=>'failed'));
      }
      echo "<script>window.history.back()</script>";
    }
    function kebutuhan(){
      if(isset($_POST['submit'])){
        $purpose=$this->input->post('kebutuhan',TRUE);
        $tahun=$this->input->post('tahunkebutuhan',TRUE);
        $autoincr=$this->input->post('idkebutuhanincr',TRUE);
        $getpertanyaan=$this->input->post('pertanyaan[]',TRUE);
        $insert=$this->Kebutuhan->insert($purpose,$tahun);
        // $lastid=$this->Kebutuhan->getAutoIncrement();
        foreach ($getpertanyaan as $gettanya){
          $insertpertanyaan=$this->listpertanyaan->insert($gettanya,$autoincr);
        }
        if($insert){
          $this->session->set_flashdata(array('msg'=>'success'));
        }else{
          $this->session->set_flashdata(array('msg'=>'failed'));
        }
        header('location:'.base_url('MengelolaPengaturan/kebutuhan'));
      }
      $getautoincrement=$this->Kebutuhan->getAutoIncrement();
      // die(print_r($getautoincrement));
      $data['autoincr']=$getautoincrement;
      $data['kebutuhan']=$this->Kebutuhan->getAllData();
      $data['pertanyaan']=$this->Pertanyaan->getAllPertanyaan();
      $data['content']='admin/pengaturan/kebutuhan/kebutuhan';
      $this->load->view('template/admin_template',$data);
    }
    function fetchDataKebutuhan(){
    if(!isset($_POST['idKebutuhan'])){
        echo "<script>window.history.back()</script>";
      }else{
        $idKebutuhan=$this->input->post('idKebutuhan',TRUE);
        $kebutuhan=$this->Kebutuhan->getKebutuhanById($idKebutuhan);
        $listpertanyaan=$this->listpertanyaan->getListPertanyaanByKebutuhan($idKebutuhan);
        echo json_encode(['kebutuhan'=>$kebutuhan,'pertanyaan'=>$listpertanyaan]);
      }
    }
    function editKebutuhan(){
      if(isset($_POST['submit'])){
        $kebutuhan=$this->input->post('detailkebutuhan',TRUE);
        $tahun=$this->input->post('thnkebutuhan',TRUE);
        $idkebutuhan=$this->input->post('idkebutuhanincr',TRUE);
        $update=$this->Kebutuhan->update($kebutuhan,$tahun,$idkebutuhan);
        $delete=$this->listpertanyaan->deleteByKebutuhan($idkebutuhan);
        $pertanyaan = $this->input->post('pertanyaan[]');
        foreach ($pertanyaan as $idpertanyaan) {
          $updateListPertanyaan = $this->listpertanyaan->insert($idpertanyaan,$idkebutuhan);
        }
        if($update && $updateListPertanyaan){
          if($update){
            $this->session->set_flashdata(array('msg_editkebutuhan'=>'success'));
          }else{
            $this->session->set_flashdata(array('msg_editkebutuhan'=>'failed'));
          }
        }
      }
      echo "<script>window.location.replace('".base_url()."MengelolaPengaturan/kebutuhan')</script>";
    }
    function hapusKebutuhan(){
      $id=$this->input->post('hapuskebutuhan',TRUE);
      $delete=$this->Kebutuhan->hapus($id);
      $delete2=$this->listpertanyaan->deleteByKebutuhan($id);
      if ($delete){
        $this->session->set_flashdata(array('msg_delete'=>'success'));
      }else{
        $this->session->set_flashdata(array('msg_delete'=>'failed'));
      }
      echo "<script>window/history.back()</script>";
    }
    function hasil($idkebutuhan){
      $kebutuhan=$this->Kebutuhan->getKebutuhanById($idkebutuhan);
      $data['responden']=$this->Tamu->getResponden($kebutuhan['tahun']);
      $listpertanyaan=$this->listpertanyaan->getListPertanyaanByKebutuhan($idkebutuhan);
      if($listpertanyaan!=false){
        $hitung=$this->hitungNilaiTotal($listpertanyaan,$kebutuhan['tahun']);
      }
      $data['kebutuhan']=$kebutuhan;
      $data['listpertanyaan']=$hitung;
      $data['prosentase']=$this->prosentase($idkebutuhan);
      $data['content']='admin/pengaturan/kebutuhan/hasil';
      $this->load->view('template/admin_template',$data);
    }
    function hitungNilaiTotal($listpertanyaan,$tahun){
      $arraynilai=array();
      $objek=array();
      $hasil=array();
      $total=0;
      foreach($listpertanyaan as $listtanya){
        $objek['pertanyaan']=$listtanya->pertanyaan;
        // die(print_r($listtanya));
        $banyak_pertanyaan = $this->listpertanyaan->countPertanyaan($listtanya->id_pertanyaan)['jumlah'];
        $objek['nilai']=$this->JawabanPengunjung->getNilaiTotal($listtanya->id_pertanyaan)['nilai']/$banyak_pertanyaan;
        $nilai2=$this->JawabanPengunjung->countResponden($listtanya->id_pertanyaan,$tahun)['jmlresponden']/$banyak_pertanyaan;
        // die(print_r($nilai2));
        if($nilai2 == 0){
          $objek['rata']=0;
        }else{
          $objek['rata']=$objek['nilai']/$nilai2;
        }
        $total=$total+($objek['nilai']);
        array_push($arraynilai,$objek);
      }
      $hasil['hasil']=$arraynilai;
      $hasil['hasil2']=$total;
      return $hasil;
    }
    function prosentase($idkebutuhan){
      $objekpertanyaan=array();
      $all=array();
      $listpertanyaan=$this->listpertanyaan->getListPertanyaanByKebutuhan($idkebutuhan);
      if($listpertanyaan!=false){
        foreach ($listpertanyaan as $listtanya){
          $getjawaban=$this->Jawaban->getJawabanByPertanyaan($listtanya->id_pertanyaan);
          if ($getjawaban!=false){
            $arrayjawaban=array();
            $total=0;
            foreach($getjawaban as $jawaban){
              $objekjawaban['namajawaban']=$jawaban->jawaban;
              $objekjawaban['responden']=$this->JawabanPengunjung->countRespondenByJawaban($jawaban->id_jawaban)['hitungresponden'];
              $total=$total+$objekjawaban['responden'];
              array_push($arrayjawaban,$objekjawaban);
            }
            $objekpertanyaan['pertanyaan']=$listtanya->pertanyaan;
            $objekpertanyaan['jawaban']=$arrayjawaban;
            $objekpertanyaan['totalresponden']=$total;
          }
          array_push($all,$objekpertanyaan);
        }
      }
      return $all;
    }
  }
  ?>
