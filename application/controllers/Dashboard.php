<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
    {
        parent::__construct();

        $this->load->model("model");
        $this->load->model("history_model");
        $this->load->library("cart");
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form','url');

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

	public function simpan_cart()
	{
		$id_brg 		= $this->input->post('id');
		$nama 			= $this->input->post('nama');	
		$harga 			= $this->input->post('harga');
		$jumlah 		= $this->input->post('qty');
		$gambar 		= $this->input->post('gambar');
        $toko           = $this->input->post('toko');

        $this->session->set_userdata('toko',$toko);
        $this->session->set_userdata('gmb',$gambar); 

		$data = array(
			'id'	=>	$id_brg,
			'qty'	=>	$jumlah,
			'price'	=>	$harga,
			'name'  => 	$nama
		);

		$this->cart->insert($data);
		$this->session->set_userdata('gambar', $gambar); 
		redirect('dashboard/detail_cart');
	}

    public function simpen_cart($id)
    {
        $barang = $this->model->find($id);
        $toko   = $this->session->set_userdata('toko',$barang->id_toko);
        
        $data = array(
            'id'    =>  $barang->id,
            'qty'   =>  1,
            'price' =>  $barang->harga,
            'name'  =>  $barang->nama
        );

        $this->cart->insert($data);
        redirect('dashboard/pembayaran2');
    }

    public function nyimpen_cart($id)
    {
        $barang = $this->model->find($id);
        $toko   = $this->session->set_userdata('toko',$barang->id_toko);

        $data = array(
            'id'    =>  $barang->id,
            'qty'   =>  1,
            'price' =>  $barang->harga,
            'name'  =>  $barang->nama
        );
        $this->cart->insert($data);

        $id         = $this->input->post('id');
        $nama       = $this->input->post('nama');
        $tlp        = $this->input->post('kontak');
        $wilayah    = $this->input->post('kota');
        $kodepos    = $this->input->post('kodepos');
        $alamat     = $this->input->post('alamat');
        $nik        = $this->session->userdata("user_id");

        $data = array(
            'id_beli'           =>  $id,
            'nik'               =>  $nik,
            'nama_penerima'     =>  $nama,
            'telepon'           =>  $tlp,
            'tanggal'           =>  '',
            'batas_bayar'       =>  '',
            'total'             =>  '0',
            'pembayaran'        =>  '',
            'pengiriman'        =>  '',
            'alamat'            =>  $alamat,
            'wilayah'           =>  $wilayah,
            'kodepos'           =>  $kodepos,
            'status_pembayaran' =>  'Belum Bayar',
            'bukti'             =>  '',
            'status_pengiriman' =>  'Sedang di proses',
            'status_transaksi'  =>  'Proses'
        );  

        $this->db->insert('pembelian',$data);
        $this->session->set_userdata('idi', $id);
        redirect('dashboard/pembayaran1');
    }

	public function detail_cart()
	{
		$this->load->view('templates/header');
		$this->load->view('admin/_partials/navbar');
		$this->load->view('cart/keranjang');
        $this->load->view('templates/footer');
	}

	public function hapus_cart($id)
    {
        
        $data = array(
            'rowid'    => $id,
            'qty'   => 0,
        );
        $this->cart->update($data);
        redirect('dashboard/detail_cart');
    }

    public function hapus_semua()
    {
    	$this->cart->destroy();
    	redirect('welcome/index');
    }

    public function pembayaran()
    {
    	redirect('dashboard/pembayaran2');
    }

    public function pembayaran1()
    {
        $nik = $this->session->userdata("user_id");
        $total = 0;
        $data['beli'] = $this->db->where('nik', $nik)
                                 ->where('total', $total)
                                 ->limit(1)
                                 ->get('pembelian')
                                 ->result();
        $this->load->view('templates/header');
        $this->load->view('admin/_partials/navbar');
        $this->load->view('cart/pembayaran1', $data);
        $this->load->view('templates/footer');
    }

    public function pembayaran2()
    {
        $nik = $this->session->userdata("user_id");
        $total = 0;
        $data['beli'] = $this->db->where('nik', $nik)
                                 ->where('total', $total)
                                 ->limit(1)
                                 ->get('pembelian')
                                 ->result();
        $this->load->view('templates/header');
        $this->load->view('admin/_partials/navbar');
        $this->load->view('cart/pembayaran2', $data);
        $this->load->view('templates/footer');
    }

    public function bayar()
    {
    	$id 		= $this->input->post('id');
    	$nama 		= $this->input->post('nama');
    	$tlp 		= $this->input->post('tlp');
    	$wilayah 	= $this->input->post('wilayah');
    	$kodepos 	= $this->input->post('kodepos');
    	$alamat 	= $this->input->post('alamat');
        $nik        = $this->session->userdata("user_id");

    	$data = array(
            'id_beli'           =>  $id,
            'nik'               =>  $nik,
            'nama_penerima'     =>  $nama,
            'telepon'           =>  $tlp,
            'tanggal'           =>  '',
            'batas_bayar'       =>  '',
            'total'             =>  '0',
            'pembayaran'        =>  '',
            'pengiriman'        =>  '',
            'alamat'            =>  $alamat,
            'wilayah'           =>  $wilayah,
            'kodepos'           =>  $kodepos,
            'status_pembayaran' =>  'Belum Bayar',
            'bukti'             =>  '',
            'status_pengiriman' =>  'Sedang di proses',
            'status_transaksi'  =>  'Proses'
        );  	

    	$this->db->insert('pembelian',$data);
    	$this->session->set_userdata($data);
    	redirect('dashboard/pembayaran');
    }
    
    public function history()
    {
        $data["produk"] = $this->history_model->hadeh();

        $this->load->view('templates/header');
        $this->load->view('admin/_partials/navbar');
        $this->load->view('dashboard/history',$data);
        $this->load->view('templates/footer');

    }
    public function rate()
    {
        $id_detil=$this->input->post('id_detil');
        $id_produk=$this->input->post('id_produk');
        $id_toko=$this->input->post('id_toko');
        $rating=$this->input->post('rating');
        $komen=$this->input->post('komentar');
        $tanggal = date_default_timezone_set('Asia/Jakarta'); 
        $tanggal = date('Y-m-d H:i:s');
        
        $d = array(
            'rating_produk'    => $rating,
            'komen'            => $komen,
            'tanggal_komen'    => $tanggal
        );
        $where = array('id_detil' => $id_detil);
        $update = $this->model->update('detil_beli',$d,$where); 

        $this->session->set_flashdata('success', 'Terima kasih sudah memberikan masukkan');

        redirect('dashboard/history');
    }

    public function ubah_alamat()
    {
        $id_beli = $this->input->post('id_beli');
        $nama = $this->input->post('nama');
        $tlp = $this->input->post('tlp');
        $wilayah = $this->input->post('wilayah');
        $kodepos = $this->input->post('kodepos');
        $alamat = $this->input->post('alamat');

        $data = array(
            'nama_penerima' => $nama,
            'telepon'       => $tlp,
            'alamat'        => $alamat,
            'wilayah'       => $wilayah,
            'kodepos'       => $kodepos 
        );

        $where = array('id_beli' => $id_beli);

        $this->model->update('pembelian',$data,$where);
        redirect('dashboard/pembayaran');
    }
}

