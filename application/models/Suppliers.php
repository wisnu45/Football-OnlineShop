<?php 
defined('BASEPATH') OR exit('No direct script access allowed !');

class Suppliers extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function SuppliersData()
	{
		$query = $this->db->query("SELECT * FROM suppliers");
		return $query->result_array();
    }
    
    public function NewSuppliers($values) { 
        $this->db->insert('suppliers', $values);
    }

    public function DelSuppliers($id) {
        $this->db->where('SuppliersID', $id)
                ->delete('suppliers');
    }

    public function UpdateSuppliers($id, $name) {
        $data = array( 
            'SuppliersName' =>  $name
        );
        $this->db->where('SuppliersID', $id);
        $this->db->update('suppliers', $data);
    }
}