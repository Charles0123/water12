(function($){
  $(document).ready(function(){ 
    
    
    var city = new Array();
    var y = $(".menu .menu_wrapper .menu_content");
    for(var x=0; x<y.length; x++){
      var xx = $(y[x]).find("input").attr("value");    
      city.push(xx);
    }
    
    var delay = function(s){
      return new Promise(function(resolve,reject){
       setTimeout(resolve,s); 
      });
    };
    
    var init_station_id = [];
    
    //district = -1 or -2 or empty
    var district = '-1';
    var temp_arr = [];
    var new_arr = [];
    temp_arr.length = 0;
    new_arr.length = 0;
    getData.length = 0;  
    init_station_id.length = 0;
    $.each(city, function(index_, value){
        $.ajax({
          url: "http://220.134.42.63:8080/WaterscadaAPI/getStationinfo?district="+district+"&city="+value,
          type: "GET",
          dataType: "json",
          success: function(Jdata) {
            $.each(Jdata, function(index, d) {
              getData.push(d);   
            });            
            console.log(getData);
            for(var x=0 ;x<getData.length; x++){ temp_arr.push(getData[x].STATION_TYPE); }
            for(var x=0 ;x<temp_arr.length; x++){
              var items = temp_arr[x];
              //比對ARRARY內相同的字串的方法
              if($.inArray(items,new_arr)==-1) {
　　　　        new_arr.push(items);
　　         }}
//            console.log(new_arr);
            for(var x=0; x<new_arr.length;x++){
              $($(".menu_content ")[index_]).find(".menu_content_submenu_wrapper").append("<div class='menu_content_submenu_title'>"+new_arr[x]+"</div>");
              
              var string_ = new_arr[x];
              for(var y=0; y<getData.length; y++){
                if(getData[y].STATION_TYPE == string_){
//                  console.log(getData[x].STATION_ID);
                  $($(".menu_content ")[index_]).find(".menu_content_submenu_wrapper").append("<div class='menu_content_submenu_content'>"+getData[y].STATION_ID+"</div>"); 
                  if(y == 0){
                     init_station_id.push(getData[y].STATION_ID);                      
                  }                  
                }                
              }              
            }
           temp_arr.length = 0;
           new_arr.length = 0;
           getData.length = 0;            
//           delay(1000);
          },
          error: function() {
            console.log("get json fail");
          }
        });
    });
//    console.log(init_station_id);
    
    getIfixPicture_ALL("一期原水監測站");        
    
    function getIfixPicture_ALL(station_id) {      
      $.ajax({
        url: "http://220.134.42.63:8080/WaterscadaAPI/getIfixPicture?station_id=" + station_id,
        type: "GET",
        dataType: "json",
        success: function(Jdata) {
          $.each(Jdata, function(index, d) {
            getData.push(d);
          });
//            console.log(Jdata.STATION_ID);
          var filePath = Jdata.PICTURE_BASE_FOLDER;
          filePath = filePath.replace("c:\\","./");
          filePath = filePath.replace(/\\/g, "/");
//          alert(Jdata.PICTURE.length);
          $(".dataPicture_title").text(Jdata.STATION_ID);
          for(var x=0; x<Jdata.PICTURE.length; x++){
            filePath = "../WaterScada/IFIX_PIC";
            var str = "dataPicture_content_unact";
            var strbnt = "dataPicture_content_button";
            if(!x){
              var str = "dataPicture_content_unact dataPicture_content_active";
              var strbnt = "dataPicture_content_button dataPicture_content_button-active";
            }
//            if((Jdata.PICTURE[x].FILENAME != "undefined") && (Jdata.PICTURE[x].FILEDESC != "undefined") && (Jdata.PICTURE[x].FILETIME != "undefined")){
                filePath = filePath+"/" + Jdata.PICTURE[x].FILENAME;
//                filePath = "./waterScada/IFIX_PIC/(光復iFIX-VM)全區水壓流量總覽_PS_4.grf.PNG";
                $(".dataPicture_content_menu").append("<div class='"+strbnt+"'>"+Jdata.PICTURE[x].FILEDESC+"</div>");
                $(".dataPicture_content_picture_title").before("<span class='"+str+"'>"+Jdata.PICTURE[x].FILEDESC+"</span>");
                $(".dataPicture_content_picture_wrapper").append("<img class='"+str+"' src="+filePath+" alt="+Jdata.PICTURE[x].FILEDESC+" style='width: 100%; height: auto;'>");
                var ModTime = Jdata.PICTURE[x].FILETIME.replace("-","/");
                $(".dataPicture_content_picture_time").append("<h6 class='"+str+"'>更新時間:"+ModTime+"</h6>");
      //          Jdata.STATION_ID;
      //          Jdata.PICTURE_BASE_FOLDER
      //          Jdata.PICTURE;
      //          console.log(Jdata.PICTURE);
      //          console.log(getData[0]);
      //          console.log(getData[3][0].FILENAME);
//                }
            }
        },
        error: function() {
          console.log("get json fail");
        }
      });
    }    
     //偵測按鈕參照相對的圖控+綁定
      $('.dataPicture_content_menu').on('click', '.dataPicture_content_button', function(e){ 
          var now_indexNo = $(".dataPicture_content_button").index(this);
//          alert(now_indexNo);
        //大漢橋監控站按鈕
        if($(this).closest(".dataPicture_content").find('.dataPicture_content_button').hasClass('dataPicture_content_button-active')){
            $(this).closest(".dataPicture_content").find('.dataPicture_content_button').removeClass('dataPicture_content_button-active');        
          }
        //大漢橋監控站內容...
          if($(this).closest(".dataPicture_content").find('.dataPicture_content_picture span').hasClass('dataPicture_content_active')){
              $(this).closest(".dataPicture_content").find('.dataPicture_content_picture span').removeClass('dataPicture_content_active'); 
          }
        //圖控
          if($(this).closest(".dataPicture_content").find('.dataPicture_content_picture_wrapper img').hasClass('dataPicture_content_active')){
              $(this).closest(".dataPicture_content").find('.dataPicture_content_picture_wrapper img').removeClass('dataPicture_content_active');        
          }
        //時間
          if($(this).closest(".dataPicture_content").find('.dataPicture_content_picture_time h6').hasClass('dataPicture_content_active')){
              $(this).closest(".dataPicture_content").find('.dataPicture_content_picture_time h6').removeClass('dataPicture_content_active');        
          }
        //大漢橋監控站按鈕
          $(this).addClass("dataPicture_content_button-active");
        //大漢橋監控站內容...
          $(".dataPicture_content_unact:eq("+now_indexNo+")").addClass("dataPicture_content_active");   
         //圖控
          $(".dataPicture_content_picture_wrapper img:eq("+now_indexNo+")").addClass("dataPicture_content_active");  
         //圖控
          $(".dataPicture_content_picture_time h6:eq("+now_indexNo+")").addClass("dataPicture_content_active");   
      });
    
     //綁定父層跟append的元素
      $(".menu_content_submenu .menu_content_submenu_wrapper ").on("click",".menu_content_submenu_content", function(e){
          $(".dataPicture_content_button").remove();
          $(".dataPicture_content_unact").remove();
          $(".dataPicture_content_picture_wrapper img").remove();
          $(".dataPicture_content_picture_time h6").remove();
          if($(this).parent().find(".menu_content_submenu_content").hasClass("menu_content_submenu_content-active")){
              $(this).parent().find(".menu_content_submenu_content").removeClass("menu_content_submenu_content-active");              
          }
          $(this).addClass("menu_content_submenu_content-active");
          getIfixPicture_ALL($(this).text());
          
      });
    //設定scroll樣式
      $(".menu_content_submenu_wrapper, .dataPicture_content_menu").niceScroll({
            cursorcolor:"rgba(20,20,20,0.2)",
            cursorborder:"#eeeeee",
            background:"#eeeeee",
            cursorborderradius:0
        });
    //控制<div>寬度
      $(".dataPicture_content_picture_controll img").on("click", function(e){
          if($(this).hasClass("zooIn")){
            $(this).removeClass("zooIn"); 
            $(".dataPicture").removeClass("datapicture_zooin");
          }
          else{
            $(".dataPicture").addClass("datapicture_zooin");
            $(this).addClass("zooIn");          
            
          }
          
      });
    
    
  });
})(jQuery);

