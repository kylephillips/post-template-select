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
		$types = get_post_types(array(
			'public' => true
		));
		unset($types['page']);
		return $types;
	}
}