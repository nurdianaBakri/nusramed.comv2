<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VerivikasiPembelian extends CI_Controller
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
        // foreach ($this->cart->contents() as $key) {
        //     if(isset($key['jenis_cart'])){
        //     if ($key['jenis_cart']=="verifikasi") {
        //         $this->cart->remove($key['rowid']);
        //     }}
        // }
        $data['title'] = "Verifikasi Pembelian";
        $data['url'] = "transaksi/VerivikasiPembelian/";
        $data['SubFitur'] =null;

        $data['breadcrumb'] = array(
            array(
                'fitur' => "Home",
                'link' => base_url(),
                'status' => "",
            ),
            array(
             'fitur' => "Verifikasi Pembelian",
             'link' => base_url()."transaksi/VerivikasiPembelian",
             'status' => "active",
            ),
        );

        $data['metode_pembayaran'] = $this->M_metode_pembayaran->getAll(); 
        $data['list_faktur'] = $this->M_trxVerifikasiPembelian->getAll();
  
        $this->load->view('include2/sidebar', $data);
        $this->load->view('transaksiVerifikasi/index', $data);
        $this->load->view('include2/footer');
    }

    public function get_list_faktur()
    {
        $data['list_faktur'] = $this->M_trxVerifikasiPembelian->getAll();
        $this->load->view('transaksiVerifikasi/list_faktur', $data);
    }

    public function get_kandungan()
    {
        $barcode = $this->input->post('barcode');
        $this->db->select('kandungan, nama');
        $this->db->where('barcode', $barcode);
        $data= $this->db->get('obat')->row_array();
        echo json_encode($data);
    } 

    public function get_trx_tmp()
    {
        $no_faktur = $this->input->post('no_faktur');

        foreach ($this->cart->contents() as $key) {
            if(isset($key['jenis_cart'])){
            if ($key['jenis_cart']=="verifikasi") {
                $this->cart->remove($key['rowid']);
            }}
        }
            
         
        $data=$this->db->query("SELECT A.id_detail_obat, A.sisa_stok, A.ppn, A.tgl_exp, A.no_faktur, B.kd_satuan, A.barcode, A.no_reg, A.lokasi, A.harga_beli, A.diskon_beli, A.stok_awal, A.no_batch, B.nama FROM detail_obat A INNER JOIN obat B WHERE A.barcode = B.barcode AND A.no_faktur='$no_faktur' and A.deleted=0 and user_verified=''")->result_array();

        // var_dump($this->db->last_query());
        if (sizeof($data)>0) {
            // $this->cart->destroy(); 

            foreach ($data as $key) { 
                $key['tgl_exp'] = strtotime($key['tgl_exp']);
                $tgl_exp =  date('Y-m-d', $key['tgl_exp']); 
              
                $this->db->where('kd_satuan', $key['kd_satuan']);
                $nm_satuan = $this->db->get('satuan')->row_array()['nm_satuan'];  

                $this->cart->product_name_rules = '[:print:]';
                $data2 = array(
                    'id' => $key['no_batch'],
                    'name' => $key['nama'],
                    'satuan' => $nm_satuan,
                    'price' => $key['harga_beli'],
                    'barcode' => $key['barcode'],
                    'no_reg' => $key['no_reg'],
                    'tgl_exp' => $tgl_exp, 
                    'diskon' => $key['diskon_beli'],
                    'stok_awal' => $key['sisa_stok'],
                    'qty' => $key['stok_awal'],
                    'qty_tdk_baik' => 0,
                    'qty_verified' => $key['stok_awal'],
                    'jenis_cart'=>'verifikasi',
                    "options"=>array('jenis'=>"verifikasi"),
                    'id_detail_obat'=>$key['id_detail_obat']
                );
                $this->cart->insert($data2);
            }
            echo $this->show_cart();
        } else {
            echo "Tidak ada transaksi dengan nomor faktur '$no_faktur'";
        }
    }

    public function get_detail_trx($no_faktur=null)
    { 
        $where = array(
            'no_faktur' => $no_faktur,
            'user_verified' => "",
        );
        $data=$this->M_trxVerifikasiPembelian->detail_trx_po($where)->row_array(); 

        if (sizeof($data)>0) {
            ///get nama metode pembayaran
            $this->db->where('kd_pembayaran', $data['kode_pembayaran']);
            $data2['nama_metode_pembayaran']=$this->db->get('metode_pembayaran')->row_array()['nama_metode_pembayaran'];

            $data2['kode_pembayaran'] = $data['kode_pembayaran'];
            $data2['id_user'] = $data['id_user'];
            $data2['tgl_jatuh_tempo'] = $data['tgl_jatuh_tempo'];
            $data2['tgl_input'] = $data['time'];
            echo json_encode($data2);
        } else {
            echo "Tidak ada transaksi dengan nomor faktur '$no_faktur'";
        }
    } 

    public function show_cart()
    {
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            if(isset($items['jenis_cart'])){
            if ($items['jenis_cart']=='verifikasi') {
                $no++;
                $output .='
                    <tr>
                        <td>'.$no.'</td>    

                       <td><input type="hidden" class="form-control" name="barcode[]" value="'.$items['barcode'].'" >
                       <input type="hidden" class="form-control" name="name[]" value="'.$items['name'].'" >'.$items['barcode'].'<br>'.$items['name'].'</td>

                        <td>'.$items['satuan'].'</td>

                        <td><input type="text" class="form-control no_batch" name="no_batch[]" value="'.$items['id'].'" ></td>
    
                         <td><input type="text" class="form-control no_reg" name="no_reg[]" value="'.$items['no_reg'].'" ></td>
    
                        <td><input type="date" class="form-control tgl_exp" name="tgl_exp[]" value="'.$items['tgl_exp'].'" ></td>
    
                       <td><input type="text" placeholder="1.0" step="0.01" min="1" max="10000000" class="form-control harga" name="harga[]" value="'.$items['price'].'" ></td>
    
                        <td><input type="text" placeholder="1.0" step="0.01" min="0" max="10" class="form-control diskon" name="diskon[]" min="0" value="'.$items['diskon'].'" ></td> 
    
                        <td>'.'<input type="number" class="form-control qty" name="qty[]" value="'.$items['qty'].'" ></td>
    
                        <td>'.'<input type="number" class="form-control qty_verified" name="qty_verified[]" value="'.$items['qty_verified'].'" ></td>

                        <td>'.'<input type="number" class="form-control qty_tdk_baik" name="qty_tdk_baik[]" value="'.$items['qty_tdk_baik'].'" ></td>
    
                        <td><span class="money subtotal">'.number_format($items['subtotal']-($items['subtotal']*($items['diskon']/100)), 2).'</span>
     
                        <input type="hidden" class="form-control id_detail_obat" name="id_detail_obat[]" value="'.$items['id_detail_obat'].'" > 
                    </tr>
                ';
            }
        }
        }
        return $output;
    }

    public function load_cart()
    { //load data cart
        echo $this->show_cart();
    } 
    
    public function reload_data()
    {
        $data_balikan['data']= array();
        $data['data']= $this->M_trxPenjualan->getAll();
        $this->load->view('trxPenjualan/data', $data);
    }

      public function get_effectiveDate()
    {
        $effectiveDate = date('Y-m-d');  
        $effectiveDate = date('Y-m-d', strtotime("+8 months", strtotime($effectiveDate))); 
        return $effectiveDate;
    }

    public function verifikasiTransaksi()
    {
        $pesan="";
        $return="";
        $pesan_detail="";
        $effectiveDate = $this->get_effectiveDate();  
        $data = array();
        $validation_errors=array();

        if (isset($_POST['barcode'])) {
            $qty_verified = $this->input->post('qty_verified');
            $qty_tidak_baik = $this->input->post('qty_tdk_baik');
            $qty = $this->input->post('qty');
            $no_batch = $this->input->post('no_batch'); 
            $harga = $this->input->post('harga'); 

            $id_detail_obat = $this->input->post('id_detail_obat');
            $no_reg = $this->input->post('no_reg'); 
            $tgl_exp = $this->input->post('tgl_exp'); 
            $diskon = $this->input->post('diskon'); 
            $barcode = $this->input->post('barcode'); 
            $name = $this->input->post('name');   
         

            foreach ($qty_verified as $key =>$value) {  

                $this->form_validation->set_rules("no_batch[".$key."]", "Nomor batch <b>".$barcode[$key]." - ".$name[$key]."</b>", "trim|required");

                $this->form_validation->set_rules("harga[".$key."]", "Harga <b>".$barcode[$key]." - ".$name[$key]."</b>", "trim|required");

                $this->form_validation->set_rules("qty_verified[".$key."]", "Quality verifikasi <b>".$barcode[$key]." - ".$name[$key]."</b>", "trim|required");  

                $this->form_validation->set_rules("qty[".$key."]", "Quality <b>".$barcode[$key]." - ".$name[$key]."</b>", "trim|required"); 

                // https://stackoverflow.com/questions/32383743/ci-form-validation-of-date-with-input-type-date   

                if ($this->form_validation->run() == FALSE) {
                    $validation_errors = validation_errors();
                    $ket_log="Proses verifikasi pembelian obat ".$name[$key]." (No Batch : ".$no_batch[$key].", No Reg : ".$no_reg[$key].") gagal .";

                    $this->M_log->tambah($this->session->userdata['id'], $ket_log);
                } 
                else { 
                     $data = array( 
                        'no_batch' => $no_batch[$key],
                        'no_reg' => $no_reg[$key],
                        'tgl_exp' => $tgl_exp[$key],
                        'harga_beli' => $harga[$key],
                        'diskon_beli' => $diskon[$key], 
                        'qty_verified' => $qty_verified[$key],
                        'qty_tidak_baik' => $qty_tidak_baik[$key],
                        'user_verified' => $this->session->userdata('username'),
                    ); 
                    $this->db->where('id_detail_obat', $id_detail_obat[$key]); 
                    $return=$this->db->update('detail_obat', $data);  
                    if ($return==true)
                    {
                        $ket_log="Proses verifikasi pembelian obat ".$name[$key]." (No Batch : ".$no_batch[$key].", No Reg : ".$no_reg[$key].") berhasil .";

                        $this->M_log->tambah($this->session->userdata['id'], $ket_log);
                    }
                    else{
                        $ket_log="Proses verifikasi pembelian obat ".$name[$key]." (No Batch : ".$no_batch[$key].", No Reg : ".$no_reg[$key].") gagal .";

                        $this->M_log->tambah($this->session->userdata['id'], $ket_log);
                    }
                }   
            } 

            if ($return>0) {
                $return=1;
                $pesan= "Proses Verifikasi pembelian berhasil ";
            } else {
                $return=0;
                $pesan= "Proses Verifikasi pembelian gagal ";
            }
        } else {
            $return=0;
            $pesan= "data obat tidak boleh boleh kosong, silahkan data obat ";
        }

        foreach ($this->cart->contents() as $key) {
            if(isset($key['jenis_cart'])){
            if ($key['jenis_cart']=="verifikasi") {
                $this->cart->remove($key['rowid']);
            }}
        } 

        // foreach ($validation_errors as $key) {
        //     $pesan_detail.=$key;
        // }

        $data = array(
            'return' => $return,
            'pesan' => $pesan,
            'pesan_detail' => $validation_errors,
        );
        // var_dump($data);
        echo  json_encode($data);
    } 
      
}
