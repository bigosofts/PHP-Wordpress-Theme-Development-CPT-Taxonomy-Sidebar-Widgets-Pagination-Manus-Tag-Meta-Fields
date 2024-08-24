<?php get_header(); ?>


<?php get_template_part('page_title') ?>


    <!-- team-section -->
    <section class="team-section team-page">
        <div class="container">
            <div class="row">

              <?php
                global $post;
                $i=0;

                if (have_posts() ) : while (have_posts() ) : the_post();

                $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'team-member');
                $i++;
                $this_id = get_the_ID();
                global $wpdb;
                $tbl_postmeta = $wpdb->prefix."postmeta";

                $meta_facebook_link = 'meta-facebook-url';
                $meta_twitter_link = 'meta-twitter-url';
                $meta_linkedin_link = 'meta-linkedin-url';
                $meta_team_designation = 'meta-team-designation';

                $query_result = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_facebook_link'";
                $query_result2 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_twitter_link'";
                $query_result3 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_linkedin_link'";
                $query_result4 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_team_designation'";

                $result = $wpdb->get_results($query_result);
                $result2 = $wpdb->get_results($query_result2);
                $result3 = $wpdb->get_results($query_result3);
                $result4 = $wpdb->get_results($query_result4);


                foreach($result as $row)
                {
                  $m_facebook_link = $row->meta_value;
                }
                foreach($result2 as $row)
                {
                  $m_twitter_link = $row->meta_value;
                }
                foreach($result3 as $row)
                {
                  $m_linkedin_link = $row->meta_value;
                }
                foreach($result4 as $row)
                {
                  $m_designation_name = $row->meta_value;
                }


              ?>


                <div class="col-lg-3 col-md-6 col-sm-12 team-column">
                    <div class="single-team-content inner-box">
                        <figure class="image-box">
                            <img src="<?php echo $large_image_url[0]; ?>" alt="">
                            <div class="overlay">
                                <div class="wrapper">
                                    <a href="<?php echo $m_facebook_link; ?>"><i class="fa fa-facebook"></i></a>
                                    <a href="<?php echo $m_twitter_link; ?>"><i class="fa fa-twitter"></i></a>
                                    <a href="<?php echo $m_linkedin_link; ?>"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </figure>
                        <div class="lower-content">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <div class="text"><?php echo $m_designation_name; ?></div>
                        </div>
                    </div>
                </div>


             <?php endwhile; endif; ?>




            </div>
            <div class="row"><?php if (function_exists("pagination")) {    pagination($additional_loop->max_num_pages);} ?>


            <?php wp_reset_postdata(); ?></div>
        </div>
    </section>
    <!-- team-section end -->


<?php get_footer(); ?>
