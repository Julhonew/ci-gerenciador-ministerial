<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atualizacoes extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){
		$this->load->view('atualizacoes');
	}
}
