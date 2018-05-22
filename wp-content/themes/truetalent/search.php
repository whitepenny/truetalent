<?php get_header(); ?>



<div class=" page-header">
    <div class="page-header__container">
        
        <h1 class="page-header__heading">Search Results</h1>

    </div>
</div>

<div class="default-page">
    <div class="main">

        <div class="centered-content">
            
            <?php if(have_posts()): ?>
            <?php while(have_posts()) : the_post(); ?>
            
                <div class="search-result">
                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
                </div>
                

            <?php endwhile; ?>

        <?php else: ?>
            <h2>Sorry...</h2>
            <p>There are no pages matching the search term.</p>
        <?php endif; ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
