<div class="row">
  <div class="col-xs-12 col-sm-6 col-lg-12">
    <div class="box">
      <div class="box-header with-border" style="text-align:center !important">
        <h3 class="box-title"><i class="fa fa-bar-chart"></i>Indeks Kepuasan Masyarakat</h3>
        <div class="box-title pull-right">
        </div>
      </div>
      <div class="box-body">
        <div class="col-xs-12 col-sm-6 col-lg-6 col-md-offset-3" style="height:550px !important">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th rowspan="2" >NO</th>
                <th rowspan="2">KEBUTUHAN</th>
                <th rowspan="2">STATUS</th>
                <th colspan="2" style="text-align:center">JUMLAH</th>
                <th rowspan="2">HASIL</th>
              </tr>
              <tr>
                <th>PERTANYAAN</th>
                <th>RESPONDEN</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($kebutuhan as $key): ?>
                <tr>
                  <td><?=$no?></td>
                  <td><?=$key['kebutuhan']?></td>
                  <td><?php if($key['tahun']==date('Y')){
                    echo "Aktif";
                  }else{
                    echo "Tidak Aktif";
                  }?></td>
                  <td><?=$key['pertanyaan']?></td>
                  <td><?=$key['responden']?></td>
                  <td><?=$key['nilai']?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
