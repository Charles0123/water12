var dataUrlforsearch = "http://220.134.42.63:8080/WaterscadaAPI/GetStationInfo";
var searchbase = [];
var cityNames = {
  1201: "板新給水廠",

  1202: "光復加壓站",

  1203: "樹林服務所",

  1204: "鶯歌服務所",

  1205: "土城服務所",

  1206: "泰山營運所",

  1207: "蘆洲服務所",

  1208: "新莊服務所",

  1209: "板橋服務所",
}

function JSAJAXforSearch() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var searchdata = JSON.parse(this.response)
      searchbase = searchdata;
      searchbase.map(function (content) {
        content["CITY"] = cityNames[content["CITY"]];
      });
      console.log(searchbase);
    }
  };
  xhttp.open("GET", dataUrlforsearch, true);
  xhttp.send();
}
JSAJAXforSearch();
//postSearchBaseData();
//ajax 上傳功能(POST) for add & delete
function postSearchBaseData() {
console.log("postSearchBaseData");
  debugger;
  var x = [], result = '';
  $.ajax({
    url: './php/searchbase.php',
    type: 'POST',
    async: false,
    data: {
      'url_': 'http://220.134.42.63:8080/WaterscadaAPI/GetStationInfo',
    },
    success: function (data) {
//      result = data;      
//      console.log(result);
    },
    error: function () {
      alert("上傳失敗，請重新上傳。");
    }
  });
//  return result;
}
