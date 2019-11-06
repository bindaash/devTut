<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class BatchMovement_Detail_View extends Vtiger_Detail_View {
	function preProcess(Vtiger_Request $request) {
		$viewer = $this->getViewer($request);
		$viewer->assign('NO_SUMMARY', true);
		parent::preProcess($request);
	}
	/**
	 * Function returns BatchInventory details
	 * @param Vtiger_Request $request
	 */
	function showModuleDetailView(Vtiger_Request $request) {
		$this->showLineItemDetails($request);
		return parent::showModuleDetailView($request);
	}
	
	/**
	 * Function returns BatchInventory details
	 * @param Vtiger_Request $request
	 * @return type
	 */
	function showDetailViewByMode(Vtiger_Request $request) {
		$requestMode = $request->get('requestMode');
		if($requestMode == 'full') {
			return $this->showModuleDetailView($request);
		}
		echo parent::showDetailViewByMode($request);
	}

	function showModuleBasicView($request) {
		$requestMode = $request->get('requestMode');
		if($requestMode == 'full') {
			return $this->showModuleDetailView($request);
		}
		echo parent::showModuleBasicView($request);
	}

	function showModuleSummaryView($request) {
		$recordId = $request->get('record');
		$moduleName = $request->getModule();
		$recordModel = Inventory_Record_Model::getInstanceById($recordId);
		$relatedBatch = $recordModel->getBatch();
		$finalDetails = $relatedBatch[1];
		$relatedBatch[1] = $finalDetails;
		$batchCount = count($relatedBatch);
		for ($i=1; $i<=$batchCount; $i++) {
			$batch = $relatedBatch[$i];

			$relatedBatch[$i] = $batch;
		}
		$viewer = $this->getViewer($request);
		$viewer->assign('RELATED_BATCH', $relatedBatch);
		$viewer->assign('RECORD', $recordModel);
		$viewer->assign('MODULE_NAME',$moduleName); 
		return $viewer->view('ModuleSummaryView.tpl',  $moduleName, true);
		//return $viewer->view('ModuleSummaryView.tpl', $moduleName, true);
	}
	
	/**
	 * Function returns BatchInventory Line Items
	 * @param Vtiger_Request $request
	 */
	function showLineItemDetails(Vtiger_Request $request) {
		$record = $request->get('record');
		$moduleName = $request->getModule();
		$recordModel = Inventory_Record_Model::getInstanceById($record);
		//$recordModel = Vtiger_Record_Model::getInstanceById($productId);
		$relatedBatch = $recordModel->getBatch();
		//##Final details convertion started
		//$finalDetails = $relatedBatch[1]['final_details'];
		$finalDetails = $relatedBatch[1];
		$relatedBatch[1] = $finalDetails;
		//##Final details convertion ended
		//##Product details convertion started
		$batchCount = count($relatedBatch);
		for ($i=1; $i<=$batchCount; $i++) {
			$batch = $relatedBatch[$i];

			$relatedBatch[$i] = $batch;
		}
		$viewer = $this->getViewer($request);
		$viewer->assign('RELATED_BATCH', $relatedBatch);
		$viewer->assign('RECORD', $recordModel);
		$viewer->assign('MODULE_NAME',$moduleName);
		//$viewer->view('LineItemsDetail.tpl', 'BatchInventory');
	}

}
