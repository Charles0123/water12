<?php 
  @session_start();  
  
  if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
    //login fail
    header("Location:login.php");
  }
  else{
    //login pass
    $nam=$_SESSION['NAM'];
    $id=$_SESSION['ID'];
    $pw=$_SESSION['PW'];
    $date=$_SESSION['DAT'];
    $time=$_SESSION['TIM'];
    if($nam == '') $nam = $id;
    
  }
?>
<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>網路地圖 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">

  <link rel="stylesheet" href="css/kendoUI.css" type="text/css" />
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap-slider.css" type="text/css" />
  <link rel="stylesheet" href="css/rowmap.css" />

  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>
  <script type="text/javascript" src="js/gen.js"></script>
  <script type="text/javascript" src="js/DisasterInfo.js"></script>
  <script src="./js/parameter_def.js"></script>
  <script src="./js/script_inner.js"></script>
<!--  <script src="searchbase-new.js"></script>-->
<script type="text/javascript">

window.onunload = unloadPage;

function unloadPage()
{
 console.log("unload event detected!");
}
</script>
</head>

<body onload="showtime();" onunload="unloadPage();">
  <!-- #top_header [top] -->
  <div id="top_header">
    <div class="current_date pos_left">
      <div class="date">
        <span id="currdate" style="display: inline-block;"></span><img src="images/time.png" /><span id="currtime"></span>
      </div>
    </div>

    <div class="pos_center">
      <h3 class=""><img src="images/icons/title.png" /></h3>
    </div>

    <div class="pos_right">
      <span>訪客</span>
      <div class="avator">
        <img src="images/icons/test.png" />
      </div>
    </div>
    <a href="#" class="mobile_menu"></a>
  </div>
  <a href="#" id="header_closed" class="open">
    <img class="animated infinite flash" src="images/xright.svg" />
  </a>

  <!-- #top_header [end] -->
  <header>
    <div class="mobile_mask"></div>
    <div id="menu">
      <!-- main_menu [begin] -->
      <nav class="main_menu  center">
        <ul>
          <li class="">
            <a href="./mapview.php" class="m1"><img src="images/icons/btn-icon01a.png" />全區供水<span>Map view</span></a>
            <ul class="child_menu">
              <li>
                <a href="javascript:void(0);" class="left_menu1 ">
                  <div class="pic"><img src="images/m1.png" /></div>
                  快速選單
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="left_menu2 ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  基本圖層
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0);" class="m2"><img src="images/icons/btn-icon02a.png" />即時水情看板<span>Instant board</span></a>
            <ul class="child_menu">
             <li><a href="javascript:void(0)" class=" " onclick="console.log($(this).next('.show_popinfo').fadeToggle('fast'))">
                  <div class="pic"><img src="images/m2.png" /></div>
                  儀表板
                </a>
                <div class="show_popinfo" style="width:180px">
                  <a href="./DashboardSupply.php">全區供水<div class="pic"><img src="images/m2.png" /></div></a>
                  <a href="./DashboardPull.php">原水資訊<div class="pic"><img src="images/m2.png" /></div></a>
                  <a href="./DashboardWell.php">板新淨水資訊<div class="pic"><img src="images/m2.png" /></div></a>
                </div>
              </li>
              <li>
                <a href="./WaterBalance.php" class="">
                  <div class="pic"><img src="images/m1.png" /></div>
                  供水平衡圖
                </a>
              </li>
              <li>
                <a href="./WaterSanxia.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  原水三峽河
                </a>
              </li>
              <li>
                <a href="./WaterYushan.php" class=" ">
                  <div class="pic"><img src="images/m1.png" /></div>
                  原水鳶山堰
                </a>
              </li>
              <li>
                <a href="./WaterBanxin.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  板新導水
                </a>
              </li>
              <li>
                <a href="./WaterBanxinScr.php" class=" ">
                  <div class="pic"><img src="images/m1.png" /></div>
                  板新供水
                </a>
                <div class="show_banxioverview">
                  <a href="./mapBanxin.php"><div class="pic"><img src="images/m2.png" /></div>板新調配總覽</a>
                </div>
              </li>
              <li><a href="./WaterOfMainPipe.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  八大管線
                </a></li>
              <li>
                <a href="./WaterLevel.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  水位總覽圖
                </a>
              </li>
              <li>
                <a href="./ElevationSystem.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  供水高程系統
                </a>
              </li>
            </ul>
          </li>
          <li class="">
            <a href="javascript:void(0);" class="m3"><img src="images/icons/btn-icon03a.png" />監控系統資訊<span>Monitoring system</span></a>
            <ul class="child_menu" style="">
              <li>
                <a href="./DataQuery.php" class="">
                  <div class="pic"><img src="images/m1.png" /></div>
                  數值查詢
                </a>
              </li>
              <li>
                <a href="./DataPicture.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  即時圖控
                </a>
              </li>
              <li>
                <a href="./DataCCTV.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  即時影像
                </a>
              </li>
              <li>
                <a href="./DataReport.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  日常報表
                </a>
              </li>
              <li><a href="./DataAnalyzeFlow.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  配水系統
                </a>
              </li>
               <li><a href="./DataWaterinfoReport.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  水情通報
                </a>
              </li> 
              <li>
                <a href="javascript:void(0)" class=" " onclick="console.log($(this).next('.show_popinfo').fadeToggle('fast'))">
                  <div class="pic"><img src="images/m2.png" /></div>
                  設備履歷管理系統
                </a>
                <div class="show_popinfo">
                  <a href="./PushImportXls.php" onclick="$('.show_popinfo').css({'display':'none'})">匯入資料<div class="pic"><img src="images/m2.png" /></div></a>
                  <a href="https://61.222.53.185/WaterEqp/" target="_new">進入管理系統<div class="pic"><img src="images/m2.png" /></div></a>
                </div>
              </li> 
            </ul>
          </li>
          <li class="">
            <a href="javascript:void(0)" class="m4"><img src="images/icons/btn-icon04a.png" />綜合資訊<span>Comprehensive</span></a>
            <ul class="child_menu" style="">
              <li><a href="./DisasterInfo.php" class="">
                  <div class="pic"><img src="images/m1.png" /></div>
                  防災專區
                </a></li>
              <li><a href="./operation.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  手冊專區
                </a></li>
              <li><a href="./ExtraLinking.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  外部連結
                </a></li>
            </ul>
          </li>
          <li class="active"><a href="./rowmap.php" class="m4"><img src="images/icons/btn-icon04a.png" />網站地圖<span>Row Map</span></a></li>
        </ul>
      </nav>
      <!-- main_menu [end] -->
    </div>
  </header>
  <div class="container mt">
    <div class="row">

      <div class="rowmap-title">網站地圖</div>
      <div class="rowmap-content">
        <div class="wrap justify-content-around">
          <div class="col-12 col-md-4">
            <div class="row">
              <div class="item">
                <ul>
                  <li><a href="javascript:void(0);" class="card-title">全區供水</a></li>                  
                  <li class="card-body active" style="display: none"><a href="./mapview.php"><input type="hidden">全區供水</a></li>
                  <li class="card-body"><a href="javascript:void(0);"onclick="location.href = 'mapview.php';"><input type="hidden">快速選單</a></li>
                  <li class="card-body"><a href="javascript:void(0);" onclick="location.href = 'mapview.php';"><input type="hidden">基本圖層</a></li>
                </ul>
                <ul>
                  <li><a href="javascript:void(0);" class="card-title">即時水情看板</a></li>
                  <li class="card-body"><a href="./DashboardSupply.php"><input type="hidden">儀表板-全區供水</a></li>
                  <li class="card-body"><a href="./DashboardPull.php"><input type="hidden">儀表板-原水資訊</a></li>
                  <li class="card-body"><a href="./DashboardWell.php"><input type="hidden">儀表板-板新進水</a></li>
                  <li class="card-body"><a href="./WaterBalance.php"><input type="hidden">供水平衡圖</a></li>
                  <li class="card-body"><a href="./WaterSanxia.php"><input type="hidden">原水三峽河</a></li>
                  <li class="card-body"><a href="./WaterYushan.php"><input type="hidden">原水鳶山堰</a></li>
                  <li class="card-body"><a href="./WaterBanxin.php"><input type="hidden">板新導水</a></li>
                  <li class="card-body"><a href="./WaterBanxinScr.php"><input type="hidden">板新供水</a></li>
                  <li class="card-body"><a href="./mapBanxin.php"><input type="hidden">板新調配總覽</a></li>
                  <li class="card-body"><a href="./WaterLevel.php"><input type="hidden">水位總覽</a></li>
                  <li class="card-body"><a href="./ElevationSystem.php"><input type="hidden">供水高程系統</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="row">
              <div class="item">
                <ul>
                  <li><a href="javascript:void(0);" class="card-title">監控系統資訊</a></li>
                  <li class="card-body"><a href="./DataQuery.php"><input type="hidden">數值查詢</a></li>
                  <li class="card-body"><a href="./DataPicture.php"><input type="hidden">即時圖控</a></li>
                  <li class="card-body"><a href="./DataCCTV.php"><input type="hidden">即時影像</a></li>
                  <li class="card-body"><a href="./DataReport.php"><input type="hidden">日常報表</a></li>
                  <li class="card-body"><a href="./DataAnalyzeFlow.php"><input type="hidden">配水系統</a></li>
                  <li class="card-body"><a href="./DataWaterinfoReport.php"><input type="hidden">水情通報</a></li>
                  <li class="card-body"><a href="./PushImportXls.php"><input type="hidden">匯入財產標籤</a></li>
                  <li class="card-body"><a href="#"><input type="hidden">設備履歷管理系統</a></li>
                </ul>
                <ul>
                  <li><a href="javascript:void(0);" class="card-title">綜合資訊</a></li>
                  <li class="card-body"><a href="./DisasterInfo.php"><input type="hidden">防災專區</a></li>
                  <li class="card-body"><a href="./operation.php"><input type="hidden">手冊專區</a></li>
                  <li class="card-body"><a href="./ExtraLinking.php"><input type="hidden">外部連結</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="row">
              <div class="item">
                <ul>
                  <li><a href="javascript:void(0);" class="card-title">系統設定</a></li>
                  <li class="card-body"><a href="http://220.134.42.63:8080/waterscada/Login/Login.aspx?redirect=settings" target="_blank"><input type="hidden">系統設定</a></li>                  
                  <li class="card-body"><a href="./UserAuthority.php"><input type="hidden">會員資訊</a></li>
                  <li class="card-body"><a href="./UserGroup.php"><input type="hidden">設定會員群組</a></li>                  
                  <li class="card-body"><a href="./UserSetStation.php"><input type="hidden">場站資訊</a></li>
                </ul>
                <ul>
                  <li><a href="javascript:void(0);" class="card-title">使用者資訊</a></li>
                  <li class="card-body" onclick="document.getElementById('id01').style.display='block'"><a href="javascript:void(0);"><input type="hidden">變更密碼</a></li>
                  <li class="card-body"><a href="./UserInfo.php"><input type="hidden">使用者資訊</a></li>
                  <li class="card-body logout"><a href="./logout.php"><input type="hidden">登出</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style>
    /* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  border-radius: 5px;
}

/* Set a style for all buttons */
input[type=button] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 10px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
  border-radius: 5px;
}

