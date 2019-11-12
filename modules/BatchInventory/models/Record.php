<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class BatchInventory_Record_Model extends Vtiger_Record_Model {
	
	function getItemBatch() {
		$relatedProducts = getAssociatedProducts($this->getModuleName(), $this->getEntity());
		$productsCount = count($relatedProducts);
		$productIdsList = array();
		//echo"<pre>";print_r($relatedProducts[1]); exit('2nd Step');
		for ($i=1;$i<=$productsCount; $i++) {
			$product = $relatedProducts[$i];
			$productId = $product['hdnBatchId'.$i];
			if ($relatedProducts[$i]['lineItemT'.$i] == 'Batch') {
				$productIdsList[] = $productId;
				//echo"<pre>";print_r($productIdsList); 
			}
		} //exit('2nd Step');
		 if ($productIdsList) {
			$imageDetailsList = Products_Record_Model::getItemBatchImageDetails($productIdsList);
			for ($i=1; $i<=$productsCount; $i++) {
				$product = $relatedProducts[$i];
				$productId = $product['hdnBatchId'.$i];
				$imageDetails = $imageDetailsList[$productId];
				if ($imageDetails) {
					$relatedProducts[$i]['batchtImage'.$i] = $imageDetails[0]['path'].'_'.$imageDetails[0]['orgname'];
				}
			}
		} 
		//echo"<pre>";print_r($relatedProducts); exit('2nd Step');
		return $relatedProducts;
	}
	
}
