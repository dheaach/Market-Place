
<div class="container-fluid">
    
          <!-- Page Heading -->
          <h1 class="h3 text-gray-800">User</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="pull-right"><a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_add_new"><i class="fas fa-plus"></i> Add New</a></div>   
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" style="color:black">
                  <thead align="center">
                    <tr>
                      <th>Username</th>
                      <th>Password</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Kota</th>
                      <th>Kode Pos</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir</th>
                      <th>Kontak</th>
                      <th colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php foreach ($user as $hah): ?> 
                    <tr>
                      <td>
                        <?php echo $hah->username ?>
                      </td>
                      <td>
                        <?php echo $hah->password ?>
                      </td>
                      <td>
                        <?php echo $hah->nik ?>
                      </td>
                      <td>
                        <?php echo $hah->nama_user ?>
                      </td>
                      <td>
                        <?php echo $hah->alamat ?>
                      </td>
                      <td>
                        <?php echo $hah->kota ?>
                      </td>
                      <td>
                        <?php echo $hah->kode_pos ?>
                      </td>
                      <td>
                        <?php echo $hah->jenis_kelamin ?>
                      </td>
                      <td>
                        <?php echo $hah->tanggal_lahir ?>
                      </td>
                      <td>
                        <?php echo $hah->kontak ?>
                      </td>
                     <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $hah->nik; ?>"><i class="fas fa-edit"></i></a></td>
                    <td><a href="#" data-toggle="modal" data-target="#modal_hapus<?php echo $hah->nik; ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php endforeach;?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
<!-- ============ MODAL ADD BARANG =============== -->
<div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="color:black">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/add_user/add'?>" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-xs-3" >Username</label>
                <div class="col-xs-8">
                    <input name="username" class="form-control" type="text" autocomplete="off" required>
                </div>
            </div>

             <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-8">
                            <input name="password" class="form-control" type="text" autocomplete="off" required>
                        </div>
                    </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >NIK</label>
                <div class="col-xs-8">
                    <input name="nik" class="form-control" type="text" autocomplete="off"  required>
                </div>
            </div>

           <div class="form-group">
                <label class="control-label col-xs-3" >Nama Lengkap</label>
                    <div class="col-xs-8">
                        <input name="nama_user" class="form-control" type="text" autocomplete="off" required>
                    </div>
            </div>

             <div class="form-group">
                <label class="control-label col-xs-3" >Alamat</label>
                    <div class="col-xs-8">
                          <input name="alamat" class="form-control" type="text" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >kota</label>
                        <div class="col-xs-8">
                            <input name="kota" class="form-control" type="text" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Pos</label>
                        <div class="col-xs-8">
                            <input name="kode_pos" class="form-control" type="text" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Lahir</label>
                        <div class="col-xs-8">
                            <input name="tanggal_lahir" class="form-control" type="text" placeholder="Tanggal/Bulan/Tahun" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kontak</label>
                        <div class="col-xs-8">
                            <input name="kontak" class="form-control" type="text" autocomplete="off" required>
                        </div>
                    </div>

                </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
    <!--END MODAL ADD BARANG-->
    <!-- ============ MODAL EDIT BARANG =============== -->
   
    <?php 
        foreach($user as $hah):
            $username=$hah->username;
            $password=$hah->password;
            $nik=$hah->nik;
            $nama=$hah->nama_user;
            $alamat=$hah->alamat;
            $kota=$hah->kota;
            $kode_pos=$hah->kode_pos;
            $jenis_kelamin=$hah->jenis_kelamin;
            $tanggal_lahir=$hah->tanggal_lahir;
            $kontak=$hah->kontak;

        ?>
        <div class="modal fade" id="modal_edit<?php echo $nik;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/add_user/edit'?>" enctype="multipart/form-data">
        <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-8">
                            <input name="username" class="form-control" type="text" value="<?php echo $username;?>" autocomplete="off" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-8">
                            <input name="password" class="form-control" type="text" value="<?php echo $password;?>" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIK</label>
                        <div class="col-xs-8">
                            <input name="nik" class="form-control" type="text" value="<?php echo $nik;?>" autocomplete="off" readonly>
                        </div>
                    </div>

                                 

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-8">
                            <input name="alamat" class="form-control" type="text" value="<?php echo $alamat;?>" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kota</label>
                        <div class="col-xs-8">
                            <input name="kota" class="form-control" type="text" value="<?php echo $kota;?>" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Pos</label>
                        <div class="col-xs-8">
                            <input name="kode_pos" class="form-control" type="text" value="<?php echo $kode_pos;?>" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jenis Kelamin</label>
                        <div class="col-xs-8">
                            <input name="jenis_kelamin" class="form-control" type="text" value="<?php echo $jenis_kelamin;?>" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Lahir</label>
                        <div class="col-xs-8">
                            <input name="tanggal_lahir" class="form-control" type="text" value="<?php echo $tanggal_lahir;?>" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kontak</label>
                        <div class="col-xs-8">
                            <input name="password" class="form-control" type="text" value="<?php echo $kontak;?>" autocomplete="off" required>
                        </div>
                    </div>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        <button type = "submit" class="btn btn-info">Update</button>
      </div>
  </form>
    </div>
  </div>
</div>

    <?php endforeach;?>
    <!--END MODAL EDIT BARANG-->
    <!-- ============ MODAL HAPUS BARANG =============== -->
    <?php 
        foreach($user as $hah):
            $username=$hah->username;
            $password=$hah->password;
            $nik=$hah->nik;
            $nama=$hah->nama_user;
            $alamat=$hah->alamat;
            $kota=$hah->kota;
            $kode_pos=$hah->kode_pos;
            $jenis_kelamin=$hah->jenis_kelamin;
            $tanggal_lahir=$hah->tanggal_lahir;
            $kontak=$hah->kontak;
            

        ?>
        <div class="modal fade" id="modal_hapus<?php echo $nik;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/add_user/delete'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $nama;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="nik" value="<?php echo $nik;?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach;?>
    <!--END MODAL HAPUS BARANG-->