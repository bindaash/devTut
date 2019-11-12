<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class BatchMovement_Record_Model extends Vtiger_Record_Model {
	
	function getBatch() { 
		$relatedBatch = getAssociatedBatch($this->getModuleName(), $this->getEntity());
		///echo"<pre>";print_r($relatedBatch); exit('getAss');
		$batchCount = count($relatedBatch);
		//echo $batchCount; die('Hello'); 
		$batchIdsList = array();
		for ($i=1;$i<=$batchCount; $i++) {
			$batch = $relatedBatch[$i];
			$batchId = $batch['hdnBatchId'.$i];
			if ($relatedBatch[$i]['entityType'.$i] == 'Batch') {
				$batchIdsList[] = $batchId;
			}
		} 
		/*if ($batchIdsList) {
			$imageDetailsList = Products_Record_Model::getProductsImageDetails($batchIdsList);
			for ($i=1; $i<=$productsCount; $i++) {
				$product = $relatedBatch[$i];
				$batchId = $product['hdnbatchId'.$i];
				$imageDetails = $imageDetailsList[$batchId];
				if ($imageDetails) {
					$relatedBatch[$i]['productImage'.$i] = $imageDetails[0]['path'].'_'.$imageDetails[0]['orgname'];
				}
			}
		}*/
		//echo"<pre>";print_r($relatedBatch); exit('For');
		return $relatedBatch;
	}
	
}
