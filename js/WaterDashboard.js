function fullypoolchart(poolarray, chart) {
  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end

  var chart = am4core.create("chartdiv1s", am4charts.PieChart3D);
  chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

  var statid_ = ['2區供水量', '板新出水量', '北水處'];
  var pooldata = [];
  var statid, val, jugcolor_;
  var obj = {};
  if (poolarray.length) {
    console.log(poolarray);
    for (var y = 0; y < poolarray.length; y++) {
      statid = '', val = '';
      obj = {};
      statid = poolarray[y].split(":")[0];
      val = poolarray[y].split(":")[2].replace(',', "");
      //      if(val<0) val = Number(val)*(-1);
      jugcolor_ = poolarray[y].split(":")[4];
      for (var x = 0; x < statid_.length; x++) {
        if (statid_[x] == statid) {
          obj["stid"] = statid;
          obj["val"] = val;
          pooldata.push(obj);
          obj = {};
        }
      }
    }
  }

  chart.data = pooldata;
  chart.innerRadius = am4core.percent(30);
  chart.depth = 20;

  chart.legend = new am4charts.Legend();

  var series = chart.series.push(new am4charts.PieSeries3D());
  series.dataFields.value = "val";
  series.dataFields.depthValue = "val";
  series.dataFields.category = "stid";
  series.slices.template.cornerRadius = 5;
  series.colors.step = 3;

}

//chartdiv2
function lineline() {
  return option = {
    tooltip: {
      trigger: 'axis'
    },
    legend: {
      color: ["#0170fe", "#47D8BE", "#F9A589"],
      data: ['北水', '板新', '二區'],
      left: 'center',
      top: 'top'
    },
    grid: {
      top: 'middle',
      left: '3%',
      right: '4%',
      bottom: '3%',
      height: '80%',
      containLabel: true
    },
    xAxis: {
      type: 'category',
      name: "日期",
      data: ["2020/4/11", "2020/4/12", "2020/4/13", "2020/4/14", "2020/4/15", "2020/4/16"],
      axisLine: {
        lineStyle: {
          color: "#999"
        }
      }
    },
    yAxis: {
      type: 'value',
      name: "瞬間流量",
      splitLine: {
        lineStyle: {
          type: 'dashed',
          color: '#DDD'
        }
      },
      axisLine: {
        show: false,
        lineStyle: {
          color: "#333"
        },
      },
      nameTextStyle: {
        color: "#999"
      },
      splitArea: {
        show: false
      }
    },
    series: [
      {
        name: '北水',
        type: 'line',
        data: [800, 900, 220, 130, 660, 289],
        color: "#0170fe",
        lineStyle: {
          normal: {
            width: 4,
            color: {
              type: 'linear',

              colorStops: [{
                offset: 0,
                color: '#d6e6fc' // 0% 处的颜色
                            }, {
                offset: 0.4,
                color: '#0170fe' // 100% 处的颜色
                            }, {
                offset: 1,
                color: '#0170fe' // 100% 处的颜色
                            }],
              globalCoord: false // 缺省为 false
            },
            shadowColor: 'rgba(1,122,254, 0.5)',
            shadowBlur: 10,
            shadowOffsetY: 7
          }
        },
        itemStyle: {
          normal: {
            color: '#0170fe',
            borderWidth: 6,
            /*shadowColor: 'rgba(72,216,191, 0.3)',
            shadowBlur: 100,*/
            borderColor: "#0170fe"
          }
        },
        smooth: true
            },
      {
        name: '板新',
        type: 'line',
        data: [123, 568, 111, 222, 123, 56],
        lineStyle: {
          normal: {
            width: 4,
            color: {
              type: 'linear',

              colorStops: [{
                  offset: 0,
                  color: '#75e7e1' // 0% 处的颜色
                                },
                {
                  offset: 0.4,
                  color: '#16decb' // 100% 处的颜色
                                }, {
                  offset: 1,
                  color: '#16decb' // 100% 处的颜色
                                }
                            ],
              globalCoord: false // 缺省为 false
            },
            shadowColor: 'rgba(71,216,190, 0.5)',
            shadowBlur: 10,
            shadowOffsetY: 7
          }
        },
        itemStyle: {
          normal: {
            color: '#16decb',
            borderWidth: 6,
            /*shadowColor: 'rgba(22,222,203, 0.3)',
            shadowBlur: 100,*/
            borderColor: "#16decb"
          }
        },
        smooth: true
            },
      {
        name: '二區',
        type: 'line',
        data: [125, 231, 25, 36, 784, 56],
        lineStyle: {
          normal: {
            width: 4,
            color: {
              type: 'linear',

              colorStops: [{
                  offset: 0,
                  color: '#F6D06F' // 0% 处的颜色
                                },
                {
                  offset: 0.4,
                  color: '#f79820' // 100% 处的颜色
                                }, {
                  offset: 1,
                  color: '#f79820' // 100% 处的颜色
                                }
                            ],
              globalCoord: false // 缺省为 false
            },
            shadowColor: 'rgba(249,165,137, 0.5)',
            shadowBlur: 10,
            shadowOffsetY: 7
          }
        },
        itemStyle: {
          normal: {
            color: '#f79820',
            borderWidth: 6,
            /*shadowColor: 'rgba(72,216,191, 0.3)',
            shadowBlur: 100,*/
            borderColor: "#f79820"
          }
        },
        smooth: true
            }
        ]
  };

};

