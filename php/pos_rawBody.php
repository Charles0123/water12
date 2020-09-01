<?php
  function curls($url, $data_string) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    //他會將curl_exec()獲取的訊息以文件流的形式返回傳給$temp，而不是直接輸出。如果要顯示出畫面的話就加上 echo $temp;就可以了。
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 必须宣告標頭
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//    curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-AjaxPro-Method:ShowList', 'User-Agent:Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36'));
    //設定CURLOPT_POST 為 1或true，表示要用POST方式傳遞
    curl_setopt($ch, CURLOPT_POST, 1);
    //CURLOPT_POSTFIELDS 後面則是要傳接的POST資料必須是字串。
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    //置cURL允許執行的最長秒數  
    curl_setopt($ch, CURLOPT_TIMEOUT,6);
    //將curl_exec()獲取的訊息以文件流的形式返回，而不是直接輸出。
    $data = curl_exec($ch);
    // 關閉CURL連線
    curl_close($ch);
    return $data;
  }

//  $get_url = "http://220.134.42.63:8080/WaterscadaAPI/PostUser_delete";               
  $get_url = $_POST['url_'];
  $post_str = $_POST['xdata'];
  
  $post_datas = curls($get_url, $post_str);
  echo $post_str . "\n\n" . $post_datas;

?>