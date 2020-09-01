<?php
//修改文件
// if (isset ($_POST['create_file'])){ 
// $file_name = $_POST['file_name']; 
// $folder = 'files /' ; 
// $ext = '.txt' ; 
// $file_name = $folder .'' .$file_name .'' .$ext ; 
// $create_file = fopen ($file_name ,'w' ); 
// fclose ($create_file );
// 
//}

//編輯文件
//if (isset ($_POST['edit_file'])){ 
// $file_name = $_POST['file_name']; 
// $write_text = $_POST['edit_text']; 
// $folder = 'files /' ; 
// $ext = '.txt' ; 
// $file_name = $folder .'' .$file_name .'' .$ext ; 
// $edit_file = fopen ($file_name ,'w' );
// 
//	
// fwrite ($edit_file ,$write_text ); 
// fclose ($edit_file ); }

//移除文件
  if ($_POST['status'] == 'delete'){ 
      $file_name = $_POST['name']; 
      $folder = $_POST['path']; 
      $file_name = trim($folder).trim($file_name); 
    
      unlink ($file_name); 
      echo "PASS";
    } else 
      echo "FAIL";

?>



