<?php

namespace TemplateSelect\Repositories;

class PostTypeRepository
{
	/**
	* Get all post types
	* @return array
	*/
	public function getAll()
	{
		return get_post_types(array(
			'public' => true
		));
	}
}