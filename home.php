<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Index Template
 *
 *
 * @file           index.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/index.php
 * @link           http://codex.wordpress.org/Theme_Development#Index_.28index.php.29
 * @since          available since Release 1.0
 */

get_header('pbrg-featured'); ?>





<div id="content">
<div class="grid col-620">
<div style="display:none;">
<div style="padding: 10px;">
  
  <div style="
    color: #556B5F;
    font-family: 'Roboto', sans-serif;
    font-weight: 700;
    font-size: 20px;
    width: 100%;
    margin-top: 20px;
    border-bottom: 2px solid #556B5F;
    line-height: 1.25em;
">
    Extra Insight</div></div>
<div style="clear:both;overflow:auto;">
 <?php query_posts (array ( 
  'post_type'              => array( 'content', ' post' ),
  'category_name' => 'palm-beach-daily',
  'posts_per_page' => '2' )) ?>
    <?php if( have_posts() ) : ?>
    <?php while( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class('grid col-380 medium-featured'); ?> style="border-bottom:none;">
<div class="post-entry">
<h2 class="entry-title post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<div class="post-meta">
<span class="byline">By</span> <span class="author vcard"><?php if(function_exists( 'coauthors' ) ) {
    coauthors();
} else {
	get_the_author();
}
?></span> | <i class="fa fa-calendar"></i> <?php the_time('F j, Y'); ?></div>

					<?php if( has_post_thumbnail() ) : ?>
					<div style="clear:both;"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail( 'medium-featured' ); ?>
						</a></div>
					<?php endif; ?>

<div><?php the_excerpt(); ?></div>

<div class="view-full-post"><a href="<?php the_permalink() ?>" class="view-full-post-btn">Read More...</a></div>
</div>
</div>
    <?php
		endwhile;
     	endif;
	?></div>
    
<div class="pbd-archive-btn" style="margin-bottom:10px;"><a href="/extra-insight/">View more articles...</a></div>

</div>






<div style="padding: 10px;">
  
  <div style="
    color: #556B5F;
    font-family: 'Roboto', sans-serif;
    font-weight: 700;
    font-size: 20px;
    width: 100%;
    margin-top: 20px;
    border-bottom: 2px solid #556B5F;
    line-height: 1.25em;
">The Palm Beach Daily</div></div>
 <?php query_posts (array ( 
 'post_type'              => array( 'content', ' post' ),
 'category_name' => 'palm-beach-daily, extra-insight',
 'posts_per_page' => '12' )) ?>
    <?php if( have_posts() ) : ?>
    <?php while( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="post-entry">
<h2 class="entry-title post-title grid-col-220"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<div class="post-meta">
<span class="byline">By</span> <span class="author vcard"><?php if(function_exists( 'coauthors' ) ) {
    coauthors();
} else {
	get_the_author();
}
?></span> | <i class="fa fa-calendar"></i> <?php the_time('F j, Y'); ?></div>

					<?php if( has_post_thumbnail() ) : ?>
					<div class="pbd-thumb"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) ); ?>
						</a></div>
					<?php endif; ?>



<div class="featured-description"><?php the_excerpt(); ?></div>

<div class="view-full-post"><a href="<?php the_permalink() ?>" class="view-full-post-btn">Read More...</a></div>
</div>
</div>
    <?php
		endwhile;
     	endif;
	?>
<div class="pbd-archive-btn" style="margin-bottom:10px;"><a href="/palm-beach-daily/">View more articles...</a></div>

</div>

<div class="m-block" style="border:0;display:none;">
        <div class="col">
            <div class="">
                        <a href="http://files.csinvesting.com/files/pbl-testimonials.html" target="_blank"><img src="http://files.csinvesting.com/images/1330548925_QBURUIUAKB.gif" alt="" border="0"></a>
                        
           </div>
         
            <div class="" style="display:none;">
            <a href="http://files.csinvesting.com/files/pbl-testimonials.html" target="_blank"><img src="http://files.csinvesting.com/images/1330548925_QBURUIUAKB.gif" alt="" border="0"></a>
            </div>
        </div>
        <div class="colR">
            <div style="padding-bottom:4px;">
                <div style="display:none" class="fancybox-hidden">
<div id="markswelcomevideo" class="hentry" style="width:704px;height:480px;">
<embed src="http://ezs3.s3.amazonaws.com/player/mediaplayer46.swf" 
width="704" height="480"
allowscriptaccess="always" allowfullscreen="true"
flashvars="autostart=true&controlbar=bottom&type=video&abouttext=eZs3&aboutlink=http://www.ezs3.com/about/index.cfm?memref=Stansberry&skin=http://ezs3.s3.amazonaws.com/player/Snel2.swf&controlbar=bottom&stretching=none&allowfullscreen=true&wmode=opaque&file=http://d1tj078vgknaex.cloudfront.net/CSI/PBL_Interview.flv&width=704&height=510&screencolor=000000&bufferlength=10&volume=80&showicons=true" />
</div></div>
                 <a href="#markswelcomevideo" class="fancybox-inline" target="_blank">
                 <img src="http://files.csinvesting.com/images/mark-welcome-video_5HJO9TFFE1.png"></a>
            </div>
            
            <div>
              <a href="http://pro1.palmbeachletter.com/318074/" target="New Window"><img src="http://files.csinvesting.com/images/small_tanbox_pbl_12MF9KQC4R.png" alt="" border="0"></a>
            </div>
        </div>

    </div>
</div>
<?php get_sidebar(); ?>





</div><!-- end of #content -->

<?php get_footer(); ?>
