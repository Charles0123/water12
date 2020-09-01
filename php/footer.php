<style>
    #ann_box .yellow{
        color: rgb(253, 255, 0);
        background: transparent !important;
    }
    #ann_box .green{
        color: rgb(0, 255, 1);
        background: transparent !important;
    }
    #ann_box .gray{
        color: gray;
        background: transparent !important;
    }
    #ann_box .red{
        color: #073469;
        background: transparent !important;
    }
</style>
<link rel="stylesheet" href="css/animate.min.css" type="text/css">
<footer>
    <div class="marquee">
      <p style="position: relative; display: none; left: 0;">即時情報</p>
      <ul id="ann_box" class="ann" style="height: 40px">
        <li class="ann a1 " style="color: white;">確認目前警報狀態中<a><span class="animated infinite flash">。。。</span></a></li>
        <li class="ann a1" style="color: white;">確認目前警報狀態中<a><span class="animated infinite flash">。。。</span></a></li>
      </ul>
    </div>

    <div class="right_area" style="position: relative; right: 0 !important;">
      <span class="copyright" style="color: white;">Copyright &copy; <?php echo date("Y");?></span>
<!--      <a href="#" class="cop">TWC</a>-->
      <a target="_blank" class="gear">
        <img src="./images/icons/icon.png"> 
      </a>
    </div>
</footer>
<script src="./js/moment.min.js"></script>
<script>
    var getAlarmDatas = []; 
    var alarmString;
    var id = '<?php echo @$_SESSION['ID']?>';
    var pw = '<?php echo @$_SESSION['NAM']?>';
    $('.gear').on('click',function(e){
      if(id != '' && pw != ''){        
        var url__ = 'http://220.134.42.63:8080/waterscada/Login/Login.aspx?redirect=settings&id='+id+'&password='+pw;    
        $(this).attr('href', url__);        
      }
      else{
        alert('請先登入');
        window.location.href = 'login.php';        
      }
    });
//  $("#ann_box li").remove();  
  GetRealAlarmData();    
  function transformUnit(unit_){
    var toSupContent = ["kgf/cm2", "M3"];
    if(toSupContent.indexOf(unit_.trim()) != -1){
        var stringArray = unit_.split('');
        stringArray[stringArray.length - 1] = String(stringArray[stringArray.length - 1]).sup();
        var supProccessedString = stringArray.join('');
        return supProccessedString;
    } else
        return unit_.toUpperCase();
  };
  var flagColor, flagString;
  function alarmFlag(alarmContent){
      switch (alarmContent){
          case "<":
              flagColor = 'yellow';
              flagString = "(低)";
              break;
          case ">":
              flagColor = 'yellow';
              flagString = "(高)";
              break;
          case "<<":
              flagColor = 'red';
              flagString = "(低低)";
              break;
          case ">>":
              flagColor = 'red';
              flagString = "(高高)";
              break;
          case "?":
              flagColor = "gray";
              flagString = "(斷線)";
              break;
          case "N":
              flagColor = 'green';
              flagString = "(正常)";
              break;
      }
      return [flagColor, flagString];
  };
  
  var cellbackalert = null;
  function GetRealAlarmData() { 
    clearInterval(cellbackalert);
    var allPass = true;
    getAlarmDatas.length = 0;
    $.ajax({
      url: "http://220.134.42.63:8080/WaterscadaAPI/getRealtimeAlarmData",
          //url:"http://220.134.42.63:8080/waterscadaAPI/GetAlarmData?start=2019/08/11&end=2019/08/11",
      type: "GET",
      dataType: "json",
      success: function(Jdata) {
        $.each(Jdata, function(index, d) {
          getAlarmDatas.push(d);   
        });
        console.log(getAlarmDatas);
        //TAG_ID DESC VALUE FLAG UNIT
        var unit, flag=[];
        if(getAlarmDatas !=''){
//              debugger;
            if($("#ann_box li").hasClass("a1"))
              $("#ann_box li").remove();
            for(var x=0; x<getAlarmDatas.length; x++){
                if(getAlarmDatas[x].FLAG !="N"){
                    unit = transformUnit(getAlarmDatas[x].UNIT);
                    flag = alarmFlag(getAlarmDatas[x].FLAG);
                     alarmString = getAlarmDatas[x].STATION_ID+getAlarmDatas[x].DESC;
                    $("#ann_box").append('<li class="ann"><a href="./alarmList.php?tagid='+getAlarmDatas[x].TAG_ID+'">'+alarmString+flag[1]+': <span class='+flag[0]+'>'+getAlarmDatas[x].VALUE.toFixed(2)+'</span>'+" "+unit+'</a></li>');
                    allPass = false;
                } else {
                  if(allPass){
                    $("#ann_box li").remove();
                    $("#ann_box").append('<li class="ann">所有場站測值正常</li>');
                  }
                }
            } 
//            console.log(alarmString);
            console.log("更新警報値資料");
            cellbackalert = setInterval(function(){GetRealAlarmData();}, 300000); //update datas after 5min ago
        } else {
            console.log("無警報値資料，30秒後連線重新。");
            $("#ann_box li").remove();
            $("#ann_box").append('<li class="ann animated infinite flash" style="color: white;">無警報値資料</li>');
            cellbackalert = setInterval(function(){GetRealAlarmData();}, 30000);
        }
      },
      error: function() {  
            console.log("資料連接錯誤，30秒後重新連線。");
            $("#ann_box li").remove();
            $("#ann_box").append('<li class="ann animated infinite flash" style="color: white;">無警報値資料</li>');
            cellbackalert = setInterval(function(){GetRealAlarmData();}, 30000);  
      }
    });
    
  }   
  var tid = null;
  slideLine('ann_box', 'li', 2000, 10, 10);
  function slideLine(box, stf, delay, speed, h) {
      var slideBox = document.getElementById(box);
      var delay = delay || 1000, speed = speed || 20, h = h || 20;
      var pause = false;
      
      var slide = function() {
        if (pause) return;
        slideBox.scrollTop += 6;
        if (slideBox.scrollTop % h == 0) {
          clearInterval(tid);
          slideBox.appendChild(slideBox.getElementsByTagName(stf)[0]);
          slideBox.scrollTop = 0;
          setTimeout(function(){
            tid = setInterval(slide, speed);
          }, delay);
        }
      }
      slideBox.onmouseover = function() {
        pause = true;
      }
      slideBox.onmouseout = function() {
        pause = false;
      }
      setTimeout(function(){
        tid = setInterval(slide, speed);
      }, delay);
    }
   
</script>

