<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	var $json=array("status"=>"ERROR","message"=> "");

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
		if($this->validar_apikey()){
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

	private function validar_apikey(){
		$apikey=$this->input->get_request_header("X-API-KEY");
		if(isset($apikey)){
			if ($apikey=="123456") {
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