<!DOCTYPE html>
<html>
<head>
  <title><?=$title?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="<?= base_url()?>/includes/home/css/jsKeyboard.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url()?>/includes/library/css/font.css" rel="stylesheet">
  <link href="<?= base_url()?>/includes/library/css/izitoast.min.css" rel="stylesheet">
  <link href="<?= base_url()?>/includes/library/css/bootstrap.min.css" media="screen,projection" rel="stylesheet">
  <link href="<?= base_url()?>/includes/library/css/adminlte.min.css" rel="stylesheet">
  <link href="<?= base_url()?>/includes/library/css/_all-skins.min.css" rel="stylesheet">
  <link href="<?= base_url()?>/includes/library/css/skins/square/aero.css" rel="stylesheet">
  <link href="<?= base_url()?>/includes/backend-lte/css/animsition.min.css" rel="stylesheet">
  <link href="<?= base_url()?>/includes/library/css/animate.css" rel="stylesheet">
  <link href="<?= base_url()?>/includes/library/css/themes/pacecounter.css" rel="stylesheet">
  <link href="<?= base_url()?>/includes/home/font/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url()?>/includes/logo.png" rel="shortcut icon">
  <link href="<?= base_url()?>/includes/library/chosen/chosen.min.css" rel="stylesheet">

  <style type="text/css">
    .error{
      font-size:18px;
      color:red;
    }
    .fpnss{
      font-family:'nova bold';
    }
    .fpns{
      font-family:'nova semibold';
    }
    .fpns>em{
      font-family: 'nova regular';
    }
  </style>
  <script src="<?= base_url()?>/includes/library/js/jquery.js"></script>
  <script src="<?= base_url()?>/includes/home/js/jsKeyboard.js"></script>
  <script src="<?= base_url()?>/includes/library/js/bootstrap.min.js"></script>

  <script src="<?= base_url()?>/includes/library/js/app.min.js"></script>
  <script src="<?= base_url()?>/includes/library/js/bootstrap-notify.js"></script>
  <script src="<?= base_url()?>/includes/library/js/jquery.validate.min.js"></script>
  <script src="<?= base_url()?>/includes/backend-lte/js/jquery.webticker.min.js"></script>
  <script src="<?= base_url()?>/includes/backend-lte/js/animsition.min.js"></script>
  <script src="<?= base_url()?>/includes/library/js/icheck.min.js"></script>
  <script src="<?= base_url()?>/includes/library/js/izitoast.min.js"></script>
  <script src="<?= base_url()?>/includes/library/js/new.js"></script>
  <script src="<?= base_url()?>/includes/backend-lte/js/pace.min.js"></script>
  <script src="<?= base_url()?>/includes/home/js/wow.min.js"></script>
  <script src="<?= base_url()?>/includes/library/chosen/chosen.jquery.min.js"></script>
  <script src="<?= base_url()?>/includes/library/chosen/chosen.proto.min.js"></script>
</head>
<body class="skin-green-light layout-top-nav animsition-overlay">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?= base_url()?>" class="navbar-brand">BUKU TAMU ELEKTRONIK</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
            </ul>
          </div>
        </div>
      </nav>
    </header>
<!-- CONTENT -->
      <?php $this->load->view ($content)?>
<!-- CONTENT -->
  </div>
<footer class="main-footer">
    <div class="container">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
        </div>
        Copyright &copy; 2018 <a href="https://arpusda.jatengprov.go.id">Dinas Arpus Jateng</a>. All rights reserved.
    </div>
    <!-- /.container -->
</footer>
</body>
<script type="text/javascript" src="<?=base_url()?>includes/template_admin/chartjs/chart.js">

</script>
<script type="text/javascript">
    $("#place").hide();
    $('#webTicker').webTicker();
    $(document).ready(function() {
      $(".animsition-overlay").animsition({
        inClass: 'overlay-slide-in-top',
        outClass: 'overlay-slide-out-top',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        loadingInner: '', // e.g '<img src="loading.svg" />'
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : true,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'body',
        transition: function(url){ window.location.href = url; }
      });
    });
    function show_number(){
      var nomor = $("#nomorpengunjung").val();
      data={nomor:nomor};
      show_ajax_load("POST","<?= base_url()?>/welcome/check_nomor",data,"html","#place","Mencari Data..");
    }
</script>
</html>
