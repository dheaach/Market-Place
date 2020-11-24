<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Produk </h1>
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
                      <th>Nama Produk</th>
                      <th>Gambar</th>
                      <th>Stok</th>
                      <th>Harga</th>
                      <th>Kondisi</th>
                      <th>Satuan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php foreach ($product as $prod): ?> 
                    <tr>
                      <td>
                        <?php echo $prod->nama ?>
                      </td>
                      <td>
                        <a href="<?php echo base_url('assets/img/produk/'.$prod->gambar) ?>" target="_blank">
                            <img src="<?php echo base_url('assets/img/produk/'.$prod->gambar) ?>" width="64" />
                        </a>
                      </td>
                      <td>
                        <?php echo $prod->stok ?>
                      </td>
                      <td>
                        <?php echo 'Rp. '.number_format($prod->harga,0,",","."); ?>
                      </td>
                      <td>
                        <?php echo $prod->kondisi ?>
                      </td>
                      <td>
                        <?php echo $prod->satuan ?>
                      </td>
                      <td>
                        <a href="#" class="btn btn-small text-warning" data-toggle="modal" data-target="#modal_edit<?php echo $prod->id;?>"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-small text-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $prod->id;?>"><i class="fas fa-trash"></i></a>
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
                <h4 align="left" class="modal-title" id="myModalLabel">Add New Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'toko/produk/save'?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="control-label col-sm-4"><i class="fas fa-leaf"></i> Nama Barang</label>
                        <div class="col-sm-8">
                            <input name="nama_barang" class="form-control" type="text" placeholder="Nama Barang" required>
                            <input type="hidden" name="kode_barang" value="<?php echo $kode;?>" readonly required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-4" ><i class="fas fa-list"></i> Kategori Barang</label>
                        <div class="col-sm-8">
                             <select name="kategori" class="form-control" required>
                              <option value="">-PILIH-</option>
                                <option value="sayur">Sayur</option>
                                <option value="buah">Buah</option>
                             </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-4" ><i class="far fa-image"></i> Gambar Barang</label>
                        <div class="col-sm-8">
                            <input name="gambar" class="form-control" type="file">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-4" ><i class="fas fa-cubes"></i> Stok Barang</label>
                        <div class="col-sm-8">
                            <input name="stok" class="form-control" type="text" placeholder="Stok" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-4" ><i class="fas fa-dollar-sign"></i> Harga Barang</label>
                        <div class="col-sm-8">
                            <input name="harga" class="form-control" type="text" placeholder="Harga" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-4" ><i class="fas fa-thumbs-up"></i> Kondisi Barang</label>
                        <div class="col-sm-8">
                            <input name="kondisi" class="form-control" type="text" placeholder="Kondisi" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-4" ><i class="fas fa-balance-scale-right"></i> Satuan Barang</label>
                         
                            <div class="col-sm-5"><input type="text" class="form-control" name="satuan1" placeholder="Satuan Barang"/></div>
                            <div class="col-sm-3"><input type="text" class="form-control" value="gram" name="satuan" readonly/></div>
                        
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
        foreach($product as $i):
            $id=$i->id;
            $nama=$i->nama;
            $kategori=$i->kategori;
            $gambar=$i->gambar;
            $stok=$i->stok;
            $harga=$i->harga;
            $kondisi=$i->kondisi;
            $satuan=$i->satuan;
        ?>
        <div class="modal fade" id="modal_edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">Edit Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'toko/produk/update'?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <input name="kode_barang" class="form-control" type="hidden" value="<?php echo $id; ?>">

                    <div class="form-group row">
                        <label class="control-label col-sm-4" ><i class="fas fa-leaf"></i> Nama Barang</label>
                        <div class="col-sm-8">
                            <input name="nama_barang" class="form-control" type="text" value="<?php echo $nama;?>" placeholder="Nama Barang" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-4" ><i class="fas fa-list"></i> Kategori Barang</label>
                        <div class="col-sm-8">
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

                    <div class="form-group row">
                        <label class="control-label col-sm-4" ><i class="far fa-image"></i> Gambar Barang</label>
                        <div class="col-sm-8">
                            <a href="<?php echo base_url('assets/img/produk/'.$gambar) ?>" target="_blank">
                                <img name="gambar" src="<?php echo base_url('assets/img/produk/'.$gambar) ?>" value="<?php echo $gambar; ?>" width="200px">
                                <input name="gambar" value="<?php echo $gambar; ?>" class="form-control" type="file">
                            </a>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-4" ><i class="fas fa-cubes"></i>  Stok Barang</label>
                        <div class="col-sm-8">
                            <input name="stok" class="form-control" type="text" value="<?php echo $stok;?>" placeholder="Stok" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-4" ><i class="fas fa-dollar-sign"></i> Harga Barang</label>
                        <div class="col-sm-8">
                            <input name="harga" class="form-control" type="text" value="<?php echo $harga;?>" placeholder="Harga" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-4" ><i class="fas fa-thumbs-up"></i> Kondisi Barang</label>
                        <div class="col-sm-8">
                            <input name="kondisi" class="form-control" type="text" value="<?php echo $kondisi;?>" placeholder="Kondisi" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-4" ><i class="fas fa-balance-scale-right"></i> Satuan Barang</label>
                        <div class="col-sm-8">
                            <input name="satuan" class="form-control" type="text" value="<?php echo $satuan;?>" placeholder="Satuan" required>
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
        foreach($product as $i):
            $id=$i->id;
            $nama=$i->nama;
            $kategori=$i->kategori;
            $gambar=$i->gambar;
            $stok=$i->stok;
            $harga=$i->harga;
            $kondisi=$i->kondisi;
            $satuan=$i->satuan;
        ?>
        <div class="modal fade" id="modal_hapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'toko/produk/delete'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $nama;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="kode_barang" value="<?php echo $id;?>">
                    <input type="hidden" name="kategori" value="<?php echo $kategori;?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach;?>
    <!--END MODAL HAPUS BARANG-->