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
  <title>即時影像 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">

  <link rel="stylesheet" href="css/kendoUI.css" type="text/css" />
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css">
  <link rel="stylesheet" href="css/waterBalance.css">
  <link rel="stylesheet" href="css/bootstrap-slider.css" type="text/css">
  <link href="./css/DataCCTV.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="css/videoJS.css"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type='text/javascript' src='js/jquery-2.1.0.min.js'></script>
  <script type='text/javascript' src='js/gen.js'></script>
  <script type='text/javascript'src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
  <script type='text/javascript'src="./js/parameter_def.js"></script>
  <script type='text/javascript'src="./js/script_inner.js"></script>
  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>
  <script type='text/javascript'src="./js/bootstrap-slider.js"></script>
  <script type='text/javascript'src="./searchbase-new.js"></script>

  <link href="https://vjs.zencdn.net/7.6.0/video-js.css" rel="stylesheet">
<!--  <script src='https://vjs.zencdn.net/7.6.0/video.js'></script>-->
  <link rel="stylesheet" href="./js/video/video-js.css" rel="stylesheet">
  <script src='./js/video/video.js'></script>
<!--  we will not setup the videojs-contrib-hls.js for using version 7 or up of vodeo.js -->
<!--  <script type='text/javascript' src='./js/video/videojs-contrib-hls.min.js'></script>-->
<link rel="stylesheet" href="https://cdn.plyr.io/1.8.2/plyr.css">
<script src="https://cdn.plyr.io/1.8.2/plyr.js"></script>
<!--<script src="https://cdn.jsdelivr.net/hls.js/latest/hls.js"></script>-->
</head>

