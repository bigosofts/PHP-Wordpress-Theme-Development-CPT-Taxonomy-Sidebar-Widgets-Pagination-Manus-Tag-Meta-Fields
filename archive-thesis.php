<?php get_header(); ?>


<?php get_template_part('page_title') ?>


    <!-- articles-section -->
    <section class="articles-section">
        <div class="container">
          <div class="title-box centred">
              <div class="sec-title">Thesis List</div>
          </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 offset-lg-2 column">
                    <div class="products-discription">
                        <div class="tab-details-content">
                            <div class="tab-content" id="details">
                                <div class="single-tab-content">
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

                                    <div class="single-item">
                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <div class="text"><span>Researcher:</span> <?php echo $m_thesis_author; ?></div>
                                        <div class="text"><span>Designation:</span> <?php echo $m_thesis_designation; ?></div>
                                        <div class="text"><span>Supervisor:</span> <?php echo $m_thesis_supervisor; ?></div>
                                        <div class="text"><span>Co-Supervisor:</span> <?php echo $m_thesis_cosupervisor; ?></div>
                                        <div class="lower-content clearfix">
                                        <div class="text"><span>Session:</span> <?php echo $m_thesis_year; ?></div>


                                        <div class="link"><a href="<?php echo $m_thesis_profile; ?>"><i class="fa fa-address-book-o"></i>Researcher Profile</a></div>
                                        </div>
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
