<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diretoria_model extends CI_Model {

	public function __construct(){
		$this->load->model('membros_model');
		parent::__construct();
	}

	public function get(){
		$query = $this->db->select('diretoria.id,
				       	  			membro_id,
				       	  			dir_cargo_id,
				       	  			diretoria.nome,
				       	  			cargo') 
						  ->join('dir_cargos', 'dir_cargos.id = diretoria.dir_cargo_id')
				       	  ->order_by('nome', 'asc')
				          ->get('diretoria');
		return $query->result();
	}

	public function getInativos(){
		$results = $this->membros_model->selectAll();

		foreach ($results as $membro) {
			if(!$membro->dir_status){
				$membros[] = $membro;
			}
		}
		
		if(isset($membros))
			return $membros;
		else
			return true;	
	}

	public function getById($id){
		$query = $this->db->select('diretoria.id,
				       	  			membro_id,
				       	  			dir_cargo_id,
				       	  			diretoria.nome,
				       	  			cargo')
						  ->join('dir_cargos', 'dir_cargos.id = diretoria.dir_cargo_id')
				       	  ->where('diretoria.id', $id) 
				       	  ->order_by('nome', 'asc')
 						  ->get('diretoria');
		return $query->result();
	}

	public function verifDuplicidade($data){
		$query = $this->db->get_where('diretoria', ['membro_id' => $data['membro_id'],
													'dir_cargo_id' => $data['dir_cargo_id']]);
		if($query->num_rows() > 0){
			return false;	
		}
		
		return true;
	}

	public function insert($data){
		$this->membros_model->update($data['membro_id'], ['dir_status' => 1], false);
	    $this->updateCargos($data['dir_cargo_id'], ['dir_status' => 1]);
		$this->db->insert('diretoria',$data);
	}

	public function update($id, $data){
		$this->db->where('id',$id)
	             ->update('diretoria', $data);
	}

	public function delete($id, $idMembro = null){
		if($id){
			$membro = $this->getById($id);

			$this->membros_model->update($membro[0]->membro_id, ['dir_status' => 0], false);
			$this->updateCargos($membro[0]->dir_cargo_id, ['dir_status' => 0]);
			$this->db->where('id', $id)
					 ->delete('diretoria');
		}else{
			$this->db->where('membro_id', $idMembro)
					 ->delete('diretoria');
		}
	}

	public function getCargos(){
		$query = $this->db->get_where('dir_cargos', ['dir_status' => 0]);
		return $query->result();
	}

	public function getCargosById($id){
		$query = $this->db->where('id', $id)
 						  ->get('dir_cargos');
		return $query->result();
	}

	public function insertCargos($data){
		$this->db->insert('dir_cargos', $data);
	}

	public function updateCargos($id, $data){
		$this->db->where('id',$id)
	             ->update('dir_cargos', $data);
	}

	public function deleteCargos($id){
		$this->db->where('id', $id)
				 ->delete('dir_cargos');
	}

}
