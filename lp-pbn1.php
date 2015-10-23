<?php

function doLandingPage($slug, $pub = ''){
    $landingPage = '';

    $params = array(
	'p' => '5551',
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
                'terms' => 'static_content'
            )
        )
    );
    $Q = new WP_Query($params);

    $title = $Q->post->post_title;
    $body = get_post_meta($Q->post->ID, 'wpcf-content');

    if (is_array($body))
        $body = reset($body);

    ob_start();
    ?>
    <div class="m-cols ">

        <div id="content" class="grid-right col-620 fit">
            <div style="border-bottom:1px solid #eee;color: #649079;font: bold 28px/1.1em Arial, Helvetica, sans-serif;margin: 0;
padding: 10px 0 10px 24px;"><?= $title ?></div>
            <div class="contt">
                <?= $body ?>
            </div>
        </div>
        <?php get_sidebar('left'); ?>
    </div>

    <?php
    $landingPage = ob_get_contents();
    ob_end_clean();
    return $landingPage;
}