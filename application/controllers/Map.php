<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

	public function index()
	{
		$this->load->view('_map');
		// $this->load->view('pageLayout');
	
		/*
		$data['nickname']->nickname = 'Phoom';
		$this->load->view('welcome_message',$data);
		*/
	}
}

