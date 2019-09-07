<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificados extends MY_Controller {

	public function __construct(){
	    parent::__construct();
		$this->load->model('certificados_model');
		$this->load->model('membros_model');
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

	public function adicionarCertificado(){
		
		if(!empty($this->uri->segment(4))){

			$membro = $this->membros_model->select($this->uri->segment(4));
			echo "<pre>";
			
			$data = ['nome' 	=> $membro[0]->nome,
					 'sexo' 	=> !empty($this->input->post('sexo')) ? $this->input->post('sexo') : NULL,
					 'dt_nasc' 	=> $membro[0]->data_nasc,
					 'mae' 		=> !empty($this->input->post('mae')) ? $this->input->post('mae') : NULL,
					 'pai' 		=> !empty($this->input->post('pai')) ? $this->input->post('pai') : NULL,
					 'dt_apr' 	=> !empty($this->input->post('dt_apr')) ? $this->input->post('dt_apr') : NULL,
					 'tipo_cert'=> $this->uri->segment(3),
					 'cargo' 	=> $membro[0]->cargo
				    ];
		    
			$this->certificados_model->saveCertificado($data);

			redirect('certificados/tipoCertificados/' . $this->uri->segment(3));
		}else{
			$data['nome'] = $this->certificados_model->getByIdTipo($this->uri->segment(3));
			$data['membros'] = $this->membros_model->selectAll();
			$this->load->view('certificados/adicionarCertificado',$data);
		}
		
	}

	public function editarTipoCertificado(){
		$data['titulos'] = $this->certificados_model->getTitulosCert();
		$data['tipo'] = $this->certificados_model->getEditarTipo($this->uri->segment(3));
		$arrFontes = $this->certificados_model->getFontes();
		$arrCores = $this->certificados_model->getCores();

		$arrFormatacaoCad = $data['tipo'];
		unset($arrFormatacaoCad[0]);
		sort($arrFormatacaoCad);

		foreach ($arrFormatacaoCad as $FormatacaoCad) {
			$fontesCad[] = $FormatacaoCad->fonte;
			$coresCad[] = $FormatacaoCad->cor;

		}
		foreach ($arrFontes as $fonte) {
			$fontes[] = $fonte->fonte; 
		}
		foreach ($arrCores as $cor) {
			$cores[] = $cor->cor; 
			$coresBr[] = $cor->traducao; 
		}
		foreach ($fontesCad as $key => $fonteCad) {
			$verf = true;
			for ($i=0; $i < 9; $i++) { 
				if($verf && $fonteCad == $fontes[$i]){
					$fontesVerf[$key][$i] = "<option value= " .  "'" .$fontes[$i] .  "'" . " selected " . "style = 'font-family: " . $fontes[$i] . "' >". $fontes[$i] . " </option>";
					$verf = false;
				}else{
					$fontesVerf[$key][$i] = "<option value= " . "'" . $fontes[$i] . "'" . " style = 'font-family: " . $fontes[$i] . "' >". $fontes[$i] . " </option>"; 
				}
			}
		}
		foreach ($coresCad as $key => $corCad) {
			$verf = true;
			for ($i=0; $i < 6; $i++) { 
				if($verf && $corCad == $cores[$i]){
					$coresVerf[$key][$i] = "<option value= " .  "'" .$cores[$i] .  "'" . " selected " . "style = 'color: " . $cores[$i] . "' >". $coresBr[$i] . " </option>";
					$verf = false;
				}else{
					$coresVerf[$key][$i] = "<option value= " . "'" . $cores[$i] . "'" . " style = 'color: " . $cores[$i] . "' >". $coresBr[$i] . " </option>"; 
				}
			}
		}

		$data['fontes'] = $fontesVerf;
		$data['cores'] = $coresVerf;

		$this->load->view('certificados/editarTipo', $data);
	}

	public function tipoCertificados(){
		$id = !empty($this->uri->segment(3)) ? $this->uri->segment(3) : redirect('certificados');
		$data['certificados'] = $this->certificados_model->getTipoCertificado($id);
		$data['nome'] = $this->certificados_model->getByIdTipo($id);

		$this->load->view('certificados/tipoCertificados', $data);
	}

	public function deleteTipoCertificados(){
		$this->certificados_model->deleteTipo($this->uri->segment(3));
		redirect('certificados');
	}

	public function deleteCertificado(){
		$this->certificados_model->deleteCertificado($this->uri->segment(4));
		redirect('certificados/tipoCertificados/' . $this->uri->segment(3));
	}

}
