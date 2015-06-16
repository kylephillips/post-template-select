<?php

namespace TemplateSelect\PostMeta;

use TemplateSelect\Repositories\PostTypeRepository;

class PostMeta
{
	/**
	* Post Type Repo
	*/
	private $post_type_repo;

	public function __construct()
	{
		$this->post_type_repo = new PostTypeRepository;
		add_action( 'add_meta_boxes', array( $this, 'registerMeta' ));
	}

	/**
	* Register Post Meta
	*/
	public function registerMeta()
	{
		var_dump($this->post_type_repo->getAll());
	}
}