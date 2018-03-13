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
                          <button href="#" data-toggle="popover" data-placement="left" data-content="Edit Pegawai" class="message btn btn-sm btn-warning" onclick=""><i class="fa fa-edit"></i></button>
                          <button href="#" data-toggle="popover" data-placement="left" data-content="Edit Pegawai" class="message btn btn-sm btn-danger" onclick=""><i class="fa fa-trash-o"></i></button>
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
