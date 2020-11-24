<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tracking </h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
            <form action="<?php echo site_url('toko/tracking/search') ?>" method="post">
            <div class="form-group row pull-right">
                <div class="col-xs-3">
                    <input class="form-control" type="text" name="search">
                </div>
                <div>
                    <input type="submit" class="btn btn-info" value="Search">
                    <a href="<?php echo site_url('toko/tracking') ?>" class="btn btn-info"><i class="fas fa-sync-alt"></i></a>
                </div>
            </div>
            </form>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead align="center">
                    <tr>
                      <th>ID Beli</th>
                      <th>Nama Pembeli</th>
                      <th>Tanggal Beli</th>
                      <th colspan="2">Dikirim dari</th>
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
                        <?php echo $prod->nama_penerima ?>
                      </td>
                      <td>
                        <?php echo $prod->tanggal ?>
                      </td>
                      <td>
                        <?php echo $prod->alamat_toko ?>
                      </td>
                      <td>
                        <?php echo $prod->kota ?>
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
              </div>
            </div>
          </div>

        </div>