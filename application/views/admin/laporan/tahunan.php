<div class="content-wrapper">
    <section class="content-header">
      <div class="row">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bar-chart"></i>Laporan Per Tahun </h3>
          </div>
          <div class="box-body">
            <div class="col-sm-12">
              <div class="alert alert-info">
                Data pengujung yang muncul sesuai dengan tahun yang Anda pilih.
              </div>
            </div>
            <div class="form-group">
              <label for="bulan">Cari Tahun</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Berdasarkan Tahun">
                  </div>
            </div>
              <div id="download">Download
                  <a onclick="downloadTahunan()"><img src="<?php echo base_url('includes/icons/pdf.png')?>"></a>
              </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<script>
  // alert($('#hari').val());
  $('#tahun').datepicker({
    format:"yyyy",
    startView:"years",
    minViewMode:"years",
    autoclose:true,
    orientation:"botton left"
  });
  $('#tahun').change(function(){
    var a= $('#tahun').val();
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
  // $('Default').MonthPicker();
//   $('#Modal').dialog({
//     autoOpen: false,
//     title: 'MonthPicker Dialog Test',
//     modal: true
// });
</script>
