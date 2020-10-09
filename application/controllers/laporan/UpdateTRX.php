<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateTRX extends CI_Controller {

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
        $data['title'] = "updateTrx";
        $data['url'] = "laporan/updateTrx/";
        $data['SubFitur'] = null;

        $data['breadcrumb'] = array(
            array(
                'fitur' => "Home",
                'link' => base_url(),
                'status' => "",
            ),
            array(
                'fitur' => "Kartu Stok",
                'link' => base_url() . "laporan/updateTrx",
                'status' => "active",
            ),
        );

        $data['obat'] = $this->M_obat->getAll();

        $this->load->view('include2/sidebar', $data);
        $this->load->view('updateTrx/index', $data);
        $this->load->view('include2/footer');
    }

    public function get_laporan() {
        $barcode = $this->input->post('barcode');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_sampai = $this->input->post('tanggal_sampai');
        $data1 = array();
        $data2 = array();

        $data['laporan'] = $this->db->query("SELECT no_faktur, jenis_faktur, uraian, no_batch, tgl_exp, keluar, masuk, sisa, CAST(tanggal AS DATETIME) AS tanggal FROM kartu_stok WHERE barcode='" . $barcode . "' and tanggal BETWEEN '" . $tanggal_mulai . " 00:00:01' and '" . $tanggal_sampai . " 23:59:59' order by tanggal ASC")->result_array();

        if (sizeof($data['laporan']) > 0) {
            $this->load->view('updateTrx/data', $data);
        } else {

            $this->session->set_flashdata('pesan', '<h6>Tidak ada Riwayat Stok</h6>');
            $this->load->view('updateTrx/alert', $data);
        }
    }

}