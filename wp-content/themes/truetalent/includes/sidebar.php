<div class="news-sidebar">
    <div class="widget recent-posts-widget">
        <h3>Recent News</h3>
        <ul>
        <?php 
            $args = array(
                'post_type' => 'post',
                'order'     => 'DSC',
                'posts_per_page' => 3,
                );
        ?>

        <?php $sidebar_query =  new WP_Query($args) ?>
        
        <?php if ($sidebar_query->have_posts()) : while ($sidebar_query->have_posts()) : $sidebar_query->the_post(); ?>
            
            <li><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a>
                <div class="post__meta">
                    posted <?php the_time( 'n.j.Y' ); ?>
                </div>
            </li>
        <?php endwhile; ?>
        <?php endif; ?>

        </ul>
    </div>

    <div class="widget category-widget">
        <h3>Categories</h3>
        <ul>
        <?php wp_list_categories(array('child_of' => 6, 'title_li' => '',) ); ?>
        </ul>
    </div>
</div>