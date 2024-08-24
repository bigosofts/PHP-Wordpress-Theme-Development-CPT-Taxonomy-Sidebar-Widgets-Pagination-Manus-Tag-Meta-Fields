<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
<!-- main-footer -->
<footer class="main-footer">
    <div class="container">
        <?php get_template_part('footer-widget'); ?>
    </div>
</footer>
<!-- main-footer end -->


<!-- footer-bottom -->
<div class="footer-bottom">
    <div class="container">
        <?php dynamic_sidebar('sidebar3'); ?>
    </div>
</div>
<!-- footer-bottom end -->



<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
<span class="fa fa-angle-up"></span>
</button>


<!-- jequery plugins -->
<script src="<?php echo get_template_directory_uri() . '/js/jquery.js'?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/popper.min.js'?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/bootstrap.min.js'?>"></script>

<script src="<?php echo get_template_directory_uri() . '/js/owl.carousel.min.js'?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/wow.js'?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/validation.js'?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/isotope.js'?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/html5lightbox/html5lightbox.js'?>"></script>
<script type="<?php echo get_template_directory_uri() . '/js/SmoothScroll.js'?>"></script>

<!-- map script -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBevTAR-V2fDy9gQsQn1xNHBPH2D36kck0"></script>
<script src="<?php echo get_template_directory_uri() . '/js/gmaps.js'?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/map-helper.js'?>"></script>

<!-- main-js -->
<script src="<?php echo get_template_directory_uri() . '/js/script.js'?>"></script>


<?php wp_footer(); ?>
</body><!-- End of .page_wrapper -->
</html>
