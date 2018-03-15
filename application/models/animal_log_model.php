<?php

    // get / update

    class Animal_log_model extends CI_Model {   
    
        public function get(){
            return $this->db->get('animal_log')->result();
        }

        public function get_date($datepicker){
            $data = $this->db->like('animal_log',array('startTime'=>$datepicker))->result();
            var_dump($data);
        }

        //httpget
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
