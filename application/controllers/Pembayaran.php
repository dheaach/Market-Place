<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model("model");
        $this->load->library("session");

        if($this->session->userdata('user_role') != '2') {
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          Login Dulu Dong!
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>');
                    redirect('user/login');
        }
    }

    public function checkout()
    {   
        $nik = $this->session->userdata("user_id");
        $data["beli"] = $this->db->query("SELECT * FROM pembelian WHERE nik = '$nik' AND total > 0 ORDER BY tanggal DESC")->result();
    	$this->load->view('templates/header');
		$this->load->view('admin/_partials/navbar');
		$this->load->view('dashboard/checkout', $data);
		$this->load->view('templates/footer');
    }

    public function bayar()
    {
        $id         = $this->input->post('id_beli');
        $tanggal    = $this->input->post('tanggal');
        $batas_bayar= $this->input->post('batas_bayar');
        $pengiriman = $this->input->post('pengiriman');
        $pembayaran = $this->input->post('pembayaran');
        $total      = $this->input->post('total_harga');

        $data = array(
            'tanggal'       => $tanggal,
            'batas_bayar'   => $batas_bayar,
            'total'         => $total,
            'pembayaran'    => $pembayaran,
            'pengiriman'    => $pengiriman
        );

        $where = array('id_beli' => $id);
        $update = $this->model->update('pembelian',$data,$where); 

        foreach ($this->cart->contents() as $items) {
            $i = 0;
            $id_produk  = $items['id'];
            $qty        = $items['qty'];
            $harga      = $items['price'];
            $subtotal   = $items['subtotal'];
            $id_user    = $this->session->userdata('user_id');
            $toko       = $this->db->query("SELECT * FROM barang WHERE id = '$id_produk'")->result();
            foreach ($toko as $t) {
                $id_toko    = $t->id_toko;
            
            //$this->session->set_userdata('produk_id',$id_produk);
            //$this->session->set_userdata('id_toko',$id_toko);

            $d = array(
                'id_detil'          =>  '',
                'id_beli'           =>  $id,        
                'id_toko'           =>  $id_toko,
                'id_produk'         =>  $id_produk,
                'jumlah'            =>  $qty,
                'harga'             =>  $harga,
                'sub_total'         =>  $subtotal,
                'status_pembayaran' =>  'Belum Bayar',
                'status_pengiriman' =>  'Sedang di proses',
                'status_transaksi'  =>  'Proses'
            );

            $this->db->insert('detil_beli', $d);
        } 

        $this->cart->destroy();
        redirect('pembayaran/checkout');
    }
    }

    public function detail($id)
    {
        $this->session->set_userdata('wdw',$id);
        $data["detail"] = $this->db->query("SELECT * FROM pembelian WHERE id_beli = '$id'")->result();
        $this->load->view('templates/header');
        $this->load->view('admin/_partials/navbar');
        $this->load->view('dashboard/det_checkout',$data);
        $this->load->view('templates/foot');
        $this->load->view('templates/footer');
    }

    public function bukti()
    {
        $id1         = $this->input->post('id');
        $bukti     = $_FILES['bukti']['name'];

        if($bukti = ''){}else{
           $config ['upload_path']  = './assets/img/bukti';
           $config ['allowed_types'] = 'jpg|jpeg|png|gif';

           $this->load->library('upload', $config);
           if(!$this->upload->do_upload('bukti')){
                echo "Bukti Gagal diupload!";
           }
           else{
                $bukti = $this->upload->data('file_name');
           }
        }

        $data = array(
            'bukti' =>  $bukti
        );

        $where = array('id_beli' => $id1);
        $update = $this->model->update('pembelian',$data,$where); 
        $id = $this->session->userdata('wdw');
        redirect('pembayaran/detail/'.$id);
    }
}