<?php
/*
Template Name: CLB Archive TEST
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




<div>

<p><strong>Extra Income Opportunity</strong></p>
    <?php
           $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
           $args = array(
                'cat'=>'53',
				'posts_per_page' => -1,
                //'category_name' => 'content',
                'order' => 'ASC',
                'orderby' => 'date',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'pubcode',
                        'field' => 'slug',
                        'terms' => array('eio')
                    )
                )
            );
        $wp_query = new WP_Query( $args );
		        $cnt = 0;
            ?>

        <?php if($wp_query->have_posts() ) : ?>  

      <?php while($wp_query->have_posts() ) : $wp_query->the_post(); ?>
      <?php responsive_entry_before(); ?>

    <div>

        <?php
        $meta_value = trim(get_post_meta($post->ID, '_content_drip_meta')[0]);
        $max_content_drip = get_user_meta(get_current_user_id() , 'mailing_names')[0];
        $meta = preg_split('/(?<=\d)(?=[a-z])|(?<=[a-z])(?=\d)/i', $meta_value)[0];
        $mailing_name = null;
        foreach($max_content_drip as $max){
            if($meta) {
                if (strpos($max, $meta) !== false) {
                    $mailing_name = $max;
                }
            }
        }
        ?>
    <?php if($meta_value < $mailing_name OR in_array($meta_value, $max_content_drip)) : ?>
        <a href="<?php the_permalink() ?>" rel="bookmark" target="_blank"><?php the_title_attribute(); ?></a>


    <?php endif;  ?>

      <!-- end of .post-entry -->
      
<?php responsive_entry_bottom(); ?>
    </div>
<!-- end of #post-<?php the_ID(); ?> -->
<?php responsive_entry_after(); ?>
<?php endwhile; ?>
<?php 	endif;	?>
<?php wp_reset_postdata(); ?>


<p><strong>Retire Next Year</strong></p>
    <?php
           $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
           $args = array(
                'cat'=>'53',
				'posts_per_page' => -1,
                //'category_name' => 'content',
                'order' => 'ASC',
                'orderby' => 'date',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'pubcode',
                        'field' => 'slug',
                        'terms' => array('rny')
                    )
                )
            );
        $wp_query = new WP_Query( $args );
		        $cnt = 0;            ?>

        <?php if($wp_query->have_posts() ) : ?>  

      <?php while($wp_query->have_posts() ) : $wp_query->the_post(); ?>
      <?php responsive_entry_before(); ?>

    <div>

        <?php
        $meta_value = trim(get_post_meta($post->ID, '_content_drip_meta')[0]);
        $max_content_drip = get_user_meta(get_current_user_id() , 'mailing_names')[0];
        $meta = preg_split('/(?<=\d)(?=[a-z])|(?<=[a-z])(?=\d)/i', $meta_value)[0];
        $mailing_name = null;
        foreach($max_content_drip as $max){
            if($meta) {
                if (strpos($max, $meta) !== false) {
                    $mailing_name = $max;
                }
            }
        }
        ?>
    <?php if($meta_value < $mailing_name OR in_array($meta_value, $max_content_drip)) : ?>
        <a href="<?php the_permalink() ?>" rel="bookmark" target="_blank"><?php the_title_attribute(); ?></a>


    <?php endif;  ?>

      <!-- end of .post-entry -->
      
<?php responsive_entry_bottom(); ?>
    </div>
<!-- end of #post-<?php the_ID(); ?> -->
<?php responsive_entry_after(); ?>
<?php endwhile; ?>
<?php 	endif;	?>
<?php wp_reset_postdata(); ?>

<p><strong>Debt and Credit Solutions</strong></p>
  <?php
           $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
           $args = array(
                'cat'=>'53',
				'posts_per_page' => -1,
                //'category_name' => 'content',
                'order' => 'ASC',
                'orderby' => 'date',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'pubcode',
                        'field' => 'slug',
                        'terms' => array('debt')
                    )
                )
            );        $wp_query = new WP_Query( $args );
		        $cnt = 0;?>

        <?php if($wp_query->have_posts() ) : ?>  

      <?php while($wp_query->have_posts() ) : $wp_query->the_post(); ?>
      <?php responsive_entry_before(); ?>

    <div>

        <?php
        $meta_value = trim(get_post_meta($post->ID, '_content_drip_meta')[0]);
        $max_content_drip = get_user_meta(get_current_user_id() , 'mailing_names')[0];
        $meta = preg_split('/(?<=\d)(?=[a-z])|(?<=[a-z])(?=\d)/i', $meta_value)[0];
        $mailing_name = null;
        foreach($max_content_drip as $max){
            if($meta) {
                if (strpos($max, $meta) !== false) {
                    $mailing_name = $max;
                }
            }
        }
        ?>
    <?php if($meta_value < $mailing_name OR in_array($meta_value, $max_content_drip)) : ?>
        <a href="<?php the_permalink() ?>" rel="bookmark" target="_blank"><?php the_title_attribute(); ?></a>


    <?php endif;  ?>

      <!-- end of .post-entry -->
      
<?php responsive_entry_bottom(); ?>
    </div>
<!-- end of #post-<?php the_ID(); ?> -->
<?php responsive_entry_after(); ?>
<?php endwhile; ?>
<?php 	endif;	?>
<?php wp_reset_postdata(); ?>

<p><strong>Million Dollar Business</strong></p>
 <?php
           $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
           $args = array(
                'cat'=>'53',
				'posts_per_page' => -1,
                //'category_name' => 'content',
                'order' => 'ASC',
                'orderby' => 'date',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'pubcode',
                        'field' => 'slug',
                        'terms' => array('mdb')
                    )
                )
            );        $wp_query = new WP_Query( $args );
		        $cnt = 0;?>

        <?php if($wp_query->have_posts() ) : ?>  

      <?php while($wp_query->have_posts() ) : $wp_query->the_post(); ?>
      <?php responsive_entry_before(); ?>

    <div>

        <?php
        $meta_value = trim(get_post_meta($post->ID, '_content_drip_meta')[0]);
        $max_content_drip = get_user_meta(get_current_user_id() , 'mailing_names')[0];
        $meta = preg_split('/(?<=\d)(?=[a-z])|(?<=[a-z])(?=\d)/i', $meta_value)[0];
        $mailing_name = null;
        foreach($max_content_drip as $max){
            if($meta) {
                if (strpos($max, $meta) !== false) {
                    $mailing_name = $max;
                }
            }
        }
        ?>
    <?php if($meta_value < $mailing_name OR in_array($meta_value, $max_content_drip)) : ?>
        <a href="<?php the_permalink() ?>" rel="bookmark" target="_blank"><?php the_title_attribute(); ?></a>


    <?php endif;  ?>

      <!-- end of .post-entry -->
      
<?php responsive_entry_bottom(); ?>
    </div>
<!-- end of #post-<?php the_ID(); ?> -->
<?php responsive_entry_after(); ?>
<?php endwhile; ?>
<?php 	endif;	?>
<?php wp_reset_postdata(); ?>

<p><strong>Wealth Stealers</strong></p>
 <?php
           $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
           $args = array(
                'cat'=>'53',
				'posts_per_page' => -1,
                //'category_name' => 'content',
                'order' => 'ASC',
                'orderby' => 'date',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'pubcode',
                        'field' => 'slug',
                        'terms' => array('wsc')
                    )
                )
            );        $wp_query = new WP_Query( $args );
		        $cnt = 0;?>

        <?php if($wp_query->have_posts() ) : ?>  

      <?php while($wp_query->have_posts() ) : $wp_query->the_post(); ?>
      <?php responsive_entry_before(); ?>

    <div>

        <?php
        $meta_value = trim(get_post_meta($post->ID, '_content_drip_meta')[0]);
        $max_content_drip = get_user_meta(get_current_user_id() , 'mailing_names')[0];
        $meta = preg_split('/(?<=\d)(?=[a-z])|(?<=[a-z])(?=\d)/i', $meta_value)[0];
        $mailing_name = null;
        foreach($max_content_drip as $max){
            if($meta) {
                if (strpos($max, $meta) !== false) {
                    $mailing_name = $max;
                }
            }
        }
        ?>
    <?php if($meta_value < $mailing_name OR in_array($meta_value, $max_content_drip)) : ?>
        <a href="<?php the_permalink() ?>" rel="bookmark" target="_blank"><?php the_title_attribute(); ?></a>


    <?php endif;  ?>

      <!-- end of .post-entry -->
      
<?php responsive_entry_bottom(); ?>
    </div>
<!-- end of #post-<?php the_ID(); ?> -->
<?php responsive_entry_after(); ?>
<?php endwhile; ?>
<?php 	endif;	?>
<?php wp_reset_postdata(); ?>

<p><strong>Rental Real Esate</strong></p>

 <?php
           $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
           $args = array(
                'cat'=>'53',
				'posts_per_page' => -1,
                //'category_name' => 'content',
                'order' => 'ASC',
                'orderby' => 'date',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'pubcode',
                        'field' => 'slug',
                        'terms' => array('rre')
                    )
                )
            );        $wp_query = new WP_Query( $args );
		        $cnt = 0;?>

        <?php if($wp_query->have_posts() ) : ?>  

      <?php while($wp_query->have_posts() ) : $wp_query->the_post(); ?>
      <?php responsive_entry_before(); ?>

    <div>

        <?php
        $meta_value = trim(get_post_meta($post->ID, '_content_drip_meta')[0]);
        $max_content_drip = get_user_meta(get_current_user_id() , 'mailing_names')[0];
        $meta = preg_split('/(?<=\d)(?=[a-z])|(?<=[a-z])(?=\d)/i', $meta_value)[0];
        $mailing_name = null;
        foreach($max_content_drip as $max){
            if($meta) {
                if (strpos($max, $meta) !== false) {
                    $mailing_name = $max;
                }
            }
        }
        ?>
    <?php if($meta_value < $mailing_name OR in_array($meta_value, $max_content_drip)) : ?>
        <a href="<?php the_permalink() ?>" rel="bookmark" target="_blank"><?php the_title_attribute(); ?></a>


    <?php endif;  ?>

      <!-- end of .post-entry -->
      
<?php responsive_entry_bottom(); ?>
    </div>
<!-- end of #post-<?php the_ID(); ?> -->
<?php responsive_entry_after(); ?>
<?php endwhile; ?>
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
else{ 
get_sidebar('left');
}; ?>

</div>

<?php get_footer(); ?>