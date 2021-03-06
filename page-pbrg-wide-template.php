<?php
/*
Template Name: PBRG Wide Template
*/

/**
 * Created by JetBrains PhpStorm.
 * User: i.nishcheretova
 * Date: 12.02.14
 * Time: 18:46
 * To change this template use File | Settings | File Templates.
 */

if( !defined( 'ABSPATH' ) ) {
    exit;
}
get_header('email-template');
if(have_posts()) : the_post(); ?>

<style type="text/css">
table.single-post {
  width: 860px;
}
table#content_block {
  width: 720px;
}
.JPT .page.type-page {
  background-image: url('http://files.csinvesting.com/images/emailGraphics/headers/jpt-header.png');
  height: 125px;
  display:none;
}


    input.wpcf7-form-control.wpcf7-text.wpcf7-tel.wpcf7-validates-as-tel {
/* padding: 5px; */
-moz-box-sizing: border-box;
-moz-border-radius: 2px;
-webkit-box-sizing: border-box;
-webkit-border-radius: 2px;
-webkit-box-shadow: 0 1px 0 #ffffff, inset 0 1px 1px rgba(0, 0, 0, 0.2);
-moz-box-shadow: 0 1px 0 #ffffff, inset 0 1px 1px rgba(0, 0, 0, 0.2);
box-shadow: 0 1px 0 #ffffff, inset 0 1px 1px rgba(0, 0, 0, 0.2);
background-color: #ffffff;
box-sizing: border-box;
border: 1px solid #aaaaaa;
border-bottom-color: #cccccc;
border-radius: 2px;
cursor: text;
margin: 0;
outline: none;
padding: 6px 8px;
vertical-align: middle;
max-width: 100%;
}
span.wpcf7-not-valid-tip-no-ajax {
color: #f00;
font-size: 10pt;
display: none;
}
div.wpcf7-validation-errors {
border: 2px solid #F70000;
}
input.wpcf7-form-control.wpcf7-submit {
height: 40px;
width: 110px;
font-size: 21px;
}

div.wpcf7-validation-errors {
  border: 2px solid #F70000;
  padding: 4px 10px;
  border-radius: 4px;
  background-color: #F0BCBC;
  color: #000;
  text-align: center;
}

span.wpcf7-not-valid-tip {
  font-size: 10px;
}

.screen-reader-response {
  display: none;
}

@media only screen and (max-width : 320px) {
table, tbody, tr, th{width:100%;}
.header-image{width:100%;}
}
</style>




<?php if( has_term( array('pbl', 'mti'),'pubcode') ) { ?>
<div style="float:left; width:50%;color: #000000;  font-size: 10px;    margin-left: 13px;    margin-top: 12px;  margin-bottom: 10px;  height: 25px;font-family: Georgia, serif;font-size: 16px; display:none;">
  <?php the_time('F j, Y'); ?>
</div>
<?php }
 else { ?>
<div style="float:left; width:50%;color: #000000;  font-size: 10px;    margin-left: 13px;    margin-top: 12px;  margin-bottom: 10px;  height: 25px;font-family: Georgia, serif;font-size: 16px;">
  <?php the_time('F j, Y'); ?>
</div>
<?php } ?>

<div class="txt_controls" style="color: #666666;font-size: 10px;font-family: Verdana;margin-right: 13px;text-align: right;margin-top: 12px;margin-bottom:10px;height: 25px;width: 25%;float:right;">
 <span>Text size</span>
<a class="plus" style="text-decoration: none; outline:none;" href="">
                                        <img style="border:none;" src="http://files.csinvesting.com/images/MTI/site/tc_plus.gif" width="12" height="12" alt="" title="">
                                    </a>
                                    <a class="minus" style="text-decoration: none; outline:none;" href="">
                                        <img style="border:none;" src="http://files.csinvesting.com/images/MTI/site/tc_minus.gif" width="12" height="12" alt="" title="">
                                    </a>
                                    <span>Print</span>
                                    <img onclick="window.print();" src="http://files.csinvesting.com/images/MTI/site/tc_print.gif" width="12" height="12" alt="" title="">
                                </div>
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody><tr>
            <td valign="top" height="150" bgcolor="#ffffff" align="left">





<div class="content_block">
    <font size="3" face="Georgia, Arial, Helvetica, sans-serif">
   
<table id="content_block" style="margin-top: -20px; font-size: 100%;" width="600" border="0" align="center" cellpadding="0" cellspacing="10">
                                                    <tbody>
                                                    <tr>
                                                      <td>
                                             
 <?php
if ( is_user_logged_in() ) {
echo types_render_field('top-note', array("output"=>"html"));
} else {
}
?>
 

 
 <div align="center">
  <table width="580px" border="0" cellspacing="10" cellpadding="0"><tbody><tr><td><div align="center"><font face="Georgia, Arial, Helvetica, sans-serif" size="5"><strong id="updateTitle"><?php the_title();?></strong></font></div></td></tr></tbody></table>

<?php $subhead = types_render_field('subhead', array("output"=>"html")); if(!empty($subhead)) : ?>
<font size="4" face="Georgia, Arial, Helvetica, sans-serif"><span width="580px" id="SubHeadline"><i><?php echo $subhead;?></i></span></font><br>
<?php endif;?>
                                                                    
<?php if(get_the_author_meta('ID') != 1) : ?>
<font size="3" face="Georgia, Arial, Helvetica, sans-serif">
<span id="essayEditor">By 
<?php if(function_exists( 'coauthors' ) ) {
    coauthors();
} else {
	get_the_author();
}
?></span></font><br><?php endif;?>
</div>
<font size="3" face="Georgia, Arial, Helvetica, sans-serif">
   <?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
   
   
   <?php
if ( is_user_logged_in() ) {
echo types_render_field('bottom-note', array("output"=>"html"));
} else {
}
?>
   
 </font></p>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

</font>








                            </div>








            </td>
            <td valign="top" bgcolor="#ffffff" align="left">&nbsp;</td>
        </tr>
        </tbody>
    </table>
<?php endif; ?>


<?php get_footer('single-post');?>
