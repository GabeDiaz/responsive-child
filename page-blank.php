<?php
/*
Template Name: Blank Page
*/

if( !defined( 'ABSPATH' ) ) {
    exit;
}?>
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

        <link rel="profile" href="http://gmpg.org/xfn/11"/>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

        <!-- Start Flexslider -->
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/flexslider.css" type="text/css"/>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.flexslider.js"></script>
        <!-- Place in the <head>, after the three links -->
        <script type="text/javascript" charset="utf-8">
            $(window).load(function() {
                $('.flexslider').flexslider({
                    directionNav: false,
                    slideshow: true,
                    slideshowSpeed: 7500,
                    touch: true,
                    pauseOnAction: false
                });
            });
        </script>

       <?php wp_head(); ?>
       
       
       <style type="text/css">
       input.wpcf7-form-control.wpcf7-text.wpcf7-tel.wpcf7-validates-as-tel {
/* padding: 5px; */
-moz-box-sizing: border-box;
-moz-border-radius: 2px;
-webkit-box-sizing: border-box;
-webkit-border-radius: 2px;
-webkit-box-shadow: 0 1px 0 #ffffff, inset 0 1px 1px rgba(0, 0, 0, 0.2);
-moz-box-shadow: 0 1px 0 #ffffff, inset 0 1px 1px rgba(0, 0, 0, 0.2);
box-shadow: 0 1px 0 #ffffff, inset 0 1px 1px rgba(0, 0, 0, 0.2);
background-color: #ffffff;
box-sizing: border-box;
border: 1px solid #aaaaaa;
border-bottom-color: #cccccc;
border-radius: 2px;
cursor: text;
margin: 0;
outline: none;
padding: 6px 8px;
vertical-align: middle;
max-width: 100%;
}
span.wpcf7-not-valid-tip-no-ajax {
color: #f00;
font-size: 10pt;
display: none;
}
div.wpcf7-validation-errors {
border: 2px solid #F70000;
}
input.wpcf7-form-control.wpcf7-submit {
height: 40px;
width: 110px;
font-size: 21px;
}
       </style>
    </head>

<body style="background-color:#fff;">
<?php the_content('Read more...'); ?>
</body>
</html>