//chartdiv4
function bubble() {
  return option = {
    title: {
      text: '測站',
      textStyle: {
        fontSize: 18,
        fontFamily: 'Microsoft Yahei',
        fontWeight: 'normal',
        //                color: '#bcb8fb',            
        color: '#fff',
      },
      x: 'center',
      y: '32%'
    },

    graphic: [{
      type: 'group',
      left: 'center',
      top: '44%',
        }],
    series: [{
      type: 'liquidFill',
      radius: '68%', //大小
      center: ['50%', '52%'], //位置
      data: [0.18, 0.95, 0.2],
      backgroundStyle: {
        color: {
          type: 'linear',
          x: 1,
          y: 0,
          x2: 0.5,
          y2: 1,
          colorStops: [{
            offset: 1,
            color: 'rgba(64, 23, 172, 1)'
                    }, {
            offset: 0.5,
            color: 'rgba(70, 52, 200, 1)'
                    }, {
            offset: 0,
            color: 'rgba(68, 110, 231, 1)'
                    }],
          globalCoord: false
        },
      },
      outline: {
        borderDistance: 0,
        itemStyle: {
          borderWidth: 10,
          borderColor: {
            type: 'linear',
            x: 0,
            y: 0,
            x2: 0,
            y2: 1,
            colorStops: [{
              offset: 0,
              color: 'rgba(65, 28, 178, 1)'
                        }, {
              offset: 1,
              color: 'rgba(66, 70, 232, 1)'
                        }],
            globalCoord: false
          },
          shadowBlur: 10,
          shadowColor: '#000',
        }
      },

      color: {
        type: 'linear',
        x: 0,
        y: 0,
        x2: 0,
        y2: 1,
        colorStops: [{
          offset: 1,
          color: 'rgba(58, 71, 212, 0)'
                }, {
          offset: 0.5,
          color: 'rgba(31, 222, 225, .2)'
                }, {
          offset: 0,
          color: 'rgba(31, 222, 225, 1)'
                }],
        globalCoord: false
      },
      label: {
        normal: {
          formatter: '',
        },
      }
        }, ]
  };
}

