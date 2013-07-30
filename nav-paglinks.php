<?php 
	global $wp_query;
	$total_pages = $wp_query->max_num_pages;
	
	if ($total_pages > 1){
		$current_page = max(1, get_query_var('paged'));
		
		$pagination = array(
			'base' => '%_%',
			'format' => '?paged=%#%',	// This URL format may need to be changed depending on how you set up your permalinks / pagination
			'current' => $current_page,
			'total' => $total_pages,
			'add_args' => false
		);
		
		if( $wp_rewrite->using_permalinks() ) {
        	$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'paged=%#%', 'page' );
        }
		
		if( !empty($wp_query->query_vars['s']) ) {
        	$pagination['add_args'] = array( 's' => get_query_var( 's' ) );
        }
        
        echo paginate_links($pagination);
	}
?>