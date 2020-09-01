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
    @$nam=$_SESSION['NAM'];
    @$id=$_SESSION['ID'];
    @$pw=$_SESSION['PW'];
    @$date=$_SESSION['DAT'];
    @$time=$_SESSION['TIM'];
    if($nam == '') $nam = $id;
    if($id == '') $nam="訪客";
  }
?>
<!doctype html>
<html lang="zh-Hant-TW">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <title>首頁 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes,maximum-scale=5.0,minimum-scale=1.0,viewport-fit=cover">
  <meta name="format-detection" content="telephone=no">
  <!--<link href='favicon.ico' rel='icon' type='image/x-icon'/>-->

  <!-- Owl Stylesheets -->
  <link rel="stylesheet" href="js/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="js/owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/animate.min.css" type="text/css">
  <link rel="stylesheet" href="css/cms-header.css" type="text/css">
  <link rel="stylesheet" href="css/cms-footer.css" type="text/css">
  <link rel="stylesheet" href="css/index.css" type="text/css">

  <script type='text/javascript' src='js/jquery-2.1.0.min.js'></script>
　<script src="./js/moment.min.js"></script>
  <script>
    function showtime() {
      setTimeout("showtime()", 1000);
      var currentDate = moment().format('YYYY/MM/DD');
      var currentTime = moment().format('HH:mm:ss');
      $("#currdate").text(currentDate);
      $("#currtime").text(currentTime);
    };

  </script>
</head>

