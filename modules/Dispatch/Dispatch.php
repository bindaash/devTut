<?php
include_once 'modules/Vtiger/CRMEntity.php';

class Dispatch extends Vtiger_CRMEntity {

        var $table_name = 'vtiger_dispatch';

        var $table_index= 'dispatchid';
		var $customFieldTable = Array('vtiger_dispatchcf', 'dispatchid');
		var $tab_name = Array('vtiger_crmentity', 'vtiger_dispatch', 'vtiger_dispatchcf', 'vtiger_dispatch_item', 'vtiger_movementrel');
		var $tab_name_index = Array(

                'vtiger_crmentity' => 'crmid',

                'vtiger_dispatch' => 'dispatchid',

                'vtiger_dispatchcf'=>'dispatchid',
				
                'vtiger_dispatch_item'=>'id',
				
                'vtiger_movementrel'=>'id'
				);



        var $list_fields = Array (

                /* Format: Field Label => Array(tablename, columnname) */

                // tablename should not have prefix 'vtiger_'

                'Dispatch Name' => Array('dispatch', 'dispatch_name'),

                'Date' => Array('dispatch', 'dispatch_date'),

                'Sales Order' => Array('dispatch', 'dispatch_so'),

                'Invoice' => Array('dispatch', 'dispatch_inv'),

                'Remarks' => Array('dispatch', 'dispatch_remark'),

                'Assigned To' => Array('crmentity','smownerid')

        );

        var $list_fields_name = Array (

                /* Format: Field Label => fieldname */

				'Dispatch Name' => 'dispatch_name',

                'Date' => 'dispatch_date',

                'Sales Order' => 'dispatch_so',

                'Invoice' => 'dispatch_inv',

                'Remarks' => 'dispatch_remark',

                'Assigned To' => 'assigned_user_id'

        );



        // Make the field link to detail view

        var $list_link_field = 'dispatch_name';



        // For Popup listview and UI type support

        var $search_fields = Array(

                /* Format: Field Label => Array(tablename, columnname) */

                // tablename should not have prefix 'vtiger_'

				'Dispatch Name' => Array('dispatch', 'dispatch_name'),

                'Date' => Array('dispatch', 'dispatch_date'),

                'Sales Order' => Array('dispatch', 'dispatch_so'),

                'Invoice' => Array('dispatch', 'dispatch_inv'),

                'Remarks' => Array('dispatch', 'dispatch_remark'),

                'Assigned To' => Array('vtiger_crmentity','assigned_user_id')

        );

        var $search_fields_name = Array (

                /* Format: Field Label => fieldname */

                'Dispatch Name' => 'dispatch_name',

                'Date' => 'dispatch_date',

                'Sales Order' => 'dispatch_so',

                'Invoice' => 'dispatch_inv',

                'Remarks' => 'dispatch_remark',

                'Assigned To' => 'assigned_user_id'

        );



        // For Popup window record selection

        var $popup_fields = Array ('dispatch_name');



        // For Alphabetical search

        var $def_basicsearch_col = 'dispatch_name';



        // Column value to use on detail view record text display

        var $def_detailview_recname = 'dispatch_name';



        // Used when enabling/disabling the mandatory fields for the module.

        // Refers to vtiger_field.fieldname values.

        var $mandatory_fields = Array('dispatch_name','assigned_user_id');



        var $default_order_by = 'dispatch_name';

        var $default_sort_order='ASC';
		
	function __construct(){
		global $log, $currentModule;
		$this->column_fields = getColumnFields('Dispatch');
		$this->db = new PearDatabase();
		$this->log = $log;
	}
	
