<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diretoria extends MY_Controller {

	public function __construct(){
	    parent::__construct();
		$this->load->model(['diretoria_model','membros_model']);
	}

	public function index(){
		$data['dados'] = $this->diretoria_model->get();
		$this->load->view('diretoria/diretoria', $data);
	}

	public function adicionar(){

		if(!$this->input->post()){
			$data['membros'] = $this->diretoria_model->getInativos();
			$data['cargos'] = $this->diretoria_model->getCargos();

			$this->load->view('diretoria/adicionar', $data);
		}else{	
			$post = $this->input->post();

			$data = [
				'membro_id'     => $post['membro_id'],
				'dir_cargo_id'  => $post['cargo_id'],
				'nome'          => $this->membros_model->select($post['membro_id'])[0]->nome,
				'data_inclusao' => strtotime(date('Y-m-d H:i:s')),
				'data_alteracao'=> strtotime(date('Y-m-d H:i:s'))
			];

			if($this->diretoria_model->verifDuplicidade($data)){
				$this->diretoria_model->insert($data);
				redirect('diretoria');
			}else{
				redirect('diretoria');
			}
		}
		
	}

	public function editar(){

		if(!$this->input->post()){
			$data['dados'] = $this->diretoria_model->getById($this->uri->segment(3));
			$data['cargos'] = $this->diretoria_model->getCargos();
			$this->load->view('diretoria/editar', $data);
		}else{

			$post = (object) $this->input->post();

			$data = [
				'dir_cargo_id' => $post->cargo_id,
				'nome' => $post->membro,
				'data_alteracao' => strtotime(date('Y-m-d H:i:s'))
			];

			$this->diretoria_model->update($post->id, $data);
			redirect('diretoria');
		}
		
	}

	public function excluir($id){
		$this->diretoria_model->delete($id);
		redirect('diretoria');
	}

	public function adicionarCargo(){

	}

	public function editarCargo(){

	}

	public function excluirCargo(){

	}

	
	
}
