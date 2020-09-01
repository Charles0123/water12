"use strict";
//目前使用的趨勢圖: Dygraph套件
(function () {
  function correspondedClassToggler(watchTargets, actionTargets, watchClassToggled, actionClassToggled) {
    var _loop = function _loop(E) {
      watchTargets[E].onclick = function () {
        for (var F = 0; F < actionTargets.length; F++) {
          if (actionTargets[F].classList.contains(actionClassToggled)) {
            actionTargets[F].classList.remove(actionClassToggled);
            break;
          }
        }

        for (var _F = 0; _F < watchTargets.length; _F++) {
          if (watchTargets[_F].classList.contains(watchClassToggled)) {
            watchTargets[_F].classList.remove(watchClassToggled);
            //            stringComposer(document.querySelectorAll("#selectors2"));
            break;
          }
        }

        watchTargets[E].classList.add(watchClassToggled);
        actionTargets[E].classList.add(actionClassToggled);
      };
    };

    for (var E = 0; E < watchTargets.length; E++) {
      _loop(E);
    }
  }

  var panelControllers = document.getElementsByClassName("query_header_content");
  var panels = document.getElementsByClassName("query_content");
  correspondedClassToggler(panelControllers, panels, 'query_header_content-active', 'query_content_show');

  //   function JSAJAX()
  //   {
  //     var xhttp = new XMLHttpRequest();
  //     xhttp.onreadystatechange = function()
  //     {
  //       if (this.readyState == 4 && this.status == 200)
  //       {
  //         return this.response;
  //       }
  //     };
  //   xhttp.open("GET", dataUrl, true);
  //   xhttp.send();
  // }


})();

var tempStationId = "";
var tempStationIdContainer = [];
var toSupContent = ["kgf/cm2", "M3"];

var period1 = document.querySelectorAll('input[name="period1"]');
for (var E = 0; E < period1.length; E++) {
  period1[E].onchange = function () {
    document.getElementById('period').value = this.value;
  };
}

var period1_alarm = document.querySelectorAll('input[name="period1_alarm"]');
for (var E = 0; E < period1_alarm.length; E++) {
  period1_alarm[E].onchange = function () {
    document.getElementById('period').value = this.value;
  };
}

$("#date1_1").kendoDateRangePicker({
  change: function () {
    document.getElementById('start').value = dateRecomposer(this._startInput[0].value);
    document.getElementById('end').value = dateRecomposer(this._endInput[0].value);
  }
});
$("#date1_1-trend").kendoDateRangePicker({
  change: function () {
    document.getElementById('start').value = this._startInput[0].value;
    document.getElementById('end').value = this._endInput[0].value;
  }
});
$("#date1_1_alarm").kendoDateRangePicker({
  change: function () {
    document.getElementById('start').value = this._startInput[0].value;
    document.getElementById('end').value = this._endInput[0].value;
  }
});
// $("#date1_2").kendoDateRangePicker();






//第1區塊
function AJAXforName(district) {
  document.getElementById('district').value = district;
  var urlforName = `http://220.134.42.63:8080/waterscadaAPI/getCityinfo?district=${document.getElementById('district').value}`;
  console.log(urlforName);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var dataparsed = JSON.parse(this.response)
      console.log(123);
      $("#grid-name").kendoGrid({
        dataSource: {
          data:dataparsed,
        },
        height: 215,        
        columns: [
          {
            field: "NAME",
            template: "<label><input onchange='AJAXforSTATION_ID(this);' type='radio' name='stationname' style='display: none;' value='#: ID #'></input><div class='f14px'>#: NAME #</div></label>",
            filterable: false,
            headerAttributes: {
              "class": "table-header-cell",
              style: "display: none;"
            }
            },
          ],
        // dataBound: function(e){
        //   var rows = e.sender.tbody.children();
        //   for (var j = 0; j < rows.length; j++)
        //   {
        //     var row = $(rows[j]);
        //     var dataItem = e.sender.dataItem(row);
        //     var flag = dataItem.get("FLAG");
        //     var color = backgroundColorClassController(flag)
        //     row.addClass(color);
        //   }
        // }

      });



    }
  };
  xhttp.open("GET", urlforName, true);
  xhttp.send();
}
var list_record = [];
//第3區塊
function AJAXforDESC(station_id) {
  if($("#combined_string").val() !="") {
    document.getElementById('station_id').value = station_id;
    tempStationId = station_id;
    // var urlforDESC = "http://220.134.42.63:8080/waterscadaAPI/gettaginfo?district=-2&city=1201&station_id=CB12(管網)";
    var urlforDESC = `http://220.134.42.63:8080/waterscadaAPI/gettaginfo?district=${document.getElementById('district').value}&city=${document.getElementById('city').value}&station_id=${document.getElementById('station_id').value}&measure=${document.getElementById('combined_string').value}`;
    var name = document.getElementById('cityCh').value;
    var stationId = document.getElementById('station_id').value;

    var xhttp = new XMLHttpRequest();
    console.log(urlforDESC);
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var dataparsed = JSON.parse(this.response)

        $("#grid-desc").kendoGrid({
          dataSource: dataparsed,
          height: 193,
          // groupable: true,
          // sortable: true,
          // filterable: true,
          columns: [
            {
              field: "DESC",
              //          template: `<label><input type='checkbox' name='DESC' style='display: none;' value='${name}_#: STATION_ID#_#: DESC #'></input><div class='f14px'>${name}_#: STATION_ID #_#: DESC #_#: MEASURE #</div></label>`,
              template: `<label><input type='checkbox' name='DESC' style='display: none;' value='${name}_#: STATION_ID#_#: DESC #_#: MEASURE#' placeholder='#:TAG_ID#'></input><div class='f14px'>#: STATION_ID #_#: DESC #_#: MEASURE #</div></label>`,
              filterable: false,
              headerAttributes: {
                "class": "table-header-cell",
                style: "display: none;"
              }
          },
        ],
          // dataBound: function(e){
          //   var rows = e.sender.tbody.children();
          //   for (var j = 0; j < rows.length; j++)
          //   {
          //     var row = $(rows[j]);
          //     var dataItem = e.sender.dataItem(row);
          //     var flag = dataItem.get("FLAG");
          //     var color = backgroundColorClassController(flag)
          //     row.addClass(color);
          //   }
          // }
        });
        console.log(dataparsed);

        document.getElementById('search_dese').onkeyup = function () {
          var searchValue = $('#search_dese').val();
          console.log('SEARCH');
          //Setting the filter of the Grid
          $("#grid-desc").data("kendoGrid").dataSource.filter({

            logic: "or",
            filters: [{
                field: "DESC",
                operator: "contains",
                value: searchValue
                          },

                      ]
          });
        };
      }
    };
    xhttp.open("GET", urlforDESC, true);
    xhttp.send();
  } else {
    $("#grid-desc").empty();
  }
}
//第2區塊
function AJAXforSTATION_ID(cityInput) {
  //  console.log(cityInput);
  var cityNumber = cityInput.value;
  var cityName = cityInput.nextElementSibling.textContent;
  document.getElementById('city').value = cityNumber;
  document.getElementById('cityCh').value = cityName;
  var urlforSTATION_ID = `http://220.134.42.63:8080/waterscadaAPI/getStationinfo?district=${document.getElementById('district').value}&city=${document.getElementById('city').value}`;
  // console.log(city);
  console.log(urlforSTATION_ID);

  // var urlforHistoryData = "http://220.134.42.63:8080/waterscadaAPI/gethistorydata?tag_id=WIPS.WEBSERVICE.PS_CB12_BV_OP_1&period=minute&start:2019/07/13 12:30&end:2019/07/20 12:30";
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var dataparsed = JSON.parse(this.response)


      $("#grid-stationid").kendoGrid({
        dataSource: dataparsed,
        height: 193,
        // groupable: true,
        // sortable: true,
        // filterable: true,
        columns: [
          {
            field: "STATION_ID",
            template: "<label><input onclick='AJAXforDESC(this.value)' type='radio' name='stationid' style='display: none;' value='#: STATION_ID #'></input><div class='f14px'>#: STATION_ID #</div></label>",
            filterable: false,
            headerAttributes: {
              "class": "table-header-cell",
              style: "display: none;"
            }
        },
      ],
        // dataBound: function(e){
        //   var rows = e.sender.tbody.children();
        //   for (var j = 0; j < rows.length; j++)
        //   {
        //     var row = $(rows[j]);
        //     var dataItem = e.sender.dataItem(row);
        //     var flag = dataItem.get("FLAG");
        //     var color = backgroundColorClassController(flag)
        //     row.addClass(color);
        //   }
        // }
      });
      console.log(dataparsed);
      document.getElementById('search_stationid').onkeyup = function () {
        var searchValue = $('#search_stationid').val();
        console.log('SEARCH');
        //Setting the filter of the Grid
        $("#grid-stationid").data("kendoGrid").dataSource.filter({
          logic: "or",
          filters: [
            {
              field: "STATION_ID",
              operator: "contains",
              value: searchValue
          },

        ]
        });
      };
    }
  };
  xhttp.open("GET", urlforSTATION_ID, true);
  xhttp.send();
  $("#grid-desc").empty();
}
//即時變更第3區塊內容(物理量trigger第3區塊)
function AJAXforMEASURE(station_id) {
  AJAXforDESC(station_id);
}
//即時變更第3區塊內容(前端判定條件)
$("#selectors1 div:last-child").on("change", function (e) {
  var city = $("#city").val();
  var citych = $("#citych").val();
  var station_id = $("#station_id").val();
  if (station_id != '')
    AJAXforMEASURE(station_id);
});

