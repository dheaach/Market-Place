<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_kurir extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('kategori_model');
        $this->load->model('admin');
    }

	public function index()
	{
	    $data['total_asset'] = $this->admin->hitungJumlahAsset();
	    $data['total_kurir'] = $this->admin->hitungKurir();
	    $data['total_trans'] = $this->admin->hitungTrans();
	    $this->load->view('templet/header');
	    $this->load->view('kurir/dashboard',$data);
	    $this->load->view('templet/footer.php');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
