<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('products');
		$this->load->model('customers');
	}

	public function index()
	{
		$this->session->set_userdata('orderDoneCheckOut', FALSE);
		$data['products'] = $this->products->ProductsData();
		$data['shoes'] = $this->products->productShoes();
		$data['jersey'] = $this->products->productJersey();
		$data['ball'] = $this->products->productBall();
		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
		if($this->session->userdata('status') == "login"){
			$data['navbar'] = $this->load->view('template/navbar_loggedin', NULL, TRUE);
		}else{
			$data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
		}

		$this->load->view('page/home',$data);
	}
	
}

?>