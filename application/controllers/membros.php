<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membros extends MY_Controller {

	public function index(){
		$this->load->model('membros_model');
		$data['membros'] = $this->membros_model->listar();
		$this->load->view('membros', $data);
	}
	
}
