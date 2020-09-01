//基本圖層-ID與wms定義
var baseLayer = {
  ";土城轄區1205": {
    'id': 'DIS_ITM_4',
    'wmskey': 'Elev_ITM_4',
    'legend': '',
    'useLeg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Tucheng&bbox=291163.5602835865,2758712.4774454506,298675.4977835865,2765432.2274454506&width=768&height=687&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  ";板橋轄區1209": {
    'id': 'DIS_ITM_5',
    'wmskey': 'Elev_ITM_5',
    'legend': '',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Banqiao&bbox=292863.4040335865,2761864.2274454506,299655.57203609165,2770251.4774454506&width=621&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  ";泰山轄區1206": {
    'id': 'DIS_ITM_8',
    'wmskey': 'Elev_ITM_8',
    'legend': '',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Taishan&bbox=288056.7477835865,2769016.2274454506,297522.0915335865,2780475.7274454506&width=634&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  ";新莊轄區1208": {
    'id': 'DIS_ITM_6',
    'wmskey': 'Elev_ITM_6',
    'legend': '',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Xinzhuang&bbox=289420.2087284418,2765299.2274454506,298387.7803280551,2773458.4774454506&width=768&height=698&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  ";樹林轄區1203": {
    'id': 'DIS_ITM_3',
    'wmskey': 'Elev_ITM_3',
    'legend': '',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Shulin&bbox=286503.2477835865,2759475.7274454506,293635.2477835865,2768081.4774454506&width=636&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  ";蘆洲轄區1207": {
    'id': 'DIS_ITM_9',
    'wmskey': 'Elev_ITM_7',
    'legend': '',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Luzhou&bbox=286932.1540335865,2773890.1221998935,299574.4665335865,2784745.2089639166&width=768&height=659&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  ";鶯歌轄區1204": {
    'id': 'DIS_ITM_2',
    'wmskey': 'Elev_ITM_2',
    'legend': '',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Yingge&bbox=281895.2447104211,2742578.4774454506,300249.9665335865,2763897.4774454506&width=661&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "板新集水區範圍": {
    'id': 'DIS_OTH_3',
    'legend': '',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Ban%20Sin_scope&bbox=272110.71299078554,2743568.4297493896,285807.81244606024,2758997.000045486&width=681&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "石門水庫與榮華壩集水區範圍": {
    'id': 'DIS_OTH_1',
    'legend': '',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Shimen_Reservoir_and_Ronghua_Dam&bbox=269516.96449999977,2702381.0942,298543.2256999998,2750300.0000220374&width=465&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "鳶山堰集水區範圍": {
    'id': 'DIS_OTH_2',
    'legend': '',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Yushan%20Weir%20Catchment%20Area%201011&bbox=271423.2327653067,2743572.936712656,285799.7150585754,2759800.222412443&width=680&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "自來水公司服務所位置": {
    'id': '',
    'legend': '',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Service_name&bbox=285474.62273894495,2759724.0373127777,298434.99689948966,2774950.2884320593&width=653&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "淨水廠位置": {
    'id': '',
    'legend': '',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:WaterPlant&bbox=144589.171024621,2257530.49012882,360629.6298103011,2956748.9358171197&width=330&height=768&srs=EPSG:3826&format=image/PNG&TRANSPARENT=true'
  },
  "新莊所管練": {
    'id': '',
    'legend': '',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Xinzhuang%20Pipeline&bbox=290082.689714221,2766286.2559976866,298389.1131280549,2773276.259879431&width=768&height=646&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "管線": {
    'id': '',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=100&height=30&layer=TWW12:pipe_3200',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:pipe_3200&bbox=282264.615724793,2753291.96069239,303043.983718742,2784501.83061531&width=511&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "原水管": {
    'id': 'pipe_original',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=100&height=30&layer=TWW12:pipe_3200',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:pipe_3201&bbox=285940.546592104,2757838.414,292321.395086684,2763714.39403432&width=768&height=707&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "淨水流程": {
    'id': 'pipe_procedure',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=100&height=30&layer=TWW12:pipe_3200',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:pipe_3202&bbox=285545.30070462,2758642.53597242,298346.425265502,2767206.90520966&width=768&height=513&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "100mm(含)以下": {
    'id': 'pipe_100',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=100&height=30&layer=TWW12:pipe_3200',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:pipe_3203&bbox=282264.615724793,2753291.96069239,299069.356376944,2784501.83061531&width=413&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "100mm(含)以上~300mm(含)以下": {
    'id': 'pipe_300',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=100&height=30&layer=TWW12:pipe_3200',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:pipe_3204&bbox=282334.19482512,2753291.96069239,302228.255377594,2784501.83061531&width=489&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "350mm(含)以上": {
    'id': 'pipe_350',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=100&height=30&layer=TWW12:pipe_3200',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:pipe_3205&bbox=282726.579805102,2754342.30455815,303043.983718742,2783556.28627307&width=534&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "用戶管線": {
    'id': 'pipe_user',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=100&height=30&layer=TWW12:pipe_3200',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:eupipe_33&bbox=282387.65625,2754109.25,299143.65625,2782847.0&width=447&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "跨管": {
    'id': 'pipe_pcross',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=30&height=30&legend_options=forceLabels:on&layer=TWW12:pcross',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&version=1.1.0&request=GetMap&layers=TWW12:pcross&bbox=284515.34375,2755362.5,298987.625,2783535.5&width=394&height=768&srs=EPSG:3826&format=image/png&TRANSPAREN'
  },
  "消防管線": {
    'id': '',
    'lengend': '',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:hydrantl_53&bbox=282422.46875,2753837.25,299206.3125,2784318.75&width=422&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "場站": {
    'id': 'stadstu_serv',
    'legend': '',
    'use_leg': false,
    'wmsurl': {
      '淨水場': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:WaterPlant&bbox=144589.171024621,2257530.49012882,360629.6298103011,2956748.9358171197&width=330&height=768&srs=EPSG:3826&format=image/PNG&TRANSPARENT=true',
      '服務所': 'http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Service_name&bbox=285474.62273894495,2759724.0373127777,298434.99689948966,2774950.2884320593&width=653&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
    }
  },
  "場站之淨水廠": {
    'id': 'stadstu_wtp',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=30&height=30&layer=TWW12:station_4101',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:station_2305&bbox=282420.496323016,2753577.95046695,302541.465885481,2783572.39340962&width=515&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "場站之水井": {
    'id': 'stadstu_pw',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=30&height=30&layer=TWW12:station_4101',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:station_2306&bbox=282420.496323016,2753577.95046695,302541.465885481,2783572.39340962&width=515&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "場站之抽水站、取水站": {
    'id': 'stadstu_ps',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=30&height=30&layer=TWW12:station_4101',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:station_2307&bbox=282420.496323016,2753577.95046695,302541.465885481,2783572.39340962&width=515&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "場站之加壓站": {
    'id': 'stadstu_bs',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=30&height=30&layer=TWW12:station_4101',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:station_2302&bbox=282420.496323016,2753577.95046695,302541.465885481,2783572.39340962&width=515&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "場站之配水池": {
    'id': 'stadstu_dr',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=30&height=30&layer=TWW12:station_4101',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:station_2303&bbox=282420.496323016,2753577.95046695,302541.465885481,2783572.39340962&width=515&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "場站之高架水塔": {
    'id': 'stadstu_hpw',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=30&height=30&layer=TWW12:station_4101',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:station_2304&bbox=282420.496323016,2753577.95046695,302541.465885481,2783572.39340962&width=515&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "場站之水壓監測站": {
    'id': 'stadstu_pmrcs',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=30&height=30&layer=TWW12:station_4101',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:station_2300&bbox=282420.496323016,2753577.95046695,302541.465885481,2783572.39340962&width=515&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "場站之水質監測站": {
    'id': 'stadstu_phv',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=30&height=30&layer=TWW12:station_4101',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:station_2301&bbox=282420.496323016,2753577.95046695,302541.465885481,2783572.39340962&width=515&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "場站淨水廠、配水池面資料": {
    'id': '',
    'legend': '',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:stationl_4302&bbox=295294.348367881,2760652.64399299,295310.535961237,2760669.66643583&width=730&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "流量站為監測站一種": {
    'id': '',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=30&height=30&legend_options=forceLabels:on&layer=TWW12:meter_4402',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:meter_4402&bbox=282420.496323016,2753577.95046695,298775.451041667,2783572.39340962&width=418&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "閥類100mm(含)以下": {
    'id': '',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=30&height=30&layer=TWW12:valve_5101',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:valve_5101&bbox=282369.5,2753294.75,302380.5625,2784321.75&width=495&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "閥類300mm以下": {
    'id': '',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=30&height=30&layer=TWW12:valve_5102',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:valve_5102&bbox=282369.5,2753294.75,302380.5625,2784321.75&width=495&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "閥類350mm(含)以上": {
    'id': '',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=30&height=30&layer=TWW12:valve_5103',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:valve_5103&bbox=282369.5,2753294.75,302380.5625,2784321.75&width=495&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "消防栓": {
    'id': 'stadstu_ev',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=30&height=30&layer=TWW12:hydrant_52',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:hydrant_52&bbox=282422.46875,2753505.75,299201.15625,2784318.75&width=418&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "用戶水表": {
    'id': 'stadstu_user',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=30&height=30&legend_options=forceLabels:on&layer=TWW12:eumeter_61',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:eumeter_61&bbox=144589.171024621,2257530.49012882,360629.6298103011,2956748.9358171197&width=330&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "分水鞍": {
    'id': 'stadstu_user',
    'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=30&height=30&legend_options=forceLabels:on&layer=TWW12:saddle',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&version=1.1.0&request=GetMap&layers=TWW12:saddle&bbox=282415.5625,2753547.5,299142.75,2783945.5&width=422&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=false'
  },
  "國土利用調查成果圖": {
    'id': 'nlsc_nlsr',
    'legend': '',
    'use_leg': false,
    'wmsurl': 'https://wms.nlsc.gov.tw/wms?&SERVICE=WMS&VERSION=1.1.1&REQUEST=GetMap&BBOX=144847.277860,2406316.107441,352136.448733,2807602.054796&SRS=EPSG:3826&WIDTH=480&HEIGHT=640&LAYERS=LUIMAP&STYLES=&FORMAT=image/png&DPI=96&MAP_RESOLUTION=96&FORMAT_OPTIONS=dpi:96&TRANSPARENT=TRUE'
  },
  "都市計畫分區圖": {
    'id': 'nlsc_urp',
    'legend': '',
    'use_leg': false,
    'wmsurl': 'http://10.12.144.42:8080/geoserver/UPA/wms?service=WMS&request=GetMap&layers=UPA:ALL_d&bbox=278503.43922897946,2729667.811740391,351643.4500732422,2799149.320055681&width=768&height=729&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "地籍圖": {
    'id': 'nlsc_cm',
    'legend': '',
    'use_leg': false,
    'wmtsurl': 'https://wmts.nlsc.gov.tw/wmts/'

  },
};
//日常報表URL定義
var DayilyReport = {
  "IP": "10.12.1.74:805",
  "A1": "Reg12StationItemManual.aspx",
  "A2": "BanhsinDailyWaterOutputManual.aspx",
  "A3": "DailyWaterOutputItemManual.aspx",
  "A4": "MonthlyInOutWaterVolume.aspx",
  "B1": "Reg12DailyWaterSupply.aspx",
  "B2": "Reg12StationStress.aspx",
  "B3": "BanhsinDailyWaterClean.aspx",
  "B4": "BanhsinStationHandover.aspx",
  "B5": "MonthlyMuddyStatisticManual.aspx",
  "B6": "DailyWaterOutput.aspx",
  "B7": "TyphoneTurbidWaterOutput.aspx",
  "B8": "BanhsinStress.aspx",
  "B9": "WeirWaterLevel.aspx",
  "B10": "BanhsinWaterInfoManual.aspx",
  "B11": "ElectricAnalysisManual.aspx",
  "B12": "YearlySanxiaElectricManual.aspx",
  "B13": "YearlyWeirElectricCompareManual.aspx",
  "B14": "WaterPumpEngineRoomManual.aspx",
  "C1": "PoPumpStation.aspx",
  "C2": "GuangfuSupport.aspx",
  "D1": "StressRecord.aspx",
  "D2": "StationElectric.aspx"
};
var setCCTV = JSON.stringify({
  "CCTVurl": "https://api.vrs.hinet.net/",
  "account": "twater12f",
  "pwd": "twater121qaz",
  "key": "e96eed0fcee1761ea96f11edce6870c2",
  "getauth": "api/v1/token/getauth",
  "live": "api/v1/cam/live",
  "status": "api/v1/cam/status",
  "keepUrlAlive": "api/v1/cam/keep-url-alive"
});
var camAssign = {
  "八仙加壓站": {
    "0": "7649138901",
    "1": "7649138902",
    "2": "7649138903",
    "3": "7649138904"
  },
  "長道坑加壓站": {
    "0": "7622002401",
    "1": "7622002402",
    "2": "7622002403",
    "3": "7622002404"
  },
  "長坑加壓站": {
    "0": "7622002101",
    "1": "7622002102",
    "2": "7622002103",
    "3": "7622002104"
  },
  "長坑口一加壓站": {
    "0": "7622002201",
    "1": "7622002202",
    "2": "7622002203",
    "3": "7622002204"
  },
  "長坑口二加壓站": {
    "0": "7622002301",
    "1": "7622002302",
    "2": "7622002303",
    "3": "7622002304"
  },
  "大堀湖加壓站": {
    "0": "7649139101",
    "1": "7649139102",
    "2": "7649139103",
    "3": "7649139104"
  },
  "觀音山加壓站": {
    "0": "7649139001",
    "1": "7649139002",
    "2": "7649139003",
    "3": "7649139004"
  },
  "長道坑配水池": {
    "0": "7649138801",
    "1": "7649138802",
    "2": "7649138803",
    "3": "7649138804"
  },
  "大慶一加壓站": {
    "0": "7649139201",
    "1": "7649139202",
    "2": "7649139203",
    "3": "7649139204"
  },
  "大慶配水池": {
    "0": "7649139301",
    "1": "7649139302",
    "2": "7649139303",
    "3": "7649139304"
  },
  "民和二配水池": {
    "0": "7649139601",
    "1": "7649139602",
    "2": "7649139603",
    "3": "7649139604"
  },
  "三興配水池": {
    "0": "7649139401",
    "1": "7649139402",
    "2": "7649139403",
    "3": "7649139404"
  },
  "民和一加壓站": {
    "0": "7649139501",
    "1": "7649139502",
    "2": "7649139503",
    "3": "7649139504"
  },
  "民和三配水池": {
    "0": "7576928801",
    "1": "7576928802",
    "2": "7576928803",
    "3": "7576928804"
  },
  "大埔加壓站": {
    "0": "7649094801",
    "1": "7649094802",
    "2": "7649094803",
    "3": "7649094804"
  },
  "國際二加壓站": {
    "0": "7649096901",
    "1": "7649096902",
    "2": "7649096903",
    "3": "7649096904"
  },
  "新市民加壓站": {
    "0": "7649094401",
    "1": "7649094402",
    "2": "7649094403",
    "3": "7649094404"
  },
  "忠義二加壓站": {
    "0": "7649094501",
    "1": "7649094502",
    "2": "7649094503",
    "3": "7649094504"
  },
  "忠義三加壓站": {
    "0": "7649094601",
    "1": "7649094602",
    "2": "7649094603",
    "3": "7649094604"
  },
  "忠義三配水池": {
    "0": "7649094701",
    "1": "7649094702",
    "2": "7649094703",
    "3": "7649094704"
  },
  "鳳鳴加壓站": {
    "0": "7649096801",
    "1": "7649096802",
    "2": "7649096803",
    "3": "7649096804"
  },
  "成浮配水池": {
    "0": "7649094301",
    "1": "7649094302",
    "2": "7649094303",
    "3": "7649094304"
  },
  "凌雲二加壓站": {
    "0": "7622003101",
    "1": "7622003102",
    "2": "7622003103",
    "3": "7622003104"
  },
  "凌雲三加壓站": {
    "0": "7622003001",
    "1": "7622003002",
    "2": "7622003003",
    "3": "7622003004"
  },
  "凌雲四加壓站": {
    "0": "7622002901",
    "1": "7622002902",
    "2": "7622002903",
    "3": "7622002904"
  },
  "凌雲五加壓站": {
    "0": "7622002801",
    "1": "7622002802",
    "2": "7622002803",
    "3": "7622002804"
  },
  "凌雲六加壓站": {
    "0": "7622002701",
    "1": "7622002702",
    "2": "7622002703",
    "3": "7622002704"
  },
  "全興加壓站": {
    "0": "7622003901",
    "1": "7622003902",
    "2": "7622003903",
    "3": "7622003904"
  },
  "同榮加壓站": {
    "0": "7622003501",
    "1": "7622003502",
    "2": "7622003503",
    "3": "7622003504"
  },
  "御史一加壓站": {
    "0": "7622003401",
    "1": "7622003402",
    "2": "7622003403",
    "3": "7622003404"
  },
  "御史二加壓站": {
    "0": "7622003301",
    "1": "7622003302",
    "2": "7622003303",
    "3": "7622003304"
  },
  "壟鉤二加壓站": {
    "0": "7622003201",
    "1": "7622003202",
    "2": "7622003203",
    "3": "7622003204"
  },
  "同榮二配水池": {
    "0": "7622003601",
    "1": "7622003602",
    "2": "7622003603",
    "3": "7622003604"
  },
  //  "觀音山2000T配水池": {
  "觀音山2000噸配水池": {
    "0": "7622002501",
    "1": "7622002502",
    "2": "7622002503",
    "3": "7622002504"
  },
  //  "泰山一號深井": {
  "泰山一號深井": {
    "0": "7622003701",
    "1": "7622003702",
    "2": "7622003703",
    "3": "7622003704"
  },
  //  "泰山淨水場": {
  "泰山淨水廠": {
    "0": "7622003801",
    "1": "7622003802",
    "2": "7622003803",
    "3": "7622003804"
  },
  "南天母二配水池": {
    "0": "7649139901",
    "1": "7649139902",
    "2": "7649139903",
    "3": "7649139904"
  },
  "青雲一加壓站": {
    "0": "7649139801",
    "1": "7649139802",
    "2": "7649139803",
    "3": "7649139804"
  },
  "鳶山堰監測站": {
    "0": "7611876601",
    "1": "7611876602",
    //3階
    "2": "7611876603",
    "3": "7611876604",
  },
  "三峽河取水站": {
    "0": "7611876501",
    "1": "7611876502",
    //3階
    "2": "7611876503",
    "3": "7611876504"
  },
  "中庄調整池": {
    "0": "7611876611",
    "1": "7611876612",
    "2": "7611876613",
    "3": "7611876614"
  },
  //3階新增
  //蘆洲
  "龍形加壓站": {
    "0": "7693790401",
    "1": "7693790402",
    "2": "7693790403",
    "3": "7693790404"
  },
  //   樹林
  "信和配水池": {
    "0": "7693790501",
    "1": "7693790502",
    "2": "7693790503",
    "3": "7693790504"
  },
  //   泰山
  "觀音山500噸配水池": {
    "0": "7622002601",
    "1": "7622002602",
    "2": "7622002603",
    "3": "7622002604"
  },
  "水碓高架400T配水池": {
    "0": "7693790101",
    "1": "7693790102",
    "2": "7693790103",
    "3": "7693790104"
  },
  "水碓加壓站": {
    "0": "7693790201",
    "1": "7693790202",
    "2": "7693790203",
    "3": "7693790204"
  },
  "泰山五號深井": {
    "0": "7693790801",
    "1": "7693790802",
    "2": "7693790803",
    "3": "7693790804"
  },
  //   板新
  "錦和加壓站": {
    "0": "7693790701",
    "1": "7693790702",
    "2": "7693790703",
    "3": "7693790704"
  },
  "新五路加壓站": {
    "0": "7693790301",
    "1": "7693790302",
    "2": "7693790303",
    "3": "7693790304"
  },
  "廣權加壓站": {
    "0": "7693790601",
    "1": "7693790602",
    "2": "7693790603",
    "3": "7693790604"
  },
  "泰山配水池25000噸": {
    "0": "7693790001",
    "1": "7693790002",
    "2": "7693790003",
    "3": "7693790004"
  },
  "尖山加壓站監視一": {
    "0": "7672258901",
    "1": "7672258902",
    "2": "7672258903",
    "3": "7672258904"
  },
  "尖山加壓站監視二": {
    "0": "7672258905",
    "1": "7672258906",
    "2": "7672258907",
    "3": "7672258908"
  }
};
var ElevationPicture = {
  "鶯歌區": {
    "全覽圖": "(光復iFIX-VM)IG_供水高程關析_全覽圖.grf.png",
    "忠義": "(光復iFIX-VM)IG_供水高程關析_忠義.grf.png",
    "國際": "(光復iFIX-VM)IG_供水高程關析_國際.grf.png",
    "成福": "(光復iFIX-VM)IG_供水高程關析_成福.grf.png"
  },
  "樹林區": {
    "全覽圖": "(光復iFIX-VM)SL_供水高程關係全覽圖.grf.png",
    "三興": "(光復iFIX-VM)SL_供水高程關係圖_三興.grf.png",
    "大慶": "(光復iFIX-VM)SL_供水高程關係圖_大慶.grf.png",
    "獅子城": "(光復iFIX-VM)SL_供水高程關係圖_獅子城.grf.png",
    "民和": "(光復iFIX-VM)SL_供水高程關係圖_民和.grf.png",
    "信和": "(光復iFIX-VM)SL_供水高程關係圖_信和.grf.png",
    "迴龍": "(光復iFIX-VM)SL_供水高程關係圖_迴龍.grf.png",
    "備內": "(光復iFIX-VM)SL_供水高程關係圖_備內.grf.png"
  },
  "土城區": {
    "全覽圖": "(光復iFIX-VM)TC_供水高程關係全覽圖.grf.png",
    "青雲": "(光復iFIX-VM)TC_供水高程關係_青雲.grf.png",
    "南天母": "(光復iFIX-VM)TC_供水高程關係_南天母.grf.png",
    "清水": "(光復iFIX-VM)TC_供水高程關係_清水.grf.png",
    "龍泉": "(光復iFIX-VM)TC_供水高程關係_龍泉.grf.png"
  },
  "新莊區": {
    "全覽圖": "(光復iFIX-VM)SJ_供水高程關析全覽圖.grf.png",
    "青山": "(光復iFIX-VM)SJ_供水高程關析_青山.grf.png",
    "雙鳳": "(光復iFIX-VM)SJ_供水高程關析_雙鳳.grf.png",
    "捷運機場": "(光復iFIX-VM)SJ_供水高程關析_捷運機場.grf.png"
  },
  "泰山區": {
    "全覽圖": "(光復iFIX-VM)TS_供水高程關析全覽圖.grf.png",
    "凌雲": "(光復iFIX-VM)TS_供水高程關析_凌雲.grf.png",
    "水碓": "(光復iFIX-VM)TS_供水高程關析_水碓.grf.png",
    "泰林": "(光復iFIX-VM)TS_供水高程關析_泰林.grf.png",
    "同榮": "(光復iFIX-VM)TS_供水高程關析_同榮.grf.png",
    "義學": "(光復iFIX-VM)TS_供水高程關析_義學.grf.png",
    "壟鉤": "(光復iFIX-VM)TS_供水高程關析_壟鉤.grf.png",
    "25000T": "(光復iFIX-VM)TS_供水高程關析_25000T.grf.png"
  },
  "蘆洲區": {
    "全覽圖": "(光復iFIX-VM)LZ_供水高程關析全覽圖.grf.png",
    "新龍形": "(光復iFIX-VM)LZ_供水高程關析_新龍形.grf.png",
    "觀音山": "(光復iFIX-VM)LZ_供水高程關析_觀音山.grf.png",
    "長坑": "(光復iFIX-VM)LZ_供水高程關析_長坑.grf.png",
    "長道坑": "(光復iFIX-VM)LZ_供水高程關析_長道坑.grf.png"
  }
};