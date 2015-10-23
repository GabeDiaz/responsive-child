<?php if ( is_single() ) { ?>

<?php if( has_term( 'PBL', 'pubcode' ) ) {
$pbrgpubcopy = '<p><span style="color:red;">The resource you have requested is only available to current members.</span></p><p>Start your risk-free trial now to acccess this members-only information immediately.</p><p style="text-align:center;margin-top:0;">(100% money-back guarantee)</p>';
$pbrgpublink = 'http://pro1.palmbeachgroup.com/362447/?utm_source=pbrgsite&utm_medium=loginbox&utm_content=pbl&utm_campaign=WPBLR502';
} 
elseif( has_term( 'MTI', 'pubcode' ) ) {
$pbrgpubcopy = '<p><span style="color:red;">The resource you have requested is only available to current members.</span></p><p>Start your risk-free trial now to acccess this members-only information immediately.</p><p style="text-align:center;margin-top:0;">(100% money-back guarantee)</p>';
$pbrgpublink = 'http://pro1.palmbeachgroup.com/361817/?utm_source=pbrgsite&utm_medium=loginbox&utm_content=mti&utm_campaign=WMTIR501';
} 
elseif( has_term( 'CWE', 'pubcode' ) ) {
$pbrgpubcopy = '<p><span style="color:red;">The resource you have requested is only available to current members.</span></p><p>Start your risk-free trial now to acccess this members-only information immediately.</p><p style="text-align:center;margin-top:0;">(100% money-back guarantee)</p>';
$pbrgpublink = 'http://pro1.palmbeachgroup.com/362446/?utm_source=pbrgsite&utm_medium=loginbox&utm_content=cwe&utm_campaign=WCWER501';
} 
else {
$pbrgpubcopy = '<p><span style="color:red;">The resource you have requested is only available to current members.</span></p><p>To learn about all of our products please see below.</p>';
$pbrgpublink = 'http://palmbeachgroup.com/publications/';
} 
?>

<?php
if(isset($_REQUEST['redirect_to'])){
    $form_parameters['redirect'] = $_REQUEST['redirect_to'];
}
?>
<div class="grid col-940">

<div id="mw_login"  style="text-align:center;overflow:auto;padding:0;">

<div style="float: left;width: 42%;padding: 18px;margin: 7px 0;border-right: 1px solid #ccc;">
<h2><?php echo (isset($title)) ? $title : "Login" ; ?></h2>
<div class="<?php echo (isset($message_class)) ? $message_class : ''; ?>"><?php if(isset($message)) echo $message; ?></div>
	<?php wp_login_form($form_parameters); ?>
	<p>
		<a href="<?php site_url() ;?>/login/forgot-password/">
			<?php _e('Forgot Your Password?'); ?>
		</a>
	</p>
</div>


<div style="float: right;width: 44%;padding: 18px;margin-top: 7px 0;">
  <h2 align="center">Not a subscriber?</h2>
<p style="text-align:left;"><?php echo $pbrgpubcopy ?></p>
<?php echo "<a href='$pbrgpublink' target='_blank'>Learn More...</a>"; ?>
</div>

</div>

</div>

<?php }
else { ?>

<div class="grid col-940">
<div id="mw_login"  style="text-align:center;overflow:auto;padding:0;">
<div>
<h2><?php echo (isset($title)) ? $title : "Login" ; ?></h2>
<div class="<?php echo (isset($message_class)) ? $message_class : ''; ?>"><?php if(isset($message)) echo $message; ?></div>
	<?php wp_login_form($form_parameters); ?>
	<p>
		<a href="<?php site_url() ;?>/login/forgot-password/">
			<?php _e('Forgot Your Password?'); ?>
		</a>
	</p>
</div>
</div>
</div>

<?php }
?>