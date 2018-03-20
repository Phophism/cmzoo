<?php

    // get / update

    class Animal_log_model extends CI_Model {   
    
        public function get(){
            return $this->db->get('animal_log')->result();
        }

        public function get_data_by_date($datepicker){
            var_dump($datepicker);
            $time = array('endTime'=>$datepicker); // ใช้ endTime ก่อน เพราะ startTime ข้อมูลไม่วิ่ง
            $this->db->select('*');
            $this->db->from('animal_log');
            $this->db->like($time);
            $data = $this->db->get()->result();
            echo "<br>" ;
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
