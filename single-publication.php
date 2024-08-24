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

                        <div class="content-style-one">
                            <figure class="image-box"><img src="<?php echo $large_image_url[0]; ?>" alt=""></figure>
                            <div class="event-title"><?php the_title(); ?></div>
                            <ul class="info-content">
                              <li style="display:block; "><i class="fa fa-user-circle-o"></i>Author: <?php echo $m_author; ?></li>
                              <li style="display:block;" ><i class="fa fa-calendar"></i>Year: <?php echo $m_year; ?></li>
                              <li style="display:block;" ><i class="fa fa-cloud"></i>Website: <?php echo $m_website; ?></li>
                              <li style="display:block;" ><i class="fa fa-search-minus"></i>DOI: <?php echo $m_doi; ?></li>
                              <li style="display:block;" ><i class="fa fa-sitemap"></i>Category: <?php echo $m_publication_category; ?></li>
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
