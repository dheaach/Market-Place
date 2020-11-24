<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
.stir-rating {
  line-height:32px;
  font-size:14px;
  padding: 2px;
}

.star-rating {
  line-height:32px;
  font-size:1.2rem;
}

.star-rating .fa-star{
    color: #FFD700;
}

.anu{
    -webkit-text-stroke:5px #FFD700;
}

.inu{
    color: yellow;
    -webkit-text-stroke:6px #CCC;
}
</style>

<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Rating & Komentar </h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead align="center">
                    <tr>
                      <th>Tanggal</th>
                      <th>Nama Toko</th>
                      <th>Produk</th>
                      <th>Rating Produk</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php foreach ($produk as $prod): ?> 
                    <tr>
                      <td><b><?php echo $prod->tanggal ?></b></td>
                      <td>
                        <?php echo $prod->nama_toko ?>
                      </td>
                      <td width="15%">
                        <b><?php echo $prod->nama ?></b>
                        <img src="<?php echo base_url('assets/img/produk/'.$prod->gambar) ?>" width="100" />
                      </td>
                      <td>
                          <div id="ratingDetails">   
                            <h4 class="bold"><?php echo $prod->rating_produk ?> <small>/ 5</small></h4>
                            <?php $rating = $this->db->select_avg('rating_produk')
                                           ->where('id_produk',$prod->id)
                                           ->where('rating_produk > 0')
                                           ->get('detil_beli')
                                           ->result();
                              foreach($rating as $rate){
                            ?>
                                <?php
                                  $averageRating = $rate->rating_produk;
                                  for ($i = 1; $i <= 5; $i++) {
                                    $ratingClass = "btn-default inu";
                                    if($i <= $averageRating) {
                                      $ratingClass = "btn-default anu";
                                    }
                                ?>
                                <div class="stir-rating" style="display: inline-block;">
                                    <span class="fa fa-star-o <?php echo $ratingClass; ?>" aria-hidden="true"></span>
                                </div> 
                              <?php }} ?>       
                          </div> 
                          <?php 
                              $ulasan = $this->db->select('*')
                                                 ->from('detil_beli')
                                                 ->where('id_produk',$prod->id_produk)
                                                 ->where('rating_produk > 0')
                                                 ->get()
                                                 ->num_rows();
                          ?>
                          (<?php echo $ulasan ?>) Ulasan                       
                      </td>
                      <td>
                        <a href="#" class="btn btn-small btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $prod->id_detil;?>"><i class="fas fa-thumbs-up"></i> Berikan Tanggapan</a>
                    </td>
                    </tr>
                    <?php endforeach;?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      <?php $this->load->view('admin/_partials/scrolltop.php') ?>
</div>
<!-- ============ MODAL ADD BARANG =============== -->
    <?php 
        foreach($produk as $i):
            $id=$i->id_detil;
            $namab=$i->nama;
            $namat=$i->nama_toko;
            $gambar=$i->gambar;
            $harga=$i->harga;
        ?>

        <div class="modal fade" id="modal_edit<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 align="left" class="modal-title" id="myModalLabel">Rating & Komentar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <label class="control-label col-sm-4" >Toko</label>
                        <div class="col-sm-8">
                            <input name="nama_toko" class="form-control" type="text" value="<?php echo $namat; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-4" >Barang</label>
                        <div class="col-sm-8">
                            <label class="form-control" ><?php echo $namab;?></label>
                            <img class="img-thumbnail" src="<?php echo base_url('assets/img/produk/'.$gambar) ?>" width="200" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-4" >Harga</label>
                        <div class="col-sm-8">
                            <input name="harga" class="form-control" type="text" value="<?php echo 'Rp. '.number_format($harga,0,",","."); ?>"  readonly>
                        </div>
                    </div>
                <form name="f1" method="post" action="<?php echo base_url().'dashboard/rate'?>">
                    <div class="form-group row">
                        <input type="hidden" name="id_detil" value="<?php echo $i->id_detil;?>"/>
                        <input type="hidden" name="id_produk" value="<?php echo $i->id_produk;?>"/>
                        <input type="hidden" name="id_toko" value="<?php echo $i->id_toko;?>"/>
                        <label class="control-label col-sm-4" >Rating</label>
                        <div class="col-sm-8 row">
                            <div class="star-rating ml-3">
                                <span class="fa fa-star-o" data-rating="1"></span>
                                <span class="fa fa-star-o" data-rating="2"></span>
                                <span class="fa fa-star-o" data-rating="3"></span>
                                <span class="fa fa-star-o" data-rating="4"></span>
                                <span class="fa fa-star-o" data-rating="5"></span>
                              <?php 
                                    $imbil = $this->db->select('*')
                                                      ->where('id_detil',$i->id_detil)
                                                      ->get('detil_beli');
                                    foreach ($imbil->result() as $len) { ?>
                                      <input type="hidden" name="rating" class="rating-value" value="<?php echo $len->rating_produk;?>" required>

                              <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-4" >Komentar</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="komentar"><?php echo $i->komen;?></textarea>
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
    <?php endforeach;?>  