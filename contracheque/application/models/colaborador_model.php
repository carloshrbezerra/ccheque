<?php
class Colaborador_Model extends CI_Model{
	
	private $tbl_colaborador = 'colaborador';
	
	function Person(){
		parent::Model();
	}
	
	
	function count_all(){
		return $this->db->count_all($tbl_colaborador);
	}

	function listar($max,$incio) {
		$query = $this->db->get('colaborador',$max, $inicio);
		return $query->result();
	}
	
}