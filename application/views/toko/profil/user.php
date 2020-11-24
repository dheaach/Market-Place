<div class="container-fluid" style="margin-bottom: 7%">
  <?php foreach ($user as $a): 
    $nama=$a->nama_user;
    $username=$a->username;
    $password=$a->password;
    $alamat=$a->alamat;
    $kota=$a->kota;
    $jenis_kelamin=$a->jenis_kelamin;
    $tanggal_lahir=$a->tanggal_lahir;
    $kontak=$a->kontak;
    $foto=$a->foto;
    ?>
    <?php if($this->session->flashdata('success')) : ?>
          <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php endif ;?>
    <div class="card">
      <h5 class="card-header"><?php echo $nama ?></h5>
      <div class="card-body" >
         <?php $nik=$this->session->userdata("user_id"); ?>
          <div class="row">
              <div class="col-md-4">
                  <img src="<?php echo base_url().'./assets/img/profile/'.$foto ?>" class="card-img-top" style="width: 80%">
                  <br><br>

                  <?php //--------------------------------- ?>

                    <div class="image-upload">
                      <button for="file-input" type="button" class="btn btn-outline-primary mb-3" style="width:82%"><i class="fas fa-user-edit"></i> Ubah Foto
                      <input type="file" name="foto" id="file-input"></button>
                    </div>

                  <?php //--------------------------------- ?>

                  <br>
                  <button type="submit" style="width:270px;" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#ubahusername<?php echo $nik; ?>">
                     <i class="fas fa-pen-square"></i>
                        Ubah Username
                  </button>
                   
                  
              </div>

              <div class="col-md-8">
                  <form method="post" action="<?php echo base_url('toko/profile/updateprof'); ?>">
                      <table border="0" align="center" class="table">
                      <tr>
                          <td><i class="far fa-user"></i> Nama</td>
                           <td colspan="5"><strong>
                            <input name="nama" class="form-control" value="<?php echo $nama ?>">
                            <input type="hidden" name="nik" class="form-control" value="<?php echo $nik ?>">
                          </strong></td>
                      </tr>
                      <tr>
                          <td><i class="fas fa-map-marked-alt"></i> Alamat</td>
                           <td colspan="5"><strong><input name="alamat" class="form-control" value="<?php echo $alamat ?>"></strong></td>
                      </tr>
                      <tr>
                          <td><i class="fas fa-place-of-worship"></i> Kota</td>
                           <td colspan="5"><strong><input name="kota" class="form-control" value="<?php echo $kota ?>"></strong></td>
                      </tr>
                      <tr>
                          <td><i class="fas fa-venus-mars"></i> Jenis Kelamin</td>
                              <?php if($jenis_kelamin == "l") {?>
                          <td colspan="2">
                           
                                <input name="jenis_k" type="radio" value="l" checked>LAKI - LAKI
                            
                          </td>
                          <td colspan="2">
                            
                                <input name="jenis_k" type="radio" value="p">PEREMPUAN
                            
                          </td>
                              <?php
                              }else {?>
                          <td colspan="2">
                            
                                <input name="jenis_k" type="radio" value="l">LAKI - LAKI
                            
                          </td>
                          <td colspan="2">
                            
                                <input name="jenis_k" type="radio" value="p" checked>PEREMPUAN
                            
                          </td>
                              <?php } ?>
                          <td>
                          </td>
                      </tr>
                      <tr>
                          <td><i class="far fa-calendar-alt"></i> Tanggal Lahir</td>
                          <td colspan="5"><strong><input name="tl" class="form-control" value="<?php echo $tanggal_lahir ?>"></strong></td>
                      </tr>
                      <tr>
                          <td><i class="fas fa-phone"></i> Kontak</td>
                          <td colspan="5"><strong><input name="kontak" class="form-control" value="<?php echo $kontak ?>"></strong></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center">
                          <button class="btn btn-primary btn-sm">
                        <i class="far fa-edit"></i>
                        Ubah
                      </button>
                        </td>
                      </tr>
              
                      </table>
                          
                      
                  </form>
              </div>
          </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<!-----------------------MODAL UBAH POTO-------------------------------------------------------------------->

<div class="modal fade" id="ubahfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahfoto">Ubah Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group image-preview ">
                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif, image/jpg" name="input-file-preview"/> <!-- rename it -->
                    </div>
                </span>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!---------------------------END------------------------------------------>

<!--------------------------MODAL UBAH USER-------------------------------->
<?php 
  foreach ($user as $b) :
    $username=$b->username;
    $nik=$b->nik;
 ?>

<div class="modal fade" id="ubahusername<?php echo $nik;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahfoto">Ubah Username</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form class="form-horizontal" method="post" action="<?php echo base_url().'toko/profile/ubahusername'?>">
      <div class="modal-body">

          <div class="form-group">
            <input type="text" class="form-control form-control-user" value="<?php echo $username; ?>" readonly>
          </div>

          <div class="form-group">
            <input type="text" name="username" class="form-control form-control-user" placeholder="Username Baru" id="username">
             <?php echo form_error('username', '<div class="text-danger small text-center mt-1">','</div>') ?>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary tombol-ubah">Ubah</button>
      </div>
  </form>
    </div>
  </div>
</div>

<?php endforeach ; ?>
<!------------------------------END--------------------------------------------------------------------->

<!------------------------------MODAL UBAH PASS---------------------------------------------------------->

<?php 
  foreach ($user as $c) :
    $password=$c->password;
    $nik=$c->nik;
 ?>

<div class="modal fade" id="ubahpassword<?php echo $nik;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahfoto">Ubah Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form class="form-horizontal" method="post" action="<?php echo base_url().'toko/profile/ubahpassword'?>">
      <div class="modal-body">

          <div class="form-group">
            <input type="text" class="form-control form-control-user" value="<?php echo $password; ?>" readonly>
          </div>

          <div class="form-group">
            <input type="password" name="password" class="form-control form-control-user" placeholder="Password Baru" id="password">
             <?php echo form_error('password', '<div class="text-danger small text-center mt-1">','</div>') ?>
          </div>
 
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Ubah</button>
      </div>
     </form>
  </div>
</div>
<?php endforeach ; ?>