input[type=button]:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto;
  border: 1px solid #888;
  width: 50%;
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>

  <div id="id01" class="modal">

    <div class="modal-content animate">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="images/icons/test.png" style="width:100px;" alt="Avatar" class="avatar">
      </div>

      <div class="container" style="margin-bottom: 20px; height: 100%;">
        <label for="uname"><b>使用者名稱</b></label>
        <input type="text" readyonly placeholder="user id" name="idn">
        <label for="uname"><b>舊密碼</b></label>
        <input type="password" placeholder="Enter old password" name="oldpsw" required>
        <label for="psw1"><b>新密碼</b></label>
        <input type="password" placeholder="Enter new Password" name="psw1" required>
        <label for="psw2"><b>再輸入新密碼</b></label>
        <input type="password" placeholder="Enter confirm new Password" name="psw2" required>
        <input type="button" value="送出">
      </div>
    </div>
  </div>

  <script>
    $(".pos_right > span").text("<?php echo $nam?>");
    
    $("input[name=idn]").val("<?php echo $nam?>");
    // Get the modal
    var modal = document.getElementById('id01');
    var flag = 0;
    $("input[name=psw2]").on('keyup', function(e) {
      var oldpsw = $("input[name=oldpsw]").val();
      var psw1 = $("input[name=psw1]").val();
      var psw2 = $("input[name=psw2]").val();
      if (psw1 === psw2) {
        $("input[name=psw2]").css({
          backgroundColor: 'green'
        });
        flag += 1;
      } else
        $("input[name=psw2]").css({
          backgroundColor: 'red'
        });
    });
        
    $('input[type=button]').on('click', function(e) {
        var id = "<?php echo $id?>";
        var oldpsw = $("input[name=oldpsw]").val();
        var psw1 = $("input[name=psw1]").val();
        var psw2 = $("input[name=psw2]").val();
        var code = 88;
        //  CODE：0=OK, 1=無此ID, 2=OLD_PASWORD錯誤, 3=新密碼長度不足(6字元), -1=資料庫無法連線
        //  if(oldpsw != ''){
        //    if(psw1 === psw2){
        $.ajax({
          url: "http://220.134.42.63:8080/WaterscadaAPI/ChangePassword?id="+id+"&old_password=" + oldpsw + "&new_password=" + psw2,
//          url: "http://220.134.42.63:8080/WaterscadaAPI/ChangePassword?id=water12&old_password=water12&new_password=water12",
          type: "GET",
          dataType: "json",
          success: function(Jdata) {
            code = Jdata.CODE;
            switch (code) {
              case 0:
                alert("密碼變更成功。");
                window.location.href ="rowmap.php";
                console.log('code: 0=OK');
                break;
              case 1:
                alert("無此ID");
                console.log('code: 1=無此ID');
                break;
              case 2:
                alert("OLD_PASWORD錯誤");
                $("input[name=psw1]").val("");
                $("input[name=psw2]").val("");
                console.log('code: 2=OLD_PASWORD錯誤');
                break;
              case 3:
                alert("新密碼長度不足(6字元)");
                $("input[name=psw2]").val(" ");
                console.log('code: 3=新密碼長度不足(6字元)');
                break;
                alert("資料庫無法連線，請稍後更新或聯絡IT人員。");
              case -1:
                console.log('code: -1=資料庫無法連線');
                break;              
            }
          },
          error: function() {
            console.log("get json fail");
          }
        });
//      } else {
//        alert("新舊密碼並未一致，請重新輸入。");
//        $("input[name=psw2]").val(" ");
//      }
//    }
//    else {
//      alert("此欄位為必填項。");
//    }
    });

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

  </script>

  <?php include_once "./php/footer.php";?>

  <script type="text/javascript" src="./js/nicescroll.js"></script>
  <script type="text/javascript" src="./js/script.js"></script>

  <script language="javascript">
    $('.logout').on('click', function() {
      $.ajax({
        type: "POST",
        url: "./logout.php",
        data: {},
        dataType: 'html'
      }).done(function(data) {
        alert("已成功登出");
        if (data == "pass")
          window.location.href = 'login.php';
      }).fail(function(jqXHR, textSataus, errorThrown) {
        alert("有錯誤產生，請看console log");
        console.log(jqXHR.responseText);
      });
    });

   

    //禁止ctrl+滾輪
    var scrollFunc = function(e) {
      e = e || window.event;
      if (e.wheelDelta && event.ctrlKey) {
        //IE/Opera/Chrome
        event.returnValue = false;
      } else if (e.detail) {
        //Firefox
        event.returnValue = false;
      }
    };
    if (document.addEventListener) {
      document.addEventListener("DOMMouseScroll", scrollFunc, false);
    } //W3C
    window.onmousewheel = document.onmousewheel = scrollFunc; //IE/Opera/Chrome/Safari

  </script>

  <!-- checkbox選擇按鈕程式 -->
  <script>
    $("td input").click(function() {
      if ($(this).prop("checked")) {
        $(this).parents('tr').addClass("color-blue");
      } else {
        $(this).parents('tr').removeClass("color-blue");
      }
    });

  </script>

  <!-- lightbox程式 -->
  <script>
    $(document).ready(function() {
      $("button#show-panel").click(function() {
        $("#lightbox, #lightbox-panel").fadeIn(300);
      });
      $("a#close-panel").click(function() {
        $("#lightbox, #lightbox-panel").fadeOut(300);
      })
      $("#lightbox").click(function() {
        $("#lightbox, #lightbox-panel").fadeOut(300);
      });
    });

  </script>
</body>

</html>
