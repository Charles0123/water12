<?php
require_once 'php/searchbase.php';
@session_start();
@$role = 0;
@$nam=$_SESSION['NAM'];
@$id=$_SESSION['ID'];
@$pw=$_SESSION['PW'];
@$date=$_SESSION['DAT'];
@$time=$_SESSION['TIM'];
$searchbase = getSearchBaseData();
if($nam == '') @$nam = $id;
if($id == '') $nam="訪客";
else
  @$role = 1;

?>
<!DOCTYPE html>
<html lang="zh_TW">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <title>數值查詢 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">

  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css">
  <link href="css/DataQuery.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.common-nova.min.css" />
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.nova.min.css" />
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.nova.mobile.min.css" />
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.common.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.rtl.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.default.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.mobile.all.min.css">
  <script src="js/jquery-1.12.4.min.js"></script>

  <link rel="stylesheet" href="./js/dygraphs/dygraph.css">
  
  <script src="./js/dygraphs/dygraph.js"></script>
  <script src="./js/dygraphs/dygraph.min.js"></script>

  <script type='text/javascript'>
    var jQuery1123 = jQuery.noConflict(true);

  </script>
<!--  <script src="searchbase-new.js"></script>-->
  <script type='text/javascript' src='js/jquery-2.1.0.min.js'></script>
  <script type='text/javascript' src='js/gen.js'></script>
  <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
  <script src="./js/parameter_def.js"></script>
  <script src="./js/script_inner.js"></script>
  <script src="./js/moment.min.js"></script>
  <script type="text/javascript" src="./js/dygraphs/dygraph.js"></script>
  <style>
    .query_multiplePanel td{padding: 0 !important;}
    #grid-trend{
       width: calc(100vw - 35vw);
      height: 400px;
      padding-top: 20px;
    }
    .dygraph-title {
      padding: 10px;
    }
    #legend {
      font-family: "DFHei Std";
      color: #222;
      font-size: 14px;
      float: right;
      width: 20%;
      padding-left: 30px;
    }
  </style>
</head>

