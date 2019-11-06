<?php /* Smarty version Smarty-3.1.7, created on 2019-11-06 07:30:02
         compiled from "D:\wamp64\www\sif\includes\runtime/../../layouts/v7\modules\BatchInventory\partials\LineItemsContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14319874325dc2767aeca7e6-46415315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9aa76d7bc28984a96ca8447006e7bcbda3bee270' => 
    array (
      0 => 'D:\\wamp64\\www\\sif\\includes\\runtime/../../layouts/v7\\modules\\BatchInventory\\partials\\LineItemsContent.tpl',
      1 => 1573025393,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14319874325dc2767aeca7e6-46415315',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row_no' => 0,
    'entityIdentifier' => 0,
    'data' => 0,
    'hdnBatchId' => 0,
    'MODULE' => 0,
    'batchName' => 0,
    'productDeleted' => 0,
    'entityType' => 0,
    'qty' => 0,
    'prd_mov_select_frm' => 0,
    'prd_mov_select_to' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5dc2767b25af1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dc2767b25af1')) {function content_5dc2767b25af1($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars["productDeleted"] = new Smarty_variable(("productDeleted").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["deleted"] = new Smarty_variable(("deleted").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["entityType"] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['entityIdentifier']->value], null, 0);?><?php $_smarty_tpl->tpl_vars["entityIdentifier"] = new Smarty_variable(("entityType").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["prd_mov_select_frm"] = new Smarty_variable(("prd_mov_select_frm").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["prd_mov_select_to"] = new Smarty_variable(("prd_mov_select_to").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["hdnBatchId"] = new Smarty_variable(("hdnBatchId").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["batchId"] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['hdnBatchId']->value], null, 0);?><?php $_smarty_tpl->tpl_vars["batchName"] = new Smarty_variable(("batchName").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["qty"] = new Smarty_variable(("qty").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["image"] = new Smarty_variable(("productImage").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><td style="text-align:center;"><i class="fa fa-trash deleteRow cursorPointer" title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></i>&nbsp;<a><img src="<?php echo vimage_path('drag.png');?>
" border="0" title="<?php echo vtranslate('LBL_DRAG',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"/></a><input type="hidden" class="rowNumber" value="<?php echo $_smarty_tpl->tpl_vars['row_no']->value;?>
" /></td><td><!-- Batch Re-Ordering Feature Code Addition ends --><div class="itemNameDiv form-inline"><div class="row"><div class="col-lg-10"><div class="input-group" style="width:100%"><input type="text" id="<?php echo $_smarty_tpl->tpl_vars['batchName']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['batchName']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['batchName']->value];?>
" class="batchName form-control <?php if ($_smarty_tpl->tpl_vars['row_no']->value!=0){?> autoComplete <?php }?> " placeholder="<?php echo vtranslate('LBL_TYPE_SEARCH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"data-rule-required=true <?php if (!empty($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['batchName']->value])){?> disabled="disabled" <?php }?>><?php if (!$_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['productDeleted']->value]){?><span class="input-group-addon cursorPointer clearLineItem" title="<?php echo vtranslate('LBL_CLEAR',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><i class="fa fa-times-circle"></i></span><?php }?><input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['hdnBatchId']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['hdnBatchId']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['hdnBatchId']->value];?>
" class="selectedModuleId"/><input type="hidden" id="lineItemType<?php echo $_smarty_tpl->tpl_vars['row_no']->value;?>
" name="lineItemType<?php echo $_smarty_tpl->tpl_vars['row_no']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['entityIdentifier']->value];?>
" class="lineItemType"/><div class="col-lg-2"><span class="lineItemPopup cursorPointer" data-popup="BatchPopup" title="<?php echo vtranslate('Batch',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" data-module-name="Batch" data-field-name="BatchId"><?php echo Vtiger_Module_Model::getModuleIconPath('Batch');?>
</span></div></div></div></div></div><!--<?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['productDeleted']->value]){?><div class="row-fluid deletedItem redColor"><?php if (empty($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['batchName']->value])){?><?php echo vtranslate('LBL_THIS_LINE_ITEM_IS_DELETED_FROM_THE_SYSTEM_PLEASE_REMOVE_THIS_LINE_ITEM',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }else{ ?><?php echo vtranslate('LBL_THIS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo $_smarty_tpl->tpl_vars['entityType']->value;?>
 <?php echo vtranslate('LBL_IS_DELETED_FROM_THE_SYSTEM_PLEASE_REMOVE_OR_REPLACE_THIS_ITEM',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }?></div><?php }?>--></td><td><input id="<?php echo $_smarty_tpl->tpl_vars['qty']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['qty']->value;?>
" type="text" class="qty smallInputBox" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['qty']->value];?>
"/></td><td><div align="left"><select id="<?php echo $_smarty_tpl->tpl_vars['prd_mov_select_frm']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['prd_mov_select_frm']->value;?>
" data-fieldname="prd_mov_select_frm" data-fieldtype="picklist" class="select inputElement lineItem" type="picklist"><option value="">Select an Option</option><option value="Shot blasting"<?php if (trim(decode_html($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['prd_mov_select_frm']->value]))==trim('Shot blasting')){?> selected<?php }?>>Shot blasting</option><option value="Fettling Grinding"<?php if (trim(decode_html($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['prd_mov_select_frm']->value]))==trim('Fettling Grinding')){?> selected<?php }?>>Fettling Grinding</option><option value="Painting"<?php if (trim(decode_html($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['prd_mov_select_frm']->value]))==trim('Painting')){?> selected<?php }?>>Painting</option><option value="Crating"<?php if (trim(decode_html($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['prd_mov_select_frm']->value]))==trim('Crating')){?> selected<?php }?>>Crating</option></select></div></td><td><div align="left"><select id="<?php echo $_smarty_tpl->tpl_vars['prd_mov_select_to']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['prd_mov_select_to']->value;?>
" data-fieldname="<?php echo $_smarty_tpl->tpl_vars['prd_mov_select_to']->value;?>
" data-fieldtype="picklist" class="select inputElement lineItem" type="picklist"><option value="">Select an Option</option><option<?php if (trim(decode_html($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['prd_mov_select_to']->value]))==trim('Fettling Grinding')){?> selected<?php }?>>Fettling Grinding</option><option<?php if (trim(decode_html($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['prd_mov_select_to']->value]))==trim('Painting')){?> selected<?php }?>>Painting</option><option<?php if (trim(decode_html($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['prd_mov_select_to']->value]))==trim('Crating')){?> selected<?php }?>>Crating</option><option<?php if (trim(decode_html($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['prd_mov_select_to']->value]))==trim('Warehouse')){?> selected<?php }?>>Warehouse</option></select></div></td><?php }} ?>