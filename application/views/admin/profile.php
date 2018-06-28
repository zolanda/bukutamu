<div class="content-wrapper">
  <section class="content-header">
    <h3>Edit Profile</h3>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="#"><i class="fa fa-vcard-o"></i>Profile</a></li>
      <li class="active">Edit Profile</i>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-sm-12">
        <div class="box">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Admin Edit Profile</h3>
            </div>
            <?=form_open('',array('method'=>'post','class'=>'form-horizontal'))?>
            <?php if($this->session->flashdata('password_validation')!='') {?>
              <div class="control-group">
                <div class="controls">
                  <?=$this->session->flashdata('password_validation')?>
                </div>
              </div>
            <?php } ?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="user" name="user" disabled value="<?=$nama_admin?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Password Lama</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="oldpassword" placeholder="Masukkan password lama">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Password Baru</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="newpassword" placeholder="Masukkan password baru">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Konfirmasi Password Baru</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="confirmpassword" placeholder="Konfirmasi password baru">
                  </div>
                </div>
                <?=$this->session->flashdata('msg_editprofile')?>
                <div>
                  <button type="button" class="btn btn-danger pull-left">Batal</button>
                  <button type="submit" class="btn btn-success pull-right" name="submit">Simpan</button>
                </div>
              </div>
              <?=form_close()?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
