<?php get_header(); ?>


<?php get_template_part('page_title') ?>

<?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
    <!-- team-details -->
    <section class="team-details gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 image-column">
                    <figure class="image-box"><?php the_post_thumbnail(); ?></figure>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endwhile; endif; ?>
    <!-- team-details end -->



<!--

<div class="team-details-content">
<div class="top-content">
<div class="title">Dr. Martin Tompson</div>
Spicylogy, Dean
<div class="text">Stanford University Graduate
School of Business</div>
</div>
<div class="lower-content">
<h3 class="title">Biography</h3>
<div class="text">

Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sed per spiciatis unde omnis natus error. consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore dolore magna aliqua enim ad minim veniam.quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.

Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.

</div>
</div>
</div>


<section class="education-section inner-section">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 inner-column">
<div class="inner-content">
<h3 class="education-title">Education</h3>
<div class="content-box">
<div class="single-item">
<div class="date">Aug 2018</div>
<h4>Doctor of Philosophy</h4>
<div class="text">in Mechanical Engineering Stanford University</div>
</div>
<div class="single-item">
<div class="date">Oct 2018</div>
<h4>Master of Science</h4>
<div class="text">Kusan National University, Busan, South Korea</div>
</div>
<div class="single-item">
<div class="date">Nov 2018</div>
<h4>Bachelor of Science</h4>
<div class="text">University of California, Davis, USA</div>
</div>
<div class="single-item">
<div class="date">Dec 2018</div>
<h4>California Conference</h4>
<div class="text">California National University, California, USA</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>



<section class="award-section gray-bg">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="award-content">
<h3 class="award-title">Honors &amp; Awards</h3>
<div class="row">
<div class="col-lg-6 col-md-12 col-sm-12">
<div class="content-box">
<div class="single-item">

Nov 2018
<h4>Doctor of Philosophy</h4>
<div class="text">in Mechanical Engineering Stanford University</div>
</div>
<div class="single-item">

Dec 2018
<h4>Master of Science</h4>
<div class="text">Kusan National University, Busan, South Korea</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-12 col-sm-12">
<div class="content-box">
<div class="single-item">

Nov 2018
<h4>Bachelor of Science</h4>
<div class="text">University of California, Davis, USA</div>
</div>
<div class="single-item">

Dec 2018
<h4>California Conference</h4>
<div class="text">California National University, California, USA</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>



<section class="possition-section inner-section">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 inner-column">
<div class="inner-content">
<h3 class="education-title">Possitions</h3>
<div class="content-box">
<div class="single-item">
<div class="date">Aug 2018</div>
<h4>Doctor of Philosophy</h4>
<div class="text">in Mechanical Engineering Stanford University</div>
</div>
<div class="single-item">
<div class="date">Oct 2018</div>
<h4>Master of Science</h4>
<div class="text">Kusan National University, Busan, South Korea</div>
</div>
<div class="single-item">
<div class="date">Nov 2018</div>
<h4>Bachelor of Science</h4>
<div class="text">University of California, Davis, USA</div>
</div>
<div class="single-item">
<div class="date">Dec 2018</div>
<h4>California Conference</h4>
<div class="text">California National University, California, USA</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
-->




<?php get_footer(); ?>
