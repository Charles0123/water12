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

  <meta
    name='viewport'
    content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'
  >
  <title>儀表板 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta
    http-equiv="Content-Type"
    content="text/html; charset=utf-8"
  />
  <meta
    name="description"
    content="第十二區管理處供水調配操控整合管理系統"
  />
  <meta
    http-equiv="X-UA-Compatible"
    content="chrome=1"
  >
  <link
    rel="shortcut icon"
    href="images/favicon-32.ico"
    type="image/x-icon"
  >
  <link
    rel="stylesheet"
    href="css/kendoUI.css"
    type="text/css"
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
  />
  <!-- <link rel="stylesheet" href="css/WaterBanxin.css" /> -->
  <link
    rel='stylesheet'
    href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'
  />
  <link
    rel="stylesheet"
    href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css"
  >
  <link
    rel="stylesheet"
    href="css/WaterDashboard.css"
  />
  <script
    type="text/javascript"
    src="./js/jquery-3.4.0.min.js"
  ></script>
  <script
    type="text/javascript"
    src="js/gen.js"
  ></script>
  <script
    type="text/javascript"
    src="js/DisasterInfo.js"
  ></script>
  <script src="./js/parameter_def.js"></script>
  <script src="./js/script_inner.js"></script>
  <!--  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>-->
  <!--  <script src="searchbase-new.js"></script>-->

  <link
    rel="stylesheet"
    href="https://kendo.cdn.telerik.com/2020.1.406/styles/kendo.default-v2.min.css"
  />

  <link
    rel="stylesheet"
    href="https://kendo.cdn.telerik.com/2019.3.917/styles/kendo.common.min.css"
  >
  <link
    rel="stylesheet"
    href="https://kendo.cdn.telerik.com/2019.3.917/styles/kendo.rtl.min.css"
  >
  <link
    rel="stylesheet"
    href="https://kendo.cdn.telerik.com/2019.3.917/styles/kendo.default.min.css"
  >
  <link
    rel="stylesheet"
    href="https://kendo.cdn.telerik.com/2019.3.917/styles/kendo.mobile.all.min.css"
  >
</head>

