<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
 
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('customer_model','login_model','user_model'));
		$this->load->library('upload');
	}
	public function index(){
		//ngambil data user dari database
		$user = $this->login_model->get();
		$data['userdata'] = $user;

		//check role kalo bukan admin langsung di redirect ke halaman depan
		$this->check_role();

		//init layout
		$data['navbar']='admin/navbar_admin';
		$data['content']='admin/customer_content';
		$data['slide']=null;
		$data['sidebar']='admin/sidebar_admin';
		$data['title']='Penyewa';

		//init data
		$data['customer'] = $this->customer_model->get()->result_array();

		$data['scripts'] = array('js/admin/customer.js','plugin/form-validation/jquery.validate.min.js','plugin/form-validation/extjquery.validate.min.js','plugin/bootbox/bootbox.js','js/bootstrap-datepicker.min.js');
		$this->load->view('admin/tamplate_admin',$data);
	}
	
	function check_role(){
		$user = $this->login_model->get();
		if(isset($user)){
			if($user['role'] == 1){
			// $this->session->set_flashdata('form_msg', array('success' =>true, 'fail'=> false, 'msg' => 'Login Success'));
				// redirect('welcome');
			
			}else if($user['role'] == 2){
					redirect('admin_provider');
			}else{
				redirect('welcome');
			}
		}else{
			redirect('login');
		}
	}	
	public function post(){
		
        $data['id_customer'] = $_POST['id_customer'];
        if($_POST['id_customer'] == 0){
        	// $data_user['username'] = $_POST['username'];
	        // $data_user['password'] = md5($_POST['password']);
	        // $data_user['email'] = $_POST['email'];
	        // $data_user['role'] = 3;
         //    if($user_id = $this->user_model->add_user_login($data_user)){
		        $data['nama'] = $_POST['nama'];
		        $data['alamat'] = $_POST['alamat'];
		        $data['no_tlp'] = $_POST['no_telp'];
		        $data['tgl_lahir'] = $_POST['tgl_lahir'];
		        $data['status'] = $_POST['status'];
		        $data['jk'] = $_POST['jk'];
        		$data['user_login_id'] = 0;
            if($this->customer_model->add($data)){
                echo "1";
            }else{
                echo "0";
            }
        }else{
        	// $data_user['username'] = $_POST['username'];
         //   	$data_user['email'] = $_POST['email'];
         //    if($this->user_model->update_user_login($_POST['user_login_id'],$data_user)){
            	$data['nama'] = $_POST['nama'];
		        $data['alamat'] = $_POST['alamat'];
		        $data['no_tlp'] = $_POST['no_telp'];
		        $data['tgl_lahir'] = $_POST['tgl_lahir'];
		        $data['jk'] = $_POST['jk'];
		        $data['status'] = $_POST['status'];
            if($this->customer_model->edit($_POST['id_customer'],$data)){
                echo "1";
            }else{
                echo "0";
            }
        }
    }
    function check_code(){
        $code = $_POST['email'];
        $id = $_POST['id'];
        $data = $this->customer_model->is_code_exist($code, $id);
        if($data){
            $result = false;
        }else{
            $result = true;
        }

        echo json_encode($result);
    }
    public function get_by_id(){
        $id = $_POST['idx'];
        $result = $this->customer_model->get(array("id_customer"=>$id))->row_array();
        echo json_encode($result);
    }
    public function delete(){
        $id = $_POST['id'];
        if($this->customer_model->delete($id)){
            echo "1";
        }else{
            echo "0";
        }
    }
    function check_password(){
        $pass = md5($_POST['password_old']);
        $id = $_POST['id'];
        $data = $this->customer_model->check_password($pass, $id);
        if($data){
            $result = true;
        }else{
            $result = false;
        }

        echo json_encode($result);
	}
	
    function change_pass(){
   	 	$data['password'] = md5($_POST['new_password']);
	 	$id = $_POST['id'];
	    if($this->customer_model->change_pass(array('id'=>$id),$data)){
	        echo "1";
	    }else{
	        echo "0";
	    }

    }
}
