<?php
/*
 *
 Template Name: Team Page
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

<?php if($thumb): ?>
<div class=" page-header" style="background-image: url('<?php echo $thumb['url']; ?>');">
<?php else: ?>
    <div class=" page-header">
<?php endif; ?>
    <div class="page-header__container">
        

        <h1 class="page-header__heading"><?php the_field('header_title'); ?></h1>

        <div class="page-header__content">
            <?php the_field('header_content'); ?>
        </div>


    </div>
</div>





        



<?php if(have_rows('team_groups')) : ?>


 

<?php while(have_rows('team_groups')) : the_row(); ?>
    
    <h2 class="team-grid__heading"><?php the_sub_field('heading'); ?></h2>
    
    <div class="team-grid">     



    <?php if(have_rows('members')) : while(have_rows('members')) : the_row(); ?>
        
            

            <?php $post =  get_sub_field('member'); ?>

            <?php setup_postdata( $post ); ?>

            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sr-member' ); ?>
             
             <a href="<?php the_permalink(); ?>" class="member">
                 <img src="<?php echo $thumb['0']; ?>" alt="">

                 <div class="member-details">
                     <div>
                         <h2><?php the_title(); ?></h2>
                         <h3><?php the_field('title'); ?></h3>

                         <div class="btn-primary">Learn More</div>
                     </div>
                 </div>

                 <div class="member-name">
                     <h3><?php the_title(); ?></h3>
                 </div>
             </a>

            <?php wp_reset_postdata(); ?>

    <?php endwhile; ?> 
    <?php endif; ?>
 

 </div>

 <?php endwhile; ?>
         

 

<?php endif; ?>


</div>

       


<?php get_footer(); ?>


