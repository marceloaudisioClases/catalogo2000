<?php
class Usuario_model extends CI_Model {


    public function listar(){
        $this->db->select("*");
        $this->db->set("usuario_id");
        return $this->db->get("usuarios")->result_array();
    }
}