<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Single Posts Template
 *
 *
 * @file           single.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/single.php
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */

get_header('login'); ?>

<?php
if ( is_user_logged_in() ) { ?>
<div class="m-cols ">

          <div id="content" class="grid-right col-620 fit">
<?php } else { ?>
<div class="m-cols ">

          <div id="content" class="grid-right col-620 fit">
<?php }
?>




	<?php if( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>

                
<h1 class="entry-title post-title"><?php the_title(); ?></h1>

<?php echo types_render_field('ifl-subhead', array("output"=>"html"));?>

<div class="post-meta">
<span class="byline">By</span> <span class="author vcard"><?php if(function_exists( 'coauthors' ) ) {
    coauthors();
} else {
	get_the_author();
}
?></span>
<br>Published <?php the_time('F Y'); ?>
</div>

				<div class="post-entry">
                
                <?php if( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'featured-post-pic alignright' ) ); ?>
						</a>
					<?php endif; ?>

<?php echo types_render_field('top-note', array("output"=>"html"));?>
<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
<?php echo types_render_field('bottom-note', array("output"=>"html"));?>

<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div>
				<!-- end of .post-entry -->

				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>

<?php /*?><?php previous_post('&laquo; %', '', 'yes'); ?>
| <?php next_post('% &raquo; ', '', 'yes'); ?><?php */?>


<hr>

<div style="margin-top: 25px;padding: 20px 20px 20px 10px;background-color: #f5f5f5;border-left: 6px solid #C66259;font-family: Georgia;font-size: 16px;">
<div align="center"><p><strong>Questions and Answers</strong></p>
<p>If you have any questions or comments please contact us <a href="http://ifl.palmbeachletter.com/contact/" target="_blank">here</a>.</p></div>
<?php echo types_render_field('ifl-qanda', array("output"=>"html"));?>
</div>

<?php if ( current_user_can( 'delete_others_posts' ) ) { //only admins and editors can see this ?>

 <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("6164");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed()){ ?>
  
  <div style="border-width: 1px;
border-style: solid;
padding: 0 0.6em;
margin: 20px 0 15px;
border-radius: 3px;
background-color: #ffffe0;
border-color: #e6db55;
color: #000;
clear: both;">
Logged in as an editor:
  
<?php echo types_render_field('ifl-questions', array("output"=>"html"));?>
  
			<?php responsive_comments_before(); ?>
			<?php comments_template( '', true ); ?>
			<?php responsive_comments_after(); ?>
</div>
<?  }else{

  }
 
}
?> 


<?php } else { ?>




<?php } ?>

		<?php
		endwhile;

		get_template_part( 'loop-nav' );

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>

</div><!-- end of #content -->
<?php get_sidebar('ifl-left'); ?>

</div>

<?php get_footer(); ?>
