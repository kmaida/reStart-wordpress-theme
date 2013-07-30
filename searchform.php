<section class="search-form clearfix">
	<form method="get" action="<?php echo home_url(); ?>/">
	    <label for="s">Search</label>
	    <input type="text" id="s" class="s search-input" name="s" value="<?php the_search_query(); ?>">
	    <input id="search-submit" class="search-submit" type="submit" value="Search">
	</form>
</section>