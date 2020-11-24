<div class="container-fluid"style="margin-bottom: 7%">
  <?php foreach ($profil as $a): ?>
    <div class="card">
      <h5 class="card-header"><?php echo $a->nama_user ?></h5>
      <div class="card-body">
          <div class="row">
              <div class="col-md-4 text-center">
                <div class="row">
                 <div class="card" style="width: 100%;height: 20rem;padding: 5px">
                 <div class="row-sm-8">
                   <img src="<?php echo base_url().'./assets/img/profile/'.$a->foto ?>" class="card-img shadow" style="height: 308px;" id="thumbnil" alt="">
                 </div>
                 </div>
                 <br>
                 <div class="row-sm-4" style="width:100%;">

                <form method="post" action="<?php echo base_url().'profile/ubah_profil' ?>" enctype="multipart/form-data">
                  <?php //--------------------------------- ?>

                      

                  <?php //--------------------------------- ?>
                 </div>
              </div>
            </div>

            <div class="col-md-8">
                  <table border="0" align="center" class="table ml-3">
                      <tr>
                          <td width="30%">Nama</td>
                           <td colspan="2"><strong><input type="text" name="nama" class="form-control" value="<?php echo $a->nama_user ?>" autocomplete="off"></strong></td>
                      </tr>
                      <tr>
                          <td>Alamat</td>
                           <td colspan="2"><strong><input type="text" name="alamat" class="form-control" value="<?php echo $a->alamat ?>"></strong></td>
                      </tr>
                      <tr>
                          <td>Kota</td>
                           <td colspan="2"><strong><input type="text" name="kota" class="form-control" value="<?php echo $a->kota ?>"></strong></td>
                      </tr>
                      <tr>
                          <td>Jenis Kelamin</td>
                           <td colspan="2"><strong><input type="text" name="jenkel" class="form-control" value="<?php echo $a->jenis_kelamin ?>"></strong></td>
                      </tr>
                      <tr>
                          <td>Kontak</td>
                          <td colspan="2"><strong><input type="text" name="nomer" class="form-control" value="<?php echo $a->kontak ?>"></strong></td>
                      </tr>
              
                  </table>
                          
                      <button type="submit" class="btn btn-primary btn-sm ml-4 mt-2"><i class="fas fa-edit"></i> Ubah</button>
                
                      <a href="#" class="btn btn-outline-success btn-sm mt-2" data-toggle="modal" data-target="#ubahusername<?php echo $a->nik;?>"><i class="fas fa-edit"></i> Ubah Username Dan Password</a>
                    </form>
                  </div>
            </div>  
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  <?php $this->load->view('admin/_partials/scrolltop.php') ?>
</div>





<!--------------------------MODAL UBAH USER-------------------------------->

<?php 
        foreach($profil as $i):
        $nik = $i->nik;
        $username = $i->username;
        $password = $i->password;
?>
        <div class="modal fade" id="ubahusername<?php echo $nik;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">Edit Username Dan Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'profile/ubahusername'?>">
                <div class="modal-body">

                      <input name="nik" class="form-control" type="hidden" value="<?php echo $nik;?>">
                    <div class="form-group">
                      <input type="text" value="<?php echo $username ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-8">
                            <input name="username" class="form-control" type="text" placeholder="Masukkan Username Baru" required>
                        </div>
                    </div>
                    <div class="form-group">
                      <input type="text" value="<?php echo $password ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-8">
                            <input name="password" class="form-control" type="text" placeholder="Masukkan password Baru" required>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
<?php endforeach;?>

<!------------------------------------------------------------------------------------------->
