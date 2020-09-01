<?php 
  @session_start();  
  if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
    //login fail
    header("Location:login.php");
  }
  else{
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
  }
?>
<!DOCTYPE html>
<html lang="zh_TW">

<head>
  <meta charset="UTF-8">
  <!--  <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
  <meta
    http-equiv="X-UA-Compatible"
    content="chrome=1"
  >
  <meta
    name='viewport'
    content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'
  >
  <title>水情通報 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta
    http-equiv="Content-Type"
    content="text/html; charset=utf-8"
  />
  <meta
    name="description"
    content="第十二區管理處供水調配操控整合管理系統"
  />
  <link
    rel="shortcut icon"
    href="images/favicon-32.ico"
    type="image/x-icon"
  >
  <link
    href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'
    rel='stylesheet'
  >
  <!-- <link rel="stylesheet" href="css/kendoUI.css" type="text/css" /> -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css"
  />
  <link
    rel="stylesheet"
    href="css/bastlayer.css"
    type="text/css"
  />
  <link
    rel="stylesheet"
    href="css/style.css"
    type="text/css"
  />
  <link
    rel="stylesheet"
    href="css/gen.css"
    type="text/css"
  >
  <link
    rel="stylesheet"
    href="css/DataReport.css"
  >

  <script
    type='text/javascript'
    src='js/jquery-2.1.0.min.js'
  ></script>
  <!-- <script
    type='text/javascript'
    src='js/gen.js'
  ></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
  <link
    rel="stylesheet"
    href="./css/DataAnalyzeFlow.css"
  />
  <link
    rel="stylesheet"
    href="./css/jquery-ui.css"
  >

  <style>

  </style>
</head>

<!-- <body onload="showtime(); getPipeData();"> -->

