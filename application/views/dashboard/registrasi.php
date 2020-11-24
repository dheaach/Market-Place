<body class="bg-gradient-success">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-7 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Buat Akun </h1>
                  </div>  
                <?php echo form_open_multipart('user/registration') ?>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" placeholder="Masukkan Username Anda" name="username"autocomplete="off">
                      <?php echo form_error('username', '<div class="text-danger small text-center mt-1">','</div>') ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nik" placeholder="NIK" name="nik" autocomplete="off">
                      <?php echo form_error('nik', '<div class="text-danger small text-center mt-1">','</div>') ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap" name="nama" autocomplete="off">
                      <?php echo form_error('nama', '<div class="text-danger small text-center mt-1">','</div>') ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="alamat" placeholder="Alamat Lengkap" name="alamat" autocomplete="off">
                      <?php echo form_error('alamat', '<div class="text-danger small text-center mt-1">','</div>') ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="kota" placeholder="Kota" name="kota" autocomplete="off">
                      <?php echo form_error('kota', '<div class="text-danger small text-center mt-1">','</div>') ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="kode_pos" placeholder="Kode Pos" name="kode_pos" autocomplete="off">
                      <?php echo form_error('kode_pos', '<div class="text-danger small text-center mt-1">','</div>') ?>
                    </div>
                    <div class="form-group">
                      <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-select">
                        <option value="Laki-Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="tanggal_lahir" placeholder="Tanggal/Bulan/Tahun" name="tanggal_lahir" autocomplete="off">
                      <?php echo form_error('tanggal_lahir', '<div class="text-danger small text-center mt-1">','</div>') ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="kontak" placeholder="Kontak" name="kontak" autocomplete="off">
                      <?php echo form_error('kontak', '<div class="text-danger small text-center mt-1">','</div>') ?>
                    </div>
                    <div class="row">
                    <div class="col-6">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password1">
                      <?php echo form_error('password', '<div class="text-danger small text-center mt-1">','</div>') ?>
                    </div>
                    <div class="col-6">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Ulang Password" name="password2">
                      <?php echo form_error('password', '<div class="text-danger small text-center mt-1">','</div>') ?>
                    </div>

                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Daftar
                    </button>
                    <?php form_close(); ?>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url('user/login') ?>">Sudah Punya akun ? Gausah Daftar Gblg !</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
    <?php $this->load->view('admin/_partials/scrolltop.php') ?>
  </div>
</body>
