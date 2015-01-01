<?php
/* Copyright (C) Xvezda <http://xvezda.com> */

/**
 * @class  SitemapView
 * @author Xvezda (xvezda@naver.com)
 * @brief  Sitemap module of the View class.
 */

class sitemapView extends sitemap
{
	/**
	 * sitemap output
	 **/
	function sitemap()
	{
		$oSitemapModel = getModel('sitemap');
		$config = $oSitemapModel->getConfig();

		if($config->use_sitemap == 'N')
		{
			exit('Not in use');
		}

		$args = new stdClass();
		$args->status = 'PUBLIC';
		$args->except_module_srl = $config->except_module_srl;
		$args->list_count = $config->sitemap_document_count;

		$result = executeQuery('sitemap.getDocumentSrlByStatus', $args);

		Context::set('oDocument', $result->data);

		// XML
		Context::setResponseMethod('XMLRPC');

		$path = $this->module_path.'tpl/';

		$oTemplate = new TemplateHandler();

		$content = $oTemplate->compile($path, 'sitemap');
		Context::set('content', $content);

		// Set the template file
		$this->setTemplatePath($path);
		$this->setTemplateFile('display');
	}
}

/* End of file sitemap.view.php */
/* Location: ./modules/sitemap/sitemap.view.php */