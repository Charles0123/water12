<?php
    @session_start(); 
//登入確認
    function verify_user($name,$password){
        $result = null;

        $md5pw = md5($password);
//        echo $md5pw;
        $sql = "SELECT * FROM `user` WHERE `userName` = '{$name}' AND `pw` = '{$md5pw}'";
        
        if($name == "jfd")
          $sql = "SELECT * FROM `user` WHERE `userName` = '{$name}' AND `pw` = '{$md5pw}'";
        $query = mysqli_query($_SESSION['link'],$sql);

        if($query)
        {
            if(mysqli_num_rows($query)>=1)
            {
                //抓一筆資料放入陣列	
                $user = mysqli_fetch_assoc($query);
                $_SESSION['is_login'] = true;
                $_SESSION['logIn-power'] = $user['power'];
                $_SESSION['logIn-user'] = $user['userName'];
                if(($user['userName'] == 'jfd')&&($user['pw'])==$md5pw)
                {
                  $_SESSION['supper'] = $user['userName'];
                  //echo $_SESSION['supper'];
                }
                else
                {
                  $_SESSION['supper'] = " ";
                  //echo $_SESSION['supper'];
                }
                $result = "true";
            }
            else
              $result = "false";
        }
        else
        {
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        }

        return $result;
    }  //using

