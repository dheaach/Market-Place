<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	            $this->form_validation->set_rules('username', 'Username', 'required');
	            $this->form_validation->set_rules('password', 'Password', 'required');

	            //set message form validation
	            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
	                <div class="header><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

	            //cek validasi
				if ($this->form_validation->run() == TRUE) {

				//get data dari FORM
	            $username = $this->input->post("username", TRUE);
	            $password = ($this->input->post('password', TRUE));
	            
	            //checking data via model
	            $checking = $this->admin->check_login('user', array('username' => $username), array('password' => $password));
	            //jika ditemukan, maka create session
	            if ($checking != FALSE) {
	                foreach ($checking as $apps) {

	                    $session_data = array(
	                        'user_id'   => $apps->nik,
	                        'user_name' => $apps->username,
	                        'user_pass' => $apps->password,
	                        'user_nama' => $apps->nama
	                    );
	                    //set session userdata
	          			$this->session->set_userdata($session_data);
	          			$id = $this->session->userdata("user_id");
	          			$toko = $this->admin->check_toko('toko', array('id_user' => $id));
	          			if ($toko != FALSE) {
	          				foreach ($toko as $jual) {

	          					$session_data = array(
	                        		'toko_id'   => $jual->id_toko,
	                        		'toko_nama' => $jual->nama_toko,
	                        		'logo' => $jual->logo
	                    		);
	                    		$this->session->set_userdata($session_data);
	                    		$data['kategori'] = $this->kategori_model->view();
	                    		$data['total_asset'] = $this->admin->hitungJumlahAsset();
								$data['total_kurir'] = $this->admin->hitungKurir();
								$data['total_trans'] = $this->admin->hitungTrans();
	                    		$this->load->view('template/header',$data);
	                    		$this->load->view('toko/dashboard');
	                    		$this->load->view('template/footer.php');
	                    	}
	                	}else{
			            	$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
	    	            	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
	    	            	$this->load->view('templates/header');
	        		    	$this->load->view('login', $data);
	        		    	$this->load->view('templates/footer.php');
	            		}
	                }
	            }else{

	            	$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
	                	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
					$this->load->view('templates/header');
	            	$this->load->view('login', $data);
					$this->load->view('templates/footer.php');
	            }

	        }else{
				$this->load->view('templates/header');
				$this->load->view('login');
				$this->load->view('templates/footer.php');
	        }

	}

	public function registration()
	{
		$this->form_validation->set_rules('nama_toko' , 'Nama_toko' , 'required|trim');
		$this->form_validation->set_rules('alamat_toko' , 'Alamat_toko' , 'required|trim');
		$this->form_validation->set_rules('kota' , 'Kota' , 'required|trim');
		$this->form_validation->set_rules('kode_pos' , 'Kode_pos' , 'required|trim');
		$this->form_validation->set_rules('kontak' , 'Kontak' , 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('toko/registrasi');
			$this->load->view('templates/footer');
		}
		else
		{
			$toko = rand()%999;
			$id_toko = "T-".$toko;
			$id_user = $this->session->userdata("user_id");
			$gambar     = $_FILES['gambar']['name'];
	        if($gambar = ''){}else{
	           $config ['upload_path']  = './assets/img/toko';
	           $config ['allowed_types'] = 'jpg|jpeg|png|gif';

	           $this->load->library('upload', $config);
	           if(!$this->upload->do_upload('gambar')){
	                echo "Gambar Gagal diupload!";
	           }
	           else{
	                $gambar = $this->upload->data('file_name');
	           }
	         }
         
			$data = [
				'id_toko' => $id_toko,
				'id_user' => $id_user,
				'nama_toko' => htmlspecialchars($this->input->post('nama_toko', TRUE)),
				'alamat_toko' => htmlspecialchars($this->input->post('alamat_toko', TRUE)),
				'kota' => htmlspecialchars($this->input->post('kota', TRUE)),
				'kode_pos' => htmlspecialchars($this->input->post('kode_pos', TRUE)),
				'keterangan' => htmlspecialchars($this->input->post('keterangan', TRUE)),
				'kontak' => htmlspecialchars($this->input->post('kontak', TRUE)),
				'logo' => $gambar
			];

			$this->db->insert('toko', $data);
			redirect('cek_login');
		}
	}
	

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
