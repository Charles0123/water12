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
  <title>儀表板 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" />
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css"/>

  <link rel="stylesheet" href="css/kendoUI.css" type="text/css" />
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css" />
  <!-- <link rel="stylesheet" href="css/WaterBanxin.css" /> -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="css/WaterDashboard.css" />
  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>
  <script type="text/javascript" src="js/gen.js"></script>
  <script type="text/javascript" src="js/DisasterInfo.js"></script>
  <script src="./js/parameter_def.js"></script>
  <script src="./js/script_inner.js"></script>
<!--  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>-->
<!--  <script src="searchbase-new.js"></script>-->
   
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2020.1.406/styles/kendo.default-v2.min.css" />

  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.3.917/styles/kendo.common.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.3.917/styles/kendo.rtl.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.3.917/styles/kendo.default.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.3.917/styles/kendo.mobile.all.min.css">
<style>
  
  .swiper-container {
      width: 100%;
/*      height: 100%;*/
    }

  .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;

    /* Center slide text vertically */
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
  }
  .board3 {
    height: 30vh;
  }

</style>
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
    <div class="mobile_mask" style="display:block"><i class="fa fa-spinner fa-pulse fa-4x fa-fw" style="color: #33b9ff; margin: 20% auto; width: 100%; margin-top: calc(100vh - 50vh);"></i></div>
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
              <li><a href="javascript:void(0)" class="active" onclick="console.log($(this).next('.show_popinfo').fadeToggle('fast'))">
                  <div class="pic"><img src="images/m2.png" /></div>
                  儀表板
                </a>
                <div class="show_popinfo" style="width:180px">
                  <a  href="./DashboardSupply.php">全區供水<div class="pic"><img src="images/m2.png" /></div></a>
                  <a class="active" href="./DashboardPull.php">原水資訊<div class="pic"><img src="images/m2.png" /></div></a>
                  <a href="./DashboardWell.php">板新淨水資訊<div class="pic"><img src="images/m2.png" /></div></a>
                </div>
              </li>
              <li><a href="./WaterBalance.php" class="">
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
  <div id="dsr_Info" class="container1">
    <div class="contan">

      <div class="wrap">

        <div class="range">
          <div class="tit">
            <h5>原水資訊</h5>
          </div>
          <div class="board1"><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
            <!--chart6-->
            <div id="chartdiv6"></div>
          </div>
          <div class="board">
            <div class="tit1">
              <h6>馬達狀況</h6><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
            <a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
            <div id="RawWater" class="outside">
              <div class="left">
                <h6>三峽河馬達狀況</h6><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
                <div class="circle gray-light"><span>三峽河抽水機#1</span><span class="bian">360HP</span></div>
                <div class="circle gray-light"><span>三峽河抽水機#2</span><span>360HP</span></div>
                <div class="circle"><span>三峽河抽水機#3</span><span>360HP</span></div>
                <div class="circle"><span>三峽河抽水機#4</span><span>360HP</span></div>
                <div class="circle"><span>三峽河抽水機#5</span><span>360HP</span></div>
                <div class="circle gray-light"><span>三峽河抽水機#6</span><span>360HP</span></div>
                <div class="circle "><span>三峽河抽水機#7</span><span>360HP</span></div>
              </div>
              <div class="left">
                <h6>鷲山堰馬達狀況</h6><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
                <div class="circle"><span>鳶山堰抽水機#1</span><span>200HP</span></div>
                <div class="circle"><span>鳶山堰抽水機#2</span><span>200HP</span></div>
                <div class="circle"><span>鳶山堰抽水機#3</span><span>200HP</span></div>
                <div class="circle"><span>鳶山堰抽水機#4</span><span>400HP</span></div>
                <div class="circle"><span>鳶山堰抽水機#5</span><span>400HP</span></div>
                <div class="circle gray-light"><span>鳶山堰抽水機#6</span><span>400HP</span></div>
              </div>
            </div>
          </div>
          <div class="board2">
            <div class="tit1">
              <h6>水位資訊</h6><a href="javascript:void(0)"></a>
            </div>
            <a href="javascript:void(0)"></a>
            <div id="chartdiv7"></div>
          </div>
          <div class="board3">
            <div class="tit1 rainfall">
              <h6 style="color:#fff;">降雨資訊</h6><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
            <a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
            <div id="chartdiv10" class="weather">
              <div class="top">
                <div class="txt">
                  <div id="date"></div>
                  <div id="time"></div>
                </div>
              </div>
              <div class="swiper-container">
                <div id="weathBlock" class="swiper-wrapper" >
                  <div class="swiper-slide" style="background-color: transparent"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="board3">
            <div class="tit1 earthquake">
              <h6 style="color:#fff;">地震資訊</h6><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
            <a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
            <div class="quake">
              <div class="top">
                <div class="txt">
                  <div id="date1"></div>
                  <div id="time1"></div>
                  
                </div>                
              </div>
              <div class="swiper-container1">
                <div id="weathBlock" class="swiper-wrapper">
                  <div class="swiper-slide" style="background-color: transparent"></div>
                </div>
              </div>
            </div>
          </div>
          
        </div>

      </div>
    </div>
  </div>
  <?php include_once "./php/footer.php";?>

<!--  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>-->

  <script type="text/javascript" src="./js/bootstrap-slider.min.js"></script>
  <script type="text/javascript" src="./js/nicescroll.js" defer></script>
  <script type="text/javascript" src="./js/script.js" defer></script>
  <script src="./js/moment.min.js"></script>
  <script src="./js/moment-with-locales.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
  <script src="js/core.js"></script>
  <script src="js/charts.js"></script><!-- amchart -->
  <script src="js/animated.js"></script><!-- amchart -->
  <script src="js/echarts.js"></script><!-- amchart -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts.min.js"></script> -->
  <script src="js/echarts-liquidfill.js" ></script>
  <script src="js/WaterDashboard.js"></script>
