<?php

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
  <div class="page-description">

<?php /*?><?php $terms = get_the_terms( $post->ID , 'pubcode' );
if($terms) {
foreach( $terms as $term ) {
echo '<div class="authorbio">'.$term->description.'<br /></div>';
}
}
?><?php */?>


<?php
$terms = wp_get_object_terms( $post->ID, 'pubcode', array('orderby' => 'id') );
if ( $terms && ! is_wp_error( $terms ) ) :
$terms = array_values($terms);
?>
<?php echo $terms[0]->description; ?>
<?php endif; ?>

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
<div class="m-cols " style="display: inline;">
          <div id="content" class="grid-right col-620 fit">

            <div style="border-bottom:1px solid #eee;color: #649079;font: bold 28px/1.1em Arial, Helvetica, sans-serif;margin: 0;
padding: 10px 0 10px 0px;"><?php the_title();?></div>


            <?php if( have_posts() ) : ?>
                <div class="contt">
					<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>

                </div>

<?php
            endif;
            ?>


<?php query_posts( array(
  'category_name' => 'reports',
  'taxonomy' => 'pubcode',
  'term' => 'IFL',
  'ignore_sticky_posts'    => true,
  'paged' => $paged,
//  'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
  'posts_per_page' => '12',
  'post_type' => 'post',

 ));
?>
    <?php if( have_posts() ) : ?>
    <?php while( have_posts() ) : the_post(); ?>
    <?php responsive_entry_before(); ?>


<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <h2 class="entry-title post-title"><a href="<?php the_permalink() ?>" rel="bookmark" target="_blank">
<?php $cleantitle = get_the_title();
echo wp_strip_all_tags($cleantitle); ?></a></h2>


<div class="post-entry" style="float:none;">
        <?php if( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"  target="_blank">
        <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft media-thumb' ) ); ?>
        </a>
        <?php endif; ?>
      
<?php the_excerpt(); ?>

<div class="read-more" style="clear:none;"><a target="_blank" href="<?php the_permalink() ?>">Read More...</a></div>


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

        </div>
  <!-- end of #content-archive --> 
  <!-- start-widgets -->




<?php $terms = get_the_terms( $post->ID , 'pubcode' );
    if (!empty($terms)){
        $pbrgPubCode = reset($terms)->slug;
}
?>



<?php
$sidebarPubCode = $pbrgPubCode; 
if ($sidebarPubCode == 'pbl'){
get_sidebar('pbl-left');
	 }
elseif ($sidebarPubCode == 'leg'){
get_sidebar('leg-left');
	 }
elseif ($sidebarPubCode == 'ifl'){
get_sidebar('ifl-left');
	 }
else{ 
get_sidebar('left');
}; ?>

</div>

<?php get_footer(); ?>
