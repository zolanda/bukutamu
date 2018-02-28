<?php
class Pengaturan extends CI_Controller{
  function __construct(){
    parent:: __construct();
  }

  function Keperluan(){
    $data['content']='admin/keperluan';
    $this->load->view('template/admin_template',$data);
    
  }
}
 ?>
