var getDatas = new Array();
var temp_getDatas = [];
var spanText1 = [];
var spanText2 = [];
//memo新增按鈕響目 for 即時水情看板
function appendMemo(indx, this_, no) {
  $(".appendMemoContent").remove();
  var stringarr = ["趨勢圖", "圖控", "TGOS"];
  if (no > 0)
    var path = $(this_).parent().append("<div class='appendMemoContent'><div style='position: absolute;right: 10px; top: 0px;'>&times;</div></div>");
  for (var x = 0; x < no; x++) {
    var path = $(".appendMemoContent").append("<div>" + stringarr[x] + "</div>");
  }
}
//memo功能設定 for 即時水情看板
$('.balaImg div div').parent().on("click", ".appendMemoContent div", function (e) {
  e.stopPropagation();
  //      e.preventDefault();
  var stationid = $(this).parent().parent().children("span:first-child").text();
  var tag_id = $(this).parent().parent().children("span:nth-of-type(2)").text();
  var yesterday = 0;
  if (tag_id.match("昨") != null) {
    yesterday = 1;
  } else yesterday = 0;
  //        debugger;
  var x = $(".appendMemoContent div:not(:first)").index(this);
  //        recommand: we needs build the functions for 趨勢圖","圖控","TGOS"
  switch (x) {
    case 0: { //趨勢圖
      //              alert("0: "+stationid);
      var url = './lineChart.php?status=water&stationID=' + stationid + '&tagID=' + tag_id + '&measure=*&yesterday=' + yesterday;
      window.open(url, stationid + '趨勢圖');
      break;
    }
    case 1: { //圖控
      alert("1");
      break;
    }
    case 2: { //TGOS
      alert("2");
      break;
    }
    default:
      $(".appendMemoContent").remove();
      break;
  }
  $(".appendMemoContent").remove();
});
$(".balaImg input[type=text]").on("focus", function () {
  $(this).blur();
});
$(".balaImg input[type=text]").on("click", function () {
  var indx = $(".balaImg input[type=text]").index(this);
  var checkSpanName = $(this).parent().find('span:nth-of-type(2)').text();
  if (checkSpanName.match("昨") != null) {
    appendMemo(indx, this, "0");
  } else
    appendMemo(indx, this, "1");
  console.log(checkSpanName.match("昨"));
  //        $(this).val();
  //        console.log($(this).attr("value"));
});

$(".balaImg input[type=text]").hover(function () {
  var checkSpanName = $(this).parent().find('span:nth-of-type(2)').text();
  $(this).css({
    cursor: "pointer"
  });
}, function () {
  $(this).css({
    cursor: "default"
  });
});

//        window.setInterval(temp, 3000);
var findKey_ = [];

function getbashboardDatas(str, no, station_id, tag_id) {
  console.log(tag_id);
  getDatas.length = 0;
  //        var url_="http://220.134.42.63:8080/WaterscadaAPI/WI_ItemData?section=" + str + "&item=" + no + "&STATION_ID=" + station_id + "&TAG_ID=" + tag_id + "&measure=*";
  var url_ = "http://220.134.42.63:8080/WaterscadaAPI/WI_ItemData?section=" + str + "&item=" + no;
  console.log(url_);
  $.ajax({
    url: url_,
    type: "GET",
    dataType: "json",
    success: function (Jdata) {
      $.each(Jdata, function (index, d) {
        getDatas.push(d);
      });
      console.log(getDatas);
      var findIndexofkeywd;
      var lastDataTime = getDatas[0];
      lastDataTime = lastDataTime.replace(/-/g, "/");
      lastDataTime = lastDataTime.replace("T", " ");
      $("#last_dataTime").text(lastDataTime);
      $.each(getDatas[1], function (v, x) {
        findKey_.push(x);
      });
      CompareQuestOfWord(findKey_);
      console.log(findKey_);
    },
    error: function () {
      console.log("get json fail");
    }
  });
}

function CompareQuestOfWord(questWD) {
  var spanX1, spanX2, assign = false;
  var setPositionLength = $("#mappingConte").children("div").length;
  for (var j = 0; j < setPositionLength; j++) {
    var divCunt = $(".setposition")[j];
    for (var y = 0; y < $(divCunt).children('div').length; y++) {
      spanX1 = $(divCunt).find("div:nth-of-type(" + (y + 1) + ") span:nth-of-type(1)").text();
      spanX2 = $(divCunt).find("div:nth-of-type(" + (y + 1) + ") span:nth-of-type(2)").text();
      //            console.log(spanX1 +" + "+ spanX1);
      for (var x = 0; x < questWD.length; x++) {
        var AssignValCls;
        if (questWD[x].STATION_ID == spanX1 && questWD[x].ITEM_NAME == spanX2) {
          console.log(spanX1 + " - " + spanX1 + " : " + questWD[x].VALUE);
          var inpt = $(divCunt).find("div:nth-of-type(" + (y + 1) + ") input");
          inpt.val(questWD[x].VALUE);
          var flag = questWD[x].FLAG;
          switch (flag) {
            case "N":
              AssignValCls = "nor_";
              break;
            case "<":
            case ">":
              AssignValCls = "s_err";
              break;
            case "<<":
            case ">>":
              AssignValCls = "b_err";
              break;
            default:
              AssignValCls = "offline";
              break;
          }
          $(inpt).addClass(AssignValCls);
          assign = true;
        }
        if (assign) {
          assign = false;
          break;
        }
      }
    }
  }
}

$(".balaImg div").ready(function (e) {
  //        returntrue2 = getMountainData();
  //          if (returntrue2) {
  //            setInterval(function() {
  //              getMountainData();
  //            }, 1000000); //預設10000毫秒自動重複執行cartnumber()函數
  //          }
  spanText1.length = 0;
  spanText2.length = 0;
  var div_ = $(".setposition");
  for (var x = 0; x < div_.length; x++) {
    var divCunt = $(".setposition")[x];
    for (var y = 0; y < $(divCunt).children('div').length; y++) {
      spanText1.push($(divCunt).find("div:nth-of-type(" + (y + 1) + ") span:nth-of-type(1)").text());
      spanText2.push($(divCunt).find("div:nth-of-type(" + (y + 1) + ") span:nth-of-type(2)").text());
    }
  }
  //removing the same word on array
  var result = spanText1.filter(function (element, index, arr) {
    return arr.indexOf(element) === index;
  });
  var staId = result.join();
  var result = spanText2.filter(function (element, index, arr) {
    return arr.indexOf(element) === index;
  });
  var itemName = result.join();
  //        console.log(staId);        
  console.log(itemName);
  getbashboardDatas($("#section_").val(), $("#item_").val(), staId, itemName);
  //        alert("done");

  //Datas ready from webservice
});
