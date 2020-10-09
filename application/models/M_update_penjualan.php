<?php
class M_update_penjualan extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

    private $table = "detail_obat";
	private $table_trx_penjualan_tmp = "trx_penjualan_tmp"; 

    //get all transaksi TMP
    function getAll(){  
        $data= $this->db->query("SELECT DISTINCT(detail_obat.barcode) as barcode, CONCAT(detail_obat.barcode,' - ', O.nama) AS label FROM detail_obat
LEFT JOIN obat O ON O.barcode=detail_obat.barcode")->result_array();
        return $data;
    }

    function get_faktur_lap_pembelian(){  
        $data= $this->db->query("SELECT DISTINCT(A.no_faktur), A.kd_suplier, B.nama FROM detail_obat A INNER JOIN suplier B ON A.kd_suplier=B.kd_suplier")->result_array();
        return $data;
    }

    function detail_trx_po($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table); 
        return $hsl;
    }
 
    function save($data){
        $hasil=$this->db->insert($this->table, $data);
        return $hasil;
    } 

}