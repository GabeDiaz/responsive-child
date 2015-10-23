<?php
/*
Template Name: Static Content
*/

if( !defined( 'ABSPATH' ) ) {
    exit;
}
global $wp_query;

$category = $wp_query->query_vars['category_name'];
$pub = $wp_query->query_vars['term'];

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


<?php $terms = get_the_terms( $post->ID , 'pubcode' );
	if($terms) {
		foreach( $terms as $term ) {
		echo '<div class="authorbio">'.$term->description.'<br /></div>';
	}
}
?>

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

            <div style="border-bottom:1px solid #eee;color: #649079;font: bold 28px/1.1em Arial, Helvetica, sans-serif;margin: 0;
padding: 10px 0 10px 0px;"><?php the_title();?></div>


            <?php if( have_posts() ) : ?>
                <div class="contt">
					<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>

                </div>

<?php
            endif;
            ?>

        </div>
        
        
        
        		<?php responsive_comments_before(); ?>
			<?php comments_template( '', true ); ?>
			<?php responsive_comments_after(); ?>
  <!-- end of #content-archive --> 
  <!-- start-widgets -->




<?php $terms = get_the_terms( $post->ID , 'pubcode' );
if($term->slug == mti) {
get_sidebar('mti-left');
}
elseif($term->slug == pbl) {
get_sidebar('pbl-left');
	}
elseif($term->slug == leg) {
get_sidebar('leg-left');
	}
elseif($term->slug == ifl) {
get_sidebar('ifl-left');
	}
else{	 
get_sidebar('left');
}	 
; ?>


</div>

<?php get_footer(); ?>
