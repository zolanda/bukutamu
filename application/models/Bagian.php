<?php
class Bagian extends CI_Model
{

  function __construct(){
    parent::__construct();
  }

  public function getAllData(){
    $query="SELECT*FROM bagian ORDER BY id_bagian ASC";
    $result=$this->db->query($query);
    if($result->num_rows()>0){
      return $result->result();
    }else{
      return FALSE;
    }
  }
  public function insert($nama_bagian){
    $query="INSERT INTO bagian(nama_bagian) VALUES ('$nama_bagian')";
    return $this->db->query($query);
  }
  public function hapus($id){
  $query="DELETE FROM bagian WHERE id_bagian='$id'";
  return $this->db->query($query);
  }
  public function getBagianById($id){
    $query="SELECT*FROM bagian WHERE id_bagian='$id'";
    $result=$this->db->query($query);
    if($result->num_rows()>0){
      return $result->row_array();
    }else{
      return FALSE;
    }
  }
}

 ?>
