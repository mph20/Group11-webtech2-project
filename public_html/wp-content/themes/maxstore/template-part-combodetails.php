<div class="combo_details">
<hr class="noarchive">
    <h3 class="price">Price: <span class="yellowdetail">$<?php the_field('price'); ?></span> / Savings:<span class="yellowdetail"> $<?php the_field('savings'); ?></span></h3>
	<h3 class="description">Description<br/> <span class="yellowdetail"><?php the_field('description'); ?></span></h3>
    <h3 class="brand">Brands: <span class="yellowdetail"><?php the_field('brand1'); ?></span> / <span class="yellowdetail"><?php the_field('brand2'); ?></span></h3>
    <h3 class="manufacturer">Manufacturers:<span class="yellowdetail"> <?php the_field('manufacturer1'); ?></span> / <span class="yellowdetail"> <?php the_field('manufacturer2'); ?></span></h3>
    
					
</div>
<hr class="noarchive2">
<?php

$relatedProducts = get_field('related_products');
if($relatedProducts){
    echo("<ul>");
foreach($relatedProducts as $product){
 ?>
 <li>
 <h3><a href="<?php echo get_the_permalink($product);?>">
 <?php echo get_the_title($product);?>
 </a>
 </h3>
 </li>
 
 <?php
}
echo("</ul>");
 }
 ?>
 <hr class="noarchive">