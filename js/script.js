(function ($) {
  $(document).ready(function () {

    $(".left_nav .menu_title .trigger").on("click", function () {
      $("#left_nav1").toggleClass("closed");
      if($("#left_nav1").hasClass("closed"))
        $(".multipleChoice").removeClass("active");
        else if($("#left_nav1").hasClass("open"))
          $(".multipleChoice").toggleClass("active");
        else
          {}
    });

    $(".popper .closed").on("click", function (e) {
      e.stopPropagation();
      $(this).parent().parent().parent().removeClass("opena");
    });

    $(".left_nav>ul>li>ul.left_sub_menu li a .sbar").on("click", function (e) {
      var x = $(this).closest("li").hasClass("active");
      if (x) {
        e.stopPropagation();
        e.preventDefault();
        $(this).parent().addClass("opena");
      } else
        alert("請先選擇服務所，在進行透明度設定。");
    });
    //選單active按鈕
    $("header #menu .main_menu ul li a").on("click", function (e) {          
      if ($(this.closest("ul")).hasClass("child_menu")) {} else {
        if ($(this).closest(".main_menu").find('ul > li').hasClass("active")) {
          $(this).closest(".main_menu").find('ul > li').removeClass("active");
          $(this).closest(".main_menu").find('ul > li > a').removeClass("active");
          $(this).closest(".main_menu").find('ul > li > a').next("ul").css({
            display: "none"
          });
          $(this).addClass("active");
          $(this).addClass("active");
          $(this).parent("li").addClass('active');
          $(this).next("ul").css({
            display: "block"
          });
        }
        if($(this).closest(".main_menu").find('ul + li').hasClass("active"))
          $("#slider").css({display: 'block'});
        else
          $("#slider").css({display: 'none'});
      }
    });
    //rwd右收合鈕
    $(".left_nav .menu_title .left_close").on("click", function (e) {
      e.preventDefault();
      $(".left_nav").removeClass("leftopen");
      $(".left_item_menu").removeClass("open");
      $(".Elev_lay2 > ul").removeClass("active");
    });
    //快速選單
    $("header #menu .left_menu1").on("click", function () {
      $(".child_menu li .active").removeClass("active");
      $("#left_nav2").removeClass("leftopen");
      $("#left_nav1").addClass("leftopen");
      $(this).addClass("active");
      $("#left_nav1").removeClass("open");
      if(!$("#left_nav1").hasClass("open")){
        $(".multipleChoice").removeClass("active");  
      }
      $("#left_nav1 .top_left_menu > li").removeClass("active");
      setTimeout(function () {
        $(".left_sub_menu").getNiceScroll().hide();
      }, 50);
    });
    //基本圖層
    $("header #menu .left_menu2").on("click", function () {            
      $(".child_menu li .active").removeClass("active");
      $("#left_nav1").removeClass("leftopen");
      $("#left_nav2").addClass("leftopen");
      $(this).addClass("active");
      $("#left_nav2").removeClass("open");
      $("#left_nav1 ul li.active ul li ul").removeClass("open");
      $("#left_nav2 .top_left_menu li, .multipleChoice").removeClass("active");
      setTimeout(function () {
        $(".left_sub_menu").getNiceScroll().hide();
      }, 50);
    });
    //圖例收合
    $("#footer_label .closed").on("click", function () {
      $("#footer_label").toggleClass("closed");
      $("#footer_label").find(".show").toggleClass("curr_show");
      $("#footer_label").find("ul").removeClass("show");
      if($("#footer_label").hasClass("closed")){
        
      }else
        $("#footer_label").find(".curr_show").addClass("show").removeClass("curr_show");
    });
    //統計圖例收合
    $(".Square .closed").on("click", function () {
      $(".Square").toggleClass("closed");
    });
    //手機bar       
    $("#top_header .mobile_menu").on("click", function () {

      if ($("header").hasClass("open")) {
        $("header").removeClass("open");
        $(".left_nav").removeClass("leftopen");
        $(".left_item_menu").removeClass("open");
        $(".Elev_lay2 > ul").removeClass("active");
      } else {
        $("header").addClass("open");
      }
    });
    //收合全部選單(右上)
    $("#header_closed").on("click", function () {
      if ($(this).hasClass("open")) {
        $(this).removeClass("open");
        $("header").addClass("header_hide");
        $(".left_nav").removeClass("leftopen");
        $(".Elev_lay2 > ul").removeClass("active");
        $(".left_item_menu").removeClass("open");
        $("#filterWrapper").addClass("filterWrapperInvisible");
      } else {
        $(this).addClass("open");
        $("header").removeClass("header_hide");
      }
    });
    //地圖類型active
    $("#menu .map_menu ul li").on("click", function () {
      $(this).addClass("active").siblings().removeClass("active");
    });
    //美化滾軸
    $(".left_sub_menu").niceScroll({
      cursorcolor: "rgba(20,20,20,0.2)",
      cursorborder: "#eeeeee",
      background: "#eeeeee",
      cursorborderradius: 0
    });
    //阻止冒泡階段的傳遞
    $(".left_nav .top_left_menu li .left_sub_menu").on("click", function (e) {
      e.stopPropagation();
    });
    //取透明度値
    $(".sbar,  .popper, .alphabk").on("click", function (e) {
      $(".alphabk").slider({
        tooltip: 'always',
        tooltip_position: 'bottom',
        formatter: function (value) {
          value = value * 100;
          return value + ' %';
        },
      });
      e.stopPropagation();
    });
    //快速選單
    //第一層active
    $("#left_nav1 .top_left_menu > li > a").on("click", function (e) {
      //start - removing legend type of few layer
        $("#footer_label .leng").parent().removeClass("showImg");
        $("#footer_label .leng").removeClass("active");
        $("#footer_label .leng").parent().removeClass("active");
      //end
      e.stopPropagation();
      e.preventDefault();

      if ($("#left_nav1").hasClass("open")) {
        if ($(this).parent().hasClass("active")) {
          $("#left_nav1").removeClass("open");
          $(this).parent().removeClass("active");
        } else {
          // $("#left_nav1").removeClass("open");
          $(this).parent().addClass("active").siblings().removeClass("active");
        }
      } else {
        $("#left_nav1").addClass("open");
        $(this).parent().addClass("active");

      }

      var me = this;
      setTimeout(function () {
        $(me).parent().find("#left_nav1 .left_sub_menu").getNiceScroll().resize();
      }, 50);
    });
    //第二層active
    $("#left_nav1 .top_left_menu > li > ul > li > a").on("click", function (e) {
      e.stopPropagation();
      e.preventDefault();

      if ($("#left_nav1 .left_sub_menu > li").hasClass("active")) {
        $("#left_nav1 .left_sub_menu > li").removeClass("active");
        $("#left_nav1 .left_sub_menu > li > a").removeClass("active");
        $("#left_nav1 .left_sub_menu > li > .left_item_menu").removeClass("open");
        $(this).parent().addClass("active");
        $(this).addClass("active");
        $(this).parent().find(".left_item_menu").addClass("open");
        //清除第3層的active
        if ($(this).parent().find(".left_item_menu li").hasClass("active")) {
          if ($(this).parent().find(".left_item_menu li a").hasClass("active")) {
            $(this).parent().find(".left_item_menu li a").removeClass("active");
          }
          $(this).parent().find(".left_item_menu li").removeClass("active");
        }
      } else {
        $(this).parent().addClass("active");
        $(this).addClass("active");
        $(this).parent().find(".left_item_menu").addClass("open");
      }

      var me = this;
      setTimeout(function () {
        $(me).parent().find(".left_sub_menu").getNiceScroll().resize();
      }, 50);
    });
    //第二層active+物理量
    $("#left_nav1 .top_left_menu > li:not(:nth-of-type(1)) > a").on("click", function (e) {
      e.stopPropagation();
      e.preventDefault();
//      $("#left_nav1 .top_left_menu > li.active > .Elev_lay2 > ul.multipleChoice").addClass("active");
      $(".Elev_lay2 > ul.multipleChoice").removeClass("active");
    });
    $("#left_nav1 .top_left_menu > li:not(:nth-of-type(2)) > a").on("click", function (e) {
      e.stopPropagation();
      e.preventDefault();
//      $("#left_nav1 .top_left_menu > li.active > .Elev_lay2 > ul.multipleChoice").addClass("active");
      $(".Elev_lay2 > ul.multipleChoice").addClass("active");
    });
    $(".top_left_menu li:nth-of-type(1)").on('click', function(e){
      $('.multipleChoice ').removeClass('active');      
    });    
    //第三層active
    $("#left_nav1 > .top_left_menu > li > ul > li > .left_item_menu > li > a").on("click", function (e) {
      //            e.stopPropagation();
      e.preventDefault();
      if ($(".left_item_menu > li").hasClass("active")) {
        $(".left_item_menu > li").removeClass("active");
        $(".left_item_menu > li > a").removeClass("active");
        $(this).parent().addClass("active");
        $(this).addClass("active");
      } else {
        $(this).parent().addClass("active");
        $(this).addClass("active");
      }

      var me = this;
      setTimeout(function () {
        $(me).parent().find(".left_item_menu").getNiceScroll().resize();
      }, 50);
    });

    //**基本圖層**//
    //第一層active for 快速選單 / 基本圖層
    $("#left_nav2 .top_left_menu > li > a").on("click", function (e) {      
      e.stopPropagation();
      e.preventDefault();

      if ($("#left_nav2").hasClass("open")) {
        if ($(this).parent().hasClass("active")) {
          $("#left_nav2").removeClass("open");
          $(this).parent().removeClass("active");
        } else {
          // $(".left_nav").removeClass("open");
          $(this).parent().addClass("active").siblings().removeClass("active");
        }
      } else {
        $("#left_nav2").addClass("open");
        $(this).parent().addClass("active");
      }

      var me = this;
      setTimeout(function () {
        $(me).parent().find(".left_sub_menu").getNiceScroll().resize();
      }, 50);
    });
    //第二層active for 基本圖層 / 區域範圍圖/水管線路圖/場站分布圖
    $("#left_nav2 .top_left_menu > li > ul > li > a").on("click", function (e) {
      var array = [];
      e.preventDefault();
      if ($("#left_nav2 .left_sub_menu > li").hasClass("active")) {
        $("#left_nav2 .left_sub_menu > li > .left_item_menu").removeClass("open");
        if ($(this).hasClass("active")) {
          $(this).parent().removeClass("active");
          $(this).removeClass("active");
        } else {
          $(this).parent().addClass("active");
          $(this).addClass("active");
          $(this).parent().find(".left_item_menu").addClass("open");
        }
      } else {
        $(this).parent().addClass("active");
        $(this).addClass("active");
        $(this).parent().find(".left_item_menu").addClass("open");
      }
      $('#baseLayerAct').val('');
      var leng = $(this).closest("ul").find('li');
      for (var x = 0; x < leng.length; x++) {
        if ($(leng[x]).hasClass("active"))
          if ($(leng[x]).find('input').attr("placeholder") != '')
            array.push($(leng[x]).find('input').attr("placeholder"));
      }
      var str = array.join(',');
      $('#baseLayerAct').val(str);
      var me = this;
      setTimeout(function () {
        $(me).parent().find(".left_sub_menu").getNiceScroll().resize();
      }, 50);
    });

    //CANCEL收合紐
    $(".left_nav a.exit").on("click", function (e) {
      e.stopPropagation();
      $(".Elev_lay2 > ul").removeClass("active");
      $(".left_nav").removeClass("open");
      $(".left_nav .top_left_menu >li").removeClass("active");
      //            bubbleController(e);
      //滾軸消失
      setTimeout(function () {
        $(".left_sub_menu").getNiceScroll().hide();
      }, 50);
    });
    //物理量收合紐 
    $(".Elev_lay2 > ul > a > img").on("click", function (e) {
      var windowWidthTemp = $(window).width();
      var setleftNo;
      var rwd850 = 850,
        rwd767 = 767,
        rwd450 = 450;
      var wtBar = $("#left_nav1 .top_left_menu > li.active > .Elev_lay2 > ul.multipleChoice");
      $(wtBar).toggleClass("slider_bar");
      if ($(wtBar).hasClass("slider_bar")) {
        //收合
        $('#physicQuantities').css({
          display: "none"
        });

        if (windowWidthTemp > rwd850) {
          $(wtBar).removeClass("rwd850_opn");
          $(wtBar).addClass("rwd850_cls");
          //                 $(wtBar).animate({left: '135px'});
          //                 $(wtBar).css({ height: '50px', top: '190px', zIndex: '-1'});
        }
        if (windowWidthTemp >= rwd767 && windowWidthTemp < rwd850) {
          $(wtBar).removeClass("rwd767_opn");
          $(wtBar).addClass("rwd767_cls");
          //                 $(wtBar).animate({left: '118px'});
          //                 $(wtBar).css({ height: '50px', top: '261px', zIndex: '-1'});
        }
        if (windowWidthTemp >= rwd450 && windowWidthTemp < rwd767) {
          $(wtBar).removeClass("rwd450_opn");
          $(wtBar).addClass("rwd450_cls");
          //                  $(wtBar).css({ height: '50px', top: '269px', zIndex: '-1'});
          //                  $(wtBar).animate({left: '118px'});
        }
        if (windowWidthTemp < rwd450) {
          $(wtBar).removeClass("rwd449_opn");
          $(wtBar).addClass("rwd449_cls");
          //                $(wtBar).animate({left: '19px'});
          //                $(wtBar).css({ height: '50px', top: '264px', zIndex: '-1'});
        }
        $(this).css({
          transform: 'rotate(180deg)'
        });
      } else {
        //展開
        if (windowWidthTemp > rwd850) {
          $(wtBar).removeClass("rwd850_cls");
          $(wtBar).addClass("rwd850_opn");

          //                  $(wtBar).animate({left: '292px'});
          //                  $(wtBar).css({ height: '100%', top: '194px'});
        }
        if (windowWidthTemp >= rwd767 && windowWidthTemp < rwd850) {
          $(wtBar).removeClass("rwd767_cls");
          $(wtBar).addClass("rwd767_opn");

          //                  $(wtBar).animate({left: '278px'});
          //                  $(wtBar).css({ height: '100%', top: '180px'});
        }
        if (windowWidthTemp >= rwd450 && windowWidthTemp < rwd767) {
          $(wtBar).removeClass("rwd450_cls");
          $(wtBar).addClass("rwd450_opn");

          //                  $(wtBar).animate({left: '278px'});
          //                  $(wtBar).css({ height: '100%', top: '180px'});
        }
        if (windowWidthTemp < rwd450) {
          $(wtBar).removeClass("rwd449_cls");
          $(wtBar).addClass("rwd449_opn");

          //                  $(wtBar).animate({left: '178px'});
          //                  $(wtBar).css({ height: '100%', top: '180px'});
        }
        $(this).css({
          transform: 'rotate(0deg)'
        });
        $('#physicQuantities').css({
          display: "block"
        });
      }
      e.stopPropagation();
    });
    //mobile_mask
    $("header .mobile_mask").on("click", function () {
      $(".left_nav").removeClass("leftopen");
      $("header").removeClass("open");
      $(".left_item_menu").removeClass("open");
      $(".Elev_lay2 > ul").removeClass("active");
    });
//x    快速選單 / 供水系統 destroy active & open
    $("#left_nav1 ul li .map2").on("click", function () {
      if ($("#left_nav1 ul li.active ul li a").hasClass("active"))
        $("#left_nav1 ul li.active ul li a").removeClass("active");
      if ($("#left_nav1 ul li.active ul li ul").hasClass("open"))
        $("#left_nav1 ul li.active ul li ul").removeClass("open");
      $("#elevItme").val("");
      $("#elevSubitm").val("");
    });
    //just for 資訊視窗cancel鈕
    $('.close_all').on("click", function (e) {
      clearInterval(getCCTVkeep);
      clearInterval(getCCTVlive);
      var no = $(this).parent().index();
      for (var x = 0; x <= no; x++) {
        if ($(this).closest("ul").find("li:nth-of-type(" + (x + 1) + ")").hasClass("active")) {
          $(this).closest("ul").find("li:nth-of-type(" + (x + 1) + ")").removeClass("active");
        }
        if ($(this).closest(".tabpanel").find('.main').find("div:nth-of-type(" + (x + 1) + ")").hasClass("active")) {
          $(this).closest(".tabpanel").find('.main').find("div:nth-of-type(" + (x + 1) + ")").removeClass("active");
        }
      }
      $('.main #p1').addClass("active");
      $('.menu .p1').parent().addClass("active");
      $(this).parent().removeClass("active");
      $("#moniter").css({
        display: "none"
      });      
      $("video").each(function () 
       { 
         this.pause();
         this.src = "";
       });
    });
//x    
    $('.distr1').on('click', function (e) {
      var currNo = '';
      var array = [];
      var array = $('#Elev_ITM').val().split(",");
      console.log(array);
      var currleng = $(this).next('.left_sub_menu').children("li");
      for (var x = 0; x < currleng.length; x++) {
        var currNo = $(currleng[x]).find('input').attr('value');
        if (array.indexOf(currNo) >= 0) {
          $(currleng[x]).addClass('active');
          $(currleng[x]).children('a').addClass('active');
        }
      }
    });
    //follow up the district on the active
    $('.distr2').on('click', function (e) {
      var currNo = '';
      var recordNo = $('#Elev_ITM').val();
      var currleng = $(this).next('.left_sub_menu').children("li");
      if (recordNo != '') {
        for (var x = 0; x < currleng.length; x++) {
          var currNo = $(currleng[x]).find('input').attr('placeholder');
          if (currNo == recordNo) {
            $(currleng[x]).addClass('active');
            $(currleng[x]).children('a').addClass('active');
          } else {
            $(currleng[x]).removeClass('active');
            $(currleng[x]).children('a').removeClass('active');
          }
        }
      }
      switch (recordNo) {
        case '1':
          array = ['3', '4', '5', '6', '7', '9', '8'];
          for (var x = 0; x < currleng.length; x++) {
            var currNo = $(currleng[x]).find('input').attr('placeholder');
            if (array.indexOf(currNo) >= 0) {
              $(currleng[x]).addClass('active');
              $(currleng[x]).children('a').addClass('active');
            }
          }
          break;
        case '2':
          array = ['3', '4', '5', '6', '7', '9', '8'];
          for (var x = 0; x < currleng.length; x++) {
            var currNo = $(currleng[x]).find('input').attr('placeholder');
            if (array.indexOf(currNo) >= 0) {
              $(currleng[x]).addClass('active');
              $(currleng[x]).children('a').addClass('active');
            }
          }
          break;
        case '10':
          array = ['4', '5', '6', '7', '9', '8'];
          for (var x = 0; x < currleng.length; x++) {
            var currNo = $(currleng[x]).find('input').attr('placeholder');
            if (array.indexOf(currNo) >= 0) {
              $(currleng[x]).addClass('active');
              $(currleng[x]).children('a').addClass('active');
            }
          }
          break;
      }
    });
    //follow up the district on the active
    $('.distr3').on('click', function (e) {
      var currNo = '';
      var array = [];
      var recordNo = $('#Elev_ITM').val();
      var currleng = $(this).next('.left_sub_menu').children("li");
      //            alert(recordNo);
      if (recordNo == '') {
        recordNo = $('#baseLayerAct').val();
        array=recordNo.join(',');
        for (var x = 0; x < currleng.length; x++) {
          var currNo = $(currleng[x]).find('input').attr('placeholder');
          if (currNo == array.indexOf(recordNo)) {
            $(currleng[x]).addClass('active');
            $(currleng[x]).children('a').addClass('active');
          } else {
            $(currleng[x]).removeClass('active');
            $(currleng[x]).children('a').removeClass('active');
          }
        }
      } else {
        switch (recordNo) {
          case '1':
            {
              array = ['3', '4', '5', '6', '7', '9', '8'];
//              array = array.push(recordNo);
              for (var x = 0; x < currleng.length; x++) {
                var currNo = $(currleng[x]).find('input').attr('placeholder');
                if (array.indexOf(currNo) >= 0) {
                  $(currleng[x]).addClass('active');
                  $(currleng[x]).children('a').addClass('active');
                }
              }
              break;
            }
          case '2':
            {
              array = ['3', '4', '5', '6', '7', '9', '8'];
//              array = array.push(recordNo);
              for (var x = 0; x < currleng.length; x++) {
                var currNo = $(currleng[x]).find('input').attr('placeholder');
                if (array.indexOf(currNo) >= 0) {
                  $(currleng[x]).addClass('active');
                  $(currleng[x]).children('a').addClass('active');
                }
              }
              break;
            }
          case '10':
            {              
              array = ['4', '5', '6', '7', '9', '8'];
//              array = array.push(recordNo);
              for (var x = 0; x < currleng.length; x++) {
                var currNo = $(currleng[x]).find('input').attr('placeholder');
                if (array.indexOf(currNo) >= 0) {
                  $(currleng[x]).addClass('active');
                  $(currleng[x]).children('a').addClass('active');
                }
              }
              break;
            }
          default:
              array.push(recordNo);
              for (var x = 0; x < currleng.length; x++) {
                var currNo = $(currleng[x]).find('input').attr('placeholder');
                if (array.indexOf(currNo) >= 0) {
                  $(currleng[x]).addClass('active');
                  $(currleng[x]).children('a').addClass('active');
                }
                else {
                  $(currleng[x]).removeClass('active');
                  $(currleng[x]).children('a').removeClass('active');
                }
              }
            break;
        }
      }
    });
    //controll Legend on the left navigation
    $("#footer_label .leng").on('click',function(e){      
      if($(this).parent().hasClass("active")){
        $(this).parent().removeClass("active");
      } else {
        $(this).parent().addClass("active");
      }
      
    });
    //active keyword on pipe line legend
    $("#disTric a").on('click', function(e){      
      $("#footer_label .leng").parent().addClass("showImg");
      $("#footer_label .leng").addClass("zoom");
      $("#footer_label .leng").attr('src', "");            
    });
    //active keyword on pipe line legend
    $("#piPe a").on('click', function(e){      
      $("#footer_label .leng").parent().addClass("showImg");
      $("#footer_label .leng").addClass("zoom");
      $("#footer_label .leng").attr('src', "images/piPe.png");            
    });
    //active keyword on pipe line legend
    $("#staTion a").on('click', function(e){      
      $("#footer_label .leng").parent().addClass("showImg");
      $("#footer_label .leng").addClass("zoom");
      $("#footer_label .leng").attr('src', "");            
    });
    
  });
})(jQuery);
