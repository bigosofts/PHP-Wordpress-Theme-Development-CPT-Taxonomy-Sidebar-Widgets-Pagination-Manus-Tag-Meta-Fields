<?php get_header(); ?>


<?php get_template_part('page_title') ?>


    <!-- our-event -->
    <section class="our-event event-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 event-column">

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

                    if( $i % 2 != 0 ) :

                  ?>

                    <div class="single-event-content">
                        <div class="date centred"><?php the_time('d'); ?><br /><span><?php the_time('M, Y'); ?></span></div>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <ul class="info-content">
                            <li><i class="fa fa-map-marker"></i><?php echo $m_event_location; ?></li>
                            <li><i class="fa fa-clock-o"></i><?php echo $m_event_time; ?></li>
                            <li><i class="fa fa-calendar"></i><?php echo $m_event_date; ?></li>
                        </ul>
                        <div class="link"><a href="<?php the_permalink(); ?>"><i class="flaticon-next"></i></a></div>
                    </div>

                  <?php endif;
                  endwhile; endif; ?>

                </div>



                <div class="col-lg-6 col-md-12 col-sm-12 event-column">


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
                    if( $i % 2 == 0 ) :
                  ?>

                    <div class="single-event-content">
                        <div class="date centred"><?php the_time('d'); ?><br /><span><?php the_time('M, Y'); ?></span></div>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <ul class="info-content">
                          <li><i class="fa fa-map-marker"></i><?php echo $m_event_location; ?></li>
                          <li><i class="fa fa-clock-o"></i><?php echo $m_event_time; ?></li>
                          <li><i class="fa fa-calendar"></i><?php echo $m_event_date; ?></li>
                        </ul>
                        <div class="link"><a href="<?php the_permalink(); ?>"><i class="flaticon-next"></i></a></div>
                    </div>

                  <?php endif;
                  endwhile; endif; ?>



                </div>
            </div>
            <div class="row"><?php if (function_exists("pagination")) {    pagination($additional_loop->max_num_pages);} ?>


            <?php wp_reset_postdata(); ?></div>
        </div>
    </section>
    <!-- our-event -->


<?php get_footer(); ?>
