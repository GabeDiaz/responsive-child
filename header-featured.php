<?php

if(is_user_logged_in() && is_home())
{
    wp_redirect(site_url().'/my-subscriptions/');
}

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

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

<!-- AdBlade Global Header Retargeting Pixel -->
<img src="http://pixel.adblade.com/imps.php?sgms=15743" border="0" style="display:none;"/>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


        

 <?php if (in_category('featured-content')) { ?>
    <script src="//load.sumome.com/" data-sumo-site-id="1af726db372687971dbfa2da113eb7e664d329330968fda8966da125736c7743" async></script>
    <script type="text/javascript">
  window._taboola = window._taboola || [];
  _taboola.push({article:'auto'});
  !function (e, f, u) {
    e.async = 1;
    e.src = u;
    f.parentNode.insertBefore(e, f);
  }(document.createElement('script'),
  document.getElementsByTagName('script')[0],
  'http://cdn.taboola.com/libtrc/palmbeachletter/loader.js');
</script>
<?php } else {
} ?>


 <?php if (in_category('extra-insight')) { ?>
    <script src="//load.sumome.com/" data-sumo-site-id="1af726db372687971dbfa2da113eb7e664d329330968fda8966da125736c7743" async></script>

   <script type="text/javascript">
  window._taboola = window._taboola || [];
  _taboola.push({article:'auto'});
  !function (e, f, u) {
    e.async = 1;
    e.src = u;
    f.parentNode.insertBefore(e, f);
  }(document.createElement('script'),
  document.getElementsByTagName('script')[0],
  'http://cdn.taboola.com/libtrc/palmbeachletter/loader.js');
</script>
 <!-- Go to www.addthis.com/dashboard to customize your tools -->
<?php } else {
} ?>


    	<?php wp_head(); ?>
        
	</head>

<?php
if ( is_user_logged_in() ) { ?>
<body <?php body_class('site-member'); ?>>
<?php } else { ?>
<body <?php body_class(); ?>>
<?php }
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="all">

<?php responsive_container(); // before container hook ?>

<div id="container" class="hfeed">


<div class="header-top">
<?php responsive_header(); // before header hook ?>
<?php responsive_header_top(); // before header content hook ?>

		<ul id="menu-customer-service" class="top-menu">
<li id="menu-item-938" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="tel:888-501-2598">Customer Service 888-501-2598</a></li>
<li><a href="<?php bloginfo('siteurl')?>" class="btn-1 home"><span class="i"><span class="ico-home">Home</span></span></a></li>
        </ul>


<div style="clear:both;"></div>


		<?php responsive_in_header(); // header hook ?>
</div>

	<div id="header">
		<?php if( get_header_image() != '' ) : ?>

			<div id="logo" class="grid col-540">
				<a href="<?php echo home_url( '/' ); ?>"><img src="http://media.palmbeachgroup.com/images/pbrg/pbrg-cropped-logo-01.png" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>"/></a>
<div class="search-container"><form method="get" action="<?php bloginfo('home'); ?>/">
<input type="hidden" name="cat" id="cat" value="20766" />
<div><input type="text" size="16" name="s" value="Search"  />
<input type="submit" id="searchsubmit" value="Search" class="btn" />
</div>
</form></div>
		</div><!-- end of #logo -->

		<?php endif; // header image was removed ?>

		<?php if( !get_header_image() ) : ?>

<!-- start of #logo -->
		<div id="logo">
		<span class="site-name"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>




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
            <a href="<?php echo wp_logout_url('http://palmbeachgroup.com'); ?>" title="Logout">Log out</a>
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

<div class="flexslider hide-650" style="display:none;">
  <ul class="slides">
    <li>
      <img src="http://files.csinvesting.com/images/sites/pbl/homeslider01.jpg" />
    </li>
    <li>
      <img src="http://files.csinvesting.com/images/sites/pbl/homeslider02.jpg" />
    </li>
	<li>


      <img src="http://files.csinvesting.com/images/sites/pbl/homeslider03.jpg" />
    </li>
	<li>
      <img src="http://files.csinvesting.com/images/sites/pbl/homeslider04.jpg" />
    </li>
	<li>
      <img src="http://files.csinvesting.com/images/sites/pbl/homeslider05.jpg" />
    </li>
	<li>
      <img src="http://files.csinvesting.com/images/sites/pbl/homeslider06.jpg" />
    </li>
	<li>
      <img src="http://files.csinvesting.com/images/sites/pbl/homeslider07.jpg" />
    </li>

	<li>
      <img src="http://files.csinvesting.com/images/sites/pbl/homeslider09.jpg" />
    </li>
	<li>
      <img src="http://files.csinvesting.com/images/sites/pbl/homeslider11.jpg" />
    </li>

  </ul>
</div>


<?php } else {
    // This is not a homepage
}
?>
    <?php   if ( !is_home() ) { ?>

	<div id="wrapper" class="clearfix">
<?php responsive_wrapper_top(); // before wrapper content hook ?>
<?php responsive_in_wrapper(); // wrapper hook ?>
    <?php } ?>