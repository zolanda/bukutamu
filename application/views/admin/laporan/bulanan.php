<div id="page-wrapper">
  <div class="wrapper">
    <section class="content-header">
      <div class="row">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bar-chart"></i>Laporan Harian </h3>
          </div>
          <div class="box-body">
            <div class="col-sm-12">
              <div class="alert alert-info">
                Data pengujung yang muncul sesuai dengan hari yang Anda pilih.
              </div>
            </div>
            <div class="box-body">
              <div class="col-sm-6">
                <div id="container" style="width:100%; height:400px;">
                  Cari Hari
                  <div class="form-group">
                    <input type="date" class="form-control" id="hari" name="hari" placeholder="Berdasarkan Tanggal">
                  </div>
                  <div id="download">Download
                    <a onclick="downloadHarian()"><img src="<?php echo base_url('includes/icons/pdf.png')?>"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<script>
  // alert($('#hari').val());
  $('#hari').change(function(){
    var a= $('#hari').val();
    if(a==''){
      $('#download').hide();
    }else{
      $('#download').show();
    }
  })
  $('dokumen').ready(function(){
    $('#download').hide();
  })
  function downloadHarian(){
    var a=$('#hari').val();
    window.location.replace('<?=base_url()?>Laporan/printLaporanHarian/'+a);
  }
</script>
