<?php

function doLandingPage($slug, $pub = ''){
    $landingPage = '';

    $params = array(
        'order' => 'DESC',
        'orderby' => 'date',
        'posts_per_page' => 1,
        'tax_query' => array(
            array(
                'taxonomy' => 'pubcode',
                'field' => 'slug',
                'terms' => $slug
            ),
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'monthly-issues'
            )
        )
    );
    $Q = new WP_Query($params);

    $title = $Q->post->post_title;
    $top = get_post_meta($Q->post->ID, 'wpcf-web-blurb-top-note');
    $body = get_post_meta($Q->post->ID, 'wpcf-web-blurb-body');
    $bottom = get_post_meta($Q->post->ID, 'wpcf-web-blurb-bottom-note');

    if (is_array($top))
        $top = reset($top);

    if (is_array($body))
        $body = reset($body);

    if (is_array($bottom))
        $bottom = reset($bottom);

    ob_start();
    ?>
    <div class="m-cols ">

    <div id="content" class="grid-right col-620 fit">

    <div style="border-bottom:1px solid #eee;color: #649079;font: bold 28px/1.1em Arial, Helvetica, sans-serif;margin: 0;
padding: 10px 0 10px 0px;">Current Issue</div>
    <div class="contt" style="font-family:Georgia;font-size:16px;">
        <?=$top?>
        <?=$body?>
        <?=$bottom?>
    </div>
    </div>
        <?php get_sidebar('pbl-left'); ?>
    </div>

    <?php
    $landingPage = ob_get_contents();
    ob_end_clean();
    return $landingPage;
}