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

<div class="container-fluid" style="margin-bottom: 5%;">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo base_url('./assets/img/produk/1.png') ?>" class="d-block w-100" alt="..." style="border-radius: 10px">
        </div>
        <div class="carousel-item">
          <img src="<?php echo base_url('./assets/img/produk/2.jpg') ?>" class="d-block w-100" alt="..." style="border-radius: 10px">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="row text-center mb-5 mt-3">
        <?php foreach ($barang as $brg): ?>

          <a href="<?php echo base_url('welcome/cart/').$brg->id ?>" style="text-decoration: none;color:black">
            <div class="card ml-4 mb-3 mt-2 shadow" style="width: 15.25rem;border: 1px solid #DCDCDC">
              <img style="height:170px;padding: 3px" src="<?php echo base_url().'./assets/img/produk/'.$brg->gambar ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title mb-1"><?php echo $brg->nama ?></h5>
                <small style="color:grey"><?php echo $brg->nama_toko ?></small>

                <div id="ratingDetails">   
                  <?php $rating = $this->db->select_avg('rating_produk')
                                           ->where('id_produk',$brg->id)
                                           ->where('rating_produk > 0')
                                           ->get('detil_beli')
                                           ->result();
                  foreach($rating as $rate){
                  ?>
                  <b><?php echo $rate->rating_produk ?></b>&nbsp;
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
                
                <span class="badge badge-danger">Stok : <?php echo $brg->stok ?></span>
                <span class="badge badge-success mb-3">Rp. <?php echo number_format($brg->harga,0,",",".") ?></span>

    <?php if($this->session->userdata('user_name')) { ?>
                <a href="<?php echo base_url('welcome/cart/').$brg->id ?>" class="btn btn-primary btn-sm ml-2" style="float:left"><i class="fas fa-shopping-cart fa-sm"></i> Keranjang</a>
  
                  <?php 
                    $id_beli   = $this->session->userdata('id_beli');
                    $nik   = $this->session->userdata('user_id'); 
                    $total = 0;
                  ?>
          
                  <?php $cek_data  = $this->db->where('nik', $nik)
                                              ->where('total', $total)
                                              ->limit(1)
                                              ->get('pembelian');
                if($cek_data->num_rows() > 0){ ?>
              
                  <a href="<?php echo base_url('dashboard/simpen_cart/').$brg->id ?>" class="btn btn-success btn-sm" style="width: 40%"><i class="fas fa-dollar-sign"></i> Beli</a>

                <?php }else{ ?>
                
                <form method="POST" action="<?php echo base_url('dashboard/nyimpen_cart/').$brg->id ?>">
                  <?php
                      $id       = rand()%9999999;
                      $nama     = $this->session->userdata('user_nama');
                      $kontak   = $this->session->userdata('user_kontak');
                      $alamat   = $this->session->userdata('user_alamat');
                      $kota     = $this->session->userdata('user_kota');
                      $kodepos  = $this->session->userdata('user_kodepos');
                      $toko     = $brg->id_toko;
                  ?>
                  <input type="hidden" name="id" value="<?php echo $id ?>">
                  <input type="hidden" name="nama" value="<?php echo $nama?>">
                  <input type="hidden" name="kontak" value="<?php echo $kontak?>">
                  <input type="hidden" name="alamat" value="<?php echo $alamat?>">
                  <input type="hidden" name="kota" value="<?php echo $kota?>">
                  <input type="hidden" name="kodepos" value="<?php echo $kodepos?>">
                  <input type="hidden" name="idtoko" value="<?php echo $toko?>">
                  <button type="submit" class="btn btn-success btn-sm" style="width: 40%"><i class="fas fa-dollar-sign"></i> Beli</button>
                </form>
                <?php } ?>
    <?php }else{ ?>
              <a href="<?php echo base_url('dashboard/simpen_cart/').$brg->id ?>" class="btn btn-success btn-sm btn-block"><i class="fas fa-dollar-sign"></i> Beli</a>
    <?php } ?>
            </div>
          </div>
        </a>
        <?php endforeach ?>
    </div>
    <?php $this->load->view('admin/_partials/scrolltop.php') ?>
</div>