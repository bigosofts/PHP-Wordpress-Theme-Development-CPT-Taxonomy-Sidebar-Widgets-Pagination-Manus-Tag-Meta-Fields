<?php get_header(); ?>


<?php get_template_part('page_title') ?>


<!-- blog-details -->
<section class="blog-details sidebar-page-container gray-bg">
    <div class="container">
        <div class="row">




          <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>

            <div class="col-lg-8 col-md-12 col-sm-12 offset-lg-2 content-side">
                <div class="blog-details-content default-blog-content">

                            <figure class="image-box"><?php the_post_thumbnail('full'); ?></figure>
                            <div class="content-box">
                                <div class="content-style-one">
                                    <div class="title"><?php the_title(); ?></div>
                                    <ul class="info-content">
                                        <li>by <span><?php the_author_posts_link(); ?></span></li>
                                        <li>on <?php the_time('d M, Y'); ?></li>
                                    </ul>
                                    <div class="text">
                                        <p><?php the_content(); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php comments_template(); ?>


                </div>
            </div>

          <?php endwhile; endif; ?>




        </div>
    </div>
</section>
<!-- blog-details end -->

<?php get_footer(); ?>