<body>

  <!-- #top_header [top] -->
  <div id="top_header">
    <div class="current_date pos_left">
      <div class="date"><span
          id='currdate'
          style="display: inline-block;"
        ></span><img src="images/time.png"><span id="currtime"></span></div>
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
    <a
      href="#"
      class="mobile_menu"
    ></a>
  </div>
  <a
    href="#"
    id="header_closed"
    class="open"
  >
    <img
      class="animated infinite flash"
      src="images/xright.svg"
    />
  </a>

  <!-- #top_header [end] -->
  <header>
    <div class="mobile_mask"></div>
    <div id="menu">

      <!-- main_menu [begin] -->
      <nav class="main_menu  center">
        <ul>
          <li class="">
            <a
              href="./mapview.php"
              class="m1"
            ><img src="images/icons/btn-icon01a.png" />全區供水<span>Map view</span></a>
            <ul class="child_menu">
              <li><a
                  href="#"
                  class="left_menu1 "
                >
                  <div class="pic"><img src="images/m1.png" /></div>
                  快速選單
                </a></li>
              <li><a
                  href="#"
                  class="left_menu2 "
                >
                  <div class="pic"><img src="images/m2.png" /></div>
                  基本圖層
                </a></li>
            </ul>
          </li>
          <li><a
              href="#"
              class="m2"
            ><img src="images/icons/btn-icon02a.png" />即時水情看板<span>Instant board</span></a>
            <ul class="child_menu">
              <li><a
                  href="javascript:void(0)"
                  class=" "
                  onclick="console.log($(this).next('.show_popinfo').fadeToggle('fast'))"
                >
                  <div class="pic"><img src="images/m2.png" /></div>
                  儀表板
                </a>
                <div
                  class="show_popinfo"
                  style="width:180px"
                >
                  <a href="./DashboardSupply.php">全區供水<div class="pic"><img src="images/m2.png" /></div></a>
                  <a href="./DashboardPull.php">原水資訊<div class="pic"><img src="images/m2.png" /></div></a>
                  <a href="./DashboardWell.php">板新淨水資訊<div class="pic"><img src="images/m2.png" /></div></a>
                </div>
              </li>
              <li><a
                  href="./WaterBalance.php"
                  class=""
                >
                  <div class="pic"><img src="images/m1.png" /></div>
                  供水平衡圖
                </a></li>
              <li><a
                  href="./WaterSanxia.php"
                  class=" "
                >
                  <div class="pic"><img src="images/m2.png" /></div>
                  原水三峽河
                </a></li>
              <li><a
                  href="./WaterYushan.php"
                  class=" "
                >
                  <div class="pic"><img src="images/m1.png" /></div>
                  原水鳶山堰
                </a></li>
              <li><a
                  href="./WaterBanxin.php"
                  class=" "
                >
                  <div class="pic"><img src="images/m2.png" /></div>
                  板新導水
                </a></li>
              <li><a
                  href="./WaterBanxinScr.php"
                  class=" "
                >
                  <div class="pic"><img src="images/m1.png" /></div>
                  板新供水
                </a>
                <div class="show_banxioverview">
                  <a href="./mapBanxin.php">
                    <div class="pic"><img src="images/m2.png" /></div>板新調配總覽
                  </a>
                </div>
              </li>
              <li><a
                  href="./WaterOfMainPipe.php"
                  class=" "
                >
                  <div class="pic"><img src="images/m2.png" /></div>
                  八大管線
                </a></li>
              <li><a
                  href="./WaterLevel.php"
                  class=" "
                >
                  <div class="pic"><img src="images/m2.png" /></div>
                  水位總覽圖
                </a>
              </li>
              <li>
                <a
                  href="./ElevationSystem.php"
                  class=" "
                >
                  <div class="pic"><img src="images/m2.png" /></div>
                  供水高程系統
                </a>
              </li>
            </ul>
          </li>
          <li class="active"><a
              href="javascript:void(0);"
              class="m3"
            ><img src="images/icons/btn-icon03a.png" />監控系統資訊<span>Monitoring system</span></a>
            <ul
              class="child_menu"
              style=""
            >
              <li><a
                  href="./DataQuery.php"
                  class=""
                >
                  <div class="pic"><img src="images/m1.png" /></div>
                  數值查詢
                </a></li>
              <li><a
                  href="./DataPicture.php"
                  class=""
                >
                  <div class="pic"><img src="images/m2.png" /></div>
                  即時圖控
                </a></li>
              <li><a
                  href="./DataCCTV.php"
                  class=""
                >
                  <div class="pic"><img src="images/m2.png" /></div>
                  即時影像
                </a></li>
              <li><a
                  href="./DataReport.php"
                  class=""
                >
                  <div class="pic "><img src="images/m2.png" /></div>
                  日常報表
                </a>
              </li>
              <li><a
                  href="./DataAnalyzeFlow.php"
                  class="active"
                >
                  <div class="pic"><img src="images/m2.png" /></div>
                  配水系統
                </a>
              </li>
              <li><a
                  href="./DataWaterinfoReport.php"
                  class=""
                >
                  <div class="pic"><img src="images/m2.png" /></div>
                  水情通報
                </a>
              </li>
              <li>
                <a
                  href="javascript:void(0)"
                  class=" "
                  onclick="console.log($(this).next('.show_popinfo').fadeToggle('fast'))"
                >
                  <div class="pic"><img src="images/m2.png" /></div>
                  設備履歷管理系統
                </a>
                <div class="show_popinfo">
                  <a
                    href="./PushImportXls.php"
                    onclick="$('.show_popinfo').css({'display':'none'})"
                  >匯入資料<div class="pic"><img src="images/m2.png" /></div></a>
                  <a href="https://61.222.53.185/WaterEqp/" target="_new">進入管理系統<div class="pic"><img src="images/m2.png" /></div></a>
                </div>
              </li>
            </ul>
          </li>
          <li><a
              href="javascript:void(0);"
              class="m4"
            ><img src="images/icons/btn-icon04a.png" />綜合資訊<span>Comprehensive</span></a>
            <ul
              class="child_menu"
              style=""
            >
              <li><a
                  href="./DisasterInfo.php"
                  class=""
                >
                  <div class="pic"><img src="images/m1.png" /></div>
                  防災專區
                </a></li>
              <li><a
                  href="./operation.php"
                  class=""
                >
                  <div class="pic"><img src="images/m2.png" /></div>
                  手冊專區
                </a></li>
              <li><a
                  href="./ExtraLinking.php"
                  class=""
                >
                  <div class="pic"><img src="images/m2.png" /></div>
                  外部連結
                </a>
              </li>
            </ul>
          </li>
          <li class=""><a
              href="./rowmap.php"
              class="m4"
            ><img src="images/icons/btn-icon04a.png" />網站地圖<span>Row Map</span></a></li>
        </ul>
      </nav>
      <!-- main_menu [end] -->
    </div>
  </header>
  <div
    class="container"
    style="margin-top: 70px;"
  >
    <div id="systemMode">
      <ul class="controlBar">
        <li class="nav-item">
          <input
            class="nav-link"
            type="button"
            id="import"
            value="取回資料"
            style="display: none;"
          />
        </li>
        <li class="nav-item">
          <button
            class="nav-link"
            type="submit"
          >更新配水</button>
        </li>
      </ul>
      <div style="position: absolute; top:0px">
        <div
          id="station"
          class="station"
          nama="直潭淨水場"
        >
          <span>供水量：</span>
          <input
            type="number"
            id="waterStation"
            name="waterStation"
            value="65"
            data-type="淨水站"
            data-staid="直潭淨水站"
          >
        </div>
        <div
          id="giveStation_"
          class="giveStation"
          nama="板新給水站"
        >
          <span>給水量：</span>
          <input
            type="text"
            id="giveStation"
            name="giveStation"
            value="21.5"
            data-type="給水站"
            data-staid="板新給水站"
            readonly
          >
        </div>
        <div id="useWater">
          <div
            class="useWater_1"
            nama="鶯歌、三峽"
          >
            <span>用水量：</span><input
              type="number"
              id="useStation_1"
              name="useStation_1"
              value="10"
              data-type="取水站"
              data-staid="鶯歌、三峽取水站"
            >
          </div>
          <div
            class="useWater_2"
            nama="八里、五股、泰山、樹林、廻龍"
          >
            <span>用水量：</span>
            <input
              type="number"
              id="useStation_2"
              name="useStation_2"
              value="15.5"
              data-type="取水站"
              data-staid="八里、五股、泰山、樹林、廻龍取水站"
            >
          </div>
          <div
            class="useWater_3"
            nama="蘆洲、五股"
          >
            <span>用水量：</span>
            <input
              type="number"
              id="useStation_3"
              name="useStation_3"
              value="9"
              data-type="取水站"
              data-staid="蘆洲、五股取水站"
            >
          </div>
          <div
            class="useWater_4"
            nama="新莊、泰山"
          >
            <span>用水量：</span>
            <input
              type="number"
              id="useStation_4"
              name="useStation_4"
              value="21"
              data-type="取水站"
              data-staid="新莊、泰山取水站"
            >
          </div>
          <div
            class="useWater_5"
            nama="中和、板橋、土城"
          >
            <span>用水量：</span>
            <input
              type="number"
              id="useStation_5"
              name="useStation_5"
              value="31"
              data-type="取水站"
              data-staid="中和、板橋、土城取水站"
            >
          </div>
        </div>

        <!-- 用水量，從直潭至各區 -->
        <div id="pipe_flow">
          <div
            class="waterConsumption_1 width220"
            data-pipe="直潭至中和、板橋、土城流量"
          >
            <span><img
                class="flowImage"
                src="./images/iconfinder_water_406840.png"
                alt="流量"
              /></span><label
              id="waterConsumption_1"
              name="直潭至中和、板橋、土城流量"
            >30</label><br />
            <input
              type="number"
              id="pipeLength_1"
              value="6422"
              data-type="管長"
              data-staid="直潭至中和、板橋、土城管長"
            >
            m<br />
            <input
              type="number"
              id="pipeDiameter_1"
              value="1200"
              data-type="管徑"
              data-staid="直潭至中和、板橋、土城管徑"
            > Φ
          </div>
          <div
            class="waterConsumption_2 width220"
            data-pipe="直潭至新莊、泰山流量"
          >
            <span><img
                class="flowImage"
                src="./images/iconfinder_water_406840.png"
                alt="流量"
              /></span><label
              id="waterConsumption_2"
              name="直潭至新莊、泰山流量"
            >30</label><br />
            <input
              type="number"
              id="pipeLength_2"
              value="6422"
              data-type="管長"
              data-staid="直潭至新莊、泰山管長"
            >
            m<br />
            <input
              type="number"
              id="pipeDiameter_2"
              value="1200"
              data-type="管徑"
              data-staid="直潭至新莊、泰山管徑"
            > Φ
          </div>
          <div
            class="waterConsumption_3 width220"
            data-pipe="直潭至蘆洲、五股流量"
          >
            <span><img
                class="flowImage"
                src="./images/iconfinder_water_406840.png"
                alt="流量"
              /></span><label
              id="waterConsumption_3"
              name="直潭至蘆洲、五股城流量"
            >3</label><br />
            <input
              type="number"
              id="pipeLength_3"
              value="6422"
              data-type="管長"
              data-staid="直潭至蘆洲、五股管長"
            >
            m<br />
            <input
              type="number"
              id="pipeDiameter_3"
              value="1200"
              data-type="管徑"
              data-staid="直潭至蘆洲、五股管徑"
            > Φ
          </div>

          <div
            class="waterConsumption_4 width220"
            data-pipe="直潭至八里、五股、泰山、樹林、廻龍流量"
          >
            <span><img
                class="flowImage"
                src="./images/iconfinder_water_406840.png"
                alt="流量"
              /></span><label
              id="waterConsumption_4"
              name="直潭至八里、五股、泰山、樹林、廻龍流量"
            >2 </label><br />
            <input
              type="number"
              id="pipeLength_4"
              value="6422"
              data-type="管長"
              data-staid="直潭至八里、五股、泰山、樹林、廻龍管長"
            >
            m<br />
            <input
              type="number"
              id="pipeDiameter_4"
              value="1200"
              data-type="管徑"
              data-staid="直潭至八里、五股、泰山、樹林、廻龍管徑"
            > Φ
          </div>
          <div
            class="waterConsumption_5 width220"
            data-pipe="中和至新莊流量"
          >
            <span><img
                class="flowImage"
                src="./images/iconfinder_water_406840.png"
                alt="流量"
              /></span><label
              id="waterConsumption_5"
              name="中和至新莊流量"
            >8.4 </label><br />
            <input
              type="number"
              id="pipeLength_5"
              value="6422"
              data-type="管長"
              data-staid="中和至新莊管長"
            >
            m<br />
            <input
              type="number"
              id="pipeDiameter_5"
              value="1200"
              data-type="管徑"
              data-staid="中和至新莊管徑"
            > Φ
          </div>
          <div
            class="waterConsumption_6 width220"
            data-pipe="新莊至中和流量"
          >
            <span><img
                class="flowImage"
                src="./images/iconfinder_water_406840.png"
                alt="流量"
              /></span><label
              id="waterConsumption_6"
              name="新莊至中和流量"
            >9.4</label><br />
            <input
              type="number"
              id="pipeLength_6"
              value="2000"
              data-type="管長"
              data-staid="新莊至中和管長"
            >
            m<br />
            <input
              type="number"
              id="pipeDiameter_6"
              value="1500"
              data-type="管徑"
              data-staid="新莊至中和管徑"
            > Φ
          </div>
          <div
            class="waterConsumption_7 width220"
            data-pipe="新莊至八里流量"
          >
            <span><img
                class="flowImage"
                src="./images/iconfinder_water_406840.png"
                alt="流量"
              /></span><label
              id="waterConsumption_7"
              name="新莊至八里流量"
            >5</label><br />
            <input
              type="number"
              id="pipeLength_7"
              value="1750"
              data-type="管長"
              data-staid="新莊至八里管長"
            >
            m
            <input
              type="number"
              id="pipeDiameter_7"
              value="1500"
              data-type="管徑"
              data-staid="新莊至八里管徑"
            > Φ
          </div>
          <div
            class="waterConsumption_8 width220"
            data-pipe="新莊至中八里流量2"
          >
            <span><img
                class="flowImage"
                src="./images/iconfinder_water_406840.png"
                alt="流量"
              /></span><label
              id="waterConsumption_8"
              name="新莊至八里流量2"
            >3</label><br />
            <input
              type="number"
              id="pipeLength_8"
              value="608"
              data-type="管長"
              data-staid="新莊至中八里管長2"
            >
            m
            <input
              type="number"
              id="pipeDiameter_8"
              value="1000"
              data-type="管徑"
              data-staid="新莊至中八里管徑2"
            > Φ
          </div>
          <div
            class="waterConsumption_9 width220"
            data-pipe="八里至蘆洲流量"
          >
            <span><img
                class="flowImage"
                src="./images/iconfinder_water_406840.png"
                alt="流量"
              /></span><label
              id="waterConsumption_9"
              name="八里至蘆洲流量"
            >6</label><br />
            <input
              type="number"
              id="pipeLength_9"
              value="6740"
              data-type="管長"
              data-staid="八里至蘆洲管長"
            >
            m<br />
            <input
              type="number"
              id="pipeDiameter_9"
              value="800"
              data-type="管徑"
              data-staid="八里至蘆洲管徑"
            > Φ
          </div>
          <div
            class="waterConsumption_10 width220"
            data-pipe="板新至八里流量"
          >
            <span><img
                class="flowImage"
                src="./images/iconfinder_water_406840.png"
                alt="流量"
              /></span><label
              id="waterConsumption_10"
              name="板新至八里流量"
            >11.5</label><br />
            <input
              type="number"
              id="pipeLength_10"
              value="9676"
              data-type="管長"
              data-staid="板新至八里管長"
            >
            m<br />
            <input
              type="number"
              id="pipeDiameter_10"
              value="1350"
              data-type="管徑"
              data-staid="板新至八里管徑"
            > Φ
          </div>
          <div
            class="waterConsumption_11 width220"
            data-pipe="板新至鶯歌流量"
          >
            <span><img
                class="flowImage"
                src="./images/iconfinder_water_406840.png"
                alt="流量"
              /></span><label
              id="waterConsumption_11"
              name="板新至鶯歌流量"
            >10</label><br />
            <input
              type="number"
              id="pipeLength_11"
              value="5000"
              data-type="管長"
              data-staid="板新至鶯歌管長"
            >
            m<br />
            <input
              type="number"
              id="pipeDiameter_11"
              value="600"
              data-type="管徑"
              data-staid="板新至鶯歌管徑"
            > Φ
          </div>
          <div
            class="waterConsumption_12 width220"
            data-pipe="板新至中和、板橋、土城流量"
          >
            <!--尚未定義先放html-->
            <span><img
                class="flowImage"
                src="./images/iconfinder_water_406840.png"
                alt="流量"
              /></span><label
              id="waterConsumption_12"
              name="板新至中和、板橋、土城流量"
            >0</label><br />
            <input
              type="number"
              id="pipeLength_12"
              value="0"
              data-type="管長"
              data-staid="板新至中和、板橋、土城管長"
            >
            m
            <input
              type="number"
              id="pipeDiameter_12"
              value="0"
              data-type="管徑"
              data-staid="板新至中和、板橋、土城管徑"
            > Φ
          </div>
          <div
            class="waterConsumption_13 width220"
            data-pipe="板新至新莊、泰山流量"
          >
            <!--尚未定義先放html-->
            <span><img
                class="flowImage"
                src="./images/iconfinder_water_406840.png"
                alt="流量"
              /></span><label
              id="waterConsumption_13"
              name="板新至新莊、泰山流量"
            >0</label><br />
            <input
              type="number"
              id="pipeLength_13"
              value="0"
              data-type="管長"
              data-staid="板新至新莊、泰山管長"
            >
            m
            <input
              type="number"
              id="pipeDiameter_13"
              value="0"
              data-type="管徑"
              data-staid="板新至新莊、泰山管徑"
            > Φ
          </div>
        </div>
      </div>
      <!--        <button>ch</button>-->
    </div>
  </div>
  <div
    class="table-responsive-md"
    style="margin-top: 200px;"
  >
    <table class="table table-bordered table-hover">
      <h5 class="table-result">配水系統分析結果</h5>
      <thead class="thead-dark">
        <tr>
          <th>
            <div class="slash"><b>管線</b><b>配置方法</b></div>
          </th>
          <th>供水站1(萬噸/日)</th>
          <th>供水站2(萬噸/日)</th>
          <th>電價(萬元)</th>
          <th>製水費(萬元)</th>
          <th>購水費(萬元)</th>
          <th>總成本(萬元)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-title="管線/配置方法">原始配置(固定流率)</td>
          <td
            data-title="供水站1(萬噸/日)"
            data-result="前_供水站1"
          >22.5</td>
          <td
            data-title="供水站2(萬噸/日)"
            data-result="前_供水站2"
          >65</td>
          <td
            data-title="電價(萬元)"
            data-result="前_電價"
          >812.0</td>
          <td
            data-title="製水費(萬元)"
            data-result="前_製水費"
          >58.05</td>
          <td
            data-title="購水費(萬元)"
            data-result="前_購水費"
          >216.45</td>
          <td
            data-title="總成本(萬元)"
            data-result="前_總成本"
            class="success"
            style="color: #ff0000;"
          >
            1086.5
          </td>
        </tr>
        <tr>
          <td data-title="管線/配置方法">+10%上限尋找最佳配置</td>
          <td
            data-title="供水站1(萬噸/日)"
            data-result="後_供水站1"
          >
            22.65
          </td>
          <td
            data-title="供水站2(萬噸/日)"
            data-result="後_供水站2"
          >
            63.85
          </td>
          <td
            data-title="電價(萬元)"
            data-result="後_電價"
          >788.4</td>
          <td
            data-title="製水費(萬元)"
            data-result="後_製水費"
          >61.155</td>
          <td
            data-title="購水費(萬元)"
            data-result="後_購水費"
          >212.62</td>
          <td
            data-title="總成本(萬元)"
            data-result="後_總成本"
            style="color: #0000ff;"
          >
            1062.2
          </td>
        </tr>
        <tr class="table-success">
          <td colspan="6">省下成本</td>
          <td>
            <span
              data-title="省下成本"
              style="font-weight: bold;"
              data-result="差異"
            >-24</span>(
            <span
              data-title="省下成本"
              style="font-weight: bold;"
              data-result="差異趴數"
            >-2.2</span>%)
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <?php include_once "./php/footer.php";?>

  <script
    type="text/javascript"
    src="./js/jquery-3.4.0.min.js"
  ></script>

  <script
    type="text/javascript"
    src="./js/bootstrap-slider.min.js"
  ></script>
  <script
    type="text/javascript"
    src="./js/nicescroll.js"
  ></script>
  <script
    type="text/javascript"
    src="./js/script.js"
  ></script>
  <script src="./js/jquery-ui.js"></script>
  <script src="./jquery/jquery.ui.touch-punch.js"></script>


  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.js"></script>
  <script>
    $(document).ready(function () {
      $(".pos_right > span").text("<?php echo $nam?>");
      $("input[name=idn]").val("<?php echo $id?>");
      var idn = $("input[name=idn]").val();
      //取回流量資料
      $("#import").click(function (e) {
        // getPipeData();
        // getStationType();
        getAnalysisresult();
      });

      // 更新配水
      //寫入檔案
      $("button[type=submit]").on('click', function (e) {
        var result = analyzeResult();
        if (!result) {
          return;
        }
        $("button[type=submit]").addClass("active");
        var xdata = [];
        var obj = {};
        var staid = $('body').find('[data-staid]');
        for (var x = 0; x < staid.len使用紙th; x++) {
          obj["station_id"] = $(staid[x]).attr("data-staid");
          obj["station_type"] = $(staid[x]).attr("data-type");
          obj["values"] = $(staid[x]).val();
          xdata.push(obj);
          obj = {};
        }
        // var url_ = "http://220.134.42.63:8080/WaterscadaAPI/PostWaterdata";
        // postToServer(url_, xdata);
        setTimeout(function () {
          getPipeData();
          getAnalysisresult();
          getStationType();
        }, 3000);
      });
    });

    //禁止ctrl+滾輪
    $('body').css('zoom', 'reset');
    $(document).keydown(function (event) {
      //event.metaKey mac的command键
      if ((event.ctrlKey === true || event.metaKey === true) && (event.which === 61 || event.which === 107 || event
          .which === 173 || event.which === 109 || event.which === 187 || event.which === 189)) {
        event.preventDefault();
      }
    });
    $(window).bind('mousewheel DOMMouseScroll', function (event) {
      if (event.ctrlKey === true || event.metaKey) {
        event.preventDefault();
      }

    });
    //分析供水量與用水量
    function analyzeResult() {
      var areaA = $('#useStation_2').val();
      var areaB = $('#useStation_3').val();
      var areaC = $('#useStation_4').val();
      var areaD = $('#useStation_5').val();
      var waterStation = $('#waterStation').val(); //直潭淨水場

      var waterArea = Number(areaA) + Number(areaC) + Number(areaB) + Number(areaD); //76.5
      var areaE = Number($('#useStation_1').val());
      var getStaVal = waterArea - Number(waterStation) + Number(areaE);
      $('#giveStation_').children("input").val(getStaVal);
      if (areaE > getStaVal) {
        $('#giveStation_').find("input").css({
          "backgroundColor": "red"
        });
        alert("供水站1的給水量不得低於用水區E的用水量，請再次檢查輸入值。");
        var _error_ = false;
      } else {
        $('#giveStation_').find("input").css({
          "backgroundColor": "#073469"
        });
        var _error_ = true;
      }
      return _error_;

    }
    // 流量取值
    function getPipeData() {
      // let url = "http://220.134.42.63:8080/waterscadaAPI/GetFlowData";
      let url = "http://localhost:3001/WaterscadaAPI"
      var pipe_flow = getToServer(url);
      debugger;
      console.log(pipe_flow);
      var len = $("#pipe_flow").find("[data-pipe]").length;
      for (var x = 0; x < len; x++) {
        var html_data_pipe = $("#pipe_flow").find("[data-pipe]").eq(x).attr("data-pipe");
        for (var y = 0; y < pipe_flow.length; y++) {
          if (pipe_flow[y].station_id == html_data_pipe) {
            $("[data-pipe]").eq(x).find('label').text(pipe_flow[y].values).css({
              'padding': '0px'
            });
          }
        }
      }
      debugger;

      // var len2 = $("tr").find("[data-result]").length;
      // debugger;
      // for (var x = 0; x < len2; x++) {
      //   var html_data_result = $("tr")
      //     .find("[data-result]")
      //     .eq(x)
      //     .attr("data-result");
      //   // 取cost_id

      //   for (var y = 0; y < pipe_flow.length; y++) {
      //     if (pipe_flow[y].cost_id == html_data_result) {
      //       console.log("值：" + pipe_flow[y].values)
      //       $("tr").find("[data-result]")[y].textContent =
      //         pipe_flow[y].values;
      //     }
      //     //   if (pipe_flow[y].cost_id == html_data_result) {
      //     //     $("tr").find("[data-result]")[y].textContent = pipe_flow[y]
      //     //       .values
      //     //   }
      //   }
      // }
      // console.log("Cost 載入 ok")

    }
    // 配水系統分析結果取值
    function getAnalysisresult() {
      let url = "http://localhost:3001/waterscadaAPI";
      var result_data = getToServer(url);
      var len = $("tr").find("[data-result]").length;
      debugger;
      console.log("開始取cost_id值")
      for (var x = 0; x < len; x++) {
        var html_data_result = $("tr")
          .find("[data-result]")
          .eq(x)
          .attr("data-result");
        var html_data_result_values = $("tr")
          .find("[data-result]")
          .eq(x)
          .text()

        // 取costData.json資料比對
        for (var y = 0; y < result_data.length; y++) {
          if (result_data[y].cost_id == html_data_result) {
            $("tr").find("[data-result]")[(x)].textContent = result_data[y].values;
          }
        }
      }
      console.log("取cost_id值完畢")
    }


    // 淨水站,管徑取值
    // getStationType()
    function getStationType() {
      // let url = "http://220.134.42.63:8080/waterscadaAPI/GetWaterData";
      let url = "http://localhost:3002/WaterscadaAPI"
      var pipe_flow = getToServer(url);
      debugger;
      console.log(pipe_flow);
      var len = $("#pipe_flow").find("[data-staid]").length;
      for (var x = 0; x < len; x++) {
        var html_data_diameter = $("#pipe_flow").find("[data-staid]").eq(x).attr("data-staid");
        var html_data_length = $("#pipe_flow").find("[data-staid]").eq(x).attr("data-staid");
        var html_data_state = $("#station").find("[data-staid]").eq(x).attr("data-staid");
        var html_data_give = $("#giveStation_").find("[data-staid]").eq(x).attr("data-staid");
        var html_data_use = $("#useWater").find("[data-staid]").eq(x).attr("data-staid");

        //        if(pipe_flow.length > 0) {
        for (var y = 0; y < pipe_flow.length; y++) {
          switch (pipe_flow[y].station_id) {
            case html_data_diameter: {
              $("#pipe_flow").find('[data-staid]').eq(x).val(pipe_flow[y].values).css({
                'backgroundColor': '#073469'
              });
              break;
            }
            case html_data_length: {
              $("#pipe_flow").find("[data-staid]").eq(x).val(pipe_flow[y].values).css({
                'backgroundColor': '#073469'
              });
              break;
            }
            case html_data_state: {
              $("#station").find("[data-staid]").eq(x).val(pipe_flow[y].values).css({
                'backgroundColor': '#073469'
              });
              break;
            }
            case html_data_give: {
              $("#giveStation_").find("[data-staid]").eq(x).val(pipe_flow[y].values).css({
                'backgroundColor': '#073469'
              });
              break;
            }
            case html_data_use: {
              $("#useWater").find("[data-staid]").eq(x).val(pipe_flow[y].values).css({
                'backgroundColor': '#073469'
              });
              break;
            }
            default:
              //alert("資料讀取異常\n 異常場站：" + pipe_flow[y].station_id);
          }
        }
        //        }
      }
    }


    function getToServer(url_) {
      var result = false;
      $.ajax({
        url: url_,
        type: 'GET',
        dataType: "json",
        async: false,
        success: function (data) {
          result = data;
        },
        error: function () {
          console.log("get json fail");
        }
      });
      return result;
    };

    function postToServer(url_, array_data) {
      var result = '';
      $.ajax({
        url: './php/pos_rawBody.php',
        type: 'POST',
        async: false,
        cache: false, //上傳文件不需要緩存
        data: {
          'url_': url_,
          'xdata': JSON.stringify(array_data),
        },
        success: function (data) {
          result = data;
          $("button[type=submit]").removeClass("active");
          console.log(data);

        },
        error: function () {
          alert("上傳失敗，請重新上傳。");
        }
      });
      return result;
    }
  </script>
</body>

</html>