<?php
class M_detail_obat extends CI_Model {

	private $table = "detail_obat";
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){  
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('tgl_exp','ASC');
		return $this->db->get($this->table);
	}

	public function cek_detail_obat($where)
	{
		$this->db->where($where);
		$data = $this->db->get($this->table);
		return $data;
	}
	
	function add($data){
 		 $query = $this->db->insert($this->table, $data);     
		return $query;
	}
	
	function update($where, $data) { 
        $this->db->where($where);
        return $this->db->update($this->table, $data);
    }
 
	function edit($no_batch, $data){
		$this->db->where('no_batch', $no_batch);
		$this->db->update($this->table, $data);
		return $no_batch;
	}
	
	function hapus($where){
		$this->db->where($where);
		return $this->db->delete($this->table);
	}

	public function get_max_primary()
	{ 
		$maxid =0;
		$row = $this->db->query('SELECT MAX(no_batch) AS `no_batch` FROM `detail_obat`')->row();
		if ($row->no_batch==NULL || $row->no_batch=="NULL" || $row->no_batch==0)  {
			return $row->no_batch+1;
		} 
		else
		{
			return $row->no_batch+1; 
		}
	}

	public function get_last_exp($barcode, $tgl_exp=null, $cartContent=null, $tgl_exp_old=null, $no_batch_old=null)
	{ 

		if ($tgl_exp==null)
		{
			$date = date('Y-m-d');
			$data = $this->db->query("SELECT * FROM detail_obat WHERE  tgl_exp > '$date' and barcode='$barcode' and sisa_stok>0 and deleted='0'  ORDER BY tgl_exp ASC");
			return $data;
		}
		else
		{  
			$no_batch=$cartContent['id'];
			$tgl_exp_full=$cartContent['tgl_exp_full'];
			$cek1 = $this->db->query("SELECT * FROM detail_obat WHERE barcode='$barcode' and no_batch='$no_batch' AND sisa_stok>0 and deleted='0'  ORDER BY tgl_exp ASC");
			if ($cek1->num_rows()>0)
			{
				$data = $cek1->row_array();
				// //cek apakah stok sudah habis
				// check qyalitynya sama
				if ($cartContent['qty']==$data['sisa_stok'])
				{  
					$no_batch2 = $data['no_batch']; 

					//jika stok sudah habis, ambil data detail obat yang memiliki taggal expired di atasnya
					$cek1 = $this->db->query("SELECT * FROM detail_obat WHERE barcode='$barcode' and  tgl_exp not in($tgl_exp_old) and no_batch not in ($no_batch_old)  and sisa_stok>0 and deleted='0'  ORDER BY tgl_exp ASC limit 1");
				}  
			}
			else{
				$cek1 = $this->db->query("SELECT * FROM detail_obat WHERE barcode='$barcode' and no_batch!='$no_batch' AND sisa_stok>0 and deleted='0'  ORDER BY tgl_exp ASC");
				$data = $cek1->row_array(); 
				if ($cartContent['qty']==$data['sisa_stok'])
				{ 
					//jika stok sudah habis, ambil data detail obat yang memiliki taggal expired di atasnya
					$cek1 = $this->db->query("SELECT * FROM detail_obat WHERE barcode='$barcode' and  tgl_exp >= '$tgl_exp'  and no_batch!='$no_batch'  and sisa_stok>0 and deleted='0'  ORDER BY tgl_exp ASC");
				}  
			} 	 
			return $cek1;
		} 
	}

	public function get_last_exp2($barcode, $tgl_exp=null, $cartContent=null)
	{
		if ($tgl_exp==null)
		{
			$date = date('Y-m-d');
			$data = $this->db->query("SELECT * FROM detail_obat WHERE  tgl_exp > '$date' and barcode='$barcode' and sisa_stok>0 and deleted='0'  ORDER BY tgl_exp ASC");
			return $data;
		}
		else
		{  
			$no_batch=$cartContent['id'];
			$cek1 = $this->db->query("SELECT * FROM detail_obat WHERE no_batch='$no_batch'  and sisa_stok>0 and deleted='0'  ORDER BY tgl_exp ASC");
			if ($cek1->num_rows()>0)
			{
				$data = $cek1->row_array();
				// //cek apakah stok sudah habis
				if ($cartContent['qty']<=$data['sisa_stok'])
				{ 
					//jika stok sudah habis, ambil data detail obat yang memiliki taggal expired di atasnya
					$cek1 = $this->db->query("SELECT * FROM detail_obat WHERE barcode='$barcode' and  tgl_exp >= '$tgl_exp'  and sisa_stok>0 and deleted='0'  ORDER BY tgl_exp ASC limit 1");
				}  
			} 	 
			return $cek1;
		} 
	}


	public function get_last_exp_pengambilan($barcode, $no_faktur)
	{
		foreach ($this->cart->contents() as $items)
        { 
        	if(isset($items['jenis_cart'])){
			if($items['jenis_cart']=='pengambilan'){
				if ($items['barcode']==$barcode)
				{
					$tgl_exp = $items['tgl_exp_full'];	
					$no_batch=$items['id'];	
					$cek1 = $this->db->query("SELECT * FROM trx_penjualan_tmp WHERE no_batch='$no_batch' and no_faktur='$no_faktur' ORDER BY tgl_exp ASC");
					if ($cek1->num_rows()>0)
					{
						$data = $cek1->row_array();
	
						//cek apakah stok sudah habis
						if ((int)$items['qty_verified']<(int)$data['qty'])
						{ 
							//jika stok sudah habis, ambil data detail obat yang memiliki taggal expired di atasnya
							// $cek1 = $this->db->query("SELECT * FROM trx_penjualan_tmp WHERE  tgl_exp < '$tgl_exp' and barcode='$barcode' and no_faktur='$no_faktur' ORDER BY tgl_exp ASC");
							return $cek1;
						}
						elseif ((int)$items['qty_verified']==(int)$data['qty'])
						{ 
							//jika stok sudah habis, ambil data detail obat yang memiliki taggal expired di atasnya
							$cek1 = $this->db->query("SELECT * FROM trx_penjualan_tmp WHERE  tgl_exp > '$tgl_exp' and barcode='$barcode' and no_faktur='$no_faktur' ORDER BY tgl_exp ASC");
						}
					} 	 
				}
			}
		}
        }	
			return $cek1; 
	} 

	 
}