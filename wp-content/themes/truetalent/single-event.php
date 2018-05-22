
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
        
        
        <?php while(have_rows('header')) : the_row(); ?>
        <div class=" page-header" style="background-image: url('<?php echo $thumb['0']; ?>');">
            <div class="page-header__container">
                

                <h1 class="page-header__heading"><?php the_sub_field('title'); ?></h1>
                <h2 class="page-header__location">
                    <?php the_sub_field('date'); ?> | <?php the_sub_field('location'); ?>
                </h2>
                <div class="page-header__content">
                    <?php the_sub_field('text'); ?>
                </div>

                <a href="<?php the_sub_field('link'); ?>" class="btn-primary event-header__link">Register Now</a>


            </div>
        </div>
        <?php endwhile; ?>

        <div class="main event-detail">
            
            <?php if(get_the_content()): ?>
            <div class="agenda">
                <div <?php if (!have_rows('quote')) {
                    echo 'wide';
                } ?>>
                    <h2 class="agenda__heading">Agenda</h2>
                    
                    <?php the_content(); ?>
                    
                </div>
                
                <?php if(have_rows('quote')): ?>
                <div>
                    <ul class="agenda__quote">

                        <?php while(have_rows('quote')) : the_row(); ?>
                        <li>
                            <i class="quote-icon"></i>
                        </li>
                        <li>
                            <?php the_sub_field('content'); ?>    
                        </li>

                        <li class="agenda__citation">
                            <?php the_sub_field('citation'); ?>
                        </li>

                        <?php endwhile; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            
                            
            <div class="speakers">
                
                <h2 class="speakers__heading">Speakers</h2>
                <div class="speakers__intro">
                    <?php the_field('speakers_intro'); ?>
                </div>
                
                <?php if (have_rows('speakers')): ?>
                <div class="speakers-grid">
                    <?php while(have_rows('speakers')) : the_row(); ?>


                    
                    <?php $thumb = get_sub_field('photo'); ?>

                    <?php $thumb = $thumb['sizes']['sr-member']; ?>
                    <div class="speaker">
                        <img class="speaker__photo" src="<?php echo $thumb; ?>" alt="">
                        <ul>
                            <li><h3 class="speaker__name"><?php the_sub_field('name'); ?></h3></li>
                            <li><?php the_sub_field('title'); ?></li>
                            <li><?php the_sub_field('company'); ?></li>
                        </ul>
                    </div>
                    <?php endwhile; ?>
                    <div class="speaker"></div>
                    <div class="speaker"></div>
                    <div class="speaker"></div>
                    <div class="speaker"></div>
                </div>
                
                <?php endif ?>

            </div>

            

        </div>

        <div class="attendees">

            <div class="main">
                <h2 class="attendees__heading">Attendees</h2>
                <div class="attendees__intro">
                    <?php the_field('attendees_intro'); ?>
                </div>
            </div>

            <div class="attendees-grid">
                <?php while(have_rows('attendees')) : the_row(); ?>


                
                <?php $thumb = get_sub_field('logo'); ?>

                <?php $thumb = $thumb['sizes']['sr-member']; ?>
                <div class="attendee">
                    <img class="attendee__logo" src="<?php echo $thumb; ?>" alt="">
                </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="cta">
            <div class="cta__content">
                <h2>
                    Sign up for updates and learn about our event series.
                </h2>

                <div class="cta-form">
                    <?php echo do_shortcode( '[contact-form-7 id="40" title="Event Sign Up"]'); ?>
                </div>
            </div>
        </div>

        <div class="sponsorship main">
            
                <h2 class="sponsorship__heading">Sponsorship Opportunities</h2>
            

            <div class="sponsorship__content">
                <?php the_field('sponsorship_text'); ?>
            </div>
        </div>
    
    <?php endwhile; ?>
    <?php endif; ?>
   

                        

<?php get_footer(); ?>