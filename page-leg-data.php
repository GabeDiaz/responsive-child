<?php
/*
Template Name: Legacy Data
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
get_header('login'); ?>



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



<div style="font-family: Georgia, Times New Roman, Helvetica, sans-serif;
font-size: 30px;
font-style: normal;
color: #444;
border-bottom: 1px solid #ccc;
padding: 6px 0 12px 0px;margin-top:10px;">Legacy Data</div>

<div style="margin:4px 0;">
<a href="/legacy-portfolio-user-guide/">User Guide</a> | <a href="/pubcode/leg/issues/">Issues</a> | <?php echo do_shortcode( '[contentdrip id="RNY010, NEXTLEG, 20150423LEG"]' .'<a href="/legacy-portfolio/">Portfolio</a> |'. '[/contentdrip]' ); ?> Legacy Data | <a href="/legacy-calculators/">Legacy Calculators</a> |<a href="/legacy-faq/">FAQ</a>

</div>
<?php } else { ?>

<div style="font-family: Georgia, Times New Roman, Helvetica, sans-serif;
font-size: 30px;
font-style: normal;
color: #444;
border-bottom: 1px solid #ccc;
padding: 6px 0 12px 0px;margin-top:10px;">Legacy Data</div>
<?php }
?>
                
                


<div id="content-full" class="grid col-940">
<div style="padding: 16px 24px;">
<style type="text/css" media="print">
body{width:1600px;} 
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
@page {size: landscape}
@page {margin: 2mm 2mm 2mm 2mm;}
</style>
<?php the_content('Read more...'); ?>

</div>
</div>

<?php get_footer(); ?>