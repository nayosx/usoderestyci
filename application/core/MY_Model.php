<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // return $this->db->affected_rows();
class MY_Model extends CI_Model {
    protected $table = "";
    protected $id = "";

    function __construct() {
        parent::__construct();
        //$this->db = $this->load->database('default');
    }

    function selectAll($use_array = TRUE) {
        if ($use_array) {
            $query = $this->db->get($this->table);
            return $query->result();
        } else {
            return $this->db->get($this->table);
        }
    }

    function select($id) {
        $this->db->where($this->id, $id);
        $query = $this->db->get($this->table);
        return $query->row();
    } 

    function create($_array) {
        $this->db->insert($this->table, $_array);
        return $this->db->insert_id();
    }
    
    function insert($_array){
        return $this->db->insert($this->table, $_array);
    }
    
    function update($id, $_array) {
        $this->db->where($this->id, $id);
        return $this->db->update($this->table, $_array);
    }
    
    function updateRow($id, $array){
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $array);
        return $this->db->affected_rows();
    }

    function delete($id) {
        $this->db->where($this->id, $id);
        return $this->db->delete($this->table);
    }
    
    function lastQuery(){
        return $this->db->last_query();
    }
    
    function selectColumns($columns, $returnList = TRUE){
        $select = "";
        if(is_array($columns)){
            $counter = count($columns);
            foreach ($columns as $column){
                if($counter > 1){
                    $select .= $column." ,";
                } else{
                    $select = $column;
                }
            }
            if($counter > 1){
                $select = substr_replace($select, "", -2);
            }
            
        } else{
            $select = $columns;
        }
        $this->db->select($select);
        $this->db->from($this->table);
        $result = $this->db->get();
        
        if($returnList){
            return $result->result();
        } else{
            return $result->row();
        }
    }
    
    function selectColumnsById($id, $columns, $returnList = TRUE){
        $select = "";
        if(is_array($columns)){
            $counter = count($columns);
            foreach ($columns as $column){
                if($counter > 1){
                    $select .= $column." ,";
                } else{
                    $select = $column;
                }
            }
            if($counter > 1){
                $select = substr_replace($select, "", -2);
            }
            
        } else{
            $select = $columns;
        }
        $this->db->select($select);
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $result = $this->db->get();
        if($returnList){
            return $result->result();
        } else{
            return $result->row();
        }
    }
    
    public function createBatch($content){
        return $this->db->insert_batch($this->table, $content);
    }
}