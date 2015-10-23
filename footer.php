<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.2
 * @filesource     wp-content/themes/responsive/footer.php
 * @link           http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 * @since          available since Release 1.0
 */

/*
 * Globalize Theme options
 */
global $responsive_options;
$responsive_options = responsive_get_options();
?>
<?php responsive_wrapper_bottom(); // after wrapper content hook ?>
</div><!-- end of #wrapper -->
<?php responsive_wrapper_end(); // after wrapper hook ?>
		<!-- end of #container -->
<?php responsive_container_end(); // after container hook ?>


</div>
<div id="footer" class="clearfix">
	<?php responsive_footer_top(); ?>

	<div id="footer-wrapper">

		<?php get_sidebar( 'footer' ); ?>

			<!-- end of col-540 -->

			<div class="grid col-380 fit">
				
			</div>
			<!-- end of col-380 fit -->

		</div>
		<!-- end of col-940 -->
		<?php get_sidebar( 'colophon' ); ?>
	</div>
	<!-- end #footer-wrapper -->

<div class="grid fit">
<?php responsive_footer_bottom(); ?>
</div><!-- end #footer -->

</div>


<footer style="width: 100%;clear: both;"><?php responsive_footer_after(); ?>
<div style="margin:auto; max-width:1020px; border-top: 1px solid #d8dee3;">



<div class="grid col-940 hide-desktop">
<div class="grid col-940" style="margin-bottom:0; font-size:11px;">
<div style="margin:auto; width:85%;">
    <ul class="foot-menu">
                <li><a href="/">Home</a></li>
                <li><a href="/marks-story">Mark's Story</a></li>
                <li><a href="/contributors">Contributors</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/code-of-ethics">Business Principles</a></li>
                <li><a href="/safety-ratings">Safety Ratings</a></li>
                <li><a href="/privacy-policy">Privacy</a></li>
                <li><a href="/contact-us">Contact Us</a></li>
                <li><a href="/glossary">Glossary</a></li>
                <li class="last"><a href="/faqs">FAQs</a></li>
            </ul>
     </div>            
</div>
<p class="copy">
        <?php edit_post_link(); ?>
		<?php echo '<!-- ' . basename( get_page_template() ) . ' -->'; ?>
<?php $terms = get_the_terms( $post->ID , 'pubcode' );
	if($terms) {
		foreach( $terms as $term ) {
		echo '<!-- Pubcode: ' .$term->name .' -->' ;
	}
}
?>
&copy; 2015 Palm Beach Research Group. All Rights Reserved. Protected by copyright laws of the United States and international treaties. This website may only be used pursuant to the subscription agreement and any reproduction, copying, or redistribution (electronic or otherwise, including on the world wide web), in whole or in part, is strictly prohibited without the express written permission of Palm Beach Research Group, 55 NE 5th Avenue Suite 100, Delray Beach, FL 33483.</p>

<div id="sitelock_shield_logo" class="fixed_btm" style="float:right;"><a href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=PalmBeachGroup.com','SiteLock','width=600,height=600,left=160,top=170');" ><img alt="website security" title="SiteLock" src="//shield.sitelock.com/shield/PalmBeachGroup.com"/></a>
<div><a href="https://plus.google.com/115225167012138313262" rel="publisher" target="_blank">Google+</a></div>
</div></div>







