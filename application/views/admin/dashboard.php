<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

              <!-- Color System -->
              <div class="row">
            
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <!-- <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Master</div> -->
                      <div class="h7 mb-0 font-weight text-gray-800">
                        <!-- <?php echo $total_asset; ?> -->
                       <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-primary">Master</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <a class="dropdown-item" href="<?php echo base_url('admin/add_user') ?>">User</a>
                        <a class="dropdown-item" href="<?php echo base_url('admin/add_toko') ?>">Toko</a>
                        <a class="dropdown-item" href="<?php echo base_url('admin/add_kurir') ?>">Kurir</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-cog fa-2x text-gray-500"></i>
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
                      <!-- <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kurir</div> -->
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_kurir; ?></div> -->
                      <div class="h7 mb-0 font-weight text-gray-800">
                        <!-- <?php echo $total_asset; ?> -->
                       <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-success">Barang</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <a class="dropdown-item" href="<?php echo base_url('admin/all') ?>">All</a>
                        <a class="dropdown-item" href="<?php echo base_url('admin/kategori/barang/sayur') ?>">Sayur</a>
                        <a class="dropdown-item" href="<?php echo base_url('admin/kategori/barang/buah') ?>">Buah</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">

                      <i class="fas fa-cubes fa-2x text-gray-500"></i>
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
                      <!-- <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transaksi</div> -->
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_trans; ?></div> -->
                     <div class="h7 mb-0 font-weight text-gray-800">
                        <!-- <?php echo $total_asset; ?> -->
                       <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-warning">Transaksi</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <a class="dropdown-item" href="<?php echo base_url('admin/transaksi') ?>">Transaksi</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-exchange-alt fa-2x text-gray-500"></i>
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
                      <!-- <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pendapatan</div> -->
                       <div class="h7 mb-0 font-weight text-gray-800">
                        <!-- <?php echo $total_asset; ?> -->
                        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-info">Laporan</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <a class="dropdown-item" href="<?php echo base_url('admin/laporan') ?>">Laporan</a>
                        </div>
                      </div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.40.000</div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-table fa-2x text-gray-500"></i>
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
              </div>
            </div>

            <div class="col-lg-6 mb-15">

               <div class="container-fluid">
    
          <!-- Page Heading -->
         
          <!-- DataTales Example -->
          <div class="card shadow mb-15">
            
            <div class="card-body" align="center">
              <h1 class="h3 text-gray-800">Daftar Toko</h1>
              <div class="table-responsive">
                <table class="table table-bordered table-hover" style="color:black">
                  <thead align="center">
                    <tr>
                      <th>ID Toko</th>
                      <th>Nama Toko</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                     <?php foreach ($toko as $toko): ?> 
                    <tr>
                      <td>
                        <?php echo $toko->id_toko ?>
                      </td>
                      
                      <td>
                       <?php echo $toko->nama_toko ?>
                      </td>
                    </tr>
                     <?php endforeach;?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->