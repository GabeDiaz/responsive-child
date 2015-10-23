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
<div style="float:left; width:50%;color: #000000;  font-size: 10px;    margin-left: 13px;    margin-top: 12px;  margin-bottom: 10px;  height: 25px;font-family: Georgia, serif;font-size: 16px;">
</div>
<div class="txt_controls" style="color: #666666;font-size: 10px;font-family: Verdana;margin-right: 13px;text-align: right;margin-top: 12px;margin-bottom:10px;height: 25px;width: 25%;float:right;"> <span>Text size</span> <a class="plus" style="text-decoration: none; outline:none;" href=""> <img style="border:none;" src="http://files.csinvesting.com/images/MTI/site/tc_plus.gif" width="12" height="12" alt="" title=""> </a> <a class="minus" style="text-decoration: none; outline:none;" href=""> <img style="border:none;" src="http://files.csinvesting.com/images/MTI/site/tc_minus.gif" width="12" height="12" alt="" title=""> </a> <span>Print</span> <img onclick="window.print();" src="http://files.csinvesting.com/images/MTI/site/tc_print.gif" width="12" height="12" alt="" title=""> </div>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody>
    <tr>
      <td valign="top" height="150" bgcolor="#ffffff" align="left"><div class="content_block"> <font size="3" face="Georgia, Arial, Helvetica, sans-serif">
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
                          <td><div align="center"><font face="Georgia, Arial, Helvetica, sans-serif" size="5"><strong id="updateTitle">
                              <?php the_title();?>
                              </strong></font></div></td>
                        </tr>
                      </tbody>
                    </table>
                    <?php $subhead = types_render_field('subhead', array("output"=>"html")); if(!empty($subhead)) : ?>
                    <font size="4" face="Georgia, Arial, Helvetica, sans-serif"><span width="580px" id="SubHeadline"><i><?php echo $subhead;?></i></span></font>
                    <?php endif;?>
                    <?php if(get_the_author_meta('ID') != 1) : ?>
                    <font size="3" face="Georgia, Arial, Helvetica, sans-serif"> <span id="essayEditor">By
                    <?php if(function_exists( 'coauthors' ) ) {
    coauthors();
} else {
	get_the_author();
}
?>
                    </span></font><br>
                    <?php endif;?>
                  </div>
                  <font size="3" face="Georgia, Arial, Helvetica, sans-serif">
                  <?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>


                    <?php $bottomnote = types_render_field('bottom-note', array("output"=>"html")); if(!empty($subhead)) : ?>
                   <?php echo $bottomnote;?>
                    <?php endif;?>

<?php
if ( !is_user_logged_in() ) {
echo types_render_field('bottom-note', array("output"=>"html"));
} else {
}
?>

                  </font></td>
              </tr>
            </tbody>
          </table>
          </font> </div></td>
      <td valign="top" bgcolor="#ffffff" align="left">&nbsp;</td>
    </tr>
  </tbody>
</table>
<?php endif; ?>
<?php get_footer('single-post');?>
