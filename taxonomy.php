<?php
if( !defined( 'ABSPATH' ) ) {
    exit;
}

global $wp_query;
get_header('login'); ?>

<div class="login-subs" style="min-height: 30px; height: 35px;">
<div style="display: inline; float: right; text-align: right;">
                    <ul class="menu">
                        <li class="menu-item-solo">
                            <a href="<?php bloginfo('siteurl')?>/my-subscriptions">
                                My Subscriptions
                            </a>
                        </li>
                    </ul>
                </div>

<div style="font-family: Georgia, Times New Roman, Helvetica, sans-serif;
font-size: 30px;
font-style: normal;
color: #444;
border-bottom: 1px solid #ccc;
padding: 6px 0 12px 0px;"><?php 
$term =	$wp_query->queried_object;
echo '<h1>'.$term->name.'</h1>';
?></div>
</div>

    <div class="hide-mobile">
        <div class="label welcome-message">
            <h1><?php echo __( 'Welcome, Subscriber'); ?><h1>
        </div>
    </div>


  <div id="content" class="grid-right col-620 fit">

<div style="overflow:auto; float: right; width: 80px;clear: both;">  
  <div id="grid" style="float:left; margin-right:10px; cursor:pointer;"><img src="http://media.palmbeachgroup.com/images/pbrg/icons/card-view.png"></div>
  <div id="list" style="float:right; cursor:pointer;"><img src="http://media.palmbeachgroup.com/images/pbrg/icons/list-view.png"></div>
</div>



    <?php while( have_posts() ) : the_post(); ?>
    <?php responsive_entry_before(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php responsive_entry_top(); ?>
      <div class="post-entry">
        <?php if( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"  target="_blank">
        <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) ); ?>
        </a>
        <?php endif; ?>
        <h2 class="entry-title post-title"><a href="<?php the_permalink() ?>" rel="bookmark" target="_blank">
          <?php the_title(); ?>
          </a></h2>
        <span class="post-meta"><?php echo types_render_field('recommendation', array("output"=>"html"));?></span>

        <div class="post-meta">Published
          <?php the_time('F j, Y'); ?>
          <div class="post-meta">
<span class="byline">By</span> <span class="author vcard"><?php if(function_exists( 'coauthors' ) ) {
    coauthors();
} else {
	get_the_author();
}
?></span>
</div>

<?php the_excerpt(); ?>

<div class="read-more"><a target="_blank" href="<?php the_permalink() ?>">Read More...</a></div>

<div style="float:right;"><?php edit_post_link('Edit'); ?></div>
</div>

<div class="posted-in">Posted in: <?php
$terms = get_the_terms( $post->ID , 'category','',',' );
foreach ( $terms as $term ) {
echo $term->name;
}?>
        </div>
      </div>
      <!-- end of .post-entry -->
      
      <?php responsive_entry_bottom(); ?>
    </div>
    <!-- end of #post-<?php the_ID(); ?> -->
    <?php responsive_entry_after(); ?>
 <?php endwhile; ?>
<div class="navigation"><?php wp_pagenavi(); ?></div>
    </div>

<?php get_footer(); ?>