<style type="text/css">
footer {
	float: left;
	width: 100%;
	min-width: 320px;
	position: relative;
	color: #c3cbd3;
	padding: 50px 0 22px 0;
	text-align: left;
}
footer.spacer {
	margin: 110px 0 0 0
}
footer a.home-nav-link {
	background: url('../images/global/footer-logo.png') top left no-repeat;
	background-size: 160px;
	display: block;
	height: 16px;
	float: left;
	margin: 0;
	text-indent: -9999px;
	width: 160px
}
footer .central.marque {
	text-align: center;
	padding: 41px 0 48px 0
}
footer .central.marque a {
	-webkit-transition: background-position .2s linear;
	-moz-transition: background-position .2s linear;
	-o-transition: background-position .2s linear;
	transition: background-position .2s linear;
	background: url('../images/global/footer.png') top left no-repeat;
	background-size: 36px 261px;
	display: -moz-inline-stack;
	display: inline-block;
	zoom: 1;
	width: 36px;
	height: 24px;
	overflow: hidden;
	font-size: 0;
	line-height: 0
}
footer dl {
	float: left;
	margin: 0 2.5% 4% 0;
}
footer dl dd {
	font-size: 12px;
	padding: 0 0 2px 0;
	margin-left: 0px;
	font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
	line-height: 1.5em;
}
footer dl dd.mobile {
	display: none
}
footer dl dt, footer #subForm h6 {
	font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
	font-weight: 600;
	font-style: normal;
	font-size: 14px;
	line-height: 1.4em;
	text-transform: uppercase;
	letter-spacing: .05em;
	width: 100%;
	margin: 0 0 20px 0;
	color: #2f353e
}
footer dl dd a, footer section p a {
	color: #767675;!important
}
footer dl dd a:hover, footer section p a:hover {
	color: #2f353e!important
}
footer section #social {
	float: right;
	color: #8e959c;
	margin-top: -8px
}
footer #subForm {
  font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
  float: left;
  width: 100%;
  position: relative;
  margin: 0;
}
footer #subForm label, footer #subForm p {
	font-size: 12px;
	position: relative;
	color: #767675;
}
footer #subForm label a, footer #subForm p a {
	color: #19a9e5
}
footer #subForm label a:hover, footer #subForm p a:hover {
	color: #2f353e
}
footer #subForm label a:active, footer #subForm p a:active {
	color: #8e959c
}
footer #subForm label input, footer #subForm p input {
	float: left;
	width: 97%;
	box-sizing: initial;
	margin: 12px 0 0 -1px;
	border-color: #d8dee3;
	-khtml-border-radius: 3px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
	font-size: 1em;
	padding: 0 0 0 3%;
	color: #2f353e;
	height: 41px;
}
footer #subForm label input::-webkit-input-placeholder, footer #subForm p input::-webkit-input-placeholder {
 color:#d8dee3
}
footer #subForm label input:-moz-placeholder, footer #subForm p input:-moz-placeholder {
 color:#adb3b9
}
footer #subForm label input:focus, footer #subForm p input:focus {
	border-color: #8e959c
}
footer #subForm #subResponse {
	font-size: 1.2em
}
footer #subForm #subResponse.error {
	float: left;
	background: #fff3c5;
	width: auto;
	padding: 8px 10px;
	-khtml-border-radius: 3px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	border: 1px solid #ffde5f;
	color: #937f38;
	margin: 3px 0 0 0
}
footer #subForm #subResponse.success {
	float: left;
	background: #f6fde4;
	width: auto;
	padding: 8px 10px;
	-khtml-border-radius: 3px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	border: 1px solid #9cd210;
	color: #679b1f
}
footer #subForm #subscribe {
  color: #fff;
  font-family: "Lato", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
  font-size-adjust: .488;
  font-weight: 400;
  font-style: normal;
  font-size: 1.2em;
  line-height: 0.4em;
  text-transform: uppercase;
  letter-spacing: .05em;
  float: left;
  margin: 17px 4px 0 -1px;
  -khtml-border-radius: 3px;
  -moz-border-radius: 3px;

  -webkit-border-radius: 3px;
  border-radius: 3px;
  width: 105px;
  height: 34px;
  overflow: hidden;
  position: absolute;
  right: 0;
  border: 0;
  background: #FBA21D;
  background-size: 36px 261px;
}
footer #subForm #subscribe.active {
	background-position: 0 -168px
}
footer #subForm #subscribe:hover {
	background-color: #adb3b9
}
footer #subForm #subscribe:active {
	background-color: #adb3b9;
	-moz-box-shadow: inset 0 1px 10px #8e959c;
	-webkit-box-shadow: inset 0 1px 10px #8e959c;
	box-shadow: inset 0 1px 10px #8e959c
}
footer #subForm a.newsletter {
	clear: both;
	color: #adb3b9;
	float: left;
	margin-top: 10px
}
footer section.bottom {
	background: 0;
	border-top: 1px solid #d8dee3;
	float: left;
	padding: 30px 0 0 0;
	width: 1000px
}
footer section.bottom p {
	float: left;
	margin: 0 0 0 25px;
	width: 45%;
	font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
	font-size: 1.2em;
	line-height: 1.5em
}
footer section.bottom p a {
	display: -moz-inline-stack;
	display: inline-block;
	zoom: 1;
	padding: 5px 0
}
footer section.bottom p a span {
	color: #c3cbd3
}
footer section.bottom p a.esp {
	padding-left: 19px;
	background: url('../images/global/footer.png') left center no-repeat;
	background-position: 0 -105px;
	background-size: 36px 261px
}
footer section.bottom #social a, footer section.bottom a.followus {
	display: -moz-inline-stack;
	display: inline-block;
	zoom: 1;
	color: #adb3b9;
	font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
	font-size: 1.1em;
	line-height: 1.5em;
	padding: 7px 0 7px 28px;
	margin-left: 13px;
	-khtml-border-radius: 15px;
	-moz-border-radius: 15px;
	-webkit-border-radius: 15px;
	border-radius: 15px;
	background-repeat: no-repeat;
	background-position: left center
}
footer section.bottom #social a:hover, footer section.bottom a.followus:hover, footer section.bottom .sidebar a.buy:hover {
	color: #2f353e
}
footer section.bottom #social a:active, footer section.bottom a.followus:active, footer section.bottom .sidebar a.buy:active {
	color: #8e959c
}
footer section.bottom #social a.twitter, footer section.bottom a.followus {
	background-image: url('../images/global/footer-twitter.png');
	background-size: 23px 50px;
	background-position: 0 4px
}
footer section.bottom #social a.twitter:hover, footer section.bottom a.followus:hover {
	background-position: 0 -26px
}
footer section.bottom #social a.facebook {
	background-image: url('../images/global/footer-facebook.png');
	background-size: 19px 40px;
	background-position: 0 8px
}
footer section.bottom #social a.facebook:hover {
	background-position: 0 -16px
}
footer #diagonalLeft {
	position: absolute;
	background: url('../images/global/foot_left.png') bottom right no-repeat;
	top: 0;
	left: 0;
	width: 50%;
	height: 100%;
	z-index: 1;
	opacity: .7
}
footer #diagonalRight {
	position: absolute;
	background: url('../images/global/foot_right.png') bottom left no-repeat;
	top: 0;
	right: 0;
	width: 70%;
	height: 100%;
	z-index: 0
}
footer#transparent {
	background: 0
}
footer#transparent #diagonalLeft, footer#transparent #diagonalRight {
	display: none
}
footer#slim {
	background: 0;
	width: 950px;
	min-width: 100px;
	margin: 100px auto;
	float: none;
	clear: both;
	border-top: 1px solid #e0e5e9
}
footer#slim ul {
	float: left;
	width: 800px;
	margin: 40px 75px 60px 75px
}
footer#slim ul li {
	float: left;
	margin: 0 20px 0 0
}
footer#slim ul li a {
	font-size: 1.2em;
	color: #8e959c
}
footer#slim ul li a:hover {
	color: #2f353e
}
/* =Responsive 12 Column Grid
    http://themeid.com/responsive-grid/
-------------------------------------------------------------- */

