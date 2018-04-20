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
            $limitTimeFirst = date("H:i:s",strtotime("16.00.00"));
            $limitTimeSecond = date("H:i:s",strtotime("09.00.00"));

            $data = $this->db->query("select * from animal_log where (lightIntensity < 40 and endTime > '".$dateReceive." ".$limitTimeFirst.
                                    "') and (lightIntensity < 40 and endTime < '".$nextNight." ".$limitTimeSecond."')")->result();
            // select * from animal_log where (lightIntensity < 40 and endTime > '2018-03-07 12:00:00') and (lightIntensity < 40 and endTime < '2018-03-08 12:00:00')  

            return $data ;
        }

        public function get_data_set_week($dateReceive){
            $countDay = 0 ;
            $dataSet = array();
            while($countDay < 7){
                $time = date("Y-m-d",strtotime($dateReceive. '-'.$countDay.' day' )) ; // ลบทุกๆ 1 วัน เพือเก็บค่าของวันก่อนๆหน้า ตลอด 7 วัน
                $data = $this->db->query('select * from animal_log where endTime like \'%'.$time.'%\' order by endTime desc' )->result();
                $dataSet[] = $data;
                $countDay++;
            }
            return $dataSet ;
        }

        
        public function get_data_set_month($dateReceive){
            $countDay = 0 ;
            $dataSet = array();
            while($countDay < 30){
                $time = date("Y-m-d",strtotime($dateReceive. '-'.$countDay.' day' )) ; // ลบทุกๆ 1 วัน เพือเก็บค่าของวันก่อนๆหน้า ตลอด 7 วัน
                $data = $this->db->query('select * from animal_log where endTime like \'%'.$time.'%\' order by endTime desc' )->result();
                $dataSet[] = $data;
                $countDay++;
            }
            return $dataSet ;
        }

        public function get_data_set_month_day($dateReceive){
            $countDay = 0 ;
            $dataSet = array();
            while($countDay < 30){
                $time = date("Y-m-d",strtotime($dateReceive. '-'.$countDay.' day' )) ; // ลบทุกๆ 1 วัน เพือเก็บค่าของวันก่อนๆหน้า ตลอด 29 วัน
                $data = $this->db->query('select * from animal_log where lightIntensity >=40 and endTime like \'%'.$time.'%\' order by endTime desc' )->result();
                $dataSet[] = $data;
                $countDay++;
            }
            return $dataSet ;
        }

        public function get_data_set_month_night($dateReceive){
            $countDay = 0 ;
            $dataSet = array();
            $limitTimeFirst = date("H:i:s",strtotime("16.00.00"));
            $limitTimeSecond = date("H:i:s",strtotime("09.00.00"));
            while($countDay < 30){
                if($countDay == 0)
                    $nextNight = date("Y-m-d",strtotime($dateReceive.'+'.($countDay+1).' day' )); // dateRecieve + 1 day 
                else
                    $nextNight = date("Y-m-d",strtotime($dateReceive. '-'.($countDay-1).' day' )); // dateRecieve + 1 day  
                                
                $nightTime = date("Y-m-d",strtotime($dateReceive. '-'.($countDay).' day' )) ; // ลบทุกๆ 1 วัน เพือเก็บค่าของวันก่อนๆหน้า ตลอด 29 วัน
                $data = $this->db->query("select * from animal_log where (lightIntensity < 40 and endTime > '".$nightTime." ".$limitTimeFirst.
                                        "') and (lightIntensity < 40 and endTime < '".$nextNight." ".$limitTimeSecond."')  order by endTime desc ")->result();
                $dataSet[] = $data;
                $countDay++;
            }
          
            return $dataSet ;
        }

        public function get_recent_duration($dateReceive,$timeReceive,$countNode){
            $time = date("Y-m-d H:i:s",strtotime($dateReceive." ".$timeReceive));
            $this->db->select('endTime');
            $this->db->from('animal_log');
            $this->db->where('nodeId',$countNode);
            $this->db->where('endTime <= ',$time);
            $this->db->order_by('endTime', 'DESC');
            $this->db->limit(1);
            $data1 = $this->db->get();
            if(($data1->num_rows())>0)
                $data1 = $data1->row()->endTime;
            else
                $data1 = null ;

            $this->db->select('startTime');
            $this->db->from('animal_log');
            $this->db->where('nodeId',$countNode);
            $this->db->where('startTime >= ',$time);
            $this->db->order_by('startTime');
            $this->db->limit(1);
            $data2 = $this->db->get();
            if(($data2->num_rows())>0){
                $data2 = $data2->row()->startTime;
            }else        
                $data2 =  date("Y-m-d H:i:s"); 

            if($data1 == null)
                $dur = "NaN" ; 
            else
                $dur = date("m-\m\o\\n\\t\h d-\d\a\y H:i:s",strtotime($data2) - strtotime($data1));
            //$data = $this->db->query("select duration from animal_log where nodeId='".$countNode."' and endTime < '".$time."'  order by endTime desc limit 1 ")->result_array();
            return $dur ;  
        }
        public function get_recent_start_time($dateReceive,$timeReceive,$countNode){
            $time = date("Y-m-d H:i:s",strtotime($dateReceive." ".$timeReceive));
            $this->db->select('endTime');
            $this->db->from('animal_log');
            $this->db->where('nodeId',$countNode);
            $this->db->where('endTime < ',$time);
            $this->db->order_by('endTime', 'DESC');
            $this->db->limit(1);
            $data = $this->db->get();
            if(($data->num_rows())>0)
                $data = $data->row()->endTime;
            else
                $data = "No data." ;
            //$data = $this->db->query("select startTime from animal_log where nodeId='".$countNode."' and endTime < '".$time."'  order by endTime desc limit 1 ")->result();
            return $data;  
        }
        public function get_recent_end_time($dateReceive,$timeReceive,$countNode){
            $time = date("Y-m-d H:i:s",strtotime($dateReceive." ".$timeReceive));
            $this->db->select('startTime');
            $this->db->from('animal_log');
            $this->db->where('nodeId',$countNode);
            $this->db->where('startTime > ',$time);
            $this->db->order_by('startTime');
            $this->db->limit(1);
            $data = $this->db->get();
            if(($data->num_rows())>0)
                $data = $data->row()->startTime;
            else
                $data = "-" ;
            //$data = $this->db->query("select endTime from animal_log where nodeId='".$countNode."' and endTime < '".$time."'  order by endTime desc limit 1 ")->result();
            return $data;  
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
