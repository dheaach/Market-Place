
<div class="container-fluid">
    
          <!-- Page Heading -->
          <h1 class="h3 text-gray-800">Kurir</h1>
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
                      <th>ID Kurir</th>
                      <th>ID Toko</th>
                      <th>ID User</th>
                      <th>Nama</th>
                      <th>Kendaraan</th>
                      <th>Nopol</th>
                      <th colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php foreach ($kurir as $hah): ?> 
                    <tr>
                      <td>
                        <?php echo $hah->id_kurir ?>
                      </td>
                       <td>
                        <?php echo $hah->id_toko ?>
                      </td>
                      <td>
                        <?php echo $hah->id_user ?>
                      </td>
                      <td>
                        <?php echo $hah->nama ?>
                      </td>
                      <td>
                        <?php echo $hah->kendaraan ?>
                      </td>
                      <td>
                        <?php echo $hah->nopol ?>
                      </td>
                     <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $hah->id_kurir; ?>"><i class="fas fa-edit"></i></a></td>
                    <td><a href="#" data-toggle="modal" data-target="#modal_hapus<?php echo $hah->id_kurir; ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></a></td>
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
        <h5 class="modal-title" id="exampleModalScrollableTitle">Add Kurir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/add_kurir/add'?>" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-xs-3" >ID Kurir</label>
                 <div class="h7 mb-0 font-weight text-gray-800">*Inputkan ID Kurir yang sesuai</div>
                <div class="col-xs-8">
                    <input name="id_kurir" class="form-control" type="text" autocomplete="off" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >ID Toko</label>
                 <div class="h7 mb-0 font-weight text-gray-800">*Inputkan ID Toko yang sesuai</div>
                <div class="col-xs-8">
                    <input name="id_toko" class="form-control" type="text" autocomplete="off" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >ID User</label>
                 <div class="h7 mb-0 font-weight text-gray-800">*Inputkan ID User yang sesuai</div>
                <div class="col-xs-8">
                    <input name="id_user" class="form-control" type="text" autocomplete="off" required>
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-xs-3" >Nama</label>
                <div class="col-xs-8">
                    <input name="nama" class="form-control" type="text" autocomplete="off" required>
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-xs-3" >Kendaraan</label>
                <div class="col-xs-8">
                    <input name="kendaraan" class="form-control" type="text" autocomplete="off" required>
                </div>
            </div>
             <div class="form-group">
                <label class="control-label col-xs-3" >Nopol</label>
                <div class="col-xs-8">
                    <input name="nopol" class="form-control" type="text" autocomplete="off" required>
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
        foreach($kurir as $hah):
            $id_kurir=$hah->id_kurir;
            $id_toko=$hah->id_toko;
            $id_user=$hah->id_user;
            $nama=$hah->nama;
            $kendaraan=$hah->kendaraan;
            $nopol=$hah->nopol;

        ?>
        <div class="modal fade" id="modal_edit<?php echo $id_kurir;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/add_kurir/edit'?>" enctype="multipart/form-data">
        <div class="form-group">
                        <label class="control-label col-xs-3" >ID Kurir</label>
                        <div class="col-xs-8">
                            <input name="id_kurir" class="form-control" type="text" value="<?php echo $id_kurir;?>" autocomplete="off" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID Toko</label>
                        <div class="col-xs-8">
                            <input name="id_toko" class="form-control" type="text" value="<?php echo $id_toko;?>" autocomplete="off" readonly>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >ID User</label>
                        <div class="col-xs-8">
                            <input name="id_user" class="form-control" type="text" value="<?php echo $id_user;?>" autocomplete="off" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-8">
                            <input name="nama" class="form-control" type="text" value="<?php echo $nama;?>" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kendaraan</label>
                        <div class="col-xs-8">
                            <input name="kendaraan" class="form-control" type="text" value="<?php echo $kendaraan;?>" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nopol</label>
                        <div class="col-xs-8">
                            <input name="nopol" class="form-control" type="text" value="<?php echo $nopol;?>" autocomplete="off" required>
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
        foreach($kurir as $hah):
             $id_kurir=$hah->id_kurir;
             $id_toko=$hah->id_toko;
              $id_user=$hah->id_user;
            $nama=$hah->nama;
            $kendaraan=$hah->kendaraan;
            $nopol=$hah->nopol;

            

        ?>
        <div class="modal fade" id="modal_hapus<?php echo $id_kurir;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/add_kurir/delete'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $nama;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_kurir" value="<?php echo $id_kurir;?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach;?>
    <!--END MODAL HAPUS BARANG-->