function AJAXforGetHistoryData() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var dataparsed = JSON.parse(this.response)

      console.log(dataparsed);
      return this.response;
    }
  };
  xhttp.open("GET", urlforHistoryData, true);
  xhttp.send();
}

var queryPhysicSelectors1 = document.querySelectorAll("#selectors1 input");
var queryPhysicSelectors2 = document.querySelectorAll("#selectors2 input");
//列表和趨勢圖-物理量
for (var E = 1; E < queryPhysicSelectors1.length; E++) {
  queryPhysicSelectors1[E].onchange = function (e) {
    stringComposer(this);
    // queryPhysicSelectorsSynchronizer(this);
  }
}
queryPhysicSelectors1[0].parentElement.onclick = function () {
  allTrueOrNot(this);
}

//警報値-物理量
for (var E = 1; E < queryPhysicSelectors2.length; E++) {
  queryPhysicSelectors2[E].onchange = function (e) {
    stringComposer2(this);
    // queryPhysicSelectorsSynchronizer(this);
  }
}
queryPhysicSelectors2[0].parentElement.onclick = function () {
  allTrueOrNot2(this);
}

/* 8/12移除 - Clement
var queryPhysicSelectors2 = document.querySelectorAll("#selectors2 input");


for (var E = 1; E < queryPhysicSelectors2.length; E++) {
  queryPhysicSelectors2[E].onchange = function (e) {
    stringComposer(this);
    // queryPhysicSelectorsSynchronizer(this);
  }
}
queryPhysicSelectors2[0].parentElement.onclick = function () {
  allTrueOrNot(this);
}*/

function stringComposer(target) {
  var inputs = target.parentElement.parentElement.getElementsByTagName('input');
  var inputsValue = [];

  for (var E = 1; E < inputs.length; E++) {
    if (inputs[E].checked == true) {
      inputsValue.push(inputs[E].value);
    }
  }
  var combined_string = inputsValue.join(',');
  console.log(inputsValue.join(','));
  document.getElementById('combined_string').value = combined_string;
}
function stringComposer2(target) {
  var inputs = target.parentElement.parentElement.getElementsByTagName('input');
  var inputsValue = [];

  for (var E = 1; E < inputs.length; E++) {
    if (inputs[E].checked == true) {
      inputsValue.push(inputs[E].value);
    }
  }
  var combined_string = inputsValue.join(',');
  console.log(inputsValue.join(','));
  document.getElementById('combined_string2').value = combined_string;
}
var objectsToQuery = [];
var objectsString = [];
var objectsToTagId = [];


