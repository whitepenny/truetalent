<?php
/*
 * Template Name: Partner
 * Template Post Type: member
 */

?>

<?php get_header(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php $thumb = get_field('hero_image'); ?>
        
        <div class="page-header member-header" style="background-image: url('<?php echo $thumb['url']; ?>');">
            <div class="page-header__container">
                

           </div>
        </div>

        <div class="main sr-single-post single-member-detail partner-content">
            

            <div class="member-detail partner-detail">

                
                
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


            <?php if (get_field('quick_facts')): ?>
                
            
            <div class="member-snapshot">
                <h2>Snapshot</h2>
                <?php the_field('quick_facts'); ?>
            </div>

            <?php endif ?>


        </div>
    
    <?php endwhile; ?>
    <?php endif; ?>
   

                        

<?php get_footer(); ?>