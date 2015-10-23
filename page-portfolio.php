<?php
if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod') || strstr($_SERVER['HTTP_USER_AGENT'],'iPad'))
 { ?>

<style type="text/css">
@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation:portrait) {
  body {
    -webkit-transform: rotate(90deg);
    width: 100%;
    height: 100%;
    overflow: hidden;
    position: absolute;
    top: 0;
    left: 0;
  }
}
</style>

<?php }
?>



<?php
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

$export = (isset($_GET['export']) && $_GET['export'] == 1)?true:false;
$precious_metals_only = (isset($_GET['precious_metals_only']) && $_GET['precious_metals_only'] == 1)?true:false;
$perfomance_only = (isset($_GET['perfomance_only']) && $_GET['perfomance_only'] == 1)?true:false;
if (!$export){
get_header('login'); ?>

    <div class="hide-mobile" style="display:none;">
        <div class="label welcome-message">
            <h1><?php echo __( 'Welcome', 'login-with-ajax' ) . ", " . $current_user->display_name; ?></h1>
        </div>
    </div>
    <div class="m-tabs">
        <ul class="tabs">
            <li id="li_performance_portfolio" class="active">
                <a id="performance_portfolio" href="#">Performance Portfolio</a>
            </li>
            <li id="li_precious_metals" class="single">
                <a id="precious_metals" href="#">Precious Metals</a>
            </li>
        </ul>
    </div>

<?php } else {
     header('Content-Disposition:attachment; filename=portfolio.xls');
     header('Content-Type:application/vnd.ms-excel');
}?>


<?php
if ( is_user_logged_in() ) { ?>

    <div class="tbl">
        <?php pbl_add_portfolio_in_editor($export, $precious_metals_only, $perfomance_only);?>
    </div>
    
<div style="border: 1px solid rgb(204, 204, 204); padding: 8px 10px; background-color: rgb(238, 238, 238); font-family:arial, sans-serif; font-size:13px;" class="active pop-content performance_portfolio">
The stated investment returns above include gains from dividends.

<br><br>

<strong>Asset Class Breakdown:</strong><br>
"Cash Alternatives" belong to the "Cash" asset class. Any "income" play fits in the "Reliable Fixed Income" asset class (read about our additional fixed income recommendations here: <a href="http://palmbeachgroup.com/a-new-and-little-known-fixed-income-platform/">P2P Lending</a>, <a href="http://palmbeachgroup.com/the-biggest-retirement-fear-and-how-a-visit-from-americas-top-expert-helped-us-solve-it/">SPIAs</a>, <a href="http://palmbeachgroup.com/myga-a-cd-alternative-that-pays-more/">MYGAs</a> and <a href="http://palmbeachgroup.com/a-guaranteed-income-stream-with-upside/">RetireOne</a>). Everything else falls in the "Performance Stocks" asset class. 
<br>
<br>
To read PBRG's Asset Allocation Guide, click <a href="http://palmbeachgroup.com/asset-allocation/" target="_blank">here</a>.</div>

<div style="border: 1px solid rgb(204, 204, 204); padding: 8px 10px; background-color: rgb(238, 238, 238); font-family:arial, sans-serif; font-size:13px; display:none;" class="pop-content precious_metals">
The stated investment returns above include gains from dividends.

<br><br>

<strong>Asset Class Breakdown:</strong><br>Asset Class Breakdown: 100% Chaos Hedges.
<br>
<br>
To read PBRG's Asset Allocation Guide, click <a href="http://palmbeachgroup.com/asset-allocation/" target="_blank">here</a>.</div>

<?php } else { ?>

<style type="text/css">
h2 {
border-bottom: 1px solid #ccc;
color: #444;
font: italic 18px Georgia, "Times New Roman", Times, serif;
margin-bottom: 14px;
padding: 0 0 1px 8px;}
#wrapper{background-color:#f9f3dd;}
#content {
margin-top: 20px;
margin-bottom: 20px;
background-color: #f9f3dd;
margin:auto;
}
#mw_login {
padding: 0;
margin: 0;
background-color: #F9F3DD;
max-width: 450px;
margin: auto;
}
</style>


<div class="sublogin"><h2><h2>Subscriber Login</h2></h2></div>
<div id="content" class="grid col-940">

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="post-entry">
<?php /*?><?php echo do_shortcode('[agora_middleware_login]'); ?><?php */?>
					<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>

                </div>
                <!-- end of .post-entry -->

            </div><!-- end of #post-<?php the_ID(); ?> -->

</div><!-- end of #content -->

<?php }
?>


<?php 
if (!$export){
    get_footer(); 
}
?>