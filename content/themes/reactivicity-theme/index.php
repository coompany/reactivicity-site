<?php get_header(); ?>


    <div class="container">

			<div id="content" class="row clearfix">

						<div id="main" class="col-xs-12 clearfix" role="main">

                            <?php
                            //query_posts("post_type=post&category_name=news&tag=homepage&posts_per_page=-1");
                            $wp_query = new WP_Query("post_type=post&category_name=news&tag=homepage&posts_per_page=-1");
							if ($wp_query->have_posts()) : ?>
                            <div class="white-box hidden-xs hidden-sm">
                                <div class="row" id="home-tiles">
                                <?php $i = 0; ?>
                                <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-featured' ); ?>
                                    <div class="col-xs-3 tile-container">

                                        <article id="post-<?php the_ID(); ?>" class="flip-container" ontouchstart="this.classList.toggle('hover');" role="article">
                                            <div class="flipper">
                                                <div class="front">
                                                    <?php // front content ?>
                                                    <div class="tile-image" style="background-image: url(http://lorempixel.com/500/500/city/<?php echo $i++; ?><?php //echo $image[0]; ?>)" class="img-responsive"></div>
                                                </div>
                                                <div class="back">
                                                    <?php // back content ?>
                                                    <div class="wrapper">
                                                        <header class="article-header">
                                                            <div class="titlewrap clearfix">
                                                                <h4 class="post-title entry-title">
                                                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                                                        <?php the_title(); ?>
                                                                    </a>
                                                                </h4>
                                                                <p class="byline vcard">
                                                                    <!--by <span class="author"><em><?php echo bones_get_the_author_posts_link() ?></em></span> - -->
                                                                    <!--<time class="updated" datetime="<?php get_the_time('Y-m-j') ?>"><?php echo get_the_time(get_option('date_format')) ?></time>-->
                                                                    <span class="sticky-ind pull-right"><i class="fa fa-star"></i></span>
                                                                </p>
                                                            </div>
                                                        </header> <?php // end article header ?>
                                                        <footer class="article-footer clearfix">
                                                            <!--<span class="tags pull-left"><?php printf( '<span class="">' . __( 'in %1$s&nbsp;&nbsp;', 'bonestheme' ) . '</span>', get_the_category_list(', ') ); ?> <?php the_tags( '<span class="tags-title">' . __( '<i class="fa fa-tags"></i>', 'bonestheme' ) . '</span> ', ', ', '' ); ?></span>-->
                                                            <time class="updated pull-left" datetime="<?php get_the_time('Y-m-j') ?>"><?php echo get_the_time(get_option('date_format')) ?></time>
                                                            <span class="commentnum pull-right"><a href="<?php comments_link(); ?>"><?php comments_number( '<i class="fa fa-comment"></i> 0', '<i class="fa fa-comment"></i> 1', '<i class="fa fa-comment"></i> %' ); ?></a></span>
                                                        </footer> <?php // end article footer ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                <?php endwhile; ?>
                                    <?php if (function_exists("emm_paginate")) { ?>
                                        <?php emm_paginate(); ?>
                                    <?php } else { ?>
                                        <nav class="wp-prev-next">
                                            <ul class="clearfix">
                                                <li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
                                                <li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
                                            </ul>
                                        </nav>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php else : ?>

                                <article id="post-not-found" class="hentry clearfix">
                                    <header class="article-header">
                                        <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                                    </header>
                                    <section class="entry-content">
                                        <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                                    </section>
                                    <footer class="article-footer">
                                        <p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
                                    </footer>
                                </article>


                            <?php endif; ?>

                            <?php wp_reset_query(); ?>

                            <?php
                            if ( get_query_var('paged') != '' ) { $paged = get_query_var('paged'); }
                            elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
                            else { $paged = 1; }
                            /*
                            $query_args = array(
                                'post_type' => 'post',
                                'category_name' => 'news',
                                'tag__not_in' => array(get_term_by('name', 'homepage', 'post_tag')->term_id),
                                'posts_per_page' => 2,
                                'paged' => $paged
                            );
                            query_posts($query_args);
                            */
                            $wp_query = new WP_Query('post_type=post&posts_per_page=2&category_name=news&tag__not_in='.get_term_by('name', 'homepage', 'post_tag')->term_id.'&paged='.$paged);
                            if($wp_query->have_posts()) : ?>

                                <div class="white-box">
                                <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>

                                    <div class="row">
                                        <div class="col-xs-12 home-news">
                                            <article id="post-<?php the_ID(); ?>" class="hentry" role="article">
                                                <header class="article-header">
                                                    <div class="titlewrap clearfix">
                                                        <h1 class="post-title entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                                                        <p class="byline vcard">
                                                            by <span class="author"><em><?php echo bones_get_the_author_posts_link() ?></em></span> -
                                                            <time class="updated" datetime="<?php get_the_time('Y-m-j') ?>"><?php echo get_the_time(get_option('date_format')) ?></time>
                                                            <span class="sticky-ind pull-right"><i class="fa fa-star"></i></span>
                                                        </p>
                                                    </div>
                                                </header> <?php // end article header ?>
                                                <section class="article-content">
                                                    <?php the_excerpt(); ?>
                                                </section>
                                                <footer class="article-footer clearfix">
                                                    <span class="tags pull-left"><?php printf( '<span class="">' . __( 'in %1$s&nbsp;&nbsp;', 'bonestheme' ) . '</span>', get_the_category_list(', ') ); ?> <?php the_tags( '<span class="tags-title">' . __( '<i class="fa fa-tags"></i>', 'bonestheme' ) . '</span> ', ', ', '' ); ?></span>
                                                    <span class="commentnum pull-right"><a href="<?php comments_link(); ?>"><?php comments_number( '<i class="fa fa-comment"></i> 0', '<i class="fa fa-comment"></i> 1', '<i class="fa fa-comment"></i> %' ); ?></a></span>
                                                </footer> <?php // end article footer ?>
                                            </article>
                                        </div>
                                    </div>

                                <?php endwhile; ?>

                                <?php if (function_exists("emm_paginate")) { ?>
                                    <?php emm_paginate(null, $query_news); ?>
                                <?php } else { ?>
                                    <nav class="wp-prev-next">
                                        <ul class="clearfix">
                                            <li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
                                            <li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
                                        </ul>
                                    </nav>
                                <?php } ?>

                            </div>

                            <?php endif; ?>

						</div> <?php // end #main ?>


						<?php //get_sidebar(); ?>


			</div> <?php // end #content ?>

    </div> <!-- end ./container -->

<?php get_footer(); ?>
