<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificados_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function selectAll(){
		$query = $this->db->get('tipo_cert');
		return $query->result();
	}

	public function getTipoCertificado($id){
		$sql = "SELECT a.id, a.nome, a.sexo, a.dt_nasc, a.mae, a.pai, a.dt_apr, b.tipo tipo_cert FROM certificados a 
				inner join tipo_cert b on (a.tipo_cert = b.id)
				where a.tipo_cert = $id;";
		$query = $this->db->query($sql);

		return $query->result();
	}

	public function getTitulosCert(){
		$result = $this->db->get('titulos_cert');
		return $result->result();
	}

	public function getTipos(){
		$result = $this->db->get('tipo_cert');
		return $result->result();
	}

	public function save(){

		$sql1 = "";
		$sql2 = "";

		$this->db->trans_start();
		$this->db->query('AN SQL QUERY...');
		$this->db->query('ANOTHER QUERY...');
		$this->db->query('AND YET ANOTHER QUERY...');
		$this->db->trans_complete();
	}

}
