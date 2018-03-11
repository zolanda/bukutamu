<div class="content-wrapper">
    <section class="content-header">
      <div class="row">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bar-chart"></i>Laporan Harian </h3>
          </div>
          <div class="box-body">
            <div class="col-sm-12">
              <div class="alert alert-info">
                Data pengujung yang muncul sesuai dengan tahun yang Anda pilih.
              </div>
            </div>
            <div class="box-body">
              <div class="col-sm-6">
                <div id="container" style="width:100%; height:400px;">
                  Cari Tahun
                  <div class="form-group">
                    <input type="text" class="form-control" id="tahun" placeholder="Berdasarkan Bulan">
                  </div>
                  <div id="download">Download
                    <a onclick="downloadTahunan()"><img src="<?php echo base_url('includes/icons/pdf.png')?>"></a>
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
  // alert($('#hari').val());
  $('#bulan').datepicker({
    format:"yyyy-mm",
    startView:"years",
    minViewMode:"months",
    autoclose:true,
    orientation:"botton left"
  });
  $('#bulan').change(function(){
    var a= $('#bulan').val();
    if(a==''){
      $('#download').hide();
    }else{
      $('#download').show();
    }
  })
  $('dokumen').ready(function(){
    $('#download').hide();
  })
  function downloadTahunan(){
    var a=$('#tahun').val();
    window.location.replace('<?=base_url()?>Laporan/printLaporanTahunan/'+a);
  }
  $('Default').MonthPicker();
  $('#Modal').dialog({
    autoOpen: false,
    title: 'MonthPicker Dialog Test',
    modal: true
});
</script>
