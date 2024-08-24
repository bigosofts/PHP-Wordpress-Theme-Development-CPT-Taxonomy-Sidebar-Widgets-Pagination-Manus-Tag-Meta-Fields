<?php get_header(); ?>


<?php get_template_part('page_title') ?>


    <!-- articles-section -->
    <section class="articles-section">
        <div class="container">
          <div class="title-box centred">
              <div class="sec-title">Search Results For: " <?php the_search_query(); ?> "</div>
          </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 column">
                    <div class="products-discription">
                        <div class="tab-details-content">
                            <div class="tab-content" id="details">
                                <div class="single-tab-content">
                                  <?php
                                    if (have_posts() ) : while (have_posts() ) : the_post();?>

                                    <div class="single-item">
                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <div class="text"><?php echo excerpt('50'); ?></div>
                                    </div>

                                  <?php endwhile; endif; ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row"><?php if (function_exists("pagination")) {    pagination($additional_loop->max_num_pages);} ?>


            <?php wp_reset_postdata(); ?></div>
        </div>
    </section>
    <!-- articles-section end -->


<?php get_footer(); ?>
