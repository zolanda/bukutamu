<?php
class JawabanPengunjung extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    public function insert($jawaban, $id_pengunjung){
      $query="INSERT INTO jawaban_pengunjung(id_jawaban, id_pengunjung, waktu) VALUES
      ('$jawaban', '$id_pengunjung',NOW())";
      return $this->db->query($query);
    }
}

 ?>
