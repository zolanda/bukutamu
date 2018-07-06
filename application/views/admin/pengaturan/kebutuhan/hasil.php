<div class="content-wrapper">
  <section class="content-header">
    <h3><i class="fa fa-vcard-o"></i>   Kebutuhan</h3>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>Admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="#"><i class="fa fa-vcard-o"></i>Pengaturan</a></li>
      <li class="active"><i class="fa fa-folder-open-o"></i>List Kebutuhan</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-default">
      <div class="box box-body">
        <h2 class="page-header">
          <i class="fa fa-globe">Hasil Indeks Kepuasan Masyarakat</i>
          <small class="pull-right">Date : <?php echo date('d/M/Y')?></small>
        </h2>
        <div class="col-sm-4">

          <address>
            Status : <?php if($kebutuhan['tahun']==date('Y')){echo "Active";}else{"Not Active";} ?> <br>
            Pertanyan : <?php if($listpertanyaan['hasil']!=false){echo sizeof($listpertanyaan['hasil']);}?> <br>
            Responden : <?php if($responden!=false){echo sizeof($responden);}?><br>
            Hasil Sementara : <span id="hasilsementara"></span><br>
          </address>
        </div>
      </div>
      <div class="container">
        <p class="lead">Tabulasi Nilai</p>
        <div class="col-xs-12 centered">
          <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Pertanyaan</th>
                <th>Nilai Total</th>
                <th>Rata - rata</th>
                <th>Hasil</th>
              </tr>
            </thead>
            <tbody>
              <?php if($listpertanyaan['hasil']!=FALSE){
                $i=1;
                $count=0;
                foreach($listpertanyaan['hasil'] as $listper){ ?>
                  <tr>
                    <td><?=$i++?></td>
                    <td><?=$listper['pertanyaan']?></td>
                    <td><?=$listper['nilai']?></td>
                    <td><?=$listper['rata']?></td>
                    <td><?php if(($listper['rata'])>=1.5){
                      echo "Puas";
                      $count=$count+1;
                      }  else{
                        echo "Tidak Puas";
                        $count=$count-1;
                      }
                    ?></td>
                  </tr>
                <?php }} ?>
              <tr>
                <td colspan="2">Total</td>
                <td><?=$listpertanyaan['hasil2']?></td>
              </tr>
              <tr>
                <td colspan="2">Hasil</td>
                <td id="hasilakhir"><?php if ($count==0){
                  echo "Netral";
                }else if ($count>0){
                  echo "Puas";
                }else{
                  echo "Tidak Puas";
                }?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="container">
        <p class="lead">Data Responden</p>
        <div class="col-xs-12 centered">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>NO</th>
                <th style="text-align:center;">NAMA RESPONDEN</th>
                <th style="text-align:center;">NOMOR IDENTITAS</th>
                <th style="text-align:center;">TANGGAL DATANG</th>
              </tr>
            </thead>
            <tbody>
              <?php if($responden!=FALSE){
                $i=1;
                foreach($responden as $respon){
              ?>
              <tr>
                <td><?=$i?></td>
                <td><?=$respon->nama_tamu?></td>
                <td><?=$respon->identitas_tamu?></td>
                <td><?=$respon->waktu?></td>
              </tr>
                <?php $i++;}} ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="container">
        <p class="lead">Prosentase Pertanyaan</p>
        <div class="col-xs-10 centered">
          <table class="table table-bordered style-striped">
            <thead>
              <tr>
                <th style="text-align:center;">PERTANYAAN</th>
                <th style="text-align:center;">% RESPONDEN</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($prosentase as $prosentase){ ?>
                <tr>
                  <td colspan="2"> <?= $prosentase['pertanyaan']?></td>
                </tr>
                <?php foreach($prosentase['jawaban'] as $persenjawaban){ ?>
                  <tr>
                    <td style="text-align:right;"><?= $persenjawaban['namajawaban']?></td>
                    <td style="text-align:center;"><?php if($prosentase['totalresponden']==0){
                      echo 0;
                    }else{
                     echo ($persenjawaban['responden'] / $prosentase['totalresponden'])*100;
                    }?>%</td>
                  </tr>
              <?php   }} ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  $('#hasilsementara').html($('#hasilakhir').html());
</script>
