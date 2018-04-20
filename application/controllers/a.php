<?php
        $servername = "localhost:8080";
        $username = "root";
        $password = "";
        $dbname = "thai2biz_net_cmzoo2";
        $con1 =  mysqli_connect( $servername, $username , $password ,$dbname);
        $query = "select * from cmzoo limit 2";
        $get = mysqli_query($con1,$query);

        var_dump($get);

        // if (mysqli_num_rows($get) > 0) {
        //     // output data of each row
        //     while($row = mysqli_fetch_assoc($get)) {
        //         $_id = $row['id'];
        //         $_nodeId = $row['sensor_id'];
        //         $_light = $row['light_intensity'];
        //         $_humid = $row['humidity'];
        //         $_c = $row['temperatureC'];
        //         $_f = $row['temperatureF'];
        //         $_dur = $row['duration'];
        //         $_end = $row['date_time'];
        //     }
        // } else {
        //     echo "0 results";
        // }

        // mysqli_close($conn);
        // $servername = "localhost:8080";
        // $username = "root";
        // $password = "";
        // $dbname = "thai2biz_net_cmzoo";
        // $con2 = mysqli_connect( $servername, $username , $pass ,$dbname);

        // date_default_timezone_set("Asia/Bangkok");
        // $_start = date("Y-m-d H:i:s", strtotime($_end)-$dur);

        // $query2 = 'inset into animal_log(';
        // $query2 .= 'id,nodeId,lightIntensity,temperatureC,temperatureF,humidity,startTime,endTime) ';
        // $query2 .= 'value('.$_id.','.$_nodeId.','.$_light.','.$_humid.','.$_c.','.$_f.','.$_dur.','.$_start.','.$_end.')' ;

        // mysqli_query($con2,$query2);
?>