<body onload="showtime(); getCCTVtoken(setCCTV.key, setCCTV.account, setCCTV.pwd);">
  <div class="mobile_mask"></div>
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
          <li class=""><a href="./mapview.php" class="m1"><img src="images/icons/btn-icon01a.png" />全區供水<span>Map view</span></a>
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
          <li class=""><a href="javascript:void(0)" class="m2"><img src="images/icons/btn-icon02a.png" />即時水情看板<span>Instant board</span></a>
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
              <li><a href="./WaterBalance.php" class=" ">
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
          <li class="active"><a href="./DataReport.php" class="m3"><img src="images/icons/btn-icon03a.png" />監控系統資訊<span>Monitoring system</span></a>
            <ul class="child_menu" style="">
              <li><a href="./DataQuery.php" class="">
                  <div class="pic"><img src="images/m1.png" /></div>
                  數值查詢
                </a></li>
              <li><a href="./DataPicture.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  即時圖控
                </a></li>
              <li><a href="./DataCCTV.php" class="active">
                  <div class="pic"><img src="images/m2.png" /></div>
                  即時影像
                </a></li>
              <li><a href="./DataReport.php" class=" ">
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
          <li><a href="javascript:void(0)" class="m4"><img src="images/icons/btn-icon04a.png" />綜合資訊<span>Comprehensive</span></a>
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

  <div class="menu">
    <div class="menu_header"><img src="./images/icons/left1.png"><span>即時影像</span></div>
    <div class="menu_wrapper">
      <div class="menu_content menu_content-active">
        <div class="menu_content_title">板新給水廠<input type="hidden" value="1201"></div>
        <div class="menu_content_submenu">
          <div class="menu_content_submenu_wrapper">
            <div class="menu_content_submenu_content">鳶山堰監測站</div>
            <div class="menu_content_submenu_content">三峽河取水站</div>
            <div class="menu_content_submenu_content">中庄調整池</div>
            <div class="menu_content_submenu_content">錦和加壓站</div>
            <div class="menu_content_submenu_content">新五路加壓站</div>
            <div class="menu_content_submenu_content">廣權加壓站</div>
            <div class="menu_content_submenu_content">泰山配水池25000噸</div>
            <div class="menu_content_submenu_content">尖山加壓站監視一</div>
            <div class="menu_content_submenu_content">尖山加壓站監視二</div>
          </div>
        </div>
      </div>
      <div class="menu_content">
        <div class="menu_content_title">鶯歌服務所<input type="hidden" value="1204"></div>
        <div class="menu_content_submenu">
          <div class="menu_content_submenu_wrapper">
            <div class="menu_content_submenu_content">大埔加壓站</div>
            <div class="menu_content_submenu_content">忠義二加壓站</div>
            <div class="menu_content_submenu_content">忠義三加壓站</div>
            <div class="menu_content_submenu_content">忠義三配水池</div>
            <div class="menu_content_submenu_content">鳳鳴加壓站</div>
            <div class="menu_content_submenu_content">國際二加壓站</div>
            <div class="menu_content_submenu_content">成浮配水池</div>
            <div class="menu_content_submenu_content">新市民加壓站</div>
          </div>
        </div>
      </div>
      <div class="menu_content">
        <div class="menu_content_title">樹林服務所<input type="hidden" value="1203"></div>
        <div class="menu_content_submenu">
          <div class="menu_content_submenu_wrapper">
            <div class="menu_content_submenu_content">大慶一加壓站</div>
            <div class="menu_content_submenu_content">大慶配水池</div>
            <div class="menu_content_submenu_content">民和一加壓站</div>
            <div class="menu_content_submenu_content">民和二配水池</div>
            <div class="menu_content_submenu_content">民和三配水池</div>
            <div class="menu_content_submenu_content">三興配水池</div>
            <div class="menu_content_submenu_content">信和配水池</div>
          </div>
        </div>
      </div>
      <div class="menu_content">
        <div class="menu_content_title">土城服務所<input type="hidden" value="1205"></div>
        <div class="menu_content_submenu">
          <div class="menu_content_submenu_wrapper">
            <div class="menu_content_submenu_content">青雲一加壓站</div>
            <div class="menu_content_submenu_content">南天母二配水池</div>
          </div>
        </div>
      </div>
      <div class="menu_content">
        <div class="menu_content_title">泰山營運所<input type="hidden" value="1206"></div>
        <div class="menu_content_submenu">
          <div class="menu_content_submenu_wrapper">
            <div class="menu_content_submenu_content">凌雲二加壓站</div>
            <div class="menu_content_submenu_content">凌雲三加壓站</div>
            <div class="menu_content_submenu_content">凌雲四加壓站</div>
            <div class="menu_content_submenu_content">凌雲五加壓站</div>
            <div class="menu_content_submenu_content">凌雲六加壓站</div>
            <div class="menu_content_submenu_content">觀音山2000噸配水池</div>
            <div class="menu_content_submenu_content">泰山淨水廠</div>
            <div class="menu_content_submenu_content">泰山一號深井</div>
            <div class="menu_content_submenu_content">同榮加壓站</div>
            <div class="menu_content_submenu_content">同榮二配水池</div>
            <div class="menu_content_submenu_content">壟鉤二加壓站</div>
            <div class="menu_content_submenu_content">御史一加壓站</div>
            <div class="menu_content_submenu_content">御史二加壓站</div>
            <div class="menu_content_submenu_content">全興加壓站</div>
            <div class="menu_content_submenu_content">觀音山500噸配水池</div>
            <div class="menu_content_submenu_content">水碓高架400T配水池</div>
            <div class="menu_content_submenu_content">水碓加壓站</div>
            <div class="menu_content_submenu_content">泰山五號深井</div>
          </div>
        </div>
      </div>
      <div class="menu_content">
        <div class="menu_content_title">蘆洲服務所<input type="hidden" value="1207"></div>
        <div class="menu_content_submenu">
          <div class="menu_content_submenu_wrapper">
            <div class="menu_content_submenu_content">八仙加壓站</div>
            <div class="menu_content_submenu_content">觀音山加壓站</div>
            <div class="menu_content_submenu_content">大堀湖加壓站</div>
            <div class="menu_content_submenu_content">長坑加壓站</div>
            <div class="menu_content_submenu_content">長坑口一加壓站</div>
            <div class="menu_content_submenu_content">長坑口二加壓站</div>
            <div class="menu_content_submenu_content">長道坑加壓站</div>
            <div class="menu_content_submenu_content">長道坑配水池</div>
            <div class="menu_content_submenu_content">龍形加壓站</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="dataCCTV">
    <div class="dataCCTV_title">觀音山加壓站</div>
    <div class="dataCCTV_content_picture_controll" style="display:none">
      <img src="./images/icons/open.png" alt="" >
    </div>
    <div class="dataCCTV_wrapper">
      <div class="dataCCTV_content cctv_block0">
        <div class="dataCCTV_content_title"><img src="./images/icons/cctv-icon4.png" alt="" title="斷線中"><span>CAM1</span>
          <div class="dataCCTV_content_controll"><img src="" alt=""></div>
        </div>
        <div class="dataCCTV_content_cam ">
          <div class="cam">
            <video id="video_0" data-setup="" class="video-js vjs-default-skin vjs-big-play-centered" controls="controls" autoplay="autoplay">
              <source src="./images/noise.mp4" type="video/mp4">
            </video>
          </div>
        </div>
      </div>
      <div class="dataCCTV_content cctv_block1">
        <div class="dataCCTV_content_title"><img src="./images/icons/cctv-icon4.png" alt="" title="斷線中"><span>CAM2</span>
          <div class="dataCCTV_content_controll"><img src="" alt=""></div>
        </div>
        <div class="dataCCTV_content_cam ">
          <div class="cam">
            <video id="video_1" data-setup="" class="video-js vjs-default-skin vjs-big-play-centered" controls="controls" autoplay="autoplay">
              <source src="./images/noise.mp4" type="video/mp4">
            </video>
          </div>
        </div>
      </div>
      <div class="dataCCTV_content cctv_block2">
        <div class="dataCCTV_content_title"><img src="./images/icons/cctv-icon4.png" alt="" title="斷線中"><span>CAM3</span>
          <div class="dataCCTV_content_controll"><img src="" alt=""></div>
        </div>
        <div class="dataCCTV_content_cam ">
          <div class="cam">
            <video id="video_2" data-setup="" class="video-js vjs-default-skin vjs-big-play-centered" controls="controls" autoplay="autoplay">
              <source src="./images/noise.mp4" type="video/mp4">
            </video>
          </div>
        </div>
      </div>
      <div class="dataCCTV_content cctv_block3">
        <div class="dataCCTV_content_title"><img src="./images/icons/cctv-icon4.png" alt="" title="斷線中"><span>CAM4</span>
          <div class="dataCCTV_content_controll"><img src="" alt=""></div>
        </div>
        <div class="dataCCTV_content_cam ">
          <div class="cam">
            <video id="video_3" data-setup="" class="video-js vjs-default-skin vjs-big-play-centered" controls="controls" autoplay="autoplay">
              <source src="./images/noise.mp4" type="video/mp4">
            </video>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once "./php/footer.php";?>

  <script src="./js/DataCCTV.js"></script>
  <script type="text/javascript" src="./js/bootstrap-slider.min.js"></script>
  <script type="text/javascript" src="./js/nicescroll.js"></script>
  <script type="text/javascript" src="./js/script.js"></script>
  <script type="text/javascript" src="./js/video/hola_player.dev.1.0.165.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
