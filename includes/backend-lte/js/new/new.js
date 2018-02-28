function notify(jenis,pesan){
	$.notify({
	// options
	title: '',
	message: pesan
	},{
		// settings
		element: 'body',
	    type: jenis,
	    showProgressbar: false,
	    placement: {
	      from: "top",
	      align: "center"
	    },
	    animate: {
	      enter: 'animated fadeInDown',
	      exit: 'animated fadeOutUp'
	    }
	});
}

var t = setTimeout(function() {
    $("#message").fadeOut(1000);
  }, 2000);

 

function show_ajax(type,url,datas=false,dtype,place,a,b){
	$.ajax({
      type:type,
      url :url,
      data:datas,
      dataType:dtype,
      beforeSend:function(data){
      	$(place).html('<span class="waiting"><center><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></center></span>');
      },
      success:function(data){
        $(place).html(data);
      },
      error:function(data){
        console.log(data);
      }
    });
}

function is_check(nama,types,ur){
  $.validator.addMethod(nama, function(value, element){
    var response='';
    $.ajax({
      type: types,
      url: ur,
      data:"nama="+value,
      async:false,
      success:function(data){
        response = data;
      }
    });
    if(response == 1){
      return "Nama sudah ada";
    } else {
      return false;
    }
   }, "Nama sudah ada");

}

function modal_ajax(data,types,ur,dtype,place,is){
  $(".besar").addClass('modalbesar');
	judul = data['judul']+' '+data['name'];
  isi = '<div id="preview">'+
        '</div>';
  button = '<p class="pull-right">'+
      '<button class="btn bg-purple" data-dismiss="modal"> Batal</button> '+
      '<a href="#"><button type="submit" id="block" class="btn bg-olive"><i class="zmdi zmdi-refresh-sync"></i> Simpan</button></a>'+
      '</p>';
  $(".modal-title").html(judul);
  $("#isi").html(isi);
  if(is == 1){
    $("#tombol").html(button);
  } 
  $('.modal').modal();
  datas = data;
  show_ajax_function(types,ur,datas,dtype,place);
  
}

function submit_ajax_function(types,ur,datas,dtype,place){
  $.ajax({
    type:types,
    url :ur,
    data:datas,
    dataType:dtype,
    beforeSend:function(){
      $(place).html('<div id="previewmessage"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
    },
    success:function(data){
      $(".modal").modal('hide');
      notify(data['jenis'],data['message']);
      refreshs();
    },
    error:function(data){
      console.log(data);
    }
  });
}

function show_ajax_function(types,ur,datas,dtype,place){
  $.ajax({
    type:types,
    url :ur,
    data:datas,
    dataType:dtype,
    beforeSend:function(){
      $(place).html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');
    },
    success:function(data){
      $(place).html(data);
    },
    error:function(data){
      console.log(data);
    }
  });
}

function validater(namaform,rule,pesan,types,ur,dtype,place){
  $.validator.setDefaults({
    errorPlacement: function(error, element) {
      error.appendTo('#invalid-' + element.attr('id'));
    }
  });

  $validator = $(namaform).validate({
    rules: rule,
    messages: pesan,
    submitHandler: function(form){
      var datas = $(namaform).serialize();
      submit_ajax_function(types,ur,datas,dtype,place);
    }
  });
}



function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}