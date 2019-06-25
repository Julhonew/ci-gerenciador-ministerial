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

	public function save($tipo_cert,$texto_cert){

		$this->db->insert('tipo_cert', $tipo_cert);
		$id_cert = $this->db->insert_id('tipo_cert');
		
		foreach ($texto_cert as $titulo) {
			$count = 0;
			$tamanho = count($titulo) + 1;
			foreach ($titulo as $key => $value){
				if($count == 0){
					$valores = $id_cert. ",";
					$valores .= "'".$value. "'";	
				}else if ($count < $tamanho && $count != 0){
					if(!is_numeric($value)){
						$valores .= ",". "'".$value."'";
					}else{
						$valores .= ','.$value ;
					}
				}
			    $count++;
			}

			$sql = "INSERT INTO texto_cert (id_cert,fonte,cor,tamanho,negrito,italic,sublinhado)
											VALUES($valores);";
			$this->db->query($sql);
		}

	}

}
