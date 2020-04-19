<form role="search" method="GET" action="<?php echo home_url('/'); ?>">
	<input type="search" class="form-control" placeholder="Search Posts, Pages..." value="<?php echo get_search_query(); ?>" name="s" title="Search" autocomplete="off">
</form>