<!--
  <script src="./js/moment.min.js"></script>
  <script src="./js/moment-with-locales.js"></script>
-->
  <script language="javascript">
    $(function () {
      $( 'body' ).attr("title").css({'cursor': 'pointer'});
      $( document ).tooltip();
    })
    $(".pos_right > span").text("<?php echo $nam?>");    
    $("input[name=idn]").val("<?php echo $id?>");
    var idn = $("input[name=idn]").val();
    
    var setCCTV = JSON.parse(setCCTV);
    var url = setCCTV.CCTVurl + setCCTV.getauth;
    var TOKENDAT, TOKEN;
    //    alert(url +'_'+ setCCTV.key+'_'+ setCCTV.account+'_'+ setCCTV.pwd);

    //0000******** 目前CCTV的camId是建制在parament_def.js上若以後要更新需修改camAssign={} 內的資料 *******0000//
    var browser = function() {
      if (window.navigator.userAgent.match(/^((?!chrome|android).)*safari/i)) {
        if (window.navigator.userAgent.match(/iPad/i) || window.navigator.userAgent.match(/iPhone/i)) {
          console.log('Is iPhone or iPad of Safari');
          return 'safari_mobile';
        } else {
          //use datetimepicker 
//          console.log('電腦版的safari');
          return 'safari_PC';
        }
      } else {
        //Because all browser can support type=date
        //input type can use date 
//        console.log('不是safari on mac 所以可以使用 type=date');
        return 'other';
      }      
    }
    
    //getCCTVtoken(setCCTV.key, setCCTV.account, setCCTV.pwd);      
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
        //         alert(TOKEN);
        //default setting of
        $(".dataCCTV_title").text("鳶山堰監測站"); //setting default
        var camlist = ["7611876601", "7611876602","7611876603", "7611876604"]; //鳶山堰監測站
        getCCTVlive(TOKEN, camlist, 'hls');
      }
      xhr.send(data);
    }
    //
    $(".menu_wrapper .menu_content .menu_content_submenu_content").on("click", function(e) {
      //      console.log(TOKEN);
      if($("menu_content").has('void')){
        $("video").each(function () 
        { 
           this.pause();
           this.src = "";
        });
      }
      var cadin = [];
      var obj = [];
      var camlist = [];
      var indx = $(this).closest(".menu_content").find('.menu_content_submenu_content').index(this);
      var nam = $(this).text();
      $.each(camAssign, function(index, d) {
        if (index == nam) {
          cadin.push(d);
          $(".dataCCTV_title").text(nam); //attach place name
          $.each(cadin, function(index1, d1) {
            obj.push(d1);
          });
          $.each(obj[0], function(index2, d2) {
            camlist.push(d2);
          });
        }
      });
      //      console.log(camlist);
      getCCTVlive(TOKEN, camlist, 'hls');
      camlist.length = 0;
    });

    //get cctv live infor.
    function getCCTVlive(token, camlist, streamTyp) {
      //NoiseVideoUrl_();
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
        console.log(Data_arr[2]);
        console.log(str.urlToken);
        AppendCamInfo(str);
        setInterval(function() {
          getCCTVkeep(token, str.urlToken);
        }, 280000); //預設5分鐘毫秒自動重複執行cartnumber()函數   - 280000      
      }
      xhr.send(data);
    }
    //判斷物件是否為空
    function isEmptyObject(obj) {   
      for (var key in obj){
        return false;//返回false，不為空物件
      }　　
      return true;//返回true，為空物件
    }
    //make camra information and append to web page
    function AppendCamInfo(str) {
      var path;
//      $("source, video").removeAttr("src");
      $(".dataCCTV_content .dataCCTV_content_title *").remove();
      $(".dataCCTV_content .dataCCTV_content_cam *").remove();
      if(!isEmptyObject(str.liveList)) {
        for (var x = 0; x < str.liveList.length; x++) {
          var camurl_ = str.liveList[x].url;
          var camstatus = str.liveList[x].status;
  //                camurl_ = "https://d2zihajmogu5jn.cloudfront.net/bipbop-advanced/bipbop_16x9_variant.m3u8";
  //        camurl_ = "http://210.65.250.71:8080/live/cam7649138902/a99323e3ca7a49ceb560770e180d9860/index.m3u8";
          if (camstatus == "1"){
            var disc = "連線中";
            var path = "./images/icons/cctv-icon3.png"; //live pass- green 
            var flashClass='';
          }
          else {
            var disc = "斷線中";
            var path = "./images/icons/cctv-icon4.png"; //live fail - red
            var flashClass = 'animated infinite flash';
          }
          console.log(path);
          var browserType = browser();

           switch (browserType) {
              case "safari_mobile":
              case "safari_PC":
  //             camurl_ = 'http://video.h-cdn.com/static/hls/cdn2/master.m3u8';
               camurl_ = camurl_.split('index').join("NORMAL/index");             
                $(".cctv_block" + x + " .dataCCTV_content_title").append('<img class="'+ flashClass +'" src=' + path + ' title='+disc+'><span>CAM' + (x + 1) + '</span><div class="dataCCTV_content_controll"><img src="" alt=""></div>');
                $(".cctv_block" + x + " .dataCCTV_content_cam").append('<div class="cam"><video id="video_' + x + '" class="video-js vjs-default-skin" poster="" controls autoplay><source src="'+camurl_+'" type="application/x-mpegURL"></video></div>');
              break;
  //            case "safari_PC":
  //              break;
            case "other":
  //              alert("other");
               $(".cctv_block" + x + " .dataCCTV_content_title").append('<img class="'+ flashClass +'" src=' + path + ' title='+disc+'><span>CAM' + (x + 1) + '</span><div class="dataCCTV_content_controll"><img src="" alt=""></div>');
                $(".cctv_block" + x + " .dataCCTV_content_cam").append('<div class="cam"><video id="video_' + x + '" class="video-js vjs-default-skin" poster="" controls autoplay><source src="" type="application/x-mpegURL"></video></div>');

                break;
            }
            if(camstatus == "1") {
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
            } 
        }
      } else alert("沒有影像檔");
    }

    //change noise video after not m3u8 file
    function NoiseVideoUrl_(){
       console.log("chang noise video");
       for(var x=0; x<4; x++){
       var videoNo = "video_"+x;
        var player = videojs(videoNo);
         player.pause();
        $(".cctv_block"+x+" .dataCCTV_content_title > span:nth-of-type(1)").text("CAN"+(x+1));
       player.src({
                  src: './images/noise.mp4',
                  type: 'video/mp4',
                  withCredentials: false
              });
                       player.load();
          player.play(); 
      }
      
    }

    //get status of cctv keep-url-alive 
    function getCCTVkeep(token, urlToken) {
      var urltoken = [];
      urltoken.length = 0;
      urltoken.push(urlToken);
            console.log(urltoken);
      var Data_arr = [];
      Data_arr.length = 0;
      var url_ = setCCTV.CCTVurl + setCCTV.keepUrlAlive;
      var str;
      console.log(urltoken);
      var xhr = new XMLHttpRequest();
      var data = JSON.stringify({
        "urlTokenList": urltoken
      });
      xhr.open("POST", url_);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.setRequestHeader('Authorization', token);
//      xhr.onload = function() {
//        str = JSON.parse(xhr.responseText);
////        $.each(str, function(index, d) {
////          Data_arr.push(d);
////        });
//                 console.log(Data_arr);
//        //         console.log(urlToken);
//      }
      xhr.send(data);
    };


    var getData = [];
    getbashboardData("全區供水調配", 2);
    //        window.setInterval(temp, 3000);
    function getbashboardData(str, no) {
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
          $("#District12_1").val(getkeyword[0].TOOLTIPS);
          //                 console.log(getData[1][0].STATION_ID);
        },
        error: function() {
          console.log("get json fail");
        }
      });
    }
    //搜尋json內特定字串
    var findIndexofkeywd = [];

    function compareString(str, getdata) {
      var keyword = str;
      $.each(getdata[1], function(v, x) {
        if (x.STATION_ID == keyword) {
          findIndexofkeywd.push(getdata[1][v]);
        } else {        
          console.log(keyword);
        }
      });
      //       console.log(findIndexofkeywd);
      return findIndexofkeywd;
    }

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

  <!-- 手機版選單收闔程式 -->

    <script>
      $(".menu .menu_header").click(function () {
      $(".menu").toggleClass("menu_change");
      $(".menu_wrapper").toggle();
      $(".dataCCTV").toggleClass("zoom_change");
      
      });
    </script>

</body>

</html>
