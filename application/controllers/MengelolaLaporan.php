<?php
  class MengelolaLaporan extends CI_Controller{
    function __construct(){
      parent:: __construct();
      $this->load->model('Tamu');
      $this->load->model('Pegawai');
      $this->load->model('Bagian');
      $this->load->model('Pertanyaan');
      $this->load->model('Jawaban');
      $this->load->model('JawabanPengunjung');
      $this->load->model('Kebutuhan');
      $this->load->model('listpertanyaan');
      $this->load->library('form_validation');

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
    
    function hitungNilaiTotal($listpertanyaan,$tahun){
      $arraynilai=array();
      $objek=array();
      $hasil=array();
      $total=0;
      foreach($listpertanyaan as $listtanya){
        $objek['pertanyaan']=$listtanya->pertanyaan;
        $objek['nilai']=$this->JawabanPengunjung->getNilaiTotal($listtanya->id_pertanyaan)['nilai'];
        $nilai2=$this->JawabanPengunjung->countResponden($listtanya->id_pertanyaan,$tahun)['jmlresponden'];
        if($nilai2 == 0){
          $objek['rata']=0;
        }else{
          $objek['rata']=$objek['nilai']/ $nilai2;
        }
        $total=$total+$objek['nilai'];
        array_push($arraynilai,$objek);
      }
      $hasil['hasil']=$arraynilai;
      $hasil['hasil2']=$total;
      // die(print_r($hasil));
      return $hasil;
    }


}
  ?>
