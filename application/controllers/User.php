<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model model_login
        $this->load->model('model_login');
        $this->load->model('admin');
    }

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('templates/header');
			$this->load->view('dashboard/login');
			$this->load->view('templates/footer');

		}else{

				//jika session belum terdaftar

				//set form validation
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
	            $checking = $this->model_login->check_login('user', array('username' => $username), array('password' => $password));
	            //jika ditemukan, maka create session
	            if ($checking != FALSE) {
	                foreach ($checking as $apps) {

	                    $session_data = array(
	                        'user_id'     => $apps->nik,
	                        'user_name'   => $apps->username,
	                        'user_pass'   => $apps->password,
	                        'user_nama'   => $apps->nama_user,
	                        'user_role'   => $apps->role_id,
	                        'user_kontak' => $apps->kontak,
	                        'user_alamat' => $apps->alamat,
	                        'user_kota'   => $apps->kota,
	                        'user_kodepos'=> $apps->kode_pos
	                    );
	                    //set session userdata
	          			$this->session->set_userdata($session_data);
	          			$id = $this->session->userdata("user_id");
	          			$role = $this->session->userdata("user_role");
	          			$nama = $this->session->userdata("user_nama");

	          			$toko = $this->admin->check_toko('toko', array('id_user' => $id));
	          			if ($toko != FALSE) {
	          				foreach ($toko as $jual) {

	          					$session_data = array(
	                        		'toko_id'   => $jual->id_toko,
	                        		'toko_nama' => $jual->nama_toko,
	                        		'logo' => $jual->logo
	                    		);
	                    		$this->session->set_userdata($session_data);
	                    	}
	                    }

	                    $kurir = $this->admin->check_toko('kurir', array('id_user' => $id));
	          			if ($kurir != FALSE) {
	          				foreach ($kurir as $k) {

	          					$session_data = array(
	                        		'kurir_id'   => $k->id_kurir,
	                        		'kurir_nama' => $k->nama
	                    		);
	                    		$this->session->set_userdata($session_data);
	                    	}
	                    }

	          					switch($role){
									case 1	:	redirect('admin/admin');
												break;
									case 2	:	redirect('welcome');
												break;
									default :	break;
								}
	                }
	            }else{

	            	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Username atau Password Anda Salah!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
					redirect('user/login');
	            }

	        }else{

	            redirect('user/login');
	        }

		}

	}
	public function registration()
	{
		$this->form_validation->set_rules('username' , 'Username' , 'required|trim');
		$this->form_validation->set_rules('password1' , 'Password' , 'required|trim|min_length[5]|matches[password2]',[
			'matches' => 'Password Tydak Sama !',
			'min_length' => 'Password Terlalu Pendeq'
		]);
		$this->form_validation->set_rules('password2' , 'Password' , 'required|trim|matches[password1]',[
			'matches' => 'Password Tidaq Sama'
		]);
		$this->form_validation->set_rules('nik' , 'Nik' , 'required|trim');
		$this->form_validation->set_rules('nama' , 'Nama' , 'required|trim');
		$this->form_validation->set_rules('alamat' , 'Alamat' , 'required|trim');
		$this->form_validation->set_rules('kota' , 'Kota' , 'required|trim');
		$this->form_validation->set_rules('kode_pos' , 'Kode_pos' , 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin' , 'Jenis_kelamin' , 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir' , 'Tanggal_lahir' , 'required|trim');
		$this->form_validation->set_rules('kontak' , 'Kontak' , 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('dashboard/registrasi');
			$this->load->view('templates/footer');
		}
		else
		{
			$gambar     = $_FILES['gambar']['name'];
	        if($gambar = ''){}else{
	           $config ['upload_path']  = './assets/img/profile';
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
				'username' => htmlspecialchars($this->input->post('username', TRUE)),
				'password' => htmlspecialchars($this->input->post('password1', TRUE)),
				'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
				'nama_user' => htmlspecialchars($this->input->post('nama', TRUE)),
				'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
				'kota' => htmlspecialchars($this->input->post('kota', TRUE)),
				'kode_pos' => htmlspecialchars($this->input->post('kode_pos', TRUE)),
				'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', TRUE)),
				'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', TRUE)),
				'kontak' => htmlspecialchars($this->input->post('kontak', TRUE)),
				'role_id' => '2', 
				'foto' => 'ee.png'
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" 
				role="alert"> Akun Anda Telah Terdaftar . Silahkan Login </div>');
			redirect(site_url('user/login'));
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('welcome'));
	}
}
