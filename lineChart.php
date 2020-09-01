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
<!--
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.common-nova.min.css" />
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.nova.min.css" />
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.nova.mobile.min.css" />
-->
  <link rel="stylesheet" href="css/animate.min.css" type="text/css">
  
  <link rel="stylesheet" href="./css/font-awesome.css">
  <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
  <script src="js/jquery-3.4.0.min.js"></script>
  <script src="https://kendo.cdn.telerik.com/2019.2.619/js/kendo.all.min.js"></script>


<!--
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.common.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.rtl.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.default.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.619/styles/kendo.mobile.all.min.css">
  <script src="https://kendo.cdn.telerik.com/2019.2.619/js/angular.min.js"></script>
  <script src="https://kendo.cdn.telerik.com/2019.2.619/js/jszip.min.js"></script>
-->
  
  <link rel="stylesheet" href="./js/dygraphs/dygraph.css">  
  <script src="./js/dygraphs/dygraph.js"></script>
  <script src="./js/dygraphs/dygraph.min.js"></script>
  <script type="text/javascript" src="./js/dygraphs/dygraph.js"></script>
  
  <style>
    #content {
      max-width: 1200px;
      margin:auto;
      text-align: center;
      margin-top: 20px;
      height: calc(100% - 10%);      
    }
    #legend {
      font-family: "DFHei Std";
      color: #222;
      font-size: 14px;
      float: right;
      width: 20%;
      padding-left: 30px;
    }
    
  </style>
</head>

<body onload="showtime();">
 
<!--
  開始<input type="text" id="start">
  結束<input type="text" id="end">
  <input id="get" type="button" value="查詢">
-->
 <input type="hidden" id="start">
 <input type="hidden" id="end">
  <div id="content"><h4>趨勢圖</h4>
    <div class="demo-section k-content wide">      
      <div id="grid-trend"></div>
        <div id="legend"></div>
    </div>    
    <div id="spinner_" style="margin:0 auto; width: 50%;"><i  class="fa fa-spinner fa-pulse fa-4x fa-fw" style="color: #33b9ff; font-size: 70px; margin:0 auto; width: auto;"></i></div>
  </div>
  <script src="./js/moment.min.js"></script>
  <script>
    var datas = [];
      var date = [];
      var getData = [];
      var value = [];
      var MEASURE;
      var title;
    showtime();
      
      //趨勢圖圖例 for Dygraphs
      function legendFormatter(data) {
        if (data.x == null) {
          // This happens when there's no selection and {legend: 'always'} is set.
          return '<br>' + data.series.map(function(series) { return series.dashHTML + ' ' + series.labelHTML }).join('<br>');
        }

        var html = this.getLabels()[0] + ': ' + data.xHTML;
        data.series.forEach(function(series) {
          if (!series.isVisible) return;
          var labeledData = series.labelHTML + ': ' + series.yHTML;
          if (series.isHighlighted) {
            labeledData = '<b>' + labeledData + '</b>';
          }
          html += '<br>' + series.dashHTML + ' ' + labeledData;
        });
        return html;
      }
      ///趨勢圖的data處裡 for Dygraphs
      function trendyData(Array_DATA) {
        var yesterday = "<?php echo $yesterday?>";
        var labels_ = ["Date"];
        var title_ = [];
        var TAGID = [], temp = [];  
        var max=0,min=0;
              
        labels_.push(Array_DATA[0].STATION_ID+"_"+Array_DATA[0].MEASURE);
        title_.push(Array_DATA[0].STATION_ID);
        
        for (var B = 0; B < Array_DATA.length; B++) {
          var setValue;
          if(yesterday == '1')
            setValue = Array_DATA[B].VALUE_YESTERDAY;
          else
            setValue = Array_DATA[B].VALUE;
          temp.length = 0;
          TAGID.push([new Date(Array_DATA[B].DATE_TIME), [min, setValue, max]]);
        }
        console.log(TAGID);
        debugger;

        var g = new Dygraph(document.getElementById("grid-trend"), TAGID, {
//          width: width_,
          height: 480,
          errorBars: true,
          customBars: true,
          labelsDiv: document.getElementById('status'),
            labelsKMB: true,      //      title: title_,
            xlabel: '日期',
            ylabel: '監測數值',
            highlightSeriesOpts: { strokeWidth: 2 },
            labelsDiv: document.getElementById('legend'),
            legend: 'always',
            legendFormatter: legendFormatter,
            labels: labels_
        });
        g.updateOptions({
          'file': TAGID
        });
      }

//    $(document).ready(createChart);
//    $(document).bind("kendo:skinChange", createChart);

    function showtime() {
      var previous_day = 1; //前一天
      var currentDate = moment().format('YYYY/MM/DD HH:mm:ss');
      var previousDate = moment().subtract(previous_day, 'days').format('YYYY/MM/DD HH:mm:ss');           
      $("#start").val(previousDate);
      $("#end").val(currentDate);
    };
    
    (function($) {         
      $(document).ready(function() {
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
//        station_id = "長坑加壓站";
//        start = '2019/08/06 00:00';
//        end =  '2019/08/07 12:00';
        /* END: test key*/
//        status = "infoWinAllside";
        var str_yesterday;
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
          //全部場站(搜尋功能&供水系統)
            url_ = "http://220.134.42.63:8080/waterscadaAPI/GetHistoryData?tag_id="+tag_id+"&station_id=" + station_id + "&period=" + period + "&start=" + start + "&end=" + end + "&measure=" + measure + "&include_wi=1";
        }
        else if(status == 'water')
          url_ = "http://220.134.42.63:8080/waterscadaAPI/GetHistoryData?tag_id="+tag_id+"&station_id=" + station_id + "&period=" + period + "&start=" + start + "&end=" + end + "&measure=" + measure + "&include_yesterday=" + yesterday + "&only_wi=1";
        else if(status == "mainpipe")
          url_ = "http://220.134.42.63:8080/waterscadaAPI/GetHistoryData?tag_id="+tag_id+"&station_id=" + station_id + "&period=" + period + "&start=" + start + "&end=" + end + "&measure=" + measure + "&include_wi=1";
        else
          alert("url error");
        console.log(url_);
        getData.length = 0;
        value.length = 0;
        datas.length = 0;
        var tempValue = [];
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
              var MEASURE = tempValue[0].MEASURE;
              var title = tempValue[0].STATION_ID+"_"+tempValue[0].DESC;
              trendyData(tempValue);
              $('#spinner_').css({"display":"none"});
            } else {
              $("#chart").remove();
              
              $("#content").append("<h3 class='animated infinite flash' style='color: red'>"+station_id+" - "+ str_yesterday + measure +"<br><br>尚無搜尋到相關資料</h3><h6>搜尋範圍："+start+" ~ "+end+"</h6>");
              $('#spinner_').css({"display":"none"});
            }
          },
          error: function (xhr) {
            $('#spinner_').css({"display":"none"});
            alert("資料擷取異常或連線錯誤，請查明後再重新操作。");
          }
        });
        
      });
    })(jQuery);

  </script>
  

</body>

</html>
