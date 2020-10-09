<?php
class Industri_model extends CI_Model {


	private $table = "industri";
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('*');
		$this->db->from($this->table);
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('kd_industri','ASC');
		return $this->db->get();
	} 

    function getAll(){
        $this->db->where('deleted',0);
        $hasil=$this->db->get($this->table);
        return $hasil->result_array();
    }
 
    function save($data){
        $hasil=$this->db->insert($this->table, $data);
        return $hasil;
    }
 
    function getBy($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->row_array(); 
        return $hsl;
    }

     function detail($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table); 
        return $hsl;
    }

      function getByObject($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->result(); 
        return $hsl; 
	}

	function update($where, $data) { 
        $this->db->where($where);
        return $this->db->update($this->table, $data);
    } 
	
	function hapus($where){
		$this->db->where($where);
		return $this->db->delete($this->table);
	}
}