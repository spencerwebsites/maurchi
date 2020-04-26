<?php if ( has_post_thumbnail() ) { ?>

	<header class="entry-header has-post-thumbnail">

		<div class="featured-image-blend">

			<div class="featured-image-blend-color"></div>

			<div class="featured-image" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');"></div>

		</div>

<?php } else { ?>

	<header class="entry-header">

<?php } ?>

<?php

if ( is_home() || is_front_page() ) {

	echo '<div class="entry-title">';

	echo '<h1>' . get_bloginfo('description') . '</h1>';

	wp_nav_menu( array(
		'theme_location'	=> 'home_cta',
		'container' 	 	=> '',
		'before'            => '<span class="cta">',
		'after'             => '</span>',
		'link_before' 		=> '<span class="link-text">',
		'fallback_cb'    	=> false,
	) );

	echo '</div>';

} elseif ( is_singular() ) {

	the_title( '<h1 class="entry-title">', '</h1>' );
	
} else {

	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
	
}

if ( has_excerpt() && is_singular() ) {

	?>

	<div class="intro-text">
		
		<?php the_excerpt(); ?>

	</div>

	<?php
}

?>
	

</header><!-- .entry-header -->
