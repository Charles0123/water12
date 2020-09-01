var data = [
    {
      id:1,
      Name: "陳先生",
      JobTitle: "股長",
      Phone: "9011234567",
      Tel: "0221111111",
      Ex: "",
      Email: "apple@gmail.com",
      Business: "管線",
      Note: ""
    },
    {
      id:2,
      Name: "王小姐",
      JobTitle: "採購",
      Phone: "9011234567",
      Tel: "0221111111",
      Ex: "",
      Email: "wang@gmail.com",
      Business: "採購",
      Note: ""
    },
    {
      id:3,
      Name: "張先生",
      JobTitle: "",
      Phone: "9011234567",
      Tel: "0221111111",
      Ex: "",
      Email: "chang@gmail.com",
      Business: "",
      Note: ""
    }];
//業務職掌聯絡資訊kendo
$("#grid_newtb02").kendoGrid({
    columns: [            
        { field: "id", title: "ID",  width: "80px", editable: false, nullable: true },
        { field: "Name", title: "姓名",  width: "80px"  },
        { field: "JobTitle", title:"職稱",  width: "120px" },
        { field: "Phone", title:"行動電話",  width: "120px" },
        { field: "Tel", title:"住家電話",  width: "120px" },
        { field: "Ex", title:"網絡分機",  width: "120px" },
        { field: "Email", title:"電子信箱",  width: "120px" },
        { field: "Business", title:"業務內容",  width: "120px" },
        { field: "Note", title:"備註" },
        { command: ["edit", "destroy"], title: "編緝功能", width: "200px" 
    }],     
    dataSource: {
      // Custom transport with local data for demo purposes.
    transport: {
        read: function(options){
        options.success(data);
        },
        update: function(options){
        var updatedItem = options.data;
              // Save the updated item to the original datasource.
            data.splice(updatedItem.id - 1, 1, updatedItem);
              // On success.
            options.success();
        },
        create: function(options){
        options.data.id = data.length;
        data.push(options.data);
        ptions.success()
        },
        destroy: function(options){
        var indexToDelete;
        data.forEach(function(item, index){
            if(item.id === options.data.id){
            indexToDelete = index;
                return;
            }
        });
        console.log("destroy");
        data.splice(indexToDelete, 1);
        options.success();
        }
    },
    schema: {
        model: {
//            id: 'id',
//            fields: {
//              text: {
//                defaultValue: ''
//              }
//            }
        },
        errors: function(response) {
        return response.error;
        }
    }
    },
    pageable: {
            refresh: true,
            pageSizes: 20,
            buttonCount: 0,
            input: true,
            numeric: false,
            messages:
            {
                page: "",
                itemsPerPage: "",
                first: "首頁", last: "末頁",
                previous: "上一頁", next: "下一頁",
                refresh: "刷新",
            }
        },
    sortable: { showIndexes: true, mode: "multiple" },
    resizable: true,
    groupable: { messages: { empty: "拖曳至此以群組顯示" } },
    persistSelection: false,
    scrollable: { virtual: false },
    filterable: {
            extra: true,
            messages: { info: "", and: "且", or: "或", filter: "篩選", clear: "清除" },
            mode: "menu",
    }, 
    columnMenu: { messages:
            {
                columns: "欄位",
                filter: "篩選",
                sortAscending: "排序 (小->大)",
                sortDescending: "排序 (大->小)",
            },
        }, 
    edit: function(e){
//        e.sender.expandRow(e.container);
    console.log(e.model);
//            var model = e.model;
//            model.bind('change', function(e){
//              var tr = $('tr[data-uid=' + model.uid + ']');
//            });
    console.log("edit");
    },
    save: function(e){
    console.log("save");

    },
    cancel: function(e){
    console.log("cancel");
    },      
    toolbar: ['create','excel'],
    excel: {
            fileName: "Kendo UI Grid Export.xlsx",
            proxyURL: "https://demos.telerik.com/kendo-ui/service/export",
            filterable: true
        },
    editable: 'popup',
    
});

