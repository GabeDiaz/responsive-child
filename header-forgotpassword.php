<?php
/**
 * Created by JetBrains PhpStorm.
 * User: i.nishcheretova
 * Date: 24.02.14
 * Time: 17:35
 * To change this template use File | Settings | File Templates.
 */


/**
 * Header Template
 *
 *
 * @file           header.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.3
 * @filesource     wp-content/themes/responsive/header.php
 * @link           http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 * @since          available since Release 1.0
 */
?>
    <!doctype html>
    <!--[if !IE]>
    <html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
    <!--[if IE 7 ]>
    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
    <!--[if IE 8 ]>
    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
    <!--[if IE 9 ]>
    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
    <!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo( 'siteurl' ); ?>/favicon.ico" />
        <link rel="icon" type="image/x-icon" href="<?php bloginfo( 'siteurl' ); ?>/favicon.ico" />

        <title><?php wp_title( '&#124;', true, 'right' ); ?></title>

        <link rel="profile" href="http://gmpg.org/xfn/11"/>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

        <!-- Start Flexslider -->
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/flexslider.css" type="text/css"/>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.flexslider.js"></script>
        <!-- Place in the <head>, after the three links -->
        <script type="text/javascript" charset="utf-8">
            $(window).load(function() {
                $('.flexslider').flexslider({
                    directionNav: false,
                    slideshow: true,
                    slideshowSpeed: 7500,
                    touch: true,
                    pauseOnAction: false
                });
            });
        </script>

       <?php wp_head(); ?>
    </head>

<?php
if ( is_user_logged_in() ) { ?>
<body <?php body_class('site-member'); ?>>
<?php } else { ?>
<body <?php body_class(); ?>>
<?php }
?>



<div class="all">

<?php responsive_container(); // before container hook ?>

    <div id="container" class="hfeed">


    <div class="header-top">
        <?php responsive_header(); // before header hook ?>


        <?php responsive_header_top(); // before header content hook ?>

           <?php /*if( has_nav_menu( 'top-menu', 'responsive' ) ) { */?><!--
			<?php /*wp_nav_menu( array(
								   'container'      => '',
								   'fallback_cb'    => false,
								   'menu_class'     => 'top-menu hide-650',
								   'theme_location' => 'top-menu',
                                    'items_wrap' => ''
							   )
			);
			*/?>
		--><?php// } ?>
        <ul id="menu-customer-service" class="top-menu">
            <li id="menu-item-938" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="tel:888-501-2598">Customer Service 888-501-2598</a></li>
            <li><a href="<?php bloginfo('siteurl')?>" class="btn-1 home"><span class="i"><span class="ico-home">Home</span></span></a></li>
        </ul>


        <div style="clear:both;"></div>

        <?php if ( is_user_logged_in() ) { ?>

            <!-- text that logged in users will see -->

        <?php } else {   ?>


        <?php } ?>


        <?php responsive_in_header(); // header hook ?>
    </div>

    <div id="header">
        <?php if( get_header_image() != '' ) : ?>

            <div id="logo" class="grid col-540">
                <a href="<?php echo home_url( '/' ); ?>"><img src="http://files.csinvesting.com/images/sites/pbl/pbrg-cropped-logo.png" alt="<?php bloginfo( 'name' ); ?>"/></a><a href="<?php echo home_url( '/' ); ?>"></a>
                
                              <div style="float:right; margin-right:100px; margin-top: 10px; border:0px solid #333; display:none;"><form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div><input type="text" size="18" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
<input type="submit" id="searchsubmit" value="Search" class="btn" />
</div>
</form></div>
            </div><!-- end of #logo -->

        <?php endif; // header image was removed ?>

        <?php if( !get_header_image() ) : ?>

            <!-- start of #logo -->
            <div id="logo">
                <span class="site-name"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
                <span class="site-description"><?php bloginfo( 'description' ); ?></span>
            </div>
            <!-- end of #logo -->

        <?php endif; // header image was removed (again) ?>

        <?php get_sidebar( 'top' ); ?>

        <?php responsive_header_bottom(); // after header content hook ?>

    </div><!-- end of #header -->
