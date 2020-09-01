<?php 
  @session_start();
  include_once("php/sidemap.php");

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
    
    if(@$_POST["sta"] == "add") {
      $rw = true;
      @$targetUser = $_POST["user"];
      $targetWebpage = $_POST["webpage"];
    }
    else if(@$_POST["sta"] == 'rw'){
      $rw = false;
      $targetUser = $_POST["user"];
      $targetWebpage_ = array();
      $targetWebpage_ = explode("@",$_POST["webpage"]);
      array_pop($targetWebpage_);
      $targetWebpage = join('@',$targetWebpage_);
//      print_r($targetWebpage);
    }
    else {
      
      //header("Location: UserGroup.php");
    }      
  }
?>
<!DOCTYPE html>
<html lang="zh_TW">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
  <title>新增、修改群組名稱 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/kendoUI.css" type="text/css" />
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css" />
  <link rel="stylesheet" href="css/ExtraLinking.css" />
  
  <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
  <script type="text/javascript" src="js/gen.js"></script>
  <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script>
  
  <script src="./js/jquery-1.12.3.min.js"></script>
  <script src="./js/kendo/2020.1.114.kendo.all.min.js"></script>
  <link rel="stylesheet" href="./css/kendo/kendo.common.min.css">
  <link rel="stylesheet" href="./css/kendo/kendo.rtl.min.css">
  <link rel="stylesheet" href="./css/kendo/kendo.default-v2.min.css">
  <link rel="stylesheet" href="./css/kendo/kendo.default.min.css">
  <link rel="stylesheet" href="./css/kendo/kendo.mobile.all.min.css">  
<!--
  <script src="https://kendo.cdn.telerik.com/2020.1.114/js/angular.min.js"></script>
  <script src="./js/kendo/jszip.min.js"></script>