<!--  <script src="./js/waterBalance.js"></script>-->
  <script src="./js/jquery-ui.js"></script>
  <script src="./jquery/jquery.ui.touch-punch.js"></script>
<script src="https://kendo.cdn.telerik.com/2019.3.917/js/kendo.all.min.js" async></script>
<!--<script src="https://kendo.cdn.telerik.com/2019.3.917/js/angular.min.js" defer></script>-->
<script src="https://kendo.cdn.telerik.com/2019.3.917/js/jszip.min.js" defer></script>

  <!--  -->
  <script language="javascript" defer> 
    var swiper = new Swiper('.swiper-container',{
      autoplay: { delay: 1000, },
      speed: 500,
    });
    var swiper1 = new Swiper('.swiper-container1',{
      autoplay: { delay: 1000, },
      speed: 500,
    });

    
    $( document ).tooltip({track: true});
    $( document ).ready(function() { 
      setTimeout(function() {
        $("#chartdiv1s > div:nth-child(2) > svg > g > g:nth-child(2) > g:nth-child(2) > g > g:nth-child(3)").remove();

      }, 10);
      var wdth = $(window).width()/2;
      $(".mobile_mask").css({display:"none"});
      $( "#dialog-message" ).dialog({
          modal: true,
          autoOpen: false, 
          width: wdth,
        });
      $( ".editchartdiv2 i" ).click(function(e) {
        var nm = $(e)[0].target.className; 
        open_favor(e, nm);
        if((nm == "fa fa-heart-o") || (nm == "fa fa-heart"))
          $( "#dialog-message" ).dialog( "option", "title", "查看我的最愛" );
        if(nm == "fa fa-folder-open-o") 
          $( "#dialog-message" ).dialog( "option", "title", "選擇場站" );
        $( "#dialog-message" ).dialog( "open" );
      });
      
    });
    $(document).ready(function(){
      $(".down").mouseover(function(){
        swiper.autoplay.stop();
      });
      $(".down").mouseout(function(){
        swiper.autoplay.start();
      });
      
    });
    $(".pos_right > span").text("<?php echo $nam?>");
    $("input[name=idn]").val("<?php echo $id?>");
    var idn = $("input[name=idn]").val();
    var getData = [];
    var xxx = 0;
    getbashboardData("全區供水調配", 2);
    //        window.setInterval(temp, 3000);
    
    var findIndexofkeywd = [];
    function getbashboardData(str, no) {    
      xxx += 1;
      $.ajax({
        url: "http://220.134.42.63:8080/WaterscadaAPI/WI_ItemData?section=" + str + "&item=" + no,
        type: "GET",
        dataType: "json",
        success: function(Jdata) {
          $.each(Jdata, function(index, d) {
            getData.push(d);
          });
          var getkeyword = compareString("12區管理處", getData);
          //                 console.log(getkeyword[0].TOOLTIPS);
          console.log(xxx);
          $("#District12_1").val(getkeyword[0].TOOLTIPS);
          //                 console.log(getData[1][0].STATION_ID);
        },
        error: function() {
          console.log("get json fail");
        }
      });
    }
    function compareString(str, getdata) {
      var keyword = str;
      $.each(getdata[1], function(v, x) {
        if (x.STATION_ID == keyword) {
          findIndexofkeywd.push(getdata[1][v]);
        }
      });
      //       console.log(findIndexofkeywd);
      return findIndexofkeywd;
    }
    
    /*3階*/
    var y = 0;   
    /*setting weather API */
    //縣市天氣資料
    var weatherUrlSrc = 'https://opendata.cwb.gov.tw/api/v1/';
    var token_ = "CWB-F2C12809-313E-4E17-AC4C-623900AE2196";
    var WxAssingSvg = {
      '晴時': '<svg class="sunshine" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"><path class="sun-full" d="M256,144c-61.8,0-112,50.2-112,112s50.2,112,112,112s112-50.2,112-112S317.8,144,256,144z M256,336c-44.2,0-80-35.8-80-80s35.8-80,80-80s80,35.8,80,80S300.2,336,256,336z" /><path class="sun-ray-eight" d="M131.6,357.8l-22.6,22.6c-6.2,6.2-6.2,16.4,0,22.6s16.4,6.2,22.6,0l22.6-22.6c6.2-6.3,6.2-16.4,0-22.6C147.9,351.6,137.8,351.6,131.6,357.8z" /><path class="sun-ray-seven" d="M256,400c-8.8,0-16,7.2-16,16v32c0,8.8,7.2,16,16,16s16-7.2,16-16v-32C272,407.2,264.8,400,256,400z" /><path class="sun-ray-six" d="M380.5,357.8c-6.3-6.2-16.4-6.2-22.6,0c-6.3,6.2-6.3,16.4,0,22.6l22.6,22.6c6.2,6.2,16.4,6.2,22.6,0s6.2-16.4,0-22.6L380.5,357.8z" /><path class="sun-ray-five" d="M448,240h-32c-8.8,0-16,7.2-16,16s7.2,16,16,16h32c8.8,0,16-7.2,16-16S456.8,240,448,240z" /><path class="sun-ray-four" d="M380.4,154.2l22.6-22.6c6.2-6.2,6.2-16.4,0-22.6s-16.4-6.2-22.6,0l-22.6,22.6c-6.2,6.2-6.2,16.4,0,22.6C364.1,160.4,374.2,160.4,380.4,154.2z" /><path class="sun-ray-three" d="M256,112c8.8,0,16-7.2,16-16V64c0-8.8-7.2-16-16-16s-16,7.2-16,16v32C240,104.8,247.2,112,256,112z" /><path class="sun-ray-two" d="M131.5,154.2c6.3,6.2,16.4,6.2,22.6,0c6.3-6.2,6.3-16.4,0-22.6l-22.6-22.6c-6.2-6.2-16.4-6.2-22.6,0c-6.2,6.2-6.2,16.4,0,22.6L131.5,154.2z" /><path class="sun-ray-one" d="M112,256c0-8.8-7.2-16-16-16H64c-8.8,0-16,7.2-16,16s7.2,16,16,16h32C104.8,272,112,264.8,112,256z" /></svg>',
      '晴時多雲': '<svg class="sun-cloud" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"><path class="sun-half" d="M127.8,259.1c3.1-4.3,6.5-8.4,10-12.3c-6-11.2-9.4-24-9.4-37.7c0-44.1,35.7-79.8,79.8-79.8c40,0,73.1,29.4,78.9,67.7c11.4,2.3,22.4,5.7,32.9,10.4c-0.4-29.2-12-56.6-32.7-77.3C266.1,109,238,97.4,208.2,97.4c-29.9,0-57.9,11.6-79.1,32.8c-21.1,21.1-32.8,49.2-32.8,79.1c0,17.2,3.9,33.9,11.2,48.9c1.5-0.1,3-0.1,4.4-0.1C117.3,258,122.6,258.4,127.8,259.1z" /><path class="cloud" d="M400,256c-5.3,0-10.6,0.4-15.8,1.1c-16.8-22.8-39-40.5-64.2-51.7c-10.5-4.6-21.5-8.1-32.9-10.4c-10.1-2-20.5-3.1-31.1-3.1c-45.8,0-88.4,19.6-118.2,52.9c-3.5,3.9-6.9,8-10,12.3c-5.2-0.8-10.5-1.1-15.8-1.1c-1.5,0-3,0-4.4,0.1C47.9,258.4,0,307.7,0,368c0,61.8,50.2,112,112,112c13.7,0,27.1-2.5,39.7-7.3c29,25.2,65.8,39.3,104.3,39.3c38.5,0,75.3-14.1,104.3-39.3c12.6,4.8,26,7.3,39.7,7.3c61.8,0,112-50.2,112-112S461.8,256,400,256z M400,448c-17.1,0-32.9-5.5-45.9-14.7C330.6,461.6,295.6,480,256,480c-39.6,0-74.6-18.4-98.1-46.7c-13,9.2-28.8,14.7-45.9,14.7c-44.2,0-80-35.8-80-80s35.8-80,80-80c7.8,0,15.4,1.2,22.5,3.3c2.7,0.8,5.4,1.7,8,2.8c4.5-8.7,9.9-16.9,16.2-24.4C182,241.9,216.8,224,256,224c10.1,0,20,1.2,29.4,3.5c10.6,2.5,20.7,6.4,30.1,11.4c23.2,12.4,42.1,31.8,54.1,55.2c9.4-3.9,19.7-6.1,30.5-6.1c44.2,0,80,35.8,80,80S444.2,448,400,448z" /><path class="ray ray-one" d="M16,224h32c8.8,0,16-7.2,16-16s-7.2-16-16-16H16c-8.8,0-16,7.2-16,16S7.2,224,16,224z" /><path class="ray ray-two" d="M83.5,106.2c6.3,6.2,16.4,6.2,22.6,0c6.3-6.2,6.3-16.4,0-22.6L83.5,60.9c-6.2-6.2-16.4-6.2-22.6,0c-6.2,6.2-6.2,16.4,0,22.6L83.5,106.2z" /><path class="ray ray-three" d="M208,64c8.8,0,16-7.2,16-16V16c0-8.8-7.2-16-16-16s-16,7.2-16,16v32C192,56.8,199.2,64,208,64z" /><path class="ray ray-four" d="M332.4,106.2l22.6-22.6c6.2-6.2,6.2-16.4,0-22.6c-6.2-6.2-16.4-6.2-22.6,0l-22.6,22.6c-6.2,6.2-6.2,16.4,0,22.6S326.2,112.4,332.4,106.2z" /><path class="ray ray-five" d="M352,208c0,8.8,7.2,16,16,16h32c8.8,0,16-7.2,16-16s-7.2-16-16-16h-32C359.2,192,352,199.2,352,208z" /></svg>',
      '多雲時晴': '<svg class="sun-cloud" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"><path class="sun-half" d="M127.8,259.1c3.1-4.3,6.5-8.4,10-12.3c-6-11.2-9.4-24-9.4-37.7c0-44.1,35.7-79.8,79.8-79.8c40,0,73.1,29.4,78.9,67.7c11.4,2.3,22.4,5.7,32.9,10.4c-0.4-29.2-12-56.6-32.7-77.3C266.1,109,238,97.4,208.2,97.4c-29.9,0-57.9,11.6-79.1,32.8c-21.1,21.1-32.8,49.2-32.8,79.1c0,17.2,3.9,33.9,11.2,48.9c1.5-0.1,3-0.1,4.4-0.1C117.3,258,122.6,258.4,127.8,259.1z" /><path class="cloud" d="M400,256c-5.3,0-10.6,0.4-15.8,1.1c-16.8-22.8-39-40.5-64.2-51.7c-10.5-4.6-21.5-8.1-32.9-10.4c-10.1-2-20.5-3.1-31.1-3.1c-45.8,0-88.4,19.6-118.2,52.9c-3.5,3.9-6.9,8-10,12.3c-5.2-0.8-10.5-1.1-15.8-1.1c-1.5,0-3,0-4.4,0.1C47.9,258.4,0,307.7,0,368c0,61.8,50.2,112,112,112c13.7,0,27.1-2.5,39.7-7.3c29,25.2,65.8,39.3,104.3,39.3c38.5,0,75.3-14.1,104.3-39.3c12.6,4.8,26,7.3,39.7,7.3c61.8,0,112-50.2,112-112S461.8,256,400,256z M400,448c-17.1,0-32.9-5.5-45.9-14.7C330.6,461.6,295.6,480,256,480c-39.6,0-74.6-18.4-98.1-46.7c-13,9.2-28.8,14.7-45.9,14.7c-44.2,0-80-35.8-80-80s35.8-80,80-80c7.8,0,15.4,1.2,22.5,3.3c2.7,0.8,5.4,1.7,8,2.8c4.5-8.7,9.9-16.9,16.2-24.4C182,241.9,216.8,224,256,224c10.1,0,20,1.2,29.4,3.5c10.6,2.5,20.7,6.4,30.1,11.4c23.2,12.4,42.1,31.8,54.1,55.2c9.4-3.9,19.7-6.1,30.5-6.1c44.2,0,80,35.8,80,80S444.2,448,400,448z" /><path class="ray ray-one" d="M16,224h32c8.8,0,16-7.2,16-16s-7.2-16-16-16H16c-8.8,0-16,7.2-16,16S7.2,224,16,224z" /><path class="ray ray-two" d="M83.5,106.2c6.3,6.2,16.4,6.2,22.6,0c6.3-6.2,6.3-16.4,0-22.6L83.5,60.9c-6.2-6.2-16.4-6.2-22.6,0c-6.2,6.2-6.2,16.4,0,22.6L83.5,106.2z" /><path class="ray ray-three" d="M208,64c8.8,0,16-7.2,16-16V16c0-8.8-7.2-16-16-16s-16,7.2-16,16v32C192,56.8,199.2,64,208,64z" /><path class="ray ray-four" d="M332.4,106.2l22.6-22.6c6.2-6.2,6.2-16.4,0-22.6c-6.2-6.2-16.4-6.2-22.6,0l-22.6,22.6c-6.2,6.2-6.2,16.4,0,22.6S326.2,112.4,332.4,106.2z" /><path class="ray ray-five" d="M352,208c0,8.8,7.2,16,16,16h32c8.8,0,16-7.2,16-16s-7.2-16-16-16h-32C359.2,192,352,199.2,352,208z" /></svg>',
      '多雲': '<svg class="rain-cloud" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"><path class="raindrop-one" d="M96,384c0,17.7,14.3,32,32,32s32-14.3,32-32s-32-64-32-64S96,366.3,96,384z" /><path class="raindrop-two" d="M225,480c0,17.7,14.3,32,32,32s32-14.3,32-32s-32-64-32-64S225,462.3,225,480z" /><path class="raindrop-three" d="M352,448c0,17.7,14.3,32,32,32s32-14.3,32-32s-32-64-32-64S352,430.3,352,448z" /><path d="M400,64c-5.3,0-10.6,0.4-15.8,1.1C354.3,24.4,307.2,0,256,0s-98.3,24.4-128.2,65.1c-5.2-0.8-10.5-1.1-15.8-1.1C50.2,64,0,114.2,0,176s50.2,112,112,112c13.7,0,27.1-2.5,39.7-7.3c29,25.2,65.8,39.3,104.3,39.3c38.5,0,75.3-14.1,104.3-39.3c12.6,4.8,26,7.3,39.7,7.3c61.8,0,112-50.2,112-112S461.8,64,400,64z M400,256c-17.1,0-32.9-5.5-45.9-14.7C330.6,269.6,295.6,288,256,288c-39.6,0-74.6-18.4-98.1-46.7c-13,9.2-28.8,14.7-45.9,14.7c-44.2,0-80-35.8-80-80s35.8-80,80-80c10.8,0,21.1,2.2,30.4,6.1C163.7,60.7,206.3,32,256,32s92.3,28.7,113.5,70.1c9.4-3.9,19.7-6.1,30.5-6.1c44.2,0,80,35.8,80,80S444.2,256,400,256z" /></svg>',
      '多雲時陰短暫雨': '<svg class="rain-cloud" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"><path class="raindrop-one" d="M96,384c0,17.7,14.3,32,32,32s32-14.3,32-32s-32-64-32-64S96,366.3,96,384z" /><path class="raindrop-two" d="M225,480c0,17.7,14.3,32,32,32s32-14.3,32-32s-32-64-32-64S225,462.3,225,480z" /><path class="raindrop-three" d="M352,448c0,17.7,14.3,32,32,32s32-14.3,32-32s-32-64-32-64S352,430.3,352,448z" /><path d="M400,64c-5.3,0-10.6,0.4-15.8,1.1C354.3,24.4,307.2,0,256,0s-98.3,24.4-128.2,65.1c-5.2-0.8-10.5-1.1-15.8-1.1C50.2,64,0,114.2,0,176s50.2,112,112,112c13.7,0,27.1-2.5,39.7-7.3c29,25.2,65.8,39.3,104.3,39.3c38.5,0,75.3-14.1,104.3-39.3c12.6,4.8,26,7.3,39.7,7.3c61.8,0,112-50.2,112-112S461.8,64,400,64z M400,256c-17.1,0-32.9-5.5-45.9-14.7C330.6,269.6,295.6,288,256,288c-39.6,0-74.6-18.4-98.1-46.7c-13,9.2-28.8,14.7-45.9,14.7c-44.2,0-80-35.8-80-80s35.8-80,80-80c10.8,0,21.1,2.2,30.4,6.1C163.7,60.7,206.3,32,256,32s92.3,28.7,113.5,70.1c9.4-3.9,19.7-6.1,30.5-6.1c44.2,0,80,35.8,80,80S444.2,256,400,256z" /></svg>',
      '陰天': '<svg class="cloud" title="陰天" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"><path d="M400,64c-5.3,0-10.6,0.4-15.8,1.1C354.3,24.4,307.2,0,256,0s-98.3,24.4-128.2,65.1c-5.2-0.8-10.5-1.1-15.8-1.1C50.2,64,0,114.2,0,176s50.2,112,112,112c13.7,0,27.1-2.5,39.7-7.3c29,25.2,65.8,39.3,104.3,39.3c38.5,0,75.3-14.1,104.3-39.3c12.6,4.8,26,7.3,39.7,7.3c61.8,0,112-50.2,112-112S461.8,64,400,64z M400,256c-17.1,0-32.9-5.5-45.9-14.7C330.6,269.6,295.6,288,256,288c-39.6,0-74.6-18.4-98.1-46.7c-13,9.2-28.8,14.7-45.9,14.7c-44.2,0-80-35.8-80-80s35.8-80,80-80c10.8,0,21.1,2.2,30.4,6.1C163.7,60.7,206.3,32,256,32s92.3,28.7,113.5,70.1c9.4-3.9,19.7-6.1,30.5-6.1c44.2,0,80,35.8,80,80S444.2,256,400,256z" /></svg>'
    };
    function filterItems(query) {
      return getOpnDatWetr.filter(function(el) {
        return el.toLowerCase().indexOf(query.toLowerCase()) > -1;
      })
    };
    function getWeatherJson(url) {
      var getData = [];
      $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        async: false,
        success: function(Jdata) {
          $.each(Jdata, function(index, d) {
            getData.push(d);
          });
          console.log(getData);
        },
        error: function() {
          console.log("get json fail");
        }
      });
      return getData;
    };    
    function getOpenDataWeather() {
      var url_ = weatherUrlSrc + 'rest/dataset';
      var result = [
        "F-A0021-001",
        "F-C0032-001",
        "O-A0017-001",
        "O-A0018-001",
        "O-A0019-001",
        "C-B0025-001",
        "O-A0001-001",
        "O-A0002-001",
        "O-A0003-001",
        "O-A0004-001",
        "O-A0005-001",
        "O-A0006-001",
        "O-A0006-002",
        "F-D0047-001",
        "F-D0047-003",
        "F-D0047-005",
        "F-D0047-007",
        "F-D0047-009",
        "F-D0047-011",
        "F-D0047-013",
        "F-D0047-015",
        "F-D0047-017",
        "F-D0047-019",
        "F-D0047-021",
        "F-D0047-023",
        "F-D0047-025",
        "F-D0047-027",
        "F-D0047-029",
        "F-D0047-031",
        "F-D0047-033",
        "F-D0047-035",
        "F-D0047-037",
        "F-D0047-039",
        "F-D0047-041",
        "F-D0047-043",
        "F-D0047-045",
        "F-D0047-047",
        "F-D0047-049",
        "F-D0047-051",
        "F-D0047-053",
        "F-D0047-055",
        "F-D0047-057",
        "F-D0047-059",
        "F-D0047-061",
        "F-D0047-063",
        "F-D0047-065",
        "F-D0047-067",
        "F-D0047-069",
        "F-D0047-071",
        "F-D0047-073",
        "F-D0047-075",
        "F-D0047-077",
        "F-D0047-079",
        "F-D0047-081",
        "F-D0047-083",
        "F-D0047-085",
        "F-D0047-087",
        "F-D0047-089",
        "F-D0047-091",
        "F-D0047-093",
        "W-C0033-001",
        "W-C0033-002",
        "E-A0014-001",
        "E-A0015-001",
        "E-A0016-001"
      ];
      return result;
    };
    
    //get initial value of open data
    var getOpnDatWetr = getOpenDataWeather();

    //縣市天氣資料
    function getLocatWeather() {
      var resourceId = "F-C0032-001";
      var elementName = "Wx";
      var locationName = "臺北市,新北市,桃園市";
      var url_ = weatherUrlSrc + 'rest/datastore/' + resourceId + '?Authorization=' + token_ + '&format=JSON&locationName=' + locationName + '&elementName=' + elementName;
      var compsData = getWeatherJson(url_);
//      var putDataToHtml_ = putDataToHtml(compsData);
      console.log(compsData);
    };
    //搜尋文字功能
    function searchKeywrd(string, keyWord){
      return string.search(keyWord) != -1 ? true:false;
    }
    //在字串中取出數字  
    function getNum(text) {
      var value = text.replace(/[^0-9]/ig, "");
      return value;
    }
    //在字串中取出中文字  
    function getBig5(text) {
      var value = text.replace(/[^\u4e00-\u9fa5]/ig, "");
      return value;
    }    
    // 在字串中取出特殊字符1
    function getsymbol(text) {
      var value = text.replace(/[^\@\#\$\%\^\&\*\(\)\{\}\:\"\L\<\>\?\[\]]/ig,"");
      return value;
    }
    // 去掉特殊字符2　
    function getdossymbol(text) {
      var value = text.replace(/[\'\"\\\/\b\f\n\r\t]/ig, "");
      return value;
    }
    //去掉中文字 
    function moveBig5(text) {
      var value = text.replace(/[\u4e00-\u9fa5]/ig, "");
      return value;
    }

    //鄉鎮天氣資料
    var ShowTWloact;
    var pause = false;
    function putDataToHtml(aData) {
      debugger;
      swiper.removeAllSlides();
      var temper = [];
      for (var x = 0; x < aData.length; x++) {
        var max = 0;
        var aDatakey = Object.keys(aData[x])[0];
        //            console.log(aData);
        //            console.log(aData[x][aDatakey]);
        var locationsName_ = aData[x][aDatakey]['locationsName'] + "降雨資訊";
        var dataid_ = aData[x][aDatakey]['dataid'];
        var result_ = aData[x][aDatakey]['result'];
        var location = [], weather = [], rain = [];
        console.log(result_);
        var xx =0, yy = 0;
        for (var key in result_) {          
          location.push(key);
          if(result_[key].split("。")[0].indexOf("雨") >= 0) 
            weather.push('多雲時陰短暫雨');
          else
            weather.push(result_[key].split("。")[0]);
          
          rain.push(result_[key].split("。")[1].split(" ")[1]);
          var split_ = result_[key].split("。")[2].split("至");
          var TL_ = parseInt(getNum(split_[0]));
          var TH_ = parseInt(getNum(split_[1]));
          temper.push(TL_ + "-" + TH_ + "℃");
          if(xx % 4 == 0){
            yy+=1;
            swiper.appendSlide('<div id="swiper_'+x+"_"+yy+'" class="swiper-slide"  style="border-left:4px solid #03A9F4;"></div>');
          }
          $('#swiper_'+x+"_"+yy).append("<div class='down'><div class='degree active' style='animation-iteration-count:1' data-locationsName=" + locationsName_ + "><div class='city' data-dataid='" + dataid_+"'>" + location[xx] + "</div><div><span class='icon'>" + WxAssingSvg[weather[xx]] + "</span></br><span class='temp temperature'>" + temper[xx] + "</span></div><div><span class='rain'><span class='sr-only'>降雨機率</span><i class='fa fa-tint'></i> " + rain[xx] + "</span></div></div></div>");  
          xx +=1;
        }
        console.log(weather);
      }     
    };    
    function getDistricWeather() {
      var newData = [];
      var even = ["F-D0047-071","F-D0047-063","F-D0047-007"];
      var locatId = {};
      for (var x = 0; x < even.length; x++) {
        var elementName = "WeatherDescription";
        //參考: https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-061?Authorization=CWB-F2C12809-313E-4E17-AC4C-623900AE2196&format=JSON&elementName=WeatherDescription,&sort=time
        var url_ = weatherUrlSrc + 'rest/datastore/' + even[x] + '?Authorization=' + token_ + '&format=JSON&elementName=' + elementName + "&sort=time";
                      debugger;
        var xdata = getWeatherJson(url_);
        var temp1 = {},
          temp2 = {},
          temp = {};
        var conb_obj = {};
        var resource_id_ = xdata[1].resource_id;
        var dataid_ = xdata[2].locations[0].dataid;
        var locationsName_ = xdata[2].locations[0].locationsName;
        for (var y = 0; y < xdata[2].locations[0].location.length; y++) {
          var locationName_ = xdata[2].locations[0].location[y].locationName;
          var value_ = xdata[2].locations[0].location[y].weatherElement[0].time[0].elementValue[0].value;
          temp[locationName_] = value_;

        }
        temp2['dataid'] = dataid_;
        temp2['locationsName'] = locationsName_;
        temp2['result'] = temp;
        conb_obj = temp2;
        temp1[resource_id_] = conb_obj;
        newData.push(temp1);
      }
      console.log(newData);
      //            $("#weathBlock .degree").remove();
      var putDataToHtml_ = putDataToHtml(newData);
    };
    getDistricWeather();
    getLocatWeather();
    setInterval(function() {
      console.log("reload weatherData");
      clearInterval(ShowTWloact);
      getDistricWeather();
      getLocatWeather();
    }, 310000); //interval : 5 min
      
    
    
    //顯著有感地震報告資料-顯著有感地震報告
    var ShowTW_earthquake;
    var defshakingColor = [
      {OUT:'green' ,TW: '綠色',VALUE: 3.99},
      {OUT:'yellow',TW:'黃色' ,VALUE:4.01},
      {OUT:'orange',TW:'橙色' ,VALUE:5.01},
      {OUT:'red'   ,TW:'紅色' ,VALUE:6.01}
    ];
    function setearthquake(aData,head){
      swiper1.removeAllSlides();
      //aData[0] ="南投縣地區@南投縣@合歡山@2@級@green"
      //head = "2020-04-12 19:36:41@green@04/12-19:36臺灣東部海域發生規模5.3有感地震，最大震度花蓮縣太魯閣、花蓮縣花蓮市、宜蘭縣南澳、南投縣合歡山、臺東縣長濱、彰化縣員林、彰化縣彰化市、雲林縣古坑、雲林縣斗六市2級。"
      var temper = [];
      var yy = 0;
      for (var x = 0; x < aData.length; x++) {
        var max = 0;
        var locationsName_ = aData[x].split("@")[1] + "地震資訊";
        var dataid_ = aData[x].split("@")[2];
        var result_ = aData[x].split("@")[3];
        var unit = aData[x].split("@")[4];
        var wranglingColor = aData[x].split("@")[5];
        var location = [], weather = [], rain = [];
        console.log(aData[x]);
        if(x % 4 == 0){
          yy+=1;
          swiper1.appendSlide('<div id="swiper1_'+yy+'" class="swiper-slide" style="border-right:4px solid #03A9F4;"></div>');
        }
        $('#swiper1_'+yy).append("<div class='degree active' style='animation-iteration-count:1' data-locationsName=" + locationsName_ + "><div class='city' data-dataid='" + dataid_ + "'>" + dataid_ + "</div><div><img src='images/icons/earthquake.png' style='width:100px'/></br><span class='temp temperature' style='color:"+wranglingColor+"'> "+result_+" </span></div><div><span class='rain' style='color:"+wranglingColor+"'>" + unit + "</span></div></div>");
      }
    };
    function getEarthquake() {      
      var url_ = weatherUrlSrc + 'rest/datastore/E-A0015-001' + '?Authorization=' + token_ + '&areaName=%E8%87%BA%E5%8C%97%E5%B8%82,%E6%96%B0%E5%8C%97%E5%B8%82,%E6%A1%83%E5%9C%92%E5%B8%82';
      var getresult = [];
      var xdata = getWeatherJson(url_);    
      //互相轉換級數和(reportColor)對應的強度顏色
      var assignreportColor = function (data, datatype){
        var result_ = '';
        if(datatype == 'string')
          for(var x=0; x<defshakingColor.length; x++){
            if(defshakingColor[x].TW == data) {
              result_ = defshakingColor[x].OUT;
            }
          }
        if(datatype == 'number')
          result_ = defshakingColor[0].OUT;
          for(var x=0; x<defshakingColor.length; x++){
            if(data >= defshakingColor[x].VALUE) result_ = defshakingColor[x].OUT;            
          }
        return result_;
      };  
      var today=new Date();
      var currHours = today.getHours();
      var reportColor = assignreportColor(xdata[2].earthquake[0].reportColor, 'string');//green
      var originTime = xdata[2].earthquake[0].earthquakeInfo.originTime;//"2020-04-12 19:36:41"
        var months = "一月,二月,三月,四月,五月,六月,七月,八月,九月,十月,十一月,十二月".split(",");
        var weekdays = "星期日,星期一,星期二,星期三,星期四,星期五,星期六".split(",");
        var ampm = "AM,PM".split(",");
         var quakeT = originTime.split('-').slice(1).join('/').split(" ");
         $("#date1").text(quakeT[0] +" "+ weekdays[today.getDay()]);
         var ampm_;
         if(parseInt(currHours) > 12) ampm_ = ampm[1]; else ampm_ = ampm[0];
         $("#time1").text(quakeT[1]+ " ");
         $("#time1").append("<sup>"+ampm_+"</sup>");
      
//      $("#date1").text(originTime.split(" ")[0]);
//      $("#time1").text(originTime.split(" ")[1]);
      
      var intensity = xdata[2].earthquake[0].intensity;
      var reportContent = xdata[2].earthquake[0].reportContent;
      var headData = originTime +"@"+reportColor+"@"+reportContent;
      for(var x=0; x<intensity.shakingArea.length; x++){
        var areaDesc = intensity.shakingArea[x].areaDesc;//"花連第區"
        var areaName = intensity.shakingArea[x].areaName;//"花連市"
        
        for(var y=0; y<intensity.shakingArea[x].eqStation.length; y++){
          var stationName = intensity.shakingArea[x].eqStation[y].stationName;//"太魯閣"
          var stationIntensity = intensity.shakingArea[x].eqStation[y].stationIntensity.value;  //2        
          var shakingColor = assignreportColor(stationIntensity, 'number');//green
          var unit = intensity.shakingArea[x].eqStation[y].stationIntensity.unit;//級          
          var temp = areaDesc+"@"+areaName+"@"+stationName+"@"+stationIntensity+"@"+unit+"@"+shakingColor;
          getresult.push(temp);
        }
      }
      debugger;
      console.log(getresult);
      setearthquake(getresult,headData);
    };    
    getEarthquake();
    setInterval(function() {
      console.log("reload earthquake");
      clearInterval(ShowTW_earthquake);
      getEarthquake();
    }, 310000); //interval : 5min 
      
    //原水資訊-曲線
    //chartdiv6    
    var moto = [];
    function getlinedotchartData(option) {
      $("#chartdiv6").parent('div').find(".nodata").remove();
      var data_ = option;
      var url_ = [];
      var nowTime = moment().format();
      var newTime = moment().subtract(1, 'days').format();
      nowTime = nowTime.split("-").join("/").split("T").join(" ").split("+")[0];
      newTime = newTime.split("-").join("/").split("T").join(" ").split("+")[0]; 
      
      var idn = ["三峽河取水站","鳶山堰取水站"];
      url_[0] = "http://220.134.42.63:8080/waterscadaAPI/GetHistoryData?tag_id=瞬間流量&station_id=三峽河取水站&period=hour&start="+newTime+"&end="+nowTime+"&measure=*&include_yesterday=0&only_wi=1";
      url_[1] = "http://220.134.42.63:8080/waterscadaAPI/GetHistoryData?tag_id=瞬間流量&station_id=鳶山堰取水站&period=hour&start="+newTime+"&end="+nowTime+"&measure=*&include_yesterday=0&only_wi=1";

      var legend_ = [], flg = 0;
      var empty_ = false;
      for (var y = 0; y < url_.length; y++) {
        var date_ = [];
        var value_ = [];
        var compsData = getWeatherJson(url_[y]);       
        if (compsData[0].length != 0) {
          flg += 1;
          var datasize = compsData[0];
          legend_ += datasize[0].STATION_ID + ",";
          for (var x = 0; x < datasize.length; x++) {
            date_ += datasize[x].DATE_TIME + ",";
            value_ += parseInt(datasize[x].VALUE).toFixed(1) + ",";
          }
          data_.legend.data = legend_.split(",");
          data_.legend.data.pop();
          data_.series[y].name = datasize[0].STATION_ID;
          data_.series[y].data = value_.split(",");
          data_.series[y].data.pop();
          data_.xAxis.data = date_.split(",");
          data_.xAxis.data.pop();  
        } else {
          data_.legend.data = '';
          data_.series[y].name = '';
          data_.series[y].data = '';
          data_.xAxis.data = '';
          data_.yAxis.name = '';
          $("#chartdiv6").before("<div class='nodata'>查尋範圍 "+newTime+"~"+nowTime+" X "+idn[y]+": 無資料</div>");
        }
      }
      //datasize[0].DATE_TIME      
//      debugger;
      console.log(data_);
      return data_;
    }
    var goodchart = echarts.init(document.getElementById('chartdiv6'));
    goodchart.showLoading();
    option = linedotchart();
    var trimData1 = getlinedotchartData(option);
    goodchart.hideLoading();
    goodchart.setOption(trimData1);
    setInterval(function() {
      option = linedotchart();
      var trimData = getlinedotchartData(option);
      goodchart.setOption(trimData);
    }, 300000); //interval : //interval : 5 min
    
    //原水資訊-馬達
    function setRawwatermoto(xdata){
//      var xdata = xdata.sort();
      console.log(xdata);
      var stationid = [];
      for(var y=0; y<2; y++) {
        var span1 = $("#RawWater").children("div").eq(y).find("div").find("span:first");
        for(var x=0; x<span1.length; x++ ){
          stationid.push($(span1).eq(x).text());
        }
      } 
      for(var x=0; x<stationid.length; x++){
        var reg = RegExp(stationid[x]);
        for(var y=0; y<xdata.length; y++){
          //搜尋陣列內部份字串符合回傳true但不能回傳位置
          if(reg.test(xdata[y])){
            var mappingspan1 = xdata[y].split("/")[0];
            var assignFlag = xdata[y].split("/")[1]; 
            var span1 = $("#RawWater").children("div").find("div").eq(x);
            $(span1).removeClass("gray-light");    
            $(span1).addClass(assignFlag);                       
          }          
        }
      }
      console.log("更新原水資訊");
    }        
    function getRawWatermoto(){
      var url_ = [];
      moto = [];
      url_[0] = "http://220.134.42.63:8080/WaterscadaAPI/WI_ItemData?section=全區供水調配&item=3";  //三峽河取水站-抽水機
      url_[1] = "http://220.134.42.63:8080/WaterscadaAPI/WI_ItemData?section=全區供水調配&item=4";  //鳶山堰取水站-抽水機
      for(var y=0; url_.length<2; y++){
        var compsData = getWeatherJson(url_[y]);  
        console.log(compsData);
        if(compsData[1].length>0){
          for(var x=0; x<compsData[1].length; x++){
            if(compsData[1][x].DATA_TYPE == "image"){
              (compsData[1][x].VALUE == "light-green-s.png")? value2flag = "gray-light": value2flag = "circle";
              moto.push(compsData[1][x].STATION_ID+ "/" +value2flag);   // 定義關的圖片(light-green-s.png)，其餘圖片都定義為"開"
            }
          }
        } else alert("資料抓取發生問題");
      }
      setRawwatermoto(moto);
    }
    setInterval(getRawWatermoto, 300000);  //interval : 5 min
    getRawWatermoto();
    
    
    function alarmFlag(alarmContent) {
      switch ("W") {
        case "<":
          flagColor = 'yellow';
          flagString = "(低)";
          break;
        case ">":
          flagColor = 'yellow';
          flagString = "(高)";
          break;
        case "<<":
          flagColor = 'red';
          flagString = "(低低)";
          break;
        case ">>":
          flagColor = 'red';
          flagString = "(高高)";
          break;
        case "?":
          flagColor = "gray";
          break;
        case "N":
          flagColor = 'green';
          flagString = "(斷線)";
          break;
        case "W":
          flagColor = 'white';
          flagString = "(強制)";
          break;
      }
      return [flagColor, flagString];
    };    
    //水位資訊
    //chartdiv7
    function getwaterlevelData(option) {
      var data_ = option;
      var url_ = [];
      var idn = ["三峽河取水站","鳶山堰取水站","鳶山堰取水站"];
      url_[0] = "http://220.134.42.63:8080/WaterScadaApi/WI_ItemData?section=全區供水調配&item=3&STATION_ID=三峽河取水站&TAG_ID=水位";
      url_[1] = "http://220.134.42.63:8080/WaterScadaApi/WI_ItemData?section=全區供水調配&item=4&STATION_ID=鳶山堰取水站&TAG_ID=取水口水位";
      url_[2] = "http://220.134.42.63:8080/WaterScadaApi/WI_ItemData?section=全區供水調配&item=4&STATION_ID=鳶山堰取水站&TAG_ID=取水口水位";
      var legend_ = [], flg = 0;
      var empty_ = false;
      for (var y = 0; y < url_.length; y++) {
        var compsData = getWeatherJson(url_[y]); 
        var date_ = compsData[0];
        if (compsData[1].length != 0) {
          data_.title[y].text = compsData[1][0].STATION_ID;
//          data_.title[y].text = idn[y];
          if(y==1) {
            data_.title[y].text = "中庄調整池";
            data_.graphic[y].children[0].style.text = 0; 
          } 
          else
          data_.graphic[y].children[0].style.text = compsData[1][0].VALUE;
          var flagColor = alarmFlag(compsData[1][0].FLAG);
          data_.graphic[y].children[0].style.fill = flagColor[0];
        } else {
          data_.title[y].text = '';
          data_.graphic[y].children[0].style.text = '';
        }
      }
//      debugger;
      console.log(data_);
      return data_;
    }
    var waterlevel = echarts.init(document.getElementById('chartdiv7'));
    waterlevel.showLoading();
    option = drop1();
    var xdata = getwaterlevelData(option);
    waterlevel.hideLoading();
    waterlevel.setOption(xdata);    
    setInterval(function() {
      option = drop1();
      var trimData = getwaterlevelData(option);
      waterlevel.setOption(trimData);
      console.log("chardiv7");
    }, 300000); //interval : //interval : 5 min 
        
    

  </script>
   
  <!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
    var xxxx = 123;
    var calapp = {
        baseNumber: -1,
        init: function () { return this.baseNumber },
        uniform: function (x1) { return x1 *= 2000 },
        invoice: function () { return this.baseNumber /= 600 },
        receive: function () { return this.baseNumber /= 40 },
        odd: function () { return this.baseNumber *= 2 },
        even: function () { return this.baseNumber *= 1 },
    };
    console.log(calapp.uniform(xxxx));
    debugger;
  </script>
</body>

</html>
