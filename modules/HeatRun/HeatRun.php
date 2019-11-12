<?php
include_once 'modules/Vtiger/CRMEntity.php';

class HeatRun extends Vtiger_CRMEntity {
        var $table_name = 'vtiger_heatrun';
        var $table_index= 'heatrunid';

        var $customFieldTable = Array('vtiger_heatruncf', 'heatrunid');

        var $tab_name = Array('vtiger_crmentity', 'vtiger_heatrun', 'vtiger_heatruncf');

        var $tab_name_index = Array(
                'vtiger_crmentity' => 'crmid',
                'vtiger_heatrun' => 'heatrunid',
                'vtiger_heatruncf'=>'heatrunid');

        var $list_fields = Array (
                /* Format: Field Label => Array(tablename, columnname) */
                // tablename should not have prefix 'vtiger_'
                'Heat Run ID' => Array('heatrun', 'heatrun_id'),
                'Heat Run Name' => Array('heatrun', 'heatrun_name'),
                'Date' => Array('heatrun', 'heatrun_date'),
                'Furnace' => Array('heatrun', 'heatrun_furnace'),
                'Heat Number' => Array('heatrun', 'heat_number'),
                'Batch' => Array('heatrun', 'heatrun_batch'),
                'Quantity' => Array('heatrun', 'heatrun_qty'),
                'Assigned To' => Array('crmentity','smownerid')
        );
        var $list_fields_name = Array (
                /* Format: Field Label => fieldname */
				'Heat Run ID' => 'heatrun_id',
                'Heat Run Name' => 'heatrun_name',
                'Date' => 'heatrun_date',
                'Furnace' => 'heatrun_furnace',
                'Heat Number' => 'heat_number',
                'Batch' => 'heatrun_batch',
                'Quantity' => 'heatrun_qty',
                'Assigned To' => 'assigned_user_id'
        );

        // Make the field link to detail view
        var $list_link_field = 'heatrun_name';

        // For Popup listview and UI type support
        var $search_fields = Array(
                /* Format: Field Label => Array(tablename, columnname) */
                // tablename should not have prefix 'vtiger_'
				'Heat Run ID' => Array('heatrun', 'heatrun_id'),
                'Heat Run Name' => Array('heatrun', 'heatrun_name'),
                'Date' => Array('heatrun', 'heatrun_date'),
                'Furnace' => Array('heatrun', 'heatrun_furnace'),
                'Heat Number' => Array('heatrun', 'heat_number'),
                'Batch' => Array('heatrun', 'heatrun_batch'),
                'Quantity' => Array('heatrun', 'heatrun_qty'),
                'Assigned To' => Array('vtiger_crmentity','assigned_user_id')
        );
        var $search_fields_name = Array (
                /* Format: Field Label => fieldname */
                'Heat Run ID' => 'heatrun_id',
                'Heat Run Name' => 'heatrun_name',
                'Date' => 'heatrun_date',
                'Furnace' => 'heatrun_furnace',
                'Heat Number' => 'heat_number',
                'Batch' => 'heatrun_batch',
                'Quantity' => 'heatrun_qty',
                'Assigned To' => 'assigned_user_id'
        );

        // For Popup window record selection
        var $popup_fields = Array ('heatrun_name');

        // For Alphabetical search
        var $def_basicsearch_col = 'heatrun_name';

        // Column value to use on detail view record text display
        var $def_detailview_recname = 'heatrun_name';

        // Used when enabling/disabling the mandatory fields for the module.
        // Refers to vtiger_field.fieldname values.
        var $mandatory_fields = Array('heatrun_name','assigned_user_id');

        var $default_order_by = 'heatrun_name';
        var $default_sort_order='ASC';
}