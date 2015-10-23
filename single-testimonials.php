<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<div id="content-full" class="grid col-940" style="margin-top:0;">
			<div id="post-<?php the_ID(); ?>" <?php post_class('type-page'); ?>>

   <h1 class="entry-title post-title">Testimonials</h1>
<div class="post-entry">
	<?php if( have_posts() ) : ?>
<?php $posts=query_posts($query_string . '&order=asc&posts_per_page=-1');
while (have_posts()) : the_post(); ?>
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" class="page type-page status-publish hentry">
				<?php responsive_entry_top(); ?>
				<div class="post-entry">


<?php echo do_shortcode( "[ac-testimonials]" ); ?>


					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div>
				<!-- end of .post-entry -->

			<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>

		<?php
		endwhile;

		get_template_part( 'loop-nav' );

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>
</div>


</div>
</div><!-- end of #content-archive -->

<?php get_footer(); ?>
