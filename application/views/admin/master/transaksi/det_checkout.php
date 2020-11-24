<div class="container-fluid">
	<?php foreach ($detail as $det) { ?>
	<div class="row mb-5">
	  <div class="col-sm-8">
	    <div class="card shadow p-3 bg-white rounded">
	      <div class="card-body" style="color:black">
	        <h5 class="card-title"><strong><?php echo $det->nama_penerima ?></strong></h5>
	        <table border="0" width="100%" class="table" style="color:black">
	        	<tr>
	        		<td width="15%">Tanggal Transaksi</td>
	        		<td colspan="2"><?php echo $det->tanggal ?></td>
	        	</tr>
				<tr>
	        		<td>Batas Pembayaran</td>
	        		<td colspan="2"><?php echo $det->batas_bayar ?></td>
	        	</tr>
	        	<tr>
	        		<td>Total Pembayaran</td>
	        		<td width="15%">Rp. <?php echo number_format($det->total,0,",",".") ?></td>
	        		<td width="5%" align="right"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail"><i class="fa fa-search-plus"></i> &nbsp;Detail</button></td>
	        	</tr>
	        	<tr>
	        		<td>Metode Pembayaran</td>
	        		<td colspan="2"><?php echo $det->pembayaran ?></td>
	        	</tr>
	        	<?php if($det->status_pembayaran != 'Selesai'){ ?>
	        	<tr>
	        		<input type="hidden" name="id" value="<?php echo $det->id_beli ?>">
	        		<td>Bukti Pembayaran</td>
					<?php if(empty($det->bukti)){ ?>

	        		<td><i>Belum ada bukti</i></td>

	        		<?php }else { ?>
	        			<td><a href="<?php echo base_url('./assets/img/bukti/').$det->bukti ?>"><i>Lihat</i></a></td>
	        			<td align="right" width="20%">
	        				<a href="<?php echo base_url('admin/transaksi/rampung/').$det->id_beli; ?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> &nbsp;Selesai</a>
	        				<a href="<?php echo base_url('admin/transaksi/tolak/').$det->id_beli; ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> &nbsp;Tolak</a>
	        			</td>
	        		<?php } ?>
	        	</tr>
	        	<?php } ?>
	        	<tr>
	        		<td>Status Pembayaran</td>
	        		<?php if($det->status_pembayaran != 'Selesai'){ ?>
	        			<td colspan="2" style="color:red"><i>*<?php echo $det->status_pembayaran ?></i></td>
	        		<?php }else{ ?>
	        			<td colspan="2" style="color:green"><i>*<?php echo $det->status_pembayaran ?></i></td>
					<?php } ?>	        		
	        	</tr>
	        	<tr>
	        		<td>Metode Pengiriman</td>
	        		<td colspan="2"><?php echo $det->pengiriman ?></td>
	        	</tr>
	        	<tr>
	        		<td>Status Pengiriman</td>
	        		<td colspan="2" style="color:green"><i><?php echo $det->status_pengiriman ?></i></td>
	        	</tr>
	        </table>
	        <br>
	        <a href="<?php echo base_url('admin/transaksi') ?>" class="btn btn-secondary">Close</a>
	      </div>
	    </div>
	  </div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="color:black">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Pembelian Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<table width="100%" border="0" class="table table-bordered table-hover text-center"  style="color:black">
      			<tr class="text-center">
      				<th>Nama Barang</th>
      				<th>Jumlah</th>
      				<th>Harga</th>
      				<th>Subtotal</th>
      			</tr>
        	<?php 
	            $sql = $this->db->query("SELECT * FROM detil_beli JOIN barang ON barang.id = detil_beli.id_produk WHERE id_beli = '$det->id_beli'");
	            foreach ($sql->result() as $row) {
            ?>

            	<tr>
            		<td><?php echo $row->nama ?></td>
            		<td><?php echo $row->jumlah ?></td>
            		<td>Rp. <?php echo number_format($row->harga,0,",",".") ?></td>
            		<td>Rp. <?php echo number_format($row->sub_total,0,",",".") ?></td>
            	</tr>

        	<?php } ?>
        		<tr>
        			<td colspan="3" class="text-left">Total</td>
        			<td>
        				Rp. <?php echo number_format($det->total,0,",",".") ?>
        			</td>
        		</tr>
        	</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<?php } ?>