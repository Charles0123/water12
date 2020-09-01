(function($){
  $(document).ready(function(){
     $('.menu_header, .close_menu').on('click',function(e){
      $('.close_menu').toggleClass("rwd");
      if($('.close_menu').hasClass("rwd")){
        $('.menu').css({display: 'none', zIndex: '-100'});
      }
      else
        $('.menu').css({display: 'block', zIndex: '12'});
    });
    
    $(".menu_wrapper .menu_content .menu_content_title").on("click",function(e){
      $(".menu_content_submenu_content").removeClass("menu_content_submenu_content-active");
      var indno = $(this).closest(".menu_wrapper").find(".menu_content_title").index(this);
//      alert(indno);
      if($(this).parent().hasClass("menu_content-active")){
        $(this).parent().removeClass("menu_content-active");
      }
      else {
        var path = $(this).closest(".menu_wrapper").find(".menu_content");
        if(path.hasClass("menu_content-active"))
          path.removeClass("menu_content-active");                     
      }
      $(this).parent().addClass("menu_content-active");
    });   
    
    $(".menu_content_submenu_content").on("click",function(e){
      var indno =$(this).closest(".menu_content_submenu").find(".menu_content_submenu_content").index(this);
//      alert(indno);          
        $(this).parent().find(".menu_content_submenu_content").removeClass("menu_content_submenu_content-active");
        $(this).addClass("menu_content_submenu_content-active");
      
    });
    $(".dataCCTV_content_picture_controll img").on("click", function(e){
          if($(this).hasClass("zooIn")){
            $(this).removeClass("zooIn"); 
            $(".dataCCTV").removeClass("dataCCTV_zooin");
          }
          else{
            $(".dataCCTV").addClass("dataCCTV_zooin");
            $(this).addClass("zooIn");          
            
          }
          
      });
//    設定scroll樣式
    $(".menu_content_submenu_wrapper, html").niceScroll({
          cursorcolor:"rgba(20,20,20,0.2)",
          cursorborder:"#eeeeee",
          background:"#eeeeee",
          cursorborderradius:0
      });
  });
})(jQuery);

