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
  <title>八大管線 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">

  <link rel="stylesheet" href="css/kendoUI.css" type="text/css" />
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css">
  <link rel="stylesheet" href="css/WaterMainPipe.css">
<!--  <link rel="stylesheet" href="./css/font-awesome.min.css">-->
  <link rel="stylesheet" type="text/css" href="./css/animate.min.css"/> 

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
              <li><a href="#" class="left_menu1 ">
                  <div class="pic"><img src="images/m1.png" /></div>
                  快速選單
                </a></li>
              <li><a href="#" class="left_menu2 ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  基本圖層
                </a></li>
            </ul>
          </li>
          <li class="active"><a href="javascript:void(0)" class="m2"><img src="images/icons/btn-icon02a.png" />即時水情看板<span>Instant board</span></a>
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
              <li><a href="./WaterOfMainPipe.php" class="active ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  八大管線
                </a></li>
              <li><a href="./WaterLevel.php" class=" ">
                  <div class="pic"><img src="images/m1.png" /></div>
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
      <h6 id="last_dataTime">UpdateTime</h6>
      <img src="images/Dashboard/八大管線_板新廠.png" style="width:100%">
      <div class="setposition">
        <div class="x1 y1">
          <div><span style="display: none;">板新給水廠</span><span>板新給水廠</span></div>
          <div>
            <span>出水量</span> :
            <input type="text" readonly value="1" style="text-align: center;">
          </div>
