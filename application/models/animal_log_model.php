<?php

    // get / update

    class Animal_log_model extends CI_Model {   
    
        public function get(){
            return $this->db->get('animal_log')->result();
        }

        public function get_data_by_date($dateReceive){
            //var_dump($dateReceive);
            $time = array('endTime'=>$dateReceive); // ใช้ endTime ก่อน เพราะ startTime ข้อมูลไม่วิ่ง
            $this->db->select('*');
            $this->db->from('animal_log');
            $this->db->like($time);
            $data = $this->db->get()->result();
            // echo "<br>" ;
            // var_dump($data);
            return $data ;
        }

        public function get_data_by_date_day($dateReceive){
            //var_dump($datepicker);
            $time = array('endTime'=>$dateReceive); // ใช้ endTime ก่อน เพราะ startTime ข้อมูลไม่วิ่ง
            $this->db->select('*');
            $this->db->from('animal_log');
            $this->db->like($time);
            $this->db->where('lightIntensity >=',40); // lightintensity >= 40 
            $data = $this->db->get()->result(); // SELECT * FROM `animal_log` WHERE `endTime` LIKE '%2018-03-07%' ESCAPE '!' AND `lightIntensity` >= 40

            return $data ;
        }

        public function get_data_by_date_night($dateReceive){
            //var_dump($datepicker);
            $nextNight = date("Y-m-d",strtotime($dateReceive. '+1 day' )); // dateRecieve + 1 day
            $limitTime = date("H:i:s",strtotime("12.00.00"));

            $data = $this->db->query("select * from animal_log where (lightIntensity < 40 and endTime > '".$dateReceive." ".$limitTime.
                                    "') and (lightIntensity < 40 and endTime < '".$nextNight." ".$limitTime."')")->result();
            // select * from animal_log where (lightIntensity < 40 and endTime > '2018-03-07 12:00:00') and (lightIntensity < 40 and endTime < '2018-03-08 12:00:00')  

            return $data ;
        }
        public function get_data_set_sd($dateReceive){
            $countDay = 0 ;
            $dataSet = array();
            while($countDay < 30){
                $time = date("Y-m-d",strtotime($dateReceive. '-'.$countDay.' day' )) ; // ลบทุกๆ 1 วัน เพือเก็บค่าของวันก่อนๆหน้า ตลอด 29 วัน
                $data = $this->db->query('select * from animal_log where endTime like \'%'.$time.'%\'' )->result();
                $dataSet[] = count($data);
                $countDay++;
            }
            return $dataSet ;
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
