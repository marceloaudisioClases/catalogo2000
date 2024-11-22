<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function index()
    {
        $usuarios=array();
		$this->load->model("usuarios_model");
		$usuarios["usuarios"]=$this->usuarios_model->listar();
		$this->load->view('usuarios/usuarios',$usuarios);
    }
    
    public function editar_estado($id){
        $this->load->library('form_validation');
        $this->load->model("usuarios_model");

        $this->form_validation->set_rules('estado', 'Estado',);  


		$datos=array();
			$estado = array(
				'estado' =>set_value('estado'),
			);

			$this->usuarios_model->actualizar_estado($id,$estado);
		
            redirect('usuarios/index');
        }
    public function editar_rol($id){
        $this->load->library('form_validation');
        $this->load->model("usuarios_model");

        $this->form_validation->set_rules('rol_nombre', 'Rol',);

		$datos=array();
            $rol_id = array(
                'rol_id' =>set_value('rol_id'),
            );

			$this->usuarios_model->actualizar_rol($id,$rol_id);
		
            redirect('usuarios/index');
        }
	}

