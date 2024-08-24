<!-- page-title -->
<?php
  global $post;
  $i=0;
  $arg = array(
    'posts_per_page' => 1,
    'post_type' => 'slider-items',
    'page' => $paged,
    'orderby' => 'rand'
  );

  $myposts = get_posts($arg);
  foreach ($myposts as $post) : setup_postdata($post);

  $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'slider-items');
  $i++;

endforeach; ?>

<section class="page-title centred" style="background-image: url(<?php echo $large_image_url[0]; ?>); background-attachment: fixed;">
    <div class="container">
        <div class="content-box">
            <div class="title"><?php wp_title('', true) ?></div>
            <ul class="bread-crumb">
              <?php
                if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<li id="breadcrumbs">','</li>' );
                }
              ?>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->
