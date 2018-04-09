<!-- Chart code -->
<script>
var chartData = [{
   "node": " ",
       "max": 1000,
       "min": 1000,
       
},{
   "node": "1",
        "max": 1000,
        "min": 1000,
        "mean": 1000

},{
   "node": "2",
        "max": 1000,
        "min": 1000,
        "mean": 1000

}, {
   "node": "3",
        "max": maxD3,
        "min": minD3,
        "mean": meanD3
}, {
   "node": "4",
        "max": maxD4,
        "min": minD4,
        "mean": meanD4
}, {
   "node": "5",
        "max": maxD5,
        "min": minD5,
        "mean": meanD5
}, {
   "node": "6",
        "max": maxD6,
        "min": minD6,
        "mean": meanD6
},{
   "node": " ",
        "max": maxD7,
        "min": minD7,
}];

var chart =  AmCharts.makeChart("chartMean", {
    "type": "serial",
    "theme": "light",

    "fontFamily": "Lato",
    "autoMargins": true,
    "addClassNames": true,
    "zoomOutText": "",
    "defs": {
        "filter": [
            {
                "x": "-50%",
                "y": "-50%",
                "width": "200%",
                "height": "200%",
                "id": "blur",
                "feGaussianBlur": {
                    "in": "SourceGraphic",
                    "stdDeviation": "80"
                }
            },
            {
                "id": "shadow",
                "width": "150%",
                "height": "150%",
                "feOffset": {
                    "result": "offOut",
                    "in": "SourceAlpha",
                    "dx": "2",
                    "dy": "2"
                },
                "feGaussianBlur": {
                    "result": "blurOut",
                    "in": "offOut",
                    "stdDeviation": "90"
                },
                "feColorMatrix": {
                    "result": "blurOut",
                    "type": "matrix",
                    "values": " 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 .2 0"
                },
                "feBlend": {
                    "in": "SourceGraphic",
                    "in2": "blurOut",
                    "mode": "normal"
                }
            }
        ]
    },
    "fontSize": 15,
    "pathToImages": "../amcharts/images/",
    "dataProvider": chartData,
    "marginTop": 0,
    "marginRight": 1,
    "marginLeft": 0,
    "autoMarginOffset": 5,
    "categoryField": "node",
    "categoryAxis": {
        "gridAlpha": 0.1,
        "axisColor": "#DADADA",
        "startOnAxis": true,
        "tickLength": 0,
        "parseDates": false
    },
    "valueAxes": [
        {
            "ignoreAxisWidth":true,
            "stackType": "regular",
            "gridAlpha": 0.07,
            "axisAlpha": 0,
            "inside": true
        }
    ],
    "graphs": [
        {
            "id": "g1",
            "type": "line",
            "title": "Max",
            "valueField": "max",
            "fillColors": [
                "#0066e3",
                "#802ea9"
            ],
            "lineAlpha": 0,
            "fillAlphas": 0.8,
            "showBalloon": false
        },
        {
            "id": "g2",
            "type": "line",
            "title": "Min",
            "valueField": "min",
            "lineAlpha": 0,
            "fillAlphas": 0.8,
            "lineColor": "#5bb5ea",
            "showBalloon": false
        },
        {
            "id": "g3",
            "title": "Mean",
            "valueField": "mean",
            "lineAlpha": 0.5,
            "lineColor": "#FFFFFF",
            "bullet": "round",
            "dashLength": 2,
            "bulletBorderAlpha": 1,
            "bulletAlpha": 1,
            "bulletSize": 15,
            "stackable": false,
            "bulletColor": "#5d7ad9",
            "bulletBorderColor": "#FFFFFF",
            "bulletBorderThickness": 3,
            "balloonText": "<div style='margin-bottom:30px;text-shadow: 2px 2px rgba(0, 0, 0, 0.1); font-weight:200;font-size:30px; color:#ffffff'>[[value]]</div>"
        }
    ],
    "chartCursor": {
        "cursorAlpha": 1,
        "zoomable": false,
        "cursorColor": "#FFFFFF",
        "categoryBalloonColor": "#8d83c8",
        "fullWidth": true,
        "balloonPointerOrientation": "vertical"
    },
    "balloon": {
        "borderAlpha": 0,
        "fillAlpha": 0,
        "shadowAlpha": 0,
        "offsetX": 40,
        "offsetY": -50
    }
});

// we zoom chart in order to have better blur (form side to side)
chart.addListener("dataUpdated", zoomChart);

function zoomChart(){
    chart.zoomToIndexes(1, chartData.length - 2);
}

</script>