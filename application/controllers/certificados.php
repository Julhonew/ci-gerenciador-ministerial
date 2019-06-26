<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificados extends MY_Controller {

	public function __construct(){
	    parent::__construct();
		$this->load->model('certificados_model');
	}

	public function index(){
		$data['certificados'] = $this->certificados_model->getAll();
		$this->load->view('certificados/certificados', $data);
	}

	public function verifCheckbox($count, $checkbox = []){
		if($checkbox){
			for($i = 0; $i < $count; $i++){
				$arrChecks[$i] = 0;
				$data[$i] = 0;
			}

			$i = 0;
			foreach ($arrChecks as $key => $value) {
				if(isset($checkbox[$i])){
					$data[$checkbox[$i] - 1] = 1;
				}
				$i++;
			}

			return $data;
		}else{
			for($i = 0; $i < $count; $i++){
				$data[$i] = 0;
			}

			return $data;
		}
		
	}

	public function cadastrarTipo(){
		if($this->input->post()){

			$post = $this->input->post();
			$negrito = !empty($post['negrito']) ? $post['negrito'] : false;
			$italic = !empty($post['italic']) ? $post['italic'] : false;
			$sublinhado = !empty($post['sublinhado']) ? $post['sublinhado'] : false;

			$count = count($post['fonte']);

			$params['fonte'] = $post['fonte'];
			$params['cor'] = $post['cor'];
			$params['tamanho'] = $post['tamanho'];   
			$params['negrito'] = $this->verifCheckbox($count, $negrito);
			$params['italic'] = $this->verifCheckbox($count, $italic);
			$params['sublinhado'] = $this->verifCheckbox($count, $sublinhado);
			$params['texto'] = $post['editor'];		

			for ($i=0; $i < $count; $i++) { 
				$texto_cert[$i]=[
					'fonte' 	=> $params['fonte'][$i],
					'cor'		=> $params['cor'][$i],
					'tamanho'	=> $params['tamanho'][$i],
					'negrito'	=> $params['negrito'][$i],
					'italic'	=> $params['italic'][$i],
					'sublinhado'=> $params['sublinhado'][$i]
				];
			}

			if(isset($_FILES['imagem']) && $_FILES['imagem']['name'] != "" ){

				$ext = strtolower(substr($_FILES['imagem']['name'], -4));
				$novo_nome = md5(time()) . $ext;
				$dir = 'assets/imagens/fotos/';

				move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$novo_nome);

				$imagem = $novo_nome;
			}

			$tipo_cert['tipo'] = $post['nome'];
			$tipo_cert['img'] = $imagem;
			$tipo_cert['texto'] = $post['editor'];	

			$this->certificados_model->save($tipo_cert,$texto_cert);
			
			redirect('certificados');

		}else{

			$data['titulos'] = $this->certificados_model->getTitulosCert();
			$this->load->view('certificados/cadastrarTipo', $data);	

		}
	}

	public function tipoCertificados(){
		$data['certificados'] = $this->certificados_model->getTipoCertificado($this->uri->segment(3));
		$this->load->view('certificados/tipoCertificados', $data);
	}

	public function deleteTipoCertificados(){
		
		$this->certificados_model->deleteTipo($this->uri->segment(3));
		redirect('certificados');
	}

}