.col-200 {
	width: 15.893617%;
}


.fit {
	margin-left: 0 !important;
	margin-right: 0 !important;
}
</style>
<div class="grid col-940 hide-mobile">
      <div class="clearfix" style="float:none;margin: auto;padding-left: 0px;margin-left: 0px;">
        <div class="grid col-940" style="
    padding-left: 0;
    margin-top: 30px;
    margin-bottom: 0;
">
          <div class="grid col-200">
            <dl>
              <dt>Products</dt>
              <dd><a href="/publications/">The Palm Beach Letter</a></dd>
              <dd><a href="/publications/">Mega Trends Investing</a></dd>
              <dd><a href="/publications/">Creating Wealth</a></dd>
            </dl>
          </div>
          <div class="grid col-200">
            <dl>
              <dt>Resources</dt>
              <dd><a href="/investing-calculators/"> Calculators</a></dd>
              <dd><a href="/glossary/">Glossary</a></dd>
              <dd><a href="/faqs/">FAQ</a></dd>
            </dl>
          </div>
          <div class="grid col-200">
            <dl>
              <dt>Company</dt>
              <dd><a href="/about/">About Us</a></dd>
              <dd><a href="/contributors/">Contributors</a></dd>
              <dd><a href="http://resources.palmbeachgroup.com/careers.html" target="_blank">Careers</a></dd>
              <dd><a href="/contact-us/">Contact Us</a></dd>
            </dl>
          </div>
          <div class="grid col-200">
            <dl>
              <dt>Policies</dt>
              <dd><a href="/code-of-ethics/">Business Principles</a></dd>
              <dd><a href="/safety-ratings/">Safety Ratings</a></dd>
              <dd><a href="/privacy-policy/">Privacy</a></dd>
            </dl>
          </div>

