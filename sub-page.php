<?php
/*
Template Name: My Subscriptions Page
*/

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
//print_r($subscriptions); die;
/**
 * Pages Template
 *
 *
 */
get_header('login');?>
<style type="text/css">
tr:nth-child(odd) {
/*	background-color: #dcede4;*/
background-color:#D3E4DB;
}


@media screen and (max-width: 480px) {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 0px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 0px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	
	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: ""; }
	td:nth-of-type(2):before { content: ""; }
	td:nth-of-type(3):before { content: ""; }
	
	td:nth-of-type(2) { display:none; }

.subscription th {
border-bottom: 0px solid #ccc;
color: #000;
font: normal 12px Arial, Helvetica, sans-serif;
padding: 3px;
text-align: left;
text-align: center;
display: none;
}

.subscription td {
font-size: 12px;
line-height: normal;
text-align: center;
border: 0;
}

.subscription td.tfirst {
text-align: center;
border: 0;
}
.subscription td.tlast {
border-right: 0px solid #ccc;
padding-right: 0;
text-align: center;
vertical-align: middle;
}

tr.subpub {display: none;}
}

</style>
<div class="logged-in">

<h2 class="login-subs"> <span class="user"> Welcome, Subscriber</span> <span>Subscription Home</span> </h2>

<div id="content" class="grid col-940">
<?php if ( is_user_logged_in() ) { ?>
<?php } else {   ?>
<?php } ?>
<div class="subwrapper">
<?php  if( have_posts() ) :  ?>
<?php while( have_posts() ) : the_post(); ?>
<?php responsive_entry_before(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php responsive_entry_top(); ?>



  <div style="float:right;">Click <a href="http://files.csinvesting.com/files/pblmonthlycalandar_O1BRQADD7S.pdf" target="_blank">here</a> to view our Monthly Publication Schedule<br>
Click <a href="http://palmbeachgroup.com/investing-calculators/" target="_blank">here</a> to access our Investment Calculators</div>


  <?php get_template_part( 'post-meta-page' ); ?>

  <div class="post-entry">
 
  
    <table class="subscription" cellpadding="0" cellspacing="0" border="0" width="100%">
      <colgroup>
      <col width="53%">
      <col width="20%">
      <col width="27%">
      </colgroup>
      <tbody>
        <tr style="background-color:#fff;">
          <th class="tleft"> Product </th>
          <th>&nbsp; </th>
          <th>&nbsp; </th>
        </tr>

 <!-- Palm Beach Daily -->

<?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("4777");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("4777")){ ?>
        <tr>
          <td class="tfirst"><h3>Infinity Portal</h3></td>
          <td><?php echo $pblstatus; ?></td>
          <td class="tlast"><a href="/infinity-user-guide/"> <img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>
          <tr class="subpub">
          <td class="tfirst subpub" style="border-top: 0; border-bottom: 0"><h3>DealBook</h3>
            <p></p></td>
          <td style="border-top: 0; border-bottom: 0"><?php echo $pblstatus; ?></td>
          <td class="tlast" style="border-top: 0; border-bottom: 0"><a href="/dealbook-user-guide/"> <img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>
          <tr class="subpub">
          <td class="tfirst subpub" style="border-top: 0; border-bottom: 0"><h3>Tom’s Confidential</h3>
            <p></p></td>
          <td style="border-top: 0; border-bottom: 0"><?php echo $pblstatus; ?></td>
          <td class="tlast" style="border-top: 0; border-bottom: 0"><a href="/toms-confidential-user-guide/"> <img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>
        <tr class="subpub">
          <td class="tfirst subpub" style="border-top: 0; border-bottom: 0"><h3>The Community</h3>
            <p></p></td>
          <td style="border-top: 0; border-bottom: 0"><?php echo $pblstatus; ?></td>
          <td class="tlast" style="border-top: 0; border-bottom: 0"><a href="http://tom.palmbeachgroup.com" target="_blank"> <img src="http://files.csinvesting.com/images/sites/pbl/visit-site-btn_ZRFOWHMG9J.png" alt="" class="png-fix"></a></td>
        </tr>
        <?  }
