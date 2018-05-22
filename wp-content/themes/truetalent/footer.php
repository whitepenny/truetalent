</div>

<div class="footer__container">

        <div class="footer">
		
		<?php if (get_field('address', 'options')): ?>
		<?php the_field('address', 'options'); ?>
		<?php endif; ?>
        
        
        <?php if (get_field('locations', 'options')): ?>
            
        <div class="footer__locations">
            <ul>
                <?php while(have_rows('locations', 'options')) : the_row(); ?>

                    <li><?php the_sub_field('location'); ?></li>
                <?php endwhile ?>

            </ul>
        </div>

        <?php endif ?>

        
        

        <ul class="social-menu">
            <?php if (get_theme_mod( 'sr_facebook_link', '' )): ?>
                <li><a target="_blank" href="<?php echo get_theme_mod( 'sr_facebook_link', '' ) ?>" aria-label="Facebook (opens in new window)"><i class="fa fa-lg fa-facebook" aria-hidden="true"></i></a></li>    
            <?php endif ?>
            <?php if (get_theme_mod( 'sr_twitter_link', '' )): ?>
                <li><a target="_blank" href="<?php echo get_theme_mod( 'sr_twitter_link', '' ) ?>" aria-label="Twitter (opens in new window)"><i class="fa fa-lg fa-twitter" aria-hidden="true"></i></a></li>    
            <?php endif ?>
            <?php if (get_theme_mod( 'sr_linkedin_link', '' )): ?>
                <li><a target="_blank" href="<?php echo get_theme_mod( 'sr_linkedin_link', '' ) ?>" aria-label="LinkedIn (opens in new window)"><i class="fa fa-lg fa-linkedin" aria-hidden="true"></i></a></li>    
            <?php endif ?>
            <?php if (get_theme_mod( 'sr_instagram_link', '' )): ?>
                <li><a target="_blank" href="<?php echo get_theme_mod( 'sr_instagram_link', '' ) ?>" aria-label="Instagram (opens in new window)"><i class="fa fa-lg fa-instagram" aria-hidden="true"></i></a></li>    
            <?php endif ?>
            <?php if (get_theme_mod( 'sr_yelp_link', '' )): ?>
                <li><a target="_blank" href="<?php echo get_theme_mod( 'sr_yelp_link', '' ) ?>" aria-label="Yelp (opens in new window)"><i class="fa fa-lg fa-yelp" aria-hidden="true"></i></a></li>    
            <?php endif ?>
            <?php if (get_theme_mod( 'sr_medium_link', '' )): ?>
                <li><a target="_blank" href="<?php echo get_theme_mod( 'sr_medium_link', '' ) ?>" aria-label="Medium (opens in new window)"><i class="fa fa-lg fa-medium" aria-hidden="true"></i></a></li>    
            <?php endif ?>

            <?php if (get_theme_mod( 'sr_pinterest_link', '' )): ?>
                <li><a target="_blank" href="<?php echo get_theme_mod( 'sr_pinterest_link', '' ) ?>" aria-label="Pinterest (opens in new window)"><i class="fa fa-lg fa-pinterest" aria-hidden="true"></i></a></li>    
            <?php endif ?>

            <?php if (get_theme_mod( 'sr_youtube_link', '' )): ?>
                <li><a target="_blank" href="<?php echo get_theme_mod( 'sr_youtube_link', '' ) ?>" aria-label="YouTube (opens in new window)"><i class="fa fa-lg fa-youtube" aria-hidden="true"></i></a></li>    
            <?php endif ?>
        </ul>
        </div>

		<div class="footer__copyright">
			<p>Copyright <?php echo date('Y') ?> True Talent Advisory. &nbsp;&nbsp; All Rights Reserved. &nbsp;&nbsp; <a href="/privacy-policy/">Privacy Policy</a></p> 
		</div>

</div>

</div>


<?php wp_footer(); ?>


</body>
</html>