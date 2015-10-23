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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/dropdown-style.css">

	<style type="text/css">
.hide {
	display: none;
}
</style>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/modernizr.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.cookie.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
if ($.cookie('om-217212') == "true") {
        $('.emailpopup').hide();
	    $('.emailpopup-banner').show();
    }
	 });
</script>


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


<style type="text/css">
#pbrg-wide-header {
    background-image:none !important;
    padding: 0;
    background-repeat: no-repeat;
    height: 100px;
    /* margin: 0 -100px 2px -50px; */
    position: relative;
    width: 100%;
    background-position: top center;
    background-color: rgba(255, 255, 255, 0.9);
    border-bottom: 1px solid #eee;
    z-index: 100;
    margin-top: 0;
	padding:3px 0;
}
#header-wrapper{
	max-width: 1300px;
    margin: auto;
    margin-top: 0;
	padding: 0 6px;
    overflow: auto;}

#logo {
    float: left;
    margin: 19px 0 0 28px;
    display: inline;
    height: 77px;
}
a.list-group-item, a.list-group-item:visited {
    color: #999;
}
a.list-group-item:hover {
    color: #666;
}

ul.cd-dropdown-content ul li {
   list-style: none;
}

.search-toggle :hover {color: #666;}
</style>

<?php if ( is_page_template( 'customer-portal.php' ) ) { ?>
<script type="text/javascript">
            $(function(){
                $.receiveMessage(
                    function( event ){
                        $('#csportal').css({
                            height: event.data
                        });
                    });
			});
        </script>
<?php  } else {
	// Returns false.
}
?>

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
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=103835999720824";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php if ( is_home() ) { ?>
<div class="topbanner" style="background-color:#000; height:45px; z-index:200;">
  <div class="quote" style="display:block;">Limited-time: Get Tom Dyson’s brand-new book for FREE [<a href="http://pro1.palmbeachgroup.com/400338/" target="_blank">See The Details</a>]</div>
</div>
<?php } else { ?>
<?php }
?>

<header style="height: 100px; margin-top:0;padding-top:0;">
<div id="pbrg-wide-header">

<div id="header-wrapper" style="max-width: 1300px;margin: auto;margin-top: 0px; /* padding: 30px 0 0 0;*/ overflow: visible;">

<div class="header-top">
<?php responsive_header(); // before header hook ?>
<?php responsive_header_top(); // before header content hook ?>
<ul id="menu-customer-service" class="top-menu">
<li id="menu-item-938" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="tel:888-501-2598">Customer Service 888-501-2598</a></li>
<li style="display:none;"><a href="<?php bloginfo('siteurl')?>" class="btn-1 home"><span class="i"><span class="ico-home">Home</span></span></a></li>
</ul>


<div style="clear:both;"></div>
</div>


<div id="logo" class="grid col-380" style="margin: 0;height: 100%; padding-bottom:8px;"><a href="http://palmbeachgroup.com/"><img src="http://media.palmbeachgroup.com/images/pbrg/pbrg-cropped-logo-01.png" width="320" alt="Palm Beach Research Group" title="Palm Beach Research Group"></a></div>



<div style="float: right;    border-left: 1px solid #eee;    vertical-align: middle;    margin-top: 14px;    margin-left: 10px;    padding-left: 10px;    color: #333;"><a class="list-group-item" href="http://facebook.com/thepalmbeachgroup" target="_blank" title="Like Palm Beach Research Group on Facebook"><i class="fa fa-facebook fa-fw fa-lg"></i></a>
  <a class="list-group-item" href="http://twitter.com/palmbeachgroup" target="_blank" title="Follow Palm Beach Research Group on Twitter"><i class="fa fa-twitter fa-fw fa-lg"></i></a></div>
  
  
<div class="search-toggle" style="float: right;    border-left: 0px solid #eee;    vertical-align: middle;    margin-top: 14px;    margin-left: 10px;    padding-left: 10px;    color: #999;"><i class="fa fa-search fa-fw fa-lg"></i></div>  

<script>
$(document).ready(function(){
 $(".search-toggle").click(function(){
        $(".search-container").toggle();
    });
});
</script>


<?php
if ( is_user_logged_in() ) { ?>
<div class="search-container" style="margin-top:0; margin-right:0;display:none; padding-left:10px;"><form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div><input type="text" size="9" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
<input type="submit" id="searchsubmit" value="Search" class="btn" />
</div>
</form></div>


<?php } else { ?>
<div class="search-container" style="margin-top:0; margin-right:0;display:none; padding-left:10px;"><form method="get" action="<?php bloginfo('home'); ?>/">
<input type="hidden" name="cat" id="cat" value="20766" />
<div><input type="text" size="9" name="s" value="Search"  />
<input type="submit" id="searchsubmit" value="Search" class="btn" />
</div>
</form></div>
<?php }
?>




<?php
if ( is_user_logged_in() ) { ?>
 <div class="cd-dropdown-wrapper" style="float:right;"> <a class="cd-dropdown-trigger" href="#0">My Account</a>
    <nav class="cd-dropdown">
          <h2>My Account</h2>
          <a href="#0" class="cd-close">Close</a>
          <ul class="cd-dropdown-content">
        <li class="hide">
              <form class="cd-search">
            <input type="search" placeholder="Search...">
          </form>
            </li>

        <li><a href="/my-subscriptions" class="">My Subscriptions</a></li>
        <li><a href="/customer-preference" class="">Email Settings</a></li>
        <li><a href="/mobile-text-reminders" class="">SMS Reminders</a></li>
        <li><a href="/contact" class="">Help</a></li>
        <li>
<a href="<?php echo wp_logout_url('/') ?>" title="Log Out">Log out</a>
        
        </li>
      </ul>
          <!-- .cd-dropdown-content --> 
        </nav>
    <!-- .cd-dropdown --> 
  </div>
      <!-- .cd-dropdown-wrapper --> 
<?php } else { ?>
 <div class="cd-dropdown-wrapper" style="float:right;"><a class="cd-dropdown-trigger-login" href="/login">
    <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
Login</a></div>
<?php }
?>

</div>

</div>
</header>

<div style="max-width: 1000px;margin: auto;padding-top: 10px;">
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


</div>



<div class="all" style="padding:0;">
<?php responsive_container(); // before container hook ?>
<div id="container" class="hfeed" style="margin: auto;  max-width: 100%;    padding: 0 0;    background-color: #fff;">
<?php responsive_in_header(); // header hook ?>


<?php responsive_header_end(); // after header container hook ?>
<?php responsive_wrapper(); // before wrapper container hook ?>



<?php global $wp_query;
if(isset($wp_query->query_vars['pagename']) && $wp_query->query_vars['pagename'] == 'portfolio') : ?>
<div id="wrapper" class="wide clearfix">
<div style="clear: both;text-align: center;margin: auto;margin-bottom: 10px;margin-top:20px"><input class="tcportfolio-close" action="action" type="button" value="Close Portfolio" onclick="history.go(-1);"></div>
<div style="margin-top: -8px;margin-right: -17px;clear: both;margin-bottom: 20px;text-align: right; display:none;"><input class="portfolio-close" action="action" type="button" value="Back" onclick="history.go(-1);" />
</div>
        <?php else :?>
<div id="wrapper" class="clearfix">
        <?php endif;?>

<?php responsive_wrapper_top(); // before wrapper content hook ?>
<?php responsive_in_wrapper(); // wrapper hook ?>
