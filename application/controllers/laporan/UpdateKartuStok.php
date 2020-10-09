<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateKartuStok extends CI_Controller {

    public function __construct()
    {
        parent ::__construct();
        $cek = $this->M_login->cek_userIsLogedIn(); 
        // var_dump($cek);
        if ($cek==FALSE)
        {
            $this->session->set_flashdata('pesan',"Anda harus login jika ingin mengakses halaman lain");
            redirect('Home');
        } 
    } 

    public function  index()
    {  
        $data['title'] = "Update Kartu Stok";
        $data['url'] = "laporan/UpdateKartuStok/"; 
        $data['SubFitur'] =null;   
        $data['obat'] = $this->M_obat->getAll(); 

        
        $this->load->view('new_theme/header'); 
        $this->load->view('new_theme/menu'); 
        $this->load->view('updatekartuStok/index', $data); 
        $this->load->view('new_theme/footer');    
    }  

    public function get_laporan()
    {
        $data['url'] = "laporan/UpdateKartuStok/"; 
        $barcode = $this->input->post('barcode'); 
        $tanggal_mulai = $this->input->post('tanggal_mulai'); 
        $tanggal_sampai = $this->input->post('tanggal_sampai');  
        $data['barcode']= $barcode;
        $data['laporan'] = $this->db->query("SELECT id_transaksi, no_faktur, jenis_faktur, uraian, no_batch, tgl_exp, keluar, masuk, sisa, CAST(tanggal AS DATETIME) AS tanggal FROM kartu_stok WHERE barcode='".$barcode."' and tanggal BETWEEN '".$tanggal_mulai." 00:00:01' and '".$tanggal_sampai." 23:59:59' order by tanggal ASC")->result_array(); 
        
        
        $data['obat'] = $this->db->query("SELECT no_batch, no_faktur, barcode, DATE(tgl_exp) as tgl_exp, id_detail_obat from detail_obat where barcode = '" . $barcode . "'")->result_array();

        if (sizeof($data['laporan'])>0)
        {
            // var_dump($this->db->last_query());
            $this->load->view('updatekartuStok/data',$data);
        }
        else{

            $this->session->set_flashdata('pesan','<h6>Tidak ada Riwayat Stok</h6>');
            $this->load->view('updatekartuStok/alert',$data); 
        }     
    }

    public function edit()
    { 
        $id_transaksi = $this->input->post('id_trx');
        $jenis_faktur = $this->input->post('jenis_faktur');
 
        $data['data'] = $this->db->query("SELECT * from kartu_stok where id_transaksi = '" . $id_transaksi . "' and jenis_faktur = '" . $jenis_faktur . "'")->row_array();
        $this->load->view('updatekartuStok/form',$data);  
    }
    
}