//設定語言
    function get_langNow_datas($tab, $val){
      $result = null;
      $sql = "SELECT * FROM `lang` WHERE `$tab`='{$val}' ORDER BY ID ASC";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = 'false';  
      }
      return $result;
    } //using
    function update_langNow_datas($lang, $tab, $val){
      $result = null;          
      $sql = "UPDATE `lang` SET `now`='{$lang}' WHERE `$tab`= '{$val}'";
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using
    function changLang($newLangCode){ 
      $get_=get_langNow_datas("now", "1");
      foreach($get_ as $key => $value){
          update_langNow_datas("0", "ID", $value['ID']);
      }
      $conf_lang = update_langNow_datas("1", "lang", $newLangCode);
    } //using

//抓取選單項目
    function get_lv_datas($lvtable, $lang){
      $result = null;
      $sql = "SELECT * FROM `$lvtable` WHERE `lang`='{$lang}' ORDER BY Rank ASC";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using
    function get_lv2_datas($sortitem, $lang) {
      $result = null;
      $sql = "SELECT * FROM `lv2` WHERE `Lv1ID`= '{$sortitem}' AND `lang`='{$lang}' ORDER BY Rank ASC";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using
    function get_lv3_datas($sortitem, $lang) {
      $result = null;
      $sql = "SELECT * FROM `lv3` WHERE `Lv2ID`= '{$sortitem}' AND `lang`='{$lang}' ORDER BY Rank ASC";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using 

    function insertToDB_nav($arr, $lang){
      $result = null;    
      switch ($arr[0]) {
        case 'lv1':
          $sql = "INSERT INTO `{$arr[0]}` (`nID`,`Rank`,`navName`,`dbNam`,`publish`,`lang`) VALUE ('{$arr[2]}','{$arr[1]}','{$arr[4]}','{$arr[5]}','{$arr[3]}','{$lang}')";        
          break;
        case 'lv2':
          $sql = "INSERT INTO `{$arr[0]}` (`Lv1ID`,`Rank`,`navName`,`publish`,`lang`) VALUE ('{$arr[1]}','{$arr[2]}','{$arr[4]}','{$arr[3]}','{$lang}')";        
          break;
        case 'lv3':
          $sql = "INSERT INTO `{$arr[0]}` (`Lv1ID`,`Lv2ID`,`Rank`,`navName`,`publish`,`lang`) VALUE ('{$arr[1]}','{$arr[2]}','{$arr[3]}','{$arr[5]}','{$arr[4]}','{$lang}')";        
          break;
        }
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using
    function updateToDB_nav($arr, $id, $lang){
      $result = null;    
      switch ($arr[0]) {
        case 'lv1':
          $sql = "UPDATE `{$arr[0]}` SET `nID`='{$arr[2]}',`Rank`='{$arr[1]}',`navName`='{$arr[4]}',`dbNam`='{$arr[5]}',`publish`= '{$arr[3]}',`lang`= '{$lang}' WHERE `ID`= '{$id}'";
          break;
        case 'lv2':
          $sql = "UPDATE `{$arr[0]}` SET `Lv1ID`='{$arr[1]}',`Rank`='{$arr[2]}',`navName`='{$arr[4]}',`publish`= '{$arr[3]}',`lang`= '{$lang}' WHERE `ID`= '{$id}'";
          break;
        case 'lv3':
          $sql = "UPDATE `{$arr[0]}` SET `Lv1ID`='{$arr[1]}',`Lv2ID`='{$arr[2]}',`Rank`='{$arr[3]}',`navName`='{$arr[5]}',`publish`= '{$arr[4]}',`lang`= '{$lang}' WHERE `ID`= '{$id}'";
          break;
        }
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using
    function deleteToDB_nav($lv, $id, $lang){
      $result = null;
      $sql = "DELETE FROM `{$lv}` WHERE `ID`='{$id}' AND `lang`='{$lang}'";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
        if(mysqli_affected_rows($_SESSION['link']) >= 0)
          $result = "true";
        else {
          $result = "false";
        }
      } else
        echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    } //as soon as del_lv1_datas. Is using
            
    function get_projUpld_datas($lv1id, $lang) {
      $result = null;
      $sql = "SELECT * FROM `projUpld` WHERE `Lv1ID`='{$lv1id}' AND `lang`='{$lang}' ORDER BY Lv2ID ASC, Rank ASC"; 
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using
    function get_projupld_a_data($id) {
      $result = null;
      $sql = "SELECT * FROM `projupld` WHERE `ID`= '{$id}' ORDER BY Rank ASC";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          if($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using
    function insertToDB_projupld($arr, $lang){
      $result = null;    
      $sql = "INSERT INTO `{$arr[0]}` (`Lv1ID`,`Lv2ID`,`Lv3ID`,`Rank`,`title`,`subtitle`,`descript`,`content`,`projName`,`projspec`,`isAssign`,`isMassProd`,`bimg`,`simg`,`projImg1`,`projImg2`,`projImg3`,`movPath`,`dwlodPath`,`publish`,`lang`) VALUE ('{$arr[1]}','{$arr[2]}','{$arr[3]}','{$arr[7]}','{$arr[10]}','{$arr[11]}','{$arr[12]}','{$arr[20]}','{$arr[8]}','{$arr[9]}','{$arr[5]}','{$arr[4]}','{$arr[13]}','{$arr[14]}','{$arr[15]}','{$arr[16]}','{$arr[17]}','{$arr[18]}','{$arr[19]}','{$arr[6]}','{$lang}')";        
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using
    function updateToDB_projupld($arr, $id, $lang){
      $result = null;    
      $sql = "UPDATE `{$arr[0]}` SET `Lv1ID`= '{$arr[1]}',`Lv2ID`='{$arr[2]}',`Lv3ID`='{$arr[3]}',`Rank`='{$arr[7]}',`title`='{$arr[10]}',`subtitle`='{$arr[11]}',`descript`='{$arr[12]}',`content`= '{$arr[20]}',`projName`='{$arr[8]}',`projspec`='{$arr[9]}',`isAssign`='{$arr[5]}',`isMassProd`='{$arr[4]}',`bimg`= '{$arr[14]}',`simg`= '{$arr[13]}',`projImg1`='{$arr[15]}',`projImg2`= '{$arr[16]}',`projImg3`='{$arr[17]}',`movPath`='{$arr[18]}',`dwlodPath`='{$arr[19]}',`publish`= '{$arr[6]}',`lang`= '{$lang}' WHERE `ID`= '{$id}'";
      
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using

    function get_introl_a_data($id) {
      $result = null;
      $sql = "SELECT * FROM `introl` WHERE `ID`= '{$id}' ORDER BY Rank ASC";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          if($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using  
    function insertToDB_introl($arr, $lang){
      $result = null;    
      $sql = "INSERT INTO `{$arr[0]}` (`Lv1ID`,`Lv2ID`,`Lv3ID`,`Rank`,`title`,`subtitle`,`descript`,`content`,`publish`,`lang`) VALUE ('{$arr[1]}','{$arr[2]}','{$arr[3]}','{$arr[5]}','{$arr[6]}','{$arr[7]}','{$arr[8]}','{$arr[9]}','{$arr[4]}','{$lang}')";        
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using  
    function get_introl_datas($lv1id, $lang) {
      $result = null;
      $sql = "SELECT * FROM `introl` WHERE `Lv1ID`='{$lv1id}' AND `lang`='{$lang}' ORDER BY Lv2ID ASC, Rank ASC"; 
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using
    function updateToDB_introl($arr, $id, $lang){
      $result = null;    
      $sql = "UPDATE `{$arr[0]}` SET `Lv1ID`= '{$arr[1]}',`Lv2ID`='{$arr[2]}',`Lv3ID`='{$arr[3]}',`Rank`='{$arr[5]}',`title`='{$arr[6]}',`subtitle`='{$arr[7]}',`descript`='{$arr[8]}',`content`= '{$arr[9]}',`publish`= '{$arr[4]}',`lang`= '{$lang}' WHERE `ID`= '{$id}'";
      
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using

    function get_history_a_data($id) {
      $result = null;
      $sql = "SELECT * FROM `history` WHERE `ID`= '{$id}' ORDER BY Rank ASC";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          if($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using
    function insertToDB_history($arr, $lang){
      $result = null;    
      $sql = "INSERT INTO `{$arr[0]}` (`code`,`Rank`,`title`,`subtitle`,`descript`,`content`,`bkNam`,`publish`,`lang`) VALUE ('{$arr[1]}','{$arr[3]}','{$arr[4]}','{$arr[5]}','{$arr[6]}','{$arr[7]}','{$arr[8]}','{$arr[2]}','{$lang}')";        
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using
    function get_history_datas($code, $lang) {
      $result = null;
      $sql = "SELECT * FROM `history` WHERE `code`= '{$code}' AND `lang`='{$lang}' ORDER BY Rank ASC";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using
    function updateToDB_history($arr, $id, $lang){
      $result = null;    
      $sql = "UPDATE `{$arr[0]}` SET `code`= '{$arr[1]}',`Rank`='{$arr[3]}',`title`='{$arr[4]}',`subtitle`='{$arr[5]}',`descript`='{$arr[6]}',`content`= '{$arr[7]}',`bkNam`= '{$arr[8]}',`publish`= '{$arr[2]}',`lang`= '{$lang}' WHERE `ID`= '{$id}'";
      
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using

    function get_newsc_a_data($id) {
      $result = null;
      $sql = "SELECT * FROM `newsc` WHERE `ID`= '{$id}' ORDER BY Rank ASC";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          if($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using
    function insertToDB_newsc($arr, $lang){
      $result = null;    
      $sql = "INSERT INTO `{$arr[0]}` (`Rank`,`title`,`subtitle`,`descript`,`content`,`createT`,`modifyT`,`link`,`publish`,`lang`) VALUE ('{$arr[4]}','{$arr[5]}','{$arr[6]}','{$arr[7]}','{$arr[9]}','{$arr[1]}','{$arr[2]}','{$arr[8]}','{$arr[3]}','{$lang}')";        
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using
    function get_newsc_datas($lang){
      $result = null;
      $sql = "SELECT * FROM `newsc` WHERE `lang`='{$lang}' ORDER BY ModifyT DESC"; 
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using
    function updateToDB_newsc($arr, $id, $lang){
      $result = null;    
      $sql = "UPDATE `{$arr[0]}` SET `Rank`='{$arr[4]}',`title`='{$arr[5]}',`subtitle`='{$arr[6]}',`descript`='{$arr[7]}',`content`= '{$arr[9]}',`createT`= '{$arr[1]}',`modifyT`= '{$arr[2]}',`link`= '{$arr[8]}',`publish`= '{$arr[3]}',`lang`= '{$lang}' WHERE `ID`= '{$id}'";
      
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using

    function get_allImg_datas($lang) {
      $result = null;
      $sql = "SELECT * FROM `allimg` WHERE `lang`='{$lang}' ORDER BY Rank ASC";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using
    function get_allImg_a_data($id) {
      $result = null;
      $sql = "SELECT * FROM `allimg` WHERE `ID`= '{$id}' ORDER BY Rank ASC";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          if($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using
    function insertToDB_allImg($arr, $lang){
      $result = null;    
      $sql = "INSERT INTO `{$arr[0]}` (`Rank`,`title`,`subtitle`,`descript`,`content`,`bkNam`,`banner`,`bgColor`,`link`,`publish`,`lang`) VALUE ('{$arr[2]}','{$arr[3]}','{$arr[4]}','{$arr[5]}','{$arr[10]}','{$arr[6]}','{$arr[7]}','{$arr[8]}','{$arr[9]}','{$arr[1]}','{$lang}')";        
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using
    function updateToDB_allImg($arr, $id, $lang){
      $result = null;    
      $sql = "UPDATE `{$arr[0]}` SET `Rank`='{$arr[2]}',`title`='{$arr[3]}',`subtitle`='{$arr[4]}',`descript`='{$arr[5]}',`content`= '{$arr[10]}',`bkNam`= '{$arr[6]}',`banner`= '{$arr[7]}',`bgColor`= '{$arr[8]}',`link`= '{$arr[9]}',`publish`= '{$arr[1]}',`lang`= '{$lang}' WHERE `ID`= '{$id}'";
      
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using
    function updateToDB_allImgArticle($arr, $id, $lang){
      $result = null;    
      $sql = "UPDATE `allimg` SET `Rank`='{$arr[2]}',`title`='{$arr[3]}',`subtitle`='{$arr[4]}',`descript`='{$arr[5]}',`content`= '{$arr[7]}',`link`= '{$arr[6]}',`publish`= '{$arr[1]}',`lang`= '{$lang}' WHERE `ID`= '{$arr[0]}'";
      
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using

    function get_bntImg_datas($lang) {
      $result = null;
      $sql = "SELECT * FROM `bntimg` WHERE `lang`='{$lang}' ORDER BY Lv1ID ASC";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using
    function get_bntImg_a_data($id) {
      $result = null;
      $sql = "SELECT * FROM `bntimg` WHERE `ID`= '{$id}' ORDER BY Lv1ID ASC";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          if($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using
    function insertToDB_bntImg($arr, $lang){
      $result = null;    
      $sql = "INSERT INTO `{$arr[0]}` 
      (`Lv1ID`,`Lv2ID`,`Lv3ID`,`title`,`subtitle`,`descript`,`content`,`bkNam`,`bgColor`,`publish`,`lang`) VALUE ('{$arr[1]}','{$arr[2]}','{$arr[3]}','{$arr[5]}','{$arr[6]}','{$arr[7]}','{$arr[10]}','{$arr[8]}','{$arr[9]}','{$arr[4]}','{$lang}')";        
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using
    function updateToDB_bntImg($arr, $id, $lang){
      $result = null;    
      $sql = "UPDATE `{$arr[0]}` SET `Lv1ID`='{$arr[1]}',`Lv2ID`='{$arr[2]}',`Lv3ID`='{$arr[3]}',`title`='{$arr[5]}',`subtitle`='{$arr[6]}',`descript`='{$arr[7]}',`content`= '{$arr[10]}',`bkNam`= '{$arr[8]}',`bgColor`= '{$arr[9]}',`publish`= '{$arr[4]}',`lang`= '{$lang}' WHERE `ID`= '{$id}'";
      
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using
    function updateToDB_bntImgArticle($arr, $id, $lang){
      $result = null;    
      $sql = "UPDATE `bntimg` SET `title`='{$arr[2]}',`subtitle`='{$arr[3]}',`descript`='{$arr[4]}',`content`= '{$arr[5]}',`publish`= '{$arr[1]}',`lang`= '{$lang}' WHERE `ID`= '{$arr[0]}'";
      
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using

    function get_seo_Data($id, $lang) {
      $result = null;
      $sql = "SELECT * FROM `seo` WHERE `ID`= '{$id}' AND `lang`='{$lang}'";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)        
          if($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    }  //using  
    function upldToDB_seo($tabNam, $arr, $lang , $id){
      $result = null;    
      $sql = "UPDATE `{$tabNam}` SET `title`='{$arr[0]}',`tit_tag`='{$arr[1]}',`meta_kwd`='{$arr[2]}',`meta_desc`='{$arr[5]}',`GA`='{$arr[3]}',`GTM`='{$arr[4]}',`lang`= '{$lang}' WHERE `ID`= '{$id}'";
      
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using

    function get_base_Data($id, $lang) {
      $result = null;
      $sql = "SELECT * FROM `base` WHERE `ID`= '{$id}' AND `lang`='{$lang}'";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)        
          if($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    }  //using
    function upldToDB_base($tabNam, $arr, $lang , $id){
      $result = null;    
      $sql = "UPDATE `{$tabNam}` SET `sht_img`='{$arr[0]}',`logo`='{$arr[1]}',`webSite`='{$arr[2]}',`webAddr`='{$arr[3]}',`address1`='{$arr[4]}',`address2`='{$arr[5]}',`email`='{$arr[6]}',`tell1`='{$arr[7]}',`tell2`='{$arr[8]}',`fex`='{$arr[9]}',`openT`='{$arr[10]}',`map`='{$arr[11]}',`Gogpls`='{$arr[12]}',`fbLink`='{$arr[13]}',`lineID`='{$arr[14]}',`lang`= '{$lang}' WHERE `ID`= '{$id}'";
      
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using

    function insertToDB_pwSet($arr){
      $result = null;    
      $sql = "INSERT INTO `user` (`admin`,`userName`,`pw`,`bk`,`mail`,`power`,`publish`) VALUE ('{$arr[2]}','{$arr[3]}','{$arr[4]}','{$arr[5]}','{$arr[6]}','{$arr[7]}','{$arr[1]}')";        
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using
    function serach_userNam_data($target, $user){
      $result = null;
      $sql = "SELECT * FROM `user` WHERE `{$target}` = '{$user}'";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          if($row = mysqli_fetch_assoc($query)) {
            $result[]=$row;
          } else {
        $result = '';  
      }
      return $result;
    } //using
    function get_pwSet_datas() {
      $result = null;
      $sql = "SELECT * FROM `user` WHERE NOT `ID`= '1'";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using
    function updateToDB_pwSet($arr, $id){
      $result = null;    
      if($arr[4] == $arr[5]) {
        $arr[4] = md5($arr[5]);      
        $sql = "UPDATE `user` SET `admin`='{$arr[2]}',`userName`='{$arr[3]}',`pw`='{$arr[4]}',`bk`='{$arr[5]}',`mail`= '{$arr[6]}',`power`= '{$arr[7]}',`publish`= '{$arr[1]}' WHERE `ID`= '{$id}'";
      }      
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }

      return $result;
    } //using
    function deleteToDB_pwSet($lv, $id){
      $result = null;
      $sql = "DELETE FROM `{$lv}` WHERE `ID`='{$id}'";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
        if(mysqli_affected_rows($_SESSION['link']) >= 0)
          $result = "true";
        else {
          $result = "false";
        }
      } else
        echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    } //as soon as del_lv1_datas. Is using

    function upldToDB_enab_items($tab, $id, $arr, $lang){
      $result = null;   
      $sql = null;
      for($x=0; $x<count($id); $x++){
        $sql = "UPDATE `{$tab}` SET `publish`= '{$arr[$x]}' WHERE `ID`= '{$id[$x]}' AND `lang`='{$lang}' ";
        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
          if(mysqli_affected_rows($_SESSION['link']) >= 0){$result = "true";} else {$result = "false";}
        else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);    
      }
      return $result;
    } //using
    function get_lv_a_data($lvtable, $sortitem, $lang) {
      $result = null;
      $sql = "SELECT * FROM `$lvtable` WHERE `ID`= '{$sortitem}' AND `lang`= '{$lang}'";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)        
          if($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    }  //using   
    
    function get_management_datas($lv1id, $lang) {
      $result = null;
      $sql = "SELECT * FROM `projUpld` WHERE `Lv1ID`='{$lv1id}' AND `lang`='{$lang}' ORDER BY Lv2ID ASC, Lv3ID ASC, Rank ASC"; 
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using
    function upldToDB_enab_management($tab, $id, $rank, $isAssign, $isMassProd, $en, $lang){
      $result = null;
      $sql = null;
      for($x=0; $x<count($id); $x++){
        $sql = "UPDATE `{$tab}` SET `Rank`='{$rank[$x]}',`isAssign`='{$isAssign[$x]}',`isMassProd`='{$isMassProd[$x]}',`publish`= '{$en[$x]}',`lang`= '{$lang}' WHERE `ID`= '{$id[$x]}'";

        $query = mysqli_query($_SESSION['link'],$sql);

        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0)
                $result = "true";
            else
                $result = "false";
        }
        else
        {
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        }
      }
      return $result;
    } //using

    function get_lv3_def_datas($sort1name, $sort1data, $sort2name, $sort2data, $lang) {
      $result = null;
      $sql = "SELECT * FROM `lv3` WHERE `$sort1name`= '{$sort1data}' AND `$sort2name`= '{$sort2data}' AND `lang`= '{$lang}' ORDER BY Rank ASC";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;      
    }  //using   

    function get_default_a_data($id) {
      $result = null;
      $sql = "SELECT * FROM `default` WHERE `ID`= '{$id}' ORDER BY Rank ASC";      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          if($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using  
    function insertToDB_default($arr, $lang){
      $result = null;    
      $sql = "INSERT INTO `{$arr[0]}` (`Lv1ID`,`Lv2ID`,`Lv3ID`,`Rank`,`title`,`subtitle`,`descript`,`content`,`publish`,`lang`) VALUE ('{$arr[1]}','{$arr[2]}','{$arr[3]}','{$arr[5]}','{$arr[6]}','{$arr[7]}','{$arr[8]}','{$arr[9]}','{$arr[4]}','{$lang}')";        
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using  
    function get_default_datas($lv1id, $lang) {
      $result = null;
      $sql = "SELECT * FROM `default` WHERE `Lv1ID`='{$lv1id}' AND `lang`='{$lang}' ORDER BY Lv2ID ASC, Rank ASC"; 
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using
    function updateToDB_default($arr, $id, $lang){
      $result = null;    
      $sql = "UPDATE `{$arr[0]}` SET `Lv1ID`= '{$arr[1]}',`Lv2ID`='{$arr[2]}',`Lv3ID`='{$arr[3]}',`Rank`='{$arr[5]}',`title`='{$arr[6]}',`subtitle`='{$arr[7]}',`descript`='{$arr[8]}',`content`= '{$arr[9]}',`publish`= '{$arr[4]}',`lang`= '{$lang}' WHERE `ID`= '{$id}'";
      
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    } //using
   
    function deleteToDB_other($lv, $id, $id_, $lang){
      $result = null;
      $sql = "DELETE FROM `{$lv}` WHERE `{$id}`='{$id_}' AND `lang`='{$lang}'";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
        if(mysqli_affected_rows($_SESSION['link']) >= 0)
          $result = "true";
        else {
          $result = "false";
        }
      } else
        echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    } //as soon as del_lv1_datas. Is using

    function trace_datasByNav($tabNam, $lv1id, $lv2id, $lv3id, $lang) {
      $result = null;
      $sql = "SELECT * FROM `{$tabNam}` WHERE `Lv1ID`='{$lv1id}' AND `Lv2ID`='{$lv2id}' AND `Lv3ID`='{$lv3id}' AND `publish`='1' AND`lang`='{$lang}' ORDER BY Lv2ID ASC, Rank ASC"; 
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
      else {
        $result = '';  
      }
      return $result;
    } //using

//    function get_lv1_def_datas($sortname, $sortdata) {
//      $result = null;
//      $sql = "SELECT * FROM `lv1` WHERE `$sortname`= '{$sortdata}' ORDER BY Rank ASC";      
//      $query = mysqli_query($_SESSION['link'],$sql);
//      if($query)
//        if(mysqli_num_rows($query)>0)
//          while($row = mysqli_fetch_assoc($query)) 
//            $result[]=$row;
//      else {
//        $result = '';  
//      }
//      return $result;      
//    }  //get_lev1_Data.php
//    function get_lv2_def_datas($sort1name, $sort1data, $sort2name, $sort2data) {
//      $result = null;
//      $sql = "SELECT * FROM `lv2` WHERE `$sort1name`= '{$sort1data}' AND `$sort2name`= '{$sort2data}' ORDER BY Rank ASC";      
//      $query = mysqli_query($_SESSION['link'],$sql);
//      if($query)
//        if(mysqli_num_rows($query)>0)
//          while($row = mysqli_fetch_assoc($query)) 
//            $result[]=$row;
//      else {
//        $result = '';  
//      }
//      return $result;      
//    } //no using
   
//    function del_lv2_datas($id1, $lang) {
//      $result = null;
//      $sql = "DELETE FROM `lv2` WHERE `Lv1ID`='{$id1}' AND `lang`='{$lang}'";
//      $query = mysqli_query($_SESSION['link'],$sql);
//      if($query)
//      {
//        if(mysqli_affected_rows($_SESSION['link']) >= 0)
//          $result = "true";
//        else {
//          $result = "false";
//        }
//      } else
//          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
//      return $result;
//    } //using
//    function del_lv3_datas($id1, $id2, $lang) {
//      $result = null;
//      $sql = "DELETE FROM `lv3` WHERE `Lv1ID`='{$id1}' AND `Lv2ID`='{$id2}' AND `lang`='{$lang}'";
//      $query = mysqli_query($_SESSION['link'],$sql);
//      if($query)
//      {
//        if(mysqli_affected_rows($_SESSION['link']) >= 0)
//          $result = "true";
//        else {
//          $result = "false";
//        }
//      } else
//          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
//      return $result;
//    } //using
//
//
//
//
//
////儲存introl的資料
//    function sav_introl($datas,$ckeditor){
//      $result = null;
//      $sql = "SELECT * FROM `$levName` ORDER BY `Rank` ASC";
//      $query = mysqli_query($_SESSION['link'],$sql);
//      if($query)
//        if(mysqli_num_rows($query)>0)
//          while($row = mysqli_fetch_assoc($query)) 
//            $result[]=$row;
//      else {
//        echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']); 
//        $result = 'false';          
//      }
//      return $result;
//    }

    
//新增使用者
    function add_user($clientcode, $name,$pw,$mail,$phone) {
      $result = null;
      $md5pw = md5($pw);
      $create_date = date("Y-m-d").'T'.date("H:i:s");
      
      $check = confirm_same_user($name);
      if(!($check))
      {
        $sql = "INSERT INTO `user`(`ClientCode`,`username`,`password`,`bkpw`,`mail`,`phone`,`create_date`,`publish`) 
        VALUE ('{$clientcode}','{$name}','{$md5pw}','{$pw}','{$mail}','{$phone}','{$create_date}','0')";        
        $query = mysqli_query($_SESSION['link'],$sql);

        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0)
                $result = "true";
            else
                $result = "false";
        }
        else
        {
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        }
      }
      else
      {
          $result = "same";
      }
      return $result;
    }   //using

//新增會員
//    function add_club($clec,$cn,$idc,$pc,$addr,$tel,$nam,$em,$dns)
//    {
//      $result = null;
//      $create_date = date("Y-m-d").'T'.date("H:i:s");
//      
//      $check = confirm_same_club($dns);
//      if(!($check))
//      {
//        $sql = "INSERT INTO `club`(`ClientCode`,`CompanyName`,`IdCode`,`PlaceCode`,`Address`,`Contact`,`TEL`,`Email`,`DNS`,`CreateDate`,`publish`) 
//        VALUE ('{$clec}','{$cn}','{$idc}','{$pc}','{$addr}','{$nam}','{$tel}','{$em}','{$dns}','{$create_date}','0')";
//        $query = mysqli_query($_SESSION['link'],$sql);
//
//        if($query)
//        {
//            if(mysqli_affected_rows($_SESSION['link']) >= 0)
//                $result = "true";
//            else
//                $result = "false";
//        }
//        else
//        {
//            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
//        }
//      }
//      else
//      {
//          $result = "same";
//      }
//      return $result;
//    }

    

//確認"DNS"是否重覆且存在
//    function  confirm_same_club($dns)
//    {
//      $result = null;
//
//      $sql = "SELECT * FROM `club` WHERE `DNS` = '{$dns}'";
//      $query = mysqli_query($_SESSION['link'],$sql);
//
//      if($query)
//      {
//          if(mysqli_num_rows($query)>=1)
//              $result = "true";
//      }
//      else
//      {
//          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
//      }
//      return $result;
//    }

//檢查使用者名稱是否存在
//    function  confirm_same_user($name)
//    {
//      $result = null;
//
//      $sql = "SELECT * FROM `user` WHERE `username` = '{$name}'";
//      //echo $sql;
//      $query = mysqli_query($_SESSION['link'],$sql);
//
//      if($query)
//      {
//          if(mysqli_num_rows($query)>=1)
//              $result = "true";
//      }
//      else
//      {
//          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
//      }
//      return $result;
//    }
    



//3/13 目前下面程式尚未確認
//尋找會員資料
    function find_club($idcode)
    {
        $sort = null; $result = false;
        $sort = "SELECT * FROM `club` WHERE `IdCode` = '{$idcode}'";
        $query = mysqli_query($_SESSION['link'],$sort);
        if($query)
        {
          if(mysqli_num_rows($query)>0)
          {
            while($row = mysqli_fetch_assoc($query)) 
            {
              $result[]=$row;
            }
          }
        }
        else
        {
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);   
            
        }
        return $result;
    }
//篩選
    function works_sort_top($limit)
    {
        $sort = null;
        $sort = "SELECT * FROM `work` WHERE `publish` = 1 ORDER BY `create_date` DESC LIMIT $limit";
        $query = mysqli_query($_SESSION['link'],$sort);
        if($query)
        {
          if(mysqli_num_rows($query)>0)
          {
            while($row = mysqli_fetch_assoc($query)) 
            {
              $result[]=$row;
            }
          }
        }
        else
        {
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);       
        }
        return $result;
    }

//刪除會員
    function del_club($idc,$dns)
    {
        $result = null;
        //刪除條件: 統一編號 & 網域名稱
        $sql = "DELETE FROM `club` WHERE `IdCode`='{$idc}' AND `DNS`='{$dns}'";

        $query = mysqli_query($_SESSION['link'],$sql);

        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0)
                $result = "true";
            else
                $result = "false";
        }
        else
        {
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        }
        return $result;
    }

//刪除管理員
    function del_user($name,$pw)
    {
        $result = null;
        $md5pw = md5($pw);
        $sql = "DELETE FROM `user` WHERE `username`='{$name}' AND `password`='{$md5pw}'";

        $query = mysqli_query($_SESSION['link'],$sql);

        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0)
                $result = "true";
            else
                $result = "false";
        }
        else
        {
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        }
        return $result;
    }

//找回密碼bkpw
    function retrun_user_pw($name,$mail)
    {
        $result = null;

        $sql = "SELECT * FROM `user` WHERE `username` = '{$name}' AND `mail` = '{$mail}'";
        //echo $sql;
        $query = mysqli_query($_SESSION['link'],$sql);

        if($query)
        {
            if(mysqli_num_rows($query)>=1)
            {
                //抓取陣列內的資料直到陣列內無資料
                while($row = mysqli_fetch_assoc($query))
                  $datas[]=$row;                
                $result = "true";                
            }
            else
                $result = "false";
        }
        else
        {
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        }
        return array($result,$datas);
    }

//後台banner image
    function get_banner_list()
    {
        $result = null;
        $sql = "SELECT * FROM `bkindexbanner` WHERE  `publish` = 1";
        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
        {
          if(mysqli_num_rows($query)>0)
          {
            while($row = mysqli_fetch_assoc($query)) 
            {
              $result[]=$row;
            }
          }
        }
        else
        {
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);       
        }
        return $result;
    }

//後台navgation bar
    function get_nav_list($clientcode, $dbtable)
    {
        $result = null;
        $sql = "SELECT * FROM `{$dbtable}` WHERE `ClientCode` = '{$clientcode}' AND `publish` = 1";
        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
        {
          if(mysqli_num_rows($query)>0)
          {
            while($row = mysqli_fetch_assoc($query)) 
            {
              $result[]=$row;
            }
          }
        }
        else
        {
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);       
        }
        return $result;
    }

//抓取全部club的資料
    function get_all_club($state)
    {
        $result = null;
        switch ($state){
          case 'ALL':
              $sql = "SELECT * FROM `club` ORDER BY `CreateDate` DESC";
            break;
          case 'OnLine':
              $sql = "SELECT * FROM `club` WHERE `publish` = 1 ORDER BY `CreateDate` DESC";
            break;
          case 'OffLine':
              $sql = "SELECT * FROM `club` WHERE `publish` = 0 ORDER BY `CreateDate` DESC";
            break;
          default:
            
        }
        
        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
        {
          if(mysqli_num_rows($query)>0)
          {
            while($row = mysqli_fetch_assoc($query)) 
            {
              $result[]=$row;
            }
          }
        }
        else
        {
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);       
        }
        return $result;
    }

//module type
    function get_module_list()
    {
        $datas = array();

        $sql = "SELECT * FROM `modulelist` WHERE `publish` = 1";
        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
        {
            //判定資料庫內的資料為一筆以上	
            if(mysqli_num_rows($query)>0)
            {
                //抓取陣列內的資料直到陣列內無資料	
                while($row = mysqli_fetch_assoc($query)) {
                    $datas[]=$row;
                }
            }
        }
        else
        {
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);				
        }
        return $datas;		
	}

//search club list
    function search_clubcode ($table,$clentcode,$state)
    {
      $datas = array();
      switch ($state){
          case 'ALL':
              $sql = "SELECT * FROM `$table` WHERE `ClientCode`='{$clentcode}'";
            break;
          case 'OnLine':
              $flag = 1;
              $sql = "SELECT * FROM `$table` WHERE `ClientCode`='{$clentcode}' AND `publish` = '{$flag}'";
            break;
          case 'OffLine':
              $flag = 0;
              $sql = "SELECT * FROM `$table` WHERE `ClientCode`='{$clentcode}' AND `publish` = '{$flag}'";
            break;
          default:
            
        }
        
        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
        {
            //判定資料庫內的資料為一筆以上	
            if(mysqli_num_rows($query)>0)
            {
                //抓取陣列內的資料直到陣列內無資料	
                while($row = mysqli_fetch_assoc($query)) {
                    $datas[]=$row;
                }
            }
        }
        else
        {
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);				
        }
        return $datas;
    }


    function modify_club($navN, $id, $rank, $path, $img, $title, $cont1, $cont2, $seotitle, $seoalt, $modifyDate, $publish)
    {
        $result = null;

        $sql = "UPDATE `{$navN}` SET `rank`='{$rank}',`img`='{$img}',`title`='{$title}',`cont1`='{$cont1}',`cont2`='{$cont2}',`seotitle`='{$seotitle}',`seoalt`='{$seoalt}',`modify_time`='{$modifyDate}',`publish`='{$publish}' 
        WHERE `id`='{$id}' AND `path`='{$path}' ";

        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0 )
              $result = 'true';
        }
        else
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        return $result;
    }
//get nav content from navigation table
  function get_nav_conte($id)
  {
    $result[] = null;
      $sql = "SELECT * FROM `navigation` WHERE `EnableNav` = 1 AND `id` = '{$id}'";
    
    $query = mysqli_query($_SESSION['link'],$sql);
    if($query)
      if(mysqli_num_rows($query)>0)        
        if($row = mysqli_fetch_assoc($query)) 
          $result[]=$row;
    else
      echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);  
    return $result;
  }
  function get_navigation($status)
  {
    $result[] = null;
    if($status == 1)
      $sql = "SELECT * FROM `navigation` WHERE `EnableNav` = 1 ORDER BY `rank` ASC ";
    else
      $sql = "SELECT * FROM `navigation` ORDER BY `rank` ASC ";
    
    $query = mysqli_query($_SESSION['link'],$sql);
    if($query)
      if(mysqli_num_rows($query)>0)
        while($row = mysqli_fetch_assoc($query)) 
          $result[]=$row;
    else
      echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);  
    return $result;
  }
//serach one navigation
  function get_a_navigation($id)
  {
    $result[] = null;
    $sql = "SELECT * FROM `navigation` WHERE `id` = '{$id}'";
    $query = mysqli_query($_SESSION['link'],$sql);
    if($query)
      if(mysqli_num_rows($query)>0)
        while($row = mysqli_fetch_assoc($query)) 
          $result[]=$row;
    else
      echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);  
    return $result;
  }
//更新Club for 1.publish 2.PublishDate 3.modulecode by ClientCode
  function publish_club($clientCode, $moduleCode,$publish)
  {
      $result = null;
      if(isset($publish))
        $publish_date = date("Y-m-d").'T'.date("H:i:s");
      else
        $publish_date = 'NULL';
      $sql = "UPDATE `club`
              SET `ModuleCode`='{$moduleCode}',
                  `PublishDate`='{$publish_date}',
                  `publish`= '{$publish}'
              WHERE `ClientCode`= '{$clientCode}' ";
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = true;
      else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
  }

  //更新navigation for 1.rank 2.title 3.enableNav
  function publish_navigation($id,$rank, $title, $enablenav, $enuser)
  {
      $result = null;
//      if(isset($updated_at))
//        $updated_at = date("Y-m-d").'T'.date("H:i:s");
//      else
//        $updated_at = 'NULL';
    
      $sql = "UPDATE `navigation`
              SET `rank`='{$rank}',
                  `title`='{$title}',
                  `EnableNav`= '{$enablenav}',
                  `CtrlNav_by_user` = '{$enuser}',
                  `shortcut` = 0,
                  `shortcutOrder` = ''
              WHERE `id`= '{$id}' ";
      $query = mysqli_query($_SESSION['link'],$sql);
      
      if($query)
      {
        if(mysqli_affected_rows($_SESSION['link']) >= 0)
          $result = true; 
      }
      else
        echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
  }
//更新navigation for 1.title 2.subtitle 3.content 4. background-image 5. bk-SEO
  function Add_navigation_conte($id,$tit, $subtit, $conte, $path, $seo)
  {
      $result = null;    
      $sql = "UPDATE `navigation`
              SET 
                  `ImgTitle`='{$tit}',
                  `ImgSubtitle`= '{$subtit}',
                  `ImgContent` = '{$conte}',
                  `bk` = '{$path}',
                  `bkSEO` = '{$seo}'
              WHERE `id`= '{$id}' ";
      $query = mysqli_query($_SESSION['link'],$sql);
      
      if($query)
      {
        if(mysqli_affected_rows($_SESSION['link']) >= 0)
          $result = "true"; 
      }
      else
        echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
  }
//更新user資料表
    function modify_user($name, $pw, $mail, $oldname, $oldpw)
    {
      $result = null;
      $md5pw = md5($pw);
      $modify_date = date("Y-m-d").'T'.date("H:i:s");
      $sql = "UPDATE `user` 
      SET `username`='{$name}',
      `password`='{$md5pw}',
      `bkpw`='{$pw}',             
      `mail`='{$mail}', 
      `modify_date`='{$modify_date}' 
      WHERE `username`='{$oldname}' AND `bkpw`='{$oldpw}'";
 
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0 )
            $result = true;
      }
      else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    }
//搜尋資料表名稱是否存在
    function search_db_table($dbname, $tablename) 
    {
      $result = null;
      //搜尋資料庫所有資料表 => SELECT * FROM Information_Schema.TABLES
      $sql = "SELECT * FROM Information_Schema.TABLES Where TABLE_SCHEMA = '{$dbname}' AND TABLE_NAME= '{$tablename}'";
      
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0 )
            $result = true;
      }
      else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
      
    }
//新增home資料表
    function create_home_table($tablename) {
      $result = null;
      // sql to create table
      $sql = "CREATE TABLE $tablename (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      
      keyword VARCHAR(160) NOT NULL,
      metadesc VARCHAR(160) NOT NULL,
      tagdesc VARCHAR(50),      
      title VARCHAR(60),
      ckcontent VARCHAR(65535),
      
      shortImg  VARCHAR(50),
      logoImg  VARCHAR(50),
      bk1Img  VARCHAR(50),
      bk2Img  VARCHAR(50),
      bannImg  VARCHAR(50),
      sli1Img VARCHAR(50),
      sli2Img VARCHAR(50),
      sli3Img  VARCHAR(50),
      
      shortSeo  VARCHAR(50),
      logoSeo  VARCHAR(50),
      bk1Seo  VARCHAR(50),
      bk2Seo  VARCHAR(50),
      bannSeo  VARCHAR(50),
      sli1Seo VARCHAR(50),
      sli2Seo VARCHAR(50),
      sli3Seo  VARCHAR(50),
      
      shortTit  VARCHAR(50),
      logoTit  VARCHAR(50),
      bk1Tit  VARCHAR(50),
      bk2Tit  VARCHAR(50),
      bannTit  VARCHAR(50),
      sli1Tit VARCHAR(50),
      sli2Tit VARCHAR(50),
      sli3Tit  VARCHAR(50),
      
      shortEd  VARCHAR(65535),
      logoEd  VARCHAR(65535),
      bk1Ed  VARCHAR(65535),
      bk2Ed  VARCHAR(65535),
      bannEd  VARCHAR(65535),
      sli1Ed VARCHAR(65535),
      sli2Ed VARCHAR(65535),
      sli3Ed  VARCHAR(65535)

      )";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0 )
            $result = true;
      }
      else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    }
//儲存home.php資料
    function add_home($keywd,$meta,$tag,$title,$ckcont,
                         $shortImg,$logoImg,$bk1Img,$bk2Img,$bannImg,$sli1Img,$sli2Img,$sli3Img,
                         $shortSeo,$logoSeo,$bk1Seo,$bk2Seo,$bannSeo,$sli1Seo,$sli2Seo,$sli3Seo,
                         $shortTit,$logoTit,$bk1Tit,$bk2Tit,$bannTit,$sli1Tit,$sli2Tit,$sli3Tit,
                         $shortEd,$logoEd,$bk1Ed,$bk2Ed,$bannEd,$sli1Ed,$sli2Ed,$sli3Ed)
    {
      $result = null;
      
      $sql = "INSERT INTO `home`(`keyword`,`metadesc`,`tagdesc`,`title`,`ckcontent`,
      `shortImg`,`logoImg`,`bk1Img`,`bk2Img`,`bannImg`,`sli1Img`,`sli2Img`,`sli3Img`,
      `shortSeo`,`logoSeo`,`bk1Seo`,`bk2Seo`,`bannSeo`,`sli1Seo`,`sli2Seo`,`sli3Seo`,
      `shortTit`,`logoTit`,`bk1Tit`,`bk2Tit`,`bannTit`,`sli1Tit`,`sli2Tit`,`sli3Tit`,
      `shortEd`,`logoEd`,`bk1Ed`,`bk2Ed`,`bannEd`,`sli1Ed`,`sli2Ed`,`sli3Ed`
      ) VALUE ('{$keywd}','{$meta}','{$tag}','{$title}','{$ckcont}',
      '{$shortImg}','{$logoImg}','{$bk1Img}','{$bk2Img}','{$bannImg}','{$sli1Img}','{$sli2Img}','{$sli3Img}',
      '{$shortSeo}','{$logoSeo}','{$bk1Seo}','{$bk2Seo}','{$bannSeo}','{$sli1Seo}','{$sli2Seo}','{$sli3Seo}',
      '{$shortTit}','{$logoTit}','{$bk1Tit}','{$bk2Tit}','{$bannTit}','{$sli1Tit}','{$sli2Tit}','{$sli3Tit}',
      '{$shortEd}','{$logoEd}','{$bk1Ed}','{$bk2Ed}','{$bannEd}','{$sli1Ed}','{$sli2Ed}','{$sli3Ed}'
      )";
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }

//抓取home資料
    function get_home()
    {
      $result = null;
      
      $sql = "SELECT * FROM `home` ORDER BY `id` DESC";

      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          //判定資料庫內的資料為一筆以上	
          if(mysqli_num_rows($query)>0)
          {
            
              //抓取陣列內一筆的資料
              if($row = mysqli_fetch_assoc($query)) {
                  $result[]=$row;
              }
          }
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }
//更新home資料表
    function modify_home($keywd,$meta,$tag,$title,$ckcont,
                         $shortImg,$logoImg,$bk1Img,$bk2Img,$bannImg,$sli1Img,$sli2Img,$sli3Img,
                         $shortSeo,$logoSeo,$bk1Seo,$bk2Seo,$bannSeo,$sli1Seo,$sli2Seo,$sli3Seo,
                         $shortTit,$logoTit,$bk1Tit,$bk2Tit,$bannTit,$sli1Tit,$sli2Tit,$sli3Tit,
                         $shortEd,$logoEd,$bk1Ed,$bk2Ed,$bannEd,$sli1Ed,$sli2Ed,$sli3Ed)
    {
      $result = null;

      if(empty(get_home()))
        add_home($keywd,$meta,$tag,$title,$ckcont,
                         $shortImg,$logoImg,$bk1Img,$bk2Img,$bannImg,$sli1Img,$sli2Img,$sli3Img,
                         $shortSeo,$logoSeo,$bk1Seo,$bk2Seo,$bannSeo,$sli1Seo,$sli2Seo,$sli3Seo,
                         $shortTit,$logoTit,$bk1Tit,$bk2Tit,$bannTit,$sli1Tit,$sli2Tit,$sli3Tit,
                         $shortEd,$logoEd,$bk1Ed,$bk2Ed,$bannEd,$sli1Ed,$sli2Ed,$sli3Ed);
      else {
        $result = null;
        $sql = "UPDATE `home` SET `keyword`='{$keywd}',`metadesc`='{$meta}',`tagdesc`='{$tag}',`title`='{$title}',`ckcontent`='{$ckcont}',
        `shortImg`='{$shortImg}',`logoImg`='{$logoImg}',`bk1Img`='{$bk1Img}',`bk2Img`='{$bk2Img}',`bannImg`='{$bannImg}',`sli1Img`='{$sli1Img}',`sli2Img`='{$sli2Img}',`sli3Img`='{$sli3Img}',
         `shortSeo`='{$shortSeo}',`logoSeo`='{$logoSeo}',`bk1Seo`='{$bk1Seo}',`bk2Seo`='{$bk2Seo}',`bannSeo`='{$bannSeo}',`sli1Seo`='{$sli1Seo}',`sli2Seo`='{$sli2Seo}',`sli3Seo`='{$sli3Seo}',
         `shortTit`='{$shortTit}',`logoTit`='{$logoTit}',`bk1Tit`='{$bk1Tit}',`bk2Tit`='{$bk2Tit}',`bannTit`='{$bannTit}',`sli1Tit`='{$sli1Tit}',`sli2Tit`='{$sli2Tit}',`sli3Tit`='{$sli3Tit}',
        `shortEd`='{$shortEd}',`logoEd`='{$logoEd}',`bk1Ed`='{$bk1Ed}',`bk2Ed`='{$bk2Ed}',`bannEd`='{$bannEd}',`sli1Ed`='{$sli1Ed}',`sli2Ed`='{$sli2Ed}',`sli3Ed`='{$sli3Ed}'
        
        WHERE `id`='1'";
        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
        }
        else
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }
//增加footer資料
    function add_footer($name,$adr,$idc,$tel,$cont,$mail,$line,$fb,$geo,$logo,$seo)
    {
      $result = null;
      
      $sql = "INSERT INTO `footer`(`name`,`adr`,`idc`,`tel`,`cont`,`mail`,`line`,`fb`,`geo`) VALUE ('{$name}','{$adr}','{$idc}','{$tel}','{$cont}','{$mail}','{$line}','{$fb}','{$geo}')";        
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }
//更新footer資料
    function modify_footer($name,$adr,$idc,$tel,$cont,$mail,$line,$fb,$geo)
    {
      $result = null;
      if(empty(get_footer())) 
        add_footer($name,$adr,$idc,$tel,$cont,$mail,$line,$fb,$geo);
      else {
        $result = null;
        $sql = "UPDATE `footer` SET `name`='{$name}',`adr`='{$adr}',`idc`='{$idc}',`tel`='{$tel}',`cont`='{$cont}',`mail`='{$mail}',`line`='{$line}',`fb`='{$fb}',`geo`='{$geo}' WHERE `id`='1'";

        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0 )
              $result = "true";
        }
        else
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }
//抓取footer資料
    function get_footer()
    {
      $result = null;
      $sql = "SELECT * FROM `footer` ORDER BY `id` DESC";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          //判定資料庫內的資料為一筆以上	
          if(mysqli_num_rows($query)>0)
          {
              //抓取陣列內一筆的資料
              if($row = mysqli_fetch_assoc($query)) {
                  $result[]=$row;
              }
          }
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }
//新增footer的資料表
    function create_footer_table($tablename)
    {
      $result = null;
      // sql to create table
      $sql = "CREATE TABLE $tablename (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      name VARCHAR(6) ,
      adr VARCHAR(30) ,
      idc VARCHAR(10) ,
      tel VARCHAR(20) ,
      cont VARCHAR(10),
      mail VARCHAR(30),
      line VARCHAR(100),
      fb VARCHAR(100) ,
      geo VARCHAR(100) ,
      )";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0 )
            $result = true;
      }
      else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    }
/**********************/
//更新download資料
    function modify_dwnfile($rank,$path,$name_1,$name_2,$name_3,$name_4,$title1,$filName,$dwnldInfor,$title2,$disConte,$create_time,$modify_time,$time_flag,$publish)
    {
      $result = null;
      if(empty(get_dwnfile())) 
        add_dwnfile($rank,$path,$name_1,$name_2,$name_3,$name_4,$title1,$filName,$dwnldInfor,$title2,$disConte,$create_time,$modify_time,$time_flag,$publish);
      else {
        $result = null;
        $sql = "UPDATE `download` SET `rank`='{$rank}',`path`='{$path}',`name_1`='{$name_1}',`name_2`='{$name_2}',`name_3`='{$name_3}',`name_4`='{$name_4}',`title1`='{$title1}',`filName`='{$filName}',`dwnldInfor`='{$dwnldInfor}',`title2`='{$title2}',`disConte`='{$disConte}',`create_time`='{$create_time}',`modify_time`='{$modify_time}',`time_flag`='{$time_flag}',`publish`='{$publish}' WHERE `id`='1'";

        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0 )
              $result = "true";
        }
        else
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }
//抓取download file資料
    function get_dwnfile()
    {
      $result = null;
      $sql = "SELECT * FROM `download` ORDER BY `id` DESC";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          //判定資料庫內的資料為一筆以上	
          if(mysqli_num_rows($query)>0)
          {
              //抓取陣列內一筆的資料
              if($row = mysqli_fetch_assoc($query)) {
                  $result[]=$row;
              }
          }
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }
//增加download資料
    function add_dwnfile($rank,$path,$name_1,$name_2,$name_3,$name_4,$title1,$filName,$dwnldInfor,$title2,$disConte,$create_time,$modify_time,$time_flag,$publish)
    {
      $result = null;
      
      $sql = "INSERT INTO `download`(`rank`,`path`,`name_1`,`name_2`,`name_3`,`name_4`,`title1`,`filName`,`dwnldInfor`,`title2`,`disConte`,`create_time`,`modify_time`,`time_flag`,`publish`) VALUE ('{$rank}','{$path}','{$name_1}','{$name_2}','{$name_3}','{$name_4}','{$title1}`,'{$filName}','{$dwnldInfor}','{$title2}','{$disConte}','{$create_time}','{$modify_time}','{$time_flag}','{$publish}'})";        
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }
//新增download file的資料表
    function create_dwnfile_table($tablename)
    {
      $result = null;
      // sql to create table
      $sql = "CREATE TABLE $tablename (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      rank INT(255) NOT NULL,
      path VARCHAR(20) NOT NULL,
      name_1 VARCHAR(50) NOT NULL,
      name_2 VARCHAR(50) NOT NULL,
      name_3 VARCHAR(50) NOT NULL,
      name_4 VARCHAR(50) NOT NULL,
      title1 VARCHAR(20) NOT NULL,
      filName VARCHAR(50) NOT NULL,
      dwnldInfor VARCHAR(100) NOT NULL,
      create_time VARCHAR(50) NOT NULL,
      title2 VARCHAR(100) NOT NULL,
      disConte TEXT(2000) NOT NULL,
      modify_time VARCHAR(50) NOT NULL,
      time_flag TINYINT(2) NOT NULL,
      publish TINYINT(2) NOT NULL
      )";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0 )
            $result = true;
      }
      else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    }
/***********************/

//新增home以外的nav資料表
    function create_db_assort_table($tablename) {
      $result = null;
      // sql to create table
      $sql = "CREATE TABLE $tablename (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      rankId INT(255) NOT NULL,
      rank INT(255) NOT NULL,
      navName VARCHAR(10),
      EnableNav TINYINT(2),
      assort TINYINT(10) NOT NULL,
      title  VARCHAR(50) NOT NULL,
      subTitle  VARCHAR(50) NOT NULL,
      conte  VARCHAR(65535) NOT NULL,
      img  VARCHAR(100) NOT NULL,
      imgseo  VARCHAR(50) NOT NULL
      )";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0 )
            $result = true;
      }
      else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    }

    function add_assort_navN($assort_,$rankId,$rank, $navName,$EnableNav,$assign_)
    {
      $result = null;
      
      $sql = "INSERT INTO `{$assort_}`(`rankId`,`rank`,`navName`,`EnableNav`,`assort`) 
      VALUE ('{$rankId}','{$rank}','{$navName}','{$EnableNav}','{$assign_}')";        
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }
//新增contact data
    function add_assort_conta($assort_,$lng,$lat,$geoct)
    {
      $result = null;
      
      $sql = "INSERT INTO `{$assort_}`(`title`,`subTitle`,`conte`) 
      VALUE ('{$lng}','{$lat}','{$geoct}')";        
      $query = mysqli_query($_SESSION['link'],$sql);


      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }
    function get_assort_navN($assort_,$rankid,$assort)
    {
      $result = null;
      
      $sql = "SELECT * FROM `{$assort_}` WHERE `rankid` = '{$rankid}' AND `assort` = '{$assort}' ORDER BY `rank` ASC";

      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          //判定資料庫內的資料為一筆以上	
          if(mysqli_num_rows($query)>0)
          {            
              //抓取陣列內一筆的資料
              while($row = mysqli_fetch_assoc($query)) {
                  $result[]=$row;
              }
          }
          else
            $result = 'false';
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }
//get a data from assort_x by ID
    function get_a_assort($assort_,$id, $rankid)
    {
      $result = null;
      $sql = "SELECT * FROM `{$assort_}` WHERE `id` = '{$id}' AND `rankId` = '{$rankid}'";

      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          //判定資料庫內的資料為一筆以上	
          if(mysqli_num_rows($query)>0)
          {            
              //抓取陣列內一筆的資料
              while($row = mysqli_fetch_assoc($query)) {
                  $result[]=$row;
              }
          }
          else
            $result = false;
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }

//刪除相關rankid的資料
    function del_assort($tableName, $rankid,$assort)
    {
        $result = null;
        //刪除條件: rankid & assort
        $sql = "DELETE FROM `{$tableName}` WHERE `rankId`='{$rankid}' AND `assort`='{$assort}'";

        $query = mysqli_query($_SESSION['link'],$sql);

        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0)
                $result = "true";
            else
                $result = "false";
        }
        else
        {
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        }
        return $result;
    }
    //修改相關rankid的資料
    function modify_assort_navN($assort_,$id,$rankid,$rank,$navN, $enable, $assort)
    {
        $result = null;

        $sql = "UPDATE `{$assort_}` SET `rank`='{$rank}',`rankid`='{$rankid}',`navName`='{$navN}',`EnableNav`='{$enable}',`assort`='{$assort}'
        WHERE `id`='{$id}'";

        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0 )
              $result = 'true';
        }
        else
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        return $result;
    }
//update assort_1 information for title & subtitle & content & img & imgSEO
  function update_assort_navN($tabNm, $id, $title, $subtitle, $conte, $imgpath, $seo)
    {
      $result = null;
      $sql = "UPDATE `{$tabNm}` SET `title`='{$title}',`subTitle`='{$subtitle}',`conte`='{$conte}',`img`='{$imgpath}',`imgseo`='{$seo}' WHERE `id`='{$id}'";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0 )
            $result = true;
      }
      else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    }
//搜尋有無相關id的資料
    function search_assort_navN($assort_,$id)
    {
        $result = null;

        $sql = "SELECT * FROM `{$assort_}` WHERE `id`='{$id}'";

        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0 )
              $result = true;
        }
        else
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        return $result;
    }
