<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	// function __construct(){
	// 	parent::__construct();
	// 	$this->load->helper('url');
	// }

	public function index(){
		$this->load->view('home');
	}

	// public function membros(){
	// 	$this->load->view('membros');
	// }

	// public function escalas(){
	// 	$this->load->view('escalas');
	// }

	// public function cartas(){
	// 	$this->load->view('cartas');
	// }

	// public function certificados(){
	// 	$this->load->view('certificados');
	// }

	// public function diretoria(){
	// 	$this->load->view('diretoria');
	// }

	// public function atualizacoes(){
	// 	$this->load->view('atualizacoes');
	// }
	
}
