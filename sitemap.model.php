<?php
/* Copyright (C) Xvezda <http://xvezda.com> */

/**
 * @class  SitemapModel
 * @author Xvezda (xvezda@naver.com)
 * @brief  Sitemap module of the Model class.
 */

class sitemapModel extends sitemap
{
	/**
	 * get the configuration
	 * @return object config of sitemap module
	 **/
	function getConfig()
	{
		$oModuleModel = getModel('module');
		$sitemap_config = $oModuleModel->getModuleConfig('sitemap');

		if(!is_object($sitemap_config))
		{
			$sitemap_config = new stdClass();
		}

		if(!$sitemap_config->use_sitemap)
		{
			$sitemap_config->use_sitemap = 'Y';
		}
		
		if(!$sitemap_config->use_mid_exception)
		{
			$sitemap_config->use_mid_exception = 'Y';
		}
		
		if(!$sitemap_config->use_lastmod)
		{
			$sitemap_config->use_lastmod = 'Y';
		}

		if(!$sitemap_config->sitemap_extension)
		{
			$sitemap_config->sitemap_extension = 0;
		}

		if(!$sitemap_config->except_module)
		{
			$sitemap_config->except_module = '';
		}

		if(!$sitemap_config->sitemap_document_count)
		{
			$sitemap_config->sitemap_document_count = 100;
		}

		if(!$sitemap_config->use_search_index)
		{
			$sitemap_config->use_search_index = 'N';
		}
		
		if(!$sitemap_config->except_deleted)
		{
			$sitemap_config->except_deleted = 'Y';
		}

		if(!$sitemap_config->except_secret)
		{
			$sitemap_config->except_secret = 'Y';
		}

		if(!$sitemap_config->except_admin)
		{
			$sitemap_config->except_admin = 'Y';
		}

		if(!$sitemap_config->metatag)
		{
			$sitemap_config->metatag = 'all';
		}

		return $sitemap_config;
	}

	/**
	 * add robots meta tag
	 **/
	function addRobotsMeta($content)
	{
		Context::addHtmlHeader('<meta name="robots" content="'.$content.'" />');
	}
}

/* End of file sitemap.model.php */
/* Location: ./modules/sitemap/sitemap.model.php */