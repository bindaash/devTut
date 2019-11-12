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
	
	function getProducts() {
		$relatedProducts = getAssociatedProducts($this->getModuleName(), $this->getEntity());
		//echo"<pre>";print_r('Hello'); exit('For');
		$productsCount = count($relatedProducts);
		$productIdsList = array();
		for ($i=1;$i<=$productsCount; $i++) {
			$product = $relatedProducts[$i];
			$productId = $product['hdnProductId'.$i];
			if ($relatedProducts[$i]['lineItemT'.$i] == 'Products') {
				$productIdsList[] = $productId;
			}
		} 
		if ($productIdsList) {
			$imageDetailsList = Products_Record_Model::getProductsImageDetails($productIdsList);
			for ($i=1; $i<=$productsCount; $i++) {
				$product = $relatedProducts[$i];
				$productId = $product['hdnProductId'.$i];
				$imageDetails = $imageDetailsList[$productId];
				if ($imageDetails) {
					$relatedProducts[$i]['productImage'.$i] = $imageDetails[0]['path'].'_'.$imageDetails[0]['orgname'];
				}
			}
		}
		return $relatedProducts;
	}
	
}
