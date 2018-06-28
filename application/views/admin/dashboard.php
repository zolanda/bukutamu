<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="<?=base_url()?>includes/library/js/bootstrap-notify.js"></script>

<div class="content-wrapper">
  <section class="content-header">
    <div class="row">
      <div class="col-xs-12 col-sm-4 col-lg-4">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bar-chart"></i>Pengunjung Berdasarkan Bulan</h3>
            <div class="box-title pull-right">
            </div>
          </div>
          <div class="box-body">
            <div class="col-sm-12">
              <h5><i class="fa fa-search"></i>Pencarian</h5>
              <div class="col-xs-6">
                <select class="form-control" id="tahun">
                  <?php for($tahun=date('Y');$tahun>=2016;$tahun--){?>
                    <option value="<?=$tahun?>"><?=$tahun?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-12">
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto" >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4 col-lg-4">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bar-chart"></i>Pengunjung Berdasarkan Tanggal</h3>
            <div class="box-title pull-right">
            </div>
          </div>
          <div class="box-body">
            <div class="col-sm-12">
              <h5><i class="fa fa-search"></i>Pencarian</h5>
              <div class="col-xs-6">
                <select class="form-control per-bulan" id="tahuntanggal">
                  <?php for($tahun=date('Y');$tahun>=2016;$tahun--){ ?>
                    <option value="<?=$tahun?>"><?=$tahun?></option>
                <?php  } ?>
                </select>
              </div>
              <div class="col-xs-6">
                <select class="form-control per-bulan" id="bulantanggal">
                  <option <?php if(date('m')=="01"){echo "selected";} ?> value="01">Januari</option>
                  <option <?php if(date('m')=="02"){echo "selected";} ?> value="02">Februari</option>
                  <option <?php if(date('m')=="03"){echo "selected";} ?> value="03">Maret</option>
                  <option <?php if(date('m')=="04"){echo "selected";} ?> value="04">April</option>
                  <option <?php if(date('m')=="05"){echo "selected";} ?> value="05">Mei</option>
                  <option <?php if(date('m')=="06"){echo "selected";} ?> value="06">Juni</option>
                  <option <?php if(date('m')=="07"){echo "selected";} ?> value="07">Juli</option>
                  <option <?php if(date('m')=="08"){echo "selected";} ?> value="08">Agustus</option>
                  <option <?php if(date('m')=="09"){echo "selected";} ?> value="09">September</option>
                  <option <?php if(date('m')=="10"){echo "selected";} ?> value="10">Oktober</option>
                  <option <?php if(date('m')=="11"){echo "selected";} ?> value="11">November</option>
                  <option <?php if(date('m')=="12"){echo "selected";} ?> value="12">Desember</option>
                </select>
              </div>
              <div class="col-sm-12">
                <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto" >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4 col-lg-4">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bar-chart"></i>Pengunjung Berdasarkan Keperluan</h3>
            <div class="box-title pull-right">
            </div>
          </div>
          <div class="box-body">
            <div class="col-sm-12">
              <h5><i class="fa fa-search"></i>Pencarian</h5>
              <div class="col-xs-6">
                <select class="form-control" id="tahunkeperluan">
                  <?php for($tahun=date('Y');$tahun>=2016;$tahun--){ ?>
                    <option value="<?=$tahun?>"><?=$tahun?></option>
                <?php  } ?>
                </select>
              </div>
              <div class="col-xs-6">
                <select class="form-control" id="bulankeperluan">
                  <option <?php if(date('m')=="01"){echo "selected";} ?> value="01">Januari</option>
                  <option <?php if(date('m')=="02"){echo "selected";} ?> value="02">Februari</option>
                  <option <?php if(date('m')=="03"){echo "selected";} ?> value="03">Maret</option>
                  <option <?php if(date('m')=="04"){echo "selected";} ?> value="04">April</option>
                  <option <?php if(date('m')=="05"){echo "selected";} ?> value="05">Mei</option>
                  <option <?php if(date('m')=="06"){echo "selected";} ?> value="06">Juni</option>
                  <option <?php if(date('m')=="07"){echo "selected";} ?> value="07">Juli</option>
                  <option <?php if(date('m')=="08"){echo "selected";} ?> value="08">Agustus</option>
                  <option <?php if(date('m')=="09"){echo "selected";} ?> value="09">September</option>
                  <option <?php if(date('m')=="10"){echo "selected";} ?> value="10">Oktober</option>
                  <option <?php if(date('m')=="11"){echo "selected";} ?> value="11">November</option>
                  <option <?php if(date('m')=="12"){echo "selected";} ?> value="12">Desember</option>
                </select>
              </div>
              <div class="col-sm-12">
                <div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto" >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
function initChart(container, data, kategori){
  Highcharts.chart(container, {
    chart: {
      type: 'column'
    },
    title: {
      text: ' '
    },
    subtitle: {
      text: 'Source: Dinas Kearsipan dan Perpustakaan Provinsi Jawa Tengah'
    },
    xAxis: {
      categories: kategori,
      crosshair: true
    },
    yAxis: {
      allowDecimals: false,
      min: 0,
      title: {
        text: 'Jumlah(orang)'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y:.f} Orang</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.3,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Pengunjung',
      data: data

    }]
  });
}

