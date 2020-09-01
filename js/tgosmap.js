"use strict";

var latY, longX;
var x_x = 0;
var IP = ['220.134.42.63:8080'];
var WIFuntions = ['WI_StationData', 'GetRealtimeData', 'WI_elevData'];
var sections = ['轄區供水系統', '供水高程系統'];
var defaultOpacity = 0.6;
var toSupContent = ["kgf/cm2", "M3"];
var toUppercaseContent = ["m"];
var stationIDStorage = [];
var fromAllOrImportantSelect = true;
var houseMarkers = {};
var houseMessageBoxes = {};
var houseMessageBoxesName = {};
var activeLinkNumber = 0;
var dist_ = false;
//x
var messageBoxOffset = {
    "X": 10,
    "Y": -30
};
//house lab offset
var nameWindowOffset = {
    "X": -40,
    "Y": 45
};
//物理量lab offset
var physicNameWindowOffset = {
    "X": -65,
    "Y": 50
};
//開啟資訊是窗後icon的偏移位子
var deviation = {
    "X": 10,
    "Y": 10
};
var debuggerCount = 0;
var labelInFoForPMFM, changeMark = [];
var tt, c_c = 0;
var memoPositionForAll = [
    new TGOS.TGSize(10, 160),
    new TGOS.TGSize(-260, 60),
    new TGOS.TGSize(-200, 30),
    new TGOS.TGSize(100, 160),
    new TGOS.TGSize(120, 0),
    new TGOS.TGSize(100, -160),
    new TGOS.TGSize(-60, -100),
    new TGOS.TGSize(-160, -30),
    new TGOS.TGSize(100, 60),
];
var buttonCombinations = {
    "TGOS街道圖": {
        'TGOS街道圖': {
            'id': 'tgosstreetmap',
            'buttonText': "TGOS街道圖"
        }
    },
    "國土測繪": {
        '高程圖(套等高線圖)': {
            "id": "nlsc_elev",
            'buttonText': "高程圖(套等高線圖)",
            'wmsurl': 'https://wms.nlsc.gov.tw/wms?&SERVICE=WMS&VERSION=1.1.1&REQUEST=GetMap&BBOX=144847.277860,2406316.107441,352136.448733,2807602.054796&SRS=EPSG:3826&WIDTH=480&HEIGHT=640&LAYERS=EMAP5&STYLES=&FORMAT=image/png&DPI=96&MAP_RESOLUTION=96&FORMAT_OPTIONS=dpi:96&TRANSPARENT=TRUE',
            'fullWMS': true
        },
        '衛星圖(正射影圖)': {
            "id": "nlsc_dom",
            'buttonText': "衛星圖(正射影圖)",
            'wmsurl': 'https://wms.nlsc.gov.tw/wms?&SERVICE=WMS&VERSION=1.1.1&REQUEST=GetMap&BBOX=144847.277860,2406316.107441,352136.448733,2807602.054796&SRS=EPSG:3826&WIDTH=480&HEIGHT=640&LAYERS=PHOTO2&STYLES=&FORMAT=image/png&DPI=96&MAP_RESOLUTION=96&FORMAT_OPTIONS=dpi:96&TRANSPARENT=TRUE',
            'fullWMS': true
        },
        '地形圖(1/5000基本地型圖)': {
            "id": "nlsc_topo",
            'buttonText': "地形圖(1/5000基本地型圖)",
            'wmsurl': 'https://wms.nlsc.gov.tw/wms?&SERVICE=WMS&VERSION=1.1.1&REQUEST=GetMap&BBOX=144847.277860,2406316.107441,352136.448733,2807602.054796&SRS=EPSG:3826&WIDTH=480&HEIGHT=640&LAYERS=B5000&STYLES=&FORMAT=image/png&DPI=96&MAP_RESOLUTION=96&FORMAT_OPTIONS=dpi:96&TRANSPARENT=TRUE',
            'fullWMS': true
        }
    },
    "外部介接圖層": {
        "地籍圖": {
            'id': 'nlsc_cm',
            'buttonText': "地籍圖(國土測繪)"
        },
        "國土利用調查成果": {
            'id': 'nlsc_nlsr',
            'buttonText': "國土利用調查成果(國土利用調查成果圖)"
        },
        "都市計會使用分區圖": {
            'id': 'nlsc_urp',
            'buttonText': "都市計會使用分區圖(108年)(台地API)",
            'wmsurl': 'http://10.12.144.42:8080/geoserver/UPA/wms?service=WMS&request=GetMap&layers=UPA:ALL_d&bbox=278503.43922897946,2729667.811740391,351643.4500732422,2799149.320055681&width=768&height=729&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
        }
    },
    "轄區供水系統": {
        //        id: 自定義面圖層編號
        //        value: 依照water.ini的轄區供水系統編號定義
        "總覽圖": {
            'name': 'elev_itm',
            'id': 'Elev_ITM_0',
            'placeholder': '*',
            "buttonText": "總覽圖",
            'value': 1,
            'wmsurl': {
                "板新給水廠": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Ban%20Sin_scope&bbox=272110.71299078554,2743568.4297493896,285807.81244606024,2758997.000045486&width=681&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "鶯歌服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Yingge&bbox=281895.2447104211,2742578.4774454506,300249.9665335865,2763897.4774454506&width=661&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "樹林服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Shulin&bbox=286503.2477835865,2759475.7274454506,293635.2477835865,2768081.4774454506&width=636&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "土城服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Tucheng&bbox=291163.5602835865,2758712.4774454506,298675.4977835865,2765432.2274454506&width=768&height=687&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "板橋服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Banqiao&bbox=292863.4040335865,2761864.2274454506,299655.57203609165,2770251.4774454506&width=621&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "新莊服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Xinzhuang&bbox=289420.2087284418,2765299.2274454506,298387.7803280551,2773458.4774454506&width=768&height=698&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "泰山營運所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Luzhou&bbox=286932.1540335865,2773890.1221998935,299574.4665335865,2784745.2089639166&width=768&height=659&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "蘆洲服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Taishan&bbox=288056.7477835865,2769016.2274454506,297522.0915335865,2780475.7274454506&width=634&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true"
            }
        },
        "板新給水廠": {
            'name': 'elev_itm',
            'id': 'Elev_ITM_1',
            'placeholder': 1201,
            "buttonText": "板新給水廠",
            'value': 2,
            'wmsurl': {
                "鶯歌服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Yingge&bbox=281895.2447104211,2742578.4774454506,300249.9665335865,2763897.4774454506&width=661&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "樹林服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Shulin&bbox=286503.2477835865,2759475.7274454506,293635.2477835865,2768081.4774454506&width=636&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "土城服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Tucheng&bbox=291163.5602835865,2758712.4774454506,298675.4977835865,2765432.2274454506&width=768&height=687&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "板橋服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Banqiao&bbox=292863.4040335865,2761864.2274454506,299655.57203609165,2770251.4774454506&width=621&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "新莊服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Xinzhuang&bbox=289420.2087284418,2765299.2274454506,298387.7803280551,2773458.4774454506&width=768&height=698&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "蘆洲服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Luzhou&bbox=286932.1540335865,2773890.1221998935,299574.4665335865,2784745.2089639166&width=768&height=659&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "泰山營運所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Taishan&bbox=288056.7477835865,2769016.2274454506,297522.0915335865,2780475.7274454506&width=634&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
            }
        },
        "鶯歌服務所": {
            'name': 'elev_itm',
            'id': 'Elev_ITM_2',
            'placeholder': 1204,
            "buttonText": "鶯歌服務所",
            'value': 3,
            'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Yingge&bbox=281895.2447104211,2742578.4774454506,300249.9665335865,2763897.4774454506&width=661&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
        },
        "樹林服務所": {
            'name': 'elev_itm',
            'id': 'Elev_ITM_3',
            'placeholder': 1203,
            "buttonText": "樹林服務所",
            'value': 4,
            'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Shulin&bbox=286503.2477835865,2759475.7274454506,293635.2477835865,2768081.4774454506&width=636&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
        },
        "土城服務所": {
            'name': 'elev_itm',
            'id': 'Elev_ITM_4',
            'placeholder': 1205,
            "buttonText": "土城服務所",
            'value': 5,
            'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Tucheng&bbox=291163.5602835865,2758712.4774454506,298675.4977835865,2765432.2274454506&width=768&height=687&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
        },
        "板橋服務所": {
            'name': 'elev_itm',
            'id': 'Elev_ITM_5',
            'placeholder': 1209,
            "buttonText": "板橋服務所",
            'value': 7,
            'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Banqiao&bbox=292863.4040335865,2761864.2274454506,299655.57203609165,2770251.4774454506&width=621&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
        },
        "新莊服務所": {
            'name': 'elev_itm',
            'id': 'Elev_ITM_6',
            'placeholder': 1208,
            "buttonText": "新莊服務所",
            'value': 6,
            'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Xinzhuang&bbox=289420.2087284418,2765299.2274454506,298387.7803280551,2773458.4774454506&width=768&height=698&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
        },
        "蘆洲服務所": {
            'name': 'elev_itm',
            'id': 'Elev_ITM_8',
            'placeholder': 1207,
            "buttonText": "蘆洲服務所",
            'value': 9,
            'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Luzhou&bbox=286932.1540335865,2773890.1221998935,299574.4665335865,2784745.2089639166&width=768&height=659&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
        },
        "泰山營運所": {
            'name': 'elev_itm',
            'id': 'Elev_ITM_7',
            'placeholder': 1206,
            "buttonText": "泰山營運所",
            'value': 8,
            'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Taishan&bbox=288056.7477835865,2769016.2274454506,297522.0915335865,2780475.7274454506&width=634&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
        },
        "北水": {
            'name': 'elev_itm',
            'id': 'Elev_ITM_9',
            'placeholder': 9999,
            "buttonText": "北水",
            'value': 10,
            'wmsurl': {
                "樹林所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Shulin&bbox=286503.2477835865,2759475.7274454506,293635.2477835865,2768081.4774454506&width=636&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "土城所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Tucheng&bbox=291163.5602835865,2758712.4774454506,298675.4977835865,2765432.2274454506&width=768&height=687&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "板橋所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Banqiao&bbox=292863.4040335865,2761864.2274454506,299655.57203609165,2770251.4774454506&width=621&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "新莊所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Xinzhuang&bbox=289420.2087284418,2765299.2274454506,298387.7803280551,2773458.4774454506&width=768&height=698&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "泰山所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Taishan&bbox=288056.7477835865,2769016.2274454506,297522.0915335865,2780475.7274454506&width=634&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "蘆洲所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Luzhou&bbox=286932.1540335865,2773890.1221998935,299574.4665335865,2784745.2089639166&width=768&height=659&srs=EPSG:3826&format=image/png&TRANSPARENT=true"
            }
        }
    } //北水控制TGOSMAP ID

};
var NW = ["Elev_ITM_3", "Elev_ITM_4", "Elev_ITM_5", "Elev_ITM_6", "Elev_ITM_7", "Elev_ITM_8"]; //多選按鈕資料
var BS = ["Elev_ITM_2", "Elev_ITM_3", "Elev_ITM_4", "Elev_ITM_5", "Elev_ITM_6", "Elev_ITM_7", "Elev_ITM_8"];
var multipleOptions = {
    '進出水點': {
        'id': 'Elev_DP',
        'name': 'elev_msr',
        'value': '進出水點'
    },
    '水量': {
        'id': 'Elev_WT',
        'name': 'elev_msr',
        'value': '水量'
    },
    '水壓': {
        'id': 'Elev_PM',
        'name': 'elev_msr',
        'value': '水壓'
    },
    '水質': {
        'id': 'Elev_PH',
        'name': 'elev_msr',
        'value': '水質'
    },
    '水位': {
        'id': 'Elev_LM',
        'name': 'elev_msr',
        'value': '水位'
    },
    '加壓站': {
        'id': 'Elev_BS',
        'name': 'elev_msr',
        'value': '加壓站'
    },
    '配水池': {
        'id': 'Elev_DR',
        'name': 'elev_msr',
        'value': '配水池'
    },
    '電動閥': {
        'id': 'Elev_EV',
        'name': 'elev_msr',
        'value': '電動閥'
    } //站別

};
var stationType = {
    'ciy': 'skipnow',
    'city': './images/場所-4040.png',
    '取水站': './images/取水站-綠-4055.png',
    '監測站': './images/監測站-綠-4055.png',
    '監控站': './images/監控站-綠-4055.png',
    '加壓站': './images/加壓站-綠-4055.png',
    '淨水場': './images/淨水場-綠-4055.png',
    '配水池': './images/配水池-綠-4055.png',
};

var stationTypeYellow = {
    'ciy': 'skipnow',
    'city': './images/場所-4040.png',
    '取水站': './images/取水站-黃-4055.png',
    '監測站': './images/監測站-黃-4055.png',
    '監控站': './images/監控站-黃-4055.png',
    '加壓站': './images/加壓站-黃-4055.png',
    '淨水場': './images/淨水場-黃-4055.png',
    '配水池': './images/配水池-黃-4055.png',
};
var stationTypeRed = {
    'ciy': 'skipnow',
    'city': './images/場所-4040.png',
    '取水站': './images/取水站-紅-6060.gif',
    '監測站': './images/監測站-紅-6060.gif',
    '監控站': './images/監控站-紅-6060.gif',
    '加壓站': './images/加壓站-紅-6060.gif',
    '淨水場': './images/淨水場-紅-6060.gif',
    '配水池': './images/配水池-紅-6060.gif',
};
var stationTypeGrey = {
    'ciy': 'skipnow',
    'city': './images/場所-4040.png',
    '取水站': './images/取水站-灰-4055.png',
    '監測站': './images/監測站-灰-4055.png',
    '監控站': './images/監控站-灰-4055.png',
    '加壓站': './images/加壓站-灰-4055.png',
    '淨水場': './images/淨水場-灰-4055.png',
    '配水池': './images/配水池-灰-4055.png',
};

