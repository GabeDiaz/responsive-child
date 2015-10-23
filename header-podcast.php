<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Header Template
 *
 *
 * @file           header.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.3
 * @filesource     wp-content/themes/responsive/header.php
 * @link           http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 * @since          available since Release 1.0
 */
?>
    <!doctype html>
    <!--[if !IE]>
    <html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
    <!--[if IE 7 ]>
    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
    <!--[if IE 8 ]>
    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
    <!--[if IE 9 ]>
    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
    <!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo( 'siteurl' ); ?>/favicon.ico" />
    <link rel="icon" type="image/x-icon" href="<?php bloginfo( 'siteurl' ); ?>/favicon.ico" />

    <title><?php wp_title( '&#124;', true, 'right' ); ?></title>

<!--    <script src="./The Palm Beach Letter_files/md_stylechanger.js" type="text/javascript"></script>-->

    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-235360-15']);
        _gaq.push(['_setDomainName', 'palmbeachletter.com']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
    <?php wp_head(); ?>
  
</head>
<body marginwidth="0" marginheight="0" bgcolor="#fcf9f3" topmargin="0" leftmargin="0" class="single-post-tablefix">

<?php global $wp_query;
$category = get_the_category( $wp_query->post->ID );
$img = get_stylesheet_directory_uri() . "/pub-images/" . $category[0]->slug . ".gif";
$pubcode = $wp_query->query['pubcode'];
if(file_exists(get_stylesheet_directory() . "/pub-images/" . $category[0]->slug . ".gif")){
    $img = get_stylesheet_directory_uri() . "/pub-images/" . $category[0]->slug . ".gif";
}
elseif(file_exists(get_stylesheet_directory() . "/pub-images/" . $pubcode . ".gif")){
    $img = get_stylesheet_directory_uri() . "/pub-images/" . $pubcode . ".gif";
}
elseif(file_exists(get_stylesheet_directory() . "/pub-images/" . $pubcode . ".gif")){
    $img = get_stylesheet_directory_uri() . "/pub-images/" . $pubcode . ".gif";
}
?>
<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fcf9f3">
    <tbody>
    <tr>
        <td>
            <table width="680" cellspacing="0" cellpadding="0" border="0" align="center">
                <tbody><tr>
                    <td>&nbsp;</td>
                </tr>
                </tbody>
            </table>
            <table class="single-post" width="680" cellspacing="0" cellpadding="1" border="0" align="center">
                <tbody><tr>
                    <td bgcolor="#CCCCCC"><table width="100%" cellspacing="0" cellpadding="1" border="0" align="center">
                            <tbody><tr>
                                <td bgcolor="#fcf9f3"><table width="100%" cellspacing="0" cellpadding="10" border="0" align="center">
                                        <tbody><tr>
                                            <td valign="top" height="405" bgcolor="#FFFFFF" align="left">
                                                <table width="100%" cellspacing="0" cellpadding="0" border="0" class="header_tbl">
                                                    <tbody><tr>
                                                        <td valign="top" bgcolor="#DCEDE4" align="left"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody><tr>
                                                                <td class="gluing-images" width="232" valign="top" align="left" rowspan="2"><a style="border-width: 0px; margin: 0px; padding: 0px" href="<?php bloginfo('siteurl');?>" target="_blank">
                                                                        <img style="border-width: 0px; margin: 0px; padding: 0px" alt="" src="<?php bloginfo('template_directory');?>/core/images/PBLLogo.gif"></a></td>

<td class="fix-td" valign="top" align="left" colspan="2"><img alt="" src="http://palmbeachletter.com/wp-content/themes/responsive-child/pub-images/tom.gif"></td>

                                                            </tr>
                                                            <tr>
                                                                <td width="415" valign="top" align="right"><font size="3" face="Georgia, Arial, Helvetica, sans-serif"><?php the_date('F j, Y')?></font></td>
                                                                <td width="13" valign="top" align="right"><img width="1" height="38" src="/images/1x1GRNpixel.gif"></td>
                                                            </tr>
                                                            </tbody></table></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                
