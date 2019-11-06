<?php
include_once 'modules/Vtiger/CRMEntity.php';

class Cork extends Vtiger_CRMEntity {
        var $table_name = 'vtiger_cork';
        var $table_index= 'corkid';

        var $customFieldTable = Array('vtiger_corkcf', 'corkid');

        var $tab_name = Array('vtiger_crmentity', 'vtiger_cork', 'vtiger_corkcf');

        var $tab_name_index = Array(
                'vtiger_crmentity' => 'crmid',
                'vtiger_cork' => 'corkid',
                'vtiger_corkcf'=>'corkid');

        var $list_fields = Array (
                /* Format: Field Label => Array(tablename, columnname) */
                // tablename should not have prefix 'vtiger_'
                'Product Name' => Array('cork', 'prd_cork'),
                'Cork Type' => Array('cork', 'cork_type'),
                'Quantity' => Array('cork', 'cork_qty'),
                'Assigned To' => Array('crmentity','smownerid')
        );
        var $list_fields_name = Array (
                /* Format: Field Label => fieldname */
				'Product Name' => 'prd_cork',
                'Cork Type' => 'cork_type',
                'Quantity' => 'cork_qty',
                'Assigned To' => 'assigned_user_id'
        );

        // Make the field link to detail view
        var $list_link_field = 'prd_cork';

        // For Popup listview and UI type support
        var $search_fields = Array(
                /* Format: Field Label => Array(tablename, columnname) */
                // tablename should not have prefix 'vtiger_'
				'Product Name' => Array('cork', 'prd_cork'),
                'Cork Type' => Array('cork', 'cork_type'),
                'Quantity' => Array('cork', 'cork_qty'),
                'Assigned To' => Array('vtiger_crmentity','assigned_user_id')
        );
        var $search_fields_name = Array (
                /* Format: Field Label => fieldname */
                'Product Name' => 'prd_cork',
                'Cork Type' => 'cork_type',
                'Quantity' => 'cork_qty',
                'Assigned To' => 'assigned_user_id'
        );

        // For Popup window record selection
        var $popup_fields = Array ('prd_cork');

        // For Alphabetical search
        var $def_basicsearch_col = 'prd_cork';

        // Column value to use on detail view record text display
        var $def_detailview_recname = 'prd_cork';

        // Used when enabling/disabling the mandatory fields for the module.
        // Refers to vtiger_field.fieldname values.
        var $mandatory_fields = Array('prd_cork','assigned_user_id');

        var $default_order_by = 'prd_cork';
        var $default_sort_order='ASC';
}