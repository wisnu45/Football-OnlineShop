<?php 
defined('BASEPATH') OR exit('No direct script access allowed !');

class Categories extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function CategoriesData()
	{
		$query = $this->db->query("SELECT * FROM categories");
		return $query->result_array();
    } 
    
    public function NewCategories($values) { 
        $this->db->insert('categories', $values);
    }

    public function DelCategories($id) {
        $this->db->where('CategoriesID', $id)
                ->delete('categories');
    }

    public function UpdateCategories($id, $name) {
        $data = array( 
            'CategoriesName' =>  $name
        );
        $this->db->where('CategoriesID', $id);
        $this->db->update('categories', $data);
    }
}