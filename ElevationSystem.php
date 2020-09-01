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
  <title>供水高程系統 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">

  <link rel="stylesheet" href="css/kendoUI.css" type="text/css" />
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css">
  <link rel="stylesheet" href="css/waterBalance.css">
  <link rel="stylesheet" href="css/ElevationSystem.css">

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type='text/javascript' src='js/jquery-2.1.0.min.js'></script>
  <script type='text/javascript' src='js/gen.js'></script>
  <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
  <script src="./js/parameter_def.js"></script>
  <script src="./js/script_inner.js"></script>
  <link rel="stylesheet" href="css/bootstrap-slider.css" type="text/css">
  <script src="js/bootstrap-slider.js"></script>
  <script src="searchbase-new.js"></script>

</head>

<body onload="showtime();">
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
                </a></li>
              <li class="active">
                <a href="./ElevationSystem.php" class="active">
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
              <li><a href="./DataPicture.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  即時圖控
                </a></li>
              <li><a href="./DataCCTV.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  即時影像
                </a></li>
              <li><a href="./DataReport.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  日常報表
                </a></li>
              <li><a href="./DataAnalyzeFlow.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  配水系統
                </a></li>
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
  <div class="main-box" style="width: 100%; position: relative; top: 150px;">
    <div class="center-box">
      <div class="menu">
        <!--        <div class="menu-btn active">123dsaaaaaaaaaaaaaaa</div>-->
      </div>

      <div id="container_">
<!-- append data place
        <div class="content_">
          <div class="caption-container">
              <p id="caption"></p>
          </div>         
           <div class="mySlides">
            <div class="numbertext">1 / 6</div>
            <img src="../WaterScada/IFIX_PIC/(光復iFIX-VM)IG_供水高程關析_全覽圖.grf.png" style="width:100%">
          </div>
          <a class="prev" onclick="plusSlides(-1)">❮</a>
          <a class="next" onclick="plusSlides(1)">❯</a>
          <div class="row">            
             <div class="column">
              <img class="demo cursor" src="../WaterScada/IFIX_PIC/(光復iFIX-VM)IG_供水高程關析_忠義.grf.png" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
            </div>
          </div>
        </div>
-->

      </div>
      <div style="clear: both;"></div>
    </div>
  </div>
  <?php include_once "./php/footer.php";?>

  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>
  <script type="text/javascript" src="./js/bootstrap-slider.min.js"></script>
  <script type="text/javascript" src="./js/nicescroll.js"></script>
  <script type="text/javascript" src="./js/script.js"></script>

  <script language="javascript">
    $(".pos_right > span").text("<?php echo $nam?>");    
    $("input[name=idn]").val("<?php echo $id?>");
    var idn = $("input[name=idn]").val();
    
    getElevation(ElevationPicture, 0);
    currentSlide(1);
    
    var elevation_Array = [];

    function getElevation(string_, no) {
      var key_ = [];
      var value_ = [];
      var sta_ = [];
      var url_ = [];
      $.each(string_, function(index, d) {
        key_.push(index);
        value_.push(d);
      });
        $.each(value_[no], function(index, d1) {
          sta_.push(index);          
          url_.push(d1);
        });        
        for(var x=0; x<key_.length; x++) {
          $('.menu').append('<div class="menu-btn">' + key_[x] + '</div>');  //樹林區
        }
        
        var y = sta_.length;
        $('#container_').append('<div class="content_">');
        $('.content_').append('<div class="caption-container">');
        for (var x = 0; x < sta_.length; x++) {
          $('.caption-container').append('<p class="caption">' + sta_[x] + '</p>');          
        }
        $('.content_').append('</div>');
        for (var x = 0; x < sta_.length; x++) {
          $('.content_').append('<div class="mySlides"><div class="numbertext">' + (x + 1) + ' / ' + y + '</div><img src="../WaterScada/IFIX_PIC/' + url_[x] + '" style="width:100%"></div>');
        }
        $('.content_').append('<a class="prev" onclick="plusSlides(-1)">❮</a><a class="next" onclick="plusSlides(1)">❯</a>');
        $('.content_').append('<div class="row">');
        for (var x = 0; x < sta_.length; x++) {
          $('.row').append('<div class="column"><img class="demo cursor" src="../WaterScada/IFIX_PIC/' + url_[x] + '" style="width:100%" onclick="currentSlide(' + (x + 1) + ')" alt="Cinque Terre"></div>');
        }
        $('.content_').append('</div></div>');
//        console.log(sta_+':'+url_ );
        sta_.length = 0;
        url_.length = 0;
      console.log("------");
      var nam = $('.menu-btn');
      $(nam[no]).addClass('active');
    };
    
    $('.menu').on('click', '.menu-btn', function(e) {
      var curr = $('.menu-btn').index(this);
      var nam = $('.menu-btn');
      $(".menu-btn").remove();
      $(".content_").remove();
      getElevation(ElevationPicture, curr);
      currentSlide(1);
    });
    

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var capt = document.getElementsByClassName("caption");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        capt[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      capt[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
    }

  </script>

</body>

</html>