var stationType_Animated = {
    "加壓站-灰-箭頭-B-01-6060.gif": "./images/加壓站-灰-箭頭-B-01-6060.gif",
    "加壓站-灰-箭頭-B-02-6060.gif": "./images/加壓站-灰-箭頭-B-02-6060.gif",
    "加壓站-灰-箭頭-B-03-6060.gif": "./images/加壓站-灰-箭頭-B-03-6060.gif",
    "加壓站-灰-箭頭-B-04-6060.gif": "./images/加壓站-灰-箭頭-B-04-6060.gif",
    "加壓站-灰-箭頭-B-05-6060.gif": "./images/加壓站-灰-箭頭-B-05-6060.gif",
    "加壓站-灰-箭頭-B-06-6060.gif": "./images/加壓站-灰-箭頭-B-06-6060.gif",
    "加壓站-灰-箭頭-B-07-6060.gif": "./images/加壓站-灰-箭頭-B-07-6060.gif",
    "加壓站-灰-箭頭-B-08-6060.gif": "./images/加壓站-灰-箭頭-B-08-6060.gif",
    "加壓站-灰-箭頭-B-09-6060.gif": "./images/加壓站-灰-箭頭-B-09-6060.gif",
    "加壓站-灰-箭頭-B-10-6060.gif": "./images/加壓站-灰-箭頭-B-10-6060.gif",
    "加壓站-灰-箭頭-B-11-6060.gif": "./images/加壓站-灰-箭頭-B-11-6060.gif",
    "加壓站-灰-箭頭-B-12-6060.gif": "./images/加壓站-灰-箭頭-B-12-6060.gif",
    "加壓站-灰-箭頭-B-13-6060.gif": "./images/加壓站-灰-箭頭-B-13-6060.gif",
    "加壓站-灰-箭頭-B-14-6060.gif": "./images/加壓站-灰-箭頭-B-14-6060.gif",
    "加壓站-灰-箭頭-B-15-6060.gif": "./images/加壓站-灰-箭頭-B-15-6060.gif",
    "加壓站-灰-箭頭-B-16-6060.gif": "./images/加壓站-灰-箭頭-B-16-6060.gif",
    "監控站-灰-箭頭-B-01-6060.gif": "./images/監控站-灰-箭頭-B-01-6060.gif",
    "監控站-灰-箭頭-B-02-6060.gif": "./images/監控站-灰-箭頭-B-02-6060.gif",
    "監控站-灰-箭頭-B-03-6060.gif": "./images/監控站-灰-箭頭-B-03-6060.gif",
    "監控站-灰-箭頭-B-04-6060.gif": "./images/監控站-灰-箭頭-B-04-6060.gif",
    "監控站-灰-箭頭-B-05-6060.gif": "./images/監控站-灰-箭頭-B-05-6060.gif",
    "監控站-灰-箭頭-B-06-6060.gif": "./images/監控站-灰-箭頭-B-06-6060.gif",
    "監控站-灰-箭頭-B-07-6060.gif": "./images/監控站-灰-箭頭-B-07-6060.gif",
    "監控站-灰-箭頭-B-08-6060.gif": "./images/監控站-灰-箭頭-B-08-6060.gif",
    "監控站-灰-箭頭-B-09-6060.gif": "./images/監控站-灰-箭頭-B-09-6060.gif",
    "監控站-灰-箭頭-B-10-6060.gif": "./images/監控站-灰-箭頭-B-10-6060.gif",
    "監控站-灰-箭頭-B-11-6060.gif": "./images/監控站-灰-箭頭-B-11-6060.gif",
    "監控站-灰-箭頭-B-12-6060.gif": "./images/監控站-灰-箭頭-B-12-6060.gif",
    "監控站-灰-箭頭-B-13-6060.gif": "./images/監控站-灰-箭頭-B-13-6060.gif",
    "監控站-灰-箭頭-B-14-6060.gif": "./images/監控站-灰-箭頭-B-14-6060.gif",
    "監控站-灰-箭頭-B-15-6060.gif": "./images/監控站-灰-箭頭-B-15-6060.gif",
    "監控站-灰-箭頭-B-16-6060.gif": "./images/監控站-灰-箭頭-B-16-6060.gif",
    "監測站-灰-箭頭-B-01-6060.gif": "./images/監測站-灰-箭頭-B-01-6060.gif",
    "監測站-灰-箭頭-B-02-6060.gif": "./images/監測站-灰-箭頭-B-02-6060.gif",
    "監測站-灰-箭頭-B-03-6060.gif": "./images/監測站-灰-箭頭-B-03-6060.gif",
    "監測站-灰-箭頭-B-04-6060.gif": "./images/監測站-灰-箭頭-B-04-6060.gif",
    "監測站-灰-箭頭-B-05-6060.gif": "./images/監測站-灰-箭頭-B-05-6060.gif",
    "監測站-灰-箭頭-B-06-6060.gif": "./images/監測站-灰-箭頭-B-06-6060.gif",
    "監測站-灰-箭頭-B-07-6060.gif": "./images/監測站-灰-箭頭-B-07-6060.gif",
    "監測站-灰-箭頭-B-08-6060.gif": "./images/監測站-灰-箭頭-B-08-6060.gif",
    "監測站-灰-箭頭-B-09-6060.gif": "./images/監測站-灰-箭頭-B-09-6060.gif",
    "監測站-灰-箭頭-B-10-6060.gif": "./images/監測站-灰-箭頭-B-10-6060.gif",
    "監測站-灰-箭頭-B-11-6060.gif": "./images/監測站-灰-箭頭-B-11-6060.gif",
    "監測站-灰-箭頭-B-12-6060.gif": "./images/監測站-灰-箭頭-B-12-6060.gif",
    "監測站-灰-箭頭-B-13-6060.gif": "./images/監測站-灰-箭頭-B-13-6060.gif",
    "監測站-灰-箭頭-B-14-6060.gif": "./images/監測站-灰-箭頭-B-14-6060.gif",
    "監測站-灰-箭頭-B-15-6060.gif": "./images/監測站-灰-箭頭-B-15-6060.gif",
    "監測站-灰-箭頭-B-16-6060.gif": "./images/監測站-灰-箭頭-B-16-6060.gif",
    "加壓站-灰-箭頭-R-01-6060.gif": "./images/加壓站-灰-箭頭-R-01-6060.gif",
    "加壓站-灰-箭頭-R-02-6060.gif": "./images/加壓站-灰-箭頭-R-02-6060.gif",
    "加壓站-灰-箭頭-R-03-6060.gif": "./images/加壓站-灰-箭頭-R-03-6060.gif",
    "加壓站-灰-箭頭-R-04-6060.gif": "./images/加壓站-灰-箭頭-R-04-6060.gif",
    "加壓站-灰-箭頭-R-05-6060.gif": "./images/加壓站-灰-箭頭-R-05-6060.gif",
    "加壓站-灰-箭頭-R-06-6060.gif": "./images/加壓站-灰-箭頭-R-06-6060.gif",
    "加壓站-灰-箭頭-R-07-6060.gif": "./images/加壓站-灰-箭頭-R-07-6060.gif",
    "加壓站-灰-箭頭-R-08-6060.gif": "./images/加壓站-灰-箭頭-R-08-6060.gif",
    "加壓站-灰-箭頭-R-09-6060.gif": "./images/加壓站-灰-箭頭-R-09-6060.gif",
    "加壓站-灰-箭頭-R-10-6060.gif": "./images/加壓站-灰-箭頭-R-10-6060.gif",
    "加壓站-灰-箭頭-R-11-6060.gif": "./images/加壓站-灰-箭頭-R-11-6060.gif",
    "加壓站-灰-箭頭-R-12-6060.gif": "./images/加壓站-灰-箭頭-R-12-6060.gif",
    "加壓站-灰-箭頭-R-13-6060.gif": "./images/加壓站-灰-箭頭-R-13-6060.gif",
    "加壓站-灰-箭頭-R-14-6060.gif": "./images/加壓站-灰-箭頭-R-14-6060.gif",
    "加壓站-灰-箭頭-R-15-6060.gif": "./images/加壓站-灰-箭頭-R-15-6060.gif",
    "加壓站-灰-箭頭-R-16-6060.gif": "./images/加壓站-灰-箭頭-R-16-6060.gif",
    "監控站-灰-箭頭-R-01-6060.gif": "./images/監控站-灰-箭頭-R-01-6060.gif",
    "監控站-灰-箭頭-R-02-6060.gif": "./images/監控站-灰-箭頭-R-02-6060.gif",
    "監控站-灰-箭頭-R-03-6060.gif": "./images/監控站-灰-箭頭-R-03-6060.gif",
    "監控站-灰-箭頭-R-04-6060.gif": "./images/監控站-灰-箭頭-R-04-6060.gif",
    "監控站-灰-箭頭-R-05-6060.gif": "./images/監控站-灰-箭頭-R-05-6060.gif",
    "監控站-灰-箭頭-R-06-6060.gif": "./images/監控站-灰-箭頭-R-06-6060.gif",
    "監控站-灰-箭頭-R-07-6060.gif": "./images/監控站-灰-箭頭-R-07-6060.gif",
    "監控站-灰-箭頭-R-08-6060.gif": "./images/監控站-灰-箭頭-R-08-6060.gif",
    "監控站-灰-箭頭-R-09-6060.gif": "./images/監控站-灰-箭頭-R-09-6060.gif",
    "監控站-灰-箭頭-R-10-6060.gif": "./images/監控站-灰-箭頭-R-10-6060.gif",
    "監控站-灰-箭頭-R-11-6060.gif": "./images/監控站-灰-箭頭-R-11-6060.gif",
    "監控站-灰-箭頭-R-12-6060.gif": "./images/監控站-灰-箭頭-R-12-6060.gif",
    "監控站-灰-箭頭-R-13-6060.gif": "./images/監控站-灰-箭頭-R-13-6060.gif",
    "監控站-灰-箭頭-R-14-6060.gif": "./images/監控站-灰-箭頭-R-14-6060.gif",
    "監控站-灰-箭頭-R-15-6060.gif": "./images/監控站-灰-箭頭-R-15-6060.gif",
    "監控站-灰-箭頭-R-16-6060.gif": "./images/監控站-灰-箭頭-R-16-6060.gif",
    "監測站-灰-箭頭-R-01-6060.gif": "./images/監測站-灰-箭頭-R-01-6060.gif",
    "監測站-灰-箭頭-R-02-6060.gif": "./images/監測站-灰-箭頭-R-02-6060.gif",
    "監測站-灰-箭頭-R-03-6060.gif": "./images/監測站-灰-箭頭-R-03-6060.gif",
    "監測站-灰-箭頭-R-04-6060.gif": "./images/監測站-灰-箭頭-R-04-6060.gif",
    "監測站-灰-箭頭-R-05-6060.gif": "./images/監測站-灰-箭頭-R-05-6060.gif",
    "監測站-灰-箭頭-R-06-6060.gif": "./images/監測站-灰-箭頭-R-06-6060.gif",
    "監測站-灰-箭頭-R-07-6060.gif": "./images/監測站-灰-箭頭-R-07-6060.gif",
    "監測站-灰-箭頭-R-08-6060.gif": "./images/監測站-灰-箭頭-R-08-6060.gif",
    "監測站-灰-箭頭-R-09-6060.gif": "./images/監測站-灰-箭頭-R-09-6060.gif",
    "監測站-灰-箭頭-R-10-6060.gif": "./images/監測站-灰-箭頭-R-10-6060.gif",
    "監測站-灰-箭頭-R-11-6060.gif": "./images/監測站-灰-箭頭-R-11-6060.gif",
    "監測站-灰-箭頭-R-12-6060.gif": "./images/監測站-灰-箭頭-R-12-6060.gif",
    "監測站-灰-箭頭-R-13-6060.gif": "./images/監測站-灰-箭頭-R-13-6060.gif",
    "監測站-灰-箭頭-R-14-6060.gif": "./images/監測站-灰-箭頭-R-14-6060.gif",
    "監測站-灰-箭頭-R-15-6060.gif": "./images/監測站-灰-箭頭-R-15-6060.gif",
    "監測站-灰-箭頭-R-16-6060.gif": "./images/監測站-灰-箭頭-R-16-6060.gif",

    "加壓站-紅-箭頭-B-01-6060.gif": "./images/加壓站-紅-箭頭-B-01-6060.gif",
    "加壓站-紅-箭頭-B-02-6060.gif": "./images/加壓站-紅-箭頭-B-02-6060.gif",
    "加壓站-紅-箭頭-B-03-6060.gif": "./images/加壓站-紅-箭頭-B-03-6060.gif",
    "加壓站-紅-箭頭-B-04-6060.gif": "./images/加壓站-紅-箭頭-B-04-6060.gif",
    "加壓站-紅-箭頭-B-05-6060.gif": "./images/加壓站-紅-箭頭-B-05-6060.gif",
    "加壓站-紅-箭頭-B-06-6060.gif": "./images/加壓站-紅-箭頭-B-06-6060.gif",
    "加壓站-紅-箭頭-B-07-6060.gif": "./images/加壓站-紅-箭頭-B-07-6060.gif",
    "加壓站-紅-箭頭-B-08-6060.gif": "./images/加壓站-紅-箭頭-B-08-6060.gif",
    "加壓站-紅-箭頭-B-09-6060.gif": "./images/加壓站-紅-箭頭-B-09-6060.gif",
    "加壓站-紅-箭頭-B-10-6060.gif": "./images/加壓站-紅-箭頭-B-10-6060.gif",
    "加壓站-紅-箭頭-B-11-6060.gif": "./images/加壓站-紅-箭頭-B-11-6060.gif",
    "加壓站-紅-箭頭-B-12-6060.gif": "./images/加壓站-紅-箭頭-B-12-6060.gif",
    "加壓站-紅-箭頭-B-13-6060.gif": "./images/加壓站-紅-箭頭-B-13-6060.gif",
    "加壓站-紅-箭頭-B-14-6060.gif": "./images/加壓站-紅-箭頭-B-14-6060.gif",
    "加壓站-紅-箭頭-B-15-6060.gif": "./images/加壓站-紅-箭頭-B-15-6060.gif",
    "加壓站-紅-箭頭-B-16-6060.gif": "./images/加壓站-紅-箭頭-B-16-6060.gif",
    "監控站-紅-箭頭-B-01-6060.gif": "./images/監控站-紅-箭頭-B-01-6060.gif",
    "監控站-紅-箭頭-B-02-6060.gif": "./images/監控站-紅-箭頭-B-02-6060.gif",
    "監控站-紅-箭頭-B-03-6060.gif": "./images/監控站-紅-箭頭-B-03-6060.gif",
    "監控站-紅-箭頭-B-04-6060.gif": "./images/監控站-紅-箭頭-B-04-6060.gif",
    "監控站-紅-箭頭-B-05-6060.gif": "./images/監控站-紅-箭頭-B-05-6060.gif",
    "監控站-紅-箭頭-B-06-6060.gif": "./images/監控站-紅-箭頭-B-06-6060.gif",
    "監控站-紅-箭頭-B-07-6060.gif": "./images/監控站-紅-箭頭-B-07-6060.gif",
    "監控站-紅-箭頭-B-08-6060.gif": "./images/監控站-紅-箭頭-B-08-6060.gif",
    "監控站-紅-箭頭-B-09-6060.gif": "./images/監控站-紅-箭頭-B-09-6060.gif",
    "監控站-紅-箭頭-B-10-6060.gif": "./images/監控站-紅-箭頭-B-10-6060.gif",
    "監控站-紅-箭頭-B-11-6060.gif": "./images/監控站-紅-箭頭-B-11-6060.gif",
    "監控站-紅-箭頭-B-12-6060.gif": "./images/監控站-紅-箭頭-B-12-6060.gif",
    "監控站-紅-箭頭-B-13-6060.gif": "./images/監控站-紅-箭頭-B-13-6060.gif",
    "監控站-紅-箭頭-B-14-6060.gif": "./images/監控站-紅-箭頭-B-14-6060.gif",
    "監控站-紅-箭頭-B-15-6060.gif": "./images/監控站-紅-箭頭-B-15-6060.gif",
    "監控站-紅-箭頭-B-16-6060.gif": "./images/監控站-紅-箭頭-B-16-6060.gif",
    "監測站-紅-箭頭-B-01-6060.gif": "./images/監測站-紅-箭頭-B-01-6060.gif",
    "監測站-紅-箭頭-B-02-6060.gif": "./images/監測站-紅-箭頭-B-02-6060.gif",
    "監測站-紅-箭頭-B-03-6060.gif": "./images/監測站-紅-箭頭-B-03-6060.gif",
    "監測站-紅-箭頭-B-04-6060.gif": "./images/監測站-紅-箭頭-B-04-6060.gif",
    "監測站-紅-箭頭-B-05-6060.gif": "./images/監測站-紅-箭頭-B-05-6060.gif",
    "監測站-紅-箭頭-B-06-6060.gif": "./images/監測站-紅-箭頭-B-06-6060.gif",
    "監測站-紅-箭頭-B-07-6060.gif": "./images/監測站-紅-箭頭-B-07-6060.gif",
    "監測站-紅-箭頭-B-08-6060.gif": "./images/監測站-紅-箭頭-B-08-6060.gif",
    "監測站-紅-箭頭-B-09-6060.gif": "./images/監測站-紅-箭頭-B-09-6060.gif",
    "監測站-紅-箭頭-B-10-6060.gif": "./images/監測站-紅-箭頭-B-10-6060.gif",
    "監測站-紅-箭頭-B-11-6060.gif": "./images/監測站-紅-箭頭-B-11-6060.gif",
    "監測站-紅-箭頭-B-12-6060.gif": "./images/監測站-紅-箭頭-B-12-6060.gif",
    "監測站-紅-箭頭-B-13-6060.gif": "./images/監測站-紅-箭頭-B-13-6060.gif",
    "監測站-紅-箭頭-B-14-6060.gif": "./images/監測站-紅-箭頭-B-14-6060.gif",
    "監測站-紅-箭頭-B-15-6060.gif": "./images/監測站-紅-箭頭-B-15-6060.gif",
    "監測站-紅-箭頭-B-16-6060.gif": "./images/監測站-紅-箭頭-B-16-6060.gif",
    "加壓站-紅-箭頭-R-01-6060.gif": "./images/加壓站-紅-箭頭-R-01-6060.gif",
    "加壓站-紅-箭頭-R-02-6060.gif": "./images/加壓站-紅-箭頭-R-02-6060.gif",
    "加壓站-紅-箭頭-R-03-6060.gif": "./images/加壓站-紅-箭頭-R-03-6060.gif",
    "加壓站-紅-箭頭-R-04-6060.gif": "./images/加壓站-紅-箭頭-R-04-6060.gif",
    "加壓站-紅-箭頭-R-05-6060.gif": "./images/加壓站-紅-箭頭-R-05-6060.gif",
    "加壓站-紅-箭頭-R-06-6060.gif": "./images/加壓站-紅-箭頭-R-06-6060.gif",
    "加壓站-紅-箭頭-R-07-6060.gif": "./images/加壓站-紅-箭頭-R-07-6060.gif",
    "加壓站-紅-箭頭-R-08-6060.gif": "./images/加壓站-紅-箭頭-R-08-6060.gif",
    "加壓站-紅-箭頭-R-09-6060.gif": "./images/加壓站-紅-箭頭-R-09-6060.gif",
    "加壓站-紅-箭頭-R-10-6060.gif": "./images/加壓站-紅-箭頭-R-10-6060.gif",
    "加壓站-紅-箭頭-R-11-6060.gif": "./images/加壓站-紅-箭頭-R-11-6060.gif",
    "加壓站-紅-箭頭-R-12-6060.gif": "./images/加壓站-紅-箭頭-R-12-6060.gif",
    "加壓站-紅-箭頭-R-13-6060.gif": "./images/加壓站-紅-箭頭-R-13-6060.gif",
    "加壓站-紅-箭頭-R-14-6060.gif": "./images/加壓站-紅-箭頭-R-14-6060.gif",
    "加壓站-紅-箭頭-R-15-6060.gif": "./images/加壓站-紅-箭頭-R-15-6060.gif",
    "加壓站-紅-箭頭-R-16-6060.gif": "./images/加壓站-紅-箭頭-R-16-6060.gif",
    "監控站-紅-箭頭-R-01-6060.gif": "./images/監控站-紅-箭頭-R-01-6060.gif",
    "監控站-紅-箭頭-R-02-6060.gif": "./images/監控站-紅-箭頭-R-02-6060.gif",
    "監控站-紅-箭頭-R-03-6060.gif": "./images/監控站-紅-箭頭-R-03-6060.gif",
    "監控站-紅-箭頭-R-04-6060.gif": "./images/監控站-紅-箭頭-R-04-6060.gif",
    "監控站-紅-箭頭-R-05-6060.gif": "./images/監控站-紅-箭頭-R-05-6060.gif",
    "監控站-紅-箭頭-R-06-6060.gif": "./images/監控站-紅-箭頭-R-06-6060.gif",
    "監控站-紅-箭頭-R-07-6060.gif": "./images/監控站-紅-箭頭-R-07-6060.gif",
    "監控站-紅-箭頭-R-08-6060.gif": "./images/監控站-紅-箭頭-R-08-6060.gif",
    "監控站-紅-箭頭-R-09-6060.gif": "./images/監控站-紅-箭頭-R-09-6060.gif",
    "監控站-紅-箭頭-R-10-6060.gif": "./images/監控站-紅-箭頭-R-10-6060.gif",
    "監控站-紅-箭頭-R-11-6060.gif": "./images/監控站-紅-箭頭-R-11-6060.gif",
    "監控站-紅-箭頭-R-12-6060.gif": "./images/監控站-紅-箭頭-R-12-6060.gif",
    "監控站-紅-箭頭-R-13-6060.gif": "./images/監控站-紅-箭頭-R-13-6060.gif",
    "監控站-紅-箭頭-R-14-6060.gif": "./images/監控站-紅-箭頭-R-14-6060.gif",
    "監控站-紅-箭頭-R-15-6060.gif": "./images/監控站-紅-箭頭-R-15-6060.gif",
    "監控站-紅-箭頭-R-16-6060.gif": "./images/監控站-紅-箭頭-R-16-6060.gif",
    "監測站-紅-箭頭-R-01-6060.gif": "./images/監測站-紅-箭頭-R-01-6060.gif",
    "監測站-紅-箭頭-R-02-6060.gif": "./images/監測站-紅-箭頭-R-02-6060.gif",
    "監測站-紅-箭頭-R-03-6060.gif": "./images/監測站-紅-箭頭-R-03-6060.gif",
    "監測站-紅-箭頭-R-04-6060.gif": "./images/監測站-紅-箭頭-R-04-6060.gif",
    "監測站-紅-箭頭-R-05-6060.gif": "./images/監測站-紅-箭頭-R-05-6060.gif",
    "監測站-紅-箭頭-R-06-6060.gif": "./images/監測站-紅-箭頭-R-06-6060.gif",
    "監測站-紅-箭頭-R-07-6060.gif": "./images/監測站-紅-箭頭-R-07-6060.gif",
    "監測站-紅-箭頭-R-08-6060.gif": "./images/監測站-紅-箭頭-R-08-6060.gif",
    "監測站-紅-箭頭-R-09-6060.gif": "./images/監測站-紅-箭頭-R-09-6060.gif",
    "監測站-紅-箭頭-R-10-6060.gif": "./images/監測站-紅-箭頭-R-10-6060.gif",
    "監測站-紅-箭頭-R-11-6060.gif": "./images/監測站-紅-箭頭-R-11-6060.gif",
    "監測站-紅-箭頭-R-12-6060.gif": "./images/監測站-紅-箭頭-R-12-6060.gif",
    "監測站-紅-箭頭-R-13-6060.gif": "./images/監測站-紅-箭頭-R-13-6060.gif",
    "監測站-紅-箭頭-R-14-6060.gif": "./images/監測站-紅-箭頭-R-14-6060.gif",
    "監測站-紅-箭頭-R-15-6060.gif": "./images/監測站-紅-箭頭-R-15-6060.gif",
    "監測站-紅-箭頭-R-16-6060.gif": "./images/監測站-紅-箭頭-R-16-6060.gif",

    "加壓站-黃-箭頭-B-01-6060.gif": "./images/加壓站-黃-箭頭-B-01-6060.gif",
    "加壓站-黃-箭頭-B-02-6060.gif": "./images/加壓站-黃-箭頭-B-02-6060.gif",
    "加壓站-黃-箭頭-B-03-6060.gif": "./images/加壓站-黃-箭頭-B-03-6060.gif",
    "加壓站-黃-箭頭-B-04-6060.gif": "./images/加壓站-黃-箭頭-B-04-6060.gif",
    "加壓站-黃-箭頭-B-05-6060.gif": "./images/加壓站-黃-箭頭-B-05-6060.gif",
    "加壓站-黃-箭頭-B-06-6060.gif": "./images/加壓站-黃-箭頭-B-06-6060.gif",
    "加壓站-黃-箭頭-B-07-6060.gif": "./images/加壓站-黃-箭頭-B-07-6060.gif",
    "加壓站-黃-箭頭-B-08-6060.gif": "./images/加壓站-黃-箭頭-B-08-6060.gif",
    "加壓站-黃-箭頭-B-09-6060.gif": "./images/加壓站-黃-箭頭-B-09-6060.gif",
    "加壓站-黃-箭頭-B-10-6060.gif": "./images/加壓站-黃-箭頭-B-10-6060.gif",
    "加壓站-黃-箭頭-B-11-6060.gif": "./images/加壓站-黃-箭頭-B-11-6060.gif",
    "加壓站-黃-箭頭-B-12-6060.gif": "./images/加壓站-黃-箭頭-B-12-6060.gif",
    "加壓站-黃-箭頭-B-13-6060.gif": "./images/加壓站-黃-箭頭-B-13-6060.gif",
    "加壓站-黃-箭頭-B-14-6060.gif": "./images/加壓站-黃-箭頭-B-14-6060.gif",
    "加壓站-黃-箭頭-B-15-6060.gif": "./images/加壓站-黃-箭頭-B-15-6060.gif",
    "加壓站-黃-箭頭-B-16-6060.gif": "./images/加壓站-黃-箭頭-B-16-6060.gif",
    "監控站-黃-箭頭-B-01-6060.gif": "./images/監控站-黃-箭頭-B-01-6060.gif",
    "監控站-黃-箭頭-B-02-6060.gif": "./images/監控站-黃-箭頭-B-02-6060.gif",
    "監控站-黃-箭頭-B-03-6060.gif": "./images/監控站-黃-箭頭-B-03-6060.gif",
    "監控站-黃-箭頭-B-04-6060.gif": "./images/監控站-黃-箭頭-B-04-6060.gif",
    "監控站-黃-箭頭-B-05-6060.gif": "./images/監控站-黃-箭頭-B-05-6060.gif",
    "監控站-黃-箭頭-B-06-6060.gif": "./images/監控站-黃-箭頭-B-06-6060.gif",
    "監控站-黃-箭頭-B-07-6060.gif": "./images/監控站-黃-箭頭-B-07-6060.gif",
    "監控站-黃-箭頭-B-08-6060.gif": "./images/監控站-黃-箭頭-B-08-6060.gif",
    "監控站-黃-箭頭-B-09-6060.gif": "./images/監控站-黃-箭頭-B-09-6060.gif",
    "監控站-黃-箭頭-B-10-6060.gif": "./images/監控站-黃-箭頭-B-10-6060.gif",
    "監控站-黃-箭頭-B-11-6060.gif": "./images/監控站-黃-箭頭-B-11-6060.gif",
    "監控站-黃-箭頭-B-12-6060.gif": "./images/監控站-黃-箭頭-B-12-6060.gif",
    "監控站-黃-箭頭-B-13-6060.gif": "./images/監控站-黃-箭頭-B-13-6060.gif",
    "監控站-黃-箭頭-B-14-6060.gif": "./images/監控站-黃-箭頭-B-14-6060.gif",
    "監控站-黃-箭頭-B-15-6060.gif": "./images/監控站-黃-箭頭-B-15-6060.gif",
    "監控站-黃-箭頭-B-16-6060.gif": "./images/監控站-黃-箭頭-B-16-6060.gif",
    "監測站-黃-箭頭-B-01-6060.gif": "./images/監測站-黃-箭頭-B-01-6060.gif",
    "監測站-黃-箭頭-B-02-6060.gif": "./images/監測站-黃-箭頭-B-02-6060.gif",
    "監測站-黃-箭頭-B-03-6060.gif": "./images/監測站-黃-箭頭-B-03-6060.gif",
    "監測站-黃-箭頭-B-04-6060.gif": "./images/監測站-黃-箭頭-B-04-6060.gif",
    "監測站-黃-箭頭-B-05-6060.gif": "./images/監測站-黃-箭頭-B-05-6060.gif",
    "監測站-黃-箭頭-B-06-6060.gif": "./images/監測站-黃-箭頭-B-06-6060.gif",
    "監測站-黃-箭頭-B-07-6060.gif": "./images/監測站-黃-箭頭-B-07-6060.gif",
    "監測站-黃-箭頭-B-08-6060.gif": "./images/監測站-黃-箭頭-B-08-6060.gif",
    "監測站-黃-箭頭-B-09-6060.gif": "./images/監測站-黃-箭頭-B-09-6060.gif",
    "監測站-黃-箭頭-B-10-6060.gif": "./images/監測站-黃-箭頭-B-10-6060.gif",
    "監測站-黃-箭頭-B-11-6060.gif": "./images/監測站-黃-箭頭-B-11-6060.gif",
    "監測站-黃-箭頭-B-12-6060.gif": "./images/監測站-黃-箭頭-B-12-6060.gif",
    "監測站-黃-箭頭-B-13-6060.gif": "./images/監測站-黃-箭頭-B-13-6060.gif",
    "監測站-黃-箭頭-B-14-6060.gif": "./images/監測站-黃-箭頭-B-14-6060.gif",
    "監測站-黃-箭頭-B-15-6060.gif": "./images/監測站-黃-箭頭-B-15-6060.gif",
    "監測站-黃-箭頭-B-16-6060.gif": "./images/監測站-黃-箭頭-B-16-6060.gif",
    "加壓站-黃-箭頭-R-01-6060.gif": "./images/加壓站-黃-箭頭-R-01-6060.gif",
    "加壓站-黃-箭頭-R-02-6060.gif": "./images/加壓站-黃-箭頭-R-02-6060.gif",
    "加壓站-黃-箭頭-R-03-6060.gif": "./images/加壓站-黃-箭頭-R-03-6060.gif",
    "加壓站-黃-箭頭-R-04-6060.gif": "./images/加壓站-黃-箭頭-R-04-6060.gif",
    "加壓站-黃-箭頭-R-05-6060.gif": "./images/加壓站-黃-箭頭-R-05-6060.gif",
    "加壓站-黃-箭頭-R-06-6060.gif": "./images/加壓站-黃-箭頭-R-06-6060.gif",
    "加壓站-黃-箭頭-R-07-6060.gif": "./images/加壓站-黃-箭頭-R-07-6060.gif",
    "加壓站-黃-箭頭-R-08-6060.gif": "./images/加壓站-黃-箭頭-R-08-6060.gif",
    "加壓站-黃-箭頭-R-09-6060.gif": "./images/加壓站-黃-箭頭-R-09-6060.gif",
    "加壓站-黃-箭頭-R-10-6060.gif": "./images/加壓站-黃-箭頭-R-10-6060.gif",
    "加壓站-黃-箭頭-R-11-6060.gif": "./images/加壓站-黃-箭頭-R-11-6060.gif",
    "加壓站-黃-箭頭-R-12-6060.gif": "./images/加壓站-黃-箭頭-R-12-6060.gif",
    "加壓站-黃-箭頭-R-13-6060.gif": "./images/加壓站-黃-箭頭-R-13-6060.gif",
    "加壓站-黃-箭頭-R-14-6060.gif": "./images/加壓站-黃-箭頭-R-14-6060.gif",
    "加壓站-黃-箭頭-R-15-6060.gif": "./images/加壓站-黃-箭頭-R-15-6060.gif",
    "加壓站-黃-箭頭-R-16-6060.gif": "./images/加壓站-黃-箭頭-R-16-6060.gif",
    "監控站-黃-箭頭-R-01-6060.gif": "./images/監控站-黃-箭頭-R-01-6060.gif",
    "監控站-黃-箭頭-R-02-6060.gif": "./images/監控站-黃-箭頭-R-02-6060.gif",
    "監控站-黃-箭頭-R-03-6060.gif": "./images/監控站-黃-箭頭-R-03-6060.gif",
    "監控站-黃-箭頭-R-04-6060.gif": "./images/監控站-黃-箭頭-R-04-6060.gif",
    "監控站-黃-箭頭-R-05-6060.gif": "./images/監控站-黃-箭頭-R-05-6060.gif",
    "監控站-黃-箭頭-R-06-6060.gif": "./images/監控站-黃-箭頭-R-06-6060.gif",
    "監控站-黃-箭頭-R-07-6060.gif": "./images/監控站-黃-箭頭-R-07-6060.gif",
    "監控站-黃-箭頭-R-08-6060.gif": "./images/監控站-黃-箭頭-R-08-6060.gif",
    "監控站-黃-箭頭-R-09-6060.gif": "./images/監控站-黃-箭頭-R-09-6060.gif",
    "監控站-黃-箭頭-R-10-6060.gif": "./images/監控站-黃-箭頭-R-10-6060.gif",
    "監控站-黃-箭頭-R-11-6060.gif": "./images/監控站-黃-箭頭-R-11-6060.gif",
    "監控站-黃-箭頭-R-12-6060.gif": "./images/監控站-黃-箭頭-R-12-6060.gif",
    "監控站-黃-箭頭-R-13-6060.gif": "./images/監控站-黃-箭頭-R-13-6060.gif",
    "監控站-黃-箭頭-R-14-6060.gif": "./images/監控站-黃-箭頭-R-14-6060.gif",
    "監控站-黃-箭頭-R-15-6060.gif": "./images/監控站-黃-箭頭-R-15-6060.gif",
    "監控站-黃-箭頭-R-16-6060.gif": "./images/監控站-黃-箭頭-R-16-6060.gif",
    "監測站-黃-箭頭-R-01-6060.gif": "./images/監測站-黃-箭頭-R-01-6060.gif",
    "監測站-黃-箭頭-R-02-6060.gif": "./images/監測站-黃-箭頭-R-02-6060.gif",
    "監測站-黃-箭頭-R-03-6060.gif": "./images/監測站-黃-箭頭-R-03-6060.gif",
    "監測站-黃-箭頭-R-04-6060.gif": "./images/監測站-黃-箭頭-R-04-6060.gif",
    "監測站-黃-箭頭-R-05-6060.gif": "./images/監測站-黃-箭頭-R-05-6060.gif",
    "監測站-黃-箭頭-R-06-6060.gif": "./images/監測站-黃-箭頭-R-06-6060.gif",
    "監測站-黃-箭頭-R-07-6060.gif": "./images/監測站-黃-箭頭-R-07-6060.gif",
    "監測站-黃-箭頭-R-08-6060.gif": "./images/監測站-黃-箭頭-R-08-6060.gif",
    "監測站-黃-箭頭-R-09-6060.gif": "./images/監測站-黃-箭頭-R-09-6060.gif",
    "監測站-黃-箭頭-R-10-6060.gif": "./images/監測站-黃-箭頭-R-10-6060.gif",
    "監測站-黃-箭頭-R-11-6060.gif": "./images/監測站-黃-箭頭-R-11-6060.gif",
    "監測站-黃-箭頭-R-12-6060.gif": "./images/監測站-黃-箭頭-R-12-6060.gif",
    "監測站-黃-箭頭-R-13-6060.gif": "./images/監測站-黃-箭頭-R-13-6060.gif",
    "監測站-黃-箭頭-R-14-6060.gif": "./images/監測站-黃-箭頭-R-14-6060.gif",
    "監測站-黃-箭頭-R-15-6060.gif": "./images/監測站-黃-箭頭-R-15-6060.gif",
    "監測站-黃-箭頭-R-16-6060.gif": "./images/監測站-黃-箭頭-R-16-6060.gif",

    "加壓站-綠-箭頭-B-01-6060.gif": "./images/加壓站-綠-箭頭-B-01-6060.gif",
    "加壓站-綠-箭頭-B-02-6060.gif": "./images/加壓站-綠-箭頭-B-02-6060.gif",
    "加壓站-綠-箭頭-B-03-6060.gif": "./images/加壓站-綠-箭頭-B-03-6060.gif",
    "加壓站-綠-箭頭-B-04-6060.gif": "./images/加壓站-綠-箭頭-B-04-6060.gif",
    "加壓站-綠-箭頭-B-05-6060.gif": "./images/加壓站-綠-箭頭-B-05-6060.gif",
    "加壓站-綠-箭頭-B-06-6060.gif": "./images/加壓站-綠-箭頭-B-06-6060.gif",
    "加壓站-綠-箭頭-B-07-6060.gif": "./images/加壓站-綠-箭頭-B-07-6060.gif",
    "加壓站-綠-箭頭-B-08-6060.gif": "./images/加壓站-綠-箭頭-B-08-6060.gif",
    "加壓站-綠-箭頭-B-09-6060.gif": "./images/加壓站-綠-箭頭-B-09-6060.gif",
    "加壓站-綠-箭頭-B-10-6060.gif": "./images/加壓站-綠-箭頭-B-10-6060.gif",
    "加壓站-綠-箭頭-B-11-6060.gif": "./images/加壓站-綠-箭頭-B-11-6060.gif",
    "加壓站-綠-箭頭-B-12-6060.gif": "./images/加壓站-綠-箭頭-B-12-6060.gif",
    "加壓站-綠-箭頭-B-13-6060.gif": "./images/加壓站-綠-箭頭-B-13-6060.gif",
    "加壓站-綠-箭頭-B-14-6060.gif": "./images/加壓站-綠-箭頭-B-14-6060.gif",
    "加壓站-綠-箭頭-B-15-6060.gif": "./images/加壓站-綠-箭頭-B-15-6060.gif",
    "加壓站-綠-箭頭-B-16-6060.gif": "./images/加壓站-綠-箭頭-B-16-6060.gif",
    "監控站-綠-箭頭-B-01-6060.gif": "./images/監控站-綠-箭頭-B-01-6060.gif",
    "監控站-綠-箭頭-B-02-6060.gif": "./images/監控站-綠-箭頭-B-02-6060.gif",
    "監控站-綠-箭頭-B-03-6060.gif": "./images/監控站-綠-箭頭-B-03-6060.gif",
    "監控站-綠-箭頭-B-04-6060.gif": "./images/監控站-綠-箭頭-B-04-6060.gif",
    "監控站-綠-箭頭-B-05-6060.gif": "./images/監控站-綠-箭頭-B-05-6060.gif",
    "監控站-綠-箭頭-B-06-6060.gif": "./images/監控站-綠-箭頭-B-06-6060.gif",
    "監控站-綠-箭頭-B-07-6060.gif": "./images/監控站-綠-箭頭-B-07-6060.gif",
    "監控站-綠-箭頭-B-08-6060.gif": "./images/監控站-綠-箭頭-B-08-6060.gif",
    "監控站-綠-箭頭-B-09-6060.gif": "./images/監控站-綠-箭頭-B-09-6060.gif",
    "監控站-綠-箭頭-B-10-6060.gif": "./images/監控站-綠-箭頭-B-10-6060.gif",
    "監控站-綠-箭頭-B-11-6060.gif": "./images/監控站-綠-箭頭-B-11-6060.gif",
    "監控站-綠-箭頭-B-12-6060.gif": "./images/監控站-綠-箭頭-B-12-6060.gif",
    "監控站-綠-箭頭-B-13-6060.gif": "./images/監控站-綠-箭頭-B-13-6060.gif",
    "監控站-綠-箭頭-B-14-6060.gif": "./images/監控站-綠-箭頭-B-14-6060.gif",
    "監控站-綠-箭頭-B-15-6060.gif": "./images/監控站-綠-箭頭-B-15-6060.gif",
    "監控站-綠-箭頭-B-16-6060.gif": "./images/監控站-綠-箭頭-B-16-6060.gif",
    "監測站-綠-箭頭-B-01-6060.gif": "./images/監測站-綠-箭頭-B-01-6060.gif",
    "監測站-綠-箭頭-B-02-6060.gif": "./images/監測站-綠-箭頭-B-02-6060.gif",
    "監測站-綠-箭頭-B-03-6060.gif": "./images/監測站-綠-箭頭-B-03-6060.gif",
    "監測站-綠-箭頭-B-04-6060.gif": "./images/監測站-綠-箭頭-B-04-6060.gif",
    "監測站-綠-箭頭-B-05-6060.gif": "./images/監測站-綠-箭頭-B-05-6060.gif",
    "監測站-綠-箭頭-B-06-6060.gif": "./images/監測站-綠-箭頭-B-06-6060.gif",
    "監測站-綠-箭頭-B-07-6060.gif": "./images/監測站-綠-箭頭-B-07-6060.gif",
    "監測站-綠-箭頭-B-08-6060.gif": "./images/監測站-綠-箭頭-B-08-6060.gif",
    "監測站-綠-箭頭-B-09-6060.gif": "./images/監測站-綠-箭頭-B-09-6060.gif",
    "監測站-綠-箭頭-B-10-6060.gif": "./images/監測站-綠-箭頭-B-10-6060.gif",
    "監測站-綠-箭頭-B-11-6060.gif": "./images/監測站-綠-箭頭-B-11-6060.gif",
    "監測站-綠-箭頭-B-12-6060.gif": "./images/監測站-綠-箭頭-B-12-6060.gif",
    "監測站-綠-箭頭-B-13-6060.gif": "./images/監測站-綠-箭頭-B-13-6060.gif",
    "監測站-綠-箭頭-B-14-6060.gif": "./images/監測站-綠-箭頭-B-14-6060.gif",
    "監測站-綠-箭頭-B-15-6060.gif": "./images/監測站-綠-箭頭-B-15-6060.gif",
    "監測站-綠-箭頭-B-16-6060.gif": "./images/監測站-綠-箭頭-B-16-6060.gif",
    "加壓站-綠-箭頭-R-01-6060.gif": "./images/加壓站-綠-箭頭-R-01-6060.gif",
    "加壓站-綠-箭頭-R-02-6060.gif": "./images/加壓站-綠-箭頭-R-02-6060.gif",
    "加壓站-綠-箭頭-R-03-6060.gif": "./images/加壓站-綠-箭頭-R-03-6060.gif",
    "加壓站-綠-箭頭-R-04-6060.gif": "./images/加壓站-綠-箭頭-R-04-6060.gif",
    "加壓站-綠-箭頭-R-05-6060.gif": "./images/加壓站-綠-箭頭-R-05-6060.gif",
    "加壓站-綠-箭頭-R-06-6060.gif": "./images/加壓站-綠-箭頭-R-06-6060.gif",
    "加壓站-綠-箭頭-R-07-6060.gif": "./images/加壓站-綠-箭頭-R-07-6060.gif",
    "加壓站-綠-箭頭-R-08-6060.gif": "./images/加壓站-綠-箭頭-R-08-6060.gif",
    "加壓站-綠-箭頭-R-09-6060.gif": "./images/加壓站-綠-箭頭-R-09-6060.gif",
    "加壓站-綠-箭頭-R-10-6060.gif": "./images/加壓站-綠-箭頭-R-10-6060.gif",
    "加壓站-綠-箭頭-R-11-6060.gif": "./images/加壓站-綠-箭頭-R-11-6060.gif",
    "加壓站-綠-箭頭-R-12-6060.gif": "./images/加壓站-綠-箭頭-R-12-6060.gif",
    "加壓站-綠-箭頭-R-13-6060.gif": "./images/加壓站-綠-箭頭-R-13-6060.gif",
    "加壓站-綠-箭頭-R-14-6060.gif": "./images/加壓站-綠-箭頭-R-14-6060.gif",
    "加壓站-綠-箭頭-R-15-6060.gif": "./images/加壓站-綠-箭頭-R-15-6060.gif",
    "加壓站-綠-箭頭-R-16-6060.gif": "./images/加壓站-綠-箭頭-R-16-6060.gif",
    "監控站-綠-箭頭-R-01-6060.gif": "./images/監控站-綠-箭頭-R-01-6060.gif",
    "監控站-綠-箭頭-R-02-6060.gif": "./images/監控站-綠-箭頭-R-02-6060.gif",
    "監控站-綠-箭頭-R-03-6060.gif": "./images/監控站-綠-箭頭-R-03-6060.gif",
    "監控站-綠-箭頭-R-04-6060.gif": "./images/監控站-綠-箭頭-R-04-6060.gif",
    "監控站-綠-箭頭-R-05-6060.gif": "./images/監控站-綠-箭頭-R-05-6060.gif",
    "監控站-綠-箭頭-R-06-6060.gif": "./images/監控站-綠-箭頭-R-06-6060.gif",
    "監控站-綠-箭頭-R-07-6060.gif": "./images/監控站-綠-箭頭-R-07-6060.gif",
    "監控站-綠-箭頭-R-08-6060.gif": "./images/監控站-綠-箭頭-R-08-6060.gif",
    "監控站-綠-箭頭-R-09-6060.gif": "./images/監控站-綠-箭頭-R-09-6060.gif",
    "監控站-綠-箭頭-R-10-6060.gif": "./images/監控站-綠-箭頭-R-10-6060.gif",
    "監控站-綠-箭頭-R-11-6060.gif": "./images/監控站-綠-箭頭-R-11-6060.gif",
    "監控站-綠-箭頭-R-12-6060.gif": "./images/監控站-綠-箭頭-R-12-6060.gif",
    "監控站-綠-箭頭-R-13-6060.gif": "./images/監控站-綠-箭頭-R-13-6060.gif",
    "監控站-綠-箭頭-R-14-6060.gif": "./images/監控站-綠-箭頭-R-14-6060.gif",
    "監控站-綠-箭頭-R-15-6060.gif": "./images/監控站-綠-箭頭-R-15-6060.gif",
    "監控站-綠-箭頭-R-16-6060.gif": "./images/監控站-綠-箭頭-R-16-6060.gif",
    "監測站-綠-箭頭-R-01-6060.gif": "./images/監測站-綠-箭頭-R-01-6060.gif",
    "監測站-綠-箭頭-R-02-6060.gif": "./images/監測站-綠-箭頭-R-02-6060.gif",
    "監測站-綠-箭頭-R-03-6060.gif": "./images/監測站-綠-箭頭-R-03-6060.gif",
    "監測站-綠-箭頭-R-04-6060.gif": "./images/監測站-綠-箭頭-R-04-6060.gif",
    "監測站-綠-箭頭-R-05-6060.gif": "./images/監測站-綠-箭頭-R-05-6060.gif",
    "監測站-綠-箭頭-R-06-6060.gif": "./images/監測站-綠-箭頭-R-06-6060.gif",
    "監測站-綠-箭頭-R-07-6060.gif": "./images/監測站-綠-箭頭-R-07-6060.gif",
    "監測站-綠-箭頭-R-08-6060.gif": "./images/監測站-綠-箭頭-R-08-6060.gif",
    "監測站-綠-箭頭-R-09-6060.gif": "./images/監測站-綠-箭頭-R-09-6060.gif",
    "監測站-綠-箭頭-R-10-6060.gif": "./images/監測站-綠-箭頭-R-10-6060.gif",
    "監測站-綠-箭頭-R-11-6060.gif": "./images/監測站-綠-箭頭-R-11-6060.gif",
    "監測站-綠-箭頭-R-12-6060.gif": "./images/監測站-綠-箭頭-R-12-6060.gif",
    "監測站-綠-箭頭-R-13-6060.gif": "./images/監測站-綠-箭頭-R-13-6060.gif",
    "監測站-綠-箭頭-R-14-6060.gif": "./images/監測站-綠-箭頭-R-14-6060.gif",
    "監測站-綠-箭頭-R-15-6060.gif": "./images/監測站-綠-箭頭-R-15-6060.gif",
    "監測站-綠-箭頭-R-16-6060.gif": "./images/監測站-綠-箭頭-R-16-6060.gif",
};
var deviceType = {
  "FM_TYPE-原水": "./images/FM_TYPE_原水-3030.png",
  "FM_TYPE-一般":"./images/FM_TYPE_一般-3030.png",
  "FM_TYPE-管網":"./images/FM_TYPE_管網-3030.png",
  "PM_TYPE-板新幹管":"./images/PM_TYPE_板新幹管-3030.png",
  "PM_TYPE-一般":"./images/PM_TYPE_一般-3030.png",
  "PM_TYPE-管網":"./images/PM_TYPE_管網-3030.png"
};

var xmlornot = 1;
var item = "";
var measure = "";
var singleOrMultiple = false;

var openedMessageBox = [];
var openedMessageBoxName = [];
var physicMessageBox = [];
var firstload = false;
//訊息視窗
var openedMessageBoxNameVariables = {

};
//名稱訊息視窗
var openedMessageBoxVariables = {

};
//kendo data
var dataForKendo = [];
var dataForImportantPoint = [];
var dataForAllPoint = [];

function setMapType(type) {
    pMap.setMapTypeId(type); //設定目前地圖的地圖類型
}

function getMapType() {
    alert("目前地圖類型為 " + pMap.getMapTypeId()); //取得目前地圖的地圖類型
}


var pMap = null;
var messageBox; //訊息視窗物件	
var WMSLayer = {};
var fullWMSLayer = new Array(); //宣告一個空的變數, 準備承接WMS物件使用

var Markers = new Array();
var measureButton;
var measureServ = new TGOS.TGMeasureService();
var dm = new TGOS.TGDrawing();

function InitWnd() {
    var pOMap = document.getElementById("OMap");
    var mapOptions = {
        disableDefaultUI: true,
        //關閉所有地圖操作介面
        scaleControl: true,
        scaleControlOptions: { //scaleControlOptions(提供指定比例尺控制項)
            controlPosition: TGOS.TGControlPosition.RIGHT_TOP,
            scaleControlStyle: "TEXT"
                // controlPosition (設定比例尺控制項在地圖的位置)
        },
        //不顯示比例尺
        navigationControl: true,
        //顯示地圖縮放控制項
        navigationControlOptions: {
            //設定地圖縮放控制項
            controlPosition: TGOS.TGControlPosition.TOP_RIGHT,
            //控制項位置
            navigationControlStyle: TGOS.TGNavigationControlStyle.SMALL //控制項樣式
        }
    };
    pMap = new TGOS.TGOnlineMap(pOMap, TGOS.TGCoordSys.EPSG3826, mapOptions);
    //  pMap = new TGOS.TGOnlineMap(pOMap, TGOS.TGCoordSys.EPSG3857, mapOptions);
//    pMap.setCenter(new TGOS.TGPoint(289778.9402695586, 2767306.1949204393)); //原本
    pMap.setCenter(new TGOS.TGPoint(289778.9402695586, 2772006.1949204393));
    pMap.setZoom(6);

    var basicMessageBox = "";
    TGOS.TGEvent.addListener(pMap, "click", function(e) { //加入滑鼠單擊地圖事件監聽器
        if (basicMessageBox) {
            basicMessageBox.close(pMap);
        }
        if (document.getElementById('left_nav2').classList.contains('leftopen') && document.getElementById('baseLayer').value != "") {
            var level = pMap.getZoom(); //取得目前地圖層級
            var pt = e.point; //取得滑鼠點擊位置坐標
            latY = pt.y;
            longX = pt.x;
            pMap.setCenter(pt); //地圖平移至點擊位置
            var mapWidth = parseFloat(window.getComputedStyle(document.getElementById('OMap'), null).width);
            var mapHeight = parseFloat(window.getComputedStyle(document.getElementById('OMap'), null).height);
            var L = pMap.getBounds()["left"];
            var T = pMap.getBounds()["top"];
            var R = pMap.getBounds()["right"];
            var B = pMap.getBounds()["bottom"];
            var content = document.getElementById('baseLayer').value;
            //console.log(pt.y);
            //console.log(pt.x);
            var basicWmsDataUrl = dataGisObjectAttributeUrlComposer(L, T, R, B, longX, latY, mapHeight, mapWidth, content);
            //console.log(basicWmsDataUrl);
            fullScreenBlocker("系統初始化。。。");
            // var point = new TGOS.TGPoint(,);
            //基本圖層點選 "筏類" 的資訊視窗
            JSAJAXgetBasicWmsData(basicWmsDataUrl, pt);
        }

    });
    //比例尺顯示
    scalePositionControl();  
    //滑鼠座標顯示    
    var coordinateshower = document.createElement("div");
    var coordinateshowertext1 = document.createElement("p");
    var coordinatesvalue1 = document.createElement("p");
    var coordinateshowertext2 = document.createElement("p");
    var coordinatesvalue2 = document.createElement("p");
    coordinateshower.style.zIndex = 3;
    coordinateshower.style.position = 'absolute';
    coordinateshower.style.top ='222px';
    coordinateshower.style.right ='0px';
    coordinateshower.style.backgroundColor ='white';
    coordinateshower.style.opacity ='0.8';
    coordinateshower.style.width ='173px';
    coordinateshower.style.textAlign ='left';
    coordinateshower.style.padding ='10px';
    coordinateshower.classList.add('coordinateshower');
    coordinateshower.appendChild(coordinateshowertext1);
    coordinateshower.appendChild(coordinatesvalue1);
    coordinateshower.appendChild(coordinateshowertext2);
    coordinateshower.appendChild(coordinatesvalue2);
    
    document.getElementById('OMap').appendChild(coordinateshower);
    TGOS.TGEvent.addListener(pMap, "mousemove", function(e) {
        var pt = e.point;
        //        var message = "X坐標: " + pt.x + "Y坐標: " + pt.y;
        //        var coordinateX = "X坐標: " + pt.x;
        //        var coordinateY = "Y坐標: " + pt.y;
        var coordinateX = "X坐標: ";
        var coordinateY = "Y坐標: ";
        //        document.querySelectorAll('.coordinateshower p')[0].textContent = message;
        document.querySelectorAll('.coordinateshower p')[0].textContent = coordinateX;
        document.querySelectorAll('.coordinateshower p')[1].textContent = pt.x;
        document.querySelectorAll('.coordinateshower p')[2].textContent = coordinateY;
        document.querySelectorAll('.coordinateshower p')[3].textContent = pt.y;
    });
    basicSetting();    
}
function removehouseBytimeout() { setTimeout(function (){ $("#physicQuantities div:first").click();   }, 1);}

