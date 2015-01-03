<?php
/* Copyright (C) Xvezda <http://xvezda.com> */

/**
 * @class  sitemapAdminController
 * @author Xvezda (xvezda@naver.com)
 * @brief  Sitemap module admin controller class.
 */

class sitemapAdminController extends sitemap
{
	/**
	 * Initialization
	 * @return void
	 */
	function init()
	{
	}

	/**
	 * Update config of sitemap module
	 * @return object
	 */
	function procSitemapAdminInsertConfig()
	{
		$oModuleModel = getModel('module');
		$sitemap_config = $oModuleModel->getModuleConfig('sitemap');

		$config_vars = Context::getRequestVars();

		$oModuleController = getController('module');
		$oModuleController->insertModuleConfig('sitemap', $config_vars);

		//$this->setError(0);
		$this->setMessage('success_updated', 'info');

		$returnUrl = Context::get('success_return_url') ? Context::get('success_return_url') : getNotEncodedUrl('', 'module', 'admin', 'act', 'dispSitemapAdminIndex');
		$this->setRedirectUrl($returnUrl);
	}

	/**
	 * Ping to submit sitemap
	 * @return object
	 */
	function procSitemapAdminPingSitemap()
	{
		$pingUrl = array();
		$pingUrl[] = 'http://www.google.com/webmasters/sitemaps/ping?sitemap=';
		$pingUrl[] = 'http://www.bing.com/ping?sitemap=';

		foreach($pingUrl as $url)
		{
			FileHandler::getRemoteResource($url.getFullUrl('').'sitemap.xml');
		}
		$this->setMessage('success_registed');
	}

	/**
	 * Download sitemap
	 */
	function procSitemapAdminDownloadSitemap()
	{
		$oSitemapModel = getModel('sitemap');
		$config = $oSitemapModel->getConfig();

		$args = new stdClass();
		$args->status = 'PUBLIC';
		$args->except_module_srl = $config->except_module_srl;
		$args->list_count = $config->sitemap_document_count;

		$result = executeQuery('sitemap.getDocumentSrlByStatus', $args);

		Context::close();

		header('Content-disposition: attachment; filename=sitemap.txt');
		header('Content-type: text/plain');

		echo getFullUrl('').PHP_EOL; // default url

		// generate sitemap
		foreach($result->data as $oDocument)
		{
			echo getFullUrl('', 'document_srl', $oDocument->document_srl).PHP_EOL;
		}

		exit();
	}
}

/* End of file sitemap.admin.controller.php */
/* Location: ./modules/sitemap/sitemap.admin.controller.php */
