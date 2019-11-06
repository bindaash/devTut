<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Batch_Module_Model extends Vtiger_Module_Model {
	
	function getRelatedProductBySalesOrder($salesOrderId) {
		//return array(2242,2243);
		$adb = PearDatabase::getInstance();
		$result = $adb->pquery("SELECT productid FROM  vtiger_inventoryproductrel WHERE id = ?", array($salesOrderId) );
		$numrows = $adb->num_rows($result);
		$productid = array();
		for($index =0; $index<$numrows; $index++){ 
			$productid[] = $adb->query_result($result, $index, 'productid');
			
		} //print_r($productid); die;
		return $productid; 	
	}
}
