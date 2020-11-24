
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Kurir </h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="pull-left"><a href="#" data-toggle="modal" data-target="#modal_add_new"><i class="fas fa-plus"></i> Add New</a></div>   
            </div>
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead align="center">
                    <tr>
                      
                      <th>Nama Kurir</th>
                      <th>Kendaraan</th>
                      <th>No.Polisi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php foreach ($kurir as $prod): ?> 
                    <tr>
                      
                      <td>
                        <?php echo $prod->nama ?>
                      </td>
                      <td>
                        <?php echo $prod->kendaraan ?>
                      </td>
                      <td>
                        <?php echo $prod->nopol ?>
                      </td>
                      <td>
                        <a href="#" class="btn btn-small text-warning" data-toggle="modal" data-target="#modal_edit<?php echo $prod->id_kurir;?>"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-small text-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $prod->id_kurir;?>"><i class="fas fa-trash"></i></a>
                    </td>
                    </tr>
                    <?php endforeach;?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
<!-- ============ MODAL ADD BARANG =============== -->
        <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 align="left" class="modal-title" id="myModalLabel">Tambah Kurir</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'toko/kurir/save'?>" enctype="multipart/form-data">
                <div class="modal-body">

                    <input name="id_kurir" class="form-control" type="hidden" value="<?php echo $kode;?>" required>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" ><i class="fas fa-biking"></i> Nama Kurir</label>
                        <div class="col-xs-8">
                            <input name="nama" class="form-control" type="text" placeholder="Nama Kurir" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" ><i class="fas fa-motorcycle"></i>  Kendaraan</label>
                        <div class="col-xs-8">
                             <select name="kendaraan" class="form-control" required>
                              <option value="">-PILIH-</option>
                                <option value="motor">Sepeda Motor</option>
                                <option value="mobil">Mobil</option>
                             </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" ><i class="fas fa-tachometer-alt"></i> No.Polisi</label>
                        <div class="col-xs-8">
                            <input name="nopol" class="form-control" type="text" placeholder="No Polisi" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <!--END MODAL ADD BARANG-->
   <!-- ============ MODAL EDIT BARANG =============== -->
    <?php 
        foreach($kurir as $i):
            $id=$i->id_kurir;
            $nama=$i->nama;
            $kendaraan=$i->kendaraan;
            $nopol=$i->nopol;
        ?>
        <div class="modal fade" id="modal_edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">Edit Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'toko/kurir/update'?>">
                <div class="modal-body">

                    
                    
                            <input name="id" class="form-control" type="hidden" value="<?php echo $id;?>" placeholder="ID" required readonly>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" ><i class="fas fa-biking"></i> Nama Kurir</label>
                        <div class="col-xs-8">
                            <input name="nama" class="form-control" type="text" value="<?php echo $nama;?>" placeholder="Nama" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" ><i class="fas fa-motorcycle"></i> Kendaraan</label>
                        <div class="col-xs-8">
                            <select name="kendaraan" class="form-control" required>
                              <option value="">-PILIH-</option>
                              <?php if($kendaraan=='motor'):?>
                                <option value="motor" selected>Sepeda Motor</option>
                                <option value="mobil">Mobil</option>
                              <?php else :?>
                                <option value="motor">Sepeda Motor</option>
                                <option value="mobil" selected>Mobil</option>
                            <?php endif;?>
                             </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" ><i class="fas fa-tachometer-alt"></i> No.Polisi</label>
                        <div class="col-xs-8">
                            <input name="nopol" class="form-control" type="text" value="<?php echo $nopol;?>" placeholder="Nopol" required>
                        </div>
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
    <!--END MODAL EDIT BARANG-->
    <!-- ============ MODAL HAPUS BARANG =============== -->
    <?php 
        foreach($kurir as $i):
            $id=$i->id_kurir;
            $nama=$i->nama;
            $kendraan=$i->kendaraan;
            $nopol=$i->nopol;
        ?>
        <div class="modal fade" id="modal_hapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'toko/kurir/delete'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $nama;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_kurir" value="<?php echo $id;?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach;?>
    <!--END MODAL HAPUS BARANG-->