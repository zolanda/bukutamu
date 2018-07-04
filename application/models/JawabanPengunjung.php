<?php
class JawabanPengunjung extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    public function insert($jawaban, $id_pengunjung){
      $query="INSERT INTO jawaban_pengunjung(id_jawaban, id_pengunjung, waktu) VALUES
      ('$jawaban', '$id_pengunjung',NOW())";
      return $this->db->query($query);
    }
    public function getNilaiTotal($idpertanyaan){
      $query="SELECT SUM(jawaban.poin) as nilai FROM jawaban_pengunjung LEFT JOIN Jawaban ON jawaban_pengunjung.id_jawaban=jawaban.id_jawaban LEFT JOIN list_pertanyaan ON jawaban.id_pertanyaan=list_pertanyaan.id_pertanyaan WHERE jawaban.id_pertanyaan = '$idpertanyaan'";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->row_array();
      }else{
        return FALSE;
      }
    }
    public function countResponden($idpertanyaan){
      $query="SELECT COUNT(*) as jmlresponden FROM jawaban_pengunjung LEFT JOIN Jawaban ON jawaban_pengunjung.id_jawaban=jawaban.id_jawaban LEFT JOIN list_pertanyaan ON jawaban.id_pertanyaan=list_pertanyaan.id_pertanyaan WHERE jawaban.id_pertanyaan = '$idpertanyaan'";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->row_array();
      }else{
        return FALSE;
      }
    }
    public function getRespTidakPuas($idpertanyaan){
      $query="SELECT COUNT(*) as jmlresponden FROM jawaban_pengunjung LEFT JOIN Jawaban ON jawaban_pengunjung.id_jawaban=jawaban.id_jawaban LEFT JOIN list_pertanyaan ON jawaban.id_pertanyaan=list_pertanyaan.id_pertanyaan WHERE jawaban.id_pertanyaan = '$idpertanyaan' AND ";

    }
}

 ?>
