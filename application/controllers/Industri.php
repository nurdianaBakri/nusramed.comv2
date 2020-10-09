<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Industri extends CI_Controller {

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
        $data['title'] = "Industri Obat/Barang";
        $data['url'] = "industri/";
        $data['SubFitur'] =null; 

        $data['breadcrumb'] = array(
            array(
                'fitur' => "Home", 
                'link' => base_url(), 
                'status' => "", 
            ), 
              array(
                'fitur' => "Industri", 
                'link' => base_url()."industri", 
                'status' => "active", 
            ), 
        );

        $this->load->view('include2/sidebar', $data); 
        $this->load->view('industri/index',$data);
        $this->load->view('include2/footer');  
    } 

    public function get_form()
    {     
        $kd_industri = "ids-".date('dmy')."-".rand('0987654321',4); 
        $data['jenis_aksi'] ="add"; 
        $where = array('kd_industri' => "0" );   

        $data['data']= $this->Industri_model->getBy($where);  
        $data['url']="industri/"; 
        $data['title']="Tambah Industri";  
        $data['data']['kd_industri'] = $kd_industri; 
        $data['data']['nama'] = null; 
        $data['data']['alamat'] = null; 
        $data['data']['email'] = null; 
        $data['data']['no_telp'] = null;  
        $data['data']['no_rek'] = null;  
        $data['data']['kd_bank'] = null;  

        $this->load->view('industri/form',$data);
    }  

    public function reload_data()
    { 
        $data_balikan['data']= array();
        $data['data']= $this->Industri_model->getAll();  
        $this->load->view('industri/data', $data); 
    }  

     public function invalid_page()
    {
        $data['title'] = "Invalid Page";
        $data['url'] = ""; 
        $data['SubFitur'] =null; 

        $data['breadcrumb'] = array(
            array(
                'fitur' => "Invalid Page", 
                'link' => "", 
                'status' => "", 
            ), 
        ); 
        $this->load->view('include2/sidebar',$data); 
        $this->load->view('invalid_page',$data);
        $this->load->view('include2/footer');
    } 

    public function save()
    {     
        $hasil2=""; 
        $hasil = array();

        $jenis_aksi = $this->input->post('jenis_aksi');  
        $kd_industri = $this->input->post('kd_industri');  

        $data = array(   
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'nama' => $this->input->post('nama'), 
            'no_rek' => $this->input->post('no_rek'), 
            'kd_bank' => $this->input->post('kd_bank'), 
        ); 
  
        if($jenis_aksi=="add")
        {   
            $data['kd_industri']= $kd_industri;

            $hasil['status'] = $this->Industri_model->save($data);  
            if($hasil['status']==true)
            {
                $hasil2 ="Proses Tambah industri berhasil"; 
            }
            else
            {
                $hasil2 ="Proses Tambah industri gagal";  
            } 
        }   
        else{
            $where = array('kd_industri' => $kd_industri ); 
            $hasil['status'] = $this->Industri_model->update($where, $data); 
            if($hasil['status']==true)
            {
                $hasil2 ="Proses update industri berhasil"; 
            }
            else
            {
                $hasil2 ="Proses update industri gagal";  
            } 
        }  

        $hasil['jenis_aksi']=$jenis_aksi;   
        redirect('Industri?return='.$hasil['status']."&pesan=".$hasil2);   
    }

    public function detail($kd_industri)
    {  
        $data['title'] = "industri";
        $data['url'] = "industri/"; 
        $where = array('kd_industri' => $kd_industri );   

        if ($kd_industri==null)
        {
            $data['jenis_aksi']="add";
        }
        else
        {
            $data['jenis_aksi']="edit";
        }  

        //cek apakah kd_industri ada di database 
        $cek= $this->Industri_model->detail($where); 
        if ($cek->num_rows()>0)
        {  
            $industri = $cek->row_array(); 
            $data['data']= $industri;    
            $this->load->view('industri/form',$data); 
        }
        else
        {
            $pesan="<div class='alert alert-danger' role='alert'>
                            industri ".$kd_industri." Tidak terdaftar, silahkan pilih industri lain
                            </div>";  

            $this->session->set_flashdata('pesan', $pesan);
            redirect('industri');
        }  
    }

     public function hapus($kd_industri)
    {
        $pesan = "";  
        $where = array('kd_industri' => $kd_industri ); 
        $hasil=$this->Industri_model->hapus($where);    
        
        if ($hasil==true)
        {
            $pesan="Proses hapus industri ".$kd_industri." berhasil! ";
        }
        else
        {
            $pesan="Proses hapus industri ".$kd_industri." gagal, silahkan coba kembali";  
        }

        $data = array(
            'pesan' => $pesan, 
            'return' => $hasil, 
        );  

        echo json_encode($data);
        // redirect('Industri?return='.$hasil."&pesan=".$hasil2);   
    }

    public function pegawai($kd_industri)
    {
        $data['title'] = "Pegawai ". $kd_industri;
        $data['url'] = "Pegawai/";
        $this->load->view('include/header'); 
        $this->load->view('pegawai/index',$data);
        $this->load->view('include/footer'); 
    }

}