<body onload="showtime(); AJAXforName(-1);">
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
          <li class=""><a href="#" class="m2"><img src="images/icons/btn-icon02a.png" />即時水情看板<span>Instant board</span></a>
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
          <li class="active"><a href="javascript:void(0);" class="m3"><img src="images/icons/btn-icon03a.png" />監控系統資訊<span>Monitoring system</span></a>
            <ul class="child_menu" style="">
              <li><a href="./DataQuery.php" class="active">
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
              <li><a href="./DataAnalyzeFlow.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  配水系統
                </a>
              </li>
              <li><a href="./DataReport.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  日常報表
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
                </a>
              </li>
            </ul>
          </li>
          <li class=""><a href="./rowmap.php" class="m4"><img src="images/icons/btn-icon04a.png" />網站地圖<span>Row Map</span></a></li>
        </ul>
      </nav>
      <!-- main_menu [end] -->
    </div>
  </header>
  <div class="bkg">
    <div class="query_header">
      <div id="channel1" class="query_header_content query_header_content-active"><img src="./images/icons/cala-01.png"><img src="./images/icons/cala-01a.png"><span class="f12px">列表</span></div>
      <div id="channel2" class="query_header_content"><img src="./images/icons/wave-02.png"><img src="./images/icons/wave-02a.png"><span class="f12px">趨勢圖</span></div>
      <div class="query_header_content"><img src="./images/icons/alarm-03.png"><img src="./images/icons/alarm-03a.png"><span class="f12px">警報值</span></div>
    </div>
    <div class="query_content_wrapper">
      <div class="query_content query_content query_content_show">
        <div class="query_content_search"><img src="./images/icons/serh.png">
          <input style="width: 30%; line-height: 30px;">
          <div class="checkmark"></div>
        </div>
        <div class="query_content_dataSelector">
          <div class="query_content_dataSelector_title f12px title">資料查詢選擇</div>
          <label onchange="AJAXforName(this.getElementsByTagName('input')[0].value)">
            <input type="radio" name="data" value="-1" checked>
            <div class="query_dataSelector_content f14px query_dataSelector_content-active">圖控</div>
          </label>
          <label onchange="AJAXforName(this.getElementsByTagName('input')[0].value)">
            <input type="radio" name="data" value="-2">
            <div class="query_dataSelector_content f14px ">小區</div>
          </label>
        </div>
        <div class="query_content_physicSelector" id="selectors1">
          <div class="query_physicSelector_title f12px title">物理量選擇</div>
          <div>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="全選">
              <div class="f14px">全選</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="瞬間流量">
              <div class="f14px">瞬間流量</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="累積流量">
              <div class="f14px">累積流量</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="餘氯">
              <div class="f14px">餘氯</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="濁度">
              <div class="f14px">濁度</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="pH">
              <div class="f14px">pH</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="溫度">
              <div class="f14px">溫度</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="導電度">
              <div class="f14px">導電度</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="水位">
              <div class="f14px">水位</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="壓力">
              <div class="f14px">壓力</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="電壓">
              <div class="f14px">電壓</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="電流">
              <div class="f14px">電流</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="功因">
              <div class="f14px">功因</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="功率">
              <div class="f14px">功率</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="瓦時">
              <div class="f14px">瓦時</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="開度">
              <div class="f14px">開度</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="其他">
              <div class="f14px">其他</div>
            </label>
          </div>
        </div>
        <div class="query_multiplePanel">
          <div class="query_multiplePanel_selectors">
            <div class="name" id="grid-name"></div>
            <div>
              <input id="search_stationid">
              <div class="stationid" id="grid-stationid"></div>
            </div>
            <div>
              <input id="search_dese">
              <div class="desc" id="grid-desc"></div>
            </div>
          </div>
          <div class="query_multiplePanel_add">
            <button onclick="addString('grid-desc')">加入</button>
          </div>
          <div class="query_multiplePanel_result">
            <div class="resulttitle">
              <div class="title f12px">已選擇的測站項目</div>
              <div class="clear" onclick="clearQueryCondition()"><img src="./images/icons/refresh_01.png"><span class="f12px">清除查詢條件</span></div>
            </div>
            <div>
              <input id="search_result">
              <div id="grid-result"></div>
            </div>
          </div>
        </div>
        <div class="query_content_timeInterval">
          <div class="query_content_timeInterval_title title f12px">統計時間間隔</div>
          <label class="query_content_timeInterval_content f14px query_dataSelector_content-active">
            <input type="radio" name="period1" value="now" checked>
            <div class="rounded">即時</div>
          </label>
          <label class="query_content_timeInterval_content f14px ">
            <input type="radio" name="period1" value="minute">
            <div class="rounded">分鐘</div>
          </label>
          <label class="query_content_timeInterval_content f14px">
            <input type="radio" name="period1" value="hour">
            <div class="rounded">每時</div>
          </label>
          <label class="query_content_timeInterval_content f14px">
            <input type="radio" name="period1" value="day">
            <div class="rounded">每日</div>
          </label>
        </div>
        <div class="query_content_date">
          <div class="query_content_date_title title f12px">選擇日期時間</div>
          <div>
            <input id="radiosys" type="radio" name="system" style="position: relative; top: 17px; margin:0; width:18px" disabled><label style="position: relative; top: 18px; margin:0; width:60px" for="radiosys" class="f12px">系統定義</label>
            <div class="system">
              <div class="inputblocker"></div>
              <label class="query_content_date_content f14px query_dataSelector_content-active">
                <input type="radio" name="data1" value="1" checked>
                <div class="rounded">近1日</div>
              </label>
              <label class="query_content_date_content f14px">
                <input type="radio" name="data1" value="7">
                <div class="rounded">近1周</div>
              </label>
              <label class="query_content_date_content f14px">
                <input type="radio" name="data1" value="30">
                <div class="rounded">近1月</div>
              </label>
              <label class="query_content_date_content f14px">
                <input type="radio" name="data1" value="365">
                <div class="rounded">近1年</div>
              </label>
            </div>
          </div>
          <div>
            <input id="radiodef" type="radio" name="system" style="position: relative; top: 17px; margin:0; width:18px" disabled><label style="position: relative; top: 18px; margin:0; width:60px" for="radiodef" class="f12px">自訂</label>
            <div class="datepicker" id="date1_1">
              <div class="inputblocker"></div>
            </div>
          </div>
        </div>
        <div class="fordata">
          <div id="dataQuery" class="f12px">資料查詢</div>
          <div class="f12px pt12" onclick="convertToExcel()">資料導出</div>
        </div>
<!-- kendoUI module-->
        <div id="grid"></div>
<!--        <div id="grid-trend"></div>-->

        <div id="grid-trend"></div>
        <div id="legend"></div>
      </div>