else{
$inf = 'asd'; 	
  }
 unset($auth_container);
}
?>


        <tr>
          <td class="tfirst"><h3>Palm Beach Daily</h3></td>
          <td></td>
          <td class="tlast"><a href="/featured-content"><img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>
        
 <!-- Palm Beach Letter A1 - Infinity Order, Lifetime Subscriptions -->
     
          <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("4777");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("4777")){ 
  $extracontentstyle = "display:none;";
  $pblcolor = "tx-pltn";
  $pbllevel = "Infinity";
  $pblstatus = "Lifetime";
  ?>
     <!-- <tr>
          <td class="tfirst"><h3>Palm Beach Letter <span class="tx-pltn">Infinity</span></h3></td>
          <td></td>
          <td class="tlast"><a href="/pubcode/pbl"> <img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr> -->
        <?  }
else{
$pbl = "Palm Beach Ifinity"; 	
  }
 unset($auth_container);

}
?>

<!-- Palm Beach Letter P8 - PBL-P8 only Pubcode Includes Palm Beach Letter Platinum & Legacy Portfolio-->
     <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("8071");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("8071")){ 
  $pblcolor = "tx-pltn";
  $pbllevel = "Platinum";
  $p8status = "Lifetime";
?>
 <!--  <tr>
          <td class="tfirst"><h3>Palm Beach Letter <span class="tx-pltn">Platinum</span></h3></td>
          <td></td>
          <td class="tlast"><a href="/pubcode/pbl"> <img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr> -->
        <?  }
else{
$extracontent = "You May Also Like";
$pbl = "Palm Beach Platinum"; 	
  }
 unset($auth_container);

}
?>

<!-- Palm Beach Letter Platinum - PBL-PN only Pubcode-->

         <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("4748");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("4748")){ 
	    $pblcolor = "tx-pltn";
        $pbllevel = "Platinum"
?>
  <!-- <tr>
          <td class="tfirst"><h3>Palm Beach Letter <span class="tx-pltn">Platinum</span></h3></td>
          <td></td>
          <td class="tlast"><a href="/pubcode/pbl"> <img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr> -->
        <?  }
else{
$extracontent = "You May Also Like";
$pbl = "Palm Beach Platinum"; 	
  }
 unset($auth_container);

}
?>

<!-- Palm Beach Letter Gold - PBL-GO only Pubcode-->

<?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("4747");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("4747")){ 
    $pblcolor = "tx-gld";
    $pbllevel = "Gold"
  ?>
       <!-- <tr>
          <td class="tfirst"><h3>Palm Beach Letter <span class="tx-gld">Gold</span></h3></td>
          <td></td>
          <td class="tlast"><a href="/pubcode/pbl"> <img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>-->
        <?  }
else{
$extracontent = "You May Also Like";
$pbl = "Palm Beach Gold"; 	
  }
 unset($auth_container);

}
?>



<!-- Palm Beach Letter Silver - PBL-SV only Pubcode-->

<?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("7920");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("7920")){ 
    $pblcolor = "tx-pltn";
    $pbllevel = "Silver"
  ?>
      <!--  <tr>
          <td class="tfirst"><h3>Palm Beach Letter <span class="tx-pltn">Silver</span></h3></td>
          <td></td>
          <td class="tlast"><a href="/pubcode/pbl"> <img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>-->
        <?  }
else{
$extracontent = "You May Also Like";
$pbl = "Palm Beach Silver"; 	
  }
 unset($auth_container);

}
?>




<!-- Palm Beach Letter - PBL only Pubcode-->
       <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("7983");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("7983")){ ?>
        <tr style=" <?php echo $pblhide; ?> ">
          <td class="tfirst"><h3>Palm Beach Letter <span class=" <?php echo $pblcolor; ?> "> <?php echo $pbllevel; ?> </span></h3></td>
          <td><?php echo $pblstatus; ?><?php echo $p8status; ?></td>
          <td class="tlast"><a href="/pubcode/pbl"> <img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>
        <?  }