<div class="grid-right col-300" style="margin:0;">
<script src="http://research.palmbeachgroup.com/Scripts/CheckEmail.js" type="text/javascript"></script>
<form id="subForm" method="post" action="http://research.palmbeachgroup.com/Content/SaveFreeSignups" target="_blank">
 <h6>Join our Daily Newsletter</h6>
 <label for="pbd signup">Reading The Palm Beach Daily will help you grow your bottom line and live a happier life in just three minutes a day. <br>

  <input name="MultivariateId" type="hidden" value="390553" style="display: none;"/>
  <input name="NotSaveSignup" type="hidden" value="False" style="display: none;" />
<div align="center">
  <input name="email" maxlength="50" type="text" id="email" value="Enter Email Here" onfocus="javascript:if (this.value == 'Enter Email Here') this.value = '';" onblur="javascript:if (this.value == '') this.value = 'Enter Email Here';"/>
<input name="submit" type="submit" id="subscribe" value="Subscribe"/>
<p style="font-family:arial;"><a href="/featured-content" class="newsletter" title="Read our previous newsletters">See past issues</a></p>
</div>
</form>

      </div>



        </div>
        <!-- end of col-940 --> 
      </div>
      
      
      <p class="copy">
        <?php edit_post_link(); ?>
		<?php echo '<!-- ' . basename( get_page_template() ) . ' -->'; ?>
<?php $terms = get_the_terms( $post->ID , 'pubcode' );
	if($terms) {
		foreach( $terms as $term ) {
		echo '<!-- Pubcode: ' .$term->name .' -->' ;
	}
}
?>
&copy; 2015 Palm Beach Research Group. All Rights Reserved. Protected by copyright laws of the United States and international treaties. This website may only be used pursuant to the subscription agreement and any reproduction, copying, or redistribution (electronic or otherwise, including on the world wide web), in whole or in part, is strictly prohibited without the express written permission of Palm Beach Research Group, 55 NE 5th Avenue Suite 100, Delray Beach, FL 33483.</p>
      
      
      
      <div style="border-top:1px solid #eee;clear: both;">


<div class="" style="float: right;    border-left: 1px solid #eee;    vertical-align: middle;    margin-top: 14px;    margin-left: 10px;    padding-left: 10px;    color: #333;"><a class="list-group-item" href="http://facebook.com/thepalmbeachgroup" target="_blank" title="Like Palm Beach Research Group on Facebook"><i class="fa fa-facebook fa-fw fa-lg"></i></a>
  <a class="list-group-item" href="http://twitter.com/palmbeachgroup" target="_blank" title="Follow Palm Beach Research Group on Twitter"><i class="fa fa-twitter fa-fw fa-lg"></i></a>
  <a class="list-group-item" href="https://plus.google.com/115225167012138313262" rel="publisher" target="_blank" title="Follow Palm Beach Research Group on Google+"><i class="fa fa-google-plus fa-fw fa-lg"></i></a>
  </div>


</div>
      

      

      
      <div class="grid col-940" style="margin-bottom:0; font-size:11px;display: none;">
        <div style="margin:auto; width:85%;">
          <ul class="foot-menu">
            <li><a href="/">Home</a></li>
            <li><a href="/marks-story">Mark's Story</a></li>
            <li><a href="/contributors">Contributors</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/code-of-ethics">Business Principles</a></li>
            <li><a href="/safety-ratings">Safety Ratings</a></li>
            <li><a href="/privacy-policy">Privacy</a></li>
            <li><a href="/contact-us">Contact Us</a></li>
            <li><a href="/glossary">Glossary</a></li>
            <li class="last"><a href="/faqs">FAQs</a></li>
          </ul>
        </div>
      </div>
    </div>



       <div id="sitelock_shield_logo" class="fixed_btm" style="float:right;"><a href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=PalmBeachGroup.com','SiteLock','width=600,height=600,left=160,top=170');" ><img alt="website security" title="SiteLock" src="//shield.sitelock.com/shield/PalmBeachGroup.com"/></a>
</div>

</div>

</footer>


<?php wp_footer(); ?>
<?php //c2c_reveal_template(); ?>

<?php include 'analytics.php'; ?>

<?php if (in_category('featured-content')) { ?>
<script type="text/javascript">
  window._taboola = window._taboola || [];
  _taboola.push({flush: true});
</script>
<div style="clear:both;">

<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 997587605;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;"><img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/997587605/?value=0&amp;guid=ON&amp;script=0"/></div>
</noscript>
</div>
<?php } else {
} ?>

<script type="text/javascript">
$(document).ready(function($){
$('#list').css('opacity','.25');
    });

 $("#list").click(function() {
$('.post-meta').css('display','none');
$('#grid').css('opacity','.25');
$('#list').css('opacity','1');
    });
 $("#grid").click(function() {
$('.post-meta').css('display','block');
$('#list').css('opacity','.25');
$('#grid').css('opacity','1');
    });
