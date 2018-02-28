<?php
  class StringManipulation{
    public function dateToString($date){
      $arraydate=explode('-',$date);
      $month=$arraydate[1];
      switch($month){
        case '01':return $arraydate[2].' Januari '.$arraydate[0];break;
        case '02':return $arraydate[2].' Februari '.$arraydate[0];break;
        case '03':return $arraydate[2].' Maret '.$arraydate[0];break;
        case '04':return $arraydate[2].' April '.$arraydate[0];break;
        case '05':return $arraydate[2].' Mei '.$arraydate[0];break;
        case '06':return $arraydate[2].' Juni '.$arraydate[0];break;
        case '07':return $arraydate[2].' Juli '.$arraydate[0];break;
        case '08':return $arraydate[2].' Agustus '.$arraydate[0];break;
        case '09':return $arraydate[2].' September '.$arraydate[0];break;
        case '10':return $arraydate[2].' Oktober '.$arraydate[0];break;
        case '11':return $arraydate[2].' November '.$arraydate[0];break;
        case '12':return $arraydate[2].' Desember '.$arraydate[0];break;
      }
    }
  }
 ?>
