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
                     <label for="namapegawai">Nama Bagian</label>
                     <input type="text" class="form-control" name="namabagian" placeholder="Masukan Bagian Kepegawaian">
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
