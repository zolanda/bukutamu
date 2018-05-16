<?php
  class Keperluan extends CI_Model{
    function __construct(){
      parent:: __construct();
    }
    public function getData(){
      $query="SELECT*FROM keperluan";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->result();
      }else{
        return FALSE;
      }
    }
    public function insert($keperluan){
      $query="INSERT INTO keperluan(nama_keperluan) VALUES ('$keperluan')";
      return $this->db->query($query);
    }
    public function getKeperluanById($id){
      $query="SELECT * FROM keperluan WHERE id_keperluan='$id'";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->row_array();
      }else{
        return FALSE;
      }
    }
    public function update($keperluan,$idkeperluan){
      $query="UPDATE keperluan SET nama_keperluan='$keperluan' WHERE id_keperluan='$idkeperluan'";
      return $this->db->query($query);
    }
  }
 ?>
