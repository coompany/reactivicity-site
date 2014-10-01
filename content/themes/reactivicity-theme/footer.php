    <div class="container">
        <footer id="footer">
            <div id="footer-widgets" class="row">

                <div id="footer-wrapper">

                    <div class="col-sm-6 col-md-3">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : ?>
                        <?php endif; ?>
                    </div> <!-- end widget1 -->

                    <div class="col-sm-6 col-md-3">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : ?>
                        <?php endif; ?>
                    </div> <!-- end widget1 -->

                    <div class="col-sm-6 col-md-3">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3') ) : ?>
                        <?php endif; ?>
                    </div> <!-- end widget1 -->

                    <div class="col-sm-6 col-md-3">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-4') ) : ?>
                        <?php endif; ?>
                    </div> <!-- end widget1 -->


                </div> <!-- end #footer-wrapper -->

            </div> <!-- end #footer-widgets -->

            <div id="sub-floor" class="row">
                <div class="col-md-4 copyright">
                    &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>
                </div>
                <div class="col-md-4 col-md-offset-4 attribution">
                    <a href="http://www.danvswild.com/brew" target="_blank">Here goes</a> the <a target="_blank" href="http://www.danvswild.com">credits</a>
                </div>
            </div>

        </footer> <!-- end footer -->
    </div>

    <!-- all js scripts are loaded in library/bones.php -->
    <?php wp_footer(); ?>
    <!-- Hello? Doctor? Name? Continue? Yesterday? Tomorrow?  -->

  </body>

</html> <!-- end page. what a ride! -->
