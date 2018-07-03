<?php
class Jawaban extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    public function insert($jawaban, $id_pertanyaan, $point){
      $query="INSERT INTO jawaban (jawaban, id_pertanyaan, poin) VALUES
      ('$jawaban','$id_pertanyaan','$point')";
      return $this->db->query($query);
    }
    public function getJawabanByPertanyaan($idpertanyaan){
      $query="SELECT * FROM jawaban LEFT JOIN pertanyaan ON jawaban.id_pertanyaan=pertanyaan.id_pertanyaan WHERE pertanyaan.id_pertanyaan='$idpertanyaan'";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->result();
      }else{
        return FALSE;
      }
    }
    public function getJawabanById($id){
      $query="SELECT*FROM jawaban WHERE id_jawaban='$id'";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->row_array();
      }else{
        return FALSE;
      }
    }
    public function update($jawaban, $idjawaban, $point){
      $query="UPDATE jawaban SET jawaban='$jawaban' , poin='$point' WHERE id_jawaban='$idjawaban' ";
      return $this->db->query($query);
    }
    public function hapus($id){
    $query="DELETE FROM jawaban WHERE id_jawaban='$id'";
    return $this->db->query($query);
  }

}

 ?>
