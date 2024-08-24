<?php get_header(); ?>


<?php get_template_part('page_title') ?>


    <!-- event-details -->
    <section class="event-details event-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 offset-lg-2 event-column">
                    <div class="event-details-content">

                      <?php
                        global $post;
                        $i=0;

                        if (have_posts() ) : while (have_posts() ) : the_post(); 


                        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'event');
                        $i++;
                        $this_id = get_the_ID();
                        global $wpdb;
                        $tbl_postmeta = $wpdb->prefix."postmeta";

                        $meta_event_location = 'meta-event-location';
                        $meta_event_time = 'meta-event-time';
                        $meta_event_date = 'meta-event-date';

                        $query_result = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_event_location'";
                        $query_result2 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_event_time'";
                        $query_result3 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_event_date'";

                        $result = $wpdb->get_results($query_result);
                        $result2 = $wpdb->get_results($query_result2);
                        $result3 = $wpdb->get_results($query_result3);


                        foreach($result as $row)
                        {
                          $m_event_location = $row->meta_value;
                        }
                        foreach($result2 as $row)
                        {
                          $m_event_time = $row->meta_value;
                        }
                        foreach($result3 as $row)
                        {
                          $m_event_date = $row->meta_value;
                        }

                      ?>

                        <div class="content-style-one">
                            <figure class="image-box"><img src="<?php echo $large_image_url[0]; ?>" alt=""></figure>
                            <div class="event-title"><?php the_title(); ?></div>
                            <ul class="info-content">
                                <li><i class="fa fa-map-marker"></i><?php echo $m_event_location; ?></li>
                                <li><i class="fa fa-clock-o"></i><?php echo $m_event_time; ?></li>
                                <li><i class="fa fa-calendar"></i><?php echo $m_event_date; ?></li>
                            </ul>

                            <div class="text">
                                <?php the_content(); ?>
                            </div>
                        </div>


                    <?php endwhile; endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- event-details end -->


<?php get_footer(); ?>
