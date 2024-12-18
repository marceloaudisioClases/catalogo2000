<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		redirect('auth/login');
	}
	public function registro(){
		if(TIPO_REGISTRO==3){
			$this->session->set_flashdata("OP","CERRADO");
			redirect('auth/login');
		}
		//Cargar la libreria
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules("email","Email","trim|required|valid_email");
		$this->form_validation->set_rules("apellido","Apellido","trim|required");
		$this->form_validation->set_rules("nombre","Nombre","trim|required");
		$this->form_validation->set_rules("usuario","Usuario","trim|required|is_unique[usuarios.usuario]");
		$this->form_validation->set_rules("password","Contraseña","required");
		$this->form_validation->set_rules("conf-password","Confirmar Contraseña","matches[password]");


		if ($this->form_validation->run() == FALSE){
            $this->load->view('registrarse');
        }else{
			$this->load->model("usuarios_model");
			$email=set_value("email");
			$apellido=set_value("apellido");
			$nombre=set_value("nombre");
			$usuario=set_value("usuario");
			$password=set_value("password");
			$this->usuarios_model->nuevo($email,$usuario,$password,$nombre,$apellido);
			redirect("auth/registro");
		}
		
	}
	public function login(){
		//Cargar la libreria
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules("usuario","Usuario","trim|required");
		$this->form_validation->set_rules("password","Contraseña","required");

		if ($this->form_validation->run() == FALSE){
            $this->load->view("login");
        }else{
			$this->load->model("usuarios_model");
			$usuario=set_value("usuario");
			$password=set_value("password");
			$u=$this->usuarios_model->check_login($usuario,$password);
			if($u){
				$usr=$this->usuarios_model->obtener_por_id($u);
				if($usr["estado"]==1){
					$this->session->set_userdata("usuario_id",$u);
					$this->session->set_userdata("usuario",$usr["usuario"]);
					$this->session->set_userdata("nombre",$usr["nombre"]);
					$this->session->set_userdata("apellido",$usr["apellido"]);
					$this->session->set_userdata("rol_id",$usr["rol_id"]);
					$this->usuarios_model->actualiza_login($u);
					
					if($this->input->post("volver")){
						redirect($this->input->post("volver"));
					}else{
						if($usr["rol_id"]==ROL_ADMIN){
							redirect("principal");
						}else{
							redirect("catalogo");
						}
					}
					

				}else{
					if($usr["estado"]==-1){
						$this->session->set_flashdata("OP","PENDIENTE");
						redirect("auth/login");
					}else{
						$this->session->set_flashdata("OP","INACTIVO");
						redirect("auth/login");
					}
				}
			}else{
				$this->session->set_flashdata("OP","INCORRECTO");
				redirect("auth/login");
			}
		}
				
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect("auth/login");
	}

	public function envio_test(){
		$this->load->library('email'); //Cargar libreria
        $this->email->initialize(); // Carga la config  

        $this->email->from('marcelo@hilet.com', 'Curso de Programacion');
        $this->email->to('marcelo@hilet.com');
        $this->email->subject('Test de Envío');
        $this->email->message('Esto es una Prueba, no me mandes al SPAM');

        if ($this->email->send()) {
            echo 'Email Enviado';
        } else {
            echo 'Falló el Envío';
            echo $this->email->print_debugger();
        }
	}
}
