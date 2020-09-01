<?php
@session_start();
@$role = 0;
@$nam=$_SESSION['NAM'];
@$id=$_SESSION['ID'];
@$pw=$_SESSION['PW'];
@$date=$_SESSION['DAT'];
@$time=$_SESSION['TIM'];
if($nam == '') $nam = $id;
if($id == '') $nam="訪客";
else
  @$role = 1;
?>
<!DOCTYPE html>
<html lang="zh_TW">

<head>
  <!--  盟立Tgos key-->
        <script type="text/javascript" src="http://api.tgos.nat.gov.tw/TGOS_API/tgos?ver=2&AppID=HtWEn7rGKai5jJXB8CROnx03ozZ6ryH5Hhodgcu8Hapr88o1v1UWtA==&APIKey=cGEErDNy5yN/1fQ0vyTOZrghjE+jIU6uC++82hvGAgOqmNqscqzzTWOS1kbAIFq7/bkUEPuVMqaM0Fi8yuUCFh1xMOhIrazlEdUMkcSbC/BgRCWv4qPgSSCmWSgLtHgfOFrfKJeVy6jj2NsNPp3rUHeZsVk0ak6ymIBYCuHkkRukgTLkget/ZuS+kJ5CXvJb7ztEiRG1PuHCCacDtfg2F5Li7d+6WE7KMossbgzGP0GA0yCXwlFfRdXTTDPQjh8ClFLGQtyMPhT43gtaO4K5t5BoIIDi9H1NCNudwxekACkzMuTSa8wuV57SymnPNkX0cnlYyYBG4bKZ4GJjGP2yJk6nM0nDtsGMOPz6lZdNy6qtneTP1I6IPOWPg8WtXPqYwaaV4DTxE5c=" charset="utf-8"></script>