//顯示全部內容於分類內容
    function get_table_data($tableName,$rankid,$find)
    {
        $result = null;
        $sql = "SELECT * FROM `{$tableName}` WHERE `rankId`='{$rankid}' ORDER BY `{$find}` ASC";
        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
          if(mysqli_num_rows($query)>0)
            while($row = mysqli_fetch_assoc($query)) 
              $result[]=$row;
        return $result; 
    }
//抓取單一分類內容
    function get_a_table_data($tableName,$id)
    {
        $result = null;
        $sql = "SELECT * FROM `{$tableName}` WHERE `id`='{$id}'";
        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
          if(mysqli_num_rows($query)>0)
            if($row = mysqli_fetch_assoc($query)) 
              $result[]=$row;
//        else
//            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        return $result; 
    }
//新增分類按鈕的資料表
    function create_table($tablename) {
      $result = null;
      // sql to create table
      $sql = "CREATE TABLE $tablename (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      rankId INT(255) NOT NULL,
      rank INT(255) NOT NULL,
      img_1 VARCHAR(50) NOT NULL,
      img_2 VARCHAR(50) NOT NULL,
      img_3 VARCHAR(50) NOT NULL,
      img_4 VARCHAR(50) NOT NULL,
      title VARCHAR(20) NOT NULL,
      cont1 VARCHAR(20) NOT NULL,
      cont2 TEXT(2000) NOT NULL,
      seotitle VARCHAR(20) NOT NULL,
      seoalt VARCHAR(20) NOT NULL,
      create_time VARCHAR(50) NOT NULL,
      modify_time VARCHAR(50) NOT NULL,
      time_flag TINYINT(2) NOT NULL,
      publish TINYINT(2) NOT NULL
      )";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0 )
            $result = true;
      }
      else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    }
