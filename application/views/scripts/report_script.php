<script src="assets/amchart/amcharts/amcharts.js"></script>
<script src="assets/amchart/amcharts/radar.js"></script>
<script src="assets/amchart/amcharts/serial.js"></script>
<script src="assets/amchart/amcharts/plugins/export/export.min.js"></script>
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
		},{
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
        "valueAxes": [ {
            "gridType": "circles",
            "minimum": 0,
            "autoGridCount": false,
            "axisAlpha": 0.2,
            "fillAlpha": 0.05,
            "fillColor": "#FFFFFF",
            "gridAlpha": 0.08,
            "guides": [ {
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
              "toAngle": 252.5 , 
              "toValue": 199,
              "value": 0,
              "lineAlpha": 0,
            } ],
            "position": "left"
          } ],
		"startDuration": 2,
		"graphs": [{
			"balloonText": "[[value]] amount of beer per year",
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



<script src="node_modules/chart.js/dist/Chart.js"></script>

<!-- Line Amount -->




<!-- datepicker -->

<script type="text/javascript">

	function change(){
		document.getElementById("dateForm").submit();
		console.log($("#date").val());
	}
    
</script>