//chartdiv5
function gaugechart(importantStation, chart) {
  chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect

  chart.innerRadius = -20;
  chart.innerRadius = am4core.percent(75); //圓圈大小
  var axis = chart.xAxes.push(new am4charts.ValueAxis());
  axis.min = 0;
  axis.max = 12;
  axis.strictMinMax = true;
  axis.renderer.grid.template.stroke = new am4core.InterfaceColorSet().getFor("background");
  axis.renderer.grid.template.strokeOpacity = 0.3;

  var colorSet = new am4core.ColorSet();

  var range0 = axis.axisRanges.create();
  range0.value = 0;
  range0.endValue = 6;
  range0.axisFill.fillOpacity = 1;
  range0.axisFill.fill = colorSet.getIndex(0);
  range0.axisFill.zIndex = -1;

  var range1 = axis.axisRanges.create();
  range1.value = 6;
  range1.endValue = 9;
  range1.axisFill.fillOpacity = 1;
  range1.axisFill.fill = colorSet.getIndex(2);
  range1.axisFill.zIndex = -1;

  var range2 = axis.axisRanges.create();
  range2.value = 9;
  range2.endValue = 12;
  range2.axisFill.fillOpacity = 1;
  range2.axisFill.fill = colorSet.getIndex(4);
  range2.axisFill.zIndex = -1;

  var hand = chart.hands.push(new am4charts.ClockHand()); //指針
  hand.axis = axis;
  hand.innerRadius = am4core.percent(30);
  hand.pin.disabled = true;
  hand.value = 0;

  hand.events.on("propertychanged", function (ev) {
    range0.endValue = ev.target.value;
    range1.value = ev.target.value;
    //   axis2.invalidate();
  });
  var label_val = chart.radarContainer.createChild(am4core.Label); //文字一
  label_val.isMeasured = false;
  label_val.fontSize = "1.5em";
  label_val.x = am4core.percent(50);
  label_val.y = am4core.percent(100);
  label_val.horizontalCenter = "middle";
  label_val.verticalCenter = "bottom";
  label_val.text = "";
  label_val.paddingBottom = 15;

  var label_station = chart.radarContainer.createChild(am4core.Label);
  label_station.isMeasured = false;
  label_station.horizontalCenter = "middle";
  label_station.y = -80;
  label_station.align = "center";
  label_station.fontSize = 20;
  label_station.text = "";
  label_station.fill = "#595758";

  var label_unit = chart.radarContainer.createChild(am4core.Label);
  label_unit.isMeasured = false;
  label_unit.horizontalCenter = "middle";
  label_unit.y = -115;
  label_unit.text = "";
  label_unit.fill = "#aaa";

  var label_measure = chart.radarContainer.createChild(am4core.Label); //文字二
  label_measure.isMeasured = false;
  label_measure.horizontalCenter = "middle";
  label_measure.y = -10;
  label_measure.text = "";
  label_measure.fill = "#595758";
  label_station.fontSize = 20;
  var x = 0;
  setgaugeoff = setInterval(function () {
    if (x < importantStation.length) {
      var handVal;
      label_station.text = importantStation[x].split(":")[0];
      label_measure.text = importantStation[x].split(":")[1];
      label_val.text = importantStation[x].split(":")[2];
      if (label_val.text != '') {
        handVal = parseFloat(label_val.text);
        label_val.fill = importantStation[x].split(":")[4];

      } else {
        label_val.text = "-";
      }

      label_unit.text = importantStation[x].split(":")[3];
      var animation = new am4core.Animation(hand, {
        property: "value",
        to: handVal
      }, 1300, am4core.ease.cubicOut).start();
      x += 1;
    } else {
      label_val.text = "0" + "%";
      x = 0;
    }
  }, 1000); //interval 1sec

  function randomValue() {
    hand.showValue(Math.random() * 100, 1000, am4core.ease.cubicOut);
    chart.setTimeout(randomValue, 2000);
  } //x
}

//chartdiv6
// based on prepared DOM, initialize echarts instance

function linedotchart() {
  // specify chart configuration item and data
  return option = {

    xAxis: {
      type: 'category',
      name: "月份",
      data: ['NOV', 'DEC', 'JAN', 'FEV', 'MARS', 'AVR', 'JUIN'],
      axisTick: {
        show: false,
      },
      axisLine: {
        lineStyle: {
          color: '#999',
        }
      },
      axisLabel: {
        color: "black",
      }
    },
    yAxis: {
      type: 'value',
      name: "水量",
      splitLine: {
        lineStyle: {
          type: 'dashed',
          color: '#DDD'
        },
        show: true,
      },
      axisTick: {
        show: false,
      },
      axisLine: {
        lineStyle: {
          color: '#999',
        }
      },
      axisLabel: {
        color: "black",
      }
    },

    legend: {
      data: [
        {
          name: '三峽河',
          textStyle: {
            fontWeight: 'bold',
            color: '#01058a'
          }
            },
        {
          name: '鳩山堰',
          textStyle: {
            fontWeight: 'bold',
            color: '#2eb0ee'
          }
            }
        ],
      top: 10,
      right: 100,
      textStyle: {
        verticalAlign: "bottom",
        fontSize: 16,
      },
    },

    series: [
      {
        //            name: '三峽河',
        name: '',
        data: [],
        type: 'line',
        lineStyle: {
          width: 4,
          color: {
            type: 'linear',
            colorStops: [{
              offset: 0,
              color: '#F6D06F' // color at 0% position
                    }, {
              offset: 0.4,
              color: '#f79820' // color at 100% position
                    }, {
              offset: 1,
              color: '#f79820' // color at 100% position
                    }],
            globalCoord: false // 缺省为 false
          },
          shadowColor: 'rgba(249,165,137, 0.5)',
          shadowBlur: 10,
          shadowOffsetY: 7
        },
        itemStyle: {
          normal: {
            color: '#f79820',
            borderWidth: 6,
            borderColor: "#f79820"
          }
        },
        },
      {
        //            name: '鳩山堰',
        name: '',
        data: [],
        type: 'line',
        symbolSize: 10,
        lineStyle: {
          width: 4,
          color: {
            type: 'linear',
            colorStops: [{
              offset: 0,
              color: '#d6e6fc' // color at 0% position
                    }, {
              offset: 0.4,
              color: '#0170fe' // color at 100% position
                    }, {
              offset: 1,
              color: '#0170fe' // color at 100% position
                    }],
            globalCoord: false // 缺省为 false
          },
          shadowColor: 'rgba(1,122,254, 0.5)',
          shadowBlur: 10,
          shadowOffsetY: 7
        },
        itemStyle: {
          normal: {
            color: '#0170fe',
            borderWidth: 6,
            borderColor: "#0170fe"
          }
        },
        }
    ],
    tooltip: {
      show: true,
      formatter: "{c}",
      position: "top",
      transitionDuration: 0,
      alwaysShowContent: true,
    },
  };
}

