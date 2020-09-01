<?php 
//include 'phpqrcode/phpqrcode.php'; 
include "phpqrcode/qrlib.php"; 
$qrc_array = array();
$id = $_POST['key'];
$xdata_ = $_POST['xdata'];

function check_gd2() {
  if(extension_loaded('gd')){
   //echo '可以使用gd<br>';
//   foreach(gd_info() as $cate=>$value){
//       echo "$cate:$value<br>";
//   }
    return true;
 }
 else{
   echo '没有安装gd，請確認php.ini';
   return false;
 }
};

function genQR_CURL($str_){
//  include "phpqrcode/qrlib.php"; 
  $PNG_TEMP_DIR =dirname(__FILE__).DIRECTORY_SEPARATOR.'QRC'.DIRECTORY_SEPARATOR;
//  echo $PNG_TEMP_DIR;
  //html PNG location prefix
  $PNG_WEB_DIR = './php/QRC/';
  
  if (!file_exists($PNG_TEMP_DIR))
     mkdir($PNG_TEMP_DIR);
  if ($str_ !="") { 
    //it's very important!
    if (trim($str_) == '')
        die('data cannot be empty! <a href="?">back</a>');
    // user data
    $filename = $PNG_TEMP_DIR.'ORC_'.md5($str_.'|'."L".'|'."1").'.png';
    $filename = $PNG_TEMP_DIR.'ORC_'.explode(",",$str_)[0].'.png';
    QRcode::png($str_, $filename, "L", "4", 2);  
    } else {  
    //default data
      echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>'; 
      $str_ = "尚無資料";
      $filename = $PNG_TEMP_DIR.'ORC_'.md5($str_.'|'."L".'|'."1").'.png';   
      QRcode::png('PHP QR Code :)', $filename, "L", "4", 2);   
    } 
//  echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';
//    return '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';
    return $PNG_WEB_DIR.basename($filename);
    
};
$list = array();
$array_out = array();

function compareFormat($segment, $data){
  $x=0;
  foreach($data as $key => $value){
    if($key >= $segment['startSegment']-1){
      $array_key = array();
      $array_data = array();
      if(isset($value[$segment['財產名稱']] ))  $array_data["財產名稱"] = $value[$segment['財產名稱']];
      if(isset($value[$segment['分類編號']] ))  $array_data["分類編號"] = $value[$segment['分類編號']];
      if(isset($value[$segment['取得編號']] ))  $array_data["取得編號"] = $value[$segment['取得編號']];
      if(isset($value[$segment['單位']] ))     $array_data["單位"] = $value[$segment['單位']];
      if(isset($value[$segment['購置年月']] ))  $array_data["購置年月"] = $value[$segment['購置年月']];
      if(isset($value[$segment['耐用年限']] ))   $array_data["耐用年限"] = $value[$segment['耐用年限']];
      if(isset($value[$segment['備註(地點)']] ))   $array_data["備註(地點)"] = $value[$segment['備註(地點)']];
      if(isset($value[$segment['經緯度']] ))   $array_data["經緯度"] = $value[$segment['經緯度']];
      $array_data["QRC_str"] = $array_data["取得編號"].",".$array_data["經緯度"];
      $array_data["QRC"] = genQR_CURL($array_data["QRC_str"]);
      $array_out[$x] = $array_data;
      $x++; 
    }  
  }
//  print_r($array_out);
  return $array_out;
}
//定義XLS的row
$format = array("財產名稱"=>1,"分類編號"=>2,"取得編號"=> 3,"單位"=> 5,"購置年月"=> 6, "耐用年限"=> 7, "備註(地點)"=> 8, "經緯度"=> 9, "startSegment"=> 3);
if(check_gd2()){
  $finalFormat = compareFormat($format, $xdata_);
  print_r(json_encode($finalFormat));
} else 
  echo "沒有支援GD2擴充件，請通知網管員進行更新。謝謝!!";


?>

