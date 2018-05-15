<div class="content-wrapper">
  <section class="content-header">
    <h3><i class="fa fa-vcard-o"></i> Pertanyaan</h3>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a hred="#"><i class="fa fa-vcard-o"></i>Pengaturan</a></li>
      <li class="active"><i class="fa fa-folder-open-o"></i>List Pertanyaan</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-sm-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title" <i class="fa fa-folder-open-o" ></i>List Jawaban</h3>
          </div>
          <div class="box-body">
            <div class="body">
              <div class="col-cs-12">
                <button type="button" class="btn btn-success" style="margin-right:5px" name="button" data-toggle="modal" data-target="#ModalTambahJawaban"><i class="fa fa-plus-square"></i> Tambah</button>
              </div>
            </div>
          </div>
          <br>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Jawaban</th>
                <th>Point</th>
                <th><center>Perintah</center></th>
              </tr>
            </thead>
            <tbody>
              <?php if($jawaban!=FALSE){
                $i=1;
                foreach($jawaban as $jawab){?>
                  <tr>
                    <td><?=$i++?></td>
                    <td><?=$jawab->jawaban?><td>
                    <!-- <td></td> -->
                    <td>
                        <center>
                          <button href="#" data-toggle="popover" data-placement="left" title="" data-content="Edit Jawaban" data-original-title="" class="message btn btn-sm btn-warning" onclick="editJawaban('<?=$jawab->id_jawaban?>')" ><i class="fa fa-edit" aria-hidden="true"> </i></button>
                          <button href="#" data-toggle="popover" data-placement="left" title="" data-content="Hapus Jawaban" data-original-title="" class="message btn btn-sm btn-danger" onclick="hapusJawaban('<?=$jawab->id_jawaban?>')"><i class="fa fa-trash-o"></i></button>
                        </center>
                    </td>
                  </tr>
              <?php }} ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Modal Tambah Pertanyaan-->
<div id="ModalTambahJawaban" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Pilihan Jawaban</h4>
      </div>
      <div class="modal-body">
        <p>Jawaban</p>
        <?=form_open('',array('method'=>'post','id'=>'selection','role'=>'form'))?>
        <input class="form-control" type="text" name="jawaban" placeholder="Masukkan Jawaban">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-default" name="simpanjawaban">Simpan</button>
        <?=form_close()?>
      </div>
    </div>
  </div>
</div>
<!-- Modal Edit jawaban -->
<div id="ModalEditJawaban" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Jawaban</h4>
      </div>
      <div class="modal-body">
        <p>Detail Jawaban</p>
        <?=form_open(base_url().'MengelolaPengaturan/editJawaban',array('method'=>'post','id'=>'selection','role'=>'form'))?>
        <input class="form-control" type="text" id="detailjawaban" name="jawaban" value="">
        <input type="hidden" name="ideditjawaban" id="ideditjawaban"value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
        <input type="submit" class="btn btn-default" name="update" value="Simpan"/>
        <?=form_close()?>
      </div>
    </div>
  </div>
</div>

<!-- Modal Konfirmasi Hapus Pertanyaan -->
<div id="ModalHapusJawaban" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Penghapusan</h4>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin akan menghapus jawaban tersebut ?</p>
      </div>
      <?=form_open(base_url().'MengelolaPengaturan/hapusJawaban',array('method'=>'post','id'=>'delete_data','role'=>'form'))?>
      <input type="hidden" id="deletejawaban" name="hapusjawaban" value="">
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
  function editJawaban(x){
    $.ajax({
      method:'post',
      url:'<?=base_url()?>MengelolaPengaturan/fetchJawaban',
      dataType:'json',
      data:{'idJawaban':x},
      success:function(data){
        console.log(data.jawaban);
        $('#ideditjawaban').val(data.jawaban.id_jawaban);
        $('#detailjawaban').val(data.jawaban.jawaban);
        $('#ModalEditJawaban').modal('show');
      }
    })
  }
  function hapusJawaban(value){
    $("#deletejawaban").val(value);
    $('#ModalHapusJawaban').modal('show');
  }

</script>
