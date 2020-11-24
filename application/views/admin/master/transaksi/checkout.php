<div class="container-fluid" style="color:black">
	<h4 class="mb-3">Data Checkout</h4>

	<table class="table table-bordered table-hover" style="color:black" id="dataTable" width="100%" cellspacing="0">
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

			<td class="text-center"><a href="<?php echo base_url('admin/transaksi/detail/' .$items->id_beli) ?>" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> &nbsp;Detail</a>

			<?php if($items->status_transaksi == 'Selesai'){ ?>

				<button class="btn btn-sm btn-success" disabled><i class="fas fa-check" title="Selesai"></i></button>

				<button class="btn btn-sm btn-danger" disabled><i class="fas fa-times" title="Batal" style="width:16px"></i></button>

			<?php }elseif($items->status_transaksi == 'Batal'){ ?>

				<button class="btn btn-sm btn-success" disabled><i class="fas fa-check" title="Selesai"></i></button>

				<button class="btn btn-sm btn-danger" disabled><i class="fas fa-times" title="Batal" style="width:16px"></i></button>

			<?php }else{ ?>

				<a href="<?php echo base_url('admin/transaksi/selesai/').$items->id_beli; ?>" class="btn btn-sm btn-success"><i class="fas fa-check" title="Selesai"></i></a>

				<a href="<?php echo base_url('admin/transaksi/batal/').$items->id_beli; ?>" class="btn btn-sm btn-danger"><i class="fas fa-times" title="Batal" style="width:16px"></i></a>

			<?php } ?>

			</td>
		</tr>
		<?php endforeach; ?>
</div>