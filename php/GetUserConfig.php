<?php
//    require_once 'iqWater_DB.php';
//    require_once 'functions.php';
    $t=time();
    $d = date("Y/m/d",$t);
    $R_ONLY = '';
    $RW = '';
    if(($_POST['r'] == "*") || ($_POST['r'] == ""))
      $R_ONLY = "A1,A2,A3,A4,B1,B2,B3,B4,B5,B6,B7,B8,B9,B10,B11,B12,B13,B14,C1,C2,D1,D2";
    else
      $R_ONLY = $_POST['r'];
    
    if(($_POST['rw'] == "*") || ($_POST['rw'] == ""))
      $RW = "A1,A2,A3,A4,B1,B2,B3,B4,B5,B6,B7,B8,B9,B10,B11,B12,B13,B14,C1,C2,D1,D2";
    else
      $RW = $_POST['rw'];
    //***test pattern
      //$R_ONLY = "A1,A2,A3,A4,B1,B2,B3,B4,B5,B6,B7,B8,B9,B10,B11,B12,B13,B14,C1,C2,D1,D2";
      // $RW = "A1,A2,A3,A4,B1,B2,B3,B4,B5,B6,B7,B8,B9,B10,B11,B12,B13";
    $_SESSION['ID'] = $_POST['i1'];
    $_SESSION['NAM'] = $_POST['n1'];
    $_SESSION['PW'] = $_POST['p1'];
    $_SESSION['R'] = $R_ONLY;
    $_SESSION['RW'] = $RW;

    $_SESSION['is_login'] = true;
    $_SESSION['DAT'] = $d;
    $_SESSION['TIM'] = date("h:i");
    echo $R_ONLY.'_'.$RW;
?>