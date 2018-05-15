

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 916px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                <i class="fa fa-vcard-o" aria-hidden="true"></i> Keperluan
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="#"><i class="fa fa-vcard-o" aria-hidden="true"></i> Pengaturan</a></li>
                <li class="active"><i class="fa fa-folder-open-o" aria-hidden="true"></i> List Keperluan</li>
              </ol>
              <br>
              <div class="row">
                <div class="col-sm-12">
                   <div class="box">
                     <div class="box-header with-border">
                       <h3 class="box-title"><i class="fa fa-folder-open-o" aria-hidden="true"></i> List Pengaturan</h3>
                       <div class="box-title pull-right">
                       </div>
                     </div>
                     <div class="box-body">
                       <div class="row">
                         <div class="col-md-3">
                                <div class="box box-solid">
                                  <div class="box-header a with-border">
                                      <h3 class="box-title">Pencarian</h3>
                                  </div>
                                  <div class="box-body">
                                      <input type="text" name="namakeperluan" id="namakeperluan" class="form-control" placeholder="Nama keperluan">
                                    <br>
                                    <input type="text" name="jum" id="jum" class="form-control" placeholder="Tampilkan lebih banyak" value="12">
                                    <br>
                                    <button class="btn btn-block btn-primary" onclick="searchkeperluan()">Cari</button>
                                    <br>
                                  </div>
                                </div>
                                <div class="box box-solid">
                                  <div class="box-header a with-border">
                                    <h3 class="box-title">Tambah keperluan</h3>
                                  </div>
                                  <div class="box-body">
                                    <a onclick='add_keperluan()' class="message" href="#" data-toggle="popover" data-placement="right" title="" data-content="Tambahkan keperluan." data-original-title=""><button class="btn btn-sm bg-green margin"><i class="zmdi zmdi-accounts-add"></i> <i class="fa fa-plus-square"></i></button></a>
                                  </div>
                                </div>
                                <div class="box box-solid">
                                  <div class="box-header a with-border">
                                    <h3 class="box-title">Hapus keperluan</h3>
                                  </div>
                                  <div class="box-body">
                                    <button onclick='confirm()' href="#" data-toggle="popover" data-placement="right" title="" data-content="keperluan akan dihapus." data-original-title="" class="message btn bg-red margin btn-sm"><i class="fa fa-trash-o"></i></button>
                                  </div>
                                </div>
                         </div>
                         <div class="col-md-9">
                           <h4>Daftar Keperluan</h4>
                           <div id="place"></div>
                         </div>
                         <br><br>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
            </section>
         </div>

        <!-- /.content-wrapper -->
<script type="text/javascript">
  // FIX
  function add_keperluan(){
    data={judul:'Tambah keperluan Baru',name:' '};
    $("#tombol").html('');
    modal_ajax(data,'POST','<?php echo base_url('pengaturan/add_keperluan')?>','html','#preview',0);
  }
  $(".message").popover({ trigger: "hover" });

  // FIX
  function refreshkeperluan(){
    $.ajax({
      type:"POST",
      url :"<?php echo base_url('pengaturan/show_keperluan')?>",
      data:{
      },
      dataType:"html",
      beforeSend:function(){
        $("#place").html(loading);
      },
      success:function(data){
        $("#place").html(data);
      },
      error:function(){
        $("#place").html(gagalkoneksi);
      }
    })
  }

  refreshkeperluan();

  // FIX
  function searchkeperluan(){
      var namakeperluan = $("#namakeperluan").val();
      var jum = $("#jum").val();
      data={keperluan:namakeperluan,jum:jum};
      show_ajax('POST','<?php echo base_url('pengaturan/show_keperluan')?>',data,'html','#place');
  }

  // FIX
  function confirm(){
      var data = $("#selection").serializeArray();
      var judul= 'Konfirmasi Penghapusan';
      var name = 'Beberapa keperluan';
      var b = [];
      jQuery.each( data, function( i, data ) {
        b.push(data.value);
      });
      a={data:b,judul:judul,name:name};
      console.log(a);
      modal_ajax(a,'POST','<?php echo base_url('pengaturan/databeberapakeperluan')?>','html','#preview',0);
  }
</script>
