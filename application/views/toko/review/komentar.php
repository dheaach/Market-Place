<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Komentar </h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead align="center">
                    <tr>
                      <th>ID User</th>  
                      <th colspan="2">Produk</th>
                      <th>Rating</th>
                      <th>Komentar</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php foreach ($komen as $o): ?> 
                    <tr>
                      <td>
                        <?php echo $o->nik ?>
                      </td>
                      <td>
                        <?php echo $o->nama_user ?>
                      </td>
                      <td>
                        <a href="<?php echo base_url('assets/img/produk/'.$o->gambar) ?>" target="_blank">
                        <img src="<?php echo base_url('assets/img/produk/'.$o->gambar) ?>" width="80" /></a>
                      </td>
                      <td>
                        <?php echo $o->rating ?>/5
                        <div class="star-rating">
        <span class="fa fa-star-o" data-rating="1"></span>
        <span class="fa fa-star-o" data-rating="2"></span>
        <span class="fa fa-star-o" data-rating="3"></span>
        <span class="fa fa-star-o" data-rating="4"></span>
        <span class="fa fa-star-o" data-rating="5"></span>
        <input type="hidden" name="rating" class="rating-value" value="<?php echo $o->rating ?>">
      </div>
                      </td>
                      <td>
                        <?php echo $o->komen ?>
                      </td>
                    </tr>
                    <?php endforeach;?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
<style>
  .star-rating {
  line-height:32px;
  font-size:1.25em;
}

.star-rating .fa-star{color: yellow;}
</style>

<script>
  var $star_rating = $('.star-rating .fa');

var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();
$(document).ready(function() {

});
</script>
</div>