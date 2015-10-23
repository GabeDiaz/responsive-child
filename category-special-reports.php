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

<h6 class="title-archive" style="display:none;">
		 <?php if ( is_day() ) : ?>
        <?php printf( __( 'Daily Archives: <span>%s</span>', 'twentyten' ), get_the_date() ); ?>
    <?php elseif ( is_month() ) : ?>
        <?php printf( __( 'Monthly Archives: <span>%s</span>', 'twentyten' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyten' ) ) ); ?>
    <?php elseif ( is_year() ) : ?>
        <?php printf( __( 'Yearly Archives: <span>%s</span>', 'twentyten' ), get_the_date( _x( 'Y', 'yearly archives date format', 'twentyten' ) ) ); ?>
    <?php else : ?>
        <?php _e( 'Archives', 'twentyten' ); ?>
    <?php endif; ?>
	</h6>
    
<div class="login-subs" style="min-height: 30px; height: 35px;">
  <div style="display: inline; float: right; text-align: right;">
    <ul class="menu">
      <li class="menu-item-solo"> <a href="<?php bloginfo('siteurl')?>/my-subscriptions"> My Subscriptions </a> </li>
    </ul>
  </div>
  <div style="font-family: Georgia, Times New Roman, Helvetica, sans-serif;
font-size: 30px;
font-style: normal;
color: #444;
border-bottom: 1px solid #ccc;
padding: 6px 0 12px 0px;">


    <?php $terms = get_the_terms( $post->ID , 'pubcode' );
	if($terms) {
		foreach( $terms as $term ) {
		echo '<div class="authorbio">'.$term->description.'<br /></div>';
	}
}
?>
  </div>
</div>


    <div class="hide-mobile">
        <div class="label welcome-message">
            <h1><?php echo __( 'Welcome, Subscriber'); ?><h1>
        </div>
    </div>



    <div class="m-cols ">

        <div id="content" class="grid-right col-620 fit">

            <div style="border-bottom:1px solid #eee;color: #649079;font: bold 28px/1.1em Arial, Helvetica, sans-serif;margin: 0;
padding: 10px 0 10px 0px;"><?=$wp_query->queried_object->name?>
                <div class="select-list">
               <select name="archive-menu" onchange="document.location.href=this.options[this.selectedIndex].value;">
	<option value=""><?php echo esc_attr( __( 'Select Year', 'vionnet' ) ); ?></option>
	<?php wp_get_archives( array(
       'category_name' => 'Special Reports',
		'type' => 'yearly',
		'format' => 'option',
		'show_post_count' => 1
	) ); ?>
</select>
                </div>
            </div>

            <?php
            add_filter('pre_get_posts', 'pbl_set_order', 11);
            $params = array(
                'year' => 2013,
                'category_name' => $category,
                'posts_per_page' => -1,
                'order' => 'DESC',
                'orderby' => 'date'
            );
            $Q = new WP_Query($params);
            $count = $Q->post_count;
            ?>
            <?php if( $Q->have_posts() ) :
                global $wpdb;


                ?>
                <div class="contt">
                    <div class="archive_block fleft">
                        <?php
                        if($count == 1  )
                        {
                            $Q->the_post();
							$post_title = strip_tags(get_the_title());
                            ?>
                            <div class="box">
                                <a href="<?php bloginfo('siteurl')?>/pubcode/<?=$pub?>/<?=$category;?>/<?=$Q->post->post_name;?>" target="_blank">
                                    <?php echo $post_title;?>
                                </a>
                                <span class="date"><?php the_time('F j, Y');?></span>
                            </div>
                        <?php
                        }
                        ?>
                        <?php for($i=0; $i<floor($count/2); $i++) : $Q->the_post(); 
							$post_title = strip_tags(get_the_title());
						?>

                            <div class="box">
                                <a href="<?php bloginfo('siteurl')?>/pubcode/<?=$pub?>/<?=$category;?>/<?=$Q->post->post_name;?>" target="_blank">
                                    <?php echo $post_title;?>
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
                        for($i=ceil($count/2)-1; $i<$count; $i++)
                        {
                            $Q->the_post();
							$post_title = strip_tags(get_the_title());
                            ?>
                            <div class="box">
                                <a href="<?php bloginfo('siteurl')?>/pubcode/<?=$pub?>/<?=$category;?>/<?=$Q->post->post_name;?>" target="_blank">
                                    <?php echo $post_title;?>
                                </a>
<span><?php echo types_render_field('recommendation', array("output"=>"html"));?></span>
                                <span class="date"><?php the_time('F j, Y');?></span>
                            </div>
                        <?php
                        }
                        ?></div>
                </div>
                <div class="note">
                     
					  <?php 
if ($pub=='leg')
{
echo 'Note: Click the “User Guide” tab to the left to learn more about implementing the Legagy Portfolio strategy';
}
else if ($pub=='pip')
{
echo 'Note: Click the “User Guide” tab to the left to learn more about implementing the Perpetual Income strategy';
}
else if ($pub=='pbl')
{
echo '';
}
		?>
                    </div><?php
            endif;
            ?>

        </div>
        <?php
        the_post();
        get_sidebar('left'); ?>
    </div><!-- end of #content-archive -->



<?php get_footer(); ?>