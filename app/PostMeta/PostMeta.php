<?php

namespace TemplateSelect\PostMeta;

use TemplateSelect\Repositories\PostTypeRepository;
use TemplateSelect\Repositories\TemplateRepository;
use TemplateSelect\Helpers;

class PostMeta
{
	/**
	* Post Type Repo
	*/
	private $post_type_repo;

	/**
	* Template Repo
	*/
	private $template_repo;

	/**
	* Current Post's Template
	*/
	private $template;

	public function __construct()
	{
		$this->post_type_repo = new PostTypeRepository;
		$this->template_repo = new TemplateRepository;
		add_action( 'add_meta_boxes', array( $this, 'registerMeta' ));
		add_action( 'save_post', array($this, 'saveMeta' ));
	}

	/**
	* Register Post Meta
	*/
	public function registerMeta()
	{
		$types = $this->post_type_repo->getAll();
		foreach($types as $type) :
		add_meta_box( 
			'post-template-select-meta-box', 
			__('Template', 'posttemplateselect'), 
			array($this, 'displayMeta'), 
			$type,
			'side', 
			'high' 
		);
		endforeach;
	}

	/**
	* Display the Meta Field
	*/
	public function displayMeta($post)
	{
		$this->template = get_post_meta($post->ID, '_wp_page_template', true);
		include( Helpers::view('meta-field') );
	}


	/**
	* Save the custom post meta
	*/
	public function saveMeta( $post_id ) 
	{
		if ( !in_array( get_post_type($post_id), $this->post_type_repo->getAll() ) ) return $post_id;
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return $post_id;
		if( !isset( $_POST['template_select_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['template_select_meta_box_nonce'], 'my_template_select_meta_box_nonce' ) ) return $post_id;

		if ( isset($_POST['_wp_page_template']) && $_POST['_wp_page_template'] == "" ) delete_post_meta($post_id, '_wp_page_template');
		if ( isset($_POST['_wp_page_template']) && $_POST['_wp_page_template'] !== "" ) update_post_meta($post_id, '_wp_page_template', esc_attr($_POST['_wp_page_template']));
	} 
}