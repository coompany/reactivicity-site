<?php get_header(); ?>
      
    <div class="container">  

			<div id="content" class="clearfix row">

				<div id="main" class="col-xs-12 clearfix single-workshop" role="main">

                    <div class="white-box">

        		    <?php //get_template_part( 'breadcrumb' ); ?>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<header class="article-header sr-only">
								<div class="titlewrap clearfix">
									<h1 class="single-title entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline vcard">
										by <span class="author"><em><?php echo bones_get_the_author_posts_link() ?></em></span> - 
										<time class="updated" datetime="<?php get_the_time('Y-m-j') ?>"><?php echo get_the_time(get_option('date_format')) ?></time>
										<span class="sticky-ind pull-right"><i class="fa fa-star"></i></span>
									</p>
								</div>

							</header> <?php // end article header ?>

							<?php global $brew_options; ?>
							<?php if( $brew_options['featured'] == '2' || ( $brew_options['featured'] == '4' && is_single() ) || ( $brew_options['featured'] == '3' && is_home() ) ) { ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-featured' ); ?>
								<?php if ( $image[1] < '750' && has_post_thumbnail() ) { ?>
									<section class="featured-content featured-img featured-img-bg" style="background: url('<?php echo $image[0]; ?>')">
								<?php } // end if 
								else { ?>
									<section class="featured-content featured-img">
										<?php if ( has_post_thumbnail() ) { ?>
		                                    <a class="featured-img" href="<?php the_permalink(); ?>">
		                                    	<?php the_post_thumbnail( 'post-featured' ); ?>
		                                    </a>
			                            <?php } // end if 
										else { ?>
			                            	<hr>
			                            <?php } //end else?>
				                <?php } // end else ?>
							<?php } // end if 
							else { ?>
								<section class="featured-content featured-img">
							<?php } // end else ?>

							</section>

                            <?php $location = get_field('location'); ?>
                            <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
                            <script src="<?php echo get_template_directory_uri(); ?>/library/js/maps.js" type="text/javascript"></script>
                            <section class="map-container">
                                <div class="acf-map">
                                    <div class="marker" data-id="<?php echo $workshop['id']; ?>" data-title="<?php the_title(); ?>" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                                </div>
                            </section>

							<section class="entry-content single-content clearfix" itemprop="articleBody">
                                <h6>
                                    <a target="_blank" href=" http://maps.google.com/maps?q=<?php echo $location['lat'].','.$location['lng']; ?>">
                                        <i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $location['address']; ?>
                                    </a>
                                </h6>

                                <?php the_content(); ?>

                                <div class="docenti-container">
                                    <ul class="media-list">
                                <?php
                                $docenti = get_field('docenti');
                                foreach($docenti as $docente) {
                                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $docente->ID ), 'bones-thumb-300' );
                                    ?>
                                        <li class="media">
                                            <img class="media-object pull-left" src="<?php echo $image[0]; ?>" alt="<?php echo $docente->post_title; ?>">
                                            <div class="media-body">
                                                <h4 class="media-heading"><?php echo $docente->post_title; ?></h4>
                                                <p><?php echo apply_filters('the_content', $docente->post_content); ?></p>
                                            </div>
                                        </li>
                                <?php } ?>
                                    </ul>
                                </div>

                                <div class="eventbrite-container">
                                    <?php echo get_field('eventbrite'); ?>
                                </div>

								<?php wp_link_pages(
                                	array(

                                        'before' => '<div class="page-link"><span>' . __( 'Pages:', 'brew' ) . '</span>',
                                        'after' => '</div>'
                                	) 
                                ); ?>
							</section> <?php // end article section ?>

							<footer class="article-footer single-footer clearfix">
								<span class="tags pull-left"><?php printf( '<span class="">' . __( 'in %1$s&nbsp;&nbsp;', 'bonestheme' ) . '</span>', get_the_category_list(', ') ); ?> <?php the_tags( '<span class="tags-title">' . __( '<i class="fa fa-tags"></i>', 'bonestheme' ) . '</span> ', ', ', '' ); ?></span>
              					<span class="commentnum pull-right"><a href="<?php comments_link(); ?>"><?php comments_number( '<i class="fa fa-comment"></i> 0', '<i class="fa fa-comment"></i> 1', '<i class="fa fa-comment"></i> %' ); ?></a></span>
            				</footer> <?php // end article footer ?>


						</article> <?php // end article ?>

					<?php get_template_part( 'author-info' ); ?>

					<?php if ( is_single() ) {?>
					  <div id="single-post-nav">
					    <ul class="pager">

					      <?php $trunc_limit = 30; ?>

					      <?php if( '' != get_previous_post() ) { ?>
					        <li class="previous">
					          <?php previous_post_link( '<span class="previous-page">%link</span>', __( '<i class="fa fa-caret-left"></i>', 'bones' ) . '&nbsp;' . brew_truncate_text( get_previous_post()->post_title, $trunc_limit ) ); ?>
					        </li>
					      <?php } // end if ?>

					      <?php if( '' != get_next_post() ) { ?>
					        <li class="next">
					          <?php next_post_link( '<span class="no-previous-page-link next-page">%link</span>', '&nbsp;' . brew_truncate_text( get_next_post()->post_title, $trunc_limit ) . '&nbsp;' . __( '<i class="fa fa-caret-right"></i>', 'bones' ) ); ?>
					        </li>
					      <?php } // end if ?>

					    </ul>
					  </div><!-- /#single-post-nav -->
					<?php } ?>

                    </div>
                    <div class="white-box comments-box">

          <?php comments_template(); ?>

					<?php endwhile; ?>

					<?php else : ?>

						<article id="post-not-found" class="hentry clearfix">
								<header class="article-header">
									<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
								</section>
								<footer class="article-footer">
										<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
								</footer>
						</article>

					<?php endif; ?>

                    </div>

				</div> <?php // end #main ?>

				<?php //get_sidebar(); ?>

			</div> <?php // end #content ?>

    </div> <?php // end ./container ?>

<?php get_footer(); ?>
