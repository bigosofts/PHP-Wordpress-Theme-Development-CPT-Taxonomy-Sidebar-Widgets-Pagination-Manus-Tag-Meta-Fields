<?php get_header(); ?>


<?php get_template_part('page_title') ?>


<!-- our-blog -->
<section class="our-blog news-section sidebar-page-container gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                <div class="our-blog-content default-blog-content">
                    <div class="row">


              <?php
                  global $post;
              ?>

              <?php if (have_posts() ) : while ( have_posts() ) :the_post();

                  $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'slider-items');


               ?>



               <div class="col-lg-4 col-md-6 col-sm-12 news-column">
                   <div class="single-news-content">
                       <figure class="image-box"><div style="background-image: url('<?php echo $large_image_url[0]; ?>'); width: 510px;height: 510px;background-position: center center;background-repeat: no-repeat;"> </div></figure>
                       <div class="content-box">
                           <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                           <a href="<?php the_permalink(); ?>" class="link"><i class="flaticon-next"></i></a>
                       </div>
                   </div>
               </div>

              <?php endwhile; endif;?>


            </div>
            <div class="row"><?php if (function_exists("pagination")) {    pagination($additional_loop->max_num_pages);} ?>


            <?php wp_reset_postdata(); ?></div>
        </div>
    </div>

</div>
</div>
</section>
<!-- our-blog end -->




<?php get_footer(); ?>
