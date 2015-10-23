<?php
/*function users_redirect(){
    wp_redirect(site_url()."/wp-login.php");
    die();
}*/
if((!defined('DOING_AJAX') || ! DOING_AJAX ) && ( ! current_user_can('manage_options') ) ){
    add_action('admin_init','users_redirect');
}
add_action('init', 'pbl_init_session', 1);
function pbl_init_session()
{
    if (!session_id()) {
        session_start();
    }
}
add_action('wp_logout', 'session_logout');
function session_logout() {
    session_destroy();
}

function is_content_drip_post($slug){

    $post = get_page_by_path($slug, OBJECT,'post');
    $post_meta = get_post_meta($post->ID, '_content_drip_meta', true );
    if(!empty($post_meta)){
        $link = get_permalink($post->ID);
        return home_url() . '/login?redirect_to=' . $link;
    }
    return false;
//echo 'test';
}

//Shortcode for Table Block
function table_block( $atts, $content = null ) {  
    return '<div class="table-block col-380 right">'.$content.'</div>';  
}  
add_shortcode("table-block", "table_block");
add_action('wp_enqueue_scripts', 'pbl_scripts_styles_child');
function pbl_scripts_styles_child()
{
    //echo get_template_directory_uri();die;
    wp_enqueue_style( 'dev', get_template_directory_uri() . '/core/css/dev.css');
}
function pbl_set_order($arg)
{
//    $ord = $arg->get('order'); var_dump($ord);
//    print_r($arg);die;
//    $arg->set( 'order', 'DESC' );
    $arg->query_vars['order'] = 'DESC';
    $arg->query_vars['orderby'] = 'date';
//   // print_r($arg);die;
//    return $arg;
}

function pbl_set_order_menu($arg)
{
  //print_r($arg);
    $arg->query_vars['orderby'] = 'menu_order';
    $arg->query_vars['order'] = 'ASC';
    return $arg;
}

