<?php
@session_start();
@$role = 0;
@$nam=$_SESSION['NAM'];
@$id=$_SESSION['ID'];
@$pw=$_SESSION['PW'];
@$date=$_SESSION['DAT'];
@$time=$_SESSION['TIM'];
if($nam == '') @$nam = $id;
if($id == '') $nam="訪客";
else
  @$role = 1;
?>
<!DOCTYPE html>
<html lang="zh_TW">

<head>
  <meta charset="UTF-8">

  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
  <title>供水平衡圖 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">
<meta http-equiv="X-UA-Compatible" content="chrome=1">
  <link rel="stylesheet" href="css/kendoUI.css" type="text/css" />
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css">
  <link rel="stylesheet" href="css/waterBalance.css">
  <link rel="stylesheet" href="css/bootstrap-slider.css" type="text/css">

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type='text/javascript' src='js/jquery-2.1.0.min.js'></script>
  <script type='text/javascript' src='js/gen.js'></script>
  <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
  <script src="./js/parameter_def.js"></script>
  <script src="./js/script_inner.js"></script>
  <script src="js/bootstrap-slider.js"></script>
  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>
<!--  <script src="searchbase-new.js"></script>-->

</head>

<body onload="showtime();">
  <!-- #top_header [top] -->
  <div id="top_header">
    <div class="current_date pos_left">
      <div class="date"><span id='currdate' style="display: inline-block;"></span><img src="images/time.png"><span id="currtime"></span></div>
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
              <li><a href="javascript:void(0)" class="left_menu1 ">
                  <div class="pic"><img src="images/m1.png" /></div>
                  快速選單
                </a></li>
              <li><a href="javascript:void(0)" class="left_menu2 ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  基本圖層
                </a></li>
            </ul>
          </li>
          <li class="active"><a href="#" class="m2"><img src="images/icons/btn-icon02a.png" />即時水情看板<span>Instant board</span></a>
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
              <li><a href="./WaterBalance.php" class="active">
                  <div class="pic"><img src="images/m1.png" /></div>
                  供水平衡圖
                </a></li>
              <li><a href="./WaterSanxia.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  原水三峽河
                </a></li>
              <li><a href="./WaterYushan.php" class=" ">
                  <div class="pic"><img src="images/m1.png" /></div>
                  原水鳶山堰
                </a></li>
              <li><a href="./WaterBanxin.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  板新導水
                </a></li>
              <li><a href="./WaterBanxinScr.php" class=" ">
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
              <li><a href="./WaterLevel.php" class=" ">
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
          <li class=""><a href="javascript:void(0);" class="m3"><img src="images/icons/btn-icon03a.png" />監控系統資訊<span>Monitoring system</span></a>
            <ul class="child_menu" style="">
              <li><a href="./DataQuery.php" class="">
                  <div class="pic"><img src="images/m1.png" /></div>
                  數值查詢
                </a></li>
              <li><a href="./DataPicture.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  即時圖控
                </a></li>
              <li><a href="./DataCCTV.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  即時影像
                </a></li>
              <li><a href="./DataReport.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  日常報表
                </a></li>
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
          <li><a href="javascript:void(0);" class="m4"><img src="images/icons/btn-icon04a.png" />綜合資訊<span>Comprehensive</span></a>
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
          <li class=""><a href="./rowmap.php" class="m4"><img src="images/icons/btn-icon04a.png" />網站地圖<span>Row Map</span></a></li>
        </ul>
      </nav>
      <!-- main_menu [end] -->
    </div>
  </header>

  <div class="balaImg">
   <div id="mappingConte">
   <h6 id="last_dataTime" style="postion: relative; width: 100%; text-align:right; margin: 0; top: 20px;">UpdateTime</h6>
      <img src="images/Dashboard/waterBalance.png" style="width:100%;">
      <div class="setposition">
        <div class="y1-1 x1-1"><span>中庄調整池</span><span>開度</span><input type="text" readonly></div>
      </div>
      <div class="setposition">
        <div class="y2-1 x1-2"><span>鳶山堰取水站</span><span>供水量(瞬間流量)</span><input type="text" readonly></div>
        <div class="y3-1 x1-2"><span>鳶山堰取水站</span><span>供水量(昨日瞬間流量)</span><input type="text" readonly></div>
      </div>
      <div class="setposition">
        <div class="y4-1 x1-2"><span>三峽河取水站</span><span>供水量(瞬間流量)</span><input type="text" readonly></div>
        <div class="y5-1 x1-2"><span>三峽河取水站</span><span>供水量(昨日瞬間流量)</span><input type="text" readonly></div>
      </div>
      <div class="setposition">
        <div class="y6-1 x1-1"><span>三峽河取水站</span><span>水位</span><input type="text" readonly></div>
      </div>
      <div class="setposition">
        <div class="y1-2 x2-1"><span>北水處</span><span>供水量(瞬間流量)</span><input type="text" readonly></div>
        <div class="y2-2 x2-1"><span>北水處</span><span>供水量(昨日瞬間流量)</span><input type="text" readonly></div>
      </div>
      <div class="setposition">
        <div class="y3-2 x2-2"><span>板新出水量</span><span>出水量(瞬間流量)</span><input type="text" readonly></div>
        <div class="y4-2 x2-2"><span>板新出水量</span><span>出水量(昨日瞬間流量)</span><input type="text" readonly></div>
      </div>
      <div class="setposition">
        <div class="y5-2 x2-2"><span>泰山原水取水站</span><span>供水量(瞬間流量)</span><input type="text" readonly></div>
        <div class="y6-2 x2-2"><span>泰山原水取水站</span><span>供水量(昨日瞬間流量)</span><input type="text" readonly></div>
      </div>
      <div class="setposition">
        <div class="y7-2 x2-2"><span>12區管理處</span><span>總出水量(瞬間流量)</span><input type="text" readonly></div>
        <div class="y8-2 x2-2"><span>12區管理處</span><span>總出水量(昨日瞬間流量)</span><input type="text" readonly></div>
      </div>
      <div class="setposition">
        <div class="y1-3 x3-1"><span>12區管理處</span><span>總支援量(瞬間流量)</span><input type="text" readonly></div>
        <div class="y2-3 x3-1"><span>12區管理處</span><span>總支援量(昨日瞬間流量)</span><input type="text" readonly></div>
      </div>
      <div class="setposition">
        <div class="y3-3 x3-1"><span>12區管理處</span><span>總受援量(瞬間流量)</span><input type="text" readonly></div>
        <div class="y4-3 x3-1"><span>12區管理處</span><span>總受援量(昨日瞬間流量)</span><input type="text" readonly></div>
      </div>
      <div class="setposition">
        <div class="y5-3 x3-1"><span>12區管理處</span><span>總供水量(瞬間流量)</span><input type="text" readonly></div>
        <div class="y6-3 x3-1"><span>12區管理處</span><span>總供水量(昨日瞬間流量)</span><input type="text" readonly></div>
      </div>
      <div class="setposition">
        <div class="y7-3 x4-1"><span>受2區支援</span><span>供水量(瞬間流量)</span><input type="text" readonly></div>
      </div>
      <div class="setposition">
        <div class="y8-3 x3-8"><span>2區供水量</span><span>供水量(瞬間流量)</span><input type="text" readonly></div>
        <div class="y9-3 x3-8"><span>2區供水量</span><span>供水量(昨日瞬間流量)</span><input type="text" readonly></div>
      </div>
      <div class="setposition">
        <div class="y10-3 x4-1"><span>支援2區</span><span>供水量(瞬間流量)</span><input type="text" readonly></div>
      </div>
    </div>
  </div>
    <input id="section_" type="hidden" placeholder="section" value="全區供水調配">
    <input id="item_" type="hidden" placeholder="item" value="2">
    <!--
        <div class="Nam_blan_1">
      
      </div>
