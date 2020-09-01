var sdata, isarray;
function mask(en){
  if(en)
    $(".mobile_mask").css({"display": 'block'});
   else
     $(".mobile_mask").css({"display": 'none'});
}

$("#gen_labe").on('click', function () { 
  mask(true);
  var getqrc = setTimeout(function(){
    var id_;
    var id_str = [];
    isarray = false;
    id_ = $('.form-control').find("option:selected").text();
    $("#useUnit").text("使用單位：" + id_);
    if (id_ == "全部單位") {
      $('.form-control').find("option:not(:first)").length;
      for (var x = 1; x < $('.form-control').find("option").length; x++) {
        id_str.push($('.form-control').find("option").eq(x).val());
      }
      isarray = true;
      id_ = id_str.join(',');
    }
    console.log(id_str);
    var url_ = "./php/importXlsFile.php";
    //抓xls資料
    if (id_.split(',').length > 0) {
      var sdata_ = [];
      for (var x = 0; x < id_.split(',').length; x++) {
        var ws = WB.Sheets[id_.split(',')[x]];
        sdata = XLSX.utils.sheet_to_json(ws, {
          header: 1
        }); //header 從第幾行開始解析
        ToQRC(url_, id_, sdata);
      }
    }
    mask(false);
    clearTimeout(getqrc);
  }, 10);
    
});



$("#select_").on('click', function () {
  $("#preview").removeClass("active btn-warning");
  if (list.length > 0) {
    $(".form-control").find("option").remove();
    $(".form-control").append("<option>全部單位</option>");
    for (var x = 0; x < list.length; x++)
      $(".form-control").append("<option>" + list[x] + "</option>");
  } else {
    alert("please import xls file");
    sdata = '';
  }
});

function ToQRC(url_, id_, json_) {
  $.ajax({
    url: url_,
    type: 'POST',
    cache: false, //上傳文件不需要緩存
    dataType: "json",
    data: {
      'key': id_,
      'xdata': json_
    },
    dataType: 'html',
    async: false,
    success: function (data) {
      var obj_data = JSON.parse(data);
      PropertyLable(obj_data, isarray);
      console.log(obj_data);
    },
    error: function () {
      alert("上傳失敗，請重新上傳。");
    }
  });
}

var x1=0;
function PropertyLable(obj, en) {
  if (!en) $(".propert").children("div").remove();
  $("#preview").addClass("active");
  $("#all").addClass("active");
  for (var x = 0; x < obj.length; x++) {
    if(x % 3 == 0){
      x1 = x1 + 1;
      $(".propert").append("<div id='x_"+x1+"' class='noBreak' style='margin:0;padding:0; display: inherit;'></div>");
    }
    $('#x_'+x1).append('<div class="" style="margin-bottom: 0px;"><div class="box justify-content-center"><div class="printFlag"><table style="page-break-before: always; page-break-after: always;"><tr class="" style="page-break-inside: avoid;"><th>二維碼</th><th rowspan="2" style="text-align: left; width: 60%; vertical-align: top;"><div>編號：<div class="txt">' + obj[x]["取得編號"] + '</div></div><div>財產名稱：</br><div class="txt">' + obj[x]["財產名稱"] + '</div></div><div>設置日期：<div class="txt">' + obj[x]["購置年月"] + '</div></div><div>使用年限：<div class="txt">' + obj[x]["耐用年限"] + '</div></div></th></tr><tr class="" style="page-break-inside: avoid;"><td><img src="' + obj[x]["QRC"] + '"></td></tr><tr style="page-break-inside: avoid;"><th colspan="2" style="text-align: left; width: 100%;"><div>地點：</br><div class="txt" style="word-break: break-all;">' + obj[x]["備註(地點)"] + '</div></div></tr></table></div><input class="m-3" type="checkbox" value="" onclick="printFlag(this)" id="" required="" name="c"></div></div>'); 
  }  
  console.log(obj);
}

var X = XLSX;
var list = '';
var WB = '';

function process_wb(wb) {
  WB = wb;
  list = WB.SheetNames;
  //    var ws = WB.Sheets[WB.SheetNames[0]];   //獲取第幾個sheet頁
  //    sdata = XLSX.utils.sheet_to_json(ws, {header:1});    //header 從第幾行開始解析
  //    console.log(sdata);    
};

function do_file(files) {
  var reader = new FileReader();
  reader.onload = function (e) {
    process_wb(X.read(e.target.result, {
      type: 'binary'
    }));
  };
  reader.readAsBinaryString(files.target.files[0]);
};

function printFlag(e) {
  $(e).closest("div").children(".printFlag").toggleClass('active');

}

(function () {
  var xlf = document.getElementById('inputGroupFile01');
  if (!xlf.addEventListener) return;

  xlf.addEventListener('change', do_file, false); //新增監聽
})();

function QRC_preview(e) {
  $(e).toggleClass("active btn-warning");
  if ($(e).hasClass("active")) {
    $(e).text("返回");
    $(".printFlag.active").closest(".col-sm-4").addClass("QRC_preview");
  } else {
    $(e).text("預覽");
    $(".printFlag.active").closest(".col-sm-4").removeClass("QRC_preview");
  }
}

// checkbox全選功能
function check_all(obj, cName) {
  var checkboxs = document.getElementsByName(cName);  
  for (var i = 0; i < checkboxs.length; i++) {
    checkboxs[i].checked = obj.checked;
    if(obj.checked) 
      $(".printFlag").eq(i).addClass("active");
    else 
      $(".printFlag").eq(i).removeClass("active");
  }
}
