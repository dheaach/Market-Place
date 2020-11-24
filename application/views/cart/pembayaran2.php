<?php //---------------------------------------------------------------------------------------------------- ?>

<div class="container-fluid mb-5" style="color:black;">
	<h4 class="mb-3">Checkout Belanja</h4>
	<?php foreach ($beli as $data) { ?>
	<form method="POST" action="<?php echo base_url('Pembayaran/bayar') ?>">
	<div class="row">
	  <div class="col-sm-8">
	    <div class="btn"><strong><i class="fas fa-map-marker-alt"></i> &nbsp;&nbsp;Alamat Pengiriman</strong></div>
	    <div class="card">
	      <div class="card-body">
	      	  <table border="0" width="100%" style="margin-bottom: 0px">
	      	  	<tr>
	      			<td><strong><?php echo $data->nama_penerima ?></strong></td>
	      			<td align="right"><button type="button" class="btn btn-sm btn-success text-right" style="margin-right:0px" data-toggle="modal" data-target="#editalamat<?php echo $data->id_beli ?>"><i class="fas fa-edit"></i> Ubah Alamat</button></td>
	      		</tr>
	 		  </table>	      		
	      		<?php echo $data->telepon ?><br>
	      		<?php echo $data->alamat ?><br>
	      		<?php echo $data->wilayah ?> , <?php echo $data->kodepos ?>
	      </div>
	    </div>
	    <br>

	    <div class="row">
		  <div class="col-sm-6">
		      <div class="card-body">
		        <div class="btn"><strong><i class="fas fa-truck"></i> &nbsp;&nbsp;Metode Pengiriman</strong></div>
	    		<div class="card">
	      			<div class="card-body">
        				<label>Metode Pengiriman</label>
        				<select class="form-control" name="pengiriman">
							<option hidden="hidden">-Pilih Metode Pengiriman-</option>
							<option value="Dikirim">Dikirim</option>
							<option value="Diambil">Diambil</option>
                  		</select>
	      			</div>
	    		</div>	
		    </div>
		  </div>
		  <div class="col-sm-6">
		      <div class="card-body">
		        <div class="btn"><strong><i class="fas fa-money-bill-wave"></i> &nbsp;&nbsp;Metode Pembayaran</strong></div>
			    <div class="card">
			      <div class="card-body">
			      		<div class="wform-group">
		                    <label>Metode Pembayaran</label>
		                        <select class="form-control" name="pembayaran">
									<option hidden="hidden">-Pilih Metode Pembayaran-</option>
									<option value="Ditempat">Bayar di tempat</option>
									<option value="Online">Bayar Online</option>
		                  		</select>
		                </div>   
			      </div>
			    </div>
		    </div>
		</div>
		</div>
	  </div>
	  <div class="col-sm-4">
	    <div class="card">
	      <div class="card-body">
	        	<table border="0" width="100%">
	        		<tr>
	        			<td>Total Bayar</td>
						<td class="text-right" style="color:#8B0000"><strong>Rp. <?php echo number_format($this->cart->total(),0,",",".") ?></strong></td>
	        		</tr>
	        	</table>

	        	<hr>
	        	<input type="hidden" name="id_beli" value="<?php echo $data->id_beli ?>">
	        	<input type="hidden" name="total_harga" value="<?php echo $this->cart->total() ?>">
	        	<input type="hidden" name="tanggal" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d H:i:s'); ?>">
	        	<input type="hidden" name="batas_bayar"  value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d H:i:s', mktime( date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y'))) ?>">

	        	<button type="submit" class="btn btn-outline-warning btn-block">
                   	<i class="fas fa-dollar-sign"></i> &nbsp;Bayar
           		</button>
	      </div>
	    </div>
	  </div>
	</div>
	</form>
<?php } ?>
	<?php $this->load->view('admin/_partials/scrolltop.php') ?>
</div>

<?php foreach ($beli as $data) { ?>

<!-- Modal -->
<div class="modal fade" id="editalamat<?php echo $data->id_beli ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
	<div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle"><strong><i class="fas fa-map-marker-alt"></i> &nbsp;&nbsp;Alamat Pengiriman</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
		   <div class="modal-body">
			<form method="POST" action="<?php echo base_url('dashboard/ubah_alamat') ?>">
				<div class="row">
	          		<div class="col-sm-6">
	          			<div class="form-group">
							<label>Nama Penerima</label>
							<input type="text" name="nama" class="form-control" value="<?php echo $data->nama_penerima ?>" autocomplete="off" required>
						</div>
	          		</div>
	          		<div class="col-sm-6">
	          			<div class="form-group">
							<label>No. Telepon</label>
							<input type="text" name="tlp" class="form-control" value="<?php echo $data->telepon ?>" autocomplete="off" required>
						</div>
	          		</div>
	          	</div>
	          	<br>
	          	<div class="row">
	          		<div class="col-sm-8">
	          			<div class="form-group">
							<label>Wilayah</label>
							<input type="text" name="wilayah" class="form-control" value="<?php echo $data->wilayah ?>" autocomplete="off" required>
						</div>
	          		</div>
	          		<div class="col-sm-4">
	          			<div class="form-group">
							<label>Kode Pos</label>
							<input type="text" name="kodepos" class="form-control" value="<?php echo $data->kodepos ?>" required>
						</div>
	          		</div>
	          	</div>
	          	<br>
	          	<div>
	          		<label>Alamat Penerima</label>
	          		<input type="text" name="alamat" class="form-control" value="<?php echo $data->alamat ?>" required>
				</div>
	        </div>
	        <input type="hidden" name="id_beli" value="<?php echo $data->id_beli ?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>