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
      <?php if($this->session->flashdata('msg')=='success'){ ?>
        <div class="callout callout-success">
          <h4>Pertanyaan Berhasil Disimpan!</h4>
        </div>
      <?php } else if($this->session->flashdata('msg')=='failed'){ ?>
        <div class="callout callout-danger">
          <h4>Pertanyaan gagal disimpan!</h4>
        </div>
      <?php } ?>
          <div class="row">
            <div class="col-sm-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-folder-open-o"></i> List Pertanyaan</h3>
                </div>
                <div class="box-body">
                  <div class="body">
                    <div class="col-cs-12">
                      <button type="button" class="btn btn-success" style="margin-right:5px"name="button" data-toggle="modal" data-target="#ModalTambahPertanyaan"><span><i class="fa fa-plus-square"></i></span>  Tambah</button>
                    </div>
                  </div>
                  <br>
                  <table class="table table-bordered  table-striped table-hover">
                    <thead>
                      <tr>
                        <th><center>No</center></th>
                        <th>Nama Pertanyaan</th>
                        <th><center>Perintah</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($pertanyaan!=FALSE){
                        $i=1;
                        foreach($pertanyaan as $tanya){ ?>
                          <tr>
                            <td><?=$i++; ?></td>
                            <td><?=$tanya->pertanyaan?></td>
                            <td>
                              <center>
                                <button href="#" data-toggle="popover" data-placement="left" title="" data-content="Edit Pertanyaan" data-original-title="" class="message btn btn-sm btn-warning" onclick="editPertanyaan('<?=$tanya->id_pertanyaan?>')"><i class="fa fa-edit" aria-hidden="true"> </i></button>
                                <button href="#" data-toggle="popover" data-placement="left" title="" data-content="Daftar Jawaban" data-original-title="" class="message btn btn-sm btn-primary" onclick=""><i class="fa fa-th" aria-hidden="true"> </i></button>
                                <button href="#" data-toggle="popover" data-placement="left" title="" data-content="Hapus Pertanyaan" data-original-title="" class="message btn btn-sm btn-danger" onclick=""><i class="fa fa-trash-o"></i></button>
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
    <!-- Modal Tambah Pertanyaan-->
    <div id="ModalTambahPertanyaan" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Pertanyaan Baru</h4>
          </div>
          <div class="modal-body">
            <p>Pertanyaan</p>
            <?=form_open('',array('method'=>'post','id'=>'selection','role'=>'form'))?>
            <input class="form-control" type="text" name="pertanyaan" placeholder="Masukkan Pertanyaan">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-default" name="simpanpertanyaan">Simpan</button>
            <?=form_close()?>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Edit Pertanyaan -->
    <div id="ModalEditPertanyaan" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Perbarui Data Pertanyaan</h4>
          </div>
          <div class="modal-body">
            <p>Detail Pertanyaan</p>
            <?=form_open(base_url().'Admin/editPertanyaan',array('method'=>'post','id'=>'selection','role'=>'form'))?>
            <input class="form-control" type="text" id="detailpertanyaan" name="pertanyaan" placeholder="Masukkan Pertanyaan">
            <input type="hidden" name="ideditpertanyaan" id="ideditpertanyaan" value="">
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
    <div id="ModalHapusPertanyaan" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi Penghapusan Pertanyaan</h4>
          </div>
          <div class="modal-body">
            <p>Apakah Anda yakin akan menghapus pertanyaan tersebut ?</p>
          </div>
          <?=form_open(base_url().'Admin/hapusPertanyaan',array('method'=>'post','id'=>'delete_data','role'=>'form'))?>
          <input type="hidden" id="deletepertanyaan" name="id" value="112">
          <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-info" >Ya</button>
            <?=form_close()?>
          </div>
        </div>
      </div>
    </div>

<script>
// $('#element').popover('toggle');
  $(document).ready(function(){
    $('[data-toggle="popover"]').popover({
      trigger:"hover"
    });
  });
  function editPertanyaan(x){
    $.ajax({
      method:'post',
      url:'<?=base_url()?>Admin/fetchDataPertanyaan',
      dataType:'json',
      data:{'idPertanyaan': x},
      success:function(data){
        // alert();
        console.log(data);
        $('#ideditpertanyaan').val(data.pertanyaan.id_pertanyaan);
        $('#detailpertanyaan').val(data.pertanyaan.pertanyaan);
      $('#ModalEditPertanyaan').modal('show');
      }
    })
  }
  $(document).ready(function()
{
    $("button").click(function()
    {
        //Say - $('p').get(0).id - this delete item id
        $("#deletepertanyaan").val( $('p').get(0).id );
        $('#ModalHapusPertanyaan').modal('show');
    });
});
</script>
