<div class="content-wrapper">
  <section class="content-header">
    <h3><i class="fa fa-vcard-o">Kebutuhan</i></h3>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>Admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a hred="#"><i class="fa fa-vcard-o"></i>Pengaturan</a></li>
      <li class="active"><i class="fa fa-folder-open-o"></i>List Kebutuhan</li>
    </ol>
  </section>
    <section class="content">
      <?php if($this->session->flashdata('msg')=='success'){ ?>
        <div class="callout callout-success">
          <h4>Kebutuhan Berhasil disimpan!</h4>
        </div>
      <?php } else if($this->session->flashdata('msg')=='failed'){ ?>
        <div class="callout callout-danger">
          <h4>Kebutuhan Gagal disimpan!</h4>
        </div>
      <?php } ?>
      <div class="row">
        <div class="col-sm-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-folder-open-o"></i>List Kebutuhan</h3>
            </div>
            <div class="box-body">
              <div class="body">
                <div class="col-cs-12">
                  <button type="button" class="btn btn-success" style="margin-right:5px" name="button" data-toggle="modal" data-target="#ModalTambahKebutuhan"><span><i class="fa fa-plus-square"></i></span> Tambah Kebutuhan</button>
                </div>
              </div>
              <br>
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th><center>No</center></th>
                    <th><center>Kebutuhan</center></th>
                    <th><center>Perintah</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($kebutuhan!=FALSE){
                    // die(print_r($pertanyaan));
                    $i=1;
                    foreach ($kebutuhan as $kbutuhn) { ?>
                      <tr>
                        <td><?=$i++?></td>
                        <td><?=$kbutuhn->purpose?></td>
                        <td>
                          <center>
                            <button href="<?=base_url()?>MengelolaPengaturan/hasil" data-toggle="popover" data-placement="left" title="" data-content="Hasil" data-original-title="" class="message btn btn-sm bg-olive" onclick=""><i class="fa fa-bar-chart-o"></i></button>
                            <button href="" data-toggle="popover" data-placement="left" title="" data-content="Edit Kebutuhan" data-original-title="" class="message btn btn-sm bg-orange" onclick="editKebutuhan('<?=$kbutuhn->id_kebutuhan?>')"><i class="fa fa-edit"></i></button>
                            <button href="" data-toggle="popover" data-placement="left" title="" data-content="Hapus Kebutuhan" data-original-title="" class="message btn btn-sm bg-red" onclick="hapusKebutuhan('<?=$kbutuhn->id_kebutuhan?>')"><i class="fa fa-trash"></i></button>
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
</div>
<!-- Modal Tambah Kebutuhan -->
<div id="ModalTambahKebutuhan" class="modal fade row" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><b>Tambah Kebutuhan Baru</b></h4>
        </div>
        <div class="modal-body">
          <p>Kebutuhan IKM</p>
          <?=form_open('',array('method'=>'post','id'=>'selection','role'=>'form'))?>
          <input class="form-control" type="text" name="kebutuhan" placeholder="Deskripsikan dengan singkat kebutuhan IKM">
          <input class="form-control" type="text" name="tahunkebutuhan" placeholder="">
          <input type="hidden" name="idkebutuhanincr" id="idkebutuhanincr" value="<?=$autoincr['AUTO_INCREMENT']?>">
        </div>
        <div class="form-group">
          <label><span style="margin-left:18px"> Centang Pertanyaan</span></label>
          <?php foreach($pertanyaan as $data) {?>
          <blockquote>
            <input type="checkbox"  name="pertanyaan[]" value="<?=$data->id_pertanyaan ?>"> <?=ucwords($data->pertanyaan)?>
          </blockquote>
        <?php } ?>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tidak</button>
          <input type="submit" class="btn btn-info" name="submit" value="Ya">
          <?=form_close()?>
        </div>
      </div>
    </div>
</div>
<!-- Modal Edit Kebutuhan-->
<div id="ModalEditKebutuhan" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perbarui Kebutuhan</h4>
      </div>
      <div class="modal-body">
        <p>Detail Kebutuhan</p>
        <?=form_open(base_url().'MengelolaPengaturan/editKebutuhan',array('method'=>'post','id'=>'selection','role'=>'form'))?>
        <input class="form-control" type="text" id="detailkebutuhan" name="detailkebutuhan" placeholder="Deskripsikan dengan singkat kebutuhan IKM">
        <input type="hidden" name="idkebutuhanincr" id="idkebutuhan" value="">
      </div>
      <div class="form-group">
        <label><span style="margin-left:18px"> Centang Pertanyaan</span></label>
        <?php foreach($pertanyaan as $data) {?>
        <blockquote>
          <input type="checkbox" id="idpertanyaan<?=$data->id_pertanyaan?>" name="pertanyaan[]" value="<?=$data->id_pertanyaan ?>"> <?=ucwords($data->pertanyaan)?>
        </blockquote>
      <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tidak</button>
        <input type="submit" class="btn btn-info" name="submit" value="Ya">
        <?=form_close()?>
    </div>
  </div>
</div>
</div>
<!-- Modal Hapus Kebutuhan -->
<div id="ModalHapusKebutuhan" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class-"modal-title">Konfirmasi Penghapusan Kebutuhan</h4>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin akan menghapus kebutuhan tersebut?</p>
      </div>
      <?=form_open(base_url().'MengelolaPengaturan/hapusKebutuhan',array('method'=>'post','id'=>'delete_data','role'=>'form'))?>
      <input type="hidden" id="deletekebutuhan" name="hapuskebutuhan" value="">
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="button">Tidak</button>
        <button type="submit" class="btn btn-info">Ya</button>
      </div>
      <?=form_close()?>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $('[data-toggle="popover"]').popover({
    trigger:"hover"
  });
});
function editKebutuhan(x){
  $('[name="pertanyaan[]"]').prop('checked',false);
  $.ajax({
    method:'post',
    url:'<?=base_url()?>MengelolaPengaturan/fetchDataKebutuhan',
    dataType:'json',
    data:{'idKebutuhan':x},
    // console.log(data);
    success:function(data){
      if(data.pertanyaan!=false){
        $.each(data.pertanyaan,function(index,item){
          $('#idpertanyaan'+item.id_pertanyaan).prop('checked',true);
        })
      }
      $('#idkebutuhan').val(x);
      $('#detailkebutuhan').val(data.kebutuhan.purpose);
      $('#ModalEditKebutuhan').modal('show');
    }
  })
}
function hapusKebutuhan(value){
  $('#deletekebutuhan').val(value);
  $('#ModalHapusKebutuhan').modal('show');
}
</script>
