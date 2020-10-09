<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Update_pembelian extends CI_Controller
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
        $data['title'] = "update penjualan";
        $data['url'] = base_url()."/transaksi/Update_pembelian/";
        $data['SubFitur'] =null;

        $data['breadcrumb'] = array(
            array(
                'fitur' => "Home",
                'link' => base_url(),
                'status' => "",
            ),
            array(
             'fitur' => "update penjualan",
             'link' => base_url()."/transaksi/Update_pembelian/",
             'status' => "active",
            ),
        );

        // $data['metode_pembayaran'] = $this->M_metode_pembayaran->getAll(); 
        $data['list_faktur'] = $this->M_update_penjualan->getAll();
  
        $this->load->view('include2/sidebar', $data);
        $this->load->view('update_pembelian_lagi/index', $data);
        $this->load->view('include2/footer');
    }

    public function get_list_faktur()
    {
        $data['list_faktur'] = $this->M_update_penjualan->getAll();
        $this->load->view('update_pembelian_lagi/list_faktur', $data);
    }
 

   /* public function get_trx_tmp_backup()
    {
        $id_master_detail = $this->input->post('id_master_detail');

        foreach ($this->cart->contents() as $key) {
            if(isset($key['jenis_cart'])){
            if ($key['jenis_cart']=="verifikasi") {
                $this->cart->remove($key['rowid']);
            }}
        } 
        
        $data=$this->db->query("SELECT id_obat, label, id_detail_obat, id_master_detail, stok_awal, qty_verified, harga_beli, tgl_exp, no_batch, diskon_beli, no_reg, nm_satuan, sisa_stok, barcode FROM kalkulasi_item_pembelian WHERE id_master_detail=$id_master_detail")->result_array();

        // var_dump($this->db->last_query());
        if (sizeof($data)>0) {
            // $this->cart->destroy(); 

            foreach ($data as $key) { 
                $key['tgl_exp'] = strtotime($key['tgl_exp']);
                $tgl_exp =  date('Y-m-d', $key['tgl_exp']);  

                $this->cart->product_name_rules = '[:print:]';
                $data2 = array(
                    'id' => $key['no_batch'],
                    'name' => $key['label'],
                    'label' => $key['label'],
                    'satuan' => $key['nm_satuan'],
                    'price' => $key['harga_beli'],
                    'barcode' => $key['barcode'],
                    'id_obat' => $key['id_obat'],
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
    }*/

     function load_data()
     {
         $this->db->order_by('id', 'DESC');
          $query = $this->db->get('sample_data');
          $data=  $query->result_array();
          echo json_encode($data);
     }

 function insert()
 {
  $data = array(
   'first_name' => $this->input->post('first_name'),
   'last_name'  => $this->input->post('last_name'),
   'age'   => $this->input->post('age')
  );

  $this->db->insert('sample_data', $data);
 }

 function update()
 {
    $data = array();
    $data = array(
       $this->input->post('table_column') => $this->input->post('value')
    );
    
          
    $this->db->where('id_trx', $this->input->post('id'));
    echo $this->db->update('trx_penjualan_tmp', $data);

    // var_dump($this->db->last_query()); 
 }

 function delete()
 {
  $this->db->where('id_detail_obat', $this->input->post('id'));
  $this->db->delete('detail_obat');
 }

    public function get_trx_tmp()
    {
        $barcode = $this->input->post('barcode');
        $data=$this->db->query("SELECT * FROM form_update_pembelian WHERE barcode ='".$barcode."'")->result_array();
        // var_dump($this->db->last_query());
        if (sizeof($data)>0) {
          echo json_encode($data);
        } else {
            echo "Tidak ada transaksi dengan barcode '$barcode'";
        }
    }

    /*public function get_detail_trx($id_master_detail=null)
    {  
        $data=$this->M_update_penjualan->detail_trx_po2($id_master_detail)->row_array(); 
        // var_dump($this->db->last_query());

        if (sizeof($data)>0) {
            ///get nama metode pembayaran  
            echo json_encode($data);
        } else {
            echo "Tidak ada transaksi dengan nomor faktur '$id_master_detail'";
        }
    } */
  
    
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
        $id_master_detail = $this->input->post('id_master_detail');
        $user_verified = $this->session->userdata('username');
        $tgl_verified = date('Y-m-d H:m:s'); 

        $return = $this->db->query("UPDATE detail_obat set qty_verified = stok_awal, user_verified='$user_verified', tgl_verified='$tgl_verified'  WHERE id_master_detail =".$id_master_detail);

          if ($return>0) {
                $return=1;
                $pesan= "Proses update penjualan berhasil ";
            } else {
                $return=0;
                $pesan= "Proses update penjualan gagal ";
            }

        $data = array(
            'return' => $return,
            'pesan' => $pesan
        );
        // var_dump($data);
        echo  json_encode($data);
    } 

     public function verifikasiTransaksi_backup()
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
                    $ket_log="Proses update penjualan obat ".$name[$key]." (No Batch : ".$no_batch[$key].", No Reg : ".$no_reg[$key].") gagal .";

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
                        $ket_log="Proses update penjualan obat ".$name[$key]." (No Batch : ".$no_batch[$key].", No Reg : ".$no_reg[$key].") berhasil .";

                        $this->M_log->tambah($this->session->userdata['id'], $ket_log);
                    }
                    else{
                        $ket_log="Proses update penjualan obat ".$name[$key]." (No Batch : ".$no_batch[$key].", No Reg : ".$no_reg[$key].") gagal .";

                        $this->M_log->tambah($this->session->userdata['id'], $ket_log);
                    }
                }   
            } 

            if ($return>0) {
                $return=1;
                $pesan= "Proses update penjualan berhasil ";
            } else {
                $return=0;
                $pesan= "Proses update penjualan gagal ";
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
