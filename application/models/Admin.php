<?php
  class Admin extends CI_Model{
    function cek_login($username, $password){
      $query="SELECT * FROM admin WHERE admin.username='$username' AND admin.password='$password'";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->row_array();
      }else{
        return FALSE;
      }
    }
  }

 ?>
