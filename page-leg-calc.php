<?php
/*
Template Name: Legacy Calculators
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
$(document).ready(function(){


var regexDollars=/[^0-9.-]+/g;

var cmCalc1_result=0;
function cmCalc1(){
    cmCalc1_result=(parseFloat($("#cmCalc1_com").val().replace(regexDollars,''))*100).toFixed(2);
    if($.isNumeric(cmCalc1_result)){cmCalc1_resultfiltered="$"+cmCalc1_result;}else{cmCalc1_resultfiltered="$0.00";}
    $("#cmCalc1_result").html(cmCalc1_resultfiltered).queue(function (next){$(this).css("color","red");next();}).delay(100).queue(function (next){$(this).css("color","black");next();}).delay(100);
};
$('#cmCalc1_com').keyup(function(){
    cmCalc1();
});
cmCalc1();

var cmCalc2_result=0;
function cmCalc2(){
    cmCalc2_result=(parseFloat($("#cmCalc2_max").val().replace(regexDollars,''))/parseFloat($("#cmCalc2_total").val().replace(regexDollars,''))*100).toFixed(2);
    if($.isNumeric(cmCalc2_result)){cmCalc2_resultfiltered=cmCalc2_result+"%";}else{cmCalc2_resultfiltered="0.00%";}
    $("#cmCalc2_result").html(cmCalc2_resultfiltered).queue(function (next){$(this).css("color","red");next();}).delay(100).queue(function (next){$(this).css("color","black");next();}).delay(100);
};
$('#cmCalc2_total,#cmCalc2_max').keyup(function(){
    cmCalc2();
});
cmCalc2();

var cmCalc3_result=0;
function cmCalc3(){
    cmCalc3_result=(parseFloat(("$"+(parseFloat($("#cmCalc3_max").val())/100.0)).replace(regexDollars,''))*parseFloat($("#cmCalc3_total").val().replace(regexDollars,''))).toFixed(2);
    if($.isNumeric(cmCalc3_result)){cmCalc3_resultfiltered="$"+cmCalc3_result;}else{cmCalc3_resultfiltered="$0.00";}
    $("#cmCalc3_result").html(cmCalc3_resultfiltered).queue(function (next){$(this).css("color","red");next();}).delay(100).queue(function (next){$(this).css("color","black");next();}).delay(100);
};
$('#cmCalc3_total,#cmCalc3_max').keyup(function(){
    cmCalc3();
});
cmCalc3();

$('.cmCalc input[type=text]').focus(function(){defaultText=$(this).val();$(this).val("");});
$('.cmCalc input[type=text]').blur(function(){if($(this).val()==""){$(this).val(defaultText);}});

});
</script>


<style type="text/css">

    .cmCalc{display:block;border:1px solid #ddd;margin:20px auto;width:300px;font:12px/1.3em arial,sans-serif;overflow:hidden;
        box-shadow:0 0 5px rgba(0,0,0,.3);border-radius:10px;}
    .cmCalc p{margin:0;padding:10px 20px;text-align:center;}
    .cmCalcHead{font-weight:700;background:#666;font-size:16px;line-height:1.3em}
    .cmCalcSubhead{background:#999}
    .cmCalcSubhead2{background:#ccc}

    .cmLabel{padding-bottom:10px;display:block;}    
    .cmCalc input,.cmResult div{width:100%;text-align:center;border:1px solid #ddd;background:#fff;padding:4px;font:12px/1.3em arial,sans-serif;box-sizing:border-box;}
    .cmResult div{background:#ff0}
    .cmResult,.cmResult div{font-weight:700}
    .cmLabel,.cmResult{overflow:hidden}

    .cmCalcData{padding:20px;background:#eee}

</style>

<div class="login-subs" style="min-height: 30px; height: 35px;">
  <div style="display: inline; float: right; text-align: right;">
    <ul class="menu">
      <li class="menu-item-solo"> <a href="<?php bloginfo('siteurl')?>/my-subscriptions"> My Subscriptions </a> </li>
    </ul>
  </div>
  <div style="font-family: Georgia, Times New Roman, Helvetica, sans-serif;font-size: 30px;font-style: normal;color: #444;border-bottom: 1px solid #ccc;padding: 6px 0 12px 0px;">

	<?php $terms = get_the_terms( $post->ID , 'pubcode' );
if($terms) {
foreach( $terms as $term ) {
echo '<div class="authorbio">'.$term->description.'<br /></div>';
}
}
?>
    <?php /*?>

<?php echo get_category_parents( $cat, true, ' &raquo; ' ); ?>
<?php echo get_category_parents( get_query_var('cat') , false , '' ); ?>
    <?php the_category(' &gt; '); ?>
	
	<?php $terms = get_the_terms( $post->ID , 'pubcode' );
if($terms) {
foreach( $terms as $term ) {
echo '<div class="authorbio">'.$term->description.'<br /></div>';
}
}
?><?php */?>
  </div>
</div>
<div class="hide-mobile">
  <div class="label welcome-message">
    <h1>
    <?php echo __( 'Welcome, Subscriber'); ?>
    <h1>
  </div>
</div>
<div class="m-cols ">
          <div id="content" class="grid-right col-620 fit">

            <div style="border-bottom:1px solid #eee;color: #649079;font: bold 28px/1.1em Arial, Helvetica, sans-serif;margin: 0;
padding: 10px 0 10px 0px;"><?php the_title();?></div>


            <?php if( have_posts() ) : ?>
                <div class="contt">
					<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>

                </div>

<?php
            endif;
            ?>

        </div>
  <!-- end of #content-archive --> 
  <!-- start-widgets -->

<?php get_sidebar('leg-left'); ?>

</div>

<?php get_footer(); ?>
