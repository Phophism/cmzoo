
<!-- Standdard Diviation -->
<script>
	var chart = AmCharts.makeChart("sdLine", {
		"type": "serial",
		"theme": "light",
		"dataProvider": [{
			"node": "S#1",
			"mean": meanD1,
			"error": sdD1
		}, {
			"node": "S#2",
			"mean": meanD2,
			"error": sdD2
		}, {
			"node": "S#3",
			"mean": meanD3,
			"error": sdD3
		}, {
			"node": "S#4",
			"mean": meanD4,
			"error": sdD4
		},{
			"node": "S#5",
			"mean": meanD5,
			"error": sdD5
		},{
			"node": "S#6",
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
			"balloonText": "value:<b>[[value]]</b><br>error:<b>[[error]]</b>",
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
