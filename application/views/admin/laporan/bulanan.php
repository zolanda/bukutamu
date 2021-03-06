<div class="content-wrapper">
    <section class="content-header">
      <div class="row">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bar-chart"></i>Laporan Bulanan </h3>
          </div>
          <div class="box-body">
            <div class="col-sm-12">
              <div class="alert alert-info">
                Data pengujung yang muncul sesuai dengan bulan yang Anda pilih.
              </div>
            </div>
            <div class="form-group">
              <label for="bulan">Cari Bulan</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" id="bulan" name="bulan" placeholder="Berdasarkan Bulan">
                  </div>
            </div>
              <div id="download">Download
                  <a onclick="downloadBulanan()"><img src="<?php echo base_url('includes/icons/pdf.png')?>"></a>
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
  function downloadBulanan(){
    var a=$('#bulan').val();
    window.location.replace('<?=base_url()?>Laporan/printLaporanBulanan/'+a);
  }
  $('Default').MonthPicker();
  $('#Modal').dialog({
    autoOpen: false,
    title: 'MonthPicker Dialog Test',
    modal: true
});
</script>
