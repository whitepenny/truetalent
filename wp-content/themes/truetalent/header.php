<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

    <head>
        <meta charset="utf-8">

        <?php // force Internet Explorer to use the latest rendering engine available ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title><?php wp_title(''); ?></title>

        <?php // mobile meta (hooray!) ?>
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <link href="https://fonts.googleapis.com/css?family=Vollkorn:400,400i,600,600i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <script src="https://player.vimeo.com/api/player.js"></script>

        <?php // wordpress head functions ?>
        <?php wp_head(); ?>
        <?php // end of wordpress head ?>

        
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113585552-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-113585552-1');
</script>



    </head>

    <body <?php echo body_class(); ?>>

    <div class="reveal-bar search-reveal-bar closed" id="true-search-bar">
            <div class="reveal-search">
                <div class="searchbar-container container">
                    <div class="row">
                        <div class="column full">

                            <?php get_search_form(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="site-container">
    

    <nav id="site-navigation" class="main-navigation cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'menu_id' => 'primary-menu' ) ); ?>
            </nav><!-- #site-navigation -->
    
    <header class="masthead">
        
        <div>
            <div class="logo">
                <a href="/">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/logo.svg" alt="">
                </a>
            </div>

            <div class="logo-full">
                <a href="/">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/svg/logo-full.svg" alt="">
                </a>
            </div>
        </div>

    </header>

    <div class="search-trigger">
        <i class="fa fa-search"></i>
    </div>

    <div id="showRight" class="menu-toggle main-nav__trigger nav-trigger">
        <img class="main-nav-open" src="<?php echo get_stylesheet_directory_uri(); ?>/svg/bars.svg" alt="">
        <img class="main-nav-close" src="<?php echo get_stylesheet_directory_uri(); ?>/svg/close.svg" alt="">
    </div>

    <div class="bg">

        