<?php get_header(); ?>

    <!-- main-slider -->
    <section class="main-slider slider-style-two slider-style-five">

        <div class="main-slider-carousel owl-carousel owl-theme">

          <?php
            global $post;
            $i=0;
            $arg = array(
              'posts_per_page' => -1,
              'post_type' => 'slider-items',
              'page' => $paged,
              'order' => 'DESC',
              'orderby' => 'rand'
            );

            $myposts = get_posts($arg);
            foreach ($myposts as $post) : setup_postdata($post);

            $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'slider-items');
            $i++;
            $this_id = get_the_ID();
            global $wpdb;
            $tbl_postmeta = $wpdb->prefix."postmeta";

            $meta_name_subtitle = 'meta-subtitle-slider';
            $meta_url_name = 'meta-url-name-slider';
            $meta_url_link = 'meta-url-slider';

            $query_result = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_name_subtitle'";
            $query_result2 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_url_name'";
            $query_result3 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_url_link'";

            $result = $wpdb->get_results($query_result);
            $result2 = $wpdb->get_results($query_result2);
            $result3 = $wpdb->get_results($query_result3);


            foreach($result as $row)
            {
              $m_name_subtitle = $row->meta_value;
            }
            foreach($result2 as $row)
            {
              $m_url_name = $row->meta_value;
            }
            foreach($result3 as $row)
            {
              $m_url_link = $row->meta_value;
            }

          ?>

            <div class="slide" style="background-image:url(<?php echo $large_image_url[0]; ?>)">
                <div class="bg-column"></div>
                <div class="container">
                    <div class="content-box">
                        <h1><?php the_title(); ?></h1>
                        <div class="text"><?php echo $m_name_subtitle; ?></div>
                        <div class="slider-btn">
                            <a style= "margin-right:10px; margin-bottom:10px;" href="<?php the_permalink(); ?>" class="theme-btn theme-btn-three"> Read More </a>
                            <a style= "background-color: #ff0000;color: #fff;" href="<?php echo $m_url_link; ?>" class="theme-btn theme-btn-three"> <?php  echo $m_url_name; ?> </a>

                        </div>
                    </div>
                </div>
            </div>

          <?php endforeach; ?>

        </div>
    </section>
    <!-- main-slider end -->

    <!-- single-team -->
    <section class="single-team single-team-two">
        <div class="container">

          <?php
            global $post;
            $i=0;
            $arg = array(
              'posts_per_page' => 1,
              'post_type' => 'professor',
              'page' => $paged,
              'orderby' => 'rand',
              'order' => 'DESC'
            );

            $myposts = get_posts($arg);
            foreach ($myposts as $post) : setup_postdata($post);

            $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'professor');
            $i++;
            $this_id = get_the_ID();
            global $wpdb;
            $tbl_postmeta = $wpdb->prefix."postmeta";

            $meta_designation = 'meta-designation';
            $meta_button_text = 'meta-button-text';
            $meta_button_url = 'meta-button-url';

            $query_result = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_designation'";
            $query_result2 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_button_text'";
            $query_result3 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_button_url'";

            $result = $wpdb->get_results($query_result);
            $result2 = $wpdb->get_results($query_result2);
            $result3 = $wpdb->get_results($query_result3);


            foreach($result as $row)
            {
              $m_designation = $row->meta_value;
            }
            foreach($result2 as $row)
            {
              $m_button_text = $row->meta_value;
            }
            foreach($result3 as $row)
            {
              $m_button_url = $row->meta_value;
            }

          ?>

            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="inner-column">
                        <div class="sec-title"><?php the_title(); ?></div>
                        <div class="title-text"><?php echo $m_designation; ?></div>
                        <div class="text"><?php the_content(); ?></div>
                        <div class="link"><a href="<?php echo $m_button_url; ?>" class="theme-btn"><?php echo $m_button_text; ?></a></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <figure class="image-box"><img src="<?php echo $large_image_url[0]; ?>" alt=""></figure>
                </div>
            </div>

            <?php endforeach; ?>

        </div>
    </section>
    <!-- single-team end -->



    <!-- service-style-five -->
    <section class="service-style-five gray-bg">
        <div class="container">
            <div class="title-box centred">
                <div class="sec-title">Our Services</div>
                <div class="top-text">Work Area</div>
            </div>
            <div class="products-discription">
                <div class="custom-tab-title centred">
                    <ul class="tab-title clearfix">
                        <li data-tab-name="details" class="active">Lateast Event</li>
                        <li data-tab-name="review">Last Publication</li>
                        <li data-tab-name="review-2">Recent Blog</li>
                        <li data-tab-name="review-3">New Researcher</li>
                        <li data-tab-name="review-4">Recent Moment</li>
                    </ul>
                </div>
                <div class="tab-details-content">
                    <div class="tab-content" id="details">
                        <div class="single-tab-content">
                            <div class="row">

                              <?php
                                  global $post;
                                  $args = array(
                                  'post_type' =>'event',
                                  'order' => 'DESC' ,
                                  'posts_per_page' => 1

                              );
                                  $query = new WP_Query( $args );
                              ?>

                              <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                                  $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'slider-items');
                               ?>

                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <figure class="image-box"><div class="service-section-img" style="background-image: url('<?php echo $large_image_url[0]; ?>');background-position: center center;background-repeat: no-repeat;"></div></figure>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="content-box">
                                        <div class="title"><?php the_title(); ?></div>
                                        <div style='line-height: 41px;' class="text">
                                            <?php echo excerpt('80'); ?>
                                        </div>
                                        <div class="link"><a href="<?php the_permalink(); ?>" class="theme-btn">Read More</a></div>
                                    </div>
                                </div>
                              <?php endwhile; endif; ?>

                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="review">
                        <div class="single-tab-content">
                            <div class="row">


                              <?php
                                  global $post;
                                  $args = array(
                                  'post_type' =>'publication',
                                  'order' => 'DESC' ,
                                  'posts_per_page' => 1

                              );
                                  $query = new WP_Query( $args );
                              ?>

                              <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                                  $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'slider-items');
                               ?>

                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <figure class="image-box"><div class="service-section-img" style="background-image: url('<?php echo $large_image_url[0]; ?>');background-position: center center;background-repeat: no-repeat;"></div></figure>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="content-box">
                                        <div class="title"><?php the_title(); ?></div>
                                        <div style='line-height: 41px;' class="text">
                                            <?php echo excerpt('80'); ?>
                                        </div>
                                        <div class="link"><a href="<?php the_permalink(); ?>" class="theme-btn">Read More</a></div>
                                    </div>
                                </div>
                              <?php endwhile; endif; ?>


                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="review-2">
                        <div class="single-tab-content">
                            <div class="row">



                              <?php
                                  global $post;
                                  $args = array(
                                  'post_type' =>'post',
                                  'order' => 'DESC' ,
                                  'posts_per_page' => 1

                              );
                                  $query = new WP_Query( $args );
                              ?>

                              <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                                  $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'slider-items');
                               ?>

                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <figure class="image-box"><div class="service-section-img" style="background-image: url('<?php echo $large_image_url[0]; ?>');background-position: center center;background-repeat: no-repeat;"></div></figure>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="content-box">
                                        <div class="title"><?php the_title(); ?></div>
                                        <div style='line-height: 41px;' class="text">
                                            <?php echo excerpt('80'); ?>
                                        </div>
                                        <div class="link"><a href="<?php the_permalink(); ?>" class="theme-btn">Read More</a></div>
                                    </div>
                                </div>
                              <?php endwhile; endif; ?>



                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="review-3">
                        <div class="single-tab-content">
                            <div class="row">



                              <?php
                                  global $post;
                                  $args = array(
                                  'post_type' =>'team-member',
                                  'order' => 'DESC' ,
                                  'posts_per_page' => 1

                              );
                                  $query = new WP_Query( $args );
                              ?>

                              <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                                  $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'slider-items');
                               ?>

                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <figure class="image-box"><div class="service-section-img" style="background-image: url('<?php echo $large_image_url[0]; ?>');background-position: center center;background-repeat: no-repeat;"></div></figure>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="content-box">
                                        <div class="title"><?php the_title(); ?></div>
                                        <div style='line-height: 41px;' class="text">
                                            <?php echo excerpt('80'); ?>
                                        </div>
                                        <div class="link"><a href="<?php the_permalink(); ?>" class="theme-btn">Read More</a></div>
                                    </div>
                                </div>
                              <?php endwhile; endif; ?>



                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="review-4">
                        <div class="single-tab-content">
                            <div class="row">



                              <?php
                                  global $post;
                                  $args = array(
                                  'post_type' =>'gallery',
                                  'order' => 'DESC' ,
                                  'posts_per_page' => 1

                              );
                                  $query = new WP_Query( $args );
                              ?>

                              <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                                  $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'slider-items');
                               ?>

                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <figure class="image-box"><div class="service-section-img" style="background-image: url('<?php echo $large_image_url[0]; ?>');background-position: center center;background-repeat: no-repeat;"></div></figure>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="content-box">
                                        <div class="title"><?php the_title(); ?></div>
                                        <div style='line-height: 41px;' class="text">
                                            <?php echo excerpt('80'); ?>
                                        </div>
                                        <div class="link"><a href="<?php the_permalink(); ?>" class="theme-btn">Read More</a></div>
                                    </div>
                                </div>
                              <?php endwhile; endif; ?>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service-style-five end -->



    <!-- team-section -->
    <section class="team-section feature-style-three">
      <div class="shape-1 wow zoomIn animated"></div>
      <div class="shape-2 wow zoomIn animated"></div>
        <div class="container">
            <div class="title-box">
                <div class="sec-title">Team Member</div>
                <div class="title-text">Our Team</div>
            </div>
            <div class="row">

              <?php

                global $post;
                $i=0;
                $arg = array(
                  'posts_per_page' => 8,
                  'post_type' => 'team-member',
                  'paged' => $paged,
                  'order' => 'DESC'
                );

                $myposts = get_posts($arg);
                foreach ($myposts as $post) : setup_postdata($post);

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

              <?php endforeach;?>

            </div>
        </div>
    </section>
    <!-- team-section end -->




    <!-- fact-counter -->
    <section class="fact-counter counter-style-two counter-prime" style="background-image: url(<?php echo get_template_directory_uri() . '/images/background/fact-counter2.jpg' ?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-counter-content">
                        <div class="icon-box"><i class="flaticon-monitor"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">

                          <?php
                              $i=0;
                              $args = array(
                              'post_type' =>'publication',
                              'order' => 'DESC' ,
                              'posts_per_page' => -1

                          );
                              $query = new WP_Query( $args );

                              if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                              $i++;
                              endwhile; endif; ?>

                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="<?php echo $i; ?>">0</span></div>
                        </article>
                        <div class="text">Article Published</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-counter-content">
                        <div class="icon-box"><i class="flaticon-document"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">

                          <?php
                              $i=0;
                              $args = array(
                              'post_type' =>'post',
                              'order' => 'DESC' ,
                              'posts_per_page' => -1

                          );
                              $query = new WP_Query( $args );

                              if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                              $i++;
                              endwhile; endif; ?>
                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="<?php echo $i; ?>">0</span></div>
                        </article>
                        <div class="text">Blog Articles</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-counter-content">
                        <div class="icon-box"><i class="flaticon-user"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">

                          <?php
                              $i=0;
                              $args = array(
                              'post_type' =>'team-member',
                              'order' => 'DESC' ,
                              'posts_per_page' => -1

                          );
                              $query = new WP_Query( $args );

                              if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                              $i++;
                              endwhile; endif; ?>
                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="<?php echo $i; ?>">0</span></div>
                        </article>
                        <div class="text">Research Students</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-counter-content">
                        <div class="icon-box"><i class="flaticon-trophy"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">

                          <?php
                              $i=0;
                              $args = array(
                              'post_type' =>'thesis',
                              'order' => 'DESC' ,
                              'posts_per_page' => -1

                          );
                              $query = new WP_Query( $args );

                              if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                              $i++;
                              endwhile; endif; ?>
                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="<?php echo $i; ?>">0</span></div>
                        </article>
                        <div class="text">Thesis Completed</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fact-counter end -->
    
    
    
    <!-- fact-counter -->
    <section class="fact-counter counter-style-two counter2" style="background-image: url(<?php echo get_template_directory_uri() . '/images/background/fact-counter2.jpg' ?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-counter-content">
                        <div class="icon-box"><i class="flaticon-monitor"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">

                          <?php
                              $i=0;
                              $args = array(
                              'post_type' =>'publication',
                              'order' => 'DESC' ,
                              'posts_per_page' => -1

                          );
                              $query = new WP_Query( $args );

                              if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                              $i++;
                              endwhile; endif; ?>

                            <div class="count-outer"><span class="count-text"><?php echo $i; ?></span></div>
                        </article>
                        <div class="text">Article Published</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-counter-content">
                        <div class="icon-box"><i class="flaticon-document"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">

                          <?php
                              $i=0;
                              $args = array(
                              'post_type' =>'post',
                              'order' => 'DESC' ,
                              'posts_per_page' => -1

                          );
                              $query = new WP_Query( $args );

                              if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                              $i++;
                              endwhile; endif; ?>
                            <div class="count-outer"><span class="count-text"><?php echo $i; ?></span></div>
                        </article>
                        <div class="text">Blog Articles</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-counter-content">
                        <div class="icon-box"><i class="flaticon-user"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">

                          <?php
                              $i=0;
                              $args = array(
                              'post_type' =>'team-member',
                              'order' => 'DESC' ,
                              'posts_per_page' => -1

                          );
                              $query = new WP_Query( $args );

                              if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                              $i++;
                              endwhile; endif; ?>
                            <div class="count-outer"><span class="count-text"><?php echo $i; ?></span></div>
                        </article>
                        <div class="text">Research Students</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-counter-content">
                        <div class="icon-box"><i class="flaticon-trophy"></i></div>
                        <article class="column wow fadeIn" data-wow-duration="0ms">

                          <?php
                              $i=0;
                              $args = array(
                              'post_type' =>'thesis',
                              'order' => 'DESC' ,
                              'posts_per_page' => -1

                          );
                              $query = new WP_Query( $args );

                              if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                              $i++;
                              endwhile; endif; ?>
                            <div class="count-outer"><span class="count-text"><?php echo $i; ?></span></div>
                        </article>
                        <div class="text">Thesis Completed</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fact-counter end -->    


    <!-- gallery-section -->
    <section class="gallery-section">
        <div class="container">
            <div class="title-box">
                <div class="sec-title">Some Memories</div>
                <div class="title-text">BBBlab</div>
            </div>
            <div class="sortable-masonry">
                <!--Filter-->
                <div class="filters clearfix">
                    <ul class="filter-tabs filter-btns centred clearfix">
                        <a href="<?php echo home_url().'/gallery'; ?>" class="active filter" data-role="button" data-filter=".all">VIEW ALL</a>
                    </ul>
                </div>
                <div class="items-container row clearfix">

                  <?php
                      $args = array(
                        'post_type' => 'gallery',
                        'post_status' => 'publish',
                        'posts_per_page' => 6,

                  );
                      $query = new WP_Query( $args );
                  ?>

                  <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                    <!--Default Portfolio Item-->
                    <div class="col-lg-4 col-md-6 col-sm-12 gallery-item masonry-item all">
                        <div class="inner-box">
                            <figure class="image-box">
                                <?php the_post_thumbnail(); ?>
                                <div class="overlay">
                                    <div class="wrapper">
                                        <div class="text"><?php $search_text = get_the_excerpt();

                                                              // Strip the <p> tag by replacing it empty string
                                                              $tags = array("<p>", "</p>");
                                                              $search_content = str_replace($tags, "", $search_text);

                                                              // Echo the content

                                                              echo excerpt('20'); ?>
                                          </div>
                                        <h4 style='background-color: rgba(255, 255, 255, 1);' class="title"><a style='color: rgba(255,0,0,1)' href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>

                  <?php endwhile; endif; ?>




                </div>
            </div>
        </div>
    </section>
    <!-- gallery-section end -->



    <!-- event-section -->
    <section class="event-section gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 column">
                    <div class="latest-event">
                        <div class="event-title">Latest Events</div>

                        <?php
                          global $post;
                          $i=0;
                          $arg = array(
                            'posts_per_page' => 4,
                            'post_type' => 'event',
                            'page' => $paged,
                            'order' => 'DESC'
                          );

                          $myposts = get_posts($arg);
                          foreach ($myposts as $post) : setup_postdata($post);

                          $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'slider-items');
                          $i++;
                          $this_id = get_the_ID();
                          global $wpdb;
                          $tbl_postmeta = $wpdb->prefix."postmeta";

                          $meta_event_date = 'meta-event-date';


                          $query_result = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_event_date'";


                          $result = $wpdb->get_results($query_result);



                          foreach($result as $row)
                          {
                            $m_date_event = $row->meta_value;
                          }


                        ?>
                        <div class="single-item">
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <div class="text"><i class="flaticon-small-calendar"></i><?php echo $m_date_event; ?></div>
                        </div>

                      <?php endforeach; ?>


                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 column">
                    <div class="event-content">
                        <div class="row">
                          <?php
                            global $post;
                            $i=0;
                            $arg = array(
                              'posts_per_page' => 1,
                              'post_type' => 'publication',
                              'paged' => $paged,
                              'order' => 'DESC'
                            );

                            $myposts = get_posts($arg);
                            foreach ($myposts as $post) : setup_postdata($post);

                            $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'publication');




                          ?>
                            <div class="col-lg-5 col-md-6 col-sm-12">
                                <figure class="image-box"><img style='height:516px;' src="<?php echo $large_image_url[0]; ?>" alt=""></figure>
                            </div>
                          <?php endforeach; ?>

                            <div class="col-lg-7 col-md-6 col-sm-12">
                                <div class="content-box">
                                    <div class="event-title">Publications</div>

                                    <?php
                                      global $post;
                                      $i=0;
                                      $arg = array(
                                        'posts_per_page' => 3,
                                        'post_type' => 'publication',
                                        'paged' => $paged,
                                        'order' => 'DESC'
                                      );

                                      $myposts = get_posts($arg);
                                      foreach ($myposts as $post) : setup_postdata($post);

                                      $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'publication');
                                      $i++;
                                      $this_id = get_the_ID();
                                      global $wpdb;
                                      $tbl_postmeta = $wpdb->prefix."postmeta";

                                      $meta_website = 'meta-website';
                                      $meta_doi = 'meta-doi';


                                      $query_result = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_website'";
                                      $query_result2 = "SELECT * from $tbl_postmeta where post_id='$this_id' AND meta_key='$meta_doi'";


                                      $result = $wpdb->get_results($query_result);
                                      $result2 = $wpdb->get_results($query_result2);



                                      foreach($result as $row)
                                      {
                                        $m_website = $row->meta_value;
                                      }
                                      foreach($result2 as $row)
                                      {
                                        $m_doi = $row->meta_value;
                                      }



                                    ?>
                                    <div class="single-item">
                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <div class="odi-text">DOI: <?php echo $m_doi; ?></div>
                                        <div class="text"><i class="flaticon-pc"></i><a href="<?php echo $m_website; ?>">Publisher's Website</a></div>
                                    </div>

                                  <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- event-section -->




    <!-- news-style-two -->
    <section class="news-style-two">
        <div class="container">
            <div class="title-box centred">
                <div class="sec-title">BBBLab Journal</div>
                <div class="top-text">Latest News</div>
            </div>
            <div class="row">
                <?php
                    $args = array(
                    'post_type'      => 'post',
                    'category_name'  => '',
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    'cat' => '',
                    'posts_per_page' => 3,
                    'facetwp' => true,
                );
                    $query = new WP_Query( $args );
                ?>

                <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                  <!--Start single blog post-->
                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                      <div class="single-blog-post">
                          <div class="img-holder">
                              <?php the_post_thumbnail(); ?>

                              <div class="categorie-button">
                                  <?php the_category(); ?>
                              </div>
                          </div>
                          <div class="text-holder">
                              <div class="meta-box">
                                  <ul class="meta-info">
                                      <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">By <?php the_author_posts_link(); ?></a></li>
                                      <li><a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>"><?php the_time('d M, Y'); ?></a></li>
                                  </ul>
                              </div>
                              <h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                              <div class="text-box">
                                  <p><?php echo excerpt('40'); ?></p>
                              </div>
                              <div class="readmore-button">
                                  <a class="btn-two" href="<?php the_permalink(); ?>">Continue Reading<span class="flaticon-next"></span></a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!--End single blog post-->



                <?php endwhile; endif; ?>
                <?php wp_reset_postdata(); ?>



            </div>
        </div>
    </section>
    <!-- news-style-two end -->

<?php get_footer(); ?>
