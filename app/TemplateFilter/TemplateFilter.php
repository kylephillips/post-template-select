<?php

namespace TemplateSelect\TemplateFilter;

class TemplateFilter
{
	public function __construct()
	{
		add_filter( 'single_template', array($this, 'changeTemplate'), 99 );
	}

	/**
	* Change the Post Template
	*/
	public function changeTemplate($template)
	{
		global $post;
		if ( !$post ) return $template;
		$custom_template = get_post_meta($post->ID, '_wp_page_template', true);
		if ( $custom_template ) {
			$custom_template = locate_template(array($custom_template));
			return $custom_template;
		}
		return $template;
	}
}