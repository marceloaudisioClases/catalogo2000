<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata("OP","PROHIBIDO");
			redirect("auth/login");
		}
		$this->load->model("categorias_model");
		$this->load->model("productos_model");
	}
	public function index()
	{
		redirect("categorias/alta");
	}
	public function alta(){
		$this->load->model("categorias_model");
		$this->load->library("form_validation");

		$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("categorias/formulario_categoria");
		}else{
			$data = array(
				'nombre' => set_value('nombre')
			);

			$id=$this->categorias_model->nuevo($data);
			$this->session->set_flashdata("OP","CATEGORIACREADA");
			redirect('categorias/alta');
		}

	}

	public function listar(){
		$partes=$this->uri->uri_to_assoc();
		
		$campos_permitidos=array("categoria_id","nombre","estado");
		if(isset($partes["orden"])){
			if(in_array($partes["orden"],$campos_permitidos)){
				$this->categorias_model->set_campo_orden($partes["orden"]);
			}
		}

		$datos=array();
		$datos["categorias"]=$this->categorias_model->listar();
		$this->load->view("categorias/listado",$datos);
	}
}
