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
                    <h1 class="h4 text-gray-900 mb-4">Buat Toko Anda ! </h1>
                  </div>
                  <?php echo form_open_multipart('login/registration'); ?>
                  <div class="form-group">
                    <label>Logo Toko Anda</label>
                      <input type="file" name="gambar" class="form-control form-control bunder" autocomplete="off" required >
                  </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control bunder" id="nama_toko" placeholder="Nama Toko" name="nama_toko"autocomplete="off">
                      <?php echo form_error('nama_toko', '<div class="text-danger small text-center mt-1">','</div>') ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control bunder" id="alamat_toko" placeholder="Alamat Toko" name="alamat_toko" autocomplete="off">
                      <?php echo form_error('alamat_toko', '<div class="text-danger small text-center mt-1">','</div>') ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control bunder" id="kota" placeholder="Kota" name="kota" autocomplete="off">
                      <?php echo form_error('kota', '<div class="text-danger small text-center mt-1">','</div>') ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control bunder" id="kode_pos" placeholder="Kode Pos" name="kode_pos" autocomplete="off">
                      <?php echo form_error('kode_pos', '<div class="text-danger small text-center mt-1">','</div>') ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control bunder" id="kontak" placeholder="Kontak" name="kontak" autocomplete="off">
                      <?php echo form_error('kontak', '<div class="text-danger small text-center mt-1">','</div>') ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control bunder" id="keterangan" placeholder="Keterangan Toko" name="keterangan" autocomplete="off">
                      <?php echo form_error('keterangan', '<div class="text-danger small text-center mt-1">','</div>') ?>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-user btn-block" style="border-radius:50px;padding: 10px">
                      Daftar Toko
                    </button>
                    </div>
                    <?php form_close(); ?>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url('login') ?>">Sudah Punya Toko ? Gausah Kesini Gblg !</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</body>
