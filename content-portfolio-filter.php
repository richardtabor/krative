<?php /* PORTFOLIO FILTER */ ?>

<?php
$terms = get_terms( 'portfolio_category' );
if( !empty($terms) ) {
	echo '<ul id="filter" data-filter="isotope-item" class="hide-for-small">';
		echo '<h6>';
			echo '<li>'; echo get_theme_mod( 'portfolio_filter_title', 'Filter:', 'bean' ); echo '</li>';
			echo '<li><a href="#all" class="active" data-filter="isotope-item">' . __('All', 'bean') . '</a><span class="sep">/</span></li>';
			foreach( $terms as $term ) {
				echo '<li><a href="' . get_term_link($term) .'" data-filter="' . $term->slug .'">' . $term->name . '</a><span class="sep">/</span></li>';
			}
		echo '</h6>';
	echo '</ul>';
}
?>