<body onload="showtime();">

  <div class="all">
    <div class="container">
      <div class="main">
        <div class="absolute">
          <div class="header">
            <div class="logo"><img src="images/icons/logo.png"></div>
            <div class="top">
              <div class="text"><span>訪客</span>
                <span id='currdate'></span><img src="images/icons/time-icon.png"><span id="currtime"></span></div>
              <div class="img"><img src="images/icons/test.png"></div>
            </div>
          </div>
          <div class="banner-text">
            <h1>歡迎進入第十二區管理處供水調配操控整合管理系統</h1>
            <p>為因應大台北都會區，工商迅速發展，人口急劇增加，供水需求量大幅成長並為加強用戶服務，本公司乃應地方政府及民眾之要求，於民國77年10月24日成立第十二區管理處，轄區包括新北市板橋、土城、三峽、鶯歌、樹林、新莊、泰山、五股、蘆洲、八里等十個區及三重、中和部份地區。</p>
          </div>
          <div class="nav">
            <ul>
              <li id="mapview">
                <a href="./mapview.php">
                  <p class="img"><img src="images/icons/btn-icon01.png"><img src="images/icons/btn-icon01a.png"></p>
                  <p>全區供水<span>Map View</span></p>
                  <p class="img-right"><img src="images/icons/arrow.png"><img src="images/icons/arrowa.png"></p>
                </a>
              </li>
              <li id="WaterDashboard">
                <a href="./DashboardSupply.php">
                  <p class="img"><img src="images/icons/btn-icon02.png"><img src="images/icons/btn-icon02a.png"></p>
                  <p>即時水情看版<span>Instant board</span></p>
                  <p class="img-right"><img src="images/icons/arrow.png"><img src="images/icons/arrowa.png"></p>
                </a>
              </li>
              <li id="MonitoringSystem">
                <a href="./DataQuery.php">
                  <p class="img"><img src="images/icons/btn-icon03.png"><img src="images/icons/btn-icon03a.png"></p>
                  <p>監控系統資訊<span>Monitoring system</span></p>
                  <p class="img-right"><img src="images/icons/arrow.png"><img src="images/icons/arrowa.png"></p>
                </a>
              </li>
              <li id="SunInfo">
                <a href="./DisasterInfo.php">
                  <p class="img"><img src="images/icons/btn-icon04.png"><img src="images/icons/btn-icon04a.png"></p>
                  <p>綜合資訊<span>Comprehensive</span></p>
                  <p class="img-right"><img src="images/icons/arrow.png"><img src="images/icons/arrowa.png"></p>
                </a>
              </li>
              <li id="RowMap">
                <a href="./rowmap.php">
                  <p class="img"><img src="images/icons/btn-icon04.png"><img src="images/icons/btn-icon04a.png"></p>
                  <p>網路地圖<span>RowMap</span></p>
                  <p class="img-right"><img src="images/icons/arrow.png"><img src="images/icons/arrowa.png"></p>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="banner1 owl-carousel owl-theme">
          <div class="item"><img src="images/icons/banner1.jpg"></div>
          <div class="item"><img src="images/icons/banner2.jpg"></div>
          <div class="item"><img src="images/icons/banner3.jpg"></div>
        </div>
        <div class="logout" style="cursor: pointer;">
          <a class="out"><img src="images/icons/logout.png"><img src="images/icons/logouta.png">
            <div>LOG OUT</div>
          </a>
          <a class="gear"><img src="images/icons/icon.png"><img src="images/icons/icona.png"></a>
        </div>
      </div>
      <div class="marquee">
        <div>
          <ul id="ann_box">
            <li class="ann a1 " style="color: red;">確認目前警報狀態中<a><span class="animated infinite flash">。。。</span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>




  <script src="js/owlcarousel/owl.carousel.js"></script>

  <script>
    var getAlarmDatas = []; 
    var alarmString
    var url__ = 'http://220.134.42.63:8080/waterscada/Login/Login.aspx?redirect=settings';    
    $('.gear').on('click',function(e){
      $(this).attr('href', url__);
    });
    
    $('.out').on('click', function() {
      $.ajax({
        type: "POST",
        url: "./logout.php",
        data: {},
        dataType: 'html'
      }).done(function(data) {
        alert('成功登出');
        if (data == "pass")
          window.location.href = 'login.php';
      }).fail(function(jqXHR, textSataus, errorThrown) {
        alert("有錯誤產生，請看console log");
        console.log(jqXHR.responseText);
      });
    });


    $(".text > span:first").text("<?php echo $nam?>");
    $(".text > .date").text("<?php echo $date?>");
    $(".text > span:last").text("<?php echo $time?>");
    $(document).ready(function() {
      $('.banner1').owlCarousel({
        center: true,
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 8000,
        autoplayHoverPause: true,
        dots: false,
        nav: true, //上一頁,下一頁開啟鈕
        navText: [
          '<span aria-label="' + 'Previous' + '"><img src="images/icons/prev.png"><img src="images/icons/preva.png"></span>',
          '<span aria-label="' + 'Next' + '"><img src="images/icons/next.png"><img src="images/icons/nexta.png"></span>'
        ] //上一頁,下一頁文字
      });
      //權限設定 - 暫不使用
      //        $(".nav > ul li").click(function(e){
      //          var id = $(this).attr("id");
      //          var path = "./"+id+".php"
      //          $.ajax({
      //              url: path,
      //              type:"POST",
      //              data:{              
      //                  'n1' : getData[1].ID,
      //                  'p1' : getData[1].PASSWORD,
      //                  'n2' : $("#target").val(),
      //                  'p2' : $("#text1").val()
      //            }, 
      //            dataType: 'html'
      //            }).done (function(data){           
      //               console.log(data);
      //               location.replace("index.php");
      //            }).fail(function(jqXHR,textSataus,errorThrown){
      //              console.log("有錯誤產生，請看console log");
      //            });
      //        });
      //        
    });
    GetRealAlarmData();    
  function transformUnit(unit_){
    var toSupContent = ["kgf/cm2", "M3"];
    if(toSupContent.indexOf(unit_.trim()) != -1){
        var stringArray = unit_.split('');
        stringArray[stringArray.length - 1] = String(stringArray[stringArray.length - 1]).sup();
        var supProccessedString = stringArray.join('');
        return supProccessedString;
    } else
        return unit_.toUpperCase();
  };
    var flagColor, flagString;
  function alarmFlag(alarmContent){
      switch (alarmContent){
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
  function GetRealAlarmData() {
      clearInterval(cellbackalert);
      var allPass = true;
      getAlarmDatas.length = 0;
      $.ajax({
//        url: "http://220.134.42.63:8080/WaterscadaAPI/getRealtimeAlarmData",
        url:"http://220.134.42.63:8080/waterscadaAPI/GetAlarmData?start=2019/08/11&end=2019/08/11",
        type: "GET",
        dataType: "json",
        async: false,
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
            cellbackalert = setInterval(function(){GetRealAlarmData();}, 300000); //update datas after 5min ago
          } else {
            console.log("無警報値資料，30秒後連線重新。");
            $("#ann_box li").remove();
            $("#ann_box").append('<li class="ann animated infinite flash" style="color: white;">無警報値資料</li>');
            cellbackalert = setInterval(function(){GetRealAlarmData();}, 30000);
          }
        },
        error: function() {  
            console.log("資料連接錯誤，30秒後重新連線。");
            $("#ann_box li").remove();
            $("#ann_box").append('<li class="ann animated infinite flash" style="color: white;">無警報値資料</li>');
            cellbackalert = setInterval(function(){GetRealAlarmData();}, 30000);
        }
      });
    };     
slideLine('ann_box', 'li', 2000, 25, 32);
      function slideLine(box, stf, delay, speed, h) {
      var slideBox = document.getElementById(box);
      var delay = delay || 1000,
        speed = speed || 20,
        h = h || 20;
      var tid = null,
        pause = false;
      var s = function() {
        tid = setInterval(slide, speed);
      }
      var slide = function() {
        if (pause) return;
        slideBox.scrollTop += 1;
        if (slideBox.scrollTop % h == 0) {
          clearInterval(tid);
          slideBox.appendChild(slideBox.getElementsByTagName(stf)[0]);
          slideBox.scrollTop = 0;
          setTimeout(s, delay);
        }
      }
      slideBox.onmouseover = function() {
        pause = true;
      }
      slideBox.onmouseout = function() {
        pause = false;
      }
      setTimeout(s, delay);
    }
   
    
    

  </script>
  <script type="text/javascript">
    function phone_show_cover(id) {
      $("#phone_text_" + id).slideToggle(100);
    }

    function phone_hide_cover(id) {
      $("#phone_text_" + id).hide(10);
    }

  </script>
</body>

</html>
