<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financeiro_model extends CI_Model {

	public function __construct(){
		$this->verfStatus();
		$this->load->model('membros_model');
		parent::__construct();
	}

	public function get(){
		$query = $this->db->select('financeiro.id,
									fin_status.status,
								    fin_tipo.tipo,
								    nome,
								    valor,
								    data')
						  ->join('fin_tipo', 'fin_tipo.id = financeiro.tipo')
						  ->join('fin_status', 'fin_status.id_status = financeiro.status')
						  ->order_by('data', 'desc')
					      ->get('financeiro');

		return $query->result();
	}

	public function getEntradaSum(){
		$dt_inicio = strtotime('01' . date('-m-Y 23:59:59')); 
		$dt_fim = strtotime(date('t-m-Y 23:59:59'));

		$query = $this->db->select_sum('valor')
						  ->get_where('financeiro', ['tipo' => 1,
						  							 'status !=' => 2,
													 'data >=' => $dt_inicio,
													 'data <=' => $dt_fim]);
		return $query->result();
	}

	public function getSaidaSum(){
		$dt_inicio = strtotime('01' . date('-m-Y 23:59:59')); 
		$dt_fim = strtotime(date('t-m-Y 23:59:59'));

		$query = $this->db->select_sum('valor')
						  ->get_where('financeiro', ['tipo' => 2,
						  							 'status !=' => 2,
						  			  				 'data >=' => $dt_inicio,
								      				 'data <=' => $dt_fim]);
		return $query->result();
	}

	public function getFuturoEntradaSum(){
		$dt_inicio = strtotime('01' . date('-m-Y 23:59:59')); 

		$query = $this->db->select_sum('valor')
						  ->get_where('financeiro', ['tipo' => 1,
						  							 'status' => 2,
						  			  				 'data >=' => $dt_inicio]);
		return $query->result();
	}

	public function getFuturoSaidaSum(){
		$dt_inicio = strtotime('01' . date('-m-Y 23:59:59')); 

		$query = $this->db->select_sum('valor')
						  ->get_where('financeiro', ['tipo' => 2,
						  							 'status' => 2,
						  			  				 'data >=' => $dt_inicio]);
		return $query->result();
	}

	public function agendado(){
		$query1 = $this->db->select_sum('valor')
						  ->get_where('financeiro', ['tipo' => 1, 'status' => 2])->result();	
		$query2 = $this->db->select_sum('valor')
						  ->get_where('financeiro', ['tipo' => 2, 'status' => 2])->result();

		$entrada = $query1[0]->valor ? $query1[0]->valor : 0;
		$saida   = $query2[0]->valor ? $query2[0]->valor : 0;
	
		return $entrada - $saida;
	}

	public function getEmCaixa(){
		$query1 = $this->db->select_sum('valor')
						  ->get_where('financeiro', ['tipo' => 1, 'status' => 1])->result();	
		$query2 = $this->db->select_sum('valor')
						  ->get_where('financeiro', ['tipo' => 2, 'status' => 1])->result();

		$entrada = $query1[0]->valor ? $query1[0]->valor : 0;
		$saida   = $query2[0]->valor ? $query2[0]->valor : 0;
	
		return $entrada - $saida;
	}

	public function getById($id){
		$query = $this->db->get_where('financeiro', ['financeiro.id' => $id]);

		return $query->result();
	}

	public function verifDuplicidade($data){
		$query = $this->db->where(['tipo'   => $data['tipo'],
								   'status' => $data['status'],
								   'nome'   => $data['nome'],
								   'valor'  => $data['valor']])
						  ->get('financeiro');

		if(!empty($query->result()))
			return false;

		return true;
	}

	public function insert($data){
		if($this->verifDuplicidade($data))
			$this->db->insert('financeiro', $data);
	}

	public function update($id, $data){
		$this->db->where('id',$id)
		         ->update('financeiro', $data);
	}

	public function delete($id){
		$this->db->where('id', $id)
				 ->delete('financeiro');
	}

	public function verfStatus(){
		$query = $this->db->get_where('financeiro', ['status' => 2]);

		foreach ($query->result() as $value) {
			$data  = strtotime(date('Y-m-d', $value->data));
			$dt_atual     = strtotime(date('Y-m-d'));

			if($data <= $dt_atual)
				$this->update($value->id,['status' => 1]);
			
		}

		return $query->result();
	}

}
