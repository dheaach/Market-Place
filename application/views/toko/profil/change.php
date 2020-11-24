<div class="container-fluid" style="width:600px;">

          <!-- Page Heading -->
           
          <!-- DataTales Example -->
            
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="pull-left">
                Change Password
              </div>   
            </div>
            <div class="card-body">
              <?php if ($this->session->flashdata('gagal')): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('gagal'); ?>
                </div>
              <?php endif; ?>
              <div class="table-responsive">
                <table class="table" id="" width="100%" cellspacing="0">
                  <?php 
                        foreach($change as $i):
                          $idu=$i->nik;
                          $username=$i->username;
                          $password=$i->password;
                      ?>
                  <thead align="center">
                  </thead>
                  <form class="form-horizontal" method="post" action="<?php echo base_url('toko/profile/cek')?>" enctype="multipart/form-data">
                  <tbody align="left">                    
                    <tr>
                      <td width="100px">Username</td> 
                      <td><input name="username" class="form-control" type="text" value="<?php echo $username;?>"></td>
                    </tr>
                    <tr>
                      <td>Old Password</td>
                      <td><input name="oldpass" class="form-control" type="password" value=""></td>
                    </tr>
                    <tr>
                      <td>New Password</td>
                      <td>
                        <input name="newpass" id="password" class="form-control" type="password" value="">
                        <?php echo form_error('newpass', '<div class="text-danger small text-center mt-1">','</div>') ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Confrim Password</td>
                      <td>
                        <input name="conpass" id="password" class="form-control" type="password" value="">
                        <?php echo form_error('conpass', '<div class="text-danger small text-center mt-1">','</div>') ?>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center"><button style="color:white;" class="btn btn-small btn-warning" name="submit" type="submit">Change</button></td>
                    </tr>
                  </tbody>
                </form>
                </table>

              </div>
            </div>
          </div>
              <?php endforeach;?>
          </div>

</div>