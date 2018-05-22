<?php get_header(); ?>

	
	<?php $blogID = get_id_by_slug('insights')?>
	<?php $thumb = get_field('header_background', $blogID); ?>
	<div class=" page-header" style="background-image: url('<?php echo $thumb['url']; ?>');">
	    <div class="page-header__container">
	        

	        <h1 class="page-header__heading"><?php the_field('header_title', $blogID); ?></h1>

	        <div class="page-header__content">
	            <?php the_field('header_content', $blogID); ?>
	        </div>


	    </div>
	</div>
	
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php if(get_field('featured')): ?>

		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sr-overview' );?>


	<div class="featured-insight">
		<a href="<?php the_permalink(); ?>" class="featured-insight__image" style="background-image: url('<?php echo $thumb['0']; ?>');">
			
		</a>
		<div class="featured-insight__content">
			<div class="featured-insight__date">
				<?php echo get_the_date('m.d.Y') ?>
			</div>
			
			
			<h2 class="featured-insight__heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			

			<?php the_excerpt(); ?>

			<a href="<?php the_permalink(); ?>" class="continue">Read More</a>

			<div class="featured-insight__meta">
				<i></i>
				<?php echo get_the_category_list(get_the_ID()); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php endwhile; ?>
	<?php endif; ?>

	<?php rewind_posts(); ?>

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
				
				<h2 class="insight-bucket__heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				
				<a class="insight-bucket__link continue" href="<?php the_permalink(); ?>">Read More</a>

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
