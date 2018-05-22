<?php
/*
 *
 Template Name: Event Overview
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



<?php while (have_posts()) : the_post(); ?>


<?php $thumb = get_field('header_background'); ?>
<div class=" page-header" style="background-image: url('<?php echo $thumb['url']; ?>');">
    <div class="page-header__container">
        

        <h1 class="page-header__heading"><?php the_field('header_title'); ?></h1>

        <div class="page-header__content">
            <?php the_field('header_content'); ?>
        </div>


    </div>
</div>

<?php $still = get_field('video_still'); ?>

<div class="event-overview">
    <div class="event-overview__still" style="background-image: url(<?php echo $still['url']; ?>);">
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
    </div>

    <div class="event-overview__content">
        <?php the_content(); ?>    
    </div>


</div>



<div class="main">

    <div class="agenda">
        <div>
            <h2 class="agenda__heading">Who Should Attend?</h2>
            
            <?php the_field('attend_text'); ?>
            
        </div>

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
    </div>

</div>

    <div class="attendees">

        <div class="main">
            <h2 class="attendees__heading">Previous Attendees</h2>
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

<div class="main">
    <div class="speakers">
        
        <h2 class="speakers__heading">Recent Speakers</h2>
        <div class="speakers__intro">
            <?php the_field('speakers_intro'); ?>
        </div>

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
        </div>
        
    </div>

</div>

<?php $today = date('Ymd'); ?>

<?php $args = array(
        'post_type' => 'event',            
        'meta_key' => 'event_date',
        'meta_query' => array(
            array(
                'key' => 'event_date'
            ),
            array(
                'key' => 'event_date',
                'value' => $today,
                'compare' => '<'
            )
        ),
        'orderby' => 'meta_value',
        'order' => 'DESC',
        'posts_per_page' => 3
    );
?>
<?php $pastEvents = new WP_Query( $args ); ?>

<?php if($pastEvents->have_posts()): ?>

<div class="main past-events">
    <h2 class="upcoming-events__heading">Past Events</h2>

    <div class="insight-buckets">
        
        
        <?php while ( $pastEvents->have_posts() ) : $pastEvents->the_post(); ?>
        
        <?php $date = date("m.d.Y",strtotime(get_field('event_date'))); ?>
        <?php $thumb = get_field('photo'); ?>
        <div class="insight-bucket">
            <div class="insight-bucket__date">
                <?php echo $date; ?>
            </div>
            
            <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $thumb['url']; ?>" alt="">
            </a>

            <div class="insight-bucket__content">
                <a href="<?php the_permalink(); ?>">
                <h2 class="insight-bucket__heading"><?php the_title(); ?></h2>
                </a>
                <a class="insight-bucket__link" href="<?php the_permalink(); ?>">Read More</a>

                <div class="insight-bucket__meta">
                    <i></i>
                    <?php the_field('event_type') ?>
                </div>
            </div>

            
        </div>

        <?php endwhile; ?>
        


        <div class="empty-insight-bucket"></div>
        <div class="empty-insight-bucket"></div>
        <div class="empty-insight-bucket"></div>
    </div>
</div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
       
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

<?php $video = get_field('video'); ?>
<?php if ($video): ?>
    <div class="modal">

        <div class="modal-close"><i class="fa fa-lg fa-close"></i></div>

        <?php the_field('video'); ?>
        
    </div>
<?php endif ?>

<?php endwhile; ?>

<?php get_footer(); ?>
