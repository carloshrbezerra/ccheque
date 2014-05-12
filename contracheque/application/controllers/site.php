<?php
	class Site extends CI_Controller{
		
		private $_tpl = "themes/template_contracheque";
		private $dados = array();
		
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			echo  "metod index do controller site";
			$this->dados['titulo'] = "Olá seja bem vindo!";
			$this->dados['pagina'] = "principal";
			
			$this->load->view($this->_tpl,$this->dados);		
		}
		
		function outraview(){
			$this->dados['titulo'] = 'Olá, essa é outra view !';
            $this->dados['pagina'] = 'outra_view';
            $this->load->view($this->_tpl, $this->dados);
		}
		
	}

?>