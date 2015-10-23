<?php
/*
Template Name: JPT Portfolio
*/

if( !defined( 'ABSPATH' ) ) {
    exit;
}
get_header('portfolio'); ?>


<?php
if ( is_user_logged_in() ) { ?>
<div style="display: inline; float: right; text-align: right;">
                    <ul class="menu">
                        <li class="menu-item-solo">
                            <a href="<?php bloginfo('siteurl')?>/my-subscriptions">
                                My Subscriptions
                            </a>
                        </li>
                    </ul>
</div>

<div style="font-family: Georgia, Times New Roman, Helvetica, sans-serif; font-size: 30px; font-style: normal; color: #444; border-bottom: 1px solid #ccc; padding: 6px 0 12px 0px;margin-top:10px;">Jump Point Trader - Portfolio</div>
<div style="margin:4px 0;">
<a href="/jump-point-trader-user-guide/">Start Here</a> | <a href="/jump-point-trader-webinar-course/">Webinar Course</a> | <a href="/alerts/?filter=jpt">Alerts</a> | <a href="/options/?filter=jpt">Options</a> | <a href="/updates/?filter=jpt">Updates</a> | Portfolio | <a href="/reports/?filter=jpt">Special Reports</a>| <a href="/jump-point-trader-faq/">FAQ</a>
</div>
<div style="text-align:right; padding: 14px 0 8px 0;">
<img onclick="window.print();" src="http://media.palmbeachgroup.com/images/pbrg-portfolio-print.png" width="20" height="20" alt="" title=""></div>

<div style="margin:4px 0;"><?php the_content('Read more...'); ?></div>

<?php } else { ?>

<div style="font-family: Georgia, Times New Roman, Helvetica, sans-serif; font-size: 30px; font-style: normal; color: #444; border-bottom: 1px solid #ccc; padding: 6px 0 12px 0px;margin-top:10px;">Jump Point Trader - Portfolio</div>

<?php agora()->view->load('mw-login-block', array('title' => 'Please login')); ?>

<?php }
?>

<style type="text/css" media="print">

.all {width: 100%;border: 0px;background-color: transparent;}
#header{display:none;}
ul.menu li.menu-item-solo {display: none;}
.main-nav{display:none;}
.search-container{display:none;}
input.tcportfolio-close {display: none;}

body{width:100%; font-size:15px;}
#container{ margin: 0; width: 1600px;}
#header{width:1600px;}
#menu-item-501{display:none;}
#menu-item-502{display:none;}
.tcportfolio{margin-left: -225px;
z-index: 100;}
.grid col-300 copyright{display: none;}
.scroll-top {display: none;}.powered {display: none;}
#content-full {margin-top: 0px;margin-bottom:0px;width:1600px;}
#wrapper{border:0px;}
iframe{width:1600px;}

