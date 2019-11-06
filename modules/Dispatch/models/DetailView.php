<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Dispatch_DetailView_Model extends Vtiger_DetailView_Model {

	/**
	 * Function to get the detail view links (links and widgets)
	 * @param <array> $linkParams - parameters which will be used to calicaulate the params
	 * @return <array> - array of link models in the format as below
	 *                   array('linktype'=>list of link models);
	 */
	/*public function getDetailViewLinks($linkParams) {
		$currentUserModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();

		$linkModelList = parent::getDetailViewLinks($linkParams);
		$recordModel = $this->getRecord();
 
		if ($recordModel->getActiveStatusOfRecord()) {
			$biModuleModel = Vtiger_Module_Model::getInstance('Dispatch');
			if($currentUserModel->hasModuleActionPermission($biModuleModel->getId(), 'CreateView')) {
				$basicActionLink = array(
						'linktype' => 'DETAILVIEW',
						'linklabel' => vtranslate('LBL_CREATE').' '.vtranslate($biModuleModel->getSingularLabelKey(), 'Dispatch'),
						'linkurl' => $recordModel->getCreateDispatchUrl(),
						'linkicon' => ''
				);
				$linkModelList['DETAILVIEW'][] = Vtiger_Link_Model::getInstanceFromValues($basicActionLink);
			}
			
			//$biModuleModel = Vtiger_Module_Model::getInstance('Dispatch');
			if($currentUserModel->hasModuleActionPermission($biModuleModel->getId(), 'CreateView')) {
				$basicActionLink = array(
						'linktype' => 'DETAILVIEW',
						'linklabel' => 'Generate Report',
						'linkurl' => '',
						'linkicon' => ''
				);
				$linkModelList['DETAILVIEW'][] = Vtiger_Link_Model::getInstanceFromValues($basicActionLink);
			}
		}

		return $linkModelList;
	}*/

}
