<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visual extends CI_Controller {
   
    public function index(){
		date_default_timezone_set("Asia/Bangkok");
		$this->load->model('animal_log_model');
		$dateReceive = $this->input->post('datepicker');
		$cageReceive = $this->input->post('cageselect');
		$periodReceive = $this->input->post("options");

	
		if($dateReceive==null && $cageReceive==null && $periodReceive==null){
			$dateReceive = date("Y-m-d");
			$cageReceive = "on";
			$periodReceive = 1 ;
		}else{
			if($dateReceive > date("Y-m-d")){
				$dateReceive = date("Y-m-d") ;
			}else{
				$dateReceive = date("Y-m-d",strtotime($dateReceive));
			}
		}	
		
		$day = $this->animal_log_model->get_data_by_date($dateReceive);
		$week = $this->animal_log_model->get_data_set_week($dateReceive);
		$month = $this->animal_log_model->get_data_set_month($dateReceive);

		$duration = array("01:00:00","02:00:00","03:00:00","04:00:00","05:00:00","06:00:00","07:00:00","08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00","16:00:00","17:00:00","18:00:00","19:00:00","20:00:00","21:00:00","22:00:00","23:00:00","23:59:00");

		if(isset($day)){
			$nodeDuration = $this->nodeDur($day,$duration);
		}else{
			$nodeDuration = null ;
		}

		$nodeDay = $this->dayData($nodeDuration,$duration);
		$nodeWeek = $this->weekData($week);
		$nodeMonth = $this->monthData($month);

		$this->load->view('_visual', array(
			"nodeDay" => $nodeDay,
			"nodeWeek" => $nodeWeek,
			"nodeMonth" => $nodeMonth,
			"dateReceive" => $dateReceive,
			"cageReceive" => $cageReceive,
			"period" => $periodReceive
		));

	}

	//----------------- Function -----------------//

	public function nodeDur($day,$duration){
		$nodeDuration = array();
		foreach($day as $whole){ 
			$counterDur = 0;	
			$whole->startTime = date("H:i:s",strtotime($whole->startTime));
			
			if($whole->startTime < date("H:i:s",strtotime($duration[0]))){ // ใช้ Start TIme ---> ถูกต้องแล้ว , ค่าเก่าๆจะไม่โชว์ 
				$nodeDuration[($whole->nodeId)-1][] =$duration[0];
			}
			
			while($counterDur<23){
				if($whole->startTime < date("H:i:s",strtotime($duration[$counterDur+1])) && $whole->startTime >= date("H:i:s",strtotime($duration[$counterDur]))){
					$nodeDuration[($whole->nodeId)-1][] = $duration[$counterDur+1]; 
				}
				$counterDur++;
			}
		}

		return $nodeDuration;
	}


 // ----- day data ------ //

	public function dayData($nodeDuration,$duration){
		// is nodeDuration has some blank index of nodeId
		$countNodeNull = 0 ; 
		while($countNodeNull < 10){ 
			if(!isset($nodeDuration[$countNodeNull])){
				$nodeDuration[$countNodeNull] = null; 
			}
			$countNodeNull++;
		}

		// separate time in one day to hour classify by nodeId
		$activePeriodPerNode = array();
		$activePeriodCount = 0;
		while($activePeriodCount<10){
			if(isset($nodeDuration[$activePeriodCount])){
				$activePeriodPerNode[] = array_count_values($nodeDuration[$activePeriodCount]);
				foreach($activePeriodPerNode as $periodPernode){
					$periodPernode = (int)$periodPernode;
				}
			}else
				$activePeriodPerNode[] = Null;	
			$activePeriodCount++;
		}
 

		
		 $ActivitynodeAndPeriodPerHour = array(
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)
		 );	
	
		$i = 0; // to 10
		 foreach($nodeDuration as $d1=>$node){
			if(isset($node)){
				foreach($node as $d2=>$period){
					$j = 0 ;// to 24 
					if(isset($period)){
						while($j<24){
							if($period == $duration[$j]){
								$ActivitynodeAndPeriodPerHour[$i][$j]++;
								break;
							}
							$j++;
						}
					}		
				}
			}
			 $i++;
		}

		return $ActivitynodeAndPeriodPerHour ;
	}

 //----- week data -----//

	public function weekData($week){
		$counterWeek = 0;
		$weeks = array();
		$activityWeek = array();
		if(isset($week)){
			foreach($week as $node=>$datas){
				if(isset($datas)){
					foreach($datas as $data){
						if(isset($data)){
							$weeks[$counterWeek][] = ($data->nodeId)-1 ; 
						}
					}
				}else
					$weeks[$counterWeek] = null ; 
				$counterWeek++; 	
			}
		}else
			$weeks = null;
			
		// is nodeDuration has some blank index of nodeId
		$countNodeNull = 0 ; 
		while($countNodeNull < 7){ 
			if(!isset($weeks[$countNodeNull])){
				$weeks[$countNodeNull] = null; 
			}
			$countNodeNull++;
		}

		$countWeek = array(); // 1node that contain amount of activities in 7 days
		$counterWeek = 0;
		if(count($weeks)!=0){
			while($counterWeek<7){
				if(isset($weeks[$counterWeek])){
					$countWeek[] = array_count_values($weeks[$counterWeek]);
				}else{
					$fillzero=0;
					while($fillzero < 10){
						$countWeek[$counterWeek][$fillzero] = 0;
						$fillzero++;
					}
				}$counterWeek++;
			}
		}else
			$countWeek = null ;

	// fill the node that doesn't has activity amount (act amount = 0)
		$counterNode = 0 ;
		while($counterNode < 7){ 
			$counterNodeNull = 0 ; 
			while($counterNodeNull < 10){
				if(!isset($countWeek[$counterNode][$counterNodeNull])){
					$countWeek[$counterNode][$counterNodeNull] = 0 ;
					// var_dump($countWeek[$counterNode][$counterNodeNull] );
					// echo "/".$counterNode ;
					// echo $counterNodeNull ; 
					// echo "<hr/>";
				}	
				
				$counterNodeNull++;
			}
			$counterNode++;
		}

		// switch index
		$nodeWeek = array();
		foreach ($countWeek as $key1 => $arr) {
			foreach ($arr as $key2 => $num) {
				$nodeWeek[$key2][$key1] = $num;
			}
		}

		return $nodeWeek ;
	}


