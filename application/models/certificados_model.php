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
		$sql = "SELECT a.id, a.nome, a.sexo, a.dt_nasc, a.mae, a.pai, a.dt_apr, b.nome tipo_cert FROM certificados a 
				inner join tipo_cert b on (a.tipo_cert = b.id)
				where a.tipo_cert = $id;";
		$query = $this->db->query($sql);

		return $query->result();
	}

}
