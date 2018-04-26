<?php
class Jawaban extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    public function insert($jawaban, $id_pengunjung, $id_pertanyaan){
      $query="INSERT INTO jawaban(jawaban, id_pengunjung, id_pertanyaan, waktu) VALUES
      ('$jawaban', '$id_pengunjung','$id_pertanyaan',NOW())";
      return $this->db->query($query);
    }
    public function getJawabanByIdPertanyaan($idpertanyaan){
      $query="SELECT * FROM jawaban LEFT JOIN pertanyaan ON jawaban.id_pertanyaan=pertanyaan.id_pertanyaan WHERE pertanyaan.id_pertanyaan='$idpertanyaan'";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->row_array();
      }else{
        return FALSE;
      }
    }
    

}

 ?>
