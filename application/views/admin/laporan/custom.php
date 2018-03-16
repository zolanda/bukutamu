<div class="content-wrapper">
    <section class="content-header">
      <div class="row">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bar-chart"></i>Laporan</h3>
          </div>
          <div class="box-body">
            <div class="col-sm-12">
              <div class="alert alert-info">
                Data pengujung yang muncul sesuai dengan rentang waktu yang Anda pilih.
              </div>
            </div>
            <div class="form-group">
              <label for="bulan">Masukkan range</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" id="custom" name="custom" placeholder="Berdasarkan waktu yang Anda masukkan">
                  </div>
            </div>
              <div id="download">Download
                  <a id="download1"><img src="<?php echo base_url('includes/icons/pdf.png')?>"></a>
              </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<script>
  // alert($('#hari').val());
  $('#custom').change(function(){
    var a= $('#custom').val();
    if(a==''){
      $('#download').hide();
    }else{
      $('#download').show();
    }
  })
  $('#custom').daterangepicker({

  },
  function (start,end,label) {
    var start=start.format('YYYY-MM-DD');
    var end=end.format('YYYY-MM-DD');
    downloadCustom(start,end);
  })

  $('dokumen').ready(function(){
    $('#download').hide();
  })
  function downloadCustom(start,end){
    // var a=$('#custom').val();
    // window.location.replace('<?=base_url()?>Laporan/printLaporanTahunan/'+a);
    $('#download1').attr('href','<?=base_url()?>Laporan/printLaporanCustom/'+start+'/'+end);
  }
</script>
