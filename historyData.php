<?php 
$station_id =  @$_GET['stationID'];
$tagID =  @$_GET['tagID'];
if($tagID == "undefined ")
  $tagID = '';
$measure =  @$_GET['measure'];
$yesterday =  @$_GET['yesterday'];
//$status = infoWin => 資訊視窗；0
//$status = water => 即時水情
$status = @$_GET['status'];
$item = @$_GET['item'];
$itemName = @$_GET['itemName'];
?>
<!DOCTYPE html>
<html>

<head>
<meta http-equiv="X-UA-Compatible" content="chrome=1">
<!--  <base href="https://demos.telerik.com/kendo-ui/area-charts/index">-->
  <style>html { font-size: 14px; font-family: Arial, Helvetica, sans-serif; }</style>
  <title></title>
  
  <link rel="stylesheet" href="css/animate.min.css" type="text/css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.common-nova.min.css" />
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.nova.min.css" />
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.nova.mobile.min.css" />
  <script src="js/jquery-3.4.0.min.js"></script>
<!--  <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>-->
  <script src="https://kendo.cdn.telerik.com/2019.2.619/js/kendo.all.min.js"></script>


  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.common.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.rtl.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.default.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.mobile.all.min.css">
  <script src="https://kendo.cdn.telerik.com/2019.2.619/js/angular.min.js"></script>
  <script src="https://kendo.cdn.telerik.com/2019.2.619/js/jszip.min.js"></script>
  
  <style>
    
    #content {
      max-width: 800px;
      margin:auto;
      text-align: center;
      margin-top: 20px;
      height: calc(100% - 20%);
    }
    #grid .k-grid-content{
      max-height: calc(100vh - 26vh) !important;
      overflow: auto;
      background-color: #112f5d;
      color: white;
      padding-bottom: 5px;
    }
    .k-grid .k-alt {background-color: #112f5d !important;}
    .k-grid tr:hover{background-color: transparent; }
    #grid tr td:first-child {
      background-color: rgb(51, 185, 255);  
    }
    #grid .k-link{
      color: white;
    }
    #grid tbody tr {
      background: #073469 !important;
    }
    #grid tbody tr.green>td:nth-of-type(3) {
      color: rgb(0, 255, 1);
    }
    #grid tbody tr.yellow>td:nth-of-type(3) {      
      color: rgb(253, 255, 0);
    }
    #grid tbody tr.red>td:nth-of-type(3) {
      color: rgb(253, 0, 2);
    }
    #grid tbody tr.white {
      background: grey !important;
      color: rgb(255, 255, 255);
    }
   
  </style>
</head>

<body onload="showtime();">
  <input type="hidden" id="start">
  <input type="hidden" id="end">

  <div id="content"><h4>歷史資料</h4>
    <div id="grid"></div>
    <div id="spinner_" style="margin:0 auto; width: 50%;"><i  class="fa fa-spinner fa-pulse fa-4x fa-fw" style="color: #33b9ff; font-size: 70px; margin:0 auto; width: auto;"></i></div>
  </div>
  <script src="./js/moment.min.js"></script>
  <script>
      //判定FLAG顏色
      var conditionsBackgroundColorClass = {
        'N': 'green',
        '<': 'yellow',
        '>': 'yellow',
        '<<': 'red',
        '>>': 'red',
        '?': 'white'
      };

      function specificTextSup(targetString) {
        var toSupContent = ["kgf/cm2", "M3"];        
        if(toSupContent.indexOf(targetString) != -1) {
          var stringArray = targetString.split('');
          stringArray[stringArray.length - 1] = String(stringArray[stringArray.length - 1]).sup();
          var supProccessedString = stringArray.join('');
          //                        //console.log(supProccessedString);
          return supProccessedString;
        } else
          return targetString.toUpperCase();
      }
      showtime();
      function showtime() {
        var previous_day = 1;
        var currentDate = moment().format('YYYY/MM/DD HH:mm:ss');
        var previousDate = moment().subtract(previous_day, 'days').format('YYYY/MM/DD HH:mm:ss');           
        $("#start").val(previousDate);
        $("#end").val(currentDate);
      };
      
      //給於FLAG顏色
      function backgroundColorClassController(condition) {
        console.log(conditionsBackgroundColorClass);
        var conditionsKey = Object.keys(conditionsBackgroundColorClass);
        for (var E = 0; E < conditionsKey.length; E++) {
          if (conditionsKey[E] == condition) {
            return conditionsBackgroundColorClass[conditionsKey[E]];
          }
        }
      }
      var datas = [], date = [], getData = [], value = [];
      var max = [], min = [];
      var url_;
      var start = $("#start").val();
      var end = $("#end").val();
      var period = 'minute';
      var station_id = "<?php echo $station_id?>";
      var tag_id = "<?php echo $tagID?>";
      var status = "<?php echo $status?>";
      var measure = "<?php echo $measure?>";
      var yesterday = "<?php echo $yesterday?>";
      var item = "<?php echo $item?>";
      var itemName = "<?php echo $itemName?>";
      /* STA: test key -> close */
