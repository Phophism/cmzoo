

<!-- # of act -->

<script>

// ********************** DA ***********************//
var chart = AmCharts.makeChart("numActDayA",
{
    "type": "serial",
    "theme": "light",
    "dataProvider": [{
        "name": "Sensor #1",
		"activities":valueD1,
        "color": "#7F8DA9",
        "bullet": "assets/img/icon-num/one.png"
    }, {
        "name": "Sensor #2",
        "activities": valueD2,
        "color": "#FEC514",
        "bullet": "assets/img/icon-num/two.png"
    }, {
        "name": "Sensor #3",
        "activities": valueD3,
        "color": "#DB4C3C",
        "bullet": "assets/img/icon-num/three.png"
    }, {
        "name": "Sensor #4",
        "activities": valueD4,
        "color": "#DAF0FD",
        "bullet":  "assets/img/icon-num/four.png"
    }, {
        "name": "Sensor #5",
        "activities": valueD5,
        "color": "#FEC552",
        "bullet":  "assets/img/icon-num/five.png"
    }, {
        "name": "Sensor #6",
        "activities": valueD6,
        "color": "#DB4C1A",
        "bullet":  "assets/img/icon-num/six.png"
    }],
    "valueAxes": [{
        "maximum": maxAll+3,
        "minimum": 0,
        "axisAlpha": 0,
        "dashLength": 4,
        "position": "left"
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<span style='color:gray; font-size:13px;'> Actsivities : <b>[[value]]</b></span>",
        "bulletOffset": 10,
        "bulletSize": 52,
        "colorField": "color",
        "cornerRadiusTop": 8,
        "customBulletField": "bullet",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "type": "column",
        "valueField": "activities"
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

// ********************** DB ***********************//
var chart = AmCharts.makeChart("numActDayB",
{
    "type": "serial",
    "theme": "light",
    "dataProvider": [{
        "name": "Sensor #7",
		"activities":valueD7,
        "color": "#7F8DA9",
        "bullet":  "assets/img/icon-num/seven.png"
    }, {
        "name": "Sensor #8",
        "activities": valueD8,
        "color": "#FEC514",
        "bullet":  "assets/img/icon-num/eight.png"
    },{
        "name": "Sensor #9",
        "activities": valueD9,
        "color": "#FEC552",
        "bullet":  "assets/img/icon-num/nine.png"
    }, {
        "name": "Sensor #10",
        "activities": valueD10,
        "color": "#DB4C1A",
        "bullet":  "assets/img/icon-num/ten.png"
    }],
    "valueAxes": [{
        "maximum": maxAll+3,
        "minimum": 0,
        "axisAlpha": 0,
        "dashLength": 4,
        "position": "left"
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<span style='color:gray; font-size:13px;'> Actsivities : <b>[[value]]</b></span>",
        "bulletOffset": 10,
        "bulletSize": 52,
        "colorField": "color",
        "cornerRadiusTop": 8,
        "customBulletField": "bullet",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "type": "column",
        "valueField": "activities"
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
// ********************** NA ***********************//
var chart = AmCharts.makeChart("numActNightA",
{
    "type": "serial",
    "theme": "light",
    "dataProvider": [{
        "name": "Sensor #1",
		"activities":valueN1,
        "color": "#7F8DA9",
        "bullet":  "assets/img/icon-num/one.png"
    }, {
        "name": "Sensor #2",
        "activities": valueN2,
        "color": "#FEC514",
        "bullet":  "assets/img/icon-num/two.png"
    }, {
        "name": "Sensor #3",
        "activities": valueN3,
        "color": "#DB4C3C",
        "bullet":  "assets/img/icon-num/three.png"
    }, {
        "name": "Sensor #4",
        "activities": valueN4,
        "color": "#DAF0FD",
        "bullet":  "assets/img/icon-num/four.png"
    }, {
        "name": "Sensor #5",
        "activities": valueN5,
        "color": "#FEC552",
        "bullet":  "assets/img/icon-num/five.png"
    }, {
        "name": "Sensor #6",
        "activities": valueN6,
        "color": "#DB4C1A",
        "bullet":  "assets/img/icon-num/six.png"
    }],
    "valueAxes": [{
        "maximum": maxAll+3,
        "minimum": 0,
        "axisAlpha": 0,
        "dashLength": 4,
        "position": "left"
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<span style='color:gray; font-size:13px;'> Actsivities : <b>[[value]]</b></span>",
        "bulletOffset": 10,
        "bulletSize": 52,
        "colorField": "color",
        "cornerRadiusTop": 8,
        "customBulletField": "bullet",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "type": "column",
        "valueField": "activities"
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

// **********************NB ***********************//
var chart = AmCharts.makeChart("numActNightB",
{
    "type": "serial",
    "theme": "light",
    "dataProvider": [{
        "name": "Sensor #7",
		"activities":valueN7,
        "color": "#7F8DA9",
        "bullet":  "assets/img/icon-num/seven.png"
    }, {
        "name": "Sensor #8",
        "activities": valueN8,
        "color": "#FEC514",
        "bullet":  "assets/img/icon-num/eight.png"
    },{
        "name": "Sensor #9",
        "activities": valueN9,
        "color": "#FEC552",
        "bullet":  "assets/img/icon-num/nine.png"
    }, {
        "name": "Sensor #10",
        "activities": valueN10,
        "color": "#DB4C1A",
        "bullet":  "assets/img/icon-num/ten.png"
    }],
    "valueAxes": [{
        "maximum": maxAll+3,
        "minimum": 0,
        "axisAlpha": 0,
        "dashLength": 4,
        "position": "left"
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<span style='color:gray; font-size:13px;'> Actsivities : <b>[[value]]</b></span>",
        "bulletOffset": 10,
        "bulletSize": 52,
        "colorField": "color",
        "cornerRadiusTop": 8,
        "customBulletField": "bullet",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "type": "column",
        "valueField": "activities"
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