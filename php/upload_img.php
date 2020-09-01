<?php
  $uploadOk = 1;
  $path = $_GET['ph'];
  $path_array=explode("/",$path);//分割路俓
//  print_r($path_array); 
  $dir_lay0 = $path_array[0]; //stationImages
  $dir_lay1 = $path_array[1]; //系統圖
  $dir_lay2 = $path_array[2]; //場站名稱
//  $target_dir = ".././files/stationImages/".$path."/";
  $target_dir = ".././files/".$dir_lay0."/".$dir_lay1."/".$dir_lay2."/";
//  $fileCount = count($_FILES['file_']['name']);
//    print_r($_FILES['file_']);
    $fn_array=explode(".",$_FILES['file_']["name"]);//分割檔名
    $mainName = $fn_array[0];//檔名
    $subName = $fn_array[1];//副檔名	
    $target_file = $target_dir . basename($_FILES['file_']["name"]);
    $filetype_orangle = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check file size
//    if ($_FILES['file_']["size"] > 104857600) {
//        echo "Sorry, your file is too large.";
//        $uploadOk = 0;
//    }
    // Check file direct
    $temp_path = ".././files/".$dir_lay0."/".$dir_lay1;
    if(! is_dir($temp_path)){
      mkdir($temp_path);
      $temp_path = $temp_path."/".$dir_lay2;
      if (! is_dir($temp_path)){
        mkdir($temp_path);
        echo "create filder is successful!";
      }
    } else {
      $temp_path = $temp_path."/".$dir_lay2;
      if(! is_dir($temp_path)) {
        mkdir($temp_path);
        echo "create filder is successful!";
      } 
    }

    // Allow certain file formats
    $filetype =array("png","jpg","bmp","gif");
    if (in_array($filetype_orangle, $filetype)) {
        $uploadOk = 1;
    }
    else {
      echo "Sorry, only png, jpg, bmp, gif files are allowed.";
      $uploadOk = 0;
    }

    //檔名重覆處理
    $x=1;  
    while(file_exists($target_file)){
      $file_name = sprintf("%s_%d.%s",$mainName ,$x++ ,$subName);//組合檔名
      $target_file = $target_dir . basename($file_name);
    }

  // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if($uploadOk == 1){
          if (move_uploaded_file($_FILES['file_']["tmp_name"], $target_file)) {
              $target_file_array = explode("/",$target_file);
              echo end($target_file_array);
          }
          else 
              echo "Sorry, there was an error uploading your file.".$uploadOk;
        }
    }
    clearstatcache();
  

//  if(is_array($_FILES)) {
//    if(is_uploaded_file($_FILES['file_']['tmp_name'])) {
//      $sourcePath = $_FILES['file_']['tmp_name'];
//      $targetPath = $target_dir.$_FILES['file_']['name'];
//      move_uploaded_file($sourcePath,$targetPath);
//    }
//  }
?>
