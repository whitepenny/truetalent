
<?php
/*
 * Template Name: Past Event
 * Template Post Type: event
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


            </div>
        </div>
        <?php endwhile; ?>

        <div class="main event-detail">
            
            <?php if(get_the_content()): ?>
                        <div class="agenda">
                            <div class="<?php if (!have_rows('quote')) {
                                echo 'wide';
                            } ?>">
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
                    <div class="speaker empty"></div>
                    <div class="speaker empty"></div>
                    <div class="speaker empty"></div>
                    <div class="speaker empty"></div>

                </div>
                <?php endif ?>
                
            </div>

           

            
            <?php if(have_rows('past_event_video')): ?>
            <div class="past-event-details">
                <h2 class="agenda__heading">Experience the Event</h2>
                

                <?php while(have_rows('past_event_video')): the_row(); ?>
                    
                    <div class="video-container">
                        <div class="video">
                            <?php the_sub_field('code'); ?>
                        </div>
                    </div>

                <?php endwhile; ?>

                <div class="past-event-links">
                    <h3>Also from this Event</h3>
                    
                    <?php if(have_rows('event_links')): ?>
                    
                    <ul>
                        <?php while(have_rows('event_links')) : the_row(); ?>
                        
                            <li><a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('text'); ?></a></li>
                        
                        <?php endwhile; ?>
                    </ul>
                    
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>


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

    
    
    <?php endwhile; ?>
    <?php endif; ?>
   

                        

<?php get_footer(); ?>