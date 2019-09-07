<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class escala_model extends CI_Model {

	public function __construct(){
		// $this->verifStatus();
		$this->load->model('membros_model');
		parent::__construct();
	}

	public function get(){
		$query = $this->db->select('escala.id,
									age_status.status,
									nome,
									descricao,
									data')
						  ->join('age_status', 'age_status.id = escala.status')
						  ->order_by('data', 'desc')
					      ->get('escala');
		return $query->result();
	}

	public function getById($id){
		$query = $this->db->select('escala.id,
									age_status.status,
									nome,
									descricao,
									data')
						  ->join('age_status', 'age_status.id = escala.status')
				       	  ->where('escala.id', $id) 
 						  ->get('escala');
		return $query->result();
	}

	public function getRealizados(){
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

	public function verifDuplicidade($data){
		$query = $this->db->get_where('escala', ['nome' => $data['nome'],
												 'descricao' => $data['descricao'],
												 'data' => $data['data']]);
		if($query->num_rows() > 0){
			return false;	
		}
		
		return true;
	}

	public function insert($data){
		$this->db->insert('escala',$data);
	}

	public function update($id, $data){
		$this->db->where('id',$id)
	             ->update('escala', $data);
	}

	public function delete($id){
		$this->db->where('id', $id)
				 ->delete('escala');
	}

	public function verifStatus(){
		$eventos = $this->get();
		foreach ($eventos as $evento) {
			if($evento->data <= strtotime(date('Y-m-d H:i')))
				$this->update($evento->id, ['status' => 1]);
		}
	}

}
