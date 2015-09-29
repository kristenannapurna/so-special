<div class="left-sidebar">
	<form id="searchform" action="<?php bloginfo('home'); ?>/" method="get">
	        <input class="inlineSearch" type="text" name="s" placeholder="Search FAQ..." onblur="if (this.value == '') {this.value = 'Search FAQ';}" onfocus="if (this.value == 'Search FAQ') {this.value = '';}" />
	        <input type="hidden" name="post_type" value="faq" />
	</form>
	<h2>Categories</h2>
	<?php 
		$faq = get_object_taxonomies('faq');

		if($faq)
		{
			foreach($faq as $tax)
			{
				$args = array(
						'orderby' => 'name',
						'show_count' => 1,
						'pad_counts' => 0,
						'heirarchical' => 1,
						'taxonomy' => $tax,
						'title_li' => '',
						'show_option_none'=>''
					);
				wp_list_categories( $args );
			}
		}
	 ?>
</div>