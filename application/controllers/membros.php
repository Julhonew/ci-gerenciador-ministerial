<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membros extends MY_Controller {

	public function __construct(){
	    parent::__construct();
		$this->load->model('membros_model');
	}

	public function index(){
		$data['membros'] = $this->membros_model->selectAll();
		$this->load->view('Membros/membros', $data);
	}

	public function adicionar(){

		if($this->input->post()){
			
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
				
			redirect('Membros');		
		}else{
			$data['cargos'] = $this->membros_model->getAllCargos();
			$this->load->view('membros/adicionarMembro', $data);
		}

	}


	public function editar(){

		if($this->input->post()){

			$data = [
				'nome'      => $this->input->post('nome'),
				'cargo'  	=> $this->input->post('cargo'),
				'data_nasc' => $this->input->post('data'),
				'rg'		=> $this->input->post('rg'),
				'cpf'		=> $this->input->post('cpf'),
				'emissao'	=> $this->input->post('emissao'),
				'foto'		=> ''
			];

			$foto = [
				'foto' => $this->input->post('foto'),
				'nova_foto' => $_FILES['img']['name'],
				'nova_foto_tmp' => $_FILES['img']['tmp_name'] 
			];

			$this->membros_model->update($this->input->post('id'), $data, $foto);
			redirect('Membros');
		}
				
		
		$data['dados'] = $this->membros_model->select($this->uri->segment(3));
		$data['cargos'] = $this->membros_model->getAllCargos();
		$this->load->view('Membros/editarMembro', $data);
	}

	public function excluir(){
		if($this->membros_model->delete($this->uri->segment(3))){
			redirect('Membros');	
		}else{
			redirect('Membros', $erro);	
		}
		
	}
	
	public function credencial(){
		
		$arrId = !empty($this->input->post()) ? $this->input->post() : (int) $this->uri->segment(3);

		if(is_array($arrId)){
			if(empty($arrId['id'])){
			redirect('Membros');	
		}
			$data['dados'] = $this->membros_model->getByGroup(implode(',', $arrId['id']));
		}else{
			$data['dados'] = $this->membros_model->select($arrId);
		}
		
		$this->load->view('Membros/credencial', $data);

	}
}












