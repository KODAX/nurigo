<?php
	/**
	 * @class  inipaystandard
     * @author CONORY (http://www.conory.com)
	 * @brief The parent class of the inipaystandard module
	 */
	class inipaystandard extends ModuleObject
	{
		/**
		 * @brief ��� ��ġ
		 */
		function moduleInstall()
		{
            $oModuleModel = getModel('module');
            $oModuleController = getController('module');
			
			return new Object();
		}

		/**
		 * @brief ������Ʈ üũ
		 */
		function checkUpdate()
		{
            $oDB = DB::getInstance();
            $oModuleModel = getModel('module');	
			
			if(!$oModuleModel->getTrigger('moduleHandler.init', 'inipaystandard', 'controller', 'triggerModuleHandler', 'before')) return true;
			if(!$oModuleModel->getTrigger('epay.getPgModules', 'inipaystandard', 'model', 'triggerGetPgModules', 'before')) return true;
			
			return false;
		}

		/**
		 * @brief ������Ʈ
		 */
		function moduleUpdate()
		{
            $oDB = DB::getInstance();
            $oModuleModel = getModel('module');
            $oModuleController = getController('module');		
			
			if(!$oModuleModel->getTrigger('epay.getPgModules', 'inipaystandard', 'model', 'triggerGetPgModules', 'before'))
				$oModuleController->insertTrigger('epay.getPgModules', 'inipaystandard', 'model', 'triggerGetPgModules', 'before');
			
			if(!$oModuleModel->getTrigger('moduleHandler.init', 'inipaystandard', 'controller', 'triggerModuleHandler', 'before'))
				$oModuleController->insertTrigger('moduleHandler.init', 'inipaystandard', 'controller', 'triggerModuleHandler', 'before');
			
			return new Object(0, 'success_updated');
		}
		
		/**
		 * @brief ������
		 */
		function moduleUninstall()
		{
			return new Object();
		}
		
		/**
		 * @brief ĳ������ �����
		 */
		function recompileCache()
		{
			
		}
	}