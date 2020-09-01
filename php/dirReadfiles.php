<?php

function getfolderFiles($path) {
$dir ='./files/'.$path;//設定 "操做手冊" 路徑
//$dir = $dir.'/'.$_GET['navN'].'/'.$foldername;  
$no = 0;
$filetype =array("mp4","ppt","pptx","doc","docx","pdf","wav","wmv","xls","xlsx","dwg","png","jpg","bmp");
$dateArry = array();
$sizeArry = array();
if(!is_dir($dir)){
  //檢查是否是目錄
  mkdir($dir);
echo "makedir";
}
if($dh=opendir($dir)){    
  //打開目錄
  while(($file=readdir($dh))!==false){
    //$file = 檔名+副檔名
    //第一個跟第二個檔名是 .. 及 . 
    if($file!='..' && $file!='.'){ 
      //取副檔名
      @$extension = pathinfo(strtolower($file),PATHINFO_EXTENSION); 
      echo $extension;
      if(in_array($extension,$filetype))
          $extension = true;  //matching
      else
          $extension = false; //nun-matching
      
      if ($extension){
//        $file=iconv("BIG5", "UTF-8",$file); //必要,否則中文會亂碼  
        $filename = $file;
        if (file_exists($dir.'/'.$filename)) {          
//          備註時間格式 $dateArry[$filename] = date ("F d Y H:i:s", filemtime($dir."/".$filename)); or $dateArry[$filename] = date ("Y/m/d H:i:s", filemtime($dir."/".$filename));
          $dateArry[$filename] = date ("Y/m/d", filemtime($dir."/".$filename));
          $sizeArry[$filename] = round(filesize($dir."/".$filename)/1024/1000,2).'M';
          if($sizeArry[$filename] < 1)
            $sizeArry[$filename] = round(filesize($dir."/".$filename)/1024,2).'K';          
        }
      }
    }
  }

}
//print_r($dateArry);
//print_r($sizeArry);
return [$dateArry, $sizeArry];
    //print_r($imgArry);
clearstatcache();//清除檔案狀態快取
}
?>