else{
$extracontent = "You May Also Like";
  }
 unset($auth_container);

}
?>
       
       
  
    <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("8069");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("8069")){ ?>
        <tr>
          <td class="tfirst"><h3>Mega Trends Investing</h3></td>
          <td><?php echo $pblstatus; ?></td>
          <td class="tlast"><a href="/mega-trends-investing/"><img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>
        <?  }
else{
$mti = 'asd'; 	
  }
 unset($auth_container);
}
?>

 <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("8301");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("8301")){ ?>
        <tr>
          <td class="tfirst"><h3>Mega Trends Wealth Summit</h3></td>
          <td><?php echo $pblstatus; ?></td>
          <td class="tlast"><a href="/mega-trends-wealth-summit/"> <img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>
        <?  }
else{
$mtw = 'asd'; 	
  }
 unset($auth_container);
}
?>
   
       
       
       <!-- PBN Updates and Webinar -->
        
    
        <?php 
  if(class_exists('agora_auth_container')){
  $auth_container_new = new agora_auth_container("14487");
  $auth_container_new = apply_filters( 'agora_middleware_check_permission', $auth_container_new);
  if($auth_container_new->is_allowed("14487")){ ?>
        <tr>
          <td class="tfirst"><h3>Palm Beach Current Income</h3>
            <p>Webinar Course</p></td>
          <td><?php echo $pblstatus; ?></td>
          <td class="tlast"><a href="/palm-beach-current-income-user-guide/"><img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"> </a></td>
        </tr>
        <tr>
          <td class="tfirst"><h3>Palm Beach Current Income</h3>
            <p>Weekly Trading Service</p></td>
          <td><?php echo $pblstatus; ?></td>
          <td class="tlast"><a href="/weekly-issues/?filter=pbn"> <img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"> </a></td>
        </tr>
        <?  }
else{
$pbn = 'asd'; 	
  }
}
?>


<!-- PBJ (PBN) Webinars Only-->
  <?php 
  if(class_exists('agora_auth_container')){
  $auth_container_new = new agora_auth_container("14485");
  $auth_container_new = apply_filters( 'agora_middleware_check_permission', $auth_container_new);
  if($auth_container_new->is_allowed("14485")){ ?>
        <tr>
          <td class="tfirst"><h3>Palm Beach Current Income</h3>
            <p>Webinar Course</p></td>
          <td><?php echo $pblstatus; ?></td>
          <td class="tlast"><a href="/palm-beach-current-income-user-guide/"><img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"> </a></td>
        </tr>
        <?  }
else{
$pbn = 'asd'; 	
  }
}
?>


 <!-- JPT only Pubcode-->
   
    <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("9452");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("9452")){ ?>
        <tr>
          <td class="tfirst"><h3>Jump Point Trader</h3></td>
          <td><?php echo $pblstatus; ?></td>
          <td class="tlast"><a href="/jump-point-trader-user-guide/"> <img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>
        <?  }
else{
$jpt = 'asd'; 	
  }
 unset($auth_container);
}
?>

 <!-- IFL only Pubcode-->

        <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("8228");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("8228")){ ?>
        <tr>
          <td class="tfirst"><h3>Income for Life <em>Premium</em></h3></td>
          <td><?php echo $pblstatus; ?></td>
          <td class="tlast"><a href="/income-for-life-premium-user-guide"> <img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>
        <?  }
