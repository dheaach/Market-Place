<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Produk </h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="pull-right"><a href="#" data-toggle="modal" data-target="#modal_add_new"><i class="fas fa-plus"></i> Add New</a></div>   
            </div>
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
                      <td><a href="<?php echo base_url('assets/img/produk/'.$prod->gambar) ?>" target="_blank">
                        <img src="<?php echo base_url('assets/img/produk/'.$prod->gambar) ?>" width="64" /></a>
                      </td>
                      <td>
                        <?php echo $prod->stok ?>
                      </td>
                      <td>
                        <?php echo 'Rp '.number_format($prod->harga); ?>
                      </td>
                      <td>
                        <?php echo $prod->kondisi ?>
                      </td>
                      <td>
                        <?php echo $prod->satuan ?>
                      </td>
                      <td>
                        <a href="#" class="btn btn-small" data-toggle="modal" data-target="#modal_edit<?php echo $prod->id_produk;?>"><i class="fas fa-edit"></i> Edit</a>
                        <a href="#" class="btn btn-small text-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $prod->id_produk;?>"><i class="fas fa-trash"></i> Hapus</a>
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

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-8">
                            <input name="nama_barang" class="form-control" type="text" placeholder="Nama Barang..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kategori</label>
                        <div class="col-xs-8">
                             <select name="kategori" class="form-control" required>
                              <option value="">-PILIH-</option>
                                <option value="sayur">Sayur</option>
                                <option value="buah">Bauh</option>
                             </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Gambar</label>
                        <div class="col-xs-8">
                            <input name="gambar" type="file">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Stok</label>
                        <div class="col-xs-8">
                            <input name="stok" class="form-control" type="text" placeholder="Stok..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga</label>
                        <div class="col-xs-8">
                            <input name="harga" class="form-control" type="text" placeholder="Harga..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kondisi</label>
                        <div class="col-xs-8">
                            <input name="kondisi" class="form-control" type="text" placeholder="Kondisi..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Satuan</label>
                        <div class="col-xs-8">
                            <input name="satuan" class="form-control" type="text" placeholder="Satuan..." required>
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