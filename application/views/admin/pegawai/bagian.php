<div class="content-wrapper">
  <section class="content-header">
      <h3><i class="fa fa-user-plus"> </i>Tambah Bagian Kepegawaian</h3>
  </section>
  <section class="content">
    <div class="box box-default">
      <div class="box-header with border">
        <div class="form-body">
          <?=form_open('',array('method'=>'post','id'=>'formtambahpegawai','role'=>'form'))?>
              <div class="form-group">
                 <label for="namapegawai">Nama Bagian</label>
                 <input type="text" class="form-control" name="namabagian" placeholder="Masukan Bagian Kepegawaian">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success" name="submit">Simpan</button>
              </div>
              <?php if($this->session->flashdata('msg')=='success'){ ?>
                <div class="alert alert-success col-md-4" style="margin-top:20px">
                  <p>Data berhasil disimpan!</p>
                </div>
              <?php } else if($this->session->flashdata('msg')=='failed'){ ?>
                <div class="alert alert-danger col-md-4" style="margin-top:20px">
                  <p>Data gagal disimpan!</p>
                </div>
              <?php } ?>
            <?=form_close()?>
        </div>
      </div>
    </div>
    <div class="box box-default">
      <div class="box-header with border">
        <div class="form-body">
          <div class="box-title">
            Daftar Bagian Kepegawaian
          </div>
          <div class="box-body">
            <table id="table" class="table table-striped table bordered">
              <thead>
                <tr>
                  <th>NO</th>
                  <th><center>Bagian</center></th>
                  <th><center>Perintah</center></th>
                </tr>
              </thead>
              <tbody>
                <?php if($bagian!=FALSE){
                  $i=1;
                  foreach ($bagian as $bag) {?>
                    <tr>
                      <td><?=$i++?></td>
                      <td><?=$bag->nama_bagian?></td>
                      <td>
                        <center>
                          <button href="#" data-toggle="popover" data-placement="left" data-content="Edit Bagian Pegawai" class="message btn btn-sm btn-warning" onclick="editBagian('<?=$bag->id_bagian?>')"><i class="fa fa-edit"></i></button>
                          <button href="#" data-toggle="popover" data-placement="left" data-content="Hapus Bagian Pegawai" class="message btn btn-sm btn-danger" onclick="hapusBagian('<?=$bag->id_bagian?>')"><i class="fa fa-trash-o"></i></button>
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
  </section>
  <!-- Modal Edit Pertanyaan -->
  <div id="ModalEditBagian" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Perbarui Bagian Kepegawaian</h4>
        </div>
        <div class="modal-body">
          <p>Detail Bagian Kepegawaian</p>
          <?=form_open(base_url().'MengelolaPegawai/editBagian',array('method'=>'post','id'=>'selection','role'=>'form'))?>
          <input class="form-control" type="text" id="detailbagian" name="bagian" placeholder="Masukkan Bagian">
          <input type="hidden" name="ideditbagian" id="ideditbagian" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
          <input type="submit" class="btn btn-default" name="updateBagian" value="Simpan"/>
          <?=form_close()?>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Hapus Bagian Pegawai -->
  <div id="ModalHapusBagian" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Konfirmasi Penghapusan Bagian Pegawai</h4>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin akan menghapus bagian kepegawaian tersebut ?</p>
        </div>
        <?=form_open(base_url().'MengelolaPegawai/hapusBagian',array('method'=>'post','id'=>'delete_data','role'=>'form'))?>
        <input type="hidden" id="deletebagian" name="hapusbagian" value="">
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
  $('[data-toggle="popover"]').popover({
    trigger:"hover"
  });
});
function editBagian(x){
  $.ajax({
    method:'post',
    url:'<?=base_url()?>MengelolaPegawai/fetchBagian',
    dataType:'json',
    data:{'idBagian': x},
    success:function(data){
      // alert();
      console.log(data);
      $('#ideditbagian').val(data.bagian.id_bagian);
      $('#detailbagian').val(data.bagian.nama_bagian);
    $('#ModalEditBagian').modal('show');
    }
  })
}
function hapusBagian(value){
  $('#deletebagian').val(value);
  $('#ModalHapusBagian').modal('show');
}
</script>
