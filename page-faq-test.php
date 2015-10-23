<?php
/*
Template Name: FAQ Test
*/

if( !defined( 'ABSPATH' ) ) {
    exit;
}
get_header('login'); ?>
<style type="text/css">
.faqlist {
	display: none;
}
</style>
<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$('.faqitems').change(function(){
    var selected = $(this).find(':selected');
    $('.faqlist').hide();
   $('.'+selected.val()).show(); 
    $('.optionvalue').html(selected.html());
});
});//]]>  

</script>

<?php
if ( is_user_logged_in() ) { ?>

<?php } else { ?>

<?php }
?>

<div id="content-full" class="grid col-940">
	<?php if( have_posts() ) : ?>
		<?php while( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>

				<?php get_template_part( 'post-meta-page' ); ?>

				<div class="post-entry">
					
                    
                    
                    <?php
if ( is_user_logged_in() ) { ?>


<div style="margin:auto; background-color: #FAFAFA;padding: 10px;border: 1px solid #E6E6E6;"><p>Below you’ll find a robust database of frequently asked questions subscribers typically ask. We’ve split these questions up by each service and publication we have.</p>
<p>If you can’t find an answer to your question, please don’t hesitate to send us an email <a href="http://palmbeachletter.com/contact-us/" target="_blank">here</a>.</p>
<p>Note: You can expect to receive a response within 48 hours.</p></div>


<br>
<br>

Browse questions by publication:
<select class="faqitems">
  <option class="selected" value="CS">Choose Publication</option>
  <!-- Palm Beach Letter - PBL only Pubcode-->
  <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("7983");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed()){ ?>
  <option value="PBL"> Palm Beach Letter</option>
  <?  }
else{
$pbl = 'na';}
unset($auth_container);}?>
  <!-- Mega Trends Investing - MTI only Pubcode-->
  <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("8069");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed()){ ?>
  <option value="MTI"> Mega Trends Investing</option>
  <?  }
else{
$mti = 'na'; 	
  }
 unset($auth_container);
}
?>
  <?php 
  if(class_exists('agora_auth_container')){
  $auth_container_new = new agora_auth_container("4953");
  $auth_container_new = apply_filters( 'agora_middleware_check_permission', $auth_container_new);
  if($auth_container_new->is_allowed("4953")){ ?>
  <option value="PBN"> Palm Beach Current Income</option>
  <?  }
else{
$pbn = 'na'; 	
  }
}
?>
 
  <!-- IFL only Pubcode-->
  <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("8228");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed()){ ?>
  <option value="IFL"> Income for Life</option>
  <?  }
else{
$ifl = 'asd'; 	
  }
 unset($auth_container);
}
?>
  
  <!-- CLB only Pubcode-->
  <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("4754");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed()){ ?>
  <option value="CLB"> Wealth Builder's Club</option>
  <?  }
else{
$ifl = 'asd'; 	
  }
 unset($auth_container);
}
?>
  
  <!-- PRI only Pubcode-->
  <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("8343");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed()){ ?>
  <option value="PRI"> Retirement Insider</option>
  <?  }
else{
$ifl = 'asd'; 	
  }
 unset($auth_container);
}
?>
  
  
  <!-- LEG only Pubcode-->
  <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("5927");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed()){ ?>
  <option value="LEG"> Legacy Portfolio</option>
  <?  }
else{
$ifl = 'asd'; 	
  }
 unset($auth_container);
}
?>
  
  
</select>
<br>
<br>

    <div class="scroll-content">
      <div class="faqlist CS"> <?php echo do_shortcode( '[faq order="ASC" orderby="date" group="general-customer-service"]' ); ?> </div>
      <div class="faqlist PBL">
      
      <strong>Palm Beach Letter</strong>
      
        <div align="center"><font size="3"><font size="4"><font face="Georgia, serif"><strong>Frequently Asked Questions</strong></font></font></font></div><br>
        If you have questions regarding <em>The Palm Beach Letter</em> that are not answered in our Frequently Asked Questions, please click <a href="http://palmbeachletter.com/contact-us/" target="_blank">here</a> to send us an email. Please select “Palm Beach Letter” from the drop-down menu. <em>The Palm Beach Letter</em>–FAQs
<br>
<br>
        <div align="center"><a name="pbl-general-questions"></a> <em>Section 1 – General Questions </em></div><br>
        <?php echo do_shortcode( '[faq order="ASC" orderby="date" group="pbl-subscriber-faq"]' ); ?><br>
        <div align="center"><a name="pbl-getting-started"></a> <em>Section 2-How Do I Get Started?</em></div><br>
        <?php echo do_shortcode( '[faq order="ASC" orderby="date" group="pbl-get-started"]' ); ?><br>
        <div align="center"><a name="pbl-investing-advice"></a> <em>Section 3-Investing Advice</em></div><br>
        <?php echo do_shortcode( '[faq order="ASC" orderby="date" group="pbl-investing-advice"]' ); ?><br>
        <div align="center"><a name="pbl-trading-questions"></a> <em>Section 4-Trading Questions</em></div><br>
        <?php echo do_shortcode( '[faq order="ASC" orderby="date" group="pbl-trading-questions"]' ); ?><br>
        <div align="center"><a name="pbl-asset-allocation"></a> <em>Section 5-Asset Allocation</em></div><br>
        <?php echo do_shortcode( '[faq order="ASC" orderby="date" group="pbl-asset-allocation"]' ); ?><br>
        <div align="center"><a name="pbl-precious-metals"></a> <em>Section 6-Precious Metals and Other Non-Traditional Investments</em></div><br>
        <?php echo do_shortcode( '[faq order="ASC" orderby="date" group="pbl-precious-metals"]' ); ?><br>
        <div align="center"><a name="pbl-what-if-questions"></a> <em>Section 7-What-if Questions</em></div><br>
        <?php echo do_shortcode( '[faq order="ASC" orderby="date" group="pbl-what-if"]' ); ?> </div>
    </div>
    <!-- end PBL -->

