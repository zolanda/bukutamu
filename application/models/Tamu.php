<?php
  class Tamu extends CI_Model{
    function __construct(){
      parent:: __construct();
    }
    public function insert($identitas,$nama,$instansi,$nomortelepon,$keperluan,$nomorpeng,$jumlahpengunjung,$pejabat){
        $query="INSERT INTO tamu(identitas_tamu,nama_tamu,instansi,no_hp,id_keperluan,no_pengunjung,banyak_tamu,waktu,no_induk) VALUES
        ('$identitas','$nama','$instansi','$nomortelepon','$keperluan','$nomorpeng','$jumlahpengunjung', NOW(),'$pejabat')";
        return $this->db->query($query);
    }

    public function getTamuByNopengunjung($nomorpengunjung, $tanggal){
      $query="SELECT * FROM tamu WHERE tamu.no_pengunjung='$nomorpengunjung' AND tamu.waktu LIKE '%".$tanggal."%'";
      $result = $this->db->query($query);
      if($result->num_rows()>0){
        return $result->row_array();
      }else{
        return FALSE;
      }
    }

    public function getAllData(){
      $query="SELECT*FROM tamu LEFT JOIN keperluan ON tamu.id_keperluan=keperluan.id_keperluan ORDER BY waktu DESC";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->result();
      }else{
        return FALSE;
      }
    }
    public function getTamuByTanggal($tanggal){
      $query="SELECT * FROM tamu LEFT JOIN keperluan ON keperluan.id_keperluan=tamu.id_keperluan LEFT JOIN pegawai ON tamu.no_induk=pegawai.no_induk WHERE tamu.waktu LIKE '%".$tanggal."%'";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->result();
      }else{
        return FALSE;
      }
    }
    public function getTamuByTahun($tahun){
      $query="SELECT * FROM tamu LEFT JOIN keperluan ON keperluan.id_keperluan=tamu.id_keperluan LEFT JOIN pegawai ON tamu.no_induk=pegawai.no_induk WHERE SUBSTRING_INDEX(waktu,'-',1)='$tahun'";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->result();
      }else{
        return FALSE;
      }
    }
    public function getTamuByRangeTanggal($tanggal, $tanggal2){
      $query="SELECT*FROM tamu LEFT JOIN keperluan ON keperluan.id_keperluan=tamu.id_keperluan LEFT JOIN pegawai ON tamu.no_induk=pegawai.no_induk WHERE SUBSTRING_INDEX(waktu,' ',1) BETWEEN '$tanggal' AND '$tanggal2'";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->result();
      }else{
        return FALSE;
      }
    }

    public function getTamuBySumTahun($tahun){
      $query="SELECT  SUBSTRING_INDEX(SUBSTRING_INDEX(waktu,'-',2),'-',-1) AS bulan, COUNT(*) AS jumlah FROM tamu WHERE SUBSTRING_INDEX(waktu,'-',1)='$tahun' GROUP BY SUBSTRING_INDEX(SUBSTRING_INDEX(waktu,'-',2),'-',-1)";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->result();
      }else{
        return FALSE;
      }
    }

    public function getTamuBySumBulan($val){
      $query="SELECT  SUBSTRING_INDEX(waktu,' ',1) AS hari, COUNT(*) AS jumlah  FROM tamu WHERE SUBSTRING_INDEX(waktu,'-',2)='$val' GROUP BY SUBSTRING_INDEX(waktu,' ',1)";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->result();
      }else{
        return FALSE;
      }
    }

    public function getResponden($waktu){
      $query="SELECT * FROM tamu WHERE no_pengunjung!='' AND SUBSTRING_INDEX(waktu,'-',1)='$waktu'";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->result();
      }else{
        return FALSE;
      }
    }
    public function getTamuByKeperluan($val){
      $query="SELECT COUNT(*) AS data, keperluan.nama_keperluan AS name FROM tamu LEFT JOIN keperluan ON tamu.id_keperluan=keperluan.id_keperluan WHERE SUBSTRING_INDEX(waktu,'-',2)='$val' GROUP BY nama_keperluan ";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->result();
      }else{
        return FALSE;
      }
    }
}
 ?>