//新增分類按鈕的資料表
    function create_Contatable($tablename) {
      $result = null;
      // sql to create table
      $sql = "CREATE TABLE $tablename (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      rankId INT(255) NOT NULL,    
      ower VARCHAR(50) NOT NULL,
      tel VARCHAR(50) NOT NULL,
      addre VARCHAR(20) NOT NULL,
      title1 VARCHAR(20) NOT NULL,
      descr1 TEXT(2000) NOT NULL,
      title2 VARCHAR(20) NOT NULL,
      descr2 VARCHAR(20) NOT NULL,
      )";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0 )
            $result = true;
      }
      else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    }
//新增分類photo的資料表
    function create_Photable($tablename) {
      $result = null;
      // sql to create table
      $sql = "CREATE TABLE $tablename (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      rank INT(255) NOT NULL,
      path VARCHAR(20) NOT NULL,
      imgName VARCHAR(50) NOT NULL,
      create_time VARCHAR(50) NOT NULL,
      modify_time VARCHAR(50) NOT NULL
      )";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0 )
            $result = true;
      }
      else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    }
//新增分類textpanel的資料表
    function create_textable($tablename) {
      $result = null;
      // sql to create table
      $sql = "CREATE TABLE $tablename (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      rankId INT(255) NOT NULL,
      userName VARCHAR(50) NOT NULL,
      Email VARCHAR(50) NOT NULL,
      Tell VARCHAR(50) NOT NULL,
      cellingTime VARCHAR(255) NOT NULL,
      qustType VARCHAR(10) NOT NULL,
      title VARCHAR(255) NOT NULL,
      content VARCHAR(255) NOT NULL,
      create_time VARCHAR(50) NOT NULL,
      publish VARCHAR(10) NOT NULL
      )";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0 )
            $result = true;
      }
      else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    }
