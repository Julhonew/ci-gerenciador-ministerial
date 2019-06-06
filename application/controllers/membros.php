<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membros extends MY_Controller {

	public function __construct(){
	    parent::__construct();
		$this->load->model('membros_model');
	}

	public function index(){
		$data['membros'] = $this->membros_model->listarTodos();
		$this->load->view('membros/membros', $data);
	}

	public function adicionar(){
		$this->load->view('membros/adicionarMembro');
	}

	public function validacao(){
		if(isset($_FILES['img']) && $_FILES['img']['name'] != "" ){

		$ext = strtolower(substr($_FILES['img']['name'], -4));
		$novo_nome = md5(time()) . $ext;
		$dir = 'assets/imagens/fotos/';

		move_uploaded_file($_FILES['img']['tmp_name'], $dir.$novo_nome);

		$foto = $novo_nome;

		}else{

			$foto = "default.jpg";

		}
		
		$data = [
			'nome'      => $this->input->post('nome'),
			'cargo'  	=> $this->input->post('cargo'),
			'data_nasc' => $this->input->post('data'),
			'rg'		=> $this->input->post('rg'),
			'cpf'		=> $this->input->post('cpf'),
			'emissao'	=> $this->input->post('emissao'),
			'foto'		=> $foto
		];
	
		$this->membros_model->insert($data);
			
		redirect('membros');
	}

	public function editar(){
		$data['dados'] = $this->membros_model->listarUnico($this->uri->segment(3));
		$this->load->view('membros/editarMembro', $data);
	}

	public function excluir(){
		$this->membros_model->excluir($this->uri->segment(3));
		redirect('membros');
	}
	
}
