<?php
//    require_once 'iqWater_DB.php';
//    require_once 'functions.php';
    $t=time();
    $d = date("Y/m/d",$t);
  $xdata = $_POST['xdata'];
  $user = $_POST['n2'];
  $psw = $_POST['p2'];
  
  foreach($xdata as $key => $value){
    $array[$key] = $value;
  };
//  print_r($array);
  @session_start();
  $_SESSION['ID'] = $array['ID'];
  $_SESSION['PW'] = $array['PASSWORD'];
  $_SESSION['NAM'] = $array['NAME'];
  $_SESSION['GROUP'] = $array['GROUP'];
  $_SESSION['CITY'] = $array['CITY'];
  $_SESSION['CITY_WRITE'] = $array['CITY_WRITE'];
  $_SESSION['REPORT'] = $array['REPORT'];
  $_SESSION['REPORT_WRITE'] = $array['REPORT_WRITE'];


  $_SESSION['DAT'] = $d;
  $_SESSION['TIM'] = date("h:i");
  if($_SESSION['PW'] == $psw) {
    $_SESSION['is_login'] = true;
    echo 'index.php';    
  }
  else {
    $_SESSION['is_login'] = false;
    echo "login.php";
  }
?>