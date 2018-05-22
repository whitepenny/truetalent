<?php
/*
 Template Name: Home Template
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

<div class="home-slider-container">
    <div class="home-slider">

        <?php while(have_rows('slider')) : the_row(); ?>

        <?php $thumb = get_sub_field('image'); ?>
        <div class="home-slide" style="background-image: url(<?php echo $thumb['url']; ?>);">
            <div class="home-slide__outer">

                <div class="home-slide__container">
                    <h1 class="home-slide__heading">
                        <?php the_sub_field('heading'); ?>
                    </h1>
                    <div class="home-slide__content">
                        <?php the_sub_field('content') ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>

        

    </div>

    <div class="home-slider-pager">
        <div class="home-slider-prev"></div>
        <div class="home-slider-dots"></div>
        <div class="home-slider-next"></div>
    </div>
</div>

<div class="home-brands main">
    
    <div class="home-brands-grid">

        <?php while(have_rows('brands')) : the_row(); ?>

        <?php $logo = get_sub_field('logo'); ?>    
        <div class="home-brand">
                <a class="home-brand__image" target="_blank" href="<?php the_sub_field('link') ?>">
                <img src="<?php echo $logo['url']; ?>" alt="">
                </a>
                <?php the_sub_field('content'); ?>
                <a target="_blank" href="<?php the_sub_field('link') ?>" class="continue">Visit Site</a>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php if(have_rows('technology')): ?>

<div class="home-technology">
    <div class="main">

        <?php while(have_rows('technology')) : the_row(); ?>
            <?php $logo = get_sub_field('logo'); ?>
        <div class="home-technology-content">
            <a target="_blank" href="<?php the_sub_field('link') ?>">
                <img src="<?php echo $logo['url']; ?>" alt="">
            </a>
            <?php the_sub_field('content'); ?>
            <a target="_blank" href="<?php the_sub_field('link') ?>" class="continue">Visit Site</a>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php endif; ?>

<div class="home-events">
    <div class="main">
        <h2 class="home-events__heading">Event Series</h2>
        
        <?php while(have_rows('events')) : the_row(); ?>
        
        <?php $thumb = get_sub_field('still'); ?>
        <div class="home-events__preview">
            <a class="modal-open" href="#">
                <svg class="play-button" viewBox="0 0 93 93" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                    <title>Play</title>

                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Events-Overview" transform="translate(-286.000000, -798.000000)">
                            <g id="Video" transform="translate(21.000000, 607.000000)">
                                <g id="Play">
                                    <g transform="translate(266.000000, 192.000000)">
                                        <circle id="stroke" stroke="#FAD702" stroke-width="2" cx="45.5" cy="45.5" r="45.5"></circle>
                                        <circle id="back" fill="#FAD702" cx="46" cy="46" r="42"></circle>
                                        <polygon id="icon" fill="#000000" points="67 47 35 63 35 31"></polygon>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
            <img src="<?php echo $thumb['url'] ?>" alt="">
        </div>

        <div class="home-events__container">
            <div class="home-events__subheading">
                <h2><?php the_sub_field('heading') ?></h2>
            </div>

            <div class="home-events__content">
                <?php the_sub_field('content') ?>

                <p>
                    <a href="<?php the_sub_field('link'); ?>" class="continue">Learn More</a>
                </p>            
            </div>
        </div>


        <?php endwhile; ?>
    </div>
</div>

<!-- <div class="home-insights">
    <div class="main">
        <h2 class="home-insights__heading">Insights</h2>

        <?php $args = array(
                'post_type' => 'post',            
                'posts_per_page' => 1
            );
        ?>
        <?php $recentPosts = new WP_Query( $args ); ?>

        <?php if($recentPosts->have_posts()): ?>
        <?php while($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
                
                <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                <div class="home-insight">

                    <div class="home-insight__photo">
                        <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo $thumb['0'] ?>" alt="">
                    </a>
                    </div>
                    <div class="home-insight__content">
                        <div class="featured-insight__date">
                            <?php echo get_the_date('m.d.Y') ?>
                        </div>

                        <h2 class="featured-insight__heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                        <?php the_excerpt(); ?>

                        <a href="<?php the_permalink(); ?>" class="continue">Read More</a>
                    </div>
                </div>

        <?php endwhile; ?>

        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

        <div class="home-insights__cta">
            <p>
                <?php the_field('insight_cta_text'); ?>
            </p>

            <a href="/insights/" class="btn-primary">See All</a>
        </div>

    </div>
</div> -->



<?php $video = get_field('video'); ?>
<?php if ($video): ?>
    <div class="modal">

        <div class="modal-close"><i class="fa fa-lg fa-close"></i></div>

        <?php the_field('video'); ?>
        
    </div>
<?php endif ?>



<?php get_footer(); ?>

