<?php 
	global $wp_query;
	$total_pages = $wp_query->max_num_pages;
	
	if ($total_pages > 1){
		$current_page = max(1, get_query_var('paged'));
		
		echo paginate_links(array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => '?paged=%#%',	// This URL format may need to be changed depending on how you set up your permalinks / pagination
			'current' => $current_page,
			'total' => $total_pages
		));

	}
?>