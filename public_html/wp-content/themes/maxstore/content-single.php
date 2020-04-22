<!-- start content container -->
<div class="row rsrc-content">    
	<?php //left sidebar ?>    
	<?php get_sidebar( 'left' ); ?>    
	<article class="col-md-<?php maxstore_main_content_width(); ?> rsrc-main">        
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>         
				<?php maxstore_breadcrumb(); ?>         
				<?php if ( has_post_thumbnail() ) : ?>                                
					<div class="single-thumbnail"><?php the_post_thumbnail( 'maxstore-single' ); ?></div>                                     
					<div class="clear">
					</div>                            
				<?php endif; ?>          
				<div <?php post_class( 'rsrc-post-content' ); ?>>                            
					<header>                              
						<h1 class="entry-title page-header">
							<?php the_title(); ?>
						</h1>                              
						<?php get_template_part( 'template-part', 'postmeta' ); ?>                            
					</header>                            
					<div class="entry-content">                              
						<?php the_content(); ?>                            
					</div>                               
					<?php wp_link_pages(); ?>
					<?php get_template_part( 'template-part', 'posttags' ); ?>
					<?php					
					if(get_post_type()=='products'){
					 get_template_part( 'template-part', 'postdetails' ); 
					}
					elseif(get_post_type()=='combos'){
					 get_template_part( 'template-part', 'combodetails' ); 
					}
					else{
						get_template_part( 'template-part', 'reviewdetails' );
					}
					?>
					<div class="post-navigation row">
						<div class="post-previous col-md-6"><?php previous_post_link( '%link', '<span class="meta-nav">' . __( 'Previous:', 'maxstore' ) . '</span> %title' ); ?></div>
						<div class="post-next col-md-6"><?php next_post_link( '%link', '<span class="meta-nav">' . __( 'Next:', 'maxstore' ) . '</span> %title' ); ?></div>
					</div>                                                        
					<?php get_template_part( 'template-part', 'related' ); ?>                             
					<?php //get_template_part( 'template-part', 'postauthor' ); ?>                             
					<?php comments_template(); ?>                         
				</div>        
			<?php endwhile; ?>        
		<?php else: ?>            
			<?php get_template_part( 'content', 'none' ); ?>        
		<?php endif; ?>    
	</article>    
	<?php //get the right sidebar ?>    
	<?php get_sidebar( 'right' ); ?>
</div>
<!-- end content container -->