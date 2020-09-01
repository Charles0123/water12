function makegridsrc(str) {
  switch(str){
    case "newtb01_1": {
      //業務職掌聯絡資訊- 區處 -水公司
      var x = [
            {
                field: "id",
                title: "ID",
                width: "80px",
                editable: false,
                nullable: true
              },
              {
                field: "Name",
                title: "姓名",
                width: "80px"
              },
              {
                field: "JobTitle",
                title: "職稱",
                width: "120px"
              },
              {
                field: "Phone",
                title: "行動電話",
                width: "120px"
              },
              {
                field: "Tel",
                title: "住家電話",
                width: "120px"
              },
              {
                field: "Ex",
                title: "網絡分機",
                width: "120px"
              },
              {
                field: "Email",
                title: "電子信箱",
                width: "120px"
              },
              {
                field: "Business",
                title: "業務內容",
                width: "120px"
              },
              {
                field: "Note",
                title: "備註"
              },
              {
                command: ["edit", "destroy"],
                title: "編緝功能",
                width: "200px"

              }
            ];
      var y = [
            {
              id: 1,
              Name: "陳先生1",
              JobTitle: "股長",
              Phone: "9011234567",
              Tel: "0221111111",
              Ex: "",
              Email: "apple@gmail.com",
              Business: "管線",
              Note: ""
            },
            {
              id: 2,
              Name: "王小姐1",
              JobTitle: "採購",
              Phone: "9011234567",
              Tel: "0221111111",
              Ex: "",
              Email: "wang@gmail.com",
              Business: "採購",
              Note: ""
            },
            {
              id: 3,
              Name: "張先生",
              JobTitle: "",
              Phone: "9011234567",
              Tel: "0221111111",
              Ex: "",
              Email: "chang@gmail.com",
              Business: "",
              Note: ""
            },
            {
              id: 2,
              Name: "王小姐1",
              JobTitle: "採購",
              Phone: "9011234567",
              Tel: "0221111111",
              Ex: "",
              Email: "wang@gmail.com",
              Business: "採購",
              Note: ""
            },
            {
              id: 3,
              Name: "張先生",
              JobTitle: "",
              Phone: "9011234567",
              Tel: "0221111111",
              Ex: "",
              Email: "chang@gmail.com",
              Business: "",
              Note: ""
            },
            {
              id: 2,
              Name: "王小姐1",
              JobTitle: "採購",
              Phone: "9011234567",
              Tel: "0221111111",
              Ex: "",
              Email: "wang@gmail.com",
              Business: "採購",
              Note: ""
            },
            {
              id: 3,
              Name: "張先生",
              JobTitle: "",
              Phone: "9011234567",
              Tel: "0221111111",
              Ex: "",
              Email: "chang@gmail.com",
              Business: "",
              Note: ""
            },
            {
              id: 2,
              Name: "王小姐1",
              JobTitle: "採購",
              Phone: "9011234567",
              Tel: "0221111111",
              Ex: "",
              Email: "wang@gmail.com",
              Business: "採購",
              Note: ""
            },
            {
              id: 3,
              Name: "張先生",
              JobTitle: "",
              Phone: "9011234567",
              Tel: "0221111111",
              Ex: "",
              Email: "chang@gmail.com",
              Business: "",
              Note: ""
            },
            {
              id: 2,
              Name: "王小姐1",
              JobTitle: "採購",
              Phone: "9011234567",
              Tel: "0221111111",
              Ex: "",
              Email: "wang@gmail.com",
              Business: "採購",
              Note: ""
            },
            {
              id: 3,
              Name: "張先生",
              JobTitle: "",
              Phone: "9011234567",
              Tel: "0221111111",
              Ex: "",
              Email: "chang@gmail.com",
              Business: "",
              Note: ""
            }

          ];
      break;
    }
    case "newtb01_2": {
      //業務職掌聯絡資訊- 區處 -配合廠商
      var x = [
        {
                field: "id",
                title: "ID",
                width: "80px",
                editable: false,
                nullable: true
              },
              {
                field: "Name",
                title: "姓名",
                width: "80px"
              },
              {
                field: "JobTitle",
                title: "職稱",
                width: "120px"
              },
              {
                field: "Phone",
                title: "行動電話",
                width: "120px"
              },
              {
                field: "Tel",
                title: "住家電話",
                width: "120px"
              },
              {
                field: "Ex",
                title: "網絡分機",
                width: "120px"
              },
              {
                field: "Email",
                title: "電子信箱",
                width: "120px"
              },
              {
                field: "Business",
                title: "業務內容",
                width: "120px"
              },
              {
                field: "Note",
                title: "備註"
              },
              {
                command: ["edit", "destroy"],
                title: "編緝功能",
                width: "200px"
              }
            ];
      var y = [
    {
          id: 1,
          Name: "陳先生1",
          JobTitle: "股長",
          Phone: "9011234567",
          Tel: "0221111111",
          Ex: "",
          Email: "apple@gmail.com",
          Business: "管線",
          Note: ""
        },
        {
          id: 2,
          Name: "王小姐1",
          JobTitle: "採購",
          Phone: "9011234567",
          Tel: "0221111111",
          Ex: "",
          Email: "wang@gmail.com",
          Business: "採購",
          Note: ""
        },
        {
          id: 3,
          Name: "張先生",
          JobTitle: "",
          Phone: "9011234567",
          Tel: "0221111111",
          Ex: "",
          Email: "chang@gmail.com",
          Business: "",
          Note: ""
        }
  ];
      break;
    }
  }
  return [x,y];
}
  
  
  //常用系統連結
  var col_table01 = [
    // { field: "id", title: "ID",  width: "80px", editable: false, nullable: true },
          {
            field: "Item",
            title: "項次",
            width: "80px",
            editable: false,
            nullable: true
          },
          {
            field: "Unit",
            title: "業管單位",
            width: "120px"
          },
          {
            field: "Class",
            title: "類別",
            width: "120px"
          },
          {
            field: "LinkName",
            title: "系統連結名稱",
            width: "120px"
          },
          {
            field: "Link",
            title: "連結",
            width: "120px",
          },
          {
            command: ["edit", "destroy"],
            title: "編緝功能",
            width: "200px"
          }
  ];
  var datSrc_table01 = [
      {
        Item: "1",
        Unit: "漏防課",
        Class: "1",
        LinkName: "供水監測平台",
        Link: ""
      },
      {
        Item: "2",
        Unit: "漏防課",
        Class: "1",
        LinkName: "圖資服務平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      },
      {
        Item: "3",
        Unit: "漏防課",
        Class: "1",
        LinkName: "水情公開平台",
        Link: ""
      }
    ];

(function ($) {
  $(document).ready(function () {  
    
    //綜合資訊
    $("#dsr_Info div .tab_sheet li").on("click", function (e) {
      if($(this).hasClass("active")){
        
      }
      else {
        if($(this).closest(".contan").find("ul li").hasClass("active")){
          $(this).closest(".contan").find("ul li").removeClass("active");
          
        }
        $(this).addClass("active");
        var tabNo = $(this).closest("div").find("ul li").index(this);  
        var divNo = $(this).closest("#dsr_Info").find("#tab_contant .tab");
        if(divNo.hasClass("active"))
          divNo.removeClass("active");
        $(".tab:eq("+tabNo+")").addClass("active");        
      }     
    });   
//    $("#tabs ul > li > a").on("click", function (e) {
//      e.preventDefault();
//      e.stopPropagation();
//      $(this).parent().find("a").removeClass("active");
//      $(this).addClass("active");
//    });

  });  

  
  
})(jQuery);
