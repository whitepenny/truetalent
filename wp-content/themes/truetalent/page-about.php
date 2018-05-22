<?php
/*
 *
 Template Name: About Template
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





<div class="main">

    <div class="about-header">
        <?php the_content(); ?>
    </div>
    
</div>


<?php

// check if the repeater field has rows of data
if( have_rows('subsidiaries') ):

    // loop through the rows of data
    while ( have_rows('subsidiaries') ) : the_row(); ?>

        <div class="subsidiary">
            <div class="main">
            <?php $logo = get_sub_field('logo'); ?>

                <div class="subsidiary__content">
                <img src="<?php echo $logo['url']; ?>" alt="">

                <?php the_sub_field('content') ?>
                </div>

                <div class="subsidiary__breaker"></div>

                <div class="subsidiary__logos">
                <?php while(have_rows('logos')) : the_row(); ?>
                
                    <?php $sublogo = get_sub_field('logo'); ?>
                    <div class="subsidiary-logo">
                        <img src="<?php echo $sublogo['url']; ?>" alt="">
                    </div>

                <?php endwhile; ?>
                </div>
            </div>
        </div>

    <?php endwhile;

else :

    // no rows found

endif;

?>



       


<?php endwhile; ?>

<?php get_footer(); ?>