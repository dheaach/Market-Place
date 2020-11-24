<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('kurir_moedel');
        $this->load->model('kurir_model');
    }

    public function index()
    {
            $this->load->view('templet/header');
            $this->load->view('kurir/dashboard');         
            $this->load->view('templet/footer');      
    }

    public function list()
    {
        $data['anu'] = $this->kurir_model->getAll();
        
        
        $this->load->view('templates/header');
        $this->load->view('kurir/list', $data);
        $this->load->view('templates/footer');  
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}