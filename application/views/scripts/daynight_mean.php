
<script >
// <!-- DA -->
	var chart = AmCharts.makeChart("chartMeanDA", {
		"type": "serial",
		"theme": "dark",

		"fontFamily": "Lato",
		"autoMargins": true,
		"addClassNames": true,
		"zoomOutText": "",
		"defs": {
			"filter": [{
					"x": "-50%",
					"y": "-50%",
					"width": "200%",
					"height": "200%",
					"id": "blur",
					"feGaussianBlur": {
						"in": "SourceGraphic",
						"stdDeviation": sdD1
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
						"stdDeviation":  sdD1
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
		"fontSize": 12,
		"pathToImages": "../amcharts/images/",
		"dataProvider": [{
			"node": "",
			"max": 0,
			"min": 0,
		}, {
			"node": "Sensor#1",
			"max": maxD1,
			"min": minD1,
			"mean": meanD1

		}, {
			"node": "Sensor#2",
			"max": maxD2,
			"min": minD2,
			"mean": meanD2

		}, {
			"node": "Sensor#3",
			"max": maxD3,
			"min": minD3,
			"mean": meanD3
		}, {
			"node": "Sensor#4",
			"max": maxD4,
			"min": minD4,
			"mean": meanD4
		}, {
			"node": "Sensor#5",
			"max": maxD5,
			"min": minD5,
			"mean": meanD5
		}, {
			"node": "Sensor#6",
			"max": maxD6,
			"min": minD6,
			"mean": meanD6
		}, {
			"node": "",
			"max": 0,
			"min": 0,
		}],
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
		"valueAxes": [{
			"ignoreAxisWidth": true,
			"stackType": "regular",
			"gridAlpha": 0.07,
			"axisAlpha": 0,
			"inside": true
		}],
		"graphs": [{
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
			"cursorColor": "#8d83c8",
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




// <!-- DB -->

	var chart = AmCharts.makeChart("chartMeanDB", {
		"type": "serial",
		"theme": "dark",

		"fontFamily": "Lato",
		"autoMargins": true,
		"addClassNames": true,
		"zoomOutText": "",
		"defs": {
			"filter": [{
					"x": "-50%",
					"y": "-50%",
					"width": "200%",
					"height": "200%",
					"id": "blur",
					"feGaussianBlur": {
						"in": "SourceGraphic",
						"stdDeviation": "10"
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
						"stdDeviation": "10"
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
		"fontSize": 12,
		"pathToImages": "../amcharts/images/",
		"dataProvider": [{
			"node": "",
			"max": 0,
			"min": 0,

		}, {
			"node": "Sensor#7",
			"max": maxD7,
			"min": minD7,
			"mean": meanD7

		}, {
			"node": "Sensor#8",
			"max": maxD8,
			"min": minD8,
			"mean": meanD8

		}, {
			"node": "Sensor#9",
			"max": maxD9,
			"min": minD9,
			"mean": meanD9
		}, {
			"node": "Sensor#10",
			"max": maxD10,
			"min": minD10,
			"mean": meanD10
		}, {
			"node": "",
			"max": 0,
			"min": 0,
		}],
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
		"valueAxes": [{
			"ignoreAxisWidth": true,
			"stackType": "regular",
			"gridAlpha": 0.07,
			"axisAlpha": 0,
			"inside": true
		}],
		"graphs": [{
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
			"cursorColor": "#8d83c8",
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




// <!-- NA -->

	var chart = AmCharts.makeChart("chartMeanNA", {
		"type": "serial",
		"theme": "dark",

		"fontFamily": "Lato",
		"autoMargins": true,
		"addClassNames": true,
		"zoomOutText": "",
		"defs": {
			"filter": [{
					"x": "-50%",
					"y": "-50%",
					"width": "200%",
					"height": "200%",
					"id": "blur",
					"feGaussianBlur": {
						"in": "SourceGraphic",
						"stdDeviation": "10"
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
						"stdDeviation": "10"
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
		"fontSize": 12,
		"pathToImages": "../amcharts/images/",
		"dataProvider": [{
			"node": "",
			"max": 0,
			"min": 0,

		}, {
			"node": "Sensor#1",
			"max": maxN1,
			"min": minN1,
			"mean": meanN1

		}, {
			"node": "Sensor#2",
			"max": maxN2,
			"min": minN2,
			"mean": meanN2

		}, {
			"node": "Sensor#3",
			"max": maxN3,
			"min": minN3,
			"mean": meanN3
		}, {
			"node": "Sensor#4",
			"max": maxN4,
			"min": minN4,
			"mean": meanN4
		}, {
			"node": "Sensor#5",
			"max": maxN5,
			"min": minN5,
			"mean": meanN5
		}, {
			"node": "Sensor#6",
			"max": maxN6,
			"min": minN6,
			"mean": meanN6
		}, {
			"node": "",
			"max": 0,
			"min": 0,
		}],
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
		"valueAxes": [{
			"ignoreAxisWidth": true,
			"stackType": "regular",
			"gridAlpha": 0.07,
			"axisAlpha": 0,
			"inside": true
		}],
		"graphs": [{
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
			"cursorColor": "#8d83c8",
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



// <!-- NB -->

	var chart = AmCharts.makeChart("chartMeanNB", {
		"type": "serial",
		"theme": "dark",

		"fontFamily": "Lato",
		"autoMargins": true,
		"addClassNames": true,
		"zoomOutText": "",
		"defs": {
			"filter": [{
					"x": "-50%",
					"y": "-50%",
					"width": "200%",
					"height": "200%",
					"id": "blur",
					"feGaussianBlur": {
						"in": "SourceGraphic",
						"stdDeviation": "10"
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
						"stdDeviation": "10"
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
		"fontSize": 12,
		"pathToImages": "../amcharts/images/",
		"dataProvider": [{
			"node": "",
			"max": 0,
			"min": 0,

		}, {
			"node": "Sensor#7",
			"max": maxN7,
			"min": minN7,
			"mean": meanN7

		}, {
			"node": "Sensor#8",
			"max": maxN8,
			"min": minN8,
			"mean": meanN8

		}, {
			"node": "Sensor#9",
			"max": maxN9,
			"min": minN9,
			"mean": meanN9
		}, {
			"node": "Sensor#10",
			"max": maxN10,
			"min": minN10,
			"mean": meanN10
		}, {
			"node": "",
			"max": 0,
			"min": 0,
		}],
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
		"valueAxes": [{
			"ignoreAxisWidth": true,
			"stackType": "regular",
			"gridAlpha": 0.07,
			"axisAlpha": 0,
			"inside": true
		}],
		"graphs": [{
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
			"cursorColor": "#8d83c8",
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

function zoomChart() {
	chart.zoomToIndexes(1, chartData.length - 2);
}

</script>