else{
$ifl = 'asd'; 	
  }
 unset($auth_container);
}
?>

        <?php 
  if(class_exists('agora_auth_container')){
  $auth_container_new = new agora_auth_container("4754");
  $auth_container_new = apply_filters( 'agora_middleware_check_permission', $auth_container_new);
  if($auth_container_new->is_allowed("4754")){ 
  $clbstatus = "Lifetime";
  ?>
        <tr class="clb">
          <td class="tfirst"><h3>Wealth Builders Club</h3></td>
          <td><?php echo $clbstatus; ?></td>
          <td class="tlast"><a href="/wealth-builders-club-user-guide/"> <img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"> </a></td>
        </tr>
        <tr class="subpub">
          <td class="tfirst subpub" style="border-top: 0; border-bottom: 0"><h3>Extra Income Project</h3>
            <p></p></td>
          <td style="border-top: 0; border-bottom: 0"> Delivered By Email </td>
          <td class="tlast" style="border-top: 0; border-bottom: 0"></td>
        </tr>
        <tr class="subpub">
          <td class="tfirst subpub" style="border-top: 0; border-bottom: 0"><h3>Retire Next Year</h3>
            <p></p></td>
          <td style="border-top: 0; border-bottom: 0"> Delivered By Email </td>
          <td class="tlast" style="border-top: 0; border-bottom: 0"></td>
        </tr>
        <tr class="subpub">
          <td class="tfirst subpub" style="border-top: 0; border-bottom: 0"><h3>Debt & Credit Solutions</h3>
            <p></p></td>
          <td style="border-top: 0; border-bottom: 0"> Delivered By Email </td>
          <td class="tlast" style="border-top: 0; border-bottom: 0"></td>
        </tr>
        <tr class="subpub">
          <td class="tfirst subpub" style="border-top: 0; border-bottom: 0"><h3>Wealth Stealers</h3>
            <p></p></td>
          <td style="border-top: 0; border-bottom: 0"> Delivered By Email </td>
          <td class="tlast" style="border-top: 0; border-bottom: 0"></td>
        </tr>
        <tr class="subpub">
          <td class="tfirst subpub" style="border-top: 0; border-bottom: 0"><h3>Rental Real Estate 101</h3>
            <p></p></td>
          <td style="border-top: 0; border-bottom: 0"> Delivered By Email </td>
          <td class="tlast" style="border-top: 0; border-bottom: 0"></td>
        </tr>
        <tr class="subpub">
          <td class="tfirst subpub" style="border-top: 0; border-bottom: 0"><h3>How to Start a Million Dollar Business</h3>
            <p></p></td>
          <td style="border-top: 0; border-bottom: 0"> Delivered By Email </td>
          <td class="tlast" style="border-top: 0; border-bottom: 0"></td>
        </tr>
        <tr class="subpub">
          <td class="tfirst subpub" style="border-top: 0; border-bottom: 0"><h3>Collecting 101</h3>
            <p></p></td>
          <td style="border-top: 0; border-bottom: 0"> Delivered By Email </td>
          <td class="tlast" style="border-top: 0; border-bottom: 0"></td>
        </tr>
      
      
        <?  }
else{
$clb = 'asd'; 	
  }
}
?>

<!-- Retirement Insider-->
<?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("8343");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("8343")){ ?>
        <tr>
          <td class="tfirst"><h3>Retirement Insider</h3></td>
          <td><?php echo $pblstatus; ?></td>
          <td class="tlast"><a href="/monthly-issues/?filter=pri"><img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>
        <?  }
else{
$pri = 'asd'; 	
  }
 unset($auth_container);

}
?>




<!-- Creating Wealth and/or PBL - PubCode-->
<?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("9191");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("9191")){ ?>
        <tr>
          <td class="tfirst"><h3>Creating Wealth</h3></td>
          <td><?php echo $pblstatus; ?></td>
          <td class="tlast"><a href="/creating-wealth-user-guide/"><img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>
        <?  }
else{
$cwe1 = 'asd'; 	
  }
 unset($auth_container);

}
?>


        <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("5927");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("5927")){ ?>
        <tr>
          <td class="tfirst"><h3>Legacy Portfolio</h3></td>
          <td><?php echo $pblstatus; ?><?php echo $p8status; ?></td>
          <td class="tlast"><a href="/legacy-portfolio-user-guide/"><img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>
        <?  }
else{
$leg = 'asd'; 	
  }
 unset($auth_container);

}
?>
        <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("4757");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("4757")){ ?>
        <tr>
          <td class="tfirst"><h3>Extra Income Opportunity</h3></td>
          <td><?php echo $pblstatus; ?></td>
          <td class="tlast"><a href="/extra-income-user-guide/"><img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>
        <?  }
else{
$eio = 'asd'; 	
  }
 unset($auth_container);

}
?>
        <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("4785");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("4785")){ ?>
        <tr>
          <td class="tfirst"><h3>Perpetual Income Program</h3></td>
          <td><?php echo $pblstatus; ?></td>

          <td class="tlast"><a href="/issue/?filter=pip"><img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>
        <?  }
