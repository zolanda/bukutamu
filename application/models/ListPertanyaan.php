<?php
class ListPertanyaan extends CI_Model{
  function __construct(){
    parent::__construct();
  }
  public function insert($idpertanyaan, $idkebutuhan){
    $query="INSERT INTO list_pertanyaan (id_pertanyaan,id_kebutuhan) VALUES ('$idpertanyaan','$idkebutuhan')";
    return $this->db->query($query);
  }

  public function deleteByKebutuhan($idkebutuhan){
    $query="DELETE FROM list_pertanyaan WHERE id_kebutuhan = '$idkebutuhan'";
    return $this->db->query($query);
  }


  public function getListPertanyaanByKebutuhan($idKebutuhan){
    $query="SELECT * FROM list_pertanyaan LEFT JOIN pertanyaan ON pertanyaan.id_pertanyaan=list_pertanyaan.id_pertanyaan WHERE id_kebutuhan='$idKebutuhan'";
    $result=$this->db->query($query);
    if($result->num_rows()>0){
      return $result->result();
    }else{
      return FALSE;
    }
  }

  public function countPertanyaanByKebutuhan($kebutuhan){
    $query="SELECT COUNT(*) AS jumlah FROM list_pertanyaan WHERE id_kebutuhan = '$kebutuhan' ";
    $result=$this->db->query($query);
    if($result->num_rows()>0){
      return $result->row_array();
    }else{
      return FALSE;
    }
  }
}
 ?>
