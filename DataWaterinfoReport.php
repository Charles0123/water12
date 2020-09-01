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
  }
?>
<!DOCTYPE html>
<html lang="zh_TW">

<head>
  <meta charset="UTF-8">
<!--  <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
  <title>水情通報 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">
  <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet'>
  <!-- <link rel="stylesheet" href="css/kendoUI.css" type="text/css" /> -->
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css">
  <link rel="stylesheet" href="css/DataReport.css">

  <script type='text/javascript' src='js/jquery-2.1.0.min.js'></script>
  <script type='text/javascript' src='js/gen.js'></script>
  <script src="./js/DataReport.js"></script>

<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="./css/jquery-ui.css">


<style>

.stationInfo {
  width: 80%;
  margin: 0 auto;
  margin-top: 140px;
  margin-bottom: 50px;
  background-color: #fff;
  padding: 20px;
}
.stat-crud-btn {
  width: 100px;
  padding:6px;
  border-radius: 5px;
  margin:0 5px;
  background: rgba(17, 47, 93, .85);
  color: #fff;
  text-transform: uppercase;
}
.stationEdit {
  padding: 10px;
  margin: 2px;
  display: none;
  text-align: right;
}
.stat-crud-btn i{
  width: 20px;
  padding-right: 20px;
}
.stat-crud-btn:last-child{
  right: 20px; 
}
.stat-crud-btn:hover {
  background: #33b9ff;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.stat-crud-btn.active:disabled{
  background-color: #dee2e6;
  color: gray;
  cursor: not-allowed;
}
.stationEdit.active {
  display: block;
}
.stationInfo {
  position: relative;
}
.stationInfo fieldset > div > div{
  display: inline-block;
/*  margin: 0 10px;*/
  margin-left: 10px;
  
}
.stationInfo > div:nth-of-type(even){
  /* background-color: #f6f6f6; */
/*  width: 100%;*/
}
.stationInfo label {
  color: #344e75;
  font-family: "DFHei Std";
  font-size: 14px;
  line-height: 30px;
}
.underline {
  position: relative;
  display: inline-block;
  font-family: "DFHei Std";
  height: 12px;
  border: 0;
  border-bottom: 1px solid #22adec;  
/*  box-shadow: 0px 1px 4px #d7e7ff;*/
  padding: 20px;
  margin: 1px 10px;
  background-color: transparent;
  font-size: 14px;
  min-width: 150px;
  text-align: center;
  color: black;
  height: 30px;
  
}

.underline:focus {
    border-color: #87c0fe;
    box-shadow: 0 0 0 0.2rem rgba(135, 192, 254, 1);
}
.underline:after {
  content: "\00a0 ";
}

fieldset {  
  display: block;
  margin-inline-start: 2px;
  margin-inline-end: 2px;
  padding-block-start: 0.35em;
  padding-inline-start: 0.75em;
  padding-inline-end: 0.75em;
  padding-block-end: 0.625em;
  min-inline-size: min-content;
  border-width: 2px !important;
  border-style: groove;
  border-color: threedface;
  border-image: initial;
  margin: 20px;
  width: 46.5%;
}
legend {
    display: block;
    width: auto;
    padding-inline-start: 2px;
    padding-inline-end: 2px;
    border-width: initial;
    border-style: none;
    border-color: initial;
    border-image: initial;
}
.scope {
  display: flex;
  flex-wrap:wrap;
  margin: 0 auto;
}
.station-left {
/*  display: flex;*/
  padding:10px;
  
}
.station-left label {
      width: 100px;
} 
.dropdown {
  margin-left:20px;
}
.btn-blue {
  color: #fff;
  background: rgba(17, 47, 93, .85);
  border-color: gray;
}
.btn-blue:hover {
  color: #fff;
}
.ui-button .ui-icon {
  background-image: url(images/ui-icons_777777_256x240.png);
}
</style>
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
              <li><a href="./DataReport.php" class="">
                  <div class="pic "><img src="images/m2.png" /></div>
                  日常報表
                </a>
              </li>
              <li><a href="./DataAnalyzeFlow.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  配水系統
                </a>
              </li>
              <li><a href="./DataWaterinfoReport.php" class="active">
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
  <div class="containrt">
    <div class="row">
      <div class="stationInfo">
        <div class="row">
          <div class="col-sm-6">
            <div id="condi_cmd" class="station-left">
              <div>
               <label for="salutation">選擇資料</label>
                <select name="salutation" id="salutation">
                  <option value="0">原始資料</option>
                  <option selected value="1">修改後資料</option>
                </select>
              </div>
              <div>
               <label for="salutation">水情通報時間</label>
                <select name="salutation" id="salutation1">
                  <option value="06:00:00">6點</option>
                  <option selected value="09:00:00">9點</option>
                </select>
              </div>              
            </div>
          </div>
          <div id="control_btn" class="col-sm-6">
            <div class="stationEdit active">
              <!-- <button class="stat-crud-btn" onclick="locatInforEdit(this,'R');" ><i class="fa fa-plus-square-o" aria-hidden="true" ></i>新增</button> -->
              <button class="stat-crud-btn" onclick="locatInforEdit(this,'U');" ><i class="fa fa-pencil-square-o" aria-hidden="true" ></i>修改</button>