//新增分類download的資料表
    function create_dwldtable($tablename) {
      $result = null;
      // sql to create table
      $sql = "CREATE TABLE $tablename (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      rankId INT(255) NOT NULL,
      rank INT(255) NOT NULL,
      filepath VARCHAR(255) NOT NULL,
      fileNme VARCHAR(50) NOT NULL,
      title VARCHAR(50) NOT NULL,
      subtitle VARCHAR(50) NOT NULL,
      conte VARCHAR(255) NOT NULL,
      filesize VARCHAR(10) NOT NULL,
      pathImg VARCHAR(255) NOT NULL,
      SEOImg VARCHAR(255) NOT NULL,
      create_time VARCHAR(50) NOT NULL,
      modify_time VARCHAR(50) NOT NULL,
      publish VARCHAR(10) NOT NULL
      )";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0 )
            $result = true;
      }
      else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    }
//新增分類contact的資料表
    function create_Contable($tablename) {
      $result = null;
      // sql to create table
      $sql = "CREATE TABLE $tablename (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      rankId INT(255) NOT NULL,
      company VARCHAR(50) NOT NULL,
      name VARCHAR(50) NOT NULL,
      tell VARCHAR(50) NOT NULL,
      addre VARCHAR(100) NOT NULL,
      tit1 VARCHAR(100) NOT NULL,
      subj1 VARCHAR(250) NOT NULL,
      tit2 VARCHAR(100) NOT NULL,
      subj2 VARCHAR(250) NOT NULL,
      )";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0 )
            $result = true;
      }
      else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    }
