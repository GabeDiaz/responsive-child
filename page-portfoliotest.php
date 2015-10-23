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
    <div class="hide-mobile">
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

    <div class="tbl">
        <?php pbl_add_portfolio_in_editor($export, $precious_metals_only, $perfomance_only);?>
    </div>

<?php 
if (!$export){
    get_footer(); 
}
?>