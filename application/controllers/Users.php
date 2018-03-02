<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    function list() {
        $this->load->model('users_model');
        $users_list = $this->users_model->getAll();
        $this->load->view('users', array(
            'users_list' => $users_list
        ));
    }
}

