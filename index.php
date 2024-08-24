<?php get_header(); ?>


<?php get_template_part('page_title') ?>


    <!-- our-blog -->
    <section class="our-blog news-section sidebar-page-container gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="our-blog-content default-blog-content">
                        <div class="row">
                          <?php
                          $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                          $args = array(
                            'post_type' => 'post',
                          'order' => 'DESC' ,
                          'paged' => $paged ,
                          );
                          $query = new WP_Query( $args );
                           ?>

                          <?php if ($query->have_posts() ) :while ($query->have_posts() ) :$query->the_post(); ?>


                            <div class="col-lg-6 col-md-6 col-sm-12 news-column">
                                <div class="single-news-content">
                                    <figure class="image-box"><?php the_post_thumbnail(); ?></figure>
                                    <div class="content-box">
                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <ul class="info-content">
                                            <li>by <span><?php the_author_posts_link(); ?></span></li>
                                            <li>on <?php the_time('d M, Y'); ?></li>
                                        </ul>
                                        <a href="<?php the_permalink(); ?>" class="link"><i class="flaticon-next"></i></a>
                                    </div>
                                </div>
                            </div>

                          <?php endwhile; endif; ?>




                        </div>
                        <div class="row"><?php if (function_exists("pagination")) {    pagination($additional_loop->max_num_pages);} ?>


                        <?php wp_reset_postdata(); ?></div>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
    <!-- our-blog end -->


<?php get_footer(); ?>
