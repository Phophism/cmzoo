
<!-- pie -->

<script src="assets/amchart/amcharts/amcharts.js"></script>
<script src="assets/amchart/amcharts/pie.js"></script>
<link rel="stylesheet" href="assets/amchart/amcharts/plugins/export/export.css" type="text/css" media="all" />
<script src="assets/amchart/amcharts/themes/dark.js"></script>
<script src="assets/amchart/amcharts/plugins/animate/animate.min.js"></script>

<!-- Chart code -->
<script>
	/* DA */
	var chart = AmCharts.makeChart("percentageDA", {
		"type": "pie",
		"theme": "dark",
		"dataProvider": [{
				"sensor": "Sensor#1",
				"amount": valueD1,
			},
			{
				"sensor": "Sensor#2",
				"amount": valueD2
			},
			{
				"sensor": "Sensor#3",
				"amount": valueD3
			},
			{
				"sensor": "Sensor#4",
				"amount": valueD4
			},
			{
				"sensor": "Sensor#5",
				"amount": valueD5
			},
			{
				"sensor": "Sensor#6",
				"amount": valueD6
			}],
		"valueField": "amount",
		"titleField": "sensor",
		"startDuration": 0,
		"innerRadius": 60,
		"pullOutRadius": 20,
		"marginTop": 30,
		"titles": [{
			"text": "Percentage of Activities" 
		}],
		"allLabels": [{
			"y": "58%",
			"align": "center",
			"amount": 25,
			"bold": true,
			"text": "A",
			"color": "#555"
		}, {
			"y": "53%",
			"align": "center",
			"amount": 15,
            "bold": true,
			"text": "Cage",
			"color": "#555"
		}],
		"export": {
			"enabled": true
		}
	});

	/* DB */
	var chart = AmCharts.makeChart("percentageDB", {
		"type": "pie",
		"theme": "dark",
		"dataProvider": [{
				"sensor": "Sensor#1",
				"amount": valueD7
			},
			{
				"sensor": "Sensor#2",
				"amount": valueD8
			},
			{
				"sensor": "Sensor#3",
				"amount": valueD9
			},
			{
				"sensor": "Sensor#4",
				"amount": valueD10
			}],
		"valueField": "amount",
		"titleField": "sensor",
		"startDuration": 0,
		"innerRadius": 60,
		"pullOutRadius": 20,
		"marginTop": 30,
		"titles": [{
			"text": "Percentage of Activities" 
		}],
		"allLabels": [{
			"y": "58%",
			"align": "center",
			"amount": 25,
			"bold": true,
			"text": "A",
			"color": "#555"
		}, {
			"y": "53%",
			"align": "center",
			"amount": 15,
            "bold": true,
			"text": "Cage",
			"color": "#555"
		}],
		"export": {
			"enabled": true
		}
	});

    	/*NA */
	var chart = AmCharts.makeChart("percentageNA", {
		"type": "pie",
		"theme": "dark",
		"dataProvider": [{
				"sensor": "Sensor#1",
				"amount": valueN1
			},
			{
				"sensor": "Sensor#2",
				"amount": valueN2
			},
			{
				"sensor": "Sensor#3",
				"amount": valueN3
			},
			{
				"sensor": "Sensor#4",
				"amount": valueN4
			},
			{
				"sensor": "Sensor#5",
				"amount": valueN5
			},
			{
				"sensor": "Sensor#6",
				"amount": valueN6
			}],
		"valueField": "amount",
		"titleField": "sensor",
		"startDuration": 0,
		"innerRadius": 60,
		"pullOutRadius": 20,
		"marginTop": 30,
		"titles": [{
			"text": "Percentage of Activities" 
		}],
		"allLabels": [{
			"y": "58%",
			"align": "center",
			"amount": 25,
			"bold": true,
			"text": "B",
			"color": "#555"
		}, {
			"y": "53%",
			"align": "center",
			"amount": 15,
            "bold": true,
			"text": "Cage",
			"color": "#555"
		}],
		"export": {
			"enabled": true
		}
	});

    	/* NB */
	var chart = AmCharts.makeChart("percentageNB", {
		"type": "pie",
		"theme": "dark",
		"dataProvider": [{
				"sensor": "Sensor#1",
				"amount": valueN7
			},
			{
				"sensor": "Sensor#2",
				"amount": valueN8
			},
			{
				"sensor": "Sensor#3",
				"amount": valueN9
			},
			{
				"sensor": "Sensor#4",
				"amount": valueN10
			}],
		"valueField": "amount",
		"titleField": "sensor",
		"startDuration": 0,
		"innerRadius": 60,
		"pullOutRadius": 20,
		"marginTop": 30,
		"titles": [{
			"text": "Percentage of Activities" 
		}],
		"allLabels": [{
			"y": "58%",
			"align": "center",
			"amount": 25,
			"bold": true,
			"text": "B",
			"color": "#555"
		}, {
			"y": "53%",
			"align": "center",
			"amount": 15,
            "bold": true,
			"text": "Cage",
			"color": "#555"
		}],
		"export": {
			"enabled": true
		}
	});




</script>
