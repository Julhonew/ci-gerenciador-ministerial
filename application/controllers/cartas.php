<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cartas extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){
		$this->load->view('cartas/cartas');
	}
}
