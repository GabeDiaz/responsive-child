<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

global $responsive_options;
$responsive_options = responsive_get_options();

/**
 * Display breadcrumb except on search page
 */
if( 0 == $responsive_options['breadcrumb'] && !is_search() ) :
	echo responsive_breadcrumb_lists();
endif;

/**
 * Display archive information
 */

if( is_category() || is_tag() || is_author() || is_date() ) {
	?>
	<h6 class="title-archive">
		<?php
		if( is_day() ) :
			printf( __( 'Daily Archives: %s', 'responsive' ), '<span>' . get_the_date() . '</span>' );
		elseif( is_month() ) :
			printf( __( 'Monthly Archives: %s', 'responsive' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
		elseif( is_year() ) :
			printf( __( 'Yearly Archives: %s', 'responsive' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
		else :
			_e( 'Archives', 'responsive' );
		endif;
		?>
	</h6>
<?php
}

/**
 * Display Search information
 */

if( is_search() ) {
	?>
	<h6 class="title-search-results"><?php printf( __( 'Search results for: %s', 'responsive' ), '<span>' . get_search_query() . '</span>' ); ?></h6>
<?php
}