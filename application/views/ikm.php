<style>
/* Hide all steps by default: */
.tab {
  display: none;
}
/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
<div class="content-wrapper">
  <div class="container">
    <section id="wizard" style="font-size:18px; margin-top:20px;" >
        <div class="row">
          <div class="col-lg-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <span style="font-size:20px">
                  <ul id="webTicker">
                    <li>Selamat Datang di Dinas Kearsipan dan Perpustakaan Prov. Jateng</li>
                    <li>Data Anda akan kami jaga kerahasiaannya.</li>
                  </ul>
                </span>
              </div>
              <div class="box-body">
                <div class="callout callout-success">
                  <h4>Ketentuan Pengisian</h4>
                  <ul>
                    <li>Mohon diisi dengan sejujur-jujurnya tanpa ada paksaan dari pihak manapun.</li>
                    <li>Mohon untuk menjawab semua pertanyaan yang ada.</li>
                    <li>Anda hanya perlu memilih jawaban A atau B</li>
                  </ul>
                </div>
                <div id="rootwizard">
                  <div class="navbar">
                    <div class="navbar-inner">
                      <div class="container row">
                        <!-- <ul class="nav nav-pil ls">
                          <li>Konfirmasi</li>

                        </ul> -->
                      </div>

                    </div>
                  </div>
                  <div class="progress ">
                   <div class="progress-bar progress-bar-green" id='progressbar' style="width:" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                     <!-- <span class="sr-only">40% Complete</span> -->
                   </div>
                 </div>
              <form id="form" method="post">
                <?php if($pertanyaan!=FALSE){
                  // die(/print_r($bykpertanyaan));
                  $bykpertanyaan=count($pertanyaan);
                  $i=1;
                  foreach ($pertanyaan as $key) {?>
                <div class="tab-pane" name="kues" id="kues<?= $i?>">
                  <h4>Jawablah pertanyaan di bawah dengan memilih lingkaran yang berada disamping kiri option A atau B! </h4>
                  <h4 class="fpns"> <?= $key->pertanyaan ?></h4>
                  <?php foreach($jawaban[$key->id_pertanyaan] as $j){?>
                    <div class="panel panel-default">
                      <div class="panel-body" style="padding:10px;">
                        <!-- <input type="hidden" name="idlistper" value="idlistper"> -->
                        <input type="radio" class="check inputan"  name="<?=$key ->id_pertanyaan ?>" value="<?=$j->id_jawaban?>" id="check" oninput="this.className = ''" onchange="validate(this)">
                        <?=$j->jawaban?>
                      </div>
                    </div>
                  <?php } ?>
                  <div>
                    <div>
                      <?php if($i!=1){ ?>
                      <button type="button" class="btn btn-lg" name="prev">Previous</button>
                      <?php } ?>
                      <?php if($i!=$bykpertanyaan){ ?>
                      <button type="button" class="btn btn-lg pull-right" name='next'>Next</button>
                      <?php } ?>
                      <?php if($i==$bykpertanyaan){ ?>
                      <button type="submit" class="btn bg-olive btn-lg pull-right" name="submit">Finish</button>
                    <?php } ?>
                    </div>
                  </div>
                </div>
              <?php $i++; }} ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  init();
})
  var i = 1;
  var banyakkues= $('[name="kues"]').length;
$('[name="next"]').click(function(){
  if(i!=banyakkues){
    i++;
    var progress = i/banyakkues*100;
    $('#kues'+i).show();
    $('#kues'+(i-1)).hide();
    $('#progressbar').attr('style','width:'+progress+'%');
  }
  $('[name="next"]').hide();
});

$('[name="prev"]').click(function(){
  if(i!=1){
    i--;
    var progress = i/banyakkues*100;
    $('#kues'+i).show();
    $('#kues'+(i+1)).hide();
    $('#progressbar').attr('style','width:'+progress+'%');
  }
  $('[name="next"]').show();
});

function init(){
  $('[name="next"]').hide();
  $('#kues').show();
  for(j=2;j<=banyakkues;j++){
    $('#kues'+j).hide();
  }
  var progress = 1/banyakkues*100;
  $('#progressbar').attr('style','width:'+progress+'%');
}

function validate(e){
  // console.log(e.name);
  var valid = false;
  var iterate=0;
  var name = $("[name="+e.name+"]");
  // console.log(name[0].checked)
  for(iterate=0; iterate<name.length; iterate++){
    if(name[iterate].checked==true){
      valid = true;
      iterate ++
    }
  }
  if(valid==true){
    $('[name="next"]').show();
  }else{
    $('[name="next"]').hide();
  }

}

</script>
