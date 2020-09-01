<?php 
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
    if($nam == '') $nam = $id;
    if($id == '') $nam="訪客";  else  @$role = 1;
    include_once "./php/dirReadfiles.php";
     $x = getfolderFiles("URGENT");
//     print_r($x);
     foreach($x as $key => $value)
     {
      $dateArry = $x[0];  
      $sizeArry = $x[1];  
     }
  }
$no = 0;
?>
<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>防災專區 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2020.1.219/styles/kendo.default-v2.min.css" />
  <!-- <link rel="stylesheet" href="css/kendoUI.css" type="text/css" /> -->
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css" />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' />
  <link rel="stylesheet" href="css/DisasterInfo.css" />
  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>
  <script type="text/javascript" src="./js/nicescroll.js"></script>
<!--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.js"></script>-->

  <script type="text/javascript" src="js/gen.js"></script>
  <script type="text/javascript" src="js/DisasterInfo.js"></script>
  <script src="./js/parameter_def.js"></script>
<!--  <script src="./js/script_inner.js"></script>-->
  <script src="./js/jquery-ui.js"></script>
  <script src="./jquery/jquery.ui.touch-punch.js"></script>
  <script type="text/javascript" src="./js/kendo/jszip.min.js"></script>
</head>

<body onload="showtime();">
  <!-- #top_header [top] -->
  <div id="top_header">
    <div class="current_date pos_left">
      <div class="date">
        <span id="currdate" style="display: inline-block;"></span><img src="images/time.png" /><span id="currtime"></span>
      </div>
    </div>

    <div class="pos_center">
      <h3 class=""><img src="images/icons/title.png" /></h3>
    </div>

    <div class="pos_right">
      <span><?php if(empty($nam)): echo '訪客'; else: echo $nam; endif;?></span>
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
              <li><a href="javascript:void(0);" class="left_menu1 ">
                  <div class="pic"><img src="images/m1.png" /></div>
                  快速選單
                </a></li>
              <li><a href="javascript:void(0);" class="left_menu2 ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  基本圖層
                </a></li>
            </ul>
          </li>
          <li><a href="javascript:void(0);" class="m2"><img src="images/icons/btn-icon02a.png" />即時水情看板<span>Instant board</span></a>
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
                  <a href="./PushImportXls.php" onclick="$('.show_popinfo').css({'display':'none'}) ">匯入資料<div class="pic"><img src="images/m2.png" /></div></a>
                  <a href="https://61.222.53.185/WaterEqp/" target="_new">進入管理系統<div class="pic"><img src="images/m2.png" /></div></a>
                </div>
              </li>              
            </ul>
          </li>
          <li class="active"><a href="javascript:void(0)" class="m4"><img src="images/icons/btn-icon04a.png" />綜合資訊<span>Comprehensive</span></a>
            <ul class="child_menu" style="">
              <li><a href="./DisasterInfo.php" class="active">
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
      <ul class="tab_sheet">
        <li class="active"><span>天氣預報</span></li>
        <li><span>山區降雨</span></li>
        <li><span>防災氣象</span></li>
        <li><span>水庫水情</span></li>
        <li><span>地震資訊</span></li>
        <li><span>颱風消息</span></li>
        <li><span>颱風路徑潛勢及侵襲機率</span></li>
        <li onclick="$('#distric1').click()"><span>業務職掌聯絡資訊</span></li>
        <li><span>常用系統連結</span></li>
      </ul>
      <div id="tab_contant">
        <div id="weatherForecast" class="tab active">
