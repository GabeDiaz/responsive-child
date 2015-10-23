<?php get_header('single-post');
if(have_posts()) : the_post(); ?>

    <table width="100%" cellspacing="0" cellpadding="10" border="0">
        <tbody><tr>
            <td valign="top" height="150" bgcolor="#DCEDE4" align="left"><table width="100%" cellspacing="0" cellpadding="1" border="0">
                    <tbody><tr>
                        <td valign="top" bgcolor="#CCCCCC" align="left">
                            <div class="content_block">
                                <div class="txt_controls">
                                    <span>Text size</span>
                                    <a class="plus" style="text-decoration: none; outline:none;" href="">
                                        <img style="border:none;" src="<?php bloginfo('template_directory');?>/core/images/tc_plus.gif" width="12" height="12" alt="" title="">
                                    </a>
                                    <a class="minus" style="text-decoration: none; outline:none;" href="">
                                        <img style="border:none;" src="<?php bloginfo('template_directory');?>/core/images/tc_minus.gif" width="12" height="12" alt="" title="">
                                    </a>
                                    <span>Print</span>
                                    <img onclick="window.print();" src="<?php bloginfo('template_directory');?>/core/images/tc_print.gif" width="12" height="12" alt="" title="">
                                </div>
                                <table width="100%" cellspacing="0" cellpadding="20" border="0">
                                    <tbody>
                                    <tr>
                                        <td bgcolor="#FFFFFF">
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




                                                            <center>
                                                                <table width="100%" border="0" cellspacing="10" cellpadding="0">
                                                                    <tbody><tr>
                                                                        <td>
                                                                            <div align="center">
                                                                                <font face="Georgia, Arial, Helvetica, sans-serif" size="5"><b id="updateTitle"><?php the_title();?></b></font>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody></table>
                                                                <?php
                                                                $subhead = types_render_field('subhead', array("output"=>"html"));
                                                                if(!empty($subhead)) : ?>
                                                                    <font size="4" face="Georgia, Arial, Helvetica, sans-serif">


                                                                <span id="SubHeadline">

                                                                        <i><?php echo $subhead;?></i>

                                                                </span>
                                                                        <br>
                                                                    </font>
                                                                <?php endif;?>

                                                              <?php if(get_the_author_meta('ID') != 1) : ?>
<font size="3" face="Georgia, Arial, Helvetica, sans-serif">
<span id="essayEditor">By 
<?php if(function_exists( 'coauthors' ) ) {
    coauthors();
} else {
	get_the_author();
}
?>
                                                                     </span>

                                                                    </font>
                                                                <?php endif;?>
                                                            </center>
                                                            <font size="3" face="Georgia, Arial, Helvetica, sans-serif">
                                                                
<?php echo types_render_field('body', array("output"=>"html"));?>
<?php echo types_render_field('bottom-note', array("output"=>"html"));?>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </font>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr></tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
<?php endif; ?>


<?php get_footer('single-post');?>
