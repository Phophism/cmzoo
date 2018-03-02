<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emark extends CI_Controller {

	function index()
	{
		$this->load->view('header');
		echo $this->key(2);
	}

	function key($epoom) {
		return $epoom + 2;
	}
}
