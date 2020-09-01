var testpattern = 
    {
    "LAST_DATETIME": "2020-04-25T23:17:00",
    "STATIONS": [
        {
            "STATION_ID": "隆恩街1350監控站",
            "DISPLAY_NAME": "隆恩街1350監控站",
            "LINK": null,
            "STATION_TYPE": "監控站",
            "IMAGE": null,
            "X": 121.35681,
            "Y": 24.94112,
            "X_DELTA": 75.0,
            "Y_DELTA": 0.0,
            "X_DIR": "R",
            "Y_DIR": "B"
        },
        {
            "STATION_ID": "柑園街1750監控站",
            "DISPLAY_NAME": "柑園街1750監控站",
            "LINK": null,
            "STATION_TYPE": "監控站",
            "IMAGE": null,
            "X": 121.3658972,
            "Y": 24.94776667,
            "X_DELTA": 30.0,
            "Y_DELTA": 30.0,
            "X_DIR": "L",
            "Y_DIR": "B"
        },
        {
            "STATION_ID": "媽祖田1350監測站",
            "DISPLAY_NAME": "媽祖田1350監測站",
            "LINK": null,
            "STATION_TYPE": "監測站",
            "IMAGE": "箭頭-B-11.png",
            "X": 121.40957,
            "Y": 24.95045,
            "X_DELTA": 45.0,
            "Y_DELTA": 105.0,
            "X_DIR": "L",
            "Y_DIR": "B"
        },
        {
            "STATION_ID": "佳園路1350監控站",
            "DISPLAY_NAME": "佳園路1350監控站",
            "LINK": null,
            "STATION_TYPE": "監控站",
            "IMAGE": null,
            "X": 121.4065333,
            "Y": 24.96197778,
            "X_DELTA": 30.0,
            "Y_DELTA": 0.0,
            "X_DIR": "R",
            "Y_DIR": "B"
        },
        {
            "STATION_ID": "成福加壓站",
            "DISPLAY_NAME": "成福加壓站",
            "LINK": null,
            "STATION_TYPE": "加壓站",
            "IMAGE": "箭頭-B-14.png",
            "X": 121.4062417,
            "Y": 24.93308611,
            "X_DELTA": 0.0,
            "Y_DELTA": 45.0,
            "X_DIR": "R",
            "Y_DIR": "B"
        },
        {
            "STATION_ID": "尖山加壓站",
            "DISPLAY_NAME": "尖山加壓站",
            "LINK": null,
            "STATION_TYPE": "加壓站",
            "IMAGE": "箭頭-B-07.png",
            "X": 121.33435,
            "Y": 24.95221,
            "X_DELTA": 0.0,
            "Y_DELTA": -65.0,
            "X_DIR": "R",
            "Y_DIR": "T"
        },
        {
            "STATION_ID": "板南加壓站",
            "DISPLAY_NAME": "板南加壓站",
            "LINK": null,
            "STATION_TYPE": "加壓站",
            "IMAGE": "箭頭-B-11.png",
            "X": 121.35545,
            "Y": 24.93863,
            "X_DELTA": 0.0,
            "Y_DELTA": -5.0,
            "X_DIR": "R",
            "Y_DIR": "T"
        }
    ],
    "DATA": [
        {
            "STATION_ID": "隆恩街1350監控站",
            "DISPLAY_NAME": "隆恩街1350監控站",
            "ITEMS": [
                {
                    "ITEM_NAME": "開度",
                    "MEASURE": "開度",
                    "UNIT": "%",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "50",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "N",
                    "USE_STDEV": "0",
                    "H_ALARM": null,
                    "HH_ALARM": null,
                    "L_ALARM": null,
                    "LL_ALARM": null,
                    "PM_TYPE": null,
                    "FM_TYPE": null
                }
            ]
        },
        {
            "STATION_ID": "柑園街1750監控站",
            "DISPLAY_NAME": "柑園街1750監控站",
            "ITEMS": [
                {
                    "ITEM_NAME": "開度",
                    "MEASURE": "開度",
                    "UNIT": "%",
                    "DATE_TIME": null,
                    "VALUE": "",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "<<",
                    "USE_STDEV": "0",
                    "H_ALARM": null,
                    "HH_ALARM": null,
                    "L_ALARM": null,
                    "LL_ALARM": null,
                    "PM_TYPE": null,
                    "FM_TYPE": null
                }
            ]
        },
        {
            "STATION_ID": "媽祖田1350監測站",
            "DISPLAY_NAME": "媽祖田1350監測站",
            "ITEMS": [
                {
                    "ITEM_NAME": "管壓",
                    "MEASURE": "壓力",
                    "UNIT": "kgf/cm2",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "1.13",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "<<",
                    "USE_STDEV": "1",
                    "H_ALARM": 1.339,
                    "HH_ALARM": 1.459,
                    "L_ALARM": 0.863,
                    "LL_ALARM": 0.743,
                    "PM_TYPE": "板新幹管",
                    "FM_TYPE": null
                },
                {
                    "ITEM_NAME": "瞬間流量",
                    "MEASURE": "瞬間流量",
                    "UNIT": "CMD",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "2,399",
                    "VALUE_YESTERDAY": null,
                    "FLAG": ">>",
                    "USE_STDEV": "1",
                    "H_ALARM": 198226.931,
                    "HH_ALARM": 281984.622,
                    "L_ALARM": -136803.835,
                    "LL_ALARM": -220561.526,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "昨日瞬間流量",
                    "MEASURE": "瞬間流量",
                    "UNIT": "CMD",
                    "DATE_TIME": "2020-04-25T23:17:00",
                    "VALUE": "0",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "N",
                    "USE_STDEV": "1",
                    "H_ALARM": 9026.4,
                    "HH_ALARM": 12751.783,
                    "L_ALARM": -5875.134,
                    "LL_ALARM": -9600.517,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "今日累積流量",
                    "MEASURE": "累積流量",
                    "UNIT": "M3",
                    "DATE_TIME": "2020-04-25T23:17:00",
                    "VALUE": "-88,867,290",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "N",
                    "USE_STDEV": "1",
                    "H_ALARM": 41034667.986,
                    "HH_ALARM": 61550264.683,
                    "L_ALARM": -41027718.802,
                    "LL_ALARM": -61543315.499,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "昨日累積流量",
                    "MEASURE": "累積流量",
                    "UNIT": "M3",
                    "DATE_TIME": "2020-04-25T23:17:00",
                    "VALUE": "0",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "N",
                    "USE_STDEV": "1",
                    "H_ALARM": 44652542.392,
                    "HH_ALARM": 67561338.358,
                    "L_ALARM": -46982641.471,
                    "LL_ALARM": -69891437.437,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "昨日總累積流量",
                    "MEASURE": "累積流量",
                    "UNIT": "M3",
                    "DATE_TIME": "2020-04-25T23:17:00",
                    "VALUE": "0",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "N",
                    "USE_STDEV": "1",
                    "H_ALARM": 44652547.44,
                    "HH_ALARM": 67561344.113,
                    "L_ALARM": -46982639.255,
                    "LL_ALARM": -69891435.929,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "餘氯",
                    "MEASURE": "餘氯",
                    "UNIT": "PPM",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "0.6",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "N",
                    "USE_STDEV": "0",
                    "H_ALARM": null,
                    "HH_ALARM": null,
                    "L_ALARM": null,
                    "LL_ALARM": null,
                    "PM_TYPE": null,
                    "FM_TYPE": null
                },
                {
                    "ITEM_NAME": "濁度",
                    "MEASURE": "濁度",
                    "UNIT": "NTU",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "0.1",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "N",
                    "USE_STDEV": "0",
                    "H_ALARM": null,
                    "HH_ALARM": null,
                    "L_ALARM": null,
                    "LL_ALARM": null,
                    "PM_TYPE": null,
                    "FM_TYPE": null
                },
                {
                    "ITEM_NAME": "pH",
                    "MEASURE": "pH",
                    "UNIT": "",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "7.3",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "N",
                    "USE_STDEV": "0",
                    "H_ALARM": null,
                    "HH_ALARM": null,
                    "L_ALARM": null,
                    "LL_ALARM": null,
                    "PM_TYPE": null,
                    "FM_TYPE": null
                },
                {
                    "ITEM_NAME": "溫度",
                    "MEASURE": "溫度",
                    "UNIT": "°C",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "18.6",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "N",
                    "USE_STDEV": "0",
                    "H_ALARM": null,
                    "HH_ALARM": null,
                    "L_ALARM": null,
                    "LL_ALARM": null,
                    "PM_TYPE": null,
                    "FM_TYPE": null
                },
                {
                    "ITEM_NAME": "導電度",
                    "MEASURE": "導電度",
                    "UNIT": "μS/cm",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "100",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "N",
                    "USE_STDEV": "0",
                    "H_ALARM": null,
                    "HH_ALARM": null,
                    "L_ALARM": null,
                    "LL_ALARM": null,
                    "PM_TYPE": null,
                    "FM_TYPE": null
                }
            ]
        },
        {
            "STATION_ID": "佳園路1350監控站",
            "DISPLAY_NAME": "佳園路1350監控站",
            "ITEMS": [
                {
                    "ITEM_NAME": "開度",
                    "MEASURE": "開度",
                    "UNIT": "%",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "80",
                    "VALUE_YESTERDAY": null,
                    "FLAG": ">",
                    "USE_STDEV": "0",
                    "H_ALARM": null,
                    "HH_ALARM": null,
                    "L_ALARM": null,
                    "LL_ALARM": null,
                    "PM_TYPE": null,
                    "FM_TYPE": null
                }
            ]
        },
        {
            "STATION_ID": "成福加壓站",
            "DISPLAY_NAME": "成福加壓站",
            "ITEMS": [
                {
                    "ITEM_NAME": "進水壓力",
                    "MEASURE": "壓力",
                    "UNIT": "kgf/cm2",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "0.68",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "<",
                    "USE_STDEV": "0",
                    "H_ALARM": 5.0,
                    "HH_ALARM": 6.0,
                    "L_ALARM": 4.0,
                    "LL_ALARM": null,
                    "PM_TYPE": "一般",
                    "FM_TYPE": null
                },
                {
                    "ITEM_NAME": "出水壓力",
                    "MEASURE": "壓力",
                    "UNIT": "kgf/cm2",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "6.76",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "<",
                    "USE_STDEV": "0",
                    "H_ALARM": 5.0,
                    "HH_ALARM": 6.0,
                    "L_ALARM": 4.0,
                    "LL_ALARM": null,
                    "PM_TYPE": "一般",
                    "FM_TYPE": null
                },
                {
                    "ITEM_NAME": "瞬間流量",
                    "MEASURE": "瞬間流量",
                    "UNIT": "CMD",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "7,677",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "<",
                    "USE_STDEV": "1",
                    "H_ALARM": 10757.148,
                    "HH_ALARM": 14571.912,
                    "L_ALARM": -4501.906,
                    "LL_ALARM": -8316.67,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "昨日瞬間流量",
                    "MEASURE": "瞬間流量",
                    "UNIT": "CMD",
                    "DATE_TIME": "2020-04-25T23:17:00",
                    "VALUE": "7,735",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "<",
                    "USE_STDEV": "1",
                    "H_ALARM": 11424.285,
                    "HH_ALARM": 13572.452,
                    "L_ALARM": 2831.617,
                    "LL_ALARM": 683.45,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "水位",
                    "MEASURE": "水位",
                    "UNIT": "m",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "0.00",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "<",
                    "USE_STDEV": "0",
                    "H_ALARM": null,
                    "HH_ALARM": null,
                    "L_ALARM": null,
                    "LL_ALARM": null,
                    "PM_TYPE": null,
                    "FM_TYPE": null
                }
            ]
        },
        {
            "STATION_ID": "尖山加壓站",
            "DISPLAY_NAME": "尖山加壓站",
            "ITEMS": [
                {
                    "ITEM_NAME": "600Φ出水壓力",
                    "MEASURE": "壓力",
                    "UNIT": "kgf/cm2",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "3.99",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "0",
                    "H_ALARM": null,
                    "HH_ALARM": null,
                    "L_ALARM": null,
                    "LL_ALARM": null,
                    "PM_TYPE": "板新幹管",
                    "FM_TYPE": null
                },
                {
                    "ITEM_NAME": "600Φ瞬間流量",
                    "MEASURE": "瞬間流量",
                    "UNIT": "CMD",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "12,360",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "1",
                    "H_ALARM": 14354.097,
                    "HH_ALARM": 15706.417,
                    "L_ALARM": 8944.815,
                    "LL_ALARM": 7592.494,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "600Φ昨日瞬間流量",
                    "MEASURE": "瞬間流量",
                    "UNIT": "CMD",
                    "DATE_TIME": "2020-04-25T23:17:00",
                    "VALUE": "22,127",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "1",
                    "H_ALARM": 27374.03,
                    "HH_ALARM": 29933.712,
                    "L_ALARM": 17135.301,
                    "LL_ALARM": 14575.619,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "900Φ瞬間流量",
                    "MEASURE": "瞬間流量",
                    "UNIT": "CMD",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "94,536",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "1",
                    "H_ALARM": 143969.373,
                    "HH_ALARM": 159832.489,
                    "L_ALARM": 80516.906,
                    "LL_ALARM": 64653.789,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "900Φ昨日瞬間流量",
                    "MEASURE": "瞬間流量",
                    "UNIT": "CMD",
                    "DATE_TIME": "2020-04-25T23:17:00",
                    "VALUE": "133,560",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "1",
                    "H_ALARM": 146025.55,
                    "HH_ALARM": 160608.188,
                    "L_ALARM": 87694.998,
                    "LL_ALARM": 73112.36,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "900Φ今日累積流量",
                    "MEASURE": "累積流量",
                    "UNIT": "M3",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "14,300",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "1",
                    "H_ALARM": 25353.761,
                    "HH_ALARM": 27905.515,
                    "L_ALARM": 15146.745,
                    "LL_ALARM": 12594.991,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "900Φ昨日累積流量",
                    "MEASURE": "累積流量",
                    "UNIT": "M3",
                    "DATE_TIME": "2020-04-25T23:17:00",
                    "VALUE": "110,930",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "1",
                    "H_ALARM": 121881.262,
                    "HH_ALARM": 127766.681,
                    "L_ALARM": 98339.583,
                    "LL_ALARM": 92454.164,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "900Φ昨日總累積流量",
                    "MEASURE": "累積流量",
                    "UNIT": "M3",
                    "DATE_TIME": "2020-04-25T23:17:00",
                    "VALUE": "115,080",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "1",
                    "H_ALARM": 125938.079,
                    "HH_ALARM": 132001.203,
                    "L_ALARM": 101685.583,
                    "LL_ALARM": 95622.459,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "水位",
                    "MEASURE": "水位",
                    "UNIT": "m",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "3.53",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "0",
                    "H_ALARM": null,
                    "HH_ALARM": null,
                    "L_ALARM": null,
                    "LL_ALARM": null,
                    "PM_TYPE": null,
                    "FM_TYPE": null
                },
                {
                    "ITEM_NAME": "配水池水位",
                    "MEASURE": "水位",
                    "UNIT": "m",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "2.27",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "1",
                    "H_ALARM": 2.554,
                    "HH_ALARM": 2.683,
                    "L_ALARM": 2.034,
                    "LL_ALARM": 1.904,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "餘氯",
                    "MEASURE": "餘氯",
                    "UNIT": "PPM",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "0.4",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "0",
                    "H_ALARM": null,
                    "HH_ALARM": null,
                    "L_ALARM": null,
                    "LL_ALARM": null,
                    "PM_TYPE": null,
                    "FM_TYPE": null
                },
                {
                    "ITEM_NAME": "濁度",
                    "MEASURE": "濁度",
                    "UNIT": "NTU",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "5.1",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "0",
                    "H_ALARM": null,
                    "HH_ALARM": null,
                    "L_ALARM": null,
                    "LL_ALARM": null,
                    "PM_TYPE": null,
                    "FM_TYPE": null
                },
                {
                    "ITEM_NAME": "pH",
                    "MEASURE": "pH",
                    "UNIT": "",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "0.1",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "0",
                    "H_ALARM": null,
                    "HH_ALARM": null,
                    "L_ALARM": null,
                    "LL_ALARM": null,
                    "PM_TYPE": null,
                    "FM_TYPE": null
                },
                {
                    "ITEM_NAME": "溫度",
                    "MEASURE": "溫度",
                    "UNIT": "°C",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "18.5",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "0",
                    "H_ALARM": null,
                    "HH_ALARM": null,
                    "L_ALARM": null,
                    "LL_ALARM": null,
                    "PM_TYPE": null,
                    "FM_TYPE": null
                },
                {
                    "ITEM_NAME": "導電度",
                    "MEASURE": "導電度",
                    "UNIT": "μS/cm",
                    "DATE_TIME": "2020-04-25T04:18:00",
                    "VALUE": "78",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "0",
                    "H_ALARM": null,
                    "HH_ALARM": null,
                    "L_ALARM": null,
                    "LL_ALARM": null,
                    "PM_TYPE": null,
                    "FM_TYPE": null
                }
            ]
        },
        {
            "STATION_ID": "板南加壓站",
            "DISPLAY_NAME": "板南加壓站",
            "ITEMS": [
                {
                    "ITEM_NAME": "瞬間流量",
                    "MEASURE": "瞬間流量",
                    "UNIT": "CMD",
                    "DATE_TIME": "2020-04-25T23:17:00",
                    "VALUE": "0",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "1",
                    "H_ALARM": 32034.206,
                    "HH_ALARM": 47080.101,
                    "L_ALARM": -28149.373,
                    "LL_ALARM": -43195.268,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "昨日瞬間流量",
                    "MEASURE": "瞬間流量",
                    "UNIT": "CMD",
                    "DATE_TIME": "2020-04-25T23:17:00",
                    "VALUE": "0",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "1",
                    "H_ALARM": 32034.206,
                    "HH_ALARM": 47080.101,
                    "L_ALARM": -28149.373,
                    "LL_ALARM": -43195.268,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "今日累積流量",
                    "MEASURE": "累積流量",
                    "UNIT": "M3",
                    "DATE_TIME": "2020-04-25T23:17:00",
                    "VALUE": "0",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "1",
                    "H_ALARM": 79344.306,
                    "HH_ALARM": 110467.119,
                    "L_ALARM": -45146.947,
                    "LL_ALARM": -76269.761,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "昨日累積流量",
                    "MEASURE": "累積流量",
                    "UNIT": "M3",
                    "DATE_TIME": "2020-04-23T07:30:00",
                    "VALUE": "0",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "1",
                    "H_ALARM": 32615.26,
                    "HH_ALARM": 45753.922,
                    "L_ALARM": -19939.387,
                    "LL_ALARM": -33078.049,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                },
                {
                    "ITEM_NAME": "昨日總累積流量",
                    "MEASURE": "累積流量",
                    "UNIT": "M3",
                    "DATE_TIME": "2020-04-18T23:59:00",
                    "VALUE": "0",
                    "VALUE_YESTERDAY": null,
                    "FLAG": "?",
                    "USE_STDEV": "1",
                    "H_ALARM": 76819.973,
                    "HH_ALARM": 107013.613,
                    "L_ALARM": -43954.588,
                    "LL_ALARM": -74148.228,
                    "PM_TYPE": null,
                    "FM_TYPE": "一般"
                }
            ]
        }
    ]
};
//開啟資訊是窗後icon的偏移位子
var deviation = {
    "X": 10,
    "Y": 10
};
var controlImg ={
  "監控站-紅": "./images/監控站-紅-4055.png",
  "監控站-黃": "./images/監控站-黃-4055.png",
  "監控站-綠": "./images/監控站-綠-4055.png",
  "監控站-灰": "./images/監控站-灰-4055.png"
};
var flagCit = {
  "<<": "紅",
  ">>": "紅",
  "<": "黃",
  ">": "黃",
  "N": "綠",
  "?": "灰"
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
var banxinOverviewUrl_ = {
  "總覽": {
      'legend': '',
      'url':'http://220.134.42.63:8080/WaterscadaAPI/WI_StationData?section=轄區供水系統&item=*&measure=電動閥,進出水點',
      'wmsurl': ''
  },
  "350mm以上": {
      'legend': 'http://10.12.144.42:8080/geoserver/ows?service=WMS&request=GetLegendGraphic&format=image%2Fpng&width=100&height=30&layer=TWW12:pipe_3200',
      'url':'',
//      'wmsurl': "http://giss.tcd.gov.tw/tcdmap/services/WebService/WETLANDS_OF_IMPORTANCE/MapServer/WMSServer?SERVICE=WMS&REQUEST=GetMap&FORMAT=image/png&TRANSPARENT=TRUE&STYLES=&VERSION=1.1.1&LAYERS=0&WIDTH=1118&HEIGHT=681&SRS=EPSG:3826&BBOX=316470.37858775724,2721773.016086699,346050.8544153755,2739791.177123021"
      'wmsurl':'http://10.12.144.42:8080/geoserver/TWW12/wms?service=WMS&request=GetMap&layers=TWW12:pipe_3205&bbox=282726.579805102,2754342.30455815,303043.983718742,2783556.28627307&width=534&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true'
  },
  "總覽圖":{
      'legend':'none',
      'url':'',
      'wmsurl': {
                "板新給水廠": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Ban%20Sin_scope&bbox=272110.71299078554,2743568.4297493896,285807.81244606024,2758997.000045486&width=681&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "鶯歌服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Yingge&bbox=281895.2447104211,2742578.4774454506,300249.9665335865,2763897.4774454506&width=661&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "樹林服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Shulin&bbox=286503.2477835865,2759475.7274454506,293635.2477835865,2768081.4774454506&width=636&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "土城服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Tucheng&bbox=291163.5602835865,2758712.4774454506,298675.4977835865,2765432.2274454506&width=768&height=687&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "板橋服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Banqiao&bbox=292863.4040335865,2761864.2274454506,299655.57203609165,2770251.4774454506&width=621&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "新莊服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Xinzhuang&bbox=289420.2087284418,2765299.2274454506,298387.7803280551,2773458.4774454506&width=768&height=698&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "蘆洲服務所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Luzhou&bbox=286932.1540335865,2773890.1221998935,299574.4665335865,2784745.2089639166&width=768&height=659&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
                "泰山營運所": "http://10.12.144.42:8080/geoserver/TWW/wms?service=WMS&request=GetMap&layers=TWW:Taishan&bbox=288056.7477835865,2769016.2274454506,297522.0915335865,2780475.7274454506&width=634&height=768&srs=EPSG:3826&format=image/png&TRANSPARENT=true",
               // "測試WMS": "https://wms.nlsc.gov.tw/wms?&SERVICE=WMS&VERSION=1.1.1&REQUEST=GetMap&BBOX=352136.448733,2807602.054796,144847.277860,2406316.107441&SRS=EPSG:3826&WIDTH=1600&HEIGHT=890&LAYERS=MOI_HILLSHADE&FORMAT=image/png&DPI=96&MAP_RESOLUTION=96&FORMAT_OPTIONS=dpi:96&TRANSPARENT=TRUE",
            }
  }
  
};
var messageBox; //訊息視窗物件 
var toSupContent = ["kgf/cm2", "M3"];
var toUppercaseContent = ["m"];
var physicMessageBox = [];
var pMap; //初始化地圖物件

var infotext = '<B>板新給水廠</B><br>'; //地標名稱及訊息視窗內容

var markerPoint = new TGOS.TGPoint(285718.91586603626,2766951.8598162658); //地標坐標位置

var imgUrl = "http://api.tgos.tw/TGOS_API/images/marker2.png"; //標記點圖示來源

//function InitWnd() {
//  var pOMap = document.getElementById("TGMap");
//  var mapOptiions = {
//        scaleControl: false, //不顯示比例尺
//        navigationControl: true, //顯示地圖縮放控制項
//        navigationControlOptions: { //設定地圖縮放控制項
//        controlPosition: TGOS.TGControlPosition.TOP_LEFT, //控制項位置
//        navigationControlStyle: TGOS.TGNavigationControlStyle.SMALL //控制項樣式
//      }, 
//      mapTypeControl: false //不顯示地圖類型控制項
//  };
//  pMap = new TGOS.TGOnlineMap(pOMap, TGOS.TGCoordSys.EPSG3826, mapOptiions); //建立地圖,選擇TWD97坐標
//  pMap.setZoom(6); //初始地圖縮放層級
//  
//  pMap.setCenter(markerPoint); //初始地圖中心點
//  
//  //-----------------建立訊息視窗--------------------
//
////  var InfoWindowOptions = {
////    maxWidth: 4000, //訊息視窗的最大寬度
////    pixelOffset: new TGOS.TGSize(5, -30), //InfoWindow起始位置的偏移量, 使用TGSize設定, 向右X為正, 向上Y為負 
////    zIndex: 1 //視窗堆疊順序
////  };
////  
////  messageBox = new TGOS.TGInfoWindow(infotext, markerPoint, InfoWindowOptions); //建立訊息視窗
////  TGOS.TGEvent.addListener(pTGMarker, "mouseover", openInfoWindow); //滑鼠監聽事件--開啟訊息視窗
////  TGOS.TGEvent.addListener(pTGMarker, "mouseout", closeInfoWindow); //滑鼠監聽事件--關閉訊息視窗
//  basicSetting();
//}
var WMSLayer = null;	//宣告一個空的變數, 準備承接WMS物件使用
var WMSLayers = new Array();
function addWms(turl, orderCount, opacity){
  //var opacity = 0.8;
  WMSLayer = new TGOS.TGWmsLayer(turl, {
    //建立WMS物件, 加入WMS連結, 並指定相關屬性
        map: pMap,
        preserveViewport: true,
        zIndex: orderCount,
        wsVisible: true,
    });
    WMSLayer.setOpacity(opacity);
    WMSLayers.push(WMSLayer); 
}

function attachWms(turl){
  var timeoutflag = '';
  if(typeof turl == 'string'){
    addWms(turl,0,0.8);
  }
  if(typeof turl == 'object') {
    var _wmsurl_ = [];
    $.each(turl, function(k,v){
      _wmsurl_.push(v);      
    });
    for(var x=0; x<_wmsurl_.length; x++){
      var turl_ = _wmsurl_[x];
      timeoutflag = setTimeout(addWms(turl_,0,1), 50);
      
    }
    clearTimeout(timeoutflag);
  }
}
function deleteWms(){
  if (WMSLayers.length > 0) {
      for(var i = 0; i < WMSLayers.length; i++)
      {
          WMSLayers[i].removeWmsLayer();	//當圖面上存在WMS圖層時, 將該圖層移除
      }
  } else {
      alert('圖面上不存在WMS圖層');
  }
}
function openInfoWindow() { //開啟訊息視窗函式
  messageBox.open(pMap);
}

function closeInfoWindow() { //關閉訊息視窗函式
  messageBox.close();
}

function basicSetting(){
  var statId;
  attachWms(banxinOverviewUrl_['總覽圖']['wmsurl']);
  attachWms(banxinOverviewUrl_['350mm以上']['wmsurl']);
  $("#generalLook").click();
}

var lastTime, stationsObj, datasObj, itemsObj;
function composerData(url){
var stations_id = [];
  var json = getToServer(url);
//  var json = testpattern;
  console.log(json);
  $.each(json, function(key, value){
    lastTime = json['LAST_DATETIME'];
    stationsObj = json['STATIONS'];
    datasObj = json['DATA'];    
  });
  $.each(stationsObj, function(key, value){
    var x = value["STATION_ID"];
    stations_id.push(x);
  }); 
    console.log(stations_id);
  return stations_id;
}

function assignFlag(array) {
  var _flag;
  var string = array.join(",");
  if ((string.indexOf('?') > -1) || (string.indexOf(' ') > -1))
      _flag = "灰";
  else if ((string.indexOf('>>') > -1) || (string.indexOf('<<') > -1))
      _flag = "紅";
  else if ((string.indexOf('>') > -1) || (string.indexOf('<') > -1))
      _flag = "黃";
  else
      _flag = "綠";
//  debugger;
  return _flag;   
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
function attdisplayNam (url_){
//./images/加壓站-灰-箭頭-B-14-6060.gif
  var sta = url_;
//  debugger;
  sta = controlImg[sta.replace('@', '-')];
  return sta;
}
function attachImg(url_){
//"板南加壓站@121.35545@24.93863@箭頭-B-11.png"
  //箭頭-B-11.png
  var _url_ = url_.split("@");
  var _temp_ = _url_[0]+"-"+_url_[2]+"-"+_url_[1];
  var sta = _temp_.replace(".png","-6060.gif");
  return stationType_Animated[sta];
}

function composerTGImage(_array_,img){
  var staID = _array_;
  var found_flg = 0;
  var dataString = [], flag_=[], assignFlag_, markerPoint = [], infotext = [];
//  var imgUrl = "http://api.tgos.tw/TGOS_API/images/marker2.png"; 
  if(staID.length > 0){
    for(var x=0; x<staID.length; x++){
      $.each(stationsObj, function(k,v){
        if(staID[x] == v['STATION_ID']){
          $.each(datasObj, function(k1,v1){
            if(staID[x] == v1['STATION_ID']){
              $.each(v1['ITEMS'],function (k2, v2){
                flag_.push(v2["FLAG"]);              
              });
              assignFlag_ = assignFlag(flag_);
            }
          });
          if(v['IMAGE'] == null) {
            var icon = attdisplayNam(v['STATION_TYPE']+"@"+assignFlag_);
          } else {
  //          debugger;
            var icon = attachImg(v['STATION_TYPE']+"@"+v['IMAGE']+"@"+assignFlag_);
          } 
          //"板南加壓站@121.35545@24.93863@箭頭-B-11.png"
          dataString.push(v['STATION_ID']+"@"+v['X']+"@"+v['Y']+"@"+icon);
          found_flg = 1;        
        }
      });
      var stationID = dataString[x].split("@")[0];
      var axis = coordinateConverter(dataString[x].split("@")[1], dataString[x].split("@")[2], deviation);
      var imgUrl = dataString[x].split("@")[3];
      var imgX = imgUrl.substr(-8,2)* 0.7;
      var imgY = imgUrl.substr(-6,2)* 0.7;
      var _x_ =axis[0];
      var _y_ = axis[1];
      var _temp_ = dataString[x].split("@");
      _temp_.splice(1,2,_x_,_y_);    
      //------------------建立標記點---------------------
      var markerImg = new TGOS.TGImage(imgUrl, new TGOS.TGSize(imgX, imgY), new TGOS.TGPoint(0, 0), new TGOS.TGPoint(10, 33));	//設定標記點圖片及尺寸大小
      var pTGMarker = new TGOS.TGMarker(pMap, axis, stationID, markerImg, {flat:false});	//建立機關單位標記點
      pTGMarker.setZIndex(21);
      infotext[x] = messageBoxContaner(stationsObj[x], testpattern);
      //-----------------建立訊息視窗--------------------
      var InfoWindowOptions = {
        maxWidth: 100, //訊息視窗的最大寬度
        pixelOffset: new TGOS.TGSize(0, 0), //InfoWindow起始位置的偏移量, 使用TGSize設定, 向右X為正, 向上Y為負 
        zIndex: 10 //視窗堆疊順序
      };
      markerPoint.push(new TGOS.TGPoint(axis.x, axis.y));
      messageBox = new TGOS.TGInfoWindow(infotext[x], markerPoint[x], InfoWindowOptions); //建立訊息視窗
      physicMessageBox.push(messageBox);
      debugger;        
      //綁定資訊視窗click功能
      TGOS.TGEvent.addListener(pTGMarker, "click", function(pTGMarker, messageBox) {
          return function() { 
            messageBox.close();
            messageBox.open(pMap, pTGMarker);
            messageBox.getContentPane().classList.add('messageBoxOpened');
            messageBoxAdjuster(messageBox);
//            console.log(messageBox);
          };
      }(pTGMarker, messageBox));
    }
    console.log(dataString);
  } else 
    alert("目前無資料。");
};

function messageBoxAdjuster(messageBox) {
    messageBox.getElement().classList.add('messageBox');
    messageBox.getContentPane().onclick = function() {
    //物理量memo的前後順序(click網前推一層)
    for (var E = 0; E < physicMessageBox.length; E++) {
      physicMessageBox[E].setZIndex(10);
    }
    messageBox.setZIndex(11);
    }
}
//時間轉換
function timeDashToSlash(target) {
    if (target) {
        var tempString = target.split('-').join('/');
        var newTime = tempString.split('T').join(' ');
        return newTime;
    }
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
function messageBoxContaner(data, fulldata) {
//    console.log("fulldata"+fulldata);
    var rawDataToPresent = "";
    var dataToPresentArray;
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
        if (Object.keys(rawDataToPresent).indexOf('ITEMS') != -1) {
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
        }
        //物理量
        for (var E = 0; E < dataToPresentArray.length; E++) {
            dataToPresentHtmlString += "<div style='font-size:14px; color: rgb(7, 52, 105); padding: 3px;'>".concat(dataToPresentArray[E], "</div>");
        }
        messageBoxHtmlString = "<div style='font-size:12px; background-color: rgba(255,255,255,0.0); color: rgb(7, 52, 105);'><div style='text-align: center; padding: 10px; color: gray;'>"+lastTime+"</div><div class='statidstr' style='text-align:center; padding:6px; margin-bottom:4px; background-color:rgba(255,255,255,0.0); color: rgb(7, 52, 105);'>"+rawDataToPresent['STATION_ID']+ "</div><div class='corner'>"+dataToPresentHtmlString +"</div></div><button class='infoWindowbtn' onclick='infoWindowbtn(this)' style=''>資訊視窗</button>";
    }
    return messageBoxHtmlString;
}


//資訊視窗-主體
function infoWindowbtn(e){  
//  var stat_id = $(e).parent().children('div:first').children("div:nth-of-type(2)").text();
//  console.log(stat_id);
////  infoWindowGetRealtimeData(false);
//  banixanOverview(stat_id);
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
function banixanOverview(station_Id) {

//  $('#staID_').text(station_Id);
//  $(".dataPicture_content_button").remove();
//  $(".dataPicture_content_unact").remove();
//  $(".dataPicture_content_picture_wrapper img").remove();
//  $(".dataPicture_content_picture_time h6").remove();
//  $("#moniter").css({ display: "block" });
//  $(".stationEdit").children("button").removeAttr("disabled").removeClass("active");
//  setStationInfo(station_Id);      
//  JudgeDistricOfIfixPicture(station_Id, '-1');
//  mappingcctvid(TOKEN, station_Id);
}
function getToServer(url_){
  var result = false;      
  $.ajax({
        url:url_,
        type: 'GET',
        dataType: "json",
        async:false,
        success: function(data) {
            result = data;
        },
        error: function () {
          console.log("get json fail");
        }
      });
  return result;
}; 
  
  
  
