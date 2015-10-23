<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Content/Sidebar Template
 *
Template Name:  Content/Sidebar
 *
 * @file           content-sidebar-page.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2011 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/content-right-page.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

get_header('pbrg-featured'); ?>
<div id="content" class="pbd grid col-620">

<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<div class="breadcrumb-list">','</div>');} ?>


	<?php if( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php responsive_entry_before(); ?>
            
           
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if( is_single() ): ?>
	<h1 class="entry-title post-title"><?php the_title(); ?></h1>
<?php else: ?>
	<h2 class="entry-title post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php endif; ?>

<div style="border-bottom: 1px solid #ccc;
padding: 16px 0;
overflow: auto;
clear: both;
border-top: 1px solid #ccc;">
<div class="post-meta" style="border: width: 45%;float: left; margin-bottom:0;">
<span class="byline">By</span> <span class="author vcard"><?php if(function_exists( 'coauthors' ) ) {
    coauthors();
} else {
	get_the_author();
}
?></span>
<br><?php the_time('F j, Y'); ?></div>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_sharing_toolbox" style="float:right;"></div>
</div>

				<div class="post-entry">
					<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div>
				<!-- end of .post-entry -->
				<?php get_template_part( 'post-data' ); ?>
				<?php responsive_entry_bottom(); ?>

<div style="clear:both;">
<div class="pbd-article-navigation clearfix">

<div class="nav-arrow-prev" style="width:49%; float:left; text-align: center;font-family: arial;font-size: 14px;border-right: 1px solid #eee;min-height: 120px;"><span class="pbd-nav-title">Previous Article</span><?php previous_post_link('%link','<div class="pbd-previous-link">%title</div>', TRUE); ?></div>


<div class="nav-arrow-next" style="width:49%; float:right; text-align: center;font-family: arial;font-size: 14px;min-height: 120px;"><span class="pbd-nav-title">Next Article</span><?php next_post_link('%link','<div class="pbd-next-link">%title</div>', TRUE); ?></div>

		</div>
             </div>



<div style="display:none;"><?php echo do_shortcode( '[jetpack-related-posts]' ); ?></div>                
		</div><!-- end of #post-<?php the_ID(); ?> -->
        
        
<div class="relatedposts" style="margin:10px 0; display:none;">

<style type="text/css">
.single .relatedposts .relatedthumb {
    display: inline;
    float: left;
    width: 29%;
    border: 1px solid #eee;
    margin: 5px;
    padding: 5px;
}
.relatedthumb a {
    font-family: arial;
    font-size: 12px;
}
</style>
    <h3 style="    font-size: 20px;
    color: #333;
    font-family: arial;">Related posts</h3>
    <?php
        $orig_post = $post;
        global $post;
        $tags = wp_get_post_tags($post->ID);
 
        if ($tags) {
            $tag_ids = array();
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
            $args=array(
                'tag__in' => $tag_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page'=>3, // Number of related posts to display.
            );
 
        $my_query = new wp_query( $args );
 
        while( $my_query->have_posts() ) {
            $my_query->the_post();
        ?>
 
        <div class="relatedthumb">
            <a rel="external" href="<? the_permalink()?>"><?php the_post_thumbnail(array(150,100)); ?><br />
            <?php the_title(); ?>
            </a>
        </div>
 
        <?php }
        }
        $post = $orig_post;
        wp_reset_query();
        ?>
        
        
        
        
        
        <?php
//for use in the loop, list 5 post titles related to first tag on current post
$tags = wp_get_post_tags($post->ID);
if ($tags) {
echo 'Related Posts';
$first_tag = $tags[0]->term_id;
$args=array(
'tag__in' => array($first_tag),
'post__not_in' => array($post->ID),
'posts_per_page'=>5,
'caller_get_posts'=>1
);
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>

<?php
endwhile;
}
wp_reset_query();
}
?>
    </div>




			<?php responsive_entry_after(); ?>
            


            

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5447ee3f5d21c932" async></script>

<div class="addthis_sharing_toolbox" style="margin:0 20px 20px 0"></div>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5447ee3f5d21c932" async></script>


<div id="taboola-below-article-thumbnails" style="width:90%;margin:auto;"></div>
<script type="text/javascript">
  window._taboola = window._taboola || [];
  _taboola.push({
    mode: 'alternating-thumbnails-a',
    container: 'taboola-below-article-thumbnails',
    placement: 'Below Article Thumbnails',
    target_type: 'mix'
  });
</script>

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

</div><!-- end of #content -->


<?php get_sidebar( 'right' ); ?>
<?php get_footer(); ?>