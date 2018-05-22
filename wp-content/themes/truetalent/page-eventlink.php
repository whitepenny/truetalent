
<?php
/*
 * Template Name: Event Link and Details
 */

?>

<?php get_header(); ?>
<?php while(have_posts()) : the_post(); ?>
<?php $thumb = get_field('header_background'); ?>

<div class=" page-header" style="background-image: url('<?php echo $thumb['url']; ?>');">
    <div class="page-header__container">
        

        <h1 class="page-header__heading"><?php the_field('header_title'); ?></h1>

        <div class="page-header__content">
            <?php the_field('header_content'); ?>
        </div>


    </div>
</div>

<div class="default-page">
    <div class="main">

        <div class="centered-content">
            <?php the_content(); ?>

            <?php the_field('eventbrite_code'); ?>
        </div>
    </div>
</div>

<?php endwhile; ?>
<?php get_footer(); ?>
