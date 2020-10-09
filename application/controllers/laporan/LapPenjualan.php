<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LapPenjualan extends CI_Controller {

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
        $data['title'] = "Laporan Penjualan";
        $data['url'] = "laporan/LapPenjualan/"; 
        $data['SubFitur'] =null; 

        $data['breadcrumb'] = array(
            array(
                'fitur' => "Home", 
                'link' => base_url(), 
                'status' => "", 
            ),
            array(
             'fitur' => "Laporan Penjualan", 
             'link' => base_url()."laporan/LapPenjualan", 
             'status' => "active", 
            ), 
        );
        
        $this->db->select('id_outlet, nama');
        $data['outlet'] = $this->db->get('outlet1')->result_array(); 

        $this->load->view('include2/sidebar',$data); 
        $this->load->view('lapPenjualan/index',$data);
        $this->load->view('include2/footer');  
    }

    public function chart_lap_frek($kd_outlet, $tanggal_mulai, $tanggal_sampai)
      {
          # code...
      }  
    
    public function get_laporan()
    {
        $jenis_laporan = $this->input->post('jenis_laporan');
        $kd_outlet = $this->input->post('id_outlet');
        $tanggal_mulai = $this->input->post('tanggal_mulai')." 00:00:00";
        $tanggal_sampai = $this->input->post('tanggal_sampai')." 23:59:59";
        $data = array();
        $laporan1="";
        $laporan2="";

        // echo $this->db->last_query(); 
        if ($jenis_laporan==1 || $jenis_laporan=="1")
        {
             $data['pecentPerWil'] = $this->M_trxPenjualan->get_jumlah_outlet_per_kab_kota($tanggal_mulai, $tanggal_sampai);

            $data['judul'] = $this->input->post('tanggal_mulai')." sampai ".  $this->input->post('tanggal_sampai');
            if ($kd_outlet=="all")
            {  
                $check = $this->db->query("SELECT COUNT( DISTINCT(no_faktur)) as jumlah, outlet1.id_outlet, outlet1.nama from trx_penjualan_tmp, outlet1 WHERE outlet1.id_outlet=trx_penjualan_tmp.kd_outlet and `time` between '$tanggal_mulai' and '$tanggal_sampai' GROUP BY kd_outlet ORDER BY jumlah DESC");
                if ($check->num_rows()<=0)
                {
                    $data['ada']=false;
                }
                else
                {
                    $data['ada']=true; 
                    $laporan1 =$check->result_array(); 
                }   

                $laporan2 = $this->db->query("SELECT id_outlet, nama, alamat='0' as jumlah FROM outlet1 WHERE outlet1.id_outlet not in( SELECT DISTINCT(kd_outlet) as kd_outlet FROM trx_penjualan_tmp WHERE  `time` between '".$tanggal_mulai."' and '".$tanggal_sampai."')")->result_array(); 

                if ($laporan1=="")
                { 
                    $data['laporan']= $laporan2;
                    $data['sizeRed']=0;
                    $data['hijau']=0;
                    $data['kuning']=0;
                } 
                else if ($laporan1!="")
                {
                   $data['laporan'] = array_merge($laporan1, $laporan2);
                    $data['sizeRed'] = sizeof($laporan2);
                }
                else
                {
                    $data['sizeRed']=0;
                }
            }
            else
            {   
                $check= $this->db->query("SELECT COUNT(DISTINCT(no_faktur)) as jumlah, outlet1.id_outlet, outlet1.nama from trx_penjualan_tmp, outlet1 WHERE kd_outlet='".$kd_outlet."' and outlet1.id_outlet=trx_penjualan_tmp.kd_outlet and `time` between '$tanggal_mulai' and '$tanggal_sampai' order by jumlah DESC");

                if ($check->num_rows()<=0)
                {
                    $data['ada']=false;
                }
                else
                {
                    $data['ada']=true; 
                    $data['laporan'][] = $check->row_array(); 
                }

                $data['sizeRed']=0;
                $data['hijau']=0;
                $data['kuning']=0; 
            }

            $data['kd_outlet'] = $kd_outlet;
            $data['tanggal_mulai'] = $tanggal_mulai;
            $data['tanggal_sampai'] = $tanggal_sampai;


            $this->load->view('lapPenjualan/lap_frekuensi_order',$data);  
            // print_r($data);
            // echo "bangsat 22";
        }
        else if ($jenis_laporan==3 ||  $jenis_laporan=="3" )
        { 
            // echo "haha, bangsat";

            if ($kd_outlet=="all")
            {
                $data['laporan'] = $this->db->query("SELECT  B.nama, A.* from trx_penjualan_tmp A, outlet1 B WHERE B.id_outlet=A.kd_outlet and `time` between '$tanggal_mulai' and '$tanggal_sampai' order by `time` asc");
            }
            else
            {
                $data['laporan'] = $this->db->query("SELECT  B.nama, A.* from trx_penjualan_tmp A, outlet1 B WHERE B.id_outlet=A.kd_outlet and kd_outlet='$kd_outlet' and (`time` >= '$tanggal_mulai' and `time` <= '$tanggal_sampai') order by `time` asc");
            }

            $this->load->view('lapPenjualan/data',$data);
        }
        else
        {
            echo "sendang di buat";
        }
    } 

    public function get_jumlah_outlet_per_kab_kota()
    {
        $data = $this->M_trxPenjualan->get_jumlah_outlet_per_kab_kota('2019-05-23 00:00:00', '2020-05-23 00:00:00');
        var_dump($data);
    }

}