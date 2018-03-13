<?php

    // get / update

    class Sensor_model extends CI_Model {   

        // public $curTime = date("Y-m-d H:i:s");

        // public function activity_time($currentTime,$originTime){
        //     $now = date_create($currentTime);
        //     $start = date_create($originTime);
        //     $interval = date_dif($now,$start);

        //     $result = $interval->format('%ad,$Hh-%im-%ss');
        //     $dayCheck = $interval->format('%a');
        //     $hourCheck = $interval->format('%H');
        //     $minCheck = $interval->format('%i');
        //     $secCheck = $interval->format('%s');

        //     return $result;
        // }

        // public function time_diff(){          
        //     $now = date_create($currentTime);
        //     $start = date_create($originTime);
        //     $interval = date_dif($now,$start);

        //     $result = $interval->format('%ad,$Hh-%im-%ss');
        //     $dayCheck = $interval->format('%a');
        //     $hourCheck = $interval->format('%H');
        //     $minCheck = $interval->format('%i');
        //     $secCheck = $interval->format('%s');

        //     return $secCheck;
        // }

        // public function time_interval_status($timeDiff,$status,$nid){
        //     if($status!=0){
        //         if($timeDiff>=20){
        //             $ch = curl_init();
        //             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //             curl_setopt($ch, CURLOPT_URL,'http://teng.thai2biz.net/cmzoo/application/')
        //         }
        //     }
        // }

        
    
        public function get(){

            date_default_timezone_set("Asia/Bangkok");
            $currentDateTime = date("Y-m-d H:i:s"); 

            $sensors = $this->db->get('sensor')->result();
            foreach($sensors as $sensor){
                var_dump(
                    $sensor->startTime,
                    strtotime($sensor->startTime),
                    $currentDateTime ,
                    strtotime($currentDateTime)
                );
                echo "<Br>" ;
                $sensor->recentTime = (strtotime($currentDateTime)-strtotime($sensor->startTime))/1; // divided by one for turn unknow num to second
               
                var_dump(
                    $sensor->recentTime 
                );
                echo "<Br>" ;
            }
            return $sensors;
        }

        public function update($nodeId,$status){
            
            $sensor = $this->db->get_where('sensor',array('nodeId'=>$nodeId))->result(); // sensor = set of sensor's data from the database.
            $previousStatus = $sensor[0]->status;
            
            $this->db->where('nodeId',$nodeId);

            date_default_timezone_set("Asia/Bangkok");
            $currentDateTime = date("Y-m-d H:i:s");  
            // create array which contains the data that will be updated in sensor's table
            $updateData = array (   
                'recentTime' => $currentDateTime
            );

            // if status change -> replace the new start time
            if ($previousStatus != $status) {
                $updateData["status"] = $status;
                $updateData["startTime"] = $currentDateTime;
            }

            $this->db->update('sensor', $updateData);

        }

        

    }

?>
