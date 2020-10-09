<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet extends CI_Controller {

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
        $data['title'] = "Outlet";
        $data['url'] = "Outlet/";
        $data['SubFitur'] =null; 

        $data['breadcrumb'] = array(
            array(
                'fitur' => "Home", 
                'link' => base_url(), 
                'status' => "", 
            ), 
              array(
                'fitur' => "Outlet", 
                'link' => base_url()."Outlet", 
                'status' => "active", 
            ), 
        ); 
        $this->load->view('include2/sidebar', $data); 
        $this->load->view('outlet/index',$data);
        $this->load->view('include2/footer');  
    } 

    public function get_form()
    {     
        $id_outlet = "OUT-".date('dmy')."-".rand('0987654321',4); 
        $data['jenis_aksi'] ="add"; 
        $where = array('id_outlet' => "0" );  
        $where2 = array('id_penanggung_jawab' => "0" );  
        $where3 = array('id_ttk' => "0" );  

        $data['outlet']= $this->M_outlet->detail($where)->row_array();  
        $data['penanggung_jawab']= $this->M_outlet_PJ->detail($where2)->row_array();  
        $data['ttk']= $this->M_outlet_ttk->detail($where3)->row_array(); 
        $data['kab_kota']= $this->db->get('kab_kota')->result_array(); 
        $data['id_kec']="";
        $data['id_kab_kota']="";

       /*  $data['id_kec']= $outlet['id_kec']; 

        $data['kab_kota']= $this->db->get('kab_kota')->result_array(); */

        $data['url_inquery']="outlet/inquery"; 
        $data['url']="outlet/"; 
        $data['title']="Tambah"; 
        $data['id_outlet']=$id_outlet; 
        $this->load->view('outlet/form',$data);
    } 

    public function get_kecamatan($id_kab_kota)
    {
        $this->db->where('id_kab_kota',$id_kab_kota);
        $data['kecamatan'] = $this->db->get('kecamatan')->result_array();
        $this->load->view('outlet/kecamatan',$data);
    }
     

    public function reload_data()
    {  
        $data['data']= $this->M_outlet->getAll();  
        $this->load->view('outlet/data', $data); 
    }  


    public function exportToExel()
    {
        $data['title'] = "Export Outlet";
        $data['url'] = "Outlet/";
        $data['SubFitur'] =null; 

        $data['breadcrumb'] = array(
            array(
                'fitur' => "Home", 
                'link' => base_url(), 
                'status' => "", 
            ), 
              array(
                'fitur' => "Outlet", 
                'link' => base_url()."Outlet", 
                'status' => "active", 
            ), 
        ); 


        $data['data']= $this->db->query("SELECT outlet1.*, a.nama_pj, a.no_str_pj, a.no_sipa_pj, a.alamat_pj, a.no_telp_pj FROM outlet1, outlet_penanggung_jawab a WHERE a.id_penanggung_jawab = outlet1.id_penanggung_jawab")->result_array();   
        $this->load->view('include2/sidebar', $data);  
        $this->load->view('outlet/data_export', $data); 
        $this->load->view('include2/footer');   
    }

    public function save()
    {    
        $hasil1="";
        $hasil2=""; 
        $hasil = array();
        $data3 = array();

        $jenis_aksi = $this->input->post('jenis_aksi');  
        $id_outlet = $this->input->post('id_outlet'); 

        $no_ktp_pj = $this->input->post('no_ktp_pj');
        $email_pj = $this->input->post('email_pj');
        $nm_pj = $this->input->post('nm_pj');
        $alamat_pj = $this->input->post('alamat_pj');
        $no_str_pj = $this->input->post('no_str_pj');
        $no_sipa_pj = $this->input->post('no_sipa_pj');
        $masa_str_pj = $this->input->post('masa_str_pj');
        $masa_sipa_pj = $this->input->post('masa_sipa_pj');
        $no_sia = $this->input->post('no_sia');
        $no_ijin_rs = $this->input->post('no_ijin_rs');
        $no_ijin_klinik = $this->input->post('no_ijin_klinik');
        $no_telp_pj = $this->input->post('no_telp_pj');

        $nik_ttk = $this->input->post('nik_ttk');
        $nama_ttk = $this->input->post('nama_ttk');
        $alamat_ttk = $this->input->post('alamat_ttk');
        $no_telp_ttk = $this->input->post('no_telp_ttk');
        $no_sikttk = $this->input->post('no_sikttk');
        $masa_sikttk = $this->input->post('masa_sikttk');
        $no_strttk = $this->input->post('no_strttk');
        $masa_strttk = $this->input->post('masa_strttk');  
         

        //masukkan data penganngun jawab 
        $id_penanggung_jawab="";   
        $data1 = array(  
            'no_ktp_pj' => $no_ktp_pj,
            'email_pj' => $email_pj,
            'nama_pj' => $nm_pj,
            'alamat_pj' => $alamat_pj,
            'no_str_pj' => $no_str_pj,
            'no_sipa_pj' => $no_sipa_pj,
            'masa_sipa' => $masa_sipa_pj,
            'masa_str' => $masa_str_pj, 
            'no_telp_pj' => $no_telp_pj,
        );   

         // masukkan data outlet
        $data2 = array( 
            'nama' => $this->input->post('nama'),
            'id_outlet' => $id_outlet,
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
            'alamat_pemilik' => $this->input->post('alamat_pemilik'),
            'npwp' => $this->input->post('npwp'),
            'nm_pemilik' => $this->input->post('nm_pemilik'),
            'no_telp_pemilik' => $this->input->post('no_telp_pemilik'),
            'no_ktp_pemilik' => $this->input->post('no_ktp_pemilik'), 
            'no_izin' => $this->input->post('no_izin'), 
            'masa_izin' => $this->input->post('masa_izin'), 
            'id_kab_kota' => $this->input->post('id_kab_kota'), 
            'id_kec' => $this->input->post('id_kec'), 
            'deleted' => 0, 
        );  

         if($jenis_aksi=="add")
         {
            $id_penanggung_jawab= $this->M_outlet_PJ->get_last_id();

            $data1['id_penanggung_jawab']=$id_penanggung_jawab;  
            $data2['id_penanggung_jawab']=$id_penanggung_jawab;  

            if ($_POST['nama_ttk']!="")
            {
                $id_ttk= $this->M_outlet_ttk->get_last_id();

                $data3 = array(  
                    'id_ttk' => $id_ttk,
                    'nik' => $nik_ttk,
                    'nama' => $nama_ttk,
                    'alamat' => $alamat_ttk,
                    'no_sikttk' => $no_sikttk,
                    'masa_sikttk' => $masa_sikttk,
                    'no_strttk' => $no_strttk,
                    'masa_strttk' => $masa_strttk, 
                    'no_telp' => $no_telp_ttk, 
                );    

                $hasil['status'] = $this->M_outlet_ttk->save($data3);    
                if($hasil['status']==true)
                {
                    $hasil1 ="Proses Tambah TTK berhasil";                   
                }
                else
                {
                    $hasil1 ="Proses Tambah TTK  gagal"; 
                }  
            }

            $hasil['status'] = $this->M_outlet_PJ->save($data1);  
            if($hasil['status']==true)
            {
                $hasil1 ="Proses Tambah penaggung jawab outlet berhasil";

                if ($_POST['nama_ttk']!="")
                { 
                    $data2['id_ttk'] = $data3['id_ttk'];
                }
                
                $hasil['status'] = $this->M_outlet->save($data2);   

                // var_dump($data2); 
                if($hasil['status']==true && $jenis_aksi=="add"){
                    $hasil2 ="Proses Tambah outlet berhasil";
                }
                else
                {
                    $hasil2 ="Proses Tambah outlet gagal"; 
                }
            }
            else
            {
                $hasil1 ="Proses Tambah penaggung jawab outlet gagal"; 
            }                    
        }   

        //proses update
        else{

            if ($_POST['nama_ttk']!="")
            { 
                $where = array('id_ttk' => $this->input->post('id_ttk'));
                $data3 = array(  
                    'id_ttk' => $this->input->post('id_ttk'),
                    'nik' => $nik_ttk,
                    'nama' => $nama_ttk,
                    'alamat' => $alamat_ttk,
                    'no_sikttk' => $no_sikttk,
                    'masa_sikttk' => $masa_sikttk,
                    'no_strttk' => $no_strttk,
                    'masa_strttk' => $masa_strttk, 
                    'no_telp' => $no_telp_ttk, 
                );    

                $hasil['status'] = $this->M_outlet_ttk->update($where, $data3);    
                if($hasil['status']==true)
                {
                    $hasil1 ="Proses Update TTK berhasil";                   
                }
                else
                {
                    $hasil1 ="Proses Update TTK  gagal"; 
                }  
            }

            // var_dump($data3);
            $where = array('id_penanggung_jawab' => $this->input->post('id_penanggung_jawab') );
            $hasil['status'] = $this->M_outlet_PJ->update($where, $data1);  
            if($hasil['status']==true)
            {
                $hasil1 ="Proses update penaggung jawab outlet berhasil";

                $hasil['status'] = $this->M_outlet->update($id_outlet, $data2);   

                if($hasil['status']==true && $jenis_aksi=="add"){
                    $hasil2 ="Proses update outlet berhasil";
                }
                else
                {
                    $hasil2 ="Proses update outlet gagal"; 
                }
            }
            else
            {
                $hasil1 ="Proses update penaggung jawab outlet gagal"; 
            }                   
        }  
       
        $hasil['jenis_aksi']=$jenis_aksi;     
        redirect('Outlet?return='.$hasil['status']);  
    }

    public function detail($id_outlet)
    {  
        $data['title'] = "Outlet";
        $data['url'] = "outlet/"; 
        $where = array('id_outlet' => $id_outlet );  
        $data['id_outlet']=$id_outlet;  

        if ($id_outlet==null)
        {
            $data['jenis_aksi']="add";
        }
        else
        {
            $data['jenis_aksi']="edit";
        }  

        //cek apakah id_outlet ada di database 
        $cek= $this->M_outlet->detail($where); 
        if ($cek->num_rows()>0)
        {  
            $outlet = $cek->row_array();

            $data['penanggung_jawab']= $this->M_outlet_PJ->detail( array('id_penanggung_jawab' => $outlet['id_penanggung_jawab'] ))->row_array();  

            $data['ttk']= $this->M_outlet_ttk->detail( array('id_ttk' => $outlet['id_ttk'] ))->row_array();  

            $data['outlet']= $outlet; 
            $data['id_kab_kota']= $outlet['id_kab_kota']; 
            $data['id_kec']= $outlet['id_kec']; 

            $data['kab_kota']= $this->db->get('kab_kota')->result_array(); 
            $this->load->view('outlet/form',$data); 
        }
        else
        {
            $pesan="<div class='alert alert-danger' role='alert'>
                            Outlet ".$id_outlet." Tidak terdaftar, silahkan pilih outlet lain
                                </div>";  

            $this->session->set_flashdata('pesan', $pesan);
            redirect('Outlet');
        }  
    }

     public function hapus($id)
    {
        $hasil = array();  
        $where = array('id_outlet' => $id );
        $data = array('deleted' => 1 );
 
        $hasil['status']=$this->M_outlet->hapus($where, $data);   
        if ($hasil['status']==true)
        {
            $hasil['pesan'] = "Proses hapus data Outlet berhasil";
        }
        else
        {
            $hasil['pesan'] = "Proses hapus data Outlet gagal";  
        }

        $data = array(
            'pesan' => $hasil['pesan'], 
            'return' => $hasil['status'], 
        );   
        echo json_encode($data); 
    }

    public function pegawai($id_outlet)
    {
        $data['title'] = "Pegawai ". $id_outlet;
        $data['url'] = "Pegawai/";
        $this->load->view('include/header'); 
        $this->load->view('pegawai/index',$data);
        $this->load->view('include/footer'); 
    }

    public function print($id_outlet=null)
    {
        if ($id_outlet==null)
        {
            $where = array('id_outlet' => $id_outlet );  
           
            //cek apakah id_outlet ada di database 
            $cek= $this->M_outlet->detail($where); 
            
            $outlet = $cek->row_array(); 
            $data['penanggung_jawab']= $this->M_outlet_PJ->detail( array('id_penanggung_jawab' => $outlet['id_penanggung_jawab'] ))->row_array();  
            $data['outlet']= $outlet;    

             $data['ttk']= $this->M_outlet_ttk->detail( array('id_ttk' => $outlet['id_ttk'] ))->row_array();  

            $this->load->view('outlet/print2',$data); 
        }
        else
        {
            $where = array('id_outlet' => $id_outlet );  
            $data['id_outlet']=$id_outlet;  
           
            //cek apakah id_outlet ada di database 
            $cek= $this->M_outlet->detail($where); 
            if ($cek->num_rows()>0)
            {  
                $outlet = $cek->row_array(); 
                $data['penanggung_jawab']= $this->M_outlet_PJ->detail( array('id_penanggung_jawab' => $outlet['id_penanggung_jawab'] ))->row_array();  
                $data['outlet']= $outlet;    

                 $data['ttk']= $this->M_outlet_ttk->detail( array('id_ttk' => $outlet['id_ttk'] ))->row_array();  

                $this->load->view('outlet/print2',$data); 
            }
            else
            {
                $pesan="<div class='alert alert-danger' role='alert'>
                                Outlet ".$id_outlet." Tidak terdaftar, silahkan pilih outlet lain
                                    </div>";  

                $this->session->set_flashdata('pesan', $pesan);
                redirect('Outlet');
            }  
        }
            
    }

    public function test()
    {    
        $this->load->view('outlet/contoh');
    }

}