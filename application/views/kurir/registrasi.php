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
                    <h1 class="h4 text-gray-900 mb-4">Daftar Kurir </h1>
                  </div>
                  <form class="user" method="POST" action="<?php echo base_url('kurir_log') ?>">
                   <div class="form-group">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anda" autocomplete="off">
                    <?php echo form_error('nama', '<div class="text-danger small text-center mt-1">','</div>') ?>
                  </div>
                  <div class="form-group">
                    <select class="custom-select" name="kendaraan">
                      <option selected>Kendaraan</option>
                      <option value="Mobil">Mobil</option>
                      <option value="Sepeda Motor">Sepeda Motor</option>
                    </select>
                  </div>
                   <div class="form-group">
                    <input type="text" class="form-control" id="nopol" name="nopol" placeholder="Nomor Kendaraan Anda" autocomplete="off">
                    <?php echo form_error('nopol', '<div class="text-danger small text-center mt-1">','</div>') ?>
                  </div>
                    <br>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-user btn-block" style="border-radius:50px;padding: 10px">
                      Daftar Kurir
                    </button>
                    </div>
                    </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url('welcome') ?>">Sudah Jadi Kurir ? Ngapain Kesini !</a>
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
