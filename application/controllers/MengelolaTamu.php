<?php
class MengelolaTamu extends CI_Controller{
  function __construct(){
    parent :: __construct();
    $this->load->model('tamu');
    $this->load->model('pegawai');
    $this->load->model('keperluan');
    $this->load->model('pertanyaan');
    $this->load->model('jawaban');
  }
  public function index(){
    $data['title']='Buku Tamu Elektronik';
    $data['content']='index';
    $this->load->view('template/main_template',$data);
  }

  public function bukutamu()
	{
    $data['title']='Buku Tamu Elektronik';
    $data['content']='formbukutamu';
    $data['keperluan']=$this->keperluan->getData();
    $data['pegawai']=$this->pegawai->getAllData();
    $this->load->view('template/main_template',$data);
	}
  public function simpandata()
  {
    if (isset($_POST['submit'])){
      $identitas=$this->input->post('identitas',TRUE);
      $nama=$this->input->post('nama',TRUE);
      $instansi=$this->input->post('instansi',TRUE);
      $nomortelepon=$this->input->post('nomortelepon',TRUE);
      $keperluan=$this->input->post('keperluan',TRUE);
      $nomorpeng=$this->input->post('nomorpengunjung',TRUE);
      $pejabat=$this->input->post('pejabat',TRUE);
      $sendiri=$this->input->post('issendirian');
      // die("T");
      // $identitas='098765432123456789';$nama='zola';$instansi='undip';$nomortelepon='097239298893';
      // $keperluan=1;$nomorpeng='78';$pejabat='195504071983031003';$sendiri='0';
      if($sendiri==0){
        $jumlahpengunjung=1;
      }else{
        $jumlahpengunjung=$this->input->post('jumlahpengunjung');
        // $jumlahpengunjung=12;
      }
      // $waktu=date('Y-m-d hh:mm:ss');
      $this->tamu->insert($identitas,$nama,$instansi,$nomortelepon,$keperluan,$nomorpeng,$jumlahpengunjung,$pejabat);
    }
  }

  public function getTamuByNopengunjung($nomorpengunjung='', $tanggal=''){
    if(isset($_POST['nomorpengunjung'])){
      $data=$this->tamu->getTamuByNopengunjung($this->input->post('nomorpengunjung'),date('Y-m-d'));
      echo json_encode($data);
    }
  }

  public function show_kuesioner($id_pengunjung=''){
    $check=$this->tamu->getTamuByNopengunjung($id_pengunjung,date('Y-m-d'));
    if($check==FALSE){
      echo "<script>window.history.back()</script>";
    }
    $data['pertanyaan']=$this->pertanyaan->getAllPertanyaan();
    if(isset($_POST['submit'])){
        if($data['pertanyaan']!=FALSE){
          foreach ($data['pertanyaan'] as $key){
            $jawaban=$_POST[$key->id_pertanyaan];
            $this->jawaban->insert($jawaban, $id_pengunjung, $key->id_pertanyaan);
          }
        }
        header('location:'.base_url());
    }
    $data['title']='Indeks Kepuasan Masyarakat';
    $data['content']='ikm';
    $this->load->view('template/main_template',$data);
  }

}
 ?>
