
<!-- radar -->

<script>
	var chart = AmCharts.makeChart("reportRadar", {
		"type": "radar",
		"theme": "light",
		"dataProvider": [{
			"sensor": "sensor #1",
			"amount": value1
		}, {
			"sensor": "sensor #2",
			"amount": value2
		}, {
			"sensor": "sensor #3",
			"amount": value3
		}, {
			"sensor": "sensor #4",
			"amount": value4
		}, {
			"sensor": "sensor #5",
			"amount": value5
		}, {
			"sensor": "sensor #6",
			"amount": value6
		}, {
			"sensor": "sensor #7",
			"amount": value7
		}, {
			"sensor": "sensor #8",
			"amount": value8
		}, {
			"sensor": "sensor #9",
			"amount": value9
		}, {
			"sensor": "sensor #10",
			"amount": value10
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
				"toValue": ((maxActivity+10)/10)*10,
				"value": 0,
				"lineAlpha": 0,
			}, {
				"angle": 107.5,
				"fillAlpha": 0.3,
				"fillColor": "#CC3333",
				"tickLength": 0,
				"toAngle": 252.5,
				"toValue": ((maxActivity+10)/10)*10,
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