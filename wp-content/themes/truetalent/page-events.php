<?php
/*
 *
 Template Name: Event Archive
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




<?php $thumb = get_field('header_background'); ?>
<div class=" page-header" style="background-image: url('<?php echo $thumb['url']; ?>');">
    <div class="page-header__container">
        

        <h1 class="page-header__heading"><?php the_field('header_title'); ?></h1>

        <div class="page-header__content">
            <?php the_field('header_content'); ?>
        </div>


    </div>
</div>





<?php if(have_rows('featured_events')): ?>
<div class="featured-events">
    <?php while(have_rows('featured_events')) : the_row(); ?>


        <?php $post = get_sub_field('event'); ?>
        <?php setup_postdata( $post ); ?>
        <?php $thumb = get_field('photo'); ?>
    <div>
        <div class="featured-insight featured-event">

            <a href="<?php the_permalink(); ?>" class="featured-insight__image" style="background-image: url('<?php echo $thumb['url']; ?>');">
                
            </a>
            <div class="featured-insight__content">
            
                <a href="<?php the_permalink(); ?>">
                <h2 class="featured-event__heading"><?php the_title(); ?></h2>
                </a>

                <?php the_excerpt(); ?>

                <a href="<?php the_permalink(); ?>" class="continue">Read More</a>
                
                <div class="featured-event__button">
                <a class="btn-primary" href="">Register Now</a>
                </div>
                
            </div>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
    <?php endwhile; ?>
</div>
<?php endif; ?>



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
                'compare' => '>='
            )
        ),
        'orderby' => 'meta_value',
        'order' => 'DESC',
        'posts_per_page' => 12
    );
?>
<?php $upcomingEvents = new WP_Query( $args ); ?>

<?php if($upcomingEvents->have_posts()): ?>

<div class="main upcoming-events">
    <h2 class="upcoming-events__heading">Upcoming Events</h2>

    <div class="insight-buckets">
        
        
        <?php while ( $upcomingEvents->have_posts() ) : $upcomingEvents->the_post(); ?>
        
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
                <h2 class="insight-bucket__heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <a class="insight-bucket__link continue" href="<?php the_permalink(); ?>">Read More</a>

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
        'posts_per_page' => 12
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
                
                <h2 class="insight-bucket__heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
               
                <a class="insight-bucket__link continue" href="<?php the_permalink(); ?>">Read More</a>

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

<?php get_footer(); ?>