//新增分類textpanel的資料表
    function create_Textpanel($tablename) {
      $result = null;
      // sql to create table
      $sql = "CREATE TABLE $tablename (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      rankId INT(255) NOT NULL,
      mailaddr VARCHAR(255) NOT NULL COMMENT '郵件信箱',
      mailpw VARCHAR(20) NOT NULL COMMENT '信箱密碼',
      stmpservice VARCHAR(50) NOT NULL COMMENT 'STMP主機',
      mailtitle VARCHAR(50) NOT NULL COMMENT '郵件標題',
      userNam VARCHAR(50) NOT NULL COMMENT '客戶暱稱',
      email VARCHAR(50) NOT NULL COMMENT '聯絡信箱',
      tell VARCHAR(50) NOT NULL COMMENT	'聯絡電話',
      callIn VARCHAR(255) NOT NULL COMMENT '聯絡時間',
      title VARCHAR(255) NOT NULL COMMENT '主題',
      content VARCHAR(255) NOT NULL COMMENT '留言內容',
      qustType1 VARCHAR(20) NOT NULL COMMENT '關鍵字分類1',
      qustType2 VARCHAR(20) NOT NULL COMMENT '關鍵字分類2',
      qustType3 VARCHAR(20) NOT NULL COMMENT '關鍵字分類3',
      replywd1 VARCHAR(255) NOT NULL COMMENT '快速回覆文字組1',
      replywd2 VARCHAR(255) NOT NULL COMMENT '快速回覆文字組2',
      replywd3 VARCHAR(255) NOT NULL COMMENT '快速回覆文字組3',
      )";
      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0 )
            $result = true;
      }
      else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    }
