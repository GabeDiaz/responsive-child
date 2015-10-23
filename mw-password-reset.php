<div class="grid col-940">


<div id="mw_login" style="text-align:center;" >
	<div class="<?php echo (isset($message_class)) ? $message_class : ''; ?>">
		<?php echo (isset($message)) ? $message : __("Use this form to retrieve a lost password"); ?>
	</div>

<div class="forgot-email-wrapper">
	<form name="password_reset_form" id="password_reset_form" action="" method="post">		
		<p class="reset-email">
			<label for="user_email">
				<?php _e('Your Email Address'); ?>
			</label>
			<input type="text" name="user_email" id="user_email" class="input" value="" size="20">
		</p>
		
		<p class="reset-submit">
			<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="<?php _e('Send'); ?>">
		</p>
		<?php wp_nonce_field( $nonce_action, $nonce_field ); ?>
	</form></div>
</div>
</div>