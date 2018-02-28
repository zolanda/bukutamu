<?php
  class Pegawai extends CI_Model{
    function __construct(){
      parent::  __construct();
    }
    public function getAllData(){
      $query="SELECT*FROM pegawai LEFT JOIN jabatan ON pegawai.id_jabatan=jabatan.id_jabatan";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->result();
      }else{
        return FALSE;
      }
    }
    public function insert($no_induk, $nama_pegawai, $id_jabatan){
      $query="INSERT INTO pegawai(no_induk, nama_pegawai, id_jabatan) VALUES ('$no_induk','$nama_pegawai','$id_jabatan')";
      return $this->db->query($query);
    }
  }

 ?>