//加入鈕的資料定義tag_id
//第4區塊
var gridResult ='';
function addString(targetId) {
  var district = document.getElementById('district').value;
  var city = document.getElementById('city').value;
  var station_id = document.getElementById('station_id').value;
  var tag_id;
  var grid_desc = document.getElementById("grid-desc");
  var targets = document.getElementById(targetId).getElementsByTagName('input');
  var alertCount = [];
  console.log(targets);
  
  for (var E = 0; E < targets.length; E++) {
    if (targets[E].checked == true) {
      tag_id = targets[E].placeholder;
      var obj = {
        "OBJECT": targets[E].value,
        "district": district,
        "city": city,
        "station_id": station_id,
        "tag_id": tag_id,
        // city: "<input style='display: none;' value=''></input>",
        // station_id: "<input style='display: none;' value=''></input>",
      }

      //新增tag_id當主key
      var str_ = targets[E].placeholder;
      if (objectsToTagId.indexOf(str_) == -1) {
        objectsToTagId.push(str_);
        $("#tag_id").val(objectsToTagId.join(","));
      }
/*desc*/
      console.log(objectsString.indexOf(targets[E].value));
      if (objectsString.indexOf(targets[E].value) == -1) {
        objectsToQuery.push(obj);
        objectsString.push(targets[E].value);
      } else {
//        $(targets[E]).parent().css({'color': '#656565'}).children('div').addClass("grayMark");
        $(targets[E]).parent().addClass('alertMark');
        alertCount.push(targets[E].value);
      }
    }
  }
  if(alertCount.length > 0){  
    var list = alertCount.join("\n");
    alert("資訊提醒:\n "+list +"\n\n已被加入！");
  }
  if($("#station_id_for_query").val() != '')
    tempStationIdContainer = $("#station_id_for_query").val().split(',');
    if(tempStationIdContainer.indexOf(tempStationId) == -1)
      tempStationIdContainer.push(tempStationId.trim());    
  console.log(objectsToQuery);
  
  $("#grid-result").kendoGrid({
    dataSource: {
      data: objectsToQuery, 
    },
    height: 168,    
    columns: [
      {
        field: "OBJ",
        template: "<i class='fa fa-times-circle' aria-hidden='true' onclick='del_item(this)' style='position:relative; float:left; margin-top:5px; padding: 0 10px; cursor: pointer; color: red; '></i><div class='f14px queryContent'>#: OBJECT #<input name='district' style='display: none;' value='#: district #'></input><input name='city' style='display: none;' value='#: city #'></input><input name='station_id'  style='display: none;' value='#: station_id #' placeholder='#: tag_id #'></input> <div>",
        //          template: "<div class='f14px queryContent'>#: OBJECT #<input name='district' style='display: none;' value='#: district #'></input><input name='city' style='display: none;' value='#: city #'></input><input name='station_id' style='display: none;' value='#: station_id #'></input> <div>",
        filterable: false,
        headerAttributes: {
          "class": "table-header-cell",
          style: "display: none;"
        }
        },
      ],
    // dataBound: function(e){
    //   var rows = e.sender.tbody.children();
    //   for (var j = 0; j < rows.length; j++)
    //   {
    //     var row = $(rows[j]);
    //     var dataItem = e.sender.dataItem(row);
    //     var flag = dataItem.get("FLAG");
    //     var color = backgroundColorClassController(flag)
    //     row.addClass(color);
    //   }
    // }

  });
  gridResult = $("#grid-result").data("kendoGrid");
  document.getElementById('desc').value = objectsString.join(',');
  document.getElementById('station_id_for_query').value = tempStationIdContainer.join(',');

  document.getElementById('search_result').onkeyup = function () {
    var searchValue = $('#search_result').val();
    $("#grid-result").data("kendoGrid").dataSource.filter({
      logic: "or",
      filters: [
        {
          field: "OBJECT",
          operator: "contains",
          value: searchValue
        },
      ]
    });
  }
  $(grid_desc).find("tbody").find("input").prop("checked", false);
  
}
//清除第4區塊按鈕
function clearQueryCondition() {
  objectsToQuery = [];
  objectsString = [];
  objectsToTagId = [];
  tempStationIdContainer = [];
  $("#grid-result").kendoGrid({
    dataSource: {
      data: objectsToQuery, 
    },
    height: 168,
    // groupable: true,
    // sortable: true,
    // filterable: true,
    columns: [
      {
        field: "OBJ",
        template: "<div>#: OBJECT #<div>",
        filterable: false,
        headerAttributes: {
          "class": "table-header-cell",
          style: "display: none;"
        }
        },
      ],
    // dataBound: function(e){
    //   var rows = e.sender.tbody.children();
    //   for (var j = 0; j < rows.length; j++)
    //   {
    //     var row = $(rows[j]);
    //     var dataItem = e.sender.dataItem(row);
    //     var flag = dataItem.get("FLAG");
    //     var color = backgroundColorClassController(flag)
    //     row.addClass(color);
    //   }
    // }

  });
  document.getElementById('tag_id').value = objectsToTagId.join(',');
  document.getElementById('desc').value = objectsString.join(',');
  document.getElementById('station_id_for_query').value = tempStationIdContainer.join(',');
  gridResult.dataSource.options.data = '';
  if($("#grid-desc label.alertMark").length > 0){
    $("#grid-desc label").removeClass("alertMark");    
  }
//  if($('#grid-desc').find('.alertMark').length != -1)
//    $('#grid-desc').find('label').removeClass('alertMark');
  
}
//物理量區塊
function allTrueOrNot(target) {
  var targets = target.parentElement.getElementsByTagName('input');
  var inputsValue = [];
  console.log(target);
  if (target.getElementsByTagName('input')[0].checked == true) {
    for (var E = 0; E < targets.length; E++) {
      targets[E].checked = false;
    }
    document.getElementById('combined_string').value = "";
  } else {
    console.log('all');
    for (var E = 0; E < targets.length; E++) {
      targets[E].checked = true;
      if (E == 0) {
        continue;
      }
      inputsValue.push(targets[E].value);
    }
    var combined_string = inputsValue.join(',');
    document.getElementById('combined_string').value = combined_string;
  }
}
function allTrueOrNot2(target) {
  var targets = target.parentElement.getElementsByTagName('input');
  var inputsValue = [];
  console.log(target);
  if (target.getElementsByTagName('input')[0].checked == true) {
    for (var E = 0; E < targets.length; E++) {
      targets[E].checked = false;
    }
    document.getElementById('combined_string2').value = "";
  } else {
    console.log('all');
    for (var E = 0; E < targets.length; E++) {
      targets[E].checked = true;
      if (E == 0) {
        continue;
      }
      inputsValue.push(targets[E].value);
    }
    var combined_string = inputsValue.join(',');
    document.getElementById('combined_string2').value = combined_string;
  }
}


function JSAJAX() {}
var dataforkendo = [];
var dataforDygraphs = [];
var datatoshow = {}
var datatoshowTrend = {};
var categoriesToShowTrend = [];
var test;
var test1;
var test2;
var specificTextSup;
var test3 = [];

function JSAJAX() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      return this.response;
    }
  };
  xhttp.open("GET", dataUrl, true);
  xhttp.send();
}

var testheader = [];
//搜尋文字功能
function searchString(string, keyWord) {
  return string.search(keyWord) != -1 ? true : false;
}
//單位格式判斷
function textSupFilter(targetText) {
  for (var E = 0; E < toSupContent.length; E++) {
    if (targetText == toSupContent[E]) {
      return true;
    }
  }

  return false;
}
//單位格式置換
var supProccessedString;

function specificTextSup(targetString, kendoornot) {
  var stringArray = targetString.split('')
  stringArray[stringArray.length - 1] = String(stringArray[stringArray.length - 1]).sup();
  if (kendoornot) {

  } else {
    stringArray.push(':');
  }
  var supProccessedString = stringArray.join('');
  console.log(supProccessedString);
  return supProccessedString;
}
//顯示列表的資料查詢結果

