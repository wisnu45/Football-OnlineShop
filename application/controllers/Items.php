<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('products');
		$this->load->model('customers');
	}

    function index(){
        $data['products'] = $this->products->ProductsData();
		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		if($this->session->userdata('status') == "login"){
			$data['navbar'] = $this->load->view('template/navbar_loggedin', NULL, TRUE);
		}else{
			$data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
		}
		$data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);

		$this->load->view('page/items',$data);
    }
}