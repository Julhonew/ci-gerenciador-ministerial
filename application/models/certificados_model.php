<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificados_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function selectAll(){
		$query = $this->db->get('tipo_cert');
		return $query;
	}

}
