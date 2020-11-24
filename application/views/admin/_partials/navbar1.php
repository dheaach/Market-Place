<body id="page-top mb-4 mt-4">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" style="background-color:">

      <!-- Main Content -->
      <div id="content">
        
      <nav class="navbar navbar-expand navbar-light bg-white topbar static-top baris">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <span class="btn btn-light mr-2 d-none d-lg-inline small ml-4">
          <img src="<?php echo base_url('./assets/img/icon1.png'); ?>" style="width:50px"> BU YUR</span>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1 pull-right">
                    <a class="nav-link dropdown-toggle" href="#" id="keranjang" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-shopping-cart" style="color:grey;"></i>
                      <!-- Counter - Alerts -->
                      <?php $keranjang = $this->cart->total_items(); ?>
                      <span class="badge badge-danger badge-counter"><?php echo $keranjang ?></span>
                    </a>
                    <!-- Dropdown - Alerts -->

                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="keranjang">
                      <h6 class="dropdown-header">
                        Belanjaan Anda :
                      </h6>
                      <?php foreach ($this->cart->contents() as $items){ ?>
                      <?php 
                        $id = $items['id'];
                        $sql = $this->db->query("SELECT * FROM barang WHERE id = '$id'")->result(); 
                        foreach ($sql as $g) {
                            $gambar = $g->gambar;
                      ?>  
                      <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                          <div class="icon-circle">
                              <img src="<?php echo base_url().'./assets/img/produk/'.$gambar ?>" class="card-img-top" alt="...">
                          </div>
                        </div>
                      <?php } ?>
                        <div>
                          <span class="font-weight-bold"><?php echo $items['name'] ?></span>
                        </div>
                      </a>
                      <?php } ?>
                      <table border="0" width="100%">
                        <tr>
                          <td width="50%" class="dropdown-item text-left small">Total : <strong style="color:red"><?php echo $keranjang ?></strong> Produk</td>
                          <td><a class="dropdown-item text-right small" href="<?php echo base_url('dashboard/detail_cart') ?>" align="right">Lihat Semua <i class="fas fa-angle-double-right"></i></a></td>
                        </tr>
                      </table>

                    </div>
                  </li>
                  <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - Messages -->

            <?php if($this->session->userdata('user_name')) { ?>
            
            <?php $nik   = $this->session->userdata('user_id'); ?>

            <?php $cek_dat  = $this->db->where('id_user', $nik)
                                        ->limit(1)
                                        ->get('kurir');
            if($cek_dat->num_rows() > 0){ ?>  

            <li style="margin-top: 18.5px;">
              <a class="btn btn-success btn-sm mr-1" href="<?php echo base_url('cek_kurir') ?>">
                  <i class="fas fa-motorcycle fa-sm" title="Kurir"></i> <?php echo $this->session->userdata("kurir_nama"); ?>
              </a>
            </li>

            <?php }else{ ?>

            <li style=" margin-top: 18.5px">
              <a class="btn btn-sm btn-success mr-1" href="<?php echo base_url('kurir_log'); ?>">
                  <i class="fas fa-motorcycle fa-sm" title="Kurir"></i> Kurir
              </a>
            </li>

            <?php } ?>

            <?php //------------------------------------------------------------------------------ ?>
            
            <?php 
                  $nik   = $this->session->userdata('user_id'); 
                  $total = 0;
            ?>
            <?php $cek_data  = $this->db->where('id_user', $nik)
                                        ->limit(1)
                                        ->get('toko');
            if($cek_data->num_rows() > 0){ ?>  

            <li style="margin-top: 18.5px;">
              <a class="btn btn-primary btn-sm" href="<?php echo base_url('cek_login') ?>">
                  <i class="fas fa-store fa-sm img-profile rounded-circle" title="Toko"Toko></i> <?php echo $this->session->userdata("toko_nama"); ?>
              </a>
            </li>

            <?php }else{ ?>

            <li style=" margin-top: 18.5px">
              <a class="btn btn-sm btn-primary" href="<?php echo base_url('login/registration') ?>">
                  <i class="fas fa-store fa-sm" title="Toko"Toko></i> Toko
              </a>
            </li>

            <?php } ?>  
          
            <li class="nav-item dropdown no-arrow">

              <?php 
                  $n1k = $this->session->userdata('user_id');
                  $sqli = $this->db->query("SELECT * FROM user WHERE nik = '$n1k'")->result(); 
                  foreach ($sqli as $gmb) {
              ?>

              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none;">
                <span class="btn btn-light mr-2 d-none d-lg-inline text-gray-600 small" style=""><strong><?php echo $this->session->userdata("user_nama"); ?></strong>

                <?php if($gmb->foto != FALSE){ ?> 
                  <img class="img-profile rounded-circle" src="<?php echo base_url('./assets/img/profile/').$gmb->foto ?>">
                <?php }else{ ?>
                  <img class="img-profile rounded-circle" src="<?php echo base_url('./assets/img/profile/ee.png') ?>">
                <?php } ?>
                </span>
              </a>

              <?php } ?>

              <?php $nik = $this->session->userdata('user_id'); ?>

              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="<?php echo base_url('Profile/index/').$nik ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                    Profil
                  </a><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-door-open fa-sm fa-fw mr-2"></i>
                    Logout
                  </a>
                </div>
            </li>

            <?php } else { ?>

                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('user/registration') ?>">
                    <span class="d-none d-lg-inline small btn btn-outline-info btn-sm">Daftar</span>
                  </a>
                </li>

                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="<?php echo base_url('user/login') ?>">
                    <span class="mr-2 d-none d-lg-inline small btn btn-outline-success btn-sm">Masuk</span>
                  </a>
                </li>

            <?php } ?>

          </ul>

        </nav>
        <div id="mnu">
            <div class="niv mb-4 baris">
                <ul>
                    <li><a href="<?php echo base_url('welcome') ?>"><i class="fas fa-home"></i></a></li>
                    <li><a href="#">Kategori</a></li>
                        <ul class="sub1">
                            <li><a href="">Buah</a></li>
                            <li><a href="">Sayur</a></li>
                        </ul>
                    <li><a href="">History</a></li>
                    <li><a href="">Ulasan</a></li>

                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search pull-right">
                      <div class="input-group mt-2 gang">
                        <input type="text" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                </ul>
            </div>
      </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?php echo base_url('user/logout') ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>