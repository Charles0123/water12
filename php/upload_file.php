<?php
  $uploadOk = 1;
  $folder = $_GET['folder'];
  $target_dir = ".././files/".$folder."/";
//  $fileCount = count($_FILES['userImage']['name']);

    $fn_array=explode(".",$_FILES['userImage']["name"]);//分割檔名
    $mainName = $fn_array[0];//檔名
    $subName = $fn_array[1];//副檔名	
    $target_file = $target_dir . basename($_FILES['userImage']["name"]);
    $filetype_orangle = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check file size
//    if ($_FILES['userImage']["size"] > 104857600) {
//        echo "Sorry, your file is too large.";
//        $uploadOk = 0;
//    }

    // Allow certain file formats
    $filetype =array("mp4","ppt","pptx","doc","docx","pdf","wav","wmv","xls","xlsx","dwg","png","jpg","bmp");
    if (in_array($filetype_orangle, $filetype)) {
        $uploadOk = 1;
    }
    else {
      echo "Sorry, only mp4, ppt, pptx, doc, docx, pdf, wav, wmv, xls, xlsx, dwg, png, jpg, bmp files are allowed.";
      $uploadOk = 0;
    }

    //檔名重覆處理
    $x=1;
    while(file_exists($target_file)){
      $file_name = sprintf("%s_%d.%s",$mainName ,$x++ ,$subName);//組合檔名
      $upload_file = $target_dir . basename($file_name);
    }

  // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if($uploadOk == 1){
          if (move_uploaded_file($_FILES['userImage']["tmp_name"], $target_file))
              echo basename($_FILES['userImage']["name"]);
          else 
              echo "Sorry, there was an error uploading your file.".$uploadOk;
        }
    }
 
  


//  if(is_array($_FILES)) {
//    if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
//      $sourcePath = $_FILES['userImage']['tmp_name'];
//      $targetPath = $target_dir.$_FILES['userImage']['name'];
//      move_uploaded_file($sourcePath,$targetPath);
//    }
//  }
?>
