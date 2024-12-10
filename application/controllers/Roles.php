<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model("roles_model");
	}

    public function index()
    {
        redirect("roles/listar");
    }

	public function listar(){
		$usuarios=array();
		$usuarios["usuarios"]=$this->roles_model->listar();
		$this->load->view('roles/roles',$usuarios);
	}
}
