<?php
class Categorias_model extends CI_Model {

    var $campo_orden="categorias.nombre";
    var $campo_sentido="ASC";
    public function set_campo_orden($campo_orden="categorias.nombre"){
        $this->campo_orden=$campo_orden;
    }
    public function set_campo_sentido($sentido="ASC"){
        $this->sentido=$sentido;
    }

    public function listar(){
        $this->db->select("*");
        $this->db->set("categoria_id");
        $this->db->order_by($this->campo_orden,$this->campo_sentido);
        $query = $this->db->get('categorias');
        return $query->result_array();
    }
    public function obtener_por_id($id){
        $this->db->select("*");
        $this->db->where("categoria_id",$id);
        $this->db->limit(1);
        return $this->db->get("categorias")->row_array();       
    }
    public function nuevo($data) {
        $this->db->insert('categorias', $data);
        return $this->db->insert_id();
    }
    public function contar(){
        return $this->db->count_all("categorias");
    }
}