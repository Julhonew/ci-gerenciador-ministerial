<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membros_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function listar($id = false){
		
		var_dump($id);

		if($id){
			$query = $this->db->where('membros', array('id' => 1), $limit = NULL, $offset = NULL);
		}else{
			$query = $this->db->get('membros');
		}

		foreach ($query as $dados) {
			echo $dados;
		}

		exit;

		return $query;
	}

	public function insert($data){
		$this->db->insert('membros', $data);
	}

	public function update($id){



	}

}
