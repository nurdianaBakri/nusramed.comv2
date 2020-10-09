<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LabelNamaGudang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('pdf');

        $cek = $this->M_login->cek_userIsLogedIn();
        // var_dump($cek);
        if ($cek == FALSE) {
            $this->session->set_flashdata('pesan', "Anda harus login jika ingin mengakses halaman lain");
            redirect('Home');
        }
    }

    public function index() {
        $data['title'] = "Label Nama";
        $data['url'] = "data/LabelNamaGudang/";
        $data['SubFitur'] = null;

        $data['breadcrumb'] = array(
            array(
                'fitur' => "Home",
                'link' => base_url(),
                'status' => "",
            ),
            array(
                'fitur' => "Label Nama",
                'link' => base_url() . "data/LabelNamaGudang",
                'status' => "active",
            ),
        );

        $cal = $this->db->query("SELECT obat.id_obat AS id_obat, concat( detail_obat.barcode, '-', obat.nama ) AS nama_obat FROM detail_obat LEFT JOIN obat ON detail_obat.barcode = obat.barcode GROUP BY id_obat");

        $data['obat'] = $cal->result_array();
        $this->load->view('include2/sidebar', $data);
        $this->load->view('LabelNama/index', $data);
        $this->load->view('include2/footer');
    }

    public function get_laporan() {
        $id_obat = $this->input->post('id_obat');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_sampai = $this->input->post('tanggal_sampai');

        
		ob_start();
	
		$data['load'] = $this->db->query("SELECT
			obat.id_obat AS id_obat,
			detail_obat.barcode AS barcode,
			concat( detail_obat.barcode, '-', obat.nama ) AS nama_obat,
			obat.nama AS nama,
			detail_obat.no_reg AS no_reg,
			detail_obat.no_batch AS no_batch,
			detail_obat.time AS time,
			CAST(detail_obat.tgl_exp AS DATE) AS DATE_PURCHASED,
			detail_obat.tgl_exp AS tgl_exp,
			detail_obat.no_faktur AS no_faktur,
			detail_obat.tgl_faktur AS tgl_faktur
			FROM
			detail_obat
			LEFT JOIN obat ON ( detail_obat.barcode = obat.barcode ) WHERE id_obat=$id_obat ")->result();
			
		$this->load->view('print', $data);
		$html = ob_get_contents();
			ob_end_clean();
			
		require './assets/html2pdf/autoload.php';
		
		$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
		$pdf->WriteHTML($html);
		$pdf->Output("2323.pdf", "D");
		
        /* $data['laporan'] = $this->db->query("SELECT * FROM v_label_obat WHERE id_obat=$id_obat and time BETWEEN '".$tanggal_mulai." 00:00:01' and '".$tanggal_sampai." 23:59:59' order by time ASC");*/

        // if ($data['laporan']->num_rows() > 0) {
            // $data['laporan'] = $data['laporan']->result_array();
            // $this->load->view('LabelNama/data', $data);
        // } else {
            // $this->session->set_flashdata('pesan', '<h6>Tidak ada riwayat pembelian obat ini</h6>');
            // $this->load->view('LabelNama/alert', $data);
        // }
    }

    public function printStokOpname($id_obat) {

        $data['data'] = $this->db->query("SELECT
        obat.id_obat AS id_obat,
        detail_obat.barcode AS barcode,
        concat( detail_obat.barcode, '-', obat.nama ) AS nama_obat,
        obat.nama AS nama,
        detail_obat.no_reg AS no_reg,
        detail_obat.no_batch AS no_batch,
        detail_obat.time AS time,
        detail_obat.tgl_exp AS tgl_exp,
        detail_obat.no_faktur AS no_faktur,
        detail_obat.tgl_faktur AS tgl_faktur
        FROM
        detail_obat
        LEFT JOIN obat ON ( detail_obat.barcode = obat.barcode ) WHERE id_obat=$id_obat ")->result_array();

        $pdf = new FPDF('P', 'mm', 'A4');
        // $pdf = new FPDF('L', 'mm', array(40, 60));

        $pdf->SetMargins(5, 5, 0);
        $pdf->SetAutoPageBreak(false);
        // membuat halaman baru
        $pdf->AddPage();

        foreach ($data['data'] as $key) {

            $pdf->SetFont('Arial', 'B', 5);
            $pdf->Cell(10, 6, 'Tgl Input', 1, 0);

            $pdf->SetFont('Arial', 'B', 7);
            $pdf->Cell(44, 6, $key['time'], 1, 1);

            $pdf->SetFont('Arial', 'B', 5);
            $pdf->Cell(10, 6, 'Barcode', 1, 0);

            $pdf->SetFont('Arial', 'B', 7);
            $pdf->Cell(44, 6, $key['barcode'], 1, 1);

            $pdf->SetFont('Arial', 'B', 5);
            $pdf->Cell(10, 6, 'Nama', 1, 0);
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->Cell(44, 6, $key['nama'], 1, 1);

            $pdf->SetFont('Arial', 'B', 5);
            $pdf->Cell(10, 6, 'No. Batch', 1, 0);

            $pdf->SetFont('Arial', 'B', 7);
            $pdf->Cell(44, 6, $key['no_batch'], 1, 1);

            $pdf->SetFont('Arial', 'B', 5);
            $pdf->Cell(10, 6, 'Tgl. exp', 1, 0);

            $pdf->SetFont('Arial', 'B', 7);
            $pdf->Cell(44, 6, $key['tgl_exp'], 1, 1);

            $pdf->SetFont('Arial', 'B', 5);
            $pdf->Cell(10, 6, 'No. Faktur', 1, 0);

            $pdf->SetFont('Arial', 'B', 7);

            $pdf->Cell(44, 6, $key['no_faktur'], 1, 1);

            $pdf->Ln();
        }

        $pdf->Output();
    }
	
	public function cetak($id_obat){
		
		// $id_obat = $this->input->post('id_obat');
        // $tanggal_mulai = $this->input->post('tanggal_mulai');
        // $tanggal_sampai = $this->input->post('tanggal_sampai');
		
		ob_start();
	
		$data['load'] = $this->db->query("SELECT
			obat.id_obat AS id_obat,
			detail_obat.barcode AS barcode,
			concat( detail_obat.barcode, '-', obat.nama ) AS nama_obat,
			obat.nama AS nama,
			detail_obat.no_reg AS no_reg,
			detail_obat.no_batch AS no_batch,
			detail_obat.time AS time,
			CAST(detail_obat.tgl_exp AS DATE) AS DATE_PURCHASED,
			detail_obat.tgl_exp AS tgl_exp,
			detail_obat.no_faktur AS no_faktur,
			detail_obat.tgl_faktur AS tgl_faktur
			FROM
			detail_obat
			LEFT JOIN obat ON ( detail_obat.barcode = obat.barcode ) WHERE id_obat=$id_obat ")->result();
			
		$this->load->view('print', $data);
		$html = ob_get_contents();
			ob_end_clean();
			
		require './assets/html2pdf/autoload.php';
		
		$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
		$pdf->WriteHTML($html);
		$pdf->Output('Label nama obat.pdf', 'D');
	  }

    public function printStokOpname_backup($id_obat) {

        $data['data'] = $this->db->query("
        SELECT obat.nama, obat.barcode, obat.kd_satuan, detail_obat.no_reg, obat.kd_industri, satuan.nm_satuan, industri.nama as nm_industri FROM detail_obat
        LEFT JOIN obat on detail_obat.barcode = obat.barcode
        LEFT JOIN satuan on obat.kd_satuan=satuan.kd_satuan
        LEFT JOIN industri on obat.kd_industri=industri.kd_industri
        WHERE detail_obat.id_obat='" . $id_obat . "' group by no_reg
        ")->result_array();

        foreach ($data['data'] as $key) {
            $pdf = new FPDF('P', 'mm', 'A4');
            $pdf->SetMargins(5, 5);
            // membuat halaman baru
            $pdf->AddPage();
            // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial', 'B', 14);
            // mencetak string
            $pdf->Cell(200, 7, 'PT. NUSA RAYA MEDIKA', 0, 1, 'C');
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(200, 7, 'Label Nama ', 0, 1, 'C');

            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(100, 6, 'Barcode' . ": " . $key['barcode'], 0, 0);
            $pdf->Cell(10, 6, 'Pabrik' . ": " . $key['nm_industri'], 0, 1);
            $pdf->Cell(100, 6, 'Nama' . ": " . $key['nama'], 0, 0);
            $pdf->Cell(10, 6, 'No. Reg' . ": " . $key['no_reg'], 0, 1);
            $pdf->Cell(100, 6, 'Satuan' . ": " . $key['nm_satuan'], 0, 0);
            $pdf->Cell(10, 6, 'Stok Minimal' . ": 1", 0, 1);
            /* $pdf->Cell(200,7,'Nama : '.$key['nama'],1,0);
            $pdf->Cell(200,7,'Satua : '.$key['kd_satuan'],1,0);
            $pdf->Cell(200,7,'No. Reg : '.$key['no_reg'],1,0);
            $pdf->Cell(200,7,'Suplier : '.$key['kd_industri'],1,0);
            $pdf->Cell(200,7,'1',1,0);*/

            // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->Cell(10, 7, '', 0, 1);

            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(12, 6, 'TGL', 1, 0);
            $pdf->Cell(30, 6, 'No. Invoice', 1, 0);
            $pdf->Cell(50, 6, 'Uraian', 1, 0);
            $pdf->Cell(30, 6, 'No Batch', 1, 0);
            $pdf->Cell(15, 6, 'EXP', 1, 0);
            $pdf->Cell(15, 6, 'Masuk', 1, 0);
            $pdf->Cell(15, 6, 'Keluar', 1, 0);
            $pdf->Cell(15, 6, 'Sisa', 1, 0);
            $pdf->Cell(15, 6, 'Paraf', 1, 1);

            $pdf->SetFont('Arial', '', 10);

            $no = 1;
            for ($i = 0; $i < 36; $i++) {
                $pdf->Cell(12, 6, "", 1, 0);
                $pdf->Cell(30, 6, "", 1, 0);
                $pdf->Cell(50, 6, "", 1, 0);
                $pdf->Cell(30, 6, "", 1, 0);
                $pdf->Cell(15, 6, "", 1, 0);
                $pdf->Cell(15, 6, "", 1, 0);
                $pdf->Cell(15, 6, "", 1, 0);
                $pdf->Cell(15, 6, "", 1, 0);
                $pdf->Cell(15, 6, '  ', 1, 1);
            }

        }

        $pdf->Output();
    }

}