var data = [
    {
      id:1,
      Name: "陳先生",
      JobTitle: "股長",
      Phone: "9011234567",
      Tel: "0221111111",
      Ex: "",
      Email: "apple@gmail.com",
      Business: "管線",
      Note: ""
    },
    {
      id:2,
      Name: "王小姐",
      JobTitle: "採購",
      Phone: "9011234567",
      Tel: "0221111111",
      Ex: "",
      Email: "wang@gmail.com",
      Business: "採購",
      Note: ""
    }];
  //業務職掌聯絡資訊kendo
$("#grid_newtb03").kendoGrid({
    columns: [            
        { field: "id", title: "ID",  width: "80px", editable: false, nullable: true },
        { field: "Name", title: "姓名",  width: "80px"  },
        { field: "JobTitle", title:"職稱",  width: "120px" },
        { field: "Phone", title:"行動電話",  width: "120px" },
        { field: "Tel", title:"住家電話",  width: "120px" },
        { field: "Ex", title:"網絡分機",  width: "120px" },
        { field: "Email", title:"電子信箱",  width: "120px" },
        { field: "Business", title:"業務內容",  width: "120px" },
        { field: "Note", title:"備註" },
        { command: ["edit", "destroy"], title: "編緝功能", width: "200px" 
    }],     
    dataSource: {
      // Custom transport with local data for demo purposes.
    transport: {
        read: function(options){
        options.success(data);
        },
        update: function(options){
        var updatedItem = options.data;
              // Save the updated item to the original datasource.
            data.splice(updatedItem.id - 1, 1, updatedItem);
              // On success.
            options.success();
        },
        create: function(options){
        options.data.id = data.length;
        data.push(options.data);
        ptions.success()
        },
        destroy: function(options){
        var indexToDelete;
        data.forEach(function(item, index){
            if(item.id === options.data.id){
            indexToDelete = index;
                return;
            }
        });
        console.log("destroy");
        data.splice(indexToDelete, 1);
        options.success();
        }
    },
    schema: {
        model: {
//            id: 'id',
//            fields: {
//              text: {
//                defaultValue: ''
//              }
//            }
        },
        errors: function(response) {
        return response.error;
        }
    }
    },
    pageable: {
            refresh: true,
            pageSizes: 20,
            buttonCount: 0,
            input: true,
            numeric: false,
            messages:
            {
                page: "",
                itemsPerPage: "",
                first: "首頁", last: "末頁",
                previous: "上一頁", next: "下一頁",
                refresh: "刷新",
            }
        },
    sortable: { showIndexes: true, mode: "multiple" },
    resizable: true,
    groupable: { messages: { empty: "拖曳至此以群組顯示" } },
    persistSelection: false,
    scrollable: { virtual: false },
    filterable: {
            extra: true,
            messages: { info: "", and: "且", or: "或", filter: "篩選", clear: "清除" },
            mode: "menu",
    }, 
    columnMenu: { messages:
            {
                columns: "欄位",
                filter: "篩選",
                sortAscending: "排序 (小->大)",
                sortDescending: "排序 (大->小)",
            },
        }, 
    edit: function(e){
//        e.sender.expandRow(e.container);
    console.log(e.model);
//            var model = e.model;
//            model.bind('change', function(e){
//              var tr = $('tr[data-uid=' + model.uid + ']');
//            });
    console.log("edit");
    },
    save: function(e){
    console.log("save");

    },
    cancel: function(e){
    console.log("cancel");
    },      
    toolbar: ['create','excel'],
    excel: {
            fileName: "Kendo UI Grid Export.xlsx",
            proxyURL: "https://demos.telerik.com/kendo-ui/service/export",
            filterable: true
        },
    editable: 'popup',
    
});

  //業務職掌聯絡資訊kendo
