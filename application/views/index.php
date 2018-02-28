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
                <li>Mohon bantuannya untuk mengisi indeks kepuasan masyarakat.</li>
                <li>Jangan Lupa minta nomor loker untuk menitipkan barang anda agar aman.</li>
              </ul>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-6">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title text-green fpnss">PANEL BUKU TAMU</h3>
                </div>
                <div class="box-body">
                  <form>
                    <blockquote class="pull-right">
                      <p>Kami Memiliki Buku Tamu Elektronik</p>
                      <small>Mohon mengisi Data Anda.</small>
                    </blockquote>
                  </form>
                  <div class="form-group col-lg-12">
                    <center>
                      <a href="<?= base_url()?>user/bukutamu" class="btn bg-olive btn-lg animsition-link" data-animsition-out-class="overlay-slide-out-top" data-animsition-out-duration="2000"><i class="fa fa-paper-plane"></i> Mulai</a>
                    </center>
                  </div>
                </div>
              </div>
              <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="fpnss box-title text-green">PANEL LAPORAN</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-lg-12">
                    <blockquote class="pull-right">
                      <p>Bidang Layanan dan Pemanfaatan Arsip</p>
                      <small>Fitur yang ada</small>
                    </blockquote>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div>
                        <center>
                          <a class="btn btn-app bg-orange">
                            <i class="fa fa-bar-chart-o"></i> Grafik Pengunjung
                          </a>
                          <a class="btn btn-app bg-olive">
                            <i class="fa fa-bar-chart-o"></i> Hasil Kuesioner
                          </a>
                        </center>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="fpnss box-title text-green">PANEL KUESIONER</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-lg-12">
                    <form role="form" id="formbukutamu">
                      <blockquote class="pull-right">
                        <p>Kami memiliki sebuah Kuesioner</p>
                        <small>Bantu Kami untuk melengkapinya.</small>
                      </blockquote>
                      <div class="form-group col-lg-9">
                        <input type="text" class="form-control input-lg" id="nomorpengunjung" name="nomorpengunjung" placeholder="Masukkan Nomor Pengunjung Anda">
                      </div>
                      <div class="form-group col-lg-3">
                        <a id="simpan" class="btn btn-lg bg-olive pull-right"><i class="fa fa-search"></i> Temukan</a>
                      </div>
                      <div name="notfound"></div>
                      <div name="found">  </div>
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div name="notfound">
                      <center>
                      <h1><i class="fa fa-window-close-o"></i></h1>
                      <h4>Data tidak Ditemukan</h4>
                      <h5>Lihat Nomor Pengunjung dibalik Cocard</h5>
                      </center>
                    </div>
                    <div name="found">
                      <center>
                        <h1><i class="fa fa-check-square-o"></i></h1>
                        <h4 class="fpns">Data Anda Ditemukan</h4>
                        <h5>Berikut Perinciannya :</h5>
                      </center>
                      <blockquote style="border-left: 5px solid #3d9970 !important">
                        <p><i class="fa fa-user-circle-o"></i> <span id="nama-tamu"></span> </p>
                        <small>Nama</small>
                      </blockquote>
                      <blockquote style="border-left: 5px solid #3d9970 !important">
                        <p><i class="fa fa-calendar-o"></i> <span id="waktu"></span></p>
                        <small>Datang pada waktu</small>
                      </blockquote>
                      <hr>
                      <h4><center>Terima kasih atas partisipasinya</center></h4>
                      <center>
                        <h5>Tekan Mulai untuk Mengisi Kuesioner</h5>
                        <h4><a href="#" class="btn btn-lg bg-olive animsition-link" data-animsition-out-class="overlay-slide-out-top" data-animsition-out-duration="2000"><i class="fa fa-paper-plane" id="mulai"></i>
                        Mulai </a></h4>
                        <!-- <a href="<?php echo base_url('welcome/form_buku')?>" class="btn bg-olive btn-lg animsition-link" data-animsition-out-class="overlay-slide-out-top" data-animsition-out-duration="2000"><i class="fa fa-paper-plane"></i> Mulai</a> -->
                      </center>
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
    $("[name='notfound']").hide();
    $("[name='found']").hide();
    // $('#webTicker').webTicker();
    $(document).ready(function() {
      $(".animsition-overlay").animsition({
        inClass: 'overlay-slide-in-top',
        outClass: 'overlay-slide-out-top',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        loadingInner: '', // e.g '<img src="loading.svg" />'
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : true,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'body',
        transition: function(url){ window.location.href = url; }
      });
    });
    $('#simpan').click(function(){
      $.ajax({
        type:"POST",
        url:"<?php echo base_url('MengelolaTamu/getTamuByNopengunjung')?>",
        data:{nomorpengunjung:$('#nomorpengunjung').val()},
        dataType:'json',
        success:function(data){
          if(data==false){
            $("[name='notfound']").show();
            $("[name='found']").hide();
          }else{
            $('#nama-tamu').html(data.nama_tamu);
            $('#waktu').html(data.waktu);
            $("[name='found']").show();
            $('#mulai').click(function(){
              window.location.replace('<?= base_url()?>MengelolaTamu/show_kuesioner/'+data.no_pengunjung);
            })
            $("[name='notfound']").hide();
          }
        }
      })
    });
</script>
