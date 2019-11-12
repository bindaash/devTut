<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Batch_Record_Model extends Vtiger_Record_Model {
	/**
	 * Function to get acive status of record
	 */
	/*public function getActiveStatusOfRecord(){
		$activeStatus = $this->get('id');
		print_r($activeStatus); die;
		if($activeStatus){
			return $activeStatus;
		}
		$recordId = $this->getId();
		$db = PearDatabase::getInstance();
		$result = $db->pquery('SELECT id FROM vtiger_products WHERE productid = ?',array($recordId));
		$activeStatus = $db->query_result($result, 'discontinued');
		return $activeStatus;
	}*/
	function getProductAndSalesOrder() {
		$relatedProdAndSales = getAsBatchProductsSalesOrder($this->getModuleName(), $this->getEntity());
		//echo"<pre>";print_r($relatedProdAndSales); exit('For');
		$itemsCount = count($relatedProdAndSales);
		$itemIdsList = array();
		for ($i=1;$i<=$itemsCount; $i++) {
			$product = $relatedProdAndSales[$i];
			$productId = $product['hdnProductId'.$i];
			if ($relatedProdAndSales[$i]['lineItemT'.$i] == 'Products') {
				$itemIdsList[] = $productId;
			}
		} 
		/* if ($itemIdsList) {
			$imageDetailsList = Products_Record_Model::getProductsImageDetails($itemIdsList);
			for ($i=1; $i<=$itemsCount; $i++) {
				$product = $relatedProdAndSales[$i];
				$productId = $product['hdnProductId'.$i];
				$imageDetails = $imageDetailsList[$productId];
				if ($imageDetails) {
					$relatedProdAndSales[$i]['productImage'.$i] = $imageDetails[0]['path'].'_'.$imageDetails[0]['orgname'];
				}
			}
		} */
		return $relatedProdAndSales;
	}
	/**
	 * Function to get Url to Create a new Quote from this record
	 * @return <String> Url to Create new Quote
	 */
	function getCreateBatchInventoryUrl() {
		$binvModuleModel = Vtiger_Module_Model::getInstance('BatchInventory');

		return "index.php?module=".$binvModuleModel->getName()."&view=".$binvModuleModel->getEditViewName()."&batch_inv_number=".$this->getId().
				"&sourceModule=".$this->getModuleName()."&sourceRecord=".$this->getId()."&relationOperation=true";
	}
	
	
	
	
	
	
	
}