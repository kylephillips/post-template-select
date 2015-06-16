<?php

namespace TemplateSelect\Repositories;

class TemplateRepository
{
	public function getAll()
	{
		return get_page_templates();
	}
}