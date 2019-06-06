<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membros_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function listarTodos(){
		return $this->db->get('membros');
	}

	public function listarUnico($id){
		$sql = "SELECT * FROM membros WHERE id = '$id'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function insert($data){
		$this->db->insert('membros', $data);
	}

	public function update($id){

		//

	}

	public function excluir($id){
		$sql = "DELETE FROM membros WHERE id = $id;";
		$this->db->query($sql);
	}

}
