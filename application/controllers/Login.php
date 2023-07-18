<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('customers');
        $this->load->model('login_model');
    }
    
    function index(){
        /* if($this->session->userdata('status') == "login"){
            redirect(base_url("Home"));
        }
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
        $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
        $this->load->view('page/customer_login', $data); */

        if($this->session->userdata('status') == "login"){
            redirect(base_url("Home"));
		}else{
			$data['style'] = $this->load->view('include/style',NULL,TRUE);
            $data['script'] = $this->load->view('include/script',NULL,TRUE);
            $data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
            $data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
            $this->load->view('page/customer_login', $data);
        }
    }

    /* function process_login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $where = array(
            'email' => $email,
            'password' => md5($password)
        );
        $cek = $this->customers->check("customers", $where);
        if($cek->num_rows() > 0){
            // $get = $cek->result_array();
            // $name = $get[0]->row('first_name') . " " . $get[0]->row('last_name');
            
            $data_session = array(
                'name' => $email,
                'status' => "login",
                'orderDoneCheckOut' => FALSE
            );
            $this->session->set_userdata($data_session);
            
            redirect(base_url());
        } else{
            redirect(base_url("login"));
        }
    } */

    function auth() {
        $email = htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        $adminCheck = $this->login_model->authAdmin($email);

        if($adminCheck->num_rows() > 0) {
            $data = $adminCheck->row_array();

            $hash = $data['Password'];

            if ($data['LevelID'] == '1') {
                if (password_verify($password, $hash)){ 
                    $name = $data['FirstName'] . $data['LastName'];
    
                    $data_session = array(
                        'name' => $name,
                        'status' => "login",
                        'access' => "Super Admin"
                    );
                    $this->session->set_userdata($data_session);
    
                    redirect(base_url("admin"));
                }
            } else {
                if (password_verify($password, $hash)){ 
                    $name = $data['FirstName'] . $data['LastName'];
    
                    $data_session = array(
                        'name' => $name,
                        'status' => "login",
                        'access' => "Admin"
                    );
                    $this->session->set_userdata($data_session);
    
                    redirect(base_url("admin"));
                }
            }
            
        } else {
            $userCheck = $this->login_model->authUser($email);
            if ($userCheck->num_rows() > 0) {
                $data = $userCheck->row_array();

                $hash = $data['password'];

                if (password_verify($password, $hash)){ 
                    if ($data['StatusID'] == 2) {
                        echo "Your Account has been disabled by Admin";
                    } else {
                        $name = $data['FirstName'] . $data['LastName'];
    
                        $data_session = array(
                            'name' => $email,
                            'status' => "login",
                            'access' => "user",
                            'orderDoneCheckOut' => FALSE
                        );
                        $this->session->set_userdata($data_session);
        
                        redirect(base_url());
                    }
                }
            }else{
                redirect(base_url("login"));
            }
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}