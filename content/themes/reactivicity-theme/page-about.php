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
              
              <header class="page-head article-header sr-only">
                
                <div class=""><h1 class="page-title entry-title" itemprop="headline"><?php the_title(); ?></h1></div>
              
              </header> <!-- end article header -->
            
              <section class="page-content entry-content clearfix" itemprop="articleBody" style="padding-top: 40px">
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
                            <a href="http://www.laboratoridalbasso.it/" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/ldb.png" alt="Fork In Progress" />
                            </a>
                        </div>
                        <div class="col-xs-3">
                            <a href="http://www.coompany.eu/" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/coom-logo.png" alt="Coompany srls" />
                            </a>
                        </div>
                        <div class="col-xs-3">
                            <a href="http://www.pophub.it/" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/pop-hub.jpg" alt="Pop-hub" />
                            </a>
                        </div>
                        <div class="col-xs-3">
                            <a href="http://www.esperimentiarchitettonici.it/" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/esperimenti.png" alt="Esperimenti" />
                            </a>
                        </div>
                    </section>
                    <section class="row">
                        <div class="col-xs-3">
                            <a href="http://www.forkinprogress.it/" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/fork-in-progress.jpg" alt="Fork In Progress" />
                            </a>
                        </div>
                        <div class="col-xs-3">
                            <a href="https://www.facebook.com/lupmolfetta" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/lup.png" alt="LUP - Laboratorio di Urbanistica Partecipata" />
                            </a>
                        </div>
                        <div class="col-xs-3">
                            <a href="http://www.vuotiarendere.com/" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/vuoti-a-rendere.png" alt="Vuoti a Rendere" />
                            </a>
                        </div>
                        <div class="col-xs-3">
                            <a href="https://www.facebook.com/hericool.digitools" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/hd_logo.jpg" alt="HeriCool DigiTools" />
                            </a>
                        </div>

                    </section>
                    <section class="row">
                        <div class="col-xs-2 col-xs-offset-1">
                            <a href="https://www.facebook.com/garden.faber" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/garden-faber.jpg" alt="garden faber" />
                            </a>
                        </div>
                        <div class="col-xs-2">
                            <a href="http://about.me/progettoinculture" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/progettoinculture.jpg" alt="Progetto Inculture" />
                            </a>
                        </div>
                        <div class="col-xs-2">
                            <a href="https://www.facebook.com/siamotuttitufi" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/siamo-tutti.jpg" alt="Siamo Tutti Tufi" />
                            </a>
                        </div>
                        <div class="col-xs-2">
                            <a href="https://www.facebook.com/undergravina" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/undergra.jpg" alt="Undergrà" />
                            </a>
                        </div>
                        <div class="col-xs-2">
                            <a href="http://www.xscape.it/" target="_blank">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/x-scape.jpg" alt="X - Scape" />
                            </a>
                        </div>

                    </section>
                    <section class="row">

                        <div id="istituzionali" class="col-xs-12">
                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/library/images/loghi/loghi_istituzionali.png" alt="Fork In Progress" />
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
