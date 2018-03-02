<?php
class Bagian extends CI_Model
{

  function __construct(){
    parent::__construct();
  }

  public function getAllData(){
    $query="SELECT*FROM bagian ORDER BY nama_bagian ASC";
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
}

 ?>
