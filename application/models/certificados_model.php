<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificados_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function getAll(){
		$query = $this->db->get('tipo_cert');
		return $query->result();
	}

	public function getTipoCertificado($id){
		$this->db->where('tipo_cert',$id);
		$this->db->select('* , certificados.id');
		$this->db->from('certificados');
		$this->db->join('tipo_cert' , 'certificados.tipo_cert = tipo_cert.id');	
		$query = $this->db->get()->result();
		return $query;
	}

	public function getTitulosCert(){
		$result = $this->db->get('titulos_cert');
		return $result->result();
	}

	public function getEditarTipo($id){
		$this->db->where('id', $id);
		$arr1 = $this->db->get('tipo_cert')->result();

		$this->db->where('id_cert', $id);
		$arr2 = $this->db->get('texto_cert')->result();

		$data = array_merge($arr1, $arr2);

		return $data;
	}

	public function getByIdTipo($id){
		$this->db->where('id', $id);
		$result = $this->db->get('tipo_cert');
		return $result->result();
	}

	public function deleteTipo($id){
		$this->db->where('id',$id);
		$this->db->delete('tipo_cert');

		$this->db->where('id_cert',$id);
		$this->db->delete('texto_cert');

		$this->db->where('tipo_cert',$id);
		$this->db->delete('certificados');
	}

	public function deleteCertificado($id){
		$this->db->where('id', $id);
		$this->db->delete('certificados');
	}

	public function saveCertificado($data = []){
		$this->db->insert('certificados', $data);	
	}

	public function getFontes(){
		$this->db->select('fonte');
		$query = $this->db->get('fontes')->result();
		return $query;
	}

	public function getCores(){
		$query = $this->db->get('cores')->result();
		return $query;
	}

	public function save($tipo_cert,$texto_cert){

		$this->db->insert('tipo_cert', $tipo_cert);
		$id_cert = $this->db->insert_id('tipo_cert');
		
		foreach ($texto_cert as $titulo) {
			$this->db->insert('texto_cert', [ 'id_cert'     => $id_cert,
											  'fonte'       => $titulo['fonte'],
											  'cor'         => $titulo['cor'],
											  'tamanho'		=> $titulo['tamanho'],
											  'negrito'		=> $titulo['negrito'],
											  'italic'		=> $titulo['italic'],
											  'sublinhado'  => $titulo['sublinhado']
											]);
		}

	}

}
