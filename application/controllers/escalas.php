<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Escala extends MY_Controller {

	public function __construct(){
	    parent::__construct();
		$this->load->model('escala_model');
	}

	public function index(){
		$data['eventos'] = $this->escala_model->get();
		$this->load->view('escala/escala', $data);
	}

	public function adicionarTipo(){
		if(!$this->input->post()){
			$this->load->view('escala/adicionar');
		}else{	
			$post = $this->input->post();
			$data = strtotime($post['data'] .' '. $post['horario']);
			$dt_atual =  strtotime(date('Y-m-d H:m:s'));

			$data = [
				'status' => $data > $dt_atual ? 2 : 1,
				'nome' => trim($post['nome']),
				'descricao' => trim($post['desc']),
				'data'=> $data, 
				'data_inclusao' => strtotime(date('Y-m-d H:i:s')),
				'data_alteracao' => strtotime(date('Y-m-d H:i:s'))
			];

			if($this->escala_model->verifDuplicidade($data)){
				$this->escala_model->insert($data);
				redirect('escala');
			}else{
				redirect('escala');
			}
		}
		
	}

	public function editarTipo(){

		if(!$this->input->post()){
			$data['evento'] = $this->escala_model->getById($this->uri->segment(3));
			$this->load->view('escala/editar', $data);
		}else{ 
			$post = $this->input->post();
			$data = strtotime($post['data'] .' '. $post['horario']);
			$dt_atual =  strtotime(date('Y-m-d H:i'));
			
			$data = [
				'status' => $data > $dt_atual ? 2 : 1,
				'nome' => trim($post['nome']),
				'descricao' => trim($post['desc']),
				'data'=> $data,
				'data_alteracao' => strtotime(date('Y-m-d H:i:s'))
			];

			$this->escala_model->update($post['id'], $data);
			redirect('escala');
		}
		
	}

	public function excluirTipo($id){
		$this->escala_model->delete($id);
		redirect('escala');
	}

	public function adicionar(){
		if(!$this->input->post()){
			$this->load->view('escala/adicionar');
		}else{	
			$post = $this->input->post();
			$data = strtotime($post['data'] .' '. $post['horario']);
			$dt_atual =  strtotime(date('Y-m-d H:m:s'));

			$data = [
				'status' => $data > $dt_atual ? 2 : 1,
				'nome' => trim($post['nome']),
				'descricao' => trim($post['desc']),
				'data'=> $data, 
				'data_inclusao' => strtotime(date('Y-m-d H:i:s')),
				'data_alteracao' => strtotime(date('Y-m-d H:i:s'))
			];

			if($this->escala_model->verifDuplicidade($data)){
				$this->escala_model->insert($data);
				redirect('escala');
			}else{
				redirect('escala');
			}
		}
		
	}

	public function editar(){

		if(!$this->input->post()){
			$data['evento'] = $this->escala_model->getById($this->uri->segment(3));
			$this->load->view('escala/editar', $data);
		}else{ 
			$post = $this->input->post();
			$data = strtotime($post['data'] .' '. $post['horario']);
			$dt_atual =  strtotime(date('Y-m-d H:i'));
			
			$data = [
				'status' => $data > $dt_atual ? 2 : 1,
				'nome' => trim($post['nome']),
				'descricao' => trim($post['desc']),
				'data'=> $data,
				'data_alteracao' => strtotime(date('Y-m-d H:i:s'))
			];

			$this->escala_model->update($post['id'], $data);
			redirect('escala');
		}
		
	}

	public function excluir($id){
		$this->escala_model->delete($id);
		redirect('escala');
	}
	
}
