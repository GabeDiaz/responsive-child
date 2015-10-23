<?php
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

global $wp_query;

$category = $wp_query->query_vars['category_name'];
$pub = $wp_query->query_vars['term'];
$count = $wp_query->post_count;
if(isset($wp_query->query['year']))
{
    $year = $wp_query->query['year'];
}
else
{
    $year = pbl_filter_where($pub, $category);
}

get_header('login'); ?>


<?php get_template_part( 'lib/subscriber', 'welcome' ); ?>

<?php
$slug = NULL;
if (isset($post)){
    $terms = wp_get_post_terms($post->ID, 'pubcode');

    if (!empty($terms)){
        $slug = reset($terms)->slug;

    }
}

if($slug == 'pbn'){

    if($wp_query->query['pbn_separate'] == 1)
        $slug = 'pbn_webinar';
    elseif($wp_query->query['pbn_separate'] == 2)
        $slug = 'pbn_weekly';
    elseif(!isset($wp_query->query['pbn_separate'])){

    }
}
if (file_exists(__DIR__ . '/lp-' . $slug . '.php')){
    require_once __DIR__ . '/lp-' . $slug . '.php';
}
?>


<?php
if (function_exists('doLandingPage')){
    echo doLandingPage($slug, $pub);
} else {
    ?>

<div class="m-cols ">

    <div id="content" class="grid-right col-620 fit">


        <?php
        add_filter('pre_get_posts', 'pbl_set_order', 11);
        $params = array(
            'category_name' => $category,
			'post_type' => 'post',
            'order' => 'DESC',
            'orderby' => 'date',
            'tax_query' => array(
                array(
                'taxonomy' => 'pubcode',
                'field' => 'slug',
                'terms' => $pub
                )
            )
        );
        $Q = new WP_Query($params); ?>

        <?php if( $Q->have_posts() ) : ?>
            <div class="contt">
            <div class="archive_block fleft">
            <?php for($i=0; $i<floor($count/2); $i++) : $Q->the_post();
                $category = get_the_category( $Q->post->ID ); ?>

                <div class="box">
                    <a href="<?php bloginfo('siteurl')?>/<?=$Q->post->post_name;?>" target="_blank">
                        <?php the_title();?>
                    </a>
                    <span><?php echo types_render_field('recommendation', array("output"=>"html"));?></span>
                    <span class="date"><?php the_time('F j, Y');?></span>
                </div>

            <?php
            endfor;
            ?>
              </div>
            <div class="archive_block fright">
                <?php
                for($i=ceil($count/2); $i<$count; $i++)
                {
                    $Q->the_post();
                    ?>
                    <div class="box">
                        <a href="<?php bloginfo('siteurl')?>/<?=$Q->post->post_name;?>" target="_blank">
                            <?php the_title();?>
                        </a>
                        <span><?php echo types_render_field('recommendation', array("output"=>"html"));?></span>
                        <span class="date"><?php the_time('F j, Y');?></span>
                    </div>
                <?php
                }
                ?></div>
            </div><div class="note">
        
            Note: Click the “Start Here” tab to the left to learn more.
        <?php 
if ($pub=='leg')
{
echo 'Legacy Portfolio';
}
else if ($pub=='pip')
{
echo 'Perpetual Income Portfolio';
}
else if ($pub=='pbl')
{
echo 'Palm Beach Letter';
}
		?>
            </div>
    <?php
        endif;
        ?>

    </div>

    <?php
    the_post();
    //$wp_query = $a;
    get_sidebar('left'); ?>
</div><!-- end of #content-archive -->
<?php } ?>



<?php get_footer(); ?>