-->


  <style>
    .stationInfo {
      width: 100%;
      height: 80vh;
      margin: 0 auto;
      margin-top: 75px;
      margin-bottom: 50px;
      background-color: #fff;
      padding: 20px;
    }

    .stat-crud-btn {
      width: 100px;
      padding: 6px;
      border-radius: 5px;
      margin: 0 5px;
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

    .stat-crud-btn i {
      width: 20px;
      padding-right: 20px;
    }

    .stat-crud-btn:last-child {
      right: 20px;
    }

    .stat-crud-btn:hover {
      background: #33b9ff;
      color: #ffffff;
      transition: all .2s ease;
      cursor: pointer;
    }

    .stat-crud-btn.active:disabled {
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

    .stationInfo fieldset>div>div {
      display: inline-block;
      /*  margin: 0 10px;*/
      margin-left: 10px;
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
                  推播系統
                </a>
                <div class="show_popinfo">
                  <a href="./PushImportXls.php" onclick="$('.show_popinfo').css({'display':'none'})">匯入資料<div class="pic"><img src="images/m2.png" /></div></a>
                  <a href="https://61.222.53.185/WaterEqp/" target="_new">推播系統<div class="pic"><img src="images/m2.png" /></div></a>
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
          <li class="active"><a href="./rowmap.php" class="m4"><img src="images/icons/btn-icon04a.png" />網站地圖<span>Row Map</span></a></li>
        </ul>
      </nav>
      <!-- main_menu [end] -->
    </div>
  </header>
  <div class="container">
    <div class="row">
      <div class="stationInfo">
        <div class="row">
          <div class="col-sm-6">
            <div id="condi_cmd" class="station-left">
              <div>
                <label for="salutation">群組名稱</label>
                <input type="text" name="" id="groupName" placeholder="群組名稱" require value="<?php echo $targetUser?>">
              </div>

            </div>
          </div>
          <div id="control_btn" class="col-sm-6">
            <div class="stationEdit active">
              <button class="stat-crud-btn" onclick="addinfo();"><i class="fa fa-cloud-upload" aria-hidden="true"></i>上傳</button>
            </div>
          </div>
        </div>
        <div id="grid_list"></div>

      </div>
    </div>
  </div>


  <?php include_once "./php/footer.php";?>

  <script type="text/javascript" src="./js/bootstrap-slider.min.js"></script>
  <script type="text/javascript" src="./js/nicescroll.js"></script>
  <script type="text/javascript" src="./js/script.js"></script>

  <script language="javascript">  
    var rw = '<?php echo $rw?>';
    var user = '<?php echo $targetUser?>';
    var weburl = '<?php echo $targetWebpage?>';
    weburl = "./ExtraLinking.php@./operation.php@./DataReport.php";
    var json = getjsonfile();
    console.log(json);
    mappingwebpage(json);
    function getjsonfile() {
      var json = null;      
      $.ajax({
        'async': false,
        'global': false,
        'url': "php/sidemap.json",
        'dataType': "json",
        'success': function(data) {
          json = data;          
        }
      });
      return json;
    };  
    
    grid_list(json);
    function mappingwebpage(json){
      var mapg = [], z='';
      if($("#groupName").val() != '') {
        var url_array = [];
        url_array = weburl.split("@");
        $.each(json, function(k,v){
          console.log(v['url']);
          z='false';
          for(var x=0; x<url_array.length; x++) {
            if(url_array[x] == v['url']) z='true';
          }
          mapg.push(z);
        });
        var tr = $("#grid_list").find("tbody").find("tr");
        debugger;
        for(var x=0; x<tr.length; x++) {
          $(tr[x]).addClass("k-state-selected");
          $(tr[x]).find('td:first').children('input[type=checkbox]').attr("aria-checked", mapg[x]);
          $(tr[x]).find('td:first').children('input[type=checkbox]').attr("aria-label","Deselect row");
        }
      }
      
    }
    
    var urlString = '';
    function onChange() {
      console.log("The selected product ids are: [" + this.selectedKeyNames().join(", ") + "]");
       var chkbox_array = [];
       var chkbox= $("#grid_list").find("tbody").find("tr>td").children("input[type=checkbox]");
       for(var y=0; y<chkbox.length; y++) {
         var _temp_ = $(chkbox).eq(y).attr('aria-checked');
         if(_temp_ == "true") {
           var _url_ = $("#grid_list").find("tbody").find("tr").eq(y).children("td:last").text();
          chkbox_array.push(_url_);           
         }
       }
//       console.log(chkbox_array);
        urlString = chkbox_array.join(',');
     }
    
    function grid_dataBinding(e) {
        console.log("dataBound");
        mappingwebpage();
      }
    function grid_list(xdata) {
      var t;
      var filename = "使用者資訊" + t;
      var jsm = new kendo.data.DataSource({
        data: xdata,
        
      });
      
      $("#grid_list").kendoGrid({
        dataSource: xdata,
        schema: {
            model: {
                id: "url"
            }
        },
        height: 660,        
        persistSelection: true,
        change: onChange,
        columns: [
          { selectable: true, width: "50px" },
          {
            field: "pageName",  title: "名稱",   
            attributes: {
              style: "text-align: center;"
            }
          },
          {
            field: "url", title: "網址", hidden:true, 
            //                          template: function(jsm) {                            
            //                            
            //                          }
          },          
        ],
        noRecords: {
          template: "<h6 class='animated flash infinite' style='color:red'>目前尚無資料</h6>"
        },                 
      });      
      var grid = $("grid_list").data("kendoGrid");
      grid.bind("grid_dataBinding", grid_dataBinding);
      grid.dataSource.fetch();
    };

    function addinfo(){
      var objDat = {};
      if($("#groupName").val() != ''){        
        var groupName = $("#groupName").val();
        var url_ = 'http://220.134.42.63:8080/WaterscadaAPI/PostWebPageGroup_addupdate';
        objDat['GROUP'] = groupName;
        objDat['WEBPAGE'] = urlString;
        var postData = postToServer(url_, objDat);
        if(postData == "OK") {
          alert("上傳成功");
        }
        else
          alert("上傳失敗，請重新上傳");
          window.opener.location.reload();
          window.close();
      } else {
        $("#groupName").css({'backgroundColor':'red'});
        alert("請輸入群組名稱後重新上傳，謝謝。")
      }
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
    
    $("#groupName").on('change', function(){      
        $(this).css({'backgroundColor':'transparent'});
    });
  </script>


</body>

</html>
