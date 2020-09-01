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
  
    include_once "./php/dirReadfiles.php";
     $x = getfolderFiles("MATN");
  //   print_r($x);
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
  <title>手冊專區 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">

  <link rel="stylesheet" href="css/kendoUI.css" type="text/css" />
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap-slider.css" type="text/css" />
  <link rel="stylesheet" href="css/operation.css" />

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <!-- <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script> -->
  <script type="text/javascript" src="js/gen.js"></script>
  <script src="./js/parameter_def.js"></script>
  <script src="./js/script_inner.js"></script>
  <script src="searchbase-new.js"></script>

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
              <li>
                <a href="javascript:void(0);" class="left_menu1 ">
                  <div class="pic"><img src="images/m1.png" /></div>
                  快速選單
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="left_menu2 ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  基本圖層
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0);" class="m2"><img src="images/icons/btn-icon02a.png" />即時水情看板<span>Instant board</span></a>
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
              <li>
                <a href="./WaterBalance.php" class="">
                  <div class="pic"><img src="images/m1.png" /></div>
                  供水平衡圖
                </a>
              </li>
              <li>
                <a href="./WaterSanxia.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  原水三峽河
                </a>
              </li>
              <li>
                <a href="./WaterYushan.php" class=" ">
                  <div class="pic"><img src="images/m1.png" /></div>
                  原水鳶山堰
                </a>
              </li>
              <li>
                <a href="./WaterBanxin.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  板新導水
                </a>
              </li>
              <li>
                <a href="./WaterBanxinScr.php" class=" ">
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
              <li>
                <a href="./WaterLevel.php" class=" ">
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
          <li class="">
            <a href="javascript:void(0);" class="m3"><img src="images/icons/btn-icon03a.png" />監控系統資訊<span>Monitoring system</span></a>
            <ul class="child_menu" style="">
              <li>
                <a href="./DataQuery.php" class="">
                  <div class="pic"><img src="images/m1.png" /></div>
                  數值查詢
                </a>
              </li>
              <li>
                <a href="./DataPicture.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  即時圖控
                </a>
              </li>
              <li>
                <a href="./DataCCTV.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  即時影像
                </a>
              </li>
              <li>
                <a href="./DataReport.php" class="">
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
          <li class="active">
            <a href="javascript:void(0)" class="m4"><img src="images/icons/btn-icon04a.png" />綜合資訊<span>Comprehensive</span></a>
            <ul class="child_menu" style="">
              <li>
                <a href="./DisasterInfo.php" class="">
                  <div class="pic"><img src="images/m1.png" /></div>
                  防災專區
                </a>
              </li>
              <li>
                <a href="./operation.php" class="active">
                  <div class="pic"><img src="images/m2.png" /></div>
                  手冊專區
                </a>
              </li>
              <li>
                <a href="./ExtraLinking.php" class="">
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
  <div id="dsr_Info" class="container1">
    <div class="contan">
      <ul class="tab_sheet">
        <li><span><a href="./operation.php">操作手冊</a></span></li>
        <li><span><a href="./Manage.php">管理手冊</a></span></li>
        <li class="active"><span><a href="./Maintain.php">維護手冊</a></span></li>
        <li><span><a href="./device.php">設備統計表</a></span></li>
        <li><span><a href="./statistics.php">站場點位統計總表</a></span></li>
      </ul>
      <div id="tab_contant">
        <div id="operation1" class="tab_contant"></div>
        <div id="operation2" class="tab">
        </div>
        <div id="operation3" class="tab active">
          <div class="tab-content">
              <div class="table-responsive">
                <form id="uploadForm" method="post" style="position: relative; margin-bottom: 20px;">
                <input type="hidden" name="max_file_size" value="104857600"> 
                <input name="userImage" type="file" class="inputFile btn-outline-primary"  accept=".mp4, .ppt, .pptx, .doc, .docx, .pdf, .wav, .wmv, .xls, .xlsx, .dwg, .png, .jpg, .bmp"/>
                <input type="submit" value="上傳" style="width:80px" class="btnSubmit btn btn-outline-secondary btn-sm del_" />
              </form>
                <div class="clear"></div>
                <input type="file" class="hide_input">
                <table class="table table-bordered table-hover">
                  <thead class="thead-light">
                    <tr>
                      <th class="col-1">項次</th>
                      <th class="col-2">檔案名稱</th>
                      <th class="col-3">檔案大小</th>
                      <th class="col-4">更新時間</th>
                      <th class="col-5">編輯</th>
                    </tr>
                  </thead>
                  <tbody>
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
                        <button id="edit_<?php echo $no;?>" type="button" class="btn btn-outline-secondary btn-sm donld_"><a href="files/OPER/<?php echo $key;?>">下載</a></button>
                        <button id="del_<?php echo $no;?>" type="button" class="btn btn-outline-secondary btn-sm del_">刪除</button>
                      </td>
                    </tr>
                    <?php endforeach;?>   
                    <?php else: echo "<h6 class='animated infinite flash' style='color: red; text-align: center;'>尚無搜尋到檔案。</h6>"?>
                  <?php endif;?>                 
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once "./php/footer.php";?>

  <script type="text/javascript" src="./js/nicescroll.js"></script>
  <script type="text/javascript" src="./js/script.js"></script>

  <script language="javascript">
    $(".pos_right > span").text("<?php echo $nam?>");
    $(".inputFile").bind("click",function(){
      alert("最大上傳檔案大小為: 100MB。");
    });        
    $('[type=button]').on("click", function(e) {
      var id_ = $(this).attr("id");
      var td_ = id_.split("_");
      //td_[0] <= name, td_[1] <= td count number 
      if (td_[0] == 'del') { //刪除按鈕
        var td_name = $(this).closest('tbody').find("tr:nth-of-type(" + td_[1] + ")").find("td:nth-of-type(2)").text();
        var status = "delete";
        var filePath = "../files/MATN/";
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
          if(data = "PASS")
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
      var folderName = "MATN";
      e.preventDefault();
      $.ajax({
        url: './php/upload_file.php?folder=' + folderName,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
//          console.log(data);
          $(".inputFile").val('');
          $("input[type=submit]").attr("disabled", true);
          location.reload();          
        },
        error: function() {}
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

  </script>

  <!-- checkbox選擇按鈕程式 -->
  <script>
    $("td input").click(function() {
      if ($(this).prop("checked")) {
        $(this).parents('tr').addClass("color-blue");
      } else {
        $(this).parents('tr').removeClass("color-blue");
      }
    });

  </script>

  <!-- lightbox程式 -->
  <script>
    $(document).ready(function() {
      $("button#show-panel").click(function() {
        $("#lightbox, #lightbox-panel").fadeIn(300);
      });
      $("a#close-panel").click(function() {
        $("#lightbox, #lightbox-panel").fadeOut(300);
      })
      $("#lightbox").click(function() {
        $("#lightbox, #lightbox-panel").fadeOut(300);
      });
    });

  </script>
</body>

</html>
