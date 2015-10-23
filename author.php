<?php get_header('login'); ?>

<div class="login-subs">
<?php
if ( is_user_logged_in() ) { ?>
<div style="display: inline; float: right; text-align: right;">
                    <ul class="menu">
                        <li class="menu-item-solo">
                            <a href="<?php bloginfo('siteurl')?>/my-subscriptions">
                                My Subscriptions
                            </a>
                        </li>
                    </ul>
                </div>
<?php } else {
}
?>

  <div class="main-page-title">
	 <?php single_cat_title(); ?>
  </div>
</div>

<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<div class="breadcrumb-list">','</div>');} ?>

<div class="">

<div id="content" class="pbd grid col-620">
<div style="border:1px solid #eee; padding:10px;">
 <?php                 // If a user has filled out their description, show a bio on their entries.
                if ( get_the_author_meta( 'description' ) ) : ?>
                <div id="author-info">
                    <div id="author-description"><h2><?php printf( __( 'About %s', 'twentyeleven' ), get_the_author() ); ?></h2>
                    <?php the_author_meta( 'description' ); ?>
                    </div><!-- #author-description -->
                </div><!-- #entry-author-info -->
                <?php endif; ?>
</div>


    <?php query_posts ?>
    <?php if( have_posts() ) : ?>
    <?php while( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="post-entry">

<h2 class="entry-title post-title grid-col-220"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<div class="post-meta">
<span class="byline">By</span> <span class="author vcard"><?php if(function_exists( 'coauthors' ) ) {
    coauthors();
} else {
	get_the_author();
}
?></span> | <?php the_time('F j, Y'); ?></div>

					<?php if( has_post_thumbnail() ) : ?>
					<div class="pbd-thumb"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail( 'medium', array( 'class' => 'alignleft' ) ); ?>
						</a></div>
					<?php endif; ?>



<div class="featured-description"><?php the_excerpt(); ?></div>

<div class="view-full-post"><a href="<?php the_permalink() ?>" class="view-full-post-btn">Read More...</a></div>
</div></div>
    <?php
		endwhile;

		wp_pagenavi();

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>
  </div>
  <!-- end of #content-archive --> 
  <!-- start-widgets -->

<?php get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>
