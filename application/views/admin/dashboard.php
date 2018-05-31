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
              <div class="col-xs-">
                <select class="form-control" id="tahun">
                  <option value="">Pilih Tahun</option>
                  <?php for($tahun=date('Y');$tahun>=2016;$tahun--){?>
                    <option value="<?=$tahun?>"><?=$tahun?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-12">
                <div id="container3">
                    <canvas id="myChart" width="500" height="400"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bar-chart"></i>Pengunjung Berdasarkan Tanggal</h3>
            <div class="box-title pull-right">

            </div>
          </div>
          <div class="box-body">
            <div class="col-sm-12">
              <input type="hidden" name="bl" value="bl">
              <h5><i class="fa fa-search"></i>Pencarian</h5>
              <div class="col-xs-4">
                <select class="form-control" id="tahuntanggal" name="tahuntanggal">
                  <option value="">Pilih Tahun</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                </select>
                <div class="col-xs-4">
                  <select class="form-control" id="bulantanggal" name="bulantanggal">
                    <option value="">Pilih Bulan</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
                </div>
                <div class="col-sm-12">
                  <div id="container">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </section>
</div>
<script>
ctx = $('#myChart');
$('#tahun').change(function(){
  valtahun=$('#tahun').val();
  $.ajax({
    method:"POST",
    url : "<?=base_url()?>admin/fetchDataPengunjungTahun",
    dataType:'JSON',
    data:{tahun: valtahun},
    success:function(data){
      context=$('#myChart');;
      createChart([1,2,3],context,[1,2,3],'bar');
      // var bulan =[];
      // var dataChar=[];
      // if(data!=false){
      //   $.each(data, function(i, item){
      //     // console.log(i);
      //     bulan.push(item.bulan);
      //     dataChar.push(parseInt(item.jumlah));
      //   })
      // }
    }
  })
})
dataChar=[1,2];
bulan=['a','b'];
createChart(dataChar,ctx,bulan,'bar');
function createChart(data, context, label, type){
  var myChart = new Chart(context,{
    type: 'bar',
    data: {
        labels: ['a','b','c','d'],
        datasets: [{
            label: '',
            data: [1,2,3,4],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
  })
}
</script>
