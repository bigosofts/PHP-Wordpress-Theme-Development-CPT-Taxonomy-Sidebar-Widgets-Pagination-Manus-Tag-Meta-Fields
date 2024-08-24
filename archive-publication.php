<?php get_header(); ?>


<?php get_template_part('page_title') ?>


    <!-- book-section -->
    <section class="book-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 offset-lg-3">
                    <div class="book-inner">

                      <?php
                        global $post;
                        $i=0;

                        if (have_posts() ) : while (have_posts() ) : the_post();


                        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'publication');
                        $i++;
                        $this_id = get_the_ID();
                        global $wpdb;
                        $tbl_postmeta = $wpdb->prefix."postmeta";

                        $meta_website = 'meta-website';
                        $meta_doi = 'meta-doi';
                        $meta_author = 'meta-author';
                        $meta_year = 'meta-year';
                        $meta_publication_category = 'meta-publication-category';


                        $query_result = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_website'";
                        $query_result2 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_doi'";
                        $query_result3 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_author'";
                        $query_result4 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_year'";
                        $query_result5 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_publication_category'";


                        $result = $wpdb->get_results($query_result);
                        $result2 = $wpdb->get_results($query_result2);
                        $result3 = $wpdb->get_results($query_result3);
                        $result4 = $wpdb->get_results($query_result4);
                        $result5 = $wpdb->get_results($query_result5);



                        foreach($result as $row)
                        {
                          $m_website = $row->meta_value;
                        }
                        foreach($result2 as $row)
                        {
                          $m_doi = $row->meta_value;
                        }
                        foreach($result3 as $row)
                        {
                          $m_author = $row->meta_value;
                        }
                        foreach($result4 as $row)
                        {
                          $m_year = $row->meta_value;
                        }
                        foreach($result5 as $row)
                        {
                          $m_publication_category = $row->meta_value;
                        }





                      ?>
                        <div class="year">
                            <div class="year-name"><?php echo $m_year; ?> &raquo; <?php echo $m_publication_category; ?></div>
                            <div class="single-item">
                                <figure class="image-box"><a href="<?php the_permalink(); ?>"><div style="background-image: url('<?php echo $large_image_url[0]; ?>'); width: 100px;height: 150px;background-position: center center;background-repeat: no-repeat;"> </div></a></figure>
                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <div class="text">Author: <?php echo $m_author; ?>
                                  <br />Website: <?php echo $m_website; ?>
                                  <br>DOI: <?php echo $m_doi; ?></div>
                            </div>
                        </div>

                      <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
            <div class="row"><?php if (function_exists("pagination")) {    pagination($additional_loop->max_num_pages);} ?>


            <?php wp_reset_postdata(); ?></div>
        </div>
    </section>
    <!-- book-section end -->


<?php get_footer(); ?>
