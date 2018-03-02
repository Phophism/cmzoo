<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
    public function getAll() {
        return $this->db->get('users')->result();
    }
}

?>