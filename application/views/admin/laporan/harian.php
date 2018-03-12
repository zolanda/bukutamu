<div class="content-wrapper">
    <section class="content-header">
      <section class="content">
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
                    <div class="form-group">
                      <label for="hari">Cari Hari</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" data-provide="datepicker" class="form-control pull-right" id="hari" name="hari" placeholder="Berdasarkan Tanggal"/>
                      </div>
                    </div>
                    <div id="download">Download
                      <a onclick="downloadHarian()"><img src="<?php echo base_url('includes/icons/pdf.png')?>"></a>
                    </div>
                </div>
          </div>
      </section>
    </section>
</div>

<script>
  // alert($('#hari').val());
  $('#hari').datepicker({
    autoclose:true,
    format : 'yyyy-mm-dd',
  })
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