//屬性視窗
function dataGisObjectAttributeUrlComposer(L, T, R, B, X, Y, width, height, content) {
    // var url = `http://220.134.42.63:8080/waterscadaAPI/GisObjectAttribute?bbox=${L},${B},${R},${T}&wms=${content}&width=${width}&height=${height}&point=${X},${Y}`;
    //   var url = "http://".concat(IP[0], "/WaterscadaAPI/").concat(WIFuntions[2], "?section=").concat(sections[1], "&item=").concat(supplyitem, "&Sub_item=").concat(Sub_item);
    var url = "http://220.134.42.63:8080/waterscadaAPI/GisObjectAttribute?bbox=".concat(L, ",").concat(B, ",").concat(R, ",").concat(T, "&wms=").concat(content, "&width=").concat(width, "&height=").concat(height, "&point=").concat(X, ",").concat(Y);
    //console.log(url);
    return url;
}
//屬性視窗
function JSAJAXgetBasicWmsData(dataUrl, coordinate) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.response);
            basicDataMemoContructor(data, coordinate);

            return this.response;
        }
    };
    xhttp.open("GET", dataUrl, true);
    xhttp.send();
}
//屬性視窗
function basicDataMemoContructor(data, coordinate) {
    //console.log(data);
    var proccessedData = basicDataProccessor(data);
    var basicDataMemoInfotext = basicDataMemoInfotextComposer(proccessedData)
    memoCreator(basicDataMemoInfotext, coordinate);
}
//屬性視窗(消防栓)
function basicDataMemoInfotextComposer(data) {
    //console.log(data);
    var details = data.map(function(content) {
        return "<div>" + '<div>' + content['Key'] + '</div>' + '<div>' + content['Value'] + '</div>' + "</div>";
    })

    var infotext = '<div>' + '<div class="basicDataMessageBoxHeader">屬性</div>' + details.join('') + '<div>';

    //console.log(details);
    return infotext;
}
//屬性視窗
function basicDataProccessor(data) {
    var dataProccessed = data.reduce(function(meta, content) {
        return meta.concat(content['ATTRIBUTES']);
    }, []);
    return dataProccessed;
}
//屬性視窗
function memoCreator(infotext, coordinate) {
    var InfoWindowOptions = {
        maxWidth: 75,
        //訊息視窗的最大寬度
        zIndex: 10,
        pixelOffset: new TGOS.TGSize(messageBoxOffset['X'], messageBoxOffset['Y']) //InfoWindow起始位置的偏移量, 使用TGSize設定, 向右X為正, 向上Y為負 
    };
    var messageBasicWMSDataBox = new TGOS.TGInfoWindow(infotext, coordinate, InfoWindowOptions); //建立訊息視窗
    messageBasicWMSDataBox.getElement().classList.add('basicDataMessageBox');
    messageBasicWMSDataBox.open(pMap);

    fullScreenBlockerRemover()
}
//國土測繪
var settingNLSCcontrollers = function settingNLSCcontrollers() {
    document.getElementById('tgos_st').onclick = function() {
        deletefullWMS();
    };
    var _loop = function _loop(_E2) {
        // //console.log(buttonCombinations['國土測繪'][Object.keys(buttonCombinations['國土測繪'])[0]]['id']);

        document.getElementById(buttonCombinations['國土測繪'][Object.keys(buttonCombinations['國土測繪'])[_E2]]['id']).onclick = function() {
            deletefullWMS();
            //   fullScreenBlocker(1200);
            addFullWMS(buttonCombinations['國土測繪'][Object.keys(buttonCombinations['國土測繪'])[_E2]]['wmsurl']);
        };
    };

    for (var _E2 = 0; _E2 < Object.keys(buttonCombinations['國土測繪']).length; _E2++) {
        _loop(_E2);
    }
};

settingNLSCcontrollers();

//放置WMS &　透明度設定
var settingWMSActions = function settingWMSActions() {
    var wmsOpacityControllers = document.querySelectorAll('.left-nav input[type="text"]');
    var wmslayerbuttons = document.querySelectorAll('input[name=elev_itm]');
    //服務所按鈕
    for (var _E3 = 0; _E3 < wmslayerbuttons.length; _E3++) {
        wmslayerbuttons[_E3].onclick = function(e) {
            firstload_nav();
            var b = this.parentElement.getElementsByClassName('alphabk')[0];
//            triggerMouseEvent(b, 'mousedown');
//            triggerMouseEvent(b, 'mouseup');            
            dataForKendo = [];
            stationIDStorage = [];
            messageBoxCloseAndClean();
            messageBoxNameCloseAndClean();
            physicMessageBoxNamesCloseAndClean();
            physicMessageBoxCloseAndClean();
            houseIconCloseAndClean();
            if( $("#Elev_ITM").val()== "*" )
              var url_ = "http://220.134.42.63:8080/WaterscadaAPI/WI_StationData?section=轄區供水系統&item=1";
            else {
              var station_id = $("#left_nav1").children(".top_left_menu").find(".left_sub_menu:first").children("li.active").children('a').eq(0).val();
              var url_ = "http://220.134.42.63:8080/WaterscadaAPI/WI_StationData?section=轄區供水系統&item=1&station_id=" + station_id;
            }
            if($("#Elev_STA").closest("div").hasClass("active"))
              serviceControll(this,false);
            else 
              houseIconCloseAndClean();
            if (document.querySelector('.multipleChoice').classList.contains('active')) {
                var thisLinkNumber = this.id.split('')[this.id.length - 1];
                activeLinkNumber = thisLinkNumber;
                if (document.querySelector('#physicQuantities>div').classList.contains('active')) {
//                    houseControll(false, 0);  // 原本
                    //轉跳其他場所link
//                    houseControll(true, activeLinkNumber); // 原本
                } else {
//                    houseControll(false, 0);  // 原本
                    //          houseControll(false, activeLinkNumber);
                }
                //開啟物理量列
                document.getElementsByClassName("multipleChoice")[0].classList.add('active');
            } else {
                //關閉物理量列
                document.getElementsByClassName('multipleChoice')[0].classList.remove('active');
            }

            e.stopPropagation();
            fullScreenBlocker("資料讀取中。。。");
            //選單邏輯控制
            var li = this.parentElement.parentElement;
            if (!li.classList.contains('active')) {
                if (li.parentElement.getElementsByClassName('active')[0]) {
                    li.parentElement.getElementsByClassName('active')[0].classList.remove('active');
                }
                li.classList.add('active');
            }

            //      document.getElementsByClassName("multipleChoice")[0].classList.add('active');
            var _this = this;
            //移除icon
            RmvMarker();
            //服務所內容存放
            document.getElementById('Elev_ITM').value = this.value;

            var keys = Object.keys(buttonCombinations['轄區供水系統']);
            //場所名稱
            var key = Object.keys(buttonCombinations['轄區供水系統']).find(function(content) {
                return buttonCombinations['轄區供水系統'][content]['id'] == _this.id;
            });
//                  console.log(key);
            
            //篩選單數服務所
            if (this.id != "Elev_ITM_0" && this.id != "Elev_ITM_9" && this.id != "Elev_ITM_1") {
              var activeSupplyitem = 0;
                if ($("#left_nav1 .top_left_menu li:nth-of-type(2)").hasClass("active")) {
                    //供水系統按鈕
                    activeSupplyitem = 1;
                    //          messageBoxCloseAndClean();
                    //          messageBoxNameCloseAndClean();
                    //          physicMessageBoxNamesCloseAndClean();
                    //          physicMessageBoxCloseAndClean();
                    //          houseControll(false, 0);
                } else
                    //全區供水按鈕
                    activeSupplyitem = 0;
                if ((document.getElementById('Elev_MSR').value != "") && !activeSupplyitem) {
                    document.getElementById('Elev_ITM').value = this.value;
                    if ($(".allsitecontrol1").hasClass("active"))
                        //總覽的全部場站URL
                        var dataurltosend = dataAllSiteUrlComposer();
                    else
                        //重要場站 URL
                        var dataurltosend = dataUrlComposer();
                    JSAJAX(dataurltosend, true);
                } else {
                    e.preventDefault();
                    fullScreenBlockerRemover();
                }

                singleOrMultiple = false;

                var center = getWMSCenterCoordinate(buttonCombinations['轄區供水系統'][key]['wmsurl']);
                pMap.setCenter(new TGOS.TGPoint(center[0], center[1]));
                if (this.id == "Elev_ITM_2") {
                    pMap.setZoom(6);
                } else {
                    pMap.setZoom(7);
                }

                deleteWms();

                if (!WMSLayer[this.id]) {
                    addWms(buttonCombinations['轄區供水系統'][key]['wmsurl'], this.id);
                } else {
                    WMSLayer[this.id].setVisible(true);
                }
                // basicWMSControllersActive(this.id.split('')[this.id.length -1 ]);
            } else if (this.id == "Elev_ITM_0") {
                //debugger;
                if (document.getElementById('Elev_MSR').value != "") {
                    document.getElementById('Elev_ITM').value = this.value;
                    if ($(".allsitecontrol1").hasClass("active"))
                        var dataurltosend = dataAllSiteUrlComposer();
                    else
                        var dataurltosend = dataUrlComposer(); // 重要場站
                    //debugger;
                    console.log("debugger");
                    JSAJAX(dataurltosend, true);
                }
                
                //console.log('Elev_ITM_1');
                singleOrMultiple = true;
                deleteWms();
                var totallX = 0;
                var totallY = 40000; //set offset on the y aixs
                var generallCenterCoordinate = [];
                var _center = [];
                var generalwmsurls = buttonCombinations['轄區供水系統']['總覽圖']['wmsurl'];
                var generalwmsurlsKeys = Object.keys(generalwmsurls);                
                console.log(generalwmsurlsKeys);
                //載入WMS圖層
                for (var F = 1; F < generalwmsurlsKeys.length; F++) {
                    _center = getWMSCenterCoordinate(generalwmsurls[generalwmsurlsKeys[F]]);

                    if (!WMSLayer[buttonCombinations['轄區供水系統'][generalwmsurlsKeys[F]]['id']]) {
                        addWms(generalwmsurls[generalwmsurlsKeys[F]], buttonCombinations['轄區供水系統'][generalwmsurlsKeys[F]]['id']);
                    } else {
                        WMSLayer[buttonCombinations['轄區供水系統'][generalwmsurlsKeys[F]]['id']].setVisible(true);
                    }

                    // addWms(generalwmsurls[generalwmsurlsKeys[F]], buttonCombinations['轄區供水系統'][generalwmsurlsKeys[F]]['id']);
                    totallX += _center[0];
                    totallY += _center[1];
                }
                generallCenterCoordinate = [totallX / (generalwmsurlsKeys.length - 1), totallY / (generalwmsurlsKeys.length - 1)];
                pMap.setCenter(new TGOS.TGPoint(generallCenterCoordinate[0], generallCenterCoordinate[1]));
                pMap.setZoom(6);
                fullScreenBlockerRemover();
              
              
                //console.log("Elev_ITM_0:" + x_x);
//                singleOrMultiple = true;
//                // deleteWms();
//                var totallX = 0;
//                var totallY = 40000; //set offset on the y aixs
//                var generallCenterCoordinate = [];
//                var _center = [];
//                var generalwmsurls = buttonCombinations['轄區供水系統']['總覽圖']['wmsurl'];
//                var generalwmsurlsKeys = Object.keys(generalwmsurls);                
//                console.log(generalwmsurlsKeys);
//                //載入WMS圖層
//                for (var F = 1; F < generalwmsurlsKeys.length; F++) {
//                    _center = getWMSCenterCoordinate(generalwmsurls[generalwmsurlsKeys[F]]);
//
//                    if (!WMSLayer[buttonCombinations['轄區供水系統'][generalwmsurlsKeys[F]]['id']]) {
//                        addWms(generalwmsurls[generalwmsurlsKeys[F]], buttonCombinations['轄區供水系統'][generalwmsurlsKeys[F]]['id']);
//                    } else {
//                        WMSLayer[buttonCombinations['轄區供水系統'][generalwmsurlsKeys[F]]['id']].setVisible(true);
//                    }
//
//                    // addWms(generalwmsurls[generalwmsurlsKeys[F]], buttonCombinations['轄區供水系統'][generalwmsurlsKeys[F]]['id']);
//                    totallX += _center[0];
//                    totallY += _center[1];
//                }
//                generallCenterCoordinate = [totallX / (generalwmsurlsKeys.length - 1), totallY / (generalwmsurlsKeys.length - 1)];
//                pMap.setCenter(new TGOS.TGPoint(generallCenterCoordinate[0], generallCenterCoordinate[1]));
//                pMap.setZoom(6);
                
                //總覽+house
//                if (document.getElementById('Elev_MSR').value == "") {
//                    document.getElementById('Elev_ITM').value = "1";
//                    document.getElementById('Elev_MSR').value = "";
//                    //重要場站                    
//                    var dataurltosend = dataUrlComposer();
//                    console.log('總覽');
//                    if (firstload) {
//                        JSAJAX(dataurltosend, true);
//                    } else {
//                        document.getElementById('Elev_MSR').value = "";
//                        //關閉house
//                        //houseControll(true, 0);
//                        fullScreenBlockerRemover();
//                    }
//                } else {
//                    document.getElementById('Elev_ITM').value = "*";
//                    //總覽+物理量迴圈
//                    console.log('multiple');
//                    fullScreenBlockerRemover();
//                    multipleAjaxSender();
//                }
            } else if (this.id == "Elev_ITM_9") {
                if (document.getElementById('Elev_MSR').value != "") {
                    document.getElementById('Elev_ITM').value = this.value;
                    if ($(".allsitecontrol1").hasClass("active"))
                        var dataurltosend = dataAllSiteUrlComposer();
                    else
                    //重要場站
                        var dataurltosend = dataUrlComposer();
                    JSAJAX(dataurltosend, true);
                }
                singleOrMultiple = false;
                deleteWms();
                var _totallX = 0;
                var _totallY = 0;
                var _generallCenterCoordinate = [];
                var _center2 = [];

                for (var _F2 = 0; _F2 < NW.length; _F2++) {
                    _center2 = getWMSCenterCoordinate(buttonCombinations['轄區供水系統'][key]['wmsurl'][Object.keys(buttonCombinations['轄區供水系統'][key]['wmsurl'])[_F2]]);
                    _totallX += _center2[0];
                    _totallY += _center2[1];

                    if (!WMSLayer[NW[_F2]]) {
                        addWms(buttonCombinations['轄區供水系統'][key]['wmsurl'][Object.keys(buttonCombinations['轄區供水系統'][key]['wmsurl'])[_F2]], NW[_F2]);
                    } else {
                        WMSLayer[NW[_F2]].setVisible(true);
                    }
                }

                _generallCenterCoordinate = [_totallX / NW.length, _totallY / NW.length];
                pMap.setCenter(new TGOS.TGPoint(_generallCenterCoordinate[0], _generallCenterCoordinate[1]));
                pMap.setZoom(6);

                fullScreenBlockerRemover();
            } else if (this.id == "Elev_ITM_1") {
                if (document.getElementById('Elev_MSR').value != "") {
                    document.getElementById('Elev_ITM').value = this.value;
                    if ($(".allsitecontrol1").hasClass("active"))
                        var dataurltosend = dataAllSiteUrlComposer();
                    else
                        var dataurltosend = dataUrlComposer(); // 重要場站
                    JSAJAX(dataurltosend, true);
                }
                //console.log('Elev_ITM_1');
                singleOrMultiple = false;
                deleteWms();
                var _totallX = 0;
                var _totallY = 0;
                var _generallCenterCoordinate = [];
                var _center2 = [];
                for (var _F2 = 0; _F2 < BS.length; _F2++) {
                    _center2 = getWMSCenterCoordinate(buttonCombinations['轄區供水系統'][key]['wmsurl'][Object.keys(buttonCombinations['轄區供水系統'][key]['wmsurl'])[_F2]]);
                    _totallX += _center2[0];
                    _totallY += _center2[1];
                    if (!WMSLayer[BS[_F2]]) {
                        addWms(buttonCombinations['轄區供水系統'][key]['wmsurl'][Object.keys(buttonCombinations['轄區供水系統'][key]['wmsurl'])[_F2]], BS[_F2]);
                    } else {
                        WMSLayer[BS[_F2]].setVisible(true);
                    }
                }

                _generallCenterCoordinate = [_totallX / BS.length, _totallY / BS.length];
                pMap.setCenter(new TGOS.TGPoint(_generallCenterCoordinate[0], _generallCenterCoordinate[1]));
                pMap.setZoom(6);
                fullScreenBlockerRemover();
            }
        };
    }
    
    //調整各服務所的透明度  
    for (var _E4 = 0; _E4 < wmsOpacityControllers.length; _E4++) {
        wmsOpacityControllers[_E4].onmousedown = function() {
            if (this.id == 'alpha_Elev_ITM_0') {
                this.onchange = function() {
                    for (var F = 0; F < wmsOpacityControllers.length; F++) {
                        wmsOpacityControllers[F].value = this.value;
                        if (WMSLayer[Object.keys(WMSLayer)[F]]) {
                            WMSLayer[Object.keys(WMSLayer)[F]].setOpacity(this.value);
                        }
                    }
                };

                this.onmousemove = function() {
                    for (var F = 0; F < Object.keys(WMSLayer).length; F++) {
                        WMSLayer[Object.keys(WMSLayer)[F]].setOpacity(this.value);
                    }
                };

                this.onmouseup = function() {
                    this.onmousemove = null;
                };
            } else if (this.id == 'alpha_Elev_ITM_9') {
                this.onchange = function() {
                    for (var F = 0; F < NW.length; F++) {
                        WMSLayer[NW[F]].setOpacity(this.value);
                    }
                };

                this.onmousemove = function() {
                    for (var F = 0; F < NW.length; F++) {
                        WMSLayer[NW[F]].setOpacity(this.value);
                    }
                };

                this.onmouseup = function() {
                    this.onmousemove = null;
                };
            } else {
                var idString = this.id.toString();
                var slicingPoint = idString.indexOf('Elev');
                var wmsid = idString.slice(slicingPoint);
                if (WMSLayer[wmsid]) {
                    // WMSLayer[wmsid].setOpacity(this.value);
                }
                this.onchange = function() {
                    //console.log(wmsid);
                    WMSLayer[wmsid].setOpacity(this.value);
                }

            }
        };
    }
};
//服務所按鈕偵測
settingWMSActions();
var wmscount = 0;
var fullwmscount = 0;
//建立WMS物件, 加入WMS連結, 並指定相關屬性
function addWms(tUrl, buttonId) {
    // var tUrl = document.getElementById('wmsUrl').value;  //取出WMS連結
    var WMS = new TGOS.TGWmsLayer(tUrl, {
        //建立WMS物件, 加入WMS連結, 並指定相關屬性
        map: pMap,
        preserveViewport: true,
        zIndex: 0,
        wsVisible: true
    });
    WMS.setOpacity(defaultOpacity);
    if (!WMSLayer[buttonId]) {
        WMSLayer[buttonId] = WMS;
    }
}
//移除WMS圖層
function deleteWms() {
    if (Object.keys(WMSLayer).length > 0) {
        for (var i = 0; i < Object.keys(WMSLayer).length; i++) {
            WMSLayer[Object.keys(WMSLayer)[i]].setVisible(false); //當圖面上存在WMS圖層時, 將該圖層移除
        }
    } else {

    }
};
//建立WMTS物件, 加入WMTS連結, 並指定相關屬性
function addWMTS(tUrl, buttonId) {
    var tUrl = "https://landmaps.nlsc.gov.tw/S_Maps/wmts";
    var info = {
        matrixSet: 'GoogleMapsCompatible',
        layer: 'DMAPS',
        //   layer: 'LUIMAP', 
        format: "image/png",
        style: "default"
    };
    var req = {
        wmtsVisible: true,
        zIndex: 50,
    };
    var WMTS = new TGOS.TGWmtsLayer(tUrl, pMap, info, req);
    //debugger;
    WMTS.setTileOpacity(defaultOpacity);
    if (!WMSLayer[buttonId]) {
        WMSLayer[buttonId] = WMTS;
    }
}
//移除WMTS圖層

//建立地圖樣貌（WMS） 
var addFullWMS = function addFullWMS(wmsurl) {
    var fullWMS = new TGOS.TGWmsLayer(wmsurl, {
        //建立WMS物件, 加入WMS連結, 並指定相關屬性
        map: pMap,
        preserveViewport: true,
        zIndex: 0,
        wsVisible: true
    });
    fullWMSLayer.push(fullWMS);
};

//x建立地圖樣貌, 加入WMS連結, 並指定相關屬性
function addfullWMSorigin(tUrl, buttonText) {
    var fullWMS = new TGOS.TGWmsLayer(tUrl, {
        //建立WMS物件, 加入WMS連結, 並指定相關屬性
        map: pMap,
        preserveViewport: true,
        //zIndex: 1,
        wsVisible: true
    });
    fullWMSLayer.push(fullWMS);
    var wmsoptionswrapper = document.createElement('div');
    wmsoptionswrapper.id = "wmscontent".concat(wmscount);
    wmsoptionswrapper.classList.add('wmscontent');
    var spantext = document.createElement("span");
    spantext.textContent = buttonText;
    wmsoptionswrapper.appendChild(spantext);
    var opacityControll = document.createElement("input");
    opacityControll.type = 'range';
    opacityControll.min = 0;
    opacityControll.max = 1;
    opacityControll.step = 0.1;
    opacityControll.setAttribute("value", "1");

    opacityControll.onmousedown = function() {
        // //console.log(fullwmscount);
        setfullWmsOpacity(fullwmscount - 1, this.value);

        this.onmousemove = function() {
            setfullWmsOpacity(fullwmscount - 1, this.value);
        };

        this.onmouseup = function() {
            this.onmousemove = null;
        };
    };

    wmsoptionswrapper.appendChild(opacityControll);
    var multiplechoicebutton1 = document.createElement("button");
    multiplechoicebutton1.textContent = '隱藏';
    multiplechoicebutton1.setAttribute("onclick", "hidefullWmsSpecific(".concat(wmscount, ")"));
    wmsoptionswrapper.appendChild(multiplechoicebutton1);
    var multiplechoicebutton2 = document.createElement('button');
    multiplechoicebutton2.textContent = '顯示';
    multiplechoicebutton2.setAttribute("onclick", "showfullWmsSpecific(".concat(wmscount, ")"));
    wmsoptionswrapper.appendChild(multiplechoicebutton2);
    var multiplechoicebutton3 = document.createElement('button');
    multiplechoicebutton3.textContent = '刪除';
    multiplechoicebutton3.setAttribute("onclick", "deletefullWMS(".concat(wmscount, ", this.parentElement)"));
    wmsoptionswrapper.appendChild(multiplechoicebutton3);
    document.getElementsByClassName("addedfullWMS")[0].appendChild(wmsoptionswrapper);
    fullwmscount += 1;
}
//移除全部WMS圖層
function deletefullWMS() {
    if (fullWMSLayer.length > 0) {
        for (var E = 0; E < fullWMSLayer.length; E++) {
            // //console.log(fullWMSLayer.length);
            fullWMSLayer[E].removeWmsLayer();
        }
    }
}
//移除特定圖層
function deleteWmsSpecific(number, target) {
    WMSLayer[number].removeWmsLayer();
    target.remove(); // wmscount -= 1;
}
//x
function deletefullWmsSpecific(number, target) {
    fullWMSLayer[number].removeWmsLayer();
    target.remove(); // wmscount -= 1;
}

function hideWmsSpecific(number) {
    WMSLayer[number].setWmsVisible(false);
}


//x
function allWmsHide() {
    var wmskeys = Object.keys(WMSLayer);
    for (var E = 0; E < wmskeys.length; E++) {
        WMSLayer[wmskeys[E]].setWmsVisible(false);
    }
}


function hidefullWmsSpecific(number) {
    fullWMSLayer[number].setWmsVisible(false);
}

function showWmsSpecific(number) {
    WMSLayer[number].setWmsVisible(true);
}

function showfullWmsSpecific(number) {
    fullWMSLayer[number].setWmsVisible(true);
}

function setWmsOpacity(number, opacity) {
    WMSLayer[number].setOpacity(opacity);
}

function setWmtsOpacity(number, opacity) {
    WMSLayer[number].setOpacity(opacity);
}

function setfullWmsOpacity(number, opacity) {
    fullWMSLayer[number].setOpacity(opacity);
}


//都市計畫等圖層
var TileLayer = null;
var TileType;
//x
function AddTile() {
    if (TileLayer) {
        //如圖面上已經存在主題圖磚圖層，則在切換新的圖磚之前先行移除舊主題圖磚
        TileLayer.removeTileOverlay(TileType);
    }

    var bounds = pMap.getBounds(); //取得目前地圖圖面邊界值

    TileLayer = new TGOS.TGTileOverlay(); //宣告主題圖磚物件

    var req = {
        //設定主題圖磚需求參數
        scaleLevel: 0,
        //地圖層級
        left: parseFloat(bounds.left),
        //圖磚需求範圍邊界
        top: parseFloat(bounds.top),
        right: parseFloat(bounds.right),
        bottom: parseFloat(bounds.bottom),
        map: pMap,
        //套疊目標地圖
        overlay: true //是否套疊主題圖磚

    };

    if (document.getElementById("TileList").value == 1) {
        //取得下拉選單的值
        TileType = TGOS.TGMapServiceId.CITYZONING; //依照取得值來指定主題圖磚的種類

        document.getElementById("legend").innerHTML = "<img src='https://api.tgos.tw/TGOS_API/ThemeLegend/CITYZONING.jpg' title='都市計畫圖'/>";
    } else if (document.getElementById("TileList").value == 2) {
        TileType = TGOS.TGMapServiceId.RURALZONING;
        document.getElementById("legend").innerHTML = "<img src='https://api.tgos.tw/TGOS_API/ThemeLegend/RURALZONING.jpg' title='非都市土地使用分區圖'/>";
    } else if (document.getElementById("TileList").value == 3) {
        TileType = TGOS.TGMapServiceId.LANDUSE;
        document.getElementById("legend").innerHTML = "<img src='https://api.tgos.tw/TGOS_API/ThemeLegend/LANDUSE.png' title='國土利用調查'/>";
    } else {
        TileType = TGOS.TGMapServiceId.TOPO1000;
        document.getElementById("legend").innerHTML = "";
    }

    TileLayer.getThemeTile(TileType, req, 0.7, function() {}); //取得主題圖磚進行套疊, 並設定透明度
}
//x
function removeOverlay() {
    TileLayer.removeTileOverlay(TileType);
} //初始化--------------------------------------------------
//點測試----------------------------------------------------------------------
for (var _E5 = 0; _E5 < 3; _E5++) {
//    debugger;
    var poptestcontent = document.createElement('div');
    for (var F = 0; F < 6; F++) {
        var poptestcontentinner = document.createElement('div');
        poptestcontentinner.textContent = "\u6E2C\u8A66".concat(F, "\u9EDE\u64CA\u6E2C\u8A66");
        poptestcontentinner.classList.add("pop");
        poptestcontentinner.style.border = "1px solid black";
        poptestcontent.appendChild(poptestcontentinner);
    }
}
//移除物理量icon&物理量memoe
function RmvMarker() {
    for (var i = 0; i < Markers.length; i++) {
        Markers[i].setMap(null);
    }
    //移除icon
    if (typeof(singleMarker) == 'object') {
        singleMarker.setMap(null);
        singleMarker = "";
    }
    for (var i = 0; i < changeMark.length; i++) {
        changeMark[i].setMap(null);
    }
    physicMessageBoxNamesCloseAndClean();
    physicMessageBoxCloseAndClean();
    Markers = [];
}

var infotext = []; //依序填入地標名稱及訊息視窗內容, 可自行增減數量

var markerPoint = []; //依序填入地標坐標位置, 坐標數須與標記數一致

var imgUrl = []; //依序設定標記點圖示來源

var stationIdforinfoWindo = []
    //物理量icon
function labelinfoControll(labelinfo) {
    infotext = labelinfo["infotext"];
    markerPoint = labelinfo["markerPoint"];
    imgUrl = labelinfo["imgUrl"];
    stationIdforinfoWindo = labelinfo["STATION_ID"];
}

// labelinfoControll(labelinfo);


//var wmsselect = document.createElement('select');   //remove duplicate parameter
var map = {
    "土城": {
        "layer": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Tucheng&bbox=291163.5602835865,2758712.4774454506,298675.4977835865,2765432.2274454506&width=768&height=687&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
        "points": "http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:station_4101&bbox=282420.496323016,2753577.95046695,302541.465885481,2783572.39340962&width=515&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true&viewparams=where:stan_type='0' and const_unit='土城服務所'"
    },
    "泰山": {
        "layer": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Taishan&bbox=288056.7477835865,2769016.2274454506,297522.0915335865,2780475.7274454506&width=634&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
        "points": "http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:station_4101&bbox=282420.496323016,2753577.95046695,302541.465885481,2783572.39340962&width=515&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true&viewparams=where:stan_type='2' and const_unit='泰山營運所'"
    },
    "新莊": {
        "layer": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Xinzhuang&bbox=289420.2087284418,2765299.2274454506,298387.7803280551,2773458.4774454506&width=768&height=698&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
        "points": "http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:station_4101&bbox=282420.496323016,2753577.95046695,302541.465885481,2783572.39340962&width=515&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true&viewparams=where:stan_type='2' and const_unit='新莊服務所'"
    },
    "蘆洲": {
        "layer": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Luzhou&bbox=286932.1540335865,2773890.1221998935,299574.4665335865,2784745.2089639166&width=768&height=659&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
        "points": "http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:station_4101&bbox=282420.496323016,2753577.95046695,302541.465885481,2783572.39340962&width=515&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true&viewparams=where:stan_type='2' and const_unit='蘆洲服務所'"
    }
};
var point = {
    "土城": "http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:station_4101&bbox=282420.496323016,2753577.95046695,302541.465885481,2783572.39340962&width=515&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true&viewparams=where:stan_type='0' and const_unit='土城服務所'",
    "泰山": "http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:station_4101&bbox=282420.496323016,2753577.95046695,302541.465885481,2783572.39340962&width=515&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true&viewparams=where:stan_type='2' and const_unit='泰山營運所'",
    "新莊": "http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:station_4101&bbox=282420.496323016,2753577.95046695,302541.465885481,2783572.39340962&width=515&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true&viewparams=where:stan_type='2' and const_unit='新莊服務所'",
    "蘆洲": "http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:station_4101&bbox=282420.496323016,2753577.95046695,302541.465885481,2783572.39340962&width=515&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true&viewparams=where:stan_type='2' and const_unit='蘆洲服務所'"
};


var pointselect = document.createElement('select');

for (var E = 0; E < Object.keys(map).length; E++) {
    var opt = document.createElement('option');
    opt.textContent = Object.keys(map)[E];
    opt.value = map[Object.keys(map)[E]]["points"];
    pointselect.appendChild(opt);
}

var pointtext = document.createElement("span");
pointtext.textContent = "點";
var togetherselect = document.createElement('select');

for (var E = 0; E < Object.keys(map).length; E++) {
    var opt = document.createElement('option');
    opt.textContent = Object.keys(map)[E];
    opt.value = Object.keys(map)[E];
    togetherselect.appendChild(opt);
}

