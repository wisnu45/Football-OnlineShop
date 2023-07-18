<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('customers');
        
        if($this->session->userdata('status') != "login"){
            redirect(base_url("Login"));
        }
    }

    function index(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('template/navbar_loggedin',NULL,TRUE);
        $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);

        $cust = $this->customers->customer_details();
        $data['customername'] = $cust->first_name . " " . $cust->last_name;
        $data['email'] = $cust->email;
        $data['address'] = $cust->address;
        $data['phonenumber'] = $cust->phone_number;
        $data['birthdate'] = $cust->birthdate;

        $this->load->view('page/customer_profile', $data);
    }

    function transactions(){
        $transactionlists = $this->customers->customer_transactions();

        $data['transactions'] = $transactionlists;

        $data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('template/navbar_loggedin',NULL,TRUE);
        $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);

        $this->load->view('page/customer_transactions', $data);
    }

    function transaction_details(){
        $id = $_POST['transactionID'];

        if($id != NULL){
            $this->load->model('transactions');
            $where = array(
                'TransactionID' => $id
            );
            $transinfo = $this->transactions->transaction_info($where);
            $orders = $this->transactions->transaction_details($where);

            $this->load->model('products');
            $items = array();

            foreach($orders as $item){
                $product = $this->products->ProductsDataById($item['ProductID']);
                $productdetails = array(
                    'image' => $product['ProductImage'],
                    'name' => $product['ProductName'],
                    'price' => $product['ProductPrice'],
                    'qty' => $item['ProductQty']
                );
                array_push($items, $productdetails);
            }

            $data['transaction'] = $transinfo;
            $data['orders'] = $items;
    
            $data['style'] = $this->load->view('include/style',NULL,TRUE);
            $data['script'] = $this->load->view('include/script',NULL,TRUE);
            $data['navbar'] = $this->load->view('template/navbar_loggedin',NULL,TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
    
            $this->load->view('page/transaction_details', $data);
        }else{
            redirect(base_url("user/transactions"));
        }
        
    }

    function upload_pop(){
        $id = $_POST['transactionID'];

        if($id != NULL){
            $this->load->model('transactions');
            $where = array(
                'TransactionID' => $id
            );
            $transinfo = $this->transactions->transaction_info($where);

            $data['transaction'] = $transinfo;
            $data['style'] = $this->load->view('include/style',NULL,TRUE);
            $data['script'] = $this->load->view('include/script',NULL,TRUE);
            $data['navbar'] = $this->load->view('template/navbar_loggedin',NULL,TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
    
            $this->load->view('page/customer_upload_pop', $data);
        }else{
            redirect(base_url("user/transactions"));
        }
    }

    function update_pop(){
        
    }

    function edit_profile(){
        $cust = $this->customers->customer_details();
        $data['firstname'] = $cust->first_name;
        $data['lastname'] = $cust->last_name;
        $data['address'] = $cust->address;
        $data['phonenumber'] = $cust->phone_number;
        $data['birthdate'] = $cust->birthdate;

        $data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('template/navbar_loggedin',NULL,TRUE);
        $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);

        $this->load->view('page/customer_edit_profile', $data);
    }

    function update_data(){
        $firstname = htmlspecialchars($this->input->post('firstname', TRUE), ENT_QUOTES);
        $lastname = htmlspecialchars($this->input->post('lastname', TRUE), ENT_QUOTES);
        $birthdate = htmlspecialchars($this->input->post('bday', TRUE), ENT_QUOTES);
        $phonenumber = htmlspecialchars($this->input->post('phoneNumber', TRUE), ENT_QUOTES);
        $address = htmlspecialchars($this->input->post('address', TRUE), ENT_QUOTES);

        $update = array(
            'first_name' => $firstname,
            'last_name' => $lastname,
            'birthdate' => $birthdate,
            'phone_number' => $phonenumber,
            'address' => $address
        );

        $this->customers->update($update);

        redirect(base_url("user"));
    }

    function edit_email(){
        $cust = $this->customers->customer_details();
        $data['email'] = $cust->email;

        $data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('template/navbar_loggedin',NULL,TRUE);
        $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('newEmail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('newEmailConf', 'Email Confirmation', 'required|matches[newEmail]');

        if($this->form_validation->run() == FALSE){
            $this->load->view('page/customer_edit_email', $data);
        }else{
            $this->update_email();
        }
       
    }

    function update_email(){
        $newemail = htmlspecialchars($this->input->post('newEmail', TRUE), ENT_QUOTES);

        $update = array(
            'email' => $newemail
        );

        $check = $this->customers->check("customers", $update);
        if($check->num_rows() > 0){
            echo "This email address has been registered with another account.";
            echo "<a href=\"" . base_url("user") . "\"><button class=\"btn\">Back</button></a>";
        }else{
            $this->customers->update($update);
            $this->session->set_userdata('name', $newemail);
            redirect(base_url("user"));
        }
    }

    function edit_password(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('template/navbar_loggedin',NULL,TRUE);
        $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('newPassword', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('newPassConf', 'Password Confirmation', 'required|matches[newPassword]');

        if($this->form_validation->run() == FALSE){
            $this->load->view('page/customer_edit_password', $data);
        }else{
            $this->update_password();
        }
    }

    function update_password(){
        $oldpassword = $_POST['oldPassword'];
        $newpassword = $_POST['newPassword'];

        $check = $this->customers->customer_details();

        if(password_verify($oldpassword, $check->password)){
            $pass = password_hash($newpassword, PASSWORD_BCRYPT);
            $update = array(
                'password' => $pass
            );

            $this->customers->update($update);
            redirect(base_url("user"));
        }else{
            echo "Fail to change your password.";
            echo "<a href=\"" . base_url("user") . "\"><button class=\"btn\">Back</button></a>";
        }
    }
}
