<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membros extends MY_Controller {

	public function __construct(){
	    parent::__construct();
		$this->load->model('membros_model');
	}

	public function index(){
		$data['membros'] = $this->membros_model->selectAll();
		$this->load->view('Membros/membros', $data);
	}

	public function adicionar(){

		if($this->input->post()){
			if(isset($_FILES['img']) && $_FILES['img']['name'] != "" ){

				$ext = strtolower(substr($_FILES['img']['name'], -4));
				$novo_nome = md5(time()) . $ext;
				$dir = 'assets/imagens/fotos/';

				move_uploaded_file($_FILES['img']['tmp_name'], $dir.$novo_nome);

				$foto = $novo_nome;

			}else{

				$foto = "default.jpg";

			}
			
			$data = [
				'nome'      => $this->input->post('nome'),
				'cargo'  	=> $this->input->post('cargo'),
				'data_nasc' => $this->input->post('data'),
				'rg'		=> $this->input->post('rg'),
				'cpf'		=> $this->input->post('cpf'),
				'emissao'	=> $this->input->post('emissao'),
				'foto'		=> $foto
			];
		
			$this->membros_model->insert($data);
				
			redirect('Membros');		
		}else{
			$this->load->view('membros/adicionarMembro');
		}

	}


	public function editar(){

		if($this->input->post()){

			$data = [
				'nome'      => $this->input->post('nome'),
				'cargo'  	=> $this->input->post('cargo'),
				'data_nasc' => $this->input->post('data'),
				'rg'		=> $this->input->post('rg'),
				'cpf'		=> $this->input->post('cpf'),
				'emissao'	=> $this->input->post('emissao'),
				'foto'		=> ''
			];

			$foto = [
				'foto' => $this->input->post('foto'),
				'nova_foto' => $_FILES['img']['name'],
				'nova_foto_tmp' => $_FILES['img']['tmp_name'] 
			];

			$this->membros_model->update($this->input->post('id'), $data, $foto);
			redirect('Membros');
		}
				
		
		$data['dados'] = $this->membros_model->select($this->uri->segment(3));
		$this->load->view('Membros/editarMembro', $data);
	}

	public function excluir(){
		$this->membros_model->delete($this->uri->segment(3));
		redirect('Membros');
	}
	
	public function pdf(){
		// Instancia a classe mPDF
		$mpdf = new mPDF();
		// Ao invés de imprimir a view 'welcome_message' na tela, passa o código
		// HTML dela para a variável $html
		$html = $this->load->view('welcome_message','',TRUE);
		// Define um Cabeçalho para o arquivo PDF
		$mpdf->SetHeader('Gerando PDF no CodeIgniter com a biblioteca mPDF');
		// Define um rodapé para o arquivo PDF, nesse caso inserindo o número da
		// página através da pseudo-variável PAGENO
		$mpdf->SetFooter('{PAGENO}');
		// Insere o conteúdo da variável $html no arquivo PDF
		$mpdf->writeHTML($html);
		// Cria uma nova página no arquivo
		$mpdf->AddPage();
		// Insere o conteúdo na nova página do arquivo PDF
		$mpdf->WriteHTML('<p><b>Minha nova página no arquivo PDF</b></p>');
		// Gera o arquivo PDF
		$mpdf->Output();
	}
}