//  ------ Month Data ------ //

	public function monthData($month){
		$counterMonth = 0;
		$months = array();
		$activityMonth = array();
		if(isset($month)){
			foreach($month as $node=>$datas){
				if(isset($datas)){
					foreach($datas as $data){
						if(isset($data)){
							$months[$counterMonth][] = ($data->nodeId)-1; 
						}
					}
				}else
					$months[$counterMonth] = null ; 
				$counterMonth++; 	
			}
		}else
			$months = null;
			
		// is nodeDuration has some blank index of nodeId
		$countNodeNull = 0 ; 
		while($countNodeNull < 30){ 
			if(!isset($months[$countNodeNull])){
				$months[$countNodeNull] = null; 
			}
			$countNodeNull++;
		}

		$countMonth = array(); // 1node that contain amount of activities in 7 days
		$counterMonth = 0;
		if(count($months)!=0){
			while($counterMonth<30){
				if(isset($months[$counterMonth])){
					$countMonth[] = array_count_values($months[$counterMonth]);
				}else{
					$fillzero=0;
					while($fillzero < 10){
						$countMonth[$counterMonth][$fillzero] = 0;
						$fillzero++;
					}
				}$counterMonth++;
			}
		}else
			$countMonth = null ;

		// fill the node that doesn't has activity amount (act amount = 0)
		$counterNode = 0 ;
		while($counterNode < 30){ 
			$counterNodeNull = 0 ; 
			while($counterNodeNull < 10){
				if(!isset($countMonth[$counterNode][$counterNodeNull])){
					$countMonth[$counterNode][$counterNodeNull] = 0 ;
					// var_dump($countWeek[$counterNode][$counterNodeNull] );
					// echo "/".$counterNode ;
					// echo $counterNodeNull ; 
					// echo "<hr/>";
				}	
				
				$counterNodeNull++;
			}
			$counterNode++;
		}

		$nodeMonth = array();
		foreach ($countMonth as $key1 => $arr) {
			foreach ($arr as $key2 => $num) {
				$nodeMonth[$key2][$key1] = $num;
			}
		}

		return $nodeMonth;
	}

}