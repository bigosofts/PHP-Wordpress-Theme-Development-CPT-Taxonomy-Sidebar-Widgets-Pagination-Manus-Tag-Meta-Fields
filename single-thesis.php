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


                        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'publication');
                        $i++;
                        $this_id = get_the_ID();
                        global $wpdb;
                        $tbl_postmeta = $wpdb->prefix."postmeta";

                        $meta_thesis_author = 'meta-thesis-author';
                        $meta_thesis_designation = 'meta-thesis-designation';
                        $meta_thesis_year = 'meta-thesis-year';
                        $meta_thesis_supervisor = 'meta-thesis-supervisor';
                        $meta_thesis_cosupervisor = 'meta-thesis-cosupervisor';
                        $meta_thesis_profile = 'meta-thesis-profile';



                        $query_result = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_thesis_author'";
                        $query_result2 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_thesis_designation'";
                        $query_result3 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_thesis_year'";
                        $query_result4 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_thesis_supervisor'";
                        $query_result5 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_thesis_cosupervisor'";
                        $query_result6 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_thesis_profile'";


                        $result = $wpdb->get_results($query_result);
                        $result2 = $wpdb->get_results($query_result2);
                        $result3 = $wpdb->get_results($query_result3);
                        $result4 = $wpdb->get_results($query_result4);
                        $result5 = $wpdb->get_results($query_result5);
                        $result6 = $wpdb->get_results($query_result6);



                        foreach($result as $row)
                        {
                          $m_thesis_author = $row->meta_value;
                        }
                        foreach($result2 as $row)
                        {
                          $m_thesis_designation = $row->meta_value;
                        }
                        foreach($result3 as $row)
                        {
                          $m_thesis_year = $row->meta_value;
                        }
                        foreach($result4 as $row)
                        {
                          $m_thesis_supervisor = $row->meta_value;
                        }
                        foreach($result5 as $row)
                        {
                          $m_thesis_cosupervisor = $row->meta_value;
                        }
                        foreach($result6 as $row)
                        {
                          $m_thesis_profile = $row->meta_value;
                        }





                      ?>

                        <div class="content-style-one">
                            <figure class="image-box"><img src="<?php echo $large_image_url[0]; ?>" alt=""></figure>
                            <div class="event-title"><?php the_title(); ?></div>
                            <ul class="info-content">
                              <li style="display:block; "><i class="fa fa-user-circle-o"></i>Author: <?php echo $m_thesis_author; ?></li>
                              <li style="display:block;" ><i class="fa fa-id-card-o"></i>Designation: <?php echo $m_thesis_designation; ?></li>
                              <li style="display:block;" ><i class="fa fa-calendar"></i>Year: <?php echo $m_thesis_year; ?></li>
                              <li style="display:block;" ><i class="fa fa-user-o"></i>Supervisor: <?php echo $m_thesis_supervisor; ?></li>
                              <li style="display:block;" ><i class="fa fa-user-o"></i>Co-Supervisor: <?php echo $m_thesis_cosupervisor; ?></li>
                              <li style="display:block;" ><i class="fa fa-code-fork"></i><a style="background-color: #f6fdbe" href="<?php echo $m_thesis_profile; ?>">Author Profile Link</a></li>
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
