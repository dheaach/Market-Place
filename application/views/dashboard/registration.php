

  <div class="container-fluid">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="POST" action="<?php echo base_url('user/regis'); ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>" autocomplete="off">
                  <?= form_error('username' , '<small class="text-danger pl-3">' , '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="NIK" value="<?= set_value('nik'); ?>" autocomplete="off">
                  <?= form_error('nik' , '<small class="text-danger pl-3">' , '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Full Name" value="<?= set_value('nama'); ?>" autocomplete="off">
                  <?= form_error('nama' , '<small class="text-danger pl-3">' , '</small>'); ?>
                </div>
                 <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Address" value="<?= set_value('alamat'); ?>" autocomplete="off">
                  <?= form_error('alamat' , '<small class="text-danger pl-3">' , '</small>'); ?>
                </div>
                 <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="kota" name="kota" placeholder="City" value="<?= set_value('kota'); ?>" autocomplete="off">
                  <?= form_error('kota' , '<small class="text-danger pl-3">' , '</small>'); ?>
                </div>
                 <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="kode_pos" name="kode_pos" placeholder="Pos Code" value="<?= set_value('kode_pos'); ?>" autocomplete="off">
                  <?= form_error('kode_pos' , '<small class="text-danger pl-3">' , '</small>'); ?>
                </div>
                 <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="jenis_kelamin" name="jenis_kelamin" placeholder="Gender" value="<?= set_value('jenis_kelamin'); ?>"
                  autocomplete="off"> 
                  <?= form_error('jenis_kelamin' , '<small class="text-danger pl-3">' , '</small>'); ?>
                </div>
                 <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="tanggal" name="tanggal" placeholder="Date" value="<?= set_value('tanggal'); ?>" autocomplete="off">
                  <?= form_error('tanggal' , '<small class="text-danger pl-3">' , '</small>'); ?>
                </div>
                 <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="kontak" name="kontak" placeholder="Number Telp" value="<?= set_value('kontak'); ?>" autocomplete="off">
                  <?= form_error('kontak' , '<small class="text-danger pl-3">' , '</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password" autocomplete="off">
                    <?= form_error('password1' , '<small class="text-danger pl-3">' , '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password" autocomplete="off">
                  </div>                
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
                
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= base_url('user/login')   ?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('admin/_partials/scrolltop.php') ?>
  </div>