function dataQuery() {
  dataforkendo = [];
  dataforDygraphs = [];
  var queryContents = document.getElementsByClassName("queryContent");
  var period = document.getElementById('period').value;
  var measures = document.getElementById('combined_string').value;
  var start = document.getElementById('start').value;
  var end = document.getElementById('end').value;
  var count = 0;
  var _alertInfo_ = [];
  $('#spinner_').css({"display":"block"});
  if( queryContents.length <= 0 ) {
    $('#spinner_').css({"display":"none"});
    alert("請選擇預查詢的測站項目。");
    $("#grid").empty();
    return ;
  }
  for (var E = 0; E < queryContents.length; E++) {
    var district = queryContents[E].children[0].value;
    var city = queryContents[E].children[1].value;
    var station_id = queryContents[E].children[2].value;
    var tag_id = queryContents[E].children[2].placeholder;
    console.log(district);
    console.log(city);
    console.log(station_id);
    console.log(tag_id);
    var dataQueryUrl = "";
    /* STA: test key -> close */
//    start = '2019/08/11 00:00';
//    end = '2019/08/11 12:00';
    /* END: test key*/
    $("#grid, #grid-trend").remove();
    $(".query_content").append('<div id="grid"></div><div id="grid-trend"></div>');
    categoriesToShowTrend.length = 0;

    /* clear object content */
    //    for(var key in datatoshow){ delete datatoshow[key];    }

    if (document.getElementById('period').value != 'now') {
      //歷史資料
      //      dataQueryUrl = `http://220.134.42.63:8080/waterscadaAPI/GetHistoryData?district=${district}&city=${city}&station_id=${station_id}&measure=${measures}&period=${period}&start=${start}&end=${end}`;
      dataQueryUrl = `http://220.134.42.63:8080/waterscadaAPI/GetHistoryData?district=${district}&city=${city}&station_id=${station_id}&tag_id=${tag_id}&measure=${measures}&period=${period}&start=${start}&end=${end}&include_yesterday=1`;
      console.log(dataQueryUrl);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
//          $('#spinner_').css({"display":"block"});
          count += 1;
          var data = JSON.parse(this.response);
          dataforDygraphs.push(data);
          console.log(dataforDygraphs);
          if (data['DATA'].length) {            
            $('#spinner_').css({"display":"none"});
            for (var F = 0; F < data['DATA'].length; F++) {
              // dataforkendo = dataforkendo.concat(data['DATA']);
              console.log("----get query data----");
              dataforkendo.push(data['DATA'][F]);
            }
            console.log(dataforkendo);
          } 
          else {
            _alertInfo_.push(station_id +"-"+ tag_id);
//            alert("尚無搜尋到  [" + station_id +"-"+ tag_id +"]  相關資料。\n\n 搜尋範圍:\n" + start + " ~ " + end);
            $('#spinner_').css({"display":"none"});
          }            
          if (count == queryContents.length) {
              var proccessedData = dataforkendo.map(function (content) {
              var obj = {};
              var desc_1 = content["DESC"].split('(').join('');
              var desc_2 = desc_1.split(')').join('');                
              var station_id_proccessed_1 = content["STATION_ID"].split('(').join('');
              var station_id_proccessed_2 = station_id_proccessed_1.split(')').join('');
              var station_id_proccessed_3 = "kendo" + station_id_proccessed_2.split('-').join('');
              //判斷昨日測値的"昨日"字串
              if (searchString(desc_2, /昨日/)) {
                //                  console.log("----get query of yesterday----");
                if (!Number(content["VALUE_YESTERDAY"]))
                  content["VALUE_YESTERDAY"] = 0;
                obj[station_id_proccessed_3 + desc_2] = content["VALUE_YESTERDAY"];
              } else {
                //                  console.log("----get query of today----");
                if(typeof(content["VALUE"]) == "number")
                  obj[station_id_proccessed_3 + desc_2] = parseFloat(content["VALUE"]).toFixed(2);
                else
                  obj[station_id_proccessed_3 + desc_2] = content["VALUE"];
              }
    //                console.log(content["VALUE"]);

              obj["DATE_TIME"] = timeFormat(content["DATE_TIME"]);

    //                console.log(obj["DATE_TIME"]);
              // obj[] = ;                
              obj[content["STATION_ID"] + desc_2 + " " +  content["UNIT"]] = station_id_proccessed_3 + "toshow" ;
              console.log(obj);
              return obj;
            })
            var kendoTitles = proccessedData.reduce(function (box, content) {
              var key = Object.keys(content)[0];
              var keytoshow = Object.keys(content)[2];
              var obj = {}
              obj[key] = keytoshow;
              console.log(obj[key]);
              box.push(obj);
              return box;
            }, []);
            var kendoTitlesProccessed = kendoTitles.reduce(function (box, content) {
              var keys = box.map(function (content_1) {

                return Object.keys(content_1)[0];
              });
              console.log(keys);
              if (keys.indexOf(Object.keys(content)[0]) == -1) {
                box.push(content);
                return box;
              }
              return box;
            }, [])

            test = proccessedData;
            test1 = kendoTitles;
            test2 = kendoTitlesProccessed;
            // test3 =  kendoTitlesProccessed;
            //趨勢圖資料處理
            //debugger;
            trendyData(dataforDygraphs);
            datatoshow = datatoshowProccessor(kendoTitlesProccessed, proccessedData);
            //              console.log(datatoshow);
            var datetime = {
              field: 'DATE_TIME',
              title: '時間日期',
              filterable: false,
              headerAttributes: {
                "class": "table-header-cell",
                style: "width:200px; background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              attributes: {
                "class": "table-cell",
                style: "width:200px; background-color: rgb(51, 185, 255); color: white; text-align: center; font-size: 12px;"
              }
            }
            var columnstemplate = kendoTitlesProccessed.reduce(function (box, content, index) {
              var titletoshow = content[Object.keys(content)];
              var title = Object.keys(content)[0];
              console.log(title);
              var obj = {
                //field排除空白鍵的問題
                field: '["' + title + '"]',
                title: titletoshow,
                // title: "123",
                filterable: false,
                headerAttributes: {
                  "class": "table-header-cell",
                  style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                },
                attributes: {
                  "class": "table-cell",
                  style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                }
              }
              if (index == 0) {
                box.push(datetime);
              }
              box.push(obj);
              console.log(box);
              return box;
            }, [])
            test3 = columnstemplate;
            console.log(columnstemplate);
            if(datatoshow.length <= 0) {
              if(_alertInfo_.length > 0){
                var temp_ = _alertInfo_.join("\n");
                alert("尚無搜尋到: \n" + temp_ +"\n\n  等相關資料。\n\n 搜尋範圍:\n" + start + " ~ " + end); 
              }
              return
            }; 
            $("#grid").kendoGrid({
              excel: {
                filterable: true
              },
              dataSource: {
                data: datatoshow, 
                pageSize:10
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
              height: 550,
              columns: columnstemplate,
              groupable: true,
              sortable: true,
               dataBound: function(e){
                 var rows = e.sender.tbody.children('tr').find('td:not(:first)');
                 for (var j = 0; j < rows.length; j++)
                 {
                   var row = $(rows[j]);
                   var dataItem = e.sender.dataItem(row);
                   var flag = dataItem.get("DATE_TIME");
//                   var color = backgroundColorClassController(flag);
                   row.addClass("color123_"+flag);
                 }
               }
            }); //kendogrid
          }
        }
        _alertInfo_.join("\n");
      };
      xhttp.open("GET", dataQueryUrl, true);
      xhttp.send();      
    } else 
    {
      //即時資料
      dataQueryUrl = `http://220.134.42.63:8080/waterscadaAPI/GetRealtimeData?district=${district}&city=${city}&station_id=${station_id}&tag_id=${tag_id}&measure=${measures}`;
      console.log(dataQueryUrl);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          count += 1;
          var data = JSON.parse(this.response);
          console.log(data);
          // dataforkendo = dataforkendo.concat(data['DATA']);
          for (var F = 0; F < data.length; F++) {
            // if(!data['DATA'][F]['DESC'].includes('昨日'))
            // {
            dataforkendo.push(data[F]);
            // }
          }
          if (data[0] != '') {
            var timeFormat_;
            var date_, unit_;
            date_ = data[0].DATE_TIME;
            console.log(date_);
            $('.errorCode').remove();
            if (count == queryContents.length) {
              $("#grid").kendoGrid({
                excel: {
                  filterable: true
                },
                dataSource: {
                  data: dataforkendo, 
                  pageSize:20
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
                height: 550,
                groupable: true,
                sortable: true,                
                columns: [
                  {
                    field: timeFormat_,
                    title: "日期時間",
                    filterable: false,
                    headerAttributes: {
                      "class": "table-header-cell",
                      style: "font-size: 14px; text-align: center; background-color: #868794; color: white;"
                    },
                    template: timeFormat_ = timeFormat(date_),
                    //                    template: '<span><img src="/img/#: id #.png" alt="#: name #" />#: name #</span>',
                    attributes: {
                      "class": "table-cell",
                      style: "font-size: 12px; background-color: rgb(51, 185, 255); color: white; text-align: center;"
                      // style: "font-size: 14px; background-color: #33b9ff;"
                    }
                    // attributes: {
                    //   "class": "table-cell",
                    // }
                    // hidden: true,
                    // media: "(min-width: 768px)"
                },
                  {
                    field: "STATION_ID",
                    title: "測站項目",
                    filterable: false,
                    headerAttributes: {
                      "class": "table-header-cell",
                      style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                    },
                    attributes: {
                      "class": "table-cell",
                      style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                    }
                    // hidden: true,
                    // media: "(min-width: 768px)"
              },
                  {
                    field: "MEASURE",
                    title: "物理量",
                    filterable: false,
                    headerAttributes: {
                      "class": "table-header-cell",
                      style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                    },
                    attributes: {
                      "class": "table-cell",
                      style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                    }
                    //       attributes: {
                    //   "class": "table-cell",
                    //   style: "font-size: 14px; background-color: #073469;"
                    // }
                    // hidden: true,
                    // media: "(min-width: 768px)"
              },
//                  {
//                    field: "DEVICE",
//                    title: "設備",
//                    headerAttributes: {
//                      "class": "table-header-cell",
//                      style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
//                    },
//                    attributes: {
//                      "class": "table-cell",
//                      style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
//                    }
//                    //       attributes: {
//                    //   "class": "table-cell",
//                    //   style: "font-size: 14px; background-color: #073469;"
//                    // }
//                    // filterable: {multi: true},
//                    // hidden: true,
//                    // media: "(min-width: 768px)"
//              },
//              {
//                  field: "VALUE_YESTERDAY",
//                  title: "昨日測値",
//                  filterable: false,
//                  template: "#= (VALUE == null) ? '尚無資料' : VALUE #",
//                  headerAttributes: {
//                    "class": "table-header-cell",
//                    style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
//                  },
//                  attributes: {
//                    "class": "table-cell",
//                    style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
//                  }
//                  //       attributes: {
//                  //   "class": "table-cell",
//                  //   style: "font-size: 14px; background-color: #073469;"
//                  // }
//                  // hidden: true,
//                  // media: "(min-width: 768px)"
//              }, 
                  {
                    field: "VALUE",
                    title: "今日測値",
                    filterable: false,
                    headerAttributes: {
                      "class": "table-header-cell",
                      style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                    },
                    template: {
                      
                    },
                    attributes: {
                      "class": "table-cell",
                      style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                    }
                    //       attributes: {
                    //   "class": "table-cell",
                    //   style: "font-size: 14px; background-color: #073469;"
                    // }
                    // hidden: true,
                    // media: "(min-width: 768px)"
              },

                  {
                    field: "UNIT",
                    title: "單位",
                    filterable: false,
                    headerAttributes: {
                      "class": "table-header-cell",
                      style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                    },
                    template: function (dataforkendo) {
                      if (textSupFilter(dataforkendo.UNIT)) {
                        var stringArray = dataforkendo.UNIT.split('');
                        stringArray[stringArray.length - 1] = String(stringArray[stringArray.length - 1]).sup();
                        var supProccessedString = stringArray.join('');
                        console.log(supProccessedString);
                        return supProccessedString;
                      } else
                        return dataforkendo.UNIT.toUpperCase();
                    },


                    attributes: {
                      "class": "table-cell",
                      style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                    }
                    //       attributes: {
                    //   "class": "table-cell",
                    //   style: "font-size: 14px; background-color: #073469;"
                    // }
                    // hidden: true,
                    // media: "(min-width: 768px)"
              },
              // {
              //   field: "FLAG",
              //   title: "FLAG",
              //   filterable: false,
              //   headerAttributes: {
              //     "class": "table-header-cell",
              //     style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              //   },
              //   attributes: {
              //     "class": "table-cell",
              //     style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              //   } 
              //     //       attributes: {
              //     //   "class": "table-cell",
              //     //   style: "font-size: 14px; background-color: #073469;"
              //     // }
              // }
              // {
                // title: "Items",
                // template: "123",
                // template: "<strong>Contact Name</strong><p class=\"col-template-val\">#=data.DATE_TIME#</p><strong>Contact Title</strong><p class=\"col-template-val\">#=data.ITEM_NAME#</p><strong>Company Name</strong><p class=\"col-template-val\">#=data.MEASURE#</p><strong>Country</strong><p class=\"col-template-val\">#=data.VALUE#</p>",
                // hidden: true,
                // template: kendo.template($("#responsive-column-template").html()),
                // media: "(max-width: 767px)"
              // }
              // }
              // {
              //   field: "FLAG",
              //   title: "FLAG",
              //   filterable: false
              // }
            ],
                dataBound: function (e) {
                  var rows = e.sender.tbody.children();
                  for (var j = 0; j < rows.length; j++) {
                    var row = $(rows[j]);
                    var dataItem = e.sender.dataItem(row);
                    var flag = dataItem.get("FLAG");
                    var color = backgroundColorClassController(flag)
                    row.addClass(color);
                  }
                }
              })

            }
          } else {
            _alertInfo_.push(station_id +"-"+ tag_id);
            console.log(_alertInfo_);
          }
          $('#spinner_').css({"display":"none"});
        }
        

      };
      xhttp.open("GET", dataQueryUrl, true);
      xhttp.send();
    }
  }
  
  if(_alertInfo_.length > 0){
    var temp_ = _alertInfo_.join("\n");
    alert("尚無搜尋到: \n" + temp_ +"\n\n  等相關資料。\n\n 搜尋範圍:\n" + start + " ~ " + end); 
  }
}

