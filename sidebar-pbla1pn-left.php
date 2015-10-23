<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main Widget Template
 *
 *
 * @file           sidebar-left.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-left.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>
<?php
//add_action('pre_get_posts', 'pbl_set_order_menu', 12);
global $wp_query, $post, $wpdb;
if (is_null($post))
    $post = $wp_query->post;
//var_dump($wp_query->post);
if (is_null($post))
    $post = $wp_query->post;
//var_dump(reset(wp_get_post_terms($post->ID, 'pubcode'))->slug);
$slug = NULL;
if (isset($post)){
    $terms = wp_get_post_terms($post->ID, 'pubcode');
    //print_r($terms);die;
    if (!empty($terms)){
        $slug = reset($terms)->slug;

    }
}
if($slug == 'pbn'){

$permalink = (string) get_permalink($post->ID);
   if($wp_query->query['pbn_separate'] == 1)
      $slug = 'pbn1';
elseif($wp_query->query['pbn_separate'] == 2)
  $slug = 'pbn';
}
$items = wp_get_nav_menu_items( 'pbl', array() );

responsive_widgets_before(); // above widgets container hook ?>
	<div id="widgets" class="grid col-300 rtl-fit">
        <?php responsive_widgets(); // above widgets hook ?>
		<?php if( !dynamic_sidebar( '' ) ) { ?>
			<div class="widget-wrapper">

				<ul>
					<?php
                    if(!empty($items))
                    foreach($items as $item)
                    {
                        if($item->type == 'taxonomy') {
                            $slugTerm = explode('/', $item->url);
                            $slugTerm = array_filter($slugTerm);


                            //if($slugTerm == 'pbn')
                        ?>
                        <li><a href="<?php bloginfo('siteurl')?>/pubcode/<?=$slug?>/<?=end($slugTerm);?>"><?=$item->title?></a></li>
                        <?php }
                        else {
                            ?>
                            <li class="<?=$item->post_name?>"><a href="<?=$item->url?>"><?=$item->title?></a></li>
                        <?php
                        }
                    }
                    ?>
                    
 <!-- Palm Beach Letter A1 - Infinity Order, Lifetime Subscriptions -->
     
          <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("4777");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("4777")){ 
  ?>
      	<?php dynamic_sidebar( 'cs-pbl-podcast' ); ?>
        <?  }
else{
  }
}
?>


<!-- Palm Beach Letter Platinum - PBL-PN only Pubcode-->

         <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("4748");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("4748")){ 
?>
      	<?php dynamic_sidebar( 'cs-pbl-podcast' ); ?>
        <?  }
else{
  }
}
?>


<!-- Palm Beach Letter Platinum P8 -->

         <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("8071");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("8071")){ 
?>
      	<?php dynamic_sidebar( 'cs-pbl-podcast' ); ?>
        <?  }
else{
  }
}
?>


                    
                    
				</ul>

			</div><!-- end of .widget-wrapper -->
		<?php } //end of right-left ?>

		<?php responsive_widgets_end(); // after widgets hook ?>
	</div><!-- end of #widgets -->
<?php responsive_widgets_after(); // after widgets container hook ?>