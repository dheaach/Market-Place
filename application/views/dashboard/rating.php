<?php
 $rateResult = $this->db->where('id_produk',$prod->id_produk)
                        ->where('rating_produk > 0')
                        ->get('detil_beli');
 $rating_produk = 0;
 $count = 0;
 $fiveStarRating = 0;
 $fourStarRating = 0;
 $threeStarRating = 0;
 $twoStarRating = 0;
 $oneStarRating = 0;
 foreach($rateResult->result_array() as $rate) {
  $rating_produk+= $rate['rating_produk'];
  $count += 1;
  if($rate['rating_produk'] == 5) {
   $fiveStarRating +=1;
  } else if($rate['rating_produk'] == 4) {
   $fourStarRating +=1;
  } else if($rate['rating_produk'] == 3) {
   $threeStarRating +=1;
  } else if($rate['rating_produk'] == 2) {
   $twoStarRating +=1;
  } else if($rate['rating_produk'] == 1) {
   $oneStarRating +=1;
  }
 }
 $average = 0;
 if($rating_produk && $count) {
  $average = $rating_produk/$count;
 } 
 ?>   
 <div id="ratingDetails">   
    <h2 class="bold padding-bottom-7"><?php printf('%.1f', $average); ?> <small>/ 5</small></h2>    
    <?php
    $averageRating = round($average, 0);
    for ($i = 1; $i <= 5; $i++) {
     $ratingClass = "btn-default btn-grey";
     if($i <= $averageRating) {
      $ratingClass = "btn-warning";
     }
    ?>
    <button type="button" class="btn btn-sm <?php echo $ratingClass; ?>" aria-label="Left Align">
      <span class="fa fa-star-o" aria-hidden="true"></span>
    </button> 
    <?php } ?>    
   </div>    