var newmap = Object.keys(map).map(function(key) {
    return {
        name: key,
        photo: map[key]
    };
});

var newmapset = newmap;

for (var E = 0; E < newmapset.length; E++) {
    newmapset[E]["pointsset"] = point[Object.keys(point)[E]];
}

var mapinputtext = document.createElement("span");
mapinputtext.textContent = "搜尋";
var mapinput = document.createElement('input');
mapinput.classList.add('mapinput');
var mapinputwrapper = document.createElement("label");
mapinputwrapper.appendChild(mapinputtext);
mapinputwrapper.appendChild(mapinput);

// document.getElementsByTagName('body')[0].appendChild(mapinputwrapper);
// document.getElementsByTagName('body')[0].appendChild(mapinput);

//左上搜尋紐
function search(target, searchmodel) {
    var resultwrapper = document.createElement("div");
    document.getElementsByTagName('body')[0].appendChild(resultwrapper);
    resultwrapper.style.position = "fixed";
    resultwrapper.style.top = 0;
    resultwrapper.style.left = 0;

    target.onkeyup = function() {
        var _this2 = this;

        var result = Object.keys(searchmodel).filter(function(model) {
            return model.toLowerCase().includes(_this2.value.toLowerCase());
        });
        var resultArea = document.createElement('div');
        resultArea.style.position = "absolute";
        resultArea.style.zIndex = "6";
        // //console.log(result);

        for (var E = 0; E < result.length; E++) {
            var resultcontent = document.createElement("button");
            resultcontent.textContent = result[E]; // var resultcontenttext = resultcontent.outerHTML;

            resultArea.appendChild(resultcontent);

            resultcontent.onclick = function() {
                var _this3 = this;

                // deleteWms();
                var content = Object.keys(searchmodel).filter(function(item) {
                    return item == _this3.textContent;
                });
                // //console.log(content[0]);
                document.getElementById('wmsUrl').value = map[content[0]]['layer'];
                addWms();
            };
        }

        resultwrapper.innerHTML = "";
        resultwrapper.appendChild(resultArea);
    };
}

search(mapinput, map);

function getElementIndex(target) {
    var nodes = Array.prototype.slice.call(target.parentElement.children);
    var index = nodes.indexOf(target); //ES6 let index = [...target.parentElement.children].indexOf(target);

    return index;
}



//Chart.js

var mapDiv, newCustomLayer; //五都資料

var ev = [ // { id : 1, name : "台北市", chartDiv: document.getElementById("chart-area1"), x: 304743.6250000005, y: 2770575.1041666684 },
    {
        id: 1,
        name: "新北市",
        chartDiv: document.getElementById("chart-area2"),
        x: 306290.9830887581,
        y: 2785849.4620828195
    }
];

//客制化圖層
var CustomLayer = function CustomLayer(map) {
    this.padding = 50;
    this.width = 180;
    this.height = 100;
    this.setMap(map);
}; //繼承TGOS.TGOverlayView


CustomLayer.prototype = new TGOS.TGOverlayView(); //實做onAdd，設定疊加層

CustomLayer.prototype.onAdd = function() {
    //取得欲套疊的地圖承載層
    var panes = this.getPanes();
    var mapLayer = panes.overlayviewLayer; //設定疊加層座標系統

    this.mSRS = this.map.getCoordSys(); //設定疊加層HTML 物件(DIV)

    this.div = document.createElement("div");
    this.div.id = "chartDiv";
    this.div.style.position = "absolute"; //設定定疊加層寬度

    this.div.style.width = "100%"; //設定定疊加層高度

    this.div.style.height = "100%"; //設定定疊加層HTML物件 Style

    this.div.style.zIndex = 1000; //將div加入至現有圖層中

    mapLayer.appendChild(this.div);

    for (var i = 0; i < ev.length; i++) {
        var tDiv = document.createElement("div");
        var tCanvas = document.createElement("canvas"); //設定疊加層HTML 物件(DIV) 放置chart用

        tDiv.id = "chartArea_" + ev[i].id;
        tDiv.style.width = this.width + "px";
        tDiv.style.height = this.height + "px";
        tDiv.style.position = "absolute";
        tDiv.appendChild(tCanvas); //new Chart

        var config = newConfig();
        var ctx = tCanvas.getContext("2d");
        ctx.canvas.width = this.width;
        ctx.canvas.height = this.height;
        window.myPie = new Chart(ctx, config); //取得螢幕點位

        var proj = this.getProjection();
        var p = proj.fromMapToDiv(new TGOS.TGPoint(ev[i].x, ev[i].y)); //給螢幕位置

        tDiv.style.left = p.x - this.padding + "px";
        tDiv.style.top = p.y - this.padding + "px"; //add chartDiv layer

        this.div.appendChild(tDiv);
    }
};

CustomLayer.prototype.onDraw = function() {
    //Write By Supergeo
    var proj = this.getProjection();
    var padding = this.padding; // transform function. 指定每個點的座標.

    for (var i = 0; i < ev.length; i++) {
        transform(ev[i].id, new TGOS.TGPoint(ev[i].x, ev[i].y));
    }

    function transform(id, d) {
        //將地圖座標轉換成相對於地圖div左上角的螢幕座標
        var pt = new TGOS.TGPoint(d.x, d.y);
        var p = proj.fromMapToDiv(pt);
        document.getElementById("chartArea_" + id).style.left = p.x - padding + "px";
        document.getElementById("chartArea_" + id).style.top = p.y - padding + "px";
    }
}; //實做onRemove

CustomLayer.prototype.onRemove = function() {
    this.div.parentNode.removeChild(this.div);
    this.div = null;
}; //圓餅圖參數

//圓餅圖
function newConfig() {
    var randomScalingFactor = function randomScalingFactor() {
        return Math.round(Math.random() * 100);
    };

    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [0.2, 0.2, 0.2, 0.2, 0.2],
                backgroundColor: [window.chartColors.red, window.chartColors.yellow, window.chartColors.orange, window.chartColors.green, window.chartColors.blue]
            }],
            labels: ["red", "Orange", "Yellow", "Green", "Blue"]
        },
        options: {
            responsive: false,
            legend: {
                display: false,
                position: 'top'
            },
            title: {
                display: false,
                text: '圓餅圖'
            }
        }
    };
    return config;
}

var makepie = document.createElement('button');
makepie.textContent = "圓餅圖";

makepie.onclick = function() {
    makePie();
}; // document.getElementsByTagName('body')[0].appendChild(makepie);

function makePie() {
    newCustomLayer = new CustomLayer(pMap);
}


var getCoordinateLabel = document.createElement('label');
getCoordinateLabel.textContent = "地圖點擊坐標";
var getCoordinateText = document.createElement("span");
getCoordinateText.classList.add('coordinate'); // document.getElementsByTagName('body')[0].appendChild(getCoordinateLabel);
// document.getElementsByTagName('body')[0].appendChild(getCoordinateText);

//x取得點擊坐標-關閉
function getcoordinationon(target) {
    target.textContent = "關閉";
    target.nextElementSibling.textContent = "偵測點擊坐標開啟"; //取得點擊坐標

    var InfoWindowOptions = {
        maxWidth: 4000,
        pixelOffset: {
            x: 0,
            y: 0
        },
        zIndex: 0
    };
    TGOS.TGEvent.addListener(pMap, "click", function(e) {
        //加入滑鼠單擊地圖事件監聽器
        if (messageBox) {
            messageBox.close(pMap);
        }

        pMap.setZoom(6); //設定地圖層級

        var pt = e.point; //取得滑鼠點擊位置坐標

        pMap.setCenter(pt); //地圖平移至點擊位置

        var level = pMap.getZoom(); //取得目前地圖層級

        var message = "X坐標: " + pt.x + "<br>Y坐標: " + pt.y + "<br>地圖層級: " + level; //組合顯示訊息

        messageBox = new TGOS.TGInfoWindow(message, pt, InfoWindowOptions); //在點擊位置上開啟訊息窗格, 並寫入坐標及地圖層級

        messageBox.open(pMap);
        document.getElementsByClassName("coordinate")[0].textContent = message;
    });
}
//x取得點擊坐標-開啟
function getcoordinationoff(target) {
    TGOS.TGEvent.clearListeners(pMap, "click");
    target.textContent = "開啟";
    target.nextElementSibling.textContent = "偵測點擊坐標關閉";
}

var getcoordinatecount = 0;

//x
function popupaction() {
    document.getElementsByClassName("popupwrapper")[0].parentElement.parentElement.style.backgroundColor = 'deepskyblue';
    document.getElementsByClassName("popupwrapper")[0].parentElement.parentElement.style.borderRadius = "0px";
    var pop = document.getElementsByClassName("pop");

    var _loop2 = function _loop2(_E6) {
        // //console.log(pop[_E6].outerHTML);

        pop[_E6].onclick = function() {
            document.getElementsByClassName("forpop")[_E6].style.backgroundColor = 'blue';
        };
    };

    for (var _E6 = 0; _E6 < pop.length; _E6++) {
        _loop2(_E6);
    }
}

function opacityController(target, number) {
    // //console.log(target.value);
    setWmsOpacity(number, target.value);

    target.onmousemove = function() {
        // //console.log('gogogo');
        setWmsOpacity(number, this.value);
    };

    target.onmouseup = function() {
        this.onmousemove = null;
    };
}

var wmsOptions = [];
//x
function settingWmsOptions(buttonId, buttonText) {
    var wmsoptionswrapper = document.createElement('div');
    wmsoptionswrapper.setAttribute("value", buttonId);
    wmsoptionswrapper.id = "wmscontent".concat(wmscount);
    wmsoptionswrapper.classList.add('wmscontent');
    var spantext = document.createElement("span");
    spantext.textContent = buttonText;
    wmsoptionswrapper.appendChild(spantext);
    var opacityControll = document.createElement("input");
    opacityControll.type = 'range';
    opacityControll.min = 0;
    opacityControll.max = 1;
    opacityControll.step = 0.1;
    opacityControll.setAttribute("value", "1");
    opacityControll.setAttribute("onmousedown", "opacityController(this ,".concat(wmscount, ")"));
    opacityControll.setAttribute("onchange", "setWmsOpacity(".concat(wmscount, ", this.value);"));
    wmsoptionswrapper.appendChild(opacityControll);
    var multiplechoicebutton1 = document.createElement("button");
    multiplechoicebutton1.textContent = '隱藏';
    multiplechoicebutton1.setAttribute("onclick", "hideWmsSpecific(".concat(wmscount, ")"));
    wmsoptionswrapper.appendChild(multiplechoicebutton1);
    var multiplechoicebutton2 = document.createElement('button');
    multiplechoicebutton2.textContent = '顯示';
    multiplechoicebutton2.setAttribute("onclick", "showWmsSpecific(".concat(wmscount, ")"));
    wmsoptionswrapper.appendChild(multiplechoicebutton2);
    var multiplechoicebutton3 = document.createElement('button');
    multiplechoicebutton3.textContent = '刪除';
    multiplechoicebutton3.setAttribute("onclick", "deleteWmsSpecific(".concat(wmscount, ", this.parentElement)"));
    wmsoptionswrapper.appendChild(multiplechoicebutton3);
    wmsOptions[wmscount] = wmsoptionswrapper; // liststring[wmscount] = `<div id = 'wmscontent${wmscount}' value='${buttonId}' class = 'wmscontent'>
    // <span>
    //     ${buttonText}
    // </span>
    // <input type='range' min = '0' max = '1' step = '0.1' value = '0.6'  onmousemove='setWmsOpacity(${wmscount} ,this.value)'/>
    // <button onclick = "hideWmsSpecific(${wmscount})">隱藏</button>
    // <button onclick = "showWmsSpecific(${wmscount})">顯示</button>
    // <button onclick = "deleteWmsSpecific(${wmscount}, this.parentElement)">刪除</button></div>`
    // liststring.innerHTML += settingMultipleOptions(buttonId, buttonText)

    document.getElementsByClassName("addedWMS")[0].appendChild(wmsOptions[wmscount]);
}

var singleOptions;
var multipleOptionsWrappers = [];
//x
function settingMultipleOptions(buttonId, buttonText, itmenumber) {
    multipleOptionsWrappers["".concat(wmscount)] = document.createElement("div");
    multipleOptionsWrappers["".concat(wmscount)].classList.add('multipleOptionsWrapper');
    multipleOptionsWrappers["".concat(wmscount)].id = "multipleOptionsWrapper" + wmscount;
    multipleOptionsWrappers["".concat(wmscount)].dataset.itemnumber = itmenumber;

    for (var E = 0; E < Object.keys(multipleOptions).length; E++) {
        var content = multipleOptions[Object.keys(multipleOptions)[E]];
        var multipleOptionButtonString = "";
        multipleOptionButtonString = "<input id='".concat(content['id'] + wmscount, "' name = '").concat(content['name'], "' value = '").concat(content['value'], "' type='button' onclick='settingMultipleOptionsAction(this)'/>");
        multipleOptionsWrappers["".concat(wmscount)].innerHTML += multipleOptionButtonString;
    }

    document.getElementById("wmscontent".concat(wmscount)).innerHTML += multipleOptionsWrappers["".concat(wmscount)].outerHTML;
}
//物理量控制
function physicalQuantityController() {

    var physicalQuantity = document.querySelectorAll('input[name="elev_msr"]');
    //console.log(document.getElementById('Elev_MSR').value);
    //  if (document.getElementById('Elev_MSR').value.includes('*'))
    //  {
    //    var tempString = document.getElementById('Elev_MSR').value;
    //    var starExcluded = specificStringSplicer("*",tempString);
    //    //console.log(starExcluded);
    //    document.getElementById('Elev_MSR').value = starExcluded;
    //  }

    for (var E = 0; E < physicalQuantity.length; E++) {
        physicalQuantityClick(E);
    }

    function physicalQuantityClick(E) {
        physicalQuantity[E].onclick = function(e) {
            fromAllOrImportantSelect = false;
            document.getElementsByClassName("allorimportant")[0].selectedIndex = 1;
            if (document.getElementById('Elev_MSR').value == '*') {
                document.getElementById('Elev_MSR').value = "";
            }
            dataForKendo = [];
            stationIDStorage = [];
            e.stopPropagation();
            // firstload = false;
            document.getElementsByClassName("multipleChoice")[0].classList.add('active'); //jackie modify
            settingMultipleOptionsAction(this);            
        };
    }
}
//物理量按鈕偵測
physicalQuantityController();


function specificStringSplicer(targetString, target) {
    var stringArray = target.split('');
    var slicingPoint = target.indexOf(targetString);
    stringArray.splice(slicingPoint, targetString.length);
    var slicedString = stringArray.join('');
    return slicedString;
}
//複數物理量
function settingMultipleOptionsAction(target) {

    var composedMeasureInput = document.getElementById('Elev_MSR');
    if (composedMeasureInput.value == "") {
        composedMeasureInput.value += target.value;
    } else {
        if (composedMeasureInput.value.includes(target.value)) {
            var stringtoslice = target.value.toString();
            var indextoslice = composedMeasureInput.value.toString().indexOf(stringtoslice);
            var newStr = composedMeasureInput.value.toString().split(''); // or newStr = [...str];

            newStr.splice(indextoslice, stringtoslice.length);

            if (newStr[indextoslice] == ',') {
                newStr.splice(indextoslice, 1);
            }

            if (newStr[newStr.length - 1] == ',') {
                newStr.pop();
            }

            newStr = newStr.join('');
            composedMeasureInput.value = newStr;
        } else {
            composedMeasureInput.value += "," + target.value;
        }
    }


    measure = composedMeasureInput.value;

    RmvMarker();
    physicMessageBoxNamesCloseAndClean();
    if (singleOrMultiple) {
        if (measure == "") {

        } else {
            multipleAjaxSender()
        }
    } else {
        if (measure == "") {

        } else {
            var dataurltosend;
            if (document.getElementsByClassName("allsitecontroll")[0].classList.contains('active')) {
                //全部場站URL
                dataurltosend = dataAllSiteUrlComposer();

            } else {
                //重要場站URL
                dataurltosend = dataUrlComposer();
            }
            //console.log(dataurltosend);
            JSAJAX(dataurltosend, true);
            fullScreenBlocker("資料讀取中 。。。");
        }
    }

}
//資料列表+資訊視窗+重要場站 URL
var include_yesterday = 1; //新增昨日測値command
function dataUrlComposer() {
    measure = document.getElementById('Elev_MSR').value;
    item = document.getElementById('Elev_ITM').value;
    var url = "http://".concat(IP[0], "/WaterscadaAPI/").concat(WIFuntions[0], "?section=").concat(sections[0], "&item=").concat(item, "&measure=").concat(measure, "&include_yesterday=").concat(include_yesterday); //新增昨日測値command
    console.log("send:重要場站" + url);
    return url;
}
//資料列表 - 全部點URL
function dataAllPointUrlComposer(station_id) {
    measure = document.getElementById('Elev_MSR').value;
    var url = "http://".concat(IP[0], "/WaterscadaAPI/").concat(WIFuntions[1], "?station_id=").concat(station_id, "&measure=").concat(measure, "&include_yesterday=").concat(include_yesterday);
    console.log("send:全部點" + url);
    return url;
}
//高程供水
function dataSupplyUrlComposer() {
    // measure = document.getElementById('Elev_MSR').value;
    var supplyitem = Number(document.getElementById('elevItme').value);
    var Sub_item = Number(document.getElementById('elevSubitm').value);
    var url = "http://".concat(IP[0], "/WaterscadaAPI/").concat(WIFuntions[2], "?section=").concat(sections[1], "&item=").concat(supplyitem, "&Sub_item=").concat(Sub_item);
    console.log("send:高程供水" + url);
    return url;
}
//全部場站虛擬變數
var tempIdHolder = document.createElement("input");
tempIdHolder.id = 'tempIdHolder'
tempIdHolder.style.display = 'none';
document.getElementsByTagName('body')[0].append(tempIdHolder);

//總覽的全部場站URL
function dataAllSiteUrlComposer() {
    var cityNumber = '*';
    var clickedValue = document.getElementById('Elev_ITM').value;
    for (var E = 0; E < Object.keys(buttonCombinations["轄區供水系統"]).length; E++) {
        //    //console.log(buttonCombinations["轄區供水系統"][Object.keys(buttonCombinations["轄區供水系統"])[E]]['id'])
        if (buttonCombinations["轄區供水系統"][Object.keys(buttonCombinations["轄區供水系統"])[E]]['value'] == clickedValue) {
            cityNumber = buttonCombinations["轄區供水系統"][Object.keys(buttonCombinations["轄區供水系統"])[E]]['placeholder'];
            $("#Elev_").val(cityNumber);
            break;
        }
    }
    measure = document.getElementById('Elev_MSR').value;
    var url = "http://220.134.42.63:8080/waterscadaAPI/GetRealtimeData?measure=".concat(measure, "&city=").concat(cityNumber, "&include_yesterday=").concat(include_yesterday); //新增昨日測値command
    console.log("send:總覽" + url);
    return url;
}

//全部場站
function eachOneFilter(data) {
    var eachOne = data.reduce(function(filteredID, content) {
        if (filteredID.indexOf(content['STATION_ID']) == -1) {
            filteredID.push(content['STATION_ID'])
        };
        return filteredID;
    }, []);
    return eachOne;
}
//重組全部場站的資料格式成重要場站
function dataAllSiteRecomposer(data) {
    //console.log(data);
    var template = {
        "STATIONS": [],
        "DATA": []
    };
    var stationIds = eachOneFilter(data);
    for (var E = 0; E < stationIds.length; E++) {
        //    //console.log(stationIds.length);
        var stationsTemplate = {
            "STATION_ID": "",
            "DISPLAY_NAME": "",
            "LINK": null,
            "STATION_TYPE": "",
            //        "IMAGE": "http://api.tgos.tw/TGOS_API/images/marker2.png",
            "IMAGE": null,
            "X": '',
            "Y": '',
            "X_DELTA": '',
            "Y_DELTA": '',
            "X_DIR": "",
            "Y_DIR": "",
            "PM_TYPE": "",
            "FM_TYPE": ""
        };
        stationsTemplate["STATION_ID"] = stationIds[E];
        stationsTemplate["DISPLAY_NAME"] = stationIds[E];


        var obj = data.find(content => content['STATION_ID'] == stationIds[E]);
        //console.log(obj);
        //console.log(stationIds);
        stationsTemplate["STATION_TYPE"] = obj['STATION_TYPE'];
        stationsTemplate["X"] = obj['LAT'];
        stationsTemplate["Y"] = obj['LNG'];

        template['STATIONS'].push(stationsTemplate);


        var objs = data.filter(content => content['STATION_ID'] == stationIds[E]);

        var dataTemplate = {
            "STATION_ID": "",
            "DISPLAY_NAME": "",
            "ITEMS": []
        };
        dataTemplate['STATION_ID'] = stationIds[E];
        dataTemplate['DISPLAY_NAME'] = stationIds[E];
        for (var F = 0; F < objs.length; F++) {
            var itemTemplate = {
                "ITEM_NAME": "",
                "MEASURE": "",
                "UNIT": "",
                "DATE_TIME": "",
                "VALUE": "",
                "VALUE_YESTERDAY": "",
                "FLAG": "",
                "USER_STDEV": ""
            }
            itemTemplate['ITEM_NAME'] = objs[F]['DESC'];
            itemTemplate['MEASURE'] = objs[F]['MEASURE'];
            itemTemplate['UNIT'] = objs[F]['UNIT'];
            itemTemplate['DATE_TIME'] = objs[F]['DATE_TIME'];
            itemTemplate['VALUE'] = objs[F]['VALUE'];
            itemTemplate['VALUE_YESTERDAY'] = objs[F]['VALUE_YESTERDAY'];
            itemTemplate['FLAG'] = objs[F]['FLAG'];
            itemTemplate['USER_STDEV'] = objs[F]['USER_STDEV'];
            itemTemplate['PM_TYPE'] = objs[F]['PM_TYPE'];
            itemTemplate['FM_TYPE'] = objs[F]['FM_TYPE'];
          
            dataTemplate['ITEMS'].push(itemTemplate);
        }
        template['DATA'].push(dataTemplate);
    }


    //重組後的全部場站的資料
    //console.log(template);
    return template;
}

function JSAJAXgetAllPointData(dataUrl, ajaxCompletedOrNot) {
    //console.log('sent:' + dataUrl);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.response);
            //console.log(data);
            for (var E = 0; E < data.length; E++) {
                data[E]['VALUE'] = digitsControll(data[E]['VALUE'], 2);
                var newDateTime = timeDashToSlash(data[E]['DATE_TIME']);
                data[E]['DATE_TIME'] = newDateTime;
                dataForAllPoint.push(data[E]);
            }
            if (ajaxCompletedOrNot) {
                kendoTableGenerator(dataForAllPoint, false);
                fullScreenBlockerRemover();
            }            
        }
    };
    xhttp.open("GET", dataUrl, true);
    xhttp.send();
    
}


function activePhyic(this_, phyiString) {
    var phyiStringArray = [];
    phyiStringArray = phyiString.split(",");
    var mapCount = $("#physicQuantities div a");
    if ($('#allsitecontroll').hasClass('active')) {
        if ($(this_).closest("div").hasClass("active")) {
            console.log("remove");
        } else {
            console.log("active");
            for (var y = 0; y < mapCount.length; y++) {
                var mapPhyic = $(mapCount[y]).text();
                if (phyiStringArray.indexOf(mapPhyic) != -1) {
                    $(mapCount[y]).parent().addClass("active");
                    var temp = $("#Elev_MSR").val() + ",";
                    $("#Elev_MSR").val(temp + mapPhyic);
                }
            }
        }
    }
    var origin = $("#Elev_MSR").val().split(',');
    var result = origin.filter(function(element, index, arr) {
        return arr.indexOf(element) === index;
    });
    $("#Elev_MSR").val(result.join(','));
}

//$("#Elev_MSR").on("propertychange",function (){
//  var origin = $("#Elev_MSR").val().split(',');  
//      var result = origin.filter(function(element, index, arr){
//        return arr.indexOf(element) === index;
//      });
//      $("#Elev_MSR").val(result.join(','));
//});
var TestData;
var TestData1;
//全部場站+重要場站
function JSAJAX(dataUrl, ajaxCompletedOrNot) {
    var PutDataUrl;
    var getBSDR = [];
    var data = '';

    //全部場站 for加壓站 / 配水池
    if ($('#allsitecontroll').hasClass('active')) {
        var staTypString = '?station_type=';
        var setBS_ = ["加壓站", "水壓", "水量", "水質", "水位"];
        var setDR_ = ["配水池", "水壓", "水量", "水質", "水位"];
        var setStaTyp = '';
        var E = false,
            staTyp = false,
            setStaTyp_BS_ = "",
            setStaTyp_DR_ = "";
        var allDataUrl = dataUrl;
        //全部場站-加壓站 物理量包含水壓,水量,水質,水位
        if (allDataUrl.indexOf(setBS_[0]) != -1) {
            for (var X = 0; X < setBS_.length; X++) {
                if (allDataUrl.indexOf(setBS_[X]) != -1) {
                    setStaTyp_BS_ = setBS_[0];
                    E = true;
                }
            }
        }
        //全部場站-配水池 物理量包含水位
        if (allDataUrl.indexOf(setDR_[1]) != -1) {
            for (var X = 0; X < setDR_.length; X++) {
                if (allDataUrl.indexOf(setDR_[X]) != -1) {
                    setStaTyp_DR_ = setDR_[1];
                    E = true;
                }
            }
        }
        //移除最後字元-1表最後一個
        if (E) {
            var origin = $("#Elev_MSR").val().split(',');
            var result = origin.filter(function(element, index, arr) {
                return arr.indexOf(element) === index;
            });
            $("#Elev_MSR").val(result.join(','));
            staTypString = staTypString + setStaTyp_BS_;
            allDataUrl = allDataUrl.split("?").join(staTypString + "&");
            E = false;
            staTyp = false;
            setStaTyp = '';
            $.ajax({
                url: allDataUrl,
                type: "GET",
                dataType: "json",
                success: function(Jdata) {
                    $.each(Jdata, function(index, d) {
                        getBSDR.push(d);
                    });
                    console.log(getBSDR);
                    for (var C = 0; C < getBSDR.length; C++)
                        getBSDR[C]['VALUE'] = digitsControll(String(getBSDR[C]['VALUE']), 2);
                    var mapAllSiteData = dataAllSiteRecomposer(getBSDR);
                    dataCollectToArray(mapAllSiteData['DATA'], 'STATION_ID', stationIDStorage);
                    kendoDataComposer(mapAllSiteData);
                    markerConstructor(mapAllSiteData);
                    ajaxCompletedOrNot = true;
                    if (ajaxCompletedOrNot) {
                        //for資料列表
                        //****kendoTableGenerator(dataForKendo, true);
                        fullScreenBlockerRemover(); //console.log(document.querySelector('#physicQuantities>div').classList.contains('active'));
                        if (document.querySelector('.multipleChoice #physicQuantities>div').classList.contains('active')) {
//jackie remove 3/3                            houseControll(document.querySelector('#physicQuantities>div').classList.contains('active'), activeLinkNumber);
                        }
                    }
                },
                error: function() {
                    console.log("get json fail");
                }
            });
            staTyp = true;
            console.log('全部場站url:' + allDataUrl);
        }

    }
    //重要場站+全部場站
    if (!staTyp) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                data = JSON.parse(this.response);
                console.log(data);
                if (data['DATA']) {
                    //重要場站
                    for (var E = 0; E < data['DATA'].length; E++) {
                        for (var F = 0; F < data['DATA'][E]['ITEMS'].length; F++) {
                            if (data['DATA'][E]['ITEMS'][F]['VALUE'].includes(',')) {} else {
                                data['DATA'][E]['ITEMS'][F]['VALUE'] = digitsControll(data['DATA'][E]['ITEMS'][F]['VALUE'], 2);
                            }
                        }
                    }
                    //        console.log("重要場站:");
                    dataCollectToArray(data['DATA'], 'STATION_ID', stationIDStorage);
                    kendoDataComposer(data);
                    markerConstructor(data);
                    console.log('重要場站url:' + dataUrl);
                } else {
                    //全部場站
                    if (getBSDR != '') {
                        for (var Y = 0; Y < getBSDR.length; Y++)
                            data.push(getBSDR[Y]);
                    }
                    console.log(data);
                    for (var C = 0; C < data.length; C++)
                        data[C]['VALUE'] = digitsControll(String(data[C]['VALUE']), 2);
                    var mapAllSiteData = dataAllSiteRecomposer(data);
                    dataCollectToArray(mapAllSiteData['DATA'], 'STATION_ID', stationIDStorage);
                    kendoDataComposer(mapAllSiteData);
                    markerConstructor(mapAllSiteData);
                    ajaxCompletedOrNot = true;
                    console.log('全部場站url:' + allDataUrl);
                }

                if (ajaxCompletedOrNot) {
                    //for資料列表
                    //****kendoTableGenerator(dataForKendo, true);
                    fullScreenBlockerRemover(); //console.log(document.querySelector('#physicQuantities>div').classList.contains('active'));
                    if (document.querySelector('.multipleChoice #physicQuantities>div').classList.contains('active')) {
//jackie remove 3/3                        houseControll(document.querySelector('#physicQuantities>div').classList.contains('active'), activeLinkNumber);
                    }

                }
            } else if (this.status == 408) {
                window.alert('資料查詢逾時');
            }
        };
        xhttp.open("GET", dataUrl, true);
        xhttp.send();
        
    }
}


// //console.log(JSAJAXgetRawData('http://220.134.42.63:8080/WaterscadaAPI/GetStationInfo?district=-2'));


function wmsExistence(targetButtonId) {
    var wmslicontent = document.getElementsByClassName("wmscontent");

    for (var E = 0; E < wmslicontent.length; E++) {
        if (wmslicontent[E].getAttribute('value') == targetButtonId) {
            return true;
        }
    }
    return false;
}
//總覽&物理量Memo
function messageBoxHtmlStringConstructor(data, fulldata) {
    // //console.log("fulldata"+fulldata);
    var rawDataToPresent = "";
    var dataToPresentArray;

    // if (fulldata['DATA'].length)
    // {
    rawDataToPresent = fulldata['DATA'].find(function(content) {
        return content['STATION_ID'] == data['STATION_ID'];
    })
    var dataToPresentHtmlString = "";
    var messageBoxHtmlString = "";
    
    var lastTime = timeDashToSlash(fulldata['LAST_DATETIME']);
    if(lastTime == undefined)  var lastTime = timeDashToSlash(fulldata.DATA[0].ITEMS[0].DATE_TIME);
    console.log(lastTime);
    // //console.log("rawDataToPresent:"+rawDataToPresent);
    if (rawDataToPresent) {
        //API: WI_stationData()
        //總覽  Number.parseFloat(x).toFixed(2)
        if (Object.keys(rawDataToPresent).indexOf('ITEMS') != -1) {
            // dataToPresentArray = rawDataToPresent['ITEMS'].map(content => content['ITEM_NAME'] + content['UNIT'] + ":");
            dataToPresentArray = rawDataToPresent['ITEMS'].map(function(content) {
                if (textSupFilter(content['UNIT'])) {
                    var unit = specificTextSup(content['UNIT']);
                    //          return "<strong>" + content['ITEM_NAME'] + "</strong>:<br>&nbsp&nbsp" + content['VALUE'] + " " + unit;
                    return "<strong>" + content['ITEM_NAME'] + "</strong>:&nbsp" + Number.parseFloat(content['VALUE']).toFixed(2) + " " + unit;
                } else {
                    //          return "<strong>" + content['ITEM_NAME'] + "</strong>:<br>&nbsp&nbsp" + content['VALUE'] + " " + content["UNIT"].toUpperCase();
                    return "<strong>" + content['ITEM_NAME'] + "</strong>:&nbsp" + Number.parseFloat(content['VALUE']).toFixed(2) + " " + content["UNIT"].toUpperCase();
                }
            });
//          console.log("ITEM_NAME: "+dataToPresentArray);
        }
        //API: getrealtimedata()
        //物理量
        for (var E = 0; E < dataToPresentArray.length; E++) {
            dataToPresentHtmlString += "<div style='font-size:14px; color: rgb(7, 52, 105); padding: 3px;'>".concat(dataToPresentArray[E], "</div>");
        }
        messageBoxHtmlString = "<div style='font-size:12px; background-color: rgba(255,255,255,0.0); color: rgb(7, 52, 105);'><div style='text-align: center; padding: 10px; color: gray;'>"+lastTime+"</div><div class='statidstr' style='text-align:center; padding:6px; margin-bottom:4px; background-color:rgba(255,255,255,0.0); color: rgb(7, 52, 105);'>"+rawDataToPresent['STATION_ID']+ "</div><div class='corner'>"+dataToPresentHtmlString +"</div></div><button class='infoWindowbtn' onclick='infoWindowbtn(this)' style=''>資訊視窗</button>";
    }
    return messageBoxHtmlString;
}
  