<!--              <button class="stat-crud-btn" onclick="locatInforEdit(this,'D');" ><i class="fa fa-trash-o" aria-hidden="true"></i>刪除</button>-->
              <button class="stat-crud-btn" onclick="locatInforEdit(this,'UL');" ><i class="fa fa-cloud-upload" aria-hidden="true"></i>上傳</button>
            </div>
          </div>
        </div>
            <div id="dataInfo" class="scope">
              <fieldset>
              <legend>石門水庫</legend>
              <div>
                <div><label>水位：</label>
                  <div class="inlie"><input class="underline" readonly value="200" data-info="石門水庫_水位"></div>
                </div>
                <div><label>容量：</label>
                  <div class="inlie"><input class="underline" readonly data-info="石門水庫_容量"></div>
                </div>                
              </div>

              <div>
                <div><label>百分比：</label>
                  <div class="inlie"><input class="underline" readonly data-info="石門水庫_百分比"></div>
                </div>
                <div><label>總放水量：</label>
                  <div class="inlie"><input class="underline" readonly data-othr="石門水庫_總放水量"></div>
                </div>
              </div>
              <div>
                <div><label>放水量_板新：</label>
                  <div class="inlie"><input class="underline" readonly data-info="石門水庫_放水量_板新"></div>
                </div>
                <div><label>放水量_大湳：</label>
                  <div class="inlie"><input type="number" class="underline" readonly data-info="石門水庫_放水量_大湳"></div>
                </div>
              </div>

              <div>
                <div><label>放水量_農灌：</label>
                  <div class="inlie"><input type="number" class="underline" readonly data-info="石門水庫_放水量_農灌"></div>
                </div>
                <div><label>放水量_中庄：</label>
                  <div class="inlie"><input class="underline" readonly data-info="石門水庫_放水量_中庄"></div>
                </div>
              </div>
              <div>
                <div><label>昨日上游雨量：</label>
                  <div id="LAT"  class="inlie"><input type="number" class="underline" readonly data-info="石門水庫_昨日上游雨量"></div>
                </div>
                <div><label>後池濁度：</label>
                  <div id="LNG"  class="inlie"><input type="number" class="underline" readonly data-info="石門水庫_後池濁度"></div>
                </div>
              </div>
              </fieldset>
              
              <fieldset>
              <legend>中庄調整池</legend>
              <div>  
                <div><label>水位：</label>
                  <div id="STATION_ID" class="inlie"><input class="underline" readonly value="" data-info="中庄調整池_水位"></div>
                </div>
                <div><label>容量：</label>
                  <div id="STATION_TYPE"  class="inlie"><input class="underline" readonly data-info="中庄調整池_容量"></div>
                </div>
              </div>

              <div>
                <div><label>CB12開度：</label>
                  <div id="CITY_NAME"  class="inlie"><input class="underline" readonly data-info="中庄調整池_CB12開度"></div>
                </div>
                <div><label>昨日取水量：</label>
                  <div id="ADDRESS"  class="inlie"><input class="underline" readonly data-info="中庄調整池_昨日取水量"></div>
                </div>
              </div>

              <div>
                <div><label>濁度：</label>
                  <div id="LAT"  class="inlie"><input type="number" class="underline" readonly data-info="中庄調整池_濁度"></div>
                </div>
              </div>
              </fieldset>

              <fieldset>
              <legend>鳶山堰</legend>
              <div>  
                <div><label>水位：</label>
                  <div id="STATION_ID" class="inlie"><input class="underline" readonly value="" data-info="鳶山堰_水位"></div>
                </div>
                <div><label>容量：</label>
                  <div id="STATION_TYPE"  class="inlie"><input class="underline" readonly data-info="鳶山堰_容量"></div>
                </div>
              </div>

              <div>
                <div><label>濁度：</label>
                  <div id="CITY_NAME"  class="inlie"><input class="underline" readonly data-info="鳶山堰_濁度"></div>
                </div>
                <div><label>目前取水_重力：</label>
                  <div id="ADDRESS"  class="inlie"><input class="underline" readonly data-info="鳶山堰_目前取水_重力"></div>
                </div>
              </div>

              <div>
                <div><label>目前取水_馬達：</label>
                  <div id="LAT"  class="inlie"><input type="number" class="underline" readonly data-info="鳶山堰_目前取水_馬達"></div>
                </div>
                <div><label>昨日取水量_板新：</label>
                  <div id="LNG"  class="inlie"><input type="number" class="underline" readonly data-info="鳶山堰_昨日取水量_板新"></div>
                </div>
              </div>

              <div>
                <div><label>昨日取水量_大湳：</label>
                  <div id="ADDRESS"  class="inlie"><input class="underline" readonly data-info="鳶山堰_昨日取水量_大湳"></div>
                </div>
                <div><label>昨日取水量_側流量：</label>
                  <div id="LAT"  class="inlie"><input type="number" class="underline" readonly data-info="鳶山堰_昨日取水量_側流量"></div>
                </div>
              </div>

              <div>
                <div><label>目前放水_排砂道：</label>
                  <div id="LNG"  class="inlie"><input type="number" class="underline" readonly data-info="鳶山堰_目前放水_排砂道"></div>
                </div>
                <div><label>目前放水_排洪道：</label>
                  <div id="ADDRESS"  class="inlie"><input class="underline" readonly data-info="鳶山堰_目前放水_排洪道"></div>
                </div>
              </div>

              <div>
                <div><label>昨日放水量：</label>
                  <div id="LAT"  class="inlie"><input type="number" class="underline" readonly data-info="鳶山堰_昨日放水量"></div>
                </div>
                <div><label>昨日上游雨量_後池：</label>
                  <div id="LNG"  class="inlie"><input type="number" class="underline" readonly data-info="鳶山堰_昨日上游雨量_後池"></div>
                </div>
              </div>

              <div>
                <div><label>昨日上游雨量_八德：</label>
                  <div id="ADDRESS"  class="inlie"><input class="underline" readonly data-info="鳶山堰_昨日上游雨量_八德"></div>
                </div>
                <div><label>昨日三峽河回蓄量：</label>
                  <div id="LAT"  class="inlie"><input type="number" class="underline" readonly data-info="鳶山堰_昨日三峽河回蓄量"></div>
                </div>
              </div>
              </fieldset>

              <fieldset>
              <legend>三峽河</legend>
              <div>  
                <div><label>目前取水_馬達：</label>
                  <div id="STATION_ID" class="inlie"><input class="underline" readonly value="" data-info="三峽河_目前取水_馬達"></div>
                </div>
                <div><label>目前取水_流量：</label>
                  <div id="STATION_TYPE"  class="inlie"><input class="underline" readonly data-info="三峽河_目前取水_流量"></div>
                </div>
              </div>

              <div>
                <div><label>濁度：</label>
                  <div id="CITY_NAME"  class="inlie"><input class="underline" readonly data-info="三峽河_濁度"></div>
                </div>
                <div><label>昨日上游雨量_大豹：</label>
                  <div id="ADDRESS"  class="inlie"><input class="underline" readonly data-info="三峽河_昨日上游雨量_大豹"></div>
                </div>
              </div>

              <div>
                <div><label>昨日上游雨量_熊空：</label>
                  <div id="LAT"  class="inlie"><input type="number" class="underline" readonly data-info="三峽河_昨日上游雨量_熊空"></div>
                </div>
                <div><label>昨日取水量：</label>
                  <div id="LNG"  class="inlie"><input type="number" class="underline" readonly data-info="三峽河_昨日取水量"></div>
                </div>
              </div>

              <div>
                <div><label>板新廢水回收量：</label>
                  <div id="ADDRESS"  class="inlie"><input class="underline" readonly data-info="板新廢水回收量"></div>
                </div>
                <div><label>昨日板新出水量：</label>
                  <div id="LAT"  class="inlie"><input type="number" class="underline" readonly data-info="昨日板新出水量"></div>
                </div>
              </div>

              <div>
                <div><label>昨日北水購水量：</label>
                  <div id="LNG"  class="inlie"><input type="number" class="underline" readonly data-info="昨日北水購水量"></div>
                </div>
                <div><label>昨日支援二區量：</label>
                  <div id="ADDRESS"  class="inlie"><input class="underline" readonly data-info="昨日支援二區量"></div>
                </div>
              </div>
              </fieldset>

            </div>
      </div>
    </div>
  </div>


  <?php include_once "./php/footer.php";?>

  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>

  <script type="text/javascript" src="./js/bootstrap-slider.min.js"></script>
  <script type="text/javascript" src="./js/nicescroll.js"></script>
  <script type="text/javascript" src="./js/script.js"></script>
  <script src="./js/jquery-ui.js"></script>
  <script src="./jquery/jquery.ui.touch-punch.js"></script>

  <script language="javascript">
    var getData = new Array();
    var readOnly = new Array();
    var readWrite = new Array();
    var time_ = '09:00:00', cmd = '1';
    //輸入使用者帳號
    $(document).ready(function() { 
    var today=new Date();
    var currYear =  today.getFullYear();
    var currMoth =  today.getMonth()+1;
    var currDay =   today.getDate();
    var nowT = currYear+"/"+currMoth+"/"+currDay+" ";
      $(".pos_right > span").text("<?php echo $nam?>");
  //未完成
  //    $('#channel').on('click',function(e){
  //      if($(this).hasClass('query_header_content-active'))
  //        $('.query_content_timeInterval').find()
  //    });
      //record access of user
      

      //initial setting
      var url_ = "http://220.134.42.63:8080/WaterscadaAPI/GetWaterinfoReport?date=2020-04-21 09:00&data_type=1";
      url_ = "http://220.134.42.63:8080/WaterscadaAPI/GetWaterinfoReport?date="+nowT+time_+"&data_type="+cmd;
      console.log(url_);
      getWaterInfoReport(url_);
      //end
      
      
      
    });
    function getWaterInfoReport(seturl) {
      var temp = getToServer(seturl);
      var jsonData = temp[0];
      var doneAble = makeHTMLvalue("SET", jsonData);
      if (!doneAble) alert("載入資料錯誤，請確認網路是否連線。");        
      console.log(jsonData);
    };
    
    function locatInforEdit(e, _str_){
      switch (_str_) {
        case 'U':
          $("#dataInfo").find("[data-info], [data-othr]").removeAttr("readonly");
          $("#dataInfo").find("[data-info], [data-othr]").css({'backgroundColor': "#8080802e"});
          break;
        case 'D':
          break;
        case 'UL':
          $("#dataInfo").find("[data-info], [data-othr]").attr("readonly", 'enable');
          $("#dataInfo").find("[data-info], [data-othr]").css({'backgroundColor': "transparent"});
          var obj_data = makeHTMLvalue("GET", '');
          var nowT = $('#currdate').text(); //2020 / 05 / 13,
          nowT = nowT.split(" / ").join('/').split(',').join(' ');
          var nowTime_ = nowT+time_;  //2020/05/13T
          obj_data['DATE_TIME'] = nowTime_;
          obj_data['DATA_TYPE'] = '1';
          url_ = "http://220.134.42.63:8080/WaterscadaAPI/PostWaterinfoReport_addupdate";
          var flg = postToServer(url_, obj_data);
          if(flg != '')
            alert("已更新。");
          else 
            alert("更新失敗，請確認網路是否連線。");
          break;
      }
    };
    function makeHTMLvalue(cmd, jsondata) {
      var Z = $("#dataInfo").find("[data-info]");
      switch (cmd){
        case "GET":
          var getHtmlValue= {};
          for(var a=0; a<Z.length; a++){
            var key = $("#dataInfo").find("[data-info]")[a].dataset.info;
            var val = $("#dataInfo").find("[data-info]").eq(a).val();
            getHtmlValue[key]=val;
          }
          break;
        case "SET":
          var getHtmlValue = '';
          for(var a=0; a<Z.length; a++){
            var key = $("#dataInfo").find("[data-info]")[a].dataset.info;
            var val_ = jsondata[key];
            $("#dataInfo").find("[data-info]").eq(a).val(val_);            
            getHtmlValue = true;
          }          
          break;
      }
      return getHtmlValue;
    }
    var getURLofDayily, reportUrl, result;

    //post url to open report 
    
    //ajax POST for add & delete server Data
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
    //ajax GET for get server Data    
    function getToServer (url_){
      var result = false;
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
    
    //選擇資料
    $( "#salutation" ).selectmenu({
      change: function( event, ui ) {
        var nowT = $('#currdate').text(); //2020 / 05 / 13,        
        var nowTime_ = nowT.split(" / ").join('/').split(',').join(' ')+time_;  //2020/05/13T

        var getD = ui.item.value;
        cmd = getD;
        var url_ = "http://220.134.42.63:8080/WaterscadaAPI/GetWaterinfoReport?date="+nowTime_+"&data_type="+cmd;
        console.log(url_);
        getWaterInfoReport(url_);
      }
    });
    //水情通報時間
    $( "#salutation1" ).selectmenu({
      change: function( event, ui ) {
        var getT = ui.item.value;
        time_ = getT;
        var nowT = $('#currdate').text(); //2020 / 05 / 13,
        nowT = nowT.split(" / ").join('/').split(',').join(' ');
        var nowTime_ = nowT+time_;  //2020/05/13T
        var url_ = "http://220.134.42.63:8080/WaterscadaAPI/GetWaterinfoReport?date="+nowTime_+"&data_type="+cmd;
        console.log(url_);
        getWaterInfoReport(url_);
      }
    });
  </script>

   
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
