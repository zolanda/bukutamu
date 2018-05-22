<!DOCTYPE html>
<html>
<head>
  <title>Log In Systems</title>
</head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="<?= base_url()?>/includes/backend-lte/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url()?>/includes/backend-lte/css/adminlte.min.css" rel="stylesheet">
  <link href="<?= base_url()?>/includes/backend-material/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oxygen:400,300,700|Muli:300,400" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
  <link href="<?= base_url()?>/includes/backend-lte/css/_all-skins.min.css" rel="stylesheet">
  <link href="<?= base_url()?>/includes/backend-lte/css/animate.css" rel="stylesheet">
  <script src="<? base_url()?>/includes/backend-lte/js/jquery.js"></script>
  <script src="<?= base_url()?>/includes/backend-lte/js/select2.full.min.js"></script>
  <script src="<?= base_url()?>/includes/backend-lte/js/bootstrap.min.js"></script>
  <script src="<?= base_url()?>includes/backend-lte/js/app.min.js"></script>
  <script src="<?= base_url()?>/includes/backend-lte/js/bootstrap-notify.js"></script>

  <script type="text/javascript">
    function notify(jenis,pesan){
      $.notify({
        // options
        title: 'Notifikasi : ',
        message: pesan
        },{
        // settings
        element: 'body',
        type: jenis,
        showProgressbar: true,
        placement: {
          from: "top",
          align: "center"
        },
        animate: {
          enter: 'animated fadeInDown',
          exit: 'animated fadeOutUp'
        }
      });
    }
  </script>

  <link rel="shortcut icon" href="<?php echo base_url('includes/logo.png')?>">
  <style type="text/css">
    [data-notify="progressbar"] {
      margin-bottom: 0px;
      position: absolute;
      bottom: 0px;
      left: 0px;
      width: 100%;
      height: 5px;
    }
    .status_msg{
      font-family:'Oxygen',sans-serif;
      font-size:15px;
    }
    body{
      font-family:'Oxygen',sans-serif;
    }
    .content-background{
      background:url("<?echo base_url('includes/log_back_02.png')?>");
      background-repeat: repeat;
    }
    .error_msg{
      font-family:'Oxygen',sans-serif;
      font-size:15px;
    }
    .oxygen{
      font-family: 'Oxygen',sans-serif;
    }
    .oxygen600{
      font-family: 'Oxygen',sans-serif;
      font-weight: 600;
    }
    .opensans{
      font-family: 'open sans', sans-serif;;
    }
    .opensans16{
      font-size:16px;
      font-family: 'open sans', sans-serif;;
    }
    .login-box-msg{
      font-family: 'muli', sans-serif;;
    }
    .cover {
      background: url("<?echo base_url('includes/logo_transparent.png')?>") no-repeat;
      background-size: contain;
    }
    .login-box-footer{
      padding:8px;
      font-family:'muli',sans-serif;
      text-align:center;
      background:rgba(102,153,255,.5)
    }
  </style>
  <body class="hold-transition content-background">
    <div class="login-box">
      <div class="login-logo cover" style="padding-left:90px;">
        <a class="oxygen600"><b>E-</b>VISITOR</a>
        <h4 class="opensans" style="font-size:16px;">Sistem Informasi Pengunjung</h4>
        <h4 class="opensans" style="font-weight:600;">Dinas Kearsipan</h4>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Masukan Username dan Password anda untuk Log In</p>
        <?php echo form_open(base_url('authenticate/login'),array('class'=>'form-signin'));?>
          <?php if (!empty($message)) { ?>
            <div id="message" class="alert alert-success" style="font-family:ft10;font-size:12px">
              <?php echo $message; ?>
            </div>
          <?php } ?>
          <div id="messages" style="display:none;">
            <div class="alert alert-success" role="alert"><p class="error_msg"><i class="fa fa-check"></i> Succesfully login, Redirecting..</p></div>
          </div>
          <div class="form-group has-feedback">
            <input type="text" name="username" id="identity" class="form-control input-lg opensans16" placeholder="Username">
            <span class="fa fa-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password" name="password" class="opensans16 form-control input-lg" placeholder="Password">
            <span class="fa fa-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <button id="submit" name="login_user" value="Submit" class="btn bg-orange btn-block btn-lg btn-flat">Masuk</button>
          </div>
      </div>
      <div class="login-box-footer"><div class="row">
            <div class="col-xs-12">
              Dinas Kearsipan Dan Perpustakaan Prov. Jateng
            </div>
          </div></div>
      <?php echo form_close()?>
        </form>
    </div>
</div>
</body>
</html>
