<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 /**
 * Layout Class
 *
 * @package hooks
 * @description Implementa as views do tipo layout no framework.
 */
 
class Layout{
 
	public $base_url;
	 
	/**
	* Metodo que executa as implementacoes.
	* Este metodo e chamado atraves do arquivo hooks.php
	* na pasta config.
	*
	* @return
	*/
	public function init(){
	
		$CI =& get_instance();
		 
		// Definindo o base_url.
		$this->base_url = $CI->config->slash_item('base_url');
		$output = $CI->output->get_output();
		 
		$title = (isset($CI->title)) ? $CI->title : '';
		
		$css = (isset($CI->css)) ? $this->createCSSLinks($CI->css) : '';
		$js = (isset($CI->js)) ? $this->createJSLinks($CI->js) : '';
		 
		if (isset($CI->layout) && !preg_match('/(.+).php$/', $CI->layout)){
			$CI->layout .= '.php';
		}else{
			$CI->layout = 'default.php';
		}
	 

		$layout = LAYOUTPATH . $CI->layout;
		 
		if ($CI->layout !== 'default.php' && !file_exists($layout)){
			if ($CI->layout != '.php') show_error("You have specified a invalid layout: " . $CI->layout);
		}
		 
		if (file_exists($layout)){
			$layout = $CI->load->file($layout, true);
			
			$view = str_replace('{content_for_layout}', $output, $layout);
		 	$view = str_replace('{title_for_layout}', $title, $view);
		 	$view = str_replace('{css_for_layout}', $css, $view);
		 	$view = str_replace('{js_for_layout}', $js, $view);
		}else{
			$view = $output;
		}
		echo $view;
	}
	 
	
	/**
	* Gera os links CSS utilizados no layout.
	*
	* @return void
	*/
	private function createCSSLinks($links){
		$html = "";
		for ($i = 0; $i < count($links); $i++){
			$html .= "<link rel='stylesheet' type='text/css' href='" . $this->base_url . CSSPATH . $links[$i] . ".css' media='screen' />";
		}
	
		return $html;
	}
	 
	/**
	* Gera os links JS utilizados no layout.
	*
	* @return void
	*/
	private function createJSLinks($links){
		$html = "";
		for ($i = 0; $i < count($links); $i++){
			$html .= "<script type='text/javascript' src='" . $this->base_url . JSPATH . $links[$i] . ".js'></script> n";
		}
		return $html;
	}
 
}