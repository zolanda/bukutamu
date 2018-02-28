<?php
class Jabatan extends CI_Model
{

  function __construct(){
    parent::__construct();
  }

  public function getAllData(){
    $query="SELECT*FROM jabatan ORDER BY nama_jabatan ASC";
    $result=$this->db->query($query);
    if($result->num_rows()>0){
      return $result->result();
    }else{
      return FALSE;
    }
  }
}

 ?>
