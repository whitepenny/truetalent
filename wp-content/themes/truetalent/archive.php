<?php get_header(); ?>

    


    <div class="insight-archive__header">
        <div class="main">
            <?php $cat_id = get_query_var('cat');  ?>
            <?php $category = get_category( $cat_id); ?>

        <h1>Insight Archive <?php if($cat_id): ?>| <?php echo $category->cat_name?><?php endif; ?></h1>
        </div>
    </div>
    <div class="insight-buckets main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sr-overview' );?>
        
        <div class="insight-bucket">
            <div class="insight-bucket__date">
                <?php echo get_the_date('m.d.Y') ?>
            </div>
            
            <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $thumb['0']; ?>" alt="">
            </a>

            <div class="insight-bucket__content">
                <h2 class="insight-bucket__heading"><?php echo the_title(); ?></h2>
                <a class="insight-bucket__link" href="<?php the_permalink(); ?>">Read More</a>

                <div class="insight-bucket__meta">
                    <i></i>
                    <?php echo get_the_category_list(get_the_ID()); ?>
                </div>
            </div>

            
        </div>
    

    <?php endwhile; ?>
        <div class="empty-insight-bucket"></div>
        <div class="empty-insight-bucket"></div>
        <div class="empty-insight-bucket"></div>
    </div>



    <?php else : ?>

            No Posts

    <?php endif; ?>
    <?php 
    echo '<div class="pagination">';
    echo paginate_links(array(
        'type' => 'list',
        'prev_text' => 'previous',
        'next_text' => 'next',
    ));
    echo '</div>';
    ?>




<?php get_footer(); ?>
