<div class="content-wrapper">
  <section class="content-header">
      <h3 class="box-title"><i class="fa fa-edit"></i>Daftar Pegawai</h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Daftar Pegawai</li>
      </ol>
  <!-- </section>
  <section class="content"> -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="box-title">
              Daftar Pegawai Dinas Kearsipan dan Perpustakaan
            </div>
            <div class="box-body">
              <table id="table" class="table table-bordered table-striped" cellspacing="0" width="100%">
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
                          <button href="#" data-toggle="popover" data-placement="left" data-content="Edit Pegawai" class="message btn btn-sm btn-warning" onclick="editPegawai('<?=$peg->no_induk?>')"><i class="fa fa-edit"></i></button>
                          <button href="#" data-toggle="popover" data-placement="left" data-content="Hapus Pegawai" class="message btn btn-sm btn-danger" onclick="hapusPegawai('<?=$peg->no_induk?>')"><i class="fa fa-trash-o"></i></button>
                        </center>
                      </td>
                    </tr>
                    <?php $i++;}} ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Modal Edit Pegawai -->
  <div id="ModalEditPegawai" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Perbarui Data PegaWai</h4>
        </div>
        <div class="modal-body">
          <p>Detail Pegawai</p>
          <?=form_open(base_url().'Admin/editPegawai',array('method'=>'post','id'=>'selection','role'=>'form'))?>
          <input class="form-control" type="hidden" id="nomorinduk" name="nomorinduk">
          <input class="form-control" type="text" id="namapegawai" name="nama_pegawai">
          <input class="form-control" type="text" disabled id="bagian">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
          <input type="submit" class="btn btn-default" name="updatePegawai" value="Simpan"/>
          <?=form_close()?>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Hapus Pegawai -->
  <div id="ModalHapusPegawai" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Konfirmasi Penghapusan Daftar Pegawai</h4>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin akan menghapus nama pegawai tersebut ?</p>
        </div>
        <?=form_open(base_url().'Admin/hapusPegawai',array('method'=>'post','id'=>'delete_data','role'=>'form'))?>
        <input type="hidden" id="deletepegawai" name="hapuspegawai" value="">
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-info" >Ya</button>
          <?=form_close()?>
        </div>
      </div>
    </div>
  </div>

</div>
<script>
  $(document).ready(function(){
    $('#table').DataTable();
  });
  $(document).ready(function(){
    $('[data-toggle="popover"]').popover({
      trigger:"hover"
    });
  });
 function editPegawai(x){
   $.ajax({
     method:'post',
     url:'<?=base_url()?>Admin/fetchDataPegawai',
     dataType:'json',
     data:{'nomorinduk':x},
     success:function(data){
       console.log(data);
       $('#nomorinduk').val(data.pegawai.no_induk);
       $('#namapegawai').val(data.pegawai.nama_pegawai);
       $('#bagian').val(data.pegawai.nama_bagian);
       $('#ModalEditPegawai').modal('show');
     }
   })
 }
 function hapusPegawai(value){
   $('#deletepegawai').val(value);
   $('#ModalHapusPegawai').modal('show');
 }

</script>
