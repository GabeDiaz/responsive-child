<?php
/*
Template Name: MTI Section
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


<?php get_template_part( 'lib/subscriber', 'welcome' ); ?>



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
                'cat'=>'17100,33,17',
                //'category_name' => 'reports, updates, monthly-issues',
                'order' => 'DESC',
                'orderby' => 'date',
				'post_not_in' => array(11815, 15692),
          		'posts_per_page' => 8,
				'paged'  => $paged,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'pubcode',
                        'field' => 'slug',
                        'terms' => 'mti'
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
        <h2 class="entry-title post-title"><a href="<?php the_permalink() ?>" rel="bookmark" target="_blank">
          <?php the_title(); ?>
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

<div class="read-more"><a target="_blank" href="<?php the_permalink() ?>">Read More...</a></div>

<?php edit_post_link(); ?>
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
<?php endwhile; ?>

<div class="navigation"><?php wp_pagenavi(); ?></div>

<?php 	endif;	?>

<?php wp_reset_postdata(); ?>


  </div>
  <!-- end of #content-archive --> 
  <!-- start-widgets -->

<?php get_sidebar('mti-left'); ?>

</div>

<?php get_footer(); ?>
