<?php 
  include_once("php/simple_html_dom.php");
  function geturl(){
    // Create DOM from URL
    $html = file_get_html('./rowmap.php');
    // Find all links
    $geturl = array();
    foreach($html->find('.wrap, 1') as $element) {
      foreach($element->find('li') as $element1) {
        $key = $element1->plaintext;
        $val = $element1->first_child()->href;
        if($val === "javascript:void(0);")
          continue;
        $array["pageName"] = $key;
        $array["url"] = $val;
        array_push($geturl, $array);
        $array = array();
      }
    }
   
    $json_string = json_encode($geturl);
    file_put_contents('php/sidemap.json', $json_string);
  }
  geturl();
?>