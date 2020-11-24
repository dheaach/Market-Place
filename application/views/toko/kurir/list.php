<div class="container-fluid" style="color:black;">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"> Ready To Deliver</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color:black;">
                  <thead align="center">
                    <tr>
                      <th>Nama</th>
                      <th>Telepon</th>
                      <th>Total</th>
                      <th>Pembayaran</th>
                      <th>Pengiriman</th>
                      <th>Alamat</th>
                      <th>Wilayah</th>
                      <th>Kode Pos</th>
                      <th>Status Pembayaran</th>
                      <th>Status Pengiriman</th>
                      <th>Status Barang</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php foreach ($anu as $data): ?> 
                    <tr>
                      <td>
                        <?php echo $data->nama_user ?>
                      </td>
                      <td>
                        <?php echo $data->telepon ?>
                      </td>
                      <td>
                        <?php echo 'Rp '.number_format($data->total); ?>
                      </td>
                      <td>
                        <?php echo $data->pembayaran ?>
                      </td>
                      <td>
                        <?php echo $data->pengiriman ?>
                      </td>
                      <td>
                        <?php echo $data->alamat ?>
                      </td>
                      <td>
                        <?php echo $data->wilayah ?>
                      </td>
                      <td>
                        <?php echo $data->kodepos ?>
                      </td>
                      <td>
                        <?php echo $data->status_pembayaran ?>
                      </td>
                      
                      <?php if($data->status_pengiriman != 'Selesai'){ ?>
                      <td style="color:orange" align="center"><i><strong>
                            <?php echo $data->status_pengiriman ?></strong></i></td>
                      <?php }else{ ?>
                      <td style="color:green" align="center"><i><strong>
                            <?php echo $data->status_pengiriman ?></strong></i></td>
                      <?php } ?>  

                      <td>
                        <?php if($data->status_pengiriman == 'Selesai'){ ?>

                        <button class="btn btn-primary btn-sm" disabled><i class="fas fa-paper-plane"></i> Terkirim</button>

                        <?php }else{ ?>
                            
                        <a href="<?php echo base_url('toko/kurir/selesai/').$data->id_beli ?>" class="btn btn-primary btn-sm"><i class="fas fa-paper-plane"></i> Terkirim</a>            

                        <?php } ?>
                    </td>
                    </tr>
                    <?php endforeach;?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>