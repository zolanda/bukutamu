<?php
  class Pegawai extends CI_Model{
    function __construct(){
      parent::  __construct();
    }
    public function getAllData(){
      $query="SELECT*FROM pegawai LEFT JOIN bagian ON pegawai.id_bagian=bagian.id_bagian";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->result();
      }else{
        return FALSE;
      }
    }
    public function insert($no_induk, $nama_pegawai, $id_bagian){
      $query="INSERT INTO pegawai(no_induk, nama_pegawai, id_bagian) VALUES ('$no_induk','$nama_pegawai','$id_bagian')";
      return $this->db->query($query);
    }
    public function getPegawaiById($nomorinduk){
      $query="SELECT*FROM pegawai LEFT JOIN bagian ON pegawai.id_bagian=bagian.id_bagian WHERE no_induk='$nomorinduk'";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->row_array();
      }else{
        return FALSE;
      }
    }
    public function update($nomorinduk, $pegawai){
      $query="UPDATE pegawai LEFT JOIN bagian ON pegawai.id_bagian=bagian.id_bagian SET nama_pegawai='$pegawai' WHERE no_induk='$nomorinduk' ";
      return $this->db->query($query);
    }
    public function hapus($id){
    $query="DELETE FROM pegawai WHERE no_induk='$id'";
    return $this->db->query($query);
  }
  }

 ?>
