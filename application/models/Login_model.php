<?php 
defined('BASEPATH') OR exit('No direct script access allowed !'); 

class Login_model extends CI_Model{

    function authAdmin($email) {
        $this->db->where('Email', $email); 
        $query = $this->db->get('admins'); 

        return $query;
    }

    function authUser($email) {
        $this->db->where('email', $email); 
        $query = $this->db->get('customers'); 

        return $query;
    }

    function insertUser($newUser) {
        $this->db->insert('customers', $newUser);
    }

} 