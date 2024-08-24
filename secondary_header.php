<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title> <?php bloginfo('name')?> </title>

<!-- Stylesheets -->
<!-- Stylesheets -->


<?php wp_head(); ?>
</head>

<!-- page wrapper -->
<body <?php body_class('boxed_wrapper'); ?>>


    <!-- .preloader -->
    <div class="preloader"></div>
    <!-- /.preloader -->


    <!-- Main Header -->
    <header class="main-header">
        <!-- header-top -->
        <div class="header-top">
            <div class="container">
                <div class="clearfix">
                    <div class="logo-box top-left">
                        <figure class="logo-outer"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() . '/images/small-logo1.png' ?>" alt=""></a></figure>
                    </div>

                        <?php dynamic_sidebar('secondary_header_right'); ?>

                </div>
            </div>
        </div><!-- header-top end -->

        <!-- header-bottom -->
        <div class="header-bottom" style="padding: 18px 0px; border-bottom: 1px solid #e0e0e0;">
            <div class="container">
                <div class="nav-outer clearfix">
                    <div class="menu-area">
                        <nav class="main-menu navbar-expand-lg">
                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                            </div>

                            <?php
                            wp_nav_menu( array(
                                'theme_location'  => 'second_menu',
                                'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                                'container'       => 'div',
                                'container_class' => 'navbar-collapse collapse clearfix',
                                'container_id'    => false,
                                'menu_class'      => 'navigation clearfix',
                                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'          => new WP_Bootstrap_Navwalker(),
                            ) );
                            ?>

                        </nav>
                    </div>
                </div>
            </div>
        </div><!-- header-bottom end -->


        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 column">
                        <figure class="logo-box"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() . '/images/small-logo1.png' ?>" alt=""></a></figure>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 menu-column">
                        <div class="menu-area">
                            <nav class="main-menu navbar-expand-lg">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <?php
                                wp_nav_menu( array(
                                    'theme_location'  => 'secondary',
                                    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                                    'container'       => 'div',
                                    'container_class' => 'navbar-collapse collapse clearfix',
                                    'container_id'    => false,
                                    'menu_class'      => 'navigation clearfix',
                                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'          => new WP_Bootstrap_Navwalker(),
                                ) );
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- sticky-header end -->
    </header>
    <!-- End Main Header -->
