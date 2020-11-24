<form method="POST" action="<?php echo base_url('dashboard/simpan_cart') ?>">
<div class="container-fluid" style="margin-bottom: 13%">
  <?php foreach ($barang as $brg): ?>
    <div class="card shadow p-3 bg-white rounded">
      <div class="card-body">
          <div class="row">
              <div class="col-md-4">
                  <img src="<?php echo base_url().'./assets/img/produk/'.$brg->gambar ?>" class="card-img" style="width: 100%;height: 300px">
              </div>

              <div class="col-md-8">
                    <input type="hidden" name="id" value="<?php echo $brg->id; ?>">
                    <input type="hidden" name="nama" value="<?php echo $brg->nama; ?>">
                    <input type="hidden" name="harga" value="<?php echo $brg->harga; ?>">
                    <input type="hidden" name="gambar" value="<?php echo $brg->gambar; ?>">
                    <input type="hidden" name="toko" value="<?php echo $brg->id_toko; ?>">

                    <?php $no = 0; $this->session->set_userdata('id_gambar',$brg->gambar); ?>
                      <table border="0" align="center" class="table">
                      <tr>
                          <td>Nama Produk</td>
                          <td colspan="5"><strong><?php echo $brg->nama ?></strong></td>
                      </tr>
                      <tr>
                          <td>kondisi Produk</td>
                          <td colspan="5"><strong><?php echo $brg->kondisi ?></strong></td>
                      </tr>
                      <tr>
                          <td>Stok Produk</td>
                          <td colspan="5"><strong><?php echo $brg->stok ?></strong></td>
                      </tr>
                      <tr>
                          <td>Harga Produk</td>
                          <td colspan="5"><strong><div class="btn btn-sm btn-success">Rp. <?php echo number_format($brg->harga,0,",",".") ?> / <?php echo $brg->satuan ?></div></strong></td>
                      </tr>
                      <tr>
                      <td>Jumlah</td>
                      <td width="10%"><span class="btn btn-outline-secondary" id="minus" style="border-radius: 50px"><i class="fas fa-minus"></i></span></td>
                      <td width="15%"><input type="text" class="form-control form-control-user text-center" id="count" value="1" name="qty" autocomplete="off"></td>
                      
                      <td width="10%"><span class="btn btn-outline-secondary" id="plus" style="border-radius: 50px"><i class="fas fa-plus"></i></span></td>
                      <td></td>
                      <td></td>
                      </tr>
                      </table>
              </div>
          </div>
      </div>
    </div>
  <?php endforeach; ?>
  <?php $this->load->view('admin/_partials/scrolltop.php') ?>
</div>

<footer class="bawah">
  <?php foreach($barang as $tk){ ?>
        <div class="container my-auto">
          <div class="row">
            <div class="col-sm-1">
                <img src="<?php echo base_url().'./assets/img/toko/'.$tk->logo ?>" class="card-img icon-circle" style="width: 100%;height: 100%;border: 1px solid #CCC">
            </div>
            <div class="col-sm-2">
                <h4 style="color:black"><strong><?php echo $tk->nama_toko ?></strong></h4>
                <label><small><i class="fas fa-map-marker-alt"></i> <?php echo $tk->alamat_toko ?> , <?php echo $tk->kota ?></small></label>
            </div>
            <div class="col-sm-3">
                <a href="<?php echo base_url('welcome/toko/').$tk->id_toko; ?>" class="btn btn-success mt-3" >Lihat</a>
            </div>
            <div class="col-sm-6">
            <table border="0">
                <tr>  
                    <td>
                        <button type="submit" class="btn btn-primary btn-md mr-2 mt-3">
                            <i class="fas fa-shopping-cart"></i> Keranjang
                        </button>
                    </td>
                    <td>
                        <a href="<?php echo base_url('welcome/index') ?>" class="btn btn-danger btn-md mt-3">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </td>
                </tr>
            </table>
          </div>
        </div>
        </div>
    <?php } ?>
</footer>

</form>