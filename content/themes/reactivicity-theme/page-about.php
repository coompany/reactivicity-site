<?php
/*
Template Name: About Page
*/
?>

<?php get_header(); ?>

      <div class="container">

        <div id="content" class="clearfix row">
        
          <div id="main" class="col-md-12 clearfix" role="main">

            <!-- UNCOMMENT FOR BREADCRUMBS
            <?php if ( function_exists('custom_breadcrumb') ) { custom_breadcrumb(); } ?> -->

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
              
              <header class="page-head article-header">
                
                <div class=""><h1 class="page-title entry-title" itemprop="headline"><?php the_title(); ?></h1></div>
              
              </header> <!-- end article header -->
            
              <section class="page-content entry-content clearfix" itemprop="articleBody">
                <?php the_content(); ?>
            
              </section> <!-- end article section -->
              
              <footer>
        
                <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ', ', '</p>'); ?>
                
              </footer> <!-- end article footer -->
            
            </article> <!-- end article -->

            <article id="about-logos" class="row hentry">
                <div class="col-xs-12">
                    <section class="row">
                        <div class="col-xs-3">
                            <a href="#" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/ldb.png" alt="Fork In Progress" />
                            </a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/coom-logo.png" alt="Coompany srls" />
                            </a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/pop-hub.jpg" alt="Pop-hub" />
                            </a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/esperimenti.png" alt="Esperimenti" />
                            </a>
                        </div>
                    </section>
                    <section class="row">
                        <div class="col-xs-3">
                            <a href="#" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/fork-in-progress.jpg" alt="Fork In Progress" />
                            </a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/lup.png" alt="LUP - Laboratorio di Urbanistica Partecipata" />
                            </a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/vuoti-a-rendere.png" alt="Vuoti a Rendere" />
                            </a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/hd_logo.jpg" alt="HeriCool DigiTools" />
                            </a>
                        </div>

                        <div id="istituzionali" class="col-xs-12">
                            <a href="#" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/loghi_istituzionali.png" alt="Fork In Progress" />
                            </a>
                        </div>
                    </section>
                </div>
                <section>

                </section>
            </article>
            
            <?php comments_template('',true); ?>
            
            <?php endwhile; ?>    
            
            <?php else : ?>
            
            <article id="post-not-found">
                <header>
                  <h1><?php _e("Not Found", "bonestheme"); ?></h1>
                </header>
                <section class="post_content">
                  <p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
                </section>
                <footer>
                </footer>
            </article>
            
            <?php endif; ?>
        
          </div> <!-- end #main -->
            
        </div> <!-- end #content -->

      </div> <!-- end .container -->

<?php get_footer(); ?>
