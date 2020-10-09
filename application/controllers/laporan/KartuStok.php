<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KartuStok extends CI_Controller {

    public function __construct()
    {
        parent ::__construct();
        $this->load->library('pdf');

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
        $tanggal_mulai = $this->input->post('tanggal_mulai'); 
        $tanggal_sampai = $this->input->post('tanggal_sampai'); 
        $data1 = array(); 
        $data2 = array(); 
         
        $data['laporan'] = $this->db->query("SELECT no_faktur, jenis_faktur, uraian, no_batch, tgl_exp, keluar, masuk, sisa, CAST(tanggal AS DATETIME) AS tanggal FROM kartu_stok WHERE barcode='".$barcode."' and tanggal BETWEEN '".$tanggal_mulai." 00:00:01' and '".$tanggal_sampai." 23:59:59' order by tanggal ASC")->result_array();

        if (sizeof($data['laporan'])>0)
        {
            $this->load->view('kartuStok/data',$data);
        }
        else{

            $this->session->set_flashdata('pesan','<h6>Tidak ada Riwayat Stok</h6>');
            $this->load->view('kartuStok/alert',$data); 
        } 
 
            
    }


    public function print_kartu_stok_kosong($barcode)
    { 
        $data['laporan'] = $this->db->query("SELECT no_reg FROM detail_obat WHERE barcode='".$barcode."' group by no_reg")->result_array();

        if (sizeof($data['laporan'])>0)
        {
            $this->printStokOpname($barcode);
        }
        else{

            $this->session->set_flashdata('pesan','<h6>Tidak ada Riwayat Stok</h6>');
            $this->load->view('kartuStok/alert',$data); 
        }    
    }

    public function printStokOpname($barcode)
    {  

        $data['data'] = $this->db->query("
        SELECT obat.nama, obat.barcode, obat.kd_satuan, detail_obat.no_reg, obat.kd_industri, satuan.nm_satuan, industri.nama as nm_industri FROM detail_obat 
        LEFT JOIN obat on detail_obat.barcode = obat.barcode 
        LEFT JOIN satuan on obat.kd_satuan=satuan.kd_satuan
        LEFT JOIN industri on obat.kd_industri=industri.kd_industri
        WHERE detail_obat.barcode='".$barcode."' group by no_reg  
        ")->result_array();

         foreach ($data['data'] as $key )
         {
            $pdf = new FPDF('P','mm','A4');
            $pdf->SetMargins(5, 5);
            // membuat halaman baru
            $pdf->AddPage();
            // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial','B',14);
            // mencetak string 
            $pdf->Cell(200,7,'PT. NUSA RAYA MEDIKA',0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(200,7,'Kartu Stok ',0,1,'C');

            $pdf->SetFont('Arial','B',11); 
            $pdf->Cell(100,6,'Barcode'.": ".$key['barcode'],0,0); 
            $pdf->Cell(10,6,'Pabrik'.": ".$key['nm_industri'],0,1);    
            $pdf->Cell(100,6,'Nama'.": ".$key['nama'],0,0);    
            $pdf->Cell(10,6,'No. Reg'.": ".$key['no_reg'],0,1);    
            $pdf->Cell(100,6,'Satuan'.": ".$key['nm_satuan'],0,0);    
            $pdf->Cell(10,6,'Stok Minimal'.": 1",0,1);    
           /* $pdf->Cell(200,7,'Nama : '.$key['nama'],1,0);
            $pdf->Cell(200,7,'Satua : '.$key['kd_satuan'],1,0);
            $pdf->Cell(200,7,'No. Reg : '.$key['no_reg'],1,0);
            $pdf->Cell(200,7,'Suplier : '.$key['kd_industri'],1,0);
            $pdf->Cell(200,7,'1',1,0);*/

            // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->Cell(10,7,'',0,1);

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(12,6,'TGL',1,0); 
            $pdf->Cell(30,6,'No. Invoice',1,0); 
            $pdf->Cell(50,6,'Uraian',1,0); 
            $pdf->Cell(30,6,'No Batch',1,0); 
            $pdf->Cell(15,6,'EXP',1,0);  
            $pdf->Cell(15,6,'Masuk',1,0);  
            $pdf->Cell(15,6,'Keluar',1,0);   
            $pdf->Cell(15,6,'Sisa',1,0);  
            $pdf->Cell(15,6,'Paraf',1,1); 

            $pdf->SetFont('Arial','',10);  
            
            $no=1;
            for ($i=0; $i < 36; $i++) { 
                $pdf->Cell(12,6,"",1,0); 
                $pdf->Cell(30,6,"",1,0); 
                $pdf->Cell(50,6,"",1,0); 
                $pdf->Cell(30,6,"",1,0); 
                $pdf->Cell(15,6,"",1,0);  
                $pdf->Cell(15,6,"",1,0);  
                $pdf->Cell(15,6,"",1,0);  
                $pdf->Cell(15,6,"",1,0);  
                $pdf->Cell(15,6,'  ',1,1);
            }
            
         } 
            
         
        $pdf->Output(); 
    }
    
    
}