<body onload="showtime();">
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
    <div
      class="mobile_mask"
      style="display:block"
    ><i
        class="fa fa-spinner fa-pulse fa-4x fa-fw"
        style="color: #33b9ff; margin: 20% auto; width: 100%; margin-top: calc(100vh - 50vh);"
      ></i></div>
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
                  href="javascript:void(0)"
                  class="left_menu1 "
                >
                  <div class="pic"><img src="images/m1.png" /></div>
                  快速選單
                </a></li>
              <li><a
                  href="javascript:void(0)"
                  class="left_menu2 "
                >
                  <div class="pic"><img src="images/m2.png" /></div>
                  基本圖層
                </a></li>
            </ul>
          </li>
          <li class="active"><a
              href="#"
              class="m2"
            ><img src="images/icons/btn-icon02a.png" />即時水情看板<span>Instant board</span></a>
            <ul class="child_menu">
              <li><a
                  href="javascript:void(0)"
                  class="active"
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
                  <a
                    class="active"
                    href="./DashboardWell.php"
                  >板新淨水資訊<div class="pic"><img src="images/m2.png" /></div></a>
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
          <li class=""><a
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
                  <div class="pic"><img src="images/m2.png" /></div>
                  日常報表
                </a></li>
              <li><a
                  href="./DataAnalyzeFlow.php"
                  class=""
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
                </a></li>
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
    id="dsr_Info"
    class="container1"
  >
    <div class="contan">

      <div class="wrap">

        <div
          class="range"
          id="waterblock"
        >
          <div class="tit">
            <h5>板新淨水資訊</h5>
          </div>
          <div class="board">
            <div class="tit1">
              <h6>抽水機房運作狀態</h6><a href="javascript:void(0)"><i
                  class="fa fa-search"
                  aria-hidden="true"
                ></i></a>
            </div>
            <a href="javascript:void(0)"><i
                class="fa fa-search"
                aria-hidden="true"
              ></i></a>
            <div
              id="chartdiv11"
              class="outside"
            >
              <div class="left">
                <h6>板橋線500HP</h6><a href="javascript:void(0)"><i
                    class="fa fa-search"
                    aria-hidden="true"
                  ></i></a>
                <div class="circle"><span>板橋線500HP#1</span><span class="bian">500HP</span></div>
                <div class="circle"><span>板橋線500HP#2</span><span>500HP</span></div>
                <div class="circle"><span>板橋線500HP#3</span><span>500HP</span></div>
                <div class="circle"><span>板橋線500HP#4</span><span>500HP</span></div>
              </div>
              <div class="left">
                <h6>機房900HP</h6><a href="javascript:void(0)"><i
                    class="fa fa-search"
                    aria-hidden="true"
                  ></i></a>
                <div class="circle gray-light"><span>板橋線900HP#1</span><span>900HP</span></div>
                <div class="circle"><span>板橋線900HP#2</span><span>900HP</span></div>
                <div class="circle"><span>板橋線900HP#3</span><span>900HP</span></div>
                <div class="circle"><span>板橋線900HP#4</span><span>900HP</span></div>
              </div>
            </div>
          </div>
          <div
            id="waterwell"
            class="board1"
          ><a href="javascript:void(0)"><i
                class="fa fa-search"
                aria-hidden="true"
              ></i></a>
            <div id="chartdiv12"></div>
            <div class="down">
              <h6>一二期水質</h6>
              <div class="line">
                <div class="subtit">pH值</div>
                <p>?</p>
                <p></p>
              </div>
              <div class="line">
                <div class="subtit">餘氯</div>
                <p>?</p>
                <p>PPM</p>
              </div>
              <div class="line">
                <div class="subtit">濁度</div>
                <p>?</p>
                <p>NTU</p>
              </div>
              <div class="line">
                <div class="subtit">溫度</div>
                <p>?</p>
                <p>℃</p>
              </div>
              <div class="line">
                <div class="subtit">導電度</div>
                <p>?</p>
                <p>/㎝</p>
              </div>
            </div>
            <div
              class="down"
              style="display:none;"
            >
              <h6>三期水質</h6>
              <div class="line">
                <div class="subtit">pH值</div>
                <p>?</p>
                <p></p>
              </div>
              <div class="line">
                <div class="subtit">餘氯</div>
                <p>?</p>
                <p>PPM</p>
              </div>
              <div class="line">
                <div class="subtit">濁度</div>
                <p>?</p>
                <p>NTU</p>
              </div>
              <div class="line">
                <div class="subtit">溫度</div>
                <p>?</p>
                <p>℃</p>
              </div>
              <div class="line">
                <div class="subtit">導電度</div>
                <p>?</p>
                <p>/㎝</p>
              </div>
            </div>
          </div>
          <div
            class="board2"
            style="min-width: 600px;
    padding: 10px;"
          >
            <div id="chartdiv13">
              <div class="balaImg">
                <div id="mappingConte">
                  <h6
                    id="last_dataTime"
                    style="postion: relative; width: 100%; text-align:right; margin: 0; top: 20px;"
                  >UpdateTime</h6>
                  <img
                    src="images/Dashboard/waterBanxin.png"
                    style="width:100% height: auto"
                  >
                  <div class="setposition">
                    <div class="x2 y4"><span>廢水池A</span><input
                        type="text"
                        readonly
                      ></div>
                  </div>
                  <div class="setposition">
                    <div class="x3 y5"><span>廢水池B</span><input
                        type="text"
                        readonly
                      ></div>
                  </div>
                  <div class="setposition">
                    <div class="x4 y6"><span>三期北一</span><span>瞬間流量</span><input
                        type="text"
                        readonly
                      ></div>
                  </div>
                  <div class="setposition">
                    <div class="x4 y7"><span>三期北二</span><span>瞬間流量</span><input
                        type="text"
                        readonly
                      ></div>
                  </div>
                  <div class="setposition">
                    <div class="x4 y8"><span>三期南一</span><span>瞬間流量</span><input
                        type="text"
                        readonly
                      ></div>
                  </div>
                  <div class="setposition">
                    <div class="x4 y9"><span>三期南二</span><span>瞬間流量</span><input
                        type="text"
                        readonly
                      ></div>
                  </div>
                  <div class="setposition">
                    <div class="x5 y10"><span>二期M5</span><span>瞬間流量</span><input
                        type="text"
                        readonly
                      ></div>
                  </div>
                  <div class="setposition">
                    <div class="x6 y11"><span>二期M6</span><span>瞬間流量</span><input
                        type="text"
                        readonly
                      ></div>
                  </div>
                  <div class="setposition">
                    <div class="x7 y12"><span>一期M7</span><span>瞬間流量</span><input
                        type="text"
                        readonly
                      ></div>
                  </div>
                  <div class="setposition">
                    <div class="x1 y1"><span>一期總流量</span><span>瞬間流量</span><input
                        type="text"
                        readonly
                      ></div>
                  </div>
                  <div class="setposition">
                    <div class="x1 y2"><span>二期總流量</span><span>瞬間流量</span><input
                        type="text"
                        readonly
                      ></div>
                  </div>
                  <div class="setposition">
                    <div class="x1 y3"><span>三期總流量</span><span>瞬間流量</span><input
                        type="text"
                        readonly
                      ></div>
                  </div>
                  <!-- 20200828新增 二單 -->
                  <div class="setposition">
                    <div class="x6 y13"><span>二單流量</span><span>瞬間流量</span><input
                        type="text"
                        readonly
                        class="offline"
                        value="0"
                      ></div>
                  </div>
                  <!-- 20200828新增二雙 -->
                  <div class="setposition">
                    <div class="x8 y14"><span>二雙流量</span><span>瞬間流量</span><input
                        type="text"
                        readonly
                        class="offline"
                        value="0"
                      ></div>
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

  <script
    type="text/javascript"
    src="./js/bootstrap-slider.min.js"
  ></script>
  <script
    type="text/javascript"
    src="./js/nicescroll.js"
    defer
  ></script>
  <script
    type="text/javascript"
    src="./js/script.js"
    defer
  ></script>
  <script src="./js/moment.min.js"></script>
  <script src="./js/moment-with-locales.js"></script>


  <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
  <script src="js/core.js"></script>
  <script src="js/charts.js"></script><!-- amchart -->
  <script src="js/animated.js"></script><!-- amchart -->
  <script src="js/echarts.js"></script><!-- amchart -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts.min.js"></script> -->
  <script src="js/echarts-liquidfill.js"></script>
  <script src="js/WaterDashboard.js"></script>
  <!--  <script src="./js/waterBalance.js"></script>-->
  <script src="./js/jquery-ui.js"></script>
  <script src="./jquery/jquery.ui.touch-punch.js"></script>
  <script
    src="https://kendo.cdn.telerik.com/2019.3.917/js/kendo.all.min.js"
    async
  ></script>
  <!--<script src="https://kendo.cdn.telerik.com/2019.3.917/js/angular.min.js" defer></script>-->
  <script
    src="https://kendo.cdn.telerik.com/2019.3.917/js/jszip.min.js"
    defer
  ></script>

  <!--  -->
  <script
    language="javascript"
    defer
  >
    $(document).tooltip({
      track: true
    });

    $(document).ready(function () {
      setTimeout(function () {
        $("#chartdiv1s > div:nth-child(2) > svg > g > g:nth-child(2) > g:nth-child(2) > g > g:nth-child(3)")
          .remove();
        $("#chartdiv5 > div:nth-child(2) > svg > g > g:nth-child(2) > g:nth-child(2) > g > g:nth-child(3)")
          .remove();
      }, 10);
      var wdth = $(window).width() / 2;
      $(".mobile_mask").css({
        display: "none"
      });
      $("#dialog-message").dialog({
        modal: true,
        autoOpen: false,
        width: wdth,
      });
      $(".editchartdiv2 i").click(function (e) {
        var nm = $(e)[0].target.className;
        open_favor(e, nm);
        if ((nm == "fa fa-heart-o") || (nm == "fa fa-heart"))
          $("#dialog-message").dialog("option", "title", "查看我的最愛");
        if (nm == "fa fa-folder-open-o")
          $("#dialog-message").dialog("option", "title", "選擇場站");
        $("#dialog-message").dialog("open");
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
        success: function (Jdata) {
          $.each(Jdata, function (index, d) {
            getData.push(d);
          });
          var getkeyword = compareString("12區管理處", getData);
          //                 console.log(getkeyword[0].TOOLTIPS);
          console.log(xxx);
          $("#District12_1").val(getkeyword[0].TOOLTIPS);
          //                 console.log(getData[1][0].STATION_ID);
        },
        error: function () {
          console.log("get json fail");
        }
      });
    }

    function compareString(str, getdata) {
      var keyword = str;
      $.each(getdata[1], function (v, x) {
        if (x.STATION_ID == keyword) {
          findIndexofkeywd.push(getdata[1][v]);
        }
      });
      //       console.log(findIndexofkeywd);
      return findIndexofkeywd;
    }

    /*3階*/
    var y = 0;

    function getWeatherJson(url) {
      var getData = [];
      $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        async: false,
        success: function (Jdata) {
          $.each(Jdata, function (index, d) {
            getData.push(d);
          });
          console.log(getData);
        },
        error: function () {
          console.log("get json fail");
        }
      });
      return getData;
    };

    //搜尋文字功能
    function searchKeywrd(string, keyWord) {
      return string.search(keyWord) != -1 ? true : false;
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
      var value = text.replace(/[^\@\#\$\%\^\&\*\(\)\{\}\:\"\L\<\>\?\[\]]/ig, "");
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


    //清水池水位1
    //chartdiv12
    var wave = echarts.init(document.getElementById('chartdiv12'));
    var option = pool();
    wave.setOption(option);
    wave.showLoading();
    var collectionRepeat = function (box, key) {
      var counter = {};
      box.forEach(function (x) {
        counter[x] = (counter[x] || 0) + 1;
      });
      var val = counter[key];
      if (key === undefined) {
        return counter;
      }
      return (val) === undefined ? 0 : val;
    }
    var setWaterchartdiv12off;

    function setWaterchartdiv12(xdata) {
      console.log(xdata);
      var wellstr = [];
      var keyword = "清水池";
      for (var x = 0; x < xdata.length; x++) {
        var temp = xdata[x].split(" ");
        //0: "15000M3清水池:水位2:150.00:gray"
        if (keyword == getBig5(xdata[x].split(" ")[0])) {
          wellstr.push(temp[0] + ":" + temp[1] + temp[2] + ":" + juagColor(temp[3]));
        }
      }
      wellstr.sort();
      wave.hideLoading();
      wave.setOption({
        title: {
          text: wellstr[0].split(":")[0]
        },
        series: [{
          // 根据名字对应到相应的系列
          label: {
            normal: {
              formatter: function () {
                return wellstr[0].split(":")[2]
              },
            }
          },
        }]
      });
      var xxx = 1;
      setWaterchartdiv12off = setInterval(function () {
        if (xxx < wellstr.length) {
          wave.setOption({
            title: {
              text: wellstr[xxx].split(":")[0] + " " + wellstr[xxx].split(":")[1]
            },
            series: [{
              // 根据名字对应到相应的系列
              label: {
                normal: {
                  formatter: function () {
                    return wellstr[xxx].split(":")[2]
                  },
                }
              },
            }]
          });
          xxx += 1;
        } else xxx = 0;
      }, 3000);
    }

    //清水池
    var wellpage = false;
    var setWaterwelloff;

    function setWaterwell(xdata) {
      console.log(xdata);
      var wellstr = [];
      var down_ = $('#waterwell').children(".down");
      var statid = [],
        val = [],
        span1 = [];

      //        //刪除陣列中空字串" "
      //        span1[x] = $.grep(span1[x],function(n){ return n == ' ' || n });        
      for (var x = 0; x < xdata.length; x++) {
        var temp = xdata[x].split(" ");
        //0: "15000M3清水池:水位2:150.00:gray"
        wellstr.push(temp[0] + ":" + temp[1] + temp[2] + ":" + juagColor(temp[3]));
      }
      wellstr.sort();
      for (var x = 0; x < down_.length; x++) {
        var downx_h6 = $(down_).eq(x).children("h6:first").text();
        for (var y = 0; y < wellstr.length; y++) {
          if (downx_h6 == wellstr[y].split(":")[0]) {
            //writing titleName to h6
            $(down_).eq(x).children("h6:first").text(wellstr[y].split(":")[0]);
            var getbig5_ = getBig5(wellstr[y].split(":")[0]);
          }
          if (getbig5_ == wellstr[y].split(":")[0]) {
            var line_ = $(down_).eq(x).children("div");
            for (var z = 0; z < line_.length; z++) {
              var subtit_ = $(line_).eq(z).children("div:first").text();
              if (subtit_ == wellstr[y].split(":")[1]) {
                //writing titleName to PH值
                $(line_).eq(z).children("div:first").text(wellstr[y].split(":")[1]);
                $(line_).eq(z).children("p:first").text(wellstr[y].split(":")[2]).css({
                  color: wellstr[y].split(":")[3]
                });
              }
            }
          }
        }
      }
      setWaterwelloff = setInterval(function () {
        $('#waterwell').children(".down").fadeToggle(350);
      }, 3000); //interval : 3 sec
      console.log("清水池");
    }

    //抽水機房運作狀態
    var setWaterpumpoff;
    var moto1 = [],
      moto2 = [];

    function setWaterpump(xdata) {
      //      var xdata = xdata.sort();
      console.log(xdata);
      xdata.sort();
      var x1 = 0;
      var invertmoto = ['尖山線500HP#3', '樹林線1000HP#6'];
      var specialcase = ['松峽線供電', '松樹線供電'];
      var staid = [],
        pump = [],
        dotcls = [],
        moto = [];
      for (var x = 0; x < xdata.length; x++) {
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
        var apendiv = '<div class="left active"><h6>' + prop +
          '</h6><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a></div>';
        $("#chartdiv11").append(apendiv);
        for (var y = 0; y < pump.length; y++) {
          if (prop == getBig5(pump[y])) {
            function bian() {
              var bian_;
              for (var z = 0; z < invertmoto.length; z++) {
                if (pump[y] == invertmoto[z]) {
                  bian_ = 'bian';
                  break;
                } else bian_ = '';
              }
              return bian_;
            };
            if (pump[y] == specialcase[0] || pump[y] == specialcase[1]) {
              moto[y] = prop.replace("供電", '');
            }
            var apencont = '<div class="circle ' + dotcls[y] + '"><span>' + pump[y] + '</span><span class="' + bian() +
              '">' + moto[y] + '</span></div>';
            $("#chartdiv11").children(".left").eq(x1).append(apencont);
          }
        }
        x1 += 1;
      }
      console.log("更新抽水機房運作狀態資訊");
      setWaterpumpoff = setInterval(putPumpToHtml, 3000);
    }

    function putPumpToHtml() {
      var leftblock = $("#chartdiv11").children(".left.active");
      if (leftblock.length > 0) {
        $(leftblock).eq(0).removeClass("active").fadeOut(350);
        $(leftblock).eq(1).removeClass("active").fadeOut(350);
      }
      var leftblock = $("#chartdiv11").find(".left.active");
      if (leftblock.length == 0) {
        $("#chartdiv11").find(".left").bind().addClass("active").fadeIn();
      }
    }

    function getWaterpump() {
      var url_ = [];
      moto1 = [];
      url_ = "http://220.134.42.63:8080/WaterscadaAPI/WI_ItemData?section=全區供水調配&item=6"; //三峽河取水站-抽水機
      var compsData = getWeatherJson(url_);
      console.log(compsData);
      if (compsData[1].length > 0) {
        for (var x = 0; x < compsData[1].length; x++) {
          if (compsData[1][x].DATA_TYPE == "image") {
            (compsData[1][x].VALUE == "light-green-s.png") ? value2flag = "gray-light": value2flag = "circle";
            moto1.push(compsData[1][x].STATION_ID + "/" + value2flag); // 定義關的圖片(light-green-s.png)，其餘圖片都定義為"開"
          }
          if (compsData[1][x].DATA_TYPE == "text") {
            moto2.push(compsData[1][x].STATION_ID + " " + compsData[1][x].TOOLTIPS);
          }

        }
      } else alert("資料抓取發生問題");
      setWaterpump(moto1);
      setWaterwell(moto2);
      setWaterchartdiv12(moto2);
    }
    getWaterpump();
    setInterval(function () {
      clearInterval(setWaterpumpoff);
      clearInterval(setWaterwelloff);
      clearInterval(setWaterchartdiv12off);
      getWaterpump();
    }, 300000); //interval : 5 min


    //板新管線出水
    function juagColor(flg) {
      switch (flg) {
        case "N":
          return 'green';
        case "<":
        case ">":
          return 'yellow';
        case "<<":
        case ">>":
          return 'red';
        case "?":
          return 'gray';
      }
    }
    var stid = [],
      vale = [],
      disp = [],
      flg = [];
    var rank = "板新廠,樹林線1750Φ,樹林線1350Φ,板南2000Φ,三峽線600Φ,三峽線400Φ,尖山線900Φ,板橋線1350Φ,三鶯線600Φ".split(","); //DISPLAY_NAME
    var setpipewateroff;

    function setpipeWater() {
      var ltve = $("#locat_value").children("div");
      var count = $("#pipeWater").data("cellback");
      //console.log(disp);
      if (count < rank.length) {
        $(ltve).eq(0).find("span:first").text(disp[count + 0]).parent().find("span:last").text(vale[count + 0]).css({
          color: flg[count + 0]
        });
        $(ltve).eq(1).find("span:first").text(disp[count + 1]).parent().find("span:last").text(vale[count + 1]).css({
          color: flg[count + 1]
        });
        $(ltve).eq(2).find("span:first").text(disp[count + 2]).parent().find("span:last").text(vale[count + 2]).css({
          color: flg[count + 2]
        });
        $("#pipeWater").data("cellback", count + 3);
      } else {
        $(ltve).eq(0).find("span:first").text(disp[0]).parent().find("span:last").text(vale[0]).css({
          color: flg[0]
        });
        $(ltve).eq(1).find("span:first").text(disp[1]).parent().find("span:last").text(vale[1]).css({
          color: flg[1]
        });
        $(ltve).eq(2).find("span:first").text(disp[2]).parent().find("span:last").text(vale[2]).css({
          color: flg[2]
        });
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
      for (var x = 0; x < jsonDat.length; x++) {
        disp.push(jsonDat[x].DISPLAY_NAME);
        vale.push(jsonDat[x].ITEMS[0].VALUE + " " + jsonDat[x].ITEMS[0].UNIT);
        flg.push(juagColor(jsonDat[x].ITEMS[0].FLAG));
      }
      console.log(flg);
      setpipewateroff = setInterval(function () {
        setpipeWater()
      }, 3000); //3sec
    }

    getpipeWater();
    setInterval(function () {
      clearInterval(setpipewateroff);
      getpipeWater();
    }, 300000); //interval : 5 min

    //板新導水    


    function getbashboardDatas(str, no, station_id, tag_id) {
      var findKey_ = [],
        getDatas = [];
      console.log(tag_id);
      getDatas.length = 0;
      $.ajax({
        url: "http://220.134.42.63:8080/WaterscadaAPI/WI_ItemData?section=全區供水調配&item=5",
        type: "GET",
        dataType: "json",
        async: false,
        success: function (Jdata) {
          $.each(Jdata, function (index, d) {
            getDatas.push(d);
          });
          var findIndexofkeywd;
          var lastDataTime = getDatas[0];
          lastDataTime = lastDataTime.split("-").join("/").split("T").join(" ");
          $("#last_dataTime").text(lastDataTime);
          $.each(getDatas[1], function (v, x) {
            findKey_.push(x);
          });
          CompareQuestOfWord(findKey_);
          console.log(findKey_);

        },
        error: function () {
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
          spanX2 = $(divCunt).find("div:nth-of-type(" + (y + 1) + ") span:nth-of-type(2)").text();
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
            if (assign) {
              assign = false;
              break;
            }
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
      var spanText1 = [],
        spanText2 = [];
      spanText1.length = 0;
      spanText2.length = 0;
      var div_ = $(".setposition");
      for (var x = 0; x < div_.length; x++) {
        var divCunt = $(".setposition")[x];
        for (var y = 0; y < $(divCunt).children('div').length; y++) {
          spanText1.push($(divCunt).find("div:nth-of-type(" + (y + 1) + ") span:nth-of-type(1)").text());
          spanText2.push($(divCunt).find("div:nth-of-type(" + (y + 1) + ") span:nth-of-type(2)").text());
        }
      }
      //removing the same word on array
      var result = spanText1.filter(function (element, index, arr) {
        return arr.indexOf(element) === index;
      });
      var staId = result.join();
      var result = spanText2.filter(function (element, index, arr) {
        return arr.indexOf(element) === index;
      });
      var itemName = result.join();
      //        console.log(staId);        
      console.log(itemName);
      getbashboardDatas('全區供水調配', '5', staId, itemName);
    };
    setbashboardDatas();
    setInterval(function () {
      setbashboardDatas();
    }, 300000); //interval : 5 min
  </script>

  <!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>