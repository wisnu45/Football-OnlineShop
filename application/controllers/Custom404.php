<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom404 extends CI_Controller
{
	public function __construct(){ 
		parent::__construct();
		$this->load->model("customers");
	}
 
	public function index(){

		$data['style'] = $this->load->view('include/error404/style', NULL, TRUE);
		$data['script'] = $this->load->view('include/error404/script', NULL, TRUE);
		
		$data['mainstyle'] = $this->load->view('include/style',NULL,TRUE);
		$data['mainscript'] = $this->load->view('include/script',NULL,TRUE);
		$data['footer'] = $this->load->view('template/footer.php', NULL, TRUE);
		if($this->session->userdata('status') == "login"){
			$data['navbar'] = $this->load->view('template/navbar_loggedin', NULL, TRUE);
		}else{
			$data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
		}
		$this->output->set_status_header('404');
		$this->load->view('page/error/error404', $data);
	}
}