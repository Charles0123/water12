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
<html lang="zh-tw">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>使用者資訊 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">

  <link rel="stylesheet" href="css/kendoUI.css" type="text/css" />
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap-slider.css" type="text/css" />

  <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
  <script type="text/javascript" src="js/gen.js"></script>
  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>
  <script type="text/javascript" src="js/DisasterInfo.js"></script>
  <script src="./js/parameter_def.js"></script>
  <script src="./js/script_inner.js"></script>
  <script src="searchbase-new.js"></script>
  
  
  <script src="./js/jquery-1.12.3.min.js"></script>
  <script src="./js/kendo/2020.1.114.kendo.all.min.js"></script>
  <link rel="stylesheet" href="./css/kendo/kendo.common.min.css">
  <link rel="stylesheet" href="./css/kendo/kendo.rtl.min.css">
  <link rel="stylesheet" href="./css/kendo/kendo.default-v2.min.css">
  <link rel="stylesheet" href="./css/kendo/kendo.default.min.css">
  <link rel="stylesheet" href="./css/kendo/kendo.mobile.all.min.css">  
  <script src="https://kendo.cdn.telerik.com/2020.1.114/js/angular.min.js"></script>
  <script src="./js/kendo/jszip.min.js"></script>
  
  
  
<script type="text/javascript">

window.onunload = unloadPage;

function unloadPage()
{
 console.log("unload event detected!");
}
</script>
<style>
  body {
    background-image: url(./images/report-bg.png);
    background-size: cover;
    background-repeat: no-repeat;
}
/* .mt {
  margin-top: 8.5em;
} */
.wrap{
    /* max-width: 1280px; */
    width: 100%;
    height: calc(100vh -  8.7em);
    background-color: #143e71;
    margin: 0 auto;
    margin-top: 8.7em;
  
}
#userInfo {
  padding: 30px;
  height: 85.3vh;
  overflow-y: hidden;
}
.k-command-cell .k-button {
    color: #143e71;
    font-weight: 400;
}
#grid_author {
    margin: 0 auto !important;
    color: white;
    border: 1px solid white;
    border-collapse: collapse;
    text-align: center;
    background-color: #143e71;
    border: 1px solid white;
    margin-top: 20px;
    width: 600px !important;
    top: 30px;
}
tr td {
  padding: 6px;
  border: 0.1em solid #c5c5c5 !important;
}
thead {
    background-color: #868794;
    font-size: 14px;
    font-weight: bold;
}
tbody {
    background-color: #143e71;
    font-size: 14px;
    font-weight: bold;

}
th {
  text-align: center !important;
}  
tbody tr td:first-child {
  background-color: #33b9ff;
  font-size: 14px;
}
@media screen and (max-width:425px){
  #grid_author {
    width: 100%;
  }
}
  .btn-edit {
    width:80% !important;
    margin: 2px 10px !important;
  }
</style>
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
          <li class="">
            <a href="javascript:void(0)" class="m4"><img src="images/icons/btn-icon04a.png" />綜合資訊<span>Comprehensive</span></a>
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
          <li class="active"><a href="./rowmap.php" class="m4"><img src="images/icons/btn-icon04a.png" />網站地圖<span>Row Map</span></a></li>
        </ul>
      </nav>
      <!-- main_menu [end] -->
    </div>
  </header>
  <div class="wrap mt">
     <div id="grid_author"></div>
<!--
     <div id="userInfo" class="">
      <table>
        <thead>
          <tr>
            <td style="width: 28%;">類別</td>
            <td style="width: 72%;">使用者資訊</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>使用者ID</td>
            <td id="ID"></td>
          </tr>
          <tr>
            <td>使用者名稱</td>
            <td id="NAME"></td>
          </tr>
          <tr>
            <td>權限群組</td>
            <td id="WEB_BACKEND"></td>
          </tr>
          <tr>
            <td>修改密碼</td>
            <td id="CHG_PWS"></td>
          </tr>
        </tbody>
      </table>
  </div>
