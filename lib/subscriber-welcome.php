<div class="login-subs" style="min-height: 30px; height: 35px;">
  
  <?php
if ( is_user_logged_in() ) { ?>
  <div style="display: inline; float: right; text-align: right;">
    <ul class="menu">
      <li class="menu-item-solo"> <a href="<?php bloginfo('siteurl')?>/my-subscriptions"> My Subscriptions </a> </li>
    </ul>
  </div>
<?php } else { ?>
<?php }
?>
  
  <div class="main-page-title">
    <?php $terms = get_the_terms( $post->ID , 'pubcode' );
	if($terms) {
		foreach( $terms as $term ) {
		echo $term->description;
	}
}
?>
  </div>
</div>

<?php
if ( is_user_logged_in() ) { ?>
<div class="hide-mobile">
  <div class="label welcome-message">
    <h1><?php echo __( 'Welcome, Subscriber'); ?><h1>
  </div>
</div>
<?php } else { ?>
<div class="hide-mobile">
  <div class="label welcome-message">
    <h1>Member Access Only - Please Log In<h1>
  </div>
</div>

<?php }
?>