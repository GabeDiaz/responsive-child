<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
?>

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




<?php $user_meta = get_user_meta(get_current_user_id());

 if(isset($user_meta['LEGDAY30'])) {


wp_nav_menu( array('menu' => '55',
'container'       => false,
'items_wrap' => '%3$s',
    'sort_column' => 'menu_order',
    'menu_class' => 'css-menu',
    'title_li' => '<div class="l"></div>',
    'link_before' => '<span class="l">',
    'link_after' => '</span>' ));

echo '*';

 }else {


wp_nav_menu( array('menu' => '55',
'container'       => false,
'items_wrap' => '%3$s',
    'sort_column' => 'menu_order',
    'menu_class' => 'css-menu',
    'title_li' => '<div class="l"></div>',
    'link_before' => '<span class="l">',
    'link_after' => '</span>' ));

 }
 
      echo '.';

?>

  				</ul>
			</div><!-- end of .widget-wrapper -->


		<?php } //end of right-left ?>

	</div><!-- end of #widgets -->
<?php responsive_widgets_after(); // after widgets container hook ?>