<?php
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
global $wp_query;

$category = $wp_query->query_vars['category_name'];
$pub = $wp_query->query_vars['term'];

get_header('login'); ?>

<?php /*?><?php $term_list = wp_get_post_terms($post->ID, 'category', array("fields" => "all"));
print_r($term_list); ?>

<?php $core = agora_core_framework::get_instance();
var_dump ($core) ?>

<?php $description = term_description(); ?>

<?php var_dump ($authcode->description) ?>

<?php $terms = get_the_terms( $post->ID , 'pubcode' );
	if($terms) {
		foreach( $terms as $term ) {
		echo '<div class="authorbio">'.$term->description.'<br /></div>';
	}
}
?>

<?php 
$args=array(
  'name' => 'pubcode'
);
$output = 'objects'; // or objects
$taxonomies=get_taxonomies($args,$output); 
if  ($taxonomies) {
  foreach ($taxonomies  as $taxonomy ) {
    echo '<p>' . $taxonomy->name . '</p>';
  }
}  
?>

<?=$wp_query->queried_object->description?><?php */?>

<?php
if ( is_user_logged_in() ) { ?>
<div class="login-subs" style="min-height: 30px; height: 35px;">

<div style="display: inline; float: right; text-align: right;">
                    <ul class="menu">
                        <li class="menu-item-solo">
                            <a href="<?php bloginfo('siteurl')?>/my-subscriptions">
                                My Subscriptions
                            </a>
                        </li>
                    </ul>
                </div>


<?php } else { ?>
<div class="login-subs" style="min-height: 30px; height: 35px; margin-top:16px;">
<?php }
?>





<div style="font-family: Georgia, Times New Roman, Helvetica, sans-serif;
font-size: 30px;
font-style: normal;
color: #444;
border-bottom: 1px solid #ccc;
padding: 6px 0 12px 0px;">
 <div class="authorbio">Mega Trends Investing<br /></div>
 </div>
</div>

    <div class="hide-mobile">
        <div class="label welcome-message">
        
        <?php
if ( is_user_logged_in() ) { ?>
<h1><?php echo __( 'Welcome, Subscriber'); ?><h1>
       <?php } else { ?>
<h1>Please Sign In<h1>
<?php }
?>
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
                <div class="note">
              </div><?php
            endif;
            ?>

        </div>
        
<?php get_sidebar('mti-left'); ?>
       
    </div><!-- end of #content-archive -->

<?php get_footer(); ?>