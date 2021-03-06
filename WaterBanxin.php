<?php
@session_start();
@$nam=$_SESSION['NAM'];
@$id =$_SESSION['ID'];
@$pw =$_SESSION['PW'];
@$date =$_SESSION['DAT'];
@$time =$_SESSION['TIM'];
if($nam == '') @$nam = $id;

?>
<!DOCTYPE html>
<html lang="zh_TW">

<head>
  <meta charset="UTF-8">

  <meta
    name='viewport'
    content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'
  >
  <title>板新導水 | 第十二區管理處供水調配操控整合管理系統</title>
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
  <meta
    http-equiv="X-UA-Compatible"
    content="chrome=1"
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
  >
  <link
    rel="stylesheet"
    href="css/WaterBanxin.css"
  >

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script
    type='text/javascript'
    src='js/jquery-2.1.0.min.js'
  ></script>
  <script
    type='text/javascript'
    src='js/gen.js'
  ></script>
  <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
  <script src="./js/parameter_def.js"></script>
  <script src="./js/script_inner.js"></script>
  <link
    rel="stylesheet"
    href="css/bootstrap-slider.css"
    type="text/css"
  >
  <script src="js/bootstrap-slider.js"></script>
  <script
    type="text/javascript"
    src="./js/jquery-3.4.0.min.js"
  ></script>
  <script src="searchbase-new.js"></script>

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
                  href="javascript:void(0);"
                  class="left_menu1 "
                >
                  <div class="pic"><img src="images/m1.png" /></div>
                  快速選單
                </a></li>
              <li><a
                  href="javascript:void(0);"
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
                  class="active "
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
                  <div class="pic "><img src="images/m2.png" /></div>
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

  <div class="balaImg">
    <div id="mappingConte">
      <h6
        id="last_dataTime"
        style="postion: relative; width: 100%; text-align:right; margin: 0; top: 20px;"
      >UpdateTime</h6>
      <img
        src="images/Dashboard/waterBanxin.png"
        style="width:100%"
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
  <input
    id="section_"
    type="hidden"
    placeholder="section"
    value="全區供水調配"
  >
  <input
    id="item_"
    type="hidden"
    placeholder="item"
    value="5"
  >
  <!--
        <div class="Nam_blan_1">
      
      </div>
-->
  <?php include_once "./php/footer.php" ?>

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

  <!-- <script src="js/owlcarousel/owl.carousel.js"></script> -->
  <!--  -->
  <link
    rel="stylesheet"
    href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.common-nova.min.css"
  />
  <link
    rel="stylesheet"
    href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.nova.min.css"
  />
  <link
    rel="stylesheet"
    href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.nova.mobile.min.css"
  />
  <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>

  <!--        <script type="text/javascript"> var jQuery1123 = $.noConflict(true); </script> -->

  <!-- <script src="https://kendo.cdn.telerik.com/2019.2.514/js/kendo.all.min.js"></script> -->
  <script src="./js/kendo.all.js"></script>
  <link
    rel="stylesheet"
    href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.common.min.css"
  >
  <link
    rel="stylesheet"
    href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.rtl.min.css"
  >
  <link
    rel="stylesheet"
    href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.default.min.css"
  >
  <link
    rel="stylesheet"
    href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.mobile.all.min.css"
  >
  <script src="https://kendo.cdn.telerik.com/2019.2.514/js/angular.min.js"></script>
  <script src="https://kendo.cdn.telerik.com/2019.2.514/js/jszip.min.js"></script>
  <!--  -->
  <script language="javascript">
    $(".pos_right > span").text("<?php echo $nam?>");
    $("input[name=idn]").val("<?php echo $id?>");
    var idn = $("input[name=idn]").val();
    var getDatas = new Array();
    var temp_getDatas = [];
    var spanText1 = [];
    var spanText2 = [];


    function appendMemo(indx, this_, no) {
      $(".appendMemoContent").remove();
      var stringarr = ["趨勢圖", "圖控", "TGOS"];
      if (no > 0)
        var path = $(this_).parent().append(
          "<div class='appendMemoContent'><div style='position: absolute;right: 10px; top: 0px;'>&times;</div></div>");
      for (var x = 0; x < no; x++) {
        var path = $(".appendMemoContent").append("<div>" + stringarr[x] + "</div>");
      }
    }
    $('.balaImg div div').parent().on("click", ".appendMemoContent div", function (e) {
      e.stopPropagation();
      //      e.preventDefault();
      var stationid = $(this).parent().parent().children("span:first-child").text();
      var tag_id = $(this).parent().parent().children("span:nth-of-type(2)").text();
      var yesterday = 0;
      if (tag_id.match("昨") != null) {
        yesterday = 1;
      } else yesterday = 0;
      //        debugger;
      var x = $(".appendMemoContent div:not(:first)").index(this);
      //        recommand: we needs build the functions for 趨勢圖","圖控","TGOS"
      switch (x) {
        case 0: { //趨勢圖
          //              alert("0: "+stationid);
          var url = './lineChart.php?status=water&stationID=' + stationid + '&tagID=' + tag_id +
            '&measure=*&yesterday=' + yesterday;
          //              var url = './lineChart.php?status=water&stationID='+stationid;
          window.open(url, stationid + '趨勢圖');
          break;
        }
        case 1: { //圖控
          alert("1");
          break;
        }
        case 2: { //TGOS
          alert("2");
          break;
        }
        default:
          $(".appendMemoContent").remove();
          break;
      }
      $(".appendMemoContent").remove();
    });
    $(".balaImg input[type=text]").on("focus", function () {
      $(this).blur();
    });
    $(".balaImg input[type=text]").on("click", function (e) {
      //      alert($(".balaImg input[type=text]").index(this));
      var indx = $(".balaImg input[type=text]").index(this);
      $(this).attr("value");
      //      alert($(this).parent().attr("class"));
      appendMemo(indx, this, "1");
    });

    $(".balaImg input[type=text]").hover(function () {
      $(this).css({
        cursor: "pointer"
      });
    }, function () {
      $(this).css({
        cursor: "default"
      });
    });

    //    window.setInterval(getbashboardData("全區供水調配", 5), 1000);
    var findKey_ = [];

    function getbashboardDatas(str, no, station_id, tag_id) {
      console.log(tag_id);
      getDatas.length = 0;
      //      var url_ = "http://220.134.42.63:8080/WaterscadaAPI/WI_ItemData?section=" + str + "&item=" + no + "&STATION_ID=" + station_id + "&TAG_ID=" + tag_id + "&measure=*";
      var url_ = "http://220.134.42.63:8080/WaterscadaAPI/WI_ItemData?section=" + str + "&item=" + no;
      console.log(url_);
      $.ajax({
        url: url_,
        type: "GET",
        dataType: "json",
        success: function (Jdata) {
          $.each(Jdata, function (index, d) {
            getDatas.push(d);
          });
          var findIndexofkeywd;
          var lastDataTime = getDatas[0];
          lastDataTime = lastDataTime.replace(/-/g, "/");
          lastDataTime = lastDataTime.replace("T", " ");

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
      console.log(setPositionLength)
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

    $(".balaImg div").ready(function (e) {
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
      getbashboardDatas($("#section_").val(), $("#item_").val(), staId, itemName);
      //        alert("done");

      //Datas ready from webservice
    });


    //禁止ctrl+滾輪
    var scrollFunc = function (e) {
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

  <!--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>