function infoWindowbtn(e){
//    var stat_id = $(e).parent().children('div').eq(1).text();
    var stat_id = $(e).parent().children('div:first').children("div:nth-of-type(2)").text();
    console.log(stat_id);
    infoWindowControll(stat_id, false);
//    $(".messageBox").next('img').remove();
//    $(".messageBox").next("div").remove();
//    $(".messageBox").remove();
  }
//建立ICON與屬性視窗
function labelInfoComposer(data) {
    //  x_x=0;
    //console.log("creation label info on the memo");
    var flag = "";
    var flagColor = "";
    var composedLabelInfo = {};
    var checkFlag = [],PM_FMTypeImg = [];

    //console.log(data['DATA']);
    var composedLabelInfo = data['STATIONS'].reduce(function(labelInfos, content, key) {
        //debugger;
        console.log(labelInfos);
        //console.log(content);
        //console.log(data['DATA']);
        //    x_x += 1;      
        var infotext = messageBoxHtmlStringConstructor(content, data);
        labelInfos['infotext'].push(infotext);
        var EPSG386point = coordinateConverter(content['Y'], content['X']);
        var EPSG386pointDeviated = coordinateConverter(content['Y'], content['X'], deviation);

        labelInfos['markerPoint'].push(EPSG386point);
        labelInfos['markerPointDeviated'].push(EPSG386pointDeviated);

        labelInfos['STATION_ID'].push(content['STATION_ID']);
//        labelInfos['PM_TYPE'].push(content['PM_TYPE']);
//        labelInfos['FM_TYPE'].push(content['FM_TYPE']);
        //取出與A相同條件的印設B的內容
        var getFlagType = data['DATA'].filter(function(dataObj) {
            return dataObj['STATION_ID'] == content['STATION_ID'];
        });
        //判斷FLAG，提供icon樣式
        checkFlag.length = 0; PM_FMTypeImg.length = 0;
        //    var isExist = getFlagType[0].hasOwnProperty('ITEMS');  //判斷obj是否存在
        //分類icon方法
        if (getFlagType.length > 0) {            
            for (var xx = 0; xx < getFlagType[0]['ITEMS'].length; xx++) {
              checkFlag.push(getFlagType[0]['ITEMS'][xx]['FLAG']);
              //判斷流量計與壓力計               
              if((getFlagType[0]['ITEMS'][xx]['FM_TYPE'] != null) && FMtype() )
                PM_FMTypeImg.push('FM_TYPE-'+getFlagType[0]['ITEMS'][xx]['FM_TYPE']);
              else 
                PM_FMTypeImg.push('');
              if((getFlagType[0]['ITEMS'][xx]['PM_TYPE'] != null) && PMtype() )
                PM_FMTypeImg.push('PM_TYPE-'+getFlagType[0]['ITEMS'][xx]['PM_TYPE']); 
              else 
                PM_FMTypeImg.push('');
            }
            if ((checkFlag.indexOf('?') != -1) || (checkFlag.indexOf(' ') != -1))
                flagColor = "灰";
            else if ((checkFlag.indexOf('>>') != -1) || (checkFlag.indexOf('<<') != -1))
                flagColor = "紅";
            else if ((checkFlag.indexOf('>') != -1) || (checkFlag.indexOf('<') != -1))
                flagColor = "黃";
            else
                flagColor = "綠";

            //console.log(content['STATION_ID']);
            //判斷[IMAGE] != '' 就表示使用進出水點[image]內的URL
            if (content['IMAGE'] != null) {
                //console.log(content['IMAGE']);
                if (content['IMAGE'] == 'http://api.tgos.tw/TGOS_API/images/marker2.png') {
                    labelInfos['imgUrl'].push('http://api.tgos.tw/TGOS_API/images/marker2.png');
                } else {
                    var stringArray = content['IMAGE'].split('');
                    stringArray.splice(content['IMAGE'].indexOf('.png'), 4);
                    var stringProcessed = stringArray.join('') + "-6060.gif";
                    labelInfos['imgUrl'].push(stationType_Animated[content['STATION_TYPE'] + '-' + flagColor + '-' + stringProcessed]);
                    //console.log(labelInfos['imgUrl']);
                }
            } else {
                if (flagColor == '紅') labelInfos['imgUrl'].push(stationTypeRed[content['STATION_TYPE']]);
                if (flagColor == '綠') labelInfos['imgUrl'].push(stationType[content['STATION_TYPE']]);
                if (flagColor == '黃') labelInfos['imgUrl'].push(stationTypeYellow[content['STATION_TYPE']]);
                if (flagColor == '灰') labelInfos['imgUrl'].push(stationTypeGrey[content['STATION_TYPE']]);
            }
        } else console.log("Could not find of [DATA] info.");
        //3階-start
        var xTemp = Object.entries(collectionRepeat(PM_FMTypeImg));        
        var key, val, temp_array=[], obj={};
        for(var z=0; z<xTemp.length; z++) {
          if(xTemp[z][0] != '') {
             temp_array.push(xTemp[z][1]);  //sort用的array
             key = (xTemp[z][1]); //number
             val = (xTemp[z][0]); //一般, 管網, 原水
             obj[key] = val;
          }
        }
        var hi = asc(temp_array);
        var getval = obj[hi[0]];
        //同一場所有數個壓力計或流力計，所以討論後需用出現最多次的為主做icon的呈現。
        labelInfos['PMFMimgUrl'].push(deviceType[getval]); 
        labelInfos['LINK'].push(content['LINK']);
        //回傳json
        return {
            'infotext': labelInfos['infotext'],
            'markerPoint': labelInfos['markerPoint'],
            'markerPointDeviated': labelInfos['markerPointDeviated'],
            "imgUrl": labelInfos['imgUrl'],
            "PMFMimgUrl": labelInfos['PMFMimgUrl'],
            'LINK': labelInfos['LINK'],
            'STATION_ID': labelInfos['STATION_ID']
        };
    }, {
        'infotext': [],
        'markerPoint': [],
        'markerPointDeviated': [],
        'imgUrl': [],
        'PMFMimgUrl': [],
        'LINK': [],
        'STATION_ID': []
    });
    //  //console.log(x_x);

    console.log(composedLabelInfo);
    return composedLabelInfo;
}
//大到小排序
function asc(arr) {
    arr.sort(function (a, b) {
        return b - a; 
    });
    return arr;
}

var flagColors = [
        {
            "green": ["N"]
        },
        {
            "white": ["?"]
        },
        {
            "yellow": [">", "<"]
        },
        {
            "red": [">>", "<<"]
        }
    ]
    //總覽memo
//x
function flagChecker(flagsContainer) {
    var severityNumber = 0;
    var flagColor = "";

    for (var E = 0; E < flagsContainer.length; E++) {
        if (flagsContainer[E]['FLAG'] != "N") {
            var obj = flagColors.filter(function(content) {
                    return content[Object.keys(content)[0]].indexOf(flagsContainer[E]['FLAG']) != -1;
                })
                //      //console.log(flagsContainer[E]['FLAG']);
                //      //console.log(obj);
                //      //console.log(flagsContainer);
                //      //console.log(Object.keys(obj));
                //      //console.log(Object.keys(obj[0]));
            var currentNumber = flagColors.indexOf(obj[0]);
            if (currentNumber > severityNumber) {
                severityNumber = currentNumber;
            }
        }
    }
    flagColor = Object.keys(flagColors[severityNumber]);
    //   //console.log(flagColor);
    return flagColor;
}  //x



//x
function labelInfoComposerForGeneralUse(data) {
    //console.log(data);
    var composedLabelInfo = data['DATA'].reduce(function(labelInfos, content) {
        var infotext = messageBoxHtmlStringConstructorForGeneralUse(content);
        labelInfos['infotext'].push(infotext);
        var EPSG386point = coordinateConverter(content['Y'], content['X']);
        labelInfos['markerPoint'].push(EPSG386point);
        labelInfos['imgUrl'].push(stationType[content['STATION_TYPE']]);
        return {
            'infotext': labelInfos['infotext'],
            'markerPoint': labelInfos['markerPoint'],
            "imgUrl": labelInfos['imgUrl']
        };
    }, {
        'infotext': [],
        'markerPoint': [],
        'imgUrl': []
    });
    return composedLabelInfo;
}

//x
function labelInfoComposerFromXML(data) {
    var composedLabelInfo = data["WI_StationDataResult"]['STATIONS']["WI_Station"].reduce(function(labelInfos, content) {
        var infotext = messageBoxHtmlStringConstructor(content);
        labelInfos['infotext'].push(infotext);
        var EPSG386point = coordinateConverter(content['Y'], content['X']);
        labelInfos['markerPoint'].push(EPSG386point);
        labelInfos['imgUrl'].push(stationType[content['STATION_TYPE']]);
        return {
            'infotext': labelInfos['infotext'],
            'markerPoint': labelInfos['markerPoint'],
            "imgUrl": labelInfos['imgUrl']
        };
    }, {
        'infotext': [],
        'markerPoint': [],
        'imgUrl': []
    });
    return composedLabelInfo;
}

//將WGS84坐標系統轉換為TWD97(台灣)坐標系統
function coordinateConverter(Y, X, deviation) {
    var TT = new TGOS.TGTransformation();
    var correctedX, correctedY;

    if (Y > 100) {
        correctedX = Y;
        correctedY = X;
    } else {
        correctedX = X;
        correctedY = Y;
    }

    TT.wgs84totwd97(correctedX, correctedY); // alert(TT.transResult.x + "," +TT.transResult.y);
    //console.log("座標97:" + TT.transResult.x, TT.transResult.y);
    var point = "";
    if (deviation) {
        point = new TGOS.TGPoint(TT.transResult.x + deviation['X'], TT.transResult.y + deviation['Y']);
    } else {
        point = new TGOS.TGPoint(TT.transResult.x, TT.transResult.y);
    }
    return point;
}


//x
//function markerController(markerInfo) {
//    messageBoxComposer();
//    labelinfoControll();
//    showLabel();
//}

var physicmMessageBoxNames = [];
var pointDeviated = [];
var testboxnames, percentCount;

//建立屬性視窗&house&icon
var temp_var = {};
var clearinterval_icon;
function showLabel(labelInFo, jsonData) {
    //debugger;
    temp_var = jsonData;
    var getvalue = makePhyscValuesToJson(temp_var);
    var jsonD = getCalcPhyscValues("set", getvalue);
    
//    console.log(jsonD);
    var messageBoxNames = [];
//    labelinfoControll(labelInFo);

    if (singleOrMultiple) {} else {
        RmvMarker();
    }
    console.log(jsonData.length);
    if(jsonData["STATIONS"].length < 0) { alert("此資料內容為空。請確認網路連線問題!\n或請IT人員協助處理。");
                             return;}
    var infotext = labelInFo['infotext'];
    var markerPoint = labelInFo['markerPoint'];
    var imgUrl = labelInFo['imgUrl'];
    var PMFMimgUrl = labelInFo['PMFMimgUrl'];
    if(FMtype() || PMtype()){
      getPFMdeviceCount(PMFMimgUrl);
      if(PMFMimgUrl.length > 0){
        for(var pfm=0; pfm<PMFMimgUrl.length; pfm++){
          if(PMFMimgUrl[pfm] != undefined) {
            var setpfm = PMFMimgUrl[pfm];
            imgUrl.splice(pfm, 1, setpfm);  //替換icon
          } 
        }
      }
    }
//    var PMFMimgUrl = labelInFo["PMFMimgUrl"];
      
    var linkNumber = labelInFo['LINK'];
    pointDeviated = labelInFo['markerPointDeviated'];
    var stationIdforinfoWindo = labelInFo["STATION_ID"];
    
    
//    debugger;
    if (jsonData["STATIONS"].length > 0) {        
        for (var i = 0; i < infotext.length; i++) {
            if (imgUrl[i] != "skipnow") {
                //------------------建立標記點---------------------
                //圖檔名取長寬
                var imgUrlStringArray = "";
                var imgUrlTargetStringArray = "";
                var imgWidth = "";
                var imgHeight = "";
                //                var messageBoxNames = {};
//                var designatedPoint = pointDeviated[i];

                // var markerImg = "" ;
                if (imgUrl[i] === undefined) {
                    // //console.log(jsonData);
                    //console.log(Object.keys(imgUrl)[i] + "---undefinedundefinedundefinedundefinedundefinedundefined");
                } else {
                    if (imgUrl[i] == 'http://api.tgos.tw/TGOS_API/images/marker2.png') {
                        imgWidth = 60;
                        imgHeight = 60;
                    } else {
                        imgUrlStringArray = imgUrl[i].split('');
                        imgUrlTargetStringArray = imgUrlStringArray.splice(imgUrl[i].length - 8, 4);
                        //reduce 30% of icon
                        imgWidth = (imgUrlTargetStringArray[0] + imgUrlTargetStringArray[1]) * 0.7;
                        imgHeight = (imgUrlTargetStringArray[2] + imgUrlTargetStringArray[3]) * 0.7;
                    }

                    var markerImg = new TGOS.TGImage(imgUrl[i], new TGOS.TGSize(imgWidth, imgHeight), new TGOS.TGPoint(0, 0), new TGOS.TGPoint(10, 33)); //設定標記點圖片及尺寸大小
                    //var annotation = document.createElement('div');
                    //產生market icon(pTGMarker)
                    var pTGMarker;
                    //-----------------建立訊息視窗--------------------
                    var InfoWindowOptions = {
                        maxWidth: 100,
                        //訊息視窗的最大寬度
                        zIndex: 10,
                        pixelOffset: new TGOS.TGSize(messageBoxOffset['X'], messageBoxOffset['Y']) //InfoWindow起始位置的偏移量, 使用TGSize設定, 向右X為正, 向上Y為負 
                    };
                    
                    //物理量的memo
                    var messageBox; 
                    //總覽的房子標籤
                    if (linkNumber[i] != null) {  }
                    else {
                      //建立物理量標籤
//                      pTGMarker = new TGOS.TGMarker(pMap, markerPoint[i], '', markerImg, { flat: false });
                      var MarkerOptions = {
                          clickable: false, //可否點擊
                          visible: true, //是否顯示
                          zIndex: 3,
                      };
//                      debugger;
                      pTGMarker = new TGOS.TGMarker(pMap, markerPoint[i], '', markerImg, MarkerOptions);
                      //新增場站名稱
                      pTGMarker["STATION_ID"] = stationIdforinfoWindo[i];
                      //設定TOOLBAR文字
                      pTGMarker.setTitle(pTGMarker["STATION_ID"]); //設定標題
                      pTGMarker.setZIndex(21);
                      Markers.push(pTGMarker);
                      console.log((i+1) +"/"+ infotext.length);
                    }
                }
                //綁定資訊視窗click功能
                if (linkNumber[i] == null) {
                    TGOS.TGEvent.addListener(pTGMarker, "click", function(pTGMarker, messageBox) {
                        return function() {                          
                            infoMemoControll(pTGMarker["STATION_ID"],false);
//                            //點選物理量Icon後圖台位移與ZoomIn
//                            //              pMap.setCenter(designatedPoint);
//                            //              pMap.setZoom(10);
                        };
                    }(pTGMarker, messageBox));
                }                
//                shortCut(linkNumber[i], pTGMarker);
                //設定memo樣式
//                physicMessageBox.push(messageBox);
//                messageBoxAdjuster(messageBox);
//                 messageBoxZIndexAdjuster(messageBox);
            }
            console.log("data size:"+ i);
        }
//        firstload = false;
//        if (Object.keys(houseMarkers).length != 0) {
//            houseMarkers[1]["elem"][0].parentElement.style.zIndex = 3;
//            houseMarkers[1].elem[0].parentElement.parentElement.parentElement.style.removeProperty('z-index');
//        }          
    }
//    
//    //調整房子的位置
//    for (var E = 0; E < memoPositionForAll.length; E++) {
//        if (houseMessageBoxes[E + 1]) {
//            houseMessageBoxes[E + 1].setPixelOffset(memoPositionForAll[E]);
//        }
//    }    
}



//x
//function changeIcon(labelInFo, device)//改變Icon觸發
//{
//  RmvMarker();  
//  var PMFMimgUrl = labelInFo["PMFMimgUrl"];
//  var markerPoint = labelInFo['markerPoint'];
//  for (var i = 0; i < PMFMimgUrl.length; i++) {
//    var imgUrlStringArray = "";
//    var imgUrlTargetStringArray = "";
//    var imgWidth = "";
//    var imgHeight = "";
//    if(PMFMimgUrl[i] != undefined) {
//      imgUrlStringArray = PMFMimgUrl[i].split('-')[1].split("");
////      var z = PMFMimgUrl[i].split("/")[2].split("_")[0];
////      if(device != z)
////        continue;
//    }
//    else 
//      continue;
////      imgUrlStringArray = imgUrlStringArray.split("");
//    //reduce 30% of icon
//    imgWidth = (imgUrlStringArray[0] + imgUrlStringArray[1]);
//    imgHeight = (imgUrlStringArray[2] + imgUrlStringArray[3]);
//    var markerImg = new TGOS.TGImage(PMFMimgUrl[i], new TGOS.TGSize(imgWidth, imgHeight), new TGOS.TGPoint(0, 0), new TGOS.TGPoint(10, 33));
//    var pTGMarker = new TGOS.TGMarker(pMap, markerPoint[i], '', markerImg, { flat: false });
//    pTGMarker.setIcon(markerImg);
//    changeMark.push(pTGMarker);
//  }
//}

var messageBoxAdjuster = function(messageBox) {
    messageBox.getElement().classList.add('messageBox');
    // openedMessageBox.push(messageBox);
    // var boxWidth = messageBox.getElement().style.width;    
    // var boxHeight = messageBox.getElement().style.height;
    // //console.log(messageBox.getElement());
    // //console.log(messageBox.getElement().getElementsByClassName('messageBox')[0]);
    // messageBox.getElement().style.borderRadius = '0px';
    // messageBox.getElement().style.border = '0px';
    // messageBox.getElement().firstElementChild.style.margin ="0px";
    // messageBox.getElement().getElementsByClassName('messageBox')[0].style.height = boxHeight;
    // messageBox.getElement().getElementsByClassName('messageBox')[0].style.width = boxWidth;
    // messageBoxZIndexAdjuster(messageBox);
    messageBox.getContentPane().onclick = function() {
        //物理量memo的前後順序(click網前推一層)
        zIndexControll(physicMessageBox, messageBox, 10, 11);
    }
}

function zIndexControll(targets, target, zindexforall, zindex) {
    for (var E = 0; E < targets.length; E++) {
        targets[E].setZIndex(zindexforall);
    }
    target.setZIndex(zindex);

}

var messageBoxNamesAdjuster = function(messageBox) {
        openedMessageBoxName.push(messageBox);
        var messageBoxElement = messageBox.getElement();

        messageBoxElement.classList.add('nameWindowInfo');
        messageBoxElement.nextElementSibling.remove();
        messageBoxElement.nextElementSibling.remove();
    }
    //物理量icon的memo
var physicMessageBoxNamesAdjuster = function(messageBox) {
    physicmMessageBoxNames.push(messageBox);
    var messageBoxElement = messageBox.getElement();
    messageBoxElement.classList.add('nameWindowInfo');
    messageBoxElement.nextElementSibling.remove();
    //移除&close按鈕
    messageBoxElement.nextElementSibling.remove();
}

var messageBoxZIndexAdjuster = function(messageBox) {
        messageBox.onclick = function() {
            for (var E = 0; E < openedMessageBox.length; E++) {
                openedMessageBox[E].setZIndex(1);
            }
            var zNumber = messageBox.getZIndex();

            messageBox.setZIndex(2);
            //console.log(zNumber);
        }
    }
    //dblclick house jump
var shortCut = function shortCut(linkNumber, point) {
    if (linkNumber != null) {
        if (document.getElementById('Elev_MSR').value.includes('*')) {
            var tempString = document.getElementById('Elev_MSR').value;
            var starExcluded = specificStringSplicer("*", tempString);

            document.getElementById('Elev_MSR').value = starExcluded;
        }
        TGOS.TGEvent.addListener(point, "dblclick", function(pTGMarker, messageBox) {
            return function(e) {
                if (document.getElementsByClassName("allSections")[0]) {
                    document.getElementsByClassName("allSections")[0].classList.remove('allSections');
                }
                e.stopPropagation();
                document.getElementById("Elev_ITM_".concat(linkNumber)).parentElement.click();
                messageBoxCloseAndClean();
                messageBoxNameCloseAndClean();

            };
        }(point)); //滑鼠監聽事件--開啟訊息視窗
    }
};
//控制場所按鈕
function messageBoxOpen(index) {
    if (index) {

    } else {
        if (openedMessageBox.length > 0)
            for (var E = 0; E < openedMessageBox.length; E++) {
                openedMessageBox[E].open(pMap, houseMarkers[E]);
                // messageBoxAdjuster(openedMessageBox[E]);
            }
    }
}

function messageBoxNameOpen() {
    if (openedMessageBoxName.length < 0)
        for (var E = 0; E < openedMessageBoxName.length; E++) {
            openedMessageBoxName[E].open(pMap, houseMarkers[E]);
        }
}

function messageBoxCloseAndClean() {
    if (openedMessageBox.length > 0)
        for (var E = 0; E < openedMessageBox.length; E++) {
            openedMessageBox[E].close();
        }
    openedMessageBox = [];
}

//清除物理量memo
function physicMessageBoxNamesCloseAndClean() {
    var test_count = 0;
    for (var E = 0; E < physicmMessageBoxNames.length; E++) {
        physicmMessageBoxNames[E].close();
    }
    //    //console.log(physicmMessageBoxNames.length);

    physicmMessageBoxNames = [];
}

//start-新增物理量memo功能

function physicMessageBoxCloseAndClean() {
    clearInterval(clearinterval_physic);
    for (var E = 0; E < physicMessageBox.length; E++) {
        physicMessageBox[E].close();
    }
    physicMessageBox = [];
}

var clearinterval_physic;
function physicMessageBoxClose() {
    clearInterval(clearinterval_physic);
    for (var E = 0; E < physicMessageBox.length; E++) {
        physicMessageBox[E].close();
    }
}

function physicMessageBoxOpen() {
  var cycle=0;
    clearinterval_physic = setInterval(function(){
      if(cycle < physicMessageBox.length)
        physicMessageBox[cycle].open(pMap, Markers[cycle]); 
      else {
        clearInterval(clearinterval_physic);
        cycle=0;
      }
      cycle++;
    },1);
    
}
//取得物理量memo
function getphysicMessageBox(Formsearch) {
  var labelInFo = "";      
  //labelInFo = labelInfoComposer(jsondata);
  var btnFlag = false;
  var stationId = document.getElementById('InfoWin').value;
  var measure_info = document.getElementById('Elev_MSR').value;
  var item_info = document.getElementById('Elev_ITM').value;
  var city_info = document.getElementById('Elev_').value;
  var status = 'infoWinAllsite';
  var dataQueryUrl = "http://220.134.42.63:8080/waterscadaAPI/GetRealtimeData?&measure=*&include_wi=1";
  //disable搜尋鈕
  if (!Formsearch) {
      //全區供水
      if ($("#left_nav1 .top_left_menu li:nth-child(1)").hasClass('active')) {
          //全部場站
          if ($(".multipleChoice.active .allsitecontrol1").hasClass('active')) {
              dataQueryUrl = "http://220.134.42.63:8080/waterscadaAPI/GetRealtimeData?city="+city_info+"&measure=" + measure_info + "&include_wi=1";
              console.log('全部場站');
              btnFlag = false;
          }
          //重要場站
          if ($(".multipleChoice.active .importantsitecontroll").hasClass('active')) {
              dataQueryUrl = 'http://220.134.42.63:8080/WaterscadaAPI/WI_StationData?section=轄區供水系統&item=' + item_info + '&measure=' + measure_info + "&only_wi=1";
              status = 'infoWinImportant';
              console.log('重要場站');
              btnFlag = true;
          }
      }
//      //供水系統
//      if ($("#left_nav1 .top_left_menu li:nth-child(2)").hasClass('active')) {
//          dataQueryUrl = "http://220.134.42.63:8080/waterscadaAPI/GetRealtimeData?measure=*&include_wi=1";
//          btnFlag = false;
//          console.log("供水系統URL: " + dataQueryUrl);
//      }
  } else {
      //enable搜尋鈕
      dataQueryUrl = "http://220.134.42.63:8080/waterscadaAPI/GetRealtimeData?measure=*&include_wi=1";
      console.log("搜尋URL: " + dataQueryUrl);
      console.log('enable搜尋鈕');
  }
  console.log("send:" + dataQueryUrl);
   var getBSDR = [];
   $.ajax({
      url: dataQueryUrl,
      type: "GET",
      dataType: "json",
      async:false,
      success: function(Jdata) {
        if(!btnFlag) {
          var reboundlabelInFo = dataAllSiteRecomposer(Jdata);
          var labelInFo = labelInfoComposer(reboundlabelInFo);
        } else {
          var labelInFo = labelInfoComposer(Jdata);
        }
        console.log(labelInFo);
        var infotext = labelInFo['infotext'];
        var markerPoint = labelInFo['markerPoint'];
//            var imgUrl = labelInFo['imgUrl'];
//            var linkNumber = labelInFo['LINK'];
//            pointDeviated = labelInFo['markerPointDeviated'];
//            if (labelInFo["STATIONS"].length > 0) {        
          for (var i = 0; i < infotext.length; i++) {
            var InfoWindowOptions = {
                  maxWidth: 100,
                  //訊息視窗的最大寬度
                  zIndex: 10,
                  pixelOffset: new TGOS.TGSize(messageBoxOffset['X'], messageBoxOffset['Y']) //InfoWindow起始位置的偏移量, 使用TGSize設定, 向右X為正, 向上Y為負 
              };
            //物理量的memo
            var messageBox; var pTGMarker;
            messageBox = new TGOS.TGInfoWindow(infotext[i], markerPoint[i], InfoWindowOptions);
            physicMessageBox.push(messageBox);
            messageBox.open(pMap);
            messageBox.getContentPane().classList.add('messageBoxOpened');
            messageBoxAdjuster(messageBox);
          }
      },
      error: function() {
          console.log("get json fail");
      }
  });
}

//顯示數值 按鈕
function physicMessageBoxControll() {    
    document.getElementById('phyicsalMemo').onclick = function() {
      if($("#Elev_MSR").val() != '') {
        if (this.classList.contains('active')) {
            this.classList.remove('active');
            if ($(".phyicsalMemo_").hasClass("active")) {
                $(".phyicsalMemo_").removeClass("active");
                physicMessageBoxCloseAndClean();
            }
        } else {
            getphysicMessageBox(false);
            this.classList.add('active');
            $(".phyicsalMemo_").addClass("active");
            physicMessageBoxOpen();
        }
      } else if($("#Elev_STA").closest("div").hasClass("active")) {
          
      } else {      
        houseMessageBoxClose();
        alert("目前圖台上尚無資料。");
        return;
      }
    };
}

physicMessageBoxControll();

//end-新增物理量memo功能

function messageBoxClose() {
    for (var E = 0; E < openedMessageBox.length; E++) {
        openedMessageBox[E].close();
    }
}

function houseMessageBoxClose() {
    for (var E = 0; E < houseMessageBoxes.length; E++) {
        openedMessageBox[E].close();
    }
}

function messageBoxNameClose() {
    for (var E = 0; E < openedMessageBoxName.length; E++) {
        openedMessageBoxName[E].close();
    }
}

function messageBoxNameCloseAndClean() {
    for (var E = 0; E < openedMessageBoxName.length; E++) {
        openedMessageBoxName[E].close();
    }
    openedMessageBoxName = [];
}

//顯示物理量memo
var disc_ = 0, disc_2 = 0;
function markerConstructor(jsondata) {
    console.log(jsondata);
    disc_ = setInterval(function(){
        $(".discription").text("載入圖台資料中。。。"); clearInterval(disc_);
      }, 1000);
    var labelInFo = "";
    if (xmlornot == 0) {
        labelInFo = labelInfoComposerFromXML(jsondata);
    } else {
        //顯示home & 物理量icon
        labelInFo = labelInfoComposer(jsondata);
    }    
//    labelInFoForPMFM = [];
//    labelInFoForPMFM = labelInFo;
    showLabel(labelInFo, jsondata);
//    changeIcon(labelInFo, '') ;
}

function getWMSCenterCoordinate(wmsurl) {
    var string = wmsurl;
    var splitedString = string.split('');
    var certainString1 = 'bbox=';
    var certainString2 = '&width';
    var firstSlicingPoint = string.indexOf(certainString1) + certainString1.length;
    var lastSlicingPoint = string.indexOf(certainString2);
    var targetIndexes = [];
    splitedString.map(function(content, i) {
        if (content == ',') {
            targetIndexes.push(i);
        }
    });
    var targetString = splitedString.splice(firstSlicingPoint, lastSlicingPoint - firstSlicingPoint);
    var targetNumbers = targetString.join('').split(',');
    var centerX = (Number(targetNumbers[0]) + Number(targetNumbers[2])) / 2;
    var centerY = (Number(targetNumbers[1]) + Number(targetNumbers[3])) / 2;
    return [centerX, centerY];
}

function xmlToJson(xml) {
    // Create the return object
    var obj = {};

    if (xml.nodeType == 1) {
        // element
        // do attributes
        if (xml.attributes.length > 0) {
            obj["@attributes"] = {};

            for (var j = 0; j < xml.attributes.length; j++) {
                var attribute = xml.attributes.item(j);
                obj["@attributes"][attribute.nodeName] = attribute.nodeValue;
            }
        }
    } else if (xml.nodeType == 3) {
        // text
        obj = xml.nodeValue;
    } // do children
    // If just one text node inside


    if (xml.hasChildNodes() && xml.childNodes.length === 1 && xml.childNodes[0].nodeType === 3) {
        obj = xml.childNodes[0].nodeValue;
    } else if (xml.hasChildNodes()) {
        for (var i = 0; i < xml.childNodes.length; i++) {
            var item = xml.childNodes.item(i);
            var nodeName = item.nodeName;

            if (typeof obj[nodeName] == "undefined") {
                obj[nodeName] = xmlToJson(item);
            } else {
                if (typeof obj[nodeName].push == "undefined") {
                    var old = obj[nodeName];
                    obj[nodeName] = [];
                    obj[nodeName].push(old);
                }
                obj[nodeName].push(xmlToJson(item));
            }
        }
    }
    return obj;
}

var maxZoomGetter = new TGOS.TGMaxZoomLevel();
var maxNumber = maxZoomGetter.getMaxZoomLevel(TGOS.TGMapTypeId.TGOSMAP, TGOS.TGCoordSys.EPSG3826, function(max) {
        return max
    })
    //console.log(maxNumber);



function activeCheck(target) {
    //console.log(target);
    if (target.classList.contains('active')) {
        target.classList.remove('active');
        return true;
    } else {
        target.classList.add('active');
        return false;
    }
    var origin = $("#Elev_MSR").val().split(',');
    var result = origin.filter(function(element, index, arr) {
        return arr.indexOf(element) === index;
    });
    $("#Elev_MSR").val(result.join(','));
}


//街道圖active
var rightNavs = document.getElementsByClassName("right-nav")[0];
for (var E = 0; E < rightNavs.children.length; E++) {

    rightNavs.children[E].onclick = function(e) {
        e.stopPropagation();
        var active = this.parentElement.getElementsByClassName('active');

        for (var F = 0; F < active.length; F++) {
            active[F].classList.remove('active');
        }

        this.classList.add('active');
    }
}

//
function loaderBar(datalength) {
    $(".processBar").text(datalength); 
    $(".processBar").on('change', 'body', function(){
      $('.processBar').text(datalength);              
    });
}
//加入遮罩
function fullScreenBlocker(string) {
    
    var fullScreenBlock = $('body').append("<div class = 'screenBlocker'><i class='fa fa-spinner fa-pulse fa-4x fa-fw' style='color: #33b9ff; font-size: 70px;'></i><h6 class='discription animated infinite flash'></h6></div>");
  
    $(".screenBlocker").css({'position': 'fixed','top': '0px','left': '0px','width': '100%','height': '100vh','backgroundColor': 'rgba(0,0,0,0.6)','textAlign': 'center','lineHeight': '100vh','fontSize': '6vw','color': 'white','zIndex': '1000'});
    $(".discription").css({'position': 'absolute','top': '56%', 'width': '100%', 'fontSize': '20px'}).text(string);
  //    closeButton.onclick = function() {
//        fullScreenBlock.remove();
//    }

}
//移除遮罩
function fullScreenBlockerRemover() {
    if ($('.screenBlocker i').hasClass('fa')) {
        var screenEnable = document.getElementsByClassName("screenBlocker")[0];
        screenEnable.remove();
        //    console.log("移除遮罩");
    }
    pMap.setZoom(pMap.getZoom());
}
var count = 1;
var ajaxCompletedOrNot = false;