//chartdiv7
function drop1() {
  return option = {
    title: [
      {
        text: '三峽河',
        // subtext: '123',
        textStyle: {
          fontSize: 18,
          fontFamily: 'Microsoft Yahei',
          fontWeight: '700',
          color: '#6b696a',
        },
        x: '16%',
        y: '85%'
      }, {
        text: '中庄調整池',
        textStyle: {
          fontSize: 18,
          fontFamily: 'Microsoft Yahei',
          fontWeight: '700',
          color: '#6b696a',
        },
        x: '47%',
        y: '85%'
    }, {
        text: '鳶山堰',
        textStyle: {
          fontSize: 18,
          fontFamily: 'Microsoft Yahei',
          fontWeight: '700',
          color: '#6b696a',
        },
        x: '76%',
        y: '85%'
    }],
    graphic: [
    {
      type: 'group',
      left: '18%',
      top: '70%',
      children: [{
        type: 'text',
        z: 100,
        left: 'center',
        top: 'middle',
        title:'123412412',
        style: {
            fill: '#fff',
            text: '0',
            font: '18px Microsoft YaHei',
            fontWeight:'800',
          }
        }]
    }, 
    {
      type: 'group',
      left: '48%',
      top: '70%',
      children: [{
        type: 'text',
        z: 100,
        left: 'center',
        top: 'middle',
        title:'123412412',
        style: {
          fill: '#fff',
          text: '0',
          font: '18px Microsoft YaHei',
          fontWeight:'800'
         }
        }]
    }, 
    {
      type: 'group',
      left: '78%',
      top: '70%',
      children: [{
        type: 'text',
        z: 100,
        left: 'center',
        top: 'middle',
        title:'123412412',
        style: {
          fill: '#fff',
          text: '0',
          font: '18px Microsoft YaHei',
          fontWeight:'800'
         }
        }]
    }],
    series: [
      {
      type: 'liquidFill',
      radius: '60%', //大小
      center: ['20%', '52%'], //位置
      //  shape: 'roundRect',
      data: [0.5, 0.4, 0.7],
      backgroundStyle: {
        color: {
          type: 'linear',
          x: 1,
          y: 0,
          x2: 0.5,
          y2: 1,
          colorStops: [{
            offset: 1,
            color: 'rgba(64, 23, 172, 1)'
                    }, {
            offset: 0.5,
            color: 'rgba(70, 52, 200, 1)'
                    }, {
            offset: 0,
            color: 'rgba(68, 110, 231, 1)'
                    }],
          globalCoord: false
        },
      },
      outline: {
        show: false,
      },
      color: {
        type: 'linear',
        x: 0,
        y: 0,
        x2: 0,
        y2: 1,
        colorStops: [{
          offset: 1,
          color: 'rgba(58, 71, 212, 0)'
                }, {
          offset: 0.5,
          color: 'rgba(31, 222, 225, .2)'
                }, {
          offset: 0,
          color: 'rgba(31, 222, 225, 1)'
                }],
        globalCoord: false
      },
      label: {
        normal: {
          position: ['38%', '40%'],
          formatter: function () {
            return '';
          },
        }
      },
        shape: 'path://M116.75,482.948C116.75,420.083,197.971,319.75,251,251c31.061-40.269,46.25-72.552,46.25-72.552S310.851,210.601,342,251c53.011,68.753,135.75,169.157,135.75,231.948c0,99.688-80.813,180.5-180.5,180.5S116.75,582.636,116.75,482.948'
      }, 
      {
      type: 'liquidFill',
      radius: '60%', //大小
      center: ['50%', '52%'], //位置
      //  shape: 'roundRect',
      data: [0.5, 0.4, 0.7],
      backgroundStyle: {
        color: {
          type: 'linear',
          x: 1,
          y: 0,
          x2: 0.5,
          y2: 1,
          colorStops: [{
            offset: 1,
            color: 'rgba(64, 23, 172, 1)'
                    }, {
            offset: 0.5,
            color: 'rgba(70, 52, 200, 1)'
                    }, {
            offset: 0,
            color: 'rgba(68, 110, 231, 1)'
                    }],
          globalCoord: false
        },
      },
      outline: {
        show: false,
      },
      color: {
        type: 'linear',
        x: 0,
        y: 0,
        x2: 0,
        y2: 1,
        colorStops: [{
          offset: 1,
          color: 'rgba(58, 71, 212, 0)'
                }, {
          offset: 0.5,
          color: 'rgba(31, 222, 225, .2)'
                }, {
          offset: 0,
          color: 'rgba(31, 222, 225, 1)'
                }],
        globalCoord: false
      },
      label: {
        normal: {
          position: ['38%', '40%'],
          formatter: function () {
            return '';
          },
        }
      },
        shape: 'path://M116.75,482.948C116.75,420.083,197.971,319.75,251,251c31.061-40.269,46.25-72.552,46.25-72.552S310.851,210.601,342,251c53.011,68.753,135.75,169.157,135.75,231.948c0,99.688-80.813,180.5-180.5,180.5S116.75,582.636,116.75,482.948'
      }, 
      {
      type: 'liquidFill',
      radius: '60%', //大小
      center: ['80%', '52%'], //位置
      data: [0.5, 0.4, 0.7],
      backgroundStyle: {
        color: {
          type: 'linear',
          x: 1,
          y: 0,
          x2: 0.5,
          y2: 1,
          colorStops: [{
            offset: 1,
            color: 'rgba(64, 23, 172, 1)'
                    }, {
            offset: 0.5,
            color: 'rgba(70, 52, 200, 1)'
                    }, {
            offset: 0,
            color: 'rgba(68, 110, 231, 1)'
                    }],
          globalCoord: false
        },
      },
      outline: {
        show: false,
      },
//      color: ['#29539d', '#4dbaf3', '#6ad7f5'],
      color: {
        type: 'linear',
        x: 0,
        y: 0,
        x2: 0,
        y2: 1,
        colorStops: [{
          offset: 1,
          color: 'rgba(58, 71, 212, 0)'
                }, {
          offset: 0.5,
          color: 'rgba(31, 222, 225, .2)'
                }, {
          offset: 0,
          color: 'rgba(31, 222, 225, 1)'
                }],
        globalCoord: false
      },
      label: {
        normal: {
          formatter: '',
        }
      },
        shape: 'path://M116.75,482.948C116.75,420.083,197.971,319.75,251,251c31.061-40.269,46.25-72.552,46.25-72.552S310.851,210.601,342,251c53.011,68.753,135.75,169.157,135.75,231.948c0,99.688-80.813,180.5-180.5,180.5S116.75,582.636,116.75,482.948'
      }]
  };

}

//chartdiv12
function pool() {
  return option = {
    title: {
      text: "清水池",
      textStyle: {
        fontSize: 16,
        fontFamily: 'Microsoft Yahei',
        fontWeight: 'normal',
        color: '#fff',
      },
      x: '5%',
      y: '5%'
    },
    series: [{
      type: 'liquidFill',
      data: [0.7, 0.5, 0.3],
      shape: 'container',
      color: ['rgba(58, 71, 212, 1)', 'rgba(31, 222, 225, .2)', 'rgba(31, 222, 225, .5)'],
      backgroundStyle: {
        borderWidth: 1,
        color: '#073569'
      },
      outline: {
        show: false
      },
      label: {
        normal: {
          formatter: '90%',
        }
      },
            }],
  };

}