<!--          <div><h2 class="animated infinite flash"> <i class="fa fa-circle" aria-hidden="true"></i> </h2></div>-->
        </div>
      </div>
      <div class="setposition">
        <div class="x2 y2">
          <div><span style="display: none;">樹林線1750給水廠</span><span>樹林線1750</span></div>
          <div>
            <span>配水</span> :
            <input type="text" readonly value="" style="text-align: center;">
          </div>
        </div>
      </div>
      <div class="setposition">
        <div class="x3 y3">
          <div><span style="display: none;">三峽線600給水廠</span><span>三峽線600</span></div>
          <div>
            <span>配水</span> :
            <input type="text" readonly value="" style="text-align: center;">
          </div>
        </div>
      </div>
      <div class="setposition">
        <div class="x4 y4">
          <div><span style="display: none;">尖山線900給水廠</span><span>尖山線900</span></div>
          <div>
            <span>配水</span> :
            <input type="text" readonly value="" style="text-align: center;">
          </div>
        </div>
      </div>
      <div class="setposition">
        <div class="x5 y5">
          <div><span style="display: none;">板新線1350給水廠</span><span>板橋線1350</span></div>
          <div>
            <span>配水</span> :
            <input type="text" readonly value="" style="text-align: center;">
          </div>
        </div>
      </div>
      <div class="setposition">
        <div class="x6 y6">
          <div><span style="display: none;">三鶯600給水廠</span><span>三鶯600</span></div>
          <div>
            <span>配水</span> :
            <input type="text" readonly value="" style="text-align: center;">
          </div>
        </div>
      </div>
      <div class="setposition">
        <div class="x7 y7">
          <div><span style="display: none;">板南給水廠</span><span>板南2000</span></div>
          <div>
            <span>配水</span> :
            <input type="text" readonly value="" style="text-align: center;">
          </div>
        </div>
      </div>
      <div class="setposition">
        <div class="x8 y8">
          <div><span style="display: none;">三峽線400給水廠</span><span>三峽線400</span></div>
          <div>
            <span>配水</span> :
            <input type="text" readonly value="" style="text-align: center;">
          </div>
        </div>
      </div>
      <div class="setposition">
        <div class="x9 y9">
          <div><span style="display: none;">樹林線1350給水廠</span><span>樹林線1350</span></div>
          <div>
            <span>配水</span> :
            <input type="text" readonly value="" style="text-align: center;">
          </div>
        </div>
      </div>
    </div>
  </div>
  <input id="section_" type="hidden" placeholder="section" value="八大管線系統">
  <input id="item_" type="hidden" placeholder="item" value="1">

  <?php include_once "./php/footer.php";?>

  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>

  <script type="text/javascript" src="./js/bootstrap-slider.min.js"></script>
  <script type="text/javascript" src="./js/nicescroll.js"></script>
  <script type="text/javascript" src="./js/script.js"></script>

  <script language="javascript">
    $(".pos_right > span").text("<?php echo $nam?>");    
    $("input[name=idn]").val("<?php echo $id?>");
    var idn = $("input[name=idn]").val();
    
    var getDatas = new Array();
    var spanText1 = [];

    function appendMemo(indx, this_, no) {
      $(".appendMemoContent").remove();
      var stringarr = ["趨勢圖", "圖控", "TGOS"];
      if (no > 0)
        var path = $(this_).parent().append("<div class='appendMemoContent'><div style='position: absolute;right: 10px; top: 0px;'>&times;</div></div>");
      for (var x = 0; x < no; x++) {
        var path = $(".appendMemoContent").append("<div>" + stringarr[x] + "</div>");
      }
    }
    $('.balaImg div div').on("click", ".appendMemoContent div", function(e) {
      e.stopPropagation();
//      e.preventDefault();
      var stationid = $(this).closest(".setposition").children().children("div:first-child").find('span:first-child').text();
      var tag_id = $(this).closest(".setposition").children().children("div:nth-of-type(2)").find('span:first-child').text();
      var yesterday = 0;
        if(tag_id.match("昨") != null){
          yesterday = 1;
        } else yesterday = 0;
      //        debugger;
      var x = $(".appendMemoContent div:not(:first)").index(this);
      //        recommand: we needs build the functions for 趨勢圖","圖控","TGOS"
      switch (x) {
        case 0:
          { //趨勢圖
            $(".appendMemoContent").remove();
            var url = './lineChart.php?status=mainpipe&stationID='+stationid+ '&tagID='+tag_id+'&measure=*&yesterday='+ yesterday;
            window.open(url, stationid+'趨勢圖');
            break;
          }
        case 1:
          { //圖控
            alert("1");
            break;
          }
        case 2:
          { //TGOS
            alert("2");
            break;
          }
        default:
          $(".appendMemoContent").remove();
          break;
      }
    });
    $(".balaImg input[type=text]").on("focus", function() {
      $(this).blur();
    });
    $(".balaImg input[type=text]").on("click", function(e) {
      //      alert($(".balaImg input[type=text]").index(this));
      var indx = $(".balaImg input[type=text]").index(this);
      $(this).attr("value");
      //      alert($(this).parent().attr("class"));
      appendMemo(indx, this, "1");
    });
    $(".balaImg input[type=text]").hover(function() {
      $(this).css({
        cursor: "pointer"
      });
    }, function() {
      $(this).css({
        cursor: "default"
      });
    });


    //    window.setInterval(getbashboardData("全區供水調配", 6), 1000);
    //get quest word
    var findValue_ = [];

    function getmainpipeDatas(str, no) {
      
      getDatas.length = 0;
      var url_= "http://220.134.42.63:8080/WaterscadaAPI/WI_StationData?section=" + str + "&item=" + no;
      console.log(url_);
      $.ajax({
        url: url_,
        type: "GET",
        dataType: "json",
        success: function(Jdata) {
          $.each(Jdata, function(index, d) {
            getDatas.push(d);
          });
          console.log(getDatas);
          var findIndexofkeywd;
          var lastDataTime = getDatas[0];
          lastDataTime = lastDataTime.split('-').join('/');
          lastDataTime = lastDataTime.split('T').join(' ');
          
          $("#last_dataTime").text(lastDataTime);
          $.each(getDatas[2], function(v, x) {
            findValue_.push(x);
          });
          CompareQuestOfWord(findValue_);
          console.log(findValue_);

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
//          console.log($(divCunt).children('div').find("div:nth-of-type(2) span").text());
          spanX1 = $(divCunt).children('div').find("div:nth-of-type(" + (y + 1) + ") span:first").text();
          spanX2 = $(divCunt).children('div').find("div:nth-of-type(" + (y + 2) + ") span").text();
          console.log(spanX1 +" + "+ spanX2);
          
          for (var x = 0; x < questWD.length; x++) {
            if (questWD[x].STATION_ID == spanX1 && questWD[x].ITEMS[0].ITEM_NAME == spanX2) {
              console.log(spanX1 + " - " + spanX2 + " : " + questWD[x].ITEMS[0].VALUE+"-"+ questWD[x].ITEMS[0].FLAG);
              var inpt = $(divCunt).children('div').find("div:nth-of-type(" + (y + 2) + ") input");
              inpt.val(questWD[x].ITEMS[0].VALUE);
              var flag = questWD[x].ITEMS[0].FLAG;
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
    }
 
    $(".balaImg div").ready(function(e) {
      //        returntrue2 = getMountainData();
      //          if (returntrue2) {
      //            setInterval(function() {
      //              getMountainData();
      //            }, 1000000); //預設10000毫秒自動重複執行cartnumber()函數
      //          }
      spanText1.length = 0;
      var div_ = $(".setposition");
      for (var x = 0; x < div_.length; x++) {
        var divCunt = $(".setposition")[x];
        for (var y = 0; y < $(divCunt).children('div').length; y++) {
          spanText1.push($(divCunt).find("div:nth-of-type(" + (y + 1) + ") span:nth-of-type(1)").text());
        }
      }
      //removing the same word on array
      var result = spanText1.filter(function(element, index, arr) {
        return arr.indexOf(element) === index;
      });
      var staId = result.join();

      //        console.log(staId);        
      //        console.log(itemName);
      getmainpipeDatas($("#section_").val(), $("#item_").val());
      
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
   
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