</script>




<style>
	body.spp .smart-track-player.stp-color-333 .spp-track{
		background: #333;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-loaded{
		background: #FFF;
		opacity: .17;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-loaded-container{
		background: #333;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-button-download{
		background: #4c0400;
		color: #FFF;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-button-download:hover{
		background: #560500;
		color: #FFF;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-play{
		background-position: -66px 0;
		opacity: .71;
	}

	body.spp .smart-track-player.stp-color-333.spp-playing .spp-track .spp-controls .spp-play{
		background-position: -14px 0 !important;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-play:hover{
		opacity: .9;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-dload{
		background-position: -94px -52px;
		opacity: .71;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-dload:hover{
		opacity: .9;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-dloada{
		background-position: -94px -52px;
		opacity: .71;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-dloada:hover{
		opacity: .9;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-speed{
		background-position: -12px -52px;
		opacity: .71;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-speed:hover{
		opacity: .9;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-share{
		background-position: -53px -52px;
		opacity: .71;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-share:hover{
		opacity: .9;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-track-title{
		color: #FFF;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-artist{
		color: #FFF;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-progress .spp-position:after{
		opacity: .5;
		background: #FFF;
	}

	body.spp .smart-track-player.stp-color-333 .spp-track .spp-progress .spp-current-time{
		background: #FFF;
		opacity: .17;
	}

	body.spp .smart-track-player.stp-color-333.spp-has-download .spp-duration{
		color: #FFF;
		opacity: 0.8;
	}
</style>


<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.menu-aim.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js"></script>

<script type="text/javascript" src="http://palmbeachgroup.com/wp-includes/js/underscore.min.js?ver=1.6.0"></script>
<script type="text/javascript" src="http://palmbeachgroup.com/wp-includes/js/backbone.min.js?ver=1.1.2"></script>
<script type="text/javascript" src="http://s1.wp.com/wp-content/js/mustache.js?ver=3.5.3-201530"></script>

<script type="text/javascript" src="http://palmbeachgroup.com/wp-content/plugins/smart-podcast-player/assets/js/vendor/require.min.js?ver=1.0.2"></script>
<script type="text/javascript">
/* <![CDATA[ */
var AP_Player = {"homeUrl":"http:\/\/palmbeachgroup.com","baseUrl":"http:\/\/palmbeachgroup.com\/wp-content\/plugins\/smart-podcast-player\/assets\/js\/","ajaxurl":"http:\/\/palmbeachgroup.com\/wp-admin\/admin-ajax.php","soundcloudConsumerKey":"","version":"1.0.2","licensed":"1"};
/* ]]> */
</script>
<script type="text/javascript" src="http://palmbeachgroup.com/wp-content/plugins/smart-podcast-player/assets/js/main.min.js?ver=1.0.2"></script>




	<script type="text/javascript">
   var _mfq = _mfq || [];
   (function() {
       var mf = document.createElement("script"); mf.type = "text/javascript"; mf.async = true;
       mf.src = "//cdn.mouseflow.com/projects/2248adb3-6b5e-4233-a604-daeb7a3895f9.js";
       document.getElementsByTagName("head")[0].appendChild(mf);
   })();
</script>


<div id="om-dyonuudc0fnm1k5t-holder"></div><script>var dyonuudc0fnm1k5t,dyonuudc0fnm1k5t_poll=function(){var r=0;return function(n,l){clearInterval(r),r=setInterval(n,l)}}();!function(e,t,n){if(e.getElementById(n)){dyonuudc0fnm1k5t_poll(function(){if(window['om_loaded']){if(!dyonuudc0fnm1k5t){dyonuudc0fnm1k5t=new OptinMonsterApp();return dyonuudc0fnm1k5t.init({u:"10967.217212",staging:0,dev:0});}}},25);return;}var d=false,o=e.createElement(t);o.id=n,o.src="//a.optinmonster.com/app/js/api.min.js",o.onload=o.onreadystatechange=function(){if(!d){if(!this.readyState||this.readyState==="loaded"||this.readyState==="complete"){try{d=om_loaded=true;dyonuudc0fnm1k5t=new OptinMonsterApp();dyonuudc0fnm1k5t.init({u:"10967.217212",staging:0,dev:0});o.onload=o.onreadystatechange=null;}catch(t){}}}};(document.getElementsByTagName("head")[0]||document.documentElement).appendChild(o)}(document,"script","omapi-script");</script>

</body>
</html>