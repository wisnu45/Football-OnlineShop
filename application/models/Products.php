<?php 
defined('BASEPATH') OR exit('No direct script access allowed !'); 

class Products extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function ProductsData()
	{
		$query = $this->db->query("SELECT * FROM products");
		return $query->result_array();
    }

    public function productJersey() {
        $query = $this->db->query("SELECT * FROM products WHERE CategoriesID=2");
		return $query->result_array();
    }

    public function productShoes() {
        $query = $this->db->query("SELECT * FROM products WHERE CategoriesID=1");
		return $query->result_array();
    }

    public function productBall() {
        $query = $this->db->query("SELECT * FROM products WHERE CategoriesID=3");
		return $query->result_array();
    }
    
    public function upload() {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('ProductImage')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());      
            return $return;
        }
    }

    public function save($upload) {
        $productImage = 'assets/images/' . $upload['file']['file_name'];
        $data = array (
            'ProductName' => $this->input->post('ProductName'),
            'ProductPrice' => $this->input->post('ProductPrice'),
            'ProductDescription' => $this->input->post('ProductDescription'),
            'ProductImage' => $productImage,
            'ProductQty' => $this->input->post('ProductQuantity'),
            'CategoriesID' => $this->input->post('ProductCategory'),
            'SuppliersID' => $this->input->post('ProductSupplier')
        );

        $this->db->insert('products', $data);
    }

    public function DelProducts($id) {
        $this->db->where('ProductID', $id)
                ->delete('products');
    }

    public function ProductsDataById($id) {
        $query = $this->db->get_where('products', array('ProductID' => $id));
		return $query->row_array();
    }
}