<?php

    // get / update

    class Animal_log_model extends CI_Model {   
    
        public function get(){
            return $this->db->get('animal_log')->result();
        }

    /*    "http://teng.thai2biz.net/cmzoo/datain.php?sensor_id=" + nodeId + "&light_intensity=" + LI 
            + "&temperatureC=" + C + "&temperatureF=" + F + "&duration=" + Dur + "&humidity=" + Humid ;
    */

        public function add($nodeId,$lightIntensity,$temperatureC,$temperatureF,$humidity,$duration){
            
            date_default_timezone_set("Asia/Bangkok");
            $currentDateTime = date("Y-m-d H:i:s"); 

            $startTime = date("Y-m-d H:i:s", strtotime($currentDateTime)-$duration);

            $this->db->insert('animal_log',
                array(
                    "nodeId" => $nodeId,
                    "lightIntensity" => $lightIntensity,
                    "temperatureC" => $temperatureC,
                    "temperatureF" => $temperatureF,
                    "humidity" => $humidity,
                    "duration" => $duration,
                    "startTime" => $startTime,
                    "endTime" => $currentDateTime
                )
            );
        }


    }

?>