//迴圈傳送command到IIS
function multipleAjaxSender() {
    count = 1;
    fullScreenBlocker("資料讀取中 。。。");
    ajaxCompletedOrNot = false;
    //全部場站
    if (document.getElementsByClassName("allsitecontroll")[0].classList.contains('active')) {

        var dataurltosend = dataAllSiteUrlComposer();
        JSAJAX(dataurltosend, ajaxCompletedOrNot);
    } else {
        //重要場站
        document.getElementById('Elev_ITM').value = "*";
        var keys = Object.keys(buttonCombinations['轄區供水系統']);
        //debugger;
        //    console.log(houseMessageBoxes);
        var dataurltosend = dataUrlComposer(); //重要場站
            //console.log(dataurltosend);
        ajaxCompletedOrNot = true;
        JSAJAX(dataurltosend, ajaxCompletedOrNot);
//        if (count == 1 && firstload) {
//            dataurltosend = "http://220.134.42.63:8080/WaterscadaAPI/WI_StationData?section=轄區供水系統&item=" + count + "&measure=*"
//            JSAJAX(dataurltosend, ajaxCompletedOrNot);
//        } else {
//            var dataurltosend = dataUrlComposer(); //重要場站
//            //console.log(dataurltosend);
//            ajaxCompletedOrNot = true;
//            JSAJAX(dataurltosend, ajaxCompletedOrNot);
//        }
    }

}

function markerNameBuilder(targetid) {
    var markerNameStyle = document.getElementById('markerName');
    // markerNameStyle.id = 'markerName';
    markerNameStyle.sheet.insertRule('#'.concat(targetid)
        .concat('::before{content:"testtesttest"; position:absolute ;z-index: 100; top: 100px ;color: white; font-size: 60px; width: 100px; height: 100px; background-color: black;}'), 0);

}
//單位格式上標判斷
function textSupFilter(targetText) {
    for (var E = 0; E < toSupContent.length; E++) {
        if (targetText == toSupContent[E]) {
            return true;
        }
    }
    return false;
}
//單位格式大寫判斷
function textUppercaseFilter(targetText) {
    for (var E = 0; E < toUppercaseContent.length; E++) {
        if (targetText == toUppercaseContent[E]) {
            return true;
        }
    }
    return false;
}
//文字規格轉換
function specificTextSup(targetString, kendoornot) {
    var stringArray = targetString.split('')
    stringArray[stringArray.length - 1] = String(stringArray[stringArray.length - 1]).sup();
    if (kendoornot) {

    } else {
        //    stringArray.push(':');
    }
    var supProccessedString = stringArray.join('');
    // //console.log(supProccessedString);
    return supProccessedString;
}

var conditionsBackgroundColorClass = {
    'N': 'green',
    '<': 'yellow',
    '>': 'yellow',
    '<<': 'red',
    '>>': 'red',
    '?': 'white'
}

function backgroundColorClassController(condition) {
    var conditionsKey = Object.keys(conditionsBackgroundColorClass);

    for (var E = 0; E < conditionsKey.length; E++) {
        if (conditionsKey[E] == condition) {
            return conditionsBackgroundColorClass[conditionsKey[E]];
        }
    }
}

//x
function kendoShowImportantPoint() {
    var urlForImportantPoint = dataImportantPointUrlComposer()
    var importantData = JSAJAXgetRawData(urlForImportantPoint);
    kendoTableGenerator(importantData, true);
}

var AllPoint = []
    //資料列表 - 全部點的資料
function kendoShowAllPoint(stationIDStorage) {
//    console.log(stationIDStorage.join(","));  
    fullScreenBlocker("資料讀取中 。。。");
    var count = 0;
    var delay = 200;
    for (var E = 0; E < stationIDStorage.length; E++) {
        // //console.log(stationIDStorage[E]);
        setTimeout(function() {
            count += 1;
            // //console.log(stationIDStorage[count - 1]);
            var urlForAllPointUrl = dataAllPointUrlComposer(stationIDStorage[count - 1]);
            if (count == stationIDStorage.length) {
                var ajaxCompletedOrNot = true;
                JSAJAXgetAllPointData(urlForAllPointUrl, ajaxCompletedOrNot);
            } else {
                var ajaxCompletedOrNot = false;
                JSAJAXgetAllPointData(urlForAllPointUrl, ajaxCompletedOrNot);
            }
        }, delay);
    }
}

//資料列表 - 重新產生 重要點的資料
function reGenerateImportantPoint() {
    fullScreenBlocker("資料讀取中 。。。");
    if (fromAllOrImportantSelect) {
//        stationIDStorage = [];
//        dataForKendo = [];
        if (singleOrMultiple) {
            multipleAjaxSender()
        } else {
            var dataurltosend = dataUrlComposer();
            JSAJAX(dataurltosend, true);
        }
        fromAllOrImportantSelect = true;
    }
    kendoTableGenerator(dataForKendo, true);
    fullScreenBlockerRemover();
}

function kendoDataComposer(data) {
    dataForKendo = [];
    for (var i = 0; i < data["DATA"].length; i++) {
        for (var j = 0; j < data["DATA"][i]['ITEMS'].length; j++) {
            //console.log(data["DATA"][i]['ITEMS'][j]);
            var newDateTime = timeDashToSlash(data['DATA'][i]['ITEMS'][j]['DATE_TIME']);
            data['DATA'][i]['ITEMS'][j]['DATE_TIME'] = newDateTime;
            data['DATA'][i]['ITEMS'][j]['DISPLAY_NAME'] = data['DATA'][i]['DISPLAY_NAME'];
            dataForKendo.push(data["DATA"][i]['ITEMS'][j])
        }
    }
}
//資料列表 - 全部點kendo表格
function dataCollectToArray(source, key, targetArray) {
    for (var E = 0; E < source.length; E++) {
        targetArray.push(source[E][key]);
    }
    console.log(targetArray);
}

//x
var kendotestdata = [{
    "DATE_TIME": "2019-06-21T10:00:00",
    "ITEM_NAME": "水位",
    MEASURE: "水位",
    VALUE: "4.03",
    UNIT: "m",
    "FLAG": "?",
}];


//資料列表的資料表格
function kendoTableGenerator(dataForKendo, importantPointOrNot) {
    var stationObject = "ITEM_NAME";
    if (!importantPointOrNot) {
        stationObject = "DESC";
    }
    $("#grid").empty();
    $("#grid").kendoGrid({
        excel: {
            filterable: true
        },
        //數值可計算
        excelExport: exportGridWithTemplatesContent,
        dataSource: {
          data: dataForKendo,
          pageSize: 10,
        },
        noRecords: {
          template: "<h6 class='animated flash infinite' style='color:red'>目前尚無資料</h6>"
        },        
        pageable: {        
          pageSizes: true,
          refresh: true,
          numeric: true,
          input: true,
          previousNext: true,

          buttonCount: 10,
          info: true,
          alwaysVisible:true,
          messages: {
            page: "10",
            itemsPerPage: "",
            first: "首頁",
            last: "末頁",
            previous: "上一頁",
            next: "下一頁",
            refresh: "刷新",
          }        
        },
        groupable: true,
        sortable: true,
        filterable: true,
        columns: [
            {
                field: "DATE_TIME",
                title: "日期",
                filterable: false,
                attributes: {
                    "class": "table-cell",
                    style: "font-size: 12px; background-color: rgb(51, 185, 255); color: white"
                }
            },
            {
                field: stationObject,
                title: "測站項目",
                filterable: false,
                template: function(data) {
                    if (stationObject == "ITEM_NAME") {
                        //            console.log(data.DISPLAY_NAME);
                        return data.DISPLAY_NAME + "-" + data.ITEM_NAME;
                    } else {
                        return data.STATION_ID + "-" + data.DESC;
                    }
                },
                headerAttributes: {
                    "class": "table-header-cell",
                    style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                },
                attributes: {
                    "class": "table-cell",
                    style: " text-align: center; font-size: 12px;"
                }
            },
            {
                field: "MEASURE",
                title: "物理量",
                filterable: {
                    multi: true
                },
                headerAttributes: {
                    "class": "table-header-cell",
                    style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                },
                attributes: {
                    "class": "table-cell",
                    style: " text-align: center; font-size: 12px;"
                }
            },
            {
                field: "VALUE_YESTERDAY",
                title: "昨日測値",
                filterable: false,
                headerAttributes: {
                    "class": "table-header-cell",
                    style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                },
                attributes: {
                    "class": "table-cell",
                    style: " text-align: center; font-size: 12px;"
                }
            },
            {
                field: "VALUE",
                title: "測値",
                filterable: false,
                headerAttributes: {
                    "class": "table-header-cell",
                    style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                },
                attributes: {
                    "class": "table-cell",
                    style: " text-align: center; font-size: 12px;"
                }
            },
            {
                field: "UNIT",
                title: "單位",
                filterable: false,
                template: function(data) {
                    if (textSupFilter(data.UNIT)) {
                        var stringArray = data.UNIT.split('');
                        stringArray[stringArray.length - 1] = String(stringArray[stringArray.length - 1]).sup();
                        var supProccessedString = stringArray.join('');
                        //                        //console.log(supProccessedString);
                        return supProccessedString;
                    } else
                        return data.UNIT.toUpperCase();
                },
                headerAttributes: {
                    "class": "table-header-cell",
                    style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                },
                attributes: {
                    "class": "table-cell",
                    style: " text-align: center; font-size: 12px;"
                }
            },

        ],
        dataBound: function(e) {
            var rows = e.sender.tbody.children();
            for (var j = 0; j < rows.length; j++) {
                var row = $(rows[j]);
                var dataItem = e.sender.dataItem(row);
                var flag = dataItem.get("FLAG");
                var color = backgroundColorClassController(flag)
                row.addClass(color);
            }
        }
    });
    // filterController()
    var stringToCheckSup = document.querySelectorAll('td:nth-of-type(6)[role="gridcell"]');
    var kendoRow = document.querySelectorAll('tr[role="row"]');
    for (var E = 0; E < stringToCheckSup.length; E++) {
        if (textSupFilter(stringToCheckSup[E].textContent)) {
            stringToCheckSup[E].innerHTML = specificTextSup(stringToCheckSup[E].textContent, true);
        }
    }
    // $("#test-grid").kendoTabStrip({
    //   activate: function (e) {
    //    var grid = $(e.contentElement).find(".k-grid");
    //    if (grid[0]) {
    //     grid.data("kendoGrid").hideColumn(0);
    //    }
    //   }
    //  });

    //searching
    //Searching the Grid by the value of the textbox
    document.getElementById('searchBox').onkeyup = function() {
        var searchValue = $('#searchBox').val();

        //Setting the filter of the Grid
        $("#grid").data("kendoGrid").dataSource.filter({
            logic: "or",
            filters: [{
                    field: stationObject,
                    operator: "contains",
                    value: searchValue
                },

            ]
        });
    };


    //數值可計算的方法開始
    for (var E = 0; E < $("#grid").data("kendoGrid").dataSource.data().length; E++) {
        //        //console.log($("#grid").data("kendoGrid").dataSource.data());
        if (typeof($("#grid").data("kendoGrid").dataSource.data()[E]['VALUE']) == 'string') {
            var number = parseFloat($("#grid").data("kendoGrid").dataSource.data()[E]['VALUE'].split(',').join(''));
            $("#grid").data("kendoGrid").dataSource.data()[E]['VALUE'] = number;
        }
        if (typeof($("#grid").data("kendoGrid").dataSource.data()[E]['VALUE_YESTERDAY']) == 'string') {
            var number = parseFloat($("#grid").data("kendoGrid").dataSource.data()[E]['VALUE_YESTERDAY'].split(',').join(''));
            $("#grid").data("kendoGrid").dataSource.data()[E]['VALUE_YESTERDAY'] = number;
        }

        //        //console.log($("#grid").data("kendoGrid").dataSource.data()[E]['VALUE']);
        //        //console.log(typeof($("#grid").data("kendoGrid").dataSource.data()[E]['VALUE']));
    }
    //數值可計算的方法結束
}
//另存可以計算數值方式之檔案from kendo
function exportGridWithTemplatesContent(e) {
    var data = e.data;
    var gridColumns = e.sender.columns;
    var sheet = e.workbook.sheets[0];
    var visibleGridColumns = [];
    var columnTemplates = [];
    var dataItem;

    var elem = document.createElement('div');


    for (var i = 0; i < gridColumns.length; i++) {
        // //console.log(gridColumns);
        if (!gridColumns[i].hidden) {
            visibleGridColumns.push(gridColumns[i]);
        }
    }


    for (var i = 0; i < visibleGridColumns.length; i++) {
        // //console.log(visibleGridColumns);
        if (visibleGridColumns[i].template) {
            columnTemplates.push({
                cellIndex: i,
                template: kendo.template(visibleGridColumns[i].template)
            });
        }
    }


    for (var i = 1; i < sheet.rows.length; i++) {
        var row = sheet.rows[i];

        var dataItem = data[i - 1];
        // //console.log(columnTemplates);
        for (var j = 0; j < columnTemplates.length; j++) {

            var columnTemplate = columnTemplates[j];

            elem.innerHTML = columnTemplate.template(dataItem);
            if (row.cells[columnTemplate.cellIndex] != undefined) {


                row.cells[columnTemplate.cellIndex].value = elem.textContent || elem.innerText || "";
            }



        }
    }
}

function filterController() {
    if (document.querySelector('.physicalQuantityFilter>.k-grid-filter')) {
        document.querySelector('.physicalQuantityFilter>.k-grid-filter').remove();
    }
    // document.getElementsByClassName('k-item-title')[0].textContent = '全選';
    document.getElementsByClassName("physicalQuantityFilter")[0].append(document.getElementsByClassName('k-grid-filter')[0]);
    document.getElementsByClassName("physicalQuantityFilter")[0].onclick = function() {
        document.getElementsByClassName('k-grid-filter')[0].click();
    }
}

function digitsControll(number, targetDigit) {
    var Num = String(number);
    //  debugger;
    if (Num.indexOf(','))
        Num = Num.split(',').join('');
    return Number(Num).toFixed(targetDigit);
}

function rwdMenuControll() {
    displayControll()

}


function displayControll() {
    document.querySelector('.main_menu li>.m1').onclick = function() {
        if (window.innerWidth < 850) {
            if (window.getComputedStyle(this.nextElementSibling, null).display == "none") {
                this.nextElementSibling.style.display = 'block';
            } else {
                this.nextElementSibling.style.display = 'none';
            }
        }
    }
}

function widthChecker(func) {
    if (window.innerWidth < 851) {
        func();
    } else {
        if (window.getComputedStyle(document.querySelector('.main_menu li>.child_menu'), null).display == 'none') {
            document.querySelector('.main_menu li>.child_menu').style.display = 'block';
        }
    }
}
rwdMenuControll();


var targetNode = document.querySelector("a[href*='stackoverflow']");

if (targetNode) {
    //--- Simulate a natural mouse-click sequence.
    triggerMouseEvent(targetNode, "mouseover");
    triggerMouseEvent(targetNode, "mousedown");
    triggerMouseEvent(targetNode, "mouseup");
    triggerMouseEvent(targetNode, "click");
}

function triggerMouseEvent(node, eventType) {
    var clickEvent = document.createEvent('MouseEvents');
    clickEvent.initEvent(eventType, true, true);
    node.dispatchEvent(clickEvent);
}

//var wmsOpacityControllers = document.querySelectorAll('input[id*="alpha_Elev_ITM_"]');

//取得場站ICON
function getserviceInfor(url_){
  var dataQueryUrl = url_;
  houseMessageBoxes.length = 0;
  console.log("場站URL: " + dataQueryUrl);
  var getBSDR = [];
   $.ajax({
      url: dataQueryUrl,
      type: "GET",
      dataType: "json",
      async: 'false',
      success: function(Jdata) {        
        var labelInFo = labelInfoComposer(Jdata);
//        console.log(labelInFo);
        var messageBoxNames = [];
        if(Jdata["STATIONS"].length < 0) { alert("此資料內容為空。請確認網路連線問題!\n或請IT人員協助處理。");
                             return;}
        var infotext = labelInFo['infotext'];
        var markerPoint = labelInFo['markerPoint'];
        var imgUrl = labelInFo['imgUrl'];
        var linkNumber = labelInFo['LINK'];
        var pointDeviated = labelInFo['markerPointDeviated'];
        var stationIdforinfoWindo = labelInFo["STATION_ID"];
        var pTGMarker = ''; 
        var messageBox = '';         
        console.log(infotext);
        for (var i = 0; i < infotext.length; i++) {
            var InfoWindowOptions = {
                maxWidth: 100,
                zIndex: 1,
                pixelOffset: new TGOS.TGSize(nameWindowOffset['X'], nameWindowOffset['Y']) //InfoWindow起始位置的偏移量, 使用TGSize設定, 向右X為正, 向上Y為負 
 };
            if (imgUrl[i] != "skipnow") {
              //建立marker icon
              var markerImg = new TGOS.TGImage(imgUrl[i], new TGOS.TGSize(42, 42), new TGOS.TGPoint(0, 0), new TGOS.TGPoint(10, 33));
              pTGMarker = new TGOS.TGMarker(pMap, markerPoint[i], '', markerImg, { flat: false });
              messageBox = new TGOS.TGInfoWindow(infotext[i], markerPoint[i], InfoWindowOptions);
              //綁定資訊視窗click功能
              if (linkNumber[i] != null) {
                  TGOS.TGEvent.addListener(pTGMarker, "click", function(pTGMarker, messageBox) {
                      return function() { 
                          messageBox.close();
                          messageBox.open(pMap, pTGMarker);
                        
                        console.log(messageBox);
//                        infoHouseControll(pTGMarker["STATION_ID"]);
                        //infoWindowControll(pTGMarker["STATION_ID"], false);
//                            //console.log(designatedPoint);
//                            //點選物理量Icon後圖台位移與ZoomIn
//                            //              pMap.setCenter(designatedPoint);
//                            //              pMap.setZoom(10);
                      };
                  }(pTGMarker, messageBox));
              } 
              //新增場站名稱
              pTGMarker["STATION_ID"] = stationIdforinfoWindo[i];
              pTGMarker.setTitle(stationIdforinfoWindo[i]); //設定標題
//              messageBoxNames.push(new TGOS.TGInfoWindow(Jdata["STATIONS"][i]["DISPLAY_NAME"], markerPoint[i], InfoWindowOptions)); //建立訊息視窗
              shortCut(linkNumber[i], pTGMarker);
              messageBox.getContentPane().classList.add('messageBoxOpened');
              houseMessageBoxes[linkNumber[i]] = messageBox;
              houseMarkers[linkNumber[i]] = pTGMarker;
              messageBoxAdjuster(messageBox);              
              messageBox.close(pMap, pTGMarker);
//              houseMessageBoxesName[linkNumber[i]] = messageBoxNames[i];
//              removehouseBytimeout();
//              openedMessageBox.push(messageBox);

//              messageBoxNamesAdjuster(messageBoxNames[i]);
              //調整房子的位置
              for (var E = 0; E < memoPositionForAll.length; E++) {
                  if (houseMessageBoxes[E + 1]) {
                      houseMessageBoxes[E + 1].setPixelOffset(memoPositionForAll[E]);
                  }
              }
              console.log(houseMessageBoxes);
            }
        }
      },
      error: function() {
          console.log("get json fail");
      }
  });
//  if (Object.keys(houseMarkers).length != 0) {
//      houseMarkers[1]["elem"][0].parentElement.style.zIndex = 3;
//      houseMarkers[1].elem[0].parentElement.parentElement.parentElement.style.removeProperty('z-index');
//  }
  
};
//測站按鈕
function houseIconCloseAndClean(){
    for (var i = 0; i < houseMarkers.length; i++) {
      if(houseMarkers[i] != null)
        houseMarkers[i].setMap(null);
    }
    houseMarkers = [];
}
function serviceControll(target, state_) {    
  //debugger;
  houseIconCloseAndClean();
  var activeOrNot = activeCheck(target);
    if (activeOrNot) {}
    else {
      //廠所按鈕進入點
      if(state_){
        if( $("#Elev_ITM").val()== "*" )
          var url_ = "http://220.134.42.63:8080/WaterscadaAPI/WI_StationData?section=轄區供水系統&item=1";
        else {
          var station_id = $("#left_nav1").children(".top_left_menu").find(".left_sub_menu:first").children("li.active").children('a').eq(0).val();          
          var url_ = "http://220.134.42.63:8080/WaterscadaAPI/WI_StationData?section=轄區供水系統&item=1&station_id=" + station_id;
        }
      
      } else {
          //服務所按鈕進入點
         var station_id = $(target).closest("a").eq(0).val();
         if( station_id == "總覽" )
           var url_ = "http://220.134.42.63:8080/WaterscadaAPI/WI_StationData?section=轄區供水系統&item=1";
         else {
           var url_ = "http://220.134.42.63:8080/WaterscadaAPI/WI_StationData?section=轄區供水系統&item=1&station_id=" + station_id;
        }
      }
      getserviceInfor(url_);
        
    }
}
var houseLength;
function houseControll(condition, linknumber) {
    alert("houseControl");
    if (condition) {
        $("#physicQuantities div:first").addClass('active');
//        getserviceInfor();
    }
    else
        $("#physicQuantities div:first").removeClass('active');
  
  
    //  linknumber = 0;
    if (linknumber != 0) {
        houseLength = Object.keys(houseMessageBoxes).length;
        for (var E = 1; E <= Object.keys(houseMarkers).length; E++)
            houseMarkers[E].setVisible(0);
        for (var E = 1; E <= Object.keys(houseMessageBoxes).length; E++)
            houseMessageBoxesControll(0, E);
        for (var E = 1; E <= Object.keys(houseMessageBoxesName).length; E++)
            houseMessageBoxesNameControll(0, E);

        houseMessageBoxesControll(condition, linknumber)
        houseMessageBoxesNameControll(condition, linknumber);
        // var activeOrNot = activeCheck(document.querySelector('#physicQuantities>div'))
        //console.log(linknumber);
        houseMarkers[linknumber].setVisible(condition);

    } else {
        houseLength = Object.keys(houseMessageBoxes).length;
        for (var E = 1; E <= Object.keys(houseMarkers).length; E++) {
            // houseMessageBoxes[Object.keys(houseMessageBoxes)[E]].close();

            //關閉房子
            houseMarkers[E].setVisible(condition);
        }
        for (var E = 1; E <= Object.keys(houseMessageBoxes).length; E++) {
            houseMessageBoxesControll(condition, E);
        }
        for (var E = 1; E <= Object.keys(houseMessageBoxesName).length; E++) {
            houseMessageBoxesNameControll(condition, E);
        }

    }
}

function houseMessageBoxesControll(condition, linknumber) {
    if (condition) {
        houseMessageBoxes[linknumber].open(pMap, houseMarkers[linknumber]);
    } else {
        if (houseMessageBoxes[linknumber]) {
            houseMessageBoxes[linknumber].close();
        }
    }
}

function houseMessageBoxesNameControll(condition, linknumber) {
    if (condition) {
        houseMessageBoxesName[linknumber].open(pMap, houseMarkers[linknumber]);
    } else {
        if (houseMessageBoxesName[linknumber]) {
            houseMessageBoxesName[linknumber].close();
        }
    }
}



var searchResultGraphics = [];
var searchResultMarkers = [];

var locator = new TGOS.TGLocateService();
var tgLocate = new TGOS.TGLocate();
var locationmarker;
function LocatorSearch(e) {
    var targetContainer = $(e).closest(".filterunit").find("input").val();
    //targetContainer = "台北市";
    var coordSys = TGOS.TGCoordSys.EPSG3826;
    var request = {
        geometryInfo: true,
        requestText: targetContainer,
        center: pMap.getCenter()

    }
    tgLocate.complexLocate(request, coordSys, function(results, status) {
        if (status !== TGOS.TGLocatorStatus.OK && status !== TGOS.TGLocatorStatus.TOO_MANY_RESULTS) {
            console.log(status);
            alert("查無資料");
            return;
        }
        if (searchResultMarkers) {
            for (var i = 0; i < searchResultMarkers.length; i++) {
                searchResultMarkers[i].setMap(null);
            }
            searchResultMarkers = [];
        }
        for (var i = 0; i < results.length; i++) {
            var re = results[i];
            if (re.geometry) {
                var locationmarker = new TGOS.TGMarker(pMap, re.geometry.location, re.name);
                locationmarker.annotation = re;
                searchResultMarkers.push(locationmarker);
                if (i == 0) {
                    var env = results[0].geometry.viewport;
                    pMap.fitBounds(env);
                    pMap.setZoom(pMap.getZoom() - 1);
                }
            }
        }
    });
}

function poiLocator(targetContainer) {
    // //console.log(targetContainer);
    locator.locateTWD97({ //指定回傳結果為TWD97坐標系統
        poi: targetContainer.value //要求地址定位
    }, function(result, status) {
        if (status != TGOS.TGLocatorStatus.OK && status != TGOS.TGLocatorStatus.TOO_MANY_RESULTS) {
            return;
        } else {
            for (var i = 0; i < result.length; i++) {
                var geometry = result[i].geometry.location;
                var tip = result[i].poiName;
                var locatorMarker = new TGOS.TGMarker(pMap, geometry, tip);
                var env = result[i].geometry.viewport; //以geometry.viewport取得系統建議的視域範圍(TGEnvelope)
                searchResultMarkers.push(locatorMarker);
                if (i == 0) {
                    locator.fitBounds(pMap, env);
                }
            }
        }
    })
    //return check;
}
//地址
function addressLocator(targetContainer) {
    var locatorMarker;
    locatorMarker = new TGOS.TGMarker(pMap, new TGOS.TGPoint(0, 0));
    locatorMarker.setVisible(false);
    locationmarker = locatorMarker;
    
    // //console.log(targetContainer);
    locator.locateTWD97({ //指定回傳結果為TWD97坐標系統
        address: targetContainer.value //要求地址定位
    }, function(e, status) {
        if (status != TGOS.TGLocatorStatus.OK && status != TGOS.TGLocatorStatus.TOO_MANY_RESULTS) {
            return;
//          check = false;
        }
        locatorMarker.setVisible(true);
        locatorMarker.setPosition(e[0].geometry.location); //將定位結果以標記顯示
        pMap.fitBounds(e[0].geometry.viewport); //將地圖畫面移至符合查詢之位置				
        // document.getElementById("addrXY").innerHTML = "X坐標：" + e[0].geometry.location.x + "，Y坐標：" + e[0].geometry.location.y;  //在addrXY Div中顯示地址坐標
//        check = true;
    });
    // searchResultGraphics.push(fill);
    searchResultMarkers.push(locationmarker);
  
//    return check;
}
var fill = null;
//行政區域
function districtLocator(e) { //加入行政區定位
    var locatorMarker;
    var districtContainer = $(e).closest(".filterunit").find("input").val();
    locatorMarker = new TGOS.TGMarker(pMap, new TGOS.TGPoint(0, 0));
    locatorMarker.setVisible(false);
    locationmarker = locatorMarker;
    //if (fill) { fill.setMap(null) };
    locator.locateTWD97({
        district: districtContainer
    }, function(e, status) {
        if (status != TGOS.TGLocatorStatus.OK && status != TGOS.TGLocatorStatus.TOO_MANY_RESULTS) {
            return;
          //check = false;
        }

        locatorMarker.setVisible(true); //設定標記點標示行政區中心
        locatorMarker.setPosition(e[0].geometry.location);
        pMap.fitBounds(e[0].geometry.viewport);
        pMap.setZoom(pMap.getZoom() - 1);
        //調整畫面符合行政區邊界
        var pgn = e[0].geometry.geometry;
        //console.log(pgn);
        //讀取行政區空間資訊
        fill = new TGOS.TGFill(pMap, pgn, {
            //將行政區空間資訊以面圖徵呈現
            fillColor: '#33b9ff',
            fillOpacity: 0.2,
            strokeColor: '#073469',
            strokeWeight: 5,
            strokeOpacity: 1
        });
        searchResultGraphics.push(fill);
//        check = true;
    });
    searchResultMarkers.push(locationmarker);
}
//道路
function roadLocator(roadContainer) {

    var locationMarker;
    
    // if (marker) {
    //   marker.setMap(null);	//假設地圖上已存在查詢後得到的標記點, 則先行移除
    // }
    // var RName = document.getElementById('RoadName').value;	//取得文字輸入框內的道路名稱
    // var LService = new TGOS.TGLocateService();				//宣告一個新的定位服務
    var request = { ////設定定位所需的參數, 範例使用roadLocation, 進行道路名稱定位
        roadLocation: roadContainer.value
    };
    locator.locateTWD97(request, function(result, status) { //進行定位查詢, 並指定回傳資訊為TWD97坐標系統
        if (status != TGOS.TGLocatorStatus.OK && status != TGOS.TGLocatorStatus.TOO_MANY_RESULTS) {
            return 0;
          //check = false;
        }
        var env = result[0].geometry.viewport; //以geometry.viewport取得系統建議的視域範圍(TGEnvelope)
        var loc = result[0].geometry.location; //利用geometry.location取得點位(TGPoint)
        locator.fitBounds(pMap, env); //將地圖畫面縮放至第一個查詢結果的視域範圍
        locator.setCenter(pMap, loc); //以道路定位點為中心平移地圖
        locationMarker = new TGOS.TGMarker(pMap, loc, roadContainer.value); //繪出定位點
        locationmarker = locationMarker;
        searchResultMarkers.push(locationmarker);
        //check = true;
    });
    // searchResultGraphics.push(fill);
    return check;
} //x
//座標定位器
function coordinateLocator(coordinateContainer) {
    var pointX = Number(coordinateContainer[0].value);
    var pointY = Number(coordinateContainer[1].value);
    var locationMarker;
    locationMarker = new TGOS.TGMarker(pMap, new TGOS.TGPoint(0, 0));
    locationMarker.setVisible(false);
    //  var pt = new TGOS.TGPoint(pointX, pointY);
    var pt = coordinateConverter(pointY, pointX);
    locator.setCenter(pMap, pt);
    locationmarker = locationMarker;
    locationMarker.setVisible(true);
    locationMarker.setPosition(pt);
    // searchResultGraphics.push(fill);
    searchResultMarkers.push(locationmarker);
}
//量測距離

function measureDistance(e) {  
//  if(!($(e).hasClass("active"))){
    dist_ = true;
    removelistenr();
    dm.setMap(pMap);
    dm.setOptions({
        drawingControl: true,
        drawingControlOptions: {
            position: TGOS.TGControlPosition.BOTTOM_RIGHT,
            drawingModes: [TGOS.TGOverlayType.LINESTRING]
        },
        polylineOptions: {
            strokeWeight: 3,
            strokeColor: '#073469',
            strokeOpacity: 1
        }
    })
    var dist = TGOS.TGEvent.addListener(dm, 'linestring_complete', function(e) {
        //量測面積後的滑鼠樣式
        //        dm.setDrawingMode(TGOS.TGOverlayType.NONE);
        //避免重複跳出alert      
        dm.polygon_complete_.splice(1,1);
        measureServ.twd97LineMeasure(e.overlay.getPath(), function(length, status) {
            alert("距離: " + length.toFixed(2) + "公尺");
        });
    });
    measureButton = document.querySelector('img[src="http://api.tgos.tw/TGOS_API/images/line.png"]').parentElement;
    measureButton.click();
    scalePositionControl();
//  }
  $(e).addClass("active");
}
//量測面積
function measureArea(e) {  
//  if(!($(e).hasClass("active"))){
    removelistenr();
    dm.setMap(pMap);
    dm.setOptions({
        drawingControl: true,
        drawingControlOptions: {
            position: TGOS.TGControlPosition.BOTTOM_RIGHT,
            drawingModes: [TGOS.TGOverlayType.POLYGON]
        },
        polygonOptions: {
            fillColor: '#33b9ff',
            fillOpacity: 0.5,
            strokeWeight: 3,
            strokeColor: '#073469',
            strokeOpacity: 0.5
        }
    })  
    dist_ = true;
    TGOS.TGEvent.addListener(dm, 'polygon_complete', function(e) {
        //量測面積後的滑鼠樣式
        //        dm.setDrawingMode(TGOS.TGOverlayType.NONE);
        //避免重複跳出alert
        dm.polygon_complete_.splice(1,1);
        measureServ.twd97PolygonMeasure(e.overlay.getPath(), function(area, status) {
            alert("面積: " + area.toFixed(2) + "平方公尺");
        });
    });
    measureButton = document.querySelector('img[src="http://api.tgos.tw/TGOS_API/images/poly.png"]').parentElement;
    measureButton.click();
    //強制從新呼叫比例尺樣式--fix dimension ratio disppear problems
    scalePositionControl();
//  }
  $(e).addClass("active");
}

function clearLocatorResult() {
    for (var E = 0; E < searchResultGraphics.length; E++) {
        searchResultGraphics[E].setMap(null);
    }
    for (var E = 0; E < searchResultMarkers.length; E++) {
        searchResultMarkers[E].setMap(null);
    }
    removelistenr();
}

var clearLocatorResultButtons = document.getElementsByClassName("clearLocatorResult");
for (var E = 0; E < clearLocatorResultButtons.length; E++) {
    clearLocatorResultButtons[E].onclick = function() {
        clearLocatorResult();
    }
}

