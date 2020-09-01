<?php 
//  require_once 'php/db.php';
//  require_once 'php/functions.php';
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
<html lang="zh_TW">

<head>
  <meta charset="UTF-8">
<!--  <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
  <title>日常報表 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">

  <link rel="stylesheet" href="css/kendoUI.css" type="text/css" />
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="css/DataReport.css">

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type='text/javascript' src='js/jquery-2.1.0.min.js'></script>
  <script type='text/javascript' src='js/gen.js'></script>
  <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
  <script src="./js/parameter_def.js"></script>
  <script src="./js/script_inner.js"></script>
  <link rel="stylesheet" href="css/bootstrap-slider.css" type="text/css">
  <script src="js/bootstrap-slider.js"></script>
  <script src="searchbase-new.js"></script>
  <script src="./js/DataReport.js"></script>
<!--  <script crossorigin="anonymous" src="./js/tgosmap.js"></script>-->

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
          <li><a href="#" class="m2"><img src="images/icons/btn-icon02a.png" />即時水情看板<span>Instant board</span></a>
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
              <li><a href="./DataReport.php" class="active">
                  <div class="pic "><img src="images/m2.png" /></div>
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

  <div class="wrapper mt">
    <div class="container-fluid">
      <form id="reportURL" method="POST" target="_blank" action="#" >
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="item">
              <ul>
                <li><a href="javascript:void(0);" class="card-title">十二區管理處</a></li>
                <li class="card-body active"><a><input type="hidden" value="A1">各場站監控項目明細表</a></li>
                <li class="card-body"><a><input type="hidden" value="A2">板新給水廠表位出水量日報表</a></li>
                <li class="card-body"><a><input type="hidden" value="A3">水量計每日累積值及出水量明細表</a></li>
                <li class="card-body"><a><input type="hidden" value="A4">轄區進出水點水量月報表</a></li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="item">
              <ul>
                <li><a href="javascript:void(0);" class="card-title">板新廠-水源股</a></li>
                <li class="card-body"><a><input type="hidden" value="B9">鳶山堰水位紀錄表</a></li>
                <li class="card-body"><a><input type="hidden" value="B10">水源水情資料表</a></li>
              </ul>
              <ul>
                <li><a href="javascript:void(0);" class="card-title">板新廠-淨水股</a></li>
                <li class="card-body"><a><input type="hidden" value="B1">供水日報表</a></li>
                <li class="card-body"><a><input type="hidden" value="B2">各廠所水壓紀錄表</a></li>
                <li class="card-body"><a><input type="hidden" value="B3">淨水處裡工作日報表</a></li>
                <li class="card-body"><a><input type="hidden" value="B4">淨水處裡交接班紀錄表</a></li>
                <li class="card-body"><a><input type="hidden" value="B5">每月濁度水量統計表</a></li>
                <li class="card-body"><a><input type="hidden" value="B6">每日水量計算表</a></li>
                <li class="card-body"><a><input type="hidden" value="B7">颱風原水濁度及出水量紀錄表</a></li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="item">
              <ul>
                <li><a href="javascript:void(0);" class="card-title">板新廠-管線股</a></li>
                <li class="card-body"><a><input type="hidden" value="B8">供水系統水壓觀測紀錄表</a></li>
                <li class="card-body card-body-empty"><a><input type="hidden" value=""></a></li>
              </ul>
              <ul>
                <li><a href="javascript:void(0);" class="card-title">板新廠-機電股</a></li>
                <li class="card-body"><a><input type="hidden" value="B11">用電量分析表</a></li>
                <li class="card-body"><a><input type="hidden" value="B12">年度三峽河機電月報</a></li>
                <li class="card-body"><a><input type="hidden" value="B13">年度鳶山堰動力費比較表</a></li>
                <li class="card-body"><a><input type="hidden" value="B14">抽水機房報表</a></li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="item">
              <ul>
                <li><a href="javascript:void(0)" class="card-title">板新廠外站</a></li>
                <li class="card-body"><a><input type="hidden" value="C1">埔墘加壓站紀錄表</a></li>
                <li class="card-body"><a><input type="hidden" value="C2">光復加壓站支援表</a></li>
              </ul>
              <ul>
                <li><a href="javascript:void(0)" class="card-title">服務所</a></li>
                <li class="card-body"><a><input type="hidden" value="D1">供水系統水壓觀測紀錄表</a></li>
                <li class="card-body"><a><input type="hidden" value="D2">場站用水用電分析表</a></li>
              </ul>
            </div>
          </div>
        </div>
        <input name="urid" value="" type="hidden">
        <input name="urpw" value="" type="hidden">
        <input name="SER" value="" type="hidden">
        <input name="ACL" value="" type="hidden">
      </form>
    </div>
  </div>
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
  <script src="./js/kendo.all.js"></script>
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.common.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.rtl.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.default.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.mobile.all.min.css">
  <script src="https://kendo.cdn.telerik.com/2019.2.514/js/angular.min.js"></script>
  <script src="https://kendo.cdn.telerik.com/2019.2.514/js/jszip.min.js"></script>
  <!--  -->
  <script language="javascript">
    var getData = new Array();
    var readOnly = new Array();
    var readWrite = new Array();
    var ACL, reportNo;
    //輸入使用者帳號
    $(".pos_right > span").text("<?php echo $nam?>");
