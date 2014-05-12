<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Colaborador extends CI_Controller {
	
	
	public $layout = 'default';
	public $css = array('bootstrap.min','style','table');
	public $js = array('bootstrap.min');
	public $title = "Importacao Colaboradores";
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('colaborador_model');
		$this->load->library('pagination');
	}
	
	function index(){
		$this->load->view('colaborador/upload_form', array('error' => ' ' ));
	}
	
	function upload(){
		
		$title = "Importacao Colaborador";
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'csv';
		$config['max_size'] = '40000';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
	
		$this->load->library('upload', $config);
	
		if (!$this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('colaborador/upload_form', $error);
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
						'cnpj' => $data[0],
						'nome_instituto' => $data[1],
						'periodo' => $data[2],
						'data_nascimento' => $data[3],
						'nome' => $data[4],
						'matricula' => $data[5],
						'cargo' => str_replace($data[6],'_______________',''),
						'cpf' => $data[7],
						'orgao' => $data[8],
						'nit' => $data[9],
						'depsf' => $data[10],
						'depir' => $data[11],
						'cargo_comissionado' => str_replace($data[12],'_______________',''),
						'identidade' => $data[13],
						'folha' => $data[14],
						'valor_provento' => $data[15],
						'valor_desconto' => $data[16],
						'valor_liquido' => $data[17], 
						'valor_margem' => $data[18]
				);
				
				$dados_users = array(
						'username' => $data[5],
						'password' => md5($data[7]),
						'permissao' => 3
				);

				
				$this->db->select('matricula');
				$this->db->from('colaborador');
				$this->db->where('matricula', $data[5]);
				$query = $this->db->get();
				
				if ($query->num_rows() > 0) {
					$this->db->update('colaborador', $dados, array('matricula' => $data[5]));
				}else{
					$this->db->insert("colaborador", $dados);
					
					
					/* Condição para não inserir usuario já cadastrado no banco */
					
					$this->db->select('username');
					$this->db->from('users');
					$this->db->where('username', $data[5]);
					$query = $this->db->get();
					
					if(!$query->num_rows() > 0){
						$this->db->insert("users",$dados_users);
					}
						
					
				}
		
			}
				
			fclose ($arquivo);
				
			$variaveis['upload_data'] = $this->upload->data();
			$variaveis['total_registro'] = $linha - 2;
				
			$this->load->view('colaborador/upload_success', $variaveis);
		
		}
	}
	
	
	function listar(){
		
		
	
		// Helper para URLS
		$this->load->helper("url");
		$this->load->library('pagination');
		
		$maximo = 12;
		
		if ($this->uri->segment(2) == "")
		{
			$inicio = 0;
		}
		else
		{
			$inicio = $this->uri->segment(2);
		}
		
		
		$config['base_url'] = base_url() . "index.php/colaborador/";
		$config['total_rows'] = $this->colaborador_model->count_all();
		$config['uri_segment'] = 2;
		$config['per_page'] = $maximo;
		$config['first_link'] = 'Primeiro';
		$config['cur_tag_open'] = '<div>';
		$config['cur_tag_close'] = '</div>';
		$config['last_link'] = 'Último';
		$config['next_link'] = 'Próximo';
		$config['prev_link'] = 'Anterior';
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		
		$this->pagination->initialize($config);
		
		echo $data['paginacao'] = $this->pagination->create_links();
		
		/*
		$maximo = 3;
		$inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
		$config['base_url'] = '/artigos/exemplo/index.php/colaborador/listar';
		$config['total_rows'] = $this->colaborador_model->count_all();
		$config['per_page'] = $maximo;
		$config['first_link'] = 'Primeiro';
		$config['last_link'] = 'Último';
		$config['next_link'] = 'Próximo';
		$config['prev_link'] = 'Anterior';
		
		echo $this->pagination->initialize($config);
		*/
		
		//var_dump($data);
		
		

		$data['colaboradores'] = $this->colaborador_model->listar($maximo,$inicio);
		
		
		
    	$this->load->view('colaborador/list', $data);
		
	}
	
	
}
?>