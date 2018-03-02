<div id="page-wrapper">
  <div class="wrapper">
    <div class="content-wrapper">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-edit"></i>Daftar Pegawai</h3>
      </div>
      <table id="table" class="table table-striped table bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>NO</th>
            <th>Nomor Induk Pegawai</th>
            <th>Nama Pegawai</th>
            <th>Bagian</th>
            <th><center>Perintah</center></th>
          </tr>
        </thead>
        <tbody>
          <?php if($pegawai!=FALSE) {
            $i=1;
            foreach ($pegawai as $peg) { ?>
            <tr>
              <td><?=$i ?></td>
              <td><?=$peg->no_induk?></td>
              <td><?=$peg->nama_pegawai?></td>
              <td><?=$peg->nama_bagian?></td>
              <td>
                <center>
                  <button href="#" data-toggle="popover" data-placement="left" data-content="Edit Pegawai" class="message btn btn-sm btn-warning" onclick=""><i class="fa fa-edit"></i></button>
                  <button href="#" data-toggle="popover" data-placement="left" data-content="Edit Pegawai" class="message btn btn-sm btn-danger" onclick=""><i class="fa fa-trash-o"></i></button>
                </center>
              </td>
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