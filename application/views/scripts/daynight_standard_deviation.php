
<!-- Standdard Diviation -->
<script>
	// -----DA----- //
	var chart = AmCharts.makeChart("sdLineDA", {
		"type": "serial",
		"theme": "dark",
		"dataProvider": [{
			"node": "Sensor#1",
			"mean": meanD1,
			"error": sdD1
		}, {
			"node": "Sensor#2",
			"mean": meanD2,
			"error": sdD2
		}, {
			"node": "Sensor#3",
			"mean": meanD3,
			"error": sdD3
		}, {
			"node": "Sensor#4",
			"mean": meanD4,
			"error": sdD4
		},{
			"node": "Sensor#5",
			"mean": meanD5,
			"error": sdD5
		},{
			"node": "Sensor#6",
			"mean": meanD6,
			"error": sdD6
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
			"balloonText": "Mean:<b>[[value]]</b><br>error:<b>[[error]]</b>",
			"bullet": "yError",
			"bulletamount": 10,
			"errorField": "error",
			"lineThickness": 2,
			"valueField": "mean",
			"bulletAxis": "v1",
			"fillAlphas": 0
		}, {
			"bullet": "round",
			"bulletBorderAlpha": 1,
			"bulletBorderColor": "#FFFFFF",
			"lineAlpha": 0,
			"lineThickness": 2,
			"showBalloon": false,
			"valueField": "mean"

		}],
		"chartCursor": {
			"cursorAlpha": 0,
			"cursorPosition": "mouse",
			"graphBulletamount": 1,
			"zoomable": false
		},
		"categoryField": "node",
		"categoryAxis": {
			"gridPosition": "start",
			"axisAlpha": 0
		},
		"export": {
			"enabled": true
		}
	});

	// -----DB----- //
	var chart = AmCharts.makeChart("sdLineDB", {
		"type": "serial",
		"theme": "dark",
		"dataProvider": [{
			"node": "Sensor#7",
			"mean": meanD7,
			"error": sdD7
		}, {
			"node": "Sensor#8",
			"mean": meanD8,
			"error": sdD8
		}, {
			"node": "Sensor#9",
			"mean": meanD9,
			"error": sdD9
		},{
			"node": "Sensor#10",
			"mean": meanD10,
			"error": sdD10
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
			"balloonText": "Mean:<b>[[value]]</b><br>error:<b>[[error]]</b>",
			"bullet": "yError",
			"bulletamount": 10,
			"errorField": "error",
			"lineThickness": 2,
			"valueField": "mean",
			"bulletAxis": "v1",
			"fillAlphas": 0
		}, {
			"bullet": "round",
			"bulletBorderAlpha": 1,
			"bulletBorderColor": "#FFFFFF",
			"lineAlpha": 0,
			"lineThickness": 2,
			"showBalloon": false,
			"valueField": "mean"

		}],
		"chartCursor": {
			"cursorAlpha": 0,
			"cursorPosition": "mouse",
			"graphBulletamount": 1,
			"zoomable": false
		},
		"categoryField": "node",
		"categoryAxis": {
			"gridPosition": "start",
			"axisAlpha": 0
		},
		"export": {
			"enabled": true
		}
	});


// -----NA----- //
var chart = AmCharts.makeChart("sdLineNA", {
		"type": "serial",
		"theme": "dark",
		"dataProvider": [{
			"node": "Sensor#1",
			"mean": meanN1,
			"error": sdN1
		}, {
			"node": "Sensor#2",
			"mean": meanN2,
			"error": sdN2
		}, {
			"node": "Sensor#3",
			"mean": meanN3,
			"error": sdN3
		}, {
			"node": "Sensor#4",
			"mean": meanN4,
			"error": sdN4
		},{
			"node": "Sensor#5",
			"mean": meanN5,
			"error": sdN5
		},{
			"node": "Sensor#6",
			"mean": meanN6,
			"error": sdN6
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
			"balloonText": "Mean:<b>[[value]]</b><br>error:<b>[[error]]</b>",
			"bullet": "yError",
			"bulletamount": 10,
			"errorField": "error",
			"lineThickness": 2,
			"valueField": "mean",
			"bulletAxis": "v1",
			"fillAlphas": 0
		}, {
			"bullet": "round",
			"bulletBorderAlpha": 1,
			"bulletBorderColor": "#FFFFFF",
			"lineAlpha": 0,
			"lineThickness": 2,
			"showBalloon": false,
			"valueField": "mean"

		}],
		"chartCursor": {
			"cursorAlpha": 0,
			"cursorPosition": "mouse",
			"graphBulletamount": 1,
			"zoomable": false
		},
		"categoryField": "node",
		"categoryAxis": {
			"gridPosition": "start",
			"axisAlpha": 0
		},
		"export": {
			"enabled": true
		}
	});

	// -----NB----- //
	var chart = AmCharts.makeChart("sdLineNB", {
		"type": "serial",
		"theme": "dark",
		"dataProvider": [{
			"node": "Sensor#7",
			"mean": meanN7,
			"error": sdN7
		}, {
			"node": "Sensor#8",
			"mean": meanN8,
			"error": sdN8
		}, {
			"node": "Sensor#9",
			"mean": meanN9,
			"error": sdN9
		},{
			"node": "Sensor#10",
			"mean": meanN10,
			"error": sdN10
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
			"balloonText": "Mean:<b>[[value]]</b><br>error:<b>[[error]]</b>",
			"bullet": "yError",
			"bulletamount": 10,
			"errorField": "error",
			"lineThickness": 2,
			"valueField": "mean",
			"bulletAxis": "v1",
			"fillAlphas": 0
		}, {
			"bullet": "round",
			"bulletBorderAlpha": 1,
			"bulletBorderColor": "#FFFFFF",
			"lineAlpha": 0,
			"lineThickness": 2,
			"showBalloon": false,
			"valueField": "mean"

		}],
		"chartCursor": {
			"cursorAlpha": 0,
			"cursorPosition": "mouse",
			"graphBulletamount": 1,
			"zoomable": false
		},
		"categoryField": "node",
		"categoryAxis": {
			"gridPosition": "start",
			"axisAlpha": 0
		},
		"export": {
			"enabled": true
		}
	});

</script>
