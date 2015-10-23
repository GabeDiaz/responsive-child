<?php get_header('login'); ?>

<div class="login-subs" style="min-height: 30px; height: 35px;">
  <div style="display: inline; float: right; text-align: right;">
    <ul class="menu">
      <li class="menu-item-solo"> <a href="<?php bloginfo('siteurl')?>/my-subscriptions"> My Subscriptions </a> </li>
    </ul>
  </div>
  <div style="font-family: Georgia, Times New Roman, Helvetica, sans-serif;font-size: 30px;font-style: normal;color: #444;border-bottom: 1px solid #ccc;padding: 6px 0 12px 0px;">
    <?php single_cat_title(); ?>
    <?php /*?><?php $terms = get_the_terms( $post->ID , 'pubcode' );
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
    <div style="border-bottom:1px solid #eee;color: #649079;font: bold 28px/1.1em Arial, Helvetica, sans-serif;margin: 0 0 10px 0;padding: 10px 0 10px 0px;">Monthly Issues</div>
    <?php query_posts( array(
      'category_name' => 'retirement-insider',
      'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
	  'posts_per_page' => '24',
 ));
?>
    <?php if( have_posts() ) : ?>
    <?php while( have_posts() ) : the_post(); ?>
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

		get_template_part( 'loop-nav' );

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>
  </div>
  <!-- end of #content-archive --> 
  <!-- start-widgets -->

<?php get_sidebar('left'); ?>

  <div id="widgets" class="grid-right col-300 rtl-fit" style="display:none;">
    <div class="widget-wrapper">
    <?php wp_nav_menu( array('menu' => '11119' )); ?>
      <?php wp_nav_menu(); ?>
 <?php $items = wp_get_nav_menu_items( '11119', $args ); ?> 
    <?php get_registered_nav_menus(); ?>

    <!--  <ul>
        <li class="user-guide-6"><a href="http://palmbeachletter.com/user-guide-12/">User Guide</a></li>
        <li><a href="http://palmbeachletter.com/pubcode/pbl/monthly-issues">Monthly Issues</a></li>
        <li><a href="http://palmbeachletter.com/pubcode/pbl/updates">Updates</a></li>
        <li><a href="http://palmbeachletter.com/pubcode/pbl/special-reports">Special Reports</a></li>
        <li class="5426"><a href="http://palmbeachletter.com/portfolio/">Portfolios</a></li>
        <li class="asset-allocation"><a href="http://palmbeachletter.com/asset-allocation/">Asset Allocation</a></li>
        <li class="club-member-spotlight"><a href="http://palmbeachletter.com/wealth-builders-club-member-spotlight/">Member Spotlight</a></li>
        <li class="faq-2"><a href="http://palmbeachletter.com/palm-beach-letter-faq/">FAQ</a></li>
      </ul>-->
    </div>
    <!-- end of .widget-wrapper --> 
  
  </div>




</div>

<?php get_footer(); ?>
