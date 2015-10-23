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
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
                      <head>
                      <meta charset="<?php bloginfo( 'charset' ); ?>"/>
                      <meta name="viewport" content="width=device-width, initial-scale=1.0">
                      <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo( 'siteurl' ); ?>/favicon.ico" />
                      <link rel="icon" type="image/x-icon" href="<?php bloginfo( 'siteurl' ); ?>/favicon.ico" />
                      <title>
                      <?php wp_title( '&#124;', true, 'right' ); ?>
                      </title>
                      <script type="text/javascript" src="http://palmbeachletter.com/wp-includes/js/jquery/jquery.js?ver=1.10.2"></script>
                      
<script type="text/javascript" src="http://palmbeachletter.com/wp-includes/js/jquery/jquery.js?ver=1.10.2"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/stylechanger.js"></script>
    <script type="text/javascript">
        var fonts;
        jQuery(function($){

                setUserOptions();
                fonts = $(".content_block font");
                $(".plus").click(function () {
                    ChangeVisible(1);
                    return false;
                });

                $(".minus").click(function () {
                    ChangeVisible(-1);
                    return false;
                });


            function ChangeVisible(size) {
                changeFontSize(size);
                for (var i = 0; i < fonts.length; i++) {
                    var currentFont = fonts[i];
                    var attrsize = $(currentFont).attr("size");
                    var newSize;
                    if (attrsize != "") {
                        if (size == 1) {
                            newSize = parseInt(attrsize, 10) + 1;
                            $(currentFont).attr("size", newSize);
                        }
                        else {
                            newSize = attrsize - 1;
                            $(currentFont).attr("size", newSize);
                        }
                    }
                    fonts[i] = currentFont;
                }
                var fontSize = GetFontSize();
                if (fontSize == 120) {
                    $(".txt_controls .plus").addClass("noactive");
                    $(".txt_controls .minus").removeClass("noactive");
                }
                if (fontSize == 80) {
                    $(".txt_controls .plus").removeClass("noactive");
                    $(".txt_controls .minus").addClass("noactive");
                }
                if (fontSize >= 90 && fontSize < 120) {
                    $(".txt_controls .plus").removeClass("noactive");
                    $(".txt_controls .minus").removeClass("noactive");
                }
            };});

    </script>
                      
</head>
                      <body marginwidth="0" marginheight="0" topmargin="0" leftmargin="0" class="single-post-tablefix">
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
?>
<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fcf9f3">
<tbody>
                        <tr>
    <td><table width="650" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table>
                            <table class="single-post" width="650" cellspacing="0" cellpadding="1" border="0" align="center">
                            <tbody>
        <tr>
                                <td bgcolor="#CCCCCC"><table width="100%" cellspacing="0" cellpadding="1" border="0" align="center">
            <tbody>
                                    <tr>
                <td bgcolor="#fcf9f3"><table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                        <tbody>
                    <tr>
                                            <td valign="top" height="405" bgcolor="#FFFFFF" align="left"><table width="100%" cellspacing="0" cellpadding="0" border="0" class="header_tbl">
                                                <tbody>
                                                <tr>
                                                    <td valign="top" bgcolor="#ffffff" align="left"><table width="650" border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                        <td bgcolor="#ffffff" align="center" valign="middle" colspan="4"><img class="header-image" src="http://files.csinvesting.com/images/emailGraphics/headers/cw_header_final1_fw_PUAVHTGE48.png" alt="Mark Ford's Creating Wealth" border="0" align="middle"></td>
                                                      </tr>
                                        
                                                      </table></td>
                                                  </tr>
                                              </tbody>
                                              </table>
