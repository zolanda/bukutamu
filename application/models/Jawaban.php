<?php
class Jawaban extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    public function insert($jawaban, $id_pengunjung, $id_pertanyaan){
      $query="INSERT INTO jawaban(jawaban, id_pengunjung, id_pertanyaan, waktu) VALUES
      ('$jawaban', '$id_pengunjung','$id_pertanyaan',NOW())";
      return $this->db->query($query);
    }

}

 ?>
