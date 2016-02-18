<?php
/**
 * Template Name: Wide
 * Description: Full-width, without a sidebar
 *
 * @package WordPress
 * @subpackage utresponsive
 */


get_header(); ?>

		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
  		
  		<?php // Check to see if ACF is activated. If so, grab the first row and see if it is a Slider. If so, use it instead of the Featured Image
	          if(function_exists('have_rows') && have_rows('custom_acf_layout')):
		            // Set a few vars so we dont dupe the slider in the full width and the body
						    $n = 0;
							  $sliderExists = false; ?>
		            	<section class="flexible-content main-slider">
										    <?php // loop through the rows of data only once to check the first row
										    while ( have_rows('custom_acf_layout')) : the_row(); ?>

											    <?php if( (get_row_layout() == 'nivo_slider_gallery') && $n == 0 ): ?>
											    	
															<div class="slider-wrapper theme-light full-width">
																<figure id="mainslider" class="nivoSlider">
																	<?php while(has_sub_field('nivo_slider_gallery')):
																		$fullimage    = wp_get_attachment_image_src(get_sub_field('image'), 'full');
																		$alt          = get_post_meta(get_sub_field('image'), '_wp_attachment_image_alt', true); 
																		$thumb        = wp_get_attachment_image_src(get_sub_field('image'), 'thumbnail');
																		$nivo_caption = get_sub_field('caption');
																		$nivo_link    = get_sub_field('link'); ?>
																        	
																	  <a <?php if(isset($nivo_link) && $nivo_link != '') { echo "href='".$nivo_link."'"; } ?>><img src="<?php echo $fullimage[0]; ?>" alt="<?php echo $alt; ?>" rel="<?php echo $thumb[0]; ?>" title="<?php echo $nivo_caption;?>" /></a>
																	<?php endwhile; ?>
																</figure>
															</div>											        	
													<?php elseif ( has_post_thumbnail() && ! post_password_required() && $n == 0 ) : ?>
														<div class="entry-thumbnail">
															<?php the_post_thumbnail("large"); ?>
														</div>
													<?php endif;
													$n++;
													$sliderExists = true;
												endwhile ?>
									</section>
						    
		<?php elseif(has_post_thumbnail()): ?>
			<div class="entry-thumbnail">
				<?php the_post_thumbnail("large"); ?>
			</div>
		<?php endif ?>

		<div id="content" class="site-content wide<?php
              if (is_front_page()){  
              $settings = get_option( 'ut_options', $ut_options );
              if (($settings['homepage_head'] == false) && is_front_page()) { ?> home-margin<?php } }else{   } ?>" role="main">


				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">

            <?php
              // If it is the front page and the homepage headline option is turned on
              if (is_front_page()){  
              $settings = get_option( 'ut_options', $ut_options );
              if (($settings['homepage_head'] == true) && is_front_page()) { ?>
                <header class="entry-header"><h1 class="entry-title"><?php the_title(); ?></h1></header>
              <?php }   
              // If it is an interior page
                }else{  ?>
                <header class="entry-header"><h1 class="entry-title"><?php the_title(); ?></h1></header>
            <?php } ?>




					</header><!-- .entry-header -->

					<?php // Check to see if ACF is activated. If so, use the custom layout options
	            if(function_exists('have_rows') && have_rows('custom_acf_layout')): ?>

		            <div class="entry-content wide">
									<?php

										// check if the flexible content field has rows of data
										if(have_rows('custom_acf_layout') ):
					
												echo '<section class="flexible-content">';
										     // loop through the rows of data
												$i = 0;
										    while ( have_rows('custom_acf_layout') ) : the_row();

														// ***************
														// TEXT COLUMNS
														// ***************
															

												      if( get_row_layout() == 'text' ):
															$text_title = get_sub_field('title');
															$columns = get_sub_field('columns');
															
															if ($columns == '2')
															{
												        		echo '<br class="clear"><section class="text">';
												        		if ($text_title != "") {
							  					        		echo '<h2 class="mod-text-title">'.$text_title.'</h2>';
												        		}
							                      echo '<div class="half">';
												        		the_sub_field('text');
												        		echo '</div><div class="half">';
							                      the_sub_field('text_2');
												        		echo '</div></section><br class="clear">';
															}	
															else {
															
																echo '<section class="text"><h2>'.$text_title.'</h2>';
												        		the_sub_field('text');
												        		echo '</section><br class="clear">';
															}
																
															echo '<br class="clear">';
												        endif;
												        
												        
												        
														// ***************
														// QUOTE
														// ***************
															
																				        
												        if( get_row_layout() == 'quote' ): 
															echo '<blockquote class="quote">';
												        		the_sub_field('quote');
															echo '<div class="quote-author">';
																the_sub_field('name');
															echo '</div></blockquote><br class="clear">';
												
												        endif;


														// ***************
														// IMAGES
														// ***************
															

														if( get_row_layout() == 'image' ): 
															$image_title = get_sub_field('title');
												        	$image_url = get_sub_field('image');
												        	$image_caption = get_sub_field('caption');
												        	
												        	
												        		if ($image_title != "") {
							  					        		echo '<h2 class="mod-image-title">'.$image_title.'</h2>';
												        		}
												        	echo '<figure class="image">
												        			<img src="'.$image_url.'" class="frame" />';
												        		if ($image_caption != "") {
							  					        		echo '<p>'.$image_caption.'</p>';
												        		}
															echo '</figure><br class="clear">';
												        	
												        	
												
												        endif;


														// ***************
														// NIVO SLIDER
														// ***************

										        if($i > 0) {

															if( get_row_layout() == 'nivo_slider_gallery' ): 
																$nivo_title = get_sub_field('title');
													        	// $nivo_image = get_sub_field('nivo_slider_gallery');
													        	
													        	?>
													        	<h2><?php echo $nivo_title;?></h2>
													        	<div class="slider-wrapper theme-light"><figure id="slider" class="nivoSlider">
																	<?php while(has_sub_field('nivo_slider_gallery')):
																	
																		$fullimage = wp_get_attachment_image_src(get_sub_field('image'), 'full'); 
																		$thumb = wp_get_attachment_image_src(get_sub_field('image'), 'thumbnail');
															        	$nivo_caption = get_sub_field('caption');
															        	$nivo_link = get_sub_field('link'); ?>
															        	
																    	<a href="<?php echo $nivo_link;?>"><img src="<?php echo $fullimage[0]; ?>" alt="<?php  the_sub_field('title');?>" rel="<?php echo $thumb[0]; ?>" title="<?php echo $nivo_caption;?>" /></a>
																    <?php endwhile; ?>
																</figure>	</div>											        	
													        	<?php
													        	
													
													        endif;

													  }



														// ***************
														// GALLERY
														// ***************
															

														if( get_row_layout() == 'gallery' ): 
															
												        	$gallery_title = get_sub_field('title');
												        	$gallery_caption = get_sub_field('caption');
												        	
												        	echo '<figure class="mod-gallery">';
											        		if ($gallery_title != "") {
							  					        	echo '<h2 class="mod-gallery-title">'.$gallery_title.'</h2>';
												        	}

													        	$images = get_sub_field('gallery');



							                      if( $images ): ?>
							                              <?php foreach( $images as $image ): ?>
							                                      <a href="<?php echo $image['url']; ?>"  data-toggle="lightbox" data-gallery="multiimages">
							                                           <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" data-title="<?php echo $image['caption']; ?>" />
							                                      </a>
							                              <?php endforeach; ?>
							                      <?php endif; 
																																
																 
											        		if ($gallery_caption != "") {
							  					        	echo '<figcaption class="lightbox-gallery">'.$gallery_caption.'</figcaption>';
												        	}

												        	echo '</figure>';

							                    // echo '<br class="clear">';

												        endif;	
												        $i++;
												    endwhile;
					
										echo '</section>'; // end flexible content 
					
									else :
					
								    // no layouts found
								    echo '<h2>Please create your layout.</h2>';
					
									endif;
									?>

									<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'utthehill' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
						</div><!-- .entry-content -->

					<?php else: ?>

						<div class="entry-content regwide">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'utthehill' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
						</div><!-- .entry-content -->

					<?php endif ?>

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'utthehill' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

			<?php endwhile; ?>

		</div>

<?php get_footer(); ?>
