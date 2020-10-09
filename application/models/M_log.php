<?php
class M_log extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	private $table = "log_activity_2";

    function getAll(){ 
        $hasil=$this->db->get($this->table); 
        return $hasil->result_array();
    }
 
    function tambah($id_user, $ket_log){ 

        $data = array(
            'id_user' => $id_user, 
            'keterangan' => $ket_log,  
            'tgl_log' => date('Y-m-d H:m:s'),  
        );
        $hasil=$this->db->insert($this->table, $data);
        return $hasil;
    }

    function tambah_detail($data){   
        $hasil=$this->db->insert('log_activity_detail', $data);
        return $hasil;
    }
  
      function detail($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table); 
        return $hsl;
    }   
	
	function update($id_outlet, $data) { 
        $this->db->where('id_outlet',$id_outlet);
        return $this->db->update($this->table, $data);
    } 
	
	function hapus($where, $data){
		$this->db->where($where);
		return $this->db->update($this->table, $data);
	}
}