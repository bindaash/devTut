<?php /* Smarty version Smarty-3.1.7, created on 2019-11-06 09:24:25
         compiled from "D:\wamp64\www\sif\includes\runtime/../../layouts/v7\modules\BatchMovement\partials\LineItemsContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13563016165dc29149e38292-65713339%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '908f2eabf2ed28fa949dd07613a0ffcdb52c4ea6' => 
    array (
      0 => 'D:\\wamp64\\www\\sif\\includes\\runtime/../../layouts/v7\\modules\\BatchMovement\\partials\\LineItemsContent.tpl',
      1 => 1559782776,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13563016165dc29149e38292-65713339',
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
    'batchcode' => 0,
    'batchDeleted' => 0,
    'quantity' => 0,
    'batcmov_select_frm' => 0,
    'batcmov_select_to' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5dc2914a1ff4d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dc2914a1ff4d')) {function content_5dc2914a1ff4d($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars["batchDeleted"] = new Smarty_variable(("batchDeleted").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["deleted"] = new Smarty_variable(("deleted").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["entityType"] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['entityIdentifier']->value], null, 0);?><?php $_smarty_tpl->tpl_vars["entityIdentifier"] = new Smarty_variable(("entityType").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["batcmov_select_frm"] = new Smarty_variable(("batcmov_select_frm").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["batcmov_select_to"] = new Smarty_variable(("batcmov_select_to").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["hdnBatchId"] = new Smarty_variable(("hdnBatchId").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["batchId"] = new Smarty_variable($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['hdnBatchId']->value], null, 0);?><?php $_smarty_tpl->tpl_vars["batchName"] = new Smarty_variable(("batchName").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["quantity"] = new Smarty_variable(("quantity").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["batchcode"] = new Smarty_variable(("batchcode").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><?php $_smarty_tpl->tpl_vars["image"] = new Smarty_variable(("productImage").($_smarty_tpl->tpl_vars['row_no']->value), null, 0);?><td style="text-align:center;"><i class="fa fa-trash deleteRow cursorPointer" title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></i>&nbsp;<a><img src="<?php echo vimage_path('drag.png');?>
" border="0" title="<?php echo vtranslate('LBL_DRAG',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"/></a><input type="hidden" class="rowNumber" value="<?php echo $_smarty_tpl->tpl_vars['row_no']->value;?>
" /></td><td><!-- Batch Re-Ordering Feature Code Addition ends --><div class="itemNameDiv form-inline"><div class="row"><div class="col-lg-10"><div class="input-group" style="width:100%"><input type="text" id="<?php echo $_smarty_tpl->tpl_vars['batchcode']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['batchcode']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['batchcode']->value];?>
" class="batchcode form-control <?php if ($_smarty_tpl->tpl_vars['row_no']->value!=0){?> autoComplete <?php }?> " placeholder="<?php echo vtranslate('LBL_TYPE_SEARCH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"data-rule-required=true <?php if (!empty($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['batchcode']->value])){?> disabled="disabled" <?php }?>><?php if (!$_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['batchDeleted']->value]){?><span class="input-group-addon cursorPointer clearLineItem" title="<?php echo vtranslate('LBL_CLEAR',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><i class="fa fa-times-circle"></i></span><?php }?><input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['hdnBatchId']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['hdnBatchId']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['hdnBatchId']->value];?>
" class="selectedModuleId"/><input type="hidden" id="lineItemType<?php echo $_smarty_tpl->tpl_vars['row_no']->value;?>
" name="lineItemType<?php echo $_smarty_tpl->tpl_vars['row_no']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['entityIdentifier']->value];?>
" class="lineItemType"/><span class="lineItemPopup cursorPointer" data-popup="BatchPopup" title="<?php echo vtranslate('Batch',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" data-module-name="Batch" data-field-name="batchid"><?php echo Vtiger_Module_Model::getModuleIconPath('Batch');?>
</span><div class="col-lg-2"></div></div></div></div></div></td><td><input id="<?php echo $_smarty_tpl->tpl_vars['quantity']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['quantity']->value;?>
" type="text" class="quantity smallInputBox" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['quantity']->value];?>
"/></td><td><div align="left"><select id="<?php echo $_smarty_tpl->tpl_vars['batcmov_select_frm']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['batcmov_select_frm']->value;?>
" data-fieldname="batcmov_select_frm" data-fieldtype="picklist" class="select inputElement lineItem" type="picklist"><option value="Starts"  <?php if (trim(decode_html($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['batcmov_select_frm']->value]))==trim('Starts')){?> selected<?php }?>>Starts</option><option value="Molding"<?php if (trim(decode_html($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['batcmov_select_frm']->value]))==trim('Molding')){?> selected<?php }?>>Molding</option></select></div></td><td><div align="left"><select id="<?php echo $_smarty_tpl->tpl_vars['batcmov_select_to']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['batcmov_select_to']->value;?>
" data-fieldname="<?php echo $_smarty_tpl->tpl_vars['batcmov_select_to']->value;?>
" data-fieldtype="picklist" class="select inputElement lineItem" type="picklist"><option value="">Select an Option</option><option<?php if (trim(decode_html($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['batcmov_select_to']->value]))==trim('Molding')){?> selected<?php }?>>Molding</option><option<?php if (trim(decode_html($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['batcmov_select_to']->value]))==trim('Shot blasting')){?> selected<?php }?>>Shot blasting</option></select></div></td><?php }} ?>