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
    function insert($pertanyaan){
      $query="INSERT INTO pertanyaan(pertanyaan) VALUES ('$pertanyaan')";
      return $this->db->query($query);
    }
  }
 ?>
