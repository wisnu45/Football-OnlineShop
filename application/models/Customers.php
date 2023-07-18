<?php 
defined('BASEPATH') OR exit('No direct script access allowed !');

class Customers extends CI_Model{
    var $customerId,
    $email,
    $password,
    $first_name,
    $last_name,
    $birthdate,
    $phone_number,
    $gender,
    $address,
    $profile_picture;

    public function check($table, $where){
        return $this->db->get_where($table, $where);
    }

    public function insert_customer($newCustomer){
        $this->db->insert("customers", $newCustomer);

        $check = $this->db->get_where("customers", $newCustomer);
        return $check;
    }

    public function customer_details(){
        $key_email = $this->session->userdata('name');

        $query = $this->db->get_where('customers', array('Email' => $key_email));
        // $result = $this->db->query($query);
        $loggedinuser = $query->row();

        return $loggedinuser;
    }

    public function customer_transactions(){
        $loggedinuser = $this->customer_details();

        $query = $this->db->query("SELECT * FROM transactions WHERE CustomerID=". $loggedinuser->CustomerID);
		$transactions = $query->result_array();

        return $transactions;
    }

    public function update($array){
        $loggedinuser = $this->customer_details();

        $this->db->set($array);
        $this->db->where('CustomerID', $loggedinuser->CustomerID);
        $this->db->update('customers');
    }
}