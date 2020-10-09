<?php
class Suplier_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	private $table = "suplier";

    function getAll(){
    	$this->db->where('deleted',0);
        $hasil=$this->db->get($this->table);
        return $hasil->result_array();
    }

    public function getInti()
    {
    	return $this->db->query('SELECT kd_suplier, nama from suplier where deleted=0')->result_array();
    }
 
    function save($data){
        $hasil=$this->db->insert($this->table, $data);
        return $hasil;
    }
 
    function getByRow_array($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->row_array(); 
        return $hsl;
    }

      function getByObject($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->result(); 
        return $hsl;
    }   

     function getByResultArray($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->result_array(); 
        return $hsl;
    }
	
	function get($where = NULL){
		$this->db->select('*');
		$this->db->from('suplier');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('kd_industri','ASC');
		return $this->db->get();
	}
	
	function add($data){
		$query = $this->db->insert($this->table, $data); 
		return $query;
	}
	
	function update($where, $data) { 
        $this->db->where($where);
        return $this->db->update($this->table, $data);
    }
	
	function edit($kd_suplier, $data){
		$this->db->where('kd_suplier', $kd_suplier);
		$this->db->update('industri', $data);
		return $kd_suplier;
	}
	
	function delete($where){
		$data = array('deleted' => 1 );
		$this->db->where($where); 
		return $this->db->update($this->table, $data);
	}
}