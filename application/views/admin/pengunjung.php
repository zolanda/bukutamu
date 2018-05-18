<div class="content-wrapper">
    <section class="content-header">
      <!-- <div class="box-header with-border"> -->
        <h1 class="box-title"><i class="fa fa-street-view"></i>Daftar Pengunjung</h1>
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>Admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Pengunjung</li>
        </ol>
    </section>
      <!-- </div> -->
      <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Tamu dan Pengunjung Dinas Kearsipan dan Perpustakaan</h3>
                </div>
                <div class="box-body">
                  <table id="table" class="table table-bordered tabe-striped" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>NAMA PENGUNJUNG</th>
                        <th>INSTANSI / ALAMAT PENGUNJUNG</th>
                        <th>KEPERLUAN</th>
                        <th style="text-align:center;">PENGUNJUNG</th>
                        <th style="text-align:center;">TANGGAL DATANG</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if ($pengunjung!=FALSE){
                        $i=1;
                        foreach ($pengunjung as $peng){
                          ?>
                          <tr>
                            <td><?= $i ?></td>
                            <td><?= $peng->nama_tamu ?></td>
                            <td><?= $peng->instansi?></td>
                            <td><?= $peng->nama_keperluan?></td>
                            <td style="text-align:center;"><?= $peng->banyak_tamu?></td>
                            <td style="text-align:center;"><?= explode(' ',$peng->waktu)[0]?></td>
                          </tr>
                          <?php $i++;}} ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </section>
</div>

<script>
  $(document).ready(function(){
    $('#table').DataTable();
  })
</script>
