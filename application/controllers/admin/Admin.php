<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("dashboard_admin");
        
        if($this->session->userdata('user_role') != '1') {
        			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Login Dulu Dong!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
					redirect('user/login');
        }
    }

	public function index()
	{
		$data['toko'] = $this->dashboard_admin->getAll(); 

		$this->load->view('templateku/header');
		$this->load->view('templateku/sidebar');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('templateku/footer');	
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('user/login'));
	}
}