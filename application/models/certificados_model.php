<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificados_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function listar(){
		$query = $this->db->get('certificados');
		return $query;
	}

}
