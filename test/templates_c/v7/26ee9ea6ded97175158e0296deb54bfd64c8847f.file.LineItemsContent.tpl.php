<?php /* Smarty version Smarty-3.1.7, created on 2019-11-06 09:25:00
         compiled from "D:\wamp64\www\sif\includes\runtime/../../layouts/v7\modules\Batch\partials\LineItemsContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8650749905dc2916c76dca0-95982732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26ee9ea6ded97175158e0296deb54bfd64c8847f' => 
    array (
      0 => 'D:\\wamp64\\www\\sif\\includes\\runtime/../../layouts/v7\\modules\\Batch\\partials\\LineItemsContent.tpl',
      1 => 1558144058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8650749905dc2916c76dca0-95982732',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hdnSalesOrderId' => 0,
    'data' => 0,
    'hdnProductId' => 0,
    'row_no' => 0,
    'MODULE' => 0,
    'salesorder_no' => 0,
    'salesOrderDeleted' => 0,
    'productName' => 0,
    'productDeleted' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5dc2916c9c763',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dc2916c9c763')) {function content_5dc2916c9c763($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars["SalesOrderId"] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['hdnSalesOrderId']->value], null, 0);?><?php $_smarty_tpl->tpl_vars["productId"] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['hdnProductId']->value], null, 0);?><?php $_smarty_tpl->tpl_vars["salesOrderName"] = new Smarty_variable(("salesOrderName").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["salesOrderDeleted"] = new Smarty_variable(("salesOrderDeleted").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["productDeleted"] = new Smarty_variable(("productDeleted").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["hdnProductId"] = new Smarty_variable(("hdnProductId").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["hdnSalesOrderId"] = new Smarty_variable(("hdnSalesOrderId").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["salesorder_no"] = new Smarty_variable(("salesorder_no").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["productName"] = new Smarty_variable(("productName").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["image"] = new Smarty_variable(("SalesOrderImage").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["image"] = new Smarty_variable(("productImage").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["deleted"] = new Smarty_variable(("deleted").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><td style="text-align:center;"><i class="fa fa-trash deleteRow cursorPointer" title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></i>&nbsp;<a><img src="<?php echo vimage_path('drag.png');?>
" border="0" title="<?php echo vtranslate('LBL_DRAG',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"/></a><input type="hidden" class="rowNumber" value="<?php echo $_smarty_tpl->tpl_vars['row_no']->value;?>
" /></td><td><div class="itemNameDiv form-inline"><div class="row"><div class="col-lg-10"><div class="input-group" style="width:100%"><input type="text" id="<?php echo $_smarty_tpl->tpl_vars['salesorder_no']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['salesorder_no']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['salesorder_no']->value];?>
" class="salesorder_no form-control <?php if ($_smarty_tpl->tpl_vars['row_no']->value!=0){?> autoComplete <?php }?> " placeholder="<?php echo vtranslate('LBL_TYPE_SEARCH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"<?php if (!empty($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['salesorder_no']->value])){?> disabled="disabled" <?php }?>><?php if (!$_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['salesOrderDeleted']->value]){?><span class="input-group-addon cursorPointer clearLineItem" title="<?php echo vtranslate('LBL_CLEAR',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><i class="fa fa-times-circle"></i></span><?php }?><input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['hdnSalesOrderId']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['hdnSalesOrderId']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['hdnSalesOrderId']->value];?>
" class="selectedModuleId"/><div class="col-lg-2"><span class="lineItemPopup cursorPointer" data-popup="SalesOrderPopup" title="<?php echo vtranslate('SalesOrder',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" data-module-name="SalesOrder" data-field-name="salesorderid"><?php echo Vtiger_Module_Model::getModuleIconPath('SalesOrder');?>
</span></div></div></div></div></div></td><!-- Sales order Re-Ordering Feature Code Addition end --><td><div class="itemNameDiv form-inline"><div class="row"><div class="col-lg-10"><div class="input-group" style="width:100%"><input type="text" id="<?php echo $_smarty_tpl->tpl_vars['productName']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['productName']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['productName']->value];?>
" class="productName form-control <?php if ($_smarty_tpl->tpl_vars['row_no']->value!=0){?> autoComplete <?php }?> " placeholder="<?php echo vtranslate('LBL_TYPE_SEARCH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"data-rule-required=true <?php if (!empty($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['productName']->value])){?> disabled="disabled" <?php }?>><?php if (!$_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['productDeleted']->value]){?><span class="input-group-addon cursorPointer clearLineItem" title="<?php echo vtranslate('LBL_CLEAR',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><i class="fa fa-times-circle"></i></span><?php }?><input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['hdnProductId']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['hdnProductId']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['hdnProductId']->value];?>
" class="selectedModuleId"/><div class="col-lg-2"><span class="lineItemPopup cursorPointer" data-popup="ProductsPopup" title="<?php echo vtranslate('Products',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" data-module-name="Products" data-field-name="productid"><?php echo Vtiger_Module_Model::getModuleIconPath('Products');?>
</span></div></div></div></div></div></td><!-- Product Re-Ordering Feature Code Addition end --><?php }} ?>