<div class="container-fluid">
	
	<h3><i clsas="fa fa-edit"></i>Edit Data Barang</h3>

	<?php foreach ($barang as $brg): ?>
		
		<?php echo form_open_multipart('admin/barang/add'); ?>
        			<div class="form-group">
        				<label>ID Produk</label>
        				<input type="text" name="id" class="form-control" autocomplete="off" required value="<?php $brg->id ?>">
        			</div>

        			<div class="form-group">
        				<label>Nama Produk</label>
        				<input type="text" name="nama" class="form-control" autocomplete="off" required value="<?php $brg->nama ?>">
        			</div>

        			<div class="form-group">
        				<label>Kategori Produk</label>
        				<select class="form-control" name="kategori">
							<option value="<?php $brg->kategori ?>"><?php $brg->kategori ?></option>
        			</div>

        			<div class="form-group">
        				<label>Stok Produk</label>
        				<input type="text" name="stok" class="form-control" autocomplete="off" required value="<?php $brg->stok ?>"
        			</div>

        			<div class="form-group">
        				<label>Harga Produk</label>
        				<input type="text" name="harga" class="form-control" autocomplete="off" required value="<?php $brg->harga ?>">
        			</div>

        			<div class="form-group">
        				<label>Kondisi Produk</label>
        				<input type="text" name="kondisi" class="form-control" autocomplete="off" required value="<?php $brg->kondisi ?>">
        			</div>

        			<div class="form-group">
        				<label>Satuan Produk</label>
        				<input type="text" name="satuan" class="form-control" autocomplete="off" required value="<?php $brg->satuan ?>">
        			</div>

        			<div class="form-group">
        				<label>gambar Produk</label>
        				<input type="file" name="gambar" class="form-control" autocomplete="off" required value="<?php $brg->gambar ?>">
        			</div>
        		
      		</div>
       		
       		<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
       		<button type="submit" class="btn btn-primary">Simpan</button>

      		<?php form_close(); ?>

	<?php endforeach ?>
</div>