<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends MY_Controller {

	public function __construct(){
		date_default_timezone_set('America/Sao_Paulo');
	    parent::__construct();
		$this->load->model('agenda_model');
	}

	public function index(){
		$data['eventos'] = $this->agenda_model->get();
		$this->load->view('agenda/agenda', $data);
	}

	public function adicionar(){
		if(!$this->input->post()){
			$this->load->view('agenda/adicionar');
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

			if($this->agenda_model->verifDuplicidade($data)){
				$this->agenda_model->insert($data);
				redirect('agenda');
			}else{
				redirect('agenda');
			}
		}
		
	}

	public function editar(){

		if(!$this->input->post()){
			$data['evento'] = $this->agenda_model->getById($this->uri->segment(3));
			$this->load->view('agenda/editar', $data);
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

			$this->agenda_model->update($post['id'], $data);
			redirect('agenda');
		}
		
	}

	public function excluir($id){
		$this->agenda_model->delete($id);
		redirect('agenda');
	}
	
}