//判定FLAG顏色
var conditionsBackgroundColorClass = {
  'N': 'green',
  '<': 'yellow',
  '>': 'yellow',
  '<<': 'red',
  '>>': 'red',
  '?': 'white'
}
//給予FLAG顏色
function backgroundColorClassController(condition) {
  console.log(conditionsBackgroundColorClass);
  var conditionsKey = Object.keys(conditionsBackgroundColorClass);

  for (var E = 0; E < conditionsKey.length; E++) {
    if (conditionsKey[E] == condition) {
      return conditionsBackgroundColorClass[conditionsKey[E]];
    }
  }
}

function dateRecomposer(date) {
  var dateArray = date.split('/');
  console.log(dateArray);
  var newDateArray = [dateArray[2], dateArray[0], dateArray[1]];
  console.log(newDateArray);
  var reComposeDate = newDateArray.join('/');
  console.log(reComposeDate);
  return reComposeDate;
}


function datatoshowProccessor(titles, data) {
  datatoshow = {};
  var names = titles.map(function (content) {
    return Object.keys(content)[0];
  });
  
  var firstStationData = data.filter(function (content) {
    if (Object.keys(titles[0]) == Object.keys(content)[0]) {
      return content;
    }
  });
  console.log(firstStationData);
  for (var E = 1; E < titles.length; E++) {
    var stationData = data.filter(function (content) {
      if (Object.keys(titles[E]) == Object.keys(content)[0]) {
        return content;
      }
    });
    console.log(stationData);
    for (var F = 0; F < stationData.length; F++) {
      console.log(firstStationData[F]);
      if (firstStationData[F]) {
        Object.assign(firstStationData[F], stationData[F]);
      }
    }
    console.log(firstStationData);
  }
  datatoshow = firstStationData;
  return datatoshow;
}



