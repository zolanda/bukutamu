<div id="page-wrapper">
  <div class="main-page">
      <div class="forms">
        <!-- <h2 class="title"></h2> -->
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
          <div class="form-title">
            <h3><i class="fa fa-user-plus"> </i>Tambah Bagian Kepegawaian</h2>
            <div class="form-body">
              <?=form_open('',array('method'=>'post','id'=>'formtambahpegawai','role'=>'form'))?>
                  <div class="form-group">
                     <label for="nip"></label>
                     <input type="text" class="form-control" name="nip" placeholder="Nomor Induk Pegawai">
                  </div>
                  <div class="form-group">
                     <label for="namapegawai">Nama Pegawai</label>
                     <input type="text" class="form-control" name="namapegawai" placeholder="Nama Lengkap Pegawai">
                  </div>
                  <div class="form-group">
                    <label for="jabatan">Bagian</label>
                      <select class="form-control input-lg" name="jabatan" width="100%">
                        <option value="">--Pilih Bagian--</option>
                        <?php if($jabatan!=FALSE){
                          foreach ($jabatan as $key) { ?>
                            <option value="<?=$key->id_jabatan?>"><?=$key->nama_jabatan?></option>
                        <?php  }} ?>
                      </select>
                  </div>
                  <div class="row">
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
      </div>
  </div>
</div>