<!--      <div style="clear: both;"></div>-->
      <div class="query_content display-none height0"></div>
      <div class="query_content display-none query-warning">
        <div class="query_content_physicSelector" id="selectors2">
          <div class="query_physicSelector_title f12px title">物理量選擇</div>
          <div>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="全選">
              <div class="f14px">全選</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="瞬間流量">
              <div class="f14px">瞬間流量</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="累積流量">
              <div class="f14px">累積流量</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="餘氯">
              <div class="f14px">餘氯</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="濁度">
              <div class="f14px">濁度</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="pH">
              <div class="f14px">pH</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="溫度">
              <div class="f14px">溫度</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="導電度">
              <div class="f14px">導電度</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="水位">
              <div class="f14px">水位</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="壓力">
              <div class="f14px">壓力</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="電壓">
              <div class="f14px">電壓</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="電流">
              <div class="f14px">電流</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="功因">
              <div class="f14px">功因</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="功率">
              <div class="f14px">功率</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="瓦時">
              <div class="f14px">瓦時</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="開度">
              <div class="f14px">開度</div>
            </label>
            <label class="query_physicSelector_content">
              <input type="checkbox" value="其他">
              <div class="f14px">其他</div>
            </label>
          </div>
        </div>
        <div class="query_content_timeInterval wrt">
          <div class="query_content_timeInterval_title title f12px">統計時間間隔</div>
          <label class="query_content_timeInterval_content f14px">
            <input type="radio" name="period1_alarm" value="now" checked>
            <div class="rounded">即時</div>
          </label>
          <label class="query_content_timeInterval_content f14px query_dataSelector_content-active">
            <input type="radio" name="period1_alarm" value="history">
            <div class="rounded">歷史</div>
          </label>
        </div>
        <div class="query_content_date">
          <div class="query_content_date_title title f12px">選擇日期時間</div>
          <div>
            <input id="radiosyswrt" type="radio" name="system" style="position: relative; top: 17px; margin:0; width:18px" disabled><label style="position: relative; top: 18px; margin:0; width:60px" for="radiosyswrt" class="f12px">系統定義</label>
            <div class="system">
              <div class="inputblocker"></div>
              <label class="query_content_date_content f14px query_dataSelector_content-active">
                <input type="radio" name="data1" value="1" checked>
                <div class="rounded">近1日</div>
              </label>
              <label class="query_content_date_content f14px">
                <input type="radio" name="data1" value="7">
                <div class="rounded">近1周</div>
              </label>
              <label class="query_content_date_content f14px">
                <input type="radio" name="data1" value="30">
                <div class="rounded">近1月</div>
              </label>
              <label class="query_content_date_content f14px">
                <input type="radio" name="data1" value="365">
                <div class="rounded">近1年</div>
              </label>
            </div>
          </div>
          <div>
            <input id="radiodefwrt" type="radio" name="system" style="position: relative; top: 17px; margin:0; width:18px" disabled><label style="position: relative; top: 18px; margin:0; width:60px" for="radiodefwrt" class="f12px">自訂</label>
            <div class="datepicker" id="date1_1_alarm">
              <div class="inputblocker"></div>
            </div>
          </div>
        </div>
        <div class="fordata">
          <div id="dataQueryAlarm" class="f12px" onclick="dataQueryAlarm()">資料查詢</div>
          <div class="f12px pt12" onclick="convertToExcel_alarm()">資料導出</div>
        </div>
        <div id="grid-alarm"></div>
        <div class="description">
          <div class="f12px">標準差算法: HI、LO使用兩倍標準差;HIHI、LOLO使用三倍標準差</div>
          <div class="f12px">水壓、水量當系統未設定警報值時，改使用標準差計算</div>
        </div>
      </div>
    </div>
    <div id="spinner_" style="position: absolute; top: 50vh; left: 50vw;"><i  class="fa fa-spinner fa-pulse fa-4x fa-fw" style="color: #33b9ff; font-size: 70px; margin:0 auto; width: auto;"></i></div>
    <div class="temp">
      <input type="hidden" id="district" value="-1">
      <input type="hidden" id="city">
      <input type="hidden" id="cityCh">
      <input type="hidden" id="station_id">
      <input type="hidden" id="tag_id">
      <input type="hidden" id="period" value="now">
      <input type="hidden" id="start" placeholder="start">
      <input type="hidden" id="end" placeholder="end">
      <input type="hidden" id="station_id_for_query">
      <input type="hidden" id="desc">
      <input type="hidden" id="combined_string">
      <input type="hidden" id="combined_string2">
    </div>
  </div>

  <?php include_once "./php/footer.php";?>

  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>

  <script type="text/javascript" src="./js/bootstrap-slider.min.js"></script>
  <script type="text/javascript" src="./js/nicescroll.js"></script>
  <script type="text/javascript" src="./js/script.js"></script>

  <script src="./js/kendo.all.js"></script>
  <script src="https://kendo.cdn.telerik.com/2019.2.514/js/angular.min.js"></script>
  <script src="https://kendo.cdn.telerik.com/2019.2.514/js/jszip.min.js"></script>
  <script src="js/DataQuery.js"></script>
  <script src="./js/moment.min.js"></script>
  <script>
    var xx_temp = <?php echo $searchbase?>;
    var string = JSON.stringify(xx_temp);
    var searchbase = JSON.parse(string); 
    $(".pos_right > span").text("<?php echo $nam?>");    
    $("input[name=idn]").val("<?php echo $id?>");
    var idn = $("input[name=idn]").val();
    document.addEventListener("mousewheel", function() {
      lastClickedGraph = null;
    }, false);
    document.addEventListener("click", function() {
      lastClickedGraph = null;
    }, false);
      
    $(document).ready(function() {      
      $('#spinner_').css({"display":"none"});
      var days_ = 1;
      var currentDate = moment().format('YYYY/MM/DD HH:mm:ss');
      var beforetDate = moment().subtract(days_, 'days').format('YYYY/MM/DD HH:mm:ss');

      $("#end").val(currentDate);
      $("#start").val(beforetDate);

      $(".query_content_timeInterval label").on("click", function(e) {  
        var x = $(this).index();
        switch (x) {
          case 1: {
            $("#end").val(currentDate);
            $("#start").val(beforetDate);
            if($("#channel1").hasClass('query_header_content-active')) {
              $("#radiosys").prop("disabled", true).prop("checked", false);
              $("#radiodef").prop("disabled", true).prop("checked", false); $(".system").find('input[type="radio"]').prop("checked", true);
              $("#radiosys").closest("div").find(".system").find(".rounded").css({"backgroundColor": "gainsboro"});
              console.log(12);              
            }
            
            break;
          }
          case 2: {
//            if($("#channel1").hasClass('query_header_content-active')) {
              $("#radiodef").prop("disabled", true).prop("checked", false);
              $("#radiosys").prop("disabled", true).prop("checked", true);
              $("#radiosys").closest("div").find(".system").find(".rounded").not(":first").css({"backgroundColor": "gainsboro"});
              $("#radiosys").closest("div").find(".system").find(".rounded").not(":first").css({"cursor": "default"});
              $("#radiosys").closest("div").find(".system").find("[name='data1']").not(":first").prop("disabled", true);
              $("#radiosys").closest("div").find(".system").find("[name='data1']:first").prop("checked", true);
//              $(".query_content_date").eq(0).find("input[name='system']").prop("checked",true);
//            }
            break;
          }
          default: {
            $("#radiosys").prop("disabled", false);
            $("#radiodef").prop("disabled", false); 
            $("#radiosys").closest("div").find(".system").find(".rounded").css({"backgroundColor": ""});
            $("#radiosys").closest("div").find(".system").find(".rounded").css({"cursor": "pointer"});
            $("#radiosys").closest("div").find(".system").find("[name='data1']").prop("disabled", false);
//            $(".system").find('input[type="radio"]').prop("checked", true);
            console.log(45);
          }
        }        
      });
      
      $(".query_content_timeInterval.wrt label").on("click", function(e) {
        var x = $(this).index();
        if (x == 1) {
          $("#radiosyswrt, #radiodefwrt").attr("disabled", true);
          $("#end").val(currentDate);
          $("#start").val(beforetDate);
          $("#radiosyswrt").removeAttr("checked");
          $("#radiodefwrt").removeAttr("checked");
        } else {
          $("#radiosyswrt, #radiodefwrt").removeAttr("disabled");

        }
      });
      $("#channel1").on('click', function(){  
       $(".query_content_timeInterval label:nth-of-type(1)").find(".rounded").css({"backgroundColor": "","cursor": "pointer"});
       $(".query_content_timeInterval label:nth-of-type(1)").find("input").prop("disabled",false);
      });
      $("#channel2").on('click', function(){  
       $(".query_content_timeInterval label:nth-of-type(1)").find(".rounded").css({"backgroundColor": "gainsboro","cursor": "default"});
       $(".query_content_timeInterval label:nth-of-type(1)").find("input").prop("disabled",true);
       $(".query_content_timeInterval label:nth-of-type(2)").click();
      });
      
      
    });

  </script>
</body>

</html>
