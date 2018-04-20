<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sensor extends CI_Controller {

	public function index()
	{
		$this->load->model('sensor_model');
		
		if ($status!=0) {
			if ($timediff>=15){
			   
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_URL,'http://teng.thai2biz.net/cmzoo/dataupdate.php?sensor_ping=0&state=0&Node_ID='.$nid);		// + stage = 0 เปลี่ยน state  อัตโนมัติ
				curl_exec($ch);   
			}
		  }

		$this->load->view('_sensorstatus',
			array(
				"sensors" => $this->sensor_model->get()
			)
		);

		/*
		$data['nickname']->nickname = 'Phoom';
		$this->load->view('welcome_message',$data);
		*/
	}
  
	// เปลี่ยน url จาก /httpupdate?... ใน sensor เป็น /update?...

	public function update(){
		$nodeId = $this->input->get('nodeId'); // receive nodeId from url parameter
		$status = $this->input->get('status'); // receive status from url parameter
		$this->load->model('sensor_model');
		$this->sensor_model->update($nodeId,$status);
	}

	// function Time expire

}

