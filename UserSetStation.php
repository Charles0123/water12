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
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>場站資訊 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/kendoUI.css" type="text/css" />
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css" />
  <link rel="stylesheet" href="css/ExtraLinking.css" />
  
  <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
  <script type="text/javascript" src="js/gen.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>
<!--  <script type="text/javascript" src="./js/script.js"></script>-->
  <script src="./js/jquery-1.12.3.min.js"></script>
  <script src="./js/kendo/2020.1.114.kendo.all.min.js"></script>
  <link rel="stylesheet" href="./css/kendo/kendo.common.min.css">
  <link rel="stylesheet" href="./css/kendo/kendo.rtl.min.css">
  <link rel="stylesheet" href="./css/kendo/kendo.default-v2.min.css">
  <link rel="stylesheet" href="./css/kendo/kendo.default.min.css">
  <link rel="stylesheet" href="./css/kendo/kendo.mobile.all.min.css">  
  <script src="https://kendo.cdn.telerik.com/2020.1.114/js/angular.min.js"></script>
  <script src="./js/kendo/jszip.min.js"></script>
  <!--  kendo end-->
  <style>
    .custom-select {
      padding: 0;
      font-size: 0.875rem;
      line-height: 1.5;
      border-radius: 0.2rem;
      background: none;

    }
    .k-button {
      color: black !important;  
    }
    .k-button:active {
      background-color: #33baff !important;
      border-color: #33baff !important;
    } 
    .wrapper {
      height: calc(100vh - 20vh);
    }
    .k-grid-header th.k-with-icon .k-link {
/*      margin-right: 18px;*/
      position: relative;
      writing-mode: vertical-lr;
      -webkit-writing-mode: -webkit-writing-mode: vertical-lr;
      box-shadow: 0 0 black;
      min-height: 130px;
      margin: 0px auto;
          padding-top: 0px;
    }
    .k-window>div.k-popup-edit-form {
      padding: 30px !important; 
    }
    .k-edit-label {
      text-align: left !important;
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
          <li class=""><a href="javascript:void(0);" class="m4"><img src="images/icons/btn-icon04a.png" />綜合資訊<span>Comprehensive</span></a>
            <ul class="child_menu" style="">
              <li><a href="./DisasterInfo.php" class="">
                  <div class="pic"><img src="images/m1.png" /></div>
                  防災專區
                </a></li>
              <li><a href="./operation.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  手冊專區
                </a></li>
              <li><a href="./maintain.php" class="">
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
    <div class="wrapper mt">
        <div class="container">
          <div class="row">
          <div><h5>場站資料</h5></div>
          <div id="grid_author"></div>
          </div>
        </div>
    </div>


  <?php include_once "./php/footer.php";?>

  
<!--  <script type="text/javascript" src="./js/bootstrap-slider.min.js"></script>-->
  <script type="text/javascript" src="./js/nicescroll.js"></script>
  

  <script language="javascript">
    $(".pos_right > span").text("<?php echo $nam?>");

    getDataAuthor();
    function getDataAuthor() {
      var url = "http://220.134.42.63:8080/WaterscadaAPI/GetTagInfo?user_id";
      var jsonData = getToServer(url);  
      grid_author(jsonData);
      console.log(jsonData);
    }

    function grid_author(xdata) {
        var t;
        var filename = "場站資訊"+t;
        var jsm = new kendo.data.DataSource({
                data: xdata,
                batch: true,
                pageSize: 20,
                schema: {
                    model: {
                            id: "TAG_ID",
                            fields: { ID: { editable: false, nullable: true },  },                           
                    }
                }
         });      
        $("#grid_author").kendoGrid({
            dataSource: jsm,
            height: 660,
            toolbar: ["search",{ name: "create", text: "新增" },{name: "excel", text: "匯出xlsx"}],
            columns: [
                { field: "TAG_ID", title: "ID",  width: "100px", hidden: false,},
                { field: "STATION_ID", title: "測站名稱",  width: "100px",
                          attributes: {style: "text-align: center;"}
                },
                { field: "STATION_TYPE", title:"測站種類",  width: "100px" ,
//                          template: function(jsm) {                            
//                            
//                          }
                },
                { field: "DEVICE", title:"設備名稱", width: "100px"},
                { field: "DESC", title:"測站項目", width: "100px"},
                { field: "MEASURE", title:"物理量", width: "60px", hidden: false },
                { field: "UNIT", title:"單位",  width: "60px", hidden: false },
                { field: "H_ALARM", title:"高警報值", width: "60px", hidden: false },
                { field: "HH_ALARM", title:"高高警報",  width: "60px", hidden: false },
                { field: "L_ALARM", title:"低警報值",  width: "60px", hidden: false },
                { field: "LL_ALARM", title:"低低警報值",  width: "60px", hidden: false },
                { field: "PM_TYPE", title:"壓力計",  width: "60px", hidden: false },                
                { field: "FM_TYPE", title:"流量計",  width: "60px", hidden: false },                
                { command: [{ name: "edit", text: "修改"} , 
                            { className: "btn-destroy", name: "delete", text: "移除", iconClass: "k-icon k-i-delete",
                              click: function(e){
                              var itemDataObj = {};
                              var url_="http://220.134.42.63:8080/WaterscadaAPI/PostTag_delete";
                              var idText = $(e.currentTarget).closest("tr").children("td:first").text();
                              itemDataObj['ID'] = idText;
                              postToServer(url_, itemDataObj);
                            }
                          } ], title: "&nbsp;", width: "80px" // built-in "destroy" command
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
              var grid = $("#grid_author").data("kendoGrid");
              var colume_ = [], getDatas = '', itemData = '', itemDataObj = {};
              var url_="http://220.134.42.63:8080/WaterscadaAPI/PostTag_addupdate";   
              //取key值
              for (var i = 0; i < grid.columns.length; i++) {
                colume_.push(grid.columns[i].field);
//                console.log(grid.columns[i].field); // displays "name" and then "age"
              }
              var z = e.sender._data;
              var arr = [], setId = '';
              if($(".updatecont").hasClass("addcont")) {
                setId = "S"+Math.round((Math.random())*100000);
                e.sender._data[0]["ID"] = setId;
                itemDataObj["ID"] = setId;
              }
              for(var i = 0; i < colume_.length-1; i++) { 
                itemData=e.model[colume_[i]];
                itemDataObj[colume_[i]] = itemData;
              }
              debugger;
              e.sender.setDataSource(e.sender._data);
              console.log(itemDataObj);
              postToServer(url_, itemDataObj);
              console.log("save");                            
            },
            cancel: function(e) {
              var grid = $("#grid_author").data("kendoGrid");
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
        var grid = $("#grid_author").data("kendoGrid");
        grid.bind("excelExport", function(e) {
          e.workbook.fileName = filename + ".xlsx";
        }); 
    };
    
    
    //global functions
    function getToServer(url_){
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
  </script>
</body>

</html>
