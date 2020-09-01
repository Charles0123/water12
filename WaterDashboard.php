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
              <li>
                 <a href="javascript:void(0)" class=" " onclick="console.log($(this).next('.show_popinfo').fadeToggle('fast'))">
                  <div class="pic"><img src="images/m2.png" /></div>
                  儀表板
                </a>
                <div class="show_popinfo" style="width:180px">
                  <a href="">全區供水<div class="pic"><img src="images/m2.png" /></div></a>
                  <a href="">原水資訊<div class="pic"><img src="images/m2.png" /></div></a>
                  <a href="">板新淨水資訊<div class="pic"><img src="images/m2.png" /></div></a>
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
            <h5>全區供水</h5>
          </div>
          <div id="pool" class="board"><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
            <!--chart1-->
            <div id="chartdiv1s"></div>
            <div class="down">
              <div class="right">
                <div class="subtit">支援二區</div>
                <p >---</p>
              </div>
              <div class="right">
                <div class="subtit">總供水量</div>
                <p>---</p>
              </div>
            </div>
          </div>
          <div class="board1"><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
            <!--chart2-->
            <div id="chartdiv2"></div>
            <div class="editchartdiv2">
              <i class="fa fa-folder-open-o" title="選擇場站" aria-hidden="true"></i>
              <i class="fa fa-heart-o" title="加入我了最愛" aria-hidden="true"></i>
              <i class="fa fa-heart active" title="加入我了最愛" style="color: red;" aria-hidden="true"></i>
            </div>
            <div id="dialog-message" title="查看我的最愛">
              <div id="grid_favor_open"></div>
              <button class="btn_favor">儲存</button>
            </div>
          </div>
          <div id="pipeWater" class="board" data-cellback= "0">
            <div class="tit1">
              <h6>板新管線出水</h6><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
            <div class="top">
              <div class="pipe">管線</div>
              <div class="pipe">水量</div>
            </div>
            <div id="locat_value">
              <div class="tit2"><span>樹林1350mm</span><span class="number">-</span></div>
              <div class="tit2"><span>樹林1750mm</span><span class="number">-</span></div>
              <div class="tit2"><span>樹林1750mm</span><span class="number">-</span></div>
            </div>
          </div>
          <div class="board1">
            <div class="tit1">
              <h6>重要場站資訊</h6><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
            <!--chart4-->
            <div id="chartdiv4"></div>
            <!--chart5-->
            <div id="chartdiv5"></div>

          </div>
        </div>
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
            <!--chart7.8.9-->
            <div id="chartdiv7"></div>
            <!-- <div id="chartdiv8"></div>
            <div id="chartdiv9"></div> -->
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
              <div id="weathBlock" class="down">
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
              <div id="quakeBlock" class="down">
              </div>
            </div>
          </div>
          
        </div>
        <div class="range" id="waterblock">
          <div class="tit">
            <h5>板新淨水資訊</h5>
          </div>
          <div class="board">
            <div class="tit1">
              <h6>抽水機房運作狀態</h6><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
            <a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
            <div id="chartdiv11" class="outside">
              <div class="left">
                <h6>板橋線500HP</h6><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
                <div class="circle"><span>板橋線500HP#1</span><span class="bian">500HP</span></div>
                <div class="circle"><span>板橋線500HP#2</span><span>500HP</span></div>
                <div class="circle"><span>板橋線500HP#3</span><span>500HP</span></div>
                <div class="circle"><span>板橋線500HP#4</span><span>500HP</span></div>
              </div>
              <div class="left">
                <h6>機房900HP</h6><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
                <div class="circle gray-light"><span>板橋線900HP#1</span><span>900HP</span></div>
                <div class="circle"><span>板橋線900HP#2</span><span>900HP</span></div>
                <div class="circle"><span>板橋線900HP#3</span><span>900HP</span></div>
                <div class="circle"><span>板橋線900HP#4</span><span>900HP</span></div>
              </div>              
            </div>
          </div>
          <div id="waterwell" class="board1"><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
            <div id="chartdiv12"></div>
            <div class="down">
              <h6 >一二期水質</h6>
              <div class="line">
                <div class="subtit">pH值</div>
                <p>?</p><p></p>
              </div>
              <div class="line">
                <div class="subtit">餘氯</div>
                <p>?</p><p>PPM</p>
              </div>
              <div class="line">
                <div class="subtit">濁度</div>
                <p>?</p><p>NTU</p>
              </div>
              <div class="line">
                <div class="subtit">溫度</div>
                <p>?</p><p>℃</p>
              </div>
              <div class="line">
                <div class="subtit">導電度</div>
                <p>?</p><p>/㎝</p>
              </div>
            </div>
            <div class="down" style="display:none;">
              <h6>三期水質</h6>
              <div class="line">
                <div class="subtit">pH值</div>
                <p>?</p><p></p>
              </div>
              <div class="line">
                <div class="subtit">餘氯</div>
                <p>?</p><p>PPM</p>
              </div>
              <div class="line">
                <div class="subtit">濁度</div>
                <p>?</p><p>NTU</p>
              </div>
              <div class="line">
                <div class="subtit">溫度</div>
                <p>?</p><p>℃</p>
              </div>
              <div class="line">
                <div class="subtit">導電度</div>
                <p>?</p><p>/㎝</p>
              </div>
            </div>
          </div>
          <div class="board2" style="min-width: 600px;
    padding: 10px;">
            <div id="chartdiv13">
              <div class="balaImg">
                <div id="mappingConte">
                  <h6 id="last_dataTime" style="postion: relative; width: 100%; text-align:right; margin: 0; top: 20px;">UpdateTime</h6>
                  <img src="images/Dashboard/waterBanxin.png" style="width:100% height: auto">
                  <div class="setposition">
                    <div class="x2 y4"><span>廢水池A</span><input type="text" readonly></div>
                  </div>
                  <div class="setposition">
                    <div class="x3 y5"><span>廢水池B</span><input type="text" readonly></div>
                  </div>
                  <div class="setposition">
                    <div class="x4 y6"><span>三期北一</span><span>瞬間流量</span><input type="text" readonly></div>
                  </div>
                  <div class="setposition">
                    <div class="x4 y7"><span>三期北二</span><span>瞬間流量</span><input type="text" readonly></div>
                  </div>
                  <div class="setposition">
                    <div class="x4 y8"><span>三期南一</span><span>瞬間流量</span><input type="text" readonly></div>
                  </div>
                  <div class="setposition">
                    <div class="x4 y9"><span>三期南二</span><span>瞬間流量</span><input type="text" readonly></div>
                  </div>
                  <div class="setposition">
                    <div class="x5 y10"><span>二期M5</span><span>瞬間流量</span><input type="text" readonly></div>
                  </div>
                  <div class="setposition">
                    <div class="x6 y11"><span>二期M6</span><span>瞬間流量</span><input type="text" readonly></div>
                  </div>
                  <div class="setposition">
                    <div class="x7 y12"><span>一期M7</span><span>瞬間流量</span><input type="text" readonly></div>
                  </div>
                  <div class="setposition">
                    <div class="x1 y1"><span>一期總流量</span><span>瞬間流量</span><input type="text" readonly></div>
                  </div>
                  <div class="setposition">
                    <div class="x1 y2"><span>二期總流量</span><span>瞬間流量</span><input type="text" readonly></div>
                  </div>
                  <div class="setposition">
                    <div class="x1 y3"><span>三期總流量</span><span>瞬間流量</span><input type="text" readonly></div>
                  </div>
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
    $( document ).tooltip({track: true});

    $(document).ready(function() { 
      setTimeout(function() {
        $("#chartdiv1s > div:nth-child(2) > svg > g > g:nth-child(2) > g:nth-child(2) > g > g:nth-child(3)").remove();
        $("#chartdiv5 > div:nth-child(2) > svg > g > g:nth-child(2) > g:nth-child(2) > g > g:nth-child(3)").remove();
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
      window.onscroll=function(){
        var rang = 300;
        var waterHight = $("#waterblock").offset().top - rang;
        var bodyHight = $("body").outerHeight();
        var ne1 = $(this).scrollTop();
        if(ne1 > waterHight) { 
          pause = true;
        } else {
          pause = false;
        }
          console.log(ne1);
        
    }
//    var element = document.getElementById('chartdiv7'); //頁面滾動功能
//    element.scrollIntoView({
//        behavior: "smooth"
//    });
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
    function MouseWheel(e) {
      e = e || window.event;
      alert(['scrolled ', ((e.wheelDelta <= 0 || e.detail > 0) ? 'down' : 'up')].join(''));

      y = y + 600;
      if (e.wheelDelta) {
        window.scrollTo(0, y);
      } else
        window.scrollTo(0, 0);


    } //x
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
    function catchOpenData(getOpnDatWetr, key1, key2, NO) {
      var str = key1 + '-' + key2 + '-' + NO;
      var result;
      if (Array.isArray(getOpnDatWetr)) {
        //             filterItems(str);
        result = filterItems(str.trim());
        console.log(result);
      } else
        console.log("data type is error!");
      return result;
    }
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

    //縣市天氣資料 x
    function getLocatWeather() {
      var resourceId = "F-C0032-001";
      var elementName = "Wx";
      var locationName = "%E5%AE%9C%E8%98%AD%E7%B8%A3,%E8%8A%B1%E8%93%AE%E7%B8%A3,%E8%87%BA%E6%9D%B1%E7%B8%A3,%E6%BE%8E%E6%B9%96%E7%B8%A3,%E9%87%91%E9%96%80%E7%B8%A3,%E9%80%A3%E6%B1%9F%E7%B8%A3,%E8%87%BA%E5%8C%97%E5%B8%82,%E6%96%B0%E5%8C%97%E5%B8%82,%E6%A1%83%E5%9C%92%E5%B8%82,%E8%87%BA%E4%B8%AD%E5%B8%82,%E8%87%BA%E5%8D%97%E5%B8%82,%E9%AB%98%E9%9B%84%E5%B8%82,%E5%9F%BA%E9%9A%86%E5%B8%82,%E6%96%B0%E7%AB%B9%E7%B8%A3,%E6%96%B0%E7%AB%B9%E5%B8%82,%E8%8B%97%E6%A0%97%E7%B8%A3,%E5%BD%B0%E5%8C%96%E7%B8%A3,%E5%8D%97%E6%8A%95%E7%B8%A3,%E9%9B%B2%E6%9E%97%E7%B8%A3,%E5%98%89%E7%BE%A9%E7%B8%A3,%E5%98%89%E7%BE%A9%E5%B8%82,%E5%B1%8F%E6%9D%B1%E7%B8%A3";
      var url_ = weatherUrlSrc + 'rest/datastore/' + resourceId + '?Authorization=' + token_ + '&format=JSON&locationName=' + locationName + '&elementName=' + elementName;
      var compsData = getWeatherJson(url_);
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
      var temper = [];
      for (var x = 0; x < aData.length; x++) {
        var max = 0;
        var aDatakey = Object.keys(aData[x])[0];
        //            console.log(aData);
        //            console.log(aData[x][aDatakey]);
        var locationsName_ = aData[x][aDatakey]['locationsName'] + "降雨資訊";
        var dataid_ = aData[x][aDatakey]['dataid'];
        var result_ = aData[x][aDatakey]['result'];
        var location = [],
          weather = [],
          rain = [];
//          console.log(key + "_______" + max + "___" + locationsName_);
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
        }
        console.log(weather);
        
        var quo = Math.floor(location.length / 6); //商數Math.floor()
        var rem = Math.floor(location.length % 6); //餘數
        if (quo > 0) {
          for (var q = 0; q < quo; q++) {
            for (var w = 0; w < 6; w++) {
              //                  console.log(location[max]+"___"+max+"___"+locationsName_);
              $("#weathBlock").append("<div class='degree active' style='animation-iteration-count:1' data-locationsName=" + locationsName_ + "><div class='city' data-dataid='" + dataid_+"'>" + location[max] + "</div><div><span class='icon'>" + WxAssingSvg[weather[max]] + "</span><span class='temp temperature'>" + temper[max] + "</span></div><div><span class='rain'><span class='sr-only'>降雨機率</span><i class='fa fa-tint'></i> " + rain[max] + "</span></div></div>");
              max += 1;
            }
          }
          quo = 0;
        }

        if (rem > 0) {
          for (var r = 0; r < rem; r++) {
            //                console.log(location[max]+"___"+max+"___"+locationsName_);
            //                console.log(location[max]);
            $("#weathBlock").append("<div class='degree active' style='animation-iteration-count:1' data-locationsName=" + locationsName_ + "><div class='city' data-dataid='" + dataid_ +"'>" + location[max] + "</div><div><span class='icon'>" + WxAssingSvg[weather[max]] + "</span><span class='temp temperature'>" + temper[max] + "</span></div><div><span class='rain'><span class='sr-only'>降雨機率</span><i class='fa fa-tint'></i> " + rain[max] + "</span></div></div>");
            max = max + 1;
          }
          var rem_Emp = 6 - rem;
          for (var rp = 0; rp < rem_Emp; rp++) {
            //                console.log(location[max]+"___"+max+"___"+locationsName_);
            $("#weathBlock").append("<div class='degree active' style='animation-iteration-count:1' data-locationsName=''><div class='city' data-dataid=''></div><div><span class='icon'></span><span class='temp temperature'></span></div><div><span class='rain'><span class='sr-only'></span></span></div></div>");
            max++;
          }
          rem = 0;
        }
      }      
      ShowTWloact = setInterval(function() {
        var acklen = $("#weathBlock").find(".degree.active");
        if (acklen.length > 0 && !pause) {
          $(acklen).eq(0).removeClass("active").fadeOut(350);
          $(acklen).eq(1).removeClass("active").fadeOut(350);
          $(acklen).eq(2).removeClass("active").fadeOut(350);
          $(acklen).eq(3).removeClass("active").fadeOut(350);
          $(acklen).eq(4).removeClass("active").fadeOut(350);
          $(acklen).eq(5).removeClass("active").fadeOut(350);
          var acklen = $("#weathBlock").find(".degree.active");
          var titl = $(acklen).eq(0).attr("data-locationsName");
          $(".rainfall h6").text(titl);
        } else if(pause) return;
        else {
          $("#weathBlock").find(".degree").addClass("active").fadeIn();
        }
      }, 3000);
      
    };    
    function getDistricWeather() {      
      var timeTo = $(".Date").bind().context.lastModified; //ex:"03/18/2020 11:41:33" => 2020-03-18T14:21:00
      var hms = (timeTo.split(" "))[1];
      var ymd = ((timeTo.split(" "))[0].split('/')).reverse().join("-") + "T";
      timeTo = ymd + hms;
      //            console.log(timeTo);   //=> 2020-03-18T14:21:00
      var assignOpnData = catchOpenData(getOpnDatWetr, 'F', 'D0047', '');
      var odd = [],
        even = [],
        newData = [];
      for (var i = 0; i < assignOpnData.length; i++) {
        if ((i + 2) % 2 == 0) {
          odd.push(assignOpnData[i]);
        } else {
          even.push(assignOpnData[i]);
        }
      }
      //            console.log(even);
      var locatId = {};
      for (var x = 0; x < even.length - 1; x++) {
        var elementName = "WeatherDescription";
        //參考: https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-061?Authorization=CWB-F2C12809-313E-4E17-AC4C-623900AE2196&format=JSON&elementName=WeatherDescription,&sort=time
        var url_ = weatherUrlSrc + 'rest/datastore/' + even[x] + '?Authorization=' + token_ + '&format=JSON&elementName=' + elementName + "&sort=time";
        //              debugger;
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
    setInterval(function() {
      console.log("reload weatherData");
      clearInterval(ShowTWloact);
      getDistricWeather();
    }, 3600000); //interval : 1 hrs 
      
    //顯著有感地震報告資料-顯著有感地震報告
    var ShowTW_earthquake;
    var defshakingColor = [
      {OUT:'green' ,TW: '綠色',VALUE: 3.99},
      {OUT:'yellow',TW:'黃色' ,VALUE:4.01},
      {OUT:'orange',TW:'橙色' ,VALUE:5.01},
      {OUT:'red'   ,TW:'紅色' ,VALUE:6.01}
    ];
    var setearthquakeoff;
    function setearthquake(aData,head){
      //aData[0] ="南投縣地區@南投縣@合歡山@2@級@green"
      //head = "2020-04-12 19:36:41@green@04/12-19:36臺灣東部海域發生規模5.3有感地震，最大震度花蓮縣太魯閣、花蓮縣花蓮市、宜蘭縣南澳、南投縣合歡山、臺東縣長濱、彰化縣員林、彰化縣彰化市、雲林縣古坑、雲林縣斗六市2級。"
      var temper = [];
      for (var x = 0; x < aData.length; x++) {
        var max = 0;
        var locationsName_ = aData[x].split("@")[1] + "地震資訊";
        var dataid_ = aData[x].split("@")[2];
        var result_ = aData[x].split("@")[3];
        var unit = aData[x].split("@")[4];
        var wranglingColor = aData[x].split("@")[5];
        var location = [],          weather = [],          rain = [];
        
        $("#quakeBlock").append("<div class='degree active' style='animation-iteration-count:1' data-locationsName=" + locationsName_ + "><div class='city' data-dataid='" + dataid_ + "'>" + dataid_ + "</div><div><img src='images/icons/earthquake.png' style='width:100px'/><span class='temp temperature' style='color:"+wranglingColor+"'> "+result_+" </span></div><div><span class='rain' style='color:"+wranglingColor+"'>" + unit + "</span></div></div>");              
      }
      setearthquakeoff = setInterval(function() {
        var acklen = $("#quakeBlock").find(".degree.active");
        if (acklen.length > 0) {
          $(acklen).eq(0).removeClass("active").fadeOut(350);
          $(acklen).eq(1).removeClass("active").fadeOut(350);
          $(acklen).eq(2).removeClass("active").fadeOut(350);
          $(acklen).eq(3).removeClass("active").fadeOut(350);
          $(acklen).eq(4).removeClass("active").fadeOut(350);
          $(acklen).eq(5).removeClass("active").fadeOut(350);
          var acklen = $("#quakeBlock").find(".degree.active");
          var titl = $(acklen).eq(0).attr("data-locationsName");
          $(".earthquake h6").text(titl);
        } else {
          $("#quakeBlock").find(".degree").addClass("active").fadeIn();
        }
      }, 3000); 
//      clearInterval(setearthquakeoff);
    };
    function getEarthquake() {      
      var url_ = weatherUrlSrc + 'rest/datastore/E-A0015-001' + '?Authorization=' + token_ + '&areaName=%E5%AE%9C%E8%98%AD%E7%B8%A3,%E8%8A%B1%E8%93%AE%E7%B8%A3,%E8%87%BA%E6%9D%B1%E7%B8%A3,%E6%BE%8E%E6%B9%96%E7%B8%A3,%E9%87%91%E9%96%80%E7%B8%A3,%E9%80%A3%E6%B1%9F%E7%B8%A3,%E8%87%BA%E5%8C%97%E5%B8%82,%E6%96%B0%E5%8C%97%E5%B8%82,%E6%A1%83%E5%9C%92%E5%B8%82,%E8%87%BA%E4%B8%AD%E5%B8%82,%E8%87%BA%E5%8D%97%E5%B8%82,%E9%AB%98%E9%9B%84%E5%B8%82,%E5%9F%BA%E9%9A%86%E5%B8%82,%E6%96%B0%E7%AB%B9%E7%B8%A3,%E6%96%B0%E7%AB%B9%E5%B8%82,%E8%8B%97%E6%A0%97%E7%B8%A3,%E5%BD%B0%E5%8C%96%E7%B8%A3,%E5%8D%97%E6%8A%95%E7%B8%A3,%E9%9B%B2%E6%9E%97%E7%B8%A3,%E5%98%89%E7%BE%A9%E7%B8%A3,%E5%98%89%E7%BE%A9%E5%B8%82,%E5%B1%8F%E6%9D%B1%E7%B8%A3';
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
    }, 3600000); //interval : 1 hrs 
    
    
    //搜尋json內特定字串
    var defindItem = {
      "北水處": "供水量(瞬間流量)",
      "板新出水量":"出水量(瞬間流量)",
      "2區供水量": "供水量(瞬間流量)",
      "支援2區": "供水量(瞬間流量)",
      "12區管理處": "總供水量(瞬間流量)"
    };
    //chartdiv1s
    getfullpoolchart();
    function setfullpoolbottom(compsData) {
      var poolarray = [];
      var upt;
      if(compsData[1].length>0){
        upt = compsData[0];
        for(var x=0; x<compsData[1].length; x++){
          var ITEM_NAME = defindItem[compsData[1][x].STATION_ID];
          if(ITEM_NAME == compsData[1][x].ITEM_NAME){
            var _VALUE_ = compsData[1][x].VALUE.split(" ")[0];
            var temp = compsData[1][x].STATION_ID +":"+compsData[1][x].MEASURE+":"+_VALUE_ +": CMD :"+ juagColor(compsData[1][x].FLAG);
            poolarray.push(temp);
          }
        }
        for(var x=0; x<poolarray.length; x++){
          var statid = poolarray[x].split(":")[0];
          if(statid == "支援2區") { 
            var val = poolarray[x].split(":")[2];
            var color_ = poolarray[x].split(":")[4];
            $("#pool").children(".down").find(".subtit:first").next("p").text(val).css({color: color_});
          }
          if(statid == "12區管理處") {
            var val = poolarray[x].split(":")[2];
            var color_ = poolarray[x].split(":")[4];
            $("#pool").children(".down").find(".subtit:last").next("p").text(val).css({color: color_});
          }
        }
        setfullpoolchart(poolarray);        
      }
    }
    function getfullpoolchart(){
      var url_;
      url_ = "http://220.134.42.63:8080/WaterscadaAPI/WI_ItemData?section=全區供水調配&item=2&STATION_ID=北水處,板新出水量,2區供水量,支援2區,12區管理處";  
      //STATION_ID: 北水處      -ITEM_NAME: "供水量(瞬間流量)",
      //STATION_ID: 板新出水量  -ITEM_NAME: "出水量(瞬間流量)",
      //STATION_ID: 2區供水量   -ITEM_NAME: "供水量(瞬間流量)",
      //STATION_ID: 支援2區     -ITEM_NAME: "供水量(瞬間流量)",
      //STATION_ID: 12區管理處  -ITEM_NAME: "總供水量(瞬間流量)"
      var compsData = getWeatherJson(url_);      
      console.log(compsData);
      setfullpoolbottom(compsData);
    }
    function setfullpoolchart(poolarray) {
      am4core.useTheme(am4themes_animated);
      var fullpoolmeter = am4core.create("chartdiv1s", am4charts.RadarChart); 
      
      fullypoolchart(poolarray,fullpoolmeter);               
    }
    setInterval(function(){      
      getfullpoolchart();      
    }, 300000); //interval : 5 min
    
    //chartdiv2
    function getLinelineData(option) {
      $("#chartdiv2").parent('div').find(".nodata").remove();
      var data_ = option;      
      var url_ = [];
      var nowTime = moment().format();
      var newTime = moment().subtract(1, 'days').format();
      nowTime = nowTime.split("-").join("/").split("T").join(" ").split("+")[0];
      newTime = newTime.split("-").join("/").split("T").join(" ").split("+")[0];      
      var idn = [];       
      debugger;
      url_[0] = "http://220.134.42.63:8080/waterscadaAPI/GetHistoryData?tag_id=供水量(瞬間流量)&station_id=北水處&period=hour&start="+newTime+"&end="+nowTime+"&measure=*&include_yesterday=0&only_wi=1";
      url_[1] = "http://220.134.42.63:8080/waterscadaAPI/GetHistoryData?tag_id=出水量(瞬間流量)&station_id=板新出水量&period=hour&start="+newTime+"&end="+nowTime+"&measure=*&include_yesterday=0&only_wi=1";
      url_[2] = "http://220.134.42.63:8080/waterscadaAPI/GetHistoryData?tag_id=供水量(瞬間流量)&station_id=2區供水量&period=hour&start="+newTime+"&end="+nowTime+"&measure=*&include_yesterday=0&only_wi=1";
      var legend_ = [];         
      for (var y = 0; y < url_.length; y++) {
        var date_ = [];
        var value_ = [];
        var compsData = getWeatherJson(url_[y]);
        debugger;
        if (compsData[0].length != 0) {
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
          $("#chartdiv2").before("<div class='nodata'>查尋範圍 "+newTime+"~"+nowTime+" X "+idn[y]+": 無資料</div>");
        }
      }
      console.log(data_);
      return data_;
    }
    var curve = echarts.init(document.getElementById('chartdiv2'));
    curve.showLoading();
    option = lineline();
    var trimData = getLinelineData(option);
    curve.hideLoading();
    curve.setOption(trimData);
    setInterval(function() {
      option = lineline();
      var trimData = getLinelineData(option);
      curve.setOption(trimData);
    }, 300000); //interval : 5 min
    
    function open_favor(e, nm){     
      
      $('#grid_favor_open').empty();
      switch (nm){
        //開啟舊檔
        case "fa fa-folder-open-o": {
          var url_ = "http://220.134.42.63:8080/waterscadaAPI/GetRealtimeData?include_yesterday=1&measure=瞬間流量";
          var dataSource_ = getWeatherJson(url_);
          var data_ = new kendo.data.DataSource({
                data: dataSource_,
                schema: {
                    model: {  id: "TAG_ID",  }
                },
                pageSize: 10,
          });          
          var columns_ = [
                    { selectable: true, width: "50px" },
                    { field:"STATION_ID", title: "測站名稱" },
                    { field: "STATION_TYPE", title:"測站種類" },
                    { field: "ITEM_NAME", title:"測站項目" },
                    { field: "FAVOR", title:"加入我的最愛", 
                     template: function(dataSource_){
                                  var favorFlag = Number(dataSource_.FAVOR);
                                  if(favorFlag) {
                                    var append_ = '<div class="assignFavor" data-favor='+favorFlag+' onclick="favor(this)"><i class="fa fa-heart" aria-hidden="true"></i></div>';
                                  } else {
                                    var append_ = '<div class="assignFavor" data-favor='+favorFlag+' onclick="favor(this)"><i class="fa fa-heart-o" aria-hidden="true"></i></div>';
                                  }
                                  return append_;
                                } 
                    }, 
                ];
          break;
        }
        //加入我的最愛
        case "fa fa-heart": 
        case "fa fa-heart-o": {
          var data_ = [
                  {
                      STATION_ID: "A",
                      DESC: "無",
                      FAVOR: "1",
                  },{
                      STATION_ID: "B",
                      DESC: "變頻",
                      FAVOR: "1",
                  },{
                      STATION_ID: "C",
                      DESC: "變頻2",
                      FAVOR: "0",
                  }];
          var columns_ = [
                    { field:"STATION_ID", title: "測站名稱" },
                    { field: "DESC", title:"測站項目" },
                    { field: "FAVOR", title:"我的最愛", 
                     template: function(data_){
                                  var favorFlag = Number(data_.FAVOR);
                                  if(favorFlag) {
                                    var append_ = '<div class="assignFavor" data-favor='+favorFlag+' onclick="favor(this)"><i class="fa fa-heart" aria-hidden="true"></i></div>';
                                  } else {
                                    var append_ = '<div class="assignFavor" data-favor='+favorFlag+' onclick="favor(this)"><i class="fa fa-heart-o" aria-hidden="true"></i></div>';
                                  }
                                  return append_;
                                } 
                    }, 
                ];
          break;
        }
      }
      
      $("#grid_favor_open").kendoGrid({
        dataSource: data_,
        height: 550,
        pageable: {        
          pageSizes: true,
          refresh: true,
          numeric: true,
          input: true,
          previousNext: true,
          buttonCount: 10,
          info: true,
          alwaysVisible:true,
          messages: {
            page: "10",
            itemsPerPage: "",
            first: "首頁",
            last: "末頁",
            previous: "上一頁",
            next: "下一頁",
            refresh: "刷新",
          }        
        },
        groupable: true,
        sortable: true,
        toolbar: ["excel"],
        columns: columns_,
        change: onChange,
        sortable: true,
      });
    }
    var saveToArray= '';
    function onChange() {
        console.log("The selected product ids are: [" + this.selectedKeyNames().join(",") + "]");
        saveToArray = this.selectedKeyNames();
        var e = $(this).children("td:last").find(".assignFavor");
        var t = $(this).attr("aria-checked");
        if(t){
          $(e).attr("data-favor", 0);
          $(e).data("favor", 0);
          $(e).find('i').addClass("fa-heart-o").removeClass('fa-heart');
          $(e).closest("tr").children("td:first").find("input[type=checkbox]").click();
        } else {
          $(e).attr("data-favor", 1);
          $(e).data("favor", 1);
          $(e).find('i').addClass("fa-heart").removeClass('fa-heart-o');
          $(e).closest("tr").children("td:first").find("input[type=checkbox]").click();
        }
    }
    function favor(e){
      var t = $(e).data("favor");
      if(t){
        $(e).attr("data-favor", 0);
        $(e).data("favor", 0);
        $(e).find('i').addClass("fa-heart-o").removeClass('fa-heart');
        $(e).closest("tr").children("td:first").find("input[type=checkbox]").click();
      } else {
        $(e).attr("data-favor", 1);
        $(e).data("favor", 1);
        $(e).find('i').addClass("fa-heart").removeClass('fa-heart-o');
        $(e).closest("tr").children("td:first").find("input[type=checkbox]").click();
      }
    }
    //chartdiv4
    var setWaterballoff;
    var WaterBall = echarts.init(document.getElementById('chartdiv4'));
    WaterBall.showLoading();
//    var value = 0.3;
//    var data = [value, value, value, ];
    function getWaterball(){
      var importantStation = [];
      var upt, url_;
      url_ = "http://220.134.42.63:8080/WaterscadaAPI/WI_StationData?section=轄區供水系統&measure=水量&item=*";  //重要場站
      var compsData = getWeatherJson(url_);
      console.log(compsData);
      if(compsData[2].length>0){
        upt = compsData[0];
        for(var x=0; x<compsData[2].length; x++){
          for(var y=0; y<compsData[2][x].ITEMS.length; y++){
            var ITEM_NAME = compsData[2][x].ITEMS[y].ITEM_NAME;
            if(!searchKeywrd(ITEM_NAME,/昨日/)){
              var temp = compsData[2][x].DISPLAY_NAME +":"+compsData[2][x].ITEMS[y].ITEM_NAME +":"+compsData[2][x].ITEMS[y].VALUE +":"+compsData[2][x].ITEMS[y].UNIT +":"+ juagColor(compsData[2][x].ITEMS[y].FLAG);
              importantStation.push(temp);
            }
          }
        }
        setWaterball(importantStation);        
      }
    }    
    function setWaterball(importantStation){
      var y_y = 1;
      setWaterballoff = setInterval(function(){
        if(y_y < importantStation.length) {               
          WaterBall.setOption({
            title: { text: importantStation[y_y].split(":")[0]},
            graphic: [{
              type: 'group',
              left: 'center',
//              top: 'middel',
              children: [
                {
                  type: 'text',
                  z: 100,
                  left: 'center',
                  top: '20',
                  style: {
                      fill: '#fff',
                      text: importantStation[y_y].split(":")[1],//30,000-
                      font: '18px Microsoft YaHei'
                  }
              },
              {
                  type: 'text',
                  z: 100,
                 left: 'center',
                  top: '50',
                  style: {
                      fill: importantStation[y_y].split(":")[4],
                      text: importantStation[y_y].split(":")[2],//30,000-
                      font: '20px Microsoft YaHei'
                  }
              },
              {
                  type: 'text',
                  z: 100,
                  left: 'center',
                  top: '80',
                  style: {
                      fill: '#fff',
                      text: importantStation[y_y].split(":")[3],//30,000-
                      font: '18px Microsoft YaHei'
                  }
              } ]
            }],
          });
          y_y +=1;
        } else y_y = 0;
      },3000);  
      
    }
    option = bubble();
    WaterBall.hideLoading();
    WaterBall.setOption(option);
    getWaterball();
    setInterval(function(){
      clearInterval(setWaterballoff);
      getWaterball();
    }, 300000);  //interval : 5 min
    
    
    //計算間隔時間
    function setIntervalTimes(nowTime, interval) {
      var t_s = nowTime.getTime(); //轉換時間為毫秒
      var newT = new Date(); //定义一个新时间      
      newT.setTime(t_s + 1000 * interval);
      var hms = newT.toTimeString().replace(/.*(\d{2}:\d{2}:\d{2}).*/,"$1");
      var trsfTim = newT.toISOString().slice(0,10).replace(/-/g,"/");      
      trsfTim = trsfTim.replace(/(\d{4})(\d{2})(\d{2})/g, '$1-$2-$3'); 
      return trsfTim+" "+hms; //=> 2020/03/18T14:21:00
    }
    
    
    //chartdiv5
    var setgaugeoff;
    getgaugechart();
    function getgaugechart(){
      var importantStation = [];
      var upt, url_;
      url_ = "http://220.134.42.63:8080/WaterscadaAPI/WI_StationData?section=轄區供水系統&measure=水壓&item=*";  //重要場站
      var compsData = getWeatherJson(url_);
      console.log(compsData);
      if(compsData[2].length>0){
        upt = compsData[0];
        for(var x=0; x<compsData[2].length; x++){
          for(var y=0; y<compsData[2][x].ITEMS.length; y++){
            var ITEM_NAME = compsData[2][x].ITEMS[y].ITEM_NAME;
            if(!searchKeywrd(ITEM_NAME,/昨日/)){
              var temp = compsData[2][x].DISPLAY_NAME +":"+compsData[2][x].ITEMS[y].ITEM_NAME +":"+compsData[2][x].ITEMS[y].VALUE +":"+compsData[2][x].ITEMS[y].UNIT +":"+ juagColor(compsData[2][x].ITEMS[y].FLAG);
              importantStation.push(temp);
            }
          }
        }
        setgaugechart(importantStation);
      }
    }
    function setgaugechart(importantStation) {
      am4core.useTheme(am4themes_animated);
      var gaugemeter = am4core.create("chartdiv5", am4charts.GaugeChart);  
      gaugechart(importantStation,gaugemeter);   
    }
    setInterval(function(){
      clearInterval(setgaugeoff);  
      getgaugechart();
    }, 300000);  //interval : 5 min
    
    //判斷陣列內字串
    Array.prototype.in_array = function (element) { 
      for (var i = 0; i < this.length; i++) {
      if (this[i] == element) {
      return true;
        }
      } return false;
    } //x
    
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
      switch (alarmContent) {
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
        
    //清水池水位1
    //chartdiv12
    var wave = echarts.init(document.getElementById('chartdiv12'));
    var option = pool();
    wave.setOption(option);
    wave.showLoading();
    var collectionRepeat = function(box, key){
        var counter = {};
        box.forEach(function(x) { 
            counter[x] = (counter[x] || 0) + 1; 
        });
        var val = counter[key];
        if (key === undefined) {
            return counter;
        }
        return (val) === undefined ? 0 : val;
    }    
    var setWaterchartdiv12off;
    function setWaterchartdiv12(xdata){
      console.log(xdata);
      var wellstr = [];
      var keyword = "清水池";
      for(var x=0; x<xdata.length; x++) {
        var temp = xdata[x].split(" ");
        //0: "15000M3清水池:水位2:150.00:gray"
        if(keyword == getBig5(xdata[x].split(" ")[0])){
          wellstr.push(temp[0]+":"+temp[1]+temp[2]+":"+juagColor(temp[3]));          
        }
      }
      wellstr.sort();      
      wave.hideLoading();      
      wave.setOption({
        title: { text: wellstr[0].split(":")[0]},
        series: [{
            // 根据名字对应到相应的系列
            label: {
                  normal: {
                  formatter: function() {return wellstr[0].split(":")[2]},                
                }
            },
        }]
    });
      var xxx = 1;
      setWaterchartdiv12off = setInterval(function(){
        if(xxx < wellstr.length){          
          wave.setOption({
          title: { text: wellstr[xxx].split(":")[0] +" "+ wellstr[xxx].split(":")[1]},
          series: [{
              // 根据名字对应到相应的系列
              label: {
                    normal: {
                    formatter: function() {return wellstr[xxx].split(":")[2]},                
                  }
              },
            }]
          });
          xxx +=1;
        } else xxx = 0;
      },3000);  
    }
    
    //清水池
    var wellpage = false;
    var setWaterwelloff;
    function setWaterwell(xdata){
      console.log(xdata);
      var wellstr = [];
      var down_ = $('#waterwell').children(".down");           
      var statid = [], val = [], span1 = [];

//        //刪除陣列中空字串" "
//        span1[x] = $.grep(span1[x],function(n){ return n == ' ' || n });        
      for(var x=0; x<xdata.length; x++) {
        var temp = xdata[x].split(" ");
        //0: "15000M3清水池:水位2:150.00:gray"
        wellstr.push(temp[0]+":"+temp[1]+temp[2]+":"+juagColor(temp[3]));
      }
      wellstr.sort();
      for(var x=0; x<down_.length; x++) {
        var downx_h6 = $(down_).eq(x).children("h6:first").text();
        for(var y=0; y<wellstr.length; y++) {
          if(downx_h6 == wellstr[y].split(":")[0]) {
            //writing titleName to h6
            $(down_).eq(x).children("h6:first").text(wellstr[y].split(":")[0]);
            var getbig5_ = getBig5(wellstr[y].split(":")[0]);
          }
          if(getbig5_ == wellstr[y].split(":")[0]) {
            var line_ = $(down_).eq(x).children("div"); 
            for(var z=0; z<line_.length; z++) {
              var subtit_ = $(line_).eq(z).children("div:first").text();
              if(subtit_ == wellstr[y].split(":")[1]) {
                //writing titleName to PH值
                $(line_).eq(z).children("div:first").text(wellstr[y].split(":")[1]);
                $(line_).eq(z).children("p:first").text(wellstr[y].split(":")[2]).css({color: wellstr[y].split(":")[3]});
              }
            }
          }
        }
      }        
      setWaterwelloff = setInterval(function(){
        $('#waterwell').children(".down").fadeToggle(350);          
      },3000);    //interval : 3 sec
      console.log("清水池");
    }
    
    //三峽河抽水機房運作狀態
    var setWaterpumpoff;
    var moto1 = [], moto2 = [];  
    function setWaterpump(xdata){
//      var xdata = xdata.sort();
      console.log(xdata);
      xdata.sort();
      var x1=0;
      var invertmoto = ['尖山線500HP#3','樹林線1000HP#6'];
      var specialcase = ['松峽線供電','松樹線供電'];
      var staid=[],pump=[],dotcls=[],moto=[];
      for(var x=0; x<xdata.length; x++){
        staid.push(getBig5(xdata[x].split("/")[0]));
        pump.push(xdata[x].split("/")[0]);        
        dotcls.push(xdata[x].split("/")[1]);
        moto.push(moveBig5(xdata[x].split("/")[0]));        
      }      
      var obj = collectionRepeat(staid);
//      $("#chartdiv11").children(".left").remove();
      $("#chartdiv11").children("div").remove();
      for (var prop in obj) {        
        console.log(prop + ':' + obj[prop]);
        var apendiv = '<div class="left active"><h6>'+prop+'</h6><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a></div>';
        $("#chartdiv11").append(apendiv);
        for(var y=0; y<pump.length; y++){
          if(prop == getBig5(pump[y])){
            function bian(){
              var bian_;
              for(var z=0; z<invertmoto.length; z++){
                if(pump[y] == invertmoto[z]) {  bian_ = 'bian'; break; }
                else bian_= '';
              }
              return bian_;
            };
            if(pump[y] == specialcase[0] || pump[y] == specialcase[1]){
                moto[y] = prop.replace("供電", '');
            }            
            var apencont = '<div class="circle '+dotcls[y]+'"><span>'+pump[y]+'</span><span class="'+bian()+'">'+moto[y]+'</span></div>';
            $("#chartdiv11").children(".left").eq(x1).append(apencont);              
          }
        }
        x1 +=1;
      }
      console.log("更新抽水機房運作狀態資訊");      
      setWaterpumpoff = setInterval( putPumpToHtml, 3000);
    }    
    function putPumpToHtml(){
      var leftblock = $("#chartdiv11").children(".left.active");
      if (leftblock.length > 0) {
        $(leftblock).eq(0).removeClass("active").fadeOut(350);
        $(leftblock).eq(1).removeClass("active").fadeOut(350);
      } 
      var leftblock = $("#chartdiv11").find(".left.active");
      if(leftblock.length == 0){
        $("#chartdiv11").find(".left").bind().addClass("active").fadeIn();
      }
    }
    function getWaterpump(){
      var url_ = [];
      moto1 = [];
      url_ = "http://220.134.42.63:8080/WaterscadaAPI/WI_ItemData?section=全區供水調配&item=6";  //三峽河取水站-抽水機
        var compsData = getWeatherJson(url_);
        console.log(compsData);
        if(compsData[1].length>0){
          for(var x=0; x<compsData[1].length; x++){
            if(compsData[1][x].DATA_TYPE == "image"){
              (compsData[1][x].VALUE == "light-green-s.png")? value2flag = "gray-light": value2flag = "circle";
              moto1.push(compsData[1][x].STATION_ID+ "/" +value2flag);   // 定義關的圖片(light-green-s.png)，其餘圖片都定義為"開"
            }
            if(compsData[1][x].DATA_TYPE == "text"){
              moto2.push(compsData[1][x].STATION_ID +" "+compsData[1][x].TOOLTIPS);
            }
              
          }
        } else alert("資料抓取發生問題");
      setWaterpump(moto1);
      setWaterwell(moto2);
      setWaterchartdiv12(moto2);
    }    
    getWaterpump();
    setInterval(function(){ 
     clearInterval(setWaterpumpoff);
     clearInterval(setWaterwelloff);
     clearInterval(setWaterchartdiv12off);
     getWaterpump(); 
    }, 300000); //interval : 5 min
    
    
    //板新管線出水
    function juagColor(flg) {
      switch(flg){
        case "N": return 'green';
        case "<": 
        case ">": return 'yellow';
        case "<<":
        case ">>":return 'red';
        case "?": return 'gray';
      }
    }
    var stid = [], vale = [], disp = [], flg = [];
    var rank = "板新廠,樹林線1750Φ,樹林線1350Φ,板南2000Φ,三峽線600Φ,三峽線400Φ,尖山線900Φ,板橋線1350Φ,三鶯線600Φ".split(",");  //DISPLAY_NAME
    var setpipewateroff;
    function setpipeWater(){
      var ltve = $("#locat_value").children("div");
      var count = $("#pipeWater").data("cellback"); 
      //console.log(disp);
      if(count < rank.length){ 
        $(ltve).eq(0).find("span:first").text(disp[count+0]).parent().find("span:last").text(vale[count+0]).css({color: flg[count+0]});
        $(ltve).eq(1).find("span:first").text(disp[count+1]).parent().find("span:last").text(vale[count+1]).css({color: flg[count+1]});
        $(ltve).eq(2).find("span:first").text(disp[count+2]).parent().find("span:last").text(vale[count+2]).css({color: flg[count+2]});
        $("#pipeWater").data("cellback", count+3);
      } else {
        $(ltve).eq(0).find("span:first").text(disp[0]).parent().find("span:last").text(vale[0]).css({color: flg[0]});
        $(ltve).eq(1).find("span:first").text(disp[1]).parent().find("span:last").text(vale[1]).css({color: flg[1]});
        $(ltve).eq(2).find("span:first").text(disp[2]).parent().find("span:last").text(vale[2]).css({color: flg[2]});
        $("#pipeWater").data("cellback", 0);            
      }
    }
    function getpipeWater() {
      disp = [], vale = [], flg = []; 
      var url_ = 'http://220.134.42.63:8080/WaterscadaAPI/WI_StationData?section=八大管線系統&item=1';
//      var statidName = $("#pipeWater").children("div:first");      
      var compsData = getWeatherJson(url_);
      console.log(compsData[2]);
      var jsonDat = compsData[2];
      for ( var x=0; x<jsonDat.length; x++) {        
        disp.push(jsonDat[x].DISPLAY_NAME);
        vale.push(jsonDat[x].ITEMS[0].VALUE +" "+jsonDat[x].ITEMS[0].UNIT);                
        flg.push(juagColor(jsonDat[x].ITEMS[0].FLAG));                
      }
      console.log(flg);
      setpipewateroff = setInterval(function(){setpipeWater()}, 3000); //3sec
    }
    
    getpipeWater();    
    setInterval(function(){
      clearInterval(setpipewateroff);
      getpipeWater();
    }, 300000); //interval : 5 min
    
    //板新導水    
    
    
    function getbashboardDatas(str, no, station_id, tag_id) {
      var findKey_ = [], getDatas=[];
      console.log(tag_id);
      getDatas.length = 0;
      $.ajax({
        url: "http://220.134.42.63:8080/WaterscadaAPI/WI_ItemData?section=全區供水調配&item=5",
        type: "GET",
        dataType: "json",
        async: false,
        success: function(Jdata) {
          $.each(Jdata, function(index, d) {
            getDatas.push(d);
          });
          var findIndexofkeywd;
          var lastDataTime = getDatas[0];
          lastDataTime = lastDataTime.split("-").join("/").split("T").join(" ");
          $("#last_dataTime").text(lastDataTime);
          $.each(getDatas[1], function(v, x) {
            findKey_.push(x);
          });
          CompareQuestOfWord(findKey_);
          console.log(findKey_);

        },
        error: function() {
          console.log("get json fail");
        }
      });
    }
    function CompareQuestOfWord(questWD) {
      var spanX1, spanX2, assign = false;
      var setPositionLength = $("#mappingConte").children("div").length;
      for (var j = 0; j < setPositionLength; j++) {
        var divCunt = $(".setposition")[j];
        for (var y = 0; y < $(divCunt).children('div').length; y++) {
          spanX1 = $(divCunt).find("div:nth-of-type(" + (y + 1) + ") span:nth-of-type(1)").text();
          spanX2=$(divCunt).find("div:nth-of-type("+(y+1)+") span:nth-of-type(2)").text();
          //            console.log(spanX1 +" + "+ spanX1);
          for (var x = 0; x < questWD.length; x++) {
            var AssignValCls;
            if (questWD[x].STATION_ID == spanX1) {
              console.log(spanX1 + " - : " + questWD[x].VALUE);
              var inpt = $(divCunt).find("div:nth-of-type(" + (y + 1) + ") input");
              inpt.val(questWD[x].VALUE);
              var flag = questWD[x].FLAG;
              switch (flag) {
                case "N":
                  AssignValCls = "nor_";
                  break;
                case "<":
                case ">":
                  AssignValCls = "s_err";
                  break;
                case "<<":
                case ">>":
                  AssignValCls = "b_err";
                  break;
                default:
                  AssignValCls = "offline";
                  break;
              }
              $(inpt).addClass(AssignValCls);
              assign = true;
            }
            if (assign) { assign = false;  break; }
          }
        }
      }

      //        STATION_ID
      //        ITEM_NAME
      //        VALUE
      //        FLAG
    }
//    $(".balaImg div").ready(function(e) {
    function setbashboardDatas() {
      var spanText1 = [] ,spanText2 = [];
      spanText1.length = 0;
      spanText2.length = 0;
      var div_ = $(".setposition");
      for (var x = 0; x < div_.length; x++) {
        var divCunt = $(".setposition")[x];
        for (var y = 0; y < $(divCunt).children('div').length; y++) {
          spanText1.push($(divCunt).find("div:nth-of-type(" + (y + 1) + ") span:nth-of-type(1)").text());
          spanText2.push($(divCunt).find("div:nth-of-type("+(y+1)+") span:nth-of-type(2)").text());
        }
      }
      //removing the same word on array
      var result = spanText1.filter(function(element, index, arr) {
        return arr.indexOf(element) === index;
      });
      var staId = result.join();
      var result = spanText2.filter(function(element, index, arr){
          return arr.indexOf(element) === index;
      });
      var itemName = result.join();
      //        console.log(staId);        
      console.log(itemName);      
      getbashboardDatas('全區供水調配','5', staId, itemName);
    };
    setbashboardDatas();
    setInterval(function(){ 
     setbashboardDatas();     
    }, 300000); //interval : 5 min
  </script>
   
  <!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
