<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('customers');
        $this->load->model('login_model');
    }

    function index(){
        if($this->session->userdata('status') == "login"){
            redirect(base_url("Home"));
        }
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
        $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('emailConf', 'Email Confirmation', 'required|matches[email]');
        $this->form_validation->set_rules('pass', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('passConf', 'Password Confirmation', 'required|matches[pass]');

        // $this->load->view('page/customer_register', $data);

        if($this->form_validation->run() == FALSE){
            $this->load->view('page/customer_register', $data);
        }else{
            $this->process_register();
        }
    }

    function process_register(){
        $firstname = htmlspecialchars($this->input->post('firstname', TRUE), ENT_QUOTES);
        $lastname = htmlspecialchars($this->input->post('lastname', TRUE), ENT_QUOTES);
        $gender = htmlspecialchars($this->input->post('gender', TRUE), ENT_QUOTES);
        $email = htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('pass', TRUE), ENT_QUOTES);

        $pass = password_hash($password, PASSWORD_BCRYPT);

        $newUser = array(
            'email' => $email,
            'password' => $pass,
            'first_name' => $firstname,
            'last_name' => $lastname,
            'gender' => $gender
        );

        $userCheck = $this->login_model->authUser($email);

        if ($userCheck->num_rows() > 0) {
            $data['message'] = 'Failed doing registration. Please try another email';
        } else {
            $this->login_model->insertUser($newUser);
            $data['message'] = 'User Registered Successfully';
        }

        /* redirect(base_url('index.php/Login'));

        $table="customers";

        $cek = $this->customers->check($table, $newUser);
        if($cek->num_rows() == 0){
            $register = $this->customers->insert_customer($newUser);
            if($register->num_rows() > 0){
                $data['message'] = 'Customer Registered Succcessfully.';
            }
        }else{
            $data['message'] = 'Failed doing registration. Please try another email.';
        } */
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
        $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
        $this->load->view('page/after_register', $data);
        
    }
}