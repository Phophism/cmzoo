<script src="<?php echo base_url(); ?>assets/js/raphael.min.js"></script>

<script>

    var paper = Raphael("sensor");// draw a circle at screen position (40,30) with radius 15
   
  // ----- Sensor 1 ----- //  
    var sensor1 = paper.circle(230,310,25);
    // adjust the circle’s attributes
    <?php if( $status[0] == 0){?>
        sensor1.attr({
        "fill" : "rgba(255,0,0,0.5)",
        "stroke" : "rgba(255,70,1,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 1 \n\nStatus: Inactive \n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }else if( $status[0] == 1) {   
    ?>
         sensor1.attr({
        "fill" : "rgba(103,206,103,0.5)",
        "stroke" : "rgba(42,135,42,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 1 \n\nStatus: Active \n\nStart \n\nEnd \n\nDuration "
        });
    <?php 
        }else{
    ?>
        sensor1.attr({
        "fill" : "rgba(89, 140, 205,0.7)",
        "stroke" : "rgba(35, 112, 211 , 0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 1 \n\nStatus: Detected \n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }
    ?>

    var sensor2 = paper.circle(190,270,25);
    // adjust the circle’s attributes
    <?php if( $status[1] == 0){?>
        sensor2.attr({
        "fill" : "rgba(255,0,0,0.5)",
        "stroke" : "rgba(255,70,1,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 2 \n\nStatus: Inactive \n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }else if( $status[1] == 1) {   
    ?>
         sensor2.attr({
        "fill" : "rgba(103,206,103,0.5)",
        "stroke" : "rgba(42,135,42,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 2 \n\nStatus: Active \n\nStart \n\nEnd \n\nDuration "
        });
    <?php 
        }else{
    ?>
        sensor2.attr({
        "fill" : "rgba(89, 140, 205,0.7)",
        "stroke" : "rgba(35, 112, 211 , 0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 2 \n\nStatus: Detected \n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }
    ?>

    var sensor3 = paper.circle(350,50,25);
    // adjust the circle’s attributes
    <?php if( $status[2] == 0){?>
        sensor3.attr({
        "fill" : "rgba(255,0,0,0.5)",
        "stroke" : "rgba(255,70,1,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 3 \n\nStatus: Inactive \n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }else if( $status[2] == 1) {   
    ?>
         sensor3.attr({
        "fill" : "rgba(103,206,103,0.5)",
        "stroke" : "rgba(42,135,42,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 3 \n\nStatus: Active\n\nStart \n\nEnd \n\nDuration "
        });
    <?php 
        }else{
    ?>
        sensor3.attr({
        "fill" : "rgba(89, 140, 205,0.7)",
        "stroke" : "rgba(35, 112, 211 , 0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 3 \n\nStatus: Detected\n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }
    ?>

    var sensor4 = paper.circle(292,54,25);
    // adjust the circle’s attributes
    <?php if( $status[3] == 0){?>
        sensor4.attr({
        "fill" : "rgba(255,0,0,0.5)",
        "stroke" : "rgba(255,70,1,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 4 \n\nStatus: Inactive\n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }else if( $status[3] == 1) {   
    ?>
         sensor4.attr({
        "fill" : "rgba(103,206,103,0.5)",
        "stroke" : "rgba(42,135,42,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 4 \n\nStatus: Active\n\nStart \n\nEnd \n\nDuration "
        });
    <?php 
        }else{
    ?>
        sensor4.attr({
        "fill" : "rgba(89, 140, 205,0.7)",
        "stroke" : "rgba(35, 112, 211 , 0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 4 \n\nStatus: Detected \n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }
    ?>

     var sensor5 = paper.circle(235,55,25);
    // adjust the circle’s attributes
    <?php if( $status[4] == 0){?>
        sensor5.attr({
        "fill" : "rgba(255,0,0,0.5)",
        "stroke" : "rgba(255,70,1,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 5 \n\nStatus: Inactive\n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }else if( $status[4] == 1) {   
    ?>
         sensor5.attr({
        "fill" : "rgba(103,206,103,0.5)",
        "stroke" : "rgba(42,135,42,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 5 \n\nStatus: Active\n\nStart \n\nEnd \n\nDuration "
        });
    <?php 
        }else{
    ?>
        sensor5.attr({
        "fill" : "rgba(89, 140, 205,0.7)",
        "stroke" : "rgba(35, 112, 211 , 0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 5 \n\nStatus: Detected\n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }
    ?>

    var sensor6 = paper.circle(210,160,25);
    // adjust the circle’s attributes
    <?php if( $status[5] == 0){?>
        sensor6.attr({
        "fill" : "rgba(255,0,0,0.5)",
        "stroke" : "rgba(255,70,1,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 6 \n\nStatus: Inactive\n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }else if( $status[5] == 1) {   
    ?>
         sensor6.attr({
        "fill" : "rgba(103,206,103,0.5)",
        "stroke" : "rgba(42,135,42,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 6 \n\nStatus: Active\n\nStart \n\nEnd \n\nDuration "
        });
    <?php 
        }else{
    ?>
        sensor6.attr({
        "fill" : "rgba(89, 140, 205,0.7)",
        "stroke" : "rgba(35, 112, 211 , 0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 6 \n\nStatus: Detected\n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }
    ?>

     var sensor7 = paper.circle(450,300,25);
    // adjust the circle’s attributes
        <?php if( $status[6] == 0){?>
        sensor7.attr({
        "fill" : "rgba(255,0,0,0.5)",
        "stroke" : "rgba(255,70,1,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 7 \n\nStatus: Inactive\n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }else if( $status[6] == 1) {   
    ?>
         sensor7.attr({
        "fill" : "rgba(103,206,103,0.5)",
        "stroke" : "rgba(42,135,42,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 7 \n\nStatus: Active\n\nStart \n\nEnd \n\nDuration "
        });
    <?php 
        }else{
    ?>
        sensor7.attr({
        "fill" : "rgba(89, 140, 205,0.7)",
        "stroke" : "rgba(35, 112, 211 , 0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 7 \n\nStatus: Detected\n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }
    ?>
   
    var sensor8 = paper.circle(437,247,25);
    // adjust the circle’s attributes

        <?php if( $status[7] == 0){?>
        sensor8.attr({
        "fill" : "rgba(255,0,0,0.5)",
        "stroke" : "rgba(255,70,1,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 8 \n\nStatus: Inactive\n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }else if( $status[7] == 1) {   
    ?>
         sensor8.attr({
        "fill" : "rgba(103,206,103,0.5)",
        "stroke" : "rgba(42,135,42,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 8 \n\nStatus: Active\n\nStart \n\nEnd \n\nDuration "
        });
    <?php 
        }else{
    ?>
        sensor8.attr({
        "fill" : "rgba(89, 140, 205,0.7)",
        "stroke" : "rgba(35, 112, 211 , 0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 8 \n\nStatus: Detected\n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }
    ?>

     var sensor9 = paper.circle(490,160,25);
    // adjust the circle’s attributes
        <?php if( $status[8] == 0){?>
        sensor9.attr({
        "fill" : "rgba(255,0,0,0.5)",
        "stroke" : "rgba(255,70,1,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 9 \n\nStatus: Inactive\n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }else if( $status[8] == 1) {   
    ?>
         sensor9.attr({
        "fill" : "rgba(103,206,103,0.5)",
        "stroke" : "rgba(42,135,42,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 9 \n\nStatus: Active\n\nStart \n\nEnd \n\nDuration "
        });
    <?php 
        }else{
    ?>
        sensor9.attr({
        "fill" : "rgba(89, 140, 205,0.7)",
        "stroke" : "rgba(35, 112, 211 , 0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 9 \n\nStatus: Detected\n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }
    ?>

    var sensor10 = paper.circle(380,180,25);
    // adjust the circle’s attributes
    <?php if( $status[9] == 0){?>
        sensor10.attr({
        "fill" : "rgba(255,0,0,0.5)",
        "stroke" : "rgba(255,70,1,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 10 \n\nStatus: Inactive\n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }else if( $status[9] == 1) {   
    ?>
         sensor10.attr({
        "fill" : "rgba(103,206,103,0.5)",
        "stroke" : "rgba(42,135,42,0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 10 \n\nStatus: Active\n\nStart \n\nEnd \n\nDuration "
        });
    <?php 
        }else{
    ?>
        sensor10.attr({
        "fill" : "rgba(89, 140, 205,0.7)",
        "stroke" : "rgba(35, 112, 211 , 0.5)",
        "stroke-width" : 6,
        "title" : "Sensor : 10 \n\nStatus: Detected\n\nStart \n\nEnd \n\nDuration "
        });
    <?php
        }
    ?>

</script>

<script>
var slider = document.getElementById("timepicker");
var output = document.getElementById("displayTime");
output.innerHTML = slider.value;

window.onload = function() {
    var val = (slider.value) ;

    var h = Math.floor(val / 3600);
    var m = Math.floor(val % 3600 / 60);
   
    h = ('0' + h).slice(-2);
    m = ('0' + m).slice(-2);

    output.innerHTML = h+":"+m;
}

slider.oninput = function() {
    var val = (this.value) ;

    var h = Math.floor(val / 3600);
    var m = Math.floor(val % 3600 / 60);
   
    h = ('0' + h).slice(-2);
    m = ('0' + m).slice(-2);

    output.innerHTML = h+":"+m;
}
</script>
