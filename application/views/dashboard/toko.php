<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
.stir-rating {
  line-height:32px;
  font-size:14px;
  padding: 3px;
}

.star-rating {
  line-height:32px;
  font-size:1.2rem;
}

.star-rating .fa-star{
    color: #FFD700;
}

.anu{
    -webkit-text-stroke:6px #FFD700;
}

.inu{
    color: yellow;
    -webkit-text-stroke:6px #CCC;
}
</style>

<div class="container-fluid mb-5">
  <?php foreach ($toko as $tk) { ?>
  <div class="card shadow" style="color:black;width: 100%">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-1">
                    <img src="<?php echo base_url().'./assets/img/toko/'.$tk->logo ?>" class="card-img icon-circle" style="width: 100%;height: 100%;border: 1px solid #CCC">
                </div>
          <div class="col-sm-2 text-left">
            <h4><strong><?php echo $tk->nama_toko ?></strong></h4>
            <label><small><i class="fas fa-map-marker-alt"></i> <?php echo $tk->alamat_toko ?> , <?php echo $tk->kota ?></small></label>
          </div>
          <div class="col-sm-3 text-center" style="border-right:1px solid #CCC">
            <a href="#" class="btn btn-success mt-3">Chat <i class="fas fa-comments"></i></a>
            <a href="#" class="btn btn-outline-secondary mt-3">Info Toko <i class="fas fa-info-circle"></i></a>
          </div>
          <div class="col-sm-2 text-center">
            <h6 class="card-title">Produk Terjual</h6>
            <?php foreach ($akeh as $keh) { ?>
                <p class="card-text mt-3"><strong style="font-size: 20px"><?php echo number_format($keh->jumlah,0,",",".") ?></strong></p>
            <?php } ?>
          </div>
          <div class="col-sm-4">
            <h6 class="card-title">Nilai Kualitas Produk</h6>
            <div id="ratingDetails">   
                  <?php $binatang = $this->db->select_avg('rating_produk')
                                             ->where('id_toko',$tk->id_toko)
                                             ->where('rating_produk > 0')
                                             ->get('detil_beli')
                                             ->result();
                  foreach($binatang as $zoo){
                  ?>
                  <b><?php echo $zoo->rating_produk ?></b>&nbsp;
                    <?php
                      $averageRating = $zoo->rating_produk;
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
                    &nbsp; &nbsp; 
                    ( <strong><?php echo $jumlah ?></strong> ) Ulasan   
            </div> 
          </div>
      </div>
    </div>
  </div>
  <?php } ?>

  <div class="wisata mt-4">
    <script src="<?php echo base_url('assets/js/fungsi.js') ?>" type="text/javascript"></script>
    <ul class="menuwis">
      <li><a href="javascript:tabSwitch('tab_1', 'content1');" id="tab_1" class="active">Produk</a></li>
      <li><a href="javascript:tabSwitch('tab_2', 'content2');" id="tab_2">Ulasan</a></li>
    </ul>

<form method="post" action="<?php echo base_url('welcome/cari') ?>">
  <div id="content1">
    <div class="row text-center mt-3">
      <div class="col-sm-7"></div>
      <div class="col-sm-5">
        <div class="input-group mt-1 mb-2 mr-2">
            <input type="text" class="form-control" name="cari" placeholder="Cari Produk">
            <div class="input-group-append">
              <button class="input-group-text" type="submit"><i class="fas fa-search"></i>&nbsp; Cari</button>
            </div>
        </div>
      </div>
    </div>
</form>
    <div class="row text-center mb-2 mt-2">
        <?php foreach ($barang as $brg): ?>

          <a href="<?php echo base_url('welcome/cart/').$brg->id ?>" style="text-decoration: none;color:black">
            <div class="card mb-3 mt-2 shadow" style="width: 15.7rem;border: 1px solid #DCDCDC;float:left;margin-left: 11px;margin-right: 10px">
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
    </div>

    <?php $this->load->view('admin/_partials/scrolltop.php') ?>

    <div class="row mt-4" id="content2">
        <?php foreach ($ulasan as $ulas): ?>
           <div class="card mb-4" style="width:93%;margin:0 auto;color:black;border:1px solid grey">
              <div class="row no-gutters">
                <div class="col-md-2 text-center" style="border-right:1px solid #CCC">
                  <img src="<?php echo base_url('assets/img/produk/').$ulas->gambar ?>" class="card-img mr-2" style="padding: 20px;"><br>
                  <h5><?php echo $ulas->nama ?></h5>
                </div>
                <div class="col-md-10">
                  <div class="card-body">
                    <div class="card-title">
                        <img src="<?php echo base_url('assets/img/profile/').$ulas->foto ?>" class="card-img mr-3" style="width: 50px;height:50px;border:0.5px solid #CCC;float: left">
                      <table>
                        <tr>
                          <td><small><?php echo $ulas->nama_user ?></small>&nbsp;&nbsp; <span class="badge badge-pill badge-success">pembeli</span></td>
                        </tr>
                        <tr> 
                          <td><small><i><?php echo $ulas->tanggal_komen ?></i></small></td>
                        </tr>
                      </table>
                    </div>

                    <div id="ratingDetails" class="mt-2">   
                        <?php $rating = $this->db->select('rating_produk')
                                                 ->where('id_detil',$ulas->id_detil)
                                                 ->get('detil_beli')
                                                 ->result();
                        foreach($rating as $rate){
                        ?>
                        <b class="mr-2"><?php echo $rate->rating_produk ?></b>
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

                    <p class="card-text"><?php echo $ulas->komen ?></p>
                    <hr style="border-bottom:1px dashed #CCC;">
                    <p class="card-text"><small class="text-muted"></small></p>
                  </div>
                </div>
              </div>
          </div>
        <?php endforeach ?>
    </div>
  </div> 
</div>
      <?php $this->load->view('admin/_partials/scrolltop.php') ?>
</div>