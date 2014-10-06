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
            </div>

        </footer> <!-- end footer -->
    </div>

    <!-- all js scripts are loaded in library/bones.php -->
    <?php wp_footer(); ?>
    <!-- Hello? Doctor? Name? Continue? Yesterday? Tomorrow?  -->

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-44335029-4', 'auto');
      ga('send', 'pageview');

    </script>

  </body>

</html> <!-- end page. what a ride! -->
