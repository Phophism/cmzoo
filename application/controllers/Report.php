<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function index(){
		
		$this->load->model('animal_log_model');
		$datepicker = $this->input->post('datepicker');
		var_dump($datepicker);
		if($datepicker==null){
			$this->load->view('_dailyreport');
		}else{
			$datepicker = date("Y-m-d",strtotime($datepicker));
			$day = $this->animal_log_model->get_data_by_date($datepicker);
			
			if(isset($day)){
				$duration = array("01:00:00","02:00:00","03:00:00","04:00:00","05:00:00","06:00:00","07:00:00","08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00","16:00:00","17:00:00","18:00:00","19:00:00","20:00:00","21:00:00","22:00:00","23:00:00","23:59:00");
				$periodCount = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
				$nodeCount = array(0,0,0,0,0,0,0,0,0,0);
				$nodeDuration = array();
				foreach($day as $whole){
					if($whole->startTime < strtotime($duration[0])){
						$periodCount[0] += 1;
						$nodeCount[($whole->nodeId)-1] +=1; 
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[0];
					}
					else if($whole->startTime < strtotime($duration[1])&&$whole->startTime > strtotime($duration[0])){
						$periodCount[1]++;
						$nodeCount[($whole->nodeId)-1]++;
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[1];
					}
					else if($whole->startTime < strtotime($duration[2]) && $whole->startTime > strtotime($duration[1])){
						$periodCount[2]++;
						$nodeCount[($whole->nodeId)-1]++;
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][]= $duration[2];  
					}
					else if($whole->startTime < strtotime($duration[2]) && $whole->startTime > strtotime($duration[2])){
						$periodCount[3]++;
						$nodeCount[($whole->nodeId)-1]++;
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[3];
					}
					else if($whole->startTime < strtotime($duration[4])&&$whole->startTime > strtotime($duration[3])){
						$periodCount[4]++;
						$nodeCount[($whole->nodeId)-1]++;	 
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[4];
					}
					else if($whole->startTime < strtotime($duration[5]) && $whole->startTime > strtotime($duration[4])){
						$periodCount[5]++;
						$nodeCount[($whole->nodeId)-1]++;	
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][]= $duration[5];
					}
					else if($whole->startTime < strtotime($duration[6]) && $whole->startTime > strtotime($duration[5])){
						$periodCount[6]++;
						$nodeCount[($whole->nodeId)-1]++;	  
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[6];
					}
					else if($whole->startTime < strtotime($duration[7])&&$whole->startTime > strtotime($duration[6])){
						$periodCount[7]++;
						$nodeCount[($whole->nodeId)-1]++;	
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[7]; 
					}
					else if($whole->startTime < strtotime($duration[8]) && $whole->startTime > strtotime($duration[7])){
						$periodCount[8]++;
						$nodeCount[($whole->nodeId)-1]++;
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[8];
					}
					else if($whole->startTime < strtotime($duration[9]) && $whole->startTime > strtotime($duration[8])){
						$periodCount[9]++;
						$nodeCount[($whole->nodeId)-1]++;
						$nodeDuration['node'][]= $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[9]; 
					}
					else if($whole->startTime < strtotime($duration[10])&& $whole->startTime > strtotime($duration[9])){
						$periodCount[10]++;
						$nodeCount[($whole->nodeId)-1]++;
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[10]; 
					}
					else if($whole->startTime < strtotime($duration[11])&& $whole->startTime > strtotime($duration[10])){
						$periodCount[11]++;
						$nodeCount[($whole->nodeId)-1]++;	 
						$nodeDuration['node'][]= $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[11]; 
					}
					else if($whole->startTime < strtotime($duration[12])&& $whole->startTime > strtotime($duration[11])){
						$periodCount[12]++;
						$nodeCount[($whole->nodeId)-1]++;	 
						$nodeDuration['node'][]= $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[12]; 
					}
					else if($whole->startTime < strtotime($duration[13])&& $whole->startTime > strtotime($duration[12])){
						$periodCount[13]++;
						$nodeCount[($whole->nodeId)-1]++;
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[13];   
					}
					else if($whole->startTime < strtotime($duration[14])&& $whole->startTime > strtotime($duration[13])){
						$periodCount[14]++;
						$nodeCount[($whole->nodeId)-1]++;
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[14]; 
					}
					else if($whole->startTime < strtotime($duration[15])&& $whole->startTime > strtotime($duration[14])){
						$periodCount[15]++;
						$nodeCount[($whole->nodeId)-1]++;	
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][]= $duration[15]; 	  
					}
					else if($whole->startTime < strtotime($duration[16])&& $whole->startTime > strtotime($duration[15])){
						$periodCount[16]++;
						$nodeCount[($whole->nodeId)-1]++;	 
						$nodeDuration['node'][]= $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[16]; 	
					}
					else if($whole->startTime < strtotime($duration[17])&& $whole->startTime > strtotime($duration[16])){
						$periodCount[17]++;
						$nodeCount[($whole->nodeId)-1]++;	
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[17];  
					}
					else if($whole->startTime < strtotime($duration[18])&& $whole->startTime > strtotime($duration[17])){
						$periodCount[18]++;
						$nodeCount[($whole->nodeId)-1]++;	  
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[18]; 	
					}
					else if($whole->startTime < strtotime($duration[19])&& $whole->startTime > strtotime($duration[18])){
						$periodCount[19]++;
						$nodeCount[($whole->nodeId)-1]++;	  
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[19]; 
					}
					else if($whole->startTime < strtotime($duration[20])&& $whole->startTime > strtotime($duration[19])){
						$periodCount[20]++;
						$nodeCount[($whole->nodeId)-1]++;
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[20]; 		  
					}
					else if($whole->startTime < strtotime($duration[21])&& $whole->startTime > strtotime($duration[20])){
						$periodCount[21]++;
						$nodeCount[($whole->nodeId)-1]++;
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[21]; 	
					}
					else if($whole->startTime < strtotime($duration[22])&& $whole->startTime > strtotime($duration[21])){
						$periodCount[22]++;
						$nodeCount[($whole->nodeId)-1]++;
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[22]; 		  
					}
					else if($whole->startTime < strtotime($duration[23])&& $whole->startTime > strtotime($duration[22])){
						$periodCount[23]++;
						$nodeCount[($whole->nodeId)-1]++;
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[23]; 
					}
					else if($whole->startTime < strtotime($duration[24])&& $whole->startTime > strtotime($duration[23])){
						$periodCount[24]++;
						$nodeCount[($whole->nodeId)-1]++;
						$nodeDuration['node'][] = $whole->nodeId;
						$nodeDuration['nodeDur'][] = $duration[24]; 	
					}
				}
				// echo "<hr/>";
				// var_dump($nodeDuration);
				// echo "<hr/>";
				//amount
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
					$percentageA = round((($amountCageA*100)/$amountAll),2);
					$percentageB = round((($amountCageB*100)/$amountAll),2);
					// ดัก divide by 0

				// Mean whole
				$meanWhole = round((count($day)/24),2);
			
				// Mean Cage
				$i=0;
				$meanCageA = 0;
				$meanCageB = 0;
				while($i<6){
					$meanCageA += $nodeCount[$i];
					$i++;
				}
				while($i<10){
					$meanCageB += $nodeCount[$i];
					$i++;
				}
				$meanCageA = round(($meanCageA/24),3) ; // All in A divide by 24 -> get mean , decimal = 3 
				$meanCageB = round(($meanCageB/24),3) ;

				// mean sensor(node)
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
						$meanNode[$j] = round(($meanNode[$j]/24),3) ;
					else
						$meanNode[$j] = "N/A"; 
					$j++ ;	
				}

				// most active

						//$countDup = array_count_values($nodeCount);

				// period		
				$mostActivePeriod = array_search(max($periodCount),$periodCount);
				$mostActivePeriodA = date("H:i",
					strtotime(
						$duration[
							array_search(max(
								$periodCount[0],
								$periodCount[1],
								$periodCount[1],
								$periodCount[2],
								$periodCount[3],
								$periodCount[4],
								$periodCount[5]
							),
							$periodCount)
						]
					)
				);

				echo "<hr/>";
				var_dump(array_search(max(
					$periodCount[0],
					$periodCount[1],
					$periodCount[1],
					$periodCount[2],
					$periodCount[3],
					$periodCount[4],
					$periodCount[5]
				),
				$periodCount));
				echo "<hr/>";

				$mostActivePeriodB = date("H:i",
					strtotime(
						$duration[
							array_search(max(
								$periodCount[6],
								$periodCount[7],
								$periodCount[8],
								$periodCount[9]
							),
							$periodCount)
						]
					)
				);

				echo "<hr/>";
				var_dump(array_search(max(
					$periodCount[6],
					$periodCount[7],
					$periodCount[8],
					$periodCount[9]
				),
				$periodCount));
				var_dump($periodCount);
				echo "<hr/>";
				
				// node
				$mostActiveNode = array_search(max($nodeCount),$nodeCount)+1;
				$mostActiveNodeA = array_search(
					max(
						$nodeCount[0],
						$nodeCount[1],
						$nodeCount[2],
						$nodeCount[3],
						$nodeCount[4],
						$nodeCount[5]
					)
					,$nodeCount
				)+1;
				$mostActiveNodeB =  array_search(
					max(
						$nodeCount[6],
						$nodeCount[7],
						$nodeCount[8],
						$nodeCount[9]
					)
					,$nodeCount
				)+1;
				
				// 
				//
				// เหลือ specify ค่าสูงสุดที่ซ้ำกัน
				//
				//


				// Data Set
				$dataSetTable = array(
					'meanWhole' => $meanWhole,
					'meanA' => $meanCageA,
					'meanB' => $meanCageB,
					'mostPeriod' => $mostActivePeriod,
					'mostPeriodA' => $mostActivePeriodA,
					'mostPeriodB' => $mostActivePeriodB,
					'mostNode' => $mostActiveNode,
					'mostNodeA' => $mostActiveNodeA,
					'mostNodeB' => $mostActiveNodeB,
					'amountAll' => $amountAll,
					'amountA' => $amountCageA,
					'amountB' => $amountCageB,
					'percentageA' => $percentageA,
					'percentageB' => $percentageB
					
				);
				// เหลือ most Node A / B


				



			
			$this->load->view('_dailyreport',
							array(
								"logs" => $day,
								"dataSet" => $dataSetTable
							)
						);
			
			}else
				echo "no data";
			
			
		}
	}


}

