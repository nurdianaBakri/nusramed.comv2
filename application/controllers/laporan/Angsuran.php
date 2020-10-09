<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Angsuran extends CI_Controller
{
    public function __construct()
    {
        parent ::__construct();  
        $this->logged_in();   
    } 

    private function logged_in() { 
        if($this->session->userdata('authenticated')!=true) {
            redirect('Login');
        }
    }   

    public function index()
    { 
        $data['title'] = "Angsuran Pembayaran";
        $data['url'] = "laporan/Angsuran/";
        $data['SubFitur'] =null;

        $data['breadcrumb'] = array(
            array(
                'fitur' => "Home",
                'link' => base_url(),
                'status' => "",
            ),
            array(
             'fitur' => "Angsuran Pembayaran",
             'link' => base_url()."laporan/Angsuran/",
             'status' => "active",
            ),
        );  
  
        $this->load->view('include2/sidebar', $data);
        $this->load->view('angsuran/index', $data);
        $this->load->view('include2/footer');
    } 
     

     function save()
     {
        $data = array( );
        $data_log = array( );
        $pesan = "";
        $keterangan = "";
        $validation_errors="";
        $insert = false;

        $no_faktur = $this->input->post('no_faktur');
        $angsuran = $this->input->post('angsuran');
        $lunas = $this->input->post('lunas');  

        $this->form_validation->set_rules("angsuran", "harus di masukkan ", "trim|required");   

        if ($this->form_validation->run() == FALSE) {
            $validation_errors = validation_errors();

            $pesan =  "Gagal menambah angsuran faktur : '".$no_faktur.". Karena jumlah angsuuran tidak di masukkan"; 

            // $pesan="Proses return obat dari outlet gagal .";  
            $this->M_log->tambah($this->session->userdata['id'], $pesan);
        } 
        else {   
               $data= array(
                   "no_faktur" => $no_faktur,
                   "angsuran" => $angsuran, 
                   "lunas" => $lunas, 
                   "id_user_input" => $this->session->userdata('id'), 
                   "tgl_angsuran" => date('Y-m-d H:m:s'), 
                );  
                $insert = $this->db->insert('riwayat_angsuran', $data);  
                if ($insert)
                {
                     $pesan =  "Menambah angsuran faktur : '".$no_faktur."' sebesar ".$angsuran; 
                }
                else{
                    $pesan =  "gagal Menambah angsuran faktur : '".$no_faktur."' sebesar ".$angsuran;  
                } 
               
                  // $pesan="Proses return obat dari outlet gagal .";  
                $this->M_log->tambah($this->session->userdata['id'], $pesan); 
            }  


        $data = array( 
            'pesan' => $pesan,   
            'return' => $insert,   
            'validation_errors' => $validation_errors,  
        ); 
        echo json_encode($data);
     } 

    public function get_riwayat_angsuran()
    {
       $no_faktur = $this->input->post('no_faktur');
       $data['data'] = $this->db->query("SELECT riwayat_angsuran.*, user_login.nama FROM riwayat_angsuran, user_login WHERE no_faktur='".$no_faktur."' and riwayat_angsuran.id_user_input=user_login.id")->result_array(); 

        $this->load->view('laporan_riwayat_return/riwayat', $data);  
    }

      public function get_outlet_pbf()
    {
       $jenis_objek = $this->input->post('jenis_objek');
       if ($jenis_objek=="penjualan")
       {
           $data['data'] = $this->db->query("SELECT CONCAT(kd_outlet,' - ', nama) as nama, kd_outlet as id  FROM angsuran_form_outlet")->result_array(); 
           $this->load->view('angsuran/objek', $data);  
       }
       if ($jenis_objek=="pembelian")
       {
           $data['data'] = $this->db->query("SELECT CONCAT(kd_suplier,' - ', nama) as nama, kd_suplier as id  FROM angsuran_form_suplier")->result_array(); 
           $this->load->view('angsuran/objek', $data);   
       }
       else
       { 
           $data['data']=  array( );
           $this->load->view('angsuran/objek', $data);  

       }    
    }

    public function get_laporan()
    {
           $jenis_objek = $this->input->post('jenis_objek');
           $objek = $this->input->post('objek');
           if ($jenis_objek=="penjualan")
           {
               $data['data'] = $this->db->query("SELECT * from riwayat_anguran where ")->result_array(); 
               $this->load->view('angsuran/objek', $data);  
           }
           if ($jenis_objek=="pembelian")
           {
               $data['data'] = $this->db->query("SELECT CONCAT(kd_suplier,' - ', nama) as nama, kd_suplier as id  FROM angsuran_form_suplier")->result_array(); 
               $this->load->view('angsuran/objek', $data);   
           }
           else
           { 
               $data['data']=  array( ); 
           }    
               $this->load->view('angsuran/angsuran', $data);  

    }

    public function disableEnableAddButton()
    {
       $no_faktur = $this->input->post('no_faktur'); 
         $data['show_button_angsuran']= $this->db->query("SELECT * from riwayat_angsuran WHERE no_faktur='".$no_faktur."' and lunas=1");
         if ($data['show_button_angsuran']->row_array()['lunas']==1)
         {
             echo true;
         }
         else
         {
             echo false;
         }

    }
  
}
