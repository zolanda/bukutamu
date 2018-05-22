<?php
class ListPertanyaan extends CI_Model{
  function __construct(){
    parent::__construct();
  }
  public function insert($idpertanyaan, $idkebutuhan){
    $query="INSERT INTO list_pertanyaan (id_pertanyaan,id_kebutuhan) VALUES ('$idpertanyaan','$idkebutuhan')";
    return $this->db->query($query);
  }
}
 ?>
