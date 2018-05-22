<?php
/*
 *
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
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
        
        <div class="main sr-single-post single-member-detail">
            

            <div class="member-sidebar">
                <img src="<?php echo $thumb['0']; ?>" alt=""> 


            </div>

            <div class="member-detail">

                
                
                <h1><?php the_title(); ?></h1>
                <h2><?php the_field('title'); ?> | <?php the_field('location') ?></h2>
                
                <ul class="member-detail__meta">
                    <?php if (get_field('email')): ?>
                        <li><a href="mailto:<?php the_field('email'); ?>"><i class="fa fa-envelope"></i> Email 
                    Address</a></li>
                    <?php endif; ?>

                    <?php if(get_field('linkedin')): ?>
                    <li><a href="<?php the_field('linkedin') ?>"><i class="fa fa-linkedin"></i> LinkedIn</a></li>
                    <?php endif; ?>
                </ul>

                <?php the_content(); ?>
            </div>
        </div>
    
    <?php endwhile; ?>
    <?php endif; ?>
   

                        

<?php get_footer(); ?>