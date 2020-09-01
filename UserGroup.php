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
  <title>設定會員群組 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">
  <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet'>
  <!-- <link rel="stylesheet" href="css/kendoUI.css" type="text/css" /> -->
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css">
<!--  <link rel="stylesheet" href="css/DataReport.css">-->

  <script type='text/javascript' src='js/jquery-2.1.0.min.js'></script>
  <script type='text/javascript' src='js/gen.js'></script>
<!--  <script src="./js/DataReport.js"></script>-->

<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="./css/jquery-ui.css">


<style>

.stationInfo {
  width: 100%;
  height: 80vh; 
  margin: 0 auto;
  margin-top: 140px;
  margin-bottom: 50px;
  background-color: #fff;
  padding: 20px;
  box-shadow: 0px 1px 5px -3px rgba(0,0,0,0.65);
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
.big_box {
  height: 685px;
}
.big_box .row {
  padding: 10px;
  height: 100%;
  /* border-bottom: 1px dotted #323232; */
}
.big_box .row .v_line {
  border-right: 1px solid #e7e7e7;
}
.big_box .row .right {
  height: 100%;
  overflow: auto;
}
.big_box .area {
  overflow: hidden;
}
.big_box .btn-primary {
  
  width: 130px;
}
  #url_area .area {
    display: none;
  }
  #url_area .area.active {
    display: block;
  }
  .fa-trash.show, .fa-checkbox.show, .fa-file-text-o.show {
    display: inline;
  }
  .fa-trash, .fa-checkbox, .fa-file-text-o {
    display: none;
    top: 20%;
  }
  
  .fa-checkbox{
    position: relative !important; 
    margin-left: 20px !important;
  }
  .deteBtn.active {
    background-color: red;    
  }
  .deteBtn {
    background-color: rgba(17, 47, 93, .85);
  }
  .form-check.active button{
    background-color: #33baff !important;
    color:#073469 !important;
    border: 1px solid #073469;
  }
  .form-check button {
    background-color: #007bff;
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
        <div class="row mb-3">
          <div class="col-12" style="padding-bottom: 12px; border-bottom: 1px solid #e7e7e7;">
<!--            <button class="stat-crud-btn" onclick="window.open('UserRole.php?sta=add','_blank');"><i class="fa fa-plus-square" aria-hidden="true"></i>新增</button>-->
            <form id="add_form" method="post" target="_parent " style="float: left;">
              <input type="hidden" name = "sta" value="">
              <input type="hidden" name = "user" value="">
              <input type="hidden" name="webpage" value="">
              <button class="stat-crud-btn" onclick="closeDelstate(); adduserRole(this)"><i class="fa fa-plus-square" aria-hidden="true"></i>新增</button>
            </form>
            <button class="stat-crud-btn deteBtn" onclick="deletuserRole(this)" ><i class="fa fa-minus-square" aria-hidden="true"></i>刪除</button>
<!--            <button class="stat-crud-btn modBtn" onclick="modifyuserRole()" ><i class="fa fa-pencil-square" aria-hidden="true"></i>修改</button>-->
          </div>
        </div>
        <div class="big_box">
          <div class="row">
            <div class="col-sm-4 col-lg-3 col-xl-2 v_line">
              <div id="btn_group">
                <div class="form-check m-2">
                    <input type="checkbox" class="form-check-input fa-checkbox" id="btng_0'"><label class="form-check-label" for="btng_0"><button class="btn btn-primary" onclick="onActivebtn(this)" ></button></label>
                </div>
              </div>
            </div>
<!--            <div id="grid_group"></div>-->
            <div id="url_area" class="col-sm-8  col-lg-9 col-xl-10 right">
              <div id="url_0" class="area">
                <div style="float: left; padding: 2px; margin-bottom: 4px;">
                <a href="javascript:;">
                  <input type="checkbox" class="form-check-input fa-checkbox" id="btn_0">
                  <i class="fa fa-file-text-o m-2 show" aria-hidden="true"></i>
                </a>
                <label for="btn_0" data-url=''></label></div>
              </div>
            </div>
          </div>          
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

  </script>
  <script language="javascript">
    $(".pos_right > span").text("<?php echo $nam?>");    
    $("input[name=idn]").val("<?php echo $id?>");
    var idn = $("input[name=idn]").val();
    getDataAuthor();
    function getDataAuthor() {
      var url = "http://220.134.42.63:8080/WaterscadaAPI/GetWebPageGroup";
      var jsonData = getToServer(url);      
//      var convData = converJsonData(jsonData);
      console.log(jsonData);
      setgroup(jsonData);
    }
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
    function setgroup(xdata) {
      var btnName='', btnCont='';
      $("#btn_group div, #url_area div").remove();
      var z=0;
      debugger;
      $.each(xdata, function(k,v){          
          btnName = v["GROUP"];
          $("#btn_group").append('<div class="form-check mb-2"><input type="checkbox" class="form-check-input fa-checkbox" ><label class="form-check-label" ><button class="btn btn-primary" onclick="onActivebtn(this)" >'+btnName+'</button></label></div>'); 
          if(v.WEBPAGE == null) {
            btnCont = 0;
          } else {
            btnCont = v.WEBPAGE.split(",");   
          }
          var pagename = converUrlToPagName(btnCont);
          $("#url_area").append('<div class="area" id="url_'+k+'"><div>');
          for(var x=0; x<pagename.length; x++){            
            $("#url_"+k).append('<div style="float: left; padding: 2px; margin-bottom: 4px; "><a href="javascript:;"><input type="checkbox" disabled class="form-check-input fa-checkbox" id="btn'+k+'_'+x+'" ><i class="fa fa-file-text-o m-2 show" aria-hidden="true"></i></a><label style="cursor:pointer" for="btn'+k+'_'+x+'" data-url='+btnCont[x]+'>'+pagename[x]+'</label></div>');
          }            
      });
      $("#btn_group").children(".form-check").eq(0).addClass("active");
      $("#url_area").children(".area").eq(0).addClass("active");
    };
    function converUrlToPagName(array_){
      var pagnme = [];
      var _temp_ = array_;
      var json = getjsonfile();
      for(var x=0; x<_temp_.length; x++) {
        for(var y=0; y<json.length; y++) {          
          if(_temp_[x] == json[y]["url"]) {
            pagnme.push(json[y]["pageName"]);
          } 
        }
      }
//            console.log(pagnme);          
      return pagnme;
    };
    
    function onActivebtn(e){
      var no = $(e).closest("#btn_group").children("div").find("button").index($(e));
      if($("#btn_group").children(".form-check").eq(no).hasClass("active")){
        $("#btn_group").children(".form-check").eq(no).removeClass("active");
        $("#url_area").children(".area").eq(no).removeClass("active");
      } else {
        $("#btn_group").children(".form-check").removeClass('active');
        $("#btn_group").children(".form-check").eq(no).addClass('active');
      $("#url_area").find(".area").removeClass("active");
      $("#url_area, #btn_group").find("input[type=checkbox]").prop("checked", false);
      $("#url_area").children(".area").eq(no).addClass("active");
        
      }
    };
    
    function deleteURL(e){
      console.log("deleteURL");      
      if(confirm("確認後移除。")){
//        $(e).closest('div').remove();
        $(e).closest('div').children(".btn").removeClass("btn-primary").addClass("btn-default");
        $(".area.active").find();
      }
    }; 
    
    function deletuserRole(e) {      
      $(".deteBtn").toggleClass('active');
      $("#btn_group, #url_area").find("input[type=checkbox], .fa-file-text-o").toggleClass('show');
      $("#btn_group, #url_area").find("input[type=checkbox]").prop("disabled", false);
      if($(".deteBtn").hasClass('active')) {
        
      } else {
        var group_ = $("#btn_group").children(".form-check").find("input[type=checkbox]");
        var area_ = $("#url_area").children('.area.active').find("input[type=checkbox]");
        var url_ = "http://220.134.42.63:8080/WaterscadaAPI/PostWebPageGroup_delete";
        var obj_dat = {};
        var _temp_=[], alert_lab=[]; 
        for(var x=0; x<group_.length; x++) {
          if($(group_[x]).prop('checked')) {
            alert_lab.push($(group_[x]).parent().find("button").text());
            obj_dat['GROUP'] = $(group_[x]).parent().find("button").text();              
            _temp_.push(obj_dat);
            obj_dat = {};
          }
        }                    
        if( alert_lab.length <= 1 ){
          obj_dat = {};
          var _string_ = '', _temp1_ = [];
          url_ = "http://220.134.42.63:8080/WaterscadaAPI/PostWebPageGroup_addupdate";
          var btn = $("#btn_group").children(".active").find('button').text();            
          obj_dat["GROUP"] = btn;
          for(var x=0; x<area_.length; x++) {
            if(!$(area_[x]).prop('checked')) {
              _temp_.push($(area_[x]).closest('div').find('label').attr('data-url'));
            } else 
              _temp1_.push($(area_[x]).closest('div').find('label').text());
              
          }
          _string_ = _temp_.join(",");
          obj_dat['WEBPAGE'] =_string_;
          _temp_=[];
          _temp_.push(obj_dat);
        }
        
        if(alert_lab.length > 1){
          if(confirm("刪除以下群組名稱：\n  "+alert_lab.join(" / ")+"\n確定後將刪除。"))
          {
            postToServer(url_, _temp_); 
            window.location.reload();
          }
        } else {
          if(confirm("群組名稱："+btn+"\n移除項目："+_temp1_.join(" / ")+"\n確定後將移出該群組。")){
            postToServer(url_, _temp_); 
            window.location.reload();
          }
        }
      }
    }
    function closeDelstate() {
       if($(".deteBtn ").hasClass("active")) {
        $(".deteBtn ").removeClass("active");
        $("body").find('input[type=checkbox]').removeClass("show");
         $("body").find(".fa-file-text-o").addClass('show');
         console.log("settimeout");
      }
    };
    function adduserRole(e) {
      setTimeout(function(){closeDelstate(); }, 50);
     
      
      var _webpage_, userid;
      var group_ = $("#btn_group").children(".active").length;
      var wbpg = $("#url_area").children('.area.active').find("label");
      debugger;  
      for(var x=0; x<wbpg.length; x++) {
        _webpage_ = $(wbpg[x]).attr("data-url")+"@"+_webpage_;
      }
      console.log(_webpage_);
        if(group_ == 1){          
          //修改舊的會員資料
          userid = $("#btn_group").children(".active").find('button').text();
          $("input[name=sta]").val("rw");
          $("input[name=user]").val(userid);
          $("input[name=webpage]").val(_webpage_);
        } else {
          //新增新的會員資料
          $("input[name=sta]").val("add");
        }
        $("#add_form").submit(function(){
          var url_ = 'UserRole.php';
          $("#add_form").attr("action", url_);
        });
      
      } 
    function modifyuserRole(){
      if($(".deteBtn").hasClass("active")) { 
        $(".deteBtn").click();
      }
      $(".modBtn").toggleClass('active');
//      $("#url_area").find(".fa-file-text-o").toggleClass('show');
      $('#btn_group').find("input[type=checkbox]").toggleClass('show');
      if($(".modBtn").hasClass('active')) {
        $(".modBtn").text("更新資料").css({"backgroundColor":"red"});
      } else {
        $(".modBtn").text("").css({"backgroundColor":"rgba(17, 47, 93, .85);"});
        $(".modBtn").append('<i class="fa fa-pencil-square" aria-hidden="true"></i>修改');
      }
      
    }
    
    function converJsonData(datas) {
      var da = datas;
      var obj = {}, arr = [], GROUP='';
      for(var x=0; x<da.length; x++){
        $.each(da[x], function (k, v){
          if(k == 'GROUP')
            GROUP = v;
          else {
            if(k == 'WEBPAGE'){
              var len = v.split(",");
              console.log(len);
              for(var y=0; y<len.length; y++){
                obj['GROUP'] = GROUP;
                obj['WEBPAGE'] = len[y];
                arr.push(obj);                
                obj={};
              }
            }
          }
        });
        
      }
      return arr;
    }
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
//      x.push(obj_data);
      $.ajax({
        url: './php/pos_rawBody.php',
        type: 'POST',
        async: false,
        cache: false, //上傳文件不需要緩存
        data: {
        'url_': url_,
        'xdata': JSON.stringify(obj_data),
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
