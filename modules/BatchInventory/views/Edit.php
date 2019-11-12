<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
//ini_set('display_errors','on'); error_reporting(E_ERROR & ~E_STRICT); 
Class BatchInventory_Edit_View extends Vtiger_Edit_View {

	public function process(Vtiger_Request $request) {
		$viewer = $this->getViewer($request);
		$moduleName = $request->getModule();
		$record = $request->get('record');
		$sourceRecord = $request->get('sourceRecord');
		$sourceModule = $request->get('sourceModule');
		if(empty($sourceRecord) && empty($sourceModule)) {
			$sourceRecord = $request->get('returnrecord');
			$sourceModule = $request->get('returnmodule');
		}
		
 		$viewer->assign('MODE', '');
		$viewer->assign('IS_DUPLICATE', false);
		if(!empty($record)  && $request->get('isDuplicate') == true) {
			//$recordModel = Inventory_Record_Model::getInstanceById($record, $moduleName);
			$recordModel = Vtiger_Record_Model::getInstanceById($record, $moduleName);
			//$currencyInfo = $recordModel->getCurrencyInfo();
			//$taxes = $recordModel->getProductTaxes();
			$relatedProducts = $recordModel->getItemBatch();
			//While Duplicating record, If the related record is deleted then we are removing related record info in record model
			$mandatoryFieldModels = $recordModel->getModule()->getMandatoryFieldModels();
			foreach ($mandatoryFieldModels as $fieldModel) {
				if ($fieldModel->isReferenceField()) {
					$fieldName = $fieldModel->get('name');
					if (Vtiger_Util_Helper::checkRecordExistance($recordModel->get($fieldName))) {
						$recordModel->set($fieldName, '');
					}
				}
			}
		} elseif (!empty($record)) { 
			$recordModel = BatchInventory_Record_Model::getInstanceById($record, $moduleName);
			$relatedProducts = $recordModel->getItemBatch();
			//echo"<pre>";print_r($relatedProducts); exit('OPut');
			$viewer->assign('RECORD_ID', $record);
			$viewer->assign('MODE', 'edit');
			//echo"<pre>";print_r($viewer); exit(0);
		}else{ 
			$recordModel = Vtiger_Record_Model::getCleanInstance($moduleName);
			//echo"<pre>";print_r($recordModel); die('Hy');
			//The creation of Inventory record from action and Related list of product/service detailview the batch details will calculated by following code
			if ($request->get('batch_id') || $sourceModule === 'Batch' || $request->get('batchid')) {
				if($sourceRecord) {
					$productRecordModel = Products_Record_Model::getInstanceById($sourceRecord);
				} else if($request->get('batch_id')) {
					$productRecordModel = Products_Record_Model::getInstanceById($request->get('product_id'));
				} else if($request->get('batchid')) {
					$productRecordModel = Products_Record_Model::getInstanceById($request->get('productid'));
				}
				$relatedProducts = $productRecordModel->getDetailsForInventoryModule($recordModel);
			} /*else { 
				echo"<pre>";print_r($sourceRecord); die('Hy');
				$parentRecordModel = Vtiger_Record_Model::getInstanceById($sourceRecord, $sourceModule);
				$recordModel->setParentRecordData($parentRecordModel);
				
			} */
		}
		$moduleModel = $recordModel->getModule();
		
		$recordStructureInstance = Vtiger_RecordStructure_Model::getInstanceFromRecordModel($recordModel, Vtiger_RecordStructure_Model::RECORD_STRUCTURE_MODE_EDIT);

		$viewer->assign('VIEW_MODE', "fullForm");

		$isRelationOperation = $request->get('relationOperation');

		//if it is relation edit
		$viewer->assign('IS_RELATION_OPERATION', $isRelationOperation);
		if($isRelationOperation) {
			$viewer->assign('SOURCE_MODULE', $sourceModule);
			$viewer->assign('SOURCE_RECORD', $sourceRecord);
		}
		if(!empty($record)  && $request->get('isDuplicate') == true) {
			$viewer->assign('IS_DUPLICATE',true);
		} else {
			$viewer->assign('IS_DUPLICATE',false);
		}
		$picklistDependencyDatasource = Vtiger_DependencyPicklist::getPicklistDependencyDatasource($moduleName);

		$recordStructure = $recordStructureInstance->getStructure();

		$viewer->assign('PICKIST_DEPENDENCY_DATASOURCE',Vtiger_Functions::jsonEncode($picklistDependencyDatasource));
		$viewer->assign('RECORD',$recordModel);
		$viewer->assign('RECORD_STRUCTURE_MODEL', $recordStructureInstance);
		$viewer->assign('RECORD_STRUCTURE', $recordStructure);
		$viewer->assign('MODULE', $moduleName);
		$viewer->assign('CURRENTDATE', date('Y-n-j'));
		$viewer->assign('USER_MODEL', Users_Record_Model::getCurrentUserModel());
		$viewer->assign('RELATED_PRODUCTS', $relatedProducts);
		
		//$productModuleModel = Vtiger_Module_Model::getInstance('Products');
		//$viewer->assign('PRODUCT_ACTIVE', $productModuleModel->isActive());
		// added to set the return values
		if ($request->get('returnview')) {
			$request->setViewerReturnValues($viewer);
		}
		if ($request->get('displayMode') == 'overlay') { 
			$viewer->assign('SCRIPTS', $this->getOverlayHeaderScripts($request));
			echo $viewer->view('OverlayEditView.tpl', $moduleName);
		} else { 
			$viewer->view('EditView.tpl', 'BatchInventory');
		}
	}

	/**
	 * Function to get the list of Script models to be included
	 * @param Vtiger_Request $request
	 * @return <Array> - List of Vtiger_JsScript_Model instances
	 */
	function getHeaderScripts(Vtiger_Request $request) { 
		$headerScriptInstances = parent::getHeaderScripts($request);

		$moduleName = $request->getModule();
		$modulePopUpFile = 'modules.'.$moduleName.'.resources.Popup';
		$moduleEditFile = 'modules.'.$moduleName.'.resources.Edit';
		unset($headerScriptInstances[$modulePopUpFile]);
		unset($headerScriptInstances[$moduleEditFile]);

		$jsFileNames = array(
				'modules.BatchInventory.resources.Edit',
				'modules.BatchInventory.resources.Popup',
		);
		$jsFileNames[] = $moduleEditFile;
		$jsFileNames[] = $modulePopUpFile;
		$jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
		$headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
		return $headerScriptInstances;
	}

	public function getOverlayHeaderScripts(Vtiger_Request $request) { 
		$moduleName = $request->getModule();
		$modulePopUpFile = 'modules.'.$moduleName.'.resources.Popup';
		$moduleEditFile = 'modules.'.$moduleName.'.resources.Edit';

		$jsFileNames = array(
			'modules.BatchInventory.resources.Popup',
		);
		$jsFileNames[] = $moduleEditFile;
		$jsFileNames[] = $modulePopUpFile;
		$jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
		return $jsScriptInstances;
	}

}
