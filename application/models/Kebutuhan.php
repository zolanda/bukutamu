<?php
class Kebutuhan extends CI_Model{
  function __construct(){
    parent::__construct();
  }
  public function insert($purpose,$tahun){
    $query="INSERT INTO kebutuhan (purpose, created, tahun) VALUES ('$purpose',NOW(), '$tahun')";
    return $this->db->query($query);
  }

  public function getAutoIncrement(){
    $query="SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA='bukutamu' AND TABLE_NAME='kebutuhan'";
    $result=$this->db->query($query);
    if($result->num_rows()>0){
      return $result->row_array();
    }else{
      return FALSE;
    }
  }
  public function getAllData(){
    $query="SELECT*FROM kebutuhan ORDER BY id_kebutuhan DESC";
    $result=$this->db->query($query);
    if($result->num_rows()>0){
      return $result->result();
    }else{
      return FALSE;
    }
  }
  public function getKebutuhanById($id){
    $query="SELECT*FROM kebutuhan WHERE id_kebutuhan='$id'";
    $result=$this->db->query($query);
    if($result->num_rows()>0){
      return $result->row_array();
    }else{
      return FALSE;
    }
  }
  public function update($kebutuhan,$tahun,$idkebutuhan){
    $query="UPDATE kebutuhan SET purpose='$kebutuhan' , tahun='$tahun' WHERE id_kebutuhan='$idkebutuhan'";
    return $this->db->query($query);
  }
  public function hapus($id){
    $query="DELETE FROM kebutuhan WHERE id_kebutuhan='$id'";
    return $this->db->query($query);
  }
}
 ?>
