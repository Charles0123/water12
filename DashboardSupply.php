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
              <li><a href="javascript:void(0)" class="active" onclick="console.log($(this).next('.show_popinfo').fadeToggle('fast'))">
                  <div class="pic"><img src="images/m2.png" /></div>
                  儀表板
                </a>
                <div class="show_popinfo" style="width:180px">
                  <a class="active" href="./DashboardSupply.php">全區供水<div class="pic"><img src="images/m2.png" /></div></a>
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
    
    
  </script>
   
  <!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
