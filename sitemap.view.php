<?php
/* Copyright (C) Xvezda <http://xvezda.blog.me> */

/**
 * @class  SitemapModel
 * @author Xvezda (xvezda@naver.com)
 * @brief  Sitemap module of the Model class.
 */

class sitemapView extends sitemap
{
	/**
	 * get the configuration
	 * @return object config of sitemap module
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

		Context::set('oDocumentSrl', $result->data);

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

/* End of file sitemap.model.php */
/* Location: ./modules/sitemap/sitemap.model.php */