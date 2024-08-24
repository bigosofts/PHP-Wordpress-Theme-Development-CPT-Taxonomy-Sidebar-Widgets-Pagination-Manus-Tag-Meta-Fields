<div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
    <div class="sidebar default-sidebar-content">

        <?php dynamic_sidebar('sidebar1'); ?>

        <div class="sidebar-post sidebar-widget">
            <div class="sidebar-title"><h4>Latest Posts</h4></div>
            <div class="post-inner">
              <?php
                  $args = array(
                  'post_type'      => 'post',
                  'category_name'  => '',
                  'post_status' => 'publish',
                  'order' => 'DESC',
                  'cat' => '',
                  'posts_per_page' => 3,
                  'facetwp' => true,
              );
                  $query = new WP_Query( $args );
              ?>

              <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>


                <div class="single-post">
                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <div class="post-date"><i class="flaticon-small-calendar"></i><?php the_time('d M, Y'); ?></div>
                </div>

              <?php endwhile; endif; ?>
              <?php wp_reset_postdata(); ?>


            </div>
        </div>

    </div>
</div>
