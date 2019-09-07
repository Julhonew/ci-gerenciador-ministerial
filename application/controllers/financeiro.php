<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financeiro extends MY_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('financeiro_model');
	}

	public function index(){
		$data['contribuicoes'] = $this->financeiro_model->get();
		$data['entrada'] = $this->financeiro_model->getEntradaSum();
		$data['saida'] = $this->financeiro_model->getSaidaSum();
		$data['agendado'] = $this->financeiro_model->agendado();
		$data['emCaixa'] = $this->financeiro_model->getEmCaixa();
		$this->load->view('financeiro/financeiro', $data);
	}

	public function adicionar(){
		if(!$post = $this->input->post()){
			$this->load->view('financeiro/adicionar');
		}else{
			if(strtotime($post['data']. ' ' . date('H:i:s')) > strtotime(date('d-m-Y 23:59:59')))
				$lançamentoFuturo = true;

			$data = [
				'tipo' 			 => $post['tipo'],
				'status' 		 => $lançamentoFuturo ? 2 : 1,
				'nome' 			 => $post['nome'],
				'valor' 		 => $post['valor'],
				'data'			 => strtotime($post['data']. ' ' . date('H:i:s')),
				'data_inclusao'  => strtotime(date('Y-m-d H:i:s')),
				'data_alteracao' => strtotime(date('Y-m-d H:i:s'))
			];

			$this->financeiro_model->insert($data);
			redirect('financeiro');

		}
		
	}

	public function editar(){
		if(!$post = $this->input->post()){
			$data['contribuicao'] = $this->financeiro_model->getById($this->uri->segment(3));
			$this->load->view('financeiro/editar',$data);
		}else{
			if(strtotime($post['data']. ' ' . date('H:i:s')) > strtotime(date('d-m-Y 23:59:59')))
				$lançamentoFuturo = true;

			$data = [
				'tipo' 			 => $post['tipo'],
				'status' 		 => $lançamentoFuturo ? 2 : 1,
				'nome' 			 => $post['nome'],
				'valor' 		 => $post['valor'],
				'data'			 => strtotime($post['data']. ' ' . date('H:i:s')),
				'data_alteracao' => strtotime(date('Y-m-d H:i:s'))
			];

			$this->financeiro_model->update($post['id'],$data);
			redirect('financeiro');
		}
	}

	public function excluir($id){
		$this->financeiro_model->delete($id);
		redirect('financeiro');
	}
	
}
