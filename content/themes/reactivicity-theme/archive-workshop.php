<?php get_header(); ?>

<style type="text/css">

    .acf-map {
        width: 100%;
        height: 400px;
        border: #ccc solid 1px;
        margin: 20px 0;
    }

</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
    (function($) {

        /*
         *  render_map
         *
         *  This function will render a Google Map onto the selected jQuery element
         *
         *  @type	function
         *  @date	8/11/2013
         *  @since	4.3.0
         *
         *  @param	$el (jQuery element)
         *  @return	n/a
         */

        function render_map( $el ) {

            // var
            var $markers = $el.find('.marker');

            // vars
            var args = {
                zoom		: 16,
                center		: new google.maps.LatLng(0, 0),
                mapTypeId	: google.maps.MapTypeId.ROADMAP
            };

            // create map
            var map = new google.maps.Map( $el[0], args);

            // add a markers reference
            map.markers = [];

            // add markers
            $markers.each(function(){

                add_marker( $(this), map );

            });

            // center map
            center_map( map );

            return map;

        }

        /*
         *  add_marker
         *
         *  This function will add a marker to the selected Google Map
         *
         *  @type	function
         *  @date	8/11/2013
         *  @since	4.3.0
         *
         *  @param	$marker (jQuery element)
         *  @param	map (Google Map object)
         *  @return	n/a
         */

        function add_marker( $marker, map ) {

            // var
            var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

            // create marker
            var marker = new google.maps.Marker({
                position	: latlng,
                map			: map,
                title       : $marker.attr('data-title')
            });

            // add to array
            map.markers[$marker.attr('data-id')] = marker;

            // if marker contains HTML, add it to an infoWindow
            if( $marker.html() )
            {
                // create info window
                var infowindow = new google.maps.InfoWindow({
                    content		: $marker.html(),
                    maxWidth: 200
                });

                // show info window when marker is clicked
                google.maps.event.addListener(marker, 'click', function() {

                    infowindow.open( map, marker );

                });

                // close info window when map is clicked
                google.maps.event.addListener(map, 'click', function() {
                    infowindow.close();
                });
            }

        }

        /*
         *  center_map
         *
         *  This function will center the map, showing all markers attached to this map
         *
         *  @type	function
         *  @date	8/11/2013
         *  @since	4.3.0
         *
         *  @param	map (Google Map object)
         *  @return	n/a
         */

        function center_map( map ) {

            // vars
            var bounds = new google.maps.LatLngBounds();

            // loop through all markers and create bounds
            Object.keys(map.markers).forEach(function(key) {
                var marker = map.markers[key];
                var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

                bounds.extend( latlng );

            });

            // only 1 marker?
            if( Object.keys(map.markers).length == 1 )
            {
                // set center of map
                map.setCenter( bounds.getCenter() );
                map.setZoom( 16 );
            }
            else
            {
                // fit to bounds
                map.fitBounds( bounds );
            }

        }

        /*
         *  document ready
         *
         *  This function will render each map when the document is ready (page has loaded)
         *
         *  @type	function
         *  @date	8/11/2013
         *  @since	5.0.0
         *
         *  @param	n/a
         *  @return	n/a
         */

        $(document).ready(function(){

            var maps = [];

            $('.acf-map').each(function(){

                maps.push(render_map( $(this) ));

            });

            $('.workshop-btn').on('click', function(e) {
                e.preventDefault();
                google.maps.event.trigger(maps[0].markers[$(this).attr('data-id')], 'click');
            });

        });

    })(jQuery);
</script>

      <div class="container">

  			<div id="content" class="row clearfix">

                <div id="main" class="col-xs-12 clearfix" role="main">

            <!-- UNCOMMENT FOR BREADCRUMBS
            <?php if ( function_exists('custom_breadcrumb') ) { custom_breadcrumb(); } ?> -->

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

                        <div class="row">

                            <div class="col-xs-6 col-sm-4"></div>

                            <div class="col-xs-6 col-sm-8">
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

                        <!--
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

							<header class="article-header">

								<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								<p class="byline vcard"><?php
									printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>.', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( __( 'F jS, Y', 'bonestheme' ) ), bones_get_the_author_posts_link());
								?></p>

							</header> <?php // end article header ?>

							<section class="entry-content clearfix">

								<?php the_excerpt(); ?>

							</section> <?php // end article section ?>

							<footer class="article-footer">

							</footer> <?php // end article footer ?>

						</article> <?php // end article ?>

						<?php endwhile; ?>

								<?php if ( function_exists( 'bones_page_navi' ) ) { ?>
										<?php bones_page_navi(); ?>
								<?php } else { ?>
										<nav class="wp-prev-next">
												<ul class="clearfix">
													<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
													<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
												</ul>
										</nav>
								<?php } ?>

						<?php else : ?>

								<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the custom posty type archive template.', 'bonestheme' ); ?></p>
									</footer>
								</article>

						<?php endif; ?>
						-->

					</div> <?php // end #main ?>

					<?php //get_sidebar(); ?>

  			</div> <?php // end #content ?>

      </div> <?php // end ./container ?> 

<?php get_footer(); ?>
