<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Error 404 Template
 *
 *
 * @file           404.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/404.php
 * @link           http://codex.wordpress.org/Creating_an_Error_404_Page
 * @since          available since Release 1.0
 */
?>
<?php
global $post;

$link = is_content_drip_post($name);
if($link){
    wp_redirect($link);
}


?>
<?php get_header('pbrg-featured'); ?>



<div id="content" class="grid col-940">


    <div class="crow">

        <div class="container2">
            <h2>There seems to be an issue. </h2>
            
    <div style="display:none;">        
<h2>Are you trying to access any of these recent essays? </h2>
<ul>
<?php
	$args = array( 
	'numberposts' => '2',
	'p'                      => '15340, 15333',
 );
	$recent_posts = wp_get_recent_posts( $args );
	foreach( $recent_posts as $recent ){
		echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
	}
?>
</ul>
</div>
                    <hr>

            
            <div class="container-bg">
                <div class="col">
                    <div class="title">Not yet a subscriber?</div>
                    <a target="_blank" href="http://pro1.palmbeachgroup.com/362447/" class="btn-big">Subscribe now to <em>The&nbsp;Palm&nbsp;Beach&nbsp;Letter</em></a>
                    
                    
                    <p>Your subscription to The Palm Beach Letter includes:</p>
                    <ul>
                        <li>12 monthly issues full of premium investment information you won't find anywhere else</li>
                        <li>Weekly updates from our publisher, Tom Dyson</li>
                        <li>Access to exclusive premium research reports, interviews, and our real-time portfolio tracker</li>
                    </ul>
                </div>



                <div class="col fright">
                    <div class="title">Already a subscriber?</div>
<div id="mw_login" style="display:none;" >
	<h2><?php echo (isset($title)) ? $title : "Login" ; ?></h2>
	<div class="<?php echo (isset($message_class)) ? $message_class : ''; ?>">
		<?php if(isset($message)) echo $message; ?>
	</div>
	<?php wp_login_form($form_parameters); ?>
	<p>
		<a href="<?php site_url() ;?>login/forgot-password/">
			<?php _e('Forgot Your Password?'); ?>
		</a>
	</p>
</div>
<p class="tcenter">Thank you for being a <em>Palm Beach Letter</em> subscriber!</p>

<p>We are sorry that the link you were trying to access is not working. Please click <a href="http://palmbeachgroup.com/">here</a> to return the main page.</p>
                </div>


            </div>
        </div>

    </div>
    </div><!-- end of #content-full -->

<?php get_footer(); ?>
