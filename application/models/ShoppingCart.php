<?php 
defined('BASEPATH') OR exit('No direct script access allowed !');

class ShoppingCart extends CI_Model{
    public function getProductId($id){
        return $this->db->select('ProductID')->get('products');
    }

    public function addProductToOrder($productData){ //Add item to cart
        $this->db->insert('orders', $orderData);
        $id = $this->db->insert_id;
        return (isset($id)) ? $id : FALSE;
    }

    public function addPendingTransaction($orderData){ //Check out
        $this->db->insert('transactions', $orderData);
    }

    public function getTransactionId(){
        return $this->db->insert_id();
    }

    public function addTransactionItems($items){ // get all item in cart
        $this->db->insert('orders', $items);
    }
}