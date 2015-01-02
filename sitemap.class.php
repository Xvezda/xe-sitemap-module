<?php
/* Copyright (C) Xvezda <http://xvezda.com> */

/**
 * @class  Sitemap
 * @author Xvezda (xvezda@naver.com)
 * @brief  Sitemap module high class.
 */

class sitemap extends ModuleObject
{
	private $triggers = array(
		array('display', 'sitemap', 'controller', 'triggerBeforeDisplay', 'before')
	);

	function moduleInstall()
	{
		$oModuleController = getController('module');
		foreach ($this->triggers as $trigger)
		{
			$oModuleController->insertTrigger($trigger[0], $trigger[1], $trigger[2], $trigger[3], $trigger[4]);
		}

		return new Object();
	}

	function checkUpdate()
	{
		$oModuleModel = getModel('module');

		foreach ($this->triggers as $trigger) {
			if (!$oModuleModel->getTrigger($trigger[0], $trigger[1], $trigger[2], $trigger[3], $trigger[4])) return TRUE;
		}

		return FALSE;
	}

	function moduleUpdate()
	{
		$oModuleModel = getModel('module');
		$oModuleController = getController('module');

		foreach ($this->triggers as $trigger) {
			if (!$oModuleModel->getTrigger($trigger[0], $trigger[1], $trigger[2], $trigger[3], $trigger[4])) {
				$oModuleController->insertTrigger($trigger[0], $trigger[1], $trigger[2], $trigger[3], $trigger[4]);
			}
		}

		return new Object(0, 'success_updated');
	}

	function moduleUninstall()
	{
		$oModuleController = getController('module');

		foreach ($this->triggers as $trigger) {
			$oModuleController->deleteTrigger($trigger[0], $trigger[1], $trigger[2], $trigger[3], $trigger[4]);
		}

		return new Object();
	}


	function recompileCache()
	{
		return new Object();
	}
}

/* End of file sitemap.class.php */
/* Location: ./modules/sitemap/sitemap.class.php */