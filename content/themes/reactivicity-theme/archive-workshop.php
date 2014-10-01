<?php get_header(); ?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
<script src="<?php echo get_template_directory_uri(); ?>/library/js/maps.js" type="text/javascript"></script>

      <div class="container">

  			<div id="content" class="row clearfix">

                <div id="main" class="col-xs-12 clearfix workshops-archive" role="main">

            <!-- UNCOMMENT FOR BREADCRUMBS
            <?php if ( function_exists('custom_breadcrumb') ) { custom_breadcrumb(); } ?> -->

                    <div class="white-box">

                        <h1 class="archive-title h2"><?php post_type_archive_title(); ?></h1>

                            <?php
                            $workshops = array();
                            query_posts("post_type=workshop&posts_per_page=-1");
                            if (have_posts()) : while (have_posts()) : the_post();
                                $excerpt = substr(get_the_excerpt(), 0, 280);
                                $excerpt_link = explode('<p><a class="excerpt-read-more', $excerpt);
                                $excerpt = $excerpt_link[0].'...</p>';
                                $excerpt_link = $excerpt.'<p><a class="btn btn-primary btn-xs" href="'.get_permalink().'">'.__( 'Read More', 'bonestheme' ).'</a></p>';
                                $workshop = array(
                                    'id' => get_the_ID(),
                                    'title' => get_the_title(),
                                    'content' => apply_filters('the_content', get_the_content()),
                                    'excerpt_link' => $excerpt_link,
                                    'excerpt' => $excerpt,
                                    'image' => wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'post-featured' ),
                                    'link' => get_permalink(),
                                    'location' => get_field('location')
                                );
                            array_push($workshops, $workshop);
                            endwhile; endif;
                            ?>

                            <div class="acf-map">
                            <?php foreach($workshops as $workshop) { ?>
                                <div class="marker" data-id="<?php echo $workshop['id']; ?>" data-title="<?php echo $workshop['title']; ?>" data-lat="<?php echo $workshop['location']['lat']; ?>" data-lng="<?php echo $workshop['location']['lng']; ?>">
                                    <h6><?php echo $workshop['title']; ?></h6>
                                    <?php echo $workshop['excerpt_link']; ?>
                                </div>
                            <?php } ?>
                            </div>

                            <div class="row" id="workshops-list">

                                <div class="col-xs-12 col-sm-4"></div>

                                <div class="col-xs-12 col-sm-8">
                                    <div class="list-group">
                                        <?php foreach($workshops as $workshop) { ?>
                                        <a href="#" data-id="<?php echo $workshop['id']; ?>" class="list-group-item workshop-btn">
                                            <h4 class="list-group-item-heading"><?php echo $workshop['title']; ?></h4>
                                            <p class="list-group-item-text">
                                                <?php echo $workshop['excerpt']; ?>
                                            </p>
                                        </a>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>

                        </div>

					</div> <?php // end #main ?>

					<?php //get_sidebar(); ?>

  			</div> <?php // end #content ?>

      </div> <?php // end ./container ?> 

<?php get_footer(); ?>
