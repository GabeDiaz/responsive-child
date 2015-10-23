<?php get_header('login'); ?>
<?php $pbrgPubCode = $_GET["filter"]; ?>

<div class="login-subs" style="min-height: 30px; height: 35px;">

<?php
if ( is_user_logged_in() ) { ?>
  <div style="display: inline; float: right; text-align: right;">
    <ul class="menu">
      <li class="menu-item-solo"> <a href="<?php bloginfo('siteurl')?>/my-subscriptions"> My Subscriptions </a> </li>
    </ul>
  </div>
<?php } else { ?>
<?php }
?>

  <div style="font-family: Georgia, Times New Roman, Helvetica, sans-serif;font-size: 30px;font-style: normal;color: #444;border-bottom: 1px solid #ccc;padding: 6px 0 12px 0px;">

Search

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
    $current_category = get_the_category(); 
	$curcat = $current_category[0]->slug;
    //$curcatname = $current_category[0]->name;
	//echo $curcat;
	//echo $curcatname;
	//echo $current_category[1]->cat_name;
?>
  </div>
</div>

<?php
if ( is_user_logged_in() ) { ?>
<div class="hide-mobile">
  <div class="label welcome-message">
    <h1>
    <?php echo __( 'Welcome, Subscriber'); ?>
    <h1>
  </div>
</div>
<?php } else { ?>
<?php }
?>


<div class="m-cols ">
<div id="content-full" class="grid col-940" style="margin-top: 10px;">

<div class="search-results">



<?php
if ( is_user_logged_in() ) { ?>
<?php get_search_form(); ?>
<?php } else { ?>
<?php }
?>






<div style="border-bottom:1px solid #eee;color: #649079;font: bold 24px/1.1em Arial, Helvetica, sans-serif;margin: 0 0 10px 0;padding: 10px 0 10px 0px;">Displaying Results for:  <span style="color:#000;"><?php the_search_query(); ?></span></div>

<?php echo '<p>Found ' . $wp_query->found_posts . ' results.</p>'; ?> 

<?php /*?><?php echo '<p><a href="' . get_bloginfo('url') . '?s=' . get_search_query() . '&orderby=post_date&order=desc">Order results by date<a></p>'; ?><?php */?>


<?php if (function_exists('relevanssi_didyoumean')) { relevanssi_didyoumean(get_search_query(), "<p>Did you mean: ", "</p>", 5);
}?>
    
<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$search = new WP_Query($search_query);
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
          <?php relevanssi_get_the_title(); ?>
        </h1>
        <?php else: ?>
        <h2 class="entry-title post-title"><a href="<?php the_permalink() ?>" rel="bookmark" target="_blank">
          <?php the_title(); ?>
          </a></h2>
        <?php endif; ?>
        <div class="post-meta">Published: <?php the_time('F j, Y'); ?><br>
By: <?php if(function_exists( 'coauthors' ) ) {
    coauthors();
} else {
	get_the_author();
}
?>

<?php /*?>          <div class="post-meta">
<span class="byline">By</span> <span class="author vcard"><?php the_author() ?></span>
</div>

<?php */?>
<?php relevanssi_the_excerpt(); ?>
<?php edit_post_link(); ?>
        </div>
        
Filed under: <?php
$category = get_the_category(); 
echo $category[0]->cat_name;
?> |  <?php
$terms = get_the_terms( $post->ID, 'pubcode' );
						
if ( $terms && ! is_wp_error( $terms ) ) : 

	$pub_description = array();

	foreach ( $terms as $term ) {
		$pub_description[] = $term->description;
	}
						
	$pubcode_description = join( ", ", $pub_description );
?>

<?php echo $pubcode_description; ?>

<?php endif; ?>



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


</div>
</div>

<?php get_footer(); ?>
