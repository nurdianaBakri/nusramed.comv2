<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KartuStok extends CI_Controller {

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
        $data['title'] = "Kartu Stok";
        $data['url'] = "laporan/KartuStok/"; 
        $data['SubFitur'] =null; 

        $data['breadcrumb'] = array(
            array(
                'fitur' => "Home", 
                'link' => base_url(), 
                'status' => "", 
            ),
            array(
             'fitur' => "Kartu Stok", 
             'link' => base_url()."laporan/KartuStok", 
             'status' => "active", 
            ), 
        );

        $data['obat'] = $this->M_obat->getAll(); 

        $this->load->view('include2/sidebar',$data); 
        $this->load->view('kartuStok/index',$data);
        $this->load->view('include2/footer');  
    }  

    public function get_laporan()
    {
        $barcode = $this->input->post('barcode'); 
        $data1 = array(); 
        $data2 = array(); 
         
        $data['lap_pemb'] = $this->db->query("SELECT nama, no_faktur, detail_obat.kd_suplier, no_batch, tgl_exp, qty_verified, time FROM detail_obat, suplier WHERE barcode='".$barcode."' and detail_obat.kd_suplier=suplier.kd_suplier ORDER BY detail_obat.time DESC"); 

        $data['lap_pen'] =$this->db->query("SELECT nama, sisa_stok, no_faktur, trx_penjualan_tmp.kd_outlet , no_batch, tgl_exp, qty_verified, time FROM trx_penjualan_tmp, outlet1 WHERE barcode='".$barcode."' and trx_penjualan_tmp.kd_outlet=outlet1.id_outlet ORDER BY trx_penjualan_tmp.time DESC"); 

         $data['data_so'] =$this->db->query("SELECT no_batch, stok_real, tanggal, tgl_exp, no_reg FROM stok_opname  WHERE barcode='".$barcode."' ORDER BY tanggal DESC"); 
         // $data['data_so'] =$this->db->query("SELECT detail_obat.no_faktur, stok_opname.no_batch, stok_real, tanggal, stok_opname.tgl_exp FROM stok_opname, detail_obat WHERE stok_opname.barcode='".$barcode."' and detail_obat.barcode = stok_opname.barcode and stok_opname.no_batch=detail_obat.no_batch ORDER BY tanggal DESC"); 

        foreach ($data['lap_pemb']->result_array() as $key ) { 
           $data1[] = array(
                'time'=>date("d/m/Y H:m:s", strtotime($key['time'])),
                'no_faktur'=>$key['no_faktur'],
                'keterangan'=>$key['nama'],
                'no_batch'=>$key['no_batch'],
                'tgl_exp'=>date("d M Y", strtotime($key['tgl_exp'])) , 
                'masuk'=>$key['qty_verified'],
                'keluar'=>"-", 
                'sisa'=>$key['qty_verified'], 
                'paraf'=>"-", 
            );
        }

         foreach ($data['lap_pen']->result_array() as $key ) { 
           $data1[] = array(
                'time'=>date("d/m/Y H:m:s", strtotime($key['time'])),
                'no_faktur'=>$key['no_faktur'],
                'keterangan'=>$key['nama'],
                'no_batch'=>$key['no_batch'],
                'tgl_exp'=>date("d M Y", strtotime($key['tgl_exp'])) , 
                'masuk'=>"-",
                'keluar'=>$key['qty_verified'], 
                'sisa'=>$key['sisa_stok'], 
                'paraf'=>"-", 
            );
        }

         foreach ($data['data_so']->result_array() as $key ) { 

            //get nomor faktur  
            $data['no_faktur'] =$this->db->query("SELECT no_faktur from detail_obat WHERE no_batch='".$key['no_batch']."' and no_reg='".$key['no_reg']."'"); 

            if ($data['no_faktur']->num_rows()>0)
            {
                $data['no_faktur'] = $data['no_faktur']->row_array()['no_faktur'];
            }
            else
            {
                $data['no_faktur'] = "[sedang di telusuri]";
            }

           $data1[] = array(
                'time'=>date("d/m/Y H:m:s", strtotime($key['tanggal'])),
                'no_faktur'=> $data['no_faktur'],
                'keterangan'=>"Stok Opname",
                'no_batch'=>$key['no_batch'],
                'tgl_exp'=>date("d M Y", strtotime($key['tgl_exp'])) , 
                'masuk'=>"-",
                'keluar'=>"-", 
                'sisa'=>$key['stok_real'], 
                'paraf'=>"-", 
            );
        }

        $data['laporan'] = $data1; 
        $this->load->view('kartuStok/data',$data);
    }
    
}