//      station_id = "長坑加壓站";
//      start = '2019/07/11 00:00';
//      end =  '2019/07/11 23:10';
//      tag_id = "GUANGFU.DA.GUANGFU.AI.PS_1_CM_CONT_NE.F_CV";
      /* END: test key*/
      var str_yesterday;
      var tempValue = [];
      if(yesterday == '1') str_yesterday = '(昨日)'; 
      else {
        str_yesterday = ''; yesterday = 0;
      }
      if(status.match('infoWin')){
        //重要場站
        if(status == 'infoWinImportant')                     
//            url_ = "http://220.134.42.63:8080/waterscadaAPI/WI_HistoryData?section=轄區供水系統&item="+item+"&station_id=" + station_id + "&tag_id=" + measure+ "&period=" + period + "&start=" + start + "&end=" + end + "&measure=*";
            url_ = "http://220.134.42.63:8080/waterscadaAPI/GetHistoryData?tag_id="+itemName+"&station_id=" + station_id + "&period=" + period + "&start=" + start + "&end=" + end + "&measure=*" + "&include_yesterday=" + yesterday + "&only_wi=1";
          else 
          //全部場站
            url_ = "http://220.134.42.63:8080/waterscadaAPI/GetHistoryData?tag_id="+tag_id+"&station_id=" + station_id + "&period=" + period + "&start=" + start + "&end=" + end + "&measure=" + measure;
        }
        else if(status == 'water')
          url_ = "http://220.134.42.63:8080/waterscadaAPI/GetHistoryData?tag_id="+tag_id+"&station_id=" + station_id + "&period=" + period + "&start=" + start + "&end=" + end + "&measure=" + measure + "&include_yesterday=" + yesterday + "&only_wi=1";
      else 
        alert("url error");
      console.log(url_);
debugger;
      $('#spinner_').css({"display":"block"});
      $.ajax({
        url: url_,
        type: "GET",
        dataType: "json",
        success: function(Jdata) {
          $.each(Jdata, function(index, d) {
              getData.push(d);
            });
            $.each(getData[0], function(index, d) {
              value.push(d);
            });
            if(value.length > 0){
              let res = [];
              for (let i = 0; i < value.length; i++ ) {
                tempValue.push(value[i]);
              }
            }
            console.log(tempValue);
            if(tempValue.length > 0) {
            var stationObject;
            $("#grid").kendoGrid({
              excel: {
                filterable: true
              },
              dataSource: {
                data:value,
                pageSize: 20,
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
              schema: {
                model: {
                  fields: {
                    DATE_TIME: {
                      type: "string"
                    },
                    DESC: {
                      type: "string"
                    },
                    MEASURE: {
                      type: "string"
                    },
                    VALUE: {
                      type: "number"
                    },
                    UNIT: {
                      type: "string"
                    }
                  }
                }
              },
  //            height: 550,
              // groupable: true,
              sortable: true,
              filterable: true,

              columns: [
                {
                field: "DATE_TIME",
                title: "日期", format: "{0:c}", width: "130px",
                filterable: false, 
                headerAttributes: { "class": "", style: "font-weight: 700;  text-align: center; color: #fff; display: block; background-color: rgb(25, 120, 213);"}, //顯示header
                template: function(value) {
                            var Dateformat = value.DATE_TIME;
                            Dateformat = Dateformat.split("-").join("/");
                            Dateformat = Dateformat.split("T").join(" ");
                            return Dateformat;
                          },
              }, {
                field: "MEASURE",
                title: "測站項目", format: "{0:c}", width: "130px",
                filterable: false,
                headerAttributes: { "class": "", style: "font-weight: 700; text-align: center; color: #fff; background-color: rgb(25, 120, 213);"}

              }, {
                field: "VALUE",
                title: "測値", format: "{0}", width: "130px",
                filterable: false,              
                headerAttributes: { "class": "valueColor", style: "font-weight: 700; text-align: center; color: #fff; background-color: rgb(25, 120, 213);"}
              }, {
                field: "UNIT",
  //              template: "#:{unit_}# ='#: UNIT #",
                title: "單位", format: "{0:c}", width: "130px",
                filterable: false,
                headerAttributes: { "class": "", style: "font-weight: 700; text-align: center; color: #fff !important; background-color: rgb(25, 120, 213);"},
                template: function(value){
                    var unit = specificTextSup(value.UNIT);
                  return unit;
                }
              }],
               dataBound: function(e){
                 var rows = e.sender.tbody.children();
                 for (var j = 0; j < rows.length; j++)
                 {
                   var row = $(rows[j]);
                   var dataItem = e.sender.dataItem(row);
                   var flag = dataItem.get("FLAG");
                   var color = backgroundColorClassController(flag);
                   row.addClass(color);
                 }
               }

            });
              $("#grid").before('<h3 style="color: rgb(142, 142, 142); font: 16px Arial, Helvetica, sans-serif; white-space: pre;">'+station_id+'<h3>');
          } else {
              $("#grid").remove();
              $("#content").append("<h3 class='animated infinite flash'  style='color: red'>尚無搜尋到相關資料</h3><h6>搜尋範圍： "+start+" ~ "+end+"</h6>");          
            $('#spinner_').css({"display":"none"});
          }
        },
        error: function (xhr) {
          $('#spinner_').css({"display":"none"});
          alert("資料擷取異常或連線錯誤，請查明後再重新操作。");
        }
      });
      
    </script>  
  
</body>

</html>
