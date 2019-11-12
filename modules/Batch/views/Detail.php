<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class Batch_Detail_View extends Vtiger_Detail_View {
	
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
		$relatedProdAndSales = $recordModel->getProductAndSalesOrder();
		$finalDetails = $relatedProdAndSales[1];
		$relatedProdAndSales[1] = $finalDetails;
		$itemCount = count($relatedProdAndSales);
		for ($i=1; $i<=$itemCount; $i++) {
			$product = $relatedProdAndSales[$i];

			$relatedProdAndSales[$i] = $product;
		}
		$viewer = $this->getViewer($request);
		$viewer->assign('RELATED_ITEMS', $relatedProdAndSales);
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
		//$recordModel = Inventory_Record_Model::getInstanceById($record);
		$recordModel = Vtiger_Record_Model::getInstanceById($record);
		$relatedProdAndSales = $recordModel->getProductAndSalesOrder();
		//##Final details convertion started
		//echo"<pre>";print_r($relatedProdAndSales);die;
		//$finalDetails = $relatedProdAndSales[1]['final_details'];
		$finalDetails = $relatedProdAndSales[1];
		$relatedProdAndSales[1] = $finalDetails;
		//##Final details convertion ended
		//##Product details convertion started
		$itemCount = count($relatedProdAndSales);
		for ($i=1; $i<=$itemCount; $i++) {
			$product = $relatedProdAndSales[$i];

			$relatedProdAndSales[$i] = $product;
		}
		$viewer = $this->getViewer($request);
		$viewer->assign('RELATED_ITEMS', $relatedProdAndSales);
		$viewer->assign('RECORD', $recordModel);
		$viewer->assign('MODULE_NAME',$moduleName);
		//$viewer->view('LineItemsDetail.tpl', 'BatchInventory');
	}

	
}
