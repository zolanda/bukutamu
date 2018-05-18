<div class="content-wrapper">
    <section class="content-header">
      <h3><i class="fa fa-vcard-o"></i>Keperluan</h3>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>Admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a hred="#"><i class="fa fa-vcard-o"></i>Pengaturan</a></li>
        <li class="active"><i class="fa fa-folder-open-o"></i>List Keperluan</li>
      </ol>
    </section>
    <section class="content">
      <?php if($this->session->flashdata('msg')=='success'){ ?>
        <div class="callout callout-success">
          <h4>Keperluan Berhasil Disimpan!</h4>
        </div>
      <?php } else if($this->session->flashdata('msg')=='failed'){ ?>
        <div class="callout callout-danger">
          <h4>Keperluan gagal disimpan!</h4>
        </div>
      <?php } ?>
          <div class="row">
            <div class="col-sm-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-folder-open-o"></i> List Keperluan</h3>
                </div>
                <div class="box-body">
                  <div class="body">
                    <div class="col-cs-12">
                      <button type="button" class="btn btn-success" style="margin-right:5px"name="button" data-toggle="modal" data-target="#ModalTambahKeperluan"><span><i class="fa fa-plus-square"></i></span> Tambah</button>
                    </div>
                  </div>
                  <br>
                  <table class="table table-bordered  table-striped table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Keperluan</th>
                        <th><center>Perintah</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($keperluan!=FALSE){
                        $i=1;
                        foreach($keperluan as $kpln){?>
                          <tr>
                            <td><?=$i++?></td>
                            <td><?=$kpln->nama_keperluan?></td>
                            <td>
                              <center>
                                <button href="#" data-toggle="popover" data-placement="left" title="" data-content="Edit Keperluan" data-original-title="" class="message btn btn-sm btn-warning" onclick="editKeperluan('<?=$kpln->id_keperluan?>')"><i class="fa fa-edit" aria-hidden="true"> </i></button>
                                <button href="#" data-toggle="popover" data-placement="left" title="" data-content="Hapus Keperluan" data-original-title="" class="message btn btn-sm btn-danger" onclick="hapusKeperluan('<?=$kpln->id_keperluan?>')"><i class="fa fa-trash-o"></i></button>
                              </center>
                            </td>
                          </tr>
                      <?php }} ?>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
      </div>
</section>
<!-- Modal Tambah Keperluan   -->
<div id="ModalTambahKeperluan" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Keperluan Baru</h4>
      </div>
      <div class="modal-body">
        <p>Keperluan</p>
        <?=form_open('',array('method'=>'post','id'=>'selection','role'=>'form'))?>
        <input class="form-control" type="text" name="keperluan" placeholder="Masukkan Keperluan Baru">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-info" name="simpankeperluan">Simpan</button>
        <?=form_close()?>
      </div>
    </div>
  </div>
</div>
<!-- Modal Edit Keperluan -->
<div id="ModalEditKeperluan" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perbarui Keperluan</h4>
      </div>
      <div class="modal-body">
        <p>Detail Keperluan</p>
        <?=form_open(base_url().'MengelolaPengaturan/editKeperluan',array('method'=>'post','id'=>'selection','role'=>'form'))?>
        <input class="form-control" type="text" id="detailkeperluan" name="keperluan" placeholder="Masukkan Keperluan">
        <input type="hidden" name="ideditkeperluan" id="ideditkeperluan" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
        <input type="submit" class="btn btn-info" name="update" value="Simpan"/>
        <?=form_close()?>
      </div>
    </div>
  </div>
</div>
<!-- Modal Konfirmasi Hapus Keperluan -->
<div id="ModalHapusKeperluan" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Penghapusan Keperluan</h4>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin akan menghapus keperluan tersebut ?</p>
      </div>
      <?=form_open(base_url().'MengelolaPengaturan/hapusKeperluan',array('method'=>'post','id'=>'delete_data','role'=>'form'))?>
      <input type="hidden" id="deletekeperluan" name="hapuskeperluan" value="">
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-info" >Ya</button>
        <?=form_close()?>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover({
    trigger:"hover"
  });
});
function editKeperluan(x){
  $.ajax({
    method:'post',
    url:'<?=base_url()?>MengelolaPengaturan/fetchDataKeperluan',
    dataType:'json',
    data:{'idKeperluan': x},
    success:function(data){
      // alert();
      console.log(data);
      $('#ideditkeperluan').val(data.keperluan.id_keperluan);
      $('#detailkeperluan').val(data.keperluan.nama_keperluan);
    $('#ModalEditKeperluan').modal('show');
    }
  })
}
function hapusKeperluan(value){
  $("#deletekeperluan").val(value);
  $('#ModalHapusKeperluan').modal('show');
}
</script>
