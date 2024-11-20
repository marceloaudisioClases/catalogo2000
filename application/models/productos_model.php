<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productos_model extends CI_Model {
    // Insertar un nuevo producto
    public function nuevo($data) {
        $this->db->insert('productos', $data);
        return $this->db->insert_id();
    }
    // Obtener todos los productos
    public function listar() {
        $query = $this->db->get('productos');
        return $query->result_array();
    }
    // Obtener un producto por ID
    public function obtener_por_id($id) {
        $query = $this->db->get_where('productos', array('id' => $id));
        return $query->row_array();
    }
}
?>
