<?php
/*
Template Name: PBRG Calculator Template
*/
if( !defined( 'ABSPATH' ) ) {
    exit;
}
get_header('pbrg-calc-template');
if(have_posts()) : the_post(); ?>
<style type="text/css">
a img{border:none;}

table.single-post {
	width: 860px;
}
table#content_block {
	width: 720px;
}
.JPT .page.type-page {
	background-image: url('http://files.csinvesting.com/images/emailGraphics/headers/jpt-header.png');
	height: 125px;
	display: none;
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
table, tbody, tr, th {
	width: 100%;
}
.header-image {
	width: 100%;
}
}
</style>

<div class="txt_controls" style="color: #666666;font-size: 10px;font-family: Verdana;margin-right: 13px;text-align: right;margin-top: 12px;margin-bottom:10px;height: 25px;width: 25%;float:right;"> </div>

<table align="center" width="720" cellspacing="0" cellpadding="0" border="0"><tbody>
<tr><td valign="top" height="150" bgcolor="#ffffff" align="left">

<div class="content_block" style="margin:-20px auto; padding:10px;">
<?php
if ( is_user_logged_in() ) {
echo types_render_field('top-note', array("output"=>"html"));
} else {
}
?>

<div align="center">
<div align="center" style="width:580px; margin:auto; padding:2px 0 8px;">
<div id="updateTitle" style="font-family:Georgia, serif; font-size:24px; font-weight:bold;"><?php the_title();?></div>
</div>
<?php $subhead = types_render_field('subhead', array("output"=>"html")); if(!empty($subhead)) : ?>
<div width="580px" id="SubHeadline" style="font-family:Georgia, serif; font-size:18px; font-style:italic; padding-bottom:8px;"><?php echo $subhead;?></div>
                  <?php endif;?>

<?php if(get_the_author_meta('ID') != 1) : ?>
<div id="essayEditor" style="font-family:Georgia, serif; font-size:16px;">By <?php if(function_exists( 'coauthors' ) ) {
    coauthors();
} else {
	get_the_author();
}
?></div>
<?php endif;?>
</div>

<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
<?php
if ( is_user_logged_in() ) {
echo types_render_field('bottom-note', array("output"=>"html"));
} else {
}
?>
</td></tr></tbody></table>
<?php endif; ?>
<?php get_footer('pbrg-calc');?>