function getDataPerBulan(){
  var thn = $('#tahuntanggal').val();
  var bln = $('#bulantanggal').val();
  $.ajax({
    method:"POST",
    url: "<?=base_url('MengelolaTamu/getdatapengunjungperbulan')?>",
    data : {tahun:thn, bulan:bln},
    dataType : "JSON",
    success:function(data){
      // console.log(data);
      var kat=[];
      var dat=[];
      kat.length=0;
      dat.length=0;
      $.each(data.hari, function(index,val){
        kat.push(val);
      })
      var ditemukan = false;
      $.each(data.data, function(index,val){
        dat.push(parseInt(val));
        if(val!=0){
          ditemukan=true;
        }
      })
      if(!ditemukan){
        notify('danger','Data Pengunjung Berdasarkan Tanggal Tidak Ditemukan')
      }
      initChart('container2',dat,kat);
    },
    error:function(data){
      alert(data.responseText);
    }
  })
}

function getDataPerTahun(){
  var thn = $('#tahun').val();
  $.ajax({
    method:"POST",
    url: "<?=base_url('MengelolaTamu/getdatapengunjungpertahun')?>",
    data : {tahun:thn},
    dataType : "JSON",
    success:function(data){
      var ditemukan = false;
      $.each(data,function(index,value){
        if(value!=0){
          ditemukan=true;
        }
      })

      if(!ditemukan){
        notify('danger',"Data Pengunjung Tahun "+$('#tahun').val()+" Tidak Ditemukan");
      }
      var kat = ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agst","Sept","Okt","Nov","Des"];
      var dat = [
        parseInt(data.januari),
        parseInt(data.februari),
        parseInt(data.maret),
        parseInt(data.april),
        parseInt(data.mei),
        parseInt(data.juni),
        parseInt(data.juli),
        parseInt(data.agustus),
        parseInt(data.september),
        parseInt(data.oktober),
        parseInt(data.november),
        parseInt(data.desember)
      ];
      initChart('container',dat,kat);
    },
    error:function(data){
      alert(data.responseText);
    }
  })
}

$('#tahun').change(function(){
  getDataPerTahun();
})
$('.per-bulan').change(function(){
  getDataPerBulan();
})

$(document).ready(function(){
  getDataPerTahun();
  getDataPerBulan();
  getDataKeperluan();
})

function initChart2(container, data){
  Highcharts.chart(container, {
    chart: {
      type: 'column'
    },
    title: {
      text: ' '
    },
    subtitle: {
      text: 'Source: Dinas Kearsipan dan Perpustakaan Provinsi Jawa Tengah'
    },
    xAxis: {
      categories: ['Akumulasi Tahun Sekarang' ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Jumlah(orang)'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:.f} Orang</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.3,
        borderWidth: 0
      }
    },
    series: data
  });
}
function notify(jenis,pesan){
	    $.notify({
	      // options
			title: '<span style="font-size:18px;">Pesan :</span><br>',
	      	message: pesan
	      },{
	      // settings
	      element: 'body',
	      type: jenis,
	      showProgressbar: false,
	      placement: {
	        from: "bottom",
	        align: "center"
	      },
	      animate: {
	        enter: 'animated fadeInUp',
	        exit: 'animated fadeOutDown'
	      }
	    });
}

function getDataKeperluan(){
  var thn=$('#tahunkeperluan').val();
  var bln=$('#bulankeperluan').val();
  $.ajax({
    method:"POST",
    url:"<?=base_url('MengelolaTamu/getdatakeperluan')?>",
    data:{tahun:thn, bulan:bln},
    dataType : "JSON",
    success:function(data){
      // console.log(data);
      if(data==false){
        notify('danger', 'Data Pengunjung Berdasarkan Keperluan')
      }
      initChart2('container3',data);
    },
    error:function(e){
      console.log(e);
    }
  })
}

$('#tahunkeperluan').change(function(){
  getDataKeperluan();
})

$('#bulankeperluan').change(function(){
  getDataKeperluan();
})
</script>