//新增ABOUT資料表
    function add_table_data($tabName,$rankId,$rank,$img_1,$img_2,$img_3,$img_4,$title,$cont1,$cont2,$seotitle,$seoalt,$srtime,$edtime,$time_flag,$publish)
    {
      $result = null;
      
      $sql = "INSERT INTO `{$tabName}`(`rankId`,`rank`,`img_1`,`img_2`,`img_3`,`img_4`,`title`,`cont1`,`cont2`,`seotitle`,`seoalt`,`create_time`,`modify_time`,`time_flag`,`publish`) VALUE ('{$rankId}','{$rank}','{$img_1}','{$img_2}','{$img_3}','{$img_4}','{$title}','{$cont1}','{$cont2}','{$seotitle}','{$seoalt}','{$srtime}','{$edtime}','{$time_flag}','{$publish}')";
      
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }
//新增download資料表
    function add_dwldtable_data($tabName,$rankId,$rank,$filepath,$fileNme,$title,$subtitle,$conte,$filesize,$pathImg,$SEOImg,$srtime,$edtime,$publish)
    {
      $result = null;
      
      $sql = "INSERT INTO `{$tabName}`(`rankId`,`rank`,`filepath`,`fileNme`,`title`,`subtitle`,`conte`,`filesize`,`pathImg`,`SEOImg`,`create_time`,`modify_time`,`publish`) VALUE ('{$rankId}','{$rank}','{$filepath}','{$fileNme}','{$title}','{$subtitle}','{$conte}','{$filesize}','{$pathImg}','{$SEOImg}','{$srtime}','{$edtime}','{$publish}')";
      
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }

