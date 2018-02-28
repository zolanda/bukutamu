<div id="page-wrapper">
  <div class="wrapper">
    <div class="content-wrapper">
        <div class="box-header with-border">
          <h3 class="box-title"> <i class="fa fa-street-view" aria-hidden="true"></i>Daftar Pengunjung</h3>
        </div>
        <table id="table" class="table table-striped tabe-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>NO</th>
              <th>NAMA PENGUNJUNG</th>
              <th>INSTANSI / ALAMAT PENGUNJUNG</th>
              <th>KEPERLUAN</th>
              <th>PENGUNJUNG</th>
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
<script>
  $(document).ready(function(){
    $('#table').DataTable();
  })
</script>