else{
$pip = 'asd'; 	
  }
 unset($auth_container);

}
?>
       <?php /*?> <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("4777");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("4777")){ ?>
        <tr>
          <td class="tfirst"><h3>Tom’s Confidential</h3></td>
          <td><?php echo $pblstatus; ?></td>
          <td class="tlast"><a href="/toms-confidential-user-guide/"> <img src="http://files.csinvesting.com/images/sites/pbl/enter-btn_5SYF39QHDJ.png" alt="" class="png-fix"></a></td>
        </tr>
        <?  }
else{
$tom = 'asd'; 	
  }
 unset($auth_container);
}
?>
<?php */?>




    <?php /*?>    <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("4777");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("4777")){ ?>
        <tr>
          <td class="tfirst"><h3>The Community</h3></td>
          <td><?php echo $pblstatus; ?></td>
          <td class="tlast"><a href="http://tom.palmbeachletter.com" target="_blank"> <img src="http://files.csinvesting.com/images/sites/pbl/visit-site-btn_ZRFOWHMG9J.png" alt="" class="png-fix"></a></td>
        </tr>
        <?  }
else{
$tom = 'asd'; 	
  }
 unset($auth_container);
}
?><?php */?>

  <?php 
  if(class_exists('agora_auth_container')){
  $auth_container = new agora_auth_container("7985");
  $auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
  if($auth_container->is_allowed("7985")){ ?>
        <tr>
          <td class="tfirst"><h3>C.A.P. Strategy Course</h3></td>
          <td><?php echo $pblstatus; ?></td>
          <td class="tlast"><a href="http://capcashflow.com" target="_blank"> <img src="http://files.csinvesting.com/images/sites/pbl/visit-site-btn_ZRFOWHMG9J.png" alt="" class="png-fix"></a></td>
        </tr>
        <?  }
else{
$cap = 'asd'; 	
  }
 unset($auth_container);
}
?>






      
      </tbody>
    </table>
    <?php the_content( __( 'Read more &#8250;', 'responsive' ) );?>
  </div>
  <!-- end of .post-entry -->
  <?php responsive_entry_bottom(); ?>
</div>

<?php if (!empty($extracontent)) { ?>
<div class="moreInfo" style=" <?php echo $extracontentstyle; ?> ">
  <p class="title"> You might also enjoy these <em>Palm Beach Research</em> products... </p>
  <table class="subscription" cellpadding="0" cellspacing="0" border="0" width="100%">
    <colgroup>
    <col width="53%">
    <col width="20%">
    <col width="27%">
    </colgroup>
    <tbody>
      <?php
} else { ?>
      <?php }
?>
      <?php if (!empty($pb1)) { ?>
      <?php
} else { ?>
      <?php }
?>
    
      <?php if (!empty($jpt)) { ?>
      <tr>
        <td class="tfirst"><h3>Jump Point Trader</h3>
          <p></p></td>
        <td>&nbsp;</td>
        <td class="tlast"><a target="_blank" href="http://pro1.palmbeachgroup.com/368457/"><img src="http://files.csinvesting.com/images/sites/pbl/learn-more-btn_LO1IYMHXVN.png" alt="" class="png-fix"></a></td>
      </tr>
      <?php
} else { ?>
      <?php }
?>

    
    
      <?php if (!empty($pbn)) { ?>
      <tr>
        <td class="tfirst"><h3>Palm Beach Current Income</h3>
          <p></p></td>
        <td>&nbsp;</td>
        <td class="tlast"><a target="_blank" href="http://pro1.palmbeachgroup.com/368460/"> <img src="http://files.csinvesting.com/images/sites/pbl/learn-more-btn_LO1IYMHXVN.png" alt="" class="png-fix"></a></td>
      </tr>
      <?php
} else { ?>
      <?php }
