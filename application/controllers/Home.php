<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller { 


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
		$data['title'] ="Dashbord"; 
		$data['SubFitur'] =null; 
        $data['url'] = "Home/"; 

        $this->load->view('new_theme/header'); 
        $this->load->view('new_theme/menu'); 
        $this->load->view('home/home', $data); 
        $this->load->view('new_theme/footer');  
	} 

    public function tes_new()
    {   
        $this->load->view('new_theme/header'); 
        $this->load->view('new_theme/menu'); 
        $this->load->view('home/index'); 
        $this->load->view('new_theme/footer'); 
    } 

    public function get_log_activity()
    { 
        $date= date('Y-m-d');
        $date_1 = date('Y-m-d',strtotime("-1 days"));
        $id_user = $this->session->userdata('id');

        $data['today'] = $date;
        $data['today_1'] = $date_1;
        $data['log_activity']=$this->db->query("SELECT tgl_log, keterangan from log_activity_2 WHERE id_user='$id_user' and tgl_log between '$date_1 00:00:00' and '$date 23:59:59' order by tgl_log desc");  
        
        $this->load->view('home/log_activity',$data); 
    }

    public function get_obat_ed()
    {  
        $effectiveDate = date('Y-m-d');  
        $effectiveDate = date('Y-m-d', strtotime("+8 months", strtotime($effectiveDate)));  
        // $data['obat_ed']=$this->db->query("SELECT detail_obat.barcode,tgl_exp,  no_batch, no_reg, obat.nama from detail_obat, obat where tgl_exp <= '".$effectiveDate." 00:00:00' and detail_obat.barcode=obat.barcode "); 
        $data['jumlah'] = $this->db->query("SELECT COUNT(barcode) as jumlah from laporan_pembelian where tgl_exp <= '".$effectiveDate." 00:00:00'")->row_array()['jumlah'];
        // var_dump($this->db->last_query()); 

        echo json_encode($data['jumlah']); 
        // $this->load->view('home/obat_ed',$data); 
    }

    public function get_obat_ed_detail()
    {  
        $data['title'] ="Obat ED"; 
		$data['SubFitur'] =null; 
         $data['url'] = "Home/get_obat_ed_detail";

		$data['breadcrumb'] = array(
			array(
				'fitur' => "Home", 
				'link' => base_url()."Home", 
				'status' => "", 
            ), 
            array(
				'fitur' => "Obat Ed", 
				'link' => base_url()."Home/get_obat_ed_detail", 
				'status' => "active", 
			),
        );
        
        $effectiveDate = date('Y-m-d');  
        $effectiveDate = date('Y-m-d', strtotime("+8 months", strtotime($effectiveDate)));  
        $data['obat_ed']=$this->db->query("SELECT detail_obat.barcode,tgl_exp,  no_batch, no_reg, obat.nama from detail_obat, obat where tgl_exp <= '".$effectiveDate." 00:00:00' and detail_obat.barcode=obat.barcode "); 
       
        $this->load->view('include2/sidebar',$data);
        $this->load->view('home/obat_ed',$data);
        $this->load->view('include2/footer');  
    }

    public function get_obat_not_set_price()
    {
        //   $data['obat_not_set_price']=$this->db->query("SELECT detail_obat.barcode, detail_obat.harga_jual, no_batch, no_reg, nama from detail_obat, obat where detail_obat.harga_jual <= 0  and obat.barcode=detail_obat.barcode");  
        $data['jumlah'] = $this->db->query("SELECT count(no_batch) as jumlah from laporan_pembelian where harga_jual <= 0")->row_array()['jumlah'];
        
        echo json_encode($data['jumlah']);  
        // $this->load->view('home/obat_not_set_price',$data); 
    }

    public function get_obat_not_set_price_detail()
    {
        $data['title'] ="Daftar Obat yang belum di set harga jual"; 
		$data['SubFitur'] =null; 
         $data['url'] = "Home/get_obat_not_set_price_detail";

		$data['breadcrumb'] = array(
			array(
				'fitur' => "Home", 
				'link' => base_url()."Home", 
				'status' => "", 
            ), 
            array(
				'fitur' => "Obat belum set harga jual", 
				'link' => base_url()."Home/get_obat_not_set_price_detail", 
				'status' => "active", 
			),
        );

        $data['obat_not_set_price']=$this->db->query("SELECT detail_obat.barcode, detail_obat.harga_jual, no_batch, no_reg, nama from detail_obat, obat where detail_obat.harga_jual <= 0  and obat.barcode=detail_obat.barcode");  
       
        $this->load->view('include2/sidebar',$data);
        $this->load->view('home/obat_not_set_price',$data);
        $this->load->view('include2/footer');   
    }

    public function get_penjualan_not_verified()
    {
        //  $data['penjualan_not_verified']=$this->db->query("SELECT no_faktur, kd_outlet, time, outlet1.nama
        //     from trx_penjualan_tmp, outlet1 WHERE (id_user_verifikasi='' or id_user_verifikasi is null)
        //     and outlet1.id_outlet=trx_penjualan_tmp.kd_outlet
        //     GROUP BY no_faktur ");  

        $data['jumlah']=$this->db->query("SELECT COUNT(no_faktur) as jumlah from trx_penjualan_tmp WHERE (id_user_verifikasi='' or id_user_verifikasi is null) GROUP BY no_faktur ")->row_array()['jumlah']; 
        echo json_encode($data['jumlah']);  
            
        // $this->load->view('home/penjualan_not_verified',$data); 
    }

    public function get_penjualan_not_verified_detail()
    {
        $data['title'] ="Daftar penjualan yang belum diverifikasi"; 
		$data['SubFitur'] =null; 
         $data['url'] = "Home/get_obat_not_set_price_detail";

		$data['breadcrumb'] = array(
			array(
				'fitur' => "Home", 
				'link' => base_url()."Home", 
				'status' => "", 
            ), 
            array(
				'fitur' => "penjualan yang belum diverifikasi", 
				'link' => base_url()."Home/get_penjualan_not_verified_detail", 
				'status' => "active", 
			),
        );

         $data['penjualan_not_verified']=$this->db->query("SELECT no_faktur, kd_outlet, time, outlet1.nama
            from trx_penjualan_tmp, outlet1 WHERE (id_user_verifikasi='' or id_user_verifikasi is null)
            and outlet1.id_outlet=trx_penjualan_tmp.kd_outlet
            GROUP BY no_faktur ");   

        $this->load->view('include2/sidebar',$data);
        $this->load->view('home/penjualan_not_verified',$data);
        $this->load->view('include2/footer');    
    }

    public function get_penjualan_jatuh_tempo()
    {
        $data['jumlah']=$this->db->query("SELECT COUNT(no_faktur) as jumlah from kalkulasi_item_perfakturpenjualan WHERE (id_user_verifikasi='' or id_user_verifikasi is null) GROUP BY no_faktur")->row_array()['jumlah']; 
        echo json_encode($data['jumlah']);   
    }

    public function get_penjualan_jatuh_tempo_detail()
    { 
        $data['title'] ="Piutang Jatuh Tempo"; 
		$data['SubFitur'] =null; 
         $data['url'] = "Home/get_penjualan_jatuh_tempo_detail";

		$data['breadcrumb'] = array(
			array(
				'fitur' => "Home", 
				'link' => base_url()."Home", 
				'status' => "", 
            ), 
            array(
				'fitur' => "Piutang Jatuh Tempo", 
				'link' => base_url()."Home/get_penjualan_jatuh_tempo_detail", 
				'status' => "active", 
			),
        );

        $no_faktur = $this->db->query("SELECT * FROM trx_penjualan_verified"); 

            $data2 = array();  
            foreach ($no_faktur->result_array() as $key) {
                
                //get jumlah belanja
                $sub_total1 = 0;
                $sub_total2 = 0;
                $jumlah_potongan = 0;
                $ppn = 0;
                $no_faktur2 = $key['no_faktur'];  
 
                 $data['show_button_angsuran']= $this->db->query("SELECT * from riwayat_angsuran WHERE no_faktur='".$no_faktur2."' and lunas=1");
                 if ($data['show_button_angsuran']->row_array()['lunas']==0)
                 {
                    $jumlah_belanja1 = $this->db->query("SELECT * FROM kalkulasi_item_perfakturpenjualan where no_faktur='$no_faktur2'")->result();  

                    foreach ($jumlah_belanja1 as $key2) {
                        //rumus   
                        $sub_total2 =  $sub_total2+$key2->sub_total1;  
                        $jumlah_potongan= $jumlah_potongan + $key2->potongan; 
                        $ppn=$key2->ppn;  
                    }   

                    $key['no_faktur'] = $no_faktur2;
                    $key['harga_jual'] = $sub_total2;
                    $key['jumlah_potongan'] =$jumlah_potongan;
                    $key['harga_kurang_pot'] = $sub_total2-$jumlah_potongan;
                    $key['nilai_pajak'] = $key['harga_kurang_pot']*($ppn/100);
                    $key['harga_stl_pajak'] = $key['harga_kurang_pot']+$key['nilai_pajak'];  

                    $data2[]=$key;
                 }    
            }  
            $data['penjualan_jatuh_tempo'] = $data2;

            $this->load->view('include2/sidebar',$data);
            $this->load->view('home/penjualan_jatuh_tempo',$data);
            $this->load->view('include2/footer');     
    }

    public function get_masa_berlaku_SIA()
    {  
        // $data['masa_izin']= $this->db->query("SELECT nama, masa_izin from outlet1 WHERE masa_izin<=$effectiveDate")->result_array();  
 
        $effectiveDate = date('Y-m-d');  
        $effectiveDate = date('Y-m-d', strtotime("+3 months", strtotime($effectiveDate)));  

        $data['jumlah']= $this->db->query("SELECT count(nama) as jumlah from outlet1 WHERE masa_izin<=$effectiveDate")->row_array()['jumlah'];  
        echo json_encode($data['jumlah']);  
        
        // var_dump($this->db->last_query());  
        // $this->load->view('home/get_masa_berlaku_SIA',$data);  
    }

    public function credit_today()
    {   
        $effectiveDate = date('Y-m-d');    
        $data['jumlah']= $this->db->query("SELECT sum(hrg_stl_pajak) as jumlah from ttl_penjulan_credit WHERE `time` like '".$effectiveDate."%'")->row_array()['jumlah'];  

        $data['jumlah_cash']= $this->db->query("SELECT sum(hrg_stl_pajak) as jumlah from ttl_penjualan_cash WHERE `time` like '".$effectiveDate."%'")->row_array()['jumlah'];  
        
        $data['jumlah_jual']= $this->db->query("SELECT sum(hrg_stl_pajak) as jumlah from ttl_penjualan WHERE `time` like '".$effectiveDate."%'")->row_array()['jumlah'];  
        

        if($data['jumlah']==null)
        {
            $data['jumlah']='0';  
        }  
        
        if($data['jumlah_cash']==null)
        {
            $data['jumlah_cash']='0';  
        } 

        if($data['jumlah_jual']==null)
        {
            $data['jumlah_jual']='0';  
        } 
        
        $return = array(
            'credit_today' => number_format($data['jumlah'],2),
            'cash_today' => number_format($data['jumlah_cash'],2), 
            'sell_today' => number_format($data['jumlah_jual'],2), 
        ); 
        echo json_encode($return); 
    }

    

	public function data_line_chart(){
        // $this->load->model()
        // $data = $this-;
        $user = $this->M_login->get();

        $category = array();
        $category['name'] = 'Category';
        $provider = $this->provider_model->get(array('user_login_id'=>$user['id']))->row_array();
        $series1 = array();
        $series1['name'] = 'Transaction';
        $category['data'] = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        for ($i=0; $i < count($category['data']) ; $i++) { 
            # code...
            if($user['role'] == 1){
            	$tot = $this->transaksi_model->get(array('month(tgl_transaksi)'=>($i+1),'year(tgl_transaksi)'=> date('Y')))->num_rows();
			}else{
				$tot = $this->provider_model->get_provider_trans(array('month(tgl_transaksi)'=>($i+1),"provider.id_provider"=>$provider['id_provider'],'year(tgl_transaksi)'=> date('Y')))->num_rows();
			}
            
            
            $series1['data'][] = ($tot!=null)?$tot:0;
        }
        $result = array();
        array_push($result,$category);
        array_push($result,$series1);
        print json_encode($result, JSON_NUMERIC_CHECK);
    }
    
	function check_role(){
		$user = $this->M_login->get();
		if(isset($user)){
			if($user['role'] == 1){  
			}else if($user['role'] == 2){
					redirect('admin_provider');
			}else{
				redirect('welcome');
			}
		}else{
			redirect('login');
		}
	}

	public function tes()
	{
		$jumlah_belanja1 = $this->db->query("SELECT * FROM kalkulasi_item_perfakturpenjualan where no_faktur='68620040001'")->result();  

            foreach ($jumlah_belanja1 as $key2) {

            	echo "harga_jual : ",number_format($key2->harga_jual,2);

            	echo "<br>sum_harga1 : ",number_format($key2->sum_harga1,2). " >> ".$key2->qty ."* ".number_format($key2->harga_jual,2);

            	echo "<br>diskon : ",number_format($key2->diskon,2);
            	echo "<br>sub_total1 : ",number_format($key2->sub_total1,2);
            	echo "<br>potongan : ",number_format($key2->potongan,2); 

            	echo "<HR>"; 
            }   
	}	
}