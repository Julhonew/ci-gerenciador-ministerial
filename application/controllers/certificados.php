<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificados extends MY_Controller {

	public function index(){
		$this->load->model('certificados_model');
		$data['certificados'] = $this->certificados_model->selectAll();
		$this->load->view('certificados/certificados', $data);
	}

}
