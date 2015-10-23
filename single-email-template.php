<?php get_header('email-template');
if(have_posts()) : the_post(); ?>
<style type="text/css">
@media only screen and (max-width : 320px) {
table, tbody, tr, th {
	width: 100%;
}
.header-image {
	width: 100%;
}
}
</style>

<?php if( has_term( 'PBL', 'pubcode' ) & in_category('monthly-issues') ) {
$pbrgprice = '| $99.00 for 12 Issues';
} 
elseif( has_term( 'MTI', 'pubcode' ) & in_category('monthly-issues') ) {
$pbrgprice = '| $99.00 for 12 Issues';
} 
else {
$pbrgportfolio = '';
} 	
?>




<?php if( has_term( array('eio', 'clb'),'pubcode') ) { ?>
<div class="post-date" style="display:none;"><?php the_time('F j, Y'); ?></div><?php }
 else { ?>
<div class="post-date"><?php the_time('F j, Y'); ?> <?php echo $pbrgprice; ?></div>
<?php } ?>

<div class="txt_controls"><span>Text size</span> <!--<a class="plus" style="text-decoration: none; outline:none;" href=""> <img style="border:none;" src="http://files.csinvesting.com/images/MTI/site/tc_plus.gif" width="12" height="12" alt="" title=""> </a> <a class="minus" style="text-decoration: none; outline:none;" href=""> <img style="border:none;" src="http://files.csinvesting.com/images/MTI/site/tc_minus.gif" width="12" height="12" alt="" title="">--> <a href="#" id="medium" class="selected">A</a><a href="#" id="large" class="">A</a>
 </a> <span>Print</span> <img onclick="window.print();" src="http://files.csinvesting.com/images/MTI/site/tc_print.gif" width="12" height="12" alt="" title=""> <span>Contrast</span> <i class="fa fa-adjust"></i></div>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody>
    <tr>
      <td valign="top" height="150" bgcolor="#ffffff" align="left"><div class="content_block">
          <table id="content_block" style="margin-top: -20px; font-size: 100%;" width="600" border="0" align="center" cellpadding="0" cellspacing="10">
            <tbody>
              <tr>
                <td><?php
if ( is_user_logged_in() ) {
echo types_render_field('top-note', array("output"=>"html"));
} else {
}
?>
                  <div align="center">
                    <table width="580px" border="0" cellspacing="10" cellpadding="0">
                      <tbody>
                        <tr>
                          <td><div align="center" class="headline"><strong id="updateTitle">
                              <?php the_title();?>
                              </strong></div></td>
                        </tr>
                      </tbody>
                    </table>
                    <?php $subhead = types_render_field('subhead', array("output"=>"html")); if(!empty($subhead)) : ?>
                    <span width="580px" id="SubHeadline" style="text-align:center;"><em><?php echo $subhead;?></em></span> <br>
                    <?php endif;?>
                    <?php if(get_the_author_meta('ID') != 1) : ?>
                    <span id="essayEditor">By
                    <?php if(function_exists( 'coauthors' ) ) {
    coauthors();
} else {
	get_the_author();
}
?>
                    </span><br>
                    <?php endif;?>
                  </div>
                  <?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
                  <?php
if ( is_user_logged_in() ) {
echo types_render_field('bottom-note', array("output"=>"html"));
} else {
}
?></td>
              </tr>
            </tbody>
          </table>
        </div></td>
    </tr>
  </tbody>
</table>







<?php endif; ?>
<script type="text/javascript">
$(document).ready(function(){
  $("#medium").click(function(event){
    event.preventDefault();
    $("h1").animate({"font-size":"36px"});
    $("h2").animate({"font-size":"24px"});
    $("p").animate({"font-size":"16px", "line-height":"23px"});
	$("#essayEditor").animate({"font-size":"16px"});
	$(".headline").animate({"font-size":"24px"});    
	$("#SubHeadline").animate({"font-size":"16px"});    
        
  });
  
  $("#large").click(function(event){
    event.preventDefault();
    $("h1").animate({"font-size":"48px"});
    $("h2").animate({"font-size":"30px"});
    $("p").animate({"font-size":"22px", "line-height":"26px"});
	$("#essayEditor").animate({"font-size":"22px"});    
	$(".headline").animate({"font-size":"26px", "line-height":"30px"});    
	$("#SubHeadline").animate({"font-size":"22px"});    
  });
  
  $( "a" ).click(function() {
   $("a").removeClass("selected");
  $(this).addClass("selected");
 });

  $( ".fa-adjust" ).click(function() {
  $('body').toggleClass( "highcontrast" );
});

});
</script>

                                            </td>
                                        </tr>
                                    </tbody></table></td>
                                            </tr></tbody>
                                            </table></td></tr></tbody></table>
                                            
<?php
if ( is_user_logged_in() ) {
if( has_term( 'PBL', 'pubcode' ) & in_category('monthly-issues') ) {
$pbrgportfolio = '[portfolio content="Palm Beach Letter Infinity"]';
} 
elseif( has_term( 'MTI', 'pubcode' ) & in_category('monthly-issues') ) {
$pbrgportfolio = '[portfolio content="Mega Trends Investing"]';
} 
elseif( has_term( 'LEG', 'pubcode' ) & in_category('monthly-issues') ) {
$pbrgportfolio = '[portfolio content="Legacy Portfolio"]';
} 
else {
$pbrgportfolio = '';
} 	
?>

<div style="margin:10px auto 0; background-color:#fff; width:654px;border-left:1px solid #D6D6D6; border-right:1px solid #D6D6D6;"><?php echo do_shortcode( $pbrgportfolio ); ?></div>

<?php } else {
}
?>
                                            
                                            
                                            
<?php get_footer('single-post');?>