function pbl_filter_where($pub, $category) {
    global $wp_query, $wpdb;

    $term_id = get_term_by('slug', $pub, 'pubcode')->term_id;
    $category_id = get_category_by_slug($category)->term_id;
    $datePosts = $wpdb->get_results( $wpdb->prepare( "
                    SELECT DISTINCT YEAR( $wpdb->posts.post_date ) AS year
                        FROM wp_term_relationships
                        INNER JOIN wp_term_relationships as wptr ON wp_term_relationships.object_id=wptr.object_id and wp_term_relationships.term_taxonomy_id <> wptr.term_taxonomy_id
                        inner join wp_posts on wp_posts.ID = wp_term_relationships.object_id
                        inner join wp_term_taxonomy on wp_term_taxonomy.term_taxonomy_id  = wp_term_relationships.term_taxonomy_id
                        inner join wp_term_taxonomy as wptt on wptt.term_taxonomy_id  = wptr.term_taxonomy_id
                        where (wp_term_taxonomy.term_id = %s and wp_term_taxonomy.taxonomy = 'category')
                            and (wptt.term_id = %s and wptt.taxonomy = 'pubcode')
                            and (wp_posts.post_status = 'publish')
                            ORDER BY year DESC
                " , $category_id, $term_id) );
    return $datePosts[0]->year;

}

function pbl_year_filter_dropdown($pub, $category)
{
    global $wp_query;

    $year = isset($wp_query->query['year']) ? $wp_query->query['year']: date('Y');
    ?>
    <select id="QuRepYear" name="QuRepYear"><?php
    global $wpdb;
    $term_id = get_term_by('slug', $pub, 'pubcode')->term_id;
    $category_id = get_category_by_slug($category)->term_id;

    $datePosts = $wpdb->get_results( $wpdb->prepare( "
                    SELECT DISTINCT YEAR( $wpdb->posts.post_date ) AS year
                        FROM wp_term_relationships
                        INNER JOIN wp_term_relationships as wptr ON wp_term_relationships.object_id=wptr.object_id and wp_term_relationships.term_taxonomy_id <> wptr.term_taxonomy_id
                        inner join wp_posts on wp_posts.ID = wp_term_relationships.object_id
                        inner join wp_term_taxonomy on wp_term_taxonomy.term_taxonomy_id  = wp_term_relationships.term_taxonomy_id
                        inner join wp_term_taxonomy as wptt on wptt.term_taxonomy_id  = wptr.term_taxonomy_id
                        where (wp_term_taxonomy.term_id = %s and wp_term_taxonomy.taxonomy = 'category')
                            and (wptt.term_id = %s and wptt.taxonomy = 'pubcode')
                            and (wp_posts.post_status = 'publish')
                            ORDER BY year DESC
                " , $category_id, $term_id) );

    foreach($datePosts as $datePost)
    {
        ?>
        <option <?php echo $datePost->year == $year ? 'selected="selected"' : '';?> value="<?=$datePost->year?>"><?=$datePost->year?></option>
    <?php
    }
    ?></select><?php
}

//Fix Duplicate Slugs for Different Content
function wp_cpt_unique_post_slug($slug, $post_ID, $post_status, $post_type, $post_parent, $original_slug) {
    if ( in_array( $post_status, array( 'draft', 'pending', 'auto-draft' ) ) )
        return $slug;

    global $wpdb, $wp_rewrite;

    // store slug made by original function
    $wp_slug = $slug;

    // reset slug to original slug
    $slug = $original_slug;

    $feeds = $wp_rewrite->feeds;
    if ( ! is_array( $feeds ) )
        $feeds = array();

    $hierarchical_post_types = get_post_types( array('hierarchical' => true) );
    if ( 'attachment' == $post_type ) {
        // Attachment slugs must be unique across all types.
        $check_sql = "SELECT post_name FROM $wpdb->posts WHERE post_name = %s AND ID != %d LIMIT 1";
        $post_name_check = $wpdb->get_var( $wpdb->prepare( $check_sql, $slug, $post_ID ) );

        if ( $post_name_check || in_array( $slug, $feeds ) || apply_filters( 'wp_unique_post_slug_is_bad_attachment_slug', false, $slug ) ) {
            $suffix = 2;
            do {
                $alt_post_name = substr ($slug, 0, (200 - ( strlen( $suffix ) + 1 )) ) . "-$suffix";
                $post_name_check = $wpdb->get_var( $wpdb->prepare($check_sql, $alt_post_name, $post_ID ) );
                $suffix++;
            } while ( $post_name_check );
            $slug = $alt_post_name;
        }
    } elseif ( in_array( $post_type, $hierarchical_post_types ) ) {
        if ( 'nav_menu_item' == $post_type )
            return $slug;
        // Page slugs must be unique within their own trees. Pages are in a separate
        // namespace than posts so page slugs are allowed to overlap post slugs.
        $check_sql = "SELECT post_name FROM $wpdb->posts WHERE post_name = %s AND post_type = %s AND ID != %d AND post_parent = %d LIMIT 1";
        $post_name_check = $wpdb->get_var( $wpdb->prepare( $check_sql, $slug, $post_type, $post_ID, $post_parent ) );

        if ( $post_name_check || in_array( $slug, $feeds ) || preg_match( "@^($wp_rewrite->pagination_base)?\d+$@", $slug ) || apply_filters( 'wp_unique_post_slug_is_bad_hierarchical_slug', false, $slug, $post_type, $post_parent ) ) {
            $suffix = 2;
            do {
                $alt_post_name = substr( $slug, 0, (200 - ( strlen( $suffix ) + 1 )) ) . "-$suffix";
                $post_name_check = $wpdb->get_var( $wpdb->prepare( $check_sql, $alt_post_name, $post_type, $post_ID, $post_parent ) );
                $suffix++;
            } while ( $post_name_check );
            $slug = $alt_post_name;
        }
    } else {
        // Post slugs must be unique across all posts.
        $check_sql = "SELECT post_name FROM $wpdb->posts WHERE post_name = %s AND post_type = %s AND ID != %d LIMIT 1";
        $post_name_check = $wpdb->get_var( $wpdb->prepare( $check_sql, $slug, $post_type, $post_ID ) );

        if ( $post_name_check || in_array( $slug, $feeds ) || apply_filters( 'wp_unique_post_slug_is_bad_flat_slug', false, $slug, $post_type ) ) {
            $suffix = 2;
            do {
                $alt_post_name = substr( $slug, 0, (200 - ( strlen( $suffix ) + 1 )) ) . "-$suffix";
                $post_name_check = $wpdb->get_var( $wpdb->prepare( $check_sql, $alt_post_name, $post_type, $post_ID ) );
                $suffix++;
            } while ( $post_name_check );
            $slug = $alt_post_name;
        }
    }

    return $slug;
}
//add_filter('wp_unique_post_slug', 'wp_cpt_unique_post_slug', 10, 6);
?>
<?php
function get_custom_post_type_template($single_template) {
     global $post;
       if ($post->post_type == 'wealth-builders-club' && in_category('days')) {
          $single_template = dirname( __FILE__ ) . '/single-wealth-builders-clubArticle.php';
     }
	 	  elseif ($post->post_type == 'perpetual-income' && in_category('2012' || '2013')) {
          $single_template = dirname( __FILE__ ) . '/single-perpetual-incomeArticle.php';
     }
	   elseif ($post->post_type == 'legacy-portfolio' && in_category('2012' || '2013')) {
          $single_template = dirname( __FILE__ ) . '/single-perpetual-incomeArticle.php';
     }
 	   elseif ($post->post_type == 'palm-beach-income' && in_category('2012' || '2013' || 'webinar')) {
          $single_template = dirname( __FILE__ ) . '/single-perpetual-incomeArticle.php';
     }
	  elseif ($post->post_type == 'palm-beach-letter' && in_category('updates' || '2013' || 'special-reports')) {
          $single_template = dirname( __FILE__ ) . '/single-perpetual-incomeArticle.php';
     }
	 else {
          $single_template = dirname( __FILE__ ) . '/single-wealth-builders-club.php';}
     return $single_template;
}
//add_filter( "single_template", "get_custom_post_type_template" ) ;

//add_action( 'save_post', 'pbl_create_term_education_center', 10, 2);

function pbl_create_term_education_center($post_ID, $post)
{
    if(!empty($_POST) || $_POST['action'] == 'editpost')
    {
        if($_POST['post_type'] == 'pub_content')
        {
            $termId = get_post_meta($post_ID, 'pbl_term_id', true);
            if(!$termId)
            {
                $ids = wp_insert_term($post->post_title, 'publication_content');
                // insertField('publication_content', 'pubcode', );
                add_post_meta($post_ID, 'pbl_term_id', $ids['term_id'], true);
            }
            else
            {
                wp_update_term($termId, 'publication_content', array('name' => $post->post_title));
            }
        }
    }
}

//add_action('before_delete_post', 'pbl_delete_term_by_post');

//add_action('responsive_in_wrapper', 'pbl_wrapper_top');

function pbl_wrapper_top00()
{
    global $post, $wp, $wp_query;
    //print_r($post);
    if(is_user_logged_in())
    {
        $current_user = wp_get_current_user();
        if($post->post_title == 'My Subscriptions')
        {
            $address = get_customer_address_by_id();
            if (is_array($address) && !empty($address))
                $address = reset($address);
            $userName = (isset($address['FirstName']) && !empty($address['FirstName'])?$address['FirstName'] . ' ':'') . (isset($address['LastName']) && !empty($address['FirstName'])?$address['LastName']:'');

            ?>
            <h2 class="login-subs" >
                <span class="user">           <?php echo __( 'Welcome, Subscriber'); ?>
</span>
                <span>Subscription Home</span>
            </h2>
        <?php
        }
        else
        {
        ?>
            <h2 class="login-subs" style="min-height: 30px; height: 35px;">
            <?php //print_r($wp);
            $address = get_customer_address_by_id();
            if (is_array($address) && !empty($address))
                $address = reset($address);
            $userName = (isset($address['FirstName']) && !empty($address['FirstName'])?$address['FirstName'] . ' ':'') . (isset($address['LastName']) && !empty($address['FirstName'])?$address['LastName']:'');
            if( !isset($wp->query_vars['pubcode']) ){
                if(!isset($post)){?>
                <div style="display: inline-block; margin-top: 10px; font-size: 16px;">
           <?php echo __( 'Welcome, Subscriber'); ?>
                </div>
            <?php }
                else{
                    $term = array();
                    $term = wp_get_post_terms($post->ID, 'pubcode');
                    $pub = $term[0]->slug;
                    ?>
                    <div class="single-pub">
                        <?php if($pub == 'pbl'){?>
                            <?=get_title_pub_by_slug_pub($pub);?>
                            <div class="<?php echo (pbl_get_status_member_cat('pbl') =='Gold')?"tx-gld":"tx-pltn"; ?>"><?php echo pbl_get_status_member_cat('pbl');?></div>
                        <?php } else{?>
                            <?=get_title_pub_by_slug_pub($pub);?>
                        <?php }?>
                    </div>
                <?php
                }
            }
            else{//print_r($wp_query);
                ?>
                <div class="single-pub">
                    <?php if($wp_query->query_vars['pubcode'] == 'pbl'){?>
                        <?=get_title_pub_by_slug_pub($wp_query->query_vars['pubcode']);?>
                    <div class="<?php echo (pbl_get_status_member_cat('pbl') =='Gold')?"tx-gld":"tx-pltn"; ?>"><?php echo pbl_get_status_member_cat('pbl');?></div>
                    <?php } else{?>
                        <?=get_title_pub_by_slug_pub($wp_query->query_vars['pubcode']);?>
                    <?php }?>
                </div>
            <?php
            }?>
                <div style="display: inline; float: right; text-align: right;">
                    <ul class="menu">
                        <li class="menu-item-solo">
                            <a href="<?php bloginfo('siteurl')?>/my-subscriptions">
                                My Subscriptions
                            </a>
                        </li>
                    </ul>
                </div>


            </h2>
            <?php

        }

    }
}
function pbl_delete_term_by_post($postid)
{
    global $post;
    // print_r($post);die;
    if($post->post_type == 'pub_content')
    {
        $meta_term = get_metadata('post', $postid, 'pbl_term_id');
        $term_id = $meta_term[0];
        wp_delete_term($term_id, 'publication_content');
    }
}

//add_filter( 'wp_nav_menu_items', 'pbl', 10, 2 );
//function your_custom_menu_item ( $items, $args ) {
//    if ($args->theme_location == 'sidebar') {
//        $items .= '<li>hi</li>';
//    }
//    return $items;
//}

add_shortcode( 'member', 'member_check_shortcode' );
function member_check_shortcode( $atts, $content = null ) {
	 if ( is_user_logged_in() && !is_null( $content ) && !is_feed() )
		return $content;
	return '';
}
add_shortcode( 'visitor', 'visitor_check_shortcode' );

function visitor_check_shortcode( $atts, $content = null ) {
	 if ( ( !is_user_logged_in() && !is_null( $content ) ) || is_feed() )
		return $content;
	return '';
}
add_filter('single_template', 'single_template_terms');
function single_template_terms($template) {
    foreach( (array) wp_get_object_terms(get_the_ID(), get_taxonomies(array('public' => true, '_builtin' => false))) as $term ) {
        if ( file_exists(STYLESHEETPATH . "/single-{$term->slug}.php") )
            return STYLESHEETPATH . "/single-{$term->slug}.php";
    }
    return $template;
}
//CWE Archived Content
function get_custom_post_template_cw($single_template) {
     global $post;
       if ( in_category( 'mark_fords_creating_wealth')) {
          $single_template = dirname( __FILE__ ) . '/single-creating-wealth.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_cw" ) ;

//Retirement Insider to be Deleted
function get_custom_post_template_ri($single_template) {
     global $post;
       if ( in_category( 'retirement-insider')) {
          $single_template = dirname( __FILE__ ) . '/single-ri.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_ri" ) ;

//PRI Monthly Issue Template
function get_custom_post_template_ri_issues($single_template) {
     global $post;
       if ( in_category( 'monthly-issues') && has_term( 'pri','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_ri_issues" ) ;

//CWE Template
function get_custom_post_template_cwe_issues($single_template) {
     global $post;
       if ( in_category( 'monthly-issues') && has_term( 'cwe','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_cwe_issues" ) ;



//LEG Template
function get_custom_post_template_leg_issues($single_template) {
     global $post;
       if ( in_category( array( 'monthly-issues')) && has_term( 'leg','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_leg_issues" ) ;


//CWE Updates Template
function get_custom_post_template_cwe_update($single_template) {
     global $post;
       if ( in_category( 'updates') && has_term( 'cwe','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_cwe_update" ) ;



//function get_custom_post_template_pbl_issues($single_template) {
//     global $post;
//       if ( in_category( 'monthly-issues') && has_term( 'pbl','pubcode')) {
//          $single_template = dirname( __FILE__ ) . '/single-mti-monthly-minutes.php';
//     }
//     return $single_template;
//}
//add_filter( "single_template", "get_custom_post_template_pbl_issues" ) ;


//JPT Options Template
function get_custom_post_template_jpt_options($single_template) {
     global $post;
       if ( in_category( 'options') && has_term( 'jpt','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_jpt_options" ) ;



//JPT Template
function get_custom_post_template_jpt_issues($single_template) {
     global $post;
       if ( in_category( 'updates') && has_term( 'jpt','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_jpt_issues" ) ;


//JPT Template Alerts
function get_custom_post_template_jpt_alerts($single_template) {
     global $post;
       if ( in_category( 'alerts') && has_term( 'jpt','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_jpt_alerts" ) ;


//JPT Template Alerts
function get_custom_post_template_jpt_reports($single_template) {
     global $post;
       if ( in_category( 'reports') && has_term( 'jpt','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-alerts.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_jpt_reports" ) ;


//JPT Template Webinar
function get_custom_post_template_jpt_webinar($single_template) {
     global $post;
       if ( in_category( 'media') && has_term( 'jpt','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-webinar.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_jpt_webinar" ) ;


//MTI Updates Template
function get_custom_post_template_mti_monthly_minutes($single_template) {
     global $post;
       if ( in_category( 'updates') && has_term( 'mti','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_mti_monthly_minutes" ) ;

//MTI Monthly Issues Template
function get_custom_post_template_mti_monthly_issues($single_template) {
     global $post;
       if ( in_category( 'monthly-issues') && has_term( 'mti','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_mti_monthly_issues" ) ;

//MTI Reports Template
function get_custom_post_template_mti_reports($single_template) {
     global $post;
       if ( in_category( 'reports') && has_term( 'mti','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_mti_reports" ) ;

//LEG Reports Template
function get_custom_post_template_leg_reports($single_template) {
     global $post;
       if ( in_category( 'reports') && has_term( 'leg','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_leg_reports" ) ;

//EIO Template
function get_custom_post_template_eio($single_template) {
     global $post;
       if ( in_category( 'installment') && has_term( 'eio','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_eio" ) ;

//CLB Template
function get_custom_post_template_clb_legacy($single_template) {
     global $post;
       if ( in_category( 'installment') && has_term( 'clb','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_clb_legacy" ) ;

//Tom's Confidential Template
function get_custom_post_template_tom_updates($single_template) {
     global $post;
       if ( in_category( 'updates') && has_term( 'tom','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_tom_updates" ) ;

//Perpetual Income Template
function get_custom_post_template_pip_updates($single_template) {
     global $post;
       if ( in_category( 'issues') && has_term( 'pip','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_pip_updates" ) ;

//PBN Weekly Template
function get_custom_post_template_pbn_weekly($single_template) {
     global $post;
       if ( in_category( 'weekly_issues') && has_term( 'pbn','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_pbn_weekly" ) ;

//PBN Weekly Template
function get_custom_post_template_pbn_weekly01($single_template) {
     global $post;
       if ( in_category( 'weekly-issues') && has_term( 'pbn','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_pbn_weekly01" ) ;

//PBN Webinar Template
function get_custom_post_template_pnb_webinar($single_template) {
     global $post;
       if ( in_category( 'webinar-courses') && has_term( 'pbn','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-pbn-webinar.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_pnb_webinar" ) ;


//TOM Monthly Template
function get_custom_post_template_tom_monthly($single_template) {
     global $post;
       if ( in_category( 'monthly-issues') && has_term( 'tom','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_tom_monthly" ) ;


//PBL Monthly Template
function get_custom_post_template_pbl_monthly($single_template) {
     global $post;
       if ( in_category( 'monthly-issues') && has_term( 'pbl','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_pbl_monthly" ) ;

//PBL Weekly Update Template
function get_custom_post_template_pbl_weekly_update($single_template) {
     global $post;
       if ( in_category( 'updates') && has_term( 'pbl','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_pbl_weekly_update" ) ;


//PBL Special Reports Update Template
function get_custom_post_template_pbl_special_reports($single_template) {
     global $post;
       if ( in_category( 'reports') && has_term( 'pbl','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_pbl_special_reports" ) ;

//PBL Special Reports Update Template
function get_custom_post_template_pbl_special_reports1($single_template) {
     global $post;
       if ( in_category( 'reports') && has_term( 'pbl','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_pbl_special_reports1" ) ;


//IFL Special Reports Update Template
function get_custom_post_template_ifl_special_reports($single_template) {
     global $post;
       if ( in_category( 'reports') && has_term( 'ifl','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_ifl_special_reports" ) ;

//LEG Weekly Update Template
function get_custom_post_template_leg_issue($single_template) {
     global $post;
       if ( in_category( 'issues') && has_term( 'leg','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_leg_issue" ) ;

//ETF Webinar Template
function get_custom_post_template_etf_series($single_template) {
     global $post;
       if ( in_category( 'etf-webinar-series')) {
          $single_template = dirname( __FILE__ ) . '/single-etf-webinar-series.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_etf_series" ) ;


//Featured Content Template
function get_custom_post_template_featured_content($single_template) {
     global $post;
       if ( in_category( 'featured-content')) {
          $single_template = dirname( __FILE__ ) . '/single-featured-content.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_featured_content" ) ;

//Extra Insight Content Template
function get_custom_post_template_extra_insight($single_template) {
     global $post;
       if ( in_category( 'extra-insight')) {
          $single_template = dirname( __FILE__ ) . '/single-featured-content.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_extra_insight" ) ;

//IFLTemplate
function get_custom_post_template_ifl($single_template) {
     global $post;
       if ( in_category( 'income-for-life')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_ifl" ) ;


//IFL PremiumTemplate
function get_custom_post_template_ifl_premium($single_template) {
     global $post;
       if ( in_category( 'income-for-life-premium')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_ifl_premium" ) ;


//Mega Trends Wealth Summit
function get_custom_post_template_mtw_updates($single_template) {
     global $post;
       if ( in_category( 'updates') && has_term( 'mtw','pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_mtw_updates" ) ;

//Palm Beach Daily
function get_custom_post_template_daily($single_template) {
     global $post;
       if ( in_category( 'daily')) {
          $single_template = dirname( __FILE__ ) . '/single-palm-beach-daily.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_post_template_daily" ) ;


//Podcast
function get_custom_post_template_podcast($single_template) {
     global $post;

     if ($post->post_type == 'podcast' ) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'get_custom_post_template_podcast' );


//Content
function get_custom_post_template_content($single_template) {
     global $post;

     if ($post->post_type == 'content' ) {
          $single_template = dirname( __FILE__ ) . '/single-featured-content.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'get_custom_post_template_content' );

//DealBook
function get_custom_post_template_dealbook($single_template) {
  global $post;
       if ( in_category( 'issue') && has_term( array('pbl-a1','dbk'),'pubcode')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'get_custom_post_template_dealbook' );



//PBRG
function get_custom_post_template_pbrg($single_template) {
     global $post;

       if ( in_category( 'palm-beach-research-group')) {
          $single_template = dirname( __FILE__ ) . '/single-email-template.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'get_custom_post_template_pbrg' );


//function get_custom_post_template_tom($single_template) {
//     global $post;
//       if ( in_category( 'content') && has_term( 'tom','pubcode')) {
//          $single_template = dirname( __FILE__ ) . '/single-ri.php';
//     }
//     return $single_template;
//}
//add_filter( "single_template", "get_custom_post_template_tom" ) ;

function get_parent_category_name($cat) {
    $parentCategoryList = get_category_parents($cat, false, ',');
    $parentCategoryListArray = split(',', $parentCategoryList);
    $parentName = $parentCategoryListArray[0];
    $stuffToReplace = array(' ' => '-', '(' => '', ')' => '');
    $parent = strtolower(strtr($parentName,$stuffToReplace));

    return $parent;
}

//function conditional_custom_category_limit( $query ) {
  //  if ( is_admin() || ! $query->is_main_query() )
    //    return;
   // if ( is_archive('mega-trends-investing') ) {
     //   $query->set( 'posts_per_page', 2 );
       //         return;
   // }
//}
//add_action( 'pre_get_posts', 'conditional_custom_category_limit', 1 );

// Update post 37
//  $my_post = array();
//  $my_post['ID'] = 6204;
//  $my_post['post_content'] = get_post_meta($my_post['ID'], 'wpcf-body', true);

// Update the post into the database
//  wp_update_post( $my_post );

add_filter('pre_user_email', 'skip_email_exist');
function skip_email_exist($user_email){
    define( 'WP_IMPORTING', 'SKIP_EMAIL_EXIST' );
    return $user_email;
}

add_action('after_setup_theme', function(){
    remove_filter( 'excerpt_more', 'responsive_auto_excerpt_more' );
    remove_filter( 'get_the_excerpt', 'responsive_custom_excerpt_more' );
});

add_filter( 'excerpt_more', function ( $more ) {
	return '<span class="ellipsis">&hellip;</span>';
});

if ( function_exists('register_sidebar') ) {
register_sidebar(array(
'name' => 'IFL Premium',
'id' => 'income-for-life-premium',
'description' => 'Main Sidebar Premium',
 	'class'         => '', 
	'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<div class="widget-title"><h3>',
	'after_title'   => '</h3></div>'
));
}
add_action( 'init', 'my_custom_menus' );
function my_custom_menus() {
    register_nav_menus(
        array(
		'leg-menu00' => __( 'LEG Suppress Menu', 'leg-suppressed' ),
   		'leg-menu01' => __( 'LEG Full', 'leg-full' ),
        )
    );
}
function jetpackme_remove_rp() {
    $jprp = Jetpack_RelatedPosts::init();
    $callback = array( $jprp, 'filter_add_target_to_dom' );
    remove_filter( 'the_content', $callback, 40 );
}
add_filter( 'wp', 'jetpackme_remove_rp', 20 );
function jetpackme_filter_exclude_category( $filters ) {
    $filters[] = array( 'not' =>
      array( 'term' => array( 'category.slug' => 'reports' , 'monthly-issues' , 'special-reports' ) )
    );
    return $filters;
}
add_filter( 'jetpack_relatedposts_filter_filters', 'jetpackme_filter_exclude_category' );


//Sort search results
add_filter('relevanssi_modify_wp_query', 'rlv_asc_date');
function rlv_asc_date($query) {
    $query->set('orderby', 'post_date');
    $query->set('order', 'DSC');
    return $query;
}

//Filter title to show lock button
add_filter( 'the_title', 'pbrg_locked_title' );
function pbrg_locked_title( $title ) {
 global $post;
			$auth_container = new agora_auth_container($post->ID);
			$auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
			if( $auth_container->is_allowed() !== true AND $auth_container->is_protected() === true ){
			$title = '<i class="fa fa-key fa-rotate-90"></i> '.$title;
    	}else{ 
     		$title = $title;
 } 
 
 return $title;}
 



 
//Filter content to display 650 characters of the content
//add_filter( 'the_content', 'pbrg_locked_content' );
function pbrg_locked_content( $content ) {
global $post;
			$auth_container = new agora_auth_container($post->ID);
			$auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
			if( is_single() && $auth_container->is_allowed() !== true AND $auth_container->is_protected() === true ){
$content = get_the_content();
$content = preg_replace('#<p.*?>(.*?)</p>#i', '<p>\1</p>', $content);
$content = '<div class="preview-content">'.strip_tags($content,'<p><br>').'</div>';

echo '<p>'.substr($content, 0, 650).'...</p>';
    	}else{ 
     		$content = $content;
} 
return $content;}

//Filter excerpt to display first 450 characters of the content
add_filter( 'get_the_excerpt', 'pbrg_locked_excerpt' );
function pbrg_locked_excerpt( $excerpt ) {
 global $post;
			$auth_container = new agora_auth_container($post->ID);
			$auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
			if( $auth_container->is_allowed() !== true AND $auth_container->is_protected() === true ){
$excerpt = get_the_content();
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 450);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
$excerpt = $excerpt.'...';
    	}else{ 
     		$excerpt = $excerpt;
 } 
 
 return $excerpt;}
 
 //Add Custom Post Type to author template
function pbrgaddin_author_custom_post_types( $query ) {
  if( is_author() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'content'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'pbrgaddin_author_custom_post_types' );

//Allow html in author bio
remove_filter('pre_user_description', 'wp_filter_kses');

//Remove Hyphen from search
add_filter('relevanssi_remove_punctuation', 'remove_hyphens', 9);
function remove_hyphens($a) {
    $a = str_replace('-', '', $a);
    return $a;
}

//Additional Thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size( 'medium-featured', 300, 160, true );
 ?>