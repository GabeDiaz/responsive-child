<?php
/*
Template Name: PBL-Pub-Code
*/

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Pages Template
 *
 *
 */

get_header(); ?>

<div id="content" class="grid col-940" style="background-color:#F9F3DD;">

<?php if ( is_user_logged_in() ) {

    ?>
Palm Beach Letter <span class="lwa-title-sub"><?php echo __( 'Welcome', 'login-with-ajax' ) . " " . $current_user->display_name  ?></span>

	<?php } else {   ?>

<?php } ?>

<div class="subwrapper grid col-540" style="margin: 20px;
background-color: #fff;
border: 1px solid #DDD7C6;
float: right;">

	<?php if( have_posts() ) : ?>
		<?php while( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'loop-header' ); ?>
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>
				<?php get_template_part( 'post-meta-page' ); ?>

				<div class="post-entry">
 		<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
				  
                </div>
				<!-- end of .post-entry -->

				<?php get_template_part( 'post-data' ); ?>
				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>
			<?php responsive_comments_before(); ?>
			<?php comments_template( '', true ); ?>
			<?php responsive_comments_after(); ?>
		<?php
		endwhile;

		get_template_part( 'loop-nav' );

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>

</div>
</div><!-- end of #content -->

<?php get_footer(); ?>
