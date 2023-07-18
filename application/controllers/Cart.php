<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('ShoppingCart');
        $this->load->model('customers');
        $this->load->model('transactions');
    }

    public function index(){
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
        if($this->session->userdata('status') == "login"){
			$data['navbar'] = $this->load->view('template/navbar_loggedin', NULL, TRUE);
		}else{
			$data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
        }
        
        $this->load->view('page/cart', $data);
    }

    public function add(){
        $data_produk = array(
            'id' => $this->input->post('productId'),
            'name' => $this->input->post('productName'),
            'price' => $this->input->post('productPrice'),
            'image' => $this->input->post('productImage'),
            'qty' => $this->input->post('productQty'),
        );

        $this->cart->insert($data_produk);
        redirect(base_url("cart"));
    }

    public function delete($rowid){
        if ($rowid=="all"){
            $this->cart->destroy();
        }else{
            $data = array('rowid' => $rowid, 'qty' =>0);
            $this->cart->update($data);
        }
        redirect(base_url("cart"));
    }

    public function update_cart(){
        $cart_info = $_POST['cart'];
        foreach($cart_info as $cart)
        {
            $rowid = $cart['rowid'];
            $qty = $cart['qty'];
            $data = array('rowid' => $rowid,
                            'qty' => $qty);
            $this->cart->update($data);
        }
        redirect(base_url("cart"));
    }

    public function check_out(){
        $cust = $this->customers->customer_details();
        $data['customername'] = $cust->first_name . " " . $cust->last_name;
        $data['address'] = $cust->address;
        $data['phonenumber'] = $cust->phone_number;
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
        
        if($this->session->userdata('status') == "login"){
            if($cust->address == NULL || $cust->phone_number == NULL){
                redirect(base_url("user"));
            }
            $data['navbar'] = $this->load->view('template/navbar_loggedin', NULL, TRUE);
            $this->load->view('page/check_out', $data);
		}else{
			redirect(base_url("login"));
        }
    } 

    public function proceed_order(){
        if($this->session->userdata('orderDoneCheckOut') == TRUE){
            redirect(base_url());
        }
        //Input Customer Data
        $customerID = $this->customers->customer_details()->CustomerID;
        $grand_total = 0;
        if ($cart = $this->cart->contents())
        {
            foreach ($cart as $item)
            {
                 $grand_total = $grand_total + $item['subtotal'];
            }
        }

        //Input Transaction Data
        $transactionData = array(
            'transactionDate' => date('Y-m-d'),
            'CustomerID' => $customerID,
            'transactionValue' => $grand_total,
            'paymentMethod' => $_POST['paymentMethod'],
            'transactionStatus' => "PENDING"
        );

        $this->ShoppingCart->addPendingTransaction($transactionData);
        $transactionId = $this->ShoppingCart->getTransactionId();

        //Input Order Items
        if ($cart = $this->cart->contents())
             {
                foreach ($cart as $item)
                    {
                        $transactionItems = array(
                            'TransactionID' =>$transactionId,
                            'ProductID' => $item['id'],
                            'ProductQty' => $item['qty']
                        );
                        $proses = $this->ShoppingCart->addTransactionItems($transactionItems);
                    }
            }

        //Clear Shopping Cart
        $this->cart->destroy();

        $recentOrder = $this->transactions->getTransactionDetail($transactionId);
        
        $this->session->set_userdata('orderDoneCheckOut', TRUE);

        $this->order_success($recentOrder);
    }

    public function order_success($recentOrder){
            $data['lastOrderValue'] = $recentOrder->transactionValue;
            $data['script'] = $this->load->view('include/script', NULL, TRUE);
            $data['style'] = $this->load->view('include/style', NULL, TRUE);
            if($this->session->userdata('status') == "login"){
                $data['navbar'] = $this->load->view('template/navbar_loggedin', NULL, TRUE);
            }else{
                $data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
            }
            $data['footer'] = $this->load->view('template/footer', NULL, TRUE);
            
            $this->load->view('page/order_success', $data);
        
    }
}