//比例尺樣式
function scalePositionControl() {
  $(".hpack").children("div:last").children("div").css({
    'backgroundColor': 'white',
    'top': '150px',
    'opacity':"0.8",
    'zIndex': "207"
  }).addClass("scaleBarName");
//    document.querySelector('.hpack>div:last').style.top = '186px';
//    document.querySelector('.hpack>div:last>div').style.backgroundColor = 'white';
//    document.querySelector('.hpack>div:last>div').style.opacity = "0.8";
}
//取點距離量測刪除鈕
var clearGraphicButtons = document.getElementsByClassName("clearAllGraphics");
for (var E = 0; E < clearGraphicButtons.length; E++) {
    clearGraphicButtons[E].onclick = function() {
        var re = $(this).parent().children("button:first");
        if(re.hasClass("active")) re.removeClass("active");
        dm.clearAllGraphics();
        //移除測量後滑鼠的樣式
        dm.setDrawingMode(TGOS.TGOverlayType.NONE);
        //強制從新呼叫比例尺樣式--fix dimension ratio disppear problems
        scalePositionControl();
        rmovemarkeronmap();
    }
}
(function() {
    var options = document.querySelectorAll('.options>div');
    var filters = document.querySelectorAll('.filterunit');
    for (var E = 0; E < options.length; E++) {
        options[E].onclick = function(e) {
            var thisOptionIndex = getElementIndex(this.parentElement);
            singleTrueFalseChecker(options, thisOptionIndex);
            checkFilter(filters, thisOptionIndex);
        };
    }

    filterShow(document.getElementsByClassName("filterControll")[0]);
})();

//x
function getElementIndex(target) {
    var nodes = Array.prototype.slice.call(target.parentElement.children);
    var index = nodes.indexOf(target); //ES6 let index = [...target.parentElement.children].indexOf(target);

    return index;
}
//距離量測鈕
var singleTrueFalseChecker = function singleTrueFalseChecker(targets, toTrueIndex) {
    var x = targets.length;
    var record;
    for (var x = 0; x < targets.length; x++) {
        if (targets[x].classList.contains('filter-active')) {
            targets[x].classList.remove('filter-active');
            record = x;
            break;
        }
    }
    if (record != toTrueIndex)
        targets[toTrueIndex].classList.add('filter-active');
    else
        targets[record].classList.remove('filter-active');
};

var checkFilter = function checkFilter(filters, showIndex) {
    for (var E = 0; E < filters.length; E++) {
        if (showIndex == E) {
            continue;
        }
        filters[E].style.display = "none";        
    }

    if (window.getComputedStyle(filters[showIndex], null).display == "none") {
        filters[showIndex].style.display = "block";
    } else {
        filters[showIndex].style.display = "none";
    }
};

function filterShow(filterControll) {
    filterControll.onclick = function() {
        if (this.parentElement.parentElement.classList.contains('filterWrapperInvisible')) {
            this.parentElement.parentElement.classList.remove('filterWrapperInvisible');
        } else {
            this.parentElement.parentElement.classList.add('filterWrapperInvisible');
        }
    };
}




//基本圖層wms控制 <=defind variables on the paramenter.js
var basicWMSControllers = document.querySelectorAll('#left_nav2 .top_left_menu>li>ul>li')
    //透明度調整
var basicWMSOpactiryControllers = document.querySelectorAll('#left_nav2 .top_left_menu>li>ul>li .popper input')
for (var E = 0; E < basicWMSControllers.length; E++) {
    basicWMSControllers[E].onclick = function() {
        //console.log(this.getElementsByTagName('input')[0].value);
        //console.log(baseLayer[this.getElementsByTagName('input')[0].value]['wmskey']);
        if (baseLayer[this.getElementsByTagName('input')[0].value]['wmskey']) {
            //console.log(baseLayer[this.getElementsByTagName('input')[0].value]['wmskey']);
            if (WMSLayer[baseLayer[this.getElementsByTagName('input')[0].value]['wmskey']]) {
                if (WMSLayer[baseLayer[this.getElementsByTagName('input')[0].value]['wmskey']].getVisible()) {
                    WMSLayer[baseLayer[this.getElementsByTagName('input')[0].value]['wmskey']].setVisible(false);
                } else {
                    WMSLayer[baseLayer[this.getElementsByTagName('input')[0].value]['wmskey']].setVisible(true);
                }
                // delete WMSLayer[baseLayer[this.getElementsByTagName('input')[0].value]['wmskey']];
            } else {
                var wmsUrl = baseLayer[this.getElementsByTagName('input')[0].value]['wmsurl'];
                addWms(wmsUrl, baseLayer[this.getElementsByTagName('input')[0].value]['wmskey']);
            }
        } else {
            if (WMSLayer[this.getElementsByTagName('input')[0].id]) {
                if (WMSLayer[this.getElementsByTagName('input')[0].id].getVisible()) {
                    WMSLayer[this.getElementsByTagName('input')[0].id].setVisible(false)
                } else {
                    WMSLayer[this.getElementsByTagName('input')[0].id].setVisible(true)
                }
                //   delete WMSLayer[this.getElementsByTagName('input')[0].id]
            } else {
                //console.log(this.getElementsByTagName('input')[0].id);
                if (this.getElementsByTagName('input')[0].id == "stadstu_serv") {
                    if (WMSLayer['淨水場'] && WMSLayer['服務所']) {
                        if (WMSLayer['淨水場'].getVisible() && WMSLayer['服務所'].getVisible()) {
                            WMSLayer['淨水場'].setVisible(false);
                            WMSLayer['服務所'].setVisible(false);
                        } else {
                            WMSLayer['淨水場'].setVisible(true);
                            WMSLayer['服務所'].setVisible(true);
                        }
                    } else {
                        var wmsUrl = baseLayer[this.getElementsByTagName('input')[0].value]['wmsurl']['淨水場'];
                        //console.log(wmsUrl);
                        addWms(wmsUrl, '淨水場');
                        wmsUrl = baseLayer[this.getElementsByTagName('input')[0].value]['wmsurl']['服務所'];
                        //console.log(wmsUrl);
                        addWms(wmsUrl, '服務所');
                    }
                } else if (this.getElementsByTagName('input')[0].id == "nlsc_cm") {
                    var wmtsurl = baseLayer[this.getElementsByTagName('input')[0].value]['wmtsurl']
                    addWMTS(wmtsurl, this.getElementsByTagName('input')[0].id);
                    //debugger;
                } else {
                    var wmsUrl = baseLayer[this.getElementsByTagName('input')[0].value]['wmsurl'];
                    addWms(wmsUrl, this.getElementsByTagName('input')[0].id);
                }
            }
        }
    }
}


for (var E = 0; E < basicWMSOpactiryControllers.length; E++) {
    basicWMSOpactiryControllers[E].onchange = function() {
        if (baseLayer[this.parentElement.parentElement.parentElement.getElementsByTagName('input')[0].value]['wmskey']) {
            setWmsOpacity(baseLayer[this.parentElement.parentElement.parentElement.getElementsByTagName('input')[0].value]['wmskey'], this.value);
        } else {
            if (WMSLayer[this.parentElement.parentElement.parentElement.getElementsByTagName('input')[0].id] == "nlsc_cm") {
                alert("nlsc_cm");
                setWmtsOpacity(this.parentElement.parentElement.parentElement.getElementsByTagName('input')[0].id, this.value);
            } else if (WMSLayer[this.parentElement.parentElement.parentElement.getElementsByTagName('input')[0].id]) {
                setWmsOpacity(this.parentElement.parentElement.parentElement.getElementsByTagName('input')[0].id, this.value);
            }
        }
    };
}



function convertToExcel() {
    $("#convertToExcel").click(function(e) {
        var grid = $("#grid").data("kendoGrid");
        grid.saveAsExcel();
    });
    // document.getElementById('convertToExcel').onclick = function(e)
    // {
    //     e.stopPropagation();
    //     document.getElementsByClassName('k-grid-excel')[0].click();
    // };
}
convertToExcel();


function basicWMSControllersAllActive() {
    var basicWMSInput = document.querySelectorAll('input[id^="DIS_ITM_"]');
    for (var E = 0; E < basicWMSInput.length; E++) {
        basicWMSInput[E].parentElement.classList.add('active');
        basicWMSInput[E].parentElement.parentElement.classList.add('active');
    }
}

function basicWMSControllersDeactive() {
    var basicWMSInput = document.querySelectorAll('input[id^="DIS_ITM_"]');
    for (var E = 0; E < basicWMSInput.length; E++) {
        basicWMSInput[E].parentElement.classList.remove('active');
        basicWMSInput[E].parentElement.parentElement.classList.remove('active');
    }
}

function basicWMSControllersActive(number) {
    basicWMSControllersDeactive()
    var basicWMSInput = document.querySelector('input[id^="DIS_ITM_' + number + '"]')
    basicWMSInput.parentElement.classList.add('active');
    basicWMSInput.parentElement.parentElement.classList.add('active');
}
//時間轉換
function timeDashToSlash(target) {
    if (target) {
        var tempString = target.split('-').join('/');
        var newTime = tempString.split('T').join(' ');
        return newTime;
    }
}
//x
function test() {
    for (var E = 0; E < memoPositionForAll.length; E++) {
        if (houseMessageBoxes[E + 1]) {
            //console.log(memoPositionForAll[E]);
            //console.log(E + 1);
            houseMessageBoxes[E + 1].setPixelOffset(memoPositionForAll[E]);
        }
    }

}

//資訊視窗(getrealtimedata)
function infoWindowGetRealtimeData(Formsearch) {    
    var i;
    var stationId = document.getElementById('InfoWin').value;
    var measure_info = document.getElementById('Elev_MSR').value;
    var item_info = document.getElementById('Elev_ITM').value;
    var status = 'infoWinAllsite';
    var dataQueryUrl = "http://220.134.42.63:8080/waterscadaAPI/GetRealtimeData?station_id=" + stationId + "&measure=*&include_wi=1";
    //disable搜尋鈕
    if (!Formsearch) {
        //全區供水
        if ($("#left_nav1 .top_left_menu > li:nth-child(1)").hasClass('active')) {
            //全部場站
            if ($(".multipleChoice.active .allsitecontrol1").hasClass('active')) {
                dataQueryUrl = "http://220.134.42.63:8080/waterscadaAPI/GetRealtimeData?station_id=" + stationId + "&measure=" + measure_info + "&include_wi=1";
                console.log('全部場站');
            }
            //重要場站
            if ($(".multipleChoice.active .importantsitecontroll").hasClass('active')) {
                dataQueryUrl = 'http://220.134.42.63:8080/WaterscadaAPI/WI_StationData?section=轄區供水系統&item=' + item_info + '&measure=' + measure_info + '&station_id=' + stationId + "&only_wi=1";
                status = 'infoWinImportant';
                console.log('重要場站');
            }
        }
        //供水系統
        if ($("#left_nav1 .top_left_menu > li:nth-child(2)").hasClass('active')) {
            dataQueryUrl = "http://220.134.42.63:8080/waterscadaAPI/GetRealtimeData?station_id=" + stationId + "&measure=*&include_wi=1";
            console.log("供水系統URL: " + dataQueryUrl);
        }
    } else {
        //enable搜尋鈕
        dataQueryUrl = "http://220.134.42.63:8080/waterscadaAPI/GetRealtimeData?station_id=" + stationId + "&measure=*&include_wi=1";
        console.log("搜尋URL: " + dataQueryUrl);
        console.log('enable搜尋鈕');
    }
    console.log("send:" + dataQueryUrl);
//    if(house url){
//       dataQueryUrl =  'http://220.134.42.63:8080/WaterscadaAPI/WI_StationData?section=轄區供水系統&station_id='+stationId+'&item=1';
//      
//    }
       
    $('#infoEmpty').remove();
    $('#spinner_').remove();
    //debugger;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.response);
            console.log(data);
            //轉換DATA重要場站
            var importantTemplate_ = [];
            if (!Formsearch) {
                if ($("#left_nav1 ul li:nth-child(1)").hasClass('active')) {
                    if ($(".multipleChoice.active .importantsitecontroll").hasClass('active')) {
                        for (var L = 0; L < data['DATA'][0]['ITEMS'].length; L++) {
                            var obj = {
                                "DATE_TIME": data['DATA'][0]['ITEMS'][L]['DATE_TIME'],
                                "DESC": data['DATA'][0]['ITEMS'][L]['ITEM_NAME'],
                                "DEVICE": data['DATA'][0]['ITEMS'][L]['DEVICE'],
                                "FLAG": data['DATA'][0]['ITEMS'][L]['FLAG'],
                                "HH_ALARM": data['DATA'][0]['ITEMS'][L]['HH_ALARM'],
                                "H_ALARM": data['DATA'][0]['ITEMS'][L]['H_ALARM'],
                                "IMAGE": data['DATA'][0]['ITEMS'][L]['IMAGE'],
                                "ITEM_NAME": data['DATA'][0]['ITEMS'][L]['ITEM_NAME'],
                                "LAT": data['DATA'][0]['ITEMS'][L]['LAT'],
                                "LL_ALARM": data['DATA'][0]['ITEMS'][L]['LL_ALARM'],
                                "LNG": data['DATA'][0]['ITEMS'][L]['LNG'],
                                "L_ALARM": data['DATA'][0]['ITEMS'][L]['L_ALARM'],
                                "MEASURE": data['DATA'][0]['ITEMS'][L]['MEASURE'],
                                "STATION_ID": data['DATA'][0]['STATION_ID'],
                                "STATION_TYPE": data['DATA'][0]['ITEMS'][L]['STATION_TYPE'],
                                "TAG_ID": data['DATA'][0]['ITEMS'][L]['TAG_ID'],
                                "UNIT": data['DATA'][0]['ITEMS'][L]['UNIT'],
                                "USE_STDEV": data['DATA'][0]['ITEMS'][L]['USE_STDEV'],
                                "VALUE": data['DATA'][0]['ITEMS'][L]['VALUE'],
                                "VALUE_YESTERDAY": data['DATA'][0]['ITEMS'][L]['VALUE_YESTERDAY']
                            };
                            importantTemplate_.push(obj);
                        }
                        data = importantTemplate_;
                    } else {}
                }
                if ($("#left_nav1 ul li:nth-child(2)").hasClass('active')) {
                    if ($(".importantsitecontroll").hasClass('active')) {
                        console.log("高程供水");
                    }
                }
            } else {
                console.log("驅動搜尋功能");
            }
            console.log(data);
            if (data == '') {
                $("#grid-data").before("<h7 id='infoEmpty' class='animated infinite flash' style='color:red;'>尚無搜尋到相關即時値</h7>");
            } else {
                $('#grid-data').before('<div id="spinner_" style="margin:0 auto; width: 0%;"><i  class="fa fa-spinner fa-pulse fa-4x fa-fw" style="color: #33b9ff; font-size: 70px; margin:0 auto; width: auto;"></i></div>');
            }
            $("#grid-data").empty();
            $("#grid-data").kendoGrid({
                excel: {
                    filterable: true
                },
                dataSource: {
                  data:data,
                  pageSize: 10,
                },                
                height: 550,
                groupable: true,
                sortable: true,
                resizable: true,
                pageable: true,
                noRecords: {
                  template: "<h6 class='animated flash infinite' style='color:red'>目前尚無資料</h6>"
                },
                pageable: {        
                  pageSizes: true,
                  refresh: true,
                  numeric: true,
                  input: true,
                  previousNext: true,
                  buttonCount: 10,
                  info: true,
                  alwaysVisible:true,
                  messages: {
                    page: "10",
                    itemsPerPage: "",
                    first: "首頁",
                    last: "末頁",
                    previous: "上一頁",
                    next: "下一頁",
                    refresh: "刷新",
                  }        
                },
                groupable: {
                  messages: {
                    empty: "拖曳至此以群組顯示"
                  }
                },
                //origin columns form
                columns: [
                    {
                        field: "DATE_TIME",
                        title: "日期時間",
                        filterable: false,
                        headerAttributes: {
                            "class": "table-header-cell",
                            style: "background-color: #868794; color: white;"
                        },
                        template: function(data) {
                            var newTime = timeDashToSlash(data.DATE_TIME);
                            return newTime;
                        },
                        attributes: {
                            "class": "table-cell",
                            style: "font-size: 12px; background-color: rgb(51, 185, 255); color: white"
                        }
                    },
                    {
                        field: "DESC",
                        title: "測站項目",
                        filterable: false,
                        headerAttributes: {
                            "class": "table-header-cell",
                            style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                        },
                        attributes: {
                            "class": "table-cell",
                            style: " text-align: center; font-size: 12px;"
                        }
                    },
                    {
                        field: "MEASURE",
                        title: "物理量",
                        headerAttributes: {
                            "class": "table-header-cell",
                            style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                        },
                        attributes: {
                            "class": "table-cell",
                            style: " text-align: center; font-size: 12px;"
                        }
                    },
                    {
                        field: "VALUE",
                        title: "今日測値",
                        filterable: false,
                        headerAttributes: {
                            "class": "table-header-cell",
                            style: "text-align: center; font-size: 12px;"
                        },
                        attributes: {
                            "class": "table-cell",
                            style: "text-align: center; font-size: 12px;"
                        },
                        template: function(data) {
                            var value_ = digitsControll(data.VALUE, 2);
                            return value_;
                        },
                    },
                    //          {
                    //            field: "FLAG",
                    //            title: "供確認",
                    //            filterable: false,
                    //            headerAttributes: {
                    //              "class": "table-header-cell",
                    //              style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                    //            },
                    //            attributes: {
                    //              "class": "table-cell",
                    //              style: "text-align: center; font-size: 12px;"
                    //            }
                    //                  },

                    {
                        field: "UNIT",
                        title: "單位",
                        filterable: false,
                        headerAttributes: {
                            "class": "table-header-cell",
                            style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                        },
                        template: function(data) {
                            if (textSupFilter(data.UNIT)) {
                                var stringArray = data.UNIT.split('');
                                stringArray[stringArray.length - 1] = String(stringArray[stringArray.length - 1]).sup();
                                var supProccessedString = stringArray.join('');
                                //console.log(supProccessedString);
                                return supProccessedString;
                            } else
                                return data.UNIT.toUpperCase();
                        },
                        attributes: {
                            "class": "table-cell",
                            style: " text-align: center; font-size: 12px;"
                        }
                        //       attributes: {
                        //   "class": "table-cell",
                        //   style: "font-size: 14px; background-color: #073469;"
                        // }
                        // hidden: true,
                        // media: "(min-width: 768px)"
                    },
                    {
                        field: "STATION_ID",
                        template: "<div><a target='_blank' href='./lineChart.php?status=" + status + "&stationID=#: STATION_ID #&tagID=#: TAG_ID # &item=" + item_info + "&measure=#: MEASURE # &itemName=#: ITEM_NAME #'><div style='width: 60px; height: 30px; background-color: white; margin: auto; border-radius: 20px'><img src='./images/icons/chart-icon.png' style='width:100%; position: relative; top: 5px;'></div></a></div>",
                        title: "趨勢圖",
                        filterable: false,
                        headerAttributes: {
                            "class": "table-header-cell",
                            style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                        },
                        attributes: {
                            "class": "table-cell",
                            style: "text-align: center; font-size: 12px;"
                        }
                        //       attributes: {
                        //   "class": "table-cell",
                        //   style: "font-size: 14px; background-color: #073469;"
                        // }
                        // hidden: true,
                        // media: "(min-width: 768px)"
                    },
                    {
                        field: "TAG_ID",
                        template: "<div><a target='_blank' href='./historyData.php?status=" + status + "&stationID=#: STATION_ID #&tagID=#: TAG_ID # &item=" + item_info + "&measure=#: MEASURE # &itemName=#: ITEM_NAME #'><div style='width: 60px; height: 30px; background-color: white;  margin: auto; border-radius: 20px'><img src='./images/icons/history-icon.png' style='width:100%; position: relative; top: 5px;'></div></a></div>",
                        title: "歷史資料",
                        filterable: false,
                        headerAttributes: {
                            "class": "table-header-cell",
                            style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                        },
                        attributes: {
                            "class": "table-cell",
                            style: "text-align: center; font-size: 12px;"
                        }
                    },
                ],
                dataBound: function(e) {
                    var rows = e.sender.tbody.children();
                    for (var j = 0; j < rows.length; j++) {
                        var row = $(rows[j]);
                        var dataItem = e.sender.dataItem(row);
                        var flag = dataItem.get("FLAG");
                        var color = backgroundColorClassController(flag)
                        row.addClass(color);
                    }
                }
            })
            infoWindowAlarm(data);
            $('#spinner_').remove();
        }
    };
    xhttp.open("GET", dataQueryUrl, true);
    xhttp.send();
}

//資訊視窗 / 警報值
function infoWindowAlarm(data) {
    $("#gridalarm .k-grid-content").remove();
    $('#showEmpty').remove();
    $('#gridalarm').append('<div id="spinner_" style="margin:0 auto; width: 0%;"><i  class="fa fa-spinner fa-pulse fa-4x fa-fw" style="color: #33b9ff; font-size: 70px; margin:0 auto; width: auto;"></i></div>');
    //console.log(data);
    if (data.length > 0) {
        $("#gridalarm").empty();
        $("#gridalarm").kendoGrid({
            excel: {
                filterable: true
            },
            height: 550,
            dataSource: {data: data,
                        pageSize: 10,
            }, 
            pageable: {        
              pageSizes: true,
              refresh: true,
              numeric: true,
              input: true,
              previousNext: true,

              buttonCount: 10,
              info: true,
              alwaysVisible:true,
              messages: {
                page: "10",
                itemsPerPage: "",
                first: "首頁",
                last: "末頁",
                previous: "上一頁",
                next: "下一頁",
                refresh: "刷新",
              }        
            },
            columns: [
                {
                    field: "DATE_TIME",
                    title: "日期時間",
                    headerAttributes: {
                        "class": "table-header-cell",
                        style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                    },
                    attributes: {
                        "class": "table-cell",
                        style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                    }
                },
                {
                    field: "STATION_ID",
                    title: "測站名稱",
                    headerAttributes: {
                        "class": "table-header-cell",
                        style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                    },
                    attributes: {
                        "class": "table-cell",
                        style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                    }
                },
                {
                    field: "MEASURE",
                    title: "物理量",
                    headerAttributes: {
                        "class": "table-header-cell",
                        style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                    },
                    attributes: {
                        "class": "table-cell",
                        style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                    }
                },
                {
                    field: "DESC",
                    title: "測站項目",
                    headerAttributes: {
                        "class": "table-header-cell",
                        style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                    },
                    attributes: {
                        "class": "table-cell",
                        style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                    }
                },
                {
                    field: "VALUE",
                    title: "測值",
                    template: "#= (VALUE == null) ? '尚無資料' : VALUE #",
                    headerAttributes: {
                        "class": "table-header-cell",
                        style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                    },
                    attributes: {
                        "class": "table-cell",
                        style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                    }
                },
                {
                    field: "FLAG",
                    title: "警報訊息",
                    headerAttributes: {
                        "class": "table-header-cell",
                        style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                    },
                    attributes: {
                        "class": "table-cell",
                        style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                    },
                    template: function(data) {
                        var flag = data.FLAG;
                        switch (flag) {
                            case "N":
                                return "正常"
                                break;
                            case ">":
                                return "高警報"
                                break;
                            case "<":
                                return "低警報"
                                break;
                            case ">>":
                                return "高高警報"
                                break;
                            case "<<":
                                return "低低警報"
                                break;
                            case "?":
                                return "斷訊"
                                break;
                            default:
                                break;
                        }
                    },
                },
                {
                    field: "HH_ALARM",
                    title: "高高警報",
                    headerAttributes: {
                        "class": "table-header-cell",
                        style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                    },
                    attributes: {
                        "class": "table-cell",
                        style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                    }
                },
                {
                    field: "H_ALARM",
                    title: "高警報值",
                    headerAttributes: {
                        "class": "table-header-cell",
                        style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                    },
                    attributes: {
                        "class": "table-cell",
                        style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                    }
                },
                {
                    field: "LL_ALARM",
                    title: "低低警報值",
                    headerAttributes: {
                        "class": "table-header-cell",
                        style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                    },
                    attributes: {
                        "class": "table-cell",
                        style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                    }
                },
                {
                    field: "L_ALARM",
                    title: "低警報值",
                    headerAttributes: {
                        "class": "table-header-cell",
                        style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                    },
                    attributes: {
                        "class": "table-cell",
                        style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                    }
                },
                {
                    field: "USE_STDEV",
                    title: "標準差",
                    headerAttributes: {
                        "class": "table-header-cell",
                        style: "background-color: #868794; color: white; text-align: center; font-size: 12px;"
                    },
                    attributes: {
                        "class": "table-cell",
                        style: "background-color: rgb(7, 52, 105); color: white; text-align: center; font-size: 12px;"
                    },
                    template: function(data) {
                        var checkmarksrc = "./images/icons/tick_03.png";
                        var use_stdev = data.USE_STDEV;
                        if (use_stdev == 0) {
                            return "";
                        } else {
                            return "<div><img src=" + checkmarksrc + "></div>";
                        }
                    }
                },
            ],
            dataBound: function(e) {
                var rows = e.sender.tbody.children();
                for (var j = 0; j < rows.length; j++) {
                    var row = $(rows[j]);
                    var dataItem = e.sender.dataItem(row);
                    var flag = dataItem.get("FLAG");
                    var color = backgroundColorClassController(flag)
                    row.addClass(color);
                }
            }
        })
    } else {
        $('#spinner_').remove();
        $("#gridalarm").append("<h7 id='showEmpty' class='animated infinite flash' style='color:red;'>尚無搜尋到相關即時値</h7>");
    }
    $('#spinner_').remove();
    //篩選功能
    document.getElementById('ex2').onkeyup = function() {
        var searchValue = $('#ex2').val();
        // //console.log('SEARCH');
        //Setting the filter of the Grid
        $("#gridalarm").data("kendoGrid").dataSource.filter({

            logic: "or",
            filters: [{
                    field: "DESC",
                    operator: "contains",
                    value: searchValue
                },

            ]
        });
    };
}
var singleMarker = "";
//資訊視窗 / 貼上物理量icon
function searchMarkerControll(stationId) {

    fullScreenBlocker("資料載入中 。。。");
    physicMessageBoxNamesCloseAndClean();
    //console.log("click");
    var dataUrl = "http://220.134.42.63:8080/waterscadaAPI/GetStationInfo?station_id=" + stationId + "&measure=*&include_wi=1";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //          移除搜尋的icon
            if (singleMarker != "") {
                singleMarker.setMap(null);
                physicMessageBoxNamesCloseAndClean();
            }
            var data = JSON.parse(this.response);
            //console.log(data);
            var point = coordinateConverter(data[0]['LAT'], data[0]["LNG"]);
            var pointDeviated = coordinateConverter(data[0]['LAT'], data[0]["LNG"], deviation);
            pMap.setZoom(10);
            var imgUrl = stationType[data[0]['STATION_TYPE']];
            //console.log(imgUrl);

            var imgUrlStringArray = imgUrl.split('');
            var imgUrlTargetStringArray = imgUrlStringArray.splice(imgUrl.length - 8, 4);
            var imgWidth = (imgUrlTargetStringArray[0] + imgUrlTargetStringArray[1]) * 0.7;
            var imgHeight = (imgUrlTargetStringArray[2] + imgUrlTargetStringArray[3]) * 0.7;
            var markerImg = new TGOS.TGImage(imgUrl, new TGOS.TGSize(imgWidth, imgHeight), new TGOS.TGPoint(0, 0), new TGOS.TGPoint(10, 33)); //設定標記點圖片及尺寸大小
            var pTGMarker = new TGOS.TGMarker(pMap, point, '', markerImg, {
                flat: false
            });
            //put station_id on the marker(icon) icon for search function 
            document.getElementById('InfoWin').value = stationId;
            pTGMarker['STATION_ID'] = stationId;
            TGOS.TGEvent.addListener(pTGMarker, "click", function(pTGMarker) {
                return function() {
                    // document.getElementById('InfoWin').value = stationId;
                    infoWindowControll(pTGMarker["STATION_ID"], false);
                };
            }(pTGMarker));
            singleMarker = pTGMarker;
            pMap.setCenter(pointDeviated);

            var physicInfoWindowOptions = {
                maxWidth: 100,
                zIndex: 2,
                pixelOffset: new TGOS.TGSize(physicNameWindowOffset['X'], physicNameWindowOffset['Y']) //InfoWindow起始位置的偏移量, 使用TGSize設定, 向右X為正, 向上Y為負 
            };
            physicmMessageBoxNames[0] = new TGOS.TGInfoWindow(data[0]["STATION_ID"], point, physicInfoWindowOptions); //建立訊息視窗
            physicmMessageBoxNames[0].open(pMap, pTGMarker);
            physicMessageBoxNamesAdjuster(physicmMessageBoxNames[0]);
            fullScreenBlockerRemover();
            // return this.response;
        }
    };
    xhttp.open("GET", dataUrl, true);
    xhttp.send();
}

//高程供水系統
function leftItemMenuClick(number) {
    //set initial display on the tgos by click of 快速選單/ 總覽 / 鶯歌服務所 
    document.getElementsByClassName("left_item_menu")[number].firstElementChild.firstElementChild.click();
}

$(".allsitecontrol1").on("click", function(e) {
    if ($(this).hasClass("active")) {} else {
        $(this).addClass("active");
        $(".allsitecontroll").addClass("active");
        $(".importantsitecontroll").removeClass("active");
    }
});
$(".importantsitecontroll").on("click", function(e) {
    if ($(this).hasClass("active")) {} else {
        $(this).addClass("active");
        $(this).children("a").addClass("active");
        $(".allsitecontrol1").removeClass("active");
        $(".allsitecontroll").removeClass("active");
    }
});

//全部/重要場站按鈕
function allSiteControll(target, id) {
    var dataurl;
    RmvMarker()
    physicMessageBoxNamesCloseAndClean()
        // if (!target.classList.contains('active')) {
        //     target.classList.add('active');
        // }
    if (id == 'allsitecontroll') {
        fullScreenBlocker("資料讀取中 。。。");
        document.getElementById('allsitecontroll').classList.add('active');
        document.getElementById('importantSite').classList.remove('active');
    } else { 
        document.getElementById('allsitecontroll').classList.remove('active');
        document.getElementById('importantSite').classList.add('active');
    }
    if (target.classList.contains('active')) {
        allSiteBuilder()
            // target.classList.remove('active');
    } else {
        importantSiteBuilder()
    }
}

//全部 / 重要場站
function importantSiteControll() {
    document.getElementById('importantSite').onclick = function() {

        if (document.getElementById("importantSite").classList.contains('active')) {
            // document.getElementsByClassName("importantSite")[0].classList.remove('active');

            // allSiteControll();
        } else {
            // document.getElementById("importantSite").classList.add('active');

            document.getElementsByClassName("allsitecontroll")[0].classList.remove('active');
            allSiteControll(document.getElementsByClassName("allsitecontroll")[0]);
        }

    };
}
//建立全部場站
function allSiteBuilder() {
    var dataurl;
    if (document.getElementById('Elev_MSR').value != "") {
        dataurl = dataAllSiteUrlComposer();
        JSAJAX(dataurl, true)
    } else {
        fullScreenBlockerRemover()
    }
}
//建立重要場站
function importantSiteBuilder() {
    var dataurl;
    if (document.getElementById('Elev_MSR').value == "") {
        document.getElementById('Elev_ITM').value = 1;
        document.getElementById('Elev_MSR').value = "*";
        dataurl = dataUrlComposer();        
        if (firstload) {
            JSAJAX(dataurl, true);
        } else {
            document.getElementById('Elev_MSR').value = "";
//jackie remove 3/3            houseControll(true, 0);
            fullScreenBlockerRemover()
        }
    } else {
        // document.getElementById('importantSite').classList.remove('active');
        if (document.getElementById('Elev_ITM').value == 1) {
            multipleAjaxSender();
        } else {
            dataurl = dataUrlComposer();
            JSAJAX(dataurl, true);
        }
    }
  fullScreenBlockerRemover();
}

//3階往下沿伸
var Markersonmap = new Array();
var detection;
//new TGOS.TGPoint(0, 0)
function addmarkeronmap(e) { 
  $(e).addClass("testName");
  $("#OMap").on("click",function() {
  
    if($(".options").last().children("div").hasClass("filter-active")) {
      console.log("filter-active"); 
      var imgWidth = "20px";
      var imgHeight = "20px";
      var imageurl= "./images/targetPoint.png";
      if(dist_){
        measureButton.click();
        dist_ = false;
        console.log("remove event");
      }    
      var x = $('.coordinateshower p').eq(1).text();
      var y = $('.coordinateshower p').eq(3).text();
      var pt = new TGOS.TGPoint(x, y);
      var markerImg = new TGOS.TGImage(imageurl, new TGOS.TGSize(imgWidth, imgHeight));
      var marker = new TGOS.TGMarker(pMap, pt,'',markerImg);
      Markersonmap.push(marker);
    }
    else {
      $("#OMap").off("click");
      dist_ = true;
      console.log("none filter-active");
    }
 });
}

function rmovemarkeronmap() {
    for (var i = 0; i < Markersonmap.length; i++) {
        Markersonmap[i].setMap(null);
    }
    removelistenr();
    Markersonmap = [];    
}

function removelistenr() {
    TGOS.TGEvent.removeListener(detection);    
}
importantSiteControll();


