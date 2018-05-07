<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function index(){
		date_default_timezone_set("Asia/Bangkok");
		
		$this->load->helper('array');
		$this->load->model('animal_log_model');
		$dateReceive = $this->input->post('datepicker');

		if($dateReceive==null){
			$dateReceive = date("Y-m-d");
		}else{
			if($dateReceive > date("Y-m-d")){
				$dateReceive = date("Y-m-d") ;
			}else{
				$dateReceive = date("Y-m-d",strtotime($dateReceive));
			}
		}
			$day = $this->animal_log_model->get_data_by_date($dateReceive);
		
			$duration = array("01:00:00","02:00:00","03:00:00","04:00:00","05:00:00","06:00:00","07:00:00","08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00","16:00:00","17:00:00","18:00:00","19:00:00","20:00:00","21:00:00","22:00:00","23:00:00","23:59:00");
			
			// slower
			if(isset($day)){
				$periodCount = $this->periodCount($day,$duration);
				$nodeCount = $this->nodeCount($day,$duration);
				$nodeDuration = $this->nodeDur($day,$duration);
			}
	
			// // faster
			// foreach($day as $whole){ 
			// 	$counterDur = 0;	
			// 	$whole->startTime = date("H:i:s",strtotime($whole->startTime));
				
			// 	// if($whole->startTime == date("H:i:s",strtotime("00:00:00"))){
			// 	// 	$periodCount[0] += 1;
			// 	// 	$nodeCount[($whole->nodeId)-1] +=1; 
			// 	// 	$nodeDuration[($whole->nodeId)-1]['nodeDur'][] =$duration[0];
			// 	// 	var_dump("A");
			// 	// }
			// 	// else 
			// 	if($whole->startTime < date("H:i:s",strtotime($duration[0]))){ // ใช้ Start TIme ---> ถูกต้องแล้ว , ค่าเก่าๆจะไม่โชว์
			// 		$periodCount[0] += 1;
			// 		$nodeCount[($whole->nodeId)-1] +=1; 
			// 		$nodeDuration[($whole->nodeId)-1]['nodeDur'][] =$duration[0];
			// 	}
				
			// 	while($counterDur<23){
			// 		if($whole->startTime < date("H:i:s",strtotime($duration[$counterDur+1])) && $whole->startTime >= date("H:i:s",strtotime($duration[$counterDur]))){
			// 			$periodCount[$counterDur+1]++;
			// 			$nodeCount[($whole->nodeId)-1]++;
			// 			$nodeDuration[($whole->nodeId)-1]['nodeDur'][] = $duration[$counterDur+1]; 
			// 		}
			// 		$counterDur++;
			// 	}
			// }
			
	
				// ****** amount ******
				$amountAll = count($day);
				$amountCageA = 
					$nodeCount[0]+
					$nodeCount[1]+
					$nodeCount[2]+
					$nodeCount[3]+
					$nodeCount[4]+
					$nodeCount[5]
				;
				$amountCageB = 
					$nodeCount[6]+
					$nodeCount[7]+
					$nodeCount[8]+
					$nodeCount[9]
				;
				$amountNode = $nodeCount;

			// -----------------Percentage----------------- //
			
				if(count($day)!= 0 ){
					// ******** Percentage Cage A/B ******** //
					$percentageA = $this->percentage($amountCageA,$amountAll) ;
					$percentageB =  $this->percentage($amountCageB,$amountAll) ;
					// ดัก divide by 0 ด้วย

					// ******** Percentage Node ********** //
					$percentageNode = array();
					$countPercenNode = 0 ;
					while($countPercenNode<10){
						$percentageNode[] =    $this->percentage($nodeCount[$countPercenNode],$amountAll) ;
						$countPercenNode++;
					}
				}else{
					$percentageA = Null ;
					$percentageB = Null	;
					$percentageNode = Null ;
				}

			// ------------------Mean------------------//

				if(count($day)!=0){
					// ****** Mean whole ******
					$meanWhole = $this->mean(count($day));
					// ****** Mean Cage ********

					$i=0;
					$j=6;
					$meanCageA = 0;
					$meanCageB = 0;
					
					while($i<6){
						$meanCageA += $nodeCount[$i];
						$i++;
					}
					$meanCageA = $this->mean($meanCageA) ; // total in "A" divide by 24 hr -> get mean , decimal = 3 
					
					while($j<10){
						$meanCageB += $nodeCount[$j];
						$j++;
					}
					$meanCageB = $this->mean($meanCageB) ; // total in "A" divide by 24 hr -> get mean , decimal = 3 

					// ***** mean sensor(node) ******
					
					$meanNode = array(
						$nodeCount[0],
						$nodeCount[1],
						$nodeCount[2],
						$nodeCount[3],
						$nodeCount[4],
						$nodeCount[5],
						$nodeCount[6],
						$nodeCount[7],
						$nodeCount[8],
						$nodeCount[9]
					);
					
					$j = 0 ;
					while($j < 10){
						if($meanNode[$j] != 0)
							$meanNode[$j] = $this->mean($meanNode[$j]) ;
						else
							$meanNode[$j] = 0; 
						$j++ ;	
					}
				}else{
					$meanWhole = 0 ;
					$meanCageA = "-" ; 
					$meanCageB = "-" ;
					$meanNode = array("-","-","-","-","-","-","-","-","-","-") ;
					
				}



				// -------------------period---------------- //

				// ****Most Active Period - System**** //
				$mostActivePeriod = $this->mostPeriodAll($periodCount,$duration);
				$periodNode = $this->countValue($nodeDuration);
			
				// **** Most Active Peroid separated by sensors **** //
				$mostPeriodNode = $this->mostNode($periodNode);
		
				// **** Most Active Peroid in Cage A **** //
				$mostPeriodA = $this->mostPeriodA($mostPeriodNode,$duration);
	
				// **** Most Active Peroid in Cage B **** //	
				$mostPeriodB = $this->mostPeriodB($mostPeriodNode,$duration);


			// --------------------node-------------------- //

				if(count($day)!=0)
					$mostActiveNode = $this->mostActiveNode($nodeCount);
				else
					$mostActiveNode = null;

				$mostActiveNodeA = $this->mostActiveCage(0,5,$nodeCount);

				$mostActiveNodeB = $this->mostActiveCage(6,9,$nodeCount);

				// 
				//
				// เหลือ specify ค่าสูงสุดที่ซ้ำกัน
				//
				//

				// ------------ Temperature (max/min) ------------------///
			
				if(!empty($day)){
					$highestTmp = $this->highestTmp($day);
					$lowestTmp = $this->lowestTmp($day);
				}else{
					$highestTmp = "-";
					$lowestTmp = "-";
				}

				//--------------avg tmp--------------//
				if(!empty($day)){
					$avgTmp = $this->avgTmp($day);
				}else
					$avgTmp = "-";

				//--------------humidity--------------//
				if(!empty($day)){
					$avgHumid = $this->avgHumid($day);
				}else
					$avgHumid = "-";	 

				//-----------------Data Set-------------------
			
				$dataSetMean = array(
					'meanWhole' => $meanWhole,
					'meanA' => $meanCageA,
					'meanB' => $meanCageB,
					'meanNode' => $meanNode
				);

				$dataSetPeriod = array(
					'mostPeriod' => $mostActivePeriod,
					'mostPeriodA' => $mostPeriodA,
					'mostPeriodB' => $mostPeriodB,
					'mostPeriodNode' => $mostPeriodNode
				);

				$dataSetMostNode = array(
					'mostNode' => $mostActiveNode,
					'mostNodeA' => $mostActiveNodeA,
					'mostNodeB' => $mostActiveNodeB
				);

				$dataSetPercentage = array(
					'percentageA' => $percentageA,
					'percentageB' => $percentageB,
					'percentageNode' => $percentageNode
				);

				$dataSetAmount = array(
					'amountAll' => $amountAll,
					'amountA' => $amountCageA,
					'amountB' => $amountCageB,
					'amountNode' => $amountNode
				);
				// เหลือ most Node A / B

				$weather = array(
					'tmp' => $avgTmp,
					'minTmp' => $lowestTmp,
					'maxTmp' => $highestTmp,
					'humid' => $avgHumid
				);
			
			$this->load->view('_report',
							array(
								"logs" => $day,
								"means" => $dataSetMean,
								"periods" => $dataSetPeriod,
								"mostNodes" => $dataSetMostNode,
								"percentages" => $dataSetPercentage,
								"amounts" => $dataSetAmount,
								"dateReceive" => $dateReceive,
								"day" => $day,
								"nodecount" => $nodeCount,
								"weather" =>$weather

							)
						);
		
	}

	public function percentage($amount,$amountAll){
		$percentage = round((($amount*100)/$amountAll),2)." %";
		return $percentage ; 
	}

	public function mean($amount){
		$mean = round(($amount/24),2);
		return $mean ; 
	}

	public function periodCount($day,$duration){
		$periodCount = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
	
		foreach($day as $whole){ 
			$counterDur = 0;	
			$whole->startTime = date("H:i:s",strtotime($whole->startTime));
		
			if($whole->startTime < date("H:i:s",strtotime($duration[0]))){ // ใช้ Start TIme ---> ถูกต้องแล้ว , ค่าเก่าๆจะไม่โชว์
				$periodCount[0] += 1;
			}

			while($counterDur<23){
				if($whole->startTime < date("H:i:s",strtotime($duration[$counterDur+1])) && $whole->startTime >= date("H:i:s",strtotime($duration[$counterDur]))){
					$periodCount[$counterDur+1]++;
				}
				$counterDur++;
			}
		}

		return $periodCount ;
	}

	public function nodeCount($day,$duration){
		$nodeCount = array(0,0,0,0,0,0,0,0,0,0);

		foreach($day as $whole){ 
			$counterDur = 0;	
			$whole->startTime = date("H:i:s",strtotime($whole->startTime));
		
			if($whole->startTime < date("H:i:s",strtotime($duration[0]))){ // ใช้ Start TIme ---> ถูกต้องแล้ว , ค่าเก่าๆจะไม่โชว์
				$nodeCount[($whole->nodeId)-1] +=1; 
			}

			while($counterDur<23){
				if($whole->startTime < date("H:i:s",strtotime($duration[$counterDur+1])) && $whole->startTime >= date("H:i:s",strtotime($duration[$counterDur]))){
					$nodeCount[($whole->nodeId)-1]++;
				}
				$counterDur++;
			}
		}
		return $nodeCount;
	}

	public function nodeDur($day,$duration){
		$nodeDuration = array();

		foreach($day as $whole){ 
			$counterDur = 0;	
			$whole->startTime = date("H:i:s",strtotime($whole->startTime));
		
			if($whole->startTime < date("H:i:s",strtotime($duration[0]))){ // ใช้ Start TIme ---> ถูกต้องแล้ว , ค่าเก่าๆจะไม่โชว์
				$nodeDuration[($whole->nodeId)-1]['nodeDur'][] =$duration[0];
			}

			while($counterDur<23){
				if($whole->startTime < date("H:i:s",strtotime($duration[$counterDur+1])) && $whole->startTime >= date("H:i:s",strtotime($duration[$counterDur]))){
					$nodeDuration[($whole->nodeId)-1]['nodeDur'][] = $duration[$counterDur+1]; 
				}
				$counterDur++;
			}
		}
		return $nodeDuration;
	}

	public function mostPeriodAll($periodCount,$duration){
		$mostPeriod = $duration[array_search(max($periodCount),$periodCount)];
		$mostPeriod = date("H:i",strtotime($mostPeriod)-3600)." - ".date("H:i",strtotime($mostPeriod));
		return $mostPeriod ;
	}

	public function countValue($nodeDuration){
		$most = array();
		$activePeriodCount = 0;
		while($activePeriodCount<10){
			if(isset($nodeDuration[$activePeriodCount])){
				$most[] = array_count_values($nodeDuration[$activePeriodCount]['nodeDur']);
				foreach($most as $periodPernode){
					$periodPernode = (int)$periodPernode;
				}
			}else
				$most[] = "-";	
			$activePeriodCount++;
		}
		return $most ;
	}
		// !ห้ามลบ! 
					// ระบบจะแยกเวลาออกเป็นจำนวนๆ 
					// เหลือหาจำนวนที่มากที่สุด
			 		// ใช้ var_dump($periodNode); ดู
				// !ห้ามลบ! 
				// var_dump($periodNode);
		
	public function mostNode($periodNode){
		$setMost = 0;
		while($setMost<10){
			if(isset($periodNode[$setMost]) && $periodNode[$setMost] != '-' ){
				$mostPeriodNode[] = 
					array_search(
						max($periodNode[$setMost]),
						$periodNode[$setMost]
					
					);
			}else
				$mostPeriodNode[$setMost] = "-";
			$setMost++;
		}
		return $mostPeriodNode ;
	}

	public function mostPeriodA($mostPeriodNode,$duration){
		$mostPeriodFromA = array();
		$countPeriodA = 0;
		$checkPeriodA = "";
		while($countPeriodA < 6){
			$mostPeriodFromA[] = $mostPeriodNode[$countPeriodA];
			$checkPeriodA .= (string)$mostPeriodNode[$countPeriodA];
			$countPeriodA++;
		}

		if($checkPeriodA != '------'){
			$mostPeriodA =	$mostPeriodNode[
										array_search(
											max($mostPeriodFromA),$mostPeriodFromA
										)
									]
								;								
			if($mostPeriodA == $duration[23])
				$mostPeriodA = date("H:i",strtotime($mostPeriodA)-3599). " - " . date("H:i",strtotime($mostPeriodA)); // Most A
			else
				$mostPeriodA = date("H:i",strtotime($mostPeriodA)-3600). " - " . date("H:i",strtotime($mostPeriodA)); // Most A
		}else
			$mostPeriodA =	"-";

			return $mostPeriodA ;
	}

	public function mostPeriodB($mostPeriodNode, $duration){
		$mostPeriodFromB = array();
		$countPeriodB = 6;
		$checkPeriodB = "";
		while($countPeriodB < 10){
			$mostPeriodFromB[] = $mostPeriodNode[$countPeriodB];
			$checkPeriodB .= (string)$mostPeriodNode[$countPeriodB];
			$countPeriodB++;
		}
		
		if($checkPeriodB != '----'){
			$mostPeriodB =	$mostPeriodNode[
										array_search(
											max($mostPeriodFromB),$mostPeriodFromB
										)
									];		
			if($mostPeriodB == $duration[23])		
				$mostPeriodB = date("H:i",strtotime($mostPeriodB)-3599). " - " . date("H:i",strtotime($mostPeriodB)); // Most A									
			else	
				$mostPeriodB = date("H:i",strtotime($mostPeriodB)-3600). " - " . date("H:i",strtotime($mostPeriodB)); // Most B
		}else
			$mostPeriodB = "-";
		
		return $mostPeriodB ; 	
	}

	public function mostActiveNode($nodeCount){
		$mostNode = array_search(max($nodeCount),$nodeCount)+1;
		return $mostNode ;
	}

	public function mostActiveCage($start,$end,$nodeCount){
		$node = array(); 
		$zero = 0;
		while($start <= $end){
			$node[] = $nodeCount[$start];
			if($nodeCount[$start] == 0){
				$zero++;
			}
			$start++;
		}

		if($end == 5)
			$mostNodeCage = array_search(max($node),$nodeCount)+1;
		else if($end == 9)
			$mostNodeCage = array_search(max($node),$nodeCount)+7;

		if($end == 5 && $zero == 6){
			$mostNodeCage = "-";
		}
		if($end == 9 && $zero == 4)
			$mostNodeCage = "-";
		
		return $mostNodeCage;
	}

	public function highestTmp($day){
		$highest = max(array_column($day, 'temperatureC'));
		return $highest ;
	} 

	public function lowestTmp($day){
		if(count(array_filter(array_column($day, 'temperatureC'))) !== null)
			$lowest = min(array_filter(array_column($day, 'temperatureC')));
		else
			$lowest = "-";	
		
		return $lowest ; 
	}

	public function avgTmp($day){
		$sumTmp = 0 ;
		$countNA = 0 ;
		foreach($day as $d){
			if($d->temperatureC == null)
				$countNA++;
			else
				$sumTmp += $d->temperatureC;
		}
		$avgTmp = round($sumTmp/(count($day)-$countNA),2); 

		return $avgTmp;
	}

	public function avgHumid($day){
		$sumHumid = 0 ;
		$countNA = 0 ;
		foreach($day as $d){
			if($d->humidity == null)
				$countNA++;
			else
				$sumHumid += $d->humidity;
		}
		$avgHumid = round($sumHumid/(count($day)-$countNA),2); 

		return $avgHumid ; 
	}

}

