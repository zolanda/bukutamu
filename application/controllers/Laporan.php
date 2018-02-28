<?php

  include APPPATH.'libraries/PHPPDF/Pdf.php';
  include APPPATH.'customclass/StringManipulation.php';
  class Laporan extends CI_Controller{
    private $pdf;
    private $stringmanipulate;
    function __construct(){
      parent::__construct();
      $this->pdf=new Pdf('P','mm','A4',true,'UTF-8',false);
      $this->stringmanipulate=new StringManipulation();
      $this->load->model('Tamu');
    }
    function judul($teks1, $teks2, $teks3, $teks4, $teks5){
      $this->pdf->Cell(25);
      $this->pdf->SetFont('Times','B','12');
      $this->pdf->Cell(0,5,$teks1,0,1,'C');
      $this->pdf->Cell(25);
      $this->pdf->Cell(0,5,$teks2,0,1,'C');
      $this->pdf->Cell(25);
      $this->pdf->SetFont('Times','B','11');
      $this->pdf->Cell(0,5,$teks3,0,1,'C');
      $this->pdf->Cell(25);
      $this->pdf->SetFont('Times','I','8');
      $this->pdf->Cell(0,5,$teks4,0,1,'C');
      $this->pdf->Cell(25);
      $this->pdf->Cell(0,2,$teks5,0,1,'C');
    }
    function garis(){
      $this->pdf->SetLineWidth(1);
      $this->pdf->Line(10,37,200,37);
      $this->pdf->SetLineWidth(0);
      $this->pdf->Line(10,38,200,38);
    }
    function printLaporanHarian($tanggal){
      $this->pdf->SetTitle('Rekap');
      $this->pdf->AddPage();
      $this->pdf->image(base_url().'includes/logo.png',25,12,18,23);
      $this->judul('PEMERINTAH PROVINSI JAWA TENGAH','DINAS KEARSIPAN DAN PERPUSTAKAAN','Jl. Dr. SETIABUDI No. 201C SRONDOL SEMARANG','TELP.(024) 7473746 , 7474710 Fax. (024) 7473800','Email:dinas.arpusjateng@gmail.com');
      $this->garis();
      $this->pdf->SetAutoPageBreak(TRUE,PDF_MARGIN_BOTTOM);
      $stringdate=$this->stringmanipulate->dateToString($tanggal);
      $html='<br><br><h4>Daftar Pengunjung pada tanggal : '.$stringdate.'</h4>';
      $datapengunjung=$this->Tamu->getTamuByTanggal($tanggal);
      // die(print_r($datapengunjung));
      $stringtable='';
      if($datapengunjung!=FALSE){
        $stringloop='';
        $i=1;
        foreach ($datapengunjung as $peng) {
          $stringloop='<tr>
          <td height="30" width="30" align="center">'.$i.' </td>
          <td width="100" align="center">'.$stringdate.'</td>
          <td width="60" align="center">'.explode(' ',$peng->waktu)[1].'</td>
          <td width="120" align="center">'.$peng->nama_keperluan.'</td>
          <td width="70" align="center">'.$peng->instansi.'</td>
          <td width="100" align="center">'.$peng->nama_pegawai.'</td>
          <td width="60" align="center">'.$peng->banyak_tamu.'</td>
          </tr>';
          $i++;
          $stringtable=$stringtable.''.$stringloop;
        }
      }
      $html.='
      <table cellspacing="0" `cellpadding="2" border="1" align="justify">
      <tr>
      <td height="30" width="30" align="center">NO </td>
      <td width="100" align="center">TANGGAL</td>
      <td width="60" align="center">WAKTU</td>
      <td width="120" align="center">KEGIATAN</td>
      <td width="70" align="center">ASAL</td>
      <td width="100" align="center">MENEMUI</td>
      <td width="60" align="center">BANYAK</td>
      </tr>'.
      $stringtable.'
      <tr height="10">
      <td width="480" align="right">JUMLAH</td>
      <td width="60" align="center">0</td>
      </tr>
      </table>
      ';
      $this->pdf->writeHTMl($html);
      $this->pdf->Output('Rekap_arsip.pdf');
    }

  }
 ?>
