<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script src="<?=base_url()?>template_admin/bower_components/jquery/dist/jquery-3.3.1.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> -->

<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
  <!-- <script src="<?=base_url()?>template_admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script> -->
  <link rel="stylesheet" href="<?=base_url()?>template_admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>template_admin/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>template_admin/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>template_admin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>template_admin/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?=base_url()?>template_admin/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="<?=base_url()?>template_admin/bower_components/jvectormap/jquery-jvectormap.css">
  <script src="<?=base_url()?>includes/library/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="<?=base_url()?>template_admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?=base_url()?>includes/library/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?=base_url()?>template_admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?=base_url()?>template_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo" style="background-color:#008d4c !important">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>Indeks Kepuasan</b></span>
    </a>
    <nav class="navbar navbar-static-top" style="background-color:#008d4c !important">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="<?=base_url()?>template_admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>template_admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url()?>authenticate/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>template_admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="<?=base_url()?>admin/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-credit-card"></i>
            <span>Akun Pengguna</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Akun Pengguna </a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Grup Pengguna</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Role Pengguna</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Informasi Pengguna</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i>
            <span>Pengaturan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-map-o"></i> Keperluan</a></li>
            <li><a href="<?=base_url()?>admin/pertanyaan"><i class="fa fa-map-o"></i> Pertanyaan</a></li>
            <li><a href="#"><i class="fa fa-map-o"></i> Kebutuhan</a></li>
          </ul>
        </li>
        <li class="">
          <a href="<?=base_url()?>admin/listpengunjung">
            <i class="fa fa-street-view"></i> <span>Pengunjung</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Pegawai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>admin/tambahpegawai"><i class="fa fa-user-plus"></i> Tambah Pegawai</a></li>
            <li><a href="<?=base_url()?>admin/listpegawai"><i class="fa fa-group"></i> Daftar Pegawai</a></li>
            <li><a href="<?=base_url()?>admin/bagian"><i class="fa fa-user"></i> Bagian Kepegawaian</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>admin/laporanharian"><i class="fa fa-file-pdf-o"></i>Harian</a></li>
            <li><a href="<?=base_url()?>admin/laporanbulanan"><i class="fa fa-file-pdf-o"></i>Bulanan</a></li>
            <li><a href="<?=base_url()?>admin/laporantahunan"><i class="fa fa-file-pdf-o"></i>Tahunan</a></li>
            <li><a href="<?=base_url()?>admin/laporancustom"><i class="fa fa-file-pdf-o"></i>Custom</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
    <?php $this->load->view($content)?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="https://arpusda.jatengprov.go.id">Dinas Kearsipan dan Perpustakaan Provinsi Jawa Tengah</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
    </div>
  </aside> -->
  <!-- <div class="control-sidebar-bg"></div> -->
</div>
<!-- ./wrapper -->
<!--
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script> -->
<script src="<?=base_url()?>template_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>template_admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?=base_url()?>template_admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?=base_url()?>template_admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?=base_url()?>template_admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?=base_url()?>template_admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="<?=base_url()?>template_admin/bower_components/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>template_admin/bower_components/morris.js/morris.min.js"></script>
<script src="<?=base_url()?>template_admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="<?=base_url()?>template_admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url()?>template_admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?=base_url()?>template_admin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="<?=base_url()?>template_admin/bower_components/moment/min/moment.min.js"></script>
<script src="<?=base_url()?>template_admin/plugins/iCheck/icheck.min.js"></script>
<script src="<?=base_url()?>template_admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?=base_url()?>template_admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>template_admin/bower_components/chart.js/Chart.js"></script>
<script src="<?=base_url()?>template_admin/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?=base_url()?>template_admin/dist/js/adminlte.min.js"></script>
<!-- <script src="<?=base_url()?>template_admin/dist/js/pages/dashboard.js"></script> -->
<script src="<?=base_url()?>template_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>template_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>template_admin/dist/js/demo.js"></script>
<script src="<?=base_url()?>template_admin/bower_components/Flot/jquery.flot.js"></script>
<script src="<?=base_url()?>template_admin/bower_components/Flot/jquery.flot.resize.js"></script>
<script src="<?=base_url()?>template_admin/bower_components/Flot/jquery.flot.pie.js"></script>
<script src="<?=base_url()?>template_admin/bower_components/Flot/jquery.flot.categories.js"></script>
</body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
