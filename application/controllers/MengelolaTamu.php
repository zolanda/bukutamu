<?php
include APPPATH.'customclass/StringManipulation.php';
class MengelolaTamu extends CI_Controller{
  private $stringmanipulate;
  function __construct(){
    parent :: __construct();
    $this->stringmanipulate=new StringManipulation();
    $this->load->model('tamu');
    $this->load->model('pegawai');
    $this->load->model('keperluan');
    $this->load->model('pertanyaan');
    $this->load->model('jawaban');
    $this->load->model('jawabanpengunjung');
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
    $pertanyaan = $this->pertanyaan->getAllPertanyaan();
    foreach ($pertanyaan as $p){
      $j=$this->jawaban->getJawabanByPertanyaan($p->id_pertanyaan);
      if($j!=false){
        foreach($j as $j){
          $jawaban[$p->id_pertanyaan][$j->id_jawaban]=$j;
        }
      }
    }
    $data['pertanyaan']=$pertanyaan;
    $data['jawaban']=$jawaban;
    if(isset($_POST['submit'])){
        if($data['pertanyaan']!=FALSE){
          foreach ($data['pertanyaan'] as $key){
            $jawaban=$_POST[$key->id_pertanyaan];
            $this->jawabanpengunjung->insert($jawaban, $check['id_tamu'] );
          }
        }
        header('location:'.base_url());
    }
    $data['title']='Indeks Kepuasan Masyarakat';
    $data['content']='ikm';
    $this->load->view('template/main_template',$data);
  }

  public function cobamonthpicker(){
    $data['content']='cobamonthpicker';
    $this->load->view('template/main_template',$data);
  }
  public function getdatapengunjungpertahun(){
    if(!$this->input->post('tahun')){
      echo "<script>window.history.back()</script>";
    }
    $tahun = $this->input->post('tahun');
    $data = $this->tamu->getTamuBySumTahun($tahun);
    $array = [
      // die(print_r($data[0]));
      "januari"=>0,
      "februari"=>0,
      "maret"=>0,
      "april"=>0,
      "mei"=>0,
      "juni"=>0,
      "juli"=>0,
      "agustus"=>0,
      "september"=>0,
      "oktober"=>0,
      "november"=>0,
      "desember"=>0,
    ];

    if(isset($data[0])){
      $array["januari"]=$data[0]->jumlah;
    }
    if(isset($data[1])){
      $array['februari']=$data[1]->jumlah;
    }
    if(isset($data[2])){
      $array['maret']=$data[2]->jumlah;
    }
    if(isset($data[3])){
      $array['april']=$data[3]->jumlah;
    }
    if(isset($data[4])){
      $array['mei']=$data[4]->jumlah;
    }
    if(isset($data[5])){
      $array['juni']=$data[5]->jumlah;
    }
    if(isset($data[6])){
      $array['juli']=$data[6]->jumlah;
    }
    if(isset($data[7])){
      $array['agustus']=$data[7]->jumlah;
    }
    if(isset($data[8])){
      $array['september']=$data[8]->jumlah;
    }
    if(isset($data[9])){
      $array['oktober']=$data[9]->jumlah;
    }
    if(isset($data[10])){
      $array['november']=$data[10]->jumlah;
    }
    if(isset($data[11])){
      $array['desember']=$data[11]->jumlah;
    }
    echo json_encode($array);
  }

  function getDataPengunjungPerBulan(){
    if(!$this->input->post('tahun')){
      echo "<script>window.history.back()</script>";
    }else{
      $tahun = $this->input->post('tahun', TRUE);
      $bulan = $this->input->post('bulan', TRUE);
      $val = $tahun.'-'.$bulan;
      // $val="2018-02";
      $data = $this->tamu->getTamuBySumBulan($val);
      // $tahun = "2018";
      // $bulan = "02";
      $array = [];
      $arrayhari=[];
      $banyakhari = cal_days_in_month(CAL_GREGORIAN,$bulan, $tahun);
      for($i=1;$i<=$banyakhari;$i++){
        $array[$val.'-'.$this->stringmanipulate->addDigit($i)]=0;
        array_push($arrayhari,$this->stringmanipulate->addDigit($i));
      }
      if($data!=false){
        foreach ($data as $data) {
          $array[$data->hari]=$data->jumlah;
        }
      }
      $response['data']=$array;
      $response['hari']=$arrayhari;
      echo json_encode($response);
    }
  }
  function getDataKeperluan(){
    if(!$this->input->post('tahun')){
      echo "<script>window.history.back()</script>";
    }else {
      $tahun=$this->input->post('tahun',TRUE);
      $bulan=$this->input->post('bulan',TRUE);
      $val=$tahun.'-'.$bulan;
      $result=[];
      // $val='2018-01';
      $data=$this->tamu->getTamuByKeperluan($val);
      if($data!=false){
        foreach($data as $val){
          $array['data']=[(int)$val->data];
          $array['name']=$val->name;
          array_push($result,$array);
        }
      }else{
        $result=false;
      }
      echo json_encode($result);
    }
  }

}
 ?>
