<script src="assets/amchart/amcharts/amcharts.js"></script>
<script src="assets/amchart/amcharts/radar.js"></script>
<script src="assets/amchart/amcharts/serial.js"></script>
<script src="assets/amchart/amcharts/themes/light.js"></script>


<!-- radar -->

<script>
	var chart = AmCharts.makeChart("reportRadar", {
		"type": "radar",
		"theme": "light",
		"dataProvider": [{
			"sensor": "sensor #1",
			"amount": 156
		}, {
			"sensor": "sensor #2",
			"amount": 131
		}, {
			"sensor": "sensor #3",
			"amount": 115
		}, {
			"sensor": "sensor #4",
			"amount": 109
		}, {
			"sensor": "sensor #5",
			"amount": 108
		}, {
			"sensor": "sensor #6",
			"amount": 99
		}, {
			"sensor": "sensor #7",
			"amount": 115
		}, {
			"sensor": "sensor #8",
			"amount": 109
		}, {
			"sensor": "sensor #9",
			"amount": 108
		}, {
			"sensor": "sensor #10",
			"amount": 99
		}],
		"valueAxes": [{
			"gridType": "circles",
			"minimum": 0,
			"autoGridCount": false,
			"axisAlpha": 0.2,
			"fillAlpha": 0.05,
			"fillColor": "#FFFFFF",
			"gridAlpha": 0.08,
			"guides": [{
				"angle": -107.5,
				"fillAlpha": 0.3,
				"fillColor": "#0066CC",
				"tickLength": 0,
				"toAngle": 107.5,
				"toValue": 199,
				"value": 0,
				"lineAlpha": 0,
			}, {
				"angle": 107.5,
				"fillAlpha": 0.3,
				"fillColor": "#CC3333",
				"tickLength": 0,
				"toAngle": 252.5,
				"toValue": 199,
				"value": 0,
				"lineAlpha": 0,
			}],
			"position": "left"
		}],
		"startDuration": 2,
		"graphs": [{
			"balloonText": "Total amount of activity : [[value]]",
			"bullet": "round",
			"lineThickness": 2,
			"valueField": "amount"
		}],
		"categoryField": "sensor",
		"export": {
			"enabled": true
		}
	});

</script>



<!-- Line Amount -->

<script>
	AmCharts.makeChart("lineAmount", {
		"type": "serial",
		"dataProvider": [{
			"day": 1,
			"value": 120
		}, {
			"day": 2,
			"value": 54
		}, {
			"day": 3,
			"value": -18
		}, {
			"day": 4,
			"value": -12
		}, {
			"day": 5,
			"value": -51
		}, {
			"day": 6,
			"value": 12
		}, {
			"day": 7,
			"value": 56
		}, {
			"day": 8,
			"value": 113
		}, {
			"day": 9,
			"value": 142
		}, {
			"day": 10,
			"value": 125
		}],
		"categoryField": "day",
		"autoMargins": false,
		"marginLeft": 0,
		"marginRight": 5,
		"marginTop": 0,
		"marginBottom": 0,
		"graphs": [{
			"valueField": "value",
			"showBalloon": false,
			"lineColor": "#ffbf63",
			"negativeLineColor": "#289eaf"
		}],
		"valueAxes": [{
			"gridAlpha": 0,
			"axisAlpha": 0,
			"guides": [{
				"value": 0,
				"lineAlpha": 0.1
			}]
		}],
		"categoryAxis": {
			"gridAlpha": 0,
			"axisAlpha": 0,
			"startOnAxis": true
		}
	});

</script>

<!-- Line Amount -->

<script>
	AmCharts.makeChart("lineTemp", {
		"type": "serial",
		"dataProvider": [{
			"day": 1,
			"value": 120
		}, {
			"day": 2,
			"value": 54
		}, {
			"day": 3,
			"value": -18
		}, {
			"day": 4,
			"value": -12
		}, {
			"day": 5,
			"value": -51
		}, {
			"day": 6,
			"value": 12
		}, {
			"day": 7,
			"value": 56
		}, {
			"day": 8,
			"value": 113
		}, {
			"day": 9,
			"value": 142
		}, {
			"day": 10,
			"value": 125
		}],
		"categoryField": "day",
		"autoMargins": false,
		"marginLeft": 0,
		"marginRight": 5,
		"marginTop": 0,
		"marginBottom": 0,
		"graphs": [{
			"valueField": "value",
			"showBalloon": false,
			"lineColor": "#ffbf63",
			"negativeLineColor": "#289eaf"
		}],
		"valueAxes": [{
			"gridAlpha": 0,
			"axisAlpha": 0,
			"guides": [{
				"value": 0,
				"lineAlpha": 0.1
			}]
		}],
		"categoryAxis": {
			"gridAlpha": 0,
			"axisAlpha": 0,
			"startOnAxis": true
		}
	});

</script>

<!-- Line Amount -->

<script>
	AmCharts.makeChart("lineLight", {
		"type": "serial",
		"dataProvider": [{
			"day": 1,
			"value": 120
		}, {
			"day": 2,
			"value": 54
		}, {
			"day": 3,
			"value": -18
		}, {
			"day": 4,
			"value": -12
		}, {
			"day": 5,
			"value": -51
		}, {
			"day": 6,
			"value": 12
		}, {
			"day": 7,
			"value": 56
		}, {
			"day": 8,
			"value": 113
		}, {
			"day": 9,
			"value": 142
		}, {
			"day": 10,
			"value": 125
		}],
		"categoryField": "day",
		"autoMargins": false,
		"marginLeft": 0,
		"marginRight": 5,
		"marginTop": 0,
		"marginBottom": 0,
		"graphs": [{
			"valueField": "value",
			"showBalloon": false,
			"lineColor": "#ffbf63",
			"negativeLineColor": "#289eaf"
		}],
		"valueAxes": [{
			"gridAlpha": 0,
			"axisAlpha": 0,
			"guides": [{
				"value": 0,
				"lineAlpha": 0.1
			}]
		}],
		"categoryAxis": {
			"gridAlpha": 0,
			"axisAlpha": 0,
			"startOnAxis": true
		}
	});

</script>

<!-- Line Amount -->

<script>
	AmCharts.makeChart("lineHumid", {
		"type": "serial",
		"dataProvider": [{
			"day": 1,
			"value": 120
		}, {
			"day": 2,
			"value": 54
		}, {
			"day": 3,
			"value": -18
		}, {
			"day": 4,
			"value": -12
		}, {
			"day": 5,
			"value": -51
		}, {
			"day": 6,
			"value": 12
		}, {
			"day": 7,
			"value": 56
		}, {
			"day": 8,
			"value": 113
		}, {
			"day": 9,
			"value": 142
		}, {
			"day": 10,
			"value": 125
		}],
		"categoryField": "day",
		"autoMargins": false,
		"marginLeft": 0,
		"marginRight": 5,
		"marginTop": 0,
		"marginBottom": 0,
		"graphs": [{
			"valueField": "value",
			"showBalloon": false,
			"lineColor": "#ffbf63",
			"negativeLineColor": "#289eaf"
		}],
		"valueAxes": [{
			"gridAlpha": 0,
			"axisAlpha": 0,
			"guides": [{
				"value": 0,
				"lineAlpha": 0.1
			}]
		}],
		"categoryAxis": {
			"gridAlpha": 0,
			"axisAlpha": 0,
			"startOnAxis": true
		}
	});

</script>


<!-- datepicker -->

<script type="text/javascript">
	function change() {
		document.getElementById("dateForm").submit();
		console.log($("#date").val());
	}

</script>
