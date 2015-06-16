<?php 
/**
* Static Wrapper for Bootstrap Class
* Prevents T_STRING error when checking for 5.3.2
*/
class TemplateSelect 
{
	public static function init()
	{
		// dev/live
		global $template_select_env;
		$template_select_env = 'live';

		global $template_select_version;
		$template_select_version = '0.1';

		$app = new TemplateSelect\Bootstrap;
	}
}