?>


      <?php if (!empty($cwe)) { ?>
      <tr>
        <td class="tfirst"><h3>Creating Wealth</h3>
          <p></p></td>
        <td>&nbsp;</td>
        <td class="tlast"><a target="_blank" href="http://pro1.palmbeachgroup.com/362446/"><img src="http://files.csinvesting.com/images/sites/pbl/learn-more-btn_LO1IYMHXVN.png" alt="" class="png-fix"></a></td>
      </tr>
      <?php
} else { ?>
      <?php }
?>

      <?php if (!empty($clb)) { ?>
      <tr>
        <td class="tfirst"><h3>Wealth Builders Club</h3>
          <p></p></td>
        <td>&nbsp;</td>
        <td class="tlast"><a target="_blank" href="http://pro1.palmbeachgroup.com/368455/"><img src="http://files.csinvesting.com/images/sites/pbl/learn-more-btn_LO1IYMHXVN.png" alt="" class="png-fix"></a></td>
      </tr>
      <?php
} else { ?>
      <?php }
?>
      <?php if (!empty($leg)) { ?>
      <tr>
        <td class="tfirst"><h3>Legacy Portfolio</h3>
          <p></p></td>
        <td>&nbsp;</td>
        <td class="tlast"><a target="_blank" href="http://pro1.palmbeachletter.com/359013/"><img src="http://files.csinvesting.com/images/sites/pbl/learn-more-btn_LO1IYMHXVN.png" alt="" class="png-fix"></a></td>
      </tr>
      <?php
} else { ?>
      <?php }
?>
     
    <?php /*?>  <?php if (!empty($eio)) { ?>
      <tr style="display:none;">
        <td class="tfirst"><h3>Extra Income Opportunity</h3>
          <p></p></td>
        <td>&nbsp;</td>
        <td class="tlast"><a target="_blank" href="http://files.csinvesting.com/files/orphan/ComingSoon_5O2RULD474.html"><img src="http://files.csinvesting.com/images/sites/pbl/learn-more-btn_LO1IYMHXVN.png" alt="" class="png-fix"></a></td>
      </tr>
      <?php
} else { ?>
      <?php }
?><?php */?>
      <?php if (!empty($ifl)) { ?>
      <tr>
        <td class="tfirst"><h3>Income for Life</h3>
          <p></p></td>
        <td>&nbsp;</td>
        <td class="tlast"><a target="_blank" href="http://pro1.palmbeachletter.com/330917/"><img src="http://files.csinvesting.com/images/sites/pbl/learn-more-btn_LO1IYMHXVN.png" alt="" class="png-fix"></a></td>
      </tr>
      <?php
} else { ?>
      <?php }
?>
    
      
     
    
      <?php if (!empty($cap)) { ?>
      <tr>
        <td class="tfirst"><h3>C.A.P. Strategy Course</h3>
          <p></p></td>
        <td>&nbsp;</td>
        <td class="tlast"><a target="_blank" href="http://pro1.palmbeachgroup.com/368458/"><img src="http://files.csinvesting.com/images/sites/pbl/learn-more-btn_LO1IYMHXVN.png" alt="" class="png-fix"></a></td>
      </tr>
      <?php
} else { ?>
      <?php }
?>


  <?php if (!empty($mti)) { ?>
      <tr>
        <td class="tfirst"><h3>Mega Trends Investing</h3>
          <p></p></td>
        <td>&nbsp;</td>
        <td class="tlast"><a target="_blank" href="http://pro1.palmbeachgroup.com/361817/ "><img src="http://files.csinvesting.com/images/sites/pbl/learn-more-btn_LO1IYMHXVN.png" alt="" class="png-fix"></a></td>
      </tr>
      <?php
} else { ?>
      <?php }
?>


      <!-- end of #post-<?php the_ID(); ?> -->
      <?php responsive_entry_after(); ?>
      <?php responsive_comments_before(); ?>
      <?php comments_template( '', true ); ?>
      <?php responsive_comments_after(); ?>
      <?php
		endwhile;

		get_template_part( 'loop-nav' );

	else :


		get_template_part( 'loop-no-posts' );

	endif;
	?>
    </tbody>
  </table>
</div>
</div>
</div>
</div>
<!-- end of #content -->
<?php get_footer(); ?>
