<?php echo 'Current PHP version: ' . phpversion();?>
<!doctype html>
<html lang="zh-Hant-TW">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <title>第十二區管理處供水調配操控整合管理系統</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes,maximum-scale=5.0,minimum-scale=1.0,viewport-fit=cover">
  <meta name="format-detection" content="telephone=no">
<!--  <link href='favicon.ico' rel='icon' type='image/x-icon' />-->

  <!-- Owl Stylesheets -->
  <link rel="stylesheet" href="js/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="js/owlcarousel/assets/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/cms-header.css" type="text/css">
  <link rel="stylesheet" href="css/cms-footer.css" type="text/css">
  <link rel="stylesheet" href="css/login.css" type="text/css">
  <link rel="stylesheet" href="css/animate.min.css" type="text/css">
<!--  <script type='text/javascript' src='js/jquery-2.1.0.min.js'></script>-->
</head>
<style>
    #ann_box .yellow{
        color: rgb(253, 255, 0);
        background: transparent !important;
    }
    #ann_box .green{
        color: rgb(0, 255, 1);
        background: transparent !important;
    }
    #ann_box .gray{
        color: gray;
        background: transparent !important;
    }
    #ann_box .red{
        color: #073469;
        background: transparent !important;
    }
</style>
<body>

  <div class="all">
    <div class="container">
      <div class="header"><img src="images/icons/login-logo.png"></div>
      <div class="main">
        <div class="login">
          <div>
            <ul>
              <li>
                <label for="target">使用者帳號</label>
                <input type="text" name="text" id="target" onfocus="" placeholder="You username goes here">
              </li>
              <li>
                <label for="text1">使用者密碼</label>
                <input type="password" name="text" id="text1" onfocus="" placeholder="">
                <a style="display: none;" href="">忘記密碼 Forgot password ?</a>
              </li>
              <li>
                <input type="submit" value="登入" name="submit" >
                <a onclick="anyuserlogin();" class="btnW">訪客登入</a>
              </li>
              <li class="last">Copyright &copy; <?php echo date("Y");?></li>
            </ul>
          </div>
        </div>
        <div class="text">SIGN<br>IN</div>
        <div class="marquee">
          <div>
            <ul id="ann_box">
              <li class="ann a1 " style="color: red;">確認目前警報狀態中<a><span class="animated infinite flash">。。。</span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>






  <script type="text/javascript" src="./js/jquery-3.4.0.min.js" ></script>
  <script src="js/owlcarousel/owl.carousel.js"></script>
  
  <script>
    var getAlarmDatas = []; 
    var alarmString;
    $('.text1').keypress(function(e) {
        var key = window.event ? e.keyCode : e.which;
        if (key == 13)
            $('input[name=submit]').click();
    });

    $(document).ready(function () {
        $('#text1').focus();
    });

    $('#text1').keypress(function(e) {
        if(e.which == 13) {
            $('input[name=submit]').focus().click();
        }
    });
    
    var getData;
//    console.log(getData);
    $("input[type=submit]").click(function(e){
      var n = $('#target').val();
      var p = $('#text1').val();
      $(".btnW").removeClass("animated infinite flash");
      getloda(n,p);
    });    
  function getloda(str, no) {
      $.ajax({
        url: "http://220.134.42.63:8080/WaterscadaAPI/Login?id="+str+"&password="+no,
        type: "GET",
        dataType: "json",
        success: function(Jdata) {
          debugger;
          console.log(Jdata);
//          getData[0] = '0'; //demo patten
          if (Jdata['CODE'] == "0"){
            $.ajax({
              url:"./php/confirmed.php",
              type:"POST",
              data:{              
                  'xdata': Jdata['USERINFO'],
                  'n2' : $("#target").val(),
                  'p2' : $("#text1").val(),                
            }, 
            dataType: 'html'
            }).done (function(data){           
               console.log(data);
               if(data == 'login.php'){
                 alert("帳號或密碼輸入錯誤。請重新輸入或聯繫IT人員。");
               }
               location.replace(data);
            }).fail(function(jqXHR,textSataus,errorThrown){
              console.log("有錯誤產生，請看console log");
              alert("請確認目前網路通道是否正確。");
            }); 
          }
          else {
            alert("此帳號，尚未註冊。");
            alert("輸入帳號、密碼有誤，請重新輸入或聯繫IT人員。\n或，以訪客身分登入。謝謝。");
            $(".btnW").addClass("animated infinite flash").css({"font-weight": 600});
            }
          },
        error: function() {
          console.log("get json fail");
        }
      });
    }
  
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
          url: "http://220.134.42.63:8080/WaterscadaAPI/getRealtimeAlarmData",
//          url: "http://220.134.42.63:8080/WaterscadaAPI/getAlarmData?start= 2019/08/11 00:00&end=2019/08/11 00:01:00&station_id=新龍形加壓站",
          type: "GET",
          dataType: "json",
          async:false,
          success: function(Jdata) {
            $.each(Jdata, function(index, d) {
              getAlarmDatas.push(d);   
            });
            //TAG_ID DESC VALUE FLAG UNIT
            var unit, flag=[];
            if(getAlarmDatas !=''){
                $("#ann_box li").remove();
                for(var x=0; x<getAlarmDatas.length; x++){
                    if(getAlarmDatas[x].FLAG !="N"){
                        unit = transformUnit(getAlarmDatas[x].UNIT);
                        flag = alarmFlag(getAlarmDatas[x].FLAG);
                         alarmString = getAlarmDatas[x].STATION_ID+getAlarmDatas[x].DESC;
                        $("#ann_box").append('<li class="ann"><a href="./alarmList.php?tagid='+getAlarmDatas[x].TAG_ID+'">'+alarmString+flag[1]+': <span class='+flag[0]+'>'+getAlarmDatas[x].VALUE.toFixed(2)+" "+unit+'</span></a></li>');
                        allPass = false;
                    } else {
                      if (allPass) {
                        $("#ann_box li").remove();
                        $("#ann_box").append('<li class="ann">所有場站測值正常</li>');
                      }
                    }
                }
//                console.log(alarmString);
                console.log("更新警報値資料");
                cellbackalert = setInterval(function() { GetRealAlarmData();
                }, 300000); //預設5分鐘毫秒自動重複執行cartnumber()函數 
              } else {
              console.log("無警報値資料，30秒後連線重新。");
              $("#ann_box li").remove();
              $("#ann_box").append('<li class="ann animated infinite flash" style="color: #073469;">無警報値資料</li>');
              cellbackalert = setInterval(function(){GetRealAlarmData();}, 30000);
            }
          },
          error: function() {
            console.log("資料連接錯誤，30秒後重新連線。");
            $("#ann_box li").remove();
            $("#ann_box").append('<li class="ann animated infinite flash" style="color: red;">無警報値資料</li>');
            cellbackalert = setInterval(function(){GetRealAlarmData();}, 30000);
          }
        });
      } 
  slideLine('ann_box', 'li', 2000, 25, 40);
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
    
  //3階
  function anyuserlogin(){
    window.location.href = "logout.php";
    window.location.href = "mapview.php";
  }
  </script>
</body>
</html>
