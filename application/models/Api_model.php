<?php
class Api_model extends CI_Model {   
    public function obtener_por_apikey($key=""){
        $this->db->select("*");
        $this->db->where("apikey",$key);
        $this->db->limit(1);
        return $this->db->get("usuarios")->row_array();       
    }
    public function nuevo_evento($usuario_id,$metodo){
        $this->db->set("metodo",$metodo);
        $this->db->set("usuario_id",$usuario_id);
        return $this->db->insert("api_log");
    }
}