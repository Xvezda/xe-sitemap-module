<?php
/* Copyright (C) Xvezda <http://xvezda.com> */

/**
 * @class  sitemapAdminView
 * @author Xvezda (xvezda@naver.com)
 * @brief  Sitemap module admin view class.
 */
class sitemapAdminView extends sitemap
{
	/**
	 * Initialization
	 * @return void
	 */
	function init()
	{
		$this->setTemplatePath($this->module_path . 'tpl');
		$this->setTemplateFile(strtolower(str_replace('dispSitemapAdmin', '', $this->act)));
	}

	/**
	 * Display index admin page
	 * @return void|object
	 */
	function dispSitemapAdminIndex()
	{
		$oSitemapModel = getModel('sitemap');

		// get configuration of sitemap module
		Context::set('sitemap_config', $oSitemapModel->getConfig());

		Context::set('metatag_list', array('all', 'noindex', 'nofollow', 'none', 'noarchive', 'nosnippet'));
	}

	/**
	 * Display index admin page
	 * @return void|object
	 */
	function dispSitemapAdminRobots()
	{
	
	}

}

/* End of file sitemap.admin.view.php */
/* Location: ./modules/sitemap/sitemap.admin.view.php */