document.getElementById('dataQuery').onclick = function (e) {
  e.stopPropagation();
  dataQuery();
};



var systemtime = document.querySelectorAll('input[name="data1"]');


var customTimeController1 = document.getElementById('date1_1').getElementsByTagName('input')[0]
var customTimeController2 = document.getElementById('date1_1').getElementsByTagName('input')[1]



for (var E = 0; E < systemtime.length; E++) {
  systemtime[E].onchange = function () {
    console.log(this.value);
    systemTimeControll(this.value);
  }
}

function systemTimeControll(period) {
  console.log(period);
  var dateNowOrigin = moment().format('l');
  console.log(dateNowOrigin);
//  var dateNow = dateRecomposer(dateNowOrigin)
  var dateNow = moment().format('YYYY/MM/DD HH:mm:ss');
  var dateTraceBackOrigin = moment().subtract(period, 'days').format('l')
  console.log(dateTraceBackOrigin)
  var dateTraceBack = dateRecomposer(dateTraceBackOrigin);
  document.getElementById('start').value = dateTraceBack;
  document.getElementById('end').value = dateNow ;
}
//顯示趨勢圖資料結果
function createChart(seriesForChart, categoriesfortrend, xstep_) {
  if (xstep_ <= 1)
    xstep_ = 1;
  $("#grid-trend").kendoChart({
    chartArea: {
      width: 1200,
      height: 600
    },
    title: {
      text: "趨勢圖"
    },
    legend: {
      position: "bottom"
    },
    seriesDefaults: {
      type: "line",
      area: {
        line: {
          style: "smooth"
        }
      }
    },
    series: seriesForChart,
    valueAxis: {
      labels: {
        format: "{0}"
      },
      line: {
        visible: false
      },
      axisCrossingValue: -10
    },
    categoryAxis: {
      // categories: [2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011],
      categories: categoriesfortrend,
      majorGridLines: {
        visible: false
      },
      labels: {
        rotation: "-45",
        step: xstep_,
      }
    },
    tooltip: {
      visible: true,
      format: "{0}%",
      template: "#= series.name #: #= value #"
    }
  });
}




