function openInforpage(e)
{
    if($(this).hasClass("active")) {
      alert("請勿重複開啟數值查詢頁面。");
      return;
    }
    fullScreenBlocker("資料讀取中 。。。");
    var elev_box = $("#Elev_").val();
    var itm_box = $("#Elev_ITM").val();
    var msr_box = $("#Elev_MSR").val();
    var x = $(e).addClass('active');
    $(".modal-table").css("display","block");  
    kendoTableGenerator(dataForKendo, true);
    fullScreenBlockerRemover();
};

function showtime(){
      setTimeout("showtime()",1000);
      
      var today=new Date();
      var currYear =  today.getFullYear();
      var currMoth =  today.getMonth()+1;
      var currDay =   today.getDate();
      var currHours = today.getHours();
      var currMin =   today.getMinutes();
          
      var currentDate = moment().format('YYYY/MM/DD');
      var currentTime = moment().format('HH:mm:ss');
      $("#currdate").text(currentDate);
      $("#currtime").text(currentTime);
      
    //3階-dashboard
    var months = "一月,二月,三月,四月,五月,六月,七月,八月,九月,十月,十一月,十二月".split(",");
    var weekdays = "星期日,星期一,星期二,星期三,星期四,星期五,星期六".split(",");
    var ampm = "AM,PM".split(",");
  
   $("#date").text(currMoth + '/' + currDay +" "+ weekdays[today.getDay()]);
   var ampm_;
   if(parseInt(currHours) > 12) ampm_ = ampm[1]; else ampm_ = ampm[0];
   $("#time").text(currentTime+ " ");
   $("#time").append("<sup>"+ampm_+"</sup>");
           
  

};
//高程供水系統
function getelevData(e){         
  var le = $(e).attr("name");
  var nam = $('[name='+le+']').find('li.active a');  
  if(nam.hasClass("active")) {
    var bef = $(e).closest("li").find('a input[type=hidden]').attr("value");
    var x = nam.find('input[type=hidden]').attr("value");
    $("#elevItme").val(bef);    
    $("#elevSubitm").val(x);
  }
};
//高程供水系統
function getbaselayer(e){  
  var arr_str = new Array();
  var le = $(e).closest("ul.top_left_menu").find("input[type=hidden]").attr("name", "bstlyr");
  var inptNam = $('[name=bstlyr]');
  var xx = $(".left_sub_menu").find('a').attr("class");  
  for(var x=0; x<le.length; x++){
    if($(inptNam[x]).parent().attr("class") == "active"){
      arr_str.push($(inptNam[x]).val());
      console.log(arr_str.join("|"));
      $("#baseLayer").val(arr_str.join("|"));
    }
    else {
      if(arr_str == '')
        $("#baseLayer").val("");
    }
  }
};

$(function()
{    
    $(".pos_right").on('click', function(e){
        window.location.href='UserInfo.php';
    });
    var menu = document.querySelectorAll('#phone_text_1>ul>li');
//x  
    function menuActiveCheck() {
      for (var E = 0; E < menu.length; E++)
      {
        menu[E].onclick = function(e)
        {
        
          e.stopPropagation();
          this.classList.add('active');
          if (this.classList.contains('supply'))
          {
            document.getElementById('primeMenu').parentElement.classList.add('active');
            document.getElementsByClassName("multipleChoice")[0].classList.add('allSections');
          }
          if (!this.classList.contains('forwatersupply'))
          {
            deletefullWMS();
            document.querySelectorAll('.right-nav>a')[0].classList.add('active');
            document.querySelectorAll('.right-nav>a')[1].classList.remove('active');
            document.getElementById('primeMenu').style.display = 'block';
//            document.getElementsByClassName("multipleChoice")[0].style.display = 'block'; -- jackie remove
            this.classList.add('active');
            if (this.classList.contains('defaultGeneral'))
            {
              document.getElementById('generalLook').click();
              console.log("-------------------------------------------------------------------------------------------------");
              console.log($(".multipleChoice li:nth-of-type(2)").attr('class'));
            }
            document.getElementById('watersupply').style.display = 'none';
          }else
          {
            document.getElementById('primeMenu').style.display = 'none';
            document.getElementById('watersupply').style.display = 'block';
            document.getElementById('watersupply').parentElement.classList.add('active');
            document.getElementsByClassName("right-nav")[0].getElementsByClassName('active')[0].classList.remove('active');
            document.querySelectorAll('.right-nav>a')[1].classList.add('active');
            addFullWMS('https://wms.nlsc.gov.tw/wms?&SERVICE=WMS&VERSION=1.1.1&REQUEST=GetMap&BBOX=144847.277860,2406316.107441,352136.448733,2807602.054796&SRS=EPSG:3826&WIDTH=480&HEIGHT=640&LAYERS=EMAP5&STYLES=&FORMAT=image/png&DPI=96&MAP_RESOLUTION=96&FORMAT_OPTIONS=dpi:96&TRANSPARENT=TRUE');
          }
        }
      }
    }
//    menuActiveCheck();
  
//x
    var tagimgs = document.querySelectorAll('.left-nav>ul li a .img');

    function tagimgsclick(E) {

      tagimgs[E].onclick = function(e)
      {
        console.log(E);
        e.stopPropagation();
        closes[0].click();
        console.log(this.parentElement.parentElement);
        // document.getElementsByClassName("supply")[0].classList.remove('active');
        document.getElementsByClassName("defaultGeneral")[0].classList.remove('active');
        document.getElementsByClassName("forwatersupply")[0].classList.remove('active');
        
        this.parentElement.parentElement.classList.add('active');
        
        if (this.parentElement.parentElement.classList.contains('supply'))
        {
          document.getElementsByClassName("multipleChoice")[0].classList.add('allSections');
        }
        menu[E].click();
        var watersupplyul = document.querySelectorAll('.lay2>ul')
        for (var F = 0; F < watersupplyul.length; F++)
        {
          watersupplyul[F].style.display = 'none';
        }
      }
    }
    
    for (var E = 0; E < 3; E++)
    {
//      tagimgsclick(E);
    };

    //資料列表
    $(".closeInforpage").click(function(e)
    {
      e.stopPropagation();
      document.getElementsByClassName("modal-table")[0].style.display = 'none';
      $(".blue:first").removeClass("active");
    });
  
});

//x
function watersupplyulclose_remove()
{
  var watersupplyul = document.querySelectorAll('.lay2>ul')
  for (var F = 0; F < watersupplyul.length; F++)
  {
    watersupplyul[F].style.display = 'none';
  }
};


//3階 板新調配總覽
$(document).ready(function(){
  $(".child_menu li").hover(function(){
    $(this).children("div").addClass("show");
    },function(){
    $(this).children("div").removeClass("show");
  });
});