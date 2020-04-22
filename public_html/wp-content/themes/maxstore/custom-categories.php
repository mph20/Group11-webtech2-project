
<?php
/* Template Name: Custom Category Page*/
get_header(); 
get_template_part( 'template-part', 'head' );
$terms = get_terms( array(
    'taxonomy' => 'category',
    'hide_empty' => false,
) );
$categories = get_categories(array(
    'taxonomy' => 'category',
    'hide_empty' => false,
    'orderby' => 'name',
    'order'   => 'ASC'
));
?>
<header>
					<h2 class="page-header">                                
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>                            
					</h2> 
					
				</header>
<?php
foreach($categories as $category) {
    echo '<div class="col-md-4"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
 }
?>

<div class="detailss">
	<hr class="noarchive">
</div>

<?php get_footer();?>