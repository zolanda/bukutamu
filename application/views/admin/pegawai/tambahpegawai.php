<div class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-user-plus"></i>Tambah Pegawai</h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>Admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#"><i class="fa fa-table"></i>Pegawai</a></li>
      <li class="active"><i class="fa fa-user-plus"></i>Tambah Pegawai</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-default">
      <div class="box-header with border">
        <div class="form-body">
          <?=form_open('',array('method'=>'post','id'=>'formtambahpegawai','role'=>'form'))?>
              <div class="form-group">
                 <label for="nip">Nomor Induk</label>
                 <input type="text" class="form-control" name="nip" placeholder="Nomor Induk Pegawai" data-validation="required number">
              </div>
              <div class="form-group">
                 <label for="namapegawai">Nama Pegawai</label>
                 <input type="text" class="form-control" name="namapegawai" placeholder="Nama Lengkap Pegawai" data-validation="custom required" data-validation-regexp="^([a-zA-Z]+)([\s.,a-zA-Z]*)$">
              </div>
              <div class="form-group">
                <label for="bagian">Bagian</label>
                  <select class="form-control input-lg" data-validation="required" name="bagian" width="100%">
                    <option value="">--Pilih Bagian--</option>
                    <?php if($bagian!=FALSE){
                      foreach ($bagian as $key) { ?>
                        <option value="<?=$key->id_bagian?>"><?=$key->nama_bagian?></option>
                    <?php  }} ?>
                  </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success" name="submit">Simpan</button>
              </div>
              <?php if($this->session->flashdata('msg')=='success'){ ?>
                <div class="alert alert-success col-md-4" style="margin-top:60px">
                  <p>Data berhasil disimpan!</p>
                </div>
              <?php } else if($this->session->flashdata('msg')=='failed'){ ?>
                <div class="alert alert-danger col-md-4" style="margin-top:60px">
                  <p>Data gagal disimpan!</p>
                </div>
              <?php } ?>
            <?=form_close()?>

        </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
  $.validate({})
</script>
