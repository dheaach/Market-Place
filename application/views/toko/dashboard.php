

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

              <!-- Color System -->
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Product</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo $total_asset; ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-boxes fa-2x text-gray-300"></i>
                    </div>
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <!--<a class="dropdown-item" href="<?php //echo base_url('barang') ?>">Barang Dagang</a>-->
                  <a class="dropdown-item" href="<?php echo site_url('toko/kategori/barang/sayur'); ?>">Sayur</a>
                  <a class="dropdown-item" href="<?php echo site_url('toko/kategori/barang/buah'); ?>">Buah</a>
                </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kurir</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_kurir; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-motorcycle fa-2x text-gray-300"></i>
                    </div>
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <!--<a class="dropdown-item" href="<?php //echo base_url('barang') ?>">Barang Dagang</a>-->
                  <a class="dropdown-item" href="<?php echo site_url('toko/kurir'); ?>">Data Kurir</a>
                  <a class="dropdown-item" href="<?php echo site_url('toko/kurir/list'); ?>">Barang Dikirim</a>
                </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a style="text-decoration:none;" href="<?php echo base_url('toko/transaksi/')?>"><div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transaksi</div></a>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_trans; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-exchange-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pendapatan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo 'Rp. '.number_format($dapat,0,",","."); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <!--<div class="col-lg-6 mb-4">
                  <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                      Primary
                      <div class="text-white-50 small">#4e73df</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-success text-white shadow">
                    <div class="card-body">
                      Success
                      <div class="text-white-50 small">#1cc88a</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-info text-white shadow">
                    <div class="card-body">
                      Info
                      <div class="text-white-50 small">#36b9cc</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                      Warning
                      <div class="text-white-50 small">#f6c23e</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                      Danger
                      <div class="text-white-50 small">#e74a3b</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                      Secondary
                      <div class="text-white-50 small">#858796</div>
                    </div>
                  </div>
                </div>-->
              

            <div class="col-lg-6 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h5>Laporan Penjualan</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <div id="printableArea">
                      <table style="color:black;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                          <th>ID Beli</th>
                          <th>NIK</th>
                          <th>Nama Pembeli</th>
                          <th>Tanggal Beli</th>
                          <th>Total</th>
                        </tr>                
                        <tbody align="center">
                        <?php foreach ($report as $prod): ?> 
                        <tr>
                          <td>
                            <?php echo $prod->id_beli ?>
                          </td>
                          <td>
                            <?php echo $prod->nik ?>
                          </td>
                          <td>
                            <?php echo $prod->nama_penerima ?>
                          </td>
                          <td>
                            <?php echo $prod->tanggal ?>
                          </td>
                          <td>
                            <?php echo $prod->total ?>
                          </td>
                        </tr>
                        <?php endforeach;?> 
                        </tbody>
                      </table>
                      <a style="float:right;text-decoration:none;" class="btn btn-primary btn-sm" href="<?php echo site_url('toko/report'); ?>">Show more <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="container-fluid">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h5>Tujuan Pengiriman</h5>
                  </div>
                  <div class="card-body">

              <div class="table-responsive">
                <table style="color:black;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead align="center">
                    <tr>
                      <th>ID Beli</th>
                      <th>Tanggal Beli</th>
                      <th colspan="2">Dikirim ke</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php foreach ($track as $prod): ?> 
                    <tr>
                      <td>
                        <?php echo $prod->id_beli ?>
                      </td>
                      <td>
                        <?php echo $prod->tanggal ?>
                      </td>
                      <td>
                        <?php echo $prod->alamat ?>
                      </td>
                      <td>
                        <?php echo $prod->wilayah ?>
                      </td>
                    </tr>
                    <?php endforeach;?> 
                  </tbody>
                </table>
                <a style="float:right;text-decoration:none;" class="btn btn-primary btn-sm" href="<?php echo site_url('toko/tracking'); ?>">Show more <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- /.container-fluid -->
        </div>
  <!-- Menampilkan Jam (Aktif) -->
  
            </div>
      <!-- End of Main Content -->