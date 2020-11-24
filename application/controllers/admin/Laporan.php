<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct(){
       parent::__construct();

        $this->load->model('kategori_model');
        $this->load->model('report_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $data["report"] = $this->report_model->view(); 
        $data['kategori'] = $this->kategori_model->view();
        $data['stok'] = $this->kategori_model->cek();
        $data['foto'] = $this->kategori_model->foto();
        $data['total'] = $this->kategori_model->hitung();
        $this->load->view('templateku/header', $data);
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/laporan/report" , $data);
        $this->load->view('templateku/footer');
        }
    
     public function keyword()
     {

        $keyword = $this->input->post('keyword');
        $data['kategori'] = $this->kategori_model->view();
        $data['stok'] = $this->kategori_model->cek();
        $data['total'] = $this->kategori_model->hitung();
        $data['foto'] = $this->kategori_model->foto();
        $data['report']= $this->report_model->keyword($keyword);
        $this->load->view('templateku/header', $data);
        $this->load->view('templateku/sidebar');
        $this->load->view("admin/master/laporan/report" , $data);
        $this->load->view('templateku/footer');
    }
}