///趨勢圖的data處裡 for KendoUI
function datatoshowTrendProccessor(title, datatoshow) {
  var seriesForChart = [];
  for (var E = 0; E < title.length; E++) {
    var obj = {
      name: title[E][Object.keys(title[E])[0]],
      data: []
    }
    datatoshow.map(function (content) {
      obj['data'].push(content[Object.keys(title[E])[0]])
    })
    seriesForChart.push(obj);
  }
  console.log(seriesForChart);
  return seriesForChart;
}
var timeFormat_;
//趨勢圖的x軸時間處裡
function categoriesToShowTrendProccessor(data) {
  var categories = data.map(function (content) {
    //  console.log(categories);
    var temp;
    var time = content["DATE_TIME"];
    console.log(time);
    timeFormat_ = timeFormat(time);
    categoriesToShowTrend.push(timeFormat_);
  });
  return categoriesToShowTrend;
}
//時間處裡 2019-08-15T11:24 transform to 2019/08/15 11:24
function timeFormat(times) {
  if (times) {
        var tempString = times.split('-').join('/');
        var newTime = tempString.split('T').join(' ');
        return newTime;
    }
}
//警報値
function dataQueryAlarm() {
  var measures = document.getElementById('combined_string2').value;
  var start = document.getElementById('start').value;
  var end = document.getElementById('end').value;
  var dataQueryUrl = "";
  /* STA: test key -> close */
//  start= "2019/08/11 00:00:00";
//  end="2019/08/11 00:01:00";
  /* END: */
  $('#spinner_').css({"display":"block"});
  $('.alarmInfo').remove();
  if (document.getElementById('period').value == 'history') {
    dataQueryUrl = `http://220.134.42.63:8080/waterscadaAPI/GetAlarmData?measure=${measures}&start=${start}&end=${end}`;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(this.response)
        console.log(data);
        
        $('#spinner_').css({"display":"none"});
        if(data !=''){
        $("#grid-alarm").kendoGrid({
          excel: {
            filterable: true
          },
          dataSource: {data: data, pageSize: 20},
          height: 550,
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
          groupable: true,
          sortable: true,
          columns: [
            {
              field: "DATE_TIME",
              title: "日期時間",
              headerAttributes: {
                "class": "table-header-cell",
                style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              template: function(data){
                var timeString = data.DATE_TIME.split('-').join('/');
                var newTime = timeString.split('T').join(' ');
                return newTime;
              },
              attributes: {
                "class": "table-cell",
                style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              }
          },
            {
              field: "STATION_ID",
              title: "測站名稱",
              headerAttributes: {
                "class": "table-header-cell",
                style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              attributes: {
                "class": "table-cell",
                style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              }
          },
            {
              field: "DEVICE",
              title: "測站項目",
              headerAttributes: {
                "class": "table-header-cell",
                style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              attributes: {
                "class": "table-cell",
                style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              }
          },
            {
              field: "VALUE",
              title: "測值",
              template: "#= (VALUE == null) ? '尚無資料' : VALUE #",
              headerAttributes: {
                "class": "table-header-cell",
                style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              attributes: {
                "class": "table-cell",
                style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              }
          },
          // {
          //   field: "VALUE",
          //   title: "警報訊息",
          //   headerAttributes: {
          //     "class": "table-header-cell",
          //     style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
          //   },
          //   attributes: {
          //     "class": "table-cell",
          //     style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
          //   }
          // },
            {
              field: "HH_ALARM",
              title: "高高警報",
              headerAttributes: {
                "class": "table-header-cell",
                style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              attributes: {
                "class": "table-cell",
                style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              }
          },
            {
              field: "H_ALARM",
              title: "高警報值",
              headerAttributes: {
                "class": "table-header-cell",
                style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              attributes: {
                "class": "table-cell",
                style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              }
          },
            {
              field: "LL_ALARM",
              title: "低低警報值",
              headerAttributes: {
                "class": "table-header-cell",
                style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              attributes: {
                "class": "table-cell",
                style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              }
          },
            {
              field: "L_ALARM",
              title: "低警報值",
              headerAttributes: {
                "class": "table-header-cell",
                style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              attributes: {
                "class": "table-cell",
                style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              }
          },
        ],
          dataBound: function (e) {
            var rows = e.sender.tbody.children();
            for (var j = 0; j < rows.length; j++) {
              var row = $(rows[j]);
              var dataItem = e.sender.dataItem(row);
              var flag = dataItem.get("FLAG");
              var color = backgroundColorClassController(flag)

              row.addClass(color);
            }
          }
        });
          $('#spinner_').css({"display":"none"});
        } else {
          $("#grid-alarm").append('<div class="animated infinite flash alarmInfo" style="color: red; margin:10px;">尚無搜尋到資料，請重新查詢。謝謝</div>');
          $('#spinner_').css({"display":"none"});
        }
        
      }
    };
    xhttp.open("GET", dataQueryUrl, true);
    xhttp.send();
  } else {
    $('#spinner_').css({"display":"block"});    
    dataQueryUrl = `http://220.134.42.63:8080/waterscadaAPI/GetRealtimeAlarmData?measure=${measures}`;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      var timeFormat_;
      if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(this.response);
        console.log(data);
        if(data !=''){          
        $("#grid-alarm").kendoGrid({
          excel: {
            filterable: true
          },
          height: 350,
          groupable: true,
          sortable: true,
          dataSource: {
            data: data, 
            pageSize: 10
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
          columns: [
            {
              field: timeFormat_,
              title: "日期時間",
              template: function(data){
                var timeString = data.DATE_TIME.split('-').join('/');
                var newTime = timeString.split('T').join(' ');
                return newTime;
              },
              headerAttributes: {
                "class": "table-header-cell",
                style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              attributes: {
                "class": "table-cell",
                style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              }
          },
            {
              field: "STATION_ID",
              title: "測站名稱",
              headerAttributes: {
                "class": "table-header-cell",
                style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              attributes: {
                "class": "table-cell",
                style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              }
          },
            {
              field: "DEVICE",
              title: "測站項目",
              headerAttributes: {
                "class": "table-header-cell",
                style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              attributes: {
                "class": "table-cell",
                style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              }
          },
            {
              field: "VALUE",
              title: "測值",
              template: "#= (VALUE == null) ? '尚無資料' : VALUE #",
              headerAttributes: {
                "class": "table-header-cell",
                style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              attributes: {
                "class": "table-cell",
                style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              }
          },
          // {
          //   field: "VALUE",
          //   title: "警報訊息",
          //   headerAttributes: {
          //     "class": "table-header-cell",
          //     style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
          //   },
          //   attributes: {
          //     "class": "table-cell",
          //     style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
          //   }
          // },
            {
              field: "HH_ALARM",
              title: "高高警報",
              headerAttributes: {
                "class": "table-header-cell",
                style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              attributes: {
                "class": "table-cell",
                style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              }
          },
            {
              field: "H_ALARM",
              title: "高警報值",
              headerAttributes: {
                "class": "table-header-cell",
                style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              attributes: {
                "class": "table-cell",
                style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              }
          },
            {
              field: "LL_ALARM",
              title: "低低警報值",
              headerAttributes: {
                "class": "table-header-cell",
                style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              attributes: {
                "class": "table-cell",
                style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              }
          },
            {
              field: "L_ALARM",
              title: "低警報值",
              headerAttributes: {
                "class": "table-header-cell",
                style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
              },
              attributes: {
                "class": "table-cell",
                style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
              }
          },
        ],
          dataBound: function (e) {
            var rows = e.sender.tbody.children();
            for (var j = 0; j < rows.length; j++) {
              var row = $(rows[j]);
              var dataItem = e.sender.dataItem(row);
              var flag = dataItem.get("FLAG");
              var color = backgroundColorClassController(flag)

              row.addClass(color);
            }
          }
        });
          $('#spinner_').css({"display":"none"});
        } else {
          $('#spinner_').css({"display":"none"});
          $("#grid-alarm").append('<div class="animated infinite flash alarmInfo" style="color: red; margin:10px;">尚無搜尋到資料，請重新查詢。謝謝</div>');          
        }
      }
    };
    xhttp.open("GET", dataQueryUrl, true);
    xhttp.send();
  }

  console.log(dataQueryUrl);
}
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
  var hasData = false;
  var labels_ = ["Date"];
  var title_ = [];
  var TAGID = [], temp = [];  
  var max=0,min=0;
  var width_ = $(".query_content").width();
//  var lab = $("#legend").width();
  width_ = width_ - 20;
  console.log(Array_DATA);
  //移動Array內容至特定位子
  Array.prototype.move = function(from,to){
    this.splice(to,0,this.splice(from,1)[0]);
    return this;
  };
  /*以下實作案例
    var arr = [ 'a', 'b', 'c', 'd', 'e'];
    arr.move(3,1);  //["a", "d", "b", "c", "e"]
  */
  /*取得所有Array的key值方法
    var denseKeys = [...Array_DATA.keys()];
  */
  var maxleng = [], maxArraysize='';
  for(var x=0; x<Array_DATA.length; x++) {
    if( Array_DATA[x]["DATA"].length <= 0 ) { Array_DATA.splice(x, 1); } //移除空[DATA]
    maxleng.push(Array_DATA[x].DATA.length);
  }
  maxArraysize = Math.max.apply(null, maxleng);
  var newX = maxleng.indexOf(maxArraysize);  //解決array資料長度問題for wave chart
  for (var b = 0; b < 1; b++) {
    if(Array_DATA[b].DATA.length > 0) {
      hasData = true;
  //    min = Array_DATA[0]['MIN'][0].VALUE;
  //    max = Array_DATA[0]['MAX'][0].VALUE;
      labels_.push(Array_DATA[0]['DATA'][b].STATION_ID+"_"+Array_DATA[0]['DATA'][b].MEASURE);
      title_.push(Array_DATA[0]['DATA'][b].STATION_ID);
  //    for (var x = 0; x < Array_DATA[0]['DATA'].length; x++) {
      for (var x = 0; x < maxArraysize; x++) {
        var value_  = 0;
        if(x < Array_DATA[0]['DATA'].length) {value_ = Array_DATA[0]['DATA'][x].VALUE;}
        temp.push([min, value_, max]);
  //      TAGID.push([new Date(Array_DATA[0]['DATA'][x].DATE_TIME), temp[x]]);
        TAGID.push([new Date(Array_DATA[newX]['DATA'][x].DATE_TIME), temp[x]]);
      }
    }
  }
  for (var b = 1; b < Array_DATA.length; b++) {
    if(Array_DATA[b].DATA.length > 0) {
      hasData = true;
  //    min = Array_DATA[b]['MIN'][0].VALUE;
  //    max = Array_DATA[b]['MAX'][0].VALUE;    
      labels_.push(Array_DATA[b]['DATA'][b].STATION_ID+"_"+Array_DATA[b]['DATA'][b].MEASURE);
      title_.push(Array_DATA[b]['DATA'][b].STATION_ID);
      temp.length = 0;
  //    for (var x = 0; x < Array_DATA[b]['DATA'].length; x++) {
      for (var x = 0; x < maxArraysize; x++) {
        var value_  = 0;
        if(x < Array_DATA[b]['DATA'].length) {value_ = Array_DATA[b]['DATA'][x].VALUE; }
        temp.push([min, value_, max]);
  //      temp.push([min, Array_DATA[b]['DATA'][x].VALUE, max]);
        TAGID[x].splice((x + b), 0, temp[x]);
      }
    }
  }
  console.log(TAGID);
  if(hasData) {
    var g = new Dygraph(document.getElementById("grid-trend"), TAGID, {
      width: width_,
      height: 480,
      errorBars: true,
      customBars: true,
  //    labelsDiv: document.getElementById('status'),
        labelsKMB: true,
  //      title: title_,
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
}


function JSAJAX() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      return this.response;
    }
  };
  xhttp.open("GET", dataUrl, true);
  xhttp.send();
}


function convertToExcel() {
  var grid = $("#grid").data("kendoGrid");
  grid.saveAsExcel();
  // document.getElementById('convertToExcel').onclick = function(e)
  // {
  //     e.stopPropagation();
  //     document.getElementsByClassName('k-grid-excel')[0].click();
  // };
}

function convertToExcel_alarm() {
  var grid = $("#grid-alarm").data("kendoGrid");
  grid.saveAsExcel();
  // document.getElementById('convertToExcel').onclick = function(e)
  // {
  //     e.stopPropagation();
  //     document.getElementsByClassName('k-grid-excel')[0].click();
  // };
}


var queryPhysicSelectors = document.getElementsByClassName("query_content_physicSelector");
var defaultPysicSelectorsIndex = [1, 2, 3, 4, 5, 6, 7, 8, 9, 15];
var test;

function defaultContorller() {
  for (var E = 0; E < queryPhysicSelectors.length; E++) {
    var queryPhysicSelectorsInputs = queryPhysicSelectors[E].getElementsByTagName('input');
    for (var F = 0; F < queryPhysicSelectorsInputs.length; F++) {
      if (defaultPysicSelectorsIndex.indexOf(F) != -1) {
        // queryPhysicSelectorsInputs[F].checked = true;
        queryPhysicSelectorsInputs[F].click();
      }
    }
  }
}

defaultContorller();

var test___1;
var test___2;

function queryPhysicSelectorsSynchronizer(changed) {
  var changeddIndex = getElementIndex(changed.parentElement);
  console.log(changeddIndex);
  var changedWrapper = document.querySelectorAll('.query_content_physicSelector');
  test___1 = changed.parentElement.parentElement.parentElement;
  test___2 = changedWrapper
  console.log(changed.parentElement.parentElement.parentElement)
  var changeddWrapperIndex = changedWrapper.indexOf(changed.parentElement.parentElement.parentElement)
  console.log(changeddWrapperIndex);
}

function getElementIndex(target) {
  var nodes = Array.prototype.slice.call(target.parentElement.children);
  var index = nodes.indexOf(target);
  //ES6 let index = [...target.parentElement.children].indexOf(target);
  return index;
}
//kendoMultiColumnData();
//$(".query_content_search").on('click', function(){
//  kendoMultiColumnData();
//});

setTimeout(function () {kendoMultiColumnData();},50);
function kendoMultiColumnData(){ 
  $(".query_content_search input").eq(0).kendoMultiColumnComboBox({
  dataTextField: "STATION_ID",
  dataValueField: "STATION_ID",
  height: 400,
  //title 標頭
  //field 資料
  //template 該資料格html code  資料呼叫方式 #: fieldName #
  //filterFields 搜尋base
  columns: [
    {
      field: "CITY",
      title: "場所",
      headerTemplate: '<span class="searchUnit-header">場所</span>',
      template: "<div class='searchUnit'>#: CITY #</div>",
      width: 200
      },
    {
      field: "STATION_ID",
      title: "站名",
      headerTemplate: '<span class="searchUnit-header">站名</span>',
      template: "<div class='searchUnit'>#: STATION_ID #</div>",
      // template: "<div style='background-color: yellow;' class='customer-photo'" +
      //     "style='background-image: url(../content/web/Customers/#:data.CustomerID#.jpg);'></div>" +
      //     "<span class='customer-name' style='background-color: lightblue;'>#: ContactName #</span>",
      width: 200
      },

    //   { 
    //       field: "DISTRICT",
    //       title: "DISTRICT",
    //       template: "<div style='color:grey;'>#: DISTRICT #</div>",
    //       width: 200
    //   },
  ],
  footerTemplate: 'Total #: instance.dataSource.total() # items found',
  filter: "contains",
  filterFields: ["STATION_ID", 'STATION_TYPE', 'DISTRICT'],
  dataSource: searchbase,
  select: onSelect
});
  $(".query_content_search").css({margin: '10px 0 0 0'});
}
//kendoMultiColumnComboBox的json資料
function onSelect(e) {
  var dataItem = e.dataItem;
  console.log(dataItem);
  $("#district").val(dataItem.DISTRICT);
  $("#cityCh").val(dataItem.CITY);
  $("#station_id").val(dataItem.STATION_ID);
  var cityCh = $("#cityCh").val();
  var district = $("#district").val();
  var station_id = $("#station_id").val();
  var _this;
  AJAXforName(district);
  var f14px = $("#grid-name label").find(".f14px");

  for (var x = 0; x < f14px.length; x++) {
    if ($(f14px[x]).text() == cityCh) {
      _this = $(f14px[x]).closest('label').find('input');
      $(_this).attr('checked', true);
      //比較到特定字串後跳脫for迴圈方法
      x = f14px.length + 1;
      //_this[0]目的為須抓到目前本身的obj
      //      console.log(_this);
      AJAXforSTATION_ID(_this[0]);
      $(_this).attr('checked', true);
      AJAXforDESC(station_id);

    }
  }

  //  AJAXforSTATION_ID(station_id);
  //  AJAXforDESC(station_id);
}

$(".query_header .query_header_content").on("click", function (e) {
  var x = $(this).index();
  var enbtn = [];
  var labName;
  if (x != 2) {
    var checkState = $("#selectors1").find("label");
    var combinedName = $("#combined_string");
  } else {
    var checkState = $("#selectors2").find("label");
    var combinedName = $("#combined_string2");
  }
  for (var j = 1; j < checkState.length; j++) {
    labName = $(checkState[j]).find("input");
    if (labName.prop('checked')) {
      labName = labName.attr('value');
      enbtn.push(labName);
    }
  }
  combinedName.val(enbtn);
});

$(".query_content_physicSelector label:not(:first-child)").on("change", function (e) {
  $(this).parent().find("label:first-child input").attr("checked", false);
});

//第4區塊單一移除鈕
function del_item(e) {
  var arry = [], tag_id_conta = [];  
  var desc_tag_id; 
  var tag_id_ack = $(e).parent().find("input[name=station_id]").attr("placeholder");
//  var DescCheckbox = $("#grid-desc").find("input[type=checkbox]");
  tag_id_conta = $("#tag_id").val().split(",");
  if(tag_id_conta.indexOf(tag_id_ack.trim()) != -1){
    var count = tag_id_conta.indexOf(tag_id_ack.trim());
    tag_id_conta.splice(count,1);
    $("#tag_id").val(tag_id_conta.join(','));
  }
  
  var text = $(e).parent().text();
  $(e).closest('tr').remove();
  var temp = $('#desc').val();
  arry = temp.split(",");
  objectsString = temp.split(",");
  for (var x = 0; x < arry.length; x++) {
    if (arry[x].trim() == text.trim()) {
      arry.splice(x, 1);
      objectsString.splice(x,1);
      objectsToQuery.splice(x,1);
    }
  }  
  console.log(objectsString);
  arry.join(",");
  $("#desc").val(arry);
}
