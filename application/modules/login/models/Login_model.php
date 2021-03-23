<?php

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
        
    }

    function validuser($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $table = $this->db->get('admins');
        return $table;
    }


}

?>