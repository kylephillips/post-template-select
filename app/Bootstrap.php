<?php 

namespace TemplateSelect;

/**
* Plugin Bootstrap
*/
class Bootstrap 
{

	function __construct()
	{
		$this->init();
		add_action( 'plugins_loaded', array($this, 'addLocalization') );
	}

	/**
	* Initialize
	*/
	public function init()
	{
		new PostMeta\PostMeta;
	}

	/**
	* Localization Domain
	*/
	public function addLocalization()
	{
		load_plugin_textdomain(
			'templateselect', 
			false, 
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages' );
	}

}