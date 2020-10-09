<?php
class M_obat extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	private $table = "obat";

	public function generate_barcode($barcode_string)
	{
        // ob_end_clean();  
        $this->zend->load('Zend/Barcode');

        $barcode_option = array(
        	'text'=>$barcode_string,
        	'barHeight'=>60,
        	'factor'=>2
    	);

        $image_resource = Zend_Barcode::factory('code128', 'image', $barcode_option, array())->draw();
        $image_name     = $barcode_string.'.jpg';
        $image_dir      = './assets/barcode/'; // penyimpanan file barcode
        return imagejpeg($image_resource, $image_dir.$image_name);
	}

	public function getInti()
	{
		return $this->db->query('SELECT barcode, nama from obat where deleted=0')->result_array();
	}

    function getAll($limit=null){
    	if ($limit==null)
    	{
    		$this->db->where('deleted',0);
    		$this->db->order_by('date', 'DESC');
	        $hasil=$this->db->get($this->table);
	        return $hasil->result_array();
    	}
    	else
    	{
    		$this->db->limit($limit);
    		$this->db->where('deleted',0);
    		$this->db->order_by('date', 'DESC');
	        $hasil=$this->db->get($this->table);
	        return $hasil->result_array();
    	} 
    }

    public function getAll_for_pembelian()
    {
    	$this->db->select('barcode, nama');
    	$this->db->where('deleted',0); 
		$this->db->order_by('date', 'DESC');
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

      function getByObject($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->result(); 
        return $hsl;
    }    
	
	function get($where = NULL){
		$this->db->where('deleted',0);
		$this->db->select('obat.*,industri.nama as industri_nama');
		$this->db->from('obat');
		$this->db->join('industri','obat.kd_industri = industri.kd_industri');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('id_obat','ASC');
		return $this->db->get();
	}

	public function cek_obat($where)
	{
		$this->db->where($where);
		$data = $this->db->get('obat');
		return $data;
	}

	public function insert($data)
	{
		$id_obat  = $this->get_max_primary();
		$data_detail['id_obat']=$id_obat; 
		$data['id_obat']=$id_obat; 

		$query = $this->db->insert('obat', $data); 
		return $query;
	}
	
	function add($data, $data_detail){

		//cek obat yang sudah ada
		$query = "";
		$where = array(
			'nama' => $data['nama'], 
			'kd_suplier' => $data['kd_suplier'], 
			'kd_satuan' => $data['kd_satuan'], 
			'deskripsi' => $data['deskripsi'], 
			'kandungan' => $data['kandungan'], 
		); 
		$cek = $this->cek_obat($where);
		if ($cek->num_rows()==1)
		{
			$data_detail['id_obat'] = $cek->row_array()['id_obat'];
			$query = $this->db->insert('detail_obat', $data_detail);    
		} 
		else{
			// kalau tidak ada, masukkan data obat

			//get kode obat terakhir 
			$id_obat  = $this->get_max_primary();
			$data_detail['id_obat']=$id_obat; 
			$data['id_obat']=$id_obat; 

			$query = $this->db->insert('obat', $data); 

			//masukkan data detail obat 
			$query = $this->db->insert('detail_obat', $data_detail);  
		} 
		 
		return $query;
	}
	
	function update($where, $data) { 

		 //get barcode lama
        $this->db->where($where);
        $barcode_lama =  $this->db->get('obat')->row_array()['barcode']; 

        $this->db->where($where);
        $update_obat =  $this->db->update('obat', $data); 

        $data2 = array(
        	'barcode' => $data['barcode'], 
        );   
        $this->db->where('barcode', $barcode_lama);
        $this->db->update('detail_obat', $data2);

        $data2 = array(
        	'barcode' => $data['barcode'], 
        );   
        $this->db->where('barcode', $barcode_lama);
        return $this->db->update('trx_penjualan_tmp', $data2);  
    }
	
	function edit($id_obat, $data){
		$this->db->where('id_obat', $id_obat);
		$this->db->update('obat', $data);
		return $id_obat;
	}
	
	function hapus($where){
		$this->db->where($where);
		$data = array('deleted' => 1 );
		return $this->db->update('obat',$data);
	}

	public function get_max_primary()
	{ 
		$maxid =0;
		$row = $this->db->query('SELECT MAX(id_obat) AS `id_obat` FROM `obat`')->row();
		if ($row->id_obat==NULL || $row->id_obat=="NULL" || $row->id_obat==0)  {
			return $row->id_obat+1;
		} 
		else
		{
			return $row->id_obat+1; 
		}
	} 

	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function insert_multiple($tabel, $data){
		return $this->db->insert_batch($tabel, $data);
	}

	// Fungsi untuk melakukan proses upload file
	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function get_barcode()
	{
		$random_string = "NRM".rand('01234567890',9);
        $is_unique = false;

        while (!$is_unique) {
            $result = $this->db->query('SELECT barcode FROM obat WHERE barcode = "'.$random_string.'" LIMIT 1')->num_rows();
            if ($result <1)   // if you don't get a result, then you're good
                $is_unique = true;
            else                     // if you DO get a result, keep trying
                $random_string = "NRM".rand('01234567890',9);
        } 
        return $random_string;
	} 
	 
}