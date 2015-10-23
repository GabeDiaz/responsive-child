<!doctype html>
<?php $product_terms = wp_get_object_terms( $post->ID,  'pubcode' ); ?>

<?php /*?><?php $terms = get_the_terms( $post->ID , 'pubcode' );
if($terms) {
foreach( $terms as $term ) {
echo $term->slug;
}
}
$term_list = wp_get_post_terms($post->ID, 'pubcode', array("fields" => "names"));
print_r($term_list);
?><?php */?>
<?php /*?><?php echo $term_list ?>
<?php */?>
<?php /*?><?php $product_terms = wp_get_object_terms( $post->ID,  'pubcode' );
if ( ! empty( $product_terms ) ) {
	if ( ! is_wp_error( $product_terms ) ) {
		echo '';
			foreach( $product_terms as $term ) {
				echo ' ' . $term->name . ' '; 
			}
		echo '';
	}
}

?>
<?php */?>


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
                      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
                if (fontSize == 100) {
                    $(".txt_controls .plus").addClass("noactive");
                    $(".txt_controls .minus").removeClass("noactive");
                }
                if (fontSize == 80) {
                    $(".txt_controls .plus").removeClass("noactive");
                    $(".txt_controls .minus").addClass("noactive");
                }
                if (fontSize >= 90 && fontSize < 100) {
                    $(".txt_controls .plus").removeClass("noactive");
                    $(".txt_controls .minus").removeClass("noactive");
                }
            };
});


$(document).ready(function(){
$('.single-post img').each(function(){
        if( $(this).attr('src').match("palmbeachletter.com/Images/bullet.png") ) {
            $(this).addClass('bullet-image');
        }
	        if( $(this).attr('src').match("cdn.palmbeachgroup.com/images/bullets/bullet-fleur.png") ) {
            $(this).addClass('bullet-image');
        }
		if( $(this).attr('src').match("files.csinvesting.com/images/birish.jpg") ) {
            $(this).addClass('birish-headshot');
        }
		if( $(this).attr('src').match("files.csinvesting.com/images/tomHeadshot_201309_XVPAPDUJRA.jpg") ) {
            $(this).addClass('birish-headshot');
        }
		if( $(this).attr('src').match("files.csinvesting.com/images/PBL_headshots-18_06QWFFRZWM.jpg") ) {
            $(this).addClass('birish-headshot');
        }
    });
});




    </script>
    

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57448704-1', 'auto');
  ga('send', 'pageview');

</script>

    
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/single-email.css">

<style type="text/css">
@media only screen and (max-width : 320px) {
table, tbody, tr, th{width:100%;}
.header-image{width:100%;}
.txt_controls {display:none;}
.PBL .category-monthly-issues {display:none;}
.PRI .category-monthly-issues {display:none;}
.MTI .category-monthly-issues {display:none;}
.CWE .category-monthly-issues {display:none;}
.MTI .category-reports {display:none;}
.MTI .category-updates {display:none;}
.Tom .category-updates {display:none;}
.PBL .category-updates {display:none;}
.PIP .category-issues {display:none;}
.LEG .category-issues {display:none;}
.PBN .category-weekly_issues {display:none;}
.CLB .category-content {display:none;}
.PBL .category-mark_fords_creating_wealth {display:none;}
.PBL .category-special-reports {display:none;}
.IFL.PBL .category-income-for-life {display:none;}
.IFL .category-income-for-life-premium {display:none;}

img{width:100%;}
.bullet-image{width:12px;}
.birish-headshot{height:163px; width:132px;display: none;}

.pub-title {display: block;background-color: #354a3e;color: #fff;padding: 10px 0;text-align: center;font-family: Georgia;font-size: 18px;text-shadow: 0px 1px #545454;}

.single-email-footer{line-height:.65em;}
}
</style>

<link rel="stylesheet" id="askpat-player-plugin-styles-css" href="http://palmbeachgroup.com/wp-content/plugins/smart-podcast-player/assets/css/style.css?ver=1.0.2" type="text/css" media="all">

<!-- Smart Podcast Player Custom Styles for color: #333-->
<style>
body.spp .smart-track-player .spp-track .spp-track-title {
  margin: 0;
  height: auto;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
}
body.spp .spp-player-container .spp-track .spp-track-title, body.spp .smart-track-player .spp-track .spp-track-title {
  font-weight: 400;
}
body.spp .smart-track-player {height: 100px;}
body.spp .smart-track-player.stp-color-333 .spp-track{background: #333;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-loaded{background: #FFF;opacity: .17;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-loaded-container{background: #333;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-button-download{background: #4c0400;color: #FFF;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-button-download:hover{background: #560500;color: #FFF;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-play{background-position: -66px 0;opacity: .71;}
body.spp .smart-track-player.stp-color-333.spp-playing .spp-track .spp-controls .spp-play{background-position: -14px 0 !important;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-play:hover{opacity: .9;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-dload{background-position: -94px -52px;opacity: .71;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-dload:hover{opacity: .9;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-dloada{background-position: -94px -52px;opacity: .71;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-dloada:hover{opacity: .9;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-speed{background-position: -12px -52px;opacity: .71;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-speed:hover{opacity: .9;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-share{background-position: -53px -52px;opacity: .71;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-controls .spp-share:hover{opacity: .9;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-track-title{color: #FFF;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-artist{color: #FFF;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-progress .spp-position:after{opacity: .5;background: #FFF;}
body.spp .smart-track-player.stp-color-333 .spp-track .spp-progress .spp-current-time{background: #FFF;opacity: .17;}
body.spp .smart-track-player.stp-color-333.spp-has-download .spp-duration{color: #FFF;opacity: 0.8;}
</style>

</head>
                      
<body marginwidth="0" marginheight="0" topmargin="0" leftmargin="0" class="single-post-tablefix <?php echo $term->slug ?> <?php foreach( $product_terms as $term ) { echo ' ' . $term->name . ' '; } ?>
">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
                        <tr>
    <td><table width="650" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody>
          <tr>
            <td>&nbsp;<div class="pub-title"><?php echo $term->description ?></div></td>
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
                                                        <td bgcolor="#ffffff" align="center" valign="middle" colspan="4" <?php post_class(); ?>><a href="http://palmbeachgroup.com" title="Palm Beach Research Group" style="width:100%; height:100%; display:block;"></a></td>
                                                      </tr>
                                                      </table></td>
                                                  </tr>
                                              </tbody>
                                              </table>