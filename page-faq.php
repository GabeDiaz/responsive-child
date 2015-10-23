<?php
/*
Template Name: FAQ Template
*/

if( !defined( 'ABSPATH' ) ) {
    exit;
}
global $wp_query;

$category = $wp_query->query_vars['category_name'];
$pub = $wp_query->query_vars['term'];

get_header('login'); ?>
<style type="text/css">
#mw_login {
	padding: 25px;
	margin: 20px;
	-webkit-box-shadow: 5px 5px 10px 5px #999999;
}
#mw_login label {
	width: 120px;
	line-height: 38px;
	display: block;
	float: left;
	text-align: right;
	margin-right: 10px;
}
#mw_login input[type='text'], #mw_login input[type='password'] {
	width: 180px;
	height: 30px;
	margin: 4px 0px;
}
#mw_login h2 {
	margin: 6px auto;
}
#mw_login .remember_fieldgroup {
}
#mw_login .error {
	font-weight: bold;
	color: red;
}
</style>
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
      <li class="menu-item-solo"> <a href="<?php bloginfo('siteurl')?>/my-subscriptions"> My Subscriptions </a> </li>
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
      <?php $terms = get_the_terms( $post->ID , 'pubcode' );
	if($terms) {
		foreach( $terms as $term ) {
		echo '<div class="authorbio">'.$term->description.'<br /></div>';
	}
}
?>
    </div>
  </div>
  <div class="hide-mobile">
    <div class="label welcome-message">
      <?php
if ( is_user_logged_in() ) { ?>
      <h1>
      <?php echo __( 'Welcome, Subscriber'); ?>
      <h1>
      <?php } else { ?>
      <h1>
      Please Sign In
      <h1>
      <?php }
?>
    </div>
  </div>
 
      <?php
if ( is_user_logged_in() ) { ?>

 <div class="m-cols ">
    <div id="content" class="grid-right col-620 fit">
      <div style="border-bottom:1px solid #eee;color: #649079;font: bold 28px/1.1em Arial, Helvetica, sans-serif;margin: 0;padding: 10px 0 10px 0px;">
        <?php the_title();?>
      </div>
      <?php if( have_posts() ) : ?>
      <div class="contt">
        <?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
        <?php echo types_render_field('content', array("output"=>"html"));?> <?php echo types_render_field('body', array("output"=>"html"));?> </div>
    </div>


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

    <?php
            endif;
            ?>
    <?php } else { ?>
     <div class="m-cols ">
    <div id="content" class="grid-right col-860 fit" style="width:94%;">
      <div style="border-bottom:1px solid #eee;color: #649079;font: bold 28px/1.1em Arial, Helvetica, sans-serif;margin: 0;padding: 10px 0 10px 0px;">
        <?php the_title();?>
      </div>
    <div id="mw_login" >
      <h2><?php echo (isset($title)) ? $title : "Login" ; ?></h2>
      <div class="<?php echo (isset($message_class)) ? $message_class : ''; ?>">
        <?php if(isset($message)) echo $message; ?>
      </div>
      <?php wp_login_form($form_parameters); ?>
      <p> <a href="<?php site_url() ;?>/forgot-password/">
        <?php _e('Forgot Your Password?'); ?>
        </a> </p>
    </div>
  </div>
  <?php }
?>
</div>
<!-- end of #content-archive -->

<?php get_footer(); ?>
