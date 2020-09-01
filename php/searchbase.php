<?php 
  


// [210] => Array
//        (
//            [STATION_ID] => 中湖小區(管網)
//            [STATION_TYPE] => 監測站
//            [CITY] => 1204
//            [DISTRICT] => -2
//            [ADDRESS] => 
//            [LAT] => 24.97876
//            [LNG] => 121.34614
//        )

//"STATION_ID", 'STATION_TYPE', 'DISTRICT
  
function httpRequest($api, $data_string) {
  $ch = curl_init($api);
  curl_setopt($ch, CURLOPT_POST, 0);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//      'Content-Type: application/json',
//      'Content-Length: ' . strlen($data_string))
//  );
  $result = curl_exec($ch);
  curl_close($ch);
  return json_decode($result, true);
//  return $result;
}
function getSearchBaseData(){
  $get_url = "http://220.134.42.63:8080/WaterscadaAPI/GetStationInfo";
  $cityNames = [
      "板新給水廠" => '1201',
      "光復加壓站" => '1202',
      "樹林服務所" => '1203',
      "鶯歌服務所" => '1204',
      "土城服務所" => '1205',
      "泰山營運所" => '1206',
      "蘆洲服務所" => '1207',
      "新莊服務所" => '1208',
      "板橋服務所" => '1209'
  ];
  $post_datas = httpRequest($get_url, '');  
  foreach($post_datas as $key => $value) {
    $cityName = array_search($value["CITY"], $cityNames);
    $post_datas[$key]["CITY"] = $cityName;
  }
  return json_encode($post_datas);
//  return $post_datas;
//  var_dump( $post_datas);
  
}
  
?>

