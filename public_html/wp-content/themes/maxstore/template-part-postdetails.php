<div class="detailss">
<?php
$instock="unset";
$checker=get_field('in-stock');
if($checker== '1'){
	$instock="yes";
}
else{
	$instock="no";
}
?>
	<hr class="noarchive">
	<h3 class="price">Price:<span class="yellowdetail"> $<?php the_field('price'); ?></span></h3>
	<h3 class="description">Description: <span class="yellowdetail"><?php the_field('description'); ?></span></h3>
	<h3 class="brand">Brand: <span class="yellowdetail"><?php the_field('brand'); ?></span></h3>
	<h3 class="manufacturer">Manufacturer:<span class="yellowdetail"> <?php the_field('manufacturer'); ?></span></h3>
	<h3 class="in-stock">In stock:<span class="yellowdetail"> <?php echo($instock); ?></span></h3>
	<h3 class="rating">Rating: <span class="yellowdetail"><?php the_field('rating'); ?></span>/5</h3>
	<hr class="noarchive">
</div>