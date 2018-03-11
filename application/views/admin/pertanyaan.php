<div class="content-wrapper">
      <section class="content-header">
        <h1>
          <i class="fa fa-vcard-o">Pertanyaan</i>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
          <li><a hred="#"><i class="fa fa-vcard-o"></i>Pengaturan</a></li>
          <li class="active"><i class="fa fa-folder-open-o"></i>List Pertanyaan</li>
        </ol>
        <br>
        <?php if($this->session->flashdata('msg')=='success'){ ?>
          <div class="alert alert-success col-md-4">
            <center>Pertanyaan Berhasil Disimpan!</center>
          </div>
        <?php } else if($this->session->flashdata('msg')=='failed'){ ?>
          <div class="alert alert-danger col-md-4">
            <center>Pertanyaan gagal disimpan!</center>
          </div>
        <?php } ?>
          <div class="grid_3 grid_5 widget-shadow">
            <div class="row">
              <div class="col-sm-12">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-folder-open-o"></i> List Pertanyaan</h3>
                </div>
                <div class="gr col-md-8">
                  <table class="table table-striped table-bordered table-hover">
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
                                <button href="#" data-toggle="popover" data-placement="left" title="" data-content="Edit Pertanyaan" data-original-title="" class="message btn btn-sm btn-warning" onclick="editPertanyaan('<?=$tanya->id_pertanyaan?>')"><i class="fa fa-edit" aria-hidden="true"> </i><//<button type="button" name="button"></button>
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
      </section>
      <div class="box box-solid">
        <div class="box-header a with-border">
          <h4 id="h3.-bootstrap-heading"class="box-title">Tambah Pertanyaan</h4>
        </div>
        <div class="body">
          <a href="#" onclick="" class="message" data-toggle="popover" data-placement="right" title="" data-content="Tambahkan Pertanyaan" data-original-title="">
          <button type="button" class="btn btn-sm bg-success dark pv20" data-toggle="modal" data-target="#myModal"><i class="zmdi zmdi-accounts-add"></i><i class="fa fa-plus-square"></i></button></a>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
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

<script>
  function editPertanyaan(x){
    $.ajax({
      method:'post',
      url:'<?=base_url()?>Admin/fetchDataPertanyaan',
      dataType:'json',
      data:{'idPertanyaan': x},
      success:function(data){
        alert();
      }
    })
  }
</script>