<?php responsive_header_end(); // after header container hook ?>

<?php $items = wp_get_nav_menu_items('Main Menu'); //print_r($items);die;
?>
    <div class="main-nav">
        <!--        <div id="responsive_current_menu_item"></div>-->
        <ul id="menu-main-menu" class="menu">
            <?php
            foreach($items as $item){
                if(is_user_logged_in() && $item->title == 'My Subscriptions')
                {
                    ?>
                    <li id="menu-item-<?=$item->ID?>" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-<?=$item->ID?>">
                        <a href="<?php echo wp_logout_url(get_site_url()); ?>">Log out</a>
                    </li>
                <?php
                }
                else
                {
                    if($item->title == 'My Subscriptions')
                    {
                        ?>
                        <li id="menu-item-<?=$item->ID?>" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-<?=$item->ID?>">
                            <a href="<?=$item->url;?>"><div class="key"><em><?=$item->title;?></em></div></a>
                        </li>
                    <?php
                    }
                    else
                    {
                        ?>
                        <li id="menu-item-<?=$item->ID?>" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-<?=$item->ID?>">
                            <a href="<?=$item->url;?>"><?=$item->title;?></a>
                        </li>
                    <?php
                    }

                }
            }

            /*wp_nav_menu( array(
                                      'container'       => 'div',
                                      'container_class' => 'main-nav',
                                      'fallback_cb'     => 'responsive_fallback_menu',
                                      'theme_location'  => 'header-menu'
                                  )
               );*/
            ?></ul><a id="responsive_menu_button"></a></div>

<?php if( has_nav_menu( 'sub-header-menu', 'responsive' ) ) { ?>
    <?php wp_nav_menu( array(
            'container'      => '',
            'menu_class'     => 'sub-header-menu',
            'theme_location' => 'sub-header-menu'
        )
    );
    ?>
<?php } ?>



<?php responsive_wrapper(); // before wrapper container hook ?>

<?php
if ( is_home() ) { ?>

    <div class="flexslider hide-650">
        <ul class="slides">
            <li>
                <img src="http://dev.palmbeachletter.com/wp-content/uploads/2013/11/1.jpg" />
            </li>
            <li>
                <img src="http://dev.palmbeachletter.com/wp-content/uploads/2013/11/2.jpg" />
            </li>
            <li>
                <img src="http://dev.palmbeachletter.com/wp-content/uploads/2013/11/3.jpg" />
            </li>
            <li>
                <img src="http://dev.palmbeachletter.com/wp-content/uploads/2013/11/4.jpg" />
            </li>
            <li>
                <img src="http://dev.palmbeachletter.com/wp-content/uploads/2013/11/5.jpg" />
            </li>
            <li>
                <img src="http://dev.palmbeachletter.com/wp-content/uploads/2013/11/6.jpg" />
            </li>
            <li>
                <img src="http://dev.palmbeachletter.com/wp-content/uploads/2013/11/7.jpg" />
            </li>
            <li>
                <img src="http://dev.palmbeachletter.com/wp-content/uploads/2013/11/9.jpg" />
            </li>
            <li>
                <img src="http://dev.palmbeachletter.com/wp-content/uploads/2013/11/11.jpg" />
            </li>

        </ul>
    </div>


<?php } else {
    // This is not a homepage
}
?>
<?php global $wp_query;
        if(isset($wp_query->query_vars['pagename']) && $wp_query->query_vars['pagename'] == 'portfolio') : ?>
            <div id="wrapper" class="wide clearfix">
        <?php else :?>
            <div id="wrapper" class="clearfix">
        <?php endif;?>
<?php responsive_wrapper_top(); // before wrapper content hook ?>
<?php responsive_in_wrapper(); // wrapper hook ?>