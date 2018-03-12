<?php
  class Pertanyaan extends CI_Model{
    function __construct(){
      parent::  __construct();
    }

    public function getAllPertanyaan(){
      $query="SELECT*FROM pertanyaan";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->result();
      }else{
        return FALSE;
      }
    }

    public function getPertanyaanById($id){
      $query="SELECT * FROM pertanyaan WHERE id_pertanyaan='$id'";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->row_array();
      }else{
        return FALSE;
      }
    }
    function insert($pertanyaan){
      $query="INSERT INTO pertanyaan(pertanyaan) VALUES ('$pertanyaan')";
      return $this->db->query($query);
    }

    public function update($pertanyaan, $idpertanyaan){
      $query="UPDATE pertanyaan SET pertanyaan='$pertanyaan' WHERE id_pertanyaan='$idpertanyaan' ";
      return $this->db->query($query);
    }

    public function hapus($id){
    $query="DELETE FROM pertanyaan WHERE id_pertanyaan='$id'";
    return $this->db->query($query);
  }
}
 ?>