-->
  </div>
  <input type="hidden" name="idn">
  <?php include_once "./php/footer.php";?>

  
  <script type="text/javascript" src="./js/nicescroll.js"></script>
  <script type="text/javascript" src="./js/script.js"></script>  
  <script language="javascript">  
    
    $(".pos_right > span").text("<?php echo $nam?>");    
    $("input[name=idn]").val("<?php echo $id?>");
    var idn = $("input[name=idn]").val();
    
    
    // Get the modal
    var modal = document.getElementById('id01');
    var flag = 0;

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

  
    $('.logout').on('click', function() {
      $.ajax({
        type: "POST",
        url: "./logout.php",
        data: {},
        dataType: 'html'
      }).done(function(data) {
        alert("已成功登出");
        if (data == "pass")
          window.location.href = 'login.php';
      }).fail(function(jqXHR, textSataus, errorThrown) {
        alert("有錯誤產生，請看console log");
        console.log(jqXHR.responseText);
      });
    });
    GetUserInfo(idn);
    
    function GetUserInfo(user_id){
      var xdata = [];
      var setlab = {
         ID: "ID",
         NAME: "名稱",
         PASSWORD: "密碼",
         WEB_FRONTEND: "網站權限名稱",
         WEB_BACKEND: "系統管理權限名稱",
         CITY: "場站(R)",
         CITY_WRITE: "場站(R/W)",
         REPORT: "報表(R)",
         REPORT_WRITE: "報表(R/W)"
      };
      $.ajax({
        url: "http://220.134.42.63:8080/WaterscadaAPI/GetUserInfo?user_id="+ user_id,
        type: "GET",
        dataType: "json",
        async:false,
        success: function(Jdata) {
          $.each(Jdata[0], function(index, d){
            var obj = {};
            if(setlab[index] != undefined){
              obj["TITLE"] = setlab[index];
              obj["IDN"] = index;
              obj["VALUE"] = d;              
              xdata.push(obj);
              obj = {};
            }
          }); 
          grid_author(xdata);
        }
      });
    }
    
    function postToServer(url_, obj_data){  
      var x=[], result = '';      
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
    
    function grid_author(xdata) {
        var jsm = new kendo.data.DataSource({
                data: xdata,                
         });      
        $("#grid_author").kendoGrid({
            dataSource: jsm,
            columns: [
                { field: "IDN", title: "ID",  width: "100px", hidden: true,
                          attributes: {style: "text-align: center;"}
                }, { field: "TITLE", title: "名稱",  width: "100px", hidden: false,
                          attributes: {style: "text-align: center; background-color: rgb(51, 185, 255)"}
                },
                { field: "VALUE", title: "內容",  width: "100px",
                          attributes: {style: "text-align: center;"}
                },
                { command: [{ className: "btn-edit", name: "edit", text: "修改"} , 
                           ], title: "功能", width: "100px" // built-in "destroy" command
              }],
            noRecords: {
              template: "<h6 class='animated flash infinite' style='color:red'>目前尚無資料</h6>"
            },                       
            edit: function(e) {
              var container = e.container;
              container.addClass("updatecont");
              if($(".updatecont").find("input[name=IDN]").val() != ''){
                $(".updatecont").find("input[name=IDN], input[name=TITLE]").attr("readonly","true").css({'backgroundColor':'#D1DBD4', 'color': '#656565'}); 
                $(".updatecont").find("input[name=IDN]").css({'display': 'none'});
                $(".k-edit-form-container").children("div").eq(0).css({"display":"none"});
                console.log("edit");
              } else {
                container.addClass("addcont");                
                console.log("add");
              }
            },
            save: function(e) {              
              var grid = $("#grid_author").data("kendoGrid");
              var colume_ = [], getDatas = [], itemData = '', itemDataObj = {};
              var url_="http://220.134.42.63:8080/WaterscadaAPI/PostUser_addupdate";   
              //取key值
              for (var i = 0; i < grid.columns.length; i++) {
                colume_.push(grid.columns[i].field);
//                console.log(grid.columns[i].field); // displays "name" and then "age"
              }
              var z = e.sender._data;
              var arr = [], setId = '';
              var t_body = $(".k-grid-content").find("tbody");
              
              for(var x=0; x<$(t_body).find("tr").length; x++){
                var key = $(t_body).find("tr").eq(x).find("td").eq(0).text();
                var val = $(t_body).find("tr").eq(x).find("td").eq(2).text();    
                itemDataObj[key] = val;
              }
//              for(var i = 0; i < colume_.length-1; i++) { 
//                itemData=e.model[colume_[i]];
//                itemDataObj[colume_[i]] = itemData;
//              }
              debugger;
              
              e.sender.setDataSource(e.sender._data);
              console.log(itemDataObj);
              postToServer(url_, itemDataObj);
              console.log("save");                            
            },           
            editable: {
              mode: "popup",              
              confirmation: true,
              cancelDelete: "No"      
            },
            dataBound: function(e) {
              console.log($(".k-command-cell").length);
              $(".k-command-cell .k-button").not(":eq(1),:eq(2)").css({'display': 'none'});
            }
          });        
    };

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

</body>

</html>
