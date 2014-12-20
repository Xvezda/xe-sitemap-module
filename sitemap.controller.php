<?php
/* Copyright (C) Xvezda <http://xvezda.blog.me> */

/**
 * @class  SitemapController
 * @author Xvezda (xvezda@naver.com)
 * @brief  Sitemap module of the Controller class.
 */

class sitemapController extends sitemap
{
	/**
	 * before display trigger
	 * @return object
	 **/
	function triggerBeforeDisplay(&$output_content)
	{
		$oSitemapModel = getModel('sitemap');
		$config = $oSitemapModel->getConfig();

		$document_srl = $_REQUEST['document_srl'];

		if($document_srl)
		{
			// check if the doument is existed
			$oDocumentModel = getModel('document');
			$oDocument = $oDocumentModel->getDocument($document_srl);
			if(!$oDocument->isExists() && $config->except_deleted == 'Y')
			{
				$oSitemapModel->addRobotsMeta('none');
				return new Object();
			}

			if($oDocument->get('status') == 'SECRET' && $config->except_secret == 'Y')
			{
				$oSitemapModel->addRobotsMeta('none');
				return new Object();
			}
		}

		if(Context::get('module') == 'admin' && $config->except_admin == 'Y')
		{
			$oSitemapModel->addRobotsMeta('none');
			return new Object();
		}
		$oSitemapModel->addRobotsMeta($config->metatag);
	}
}

/* End of file sitemap.controller.php */
/* Location: ./modules/sitemap/sitemap.controller.php */