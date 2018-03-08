<?php

    class Blog_model extends CI_Model {

        public $curTime = date("Y-m-d H:i:s");

        public function activity_time($currentTime,$originTime){
            $now = date_create($currentTime);
            $start = date_create($originTime);
            $interval = date_dif($now,$start);

            $result = $interval->format('%ad,$Hh-%im-%ss');
            $dayCheck = $interval->format('%a');
            $hourCheck = $interval->format('%H');
            $minCheck = $interval->format('%i');
            $secCheck = $interval->format('%s');

            return $result;
        }

        public function time_diff(){          
            $now = date_create($currentTime);
            $start = date_create($originTime);
            $interval = date_dif($now,$start);

            $result = $interval->format('%ad,$Hh-%im-%ss');
            $dayCheck = $interval->format('%a');
            $hourCheck = $interval->format('%H');
            $minCheck = $interval->format('%i');
            $secCheck = $interval->format('%s');

            return $secCheck;
        }

        public function time_interval_status($timeDiff,$status,$nid){
            if($status!=0){
                if($timeDiff>=20){
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_URL,'http://teng.thai2biz.net/cmzoo/application/')
                }
            }
        }
    
        public function get_last_ten_entries(){
            $query = $this->db->get('entries', 10);
            return $query->result();
        }

    }

?>
