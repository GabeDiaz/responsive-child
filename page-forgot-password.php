<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Full Content Template
 *
Template Name:  Full Width Page (no sidebar)
 *
 * @file           full-width-page.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2011 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/full-width-page.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

get_header(forgotpassword); ?>

<style type="text/css">
h2 {
border-bottom: 1px solid #ccc;
color: #444;
font: italic 18px Georgia, "Times New Roman", Times, serif;
margin-bottom: 14px;
padding: 0 0 1px 8px;}
#wrapper{background-color:#f9f3dd;}
#content {
margin-top: 20px;
margin-bottom: 20px;
background-color: #f9f3dd;
margin:auto;
}
#mw_login {
padding: 0;
margin: 0;
background-color: #F9F3DD;
max-width: 450px;
margin: auto;
}
</style>

<div class="sublogin"><h2>Subscriber Login</h2></div>
<div id="content" class="grid col-940">

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="post-entry">
<?php echo do_shortcode('[agora_middleware_forgot_password]'); ?>
                </div>
                <!-- end of .post-entry -->

            </div><!-- end of #post-<?php the_ID(); ?> -->

</div><!-- end of #content -->



<?php get_footer(); ?>