//新增白色圖層
var backwms = "";
function addbackwms(tUrl, opacity) {  
  //debugger;
    if (backwms != "") { backwms.setOpacity(opacity); } else {      
      backwms = new TGOS.TGWmsLayer(tUrl, {
          map: pMap,
          preserveViewport: true,
          opacity: opacity,
          zIndex: 0,
          wsVisible: true
      });      
    }   
}
//移除白色圖層
function removebackwms() {
  backwms.removeWmsLayer(); 
  backwms = '';
}
//新增流量計/壓力計按鈕
function actFlowbtn(state) {
  $("."+state).eq(0).toggleClass('show');  
}


//點擊流量計/壓力計功能
var bubbles_ = true;
var temp_state;
var toglefloatleng = "null";
function flowmeter(state){   
  $("."+state).toggleClass('active');
//  if(!$("#footer_label").hasClass('closed')){
  $("#floatLengPh").removeClass("show");
  $("#physicQuantities ."+state).eq(1).toggleClass('show'); 
  $("#footer_label ."+state).toggleClass('show'); 
  var onclicktarget = $('.left_sub_menu').children('li.active').find("input[id^=Elev_ITM_]").attr('id');
  $('#'+onclicktarget).click();
  
  $(".state").removeClass('show');
  if (!($("#physicQuantities .water").hasClass("active")) && !($("#physicQuantities .pressure").hasClass("active")))
    $(".state").addClass("show");
//    var temp_id = $("."+state).closest("div").children('a').attr("id");
//    $('head').append("<style>.pressure::before{ content:'O' }</style>");
  if(toglefloatleng == "active") {
    $("#floatLengMt").addClass("show");    
    if ($("#physicQuantities .water").hasClass("active")) {
      $("#flowMeter").addClass("show");
//      getdeviceType(labelInFoForPMFM,'water');
    } else {
      $("#flowMeter").removeClass("show");
    }
    if ($("#physicQuantities .pressure").hasClass("active")) {
      $("#pressureMeter").addClass("show");
//      getdeviceType(labelInFoForPMFM,'pressure');
    } else {
      $("#pressureMeter").removeClass("show");
    }
  };  
//  } else {
//    console.log("closed");
//  }
  if(toglefloatleng == "disable") {}; 
  if(toglefloatleng == "Unactive") {
    bubbles_ = false;
  }; 
}

//右上移動圓形按鈕
function togglefloatLeng(str){
  var ths = $(this);  
  if($(".togglefloatLeng").hasClass(str)){ 
    $(".togglefloatLeng").removeClass("dstuVar_active");
  } else {
    var elevmsr = $("#physicQuantities").children("div").children("a").find("input[data-floatCount-legend]");
    if($("#physicQuantities").children("div.active").children("a").children("input[data-floatCount-legend]").length >0){
      var tog = $(".togglefloatLeng");
      $(".togglefloatLeng").toggleClass("toglefloatleng");
      $(".toggImg").toggleClass("active"); //calc_Y.png      
      (tog.hasClass("toglefloatleng"))? toglefloatleng = "active" : toglefloatleng = "Unactive";
      jugfloatbtn();
      //physicConditionState("physicQuantities");
    } else {
      alert('只有支援水量、水壓、水質，水位...等物理量。\n請選擇任一物理量再進行統計。');      
    }
  }
};
 
function jugfloatbtn(){
  var legend_array = [];
  var floatlegend_array = [];
//  console.log("togglefloatLeng");
  $("#footer_label").children(".state").removeClass("show");
  //flow meter physico quantities
  var elevflowmeter = $("#physicQuantities").children("div.active").children("div.show").find("[name=elev_flow_meter]");    
  if($(elevflowmeter).closest("#physicQuantities").find(".show.active").length >0){
    $("#floatLengMt").addClass("show");
    for(var x=0; x<elevflowmeter.length; x++){
      if($(elevflowmeter).closest("#physicQuantities").find(".show").eq(x).hasClass('active')){
        legend_array.push($(elevflowmeter[x]).attr("data-legend"));
        floatlegend_array.push($(elevflowmeter[x]).attr("data-floatCount-legend"));
        $("#"+$(elevflowmeter[x]).attr("data-floatCount-legend")).toggleClass("show");
      } else {
        $("#"+$(elevflowmeter[x]).attr("data-floatCount-legend")).removeClass("show");
      }
    }   
//    console.log(floatlegend_array); 
    return;
  } else {
    $("#floatLengMt").removeClass("show");
    $("#floatLengPh").find(".square_row.show").removeClass("show");
  }
  //normal physic quantities
debugger;  
  var elevmsr = $("#physicQuantities").children("div").children("a").find("input[data-floatCount-legend]");
  if($("#physicQuantities").children("div.active").children("a").children("input[data-floatCount-legend]").length >0){
    $("#floatLengPh").toggleClass("show");
    for(var x=0; x<elevmsr.length; x++){
      if($(elevmsr).closest("div").eq(x).hasClass("active")){
        var tempId = $(elevmsr[x]).attr("data-floatCount-legend");
        floatlegend_array.push(tempId); 
      } 
    }
//    console.log(temp_var);
    var getvalue = makePhyscValuesToJson(temp_var);
//    console.log(getvalue);
    var jsonD = getCalcPhyscValues("set", getvalue);
//    console.log(jsonD);
//    console.log(floatlegend_array);
    if(toglefloatleng == "Unactive")
      $(".state").addClass("show");
    return;
  } else {
    $("#floatLengMt").removeClass("show");
    $("#floatLengPh").children(".square_row.show").removeClass("show");
    $("#footer_label").find("ul:first").addClass("show");
  }  
}

function physicConditionState(ths) {
  debugger;
  if (!(bubbles_)){ bubbles_ = true; return;}
  var act_phy = $(ths).find(".active").not("div:first");
  var en_water = $("#physicQuantities .water").hasClass("active");
  var en_pressure = $("#physicQuantities .pressure").hasClass("active");
  if ((act_phy.length > 0) && (toglefloatleng == "active")){
    if (en_water || en_pressure)
      $("#floatLengPh").removeClass("show");
    else {
      $("#floatLengPh").addClass("show");
      $("#footer_label .state").removeClass("show");
    }
  } else if((toglefloatleng == "Unactive") && (!(en_water || en_pressure)))
    $("#footer_label .state").addClass("show"); 
  else {
    var xx_ = $(ths).find(".active").length;
    if ((xx_ == 0) && ($(".toggImg:last").hasClass("active"))) {
      var tog = $(".togglefloatLeng");
      $(".togglefloatLeng").removeClass("toglefloatleng");
      $(".toggImg").toggleClass("active"); //calc_Y.png      
      (tog.hasClass("toglefloatleng"))? toglefloatleng = "active" : toglefloatleng = "Unactive";
      $("#floatLengPh").removeClass("show");
//      jugfloatbtn();
    } 
  }
}

//Output html value to json
// {水位: Array(3), 瞬間流量: Array(3), 累積流量: Array(3), 壓力: Array(3), PH: Array(3), …}
//  水位: Array(3)
//  0: {正常: "dd", HI/LO: "dd", HI2/LO2: "dd"}
//  1: {正常: "dd", HI/LO: "dd", HI2/LO2: "dd"}
//  2: {正常: "dd", HI/LO: "dd", HI2/LO2: "dd"}
//  length: 3
//  __proto__: Array(0)
//  瞬間流量: (3) [{…}, {…}, {…}]
//setORget = keyword of set or get
var setCalcValue_obj = {};
var pattern = '{"水位":{"正常":"10","HI/LO":"10","HI2/LO2":"10"},"瞬間流量":{"正常":"999","HI/LO":"999","HIHI/LO":"999"},"累積流量":{"正常":"999","HI/LO":"999","HI2/LO2":"999"},"壓力":{"正常":"999","HI/LO":"999","HI2/LO2":"999"},"PH":{"正常":"999","HI/LO":"999","HI2/LO2":"999"},"導電度":{"正常":"999","HI/LO":"999","HI2/LO2":"999"},"餘氯":{"正常":"999","HI/LO":"999","HI2/LO2":"999"},"溫度":{"正常":"999","HI/LO":"999","HI2/LO2":"999"},"濁度":{"正常":"999","HI/LO":"999","HI2/LO2":"999"}}';
function subCalc(total, num) {
  return parseInt(total) + parseInt(num);
}
//判斷物件是否為空
function isEmptyObject(obj) {   
　　for (var key in obj){
　　　　return false;//返回false，不為空物件
　　}　　
　　return true;//返回true，為空物件
}
function hidenUnusingFloatleng (json) {
  debugger;
  var orgical = [], map = [];
  var physic = $("#floatLengPh").children(".power").bind();
  if(json !=""){
    var json_ = JSON.parse(json);
    $.each(json_, function(i,v){
      orgical.push(i.split("_")[0]);
    });
  }
  $(physic).addClass("hiden");
  for(var x=0; x<physic.length; x++){
    var z = $(physic[x]).children("div:nth-of-type(1)").children('span').text().toString();
    var c = orgical.indexOf(z);
    if(c > -1)
      $(physic).eq(x).removeClass("hiden");    
  }
}
//統計物理量
$("#floatLengPh .content div, #floatLengPh .bottom, #pressureMeter .box1, #flowMeter .box1").on('click', function(e){  
  $(".mobile_mask").css({"display": 'block'}).append('<i class="fa fa-spinner fa-pulse fa-4x fa-fw" style="position: relative;color: #33b9ff; font-size: 70px;left: 50%;top: 50%;"></i>');
//  console.log($(e).bind());
//  debugger;
  var dataSource_ = [], columns_ = [];
  var measuretitle, flagtitle;
  var replaceFlag = {'N': '正常', '<': 'LO', '>': 'HI', '<<':'LO2','>>':'HI2', '?':'斷線'};
//  return;
  //壓力計/流量計合計
  if($(this).closest("#flowMeter").length >0 || $(this).closest("#pressureMeter").length >0){
    var target = $(this).find('img').attr('alt');
    flagtitle = $(this).find('img').attr('data-typ');
    
    dataSource_ = makeDeviceTypeToJson(temp_var, target);
    columns_= [ 
        {
                field: "DATE_TIME",
                width: 120,
                title: "日期"
            } , {
                field: "STATION_ID",
                width: 120,
                title: "場站名稱"
            } , {
                field: "ITEM_NAME",
                width: 120,
                title: "物理量"
            } , {
                field: "PFM_TYPE",
                width: 120,
                title: "設備種類"
            }
        ];
    measuretitle = '設備種類';
    flagtitle = target;
    
  } else {
    var getvalue = makePhyscValuesToJson(temp_var);
    
    var json_ = JSON.parse(getvalue);
    var FLAG,DATE_TIME,VALUE,UNIT,STATION_ID,MEASURE;

//    columns_=[];
    $("#template_dummy").children().remove();
    $( "#template_dummy" ).dialog( "option", "width", 400 );
    $( "#template_dummy" ).dialog( "option", "height", 200 );
    $( "#template_dummy" ).dialog( "option", "resizable", true );
    $( "#template_dummy" ).dialog( "option", "show", { effect: "blind", duration: 700 } );
//    ui-dialog ui-corner-all ui-widget ui-widget-content ui-front ui-draggable ui-resizable
    
  //  console.log(getvalue);
    //總覽合計
    if($(this).hasClass("bottom")){
      var measlabel = $(this).closest(".power").attr("data-count-unit");
      var _array_ = [];
      flagtitle = "總覽";
      $.each(json_, function(key,value_){
        var key = key.split("_")[0];
        if(measlabel == key){
          measuretitle = key;
          $.each(value_, function(k1, v1){
            dataSource_.push(v1);  
          });
        }      
      });
      
      columns_= [ 
        {
            field: "DATE_TIME",
            width: 120,
            title: "日期"
        } , {
            field: "STATION_ID",
            width: 120,
            title: "場站名稱"
        } , {
            field: "MEASURE",
            width: 120,
            title: "物理量"
        } , {
            field: "VALUE",
            width: 120,
            title: "數值"
        } , {
            field: "UNIT",
            width: 120,
            title: "單位"
        } , {
            field: "CH_FLG",
            width: 120,
            title: "狀態"
        }
    ];
      console.log(dataSource_);
    } else {  
      //物理量合計
      dataSource_ = [];
      var measlabel = $(this).closest(".power").attr("data-count-unit");
      var jugflag = $(this).children("b").text();
      flagtitle = jugflag;
      $.each(json_, function(key,value_){
        var key_1 = key.split("_")[0];
        var key_2 = key.split("_")[1];
        if(measlabel == key_1){
          measuretitle = key_1;
          if(jugflag == key_2) {
            
            $.each(value_, function(k1, v1){
              dataSource_.push(v1);  
            });            
          }
        }      
      });
      columns_= [ 
        {
                field: "DATE_TIME",
                width: 120,
                title: "日期"
            } , {
                field: "STATION_ID",
                width: 120,
                title: "場站名稱"
            } , {
                field: "MEASURE",
                width: 120,
                title: "物理量"
            } , {
                field: "VALUE",
                width: 120,
                title: "數值"
            } , {
                field: "UNIT",
                width: 120,
                title: "單位"
            }
        ];
      console.log(dataSource_);
    }
  }
  var savefileName = "狀態:"+measuretitle+".xlsx";  
  if(isEmptyObject(dataSource_[0]))    
    $("#template_dummy").append("<h6 class='animated flash infinite' style='color:red'>目前尚無資料</h6>");
  else {
    var wdth=$(window).width()*0.8;
    var hight=$(window).height()*0.7;
    $( "#template_dummy" ).dialog( "option", "width", wdth );
    $( "#template_dummy" ).dialog( "option", "height", hight );
    var template = kendo.template($("#legend_grid_template").html());
    $("#template_dummy").html(template({})); 
    var grid = $("#legend_grid").data("kendoGrid");
  }
  
  $("#legend_grid").empty();
  $("#legend_grid").kendoGrid({
      dataSource: {
          data: dataSource_,
          pageSize: 15,
      },
      columns: columns_,
      height: hight - 70,
      groupable: { 
        messages: {empty: "拖曳至此以群組顯示"  } 
      },    
      pageable: {        
              pageSizes: true,
              refresh: true,
              numeric: true,
              input: true,
              previousNext: true,

              buttonCount: 10,
              info: true,
              alwaysVisible:true,
              messages: {
                page: "10",
                itemsPerPage: "",
                first: "首頁",
                last: "末頁",
                previous: "上一頁",
                next: "下一頁",
                refresh: "刷新",
              }        
            }, 
      persistSelection: false, 
      scrollable: { virtual: false },
      filterable: { extra: true, mode: "menu",
        messages: { info: "", and: "且", or: "或", filter: "篩選", clear: "清除" },          
      },
      columnMenu: { 
        messages: { columns: "欄位", filter: "篩選", sortAscending: "排序 (小->大)", sortDescending: "排序 (大->小)", }
      },
      pageable: { 
        refresh: true,  pageSizes: 6,  buttonCount: 5,  input: true,  numeric: false,
        messages: { page: "", itemsPerPage: "", first: "首頁", last: "末頁", previous: "上一頁", next: "下一頁", refresh: "刷新", }
      },
      toolbar: ["excel"],
      excel: {
          fileName: savefileName,
          filterable: true
      }, 
      noRecords: {
//        template: "No data available on current page. Current page is: #=this.dataSource.page()#"
        template: "<h6 class='animated flash infinite' style='color:red'>目前尚無資料</h6>"
      },
      dataBound: function(e){
          var rows = e.sender.tbody.children();
          for (var j = 0; j < rows.length; j++) {
              var row = $(rows[j]);
              var dataItem = e.sender.dataItem(row);
              var flag = dataItem.get("FLAG");
              var color = backgroundColorClassController(flag)
              row.addClass(color);
//              this.tbody.find(">td:not(.k-grouping-row)").eq(3).css({color: 'red'});
              this.tbody.children("tr").find("td:first").css({'background': 'rgb(51, 185, 255)'});
              this.tbody.children("tr").find("td").css({'text-align': 'center'});
              this.thead.children("tr").find("th").css({'text-align': 'center'});
          }
      }
  });
  if ($("#legend_grid").length > 0) {
    var grid = $("#legend_grid").data("kendoGrid");
    grid.refresh();    
  }
  $( "#template_dummy" ).dialog( "option", "title", measuretitle+" 狀態: "+flagtitle );
  $( "#template_dummy" ).dialog( "open" );
  $( "#template_dummy" ).dialog( "option", "hide", { effect: "explode", duration: 800, } );  
  $(".ui-widget-overlay").css({background: 'rgba(0, 0, 0,1)', opacity: 0.7, zIndex: 317});
  $(".fa-spinner").remove();$(".mobile_mask").css({"display": 'none'});
  
});

function getCalcPhyscValues(setORget, json){  
  if(setORget == "get") {
    var tg = $("#floatLengPh").children(".power");
    var temp1= [];
    for(var x=0; x<tg.length; x++){
      var key_ = $(tg[x]).attr("data-count-unit").toString();
      var calcJuge_obj = {};
      var temp = [];
      var cont = $(tg[x]).children(".content").children('div');    
      for(var y=0; y<cont.length; y++){            
        var key_2 = $(cont[y]).find("b").text().toString();
        if(setORget == "get") {
          calcJuge_obj[key_2] = $(cont).find("span").eq(y).text().toString();        
        }
      }
      setCalcValue_obj[key_] = calcJuge_obj;
    }
//    console.log(setCalcValue_obj); 
    return JSON.stringify(setCalcValue_obj); 
  }
  if(setORget == "set"){
    hidenUnusingFloatleng(json);
    var k2=[],d2=[];
    var k1='',k1_2='',d1=[];
    var json_ = JSON.parse(json);
    console.log(json_);
    $.each(json_, function(k, v){
      var labHead = k.split("_")[0];
      var labFlag = k.split("_")[1];
      var _count_ = $("#floatLengPh").find(".power");
      var titleCount = [];
      for(var x=0; x<_count_.length; x++) {
        var _labHead_ = $(_count_).eq(x).attr('data-count-unit');
        if(_labHead_ == labHead) {
          var _flag_ = $(_count_).eq(x).children(".content").find('b');
          var _value_ = $(_count_).eq(x).children(".content").find('span');
          for(var y=0; y<_flag_.length; y++) {
            if($(_flag_[y]).text() == labFlag){
              $(_value_[y]).text(v[0]["Count"]);
            }
            titleCount.push($(_value_[y]).text());
          }
          if(y == _flag_.length) {
            var x2 = titleCount.reduce(subCalc);
            console.log(x2);
            $(_count_).eq(x).children('div:last').text(x2);
          }
        }
      } 
    });
    
    
//    $.each(json_, function(i,v){
//      k1 = i.split('_')[0];
//      k1_2 = i.split('_')[1];
//      $.each(v, function(i,v){
//          k2.push(i); d2.push(v);
//      });
//      console.log(k2);
//      console.log(d2);
//      var physic = $("#floatLengPh").children(".power").bind();
//      var leng_val = [];
//      for(var x=0; x<physic.length; x++){
//        var map = $(physic[x]).children("div:nth-of-type(1)").children('span').text().toString();
//        if(map == k1) {
//          $(".power").eq(x).removeClass("hiden");
//          for(var y=0; y<k2.length; y++){
//          leng_val.length = 0;
////                $(physic[x]).children("div:nth-of-type(2)").children('div').eq(y).find("b").text(k2[y]);
////            $(physic[x]).children("div:nth-of-type(2)").children('div').eq(y).find("span").text(d2[y]);
//            var leng_lable = $(physic[x]).children("div:nth-of-type(2)").children('div');
//            for(var il=0; il<leng_lable.length; il++) { 
//              var temp = leng_lable.eq(il).find("b").text();
//              if(temp == k2[y]){
//                console.log(d2[y]);
//                $(leng_lable).eq(il).find("span").text(d2[y]);   
//              }
//              leng_val.push($(leng_lable).eq(il).find("span").text());
//              
//              if(il == leng_lable.length-1)
//                $(physic[x]).children("div:nth-of-type(3)").text(leng_val.reduce(subCalc));
//            }
//          }
////          //刪除d2陣列內從4以後刪除
////          d2.splice(4);
////          //d2陣列內容合計          
////          $(physic[x]).children("div:nth-of-type(3)").text(d2.reduce(subCalc));
//          k2=[]; d2=[];
//          return;
//        } 
//      }
//    });
  }
}

//var jsonD = getCalcPhyscValues("set", pattern);

//change mark for symbol to string
//var aftMark = ['正常','HI/LO','HI2/LO2','斷線']; 
//var befMark = ['N',"<>","<<>>","?"];
var replaceString = {'N': '正常', '<': 'HI/LO', '>': 'HI/LO', '<<':'HI2/LO2','>>':'HI2/LO2', '?':'斷線'};

//function changeMark(symbol_) {
//  var mark;
//  if(symbol_ == "N") mark = aftMark[0];
//  if(symbol_ == "<>") mark = aftMark[1];
//  if(symbol_ == "<<>>") mark = aftMark[2];    
//  if(symbol_ == "?") mark = aftMark[3];
//  return mark;
//}

function replaceMark(str, roule) {
  var roule = Object.entries(roule); //key=>roule[0], value=>roule[1]
  var newstr;
  for (let [key, value] of Object.entries(roule)) {
//      newstr = str.replace(value[0], value[1]);
    if(str.indexOf("_") > -1){
     if(str.split("_")[1] == value[0])
      newstr = str.split("_")[0]+"_"+value[1];      
    } else {
      if(str == value[0])
        newstr = value[1];
    }
  }
  return newstr;
}

function makePhyscValuesToJson(jsonD){
  var makeJsonD = {};  
  //重要場站 + 全部場站
  var obj = [];
  var str = [];
  for(var x=0; x<jsonD["DATA"].length; x++) {
    var temp2 = jsonD["DATA"][x]["ITEMS"];
    for(var y=0; y<temp2.length; y++) {
//      str.push(temp2[y]["MEASURE"]+"_"+temp2[y]["FLAG"]);
      str.push(temp2[y]["MEASURE"]+"_"+temp2[y]["FLAG"]+"@"+temp2[y]["DATE_TIME"]+"@"+jsonD["DATA"][x]["STATION_ID"]+"@"+temp2[y]["VALUE"]+"@"+temp2[y]["UNIT"]+"@"+temp2[y]["FLAG"]+"@"+temp2[y]["MEASURE"]);
    }
  }  
  
  var sortmsr = str.sort();
//  sortmsr = ["壓力_<<@2020/06/05 17:34:00@三興加壓站@0.44@kgf/cm2@<<@壓力", 
//             "壓力_<<@2020/06/05 17:34:00@浮洲橋1500監控站@1.16@kgf/cm2@<<@壓力", 
//             "壓力_<<@2020/06/05 17:34:00@浮洲橋1500監測站@0.58@kgf/cm2@<<@壓力", 
//             "壓力_<<@2020/06/05 17:34:00@獅子城一加壓站@1.24@kgf/cm2@<<@壓力", 
//             "壓力_<<@2020/06/05 17:34:00@迴龍一加壓站@0.88@kgf/cm2@<<@壓力", 
//             "壓力_<@2020/06/05 17:34:00@宏慶街400監測站@1.24@kgf/cm2@<@壓力", 
//             "壓力_>>@2020/06/05 17:34:00@三興加壓站@7.47@kgf/cm2@>>@壓力", 
//             "壓力_>>@2020/06/05 17:34:00@新樹路1000監測站@1.72@kgf/cm2@>>@壓力", 
//             "壓力_>>@2020/06/05 17:34:00@獅子城二加壓站@0.60@kgf/cm2@>>@壓力", 
//             "壓力_>@2020/06/05 17:34:00@獅子城一加壓站@8.44@kgf/cm2@>@壓力", 
//             "壓力_N@2020/06/05 17:34:00@信和加壓站@8.44@kgf/cm2@N@壓力", 
//             "壓力_N@2020/06/05 17:34:00@備內加壓站@1.13@kgf/cm2@N@壓力", 
//             "壓力_N@2020/06/05 17:34:00@備內加壓站@1.22@kgf/cm2@N@壓力", 
//             "壓力_N@2020/06/05 17:34:00@南亞監測站@1.11@kgf/cm2@N@壓力", 
//             "壓力_N@2020/06/05 17:34:00@大慶一加壓站@0.22@kgf/cm2@N@壓力",
//             "壓力_N@2020/06/05 17:34:00@大慶一加壓站@5.27@kgf/cm2@N@壓力", 
//             "壓力_N@2020/06/05 17:34:00@樹林服務所監測站@1.93@kgf/cm2@N@壓力", 
//             "壓力_N@2020/06/05 17:34:00@民和一加壓站@4.82@kgf/cm2@N@壓力", 
//             "壓力_N@2020/06/05 17:34:00@民和二加壓站@5.53@kgf/cm2@N@壓力", 
//             "壓力_N@2020/06/05 17:34:00@浮洲橋1200監控站@0.00@kgf/cm2@N@壓力", 
//             "壓力_N@2020/06/05 17:34:00@浮洲橋1200監測站@0.00@kgf/cm2@N@壓力",
//             "壓力_N@2020/06/05 17:34:00@獅子城二加壓站@4.63@kgf/cm2@N@壓力", 
//             "壓力_N@2020/06/05 17:34:00@迴龍一加壓站@2.79@kgf/cm2@N@壓力", 
//             "壓力_N@2020/06/05 17:34:00@迴龍二加壓站@1.16@kgf/cm2@N@壓力", 
//             "壓力_N@2020/06/05 17:34:00@迴龍二加壓站@3.38@kgf/cm2@N@壓力", 
//             "瞬間流量_>>@2020/06/05 17:34:00@浮洲橋1200監測站@119,232@CMD@>>@瞬間流量", 
//             "瞬間流量_>>@2020/06/05 17:34:00@浮洲橋1200監測站@130,608@CMD@>>@瞬間流量", 
//             "瞬間流量_>@2020/06/05 17:34:00@新樹路1000監測站@55,199@CMD@>@瞬間流量", 
//             "瞬間流量_N@2020/06/05 17:34:00@南亞監測站@0.00@CMD@N@瞬間流量", 
//             "瞬間流量_N@2020/06/05 17:34:00@南亞監測站@0.00@CMD@N@瞬間流量", 
//             "瞬間流量_N@2020/06/05 17:34:00@宏慶街400監測站@150.00@CMD@N@瞬間流量", 
//             "瞬間流量_N@2020/06/05 17:34:00@宏慶街400監測站@350.00@CMD@N@瞬間流量", 
//             "瞬間流量_N@2020/06/05 17:34:00@新樹路1000監測站@52,947@CMD@N@瞬間流量", 
//             "瞬間流量_N@2020/06/05 17:34:00@浮洲橋1500監測站@79,200@CMD@N@瞬間流量", 
//             "瞬間流量_N@2020/06/05 17:34:00@浮洲橋1500監測站@79,200@CMD@N@瞬間流量", 
//             "累積流量_N@2020/06/05 17:34:00@新樹路1000監測站@3,497@M3@N@累積流量", 
//             "累積流量_N@2020/06/05 17:34:00@新樹路1000監測站@5,072@M3@N@累積流量", 
//             "累積流量_N@2020/06/05 17:34:00@新樹路1000監測站@59,046@M3@N@累積流量", 
//             "累積流量_N@2020/06/05 17:34:00@浮洲橋1200監測站@152,535@M3@N@累積流量", 
//             "累積流量_N@2020/06/05 17:34:00@浮洲橋1200監測站@188,535@M3@N@累積流量", 
//             "累積流量_N@2020/06/05 17:34:00@浮洲橋1200監測站@218,070@M3@N@累積流量"];
  //collectionRepeat(str);
  
  var array_ = [], tempstring = [];  
  for(var x=0; x<sortmsr.length; x++){
    array_.push(replaceMark(sortmsr[x].split("@")[0], replaceString));      
    var temp = sortmsr[x].split("@");
    temp.splice(0,1,array_[x]);
    tempstring.push(temp.join('@'));
  } 
  var xTemp = Object.entries(collectionRepeat(array_)); console.log(xTemp); 
  var ms = [], obj = [];  
  for(var y=0; y<xTemp.length; y++){
    ms.push(xTemp[y][0]);
  }
  var dedubed_ms = Array.from( new Set(ms) ); //移除array重複值
  var no, mes, mes_val, sta, oo=[];
  var obj_cont = {}; 
  var _array_ = [];
  for(var y=0; y<dedubed_ms.length; y++){
    var obj_key = dedubed_ms[y];  //"壓力_HI2/LO2"
    for(var x=0; x<tempstring.length; x++) {
      var splitxData = tempstring[x].split("@");
      if(obj_key == splitxData[0]) {
        for(var t=0; t<xTemp.length; t++) {  if(xTemp[t][0] == obj_key) no = xTemp[t][1];}        
        obj_cont["Count"]=no;
        obj_cont["CH_FLG"]=obj_key.split("_")[1];
        obj_cont["DATE_TIME"] = splitxData[1];
        obj_cont['STATION_ID'] = splitxData[2];
        obj_cont['VALUE'] = splitxData[3];
        obj_cont['UNIT'] = splitxData[4];
        obj_cont['FLAG'] = splitxData[5];
        obj_cont['MEASURE'] = splitxData[6];
        _array_.push(obj_cont);
        obj_cont = {};
      }      
    }
    makeJsonD[obj_key]=Object.assign({}, _array_);
    _array_ = [];
  }
  return JSON.stringify(makeJsonD);
}

function makeDeviceTypeToJson(jsonD, searchkey){
  var makeJsonD = {};  
  //重要場站 + 全部場站
  var str = [];
  var type_ = searchkey.split("_")[0];    //PM
  var type_string = searchkey.split("_")[2].split("-")[0];  //板新幹管
  switch(type_){
    case 'FM':
      for(var x=0; x<jsonD["DATA"].length; x++) {
        var idname = jsonD["STATIONS"][x]['STATION_ID'];
        var temp2 = jsonD["DATA"][x]["ITEMS"];
        for(var y=0; y<temp2.length; y++) {
          var obj = {};
          if(temp2[y]['FM_TYPE'] != null){
            if(temp2[y]['FM_TYPE'].indexOf(type_string) != -1){
              obj['DATE_TIME'] = temp2[y]["DATE_TIME"];
              obj['STATION_ID'] = idname;
              obj['ITEM_NAME'] = temp2[y]["ITEM_NAME"];
              obj['PFM_TYPE'] = temp2[y]["FM_TYPE"];
              str.push(obj);
            }
          }
        }
      }
      break;
    case 'PM':
      for(var x=0; x<jsonD["DATA"].length; x++) {
        var idname = jsonD["STATIONS"][x]['STATION_ID'];
        var temp2 = jsonD["DATA"][x]["ITEMS"];
        for(var y=0; y<temp2.length; y++) {
          var obj = {};
          if(temp2[y]['PM_TYPE'] != null){
            if(temp2[y]['PM_TYPE'].indexOf(type_string) != -1){
              obj['DATE_TIME'] = temp2[y]["DATE_TIME"];
              obj['STATION_ID'] = idname;
              obj['ITEM_NAME'] = temp2[y]["ITEM_NAME"];
              obj['PFM_TYPE'] = temp2[y]["PM_TYPE"];
              str.push(obj);
            }
          }
        }
      }
      break;
  }
  return str;
};

var collectionRepeat = function(box, key){
    var counter = {};
    box.forEach(function(x) { 
        counter[x] = (counter[x] || 0) + 1; 
    });
    var val = counter[key];
    if (key === undefined) {
        return counter;
    }
    return (val) === undefined ? 0 : val;
}

function getPFMdeviceCount(labelInFo_){
  var xTemp = Object.entries(collectionRepeat(labelInFo_));        
  var key, val, temp_array=[], obj={};
  console.log(xTemp);
    for(var z=0; z<xTemp.length; z++) {
      if(xTemp[z][0] != "undefined"){ 
        var fileName__ = xTemp[z][0].split("/")[2].replace(".png", '');
        var count__ = xTemp[z][1];
        setPFMdeviceCount(fileName__, count__);  }      
    }
};

function setPFMdeviceCount(mapName, count) {
  if(mapName.indexOf("FM_TYPE") > -1){
    var id_nam = $("#flowMeter");
  }
  if(mapName.indexOf("PM_TYPE") > -1) {
    var id_nam = $("#pressureMeter");
  }
  var img_ = id_nam.find("img");
  for(var x=0; x<img_.length; x++) {
    var lengAlt = $(img_[x]).attr("alt");
    if(mapName == lengAlt)
      $(img_[x]).next('span').text(count);
  }
//  pressureMeter.find("img").length;
};
var FMtype = function (){
  if($(".water").hasClass( 'active'))
    var result = true;
  else 
    var result = false;
  return result;
};

var PMtype = function (){
  if($(".pressure").hasClass( 'active'))
    var result = true;
  else 
    var result = false;
  return result;
};


//當無物理量被點擊時將合計功能關掉
checkfloatIcon();
  
function checkfloatIcon(){
  $('#physicQuantities div').on('change',function(){
    if($("#physicQuantities").children("div").hasClass("active")){}else{
      if($(".toggImg:first").hasClass("active")){} else{
//        bubbles_ = false;
        $(".toggImg.active").click();
//        $(".power").addClass("hiden");              
//        $(".togglefloatLeng").children(".toggImg").toggleClass("active");
      }
    }
  });
}