<!--  <script type="text/javascript" src="http://api.tgos.nat.gov.tw/TGOS_API/tgos?ver=2&AppID=7ihe5D1S7sQQEbTEc3ilpmtCKih3hbL0t5Qn2csKd7j9J5KQNOeNMQ==&APIKey=cGEErDNy5yN/1fQ0vyTOZrghjE+jIU6uza67feFeGFD5CdZ9BVMgvp0l00d8lCdzyJRJQGfn2mrP/NCwhHbX3aLgYL7t3sSytocBn4TEcZ8YJDqK0BWvcuQcx9Yr6JM5qnh/+67GZKUY2WhePMMVk+rJdBBZ17Lgq82wHjYHVVNWQ1fc9PkUIpKgKJ3OwfskvmVfx4F73Ubcq3AF1noEfEYgkJR6aYGfjsnw44WXMDwAED9onj3QPmGSohK/Jb6/Ayw9Y+yj48fg5qkMeAAqnSGXRFSIIhNjfk828xOKDtI1JO+9Si13BbTH3j51ZG/wntYnRquKougD4Y31Zm4W7kBvTzBp6LyH" charset="utf-8"></script>-->
  <!-- development -->
  <meta charset="utf-8">
  <!--        <meta name="viewport" content="width=device-width, initial-scale=1"/>-->
  <!-- 禁止手機放大-->
  <!--  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>-->
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
  <title>管理頁面 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2020.1.219/styles/kendo.default-v2.min.css" />
  <link rel="stylesheet" href="css/kendoUI.css" type="text/css" />
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <!-- Owl Stylesheets -->
  <link rel="stylesheet" href="js/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="js/owlcarousel/assets/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/style_inner.all.css" type="text/css">
  <link rel="stylesheet" href="css/style_inner.css" type="text/css">
  <link rel="stylesheet" href="css/gen.css" type="text/css">
  <link rel="stylesheet" href="css/animate.min.css" type="text/css">
  <link rel="stylesheet" href="css/mapview.css">
  <link href="https://vjs.zencdn.net/7.6.0/video-js.css" rel="stylesheet">
  <!--    <link href="./css/videoJS.css" rel="stylesheet">-->

  <script src="./js/jquery-1.12.4.min.js"></script>
  <link rel="stylesheet" href="./js/video/video-js.css" rel="stylesheet">
  <script type='text/javascript'>
    var jQuery1123 = jQuery.noConflict(true);

  </script>
  <script type='text/javascript' src='js/jquery-2.1.0.min.js'></script>
  <script type='text/javascript' src='js/gen.js'></script>
  <script type='text/javascript' src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
  <script type='text/javascript' src="./js/parameter_def.js"></script>
  <script type='text/javascript' src="./js/script_inner.js"></script>
  <script type='text/javascript' src="./js/mapBanxin.js"></script>
  <!--  <script type='text/javascript' src='./js/video/video.js'></script>-->

  <link rel="stylesheet" href="css/bootstrap-slider.css" type="text/css">
  <script src="js/bootstrap-slider.js"></script>
  <script id="responsive-column-template" type="text/x-kendo-template">
    <strong>Contact Name</strong>
        <p class="col-template-val">#=data.DATE_TIME#</p>

        <strong>Contact Title</strong>
        <p class="col-template-val">#=data.ITEM_NAME#</p>

        <strong>Company Name</strong>
        <p class="col-template-val">#=data.MEASURE#</p>

        <strong>Country</strong>
        <p class="col-template-val">#=data.VALUE#</p>

    </script>
  <style>
    .col-template-val {
      margin: 0 0 1em .5em;
    }

  </style>
  <link rel="stylesheet" href="./css/font-awesome.css">
  <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet'>
  <style>
    /* 物理量篩選class */
    .k-animation-container {
      width: 200px !important;
    }

    /* gen.css 
          .modal-table .tab-pane table tr td  
          該條件有修改過
          */
    /* kendo UI 行列配對各條件底色 N、>、<、>>、<< */

    #grid .green,
    #grid-data .green,
    #legend_grid tr[data-uid].green {
      background: #073469 !important;
      color: white;
    }

    #grid .green>td:nth-of-type(5),
    #grid-data .green>td:nth-of-type(4),
    #gridalarm .green>td:nth-of-type(5),
    #legend_grid .green>td:nth-of-type(4) {
      color: rgb(0, 255, 1) !important;
    }

    #grid .yellow,
    #grid-data .yellow, 
    #legend_grid .yellow {
      background: #073469 !important;
      color: white;
    }

    #grid .yellow>td:nth-of-type(5),
    #grid-data .yellow>td:nth-of-type(4),
    #gridalarm .yellow>td:nth-of-type(5),
    #legend_grid .yellow>td:nth-of-type(4) {  
      color: rgb(253, 255, 0) !important;
    }

    #grid .red,
    #grid-data .red, 
    #legend_grid .red {
      background: #073469 !important;
      color: white;
    }

    #grid .red>td:nth-of-type(5),
    #grid-data .red>td:nth-of-type(4),
    #gridalarm .red>td:nth-of-type(5),
    #legend_grid .red>td:nth-of-type(4) {
      color: rgb(253, 0, 2) !important;
    }

    #grid .white,
    #grid-data .white, 
    #legend_grid .white {
      background: grey !important;
      color: white;
    }

    #grid .white>td:nth-of-type(5),
    #grid-data .white>td:nth-of-type(4),
    #gridalarm .white>td:nth-of-type(5),
    #legend_grid .white>td:nth-of-type(4) {
      color: white !important;
    }

    #ann_box .yellow {
      color: rgb(253, 255, 0);
      background: transparent !important;
    }

    #ann_box .green {
      color: rgb(0, 255, 1);
      background: transparent !important;
    }

    #ann_box .gray {
      color: gray;
      background: transparent !important;
    }

    #ann_box .red {
      color: #073469;
      background: transparent !important;
    }

    .allSections {
      left: 42px !important;
      top: 42px !important;
      width: 138px !important;
    }

    .allSections>a {
      display: none;
    }

    a {
      cursor: pointer;
    }

    .lay2>ul {
      display: none;
    }

    .lay2ulshow {
      display: block;
    }

    #ex1Slider .slider-selection {
      background: #BABABA;
    }

    .k-grid-filter.k-state-active {
      background-color: transparent !important;
    }

    .slidecontainer {
      width: 100%
    }

    .messageBox sup::after {
      display: initial;
    }

    .nameWindowInfo {
      border: 0px !important;
      border-radius: 4px !important;
      overflow: hidden !important;
      height: 28px !important;
      background-color: rgba(255, 255, 255, 0.0) !important;
      height: 20px !important;
      padding-top: 2px !important;
      width: auto;
      font-size: 12px !important;
    }

    .nameWindowInfo>div {
      width: 100% !important;
      margin: 0 !important;
    }

    .nameWindowInfo>div>p {
      /*            color: white;*/
      color: rgb(7, 52, 105);
      text-align: center;
    }

    .nameWindowInfo+img {
      display: none !important;
    }

    .nameWindowInfo+img+div {
      display: none !important;
    }
    .corner {
      max-height: 275px;
      overflow: auto;
      background-color: #f6f6f6bf;
    }
    .messageBoxOpened {
      margin: 0px !important;
      margin-top: 10px !important;  
      background-color: #fff !important;
      height: auto; width: 180px !important;
      border-bottom: 4px solid #33f3ff !important;
    }

    .messageBoxOpened>p {
      margin: 0px !important;
    }
    .messageBoxOpened div div:first-child {
      padding-bottom: 0px !important;
      margin: 0px !important;
    }
    .messageBoxOpened div {
       padding: 0 10px; 
    }
    .messageBox {
      /*            border: 0px !important;*/
/*      background-color: transparent !important;*/
      background-color: #fff !important;
      border-radius: 7px !important;
      height: auto !important;
      width: auto !important;
      box-shadow: 4px 4px 10px #a5abad !important;
    }

    .messageBox>div {
      position: relative !important;
      /* max-height: 300px !important; */
      /*             width: 106px !important; */

    }
    .messageBox+img {
      display: none !important;
    }
    .messageBox~div {
      cursor: pointer !important;
    }
    .infoWindowbtn{
      background: rgba(179,220,237,1);
      position: relative; padding:4px; width:90%; margin:4px auto;left: 7px;
      background: -moz-linear-gradient(top, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
      background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(179,220,237,1)), color-stop(50%, rgba(41,184,229,1)), color-stop(100%, rgba(188,224,238,1)));
      background: -webkit-linear-gradient(top, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
      background: -o-linear-gradient(top, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
      background: -ms-linear-gradient(top, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
      background: linear-gradient(to bottom, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b3dced', endColorstr='#bce0ee', GradientType=0
    }
    .basicDataMessageBox>div div {}

    .basicDataMessageBox {
      width: 300px !important;
      max-height: 230px !important;
      border-radius: 0px !important;
    }

    .basicDataMessageBox>div>p {
      margin: 0px !important;
    }

    .basicDataMessageBox>div {
      position: relative !important;
      margin: 0px !important;
      background-color: #33b9ff !important;
      /* width: 106px !important; */
    }

    .basicDataMessageBox>div>div>div {
      font-size: 12px !important;
      /* height: 36px; */
      /* border-bottom:3px solid #33f3ff !important; */
      /* background-color: rgb(51, 185, 255) !important; */
      width: 82%;
      margin: auto !important;
      border-bottom: #37a5ff 2px solid;
      padding-top: 6px;
      padding-bottom: 6px;
    }

    .basicDataMessageBoxHeader {
      padding-top: 0px;
      padding-bottom: 0px;
      line-height: 36px;
      background-color: black !important;
      color: white !important;
      text-align: center;
      border-bottom: 0px;
      width: 100% !important;
    }

    .basicDataMessageBox>div>div>div>div:nth-of-type(1) {
      color: black !important;
      /* border-bottom:3px solid #33f3ff !important; */
      /* background-color: rgb(51, 185, 255) !important; */
    }

    .basicDataMessageBox>div>div>div>div:nth-of-type(2) {
      color: white !important;
    }

    .basicDataMessageBox+img {
      display: none !important;
    }

    .messageBox+img {
      display: none !important;
    }

    /* .searchUnit-header{
            color: white;
            background-color: rgba(30, 144, 255, 1);
        } */

    .k-header {
      color: white !important;
      background-color: rgba(25, 120, 213, 1) !important;
    }

    .k-state-hover {
      background-color: rgba(30, 144, 255, 1) !important;
    }

    .k-dropdowngrid-popup .k-item {
      background-color: white;
    }

    #pLevelBarBar {
      top: 132px !important;
    }

    /*      比例尺*/
    .scaleBarName {
/*      top: 140px !important;*/
    }

    .scaleBarName {
/*
      background-color: rgba(255, 255, 255, 0.8);
      font-size: 14px;
      padding: 0 5px;
*/
    }
    /*      固定座標*/
    .coordinateshower {
      position: absolute !important;  
      top: 222px !important;  
      right: 0px !important;
      background-color: white !important;
      opacity: 0.8;
      width: 173px;
      text-align: left;
      font-size: 14px;
      padding: 10px;
      margin-right: 0;      
    }

    .coordinateshower p {
      line-height: 17px;
      margin: 2px;
    }

    .coordinateshower p:nth-of-type(even) {
      padding-left: 5px;
    }  
    .ui-front {
/*      z-index: 400 !important;*/
  }
    @media screen and (max-width: 850px) {
      .child_menu {
        display: none;
      }
    }

    
    
    #template_dummy {
      margin: auto;
      width: 100% !important;      
    }

    .power div:hover {
      cursor: pointer;
    }
    
    .k-combobox .k-dropdown-wrap .k-clear-value {
      top: 14px !important;
    }
    
   
    
   
  </style>
  <style id="markerName">
    .test {
      position: absolute;
    }

  </style>
</head>

<body onload="InitWnd(); showtime();">
 
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
    <div class="mobile_mask">
      <div id="template_dummy"></div>
      <script id="legend_grid_template" type="text/x-kendo-template">
        <div id="legend_grid"></div> 
      </script>
    </div>
    <div class="search" style="display:none">
      <div class="row">
        <div class="col-sm-12">
          <div class="demo-section k-content">
<!--            <?php require_once './php/searchbase.php'?>-->
            <input id="customers" style="width: 100%;">
          </div>
          <!--                      <i class="fa fa-spinner fa-pulse fa-4x fa-fw" style="color: #33b9ff;"></i>-->
        </div>
      </div>
    </div>
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
          <li class="active">
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
              <li class="active">
                <a href="./WaterBanxinScr.php" class="active">
                  <div class="pic"><img src="images/m1.png" /></div>
                  板新供水
                </a>
                <div class="show_banxioverview">
                  <a href="./mapBanxin.php" class="active"><div class="pic"><img src="images/m2.png" /></div>板新調配總覽</a>
                </div>
              </li>              
               <li><a href="./WaterOfMainPipe.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  八大管線
                </a></li>
<!--
              <li>
                <a href="./WaterLevel.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  水位總覽圖
                </a>
              </li>
-->
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
          <li>
            <a href="javascript:void(0);" class="m4"><img src="images/icons/btn-icon04a.png" />綜合資訊<span>Comprehensive</span></a>
            <ul class="child_menu" style="">
              <li>
                <a href="./DisasterInfo.php" class="">
                  <div class="pic"><img src="images/m1.png" /></div>
                  防災專區
                </a>
              </li>
              <li>
                <a href="./operation.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  手冊專區
                </a>
              </li>
              <li>
                <a href="./ExtraLinking.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  外部連結
                </a>
              </li>
            </ul>
          </li>
          <li class="">
            <a href="./rowmap.php" class="m4"><img src="images/icons/btn-icon04a.png" />網站地圖<span>Row Map</span></a>
          </li>
        </ul>
      </nav>
      <!-- main_menu [end] -->
      <nav class="map_menu right right-nav">
        <ul>
          <li class="active">
            <button href="#" id="tgos_st" class="map1">
              <img src="images/r1.png" />
              街道圖</button>
          </li>
          <li>
            <button type="button" class="map2" id="nlsc_elev">
              <img src="images/r2.png" />
              高程圖</button>
          </li>
          <li>
            <button type="button" class="map3" id="nlsc_dom">
              <img src="images/r3.png" />
              衛星圖</button>
          </li>
          <li>
            <button type="button" class="map4" id="nlsc_topo">
              <img src="images/r4.png" />
              地形圖</button>
          </li>
        </ul>
      </nav>
    </div>
  </header>     
  <!-- <div id="alpha_wms"><div id="slider" title="調整圖台透明度"> <div id="custom-handle" class="ui-slider-handle" style="cursor: pointer"></div> </div></div> -->
  <!--document.getElementById('Elev_ITM').value = '*';-->
  <!--快速選單-->
  <nav id="left_nav1" class="left-nav left_nav">
    <div class="menu_title">
      <span>快速選單</span>
      <a href="" class="left_close"></a>
      <a href="#" class="trigger">
        <img src="images/left1.png" />
      </a>
    </div>
    <a href="#" class="exit">CANCEL</a>
    <ul class="top_left_menu">
      <!-- 全區供水 -->
      <li class="">
        <!--暫移除按下全區供水就必須強制執行總覽項-->
        <a href="#" class="map1" onclick="">全區供水</a>
        <ul class="left_sub_menu">
          <li class="active">
            <a href="#" class="" id="generalLook" onclick=" javascript: this.firstElementChild.click();">總覽<input type="hidden" id="Elev_ITM_0" value="*" name="elev_itm">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整<span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_Elev_ITM_0" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a>
            <img src="images/icons/arrow1.png"><img src="images/icons/arrow1a.png">
          </li>
          <li>
            <a href="#" onclick="javascript:this.firstElementChild.click();">板新給水廠<input type="hidden" id="Elev_ITM_1" value="2" name="elev_itm">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_Elev_ITM_1" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a><img src="images/icons/arrow1.png"><img src="images/icons/arrow1a.png">
          </li>
          <li>
            <a href="#" onclick="javascript:this.firstElementChild.click();">鶯歌服務所<input type="hidden" id="Elev_ITM_2" value="3" name="elev_itm">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_Elev_ITM_2" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a><img src="images/icons/arrow1.png"><img src="images/icons/arrow1a.png">
          </li>
          <li>
            <a href="#" onclick="javascript:this.firstElementChild.click();">樹林服務所<input type="hidden" id="Elev_ITM_3" value="4" name="elev_itm">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_Elev_ITM_3" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a><img src="images/icons/arrow1.png"><img src="images/icons/arrow1a.png">
          </li>
          <li>
            <a href="#" onclick="javascript:this.firstElementChild.click();">土城服務所<input type="hidden" id="Elev_ITM_4" value="5" name="elev_itm">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_Elev_ITM_4" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a><img src="images/icons/arrow1.png"><img src="images/icons/arrow1a.png">
          </li>
          <li>
            <a href="#" onclick="javascript:this.firstElementChild.click();">新莊服務所<input type="hidden" id="Elev_ITM_6" value="6" name="elev_itm">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_Elev_ITM_6" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a><img src="images/icons/arrow1.png"><img src="images/icons/arrow1a.png">
          </li>
          <li>
            <a href="#" onclick="javascript:this.firstElementChild.click();">板橋服務所<input type="hidden" id="Elev_ITM_5" value="7" name="elev_itm">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_Elev_ITM_5" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a><img src="images/icons/arrow1.png"><img src="images/icons/arrow1a.png">
          </li>
          <li>
            <a href="#" onclick="javascript:this.firstElementChild.click();">泰山營運所<input type="hidden" id="Elev_ITM_8" value="8" name="elev_itm">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_Elev_ITM_8" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a><img src="images/icons/arrow1.png"><img src="images/icons/arrow1a.png">
          </li>
          <li>
            <a href="#" onclick="javascript:this.firstElementChild.click();">蘆洲服務所<input type="hidden" id="Elev_ITM_7" value="9" name="elev_itm">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_Elev_ITM_7" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a><img src="images/icons/arrow1.png"><img src="images/icons/arrow1a.png">
          </li>
          <li>
            <a href="#" onclick="javascript:this.firstElementChild.click();">北水<input type="hidden" id="Elev_ITM_9" value="10" name="elev_itm">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_Elev_ITM_9" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a><img src="images/icons/arrow1.png"><img src="images/icons/arrow1a.png">
          </li>
        </ul>

      </li>
      <!-- 供水系統 -->
      <li>
        <a href="#" class="map2 distr2" onclick="">供水系統</a>
        <ul class="left_sub_menu">
          <li>
            <a href="#" class="" onclick="document.getElementById('Elev_ITM_2').click();leftItemMenuClick(0)">鶯歌服務所<input type="hidden" id="Sup_ITM_1" value="1" placeholder="3" name="sup_itm">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_Sup_ITM_1" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" name="Elev_ITM_2" onchange="setWmsOpacity(this.name, this.value)" /></div>
              </div>
              <img src="images/icons/arrow1.png">
              <img src="images/icons/arrow1a.png">
            </a>
            <ul class="left_item_menu" name="Sub_item" onclick="getelevData(this);JSAJAX(dataSupplyUrlComposer(), true);">
              <li><a class="active">鶯歌區供水全覽圖<input type="hidden" value="1" name="Sub_item"></a></li>
              <li><a>忠義供水系統<input type="hidden" value="2"></a></li>
              <li><a>國際供水系統<input type="hidden" value="3"></a></li>
              <li><a>成福供水系統<input type="hidden" value="4"></a></li>
            </ul>
          </li>
          <li>
            <a href="#" onclick="document.getElementById('Elev_ITM_3').click();leftItemMenuClick(1)">樹林服務所<input type="hidden" id="Sup_ITM_2" value="2" placeholder="4" name="sup_itm">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_Sup_ITM_2" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" name="Elev_ITM_3" onchange="setWmsOpacity(this.name, this.value)" /></div>
              </div>
              <img src="images/icons/arrow1.png">
              <img src="images/icons/arrow1a.png">
            </a>
            <ul class="left_item_menu" name="Sub_item" onclick="getelevData(this);JSAJAX(dataSupplyUrlComposer(), true);">
              <li><a class="active">樹林區供水全覽圖<input type="hidden" value="1"></a></li>
              <li><a>三興供水系統<input type="hidden" value="2"></a></li>
              <li><a>大慶供水系統<input type="hidden" value="3"></a></li>
              <li><a>獅子供水系統<input type="hidden" value="4"></a></li>
              <li><a>民和供水系統<input type="hidden" value="5"></a></li>
              <li><a>信和供水系統<input type="hidden" value="6"></a></li>
              <li><a>迴龍供水系統<input type="hidden" value="7"></a></li>
              <li><a>備內供水系統<input type="hidden" value="8"></a></li>
            </ul>
          </li>
          <li><a href="#" onclick="document.getElementById('Elev_ITM_4').click();leftItemMenuClick(2)">土城服務所<input type="hidden" id="Sup_ITM_3" value="3" placeholder="5" name="sup_itm">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_Sup_ITM_3" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" name="Elev_ITM_4" onchange="setWmsOpacity(this.name, this.value)" /></div>
              </div>
              <img src="images/icons/arrow1.png">
              <img src="images/icons/arrow1a.png">
            </a>
            <ul class="left_item_menu" name="Sub_item" onclick="getelevData(this);JSAJAX(dataSupplyUrlComposer(), true);">
              <li><a class="active">土城區供水全覽圖<input type="hidden" value="1"></a></li>
              <li><a>青雲供水系統<input type="hidden" value="2"></a></li>
              <li><a>南天供水系統<input type="hidden" value="3"></a></li>
              <li><a>清水供水系統<input type="hidden" value="4"></a></li>
              <li><a>龍泉供水系統<input type="hidden" value="5"></a></li>
            </ul>
          </li>
          <li><a href="#" onclick="document.getElementById('Elev_ITM_8').click();leftItemMenuClick(3)">泰山營運所<input type="hidden" id="Sup_ITM_6" value="6" placeholder="8" name="sup_itm"><span class="sbar"></span>
              <span class="sbar"><img src="images/left11.png" /></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_Sup_ITM_6" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" name="Elev_ITM_8" onchange="setWmsOpacity(this.name, this.value)" /></div>
              </div>
              <img src="images/icons/arrow1.png">
              <img src="images/icons/arrow1a.png">
            </a>
            <ul class="left_item_menu" name="Sub_item" onclick="getelevData(this);JSAJAX(dataSupplyUrlComposer(), true);">
              <li><a class="active">泰山區供水全覽圖<input type="hidden" value="1"></a></li>
              <li><a>凌雲供水系統<input type="hidden" value="2"></a></li>
              <li><a>水供水系統<input type="hidden" value="3"></a></li>
              <li><a>泰林供水系統<input type="hidden" value="4"></a></li>
              <li><a>同榮供水系統<input type="hidden" value="5"></a></li>
              <li><a>義學供水系統<input type="hidden" value="6"></a></li>
              <li><a>壟鉤供水系統<input type="hidden" value="7"></a></li>
              <li><a>25000T供水系統<input type="hidden" value="8"></a></li>
            </ul>
          </li>
          <li><a href="#" onclick="document.getElementById('Elev_ITM_7').click();leftItemMenuClick(4)">蘆洲服務所<input type="hidden" id="Sup_ITM_5" value="5" placeholder="9" name="sup_itm"><span class="sbar"></span>
              <span class="sbar"><img src="images/left11.png" /></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_Sup_ITM_5" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" name="Elev_ITM_7" onchange="setWmsOpacity(this.name, this.value)" /></div>
              </div>
              <img src="images/icons/arrow1.png">
              <img src="images/icons/arrow1a.png">
            </a>
            <ul class="left_item_menu" name="Sub_item" onclick="getelevData(this);JSAJAX(dataSupplyUrlComposer(), true);">
              <li><a class="active">蘆洲區供水全覽圖<input type="hidden" value="1"></a></li>
              <li><a>新龍供水系統<input type="hidden" value="2"></a></li>
              <li><a>觀音山供水系統<input type="hidden" value="3"></a></li>
              <li><a>長坑供水系統<input type="hidden" value="4"></a></li>
              <li><a>長道坑供水系統<input type="hidden" value="5"></a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
    <!-- 物理量 -->
    <style>
      .Elev_lay2 {
        position: absolute;
        left: 280px;
        top: 87px;
      }

    </style>
    <div class="Elev_lay2" style="display:none">
      <ul class="cancel multipleChoice">
        <li class="state allsitecontrol1">
          <a class="allsitecontroll" id="allsitecontroll" onclick="allSiteControll(this,'allsitecontroll')">
            <div class="img"><img src="images/icons/menu-sub1.png"><img src="images/icons/menu-sub1a.png"></div>
            <p style="margin-bottom: 0px;">全部場站</p>
          </a>
        </li>
        <li class="state importantsitecontroll active">
          <a id="importantSite" onclick="javascript:this.firstElementChild.click();">
            <div class="img"><img src="images/icons/menu-sub2.png"><img src="images/icons/menu-sub2a.png"></div>
            <p style="margin-bottom: 0px;">重要場站</p>
          </a>
        </li>
        <li id='physicQuantities' onclick="physicConditionState(this)">
          <div class=" " style="" onclick="serviceControll(this, true)">
            <a><input id="Elev_STA" name="elev_sta" value="廠所" type="hidden"><img src="images/icons/showHouse.png">廠所<span></span></a>
          </div>
          <div class="" style="">
            <a onclick="javascript:this.firstElementChild.click();activeCheck(this.parentElement);"><input id="Elev_DP" name="elev_msr" value="進出水點" type="hidden"><img src="images/icons/menu-sub-1.png">進出水點<span></span></a>
          </div>
          <div>
            <a onclick="javascript:this.firstElementChild.click();activeCheck(this.parentElement); actFlowbtn('water')"><input id="Elev_WT" name="elev_msr" value="水量" type="hidden" data-floatCount-legend="WaterVolume"><img src="images/icons/menu-sub-2.png">水量<span></span></a>
            <div class="water" style="position:absolute; right: -160px; top:200px; width: 160px;">
              <a onclick="flowmeter('water')"><input id="" name="elev_flow_meter" value="流量計" data-legend="water" type="hidden" data-floatCount-legend="flowMeter"><img src="images/icons/menu-sub-10.png">流量計<span></span></a>
            </div>
          </div>          
          <div>
            <a onclick="javascript:this.firstElementChild.click();activeCheck(this.parentElement);actFlowbtn('pressure')"><input id="Elev_PM" name="elev_msr" value="水壓" type="hidden" data-floatCount-legend="pressureGag"><img src="images/icons/menu-sub-3.png">水壓<span></span></a>
            <div class="pressure" style="position:absolute; right: -160px; top:247px;width: 160px;">
              <a onclick="flowmeter('pressure')"><input id="" name="elev_flow_meter" value="壓力計" data-legend="pressure" type="hidden" data-floatCount-legend="pressureMeter"><img src="images/icons/menu-sub-9.png">壓力計<span></span></a>
            </div>
          </div>          
          <div>
            <a onclick="javascript:this.firstElementChild.click();activeCheck(this.parentElement);"><input id="Elev_PH" name="elev_msr" value="水質" type="hidden" data-floatCount-legend="waterQlty"><img src="images/icons/menu-sub-4.png">水質<span></span></a>            
          </div>
          <div>
            <a onclick="javascript:this.firstElementChild.click();activeCheck(this.parentElement);"><input id="Elev_LM" name="elev_msr" value="水位" type="hidden" data-floatCount-legend="waterLevel"><img src="images/icons/menu-sub-5.png">水位<span></span></a>
          </div>
          <div>
<!--            <a onclick="javascript:this.firstElementChild.click(); activePhyic(this,'水量,水壓,水質,水位'); activeCheck(this.parentElement);"><input id="Elev_BS" name="elev_msr" value="加壓站" type="hidden" data-floatCount-legend="pressureSta"><img src="images/icons/menu-sub-6.png">加壓站<span></span></a>-->
            <a onclick="javascript:this.firstElementChild.click(); activeCheck(this.parentElement);"><input id="Elev_BS" name="elev_msr" value="加壓站" type="hidden" data-floatCount-legend="pressureSta"><img src="images/icons/menu-sub-6.png">加壓站<span></span></a>
          </div>
          <div>
<!--            <a onclick="javascript:this.firstElementChild.click();activePhyic(this,'水位'); activeCheck(this.parentElement);"><input id="Elev_DR" name="elev_msr" value="配水池" type="hidden"><img src="images/icons/menu-sub-7.png">配水池<span></span></a>-->
            <a onclick="javascript:this.firstElementChild.click(); activeCheck(this.parentElement);"><input id="Elev_DR" name="elev_msr" value="配水池" type="hidden"><img src="images/icons/menu-sub-7.png">配水池<span></span></a>
          </div>
          <div>
            <a onclick="javascript:this.firstElementChild.click();activeCheck(this.parentElement);"><input id="Elev_EV" name="elev_msr" value="電動閥" type="hidden"><img src="images/icons/menu-sub-8.png">電動閥<span></span></a>
          </div>
          <div class="phyicsalMemo_ " style="" onclick="javascript:this.firstElementChild.firstElementChild.click();">
            <a><input id="phyicsalMemo" class="" value="顯示數值" type="hidden" onclick="physicMessageBoxControll();"><img src="images/icons/showPhyics.png">顯示數值<span></span></a>
          </div>
        </li>

        <li class="blue" onclick="openInforpage(this)">
          <a>
            <div class="img"><img src="images/icons/menu-sub3.png"><img src="images/icons/menu-sub3a.png"></div>資料列表
          </a>
        </li>
        <li class="blue" onclick="document.getElementById('convertToExcel').click();">
          <a>
            <div class="img"><img src="images/icons/menu-sub4.png"><img src="images/icons/menu-sub4a.png"></div>資料導出
          </a>
        </li>
        <a><img src="images/icons/arrow2a.png" style="display:none;"></a>
      </ul>
    </div>
    <div style="clear: both;"></div>
  </nav>

  <!--基本圖層-->
  <nav id="left_nav2" class="left_nav">
    <div class="menu_title">
      <span>基本圖層</span>
      <a href="" class="left_close"></a>
      <a href="#" class="trigger">
        <img src="images/left1.png" />
      </a>
    </div>
    <a href="#" class="exit">CANCEL</a>
    <ul class="top_left_menu">
      <!-- 區域範圍圖 -->
      <li id="disTric" class="">
        <a href="#" class="map3 distr3">區域範圍圖</a>
        <ul class="left_sub_menu" name="dis_itm" onclick="getbaselayer(this);">
          <li>
            <a href="#">鶯歌所轄區<input type="hidden" id="DIS_ITM_2" value=";鶯歌轄區1204" placeholder="3" name="bstlyr">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_DIS_ITM_2" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a>
          </li>
          <li>
            <a href="#">樹林所轄區<input type="hidden" id="DIS_ITM_3" value=";樹林轄區1203" placeholder="4" name="bstlyr">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_DIS_ITM_3" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a>
          </li>
          <li><a href="#">土城所轄區<input type="hidden" id="DIS_ITM_4" value=";土城轄區1205" placeholder="5" name="bstlyr">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_DIS_ITM_4" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a></li>
          <li>
            <a href="#">新莊所轄區<input type="hidden" id="DIS_ITM_6" value=";新莊轄區1208" placeholder="6" name="bstlyr">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_DIS_ITM_6" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a>
          </li>
          <li>
            <a href="#">板橋所轄區<input type="hidden" id="DIS_ITM_5" value=";板橋轄區1209" placeholder="7" name="bstlyr">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_DIS_ITM_5" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a>
          </li>
          <li><a href="#">泰山所轄區<input type="hidden" id="DIS_ITM_8" value=";泰山轄區1206" placeholder="8" name="bstlyr"><span class="sbar"></span>
              <span class="sbar"><img src="images/left11.png" /></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_DIS_ITM_8" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a>
          </li>
          <li><a href="#">蘆洲所轄區<input type="hidden" id="DIS_ITM_7" value=";蘆洲轄區1207" placeholder="9" name="bstlyr"><span class="sbar"></span>
              <span class="sbar"><img src="images/left11.png" /></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_DIS_ITM_7" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a>
          </li>
          <li>
            <a href="#">石門水庫與榮華壩<input type="hidden" id="DIS_OTH_1" value="石門水庫與榮華壩集水區範圍" placeholder="" name="bstlyr">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_DIS_OTH_1" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a>
          </li>
          <li>
            <a href="#">鳶山堰集水區範圍<input type="hidden" id="DIS_OTH_2" value="鳶山堰集水區範圍" placeholder="" name="bstlyr">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_DIS_OTH_2" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a>
          </li>
          <li>
            <a href="#">板新保護區範圍<input type="hidden" id="DIS_OTH_3" value="板新集水區範圍" placeholder="" name="bstlyr">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_DIS_OTH_3" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a>
          </li>
          <li>
            <a href="#">地籍圖<input type="hidden" id="nlsc_cm" value="地籍圖" placeholder="" name="bstlyr">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri"></span>
              <div class="popper">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_nlsc_cm" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a>
          </li>
          <li>
            <a href="#">國土利用調查成果圖<input type="hidden" id="nlsc_nlsr" value="國土利用調查成果圖" placeholder="" name="bstlyr">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri top"></span>
              <div class="popper top">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_nlsc_nlsr" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a>
          </li>
          <li>
            <a href="#">都市計畫使用分區圖<input type="hidden" id="nlsc_urp" value="都市計畫分區圖" placeholder="" name="bstlyr">
              <span class="sbar"><img src="images/left11.png" /></span>
              <span class="tri top"></span>
              <div class="popper top">
                <div class="title">透明度調整 <span href="#" class="closed"></span></div>
                <div class="inner"><input id="alpha_nlsc_urp" class="alphabk" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.1" data-slider-value="0.6" /></div>
              </div>
            </a>
          </li>
        </ul>
      </li>
      <!-- 水管線路圖 -->
      <li id="piPe">
        <a href="#" class="map4">水管線路圖</a>
        <ul class="left_sub_menu" onclick="getbaselayer(this)">
          <li><a href="#">原水管線<input type="hidden" id="pipe_original" placeholder="原水管線" value="原水管" name="bstlyr"></a></li>
          <li><a href="#">淨水流程管線<input type="hidden" id="pipe_procedure" placeholder="淨水流程管線" value="淨水流程" name="bstlyr"></a></li>
          <li><a href="#">100MM(含)以下<input type="hidden" id="pipe_100" placeholder="100MM以下" value="100mm(含)以下" name="bstlyr"></a></li>
          <li><a href="#">100MM(含)以上~300MM以下<input type="hidden" id="pipe_300" placeholder="300MM以下" value="100mm(含)以上~300mm(含)以下" name="bstlyr"></a></li>
          <li><a href="#">350MM以上<input type="hidden" id="pipe_350" placeholder="350MM以上" value="350mm(含)以上" name="bstlyr"></a></li>
          <li><a href="#">用戶管線<input type="hidden" id="pipe_user" placeholder="用戶管線" value="用戶管線" name="bstlyr"></a></li>
          <li><a href="#">跨管<input type="hidden" id="pipe_pcross" placeholder="跨管" value="跨管" name="bstlyr"></a></li>
        </ul>
      </li>
      <!-- 場站分布圖 -->
      <li id="staTion">
        <a href="#" class="map5">場站分布圖</a>
        <ul class="left_sub_menu" onclick="getbaselayer(this)">
          <li><a href="#">服務 / 營運所<input type="hidden" id="stadstu_serv" placeholder="營運所" value="場站" name="bstlyr"></a></li>
          <li><a href="#">水壓計<input type="hidden" id="stadstu_pm" placeholder="水壓計" value="流量站為監測站一種" name="bstlyr"></a></li>
          <li><a href="#">水壓監測站<input type="hidden" id="stadstu_pmrcs" placeholder="水壓監測站" value="場站之水壓監測站" name="bstlyr"></a></li>
          <li><a href="#">水質監測站<input type="hidden" id="stadstu_phv" placeholder="水質監測站" value="場站之水質監測站" name="bstlyr"></a></li>
          <li><a href="#">加壓站<input type="hidden" id="stadstu_bs" placeholder="加壓站" value="場站之加壓站" name="bstlyr"></a></li>
          <li><a href="#">配水池<input type="hidden" id="stadstu_dr" placeholder="配水池" value="場站之配水池" name="bstlyr"></a></li>
          <li><a href="#">高架水塔<input type="hidden" id="stadstu_hpw" placeholder="高架水塔" value="場站之高架水塔" name="bstlyr"></a></li>
          <li><a href="#">淨水場<input type="hidden" id="stadstu_wtp" placeholder="淨水場" value="場站之淨水廠" name="bstlyr"></a></li>
          <li><a href="#">水井<input type="hidden" id="stadstu_pw" placeholder="水井" value="場站之水井" name="bstlyr"></a></li>
          <li><a href="#">抽水站 / 取水站<input type="hidden" id="stadstu_ps" placeholder="抽水站" value="場站之抽水站、取水站" name="bstlyr"></a></li>

          <li>
            <div class="active" style="padding: 13px; color: #c1f65e; font-size: 14px; letter-spacing: 1px; background-color:#16a4fa;">閥類</div><a style="background-color: #049af8; border-top:0px;" href="#">100MM(含)以下<input type="hidden" id="stadstu_100" placeholder="100MM以下" value="閥類100mm(含)以下" name="bstlyr"></a>
          </li>
          <li><a style="background-color: #049af8;" href="#">100MM(含)以上 - 300MM以下<input type="hidden" id="stadstu_300" placeholder="300MM以下" value="閥類300mm以下" name="bstlyr"></a></li>
          <li><a style="background-color: #049af8;" href="#">350MM(含)以上<input type="hidden" id="stadstu_350" placeholder="350MM以上" value="閥類350mm(含)以上" name="bstlyr"></a></li>
          <li><a href="#">消防栓<input type="hidden" id="stadstu_ev" placeholder="消防栓" value="消防栓" name="bstlyr"></a></li>
          <li><a href="#">用戶水表<input type="hidden" id="stadstu_user" placeholder="用戶水表" value="用戶水表" name="bstlyr"></a></li>
          <li><a href="#">分水鞍<input type="hidden" id="stadstu_allocation" placeholder="分水鞍" value="分水鞍" name="bstlyr"></a></li>
        </ul>
      </li>
    </ul>
  </nav>

  <footer style="">
    <div id="footer_label">
      <a href="#" class="closed">
        <img class="animated infinite flash" src="images/xright.svg" />
      </a>
      <ul class="state show">
        <div class="right"><img class="leng"><img src="images/img.png"></div>
      </ul>
      <ul class="water">
        <div><img src="./images/FM_TYPE_原水-3030.png" alt="FM_TYPE_原水-3030" class="pic">原水流量計</div>
        <div><img src="./images/FM_TYPE_一般-3030.png" alt="FM_TYPE_一般-3030" class="pic">一般流量計</div>
        <div><img src="./images/FM_TYPE_管網-3030.png" alt="FM_TYPE_管網-3030" class="pic">管網流量計</div>
      </ul>
      <ul class="pressure">
        <div><img src="./images/PM_TYPE_板新幹管-3030.png" alt="PM_TYPE_板新幹管-3030" class="pic">板新幹管出水點</div>
        <div><img src="./images/PM_TYPE_一般-3030.png" alt="PM_TYPE_一般-3030" class="pic">一般加壓站監測點</div>
        <div><img src="./images/PM_TYPE_管網-3030.png" alt="PM_TYPE_管網-3030" class="pic">管網介接監測點</div>
      </ul>
    </div>
    <div id="floatLengMt" class="Square" style="cursor: pointer;">
      <div id="flowMeter" class="square_row">
        <div class="box1"><img src="./images/FM_TYPE_原水-3030.png" alt="FM_TYPE_原水-3030" data-typ="原水" class="pic"><span>0</span></div>
        <div class="box1"><img src="./images/FM_TYPE_一般-3030.png" alt="FM_TYPE_一般-3030" data-typ="一般" class="pic"><span>0</span></div>
        <div class="box1"><img src="./images/FM_TYPE_管網-3030.png" alt="FM_TYPE_管網-3030" data-typ="管網" class="pic"><span>0</span></div>
        <a class="closed"><img class="animated infinite flash" src="images/xright.svg" width="20px" /></a>
      </div>
      <div id="pressureMeter" class="square_row">
        <div class="box1"><img src="./images/PM_TYPE_板新幹管-3030.png" alt="PM_TYPE_板新幹管-3030" data-typ="板新幹管" class="pic"><span>0</span></div>
        <div class="box1"><img src="./images/PM_TYPE_一般-3030.png" alt="PM_TYPE_一般-3030" data-typ="一般" class="pic"><span>0</span></div>
        <div class="box1"><img src="./images/PM_TYPE_管網-3030.png" alt="PM_TYPE_管網-3030" data-typ="管網" class="pic"><span>0</span></div>
        <a class="closed"><img class="animated infinite flash" src="images/xright.svg" width="20px" /></a>
      </div>
    </div>
    
    <div id="floatLengPh" class="square1">      
      <a class="closed"><img class="animated infinite flash" src="images/xright.svg" width="20px" /></a>
      <div class="power" style="cursor: pointer;" data-count-unit ="水位">
        <div class="top"><span>水位</span></div>
        <div class="content">
            <div><img src="./images/icon001.png" alt=""><b>正常</b><span>0</span></div>
            <div><img src="./images/icon002.png" alt=""><b>HI/LO</b><span>0</span></div>
            <div><img src="./images/icon003.png" alt=""><b>HI<sup>2</sup>/LO<sup>2</sup></b><span>0</span></div>
           <div><img src="./images/icon004.png" alt=""><b>斷線</b><span>0</span></div>
        </div>
        <div class="bottom">0</div>
      </div>
      <div class="power" style="cursor: pointer;" data-count-unit ="瞬間流量">
        <div class="top"><span>瞬間流量</span></div>
        <div class="content">
            <div><img src="./images/icon001.png" alt=""><b>正常</b><span>0</span></div>
            <div><img src="./images/icon002.png" alt=""><b>HI/LO</b><span>0</span></div>
            <div><img src="./images/icon003.png" alt=""><b>HI<sup>2</sup>/LO<sup>2</sup></b><span>0</span></div>
           <div><img src="./images/icon004.png" alt=""><b>斷線</b><span>0</span></div>
        </div>
        <div class="bottom">0</div>
      </div>
      <div class="power" style="cursor: pointer;" data-count-unit ="累積流量">
        <div class="top"><span>累積流量</span></div>
        <div class="content">
            <div><img src="./images/icon001.png" alt=""><b>正常</b><span>0</span></div>
            <div><img src="./images/icon002.png" alt=""><b>HI/LO</b><span>0</span></div>
            <div><img src="./images/icon003.png" alt=""><b>HI<sup>2</sup>/LO<sup>2</sup></b><span>0</span></div>
            <div><img src="./images/icon004.png" alt=""><b>斷線</b><span>0</span></div>
        </div>        
        <div class="bottom">0</div>
      </div>
      <div class="power" style="cursor: pointer;" data-count-unit ="壓力">
        <div class="top"><span>壓力</span></div>
        <div class="content">
            <div><img src="./images/icon001.png" alt=""><b>正常</b><span>0</span></div>
            <div><img src="./images/icon002.png" alt=""><b>HI/LO</b><span>0</span></div>
            <div><img src="./images/icon003.png" alt=""><b>HI<sup>2</sup>/LO<sup>2</sup></b><span>0</span></div>
            <div><img src="./images/icon004.png" alt=""><b>斷線</b><span>0</span></div>
        </div>        
        <div class="bottom">0</div>
      </div>
      <div class="power" style="cursor: pointer;" data-count-unit ="pH">
        <div class="top"><span>pH</span></div>
        <div class="content">
            <div><img src="./images/icon001.png" alt=""><b>正常</b><span>0</span></div>
            <div><img src="./images/icon002.png" alt=""><b>HI/LO</b><span>0</span></div>
            <div><img src="./images/icon003.png" alt=""><b>HI<sup>2</sup>/LO<sup>2</sup></b><span>0</span></div>
            <div><img src="./images/icon004.png" alt=""><b>斷線</b><span>0</span></div>
        </div>        
        <div class="bottom">0</div>
      </div>
      <div class="power" style="cursor: pointer;" data-count-unit ="導電度">
        <div class="top"><span>導電度</span></div>
        <div class="content">
            <div><img src="./images/icon001.png" alt=""><b>正常</b><span>0</span></div>
            <div><img src="./images/icon002.png" alt=""><b>HI/LO</b><span>0</span></div>
            <div><img src="./images/icon003.png" alt=""><b>HI<sup>2</sup>/LO<sup>2</sup></b><span>0</span></div>
            <div><img src="./images/icon004.png" alt=""><b>斷線</b><span>0</span></div>
        </div>        
        <div class="bottom">0</div>
      </div>
      <div class="power" style="cursor: pointer;" data-count-unit ="餘氯">
        <div class="top"><span>餘氯</span></div>
        <div class="content">
            <div><img src="./images/icon001.png" alt=""><b>正常</b><span>0</span></div>
            <div><img src="./images/icon002.png" alt=""><b>HI/LO</b><span>0</span></div>
            <div><img src="./images/icon003.png" alt=""><b>HI<sup>2</sup>/LO<sup>2</sup></b><span>0</span></div>
            <div><img src="./images/icon004.png" alt=""><b>斷線</b><span>0</span></div>
        </div>        
        <div class="bottom">0</div>
      </div>
      <div class="power" style="cursor: pointer;" data-count-unit ="溫度">
        <div class="top"><span>溫度</span></div>
        <div class="content">
            <div><img src="./images/icon001.png" alt=""><b>正常</b><span>0</span></div>
            <div><img src="./images/icon002.png" alt=""><b>HI/LO</b><span>0</span></div>
            <div><img src="./images/icon003.png" alt=""><b>HI<sup>2</sup>/LO<sup>2</sup></b><span>0</span></div>
            <div><img src="./images/icon004.png" alt=""><b>斷線</b><span>0</span></div>
        </div>        
        <div class="bottom">0</div>
      </div>
      <div class="power" style="cursor: pointer;" data-count-unit ="濁度">
        <div class="top"><span>濁度</span></div>
        <div class="content">
            <div><img src="./images/icon001.png" alt=""><b>正常</b><span>0</span></div>
            <div><img src="./images/icon002.png" alt=""><b>HI/LO</b><span>0</span></div>
            <div><img src="./images/icon003.png" alt=""><b>HI<sup>2</sup>/LO<sup>2</sup></b><span>0</span></div>
            <div><img src="./images/icon004.png" alt=""><b>斷線</b><span>0</span></div>
        </div>        
        <div class="bottom">0</div>
      </div>
    </div>


    <div class="marquee">
      <p style="display: none">即時情報</p>
      <ul id="ann_box" style="height: 40px">
        <li class="ann a1 " style="color: white;">確認目前警報狀態中<a><span class="animated infinite flash">。。。</span></a></li>
        <li class="ann a1" style="color: white;">確認目前警報狀態中<a><span class="animated infinite flash">。。。</span></a></li>

      </ul>
    </div>

    <div class="right_area">
      <span class="copyright" style="color: white;">Copyright &copy; 2019</span>
      <a target="_blank" href="http://220.134.42.63:8080/waterscada/Login/Login.aspx?redirect=settings" class="gear"><img src="images/icons/icon.png" / style="height: 70%;"></a>
    </div>
  </footer>


  <!-- 轄區供水系統 -->
  <input type="hidden" id="Elev_" value="" placeholder="轄區供水系統" style="background-color: yellow; z-index: 1000; position: relative; top: 970px;">
  <!-- 服務所 -->
  <input type="hidden" id="Elev_ITM" value="*" placeholder="服務所內容存放" style="background-color: yellow; z-index: 1000; position: relative; z-index: 1000; position: relative; top: 970px;">
  <!-- 測站 -->
  <input type="hidden" id="Elev_MSR" value="電動閥，進出水點" placeholder="測站內容存放" style="background-color: yellow; z-index: 1000; position: relative; z-index: 1000; position: relative; top: 970px; width: 100%;">
  <!-- 流量計 -->
  <input type="hidden" id="Elev_FM" value="" placeholder="流量計內容存放" style="background-color: yellow; z-index: 1000; position: relative; z-index: 1000; position: relative; top: 970px; width: 100%;">
  <!-- 供水系統 -->
  <!-- 服務所 -->
  <input type="hidden" id="elevItme" value="" placeholder="服務所內容存放" style="background-color: blue; z-index: 1000; position: relative; top: 970px;">
  <!-- 供水系統 -->
  <input type="hidden" id="elevSubitm" value="" placeholder="供水系統內容存放" style="background-color: blue; z-index: 1000; position: relative; z-index: 1000; position: relative; top: 970px;">

  <!-- 基本圖層 -->
  <input type="hidden" id="baseLayer" value="" placeholder="基本圖層內容存放" style="background-color: springgreen; z-index: 1000; position: relative; z-index: 1000; position: relative; top: 970px;">
  <!-- 基本圖層選單 -->
  <input type="hidden" id="baseLayerAct" value="" placeholder="基本圖層選單1-7內容存放" style="background-color: springgreen; z-index: 1000; position: relative; z-index: 1000; position: relative; top: 970px;">
  <!-- 資訊視窗專用 -->
  <input type="hidden" id="InfoWin" value="" placeholder="資訊視窗專用-內容存放" style="background-color: springgreen; z-index: 1000; position: relative; z-index: 1000; position: relative; top: 970px;">

  <!-- 資料列表 -->
  <div class="modal-table" style="display: none; position: absolute; ">
    <div class="close closeInforpage">&times;</div>
    <div class="tab-pane">
      <div class="table-top">
        <div>
          <label>測站項目</label>
          <div style="border: 0; padding: 0; margin-top:5px"><input type="text" id="searchBox" style="padding:7px;"></div>
        </div>
        <div>
          <label>測點顯示</label>
          <select style="padding: 0px;" class="allorimportant" onchange="if(this.selectedIndex == 0){kendoShowAllPoint(stationIDStorage);}else{ fromAllOrImportantSelect = true;reGenerateImportantPoint();}">
            <option>全部點</option>
            <option selected="selected">重要點</option>
          </select>
        </div>
        <div style="float: right; width: 100px; text-align: center; ">
          <label style="margin-bottom: 4px;">導出</label>
          <a id="convertToExcel" style="margin-top: 8px; padding-top:6px; height:40px;"><img src="images/icons/menu-sub4.png"></a>
        </div>
      </div>
      <div class="table-over" id="grid">
      </div>
    </div>
  </div>

  <div class="" id="OMap" style="max-width:100%;height: 100vh;border: 1px solid #C0C0C0;">
<!--
    <div class="togglefloatLeng" title="統計計量點" style="display: none;">
    <a class="toggImg active" onclick="togglefloatLeng('dstuVar_active')"><img class="animated jello infinite" src="images/icons/calc.png"></a>
    <a class="toggImg" onclick="togglefloatLeng('dstuVar_active')"><img class="animated flash infinite" src="images/icons/calc_Y.png"></a>
  </div>
-->
  </div>
  <!--資訊視窗-->
  <div id="moniter" style="">
    <h1 id="staID_">土城所＿青雲－加壓站</h1>
    <div class="tabpanel">
      <div class="main">
        <!-- p1 -->
        <div id="p1" class="panel active">
          <div class="container-fluder">
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="ex1">測站項目</label>
                  <input type="text" class="form-control" id="ex1" placeholder="">
                </div>
              </div>
            </div>
            <div class="stationinfoTable">
              <div id="grid-data" class="col-sm-12" style="padding:0;">
              </div>
            </div>
          </div>
        </div>
        <!-- p2 -->
        <div id="p2" class="panel">
          <div class="menu1" id="">
            <ul>
<!--
              <li class="" style="display: none;">
                <a href="#" class="z0">
                  <div class="text">測站<br>照片</div>
                </a>
              </li>
-->
              <li class="">
                <a href="#" class="z1">
                  <div class="text">加壓站<br>系統圖</div>
                </a>
              </li>
              <li class="">
                <a href="#" class="z2">
                  <div class="text">加壓站設<br>備配置圖</div>
                </a>
              </li>
              <li id="">
                <a href="#" class="z3">
                  <div class="text">水位<br>關係圖</div>
                </a>
              </li>
              <li id="">
                <a href="#" class="z4">
                  <div class="text">進出水管<br>資料圖</div>
                </a>
              </li>
              <li>
                <a href="#" class="z5">
                  <div class="text">配電盤<br>配線圖</div>
                </a>
              </li>
              <li>
                <a href="#" class="z6">
                  <div class="text">攝影機<br>位置圖</div>
                </a>
              </li>
              <li>
                <a href="#" class="z7">
                  <div class="text">設備履歷</div>
                </a>
              </li>
            </ul>
          </div>
          <div class="line">
              <div class="box">
                <div class="stationInfo">
                  <div class="stationEdit active">
                    <button class="stat-crud-btn" onclick="locatInforEdit(this,'R');" ><i class="fa fa-plus-square-o" aria-hidden="true" ></i>新增</button>
                    <button class="stat-crud-btn" onclick="locatInforEdit(this,'U');" ><i class="fa fa-pencil-square-o" aria-hidden="true" ></i>修改</button>
                    <button class="stat-crud-btn" onclick="locatInforEdit(this,'D');" ><i class="fa fa-trash-o" aria-hidden="true"></i>刪除</button>
                    <button class="stat-crud-btn" onclick="locatInforEdit(this,'UL');" ><i class="fa fa-cloud-upload" aria-hidden="true"></i>上傳</button>
                  </div>
                  <div>
                    <div><label>名稱: </label>
                      <div id="STATION_ID" class="inlie"><input class="underline" readonly value="123"></div>
                    </div>
                    <div><label>類別: </label>
                      <div id="STATION_TYPE"  class="inlie"><input class="underline" readonly></div>
                    </div>
                    <div><label>管轄: </label>
                      <div id="CITY_NAME"  class="inlie"><input class="underline" readonly></div>
                    </div>
                  </div>
                  <div>
                    <div><label>地址: </label>
                      <div id="ADDRESS"  class="inlie"><input class="underline" readonly></div>
                    </div>
                    <div><label>座標(緯): </label>
                      <div id="LAT"  class="inlie"><input type="number" class="underline" readonly></div>
                    </div>
                    <div><label>座標(經): </label>
                      <div id="LNG"  class="inlie"><input type="number" class="underline" readonly></div>
                    </div>
                  </div>
                  <div>
                    <div><label>供水系統: </label>
                      <div id="SUPPLY"  class="inlie"><input class="underline" readonly></div>
                    </div>
                    <div><label>加壓站運作模式: </label>
                      <div id="OPERATION_MODE"  class="inlie"><input class="underline" readonly></div>
                    </div>
                  </div>
                  <div>
                    <div><label>配水池: </label>
                      <div id="POOL"  class="inlie"><input class="underline" readonly></div>
                    </div>
                    <div><label>水池大小: </label>
                      <div id="POOL_SIZE"  class="inlie"><input class="underline" readonly></div>
                    </div>
                  </div>
                  <div>
                    <div><label>電號: </label>
                      <div id="ELECTRIC_NO"  class="inlie"><input class="underline" readonly></div>
                    </div>
                    <div><label>契約容量(KW): </label>
                      <div id="ELECTRIC_CONTRACT"  class="inlie"><input type="number" class="underline" readonly></div>
                    </div>
                    <div><label>用電總類(需量/裝置): </label>
                      <div id="ELECTRIC_TYPE"  class="inlie"><input class="underline" readonly></div>
                    </div>
                  </div>
                  <div>
                    <div><label>時間電價: </label>
                      <div id="ELECTRIC_PRICE"  class="inlie"><input class="underline" readonly></div>
                    </div>
                    <div><label>功率因數(%): </label>
                      <div id="PF"  class="inlie"><input type="number" class="underline" readonly></div>
                    </div>
                    <div><label>用電總類2(需量/裝置): </label>
                      <div id="infoeletyp2"  class="inlie"><input class="underline" readonly></div>
                    </div>
                  </div>
                  <div>
                    <div><label>抽水機數量: </label>
                      <div id="POOL"  class="inlie"><input class="underline" readonly></div>
                    </div>
                    <div><label>變頻器數量: </label>
                      <div id="POOL_SIZE"  class="inlie"><input type="number" class="underline" readonly></div>
                    </div>
                  </div>
                  <div>
                    <div><label>電動閥資料: </label>
                      <div id="ELECTRIC_NO"  class="inlie"><input class="underline" readonly></div>
                    </div>
                  </div>
                  <div>
                    <div>
                      <label for="">圖片:</label>
                      <div id="PICTURE">
                      </div>
                    </div>
                  </div>
                  <div class="down imgbox1">                   
                    <div><img src="images/map0001.png" alt=""></div>
                    <div><img src="images/map0001.png" alt=""></div>
                    <div><img src="images/map0001.png" alt=""></div>
                  </div>
                  <div style="display: none; margin: 5px 20px;">
                    <label>維修紀錄:</label>
                    <div id="MAINTAIN">

                    </div>
                  </div>
                  <div>
                    <div style="display: none; margin: 5px 20px;">
                      <label for="">備註:</label>
                      <div id="NOTE" class=""></div>
                    </div>
                  </div>
                  <div style="display: none; margin: 5px 20px;">
                    <label for="">設備資訊:</label>
                    <div id="PUMP"></div>
                  </div>
                   
                </div>
                <div class="stationPic" id="t1">
                  <h3>檔案上傳</h3>
                  <p>選擇圖片或拖曳圖片至此</p>
                  <div class="file-upload">
                    <div class="image-upload-wrap">
                      <input id="" class="file-upload-input" type='file' onchange="readURL(this, 't1');" accept="image/*" />
                      <!-- <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" /> -->
                      <div class="drag-text">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        <h3>.PNG .JPG</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload(this)" class="remove-image">移除 <span class="image-title">上傳圖片</span></button>
                      </div>
                    </div>
                    <button class="file-upload-btn" type="button" onclick="saveImgfile(this);">上傳</button>
                  </div>
                </div>
              </div>
              <!-- z0 -->
              <div id="z0" class="panel">
                <div class="left">                  
                  <h3>檔案上傳</h3>
                  <p>選擇圖片或拖曳圖片至此</p>
                  <div class="file-upload">
                    <div class="image-upload-wrap">
                      <input id="" class="file-upload-input" type='file' onchange="readURL(this, 'z0');" accept="image/*" />
                      <!-- <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" /> -->
                      <div class="drag-text">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        <h3>.PNG .JPG</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload(this)" class="remove-image">移除 <span class="image-title">上傳圖片</span></button>
                      </div>
                    </div>
                    <button class="file-upload-btn" type="button" onclick="saveImgfile(this);" title="上傳圖片">上傳</button>
                  </div>
                </div>                
                <div class="right imgbox"> 
                  <div><img src="images/map0001.png" alt=""></div>
                  <div><img src="images/map0001.png" alt=""></div>
                  <div><img src="images/map0001.png" alt=""></div>
                </div>
              </div>
              <!-- z1 -->
              <div id="z1" class="panel">
                <div class="left">
                  <h3>檔案上傳</h3>
                  <p>選擇圖片或拖曳圖片至此</p>
                  <div class="file-upload">
                    <div class="image-upload-wrap">
                      <input id="" class="file-upload-input" type='file' onchange="readURL(this,'z1');" accept="image/*" />
                      <!-- <input class="file-upload-input" type='file' onchange="readURL(this,'z1');" accept="image/*" /> -->
                      <div class="drag-text">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        <h3>.PNG .JPG</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload(this)" class="remove-image">移除 <span class="image-title">上傳圖片</span></button>
                      </div>
                    </div>
                    <button class="file-upload-btn" type="button" onclick="saveImgfile(this);">上傳</button>
                  </div>
                </div>
                <div class="right imgbox">
<!--                  <div><img src="images/map0002.png" alt=""></div>-->
                </div>
              </div>
              <!-- z2 -->
              <div id="z2" class="panel">
                <div class="left">
                  <h3>檔案上傳</h3>
                  <p>選擇圖片或拖曳圖片至此</p>
                  <div class="file-upload">
                    <div class="image-upload-wrap">
                      <input id="" class="file-upload-input" type='file' onchange="readURL(this,'z2');" accept="image/*" />
                      <!-- <input class="file-upload-input" type='file' onchange="readURL(this,'z2');" accept="image/*" /> -->
                      <div class="drag-text">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        <h3>.PNG .JPG</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload(this)" class="remove-image">移除 <span class="image-title">上傳圖片</span></button>
                      </div>
                    </div>
                    <button class="file-upload-btn" type="button" onclick="saveImgfile(this);">上傳</button>
                  </div>
                </div>
                <div class="right imgbox">
                  <div><img src="images/map0003.png" alt=""></div>
                </div>
              </div>
              <!-- z3 -->
              <div id="z3" class="panel">
                <div class="left">
                  <h3>檔案上傳</h3>
                  <p>選擇圖片或拖曳圖片至此</p>
                  <div class="file-upload">
                    <div class="image-upload-wrap">
                      <input id="" class="file-upload-input" type='file' onchange="readURL(this,'z3');" accept="image/*" />
                      <!-- <input class="file-upload-input" type='file' onchange="readURL(this,'z3');" accept="image/*" /> -->
                      <div class="drag-text">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        <h3>.PNG .JPG</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload(this)" class="remove-image">移除 <span class="image-title">上傳圖片</span></button>
                      </div>
                    </div>
                    <button class="file-upload-btn" type="button" onclick="saveImgfile(this);">上傳</button>
                  </div>
                </div>
                <div class="right imgbox">
                  <div><img src="images/map0004.png" alt=""></div>
                </div>
              </div>
              <!-- z4 -->
              <div id="z4" class="panel">
                <div class="left">
                  <h3>檔案上傳</h3>
                  <p>選擇圖片或拖曳圖片至此</p>
                  <div class="file-upload">
                    <div class="image-upload-wrap">
                      <input id="" class="file-upload-input" type='file' onchange="readURL(this,'z4');" accept="image/*" />
                      <!-- <input class="file-upload-input" type='file' onchange="readURL(this,'z4');" accept="image/*" /> -->
                      <div class="drag-text">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        <h3>.PNG .JPG</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload(this)" class="remove-image">移除 <span class="image-title">上傳圖片</span></button>
                      </div>
                    </div>
                    <button class="file-upload-btn" type="button" onclick="saveImgfile(this);">上傳</button>
                  </div>
                </div>
                <div class="right imgbox">
                  <div><img src="images/map0005.png" alt=""></div>
                </div>
              </div>
              <!-- z5 -->
              <div id="z5" class="panel">
                <div class="left">
                  <h3>檔案上傳</h3>
                  <p>選擇圖片或拖曳圖片至此</p>
                  <div class="file-upload">
                    <div class="image-upload-wrap">
                      <input id="" class="file-upload-input" type='file' onchange="readURL(this,'z5');" accept="image/*" />
                      <!-- <input class="file-upload-input" type='file' onchange="readURL(this,'z5');" accept="image/*" /> -->
                      <div class="drag-text">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        <h3>.PNG .JPG</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload(this)" class="remove-image">移除 <span class="image-title">上傳圖片</span></button>
                      </div>
                    </div>
                    <button class="file-upload-btn" type="button" onclick="saveImgfile(this);">上傳</button>
                  </div>
                </div>
                <div class="right imgbox">
                  <div><img src="images/map0004.png" alt=""></div>
                </div>
              </div>
              <!-- z6 -->
              <div id="z6" class="panel">
                <h5>維護紀錄</h5>
                <div id="grid_table01"></div><br>
                <h5>設備履歷</h5>
                <div id="grid_pump"></div>
              </div>
            </div>
        </div>
        <!-- p3 -->
        <div id="p3" class="panel">
          <div class="dataCCTV" style="background-color: black">
            <!-- <div class="dataCCTV_title">觀音山加壓站</div> -->
            <div class="dataCCTV_content_picture_controll" style="display: none;">
              <img src="./images/icons/open.png" alt="">
            </div>
            <div class="dataCCTV_wrapper">
              <div class="dataCCTV_content cctv_block0">
                <div class="dataCCTV_content_title"><img src="./images/icons/cctv-icon3.png" alt=""><span>CAM1</span>
                  <div class="dataCCTV_content_controll"><img src="" alt=""></div>
                </div>
                <div class="dataCCTV_content_cam ">
                  <div class="cam">
                    <video id="videompv_0" class="video-js vjs-default-skin" poster="" controls autoplay>
                      <source src="" type="application/x-mpegurl">
                    </video>
                  </div>
                </div>
              </div>
              <div class="dataCCTV_content cctv_block1">
                <div class="dataCCTV_content_title"><img src="./images/icons/cctv-icon3.png" alt=""><span>CAM2</span>
                  <div class="dataCCTV_content_controll"><img src="" alt=""></div>
                </div>
                <div class="dataCCTV_content_cam ">
                  <div class="cam">
                    <video id="videompv_1" class="video-js vjs-default-skin" poster="" controls autoplay>
                      <source src="" type="application/x-mpegurl">
                    </video>
                  </div>
                </div>
              </div>
              <div class="dataCCTV_content cctv_block2">
                <div class="dataCCTV_content_title"><img src="./images/icons/cctv-icon3.png" alt=""><span>CAM3</span>
                  <div class="dataCCTV_content_controll"><img src="" alt=""></div>
                </div>
                <div class="dataCCTV_content_cam ">
                  <div class="cam">
                    <video id="videompv_2" class="video-js vjs-default-skin" poster="" controls autoplay>
                      <source src="" type="application/x-mpegurl">
                    </video>
                  </div>
                </div>
              </div>
              <div class="dataCCTV_content cctv_block3">
                <div class="dataCCTV_content_title"><img src="./images/icons/cctv-icon3.png" alt=""><span>CAM4</span>
                  <div class="dataCCTV_content_controll"><img src="" alt=""></div>
                </div>
                <div class="dataCCTV_content_cam ">
                  <div class="cam">
                    <video id="videompv_3" class="video-js vjs-default-skin" poster="" controls autoplay>
                      <source src="" type="application/x-mpegurl">
                    </video>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- p4 -->
        <div id="p4" class="panel">
          <div class="dataPicture">
            <!-- <div class="dataPicture_title">大漢監控站</div> -->
            <div class="dataPicture_content">
              <div class="dataPicture_content_menu">
                <div class="dataPicture_content_button dataPicture_content_button-active">大漢監控站</div>
              </div>
              <div class="dataPicture_content_picture">
                <div class="dataPicture_content_picture_title">
                  <div class="dataPicture_content_picture_controll" style="display: none;">
                    <img src="./images/icons/open.png" alt="">
                  </div>
                </div>
                <div class="dataPicture_content_picture_wrapper"></div>
                <div class="dataPicture_content_picture_time"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- p5 -->
        <div id="p5" class="panel">
          <div class="container-fluder">
            <div class="row">
              <div class="col-sm-8 col-xs-12">
                <div class="form-group">
                  <label for="ex1">測站項目</label>
                  <input type="text" class="form-control" id="ex2" placeholder="">
                </div>
              </div>
            </div>
            <div class="stationinfoTable">

              <!--kendoUI table插入點-->
              <div class="table-over" id="gridalarm">

                <table id="data_table" class="table table-sm table-responsive-sm">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">日期時間</th>
                      <th scope="col">測站名稱</th>
                      <th scope="col">物理量</th>
                      <th scope="col">測站項目</th>
                      <th scope="col">測值</th>
                      <th scope="col">警報訊息</th>
                      <th scope="col">高高警報</th>
                      <th scope="col">高警報値</th>
                      <th scope="col">低警報値</th>
                      <th scope="col">低低警報</th>
                      <th scope="col"><span style="color: red;"><img src="./images/icons/stdev.png" alt=""> ※</span>
                    </tr>
                  </thead>
                </table>
              </div>
              <!--kendoUI table結束點-->
              <br>
              <h7><span style="color: red;">※<img src="./images/icons/stdev.png" alt=""></span> 標準差算法: HI、LO使用兩倍標準差；HIHI、LOLO使用三倍標準差。</h7><br>
              <h7>水壓、水量當系統未設定警報值時，改使用標準差計算。</h7>
            </div>

          </div>
        </div>
      </div>
      <!-- main -->
      <!--TGOS搜尋功能-->
      <div class="menu" id="">
        <ul>
          <li class="active">
            <a href="#" class="p1">
              <div class="icon"></div>
              <div class="text">即時列表</div>
            </a>
          </li>
          <li class="">
            <a href="#" class="p2">
              <div class="icon"></div>
              <div class="text">場站資訊</div>
            </a>
          </li>
          <li id="moniter_CCTV">
            <a href="#" class="p3">
              <div class="icon"></div>
              <div class="text">即時影像</div>
            </a>
          </li>
          <li id="moniter_iFix">
            <a href="#" class="p4">
              <div class="icon"></div>
              <div class="text">即時圖控</div>
            </a>
          </li>
          <li>
            <a href="#" class="p5">
              <div class="icon"></div>
              <div class="text">警報列表</div>
            </a>
          </li>

          <li>
            <a href="#" class="close_all">
              <div class="icon"></div>
              <div class="text">關 閉</div>
            </a>
          </li>
        </ul>
        <!--        <input id="InfoWin" type="text" value="123">-->
      </div>
      <!--資訊視窗-->
    </div>
  </div>
  <!--  滑鼠座標-->
  <!--
  <div class="coordinateshower">
    <div><span></span></div><br>
    <div><span></span></div>
  </div>
-->
  <div id="filterWrapper" class="filterWrapperInvisible" style="display:none">
    <div class="filterControllWrapper">
      <div class="filterControll"><img class="animated infinite flash" src="./images/選單開合箭頭.png" alt=""></div>
    </div>

    <div class="filterContents">
      <div class="filterSelector">
        <div class="options">
          <div>複合搜尋</div>
        </div>
        <div class="options">
          <div>行政區</div>
        </div>
        <div class="options">
          <div>座標</div>
        </div>
        <div class="options">
          <div>取點距離</div>
        </div>
        <div class="options">
          <div>面積量測</div>
        </div>
        <div class="options">
          <div>建立卯點</div>
        </div>
      </div>
      <div class="filters">
        <div class="filterunit">
          <label>搜尋</label>
          <div>
            <input placeholder="台水">
          </div>
          <div>
            <button onclick="LocatorSearch(this)">搜尋</button>
            <button class="clearLocatorResult">刪除</button>
          </div>
        </div>
        <div class="filterunit">
          <label>行政區</label>
          <div>
            <input placeholder="台北市">
          </div>
          <div>
            <button onclick="districtLocator(this)">搜尋</button>
            <button class="clearLocatorResult">刪除</button>
          </div>
        </div>
        <div class="filterunit">
          <label>座標</label>
          <div>
            <div>
              <input id="CoordinateX" placeholder="座標(維)">
              <input id="CoordinateY" placeholder="座標(經)">
            </div>
          </div>
          <div>
            <button onclick="coordinateLocator(this.parentElement.previousElementSibling.getElementsByTagName('input'))">搜尋</button>
            <button class="clearLocatorResult">刪除</button>
          </div>
        </div>
        <div class="filterunit">
          <label>取點距離</label>
          <div>
            <!-- <input> -->
          </div>
          <div>
            <button onclick="measureDistance(this)">開始</button>
            <button class="clearAllGraphics">刪除</button>
          </div>
        </div>
        <div class="filterunit">
          <label>面積量測</label>
          <div>
            <!-- <input> -->
          </div>
          <div>
            <button onclick="measureArea(this)">開始</button>
            <button class="clearAllGraphics">刪除</button>
          </div>
        </div>
        <div class="filterunit">
          <label>建立卯點</label>
          <div>
            <!-- <input> -->
          </div>
          <div>
            <button onclick="addmarkeronmap(this)">開始</button>
            <button class="" onclick="rmovemarkeronmap()">刪除</button>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>

  <script type="text/javascript" src="./js/bootstrap-slider.min.js"></script>
  <script type="text/javascript" src="./js/nicescroll.js"></script>
  <script type="text/javascript" src="./js/script.js"></script>

   <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.common-nova.min.css" />
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.nova.min.css" />
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.nova.mobile.min.css" /> 
  <script src="./js/jquery-1.12.3.min.js"></script>

  <!--        <script type="text/javascript"> var jQuery1123 = $.noConflict(true); </script> -->

  <!-- <script src="https://kendo.cdn.telerik.com/2019.2.514/js/kendo.all.min.js"></script> -->
  <script src="./js/kendo.all.js"></script>
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.common.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.rtl.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.default.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.mobile.all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <!--  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
  <link rel="stylesheet" href="./css/jquery-ui.css">
  <script src="https://kendo.cdn.telerik.com/2019.2.514/js/angular.min.js"></script>
  <script src="https://kendo.cdn.telerik.com/2019.2.514/js/jszip.min.js"></script>
<!--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/hola_player/1.0.165/hola_player.dev.js"></script>-->
 
  <script type="text/javascript" src="./js/video/hola_player.dev.js"></script>
  <script type="text/javascript" src="./js/video/hola_player.dev.1.0.165.js"></script>
  <script type="text/javascript" src="./js/video/hls.js"></script>
<!--  <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="./js/jquery-ui.js"></script>
  <script src="./jquery/jquery.ui.touch-punch.js"></script>
  
  <script language="javascript">
    
    $(".pos_right > span").text("<?php echo $nam?>");    
    $("input[name=idn]").val("<?php echo $id?>");
    //$("input[name=idn]").val("water12"); // demo
    var idn = $("input[name=idn]").val();
    $(document).ready(function() { 
      $( "#alpha_wms" ).draggable({containment:"OMap", scroll: false });
      $( ".togglefloatLeng" ).draggable({ containment: "#OMap", scroll: false });
      $( ".togglefloatLeng" ).on( "dragstop", function( event, ui ) {console.log("stop"); $(".togglefloatLeng").addClass("dstuVar_active");} );
      $( document ).tooltip({track: true});      
      var whiteWmsurl = 'https://wms.nlsc.gov.tw/wms?&SERVICE=WMS&VERSION=1.1.1&REQUEST=GetMap&BBOX=352136.448733,2807602.054796,144847.277860,2406316.107441&SRS=EPSG:3826&WIDTH=1600&HEIGHT=890&LAYERS=MOI_HILLSHADE&FORMAT=image/png&DPI=96&MAP_RESOLUTION=96&FORMAT_OPTIONS=dpi:96&TRANSPARENT=TRUE';
      var handle = $( "#custom-handle" );
      $( "#slider" ).slider({
        create: function() {
          handle.text( $( this ).slider( "value" )+"%" );
        },        
        slide: function( event, ui ) {
          handle.text( ui.value+"%" );
          addbackwms(whiteWmsurl, (ui.value)/100 );
          if(ui.value == '0')
            removebackwms();
        }
      });
      $( "#template_dummy" ).dialog({
          modal: true,
          autoOpen: false,
          closeOnEscape: true
      });
      $("#template_dummy").parent('div').css({'zIndex': '418'});
      
//      $(".right>img").hover(function(){
//        $("img").css("opacity","0.5");
//        },function(){
//        $("img").css("opacity","1");
//      });
      //偵測按鈕參照相對的圖控
      $('.dataPicture_content_menu').on('click', '.dataPicture_content_button', function(e) {
        var now_indexNo = $(".dataPicture_content_button").index(this);
        //          alert(now_indexNo);
        //大漢橋監控站按鈕
        if ($(this).closest(".dataPicture_content").find('.dataPicture_content_button').hasClass('dataPicture_content_button-active')) {
          $(this).closest(".dataPicture_content").find('.dataPicture_content_button').removeClass('dataPicture_content_button-active');
        }
        //大漢橋監控站內容...
        if ($(this).closest(".dataPicture_content").find('.dataPicture_content_picture span').hasClass('dataPicture_content_active')) {
          $(this).closest(".dataPicture_content").find('.dataPicture_content_picture span').removeClass('dataPicture_content_active');
        }
        //圖控
        if ($(this).closest(".dataPicture_content").find('.dataPicture_content_picture_wrapper img').hasClass('dataPicture_content_active')) {
          $(this).closest(".dataPicture_content").find('.dataPicture_content_picture_wrapper img').removeClass('dataPicture_content_active');
        }
        //時間
        if ($(this).closest(".dataPicture_content").find('.dataPicture_content_picture_time h6').hasClass('dataPicture_content_active')) {
          $(this).closest(".dataPicture_content").find('.dataPicture_content_picture_time h6').removeClass('dataPicture_content_active');
        }
        //大漢橋監控站按鈕
        $(this).addClass("dataPicture_content_button-active");
        //大漢橋監控站內容...
        $(".dataPicture_content_unact:eq(" + now_indexNo + ")").addClass("dataPicture_content_active");
        //圖控
        $(".dataPicture_content_picture_wrapper img:eq(" + now_indexNo + ")").addClass("dataPicture_content_active");
        //圖控
        $(".dataPicture_content_picture_time h6:eq(" + now_indexNo + ")").addClass("dataPicture_content_active");
      });
    
    });
    var firstload_nav_ = false;
    function firstload_nav(){
        console.log("fadeIn");
      if (!(firstload_nav_)) {
        firstload_nav_ = true;
        $(".Elev_lay2").fadeIn("slow");
      } 
     };


    //搜尋功能
    $("#customers").kendoMultiColumnComboBox({
      dataTextField: "STATION_ID",
      dataValueField: "STATION_ID",
      height: 400,
      columns: [
        {
          field: "STATION_ID",
          //   title: "站名",
          headerTemplate: '<span class="searchUnit-header">站名</span>',
          template: "<div class='searchUnit' style='font-size:12px;' onclick='infoWindowControll(" + "\"#: STATION_ID #\"" + ", true);'>#: STATION_ID #</div>",
          // template: "<div style='background-color: yellow;' class='customer-photo'" +
          //     "style='background-image: url(../content/web/Customers/#:data.CustomerID#.jpg);'></div>" +
          //     "<span class='customer-name' style='background-color: lightblue;'>#: ContactName #</span>",
          width: 200
        }, {
          field: "CITY",
          //   title: "場所",
          headerTemplate: "<span class='searchUnit-header'>場所</span>",
          template: "<div class='searchUnit' style='font-size:12px;'>#: CITY #</div>",
          width: 200
        },
      ],
      footerTemplate: 'Total #: instance.dataSource.total() # items found',
      filter: "contains",
      filterFields: ["STATION_ID", 'STATION_TYPE', 'DISTRICT'],
      dataSource: searchbase
    });

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
  
  <style>
    .col-template-val {
      margin: 0 0 1em .5em;
    }

  </style>
  <!-- kendotest -->
<!--  <script crossorigin="anonymous" src="./js/testingdata.js"></script>-->
  <script crossorigin="anonymous" src="./js/tgosmap.js"></script>


  <script>
    var getData = new Array();
    var setCCTV = JSON.parse(setCCTV);
    var url = setCCTV.CCTVurl + setCCTV.getauth;
    var TOKENDAT, TOKEN;

    //資訊視窗 - 場站資訊
    //    setStationInfo();
    function setStationInfo(sta_id) {
      //當distric符合judge門檻將進行搜尋圖控內容
      var temp = [],
        temp2 = [],
        temp4 = [],
        temp3 = [],
        getStateIndex = [],
        getStateData = [];
      var StaIdName;
      //      var StateValue = [];
//      var path = "../WaterScada/Picture";
      var url_ = "http://220.134.42.63:8080/WaterscadaAPI/getstationinfo2?station_id=" + sta_id;
      console.log(url_);
      $.ajax({
        url: url_,
        type: "GET",
        dataType: "json",
        success: function(Jdata) {
          $.each(Jdata, function(index1, d) {
            temp.push(d);
            $.each(temp[index1], function(index, d1) {
              getStateIndex.push(index);
              getStateData.push(d1);
            });
          });
          console.log(getStateIndex);   
          console.log(getStateData);   
          var findDiv = $("#moniter #p2").find("label").next("div");
          for (var x = 0; x < findDiv.length; x++) {
            StaIdName = $(findDiv[x]).attr("id").trim();
            var count = getStateIndex.indexOf(StaIdName);
            if ((getStateData[count] == null || getStateData[count] == ' '))
            {  
              $(findDiv).eq(x).find('input').val('');                
            }
            else
            {
              $(findDiv).eq(x).find('input').val(getStateData[count]);           
            }
            switch (StaIdName) {
              case "PICTURE":
                loadInitImage(sta_id, getStateData[count]);    
                break;
              
              case 'PUMP': //設備履歷
//                $("#PUMP").text('');
                var pumpData = getStateData[count];
                debugger;
                console.log(pumpData);
                //loadPump();
                grid_pump(pumpData);
                break;
              
//              case 'MAINTAIN_': 
//                console.log(getStateData[count]);
//                $("#MAINTAIN").text('');
//                var time___ = getStateData[count];
//                $("#MAINTAIN").kendoGrid({
//                  //                        dataSource: getStateData[count],
//                  dataSource: time___,
//                  groupable: false,
//                  sortable: true,
//                  //                pageable: {
//                  //                    refresh: true,
//                  //                    pageSizes: true,
//                  //                    buttonCount: 5
//                  //                },
//                  columns: [{
//                    field: "DATE_TIME",
//                    title: "維護時間",
//                    template: function(time___) {
//                      var t = time___.DATE_TIME;
//                      if (t.indexOf("/") == -1) {
//                        var tempString = time___.DATE_TIME.split('-').join('/');
//                        var newTime = tempString.split('T').join(' ');
//                        return newTime;
//                      }
//                    },
//                  }, {
//                    field: "MAINTAIN_ITEM",
//                    title: "維修項目"
//                  }, {
//                    field: "USER_NAME",
//                    title: "維護人員"
//                  }, ]
//                });
//                break;
//              
//              case 'PICTURE_':                
//                console.log(getStateData[count]);
//                //                  $("#PICTURE").text('');
//                if (getStateData[count] != null) {
//                  var fileName = getStateData[count].split("\\");
//                  fileName = fileName[path.length - 1];
//                  var appendSrc = path + fileName;
//                  $("#PICTURE").append("<img src=" + appendSrc + " style='width:100%; padding: 0 10px 20px;'>");
//                }
//                break;
              
            }
          }
        }
      });
    };

    //getfixpicture of distric   
    function JudgeDistricOfIfixPicture(sta_id, judge) {
      //當distric符合judge門檻將進行搜尋圖控內容
      var getDistric = [];
      var distric;
      $.ajax({
        url: "http://220.134.42.63:8080/WaterscadaAPI/getstationinfo?station_id=" + sta_id,
        type: "GET",
        dataType: "json",
        success: function(Jdata) {
          $.each(Jdata, function(index, d) {
            getDistric.push(d);
          });
          //        console.log(getDistric[0].DISTRICT);
          distric = getDistric[0].DISTRICT;
          if (distric == judge) {
            console.log(distric);
            $("#moniter_iFix").removeClass('li_mask');
            getIfixPicture_ALL(sta_id);
          } else {
            $('#moniter_iFix').addClass('li_mask');
          }
        }
      });
    };
    //getfixpicture 
    function getIfixPicture_ALL(station_id) {
      $.ajax({
        url: "http://220.134.42.63:8080/WaterscadaAPI/getIfixPicture?station_id=" + station_id,
        type: "GET",
        dataType: "json",
        success: function(Jdata) {
          $.each(Jdata, function(index, d) {
            getData.push(d);
          });
          //            console.log(Jdata.STATION_ID);
          var filePath = Jdata.PICTURE_BASE_FOLDER;
          filePath = filePath.replace("c:\\", "./");
          filePath = filePath.replace(/\\/g, "/");
          //          alert(Jdata.PICTURE.length);
          $(".dataPicture_title").text(Jdata.STATION_ID);
          for (var x = 0; x < Jdata.PICTURE.length; x++) {
            filePath = "../WaterScada/IFIX_PIC";
            var str = "dataPicture_content_unact";
            var strbnt = "dataPicture_content_button";
            if (!x) {
              var str = "dataPicture_content_unact dataPicture_content_active";
              var strbnt = "dataPicture_content_button dataPicture_content_button-active";
            }
            //            if((Jdata.PICTURE[x].FILENAME != "undefined") && (Jdata.PICTURE[x].FILEDESC != "undefined") && (Jdata.PICTURE[x].FILETIME != "undefined")){
            filePath = filePath + "/" + Jdata.PICTURE[x].FILENAME;
            //                filePath = "https://cdn.pixabay.com/photo/2015/12/01/20/28/road-1072823_960_720.jpg";
            $(".dataPicture_content_menu").append("<div class='" + strbnt + "'>" + Jdata.PICTURE[x].FILEDESC + "</div>");
            $(".dataPicture_content_picture_title").before("<span class='" + str + "'>" + Jdata.PICTURE[x].FILEDESC + "</span>");
            $(".dataPicture_content_picture_wrapper").append("<img class='" + str + "' src=" + filePath + " alt=" + Jdata.PICTURE[x].FILEDESC + " style='width: 100%; height: auto;'>");
            var ModTime = Jdata.PICTURE[x].FILETIME.replace("-", "/");
            $(".dataPicture_content_picture_time").append("<h6 class='" + str + "'>更新時間:" + ModTime + "</h6>");
            //          Jdata.STATION_ID;
            //          Jdata.PICTURE_BASE_FOLDER
            //          Jdata.PICTURE;
            //          console.log(Jdata.PICTURE);
            //          console.log(getData[0]);
            //          console.log(getData[3][0].FILENAME);
            //                }
          }
        },
        error: function() {
          console.log("get json fail");
        }
      });
    }
    //detect browser type of safari on ipad or ios.
    var browser = function() {
      if (window.navigator.userAgent.match(/^((?!chrome|android).)*safari/i)) {
        if (window.navigator.userAgent.match(/iPad/i) || window.navigator.userAgent.match(/iPhone/i)) {
          console.log('Is iPhone or iPad of Safari');
          return 'safari_mobile';
        } else {
          //use datetimepicker 
          //          console.log('你是電腦版的safari 所以得用其他的datepicker 來處理');
          return 'safari_PC';
        }
      } else {
        //Because all browser can support type=date
        //input type can use date 
        //        console.log('因為你不是天殺的safari on mac 所以可以使用 type=date');
        return 'other';
      }
    }
    //get cctv token
    function getCCTVtoken(key, account, pwd) {
      var url_ = setCCTV.CCTVurl + setCCTV.getauth;
      //CCTV post
      var str;
      var xhr = new XMLHttpRequest();
      var data = JSON.stringify({
        "account": account,
        "pwd": pwd
      });
      xhr.open("POST", url_);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.setRequestHeader('key', key);
      xhr.onload = function() {
        //          console.log(xhr.responseText);
        //get json to string
        str = JSON.parse(xhr.responseText);
        //          alert(str.date);
        TOKENDAT = str.date;
        TOKEN = str.token;
        //                 alert(TOKEN);
        //default setting of
        //        $(".dataCCTV_title").text("鳶山堰監測站"); //setting default
        //        var camlist = ["7611876601", "7611876602"]; //鳶山堰監測站
        //        getCCTVlive(TOKEN, camlist, 'hls');
      }
      xhr.send(data);
    }
    //get cctv live infor.
    function getCCTVlive(token, camlist, streamTyp) {
      var Data_arr = [];
      //      console.log(camlist);
      //格式說明:"camList":["7649138902","7649138901"]
      Data_arr.length = 0;
      var url_ = setCCTV.CCTVurl + setCCTV.live;
      var str;
      var token = "Bearer " + token;
      var xhr = new XMLHttpRequest();
      var data = JSON.stringify({
        "camList": camlist,
        "streamType": streamTyp
      });
      xhr.open("POST", url_);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.setRequestHeader('Authorization', token);
      xhr.onload = function() {
        str = JSON.parse(xhr.responseText);
        $.each(str, function(index, d) {
          Data_arr.push(d);
        });
        //         console.log(Data_arr[2]);
        //        alert(token);
        console.log(str.urlToken);
        AppendCamInfo(str);
        setInterval(function() {
          getCCTVkeep(token, str.urlToken);
        }, 300000); //預設5分鐘毫秒自動重複執行cartnumber()函數         
      }
      xhr.send(data);
    }
    //make camra information and append to web page
    function AppendCamInfo(str) {
      $(".dataCCTV_content .dataCCTV_content_title *").remove();
      $(".dataCCTV_content .dataCCTV_content_cam *").remove();
      if(!isEmptyObject(str.liveList)) {
        for (var x = 0; x < str.liveList.length; x++) {
        var camurl_ = str.liveList[x].url;
        var camstatus = str.liveList[x].status;
        //                camurl_ = "https://d2zihajmogu5jn.cloudfront.net/bipbop-advanced/bipbop_16x9_variant.m3u8";
        //        camurl_ = "http://210.65.250.71:8080/live/cam7611876601/76992925d4ff4ee6a816790095483259/index.m3u8";
        if (camstatus)
          var path = "./images/icons/cctv-icon3.png"; //live pass- green
        else
          var path = "./images/icons/cctv-icon2.jpg"; //live fail - red
        var browserType = browser();
        //              console.log(camurl_);
        switch (browserType) {
          case "safari_pc":
          case "safari_mobile":
            camurl_ = camurl_.split('index').join("NORMAL/index");
            $(".cctv_block" + x + " .dataCCTV_content_title").append('<img src=' + path + '><span>CAM' + (x + 1) + '</span><div class="dataCCTV_content_controll"><img src="" alt=""></div>');
            $(".cctv_block" + x + " .dataCCTV_content_cam").append('<div class="cam"><video id="video_' + x + '" class="video-js vjs-default-skin" poster="" controls autoplay><source src="' + camurl_ + '" type="application/x-mpegURL"></video></div>');
            break;
            //            case "safari_mobile":
            //              alert("safari_mobile");
            //              break;
          case "other":
            //              alert("other");
            $(".cctv_block" + x + " .dataCCTV_content_title").append('<img src=' + path + '><span>CAM' + (x + 1) + '</span><div class="dataCCTV_content_controll"><img src="" alt=""></div>');
            $(".cctv_block" + x + " .dataCCTV_content_cam").append('<div class="cam"><video id="video_' + x + '" class="video-js vjs-default-skin" poster="" controls autoplay><source src="" type="application/x-mpegURL"></video></div>');
            window.hola_player({
              player: "#video_" + x,
              autoplay: true,
              controls: true,
              sources: [{
                src: camurl_,
                type: 'application/x-mpegurl',
              }],
              graph: true,
              settings: {
                quality: true,
                info: true,
              },
              share: false,
            });
            break;
        }
      }
      }
    }
    //get status of cctv keep-url-alive 
    function getCCTVkeep(token, urlToken) {
      var urltoken = [];
      urltoken.length = 0;
      urltoken.push(urlToken);
      //      console.log(urltoken);
      var Data_arr = [];
      Data_arr.length = 0;
      var url_ = setCCTV.CCTVurl + setCCTV.keepUrlAlive;
      var str;
      var xhr = new XMLHttpRequest();
      var data = JSON.stringify({
        "urlTokenList": urltoken
      });
      xhr.open("POST", url_);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.setRequestHeader('Authorization', token);
      //      xhr.onload = function() {
      //        str = JSON.parse(xhr.responseText);
      //        $.each(str, function(index, d) {
      //          Data_arr.push(d);
      //        });
      //        //         console.log(Data_arr);
      //        //         console.log(urlToken);
      //      }
      xhr.send(data);
    };
    //initial cctv
    getCCTVtoken(setCCTV.key, setCCTV.account, setCCTV.pwd);
    //get station_id to mapping cctv id code
    function mappingcctvid(TOKEN, staID) {
      var camlist = [];
      var cadin = [];
      var obj = [];
      var nam = staID;
      $.each(camAssign, function(index, d) {
        if (index == nam) {
          cadin.push(d);
          $.each(cadin, function(index1, d1) {
            obj.push(d1);
          });
          $.each(obj[0], function(index2, d2) {
            camlist.push(d2);
          });
        }
      });
      if (camlist.length > 0) {
        $("#moniter_CCTV").removeClass('li_mask');
        alert("camlist:" + camlist);
        getCCTVlive(TOKEN, camlist, 'hls');
      } else {
        //        NoiseVideoUrl();
        $("#moniter_CCTV").addClass('li_mask');
      }
      camlist.length = 0;
    }
    //put noise video on the no CCVT source
    function NoiseVideoUrl() {
      console.log("chang noise video");
      for (var x = 0; x < 4; x++) {
        var videoNo = "videompv_" + x;
        var player = videojs(videoNo);
        player.pause();
        $(".cctv_block" + x + " .dataCCTV_content_title > span:nth-of-type(1)").text("CAN" + (x + 1));
        player.src({
          src: './images/noise.mp4',
          type: 'video/mp4',
          withCredentials: false
        });
        player.load();
        player.play();
      }
    }
    
    function infoMemoGetRealtimeData(Formsearch) {
      var labelInFo = "";
      
      //labelInFo = labelInfoComposer(jsondata);
      var btnFlag = false;
      var stationId = document.getElementById('InfoWin').value;
      var measure_info = document.getElementById('Elev_MSR').value;
      var item_info = document.getElementById('Elev_ITM').value;
      var status = 'infoWinAllsite';
      var dataQueryUrl = "http://220.134.42.63:8080/waterscadaAPI/GetRealtimeData?station_id=" + stationId + "&measure=*&include_wi=1";
      //disable搜尋鈕
      if (!Formsearch) {
          //全區供水
          if ($("#left_nav1 .top_left_menu > li:nth-child(1)").hasClass('active')) {
              //全部場站
              if ($(".multipleChoice.active .allsitecontrol1").hasClass('active')) {
                  dataQueryUrl = "http://220.134.42.63:8080/waterscadaAPI/GetRealtimeData?station_id=" + stationId + "&measure=" + measure_info + "&include_wi=1";
                  console.log('全部場站');
                  btnFlag = false;
              }
              //重要場站
              if ($(".multipleChoice.active .importantsitecontroll").hasClass('active')) {
                  dataQueryUrl = 'http://220.134.42.63:8080/WaterscadaAPI/WI_StationData?section=轄區供水系統&item=' + item_info + '&measure=' + measure_info + '&station_id=' + stationId + "&only_wi=1";
                  status = 'infoWinImportant';
                  console.log('重要場站');
                  btnFlag = true;
              }
          }
          //供水系統
          if ($("#left_nav1 .top_left_menu > li:nth-child(2)").hasClass('active')) {
              dataQueryUrl = "http://220.134.42.63:8080/waterscadaAPI/GetRealtimeData?station_id=" + stationId + "&measure=*&include_wi=1";
              btnFlag = false;
              console.log("供水系統URL: " + dataQueryUrl);
          }
      } else {
          //enable搜尋鈕
          dataQueryUrl = "http://220.134.42.63:8080/waterscadaAPI/GetRealtimeData?station_id=" + stationId + "&measure=*&include_wi=1";
          console.log("搜尋URL: " + dataQueryUrl);
          console.log('enable搜尋鈕');
      }
      console.log("send:" + dataQueryUrl);
      var getBSDR = [];
       $.ajax({
          url: dataQueryUrl,
          type: "GET",
          dataType: "json",
          async:false,
          success: function(Jdata) {
            if(!btnFlag) {
              var reboundlabelInFo = dataAllSiteRecomposer(Jdata);
              var labelInFo = labelInfoComposer(reboundlabelInFo);
            } else {
              var labelInFo = labelInfoComposer(Jdata);
            }
            console.log(labelInFo);
//            if(labelInFo["STATIONS"].length < 0) { alert("此資料內容為空。請確認網路連線問題!\n或請IT人員協助處理。");   return;}
            var infotext = labelInFo['infotext'];
            var markerPoint = labelInFo['markerPoint'];
//            var imgUrl = labelInFo['imgUrl'];
//            var linkNumber = labelInFo['LINK'];
//            pointDeviated = labelInFo['markerPointDeviated'];
//            if (labelInFo["STATIONS"].length > 0) {        
              for (var i = 0; i < infotext.length; i++) {
                var InfoWindowOptions = {
                      maxWidth: 100,
                      //訊息視窗的最大寬度
                      zIndex: 10,
                      pixelOffset: new TGOS.TGSize(messageBoxOffset['X'], messageBoxOffset['Y']) //InfoWindow起始位置的偏移量, 使用TGSize設定, 向右X為正, 向上Y為負 
                  };
                //物理量的memo
                var messageBox; var pTGMarker;
                messageBox = new TGOS.TGInfoWindow(infotext[i], markerPoint[i], InfoWindowOptions);
                physicMessageBox.push(messageBox);
                messageBox.close();
                messageBox.open(pMap);
                messageBox.getContentPane().classList.add('messageBoxOpened');
                messageBoxAdjuster(messageBox);
              }
          },
          error: function() {
              console.log("get json fail");
          }
      });
      
    }
    //顯示數值-主體 for House
    function infoHouseControll(stationId){
      
    }
    //顯示數值-主體
    function infoMemoControll(stationId, clickFromSearch) { 
      debugger;
      var measurPhicso = document.getElementById('Elev_MSR').value;
      if (clickFromSearch) {
        //左上搜尋後跳出資訊視窗
        document.getElementById('InfoWin').value = stationId;
        infoMemoGetRealtimeData(true);
        
//        searchMarkerControll(stationId);
      } else {
        // alert("clicknotFromSearch");
        document.getElementById('InfoWin').value = stationId;
        infoMemoGetRealtimeData(false);
      }
    }
    //資訊視窗-主體
    function infoWindowControll(stationId, clickFromSearch) {
      var measurPhicso = document.getElementById('Elev_MSR').value;
      if (clickFromSearch) {
        //左上搜尋後跳出資訊視窗
        // alert("clickFromSearch");
        document.getElementById('InfoWin').value = stationId;
        infoWindowGetRealtimeData(true);
        //        dataQueryAlarm(stationId,measurPhicso);
        searchMarkerControll(stationId);
        works();
      } else {
        // alert("clicknotFromSearch");
        document.getElementById('InfoWin').value = stationId;
        infoWindowGetRealtimeData(false);
        //        dataQueryAlarm(stationId,measurPhicso);
        works();
      }
    }

    function works() {
      var station_Id = $("#InfoWin").val();
      $('#staID_').text(station_Id);
      $(".dataPicture_content_button").remove();
      $(".dataPicture_content_unact").remove();
      $(".dataPicture_content_picture_wrapper img").remove();
      $(".dataPicture_content_picture_time h6").remove();
      $("#moniter").css({ display: "block" });
      $(".stationEdit").children("button").removeAttr("disabled").removeClass("active");
      setStationInfo(station_Id);      
      JudgeDistricOfIfixPicture(station_Id, '-1');
      //      getIfixPicture_ALL(station_Id);
      mappingcctvid(TOKEN, station_Id);
    }

    var getAlarmDatas = [];
//    clearInterval(GetRealAlarmData);
    GetRealAlarmData();
    var alarmString;

    function transformUnit(unit_) {
      var toSupContent = ["kgf/cm2", "M3"];
      if (toSupContent.indexOf(unit_.trim()) != -1) {
        var stringArray = unit_.split('');
        stringArray[stringArray.length - 1] = String(stringArray[stringArray.length - 1]).sup();
        var supProccessedString = stringArray.join('');
        return supProccessedString;
      } else
        return unit_.toUpperCase();
    };
    var flagColor, flagString;
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
    
    var cellbackalert = null;
    var tid = null;
    function GetRealAlarmData() {
      clearInterval(cellbackalert);
      var allPass = true;
      getAlarmDatas.length = 0;
      $.ajax({
        url: "http://220.134.42.63:8080/WaterscadaAPI/getRealtimeAlarmData",
//        url:"http://220.134.42.63:8080/waterscadaAPI/GetAlarmData?start=2019/08/11&end=2019/08/11",
        type: "GET",
        dataType: "json",
        success: function(Jdata) {
          $.each(Jdata, function(index, d) {
            getAlarmDatas.push(d);
          });
          //TAG_ID DESC VALUE FLAG UNIT
          var unit, flag = [];
          if (getAlarmDatas != '') {
            if ($("#ann_box li").hasClass("a1"))
              $("#ann_box li").remove();
            for (var x = 0; x < getAlarmDatas.length; x++) {
              if (getAlarmDatas[x].FLAG != "N") {
                unit = transformUnit(getAlarmDatas[x].UNIT);
                flag = alarmFlag(getAlarmDatas[x].FLAG);
                alarmString = getAlarmDatas[x].STATION_ID + getAlarmDatas[x].DESC;
                $("#ann_box").append('<li class="ann"><a href="./alarmList.php?tagid=' + getAlarmDatas[x].TAG_ID + '">' + alarmString + flag[1] + ': <span class=' + flag[0] + '>' + getAlarmDatas[x].VALUE.toFixed(2) + '</span>' + " " + unit + '</a></li>');
                allPass = false;
              } else {
                if (allPass) {
                  $("#ann_box li").remove();
                  $("#ann_box").append('<li class="ann">所有場站測值正常</li>');
                }
              }
            }
//            console.log(alarmString);
            console.log("更新警報値資料");
//            cellbackalert = setInterval(function(){GetRealAlarmData();}, 300000); //update datas after 5min ago
          } else {
            console.log("無警報値資料，5分鐘後重新連線。");
            $("#ann_box li").remove();
            $("#ann_box").append('<li class="ann animated infinite flash" style="color: white;">無警報値資料，5分鐘後重新連線</li>');
//            cellbackalert = setInterval(function(){GetRealAlarmData();}, 300000);
          }
        },
        error: function() {  
            console.log("Alarm資料連接錯誤，30秒後重新連線。");
            $("#ann_box li").remove();
            $("#ann_box").append('<li class="ann animated infinite flash" style="color: red;">Alarm資料連接錯誤，30秒後重新連線。</li>');
//            cellbackalert = setInterval(function(){GetRealAlarmData();}, 30000);
        }
      });
    };   
    slideLine('ann_box', 'li', 2000, 10, 10);
    function slideLine(box, stf, delay, speed, h) {
      var slideBox = document.getElementById(box);
      var delay = delay || 1000,  speed = speed || 20,  h = h || 20;
      var pause = false;
      
      var slide = function() {
        if (pause) return;
        slideBox.scrollTop += 6;
        if (slideBox.scrollTop % h == 0) {
          clearInterval(tid);
          slideBox.appendChild(slideBox.getElementsByTagName(stf)[0]);
          slideBox.scrollTop = 0;
          setTimeout(function(){
            tid = setInterval(slide, speed);
          }, delay);
        }
      }
      slideBox.onmouseover = function() {
        pause = true;
      }
      slideBox.onmouseout = function() {
        pause = false;
      }
      setTimeout(function(){
        tid = setInterval(slide, speed);
      }, delay);
    };
    
    //3階
    legendtooltip();
    function legendtooltip() {
      var addlabe = "點擊顯示合計正常,點擊顯示合計HI/LO,點擊顯示合計HIHI/LOLO,點擊顯示合計斷線,點擊顯示全部合計";
      console.log(addlabe);
      $(".power .content").find("div:nth-of-type(1)").attr("title", addlabe.split(",")[0]);
      $(".power .content").find("div:nth-of-type(2)").attr("title", addlabe.split(",")[1]);
      $(".power .content").find("div:nth-of-type(3)").attr("title", addlabe.split(",")[2]);
      $(".power .content").find("div:nth-of-type(4)").attr("title", addlabe.split(",")[3]);
      $(".power .bottom").attr("title", addlabe.split(",")[4]);
    }
    
    //載入場站資訊的初始狀態資料    
    function loadInitImage(staId, json) {
      var x=0;
      if(<?php echo $role?> || x)
         $('.stationEdit').addClass("active");
      else {
        $('.stationEdit').removeClass("active");
        alert("尚未登入，僅可使用部份功能。");
      }
      var p2_li = $("#p2").find("ul").children("li").not("li:last");
      
      for(var x=0; x<p2_li.length+1; x++){
        var workshet = $(p2_li).eq(x).find('div').text();             
        setInitImage(json[x]["STATION_ID"],json[x]["IMAGE_NAME"],json[x]["IMAGE_FILE"]);
      }
    };    
    //載入場站資訊的圖片    
    function setInitImage(staId, worksheet, img_file ){
      var img_file_ = img_file;
      var picturePath = "./files/stationImages/"+worksheet+"/"+staId+"/";
      var jugClass = null;
      var x=0;
      (<?php echo $role?> || x)?jugClass = "det-able":jugClass = null;
      var li_locat, z_locat;
      var append_ImgString;            
                
      var make_tag = function (){
                  var levelNo = null;
                  if("測站照片" == worksheet) {
                    z_locat = $("#p2").children(".line").children('.box').find(".imgbox1"); //[IMG]
                    li_locat = $("#p2").find("ul").children("li").not("li:last");//[NAME]
                    levelNo = 0;
                  } else {
                    li_locat = $("#p2").find("ul").children("li").not("li:last");//[NAME]
                    for(var y=0; y<li_locat.length; y++){
                      if($(li_locat[y]).find("div").text() == worksheet){
                        z_locat = $("#p2").children(".line").find("[id^=z]").eq(y).find(".imgbox"); //[IMG]
                        levelNo = y;
                        y = li_locat.length +1;
                      }
                    } 
                  }
                  return levelNo;
                };
      //判斷assign data type to difference job
      if(img_file_ != null){
        if(img_file_.indexOf("@") > -1) { 
          img_file_ = img_file_.split("@"); 
        }
    }
      var lev_ = make_tag();
      if(Array.isArray(img_file_)) {
          $(z_locat).find("div").remove();
          //複數圖檔
          for(var x=0; x<img_file_.length; x++){
            append_ImgString = "<div class='"+jugClass+"' onclick='detStationImg(this)' data-id='"+staId+"' data-sheet='"+worksheet+"'><img src='"+picturePath+img_file_[x]+"' alt='"+img_file_[x]+"'></div>";
            $(z_locat).append(append_ImgString);
          }
        } else {
          $(z_locat).find("div").remove();
          if(typeof(img_file_)=="string"){
            append_ImgString = "<div class='"+jugClass+"' onclick='detStationImg(this)' data-id='"+staId+"' data-sheet='"+worksheet+"'><img src='"+picturePath+img_file_+"' alt='"+img_file+"'></div>";              
            $(z_locat).append(append_ImgString);
          }
          if(img_file_ == null) {
            append_ImgString = "<div data-id='"+staId+"' data-sheet='"+worksheet+"'>無圖檔資料</div>";
            $(z_locat).append(append_ImgString);
          }
        }
    };
    //點擊刪除圖片
    function detStationImg(ths){
      var x=0;
      if(<?php echo $role?> || x){} else return;
      var Imgsalt = [];
      if(confirm("確定後移除")){
        var url_ = "", obj={};
        var staId = $(ths).attr('data-id'); 
        var worksheet = $(ths).attr('data-sheet'); 
//        debugger;
        
        var curr_fileName = $(ths).find('img').attr('alt');
        var url_det = "../files/stationImages/"+worksheet+"/"+staId+"/"+curr_fileName;
        var deleteImg = dirDeleteImgToSEVR(url_det);
        console.log(deleteImg);
        
        var Img_Name = $(ths).parent().attr('class');
        var x1 = Img_Name.split(" ")[1];
        if(x1 == "imgbox") {
          var h = $(ths).closest("[id^=z]").attr('id');
          $(ths).remove();
          var x2 = $("#"+h).find(".imgbox").find("img");
        } else {
          if(x1 == "imgbox1")
            $(ths).remove();
            var x2 = $("."+x1).find('img');
        }
        for(var x=0; x<x2.length; x++) {
          Imgsalt.push($(x2).eq(x).attr("alt"),"@");          
        }
        Imgsalt.pop();    
        var imgstr = Imgsalt.join("");
        obj["STATION_ID"] = staId;
        obj["IMAGE_FILE"] = imgstr;
        obj["IMAGE_NAME"] = worksheet;
//        console.log(obj);
        url_ = 'http://220.134.42.63:8080/WaterscadaAPI/PostStationImage_addupdate';
        postToServer(url_, obj);
        
      }
    };
    $(".menu ul li:nth-of-type(2)").on('click', function() {
      $(".stationEdit").children("button").removeAttr("disabled").removeClass("active");
      $(".stationInfo").children("div").find("input").attr("readonly",true);
      $("#p2").find(".box").removeClass("active");
      $(".menu1").find("li").removeClass("active");
      $("#p2").find("[id^=z]").removeClass("active");
    });
    $(".menu1 ul li").on('click', function() {
      $("#p2").find(".box").addClass("active");
      var cur = $(this).index();
      console.log(cur);
      var shet = "z" + cur;
      $(this).closest("ul").children("li").bind().removeClass("active");
      $(this).addClass("active");
      $("#" + shet).closest("#p2").find("[id^=z]").bind().removeClass("active");
      $("#" + shet).addClass("active");
    });    
    //載入圖片方法1            
    function readURL(input, idname) {
      var x=0;
      if(<?php echo $role?> || x){} else return;
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        var file = input.files[0];
        var imageType = /^image\//;
        //是否是图片
        if(!imageType.test(file.type)) {
          alert("請選擇圖片!");
          return;
        }        
        reader.onload = function(e) {
          $("#"+idname).children().find('.image-upload-wrap').hide();
          $("#"+idname).children().find('.file-upload-image').attr('src', e.target.result);
          $("#"+idname).children().find('.file-upload-content').show();
          $("#"+idname).children().find('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);        
      } else {
//        outerHTML
        input.value ='';
        removeUpload(this);
      }
    }
    //載入圖片方法2 base64Code(較耗資源) - x
//    function readURL_x(input, idname) {
//      var x=0;
//      if(<?php echo $role?> || x){} else return;
////      var base64Code;  
//      console.log(input.files);
//      console.log(input.files[0]);
//      if (input.files && input.files[0]) {
//        //判断是否支持FileReader
//        if(window.FileReader) {
//          var reader = new FileReader();
//        } else { alert("您的設備不支援預覽功能，如需此功能請升級您的設備!"); }
//        
//        var file = input.files[0];
//        var imageType = /^image\//;
//        //是否是图片
//        if(!imageType.test(file.type)) {
//          alert("請選擇圖片!");
//          return;
//        }        
//        reader.onloadend = function(e) {
//          $("#"+idname).children().find('.image-upload-wrap').hide();
//          $("#"+idname).children().find('.file-upload-image').attr('src', e.target.result);
//          $("#"+idname).children().find('.file-upload-content').show();
//          $("#"+idname).children().find('.image-title').html(input.files[0].name);
////          base64Code = e.target.result;
////          console.log(base64Code);
//        };
//        reader.readAsDataURL(input.files[0]);
//      } else {
////        outerHTML
//        input.value ='';
//        removeUpload(this);
//      }
//    }  
    //移除載入圖片 
    function removeUpload(btn) {   
      var clone_ = $(btn).closest(".file-upload").children(".image-upload-wrap").find('.file-upload-input').clone();
      $(btn).closest(".file-upload").children(".image-upload-wrap").find('.file-upload-input').replaceWith(clone_);
      $(btn).closest(".file-upload").children('.file-upload-content').hide();
      $(btn).closest(".file-upload").children('.image-upload-wrap').show();
    };
    //上傳module圖片路俓+檔名
    function saveImgfile(submt){  
      var x=0;
      if(<?php echo $role?> || x){} else return;      
      var statid_ = $('#staID_').text();
      var pant = $(submt).closest(".line").find(".file-upload-btn").index(submt);
      if(!pant){
        var sheetName = "測站照片";
      } else {
        var sheetName = $("#p2").find("ul").children("li").eq(pant-1).find('div').text();        
      }
      var filebtn = $(submt).closest(".file-upload").children('div').find('input[type=file]');
      var fileData = filebtn[0].files[0];
      if(!filebtn[0].files.length) {        
        alert("目前無有圖片上傳!");
        return;
      }
//      var base64code = $(submt).parent().children("div").find("img").attr('src'); 
      var getImgsURL = function (){
            var str_ = null; var temp=[];
            if("測站照片" == sheetName) {
              var imgsbox = $("#p2").children(".line").children('.box').find(".imgbox1").find("img"); //[IMG]
            } else {
              var imgsbox = $(submt).closest(".panel").children('.imgbox').find("img"); //[IMG]
              console.log(imgsbox);
            }
            for(var x=0; x<imgsbox.length; x++){
              temp.push(imgsbox[x].alt,"@");
            }
            str_ = temp.join("");
            console.log(str_);
            return str_;          
      }
      var url_ = "http://220.134.42.63:8080/WaterscadaAPI/PostStationImage_addupdate";
      var currFileName = $(submt).closest(".file-upload").children('.file-upload-content').find('.image-title').text();
      var xdata=[];var obj={};
      obj["STATION_ID"] = statid_;
      obj["IMAGE_NAME"] = sheetName;
      obj['IMAGE_FILE'] = getImgsURL()+currFileName;      
//      xdata.push(obj);
      chkInfor = postToServer(url_, obj);
      console.log(chkInfor);
//      if(chkInfor.Result == "OK" && chkInfor.Error == "" ) {
      if(1) {
        var doneToSEVR = false;        
        
        var url_ = sheetName+"/"+statid_; //例如: 場站資訊/青雲小區石門路高點(管網)/fileName.jpg 同時存於SERVER
        var upldfileName = dirSaveImgToSEVR(url_, fileData);
        console.log(upldfileName);
        debugger;
        doneToSEVR=1;
        if(doneToSEVR) {
          var url_ = sheetName+"/"+statid_+"/"+currFileName; 
          removeUpload(submt);
          appendCurrImg(submt, url_);
          alert("上傳\n"+statid_+"\n檔案路徑: ./files/stationImages/"+sheetName+"/"+statid_+"\n\n資料上傳成功。");
        }         
        else 
          alert("上傳\n"+fileData.name+"!\n檔案路徑: "+sheetName+"/"+statid_+"/\n\n檔案上傳失敗，請重新上傳。");
      } else 
        alert("上傳"+statid_+"資料庫儲存失敗! 請確認網路已連線，並重新上傳。\n或聯絡IT人員。");
    };    
    function appendCurrImg(ths, path) {
      var path_ = path.split("/");       
      var src_ = "./files/stationImages/"+path;
      if($(ths).closest(".stationPic").length > 0){   //測站圖片
        $(".imgbox1").append('<div><img src='+src_+' alt="'+path_[path_.length-1]+'"></div>');
      } else {        
        $(ths).closest("[id^=z]").find(".imgbox").append('<div><img src='+src_+' alt="'+path_[path_.length-1]+'"></div>');
      }
    }
    //刪除SEVR檔案
    function dirDeleteImgToSEVR(url){
      var detToSEVR;
      var deletFilePath = url;      
      $.ajax({
          type: "POST",
          url: "./php/delete_img.php",
          async:false,
          data: { 
              'detFile': deletFilePath,
              },
          dataType: 'json' //設定該網頁的回應會是html格式
      }).done(function(data) {
          console.log(data);
        alert("刪除成功。");
        detToSEVR = data;
      }).fail(function(jqXHR,textSataus,errorThrown) {
          alert("刪除失敗，請重新刪除。");
          console.log(jqXHR.responseText);
      });
      return detToSEVR;
    }
    //前端上傳圖檔到主機
    function dirSaveImgToSEVR(path_, files){  
      var dirToSEVR = false;
      var folderName = "stationImages";
      var url_ = './php/upload_img.php?ph=' + folderName+"/"+path_;
      
      var formData = new FormData();
      formData.append('file_', files);
//      formData.append('path_', path); //添加其他参数
      $.ajax({
        url: url_,
        type: 'POST',
        cache: false, //上傳文件不需要緩存
        data: formData,
        processData: false, // 告诉jQuery不要去處理发送的数据
        contentType: false, // 告诉jQuery不要去设置Content-Type请求头
        async: false,
        success: function(data) {          
          dirToSEVR = data;          
        },
        error: function() {
          alert("上傳失敗，請重新上傳。");
        }
      });
      return dirToSEVR;
    }
    
    //ajax 上傳功能(GET) for get    
    function getToServer (url_){
      var result = false;
      console.log(String.fromCodePoint(65) );
      $.ajax({
            url:url_,
            type: 'GET',
            dataType: "json",
            async:false,
            success: function(data) {
                result = data;
            },
            error: function () {
              console.log("get json fail");
            }
          });
      return result;
    };
    //ajax 上傳功能(POST) for add & delete
    function postToServer(url_, obj_data){  
      var x=[], result = '';      
//      var url_ = 'http://220.134.42.63:8080/WaterscadaAPI/PostStationImage_addupdate';
      x.push(obj_data);
      $.ajax({
      url: './php/pos_rawBody.php',
      type: 'POST',
      async: false,
      cache: false, //上傳文件不需要緩存
      data: {
      'url_': url_,
      'xdata': JSON.stringify(x),
      },
      success: function(data) {
      result = data;
      },
      error: function() {
      alert("上傳失敗，請重新上傳。");
      }
      });
      return result;
    }
    $('.image-upload-wrap').bind('dragover', function() {
      $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function() {
      $('.image-upload-wrap').removeClass('image-dropping');
    });

    //stationEdit增刪修
    var chkInfor = null;
    function locatInforEdit(e, cmd) {
      var x=0;
      chkInfor = false;
      if(<?php echo $role?> || x){} else return;
      var compsr = false;
      $(".stationEdit").children("button").removeAttr("disabled").removeClass("active");
      $(e).attr("disabled","disabled").addClass("active");
      var label_ = $(".stationInfo").children("div").not('div:first').find("label");   
      var idName = [], idContent = [],obj={};
      for(var x=0; x<label_.length; x++) {
        var temp = $(label_).eq(x).next('div').attr('id');
        var temp2 = $(label_).eq(x).next('div').find("input").val();
        idName.push(temp);  idContent.push(temp2);
      }
     
      switch(cmd){
        case 'R':{           
          $(".stationInfo").children("div").find("input").val('').removeAttr("readonly").css({'color': "#007bff"});
          break;
        }
        case 'U':{
          $(".stationInfo").children("div").find("input").removeAttr("readonly").css({'color': "gary"});
          break;
        }
        case 'D':{
          compsr = true;
          $(".stationInfo").children("div").find("input").val('');
          obj["STATION_ID"] = $("#staID_").val();
          var url_ = "http://220.134.42.63:8080/WaterscadaAPI/PostStation_delete";
          chkInfor = postToServer(url_, obj);
          break;
        }
        case 'UL':{
          compsr = true;
          $(".stationInfo").children("div").find("input").attr("readonly");
          for(var x=0; x<idName.length;x++){
            obj[idName[x]] = idContent[x];
          }
          var url_ = "http://220.134.42.63:8080/WaterscadaAPI/PostStation_addupdate";
          chkInfor = postToServer(url_, obj);
      var clr_compsr = null;
      var pollingLimit = 10;
      if(compsr){
        clr_compsr = setInterval(function(){ 
          if(pollingLimit > 0){
            pollingLimit -= 1;  
            if(1) {
              console.log(chkInfor);
              $(".stationInfo").children("div").find("input").attr("readonly",true);
              alert("資料儲存成功。");
              clearInterval(clr_compsr);  compsr = false;                         $(".stationEdit").children("button").removeAttr("disabled").removeClass("active");
            } else {
              clearInterval(clr_compsr); compsr = false;
              $(".stationEdit").children("button").removeAttr("disabled").removeClass("active");
              alert("資料儲存失敗，請重新上傳。"); 
            }
          } else {
            clearInterval(clr_compsr); compsr = false;
            $(".stationEdit").children("button").removeAttr("disabled").removeClass("active");
            alert("資料儲存超出預期而失敗，請重新上傳。");
          }
        }, 1000);
      }
          break;
        }  
      }
      
      
    }
    //維護紀錄kendo
    $("#grid_table01").kendoGrid({
      columns: [
              { field:"Date", title: "維護日期",  width: "120px" },
              { field: "Station", title:"維護場站",  width: "120px" },
              { field: "Person", title:"維護人員", width: "120px" },
              { field: "Picture", title:"圖片", width: "120px" },
              { field: "Note", title:"備註", width: "120px" },
//              { command: ["edit", "destroy"], title: "&nbsp;", width: "200px" },
              { command: [{ name: "edit", }, 
                          { name: "destroy", 
                            click: function(e){
                              e.stopPropagation();
                              // prevent page scroll position change
                              e.preventDefault();
                              // e.target is the DOM element representing the button
                              var tr = $(e.target).closest("tr"); // get the current table row (tr)                              
                              // get the data bound to the current table row
                              var data = this.dataItem(tr);
                              console.log("Details for: " + data.Station);
                            }
                          } ], title: "&nbsp;", width: "200px" // built-in "destroy" command
              }],
//              { command: ["edit", "destroy"], title: "&nbsp;", width: "200px" }],
      dataSource: {
       data: [
        {
            Date: "20200328 00:00",
            Station: "1泰山加壓站",
            Person: "water",
            Picture: "v",
            Note: ""
        },{
            Date: "20200328 00:00",
            Station: "2泰山加壓站",
            Person: "water",
            Picture: "v",
            Note: ""
        },{
            Date: "20200328 00:00",
            Station: "3泰山加壓站",
            Person: "water",
            Picture: "v",
            Note: ""
        },{
            Date: "20200328 00:00",
            Station: "4泰山加壓站",
            Person: "water",
            Picture: "v",
            Note: ""
        },{
            Date: "20200328 00:00",
            Station: "5泰山加壓站",
            Person: "water",
            Picture: "v",
            Note: ""
        },{
            Date: "20200328 00:00",
            Station: "泰山加壓站",
            Person: "water",
            Picture: "v",
            Note: ""
        },{
            Date: "20200328 00:00",
            Station: "泰山加壓站",
            Person: "water",
            Picture: "v",
            Note: ""
        },{
            Date: "20200328 00:00",
            Station: "泰山加壓站",
            Person: "water",
            Picture: "v",
            Note: ""
        },{
            Date: "20200328 00:00",
            Station: "泰山加壓站",
            Person: "water",
            Picture: "v",
            Note: ""
        }],
       pageSize: 10,
       schema:{
          model: {
           id: "id",
           fields: { age: { type: "number"}   }
          }
         }
      },       
      noRecords: {
//        template: "No data available on current page. Current page is: #=this.dataSource.page()#"
        template: "<h6 class='animated flash infinite' style='color:red'>目前尚無資料</h6>"
      },
      pageable: {        
        pageSizes: true,
        numeric: false,
        input: false,
        previousNext: true,               
        buttonCount: 10,
        info: true,
        alwaysVisible:true,
        messages: {
          page: "",
          itemsPerPage: "",
          first: "首頁",
          last: "末頁",
          previous: "上一頁",
          next: "下一頁",
          refresh: "刷新",
        }        
      },
      height: 350,
      sortable: {
        showIndexes: true,
        mode: "multiple"
      },
      filterable: {
        extra: true,
        messages: {
          info: "",
          and: "且",
          or: "或",
          filter: "篩選",
          clear: "清除"
        },
        mode: "menu",
      },
      columnMenu: {
        messages: {
          columns: "欄位",
          filter: "篩選",
          sortAscending: "排序 (小->大)",
          sortDescending: "排序 (大->小)",
        },
      },
      groupable: {
        messages: {
          empty: "拖曳至此以群組顯示"
        }
      },
      edit: function(e) {
        console.log("edit");
        var container = e.container;
//        container.css("background-color", "#d1dbe0");
        container.addClass("updatecont");
      },
      save: function(e) {
        console.log("save");

      },
      cancel: function(e) {
        if(confirm("尚未存檔，確定後跳出。")){}
          else {
            e.preventDefault();
            e.stopPropagation();            
          }
        console.log("cancel");
      },      
//      destroy: function(e) { console.log("destroy")},
      editable: {  destroy: true  },
      persistSelection: true,
      resizable: true, 
      toolbar: ["create", "excel"],      
      editable: 'popup',  
      refresh: true, 
      mobile:false,
    });
    
      var grid = $("#grid_table01").data("kendoGrid");
      grid.bind("excelExport", function(e) {
        e.workbook.fileName = 'filename_' + ".xlsx";
      });  
//      grid.resizeColumn(grid.columns[0], 20);
      grid.resize();
        
    //設備履歷kendo
    function grid_pump(xdata) {
        var t;
        var filename = "設備履歷:"+$("#staID_").text()+"_"+t;
        var jsm = new kendo.data.DataSource({
                data: xdata,
                batch: true,
                pageSize: 10,
                schema: {
                    model: {
                            id: "StationID",
                            fields: { STATION_ID: { editable: false, nullable: true },  
                            INSTALL_DATE: { type: "date", validation: { required: false } },
                                    }
                          }
                    }
         });        
        $("#grid_pump").kendoGrid({
            dataSource: jsm,
            height: 350,
            toolbar: [{ name: "create", text: "新增" },{name: "excel", text: "匯出xlsx"}],            
            columns: [
                { field: "PUMP_NAME", title: "抽水機",  width: "120px" },
                { field: "FREQ", title:"搭配變頻器",  width: "120px" },
                { field: "HP", title:"馬力", width: "120px" },
                { field: "LIFT", title:"揚程", width: "120px" },
                { field: "VOLUME", title:"出水量(CMD)", width: "120px" },
                { field: "CALIBER", title:"口徑(MM)", width: "120px" },
                { field: "INSTALL_DATE", title:"裝置年月日", width: "120px" , format: "{0:yyyy-MM-dd HH:mm:ss}"},
                { command: [{ name: "edit", text: "修改"} , 
                            { className: "btn-destroy", name: "delete", text: "移除", iconClass: "k-icon k-i-delete",
                              click: function(e){
                                debugger;
                              var itemDataObj = {};
                              var url_="http://220.134.42.63:8080/WaterscadaAPI/PostPump_delete";
                              e.stopPropagation();
                              e.preventDefault();
                              itemDataObj['STATION_ID'] = $("#staID_").text();
                              itemDataObj["PUMP_NAME"] = $(e.target).closest("tr").find("td:first").text(); 
                              postToServer(url_, itemDataObj);
                            }
                          } ], title: "&nbsp;", width: "200px" // built-in "destroy" command
              }],
            noRecords: {
              template: "<h6 class='animated flash infinite' style='color:red'>目前尚無資料</h6>"
            },
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
            sortable: {
              showIndexes: true,
              mode: "multiple"
            },
            filterable: {
              extra: true,
              messages: {
                info: "",
                and: "且",
                or: "或",
                filter: "篩選",
                clear: "清除"
              },
              mode: "menu",
            },
            columnMenu: {
              messages: {
                columns: "欄位",
                filter: "篩選",
                sortAscending: "排序 (小->大)",
                sortDescending: "排序 (大->小)",
              },
            },
            groupable: {
              messages: {
                empty: "拖曳至此以群組顯示"
              }
            },            
            edit: function(e) {
              var container = e.container;
              container.addClass("updatecont");
              debugger;
              if($(".updatecont").find("input[name=PUMP_NAME]").val() != ''){
                $(".updatecont").find("input[name=PUMP_NAME]").attr("readonly","true").css({'backgroundColor':'#D1DBD4', 'color': '#656565'});                  
                console.log("edit");
              } else {
                container.addClass("addcont");  
                console.log("add");
              }
            },
            save: function(e) {              
              var grid = $("#grid_pump").data("kendoGrid");
              var colume_ = [], getDatas = '', itemData = '', itemDataObj = {};
              var url_="http://220.134.42.63:8080/WaterscadaAPI/PostPump_addupdate";
//              getDatas = e.model;               $(".updatecont").find("input[name=PUMP_NAME]").attr("readonly","false").css({'backgroundColor':'#D1DBD4', 'color': '#656565'});
              //取key值
              for (var i = 0; i < grid.columns.length; i++) {
                colume_.push(grid.columns[i].field);
//                console.log(grid.columns[i].field); // displays "name" and then "age"
              }
              for(var i = 0; i < colume_.length-1; i++) { 
                itemData=e.model[colume_[i]];
                itemDataObj[colume_[i]] = itemData;
              }
              debugger;
              var t = itemDataObj['INSTALL_DATE'];
              var t_str = JSON.stringify(t);
              itemDataObj['STATION_ID'] = $("#staID_").text();
              if(t !='')
                itemDataObj['INSTALL_DATE'] = t_str.split("\"")[1].split(".")[0]+':00';
              console.log(itemDataObj);
              postToServer(url_, itemDataObj);
              console.log("save");                            
            },
            cancel: function(e) {
              var grid = $("#grid_pump").data("kendoGrid");
              console.log("cancel");
              if($(".updatecont").hasClass("addcont")){
                console.log( 'cancen for addtion function');
              }
            }, 
            editable: {
              mode: "popup",              
              confirmation: true,
              cancelDelete: "No"      
            }
          });
        var grid = $("#grid_pump").data("kendoGrid");
        grid.bind("excelExport", function(e) {
          e.workbook.fileName = filename + ".xlsx";
        }); 
    };
//    $(document).on('change', '.updatecont input', function(){en__ = true; });
    
  </script>

  <script>
    $(".menu_title .trigger").click(function() {
      $("#moniter").toggleClass("moniter_change");
      $(".modal-table").toggleClass("modal-table-change");
      console.log("modal-table");
    });
  </script>
  
  
</body>

</html>
