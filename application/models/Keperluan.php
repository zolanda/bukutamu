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
  }
 ?>
