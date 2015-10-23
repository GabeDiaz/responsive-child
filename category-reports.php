<?php get_header('login'); ?>
<?php 
//$pbrgPubCode = $_GET["filter"]; 
$pbrgPubCode =  filter_input(INPUT_GET, 'filter', FILTER_SANITIZE_STRING);
?>

<?php
$pubcodedesc = $pbrgPubCode; 

if ($pubcodedesc == 'mti'){
  $pubcodedesc = "Mega Trends Investing";
  $pubcodereport = '<div id="post-12644" class="post-12644 post type-post status-publish format-standard hentry category-reports"><div class="post-entry">
<h2 class="entry-title post-title"><a href="http://palmbeachgroup.com/three-1000-stocks/" rel="bookmark" target="_blank">Three 1,000% Stocks</a></h2>
<div class="post-meta">Published January 23, 2014          
<div class="post-meta"><span class="byline">By</span> <span class="author vcard">Teeka Tiwari</span></div>
<p>Investing legend Peter Lynch is famous for turning an $18 million mutual fund into more than $12 billion over 20 years. He also coined the term “10-bagger,” which is what he used to call his investments that grew 10 times in value.</p>
<div class="read-more"><a target="_blank" href="http://palmbeachgroup.com/three-1000-stocks/">Read More...</a></div>
</div></div></div>'; 
}
if ($pubcodedesc == 'pbl'){
  $pubcodedesc = "Palm Beach Letter"; 
}
if ($pubcodedesc == 'jpt'){
  $pubcodedesc = "Jump Point Trader"; 
}
if ($pubcodedesc == 'leg'){
  $pubcodedesc = "Legacy Portfolio"; 
}
if ($pubcodedesc == null){
  $pubcodedesc = "Reports Archive"; 
}
?>

<h6 class="title-archive" style="display:none;">
		 <?php if ( is_day() ) : ?>
        <?php printf( __( 'Daily Archives: <span>%s</span>', 'twentyten' ), get_the_date() ); ?>
    <?php elseif ( is_month() ) : ?>
        <?php printf( __( 'Monthly Archives: <span>%s</span>', 'twentyten' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyten' ) ) ); ?>
    <?php elseif ( is_year() ) : ?>
        <?php printf( __( 'Yearly Archives: <span>%s</span>', 'twentyten' ), get_the_date( _x( 'Y', 'yearly archives date format', 'twentyten' ) ) ); ?>
    <?php else : ?>
        <?php _e( 'Archives', 'twentyten' ); ?>
    <?php endif; ?>
	</h6>
    
<div class="login-subs" style="min-height: 30px; height: 35px;">
  <div style="display: inline; float: right; text-align: right;">
    <ul class="menu">
      <li class="menu-item-solo"> <a href="<?php bloginfo('siteurl')?>/my-subscriptions"> My Subscriptions </a> </li>
    </ul>
  </div>
  <div style="font-family: Georgia, Times New Roman, Helvetica, sans-serif;font-size: 30px;font-style: normal;color: #444;border-bottom: 1px solid #ccc;padding: 6px 0 12px 0px;">

<?php echo $pubcodedesc ?>

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

<?php
//    $current_category = get_the_category(); 
//	$curcat = $current_category[0]->slug;
    //$curcatname = $current_category[0]->name;
	//echo $curcat;
	//echo $curcatname;
	//echo $current_category[1]->cat_name;
?>
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
    <div style="border-bottom:1px solid #eee;color: #649079;font: bold 28px/1.1em Arial, Helvetica, sans-serif;margin: 0 0 10px 0;padding: 10px 0 10px 0px;"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></div>

    
    <?php $current_category = single_cat_title('', false); ?>
    
    
<?php /*?><?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("4777");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("4777")){ ?>
<?php echo $pubcodereport ?>
        <?  }
else{
$inf = 'asd'; 	
  }
 unset($auth_container);
}
?><?php */?>
   
   
   
<?php if( !is_paged() ) { ?>
<?php query_posts( array(
  'category_name' => $current_category,
  'taxonomy' => 'pubcode',
  'term' => $pbrgPubCode,
 'post__in' => get_option( 'sticky_posts' ),
 ));
?>
    <?php if( have_posts() ) : ?>
    <?php while( have_posts() ) : the_post(); ?>
    <?php responsive_entry_before(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(sticky); ?> >

      <?php responsive_entry_top(); ?>
      <div class="post-entry">
      <div style="  color: #000;
  text-align: right;
  padding: 10px 6px;
  font-family: arial;
  text-transform: uppercase;
  font-weight: 500;
  font-size: 12px;
  border-bottom: 1px solid #E0E0E0;">
  <span style="background-color: #F0F0F0; padding: 6px 10px; border-radius: 2px;color: #000;border: 1px solid #ccc;">Featured Report:</span>
  </div>
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
    <?php
		endwhile;


	else :


	endif;
	?>
  <?php wp_reset_postdata(); ?>
  <?php } ?>
   
  
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    
    
    
    
  <?php query_posts( array(
  'category_name' => $current_category,
  'taxonomy' => 'pubcode',
  'term' => $pbrgPubCode,
  'ignore_sticky_posts'    => true,
  'post__not_in' => get_option( 'sticky_posts'),
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

<?php
$sidebarPubCode = $pbrgPubCode; 
if ($sidebarPubCode == 'mti'){
get_sidebar('mti-left');
	 }
elseif ($sidebarPubCode == 'pbl'){ 
get_sidebar('pbl-left');
	 }
elseif ($sidebarPubCode == 'leg'){ 
get_sidebar('leg-left');
	 }

else{	 
get_sidebar('left');
}	 
; ?>


</div>

<?php get_footer(); ?>
