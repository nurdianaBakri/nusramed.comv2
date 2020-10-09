<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

    private $filename = "import_data2"; // Kita tentukan nama filenya 
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
        $data['title'] = "Obat";
        $data['url'] = "obat/"; 
        $data['SubFitur'] =null; 

        $data['breadcrumb'] = array(
            array(
                'fitur' => "Home", 
                'link' => base_url(), 
                'status' => "", 
            ),
            array(
             'fitur' => "Obat", 
             'link' => base_url(), 
             'status' => "active", 
            ), 
        ); 

        //get all data obat 
        $obat = $this->M_obat->getAll();
        foreach ($obat as $key)
        {
           //check if ada di direcory 
           $if = file_exists("./assets/barcode/".$key['barcode'].".jpg");
           if ($if==false)
           {
                  //generate barcode,
                $this->M_obat->generate_barcode($key['barcode']); 
           } 
        }  

        $this->load->view('include2/sidebar',$data); 
        $this->load->view('obat/index',$data);
        $this->load->view('include2/footer');  
    } 

    public function get_form()
    {    
        $barcode =$this->M_obat->get_barcode(); 

        $data['jenis_aksi'] ="add"; 
        $data['data']['nama'] = null;
        $data['data']['deskripsi'] = null;
        $data['data']['id_obat'] = null;
        $data['data']['kd_industri'] = null;
        $data['data']['kd_suplier'] = null;
        $data['data']['kd_satuan'] = null;
        $data['data']['kd_kategori'] = null;
        $data['data']['kd_kategori_obat'] = null;
        $data['data']['stok'] = null;
        $data['data']['kandungan'] = null;
        $data['data']['produsen'] = null;  
        $data['data']['lokasi_rak'] = null;
        $data['data']['jenis_terapi'] = null; 
        // $data['data']['kemasan'] = null; 
        $data['id_obat'] = null;  
        $data['barcode'] = $barcode; 

        $data['industri'] = $this->Industri_model->getAll();   
        $data['suplier'] = $this->Suplier_model->getAll();   
        $data['kategori_obat'] = $this->Kategori_obat->getAll();   
        $data['kategori'] = $this->Kategori->getAll();   
        $data['satuan'] = $this->Satuan_obat->getAll();    

        $data['url_inquery']="obat/inquery"; 
        $this->load->view('obat/form',$data);
    } 

    function cari_nama_obat(){
        $keywoard = $this->input->post('keyword_nama_obat');

        $this->db->like('nama', $keywoard);
        $this->db->where('deleted',0);
        $this->db->order_by('date', 'DESC');
        $data['data']=$this->db->get("obat")->result_array(); 
        $data['pesan']="";
        $this->load->view('obat/data_hasil_search', $data);   
    }

    public function form_search()
    {       
        $this->load->view('obat/form_search');  
    }

    public function import_form()
    {
        $data['jenis_aksi'] ="add";  
        $this->load->view('obat/import_form',$data);   
    }

    public function form_gentBarObat()
    {
        $this->load->view('obat/form_gentBarObat');  
    }

     public function print($id_obat)
    {
        if ($id_obat==null)
        {
            $this->invalid_page();
        } 
        else
        {
            $where = array('id_obat' => $id_obat );
            $data['data']=$this->M_obat->getBy($where);  
            $this->load->view('obat/print_detail', $data);   
        }
           
    }

    public function serchbyname()
    {  
        $data['url'] = "obat/"; 

        $where = array( 
            'nama' => $this->input->post('nama'), 
        );    
        $data['data']=$this->M_obat->getBy($where);  

        if ($data['data']['id_obat']==null)
        {
            $barcode  =$this->M_obat->get_barcode();

            $data['jenis_aksi']="add";
            $data['data']['kategori']="";
            $data['data']['nama'] = $this->input->post('nama');
            $data['data']['deskripsi'] = null;
            $data['data']['id_obat'] = null;
            $data['data']['barcode'] = $barcode;
            $data['data']['kd_industri'] = null;
            $data['data']['kd_suplier'] = null;
            $data['data']['kd_satuan'] = null; 
            $data['data']['kd_kategori_obat'] = null;
            $data['data']['stok'] = null;
            $data['data']['kandungan'] = null;
            $data['data']['produsen'] = null;  
            $data['data']['lokasi_rak'] = null;
            $data['data']['jenis_terapi'] = null;  
            $data['id_obat'] = null; 

            $data['title'] = "Tambah Barang/Obat ";
        }
        else
        {
            $data['jenis_aksi']="edit"; 
            $data['title'] = "Ubah Barang/Obat "; 
        }    

        $data['update_barcode']="";  

        $data['SubFitur'] =null;  
        $data['breadcrumb'] = array(
            array(
                'fitur' => "Home", 
                'link' => base_url(), 
                'status' => "", 
            ),
            array(
             'fitur' => "Obat", 
             'link' => base_url()."Obat/", 
             'status' => "", 
            ), 
            array(
             'fitur' => "Tambah", 
             'link' => base_url()."Obat", 
             'status' => "active", 
            ), 
        ); 

        $data['industri'] = $this->Industri_model->getAll();   
        $data['suplier'] = $this->Suplier_model->getAll();   
        $data['kategori_obat'] = $this->Kategori_obat->getAll();  
        $data['kategori'] = $this->Kategori->getAll();   
        $data['satuan'] = $this->Satuan_obat->getAll(); 

        $this->load->view('include2/sidebar',$data);  
        $this->load->view('obat/form',$data); 
        $this->load->view('include2/footer');  
    }

    public function get_detail_kategori($kategori)
    {
        $where = array('kd_kategori' => $kategori );
        $kategori = $this->Kategori->detail_row_array($where);
        if ($kategori['nm_kategori']=="OBAT")
        {
            $data['kategori_obat'] = $this->Kategori_obat->getAll(); 
            $this->load->view('obat/kategori_obat_select',$data);
        }
        else{ 
            $this->load->view('obat/kategori_obat_input'); 
        }
    }

     public function reload_data()
    { 
        $limit = 100;
        $data['pesan']="Data ".$limit." Obat terakhir, silahkan klik 'Cari' untuk mencari obat lain";
        $data['data']= $this->M_obat->getAll($limit);  

        $this->session->flashdata('pesan', "<div class='callout callout-info'>".$data['pesan']."</div>");
        $this->load->view('obat/data', $data); 
    }   

    public function save()
    {   
        $jenis_aksi = $this->input->post('jenis_aksi'); 
        $barcode = $this->input->post('barcode');
        $data = array( 
            'nama' => $this->input->post('nama'),
            'kd_satuan' => $this->input->post('kd_satuan'),
            'kd_industri' => $this->input->post('kd_industri'),
            'kd_suplier' => $this->input->post('kd_suplier'),
            'deskripsi' => $this->input->post('deskripsi'),
            'lokasi_rak' => $this->input->post('lokasi_rak'),
            'id_obat' => $this->input->post('id_obat'),
            'kd_kategori_obat' => $this->input->post('kd_kategori_obat'),
            'kategori' => $this->input->post('kategori'),
            'kandungan' => $this->input->post('kandungan'),
            /*'diskon_jual' => $this->input->post('diskon_jual'),
            'harga_beli' => $this->input->post('harga_beli'),
            'harga_jual' => $this->input->post('harga_jual'),*/
            'diskon_beli' => $this->input->post('diskon_beli'),
            'jenis_terapi' => $this->input->post('jenis_terapi'), 
            'deleted' => 0, 
            'barcode' => $barcode, 
        );   

        // aksi Tambah 
        $this->M_obat->generate_barcode($barcode); 

        $hasil = array();
        if($jenis_aksi=="add"){ 
            $hasil['status'] = $this->M_obat->save($data); 
        }   
        else{
            $where = array('id_obat' => $this->input->post('id_obat') );
            $hasil['status'] = $this->M_obat->update($where, $data);  
        } 

        if($hasil['status']==true && $jenis_aksi=="add"){
            $hasil['pesan'] ="Proses Tambah obat berhasil";
        }
        else if ($hasil['status']==false && $jenis_aksi=="add")
        {
            $hasil['pesan'] ="Proses Tambah obat gagal"; 
        }
        else if ($hasil['status']==true && $jenis_aksi=="edit")
        {
            $hasil['pesan'] ="Proses ubah obat berhasil"; 
        }
        else
        {
            $hasil['pesan'] ="Proses ubah obat gagal";  
        }  
 
        // $hasil['jenis_aksi']=$jenis_aksi;  
        // $this->session->set_flashdata('pesan', $data['pesan']);  
        redirect('Obat?return='.$hasil['status']);
    }

     public function edit($id_obat=null)
    {  
        if ($id_obat==null)
        {
            $this->invalid_page();
        } 
        else
        { 
            $where = array('id_obat' => $id_obat );
            $data['data']=$this->M_obat->getBy($where); 

            $data['title'] = "Edit Obat";
            $data['url'] = "obat/"; 

            $data['breadcrumb'] = array(
                array(
                    'fitur' => "Home", 
                    'link' => base_url(), 
                    'status' => "", 
                ),
                array(
                 'fitur' => "Obat", 
                 'link' => base_url()."Obat", 
                 'status' => "", 
                ), 
                 array(
                 'fitur' => "Edit Obat", 
                 'link' => "#", 
                 'status' => "active", 
                ), 
            );

            if ($data['data']==NULL) {
                $data['SubFitur'] ="ID obat Tidak cocok"; 
                
                $this->load->view('include2/sidebar', $data); 
                $this->load->view('obat/data_tidak_dimukan',$data);
                $this->load->view('include2/footer');  
            }
            else
            {  
                $where = array('id_obat' => $id_obat );
                $data['data']=$this->M_obat->getBy($where);   
                $data['id_obat']=$id_obat;  
                if ($id_obat==null)
                {
                    $data['jenis_aksi']="add";
                    $data['SubFitur'] =null; 
                }
                else
                {
                    $data['jenis_aksi']="edit";
                    $data['SubFitur'] =$data['data']['nama']; 
                }  

                $data['update_barcode']="";  
         
                $data['url_inquery']="obat/inquery"; 
                $data['industri'] = $this->Industri_model->getAll();   
                $data['suplier'] = $this->Suplier_model->getAll();   
                $data['kategori_obat'] = $this->Kategori_obat->getAll();   
                $data['satuan'] = $this->Satuan_obat->getAll();    
                $data['kategori'] = $this->Kategori->getAll();   

                $this->load->view('include2/sidebar', $data); 
                $this->load->view('obat/form',$data);
                $this->load->view('include2/footer');  
            }
        }  
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

     public function hapus($barcode)
    {
        $hasil = array();  
        $where = array('barcode' => $barcode );
 
        $hasil['status']=$this->M_obat->hapus($where);  
        $pesan="";  
        
        if ($hasil['status']==true)
        {
            $pesan = "Proses hapus obat ".$barcode." berhasil";
        }
        else
        {
            $pesan = "Proses hapus obat ".$barcode." berhasil";  
        } 

        $data = array(
            'pesan' => $pesan, 
            'return' => $hasil['status'], 
        );  

        echo json_encode($data); 
    }

    public function do_import(){

        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $this->uploadFile();

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
        $data_obat = array();  
        $numrow = 1;

        $id_user=$this->session->userdata('id');

        foreach($sheet as $row){
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if($numrow > 1){  

                $barcode =$this->M_obat->get_barcode(); 

                //ccek panjang string di code 
                $nama_satuan =$row['B'];
                $harga_beli = str_replace(",","",$row['E']);
                $query = $this->db->query("SELECT * from satuan where nm_satuan like '$nama_satuan'")->row_array()['kd_satuan'];  

                // Kita push (add) array data ke variabel data
                array_push($data_obat, array( 
                    'nama'=>$row['A'], // Insert data nama dari kolom B di excel 
                    'kd_satuan'=>$query, // Insert data alamat dari kolom D di excel 
                    'kandungan'=>$row['D'], // Insert data alamat dari kolom D di excel
                    'harga_beli'=>$harga_beli, // Insert data alamat dari kolom D di excel
                    'deskripsi'=>$row['C'], // Insert data alamat dari kolom D di excel
                    'id_user'=>$id_user, // Insert data alamat dari kolom D di excel
                    'barcode'=>$barcode, // Insert data alamat dari kolom D di excel
                ));    
            } 
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model  
        $hasil['status']= $this->M_obat->insert_multiple("obat", $data_obat); 

        if ($hasil['status']>0)
        {
            $hasil['status']=1;
            $hasil['pesan'] = "Proses import data obat berhasil";
        }
        else
        {
            $hasil['pesan'] = "Proses import data obat gagal";  
        }

        $data = array(
            'pesan' => $hasil['pesan'], 
            'return' => $hasil['status'], 
        );   
        echo json_encode($data);   
    }

    public function uploadFile()
    {
        $upload = $this->M_obat->upload_file($this->filename);
            
        if($upload['result'] == "success"){ // Jika proses upload sukses
            // Load plugin PHPExcel nya
            
            $excelreader = new PHPExcel_Reader_Excel2007();
            $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
            
            // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
            // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
            $data['sheet'] = $sheet; 
        }else{ // Jika proses upload gagal
            $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan 
        }
    }   

    public function exportpdf(){
        $adata = $this->M_obat->getAll();
        $i=0;
        
        $start = 0;
        $html = '<center>Data Produk</center>';
        $html .='<table cellspacing="0" cellpadding="5" width="90%" align="center" border="0">';
        $html .='<tr style="color:red">
                     <th>No</th> 
                     <th>Kode Barang</th> 
                </tr>';

                echo "<table>\n";

                $colSpan = 4;
                $rows = 0;

                foreach ($adata as $key => $value) {
                    # code...
                    $no = ++$start;
                    $barcode = $value['barcode'];
                    $photo = '<img src="'.base_url().'/assets/barcode/'.$value['barcode'].'.jpg" width="200px" height="100px">';
                    //$photo = $value['gambar_barang'];
                    $nama = $value['nama'];
         

                    $html .='<tr align="center">';
                            $html .='<td>'.$no.'</td>';
                            $html .='<td>'.$photo.'
                            <br>'.$nama.'
                            </td>';  
                    $html .='</tr>';  
                }
                

                // for($i = 0; $i < 5; $i++) {
                //     // At column 0 you create a new row <tr>
                //     if($i % $colSpan == 0) {
                //         $rows++;
                //         echo "<tr>\n";
                //     }

                //     echo "<td>" . ($i + 1) . "</td>\n";

                //     // At column 3 you end the row </tr>
                //     echo $i % $colSpan == 3 ? "</tr>\n" : "";
                // }

                // Say you have 5 columns, you need to create 3 empty <td> to validate your table!
                for($j = $i; $j < ($colSpan * $rows); $j++) {
                    echo "<td></td>\n";
                }

                // Add the final <tr>
                if(($colSpan * $rows) > $i) {
                    echo "</tr>\n";
                }

                echo "</table>\n";

                
        
        $html .='</table>'; 
        // $this->generatepdf($html,'data_produk.pdf');  

        echo($html);
    }

    public function generatepdf($html,$filename){ 
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream($filename,array('Attachment'=>0));
    }


public function exportToExel()
    {

        $data['title'] = "export Obat";
            $data['url'] = "obat/"; 
             $data['SubFitur'] =null; 

            $data['breadcrumb'] = array(
                array(
                    'fitur' => "Home", 
                    'link' => base_url(), 
                    'status' => "", 
                ),
                array(
                 'fitur' => "Obat", 
                 'link' => base_url()."Obat", 
                 'status' => "", 
                ), 
                 array(
                 'fitur' => "Edit Obat", 
                 'link' => "#", 
                 'status' => "active", 
                ), 
            );

        $data['data']= $this->M_obat->getAll(); 

         $this->load->view('include2/sidebar', $data);  
        $this->load->view('obat/exportToExel',$data);
                $this->load->view('include2/footer');  


    }
}