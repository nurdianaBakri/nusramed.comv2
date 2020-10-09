<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier extends CI_Controller {

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

    public function  index()
    {   
        $data['title'] = "Suplier Obat/Barang";
        $data['url'] = "Suplier/";
        $data['SubFitur'] =null; 

        $data['breadcrumb'] = array(
            array(
                'fitur' => "Home", 
                'link' => base_url(), 
                'status' => "", 
            ), 
              array(
                'fitur' => "Suplier", 
                'link' => base_url()."Suplier", 
                'status' => "active", 
            ), 
        );
 
        $this->load->view('include2/sidebar', $data); 
        $this->load->view('suplier/index',$data);
        $this->load->view('include2/footer');  
    } 

     public function save_download()
    { 
        //load mPDF library
        $this->load->library('m_pdf');
        //load mPDF library


        //now pass the data//
         $this->data['title']="MY PDF TITLE 1.";
         $this->data['description']="";
         $this->data['description']=$this->official_copies;
         //now pass the data // 
 
        
        $html=$this->load->view('outlet/print_form_pendaftaran',$this->data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
     
        //this the the PDF filename that user will get to download
        $pdfFilePath ="mypdfName-".time()."-download.pdf";

        
        //actually, you can pass mPDF parameter on this load() function
        $pdf = $this->m_pdf->load();
        //generate the PDF!
        $pdf->WriteHTML($html,2);
        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
        $pdf->Output($pdfFilePath, "D"); 
    }

    public function get_form()
    {     
        $kd_suplier = "spr-".date('dmy')."-".rand('0987654321',4); 
        $data['jenis_aksi'] ="add"; 
        $where = array('kd_suplier' => "0" );  

        $data['url']="suplier/"; 
        $data['title']="Tambah Suplier";  
        $data['data']['kd_suplier'] = $kd_suplier; 
        $data['data']['nama'] = null; 
        $data['data']['alamat'] = null; 
        $data['data']['email'] = null; 
        $data['data']['no_hp'] = null;  
        $data['data']['no_rek'] = null;  
        $data['data']['bank'] = null;  
        $data['data']['no_izin'] = null;  
        $data['data']['masa_izin'] = null;  
        $data['data']['no_sika_sipa'] = null;  
        $data['data']['masa_sika_sipa'] = null;  
        $data['data']['nama_apoteker_pj'] = null;  

        $this->load->view('suplier/form',$data);
    }  

    public function reload_data()
    { 
        $data_balikan['data']= array();
        $data['data']= $this->Suplier_model->getAll();  
        $this->load->view('suplier/data', $data); 
    }  

    public function save()
    {     
        $hasil2=""; 
        $hasil = array();

        $jenis_aksi = $this->input->post('jenis_aksi');  
        $kd_suplier = $this->input->post('kd_suplier');  

        $data = array(   
            'nama' => $this->input->post('nama'), 
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'bank' => $this->input->post('bank'),
            'no_rek' => $this->input->post('no_rek'),
            'no_izin' => $this->input->post('no_izin'),
            'masa_izin' => $this->input->post('masa_izin'),
            'no_sika_sipa' => $this->input->post('no_sika_sipa'),
            'masa_sika_sipa' => $this->input->post('masa_sika_sipa'),
            'nama_apoteker_pj' => $this->input->post('nama_apoteker_pj'), 
        );    
         
        if($jenis_aksi=="add")
        {   
            $data['kd_suplier']= $kd_suplier;

            $hasil['status'] = $this->Suplier_model->save($data);  
            if($hasil['status']==true)
            {
                $hasil2 ="Proses Tambah suplier berhasil";
            }
            else
            {
                $hasil2 ="Proses Tambah suplier gagal"; 
            } 
        }   
        else{
            $where = array('kd_suplier' => $kd_suplier ); 
            $hasil['status'] = $this->Suplier_model->update($where, $data); 
            if($hasil['status']==true)
            {
                $hasil2 ="Proses update suplier berhasil";
            }
            else
            {
                $hasil2 ="Proses update suplier gagal"; 
            }
               
        }  
        $hasil['jenis_aksi']=$jenis_aksi;    
        redirect('Suplier?return='.$hasil['status']); 

        var_dump($data);
          
    }

    public function detail($kd_suplier)
    {  
        $data['title'] = "Detail Suplier";
        $data['url'] = "Suplier/"; 
        $where = array('kd_suplier' => $kd_suplier );   

        if ($kd_suplier==null)
        {
            $data['jenis_aksi']="add";
        }
        else
        {
            $data['jenis_aksi']="edit";
        }  

        //cek apakah kd_suplier ada di database 
        $cek= $this->Suplier_model->getByRow_array($where);  
        $data['data']= $cek;    
        $this->load->view('suplier/form',$data);  
    }

     public function hapus($kd_suplier)
    {
        $pesan = "";  
        $where = array('kd_suplier' => $kd_suplier ); 
        $hasil=$this->Suplier_model->delete($where);    
        
        if ($hasil==true)
        {
            $pesan="Proses hapus suplier ".$kd_suplier." berhasil!";
        }
        else
        {
            $pesan="Proses hapus suplier ".$kd_suplier." gagal, silahkan coba kembali";  
        }
        // echo $pesan;

         $data = array(
            'pesan' => $pesan, 
            'return' => $hasil, 
        );   
        echo json_encode($data);

    }

    public function pegawai($kd_suplier)
    {
        $data['title'] = "Pegawai ". $kd_suplier;
        $data['url'] = "Pegawai/";
        $this->load->view('include/header'); 
        $this->load->view('pegawai/index',$data);
        $this->load->view('include/footer'); 
    }

}