	/** Constructor Function for Dispatch class
	*  This function creates an instance of LoggerManager class using getLogger method
	*  creates an instance for PearDatabase class and get values for column_fields array of Dispatch class.
	*/
	function Dispatch() { 
		$this->log =LoggerManager::getLogger('Dispatch');
		$this->db = PearDatabase::getInstance();
		$this->column_fields = getColumnFields('Dispatch');
	}
	function save_module($module){ 
		if(isset($_REQUEST)) {
			if($_REQUEST['action'] != 'DispatchAjax' && $_REQUEST['ajxaction'] != 'DETAILVIEW'
					&& $_REQUEST['action'] != 'MassEditSave' && $_REQUEST['action'] != 'ProcessDuplicates'
					&& $_REQUEST['action'] != 'SaveAjax' && $_REQUEST['action'] != 'FROM_WS') {
				//Based on the total Number of rows we will save the vtiger_Dispatch_item relationship with this entity
				//echo"<pre>"; print_r($_REQUEST); die('Ex1');
				saveInventoryProductRelDispatch($this, 'Dispatch');
			} 
		}
	}
	/**
	* Function to get Contact related Products
	* @param  integer   $id  - Dispatchid
	* returns related Products record in array format
	*/
	function get_products($id, $cur_tab_id, $rel_tab_id, $actions=false) {
		global $log, $singlepane_view,$currentModule,$current_user;
		$log->debug("Entering get_products(".$id.") method ...");
		$this_module = $currentModule;

        $related_module = vtlib_getModuleNameById($rel_tab_id);
		require_once("modules/$related_module/$related_module.php");
		$other = new $related_module();
        vtlib_setup_modulevars($related_module, $other);
		$singular_modname = vtlib_toSingular($related_module);

		$parenttab = getParentTab();

		if($singlepane_view == 'true')
			$returnset = '&return_module='.$this_module.'&return_action=DetailView&return_id='.$id;
		else
			$returnset = '&return_module='.$this_module.'&return_action=CallRelatedList&return_id='.$id;

		$button = '';

		if($actions) {
			if(is_string($actions)) $actions = explode(',', strtoupper($actions));
			if(in_array('SELECT', $actions) && isPermitted($related_module,4, '') == 'yes') {
				$button .= "<input title='".getTranslatedString('LBL_SELECT')." ". getTranslatedString($related_module). "' class='crmbutton small edit' type='button' onclick=\"return window.open('index.php?module=$related_module&return_module=$currentModule&action=Popup&popuptype=detailview&select=enable&form=EditView&form_submit=false&recordid=$id&parenttab=$parenttab','test','width=640,height=602,resizable=0,scrollbars=0');\" value='". getTranslatedString('LBL_SELECT'). " " . getTranslatedString($related_module) ."'>&nbsp;";
			}
			if(in_array('ADD', $actions) && isPermitted($related_module,1, '') == 'yes') {
				$button .= "<input title='".getTranslatedString('LBL_ADD_NEW'). " ". getTranslatedString($singular_modname) ."' class='crmbutton small create'" .
					" onclick='this.form.action.value=\"EditView\";this.form.module.value=\"$related_module\"' type='submit' name='button'" .
					" value='". getTranslatedString('LBL_ADD_NEW'). " " . getTranslatedString($singular_modname) ."'>&nbsp;";
			}
		}

		$query = 'SELECT vtiger_products.productid, vtiger_products.productname, vtiger_products.productcode,
		 		  vtiger_products.commissionrate, vtiger_products.qty_per_unit, vtiger_products.unit_price,
				  vtiger_crmentity.crmid, vtiger_crmentity.smownerid,vtiger_contactdetails.lastname
				FROM vtiger_products
				INNER JOIN vtiger_seproductsrel
					ON vtiger_seproductsrel.productid=vtiger_products.productid and vtiger_seproductsrel.setype="Contacts"
				INNER JOIN vtiger_productcf
					ON vtiger_products.productid = vtiger_productcf.productid
				INNER JOIN vtiger_crmentity
					ON vtiger_crmentity.crmid = vtiger_products.productid
				INNER JOIN vtiger_contactdetails
					ON vtiger_contactdetails.contactid = vtiger_seproductsrel.crmid
				LEFT JOIN vtiger_users
					ON vtiger_users.id=vtiger_crmentity.smownerid
				LEFT JOIN vtiger_groups
					ON vtiger_groups.groupid = vtiger_crmentity.smownerid
			   WHERE vtiger_contactdetails.contactid = '.$id.' and vtiger_crmentity.deleted = 0';

		$return_value = GetRelatedList($this_module, $related_module, $other, $query, $button, $returnset);

		if($return_value == null) $return_value = Array();
		$return_value['CUSTOM_BUTTON'] = $button;

		$log->debug("Exiting get_products method ...");
		return $return_value;
	}
	/**	function used to get the list of sales orders which are related to the Dispatch
	 *	@param int $id - Dispatchid
	 *	@return array - array which will be returned from the function GetRelatedList
	 */
	function get_salesorder($id, $cur_tab_id, $rel_tab_id, $actions=false) {
		global $log, $singlepane_view,$currentModule,$current_user;
		$log->debug("Entering get_salesorder(".$id.") method ...");
		$this_module = $currentModule;

		$related_module = vtlib_getModuleNameById($rel_tab_id);
		require_once("modules/$related_module/$related_module.php");
		$other = new $related_module();
		vtlib_setup_modulevars($related_module, $other);
		$singular_modname = vtlib_toSingular($related_module);

		$parenttab = getParentTab();

		if($singlepane_view == 'true')
			$returnset = '&return_module='.$this_module.'&return_action=DetailView&return_id='.$id;
		else
			$returnset = '&return_module='.$this_module.'&return_action=CallRelatedList&return_id='.$id;

		$button = '';

		if($actions) {
			if(is_string($actions)) $actions = explode(',', strtoupper($actions));
			if(in_array('SELECT', $actions) && isPermitted($related_module,4, '') == 'yes') {
				$button .= "<input title='".getTranslatedString('LBL_SELECT')." ". getTranslatedString($related_module). "' class='crmbutton small edit' type='button' onclick=\"return window.open('index.php?module=$related_module&return_module=$currentModule&action=Popup&popuptype=detailview&select=enable&form=EditView&form_submit=false&recordid=$id&parenttab=$parenttab','test','width=640,height=602,resizable=0,scrollbars=0');\" value='". getTranslatedString('LBL_SELECT'). " " . getTranslatedString($related_module) ."'>&nbsp;";
			}
			if(in_array('ADD', $actions) && isPermitted($related_module,1, '') == 'yes') {
				$button .= "<input title='".getTranslatedString('LBL_ADD_NEW'). " ". getTranslatedString($singular_modname) ."' class='crmbutton small create'" .
					" onclick='this.form.action.value=\"EditView\";this.form.module.value=\"$related_module\"' type='submit' name='button'" .
					" value='". getTranslatedString('LBL_ADD_NEW'). " " . getTranslatedString($singular_modname) ."'>&nbsp;";
			}
		}

		$userNameSql = getSqlForNameInDisplayFormat(array('first_name'=>
							'vtiger_users.first_name', 'last_name' => 'vtiger_users.last_name'), 'Users');
		$query = "SELECT vtiger_crmentity.*,
			vtiger_salesorder.*,
			vtiger_products.productname AS productname,
			vtiger_account.accountname,
			case when (vtiger_users.user_name not like '') then $userNameSql
				else vtiger_groups.groupname end as user_name
			FROM vtiger_salesorder
			INNER JOIN vtiger_crmentity
				ON vtiger_crmentity.crmid = vtiger_salesorder.salesorderid
			INNER JOIN vtiger_inventoryproductrel
				ON vtiger_inventoryproductrel.id = vtiger_salesorder.salesorderid
			INNER JOIN vtiger_products
				ON vtiger_products.productid = vtiger_inventoryproductrel.productid
			LEFT OUTER JOIN vtiger_account
				ON vtiger_account.accountid = vtiger_salesorder.accountid
			LEFT JOIN vtiger_groups
				ON vtiger_groups.groupid = vtiger_crmentity.smownerid
			LEFT JOIN vtiger_salesordercf
				ON vtiger_salesordercf.salesorderid = vtiger_salesorder.salesorderid
			LEFT JOIN vtiger_invoice_recurring_info
				ON vtiger_invoice_recurring_info.start_period = vtiger_salesorder.salesorderid
			LEFT JOIN vtiger_sobillads
				ON vtiger_sobillads.sobilladdressid = vtiger_salesorder.salesorderid
			LEFT JOIN vtiger_soshipads
				ON vtiger_soshipads.soshipaddressid = vtiger_salesorder.salesorderid
			LEFT JOIN vtiger_users
				ON vtiger_users.id = vtiger_crmentity.smownerid
			WHERE vtiger_crmentity.deleted = 0
			AND vtiger_products.productid = ".$id;

		$return_value = GetRelatedList($this_module, $related_module, $other, $query, $button, $returnset);

		if($return_value == null) $return_value = Array();
		$return_value['CUSTOM_BUTTON'] = $button;

		$log->debug("Exiting get_salesorder method ...");
		return $return_value;
	}
}