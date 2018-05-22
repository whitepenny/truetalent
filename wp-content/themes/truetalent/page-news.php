<?php
/*
 *
 Template Name: News Archive
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






<?php   $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>

<?php $args = array(
        'post_type' => 'newsposts',            
        'posts_per_page' => 10,
        'paged' => $paged
    );
?>
<?php $newsPosts = new WP_Query( $args ); ?>

<?php if($newsPosts->have_posts()): ?>

<div class="main news-list">



        
        
        <?php while ( $newsPosts->have_posts() ) : $newsPosts->the_post(); ?>

        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sr-newspreview' );?>
        
        <div class="news-list__preview">
            
            <div class="news-list__date">
                <div class="date">
                <?php echo get_the_date('m.d.Y') ?>
                </div>
            </div>
                
            
            <div class="news-list__content">
                <?php if($thumb): ?>
                <div class="news-list__image">
                    <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo $thumb['0']; ?>" alt="">
                    </a>
               
                </div>
                <?php endif; ?>

                <div class="news-list__details">
                <h2 class="news-list__heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
                <a class="news-list__link continue" href="<?php the_permalink(); ?>">Read More</a>
                </div>
            </div>

        </div>    

        

        <?php endwhile; ?>

      <!-- pagination here -->
      <?php
        if (function_exists('custom_pagination')) {
          custom_pagination($newsPosts->max_num_pages,"",$paged);
        }
      ?>

</div>


<?php endif; ?>



       
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

<?php get_footer(); ?>