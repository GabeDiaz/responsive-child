<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main Widget Template
 *
 *
 * @file           sidebar.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>
<?php responsive_widgets_before(); // above widgets container hook ?>
	<div id="widgets" class="grid col-300 fit">
    
    
    
<?php if (!isset($_COOKIE['om-217212'])){ ?>
	<div class="emailpopup bx-story"><a href="#" class="manual-optin-trigger" data-optin-slug="dyonuudc0fnm1k5t"><img src="http://cdn.palmbeachgroup.com/images/092215_WEB_WealthBuilders_final.png"></a></div>

<?php } ?><!--<div class="emailpopup-banner" style="display:none;"></div>-->

    
    
<?php
if ( is_user_logged_in() ) { ?>
<?php } else { ?>
<div class="bx-story"><a href="http://pro1.palmbeachgroup.com/420129/" target="_blank"><img src="http://cdn.palmbeachgroup.com/images/banners/300x250/banner_WPBLRA03.jpg"></a></div>
<?php ?>


<div style="display:none;">
<div id="lead_gen_container_outer" style="margin-bottom:10px;">
<div id="lead_gen_container_inner">
<div class="lead_gen">
<div class="lead_gen_heading"><strong>Join over 225,000 delighted PBD subscribers!</strong></div>
<div class="lead_gen_copy">
<p>Reading <em>The Palm Beach Daily</em> will help you grow your bottom line and live a happier life in just three minutes a day. <br>
<br>
You may be skeptical... but give us three days.  We'll prove it to you.</p>
</div>  
</div>  

<script src="http://palmbeachgroup.com/test/js/check-email.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function ($) {
        $('#LeadGen').submit(function (e) {
            e.preventDefault();
            $.getJSON(
            this.action + "?callback=?",
            $(this).serialize(),
            function (data) {
                if (data.Status === 400) {
                    alert("Error: " + data.Message);
                } else { // 200
                    alert("Success: " + data.Message);
                }
            });
        });
    });
</script>

<form id="LeadGen" method="post" action="http://research.palmbeachletter.com/Content/SaveFreeSignups">
  <input name="MultivariateId" type="hidden" value="339553" style="display: none;">
  <input name="NotSaveSignup" type="hidden" value="False" style="display: none;">
<div align="center">
<input id="email" maxlength="50" name="email" onblur="javascript:if (this.value == '') this.value = 'Enter your email address';" onfocus="javascript:if (this.value == 'Enter your email address') this.value = '';" type="text" value="Enter your email address" style="border-color:#b09f9b; border-style:solid; border-width:1px; padding: 5px 10px; font-size:16px; color:#b09f9b; width: 235px; margin-bottom:0px;" size="35">
<input name="submit" style="margin-top:5px;" type="image" src="http://media.palmbeachgroup.com.s3.amazonaws.com/images/forms/pbd-sub-button01.png">
</div>
</form>
</div></div>

</div>
<?php }
?>
    

    
		<?php responsive_widgets(); // above widgets hook ?>

		<?php if( !dynamic_sidebar( 'right-sidebar' ) ) : ?>
			<div class="widget-wrapper">

				<div class="widget-title"><h3><?php _e( 'In Archive', 'responsive' ); ?></h3></div>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>

			</div><!-- end of .widget-wrapper -->
		<?php endif; //end of right-sidebar ?>

		<?php responsive_widgets_end(); // after widgets hook ?>
	</div><!-- end of #widgets -->
<?php responsive_widgets_after(); // after widgets container hook ?>