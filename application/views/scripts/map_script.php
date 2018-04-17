<script src="<?php echo base_url(); ?>assets/js/raphael.min.js"></script>

<script>

    var paper = Raphael("sensor");// draw a circle at screen position (40,30) with radius 15
   
    var sensor1 = paper.circle(230,310,25);
    // adjust the circle’s attributes
    sensor1.attr({
        "fill" : "rgba(255,0,0,0.5)",
    "stroke" : "rgba(255,70,1,0.5)",
    "stroke-width" : 6,
    "title" : "Sensor : 3 \n\nStatus: \n\nStart \n\nEnd \n\nDuration \n\nDescription"
    });

    var sensor2 = paper.circle(190,270,25);
    // adjust the circle’s attributes
    sensor2.attr({
        "fill" : "rgba(255,0,0,0.5)",
    "stroke" : "rgba(255,70,1,0.5)",
    "stroke-width" : 6,
    "title" : "Sensor : 3 \n\nStatus: \n\nStart \n\nEnd \n\nDuration \n\nDescription"
    });

    var sensor3 = paper.circle(350,50,25);
    // adjust the circle’s attributes
    sensor3.attr({
        "fill" : "rgba(255,0,0,0.5)",
    "stroke" : "rgba(255,70,1,0.5)",
    "stroke-width" : 6,
    "title" : "Sensor : 3 \n\nStatus: \n\nStart \n\nEnd \n\nDuration \n\nDescription"
    });
   
    var sensor4 = paper.circle(292,54,25);
    // adjust the circle’s attributes
    sensor4.attr({
        "fill" : "rgba(255,0,0,0.5)",
    "stroke" : "rgba(255,70,1,0.5)",
    "stroke-width" : 6,
    "title" : "Sensor : 3 \n\nStatus: \n\nStart \n\nEnd \n\nDuration \n\nDescription"
    });

     var sensor5 = paper.circle(235,55,25);
    // adjust the circle’s attributes
    sensor5.attr({
        "fill" : "rgba(255,0,0,0.5)",
    "stroke" : "rgba(255,70,1,0.5)",
    "stroke-width" : 6,
    "title" : "Sensor : 3 \n\nStatus: \n\nStart \n\nEnd \n\nDuration \n\nDescription"
    });

    var sensor6 = paper.circle(210,160,25);
    // adjust the circle’s attributes
    sensor6.attr({
    "fill" : "rgba(255,0,0,0.5)",
    "stroke" : "rgba(255,70,1,0.5)",
    "stroke-width" : 6,
    "title" : "Sensor : 3 \n\nStatus: \n\nStart \n\nEnd \n\nDuration \n\nDescription"
    });

     var sensor7 = paper.circle(450,300,25);
    // adjust the circle’s attributes
    sensor7.attr({
    "fill" : "rgba(255,0,0,0.5)",
    "stroke" : "rgba(255,70,1,0.5)",
    "stroke-width" : 6,
    "title" : "Sensor : 3 \n\nStatus: \n\nStart \n\nEnd \n\nDuration \n\nDescription"
    });
   
    var sensor8 = paper.circle(437,247,25);
    // adjust the circle’s attributes
    sensor8.attr({
    "fill" : "rgba(255,0,0,0.5)",
    "stroke" : "rgba(255,70,1,0.5)",
    "stroke-width" : 6,
    "title" : "Sensor : 3 \n\nStatus: \n\nStart \n\nEnd \n\nDuration \n\nDescription"
    });

     var sensor9 = paper.circle(490,160,25);
    // adjust the circle’s attributes
    sensor9.attr({
    "fill" : "rgba(255,0,0,0.5)",
    "stroke" : "rgba(255,70,1,0.5)",
    "stroke-width" : 6,
    "title" : "Sensor : 3 \n\nStatus: \n\nStart \n\nEnd \n\nDuration \n\nDescription"
    });

    var sensor10 = paper.circle(380,180,25);
    // adjust the circle’s attributes
    sensor10.attr({
    "fill" : "rgba(255,0,0,0.5)",
    "stroke" : "rgba(255,70,1,0.5)",
    "stroke-width" : 6,
    "title" : "Sensor : 3 \n\nStatus: \n\nStart \n\nEnd \n\nDuration \n\nDescription"
    });

</script>

<script>
var slider = document.getElementById("timepicker");
var output = document.getElementById("displayTime");
output.innerHTML = slider.value;

slider.oninput = function() {
    var val = (this.value)/2 ;

    var h = Math.floor(val / 3600);
    var m = Math.floor(val % 3600 / 60);
   
    h = ('0' + h).slice(-2);
    m = ('0' + m).slice(-2);

    output.innerHTML = h+":"+m;
}
</script>
