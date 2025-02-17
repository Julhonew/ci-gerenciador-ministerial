<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membros_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function selectAll(){
		$query = $this->db->select('membros.id,
								   membros.nome,
								   cargos.cargo,
								   membros.data_nasc,
								   membros.rg,
								   membros.cpf,
								   membros.emissao,
								   membros.foto,
								   membros.dir_status')
						  ->join('cargos', 'cargos.id = membros.cargo')
						  ->order_by('membros.nome')
						  ->get('membros');

		return $query->result();
	}

	public function select($id){

		$sql = "SELECT a.id, a.nome, b.cargo, a.data_nasc, a.rg, a.cpf, a.emissao, a.foto 
				from membros a
				inner join cargos b on (a.cargo = b.id)
				WHERE a.id = $id;";

		$query = $this->db->query($sql);

		return $query->result();
	}

	public function insert($data){
		$this->db->insert('membros', $data);
	}

	public function update($id, $data, $foto){

		if($foto != false){
			if($foto['nova_foto'] == ""){
				$data['foto'] = $foto['foto'];  
			}else{
				
				if($foto['foto'] != "default.jpg"){
					unlink("assets/imagens/fotos/".$foto['foto']);
				}

				$ext = strtolower(substr($foto['foto'], -4));
				$novo_nome = md5(time()) . $ext;
				$dir = 'assets/imagens/fotos/';

				move_uploaded_file($foto['nova_foto_tmp'], $dir.$novo_nome);

				$data['foto'] = $novo_nome;
			}
		}

		$this->db->where('id', $id);
		$query = $this->db->update('membros', $data);

	}

	public function delete($id){
		$this->load->model('diretoria_model');
		$this->diretoria_model->delete(false, $id);
		
		$membros = $this->select($id);

		if(!empty($membros[0]->foto)){
			if($membros[0]->foto != "default.jpg"){
				unlink('assets/imagens/fotos/'.$membros[0]->foto);
			}
		}
		$sql = "DELETE FROM membros WHERE id = $id;";
		$this->db->query($sql);
	}

	public function getByGroup($ids){

		$sql = "SELECT a.id, a.nome, b.cargo, a.data_nasc, a.rg, a.cpf, a.emissao, a.foto 
				from membros a
				inner join cargos b on (a.cargo = b.id)
				where a.id IN($ids);";

		$result = $this->db->query($sql);

		return $result->result();
	}

	public function getAllCargos(){
		$query = $this->db->get('cargos');
		return $query->result();
	}

}
