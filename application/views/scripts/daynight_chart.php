<!-- Chart Day&Night -->

<script src="assets/amchart/amcharts/amcharts.js"></script>
<script src="assets/amchart/amcharts/serial.js"></script>
<script src="assets/amchart/amcharts/plugins/export/export.min.js"></script>
<script src="assets/amchart/amcharts/themes/light.js"></script>

<!-- Standdard Diviation -->
<script>
	var chart = AmCharts.makeChart("sdLine", {
		"type": "serial",
		"theme": "light",
		"dataProvider": [{
			"year": 2005,
			"value": 11.5,
			"error": 5
		}, {
			"year": 2006,
			"value": 26.2,
			"error": 5
		}, {
			"year": 2007,
			"value": 30.1,
			"error": 5
		}, {
			"year": 2008,
			"value": 29.5,
			"error": 7
		}, {
			"year": 2009,
			"value": 24.6,
			"error": 10
		}],
		"balloon": {
			"textAlign": "left"
		},
		"valueAxes": [{
			"id": "v1",
			"axisAlpha": 0
		}],
		"startDuration": 1,
		"graphs": [{
			"balloonText": "value:<b>[[value]]</b><br>error:<b>[[error]]</b>",
			"bullet": "yError",
			"bulletamount": 10,
			"errorField": "error",
			"lineThickness": 2,
			"valueField": "value",
			"bulletAxis": "v1",
			"fillAlphas": 0
		}, {
			"bullet": "round",
			"bulletBorderAlpha": 1,
			"bulletBorderColor": "#FFFFFF",
			"lineAlpha": 0,
			"lineThickness": 2,
			"showBalloon": false,
			"valueField": "value"

		}],
		"chartCursor": {
			"cursorAlpha": 0,
			"cursorPosition": "mouse",
			"graphBulletamount": 1,
			"zoomable": false
		},
		"categoryField": "year",
		"categoryAxis": {
			"gridPosition": "start",
			"axisAlpha": 0
		},
		"export": {
			"enabled": true
		}
	});

</script>







<!-- pie -->

<script src="assets/amchart/amcharts/amcharts.js"></script>
<script src="assets/amchart/amcharts/pie.js"></script>
<link rel="stylesheet" href="assets/amchart/amcharts/plugins/export/export.css" type="text/css" media="all" />
<script src="assets/amchart/amcharts/themes/dark.js"></script>
<script src="assets/amchart/amcharts/plugins/animate/animate.min.js"></script>

<!-- Chart code -->
<script>
	/**
	 * Define data for each sensor
	 */
	var chartData = {
		"1": [{
				"sensor": "Sensor#1",
				"amount": 66
			},
			{
				"sensor": "Sensor#2",
				"amount": 6
			},
			{
				"sensor": "Sensor#3",
				"amount": 23
			},
			{
				"sensor": "Sensor#4",
				"amount": 40
			},
			{
				"sensor": "Sensor#5",
				"amount": 70
			},
			{
				"sensor": "Sensor#6",
				"amount": 90
			}
		],
		"2": [{
				"sensor": "Sensor#1",
				"amount": 67
			},
			{
				"sensor": "Sensor#2",
				"amount": 50
			},
			{
				"sensor": "Sensor#3",
				"amount": 34
			},
			{
				"sensor": "Sensor#4",
				"amount": 50
			},
			{
				"sensor": "Sensor#5",
				"amount": 75
			},
			{
				"sensor": "Sensor#6",
				"amount": 97
			}
		]
	};

	/**
	 * Create the chart
	 */
	var currentYear = 1;
	var chart = AmCharts.makeChart("percentile", {
		"type": "pie",
		"theme": "white",
		"dataProvider": [],
		"valueField": "amount",
		"titleField": "sensor",
		"startDuration": 0,
		"innerRadius": 60,
		"pullOutRadius": 20,
		"marginTop": 30,
		"titles": [{
			"text": "South African Economy"
		}],
		"allLabels": [{
			"y": "58%",
			"align": "center",
			"amount": 25,
			"bold": true,
			"text": "Day1",
			"color": "#555"
		}, {
			"y": "53%",
			"align": "center",
			"amount": 15,
			"text": "Day",
			"color": "#555"
		}],
		"listeners": [{
			"event": "init",
			"method": function (e) {
				var chart = e.chart;

				function getCurrentData() {
					var data = chartData[currentYear];
					currentYear++;
					if (currentYear > 2)
						currentYear = 1;
					return data;
				}

				function loop() {
					chart.allLabels[0].text = currentYear;
					var data = getCurrentData();
					chart.animateData(data, {
						duration: 1000,
						complete: function () {
							setTimeout(loop, 5000);
						}
					});
				}

				loop();
			}
		}],
		"export": {
			"enabled": true
		}
	});

</script>


<!-- # of act -->
<script>
var chart = AmCharts.makeChart("numAct",
{
    "type": "serial",
    "theme": "white",
    "dataProvider": [{
        "name": "Sensor #1",
        "points": 345,
        "color": "#7F8DA9",
        "bullet": "https://www.amcharts.com/lib/images/faces/A04.png"
    }, {
        "name": "Sensor #2",
        "points": 234,
        "color": "#FEC514",
        "bullet": "https://www.amcharts.com/lib/images/faces/C02.png"
    }, {
        "name": "Sensor #3",
        "points": 125,
        "color": "#DB4C3C",
        "bullet": "https://www.amcharts.com/lib/images/faces/D02.png"
    }, {
        "name": "Sensor #4",
        "points": 521,
        "color": "#DAF0FD",
        "bullet": "https://www.amcharts.com/lib/images/faces/E01.png"
    }, {
        "name": "Sensor #5",
        "points": 426,
        "color": "#FEC552",
        "bullet": "https://www.amcharts.com/lib/images/faces/C02.png"
    }, {
        "name": "Sensor #6",
        "points": 416,
        "color": "#DB4C1A",
        "bullet": "https://www.amcharts.com/lib/images/faces/D02.png"
    }],
    "valueAxes": [{
        "maximum": 1000,
        "minimum": 0,
        "axisAlpha": 0,
        "dashLength": 4,
        "position": "left"
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]]</b></span>",
        "bulletOffset": 10,
        "bulletSize": 52,
        "colorField": "color",
        "cornerRadiusTop": 8,
        "customBulletField": "bullet",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "type": "column",
        "valueField": "points"
    }],
    "marginTop": 0,
    "marginRight": 0,
    "marginLeft": 0,
    "marginBottom": 0,
    "autoMargins": false,
    "categoryField": "name",
    "categoryAxis": {
        "axisAlpha": 0,
        "gridAlpha": 0,
        "inside": true,
        "tickLength": 0
    },
    "export": {
    	"enabled": true
     }
});
</script>
