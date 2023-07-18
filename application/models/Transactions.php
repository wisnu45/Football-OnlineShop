<?php 
defined('BASEPATH') OR exit('No direct script access allowed !');

class Transactions extends CI_Model{
    public function getTransactionDetail($id){
        $query = $this->db->get_where('transactions', array('TransactionID' => $id));
        $result = $query->row();
        return $result;
    } 

    public function TransactionsData() {
        $query = $this->db->query("SELECT * FROM transactions");
		return $query->result_array();
    }

    public function transaction_info($param){
        $query = $this->db->get_where("transactions", $param);
        $transactioninfo = $query->row();

        return $transactioninfo;
    }

    public function transaction_details($param){
        $query = $this->db->get_where("orders",$param);
        $orders = $query->result_array();

        return $orders;
    }
}