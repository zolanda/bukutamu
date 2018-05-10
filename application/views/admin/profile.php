<div class="content-wrapper">
  <section class="content-header">
    <h3>Edit Profile</h3>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="#"><i class="fa fa-vcard-o"></i>Profile</li>
      <li class="active">Edit Profile</li>
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
            <?=form_open('',array('method'=>'post','id'=>'selection','role'=>'form-horizontal'))?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="user" name="user" disabled value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Password Baru</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Password Lama</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" value="">
                  </div>
                </div>
              </div>
              <?=form_close()?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