.ui-widget-content {color: #000000;}
div.ui-jqgrid { border:1px solid #000000; border-radius: 0;-moz-border-radiu: 0; -webkit-border-radius: 0; -khtml-border-radius: 0;  }
div.ui-jqgrid .ui-jqgrid-view { font:normal 12px/15px Arial, Helvetica, sans-serif; color:#000000; border: solid 1px #000000; border-bottom: none;}
div.ui-jqgrid .ui-jqgrid-hbox { background:#ffffff; color:#000000; border-right:1px solid #000000; border-bottom:1px solid #000000;}
div.ui-jqgrid .ui-jqgrid-htable th.ui-th-column,
div.ui-jqgrid .ui-state-default.ui-jqgrid-hdiv, div.ui-jqgrid .ui-widget-header, div.ui-jqgrid .ui-userdata { background:#ffffff;  color:#000000;  border-right:1px solid #000000; border-bottom:1px #000000;}
div.ui-jqgrid .ui-userdata { border-top: 1px #000000;}

div.ui-jqgrid tr.jqgroup td {  background:#ffffff;  color:#000000;}
div.ui-jqgrid tr.ui-state-hover { background:#ffffff; color: #000000;}

div.ui-jqgrid tr.ui-state-highlight { background:#ffffff;}
div.ui-jqgrid tr.ui-state-highlight td { border-bottom:1px solid #000000;}
div.ui-jqgrid tr .jqgrid-rownum{background: #EBF2FC url(../images/portfolioList-hover.png) repeat-x -9999px -9999px;border-right: 1px solid #000000 !important;}

div.ui-jqgrid .ui-jqgrid-pager{font: normal 12px/22.99px Arial, Helvetica, sans-serif;background: #ffffff !important;color: #000000 !important;border-bottom: 1px solid #000000 !important;}

.preview div.ui-jqgrid .ui-jqgrid-htable th.ui-th-column div {background: none;}

.preview div.ui-jqgrid .printBtn{background: #ffffff;}
div.ui-jqgrid tr.jqgrow td a { color:#000000; text-decoration:none;}
div.ui-jqgrid tr.jqgrow td a:hover { color:#000000; text-decoration:none;}

.ui-widget-content .ui-icon {background-image: url("images/ui_icons_black.png");}

div.ui-jqgrid .ui-subgrid td.subgrid-cell { background:white;}
div.scroll .ui-jqgrid {border-bottom:1px solid #000000;}
.ui-jqgrid tr.jqgrow td {border-bottom: solid 1px #000000;}
.preview div.ui-jqgrid .ui-jqgrid-htable th:last-child{border-right: none;}

.preview div.ui-jqgrid .ui-jqgrid-htable th.ui-th-column, div.ui-jqgrid .ui-jqgrid-hbox {background: #eeeeee;border-bottom: 1px solid #000000;border-left: 1px solid #000000 !important; border-right: none !important; color: #000000;}

.preview .ui-jqgrid .ui-jqgrid-titlebar, .ui-jqgrid tr.jqgroup td{color: #000000; border: 1px solid #000000; background: #eeeeee;  }
.ui-jqgrid-view.Modern .preview div.ui-jqgrid .ui-jqgrid-titlebar {color: #000000; border-bottom: solid 1px #000000; border-right: none; background: #eeeeee;}
.ui-jqgrid-view.Modern .ui-jqgrid-titlebar.ui-widget-header.ui-corner-top.ui-helper-clearfix {border-right: none; border-top: none;}
.ui-jqgrid-view.Classic .ui-jqgrid-titlebar.ui-widget-header.ui-corner-top.ui-helper-clearfix {color: #000000; border: 1px solid #000000; background: #eeeeee!important;}
.ui-jqgrid-view.Classic .preview div.ui-jqgrid .ui-jqgrid-titlebar {color: #000000; border-right: none !important; background: #eeeeee;}
.preview div.ui-jqgrid .ui-jqgrid-pager {color: #000000;border-right: 1px solid #000000 !important; border-bottom: 1px solid #000000 !important;background: #eeeeee!important;}

.preview div.ui-jqgrid tr .jqgrid-rownum { background: #ffffff;border-right: 1px solid #000000 !important;color: #000000;}
.preview .ui-widget-content { border: solid 1px #000000; border-top:  none; border-bottom: none;}
.preview .fix_bg { background: #ffffff; }

.preview div.ui-jqgrid .ui-jqgrid-bdiv {overflow: hidden;}
.preview .new_heading {background: #ffffff;color: #000000;font: bold 11px tahoma, arial, verdana, sans-serif;}

.preview div.ui-jqgrid tr.jqgroup.ui-row-ltr td { border:0; border-bottom: 2px solid #000000; background: #ffffff; color: #000000; }
.preview div.ui-jqgrid tr.jqgroup.ui-row-ltr td span.ui-icon.tree-wrap-ltr.ui-icon-circlesmall-plus { background-image:url("../images/group-expand-sprite.gif"); background-position:50% 0; }
.preview div.ui-jqgrid tr.jqgroup.ui-row-ltr td span.ui-icon.ui-icon-circlesmall-minus.tree-wrap-ltr { background-image:url("../images/group-expand-sprite.gif"); background-position:50% -50px; }
.preview div.ui-jqgrid tr.ui-state-highlight { background: none repeat scroll 0 0 #DFE8F6 !important; border: 1px dotted #000000 !important; }
.preview div.ui-jqgrid tr.ui-state-highlight td { border-color: #000000; }

.ui-corner-all, .ui-corner-top, .ui-corner-left, .ui-corner-tl { -moz-border-radius-topleft: 0; -webkit-border-top-left-radius: 0; -khtml-border-top-left-radius: 0; border-top-left-radius: 0; }
.ui-corner-all, .ui-corner-top, .ui-corner-right, .ui-corner-tr { -moz-border-radius-topright: 0; -webkit-border-top-right-radius: 0; -khtml-border-top-right-radius: 0; border-top-right-radius: 0; }
.ui-corner-all, .ui-corner-bottom, .ui-corner-left, .ui-corner-bl { -moz-border-radius-bottomleft: 0; -webkit-border-bottom-left-radius: 0; -khtml-border-bottom-left-radius: 0; border-bottom-left-radius: 0; }
.ui-corner-all, .ui-corner-bottom, .ui-corner-right, .ui-corner-br { -moz-border-radius-bottomright: 0; -webkit-border-bottom-right-radius: 0; -khtml-border-bottom-right-radius: 0; border-bottom-right-radius: 0; }

@page {size: landscape}
@page {margin: 2mm 2mm 2mm 2mm;}
</style>

<?php get_footer(); ?>
