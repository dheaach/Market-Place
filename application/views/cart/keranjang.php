<div class="container-fluid" style="color:black;">
	<h4 class="mb-3">Keranjang Belanja</h4>

	<table class="table table-bordered table-hover table-striped" style="color:black;">
		<tr class="text-center">
			<th>No.</th>
			<th>ID Produk</th>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Subtotal</th>
			<th>Aksi</th>
		</tr>

		<?php 
			$no = 1;
			foreach ($this->cart->contents() as $items): 
		?>
			<tr>
				<td class="text-center"><?php echo $no++ ?>.</td>
				<td><?php echo $items['id'] ?></td>
				<td><?php echo $items['name'] ?></td>
				<td><?php echo $items['qty'] ?></td>
				<td>Rp. <?php echo number_format($items['price'],0,",",".") ?></td>
				<td>Rp. <?php echo number_format($items['subtotal'],0,",",".") ?></td>
				<td class="text-center"><a href="<?php echo base_url('dashboard/hapus_cart/' .$items['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
			</tr>
		<?php endforeach ?>

			<tr>
				<td colspan="5">Total Bayar :</td>
				<td colspan="2" align="">Rp. <?php echo number_format($this->cart->total(),0,",",".") ?></td>
			</tr>
	</table>

	<div align="right">
		<a href="<?php echo base_url('dashboard/hapus_semua') ?>" class="tombol-hapus"><div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> &nbsp;Batal Belanja</div></a>

		<a href="<?php echo base_url('welcome/index') ?>"><div class="btn btn-primary btn-sm"><i class="fas fa-shopping-cart"></i> &nbsp;Lanjukan Belanja</div></a>

		<!--<a href="<?php echo base_url('dashboard/pembayaran') ?>"><div class="btn btn-success btn-sm"><i class="fas fa-dollar-sign"></i> &nbsp;Pembayaran</div></a>-->
		<?php 
			$id_beli 	 = $this->session->userdata('id_beli');
			$nik 	 = $this->session->userdata('user_id'); 
			$total = 0;
		?>
		<?php $cek_data  = $this->db->where('nik', $nik)
									->where('total', $total)
									->limit(1)
									->get('pembelian');
		if($cek_data->num_rows() > 0){ ?>
				
			<a href="<?php echo base_url('dashboard/pembayaran') ?>" class="btn btn-success btn-sm"><i class="fas fa-dollar-sign"></i> &nbsp;Pembayaran</a>

		<?php }else{ ?>
				
			<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pembayaran"><i class="fas fa-dollar-sign"></i> &nbsp;Pembayaran</button>

		<?php } ?>

	</div>
	<?php $this->load->view('admin/_partials/scrolltop.php') ?>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="pembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
        <?php 
			if ($keranjang = $this->cart->contents()) 
			{
		?>
	<div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle"><strong><i class="fas fa-map-marker-alt"></i> &nbsp;&nbsp;Alamat Pengiriman</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
		   <div class="modal-body">
			<form method="POST" action="<?php echo base_url('dashboard/bayar') ?>">
				<?php $id = rand()%9999; ?>
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<div class="row">
	          		<div class="col-sm-6">
	          			<div class="form-group">
							<label>Nama Penerima</label>
							<input type="text" name="nama" class="form-control" placeholder="Nama Penerima" autocomplete="off" required>
						</div>
	          		</div>
	          		<div class="col-sm-6">
	          			<div class="form-group">
							<label>No. Telepon</label>
							<input type="text" name="tlp" class="form-control" placeholder="+628... / 08..." autocomplete="off" required>
						</div>
	          		</div>
	          	</div>
	          	<br>
	          	<div class="row">
	          		<div class="col-sm-8">
	          			<div class="form-group">
							<label>Wilayah</label>
							<input type="text" name="wilayah" class="form-control" placeholder="Kecamatan/Kab Kota/Provinsi" autocomplete="off" required>
						</div>
	          		</div>
	          		<div class="col-sm-4">
	          			<div class="form-group">
							<label>Kode Pos</label>
							<input type="text" name="kodepos" class="form-control" placeholder="Kode Pos"autocomplete="off" required>
						</div>
	          		</div>
	          	</div>
	          	<br>
	          	<div>
	          		<label>Alamat Penerima</label>
	          		<textarea class="form-control" type="text" name="alamat" rows="3" placeholder="Alamat penerima" required="required"></textarea>
	          	</div>
	        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Tambah</button>
      </div>
      </form>

		<?php } else { ?>
			<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalScrollableTitle"><strong>Masih Kosong</strong></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		    </div>
			<div class="modal-body">
				<h5 class="text-center">Silahkan Belanja Terlebih Dahulu <i class="fas fa-shopping-cart"></i> ! </h5>
			</div>
			<div class="modal-footer">
		        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
		        <a href="<?php echo base_url('welcome') ?>" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Tambah</a>
		    </div>
		<?php } ?>
    </div>
  </div>
</div>