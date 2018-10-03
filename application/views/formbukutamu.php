<!-- Full Width Column -->
    <div class="content-wrapper">
      <div class="container">
        <section class="content-header">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <span style="font-size:20px">
                  <ul id="webTicker">
                    <li>Selamat Datang di Dinas Kearsipan Dan Perpustakaan Prov. Jateng</li>
                    <li>Data Anda akan kami jaga kerahasiaannya.</li>
                  </ul>
                  </span>
                </div>
                <div class="box-body">
                  <?=form_open('',array('method'=>'post','id'=>'formbukutamu','role'=>'form'))?>
                  <!-- <form method="post" action='' role="form" id="formbukutamu"> -->
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="fpns">NOMOR IDENTITAS <em>(Wajib Diisi)</em></label>
                        <input type="text" class="form-control input-lg" id="identitas" name="identitas" placeholder="Kartu Tanda Penduduk / SIM / Kartu Pelajar">
                        <span class="err" id="invalid-identitas"></span>
                      </div>
                      <div class="form-group">
                        <label class="fpns">NAMA <em>(Wajib Diisi)</em></label>
                        <input type="text" class="form-control input-lg" id="nama" name="nama" placeholder="Nama Lengkap Anda">
                        <span class="err" id="invalid-nama"></span>
                      </div>
                      <div class="form-group">
                        <label class="fpns">INSTANSI / ALAMAT <em>(Wajib Diisi)</em></label>
                        <input type="text" class="form-control input-lg" id="alamat" name="instansi" placeholder="Instansi anda bekerja / Alamat anda" required>
                        <span class="err" id="invalid-alamat"></span>
                      </div>
                      <div class="form-group">
                        <label class="fpns">NOMOR HP <em>(Data akan kami jaga kerahasiaannya)</em></label>
                        <input type="text" class="form-control input-lg" id="nomortelepon" name="nomortelepon" placeholder="Nomor yang bisa dihubungi">
                        <span class="err" id="invalid-nomortelepon"></span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="fpns">KEPERLUAN <em>(Wajib Diisi)</em></label>
                        <select class="form-control input-lg" id="keperluan" name="keperluan">
                          <option value="">-- Pilih --</option>
                          <?php if ($keperluan!=FALSE){
                            foreach ($keperluan as $key){ ?>
                              <option value="<?= $key->id_keperluan ?>"> <?= $key->nama_keperluan ?></option>
                            <?php }} ?>

                        </select>
                        <span class="err" id="invalid-keperluan"></span>
                      </div>
                      <div class="form-group" id="nomorpeng">
                        <label class="fpns">NOMOR PENGUNJUNG <em>(Wajib Diisi)</em></label>
                        <input type="text" class="form-control input-lg" name="nomorpengunjung" placeholder="Lihat Dibalik Cocard Pengunjung">
                        <span class="err" id="invalid-nomorpengunjung"></span>
                      </div>
                      <div class="form-group" id="menemui">
                        <label class="fpns">SEBUTKAN JIKA UMUM ATAU LAIN LAIN <em>(Wajib Diisi)</em></label>
                        <input type="text" class="form-control input-lg" placeholder="Diskusi" id="lainlain" name="lainlain">
                        <span class="err" id="invalid-lainlain"></span>
                      </div>
                      <div class="form-group" id="pegawai">
                        <label class="fpns">PEGAWAI YANG INGIN ANDA TEMUI ? <em>(Boleh Dikosongi)</em></label>
                        <select class="form-control input-lg" id="pejabat" placeholder="Pilih Pejabat" name="pejabat">
                          <!-- <option value="0">--Pilih--</option> -->
                          <?php if($pegawai!=FALSE){
                            foreach ($pegawai as $key){?>
                              <option value="<?= $key->no_induk?>"> <?= $key->nama_pegawai?> </option>
                            <?php }} ?>
                        </select>
                        <span class="err" id="invalid-pejabat"></span>
                      </div>
                      <div class="form-group">
                        <label class="fpns">ANDA SENDIRIAN ? <em>(Wajib Diisi)</em></label>
                        <select class="form-control input-lg" id="issendirian" name="issendirian">
                          <option value="">-- Pilih --</option>
                          <option value="0">Hanya saya</option>
                          <option value="1">Rombongan ( Lebih dari 1 orang )</option>
                        </select>
                        <span class="err" id="invalid-issendirian"></span>
                      </div>
                      <div class="form-group" id="jumlah">
                        <label class="fpns">SEBUTKAN JUMLAHNYA ? (Orang) <em>(Wajib Diisi)</em></label>
                        <input type="text" class="form-control input-lg" placeholder="5" id="jumlahpengunjung" name="jumlahpengunjung">
                        <span class="err" id="invalid-jumlahpengunjung"></span>
                      </div>
                      <div class="form-group">
                        <button type="submit" id="simpan" class="btn btn-lg btn-block btn-success pull-right" name="submit">Simpan</button>
                      </div>
                  </div>
                  <?= form_close()?>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-lg-12">
                      <center><h3 class="fpns"><i class="fa fa-keyboard-o"></i> KEYBOARD</h3></center>
                      <div id="virtualKeyboard">

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
  </div>
  </div>
  </body>
  <script type="text/javascript">
  $('#webTicker').webTicker();
  $(function () {
  jsKeyboard.init("virtualKeyboard");

  //first input focus
  var $firstInput = $(':input').first();
  console.log($firstInput);
  jsKeyboard.currentElement = $firstInput;
  jsKeyboard.currentElementCursorPosition = 0;
  new WOW().init();
  });

  $(document).ready(function() {
  $(".animsition-overlay").animsition({
  inClass: 'overlay-slide-in-top',
  outClass: 'overlay-slide-out-top',
  inDuration: 1500,
  outDuration: 800,
  linkElement: '.animsition-link',
  // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
  loading: true,
  loadingParentElement: 'body', //animsition wrapper element
  loadingClass: 'animsition-loading',
  loadingInner: '', // e.g '<img src="loading.svg" />'
  timeout: false,
  timeoutCountdown: 5000,
  onLoadEvent: true,
  browser: [ 'animation-duration', '-webkit-animation-duration'],
  // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
  // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
  overlay : true,
  overlayClass : 'animsition-overlay-slide',
  overlayParentElement : 'body',
  transition: function(url){ window.location.href = url; }
  });
  });
  $("#jumlah").hide();
  $("#menemui").hide();
  // $("#pegawai").hide();
  $("#nomorpeng").hide();
  $("#issendirian").change(function(){
  if($(this).val() == 0){
  setTimeout(function() {
    $("#jumlah").hide('slide');
  }, 500 );
  } else if($(this).val() == 1){
  setTimeout(function() {
    $("#jumlah").show('slide');
  }, 500 );
  } else {

  }
  });
  $("#keperluan").change(function(){
  if($(this).val() == 5){
  setTimeout(function() {
    $("#menemui").show('slide');
  }, 500 );
  setTimeout(function() {
    $("#nomorpeng").hide('slide');
  }, 500 );
  } else if($(this).val() == 1){
  setTimeout(function() {
    $("#nomorpeng").show('slide');
  }, 500 );
  setTimeout(function() {
    $("#menemui").hide('slide');
  }, 500 );
  } else {
  setTimeout(function() {
    $("#menemui").hide('slide');
  }, 500 );
  setTimeout(function() {
    $("#nomorpeng").hide('slide');
  }, 500 );
  }
  });
  is_check('is_check_nomor','POST','<?php echo base_url('welcome/is_check_nomor')?>');
  var $validator = $("#formbukutamu").validate({
  rules: {

  unjung:{
    number:true,
    // is_check_nomor:true
  },
  identitas:{
    required:true,
    number:true,
    minlength:7
  },
  instansi: 'required',
  nama: 'required',
  nomortelepon :'required',
  keperluan: 'required',
  lainlain: 'required',
  issendirian:'required',
  jumlahpengunjung:{
    required:true,
    number:true
  }
  }, messages:{
  nomorpengunjung:{
    required:"<i class='fa fa-close'></i> Anda belum menuliskan nomor pengunjung.",
    number:"<i class='fa fa-close'></i> Format harus angka."
  },
  identitas:{
    required:"<i class='fa fa-close'></i> Anda belum menuliskan identitas.",
    number:"<i class='fa fa-close'></i> Format harus angka.",
    minlength:"<i class='fa fa-close'></i> Minimal 7 angka."
  },
  instansi:"<i class='fa fa-close'></i> Anda belum menuliskan alamat.",
  nama:"<i class='fa fa-close'></i> Anda belum menuliskan nama.",
  nomortelepon : "<i class='fa fa-close'></i> Anda belum menuliskan nomor telepon",
  keperluan:"<i class='fa fa-close'></i> Anda belum menuliskan keperluan",
  lainlain:"<i class='fa fa-close'></i> Mohon di spesifik kembali keperluan anda",
  issendirian:"<i class='fa fa-close'></i> Anda belum mengisi keterangan pengunjung.",
  jumlahpengunjung:{
    required:"<i class='fa fa-close'></i> Anda belum mengisi jumlah pengunjung.",
    number:"<i class='fa fa-close'></i> Format harus angka.",
  }
  }, submitHandler: function(form){
  var nama = $("#nama").val();
  var all = $("#formbukutamu").serialize();
  $("#simpan").attr('disabled','disabled');
  $.ajax({
    type:"POST",
    url :"<?php echo base_url('MengelolaTamu/simpandata')?>",
    data: all,
    dataType:"html",
    beforeSend:function(){
      $("#simpan").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Proses');
      $("#preview").html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></center>');
    },
    success:function(data){
      $("#simpan").html('<i class="fa fa-check-circle-o" aria-hidden="true"></i> Tersimpan');
      $(".proses4").html('<i class="fa fa-check-circle-o" aria-hidden="true"></i>')
      $('.modal').modal('hide');
      showizitoastsuccess('Terimakasih','Data anda sudah tersimpan','center','green');
    },
    error:function(error){
      console.log(error);
      // showizitoastsuccess('Oops','Terjadi Kesalahan, Hubungi Resepsionis','center','red');
      // $("#preview").html(gagalkoneksi);
    }
  });
  }
  });
  // $("#pejabat").chosen({height:"1000%"});
  $("#pejabat").selectize({
    create: true,
  });
  </script>
  <script src="<?php echo base_url('includes/library/js/demo.js')?>"></script>
