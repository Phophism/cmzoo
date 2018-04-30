<?php

    class Unit_Report extends CI_Controller{

        public function index(){
            $this->load->library('unit_test');

            $A = array(1,2);
            $B = 1;
            $C = 2;
            $expect = "40 %";
            $this->unit->run($this->sensorPercentage($A,$B,$C), $expect , "Test");
        }

        public function sensorPercentage($logs,$amount,$amountAll){
            //logs = animal_log array, amount = amountCageA, amountAll = all
            if(count($logs)!= 0 ){
                $percentage = round((($amount*100)/$amountAll),2)." %";
            }else{
                $percentage =  null ;
            }
        }

        public function sensorMeanWhole($day){
            $meanWhole = round((count($day)/24),2);
        }

    }

?>