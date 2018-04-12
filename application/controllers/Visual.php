<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visual extends CI_Controller {
   
    public function index(){

		$this->load->model('animal_log_model');
		$dateReceive = $this->input->post('datepicker');
		$cageReceive = $this->input->post('cageselect');

		if($dateReceive==null && $cageReceive==null){
			$dateReceive = date("Y-m-d");
			$cageReceive = "on";
		}else{
			$dateReceive = date("Y-m-d",strtotime($dateReceive));
		}	

		$day = $this->animal_log_model->get_data_by_date($dateReceive);

		if(isset($day)){
			$duration = array("01:00:00","02:00:00","03:00:00","04:00:00","05:00:00","06:00:00","07:00:00","08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00","16:00:00","17:00:00","18:00:00","19:00:00","20:00:00","21:00:00","22:00:00","23:00:00","23:59:00");
			$periodCount = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
			$nodeCount = array(0,0,0,0,0,0,0,0,0,0); // amount of activities in 1 day (for week/month)
			$nodeDuration = array();
	
			foreach($day as $whole){ 
				$countDur = 0;	
				$whole->startTime = date("H:i:s",strtotime($whole->startTime));
				
				if($whole->startTime < date("H:i:s",strtotime($duration[0]))){
					$periodCount[0] += 1;
					$nodeCount[($whole->nodeId)-1] +=1; 
					$nodeDuration[($whole->nodeId)-1]['nodeDur'][] =$duration[0];
				}
				while($countDur<23){
					if($whole->startTime < date("H:i:s",strtotime($duration[$countDur+1])) && $whole->startTime >= date("H:i:s",strtotime($duration[$countDur]))){
						$periodCount[$countDur+1]++;
						$nodeCount[($whole->nodeId)-1]++;
						$nodeDuration[($whole->nodeId)-1][] = $duration[$countDur+1]; 
					}
					$countDur++;	
				}
			}
		}else{
			$nodeCount = null ;
			$nodeDuration = null ;
		}

		echo "<pre>";
		var_dump($nodeDuration);
		echo "</pre>";	

		$this->load->view('_visual', array(
			"nodes" => $nodeCount ,
			"dateReceive" => $dateReceive,
			"cageReceive" => $cageReceive
		));

	}

}

