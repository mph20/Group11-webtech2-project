<article class="archive-article"> 
	<div <?php post_class(); ?>>                            
		<?php if ( has_post_thumbnail() ) : ?>                               
			<a href="<?php the_permalink(); ?>"><div class="featured-thumbnail col-md-12"><?php the_post_thumbnail( 'maxstore-single' ); ?>  </a>                                                        
			<?php else : ?>
				<div class="nothumbnail">                           
				<?php endif; ?>
				<!--<header>
					<h2 class="page-header">                                
						<a href="<?php// the_permalink(); ?>" title="<?php //the_title_attribute(); ?>" rel="bookmark">
							<?php //the_title(); ?>
						</a>                            
					</h2> 
					
					<?php /*
					if(get_post_type()!='products' and get_post_type()!='combos'){
						get_template_part( 'template-part', 'postmeta' ); 
					   }
					   else{
						   echo("Price: $");
						   the_field('price');
						}
					*/ ?>
				</header>-->
			</div> 
			<div class="home-header text-center col-md-12">                                                      
				<div class="entry-summary">
				<h2 class="page-header2">                                
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>                            
					</h2>
					<?php
					if(get_post_type()=='products'){
						
					echo('<span style="font-size:1.3em;color:black;">Rating: <span class="yellowdetail">'); the_field('rating'); echo('</span>/5</span>');}
					if(get_post_type()=='products' or get_post_type()=='combos'){
					echo('<br/><span style="font-size:1.3em;color:black;">Price $: <span class="yellowdetail">'); the_field('price'); echo('</span></span>');
					
					
					}?>
				</div><!-- .entry-summary -->                                                                                                                       
				<div class="clear"></div> 
				<?php
				if(get_post_type()=='reviews'){ ?>
				<p>                                      
					<a class="btn btn-primary btn-md outline" href="<?php the_permalink(); ?>">
						<?php esc_html_e( 'Read more', 'maxstore' ); ?> 
					</a>                                  
				</p>    
				<?php } ?> 
			</div>                      
		</div>
		<div class="clear"></div>
</article>