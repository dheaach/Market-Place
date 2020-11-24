<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Laporan</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form action="<?php echo site_url('admin/laporan/keyword');?>" method = "post" autocomplete="off">
                  <div class="form-group row pull-left" style="margin-left:1px;">
                    <div class="col-xs-3">
                      <input class="form-control" type="text" name = "keyword" />
                    </div>
                    <div>
                      <input class="btn btn-info" type="submit" value = "Search" />
                      <a href="<?php echo base_url('admin/laporan'); ?>"class="btn btn-info"><i class="fas fa-sync-alt"></i></a>
                    </div>
                  </div>
                </form>
                <div id="printableArea">
                <table class="table table-bordered table-hover" style="color:black" id="dataTable" width="100%" cellspacing="0">
                  
                    <tr class="text-center">
                      <th>Nama</th>
                      <th>Tanggal Pembelian</th>
                      <th>Total Bayar</th>
                      <th>Status</th>
                    </tr>
                  
                  <tbody align="center">
                    <?php foreach ($report as $prod): 
                      $tgl = date('Y-m-d', strtotime($prod->tanggal));
                      ?> 

                    <tr>
                      <td>
                        <?php echo $prod->nama_penerima ?>
                      </td>
                      <td>
                        <?php echo $tgl ?>
                      </td>
                      <td>
                        <?php echo $prod->total ?>
                      </td>
                      <td>
                        <?php echo $prod->status_pembayaran ?>
                      </td>
                      </td>
                    </tr>
                    <?php endforeach;?> 
                  </tbody>
                </table>
                </div>
           <input class="btn btn-primary" type="button" onclick="printDiv('printableArea')" value="Print" />
              </div>
            </div>
          </div>

        </div>