<div class="widgets-section">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 footer-column footer1">

            <?php dynamic_sidebar('sidebar2'); ?>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 footer-column footer2">
          <div class="link-widget footer-widget">
              <div class="footer-title">Quick Link</div>

              <?php
                wp_nav_menu( array(
                  'container' => 'ul',
                  'menu_class' => 'link-list',
                  'depth' => 2,
                  'theme_location' => 'tertiary' ));
              ?>
          </div>
        </div>


        <div class="col-lg-3 col-md-6 col-sm-12 footer-column footer3">
            <div class="event-widget footer-widget">
                <div class="footer-title">Latest Events</div>

                <?php
                    $args = array(
                    'post_type'      => 'post',
                    'category_name'  => '',
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    'cat' => '',
                    'posts_per_page' => 2,
                    'facetwp' => true,
                );
                    $query = new WP_Query( $args );
                ?>

                <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="single-event">
                    <div class="link"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                    <div class="text"><i class="flaticon-small-calendar"></i><?php the_time('d M, Y'); ?></div>
                </div>

              <?php endwhile; endif; ?>
              <?php wp_reset_postdata(); ?>

            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 footer-column footer4">
          <div class="link-widget footer-widget">
              <div class="footer-title">Explore More</div>

              <?php
                wp_nav_menu( array(
                  'container' => 'ul',
                  'menu_class' => 'link-list',
                  'depth' => 2,
                  'theme_location' => 'extra' ));
              ?>
          </div>
        </div>
    </div>
</div>
