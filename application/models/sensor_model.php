<?php

    class Blog_model extends CI_Model {

        public $curTime = date("Y-m-d H:i:s");

        public function activity_time($currentTime,$originTime){
            $now = date_create($currentTime);
            $start = date_create($originTime);
            $interval = date_dif($now,$start);

            $result = $interval->format('%ad,$Hh-%im-%ss');
            $dayCheck = $interval->
        }
    
        public function get_last_ten_entries()
        {
            $query = $this->db->get('entries', 10);
            return $query->result();
        }

    }

?>