<div class="faqlist PRI">

<strong>Retirement Insider</strong>

<?php echo do_shortcode( '[faq order="ASC" orderby="date" group="ri-general-questions"]' ); ?><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="ri-social-security"]' ); ?> </div>


<div class="faqlist MTI">

<strong>Mega Trends Investing</strong>

<?php echo do_shortcode( '[faq order="ASC" orderby="date" group="mti-subscriber-faq"]' ); ?>
</div>

<div class="faqlist PBN">

<strong>Palm Beach Current Income</strong>

<div align="center"><a name="pbn-general-questions"></a>
<em>Section 1 – General Questions</em></div><br>
<?php echo do_shortcode( '[faq order="ASC" orderby="date" group="pbn-subscriber-faq"]' ); ?><br>

<div align="center"><a name="pbn-brokerage-account"></a>
<em>Section 2-Brokerage Account Questions</em></div><br>
<?php echo do_shortcode( '[faq order="ASC" orderby="date" group="pbn-brokerage-account"]' ); ?><br>

<div align="center"><a name="pbn-options-terminology"></a>
<em>Section 3-Options Terminology</em></div><br>
<?php echo do_shortcode( '[faq order="ASC" orderby="date" group="pbn-options-terminology"]' ); ?><br>

<div align="center"><a name="pbn-options-trading"></a>
<em>Section 4-Options Trading</em></div><br>
<?php echo do_shortcode( '[faq order="ASC" orderby="date" group="pbn-options-trading"]' ); ?><br>

<div align="center"><a name="pbn-trading-rules"></a>
<em>Section 5-Trading Rules and Strategies</em></div><br><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="pbn-trading-rules"]' ); ?><br>

<div align="center"><a name="pbn-trading-performance"></a>
<em>Section 6-Trading Performance</em></div><br><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="pbn-trading-performance"]' ); ?><br>

<div align="center"><a name="pbn-valuation-methods"></a>
<em>Section 7-Valuation Methods</em></div><br><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="pbn-valuation-methods"]' ); ?><br>

<div align="center"><a name="pbn-downloadable-resources"></a>
<em>Section 8-Downloadable Resources</em></div><br><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="pbn-downloadable-resources"]' ); ?></div>

<div class="faqlist IFL">

<strong>Income for Life</strong>

<div align="center"><a name="cw-general-questions"></a>
Section 1 – General Questions
</em></div><br><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="ifl-general"]' ); ?><br>

<div align="center"><a name="cw-general-questions"></a>
Section 2 – Tax Related Questions
</em></div><br><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="ifl-tax-related"]' ); ?><br>

<div align="center"><a name="cw-general-questions"></a>
Section 3 – Technical Questions
</em></div><br><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="ifl-technical"]' ); ?><br>

<div align="center"><a name="cw-general-questions"></a>
Section 4 – "What if..." Questions
</em></div><br><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="ifl-what-if"]' ); ?><br>

<div align="center"><a name="cw-general-questions"></a>
Section 5 – Common Objections to Income for Life
</em></div><br><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="ifl-common-objections"]' ); ?><br>

<div align="center"><a name="cw-general-questions"></a>
Section 6 – Applying for and Starting a Policy
</em></div><br><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="ifl-applying"]' ); ?><br>

<div align="center"><a name="cw-general-questions"></a>
Section 7 – Questions on Mutual Life Insurance Companies
</em></div><br><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="ifl-mutual"]' ); ?></div>

<div class="faqlist CLB">

<strong>Wealth Builders Club</strong>

<div align="center"><a name="clb-subscriber-faq"></a>
<em><strong>Section 1</strong>
General Club
</em></div><br><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="clb-subscriber-faq"]' ); ?><br>

<div align="center"><a name="clb-eio-faq"></a>
<em><strong>Section 2</strong>
Extra Income Project
</em></div><br><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="clb-eio-faq"]' ); ?><br>

<div align="center"><a name="clb-rny-faq"></a>
<em><strong>Section 3</strong>
Retire Next Year</em></div>
<br><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="clb-rny-faq"]' ); ?><br>

<div align="center"><a name="clb-rre-faq"></a>
<em><strong>Section 4</strong>
Rental Real Estate</em></div>
<br><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="clb-rre-faq"]' ); ?><br>

<div align="center"><a name="clb-mdb-faq"></a>
<em><strong>Section 5</strong>
How to Start a Million-Dollar Business</em></div><br><?php echo do_shortcode( '[faq order="ASC" orderby="date" group="clb-mdb-faq"]' ); ?><br></div>


<div class="faqlist LEG">

<strong>Legacy Portfolio</strong>

<?php echo do_shortcode( '[faq order="ASC" orderby="date" group="legacy-faq"]' ); ?></div>


<?php } else { ?>

<?php the_content('Read more...'); ?>


<?php }
?>
                    
                    
					
				</div>
				<!-- end of .post-entry -->

				<?php get_template_part( 'post-data' ); ?>

				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->


		<?php
		endwhile;
		get_template_part( 'loop-nav' );
	else :
		get_template_part( 'loop-no-posts' );
	endif;
	?>

</div><!-- end of #content-full -->
<?php get_footer(); ?>
