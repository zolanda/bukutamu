<?php
  class AdminModel extends CI_Model{
    function __construct(){
      parent:: __construct();
    }
    function cek_login($username, $password){
      $query="SELECT * FROM admin WHERE admin.username='$username' AND admin.password='$password'";
      $result=$this->db->query($query);
      if($result->num_rows()>0){
        return $result->row_array();
      }else{
        return FALSE;
      }
    }
    public function getUsernameById($id){
        $query="SELECT*FROM Admin WHERE id_admin='$id'";
        $result=$this->db->query($query);
        if($result->num_rows()>0){
          return $result->row_array();
        }else{
          return FALSE;
        }
    }
    public function updatePassword($id_admin,$password){
      $query="UPDATE admin SET password = ? WHERE id_admin=?";
      return $this->db->query($query,[$password,$id_admin]);
    }
    
  }

 ?>
