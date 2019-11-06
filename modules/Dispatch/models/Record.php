<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Dispatch_Record_Model extends Vtiger_Record_Model {
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
	function getProducts() {
		$relatedProd = getAssociatedProducts($this->getModuleName(), $this->getEntity());
		//echo"<pre>";print_r($relatedProd); exit('For');
		$itemsCount = count($relatedProd);
		$itemIdsList = array();
		for ($i=1;$i<=$itemsCount; $i++) {
			$product = $relatedProd[$i];
			$productId = $product['hdnProductId'.$i];
			if ($relatedProd[$i]['lineItemT'.$i] == 'Products') {
				$itemIdsList[] = $productId;
			}
		} 
		return $relatedProd;
	}
	/**
	 * Function to get Url to Create a new Quote from this record
	 * @return <String> Url to Create new Quote
	 */
	/*function getCreateDispatchInventoryUrl() {
		$binvModuleModel = Vtiger_Module_Model::getInstance('BatchInventory');

		return "index.php?module=".$binvModuleModel->getName()."&view=".$binvModuleModel->getEditViewName()."&batch_inv_number=".$this->getId().
				"&sourceModule=".$this->getModuleName()."&sourceRecord=".$this->getId()."&relationOperation=true";
	}*/
	
	
	
	
	
	
	
}