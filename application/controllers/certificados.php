<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificados extends MY_Controller {

	public function __construct(){
	    parent::__construct();
		$this->load->model('certificados_model');
	}

	public function index(){
		$data['certificados'] = $this->certificados_model->selectAll();
		$this->load->view('certificados/certificados', $data);
	}

	public function tipoCertificados(){
		$data['certificados'] = $this->certificados_model->getTipoCertificado($this->uri->segment(3));
		$this->load->view('certificados/tipoCertificados', $data);
	}

}
