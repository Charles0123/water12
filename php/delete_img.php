<?php 
  $path = $_POST['detFile']; 
//  echo $path;
  if(unlink(@$path))
    echo true;
  else
    echo false;      
?>