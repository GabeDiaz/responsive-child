<?php
/*
Template Name: CWE Section
*/

/**
 * Created by JetBrains PhpStorm.
 * User: i.nishcheretova
 * Date: 12.02.14
 * Time: 18:46
 * To change this template use File | Settings | File Templates.
 */

if( !defined( 'ABSPATH' ) ) {
    exit;
}
get_header('login'); ?>

<div class="login-subs" style="min-height: 30px; height: 35px;">
  <div style="display: inline; float: right; text-align: right;">
    <ul class="menu">
      <li class="menu-item-solo"> <a href="<?php bloginfo('siteurl')?>/my-subscriptions"> My Subscriptions </a> </li>
    </ul>
  </div>
  <div style="font-family: Georgia, Times New Roman, Helvetica, sans-serif;font-size: 30px;font-style: normal;color: #444;border-bottom: 1px solid #ccc;padding: 6px 0 12px 0px;">

Creating Wealth	 <?php single_cat_title(); ?>


    <?php /*?>

<?php echo get_category_parents( $cat, true, ' &raquo; ' ); ?>
<?php echo get_category_parents( get_query_var('cat') , false , '' ); ?>
    <?php the_category(' &gt; '); ?>
	
	<?php $terms = get_the_terms( $post->ID , 'pubcode' );
if($terms) {
foreach( $terms as $term ) {
echo '<div class="authorbio">'.$term->description.'<br /></div>';
}
}
?><?php */?>
  </div>
</div>
<div class="hide-mobile">
  <div class="label welcome-message">
    <h1>
    <?php echo __( 'Welcome, Subscriber'); ?>
    <h1>
  </div>
</div>
<div class="m-cols ">
  <div id="content" class="grid-right col-620 fit">
    <div style="border-bottom:1px solid #eee;color: #649079;font: bold 28px/1.1em Arial, Helvetica, sans-serif;margin: 0 0 10px 0;padding: 10px 0 10px 0px; display:none;">Monthly Issues</div>
  
  
  
  
  
 
  
<?php /*?>


  
  
  
  
<?php query_posts( array(
      'category_name' => 'reports, monthly-issues, updates',
	  'taxonomy' => 'pubcode',
      'term' => 'mti',
	  'posts_per_page' => '-1',
      'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),

 ));
?>
<?php */?>





           <?php
           $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
           $args = array(
                //'cat'=>'50',
                'category_name' => 'mark_fords_creating_wealth',
                'order' => 'DESC',
                'orderby' => 'date',
          		'posts_per_page' => 20,
				'paged'  => $paged,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'pubcode',
                        'field' => 'slug',
                        'terms' => 'pbl'
                    )
                )
            );
        $wp_query = new WP_Query( $args );
            ?>

      <?php if($wp_query->have_posts() ) : ?>  

      <?php while($wp_query->have_posts() ) : $wp_query->the_post(); ?>
      <?php responsive_entry_before(); ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php responsive_entry_top(); ?>
      <div class="post-entry">
        <?php if( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"  target="_blank">
        <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) ); ?>
        </a>
        <?php endif; ?>
        <?php if( is_single() ): ?>
        <h1 class="entry-title post-title">
          <?php the_title(); ?>
        </h1>
        <?php else: ?>
        
        
        
        <?php $post_title = strip_tags(get_the_title());?>
        
        <h2 class="entry-title post-title"><a href="<?php the_permalink() ?>" rel="bookmark" target="_blank">

        <?php echo $post_title;?>

          </a></h2>
        <?php endif; ?>
        <div class="post-meta">Published
          <?php the_time('F j, Y'); ?>
<div class="post-meta">
<span class="byline">By</span> <span class="author vcard"><?php if(function_exists( 'coauthors' ) ) {
    coauthors();
} else {
	get_the_author();
}
?></span>
</div>

<?php the_excerpt(); ?>
<div style="float:right;"><?php edit_post_link('Edit'); ?></div>

<div class="read-more"><a target="_blank" href="<?php the_permalink() ?>">Read More...</a></div>
        </div>
        <?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
        <div class="posted-in" style="display:none;">Posted in:
          <?php
$terms = get_the_terms( $post->ID , 'category' );
foreach ( $terms as $term ) {
echo $term->name;
}?>
        </div>
      </div>
      <!-- end of .post-entry -->
      
      <?php responsive_entry_bottom(); ?>
    </div>
    <!-- end of #post-<?php the_ID(); ?> -->
    <?php responsive_entry_after(); ?>
    <?php
		endwhile;

	?>
	
    

	
	<div class="navigation">
    <?php wp_pagenavi(); ?>

</div>

    <?php
		endif;

	?>


<?php
wp_reset_postdata();
?>


  </div>
  <!-- end of #content-archive --> 
  <!-- start-widgets -->

<?php get_sidebar('cwe-left'); ?>

</div>

<?php get_footer(); ?>
