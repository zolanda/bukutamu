
<!DOCTYPE HTML>
<html>
<head>
<title>Indeks Kepuasan</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> -->

<link href="<?= base_url()?>template_admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="<?= base_url()?>template_admin/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?= base_url()?>template_admin/css/font-awesome.css" rel="stylesheet">
<link href='<?= base_url()?>template_admin/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<script src="<?= base_url()?>template_admin/js/jquery-1.11.1.min.js"></script>
<script src="<?= base_url()?>template_admin/js/modernizr.custom.js"></script>
<link href="<?= base_url()?>template_admin///fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<script src="<?= base_url()?>template_admin/js/Chart.js"></script>
<script src="<?= base_url()?>template_admin/js/metisMenu.min.js"></script>
<script src="<?= base_url()?>template_admin/js/custom.js"></script>
<link href="<?= base_url()?>template_admin/css/custom.css" rel="stylesheet">

<script src="<?= base_url()?>template_admin/js/pie-chart.js" type="text/javascript"></script>

</head>
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.html"><span>Indeks Kepuasan</span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="<?=base_url()?>admin/dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
			  <li class="treeview">
                <a href="#">
                <i class="fa fa-credit-card"></i>
                <span>Akun Pengguna</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Akun Pengguna</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Grup Pengguna</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Role Pengguna</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Informasi Pengguna</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-wrench"></i>
                <span>Pengaturan</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href=#><i class="fa fa-map-o"></i> Keperluan</a></li>
                  <li><a href="<?=base_url()?>admin/pertanyaan"><i class="fa fa-map-o"></i> Pertanyaan</a></li>
                  <li><a href="#"><i class="fa fa-map-o"></i> Kebutuhan</a></li>
                </ul>
              </li>
			         <li class="treeview">
                <a href="<?=base_url()?>admin/listpengunjung">
                <i class="fa fa-street-view"></i> <span>Pengunjung</span>
                </a>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-table"></i> <span>Pegawai</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?=base_url()?>admin/tambahpegawai"><i class="fa fa-user-plus"></i>Tambah Pegawai</a></li>
                  <li><a href="<?=base_url()?>admin/listpegawai"><i class="fa fa-group"></i>Daftar Pegawai</a></li>
									<li><a href="<?=base_url()?>admin/bagian"><i class="fa fa-user"></i>Bagian Kepegawaian</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-envelope"></i> <span>Laporan </span>
                <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="<?=base_url()?>admin/laporanharian"><i class="fa fa-angle-right"></i> Harian </a></li>
                  <li><a href="<?=base_url()?>admin/laporanbulanan"><i class="fa fa-angle-right"></i> Bulanan</a></li>
                  <li><a href="#"><i class="fa fa-angle-right"></i> Tahunan</a></li>
                  <li><a href="#"><i class="fa fa-angle-right"></i> Custom</a></li>
                </ul>
              </li>
            </ul>
          </div>
      </nav>
    </aside>
	</div>
		<div class="sticky-header header-section ">
			<div class="header-left">
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>

				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				<div class="profile_details">
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">
									<span class="prfil-img"><img src="images/2.jpg" alt=""> </span>
									<div class="user-name">
										<p>Admin Name</p>
										<span>Administrator</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>
								</div>
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
								<li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li>
								<li> <a href="#"><i class="fa fa-suitcase"></i> Profile</a> </li>
								<li> <a href="<?=base_url()?>authenticate/logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
    <!-- CONTENT -->
          <?php $this->load->view ($content)?>
    <!-- CONTENT -->
    	<div class="main-page">
			<script src="<?=base_url()?>template_admin/js/amcharts.js"></script>
			<script src="<?=base_url()?>template_admin/js/serial.js"></script>
			<script src="<?=base_url()?>template_admin/js/export.min.js"></script>
			<link rel="stylesheet" href="css/export.css" type="text/css" media="all" />
			<script src="<?=base_url()?>template_admin/js/light.js"></script>
    <script  src="<?=base_url()?>template_admin/js/index1.js"></script>
			</div>
	<div class="footer">
	   <p>Copyright &copy; 2018 <a href="https://arpusda.jatengprov.go.id/"  target="_blank">Dinas Kearsipan dan Perpustakaan Provinsi Jawa Tengah. </a>All Right Reserved</p>
	</div>
	</div>
    <script src="<?= base_url()?>template_admin/js/Chart.bundle.js"></script>
    <script src="<?= base_url()?>template_admin/js/utils.js"></script>

	<script>
        var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var color = Chart.helpers.color;
        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: 'Dataset 1',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ]
            }, {
                label: 'Dataset 2',
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ]
            }]
        };
        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Bar Chart'
                    }
                }
            });

        };

        document.getElementById('randomizeData').addEventListener('click', function() {
            var zero = Math.random() < 0.2 ? true : false;
            barChartData.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return zero ? 0.0 : randomScalingFactor();
                });

            });
            window.myBar.update();
        });

        var colorNames = Object.keys(window.chartColors);
        document.getElementById('addDataset').addEventListener('click', function() {
            var colorName = colorNames[barChartData.datasets.length % colorNames.length];;
            var dsColor = window.chartColors[colorName];
            var newDataset = {
                label: 'Dataset ' + barChartData.datasets.length,
                backgroundColor: color(dsColor).alpha(0.5).rgbString(),
                borderColor: dsColor,
                borderWidth: 1,
                data: []
            };

            for (var index = 0; index < barChartData.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());
            }

            barChartData.datasets.push(newDataset);
            window.myBar.update();
        });

        document.getElementById('addData').addEventListener('click', function() {
            if (barChartData.datasets.length > 0) {
                var month = MONTHS[barChartData.labels.length % MONTHS.length];
                barChartData.labels.push(month);

                for (var index = 0; index < barChartData.datasets.length; ++index) {
                    //window.myBar.addData(randomScalingFactor(), index);
                    barChartData.datasets[index].data.push(randomScalingFactor());
                }

                window.myBar.update();
            }
        });
        document.getElementById('removeDataset').addEventListener('click', function() {
            barChartData.datasets.splice(0, 1);
            window.myBar.update();
        });
        document.getElementById('removeData').addEventListener('click', function() {
            barChartData.labels.splice(-1, 1); // remove the label first

            barChartData.datasets.forEach(function(dataset, datasetIndex) {
                dataset.data.pop();
            });
            window.myBar.update();
        });
    </script>
		<script src="<?= base_url()?>template_admin/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<script src="<?= base_url()?>template_admin/js/jquery.nicescroll.js"></script>
	<script src="<?= base_url()?>template_admin/js/scripts.js"></script>
	<script src='<?= base_url()?>template_admin/js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<script src="<?= base_url()?>template_admin/js/SimpleChart.js"></script>
   <script src="<?= base_url()?>template_admin/js/bootstrap.js"> </script>
</body>
</html>