$("#grid_newtb04").kendoGrid({
    columns: [            
        { field: "id", title: "ID",  width: "80px", editable: false, nullable: true },
        { field: "Name", title: "姓名",  width: "80px"  },
        { field: "JobTitle", title:"職稱",  width: "120px" },
        { field: "Phone", title:"行動電話",  width: "120px" },
        { field: "Tel", title:"住家電話",  width: "120px" },
        { field: "Ex", title:"網絡分機",  width: "120px" },
        { field: "Email", title:"電子信箱",  width: "120px" },
        { field: "Business", title:"業務內容",  width: "120px" },
        { field: "Note", title:"備註" },
        { command: ["edit", "destroy"], title: "編緝功能", width: "200px" 
    }],     
    dataSource: {
      // Custom transport with local data for demo purposes.
    transport: {
        read: function(options){
        options.success(data);
        },
        update: function(options){
        var updatedItem = options.data;
              // Save the updated item to the original datasource.
            data.splice(updatedItem.id - 1, 1, updatedItem);
              // On success.
            options.success();
        },
        create: function(options){
        options.data.id = data.length;
        data.push(options.data);
        ptions.success()
        },
        destroy: function(options){
        var indexToDelete;
        data.forEach(function(item, index){
            if(item.id === options.data.id){
            indexToDelete = index;
                return;
            }
        });
        console.log("destroy");
        data.splice(indexToDelete, 1);
        options.success();
        }
    },
    schema: {
        model: {
//            id: 'id',
//            fields: {
//              text: {
//                defaultValue: ''
//              }
//            }
        },
        errors: function(response) {
        return response.error;
        }
    }
    },
    pageable: {
            refresh: true,
            pageSizes: 20,
            buttonCount: 0,
            input: true,
            numeric: false,
            messages:
            {
                page: "",
                itemsPerPage: "",
                first: "首頁", last: "末頁",
                previous: "上一頁", next: "下一頁",
                refresh: "刷新",
            }
        },
    sortable: { showIndexes: true, mode: "multiple" },
    resizable: true,
    groupable: { messages: { empty: "拖曳至此以群組顯示" } },
    persistSelection: false,
    scrollable: { virtual: false },
    filterable: {
            extra: true,
            messages: { info: "", and: "且", or: "或", filter: "篩選", clear: "清除" },
            mode: "menu",
    }, 
    columnMenu: { messages:
            {
                columns: "欄位",
                filter: "篩選",
                sortAscending: "排序 (小->大)",
                sortDescending: "排序 (大->小)",
            },
        }, 
    edit: function(e){
//        e.sender.expandRow(e.container);
    console.log(e.model);
//            var model = e.model;
//            model.bind('change', function(e){
//              var tr = $('tr[data-uid=' + model.uid + ']');
//            });
    console.log("edit");
    },
    save: function(e){
    console.log("save");

    },
    cancel: function(e){
    console.log("cancel");
    },      
    toolbar: ['create','excel'],
    excel: {
            fileName: "Kendo UI Grid Export.xlsx",
            proxyURL: "https://demos.telerik.com/kendo-ui/service/export",
            filterable: true
        },
    editable: 'popup',
    
});

  //業務職掌聯絡資訊kendo
