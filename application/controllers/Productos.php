<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata("OP","PROHIBIDO");
			redirect("auth/login");
		}
		$this->load->model("productos_model");
	}
	public function index()
	{
		redirect("productos/listar");
	}

	public function alta(){
		$datos=array();
		$this->load->library("form_validation");

		$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
		$this->form_validation->set_rules('descripcion', 'Descripción', 'trim');
		$this->form_validation->set_rules('categoria_id', 'Categoría', 'required|integer');
		$this->form_validation->set_rules('stock_actual', 'Stock Actual', 'required|integer');
		$this->form_validation->set_rules('stock_min', 'Stock Mínimo', 'required|integer');
		$this->form_validation->set_rules('costo', 'Costo', 'required|integer');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->model("categorias_model");
			$datos["categorias"]=$this->categorias_model->listar();
			$this->load->view("productos/formulario",$datos);
		} else {
			
			$data = array(
				'nombre' => set_value('nombre'),
				'descripcion' => set_value('descripcion'),
				'categoria_id' => set_value('categoria_id'),
				'stock_actual' => set_value('stock_actual'),
				'stock_min' => set_value('stock_min'),
				'costo' => set_value('costo')
			);
			$id=$this->productos_model->nuevo($data);
			
			// Redirigir o cargar otra vista después de guardar
			redirect('productos/editar/'.$id);
		}
	}
	public function editar($id=false){
		$datos=array();

		if($id){
			$id=intval($id);
			$datos['producto']=$this->productos_model->obtener_por_id($id);
		}else{
			$datos['producto']=false;
		}

		$this->load->library("form_validation");

		$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
		$this->form_validation->set_rules('descripcion', 'Descripción', 'trim');
		$this->form_validation->set_rules('categoria_id', 'Categoría', 'required|integer');
		$this->form_validation->set_rules('stock_actual', 'Stock Actual', 'required|integer');
		$this->form_validation->set_rules('stock_min', 'Stock Mínimo', 'required|integer');
		$this->form_validation->set_rules('costo', 'Costo', 'required|integer');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->model("categorias_model");
			$datos["categorias"]=$this->categorias_model->listar();
			$this->load->view("productos/formularioeditar",$datos);
		} else {
			
			$data = array(
				'nombre' => set_value('nombre'),
				'descripcion' => set_value('descripcion'),
				'categoria_id' => set_value('categoria_id'),
				'stock_actual' => set_value('stock_actual'),
				'stock_min' => set_value('stock_min'),
				'costo' => set_value('costo')
			);
			$this->productos_model->actualizar($id,$data);
			
			$this->session->set_flashdata("MSJ","Actualizado");
			redirect('productos/editar/'.$id);
		}
	}

	public function listar(){
		$partes=$this->uri->uri_to_assoc();
		
		$campos_permitidos=array("producto_id","nombre","costo");
		if(isset($partes["orden"])){
			if(in_array($partes["orden"],$campos_permitidos)){
				$this->productos_model->set_campo_orden($partes["orden"]);
			}
		}

		$datos=array();
		$datos["productos"]=$this->productos_model->listar();
		$this->load->view("productos/listado",$datos);
	}

	public function exportar_csv(){
		$this->load->helper("download");

		$datos=$this->productos_model->listar();
		$titulos= array("producto_id",
						"nombre",
						"categoria",
						"stock_actual",
						"stock_min",
						"costo",
						"estado");
		
		$archivo="datos-exportados-".date("d-m-Y").".csv";
		$contenido=implode(";",$titulos)."\n";

		foreach($datos as $valor){
			unset($valor["descripcion"]);
			$valor["categoria_id"]=$valor["categoria_nombre"];
			unset($valor["categoria_nombre"]);
			$contenido.=implode(";",$valor)."\n";
		}

		force_download($archivo,$contenido,"application/csv");
	}
}
