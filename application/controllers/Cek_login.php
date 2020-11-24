<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('kategori_model');
        $this->load->model('tracking_model');
        $this->load->model('laporan_model');
        $this->load->model('admin');
    }

	public function index()
	{
	          			$id = $this->session->userdata("user_id");
	          			$toko = $this->admin->check_toko('toko', array('id_user' => $id));
	          			if ($toko != FALSE) {
	          				foreach ($toko as $jual) {

	          					$session_data = array(
	                        		'toko_id'   => $jual->id_toko,
	                        		'user_id'   => $jual->id_user,
	                        		'toko_nama' => $jual->nama_toko,
	                        		'logo' => $jual->logo
	                    		);
	                    		$this->session->set_userdata($session_data);
	                    		$data['total_asset'] = $this->admin->hitungJumlahAsset();
								$data['total_kurir'] = $this->admin->hitungKurir();
								$data['total_trans'] = $this->admin->hitungTrans();
								$data['stok'] = $this->kategori_model->cek();
								$data['foto'] = $this->admin->foto();
								$data["report"] = $this->laporan_model->cek(); 
								$data['total'] = $this->kategori_model->hitung();
								$data["track"] = $this->tracking_model->cek(); 
								$data['dapat'] = $this->kategori_model->dapat();
	                    		$this->load->view('template/header',$data);
	                    		$this->load->view('toko/dashboard',$data);
	                    		$this->load->view('templates/footer.php');
	                    	}
	                	}else{
			            	redirect('Login');
	            		}

	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
