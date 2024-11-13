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
}
