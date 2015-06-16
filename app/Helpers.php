<?php 

namespace TemplateSelect;

class Helpers 
{
	/**
	* Plugin Root Directory
	*/
	public static function plugin_url()
	{
		return plugins_url() . '/post-template-select';
	}

	/**
	* View
	*/
	public static function view($file)
	{
		return dirname(dirname(__FILE__)) . '/app/Views/' . $file . '.php';
	}

}