//未完成
//    $('#channel').on('click',function(e){
//      if($(this).hasClass('query_header_content-active'))
//        $('.query_content_timeInterval').find()
//    });
    //record access of user
    getReport_ASSCESS("<?php echo $id?>", "<?php echo $pw?>");
    
    function getReport_ASSCESS(str, no) {
      getData = [];
      $("input[name=urid]").val(str);
      $("input[name=urpw]").val(no);
      $.ajax({
        url: "http://220.134.42.63:8080/WaterscadaAPI/Login?id=" + str + "&password=" + no,
        type: "GET",
        dataType: "json",
        success: function(Jdata) {
          $.each(Jdata, function(index, d) {
            getData.push(d);
          });
//          console.log(getData);
//          alert(getData[1].REPORT);
          if (getData[0] == "0") {
            $.ajax({
              url: "./php/GetUserConfig.php",
              type: "POST",
              data: {
                'i1': getData[1].ID,
                'n1': getData[1].NAME,
                'p1': getData[1].PASSWORD,
                'r': getData[1].REPORT,
                'rw': getData[1].REPORT_WRITE
              },
              dataType: 'html'
            }).done(function(data) {
              console.log(data);
              var split = data.split("_");
//              console.log(split);
              readOnly = split[0].split(",");
              readWrite = split[1].split(",");              
            }).fail(function(jqXHR, textSataus, errorThrown) {
              console.log("有錯誤產生，請看console log");
            });
          } else
            alert("輸入帳號、密碼有誤，請重新輸入或聯繫網管人員，謝謝。");
        },
        error: function() {
          console.log("get json fail");
        }
      });
    }
    
    var getURLofDayily, reportUrl, result;

    //post url to open report 
    var getJsonObj = new Array();
    $("#reportURL li").on("click", function(e){
        e.preventDefault();
        var getJson;
        var key_ = []; var value_ =[];
        var url_;
        var reportNo = $(this).find('input[type=hidden]').attr("value");  //post data
        var targetNam = $(this).find('a');         
//        getJson = JSON.parse(DayilyReport);
        $.each(DayilyReport, function(index, d){
          key_.push(index);
          value_.push(d);
        });
        var End_ = false;
        for(var x=0; x<key_.length; x++){          
          if(key_[x] == reportNo.trim()){
            url_ = value_[x];
            End_ = true;
          }
          if(End_) break;
        }
//      Only of test: getURLofDayily = "./php/OnlyForDailyReportTest.php"
        getURLofDayily = 'http://'+value_[0]+'/'+url_.trim();
        $(this).closest("form").attr("action", getURLofDayily);
        $(this).closest("form").addClass('getURLofDayily');
      for (var x = 0; x < readWrite.length; x++) {
        if (readWrite[x] == reportNo) {
//          getURLofDayily = DayilyReport[readWrite[x]];          
          ACL = "1111"; //R/W
          break;
        } else {         
          ACL = "1010"; //R          
        }
      }      
      $("input[name=SER]").val(reportNo);
      $("input[name=ACL]").val(ACL);
      reportUrl = 
      console.log("送出URL:"+getURLofDayily+", urid:"+$("input[name=urid]").val()+", urpw:"+$("input[name=urpw]").val()+", SER:"+reportNo+", ACL="+ACL);
      $(".getURLofDayily").submit();
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

   
  <!--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
