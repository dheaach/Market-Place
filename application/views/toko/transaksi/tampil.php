<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Transaksi </h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color:black">
                  <thead align="center">
                    <tr>
                      <th>ID Beli</th>
                      <th>NIK</th>
                      <th>Nama Pembeli</th>
                      <th>Tanggal Beli</th>
                      <th>Batas Bayar</th>
                      <th>Total</th>
                      <th>Status Pembayaran</th>
                      <th>Status Pengiriman</th>
                      <th>Status Transaksi</th>
                      <th width="500px">Action</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php foreach ($transaksi as $prod): ?> 
                    <tr>
                      <td>
                        <?php echo $prod->id_beli ?>
                      </td>
                      <td>
                        <?php echo $prod->nik ?>
                      </td>
                      <td>
                        <?php echo $prod->nama_penerima?>
                      </td>
                      <td>
                        <?php echo $prod->tanggal ?>
                      </td>
                      <td>
                        <?php echo $prod->batas_bayar ?>
                      </td>
                      <td>
                        Rp. <?php echo number_format($prod->sub_total,0,",",".") ?>
                      </td>
                      <td>
                        <?php echo $prod->status_pembayaran ?>
                      </td>
                      <td>
                        <?php echo $prod->status_pengiriman ?>
                      </td>
                     <?php if($prod->status_transaksi == 'Selesai'){ ?>
                      <td style="color:green" align="center">
                        <i><strong><?php echo $prod->status_transaksi ?></i></strong>
                      </td>
                      <?php }elseif($prod->status_transaksi == 'Proses'){ ?>
                      <td align="center">
                        <i><strong style="color:#4e73df"><?php echo $prod->status_transaksi ?></i></strong>
                      </td>

      <?php }else{ ?>

        <td style="color:red" align="center"><i><strong><?php echo $prod->status_transaksi ?></strong></i></td>

      <?php } ?>

      <td class="text-center"><a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_detail<?php echo $prod->id_beli;?>"><i class="fas fa-search-plus"></i>Detail</a>
      </td>
                    </tr>
                    <?php endforeach;?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <?php 
        foreach($transaksi as $i):
            $id=$i->id_beli;
            $bukti_kirim=$i->pengiriman;
        ?>
        <div class="modal fade" id="modal_update<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">Upload Bukti Pengiriman</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'toko/transaksi/update1'?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <p>Upload Foto  : <input type="file" name="bukti"></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_beli" value="<?php echo $id;?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button class="btn btn-danger">Upload</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach;?>
<!-- ============ MODAL EDIT BARANG =============== -->
    <?php 
        foreach($transaksi as $i):
            $id = $i->id_beli;
            $nama = $i->nama_penerima;
            $tlp = $i->telepon;
            $alamat = $i->alamat;
            $kodepos = $i->kodepos;
            $tgl = $i->tanggal;
            $batas = $i->batas_bayar;
            $pembayaran= $i->pembayaran;
            $status_bayar = $i->status_pembayaran;
            $status_kirim = $i->status_pengiriman;
            $bukti_bayar=$i->bukti;
            $bukti_kirim=$i->pengiriman;
        ?>
        <!-- Modal -->
<div class="modal fade" id="modal_detail<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
          <label class="col-sm-4">Nama Pembeli</label>
          <label class="col-sm-2">:</label>
          <label class="col-sm-4"><?php echo"$nama";?></label>
        </div>

        <div>
          <label class="col-sm-4">No Telepon</label>
          <label class="col-sm-2">:</label>
          <label class="col-sm-4"><?php echo"$tlp";?></label>
        </div>

        <div>
          <label class="col-sm-4">Alamat</label>
          <label class="col-sm-2">:</label>
          <label class="col-sm-4"><?php echo"$alamat";?></label>
        </div>

        <div>
          <label class="col-sm-4">Kode Pos</label>
          <label class="col-sm-2">:</label>
          <label class="col-sm-4"><?php echo"$kodepos";?></label>
        </div>

        <div>
          <label class="col-sm-4">Tanggal Beli</label>
          <label class="col-sm-2">:</label>
          <label class="col-sm-4"><?php echo"$tgl";?></label>
        </div>

        <div>
          <label class="col-sm-4">Batas Pembayaran</label>
          <label class="col-sm-2">:</label>
          <label class="col-sm-4"><?php echo"$batas";?></label>
        </div>

        <div>
          <label class="col-sm-4">Metode Pembayaran</label>
          <label class="col-sm-2">:</label>
          <label class="col-sm-4"><?php echo"$pembayaran";?></label>
        </div>
        <div>
          <label class="col-sm-4">Bukti Pembayaran</label>
          <label class="col-sm-2">:</label>
          <label class="col-sm-4">
            <i>
              <a href="<?php echo base_url('./assets/img/bukti/'.$bukti_bayar) ?>" target="_blank">
                <?php echo "$bukti_bayar"; ?>
              </a>
            </i>
          </label>

        </div>
        <div>
          <label class="col-sm-4">Status Pembayaran</label>
          <label class="col-sm-2">:</label>
          <?php if($status_bayar != 'Selesai'){ ?>
          <label class="col-sm-4" style="color:red"><i>*<?php echo"$status_bayar";?></i></label>
          <?php }else{ ?>
          <label class="col-sm-4" style="color:green"><i>*<?php echo"$status_bayar";?></i></label>
          <?php } ?>
        </div>

        <div>
          <label class="col-sm-4">Status Pengiriman</label>
          <label class="col-sm-2">:</label>
          <label class="col-sm-4"><?php echo"$status_kirim";?></label>
        </div>

        <div>
          <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead align="center">
                    <tr>
                      <th>Nama</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <tr>
                      <td>
                        <?php echo $i->nama_penerima ?>
                      </td>
                      <td>
                        <?php echo $i->jumlah ?>
                      </td>
                      <td>
                        <?php echo 'Rp '.number_format($i->harga); ?>
                      </td>
                      <td>
                        <?php 
                        $total=0;
                        $s=$i->sub_total;
                        echo 'Rp '.number_format($total+=$s); ?>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3" align="right">
                        Total
                      </td>
                      <td>
                        <?php
                          echo 'Rp '.number_format($total,2,",","."); 
                        ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
        </div>

        <?php
          if(($status_bayar == 'Selesai') AND  $status_kirim == 'Terkirim'){
        ?>
        <p style="font-size: 15px;color: green;" align="right">Status Transaksi : Selesai</p>
        <?php
        }else{
        ?>
        <p style="font-size: 15px;color: red;" align="right">Status Transaksi : Belum Selesai</p>
        <?php
        }
        ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <?php endforeach;?>
    <!--END MODAL EDIT BARANG-->