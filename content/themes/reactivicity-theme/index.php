<?php get_header(); ?>


    <div class="container">

			<div id="content" class="row clearfix">

						<div id="main" class="col-xs-12 clearfix" role="main">

                            <?php
                            //query_posts("post_type=post&category_name=news&tag=homepage&posts_per_page=-1");
                            $wp_query = new WP_Query("post_type=post&category_name=news&tag=homepage&posts_per_page=-1");
							if ($wp_query->have_posts()) : ?>
                            <div class="white-box">
                                <div class="row hidden-xs hidden-sm" id="home-tiles">
                                <?php $i = 0; ?>
                                <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-featured' ); ?>
                                    <div class="col-xs-3 tile-container">

                                        <article id="post-<?php the_ID(); ?>" class="flip-container" ontouchstart="this.classList.toggle('hover');" role="article">
                                            <div class="flipper">
                                                <div class="front">
                                                    <?php // front content ?>
                                                    <div class="tile-image" style="background-image: url(<?php echo $image[0]; //echo 'http://lorempixel.com/500/500/city/'.$i++; ?><?php //echo $image[0]; ?>)" class="img-responsive"></div>
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
                                                            <span class="commentnum pull-right">
                                                                <a href="<?php comments_link(); ?>">
                                                                    <?php //echo get_comments_number_text( '<i class="fa fa-comment"></i> 0', '<i class="fa fa-comment"></i> 1', '<i class="fa fa-comment"></i> %' ); ?>
                                                                    <i class="fa fa-comment"></i> <?php echo get_comments_number(get_the_ID()); ?>
                                                                </a>
                                                            </span>
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
                                <div class="row">
                                    <div class="col-xs-12" id="search-container">
                                        <?php get_template_part('searchform'); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12" id="social-container">
                                        <div id="facebook-container" class="hidden-xs hidden-sm">
                                            <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Freactivicity.ldb&amp;width&amp;height=300&amp;colorscheme=light&amp;show_faces=false&amp;header=false&amp;stream=true&amp;show_border=false&amp;appId=" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:395px;" allowTransparency="true"></iframe>
                                        </div>
                                        <div id="twitter-hash-container">
                                            <a class="twitter-timeline" href="https://twitter.com/hashtag/reactivicity" data-widget-id="517792268829220864">#reactivicity Tweet</a>
                                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                                        </div>
                                        <div id="twitter-container" class="hidden-xs hidden-sm">
                                            <a class="twitter-timeline" href="https://twitter.com/reactivicity" data-widget-id="517793115747254273">Tweets di @reactivicity</a>
                                        </div>
                                    </div>
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
                            //$wp_query = new WP_Query('post_type=post&posts_per_page=2&category_name=news&tag__not_in='.get_term_by('name', 'homepage', 'post_tag')->term_id.'&paged='.$paged);
                            $wp_query = new WP_Query('post_type=post&posts_per_page=5&category_name=news&paged='.$paged);
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
                                                    <span class="commentnum pull-right">
                                                        <a href="<?php comments_link(); ?>">
                                                            <?php //echo get_comments_number_text( '<i class="fa fa-comment"></i> 0', '<i class="fa fa-comment"></i> 1', '<i class="fa fa-comment"></i> %' ); ?>
                                                            <i class="fa fa-comment"></i> <?php echo get_comments_number(get_the_ID()); ?>
                                                        </a>
                                                    </span>
                                                </footer> <?php // end article footer ?>
                                            </article>
                                        </div>
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

                            <?php endif; ?>

						</div> <?php // end #main ?>


						<?php //get_sidebar(); ?>


			</div> <?php // end #content ?>

    </div> <!-- end ./container -->

<?php get_footer(); ?>
