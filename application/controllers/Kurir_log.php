<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir_log extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        $this->load->library('session');
    }
	public function index()
	{
		$this->form_validation->set_rules('nama' , 'Nama' , 'required|trim');
		$this->form_validation->set_rules('nopol' , 'Nopol' , 'required|trim');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('templet/head');
			$this->load->view('kurir/registrasi');
		}

		else
		{

		$kurir = rand()%999;
		$id_kurir = "K-".$kurir;
		$id_user = $this->session->userdata('user_id');
 
		$data = [
			'id_kurir' => $id_kurir,
			'nama' => htmlspecialchars($this->input->post('nama' , TRUE)),
			'id_toko'	=> '',
			'id_user'	=> $id_user,
			'kendaraan' => htmlspecialchars($this->input->post('kendaraan')),
			'nopol' => htmlspecialchars($this->input->post('nopol'))
		];

		$this->db->insert('kurir' , $data);
		$this->load->view('templet/header');
		$this->load->view('kurir/dashboard');
		$this->load->view('templet/footer');

		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('welcome'));
	}
}
