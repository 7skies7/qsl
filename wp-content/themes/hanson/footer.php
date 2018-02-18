        </div><!-- #content -->
        <!-- footer start -->
        <footer>
            <?php if( is_active_sidebar( 'footer-sidebar-1' ) || is_active_sidebar( 'footer-sidebar-2' ) || is_active_sidebar( 'footer-sidebar-3' ) || is_active_sidebar( 'footer-sidebar-4' ) ) : ?>
            <div class="footer pad60">

                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12"><?php dynamic_sidebar( 'footer-sidebar-1' ); ?></div>
                        <div class="col-md-3 col-sm-6 col-xs-12"><?php dynamic_sidebar( 'footer-sidebar-2' ); ?></div>
                        <div class="col-md-3 col-sm-6 col-xs-12"><?php dynamic_sidebar( 'footer-sidebar-3' ); ?></div>
                        <div class="col-md-3 col-sm-6 col-xs-12"><?php dynamic_sidebar( 'footer-sidebar-4' ); ?></div>
                    </div> <!-- /.row -->
                </div> <!-- /.container -->

            </div> <!-- /.footer -->
            <?php endif; ?>

            <?php $copyright = get_theme_mod( 'copyright_text', 'Copyright 2017 Hanson WordPress Theme - by iThemesLab' ); ?>

            <div id="copyright" class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="t-center">
                                <p id="copyright-text"><?php echo esc_html( $copyright ); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->

        <?php get_template_part( 'layouts/hanson', 'totop' ); ?>

    </div> <!--/.main-container-->
    <?php wp_footer(); ?>
</body>
</html>