$("#grid_newtb05").kendoGrid({
    columns: [            
        { field: "id", title: "ID",  width: "80px", editable: false, nullable: true },
        { field: "Name", title: "姓名",  width: "80px"  },
        { field: "JobTitle", title:"職稱",  width: "120px" },
        { field: "Phone", title:"行動電話",  width: "120px" },
        { field: "Tel", title:"住家電話",  width: "120px" },
        { field: "Ex", title:"網絡分機",  width: "120px" },
        { field: "Email", title:"電子信箱",  width: "120px" },
        { field: "Business", title:"業務內容",  width: "120px" },
        { field: "Note", title:"備註" },
        { command: ["edit", "destroy"], title: "編緝功能", width: "200px" 
    }],     
    dataSource: {
      // Custom transport with local data for demo purposes.
    transport: {
        read: function(options){
        options.success(data);
        },
        update: function(options){
        var updatedItem = options.data;
              // Save the updated item to the original datasource.
            data.splice(updatedItem.id - 1, 1, updatedItem);
              // On success.
            options.success();
        },
        create: function(options){
        options.data.id = data.length;
        data.push(options.data);
        ptions.success()
        },
        destroy: function(options){
        var indexToDelete;
        data.forEach(function(item, index){
            if(item.id === options.data.id){
            indexToDelete = index;
                return;
            }
        });
        console.log("destroy");
        data.splice(indexToDelete, 1);
        options.success();
        }
    },
    schema: {
        model: {
//            id: 'id',
//            fields: {
//              text: {
//                defaultValue: ''
//              }
//            }
        },
        errors: function(response) {
        return response.error;
        }
    }
    },
    pageable: {
            refresh: true,
            pageSizes: 20,
            buttonCount: 0,
            input: true,
            numeric: false,
            messages:
            {
                page: "",
                itemsPerPage: "",
                first: "首頁", last: "末頁",
                previous: "上一頁", next: "下一頁",
                refresh: "刷新",
            }
        },
    sortable: { showIndexes: true, mode: "multiple" },
    resizable: true,
    groupable: { messages: { empty: "拖曳至此以群組顯示" } },
    persistSelection: false,
    scrollable: { virtual: false },
    filterable: {
            extra: true,
            messages: { info: "", and: "且", or: "或", filter: "篩選", clear: "清除" },
            mode: "menu",
    }, 
    columnMenu: { messages:
            {
                columns: "欄位",
                filter: "篩選",
                sortAscending: "排序 (小->大)",
                sortDescending: "排序 (大->小)",
            },
        }, 
    edit: function(e){
//        e.sender.expandRow(e.container);
    console.log(e.model);
//            var model = e.model;
//            model.bind('change', function(e){
//              var tr = $('tr[data-uid=' + model.uid + ']');
//            });
    console.log("edit");
    },
    save: function(e){
    console.log("save");

    },
    cancel: function(e){
    console.log("cancel");
    },      
    toolbar: ['create','excel'],
    excel: {
            fileName: "Kendo UI Grid Export.xlsx",
            proxyURL: "https://demos.telerik.com/kendo-ui/service/export",
            filterable: true
        },
    editable: 'popup',
    
});

  //業務職掌聯絡資訊kendo
$("#grid_newtb06").kendoGrid({
    columns: [            
        { field: "id", title: "ID",  width: "80px", editable: false, nullable: true },
        { field: "Name", title: "姓名",  width: "80px"  },
        { field: "JobTitle", title:"職稱",  width: "120px" },
        { field: "Phone", title:"行動電話",  width: "120px" },
        { field: "Tel", title:"住家電話",  width: "120px" },
        { field: "Ex", title:"網絡分機",  width: "120px" },
        { field: "Email", title:"電子信箱",  width: "120px" },
        { field: "Business", title:"業務內容",  width: "120px" },
        { field: "Note", title:"備註" },
        { command: ["edit", "destroy"], title: "編緝功能", width: "200px" 
    }],     
    dataSource: {
      // Custom transport with local data for demo purposes.
    transport: {
        read: function(options){
        options.success(data);
        },
        update: function(options){
        var updatedItem = options.data;
              // Save the updated item to the original datasource.
            data.splice(updatedItem.id - 1, 1, updatedItem);
              // On success.
            options.success();
        },
        create: function(options){
        options.data.id = data.length;
        data.push(options.data);
        ptions.success()
        },
        destroy: function(options){
        var indexToDelete;
        data.forEach(function(item, index){
            if(item.id === options.data.id){
            indexToDelete = index;
                return;
            }
        });
        console.log("destroy");
        data.splice(indexToDelete, 1);
        options.success();
        }
    },
    schema: {
        model: {
//            id: 'id',
//            fields: {
//              text: {
//                defaultValue: ''
//              }
//            }
        },
        errors: function(response) {
        return response.error;
        }
    }
    },
    pageable: {
            refresh: true,
            pageSizes: 20,
            buttonCount: 0,
            input: true,
            numeric: false,
            messages:
            {
                page: "",
                itemsPerPage: "",
                first: "首頁", last: "末頁",
                previous: "上一頁", next: "下一頁",
                refresh: "刷新",
            }
        },
    sortable: { showIndexes: true, mode: "multiple" },
    resizable: true,
    groupable: { messages: { empty: "拖曳至此以群組顯示" } },
    persistSelection: false,
    scrollable: { virtual: false },
    filterable: {
            extra: true,
            messages: { info: "", and: "且", or: "或", filter: "篩選", clear: "清除" },
            mode: "menu",
    }, 
    columnMenu: { messages:
            {
                columns: "欄位",
                filter: "篩選",
                sortAscending: "排序 (小->大)",
                sortDescending: "排序 (大->小)",
            },
        }, 
    edit: function(e){
//        e.sender.expandRow(e.container);
    console.log(e.model);
//            var model = e.model;
//            model.bind('change', function(e){
//              var tr = $('tr[data-uid=' + model.uid + ']');
//            });
    console.log("edit");
    },
    save: function(e){
    console.log("save");

    },
    cancel: function(e){
    console.log("cancel");
    },      
    toolbar: ['create','excel'],
    excel: {
            fileName: "Kendo UI Grid Export.xlsx",
            proxyURL: "https://demos.telerik.com/kendo-ui/service/export",
            filterable: true
        },
    editable: 'popup',
    
});

  //業務職掌聯絡資訊kendo
