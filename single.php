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


<?php get_template_part( 'lib/subscriber', 'welcome' ); ?>

<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<div class="breadcrumb-list hide-mobile">','</div>');} ?>

    <div class="m-cols ">

<div id="content" class="grid-right col-620 fit">


<div style="border-bottom:1px solid #eee;"><h1><?php the_title();?></h1></div>

            <?php if( have_posts() ) : ?>
<div class="contt"><?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?></div>
              <?php endif;?>

        </div>
        
        
<?php $terms = get_the_terms( $post->ID , 'pubcode' );
	if($term->slug == mti) {
get_sidebar('mti-left');
	}
	elseif($term->slug !== mti) {
get_sidebar('left');
	}
?>
       
    </div><!-- end of #content-archive -->

<?php get_footer(); ?>