
<div class="container-fluid">
    
          <!-- Page Heading -->
          <h1 class="h3 text-gray-800">Produk</h1>
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
                      <th>ID Produk</th>
                      <th>Nama</th>
                      <th>Gambar</th>
                      <th>ID Toko</th>
                      <th>Kategori</th>
                      <th>Stok</th>
                      <th>Harga</th>
                      <th>Kondisi</th>
                      <th>Satuan</th>
                      <th colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php foreach ($all as $hah): ?> 
                    <tr>
                      <td>
                        <?php echo $hah->id ?>
                      </td>
                       <td>
                        <?php echo $hah->nama ?>
                      </td>
                       <td>
                        <a href="<?php echo base_url('assets/img/produk/'.$hah->gambar) ?>" target="_blank">
                            <img src="<?php echo base_url('assets/img/produk/'.$hah->gambar) ?>" width="64" />
                        </a>
                      </td>
                      <td>
                        <?php echo $hah->id_toko ?>
                      </td>
                      <td>
                        <?php echo $hah->kategori ?>
                      </td>
                      <td>
                        <?php echo $hah->stok ?>
                      </td>
                      <td>
                        <?php echo 'Rp. '.number_format($hah->harga,0,",","."); ?>
                      </td>
                       <td>
                        <?php echo $hah->kondisi ?>
                      </td>
                      <td>
                        <?php echo $hah->satuan ?>
                      </td>
                     <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $hah->id; ?>"><i class="fas fa-edit"></i></a></td>
                    <td><a href="#" data-toggle="modal" data-target="#modal_hapus<?php echo $hah->id; ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></a></td>
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
        <h5 class="modal-title" id="exampleModalScrollableTitle">Add Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/all/add'?>" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-xs-3" >ID</label>
                <div class="col-xs-8">
                    <input name="id" class="form-control" type="text" autocomplete="off" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Nama</label>
                <div class="col-xs-8">
                    <input name="nama" class="form-control" type="text" autocomplete="off" required>
                </div>
            </div>

             <div class="form-group">
                        <label class="control-label col-xs-3" >Gambar Barang</label>
                        <div class="col-xs-8">
                            <input name="gambar" type="file">
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
                        <label class="control-label col-xs-3" >Kategori Barang</label>
                        <div class="col-xs-8">
                             <select name="kategori" class="form-control" required>
                              <option value="">-PILIH-</option>
                                <option value="sayur">Sayur</option>
                                <option value="buah">Buah</option>
                             </select>
                        </div>
                    </div>

             <div class="form-group">
                <label class="control-label col-xs-3" >Stok</label>
                <div class="col-xs-8">
                    <input name="stok" class="form-control" type="text" autocomplete="off" required>
                </div>
            </div>
             <div class="form-group">
                <label class="control-label col-xs-3" >Harga</label>
                <div class="col-xs-8">
                    <input name="harga" class="form-control" type="text" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3" >Kondisi</label>
                <div class="col-xs-8">
                    <input name="kondisi" class="form-control" type="text" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group">
                        <label class="control-label col-xs-3" >Satuan Barang</label>
                         <div class="row">
                            <div class="col-sm-8"><input type="text" class="form-control" name="satuan1"/></div>
                            <div class="col-sm-4"><input type="text" class="form-control" value="gram" name="satuan" readonly/></div>
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
        foreach($all as $hah):
            $id=$hah->id;
            $nama=$hah->nama;
            $id_toko=$hah->id_toko;
            $gambar=$hah->gambar;
            $kategori=$hah->kategori;
            $stok=$hah->stok;
            $harga=$hah->harga;
            $kondisi=$hah->kondisi;
            $satuan=$hah->satuan;
        ?>
        <div class="modal fade" id="modal_edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/all/edit'?>" enctype="multipart/form-data">
        <div class="form-group">
                        <label class="control-label col-xs-3" >ID</label>
                        <div class="col-xs-8">
                            <input name="id" class="form-control" type="text" value="<?php echo $id;?>" autocomplete="off" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-8">
                            <input name="nama" class="form-control" type="text" value="<?php echo $nama;?>" autocomplete="off" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Gambar Barang</label>
                        <div class="col-xs-8">
                            <input type="file" name="gambar" src="<?php echo base_url('assets/img/produk/'.$gambar) ?>" value="<?php echo $gambar; ?>" width="200px" type="image">
                        </div>
                    </div>


                     <div class="form-group">
                        <label class="control-label col-xs-3" >ID Toko</label>
                        <div class="col-xs-8">
                            <input name="id_toko" class="form-control" type="text" value="<?php echo $id_toko;?>" autocomplete="off" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kategori Barang</label>
                        <div class="col-xs-8">
                             <select name="kategori" class="form-control" required>
                              <option value="">-PILIH-</option>
                                <?php if($kategori=='Sayur'):?>
                                    <option value="Sayur" selected>Sayur</option>
                                    <option value="Buah">Buah</option>
                                <?php else :?>
                                    <option value="Sayur">Sayur</option>
                                    <option value="Buah" selected>Buah</option>
                                <?php endif;?>
                              </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Stok</label>
                        <div class="col-xs-8">
                            <input name="stok" class="form-control" type="text" value="<?php echo $stok;?>" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga</label>
                        <div class="col-xs-8">
                            <input name="harga" class="form-control" type="text" value="<?php echo $harga;?>" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kondisi</label>
                        <div class="col-xs-8">
                            <input name="kondisi" class="form-control" type="text" value="<?php echo $kondisi;?>" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Satuan</label>
                        <div class="col-xs-8">
                            <input name="satuan" class="form-control" type="text" value="<?php echo $satuan;?>" autocomplete="off" required>
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
        foreach($all as $hah):
            $id=$hah->id;
            $nama=$hah->nama;
            $id_toko=$hah->id_toko;
            $kategori=$hah->kategori;
            $stok=$hah->stok;
            $harga=$hah->harga;
            $kondisi=$hah->kondisi;
            $satuan=$hah->satuan;
            ?>
        <div class="modal fade" id="modal_hapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/all/delete'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $nama;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach;?>
    <!--END MODAL HAPUS BARANG-->