<!--          <iframe src="https://www.cwb.gov.tw/V8/C/W/OBS_County.html?ID=menu" name="mainframe" width="100%" marginwidth="0" marginheight="0" onload="" scrolling="Yes" frameborder="0" style="height: 73vh"></iframe>-->
          <iframe src="https://www.cwb.gov.tw/V8/C/W/OBS_County.html?ID=65" name="mainframe" width="100%" marginwidth="0" marginheight="0" onload="" scrolling="Yes" frameborder="0" style="height: 73vh"></iframe>
        </div>
        <div id="mountainRainfall" class="tab ">
          <iframe src="https://www.cwb.gov.tw/V8/C/P/Rainfall/Rainfall_Hour.html?ID=00" width="100%" marginwidth="0" marginheight="0" onload="" scrolling="Yes" frameborder="0" style="height: 73vh"></iframe>
        </div>
        <div class="tab texts">
          <iframe src="HTTP://FHY.WRA.GOV.TW/FHY/MONITOR/WEATHER" name="mainframe" width="100%" marginwidth="0" marginheight="0" onload="" scrolling="Yes" frameborder="0" style="height: 73vh"></iframe>
        </div>
        <div class="tab">
          <iframe src="HTTP://FHY.WRA.GOV.TW/FHY/MONITOR/RESERVOIR" name="mainframe" width="100%" marginwidth="0" marginheight="0" onload="" scrolling="Yes" frameborder="0" style="height: 73vh"></iframe>
        </div>
        <div class="tab">
          <iframe src="https://www.cwb.gov.tw/V8/C/E/index.html" width="100%" marginwidth="0" marginheight="0" onload="" scrolling="Yes" frameborder="0" style="height: 73vh"></iframe>
        </div>
        <div class="tab">
          <iframe src="https://www.cwb.gov.tw/V7/prevent/typhoon/ty.htm" name="mainframe" width="100%" marginwidth="0" marginheight="0" onload="" scrolling="Yes" frameborder="0" style="height: 73vh"></iframe>
        </div>
        <div class="tab">
          <iframe src="https://www.cwb.gov.tw/V7/prevent/warning/TED.htm" name="mainframe" width="100%" marginwidth="0" marginheight="0" onload="" scrolling="Yes" frameborder="0" style="height: 73vh"></iframe>
        </div>
        <div id="tabs" class="tab ">
          <div class="tab_head">
            <ul>
              <li id="distric1"><a class="active"><span>區處</span></a></li>
              <li><a><span>板新廠</span></a></li>
              <li><a><span>鶯歌服務所</span></a></li>
              <li><a><span>土城服務所</span></a></li>
              <li><a><span>樹林服務所</span></a></li>
              <li><a><span>板橋服務所</span></a></li>
              <li><a><span>新莊服務所</span></a></li>
              <a class="btn"><input type="file" style="opacity: 0; width:100px; position: absolute; left:10px"><i class="fa fa-plus" aria-hidden="true"></i>匯入檔案</a>
            </ul>
          </div>
          <div class="cont-tab">
            <div id="tabs-1" class="tab_body active">
              <h6>水公司</h6>
              <div id="grid_newtb01_1"></div>
              <h6>配合廠商</h6>
              <div id="grid_newtb01_2"></div>
            </div>
            <div id="tabs-2" class="tab_body">
              <div id="grid_newtb02"></div>
            </div>
            <div id="tabs-3" class="tab_body">
              <div id="grid_newtb03"></div>
            </div>
            <div id="tabs-4" class="tab_body">
              <div id="grid_newtb04"></div>
            </div>
            <div id="tabs-5" class="tab_body">
              <div id="grid_newtb05"></div>
            </div>
            <div id="tabs-6" class="tab_body">
              <div id="grid_newtb06"></div>
            </div>
            <div id="tabs-7" class="tab_body">
            <div id="grid_newtb07"></div>
          </div>
          </div>
        </div>
        <div class="tab">
          <div id="grid_table01"></div>
        </div>
        <!-- <div id="contactperson" class="tab">
          <div class="tab-content">
            <div class="table-responsive">
              <form id="uploadForm" method="post" style="position: relative; margin-bottom: 20px;">
                <input type="hidden" name="max_file_size" value="104857600"> 
                <input name="userImage" type="file" class="inputFile btn-outline-primary"  accept=".mp4, .ppt, .pptx, .doc, .docx, .pdf, .wav, .wmv, .xls, .xlsx, .dwg, .png, .jpg, .bmp"/>
                <input type="submit" value="上傳" style="width:80px" class="btnSubmit btn btn-outline-secondary btn-sm del_" />
              </form>
              <div>
              <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:1;word-break:break-all;}
                .tg td{font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;word-break:break-all;}
                .tg th{font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;word-break:break-all;}
                .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
                .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top; padding: 5px !important;}
              </style>
              <table class="tg" style="width: 100%;">
                <colgroup>
                <col style="width: 8%">
                <col style="width: 7%">
                <col style="width: 10%">
                <col style="width: 10%">
                <col style="width: 15%">
                <col style="width: 20%">
                <col style="width: 30%">
                </colgroup>
                  <tr>
                    <th class="tg-c3ow" colspan="2">維修內容</th>
                    <th class="tg-c3ow" colspan="7">用戶部分、含用戶表籍另件修理</th>
                  </tr>
                  <tr>
                    <th class="tg-0pky">姓名</th>
                    <th class="tg-0pky">職稱</th>
                    <th class="tg-0pky">行動電話</th>
                    <th class="tg-0pky">住家電話</th>
                    <th class="tg-0pky">網路分機</th>
                    <th class="tg-0pky">電子信箱</th>
                    <th class="tg-0pky" colspan="3">承辦業務</th>
                  </tr>
                </table>
              </div>
              <br/>
              <table class="table table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th class="col-1">項次</th>
                    <th class="col-2">檔案名稱</th>
                    <th class="col-3">檔案大小</th>
                    <th class="col-4">更新時間</th>
                    <th class="col-5">編輯</th>
                  </tr>
                </thead>
                <tbody class="insert_table">
                  <?php if(!empty($dateArry)):?>
                  <?php foreach($dateArry as $key => $value):?>
                  <tr>
                    <td>
                      <?php echo $no+=1;?>
                    </td>
                    <td>
                      <?php echo $key;?>
                    </td>
                    <td>
                      <?php echo $sizeArry[$key]?>
                    </td>
                    <td>
                      <?php echo $dateArry[$key]?>
                    </td>
                    <td>
                      <button id="edit_<?php echo $no;?>" type="button" class="btn btn-outline-secondary btn-sm donld_"><a href="files/URGENT/<?php echo $key;?>">下載</a></button>
                      <button id="del_<?php echo $no;?>" type="button" class="btn btn-outline-secondary btn-sm del_">刪除</button>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  <?php else: echo "<h6 class='animated infinite flash' style='color: red; text-align: center;'>尚無搜尋到檔案。</h6>"?>
                  <?php endif;?>
                </tbody>
              </table>

            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>

  <?php include_once "./php/footer.php";?>


  <script src="./js/kendo.all.js"></script>
  
  <script type="text/javascript" src="./js/newtb.js"></script>
  <script type="text/javascript" src="./js/script.js"></script>
  

  <script language="javascript">
    $(document).ready( function() { 
//      $(".cont-tab, [id ^= grid_]").niceScroll();  
    } );

    
    $(".tab_head ul li").on('click', function(e){ 
      var z = $(this).parent().find('li');
      var q = z.index(this);
      $(z).children('a').bind().removeClass("active");
      $(".cont-tab").children('div').bind().removeClass("active");
      $(z).eq(q).children('a').addClass("active");
      var spanNam = $(z).eq(q).children('a').children('span').text();
      $(".cont-tab").children('div').eq(q).addClass("active");
      var h6name = $(".cont-tab").children('div').eq(q).find("h6");      
      var n = $(".cont-tab").children('div').eq(q).find("div[id^=grid_]"); 
      for(var x=0; x<n.length; x++) {
        var h6nam = $(h6name[x]).text();
        var idname = $(n[x]).attr("id");
        var array = idname.split("_");  
        var return_ = makegridsrc(array[1]+"_"+array[2]);
        displayGrid(idname, return_[0], return_[1], spanNam +"_("+ h6nam +")");
      }
      
    });
    

    var getData = new Array();
    var readWrite = new Array();
    var readOnly = new Array();
    var ACL, reportNo;

    var getWeath = new Array();
    var getMountain = new Array();
    var getPerson = new Array();
    var returntrue1, returntrue2;

    returntrue1 = getWeatherData();
    if (returntrue1) {
      setInterval(function() {
        getWeatherData();
      }, 1000000); //預設10000毫秒自動重複執行cartnumber()函數
    }
    returntrue2 = getMountainData();
    if (returntrue2) {
      setInterval(function() {
        getMountainData();
      }, 1000000); //預設10000毫秒自動重複執行cartnumber()函數
    }
    getContactPersonData();

    function getContactPersonData() {
      $.ajax({
        url: "http://220.134.42.63:8080/WaterscadaAPI/getContactPerson",
        type: "GET",
        dataType: "json",
        success: function(Jdata) {
          $.each(Jdata, function(index, d) {
            getPerson.push(d);
          });
          console.log(getPerson[0]['NAME']);
          console.log(getPerson.length);
          var weatherCITY, rowspan = 0;
          if ((getPerson != '')) {
            for (var x = 0; x < getPerson.length; x++) {
              //                rowspan +=1;
              $("#contactperson table:first").append('<tr><td class="tg-0pky">' + getPerson[x]["NAME"] + '</td><td class="tg-0pky">' + getPerson[x]["TITLE"] + '</td><td class="tg-0pky">' + getPerson[x]["CELL_PHONE"] + '</td><td class="tg-0pky">' + getPerson[x]["HOME_PHONE"] + '</td><td class="tg-0pky">' + getPerson[x]["NET_PHONE"] + '</td><td class="tg-0pky">' + getPerson[x]["EMAIL"] + '</td><td class="tg-0pky">' + getPerson[x]["JOB"] + '</td></tr>');
            }
          } else {
            $("#contactperson table:first").after("<div style='color: red;'>尚無資料。</div>");
          }
        },
        error: function() {
          console.log("get json fail");
        }
      });
      //陣列清空方法
      getWeath.length = 0;
      return true;
    };

    function getWeatherData() {
      $("#weatherForecast table > tr").remove();
      $.ajax({
        url: "http://220.134.42.63:8080/WaterscadaAPI/WeatherForecast",
        type: "GET",
        dataType: "json",
        success: function(Jdata) {
          $.each(Jdata, function(index, d) {
            getWeath.push(d);
          });
          //          console.log(getWeath[0].DATE_1);
          //          console.log(getWeath.length);            
          var weatherCITY, rowspan = 0;
          if ((getWeath != '')) {
            $("#weatherForecast table > thead > tr th:nth-of-type(3)").text(getWeath[0].DATE_1);
            $("#weatherForecast table > thead > tr th:nth-of-type(4)").text(getWeath[0].DATE_2);
            $("#weatherForecast table > thead > tr th:nth-of-type(5)").text(getWeath[0].DATE_3);
            for (var x = 0; x < getWeath.length; x++) {
              //                rowspan +=1;
              $("#weatherForecast table ").append("<tr><th> " + getWeath[x].CITY + "</th><td>" + getWeath[x].ITEM_NAME + "</td><td>" + getWeath[x].VALUE_1 + "</td><td>" + getWeath[x].VALUE_2 + "</td><td>" + getWeath[x].VALUE_3 + "</td></tr>");
            }
          } else {
            $("#weatherForecast ").append("<div style='color: red;'>未抓取到資料，請確認資料是否上傳。</div>");
          }
        },
        error: function() {
          console.log("get json fail");
        }
      });
      //陣列清空方法
      getWeath.length = 0;
      return true;
    };

    function getMountainData() {
      $("#mountainRainfall table > tr").remove();
      $.ajax({
        url: "http://220.134.42.63:8080/waterscadaAPI/MountainRainfall",
        type: "GET",
        dataType: "json",
        success: function(Jdata) {
          $.each(Jdata, function(index, d) {
            getMountain.push(d);
          });
          //                      console.log(getMountain);
          //            console.log(getMountain.length);            
          var weatherCITY, rowspan = 0;
          if ((getMountain != '')) {
            for (var x = 0; x < getMountain.length; x++) {
              //rowspan +=1;
              var date_time = getMountain[x].DATE_TIME;
              date_time = date_time.split("-").join("/");
              date_time = date_time.split("T").join(" ");
              $("#mountainRainfall table ").append("<tr><th> " + getMountain[x].CITY + "</th><td>" + getMountain[x].TOWN + "</td><td>" + getMountain[x].NAME + "</td><td>" + getMountain[x].Lat + "</td><td>" + getMountain[x].Lon + "</td><td>" + getMountain[x].Elev + "</td><td>" + date_time + "</td><td>" + getMountain[x].RF_now + "</td><td>" + getMountain[x].RF_hour12 + "</td><td>" + getMountain[x].RF_hour24 + "</td></tr>");
            }
          } else {
            $("#mountainRainfall ").append("<div style='color: red;'>未抓取到資料，請確認資料是否上傳。</div>");
          }
        },
        error: function() {
          console.log("get json fail");
        }
      });
      //陣列清空方法
      getMountain.length = 0;
      return true;
    };

    $('[type=button]').on("click", function(e) {
      var id_ = $(this).attr("id");
      var td_ = id_.split("_");
      //td_[0] <= name, td_[1] <= td count number 
      if (td_[0] == 'del') { //刪除按鈕
        var td_name = $(this).closest('tbody').find("tr:nth-of-type(" + td_[1] + ")").find("td:nth-of-type(2)").text();
        var status = "delete";
        var filePath = "../files/URGENT/";
        $.ajax({
          type: "POST",
          url: "./php/dirControlfile.php",
          data: {
            'td_no': td_[1],
            'name': td_name,
            'status': status,
            'path': filePath
          },
          dataType: 'html'
        }).done(function(data) {
          console.log(data);
          if (data = "PASS")
            location.reload();
          else
            alert("未成功刪除。");
        }).fail(function(jqXHR, textSataus, errorThrown) {
          alert("有錯誤產生，請看console log");
          console.log(jqXHR.responseText);
        });
      }
    });

    $("#uploadForm").on('submit', (function(e) {
      var folderName = "URGENT";
      e.preventDefault();
      $.ajax({
        url: './php/upload_file.php?folder=' + folderName,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          console.log(data);
          location.reload();
        },
        error: function() {
          alert("上傳失敗，請重新上傳。");
        }
      });
    }));

    //禁止ctrl+滾輪
    var scrollFunc = function(e) {
      e = e || window.event;
      if (e.wheelDelta && event.ctrlKey) {
        //IE/Opera/Chrome
        event.returnValue = false;
      } else if (e.detail) {
        //Firefox
        event.returnValue = false;
      }
    };
    if (document.addEventListener) {
      document.addEventListener("DOMMouseScroll", scrollFunc, false);
    } //W3C
    window.onmousewheel = document.onmousewheel = scrollFunc; //IE/Opera/Chrome/Safari

    function displayGrid(idName, colu, data_, filename) {
      $("#"+idName).kendoGrid({
      columns: colu,
      dataSource: {
       data: data_,
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
        info: false,
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
//      height: 550,
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
//      editable: {  destroy: true  },
      persistSelection: true,
      resizable: true, 
      toolbar: ["create", "excel"],      
      editable: 'popup',  
      refresh: true, 
      mobile:false,
    });
      var grid = $("#grid_newtb01_1").data("kendoGrid");
      grid.bind("excelExport", function(e) {
        e.workbook.fileName = filename + ".xlsx";
      });  
//      grid.resizeColumn(grid.columns[0], 20);
      grid.resize();
    }
          
    //常用系統連結
    getDataTable01();
    function getDataTable01() {
      var url = "http://220.134.42.63:8080/WaterscadaAPI/getExternalUrl";
      debugger;
      var jsonData = getToServer(url);
      for(var x=0; x<jsonData.length; x++){
        jsonData[x]["ITEM"] = x+1;
      }
      grid_table01(jsonData);
    }
    function grid_table01(xdata) {
        var t;
        var filename = "常用系統連結"+t;
        var jsm = new kendo.data.DataSource({
                data: xdata,
                batch: true,
                pageSize: 20,
                schema: {
                    model: {
                            id: "ID",
                            fields: { ID: { editable: false, nullable: true },  },
                            ITEM: "ITEM",
                            fields: { ITEM: { editable: false, nullable: true },  }
                    }
                }
         });      
        $("#grid_table01").kendoGrid({
            dataSource: jsm,
            pageable: true,
            height: 550,
            toolbar: [{ name: "create", text: "新增" },{name: "excel", text: "匯出xlsx"}],            
            columns: [
                { field: "ID", title: "ID",  width: "120px", hidden: true,},
                { field: "ITEM", title: "項次",  width: "40px",
                          attributes: {style: "text-align: center;"}
                },
                { field: "NAME", title:"系統連結名稱",  width: "200px" ,
                          template: function(jsm) {
                            var x;
                            x = '<a target="_blank" href="'+jsm.URL+'">'+jsm.NAME+'</a>';
                            return x;
                          }
                },
                { field: "DEPARTMENT", title:"業管單位", width: "200px" },
                { field: "CLASS", title:"類別", width: "120px" },
                { field: "URL", title:"連結", width: "120px", hidden: true },                
                { command: [{ name: "edit", text: "修改"} , 
                            { className: "btn-destroy", name: "delete", text: "移除", iconClass: "k-icon k-i-delete",
                              click: function(e){
                              var itemDataObj = {};
                              var url_="http://220.134.42.63:8080/WaterscadaAPI/PostExternalUrl_delete";
                              var idText = $(e.currentTarget).closest("tr").children("td:first").text();
                              itemDataObj['ID'] = idText;
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
              if($(".updatecont").find("input[name=ID]").val() != ''){
                $(".updatecont").find("input[name=ID]").attr("readonly","true").css({'backgroundColor':'#D1DBD4', 'color': '#656565'});                  
                console.log("edit");
              } else {
                container.addClass("addcont");                
                console.log("add");
              }
            },
            save: function(e) {              
              var grid = $("#grid_table01").data("kendoGrid");
              var colume_ = [], getDatas = '', itemData = '', itemDataObj = {};
              var url_="http://220.134.42.63:8080/WaterscadaAPI/PostExternalUrl_addupdate";   
              //取key值
              for (var i = 0; i < grid.columns.length; i++) {
                colume_.push(grid.columns[i].field);
//                console.log(grid.columns[i].field); // displays "name" and then "age"
              }
              var z = e.sender._data;
              var arr = [];
              for(var x=0; x<z.length; x++) 
                arr.push(Number(z[x]["ID"]));
              if($(".updatecont").hasClass("addcont")) {
                var setId = Math.max(...arr)+1;
                e.sender._data[0]["ID"] = setId;
              }
              for(var i = 0; i < colume_.length-1; i++) { 
                itemData=e.model[colume_[i]];
                itemDataObj[colume_[i]] = itemData;
              }
              debugger;
              itemDataObj["ID"]=setId;
              e.sender.setDataSource(e.sender._data);
              console.log(itemDataObj);
              postToServer(url_, itemDataObj);
              console.log("save");                            
            },
            cancel: function(e) {
              var grid = $("#grid_table01").data("kendoGrid");
              console.log("cancel");
              if($(".updatecont").hasClass("addcont")){
                console.log( 'cancen for addtion function');
              } else {
                
              }
            }, 
            editable: {
              mode: "popup",              
              confirmation: true,
              cancelDelete: "No"      
            }            
          });
        var maxVal = '';
        var grid = $("#grid_table01").data("kendoGrid");
        grid.bind("excelExport", function(e) {
          e.workbook.fileName = filename + ".xlsx";
        }); 
    };
    
    
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
    
  </script>

</body>

</html>