$("#grid_newtb07").kendoGrid({
    columns: [            
        { field: "id", title: "ID",  width: "80px", editable: false, nullable: true },
        { field: "Name", title: "姓名",  width: "80px"  },
        { field: "JobTitle", title:"職稱",  width: "120px" },
        { field: "Phone", title:"行動電話",  width: "120px" },
        { field: "Tel", title:"住家電話",  width: "120px" },
        { field: "Ex", title:"網絡分機",  width: "120px" },
        { field: "Email", title:"電子信箱",  width: "120px" },
        { field: "Business", title:"業務內容",  width: "120px" },
        { field: "Note", title:"備註" },
        { command: ["edit", "destroy"], title: "編緝功能", width: "200px" 
    }],     
    dataSource: {
      // Custom transport with local data for demo purposes.
    transport: {
        read: function(options){
        options.success(data);
        },
        update: function(options){
        var updatedItem = options.data;
              // Save the updated item to the original datasource.
            data.splice(updatedItem.id - 1, 1, updatedItem);
              // On success.
            options.success();
        },
        create: function(options){
        options.data.id = data.length;
        data.push(options.data);
        ptions.success()
        },
        destroy: function(options){
        var indexToDelete;
        data.forEach(function(item, index){
            if(item.id === options.data.id){
            indexToDelete = index;
                return;
            }
        });
        console.log("destroy");
        data.splice(indexToDelete, 1);
        options.success();
        }
    },
    schema: {
        model: {
//            id: 'id',
//            fields: {
//              text: {
//                defaultValue: ''
//              }
//            }
        },
        errors: function(response) {
        return response.error;
        }
    }
    },
    pageable: {
            refresh: true,
            pageSizes: 20,
            buttonCount: 0,
            input: true,
            numeric: false,
            messages:
            {
                page: "",
                itemsPerPage: "",
                first: "首頁", last: "末頁",
                previous: "上一頁", next: "下一頁",
                refresh: "刷新",
            }
        },
    sortable: { showIndexes: true, mode: "multiple" },
    resizable: true,
    groupable: { messages: { empty: "拖曳至此以群組顯示" } },
    persistSelection: false,
    scrollable: { virtual: false },
    filterable: {
            extra: true,
            messages: { info: "", and: "且", or: "或", filter: "篩選", clear: "清除" },
            mode: "menu",
    }, 
    columnMenu: { messages:
            {
                columns: "欄位",
                filter: "篩選",
                sortAscending: "排序 (小->大)",
                sortDescending: "排序 (大->小)",
            },
        }, 
    edit: function(e){
//        e.sender.expandRow(e.container);
    console.log(e.model);
//            var model = e.model;
//            model.bind('change', function(e){
//              var tr = $('tr[data-uid=' + model.uid + ']');
//            });
    console.log("edit");
    },
    save: function(e){
    console.log("save");

    },
    cancel: function(e){
    console.log("cancel");
    },      
    toolbar: ['create','excel'],
    excel: {
            fileName: "Kendo UI Grid Export.xlsx",
            proxyURL: "https://demos.telerik.com/kendo-ui/service/export",
            filterable: true
        },
    editable: 'popup',
    
});