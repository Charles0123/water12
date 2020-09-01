<?php 
//    require_once './php/iqWater_DB.php';
//    require_once './php/functions.php';
//    $getURL = getExtraLinkUrl();
  @session_start();  
  @$role = 0;
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
    if($id == '') $nam="訪客";
    else
      @$role = 1;
  }
?>
<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>外部連結 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">

  <link rel="stylesheet" href="css/kendoUI.css" type="text/css" />
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css" />
  <link rel="stylesheet" href="css/ExtraLinking.css" />

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
  <script type="text/javascript" src="js/gen.js"></script>
  <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
  <script src="./js/parameter_def.js"></script>
  <script src="./js/script_inner.js"></script>
  <script src="js/bootstrap-slider.js"></script>
  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>
  <script src="searchbase-new.js"></script>
  <!--kendo-->
<!--  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.common-nova.min.css" />-->
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.nova.min.css" />
<!--  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.nova.mobile.min.css" />-->
  <script src="https://kendo.cdn.telerik.com/2019.2.619/js/kendo.all.min.js"></script>

  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.common.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.rtl.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.default.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.mobile.all.min.css">
  <script src="https://kendo.cdn.telerik.com/2019.2.619/js/angular.min.js"></script>
  <script src="https://kendo.cdn.telerik.com/2019.2.619/js/jszip.min.js"></script>
  <!--  kendo end-->
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
          <li class="active"><a href="./DisasterInfo.php" class="m4"><img src="images/icons/btn-icon04a.png" />綜合資訊<span>Comprehensive</span></a>
            <ul class="child_menu" style="">
              <li><a href="./DisasterInfo.php" class="">
                  <div class="pic"><img src="images/m1.png" /></div>
                  防災專區
                </a></li>
              <li><a href="./operation.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  手冊專區
                </a></li>
              <li><a href="./maintain.php" class="active">
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
        <!--
          <div class="table-responsive">
            <button type="button" class="btn btn-style btn-sm">新增</button>
            <div class="clear"></div>
            <input type="file" class="hide_input">
            <table class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th class="col-1">項次</th>
                  <th class="col-2">連結名稱</th>
                  <th class="col-3">備註</th>
                  <th class="col-4">編輯</th>
                </tr>
              </thead>
              <tbody class="table-striped">
                <tr>
                  <td scope="row">1</td>
                  <td><a href="http://10.12.1.46:81/wgis/wgis.html" target="_blank">圖資查詢系統</a></td>
                  <td></td>
                  <td>
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="show-panel">編輯</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm">刪除</button>
                  </td>
                </tr>
                <tr>
                  <td scope="row">2</td>
                  <td><a href="http://125.227.249.121/twcwm/" target="_blank">供水監測資訊平台</a></td>
                  <td>小區管網</td>
                  <td>
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="show-panel">編輯</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm">刪除</button>
                  </td>
                </tr>
                <tr>
                  <td scope="row">3</td>
                  <td><a href="https://water007.water.gov.tw/TaiwanWaterSupply/Account/LogOn?ReturnUrl=%2fTaiwanWaterSupply%2f" target="_blank">供水監測查詢系統</a></td>
                  <td>總處</td>
                  <td>
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="show-panel">編輯</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm">刪除</button>
                </tr>
                <tr>
                  <td scope="row">4</td>
                  <td><a href="http://10.100.101.221/v3/web" target="_blank">SensLink雲端監測系統</a></td>
                  <td>總處</td>
                  <td>
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="show-panel">編輯</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm">刪除</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
-->
        <div id="external_grid"></div>
      </div>
    </div>
  </div>

  <!-- 新視窗 -->
  <!--
  <div id="lightbox-panel">
    <div align="right"><a class="close" id="close-panel" href="#"></a></div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="link-number">項次</label>
        <div class="col-sm-2">
          <input type="text" class="form-control form-control-sm" name="urlInfo" id="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="link-name">連結名稱</label>
        <div class="col-sm-9">
          <input type="text" class="form-control form-control-sm" name="urlInfo" id="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="link-note">備註</label>
        <div class="col-sm-9">
          <input type="text" class="form-control form-control-sm" name="urlInfo" id="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="link-url">網址連結</label>
        <div class="col-sm-9">
          <input type="text" class="form-control form-control-sm" placeholder="HTTP://" name="urlInfo" id="">
        </div>
      </div>

      <div align="center" class="sendToDB"><a class="btn btn-outline-secondary" href="#">送出</a></div>
  </div>
