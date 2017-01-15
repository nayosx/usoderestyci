<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario_model
 *
 * @author nayosx
 */
class Usuario_model extends MY_Model{
    
    public function __construct() {
        parent::__construct();
        $this->id = 'id';
        $this->table = 'usuario';
    }
    
    public function selectAll($use_array = TRUE) {
        $this->db->select('id, nombre as username, correo as mail, contrasena as pass, date_crea as fecha');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }
}
