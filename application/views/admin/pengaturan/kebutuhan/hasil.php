<div class="content-wrapper" style="min-height:916px;">
  <section class="content-header">
    <h3><i class="fa fa-vcard-o"></i>Kebutuhan</h3>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>Admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="#"><i class="fa fa-vcard-o"></i>Pengaturan</a></li>
      <li class="active"><i class="fa fa-folder-open-o"></i>List Kebutuhan</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-sm-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-folder-open-o"></i>List Kebutuhan</h3>
          </div>
        </div>
        <div class="box-body">
          <h2 class="page-header">
            <i class="fa fa-globe" > Hasil Indeks Kepuasan Masyarakat</i>
            <!-- <input type="hidden" name="idkeb" value=""> -->
            <small class="pull-right">Date : 2/10/2018</small>
          </h2>
        </div>
      </div>
      <div class="row invoice-info">
        <div id="hasilinfo"></div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <p class="lead">Tabulasi Nilai</p>
          <div id="hasilpertanyaan"></div>
          <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>No</th>
                <!-- <th>Pertanyaan</th>
                <th>Responden Tidak Puas</th> -->
                <th>Responden Puas</th>
                <th>Nilai Total</th>
                <th>Rata - rata</th>
                <th>Hasil</th>
              </tr>
            </thead>
            <tbody>
              <!-- <?php // die(print_r($listpertanyaan)) ?> -->
              <?php if($listpertanyaan!=FALSE){
                $i=1;
                foreach($listpertanyaan['hasil'] as $listper){ ?>
                  <tr>
                    <td><?=$i++?></td>
                    <td><?=$listper['pertanyaan']?></td>
                    <td><?=$listper['nilai']?></td>
                    <td><?=$listper['rata']?></td>
                    <td><?php if(($listper['rata'])>=1.5){
                      echo "Puas";
                      }  else{
                        echo "Tidak Puas";
                      }
                    ?></td>
                  </tr>
                <?php }
              } ?>
              <tr>
                <td colspan="2">Total</td>
                <td><?=$listpertanyaan['hasil2']?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <p class="lead">Data Responden</p>
        </div>
        <div class="box-body">
          <table id="table" class="table table-bordered table-striped" cellspacing="0" width="100%">
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
      <div class="row">
        <div class="col-xs-12">
          <p class="lead">Prosentase Pertanyaan</p>
          <div id="hasilgrafik"></div>
        </div>
      </div>
    </div>
    </div>
  </section>
</div>
