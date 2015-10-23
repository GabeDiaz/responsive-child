<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<div id="content-full" class="grid col-940">
			<div id="post-<?php the_ID(); ?>" <?php post_class('type-page'); ?>>

   <h1 class="entry-title post-title">Glossary</h1>
<div class="post-entry">
	<?php if( have_posts() ) : ?>
<?php $posts=query_posts($query_string . '&orderby=title&order=asc&posts_per_page=-1');
while (have_posts()) : the_post(); ?>
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" class="page type-page status-publish hentry">
				<?php responsive_entry_top(); ?>
				<div id="<?php  global $post; $post_slug=$post->post_name; echo $post_slug; ?>" style="text-decoration:underline; color: rgb(100, 144, 121);"><?php the_title();?></div>
				<div class="post-entry">
					<?php the_content(); ?>
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