//修改download資料表
    function modify_dwldtable_data($tabName,$id, $rankId,$rank,$filepath,$fileNme,$title,$subtitle,$conte,$filesize,$pathImg,$SEOImg,$mdytime,$publish)
    {
      $result = null;
      
      $sql = "UPDATE `{$tabName}` SET  `rankId`='{$rankId}',`rank`='{$rank}',`filepath`='{$filepath}',`fileNme`='{$fileNme}',`title`='{$title}',`subtitle`='{$subtitle}',`conte`='{$conte}',`filesize`='{$filesize}',`pathImg`='{$pathImg}',`SEOImg`='{$SEOImg}',`modify_time`='{$mdytime}',`publish`='{$publish}' WHERE `id`='{$id}'";
      
      $query = mysqli_query($_SESSION['link'],$sql);

      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0)
              $result = "true";
          else
              $result = "false";
      }
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }
    function del_data($navN,$id)
    {
        $result = null;
        //刪除條件: Id
        $sql = "DELETE FROM `{$navN}` WHERE `id`='{$id}'";
        $query = mysqli_query($_SESSION['link'],$sql);

        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0)
                $result = "true";
            else
                $result = "false";
        }
        else
        {
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        }
        return $result;
    }

//新增留言板資訊
    function add_table_textpanel($navN, $rankId, $mailaddr, $mailpw, $stmpservice, $mailtitle, $userNam, $email ,$tell, $callIn, $title, $content, $qustType1, $qustType2, $qustType3, $replywd1, $replywd2, $replywd3)
    {
        $result = null;        
        $sql = "INSERT INTO `{$navN}` (`rankId` ,`mailaddr`,`mailpw`,`stmpservice`,`stmpport`,`mailtitle`, `userName`,`email`,`tell`,`callIn`,`title`,`content`,`qustType1`,`qustType2`,`qustType3`,`replywd1`,`replywd2`,`replywd3`) VALUE('{$rankId}','{$mailaddr}','{$mailpw}','{$stmpservice}','{$stmpport}','{$mailtitle}','{$userNam}','{$email}','{$tell}','{$callIn}','{$title}','{$content}','{$qustType1}','{$qustType2}','{$qustType3}','{$replywd1}','{$replywd2}','{$replywd3}')";     
      
        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0 )
              $result = 'true';
        }
        else
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        return $result;
    }
 //修改留言板資訊表
    function modify_table_textpanel($navN, $rankId, $mailaddr, $mailpw, $stmpservice, $stmpport, $mailtitle, $userNam, $email ,$tell, $callIn, $title, $content, $qustType1, $qustType2, $qustType3, $replywd1, $replywd2, $replywd3)
    {
      $result = null;
      $sql = "UPDATE `{$navN}` SET `mailaddr`='{$mailaddr}',`mailpw`='{$mailpw}',`stmpservice`='{$stmpservice}',`stmpport`='{$stmpport}',`mailtitle`='{$mailtitle}',`userName`='{$userNam}',`email`='{$email}',`tell`='{$tell}',`callIn`='{$callIn}',`title`='{$title}',`content`='{$content}',`qustType1`='{$qustType1}',`qustType2`='{$qustType2}',`qustType3`='{$qustType3}',`replywd1`='{$replywd1}',`replywd2`='{$replywd21}',`replywd3`='{$replywd3}' WHERE `rankId`='{$rankId}'";

      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
        if(mysqli_affected_rows($_SESSION['link']) >= 0 )
          $result = 'true';
      }
      else
        echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    }  
  //修改公司資訊表
    function modify_table_contact($navN, $rankId, $company, $addre ,$ower, $tel, $title1, $descr1, $title2, $descr2)
    {
        $result = null;

        $sql = "UPDATE `{$navN}` SET `company`='{$company}',`ower`='{$ower}',`tel`='{$tel}',`addre`='{$addre}',`title1`='{$title1}',`descr1`='{$descr1}',`title2`='{$title2}',`descr2`='{$descr2}' WHERE `rankId`='{$rankId}'";

        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0 )
              $result = 'true';
        }
        else
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        return $result;
    }  
//新增公司資訊
    function add_table_contact($navN, $rankId, $company,$addre, $ower, $tel,  $title1, $descr1, $title2, $descr2)
    {
        $result = null;

        $sql = "INSERT INTO `{$navN}` ( `rankId` ,`company`,`ower`,`tel`,`addre`,`title1`,`descr1`,`title2`,`descr2`) VALUE('{$rankId}','{$company}','{$ower}','{$tel}','{$addre}','{$title1}','{$descr1}','{$title2}','{$descr2}')";     
      
        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0 )
              $result = 'true';
        }
        else
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        return $result;
    }

    //修改資料表
    function modify_table_data($navN, $id, $rank, $title, $publish)
    {
        $result = null;
        $modify_date = date("Y-m-d").'T'.date("H:i:s");

        $sql = "UPDATE `{$navN}` SET `rank`='{$rank}',`title`='{$title}',`publish`='{$publish}',`modify_time`='{$modify_date}' WHERE `id`='{$id}'";

        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0 )
              $result = 'true';
        }
        else
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        return $result;
    }
    //搜尋有無相關id的資料
    function search_table_data($navN,$id)
    {
        $result = null;

        $sql = "SELECT * FROM `{$navN}` WHERE `id`='{$id}'";

        $query = mysqli_query($_SESSION['link'],$sql);
        if($query)
        {
            if(mysqli_affected_rows($_SESSION['link']) >= 0 )
              $result = 'true';
        }
        else
            echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
        return $result;
    }
    //修改ABOUT資料表內全部資料
    function modify_all_table_data($navN, $id, $rank, $img_1,$img_2,$img_3,$img_4, $title, $cont1, $cont2, $seotitle, $seoalt, $modify_date,$time_flag, $publish)
    {
      $result = null;
      $modify_date = date("Y-m-d").'T'.date("H:i:s");
      $sql = "UPDATE `{$navN}` SET `rank`='{$rank}',`img_1`='{$img_1}',`img_2`='{$img_2}',`img_3`='{$img_3}',`img_4`='{$img_4}',`title`='{$title}',`cont1`='{$cont1}',`cont2`='{$cont2}',`seotitle`='{$seotitle}',`seoalt`='{$seoalt}',`modify_time`='{$modify_date}',`time_flag`='{$time_flag}',`publish`='{$publish}' 
      WHERE `id`='{$id}'";

      $query = mysqli_query($_SESSION['link'],$sql);
      if($query)
      {
          if(mysqli_affected_rows($_SESSION['link']) >= 0 )
            $result = 'true';
      }
      else
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      return $result;
    }
    //取得textpaneldb資料表內全部資料
    function get_textpaneldb_datas($target,$trg_dat,$order)
    {
      $result = null;
      switch ($trg_dat){
        case 'all':
          $sql = "SELECT * FROM `textpaneldb` ORDER BY `{$order}` DESC";
          break;
        default:
          $sql = "SELECT * FROM `textpaneldb` WHERE `{$target}`='{$trg_dat}' ORDER BY `{$order}` DESC";
          break;          
      }
      $query = mysqli_query($_SESSION['link'],$sql);
//      echo $query;
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
        else
          $result="false";
      return $result; 
    }
//刪除textpaneldb資料表內全部資料
    
    //排序textpaneldb資料表內全部資料
    function sort_datasBytable($DB_tableName, $DB_listNam, $ordername, $ordering, $datcount)
    {
      $result = null;
//      $sql = "SELECT * FROM `{$DB_tableName}` WHERE `{$DB_listNam}`='{$ordername}' ORDER BY `{$ordering}` DESC";
      $sql = "SELECT * FROM `textpaneldb` ORDER BY `id` DESC";
      $query = mysqli_query($_SESSION['link'],$sql);
//      echo $query;
      if($query)
        if(mysqli_num_rows($query)>0)
          while($row = mysqli_fetch_assoc($query)) 
            $result[]=$row;
        else
          $result="false";
      else
      {
          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
      }
      return $result;
    }

//    //delete datas from table_name;
//    function del_datas($tableName)
//    {
//      $result = null;
//
//      $sql = "TRUNCATE TABLE `{$tableName}`";
//
//      $query = mysqli_query($_SESSION['link'],$sql);
//
//      if($query)
//      {
//          if(mysqli_affected_rows($_SESSION['link']) >= 0)
//          {
//              $result = 1;
//          }
//          else
//            $result = 0;
//      }
//      else
//      {
//          echo "{$sql}語法請求失敗: <br/>".mysqli_error($_SESSION['link']);
//          $result = false;
//      }
//      return $result;
//    }




?>