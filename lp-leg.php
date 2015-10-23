<?php

function doLandingPage($slug, $pub = ''){
    //$landingPage = '';
    $category = 'issues';
    ob_start();
    ?>

    <div class="m-cols ">

        <div id="content" class="grid-right col-620 fit">

            <div style="border-bottom:1px solid #eee;color: #649079;font: bold 28px/1.1em Arial, Helvetica, sans-serif;margin: 0;padding: 10px 0 10px 24px;">Issues
                <div class="select-list">
                    <?php pbl_year_filter_dropdown($pub, $category);?>


                    <script type="text/javascript">
                        $(function ()
                        {
                            $("#QuRepYear").change(function ()
                            {
                                var url = '/pubcode/<?=$pub;?>/<?=$category?>/9999';
                                url = url.replace('9999', $(this).val());
                                document.location.href = url;
                            });
                        });
                    </script>
                </div>
            </div>


            <?php
            add_filter('pre_get_posts', 'pbl_set_order', 11);
            $params = array(
                //'year' => date('Y'),
                'category_name' => $category,
                'posts_per_page' => -1,
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
                        ?>
                        <div class="box">
                            <a href="<?php bloginfo('siteurl')?>/<?=$Q->post->post_name;?>" target="_blank">
                                <?php the_title();?>
                            </a>
<span><?php echo types_render_field('recommendation', array("output"=>"html"));?></span>
<span class="date"><?php the_time('F j, Y');?></span>                        </div>
                    <?php
                    }
                    ?>
                    <?php for($i=0; $i<floor($count/2); $i++) : $Q->the_post(); ?>

                        <div class="box">
                            <a href="<?php bloginfo('siteurl')?>/<?=$Q->post->post_name;?>" target="_blank">
                                <?php the_title();?>
                            </a>
<span><?php echo types_render_field('recommendation', array("output"=>"html"));?></span>
<span class="date"><?php the_time('F j, Y');?></span>                        </div>

                    <?php
                    endfor;
                    ?>
                </div>
                <div class="archive_block fright">
                    <?php
                    for($i=ceil($count/2)-1; $i<$count; $i++)
                    {
                        $Q->the_post();
                        ?>
                        <div class="box">
                            <a href="<?php bloginfo('siteurl')?>/<?=$Q->post->post_name;?>" target="_blank">
                                <?php the_title();?>
                            </a>
<span><?php echo types_render_field('recommendation', array("output"=>"html"));?></span>
<span class="date"><?php the_time('F j, Y');?></span>                        </div>
                    <?php
                    }
                    ?></div>
                    
                   
                    
                </div><?php
            endif;
            ?>
             <div class="note">
        
          <?php 
if ($pub=='leg')
{
echo 'Note: Click the “User Guide” tab to the left to learn more about implementing the Legacy Portfolio strategy.';
}
else if ($pub=='pip')
{
echo 'Note: Click the “User Guide” tab to the left to learn more about implementing the Perpetual Income strategy.';
}
else if ($pub=='pbl')
{
echo '';
}
		?>
            </div>
        </div>

        <?php get_sidebar('leg-left'); ?>
    </div>
    <?php
    $landingPage = ob_get_contents();
    ob_end_clean();
    return $landingPage;
}