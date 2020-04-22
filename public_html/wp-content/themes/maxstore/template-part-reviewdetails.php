<div class="review_details">			
</div>
<?php

$relatedProducts = get_field('related_products');
if($relatedProducts){
foreach($relatedProducts as $product){
 ?>
 <li><a href="<?php echo get_the_permalink($product);?>">
 <?php echo get_the_title($product);?>
 </a>
 </li>
 <?php
}
 }
 ?>
 <hr class="noarchive2">
 