-->
    <?php include_once "./php/footer.php";?>

    <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>

    <script type="text/javascript" src="./js/bootstrap-slider.min.js"></script>
    <script type="text/javascript" src="./js/nicescroll.js"></script>
    <script type="text/javascript" src="./js/script.js"></script>

    <!-- <script src="js/owlcarousel/owl.carousel.js"></script> -->
    <!--  -->
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.common-nova.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.nova.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.nova.mobile.min.css" />
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>

    <!--        <script type="text/javascript"> var jQuery1123 = $.noConflict(true); </script> -->

    <!-- <script src="https://kendo.cdn.telerik.com/2019.2.514/js/kendo.all.min.js"></script> -->
    <script src="./js/kendo.all.js"></script>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.common.min.css">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.rtl.min.css">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.default.min.css">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.mobile.all.min.css">
    <script src="https://kendo.cdn.telerik.com/2019.2.514/js/angular.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2019.2.514/js/jszip.min.js"></script>
    <script src="./js/waterBalance.js"></script>
    <!--  -->
    <script language="javascript">
      $(".pos_right > span").text("<?php echo $nam?>");    
      $("input[name=idn]").val("<?php echo $id?>");
      var idn = $("input[name=idn]").val();
              

     
      //禁止ctrl+滾輪
      var scrollFunc = function(e) {
        e = e || window.event;
        if (e.wheelDelta && event.ctrlKey) { //IE/Opera/Chrome
          event.returnValue = false;
        } else if (e.detail) { //Firefox
          event.returnValue = false;
        }
      }
      if (document.addEventListener) {
        document.addEventListener('DOMMouseScroll', scrollFunc, false);
      } //W3C
      window.onmousewheel = document.onmousewheel = scrollFunc; //IE/Opera/Chrome/Safari

    </script>
     
<!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