-->
  <!-- /lightbox-panel -->
  <!--  <div id="lightbox"></div>-->
  <!-- /lightbox -->
  <?php include_once "./php/footer.php";?>

  
  <script type="text/javascript" src="./js/bootstrap-slider.min.js"></script>
  <script type="text/javascript" src="./js/nicescroll.js"></script>
  <script type="text/javascript" src="./js/script.js"></script>

  <script language="javascript">
    $(".pos_right > span").text("<?php echo $nam?>");    
    $("input[name=idn]").val("<?php echo $id?>");
    var idn = $("input[name=idn]").val();    

    $(".mt tbody tr td [type=button]:first-child").on("click", function(e) {
      var x = $(this).closest("table").find('tr td:nth-of-type(4)').find("[type=button]:first-child").index(this);

    });
    //change solution to IIS from php's DB.      
    //      $(".sendToDB").on("click",function(e){
    //        var allData = $("[name=urlInfo]");
    //        var data_ = [];
    //        for(var x=0; x<allData.length; x++){
    //          data_.push($($(allData)[x]).val());          
    //        }
    //        $.ajax({
    //            type: "POST",
    //            url: "./php/EditURLLink.php",
    //            data: { 
    //              'datas': data_
    //            },
    //            dataType: 'html' //設定該網頁的回應會是html格式
    //          }).done(function(data) {
    //            console.log(data);
    //            
    //          }).fail(function(jqXHR,textSataus,errorThrown) {
    //            alert("有錯誤產生，請看console log");
    //            console.log(jqXHR.responseText);
    //          });
    //        
    //      });



    var geturl = [];
    GetExternalUrl();

    function GetExternalUrl() {
      geturl.length = 0;
      $.ajax({
        url: "http://220.134.42.63:8080/WaterscadaAPI/GetExternalUrl",
        type: "GET",
        dataType: "json",
        async: false,
        success: function(Jdata) {
          $.each(Jdata, function(index, d) {
            geturl.push(d);
          });
          console.log(geturl);
          //ID NAME URL unkonw
          var unit, flag = [];
          if (geturl != '') {
            
//0:
//CLASS: null
//DEPARTMENT: null
//ID: 1
//NAME: "供水監測平台"
//URL: "http://125.227.249.121/twcwm/"
          }
        },
        error: function() {
          console.log("get json fail");
        }
      });
    }

    //    if (document.addEventListener) {
    //      document.addEventListener("DOMMouseScroll", scrollFunc, false);
    //    } //W3C
    //    window.onmousewheel = document.onmousewheel = scrollFunc; //IE/Opera/Chrome/Safari
    var en__ = false; 
    function grid_Datas(geturl){
      var grid_Data = new kendo.data.DataSource({
          data: geturl,
//          batch: true,
          pageSize: 20,
          schema:           {
              model: {
                      ID: "ID", fields: { ID: { editable: false, nullable: true },  },
                    }
              }
      });
      return grid_Data;
    }
    $("#external_grid").kendoGrid({
      dataSource: grid_Datas(geturl),
      pageable: true,
      height: 550,
      toolbar: ["create", "excel"],
      columns: [
        { hidden: true, field: "ID",  width: "80px",   title: "項次",   filterable: false,  },
        { field: "NAME",title: "連結名稱", filterable: false, 
          template: function(grid_Data) {
            var x;
            x = '<a target="_blank" href="'+grid_Data.URL+'">'+grid_Data.NAME+'</a>';
            return x;
          }
        },
        { field: "DEPARTMENT",title: "部門", filterable: false, },
        { hidden: true, field: "CLASS",title: "課", filterable: false, },
        { hidden: true, field: "URL",title: "網址", filterable: false, },
        { command: [{ name: "edit"} , 
                    { name: "Remove"} ], title: "&nbsp;", width: "200px", // built-in "destroy" command
                            template: function(grid_Data) {
                        console.log("123");
                      }  
        }],
      noRecords: {
              template: "<h6 class='animated flash infinite' style='color:red'>目前尚無資料</h6>"
            },
      pageable: {
                    refresh: true,
                    pageSizes: true,
                    buttonCount: 5,
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
      groupable: {
              messages: {
                empty: "拖曳至此以群組顯示"
              }
            },
      edit: function(e) {
              console.log("edit");
              var container = e.container;
              container.addClass("updatecont");
            },
      save: function(e) {              
        var grid = $("#external_grid").data("kendoGrid");
        var colume_ = [], getDatas = '', itemData = [];
        getDatas = e.model; 
        //取key值
        for (var i = 0; i < grid.columns.length; i++) {
          colume_.push(grid.columns[i].field);
        }
        colume_.pop();
        console.log(colume_); // displays "name" and then "age"
        //取value值
//        e.model[colume_[0]] = grid.dataSource._data.length;
        for(var i = 0; i < colume_.length; i++) { 
          itemData.push(e.model[colume_[i]]);
        }
        var id_ = grid.dataSource._data.length;
        if(itemData[0] == null) itemData.splice(0,1,id_);
        console.log(itemData);
//              grid.dataSource.insert(0, { 監控記錄: event.data });
        var obj = {};
        for(var x=0; x<colume_.length; x++){
          obj[colume_[x]] = itemData[x];
        }
        console.log(obj);
        var url_ = 'http://220.134.42.63:8080/WaterscadaAPI/PostExternalUrl_addupdate';
        var chkInfor = postToServer(url_, obj);
        console.log(chkInfor);
//        grid.editRow(getDatas);
        url_ = "http://220.134.42.63:8080/WaterscadaAPI/getExternalUrl";
        var jsonDA = getToServer(url_);
        var geturl = grid_Datas(jsonDA);
  //      geturl = jsonDA;
        console.log(geturl);
        var grid = $("#external_grid").data("kendoGrid");
        
        
        $("#external_grid").data("kendoGrid").refresh();
        
//        grid.saveRow();
        //取目前grid的內容              
//              var viewAll = grid.dataSource.view();
//              var dataSource = new kendo.data.DataSource({   data: viewAll   }) //存入grid不會被reflesh改變
//              grid.setDataSource(dataSource);
        console.log("save");                            
      },
//      Remove: function(e) {
//        console.log('real destroy');
//      },
      
      cancel: function(e) {
        var grid = $("#external_grid").data("kendoGrid");
        console.log("destroy");
        if(!en__){                
          //ToAllenAPI('save', itemData);   //reload data from Allen's API 
          grid.setDataSource(grid_Data);
          console.log("destroy:編緝");
        } else {                
          grid.setDataSource(grid_Data);
          console.log("destroy:新增");
        }        
        en__ = false;

      }, 
      editable: {
        mode: "popup",              
        confirmation: true,
        cancelDelete: "No",
      }
    });
    $(document).on('change', '.updatecont input', function(){en__ = true; });
    $(".k-grid-Remove").on('click', function(e){      
      var id_ = $(this).closest("tr").children("td:first").text();
      var obj = {}, url_ = 'http://220.134.42.63:8080/WaterscadaAPI/PostExternalUrl_delete';
      obj["ID"] = id_;
      var chkInfor = postToServer(url_, obj);
      console.log(chkInfor);
      url_ = "http://220.134.42.63:8080/WaterscadaAPI/getExternalUrl";
      var jsonDA = getToServer(url_);
      var geturl = grid_Datas(jsonDA);
//      geturl = jsonDA;
      console.log(geturl);
      var grid = $("#external_grid").data("kendoGrid");
      grid_Datas(geturl);
      grid.setDataSource(grid_Datas(geturl));
      $("#external_grid").data("kendoGrid").refresh();
    });
    
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

  <script>
    $("td input").click(function() {
      if ($(this).prop("checked")) {
        $(this).parents('tr').addClass("color-blue");
        // $('button').attr('disabled', true);
      } else {
        $(this).parents('tr').removeClass("color-blue");
        // $('button').attr('disabled', 'disabled');
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
