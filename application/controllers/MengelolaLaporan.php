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
    function laporangrafik(){
      $data['title']="Grafik Pengunjung";
      $data['content']='laporangrafikpengunjung';
      $this->load->view('template/main_template',$data);
      }
    function laporanhasilkuesioner(){
      $puas=0;
      $tpuas=0;
        $kebutuhan=$this->Kebutuhan->getAllData();
        $arraykebutuhan = array();
        $total=0;
        if($kebutuhan!=FALSE){
          foreach($kebutuhan as $kb){
            $objkebutuhan['kebutuhan']=$kb->purpose;
            $objkebutuhan['tahun']=$kb->tahun;
            $objkebutuhan['pertanyaan']=$this->listpertanyaan->countPertanyaanByKebutuhan($kb->id_kebutuhan)['jumlah'];
            $temppertanyaan=$this->listpertanyaan->getListPertanyaanByKebutuhan($kb->id_kebutuhan);
            $nilaitotal=$this->hitungNilaiTotal($temppertanyaan,$kb->tahun);
            $objkebutuhan['nilai']=$nilaitotal['hasil'];
            foreach($objkebutuhan['nilai'] as $nilaitotal){
              if($nilaitotal['rata']>=1.5){
                $puas++;
              }else{
                $tpuas++;
              }
              if($puas>$tpuas){
                $objkebutuhan['nilai']='Puas';
              }else if($tpuas>$puas){
                $objkebutuhan['nilai']='Tidak Puas';
              }else{$objkebutuhan='Netral';}
            }
            // die(print_r($nilaitotal['hasil'][0]['rata']));
            if($temppertanyaan!=FALSE){
              foreach ($temppertanyaan as $temp){
                $hitung= $this->JawabanPengunjung->countresponden($temp->id_pertanyaan,$kb->tahun)['jmlresponden'];
                $total=$total+$hitung;
              }
              $objkebutuhan['responden']=$total;
            }
            else{
              $objkebutuhan['responden']=0;
            }
            $objkebutuhan['hasil']='-';
            array_push($arraykebutuhan,$objkebutuhan);
          }
        }

        $data['kebutuhan']=$arraykebutuhan;
        // $data['listpertanyaan']=$hitung;
        $data['title']="Hasil Pertanyaan";
        $data['content']='laporanhasilkuesioner';
        $this->load->view('template/main_template',$data);
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
