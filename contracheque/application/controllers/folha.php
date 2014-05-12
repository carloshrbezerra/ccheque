<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Folha extends CI_Controller {
	
	
	public $layout = 'default';
	public $css = array('bootstrap.min','style');
	public $js = array('bootstrap.min');
	public $title = "Importacao Folha Pagamento";
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
	function index(){
		$this->load->view('folha/upload_form', array('error' => ' ' ));
	}
	
	function upload(){
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'csv';
		$config['max_size'] = '40000';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
	
		$this->load->library('upload', $config);
	
		if (!$this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('folha/upload_form', $error);
		}else{
			
			$this->load->helper('file');
			$this->load->database();
			
			$dados = $this->upload->data();
			
			$arquivo = fopen($dados['full_path'], "r");
			
			$linha = 1;
				
			while (($data = fgetcsv($arquivo, 9000, ";")) !== FALSE) {
					
				if ($linha++ == 1)
					continue;
	
				
				$dados = array(
						'id_matricula' => $data[0],
						'item_remuneratorio' => $data[1],
						'descricao' => $data[2],
						'quantidade_referencia' => $data[3],
						'valor_provento' => $data[4],
						'valor_desconto' => $data[5]
				);
				
				if(strlen($data[0]) >= 5){
					$this->db->insert("folha", $dados);
				}
	
			}
				
			fclose ($arquivo);
				
			$variaveis['upload_data'] = $this->upload->data();
			$variaveis['total_registro'] = $linha - 2;
			
			$this->load->view('folha/upload_success', $variaveis);
		
		}
	}
}
?>