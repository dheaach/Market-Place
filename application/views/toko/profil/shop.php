<div class="container-fluid">

          <!-- Page Heading -->
           
          <!-- DataTales Example -->
            
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="pull-right">
                
              </div>   
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="" width="100%" border="0" cellspacing="0">
                  <?php 
                        foreach($shop as $i):
                          $id=$i->id_toko;
                          $nama=$i->nama_toko;
                          $alamat=$i->alamat_toko;
                          $kota=$i->kota;
                          $kode_pos=$i->kode_pos;
                          $kontak=$i->kontak;
                          $keterangan=$i->keterangan;
                          $logo=$i->logo;
                      ?>
                  <thead align="center">
                    <?php $idt=$this->session->userdata("toko_id"); ?>
                    <form class="form-horizontal" method="post" action="<?php echo base_url('toko/shop/update/'.$idt)?>" enctype="multipart/form-data">
                    
                  </thead>
                  <tbody align="left">
                    <tr>
                      <td rowspan="2">
                        <img width="300px" name="logo" src="<?php echo base_url('assets/img/toko/'.$logo) ?>" width="64" />
                        <!--<input name="logo" value="<?php //echo $logo;?>" type="file">-->
                      </td>
                      <td width="60%">
                        <label><i class="fas fa-store-alt"></i> Nama Toko</label>
                        <input name="nama_toko" class="form-control" type="text" value="<?php echo $nama;?>">
                        <input name="id" class="form-control" type="hidden" value="<?php echo $id;?>">
                      </td>
                    </tr>

                    <tr>
                      
                      <td>
                        <label><i class="fas fa-map-marker-alt"></i> Alamat Toko</label>
                        <textarea rows="3" name="alamat" class="form-control" type="text" value="<?php echo $alamat;?>"><?php echo $alamat;?></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td rowspan="2">
                        <label><i class="fas fa-pencil-alt"></i> Deskripsi Toko</label>
                        <textarea rows="5" name="keterangan" class="form-control" type="text" value="<?php echo $keterangan;?>"><?php echo $keterangan;?></textarea>
                      </td>
                      <td>
                        <label><i class="fas fa-place-of-worship"></i> Kota</label>
                        <input name="kota" class="form-control" type="text" value="<?php echo $kota;?>">
                      </td>
                    </tr>
                    <tr>
                      
                      <td>
                        <label><i class="fas fa-envelope-square"></i> Kode Pos</label>
                        <input name="kode_pos" class="form-control" type="text" value="<?php echo $kode_pos;?>">
                      </td>
                    </tr>
                    <tr>
                      <td align="center">
                         <a style="text-decoration:none;color:white;" href="<?php echo base_url('toko/shop/profil/'.$id)?>" class="btn btn-small btn-warning">Batal</a>
                        <button class="btn btn-small btn-primary">Update</button>
                      </td>
                      <td>
                        <label><i class="fas fa-phone-alt"></i> No Telepon</label>
                        <input name="kontak" class="form-control" type="text" value="<?php echo $kontak;?>">
                      </td>
                    </tr>
                    
                    <tr>
                      <td>
                        
                      </td>
                      <td align="right">
                       
                        </form>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
            	
            	<?php endforeach;?>
          </div>

</div>