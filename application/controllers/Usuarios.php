<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	
	public function index(){

		$datos=array();
		$this->load->model("usuario_model");
		$datos["usuarios"]=$this->usuario_model->listar();
		$this->load->view("catalogo/usuarios",$datos);
	}

}
