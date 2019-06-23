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

	public function cadastrarTipo(){
		if($this->input->post()){

			echo "<pre>";
			var_dump($this->input->post());
			exit;

			if(isset($_FILES['imagem']) && $_FILES['imagem']['name'] != "" ){

				$ext = strtolower(substr($_FILES['imagem']['name'], -4));
				$novo_nome = md5(time()) . $ext;
				$dir = 'assets/imagens/fotos/';

				move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$novo_nome);

				$imagem = $novo_nome;
			}

			
		}else{

			$data['titulos'] = $this->certificados_model->getTitulosCert();
			$this->load->view('certificados/cadastrarTipo', $data);	

		}
	}

	public function tipoCertificados(){
		$data['certificados'] = $this->certificados_model->getTipoCertificado($this->uri->segment(3));
		$this->load->view('certificados/tipoCertificados', $data);
	}

}
