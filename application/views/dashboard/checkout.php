<div class="container-fluid" style="color:black">
	<h4 class="mb-3">History Checkout</h4>

	<table class="table table-bordered table-hover table-striped" style="color:black;">
		<tr class="text-center">
			<th>No.</th>
			<th>Nama</th>
			<th>Tanggal Pembelian</th>
			<th>Batas Pembayaran</th>
			<th>Total Bayar</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>

		<?php 
			$no = 1;
			foreach ($beli as $items): 
		?>	
		<tr>
			<td class="text-center"><?php echo $no++ ?>.</td>
			<td><?php echo $items->nama_penerima ?></td>
			<td><?php echo $items->tanggal ?></td>
			<td><?php echo $items->batas_bayar ?></td>
			<td>Rp. <?php echo number_format($items->total,0,",",".") ?></td>

			<?php if($items->status_transaksi == 'Selesai'){ ?>

				<td style="color:green" align="center"><i><strong><?php echo $items->status_transaksi ?></i></strong></td>

			<?php }elseif($items->status_transaksi == 'Proses'){ ?>

				<td align="center"><i><strong style="color:#4e73df"><?php echo $items->status_transaksi ?></i></strong></td>

			<?php }else{ ?>

				<td style="color:red" align="center"><i><strong><?php echo $items->status_transaksi ?></strong></i></td>

			<?php } ?>

			<td class="text-center"><a href="<?php echo base_url('pembayaran/detail/' .$items->id_beli) ?>" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> &nbsp;Detail</a>
			
			</td>
		</tr>
		<?php endforeach; ?>
		<?php $this->load->view('admin/_partials/scrolltop.php') ?>
</div>