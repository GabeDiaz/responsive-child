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
    </script>
    
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
    
                      <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/single-email.css">
                      
                      </head>
                      
<body marginwidth="0" marginheight="0" topmargin="0" leftmargin="0" class="single-post-tablefix <?php echo $term->slug ?> <?php foreach( $product_terms as $term ) { echo ' ' . $term->name . ' '; } ?>
">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
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
                                                        <td bgcolor="#ffffff" align="center" valign="middle" colspan="4" <?php post_class(); ?>><a href="#" style="width:100%; height:100%; display:block;">&nbsp;</a></td>
                                                      </tr>
                                                      </table></td>
                                                  </tr>
                                              </tbody>
                                              </table>
