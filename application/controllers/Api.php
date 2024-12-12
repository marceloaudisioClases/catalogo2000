<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	var $json=array("status"=>"ERROR","message"=> "");
	function __construct(){
		parent::__construct();
		$this->load->model("api_model");
	}
	public function listado_precios(){
		$this->output->set_content_type("application/json");
		$this->output->set_status_header(200);
		$this->json["status"]="OK";
		$this->load->model("productos_model");

		$this->json["data"]=$this->productos_model->listar();
		$this->json["rowCount"]=sizeof( $this->json["data"] );
		//Salida
		$this->output->set_output(json_encode($this->json));
	}

	public function actualizar_precio($modo="PROD"){
		if($this->validar_apikey("actualizar_precio")){
			$datos=$this->input->post();
			if(isset($datos["id"]) and isset($datos["costo"])){
				//Puedo
				$this->load->model("productos_model");
				$data=array(
					"costo"=>$datos["costo"]
				);
				$this->productos_model->actualizar($datos["id"],$data);
				$this->output->set_status_header(200);
				$this->json["status"]="OK";
				$this->json["message"]="Actualizacion correcta a: ".$datos["costo"];
			}else{
				//Incorrecto
				$this->output->set_status_header(400);
				$this->json["message"]="Datos Incorrectos";
			}
		}
		$this->output->set_output(json_encode($this->json));
	}

	private function validar_apikey($metodo="NO DEF"){
		$apikey=$this->input->get_request_header("X-API-KEY");
		if(isset($apikey)){
			$apikey_usuario=$this->api_model->obtener_por_apikey($apikey);
			if ($apikey_usuario) {
				$this->api_model->nuevo_evento($apikey_usuario["usuario_id"],$metodo);
				return true;
			} else {
				$this->output->set_status_header(403);
				$this->json["status"]="ERROR";
				$this->json["message"]="API-KEY Incorrecta";
				return false;
			}
		}else{
			$this->output->set_status_header(403);
			$this->json["status"]="ERROR";
				$this->json["message"]="Se necesita API-KEY";
			return false;
		}

	}
}