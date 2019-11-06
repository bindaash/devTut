<?php /* Smarty version Smarty-3.1.7, created on 2019-11-06 09:25:00
         compiled from "D:\wamp64\www\sif\includes\runtime/../../layouts/v7\modules\Batch\partials\LineItemsEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17532679885dc2916c6586e0-56904832%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c198210aad7a0290655ae07a630a600bf065122e' => 
    array (
      0 => 'D:\\wamp64\\www\\sif\\includes\\runtime/../../layouts/v7\\modules\\Batch\\partials\\LineItemsEdit.tpl',
      1 => 1558992580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17532679885dc2916c6586e0-56904832',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LINE_ITEM_BLOCK_LABEL' => 0,
    'RECORD_STRUCTURE' => 0,
    'RELATED_ITEMS' => 0,
    'BLOCK_FIELDS' => 0,
    'BLOCK_LABEL' => 0,
    'MODULE' => 0,
    'row_no' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5dc2916c75e2a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dc2916c75e2a')) {function content_5dc2916c75e2a($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['LINE_ITEM_BLOCK_LABEL'] = new Smarty_variable("BATCH_RELATED_ITEM", null, 0);?><?php $_smarty_tpl->tpl_vars['BLOCK_FIELDS'] = new Smarty_variable($_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value[$_smarty_tpl->tpl_vars['LINE_ITEM_BLOCK_LABEL']->value], null, 0);?><?php $_smarty_tpl->tpl_vars['BLOCK_LABEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['LINE_ITEM_BLOCK_LABEL']->value, null, 0);?><?php $_smarty_tpl->tpl_vars["FINAL"] = new Smarty_variable($_smarty_tpl->tpl_vars['RELATED_ITEMS']->value, null, 0);?><input type="hidden" name="totalItemCount" id="totalItemCount" value="1" /><div name='editContent'><?php if (count($_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value)>0){?><div class="fieldBlockContainer" data-block="<?php echo $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value;?>
"><div class="row"><h4 class='fieldBlockHeader'><?php echo vtranslate($_smarty_tpl->tpl_vars['BLOCK_LABEL']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4></div><hr><div class="lineitemTableContainer" style="overflow-x: hidden;"><table class="table table-bordered" id="lineItemTab"><tr><td><strong><?php echo vtranslate('LBL_TOOLS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></td><td><strong><?php echo vtranslate('LBL_SALESORDER_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></td><td><span class="redColor">*</span><strong><strong><?php echo vtranslate('LBL_PRODUCT_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></td></tr><?php if (count($_smarty_tpl->tpl_vars['RELATED_ITEMS']->value)==0){?><tr id="row1" class="lineItemRow" data-row-num="1"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("partials/LineItemsContent.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('row_no'=>1,'data'=>array(),'IGNORE_UI_REGISTRATION'=>true), 0);?>
</tr><?php }?><?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['row_no'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['RELATED_ITEMS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['row_no']->value = $_smarty_tpl->tpl_vars['data']->key;
?><tr id="row<?php echo $_smarty_tpl->tpl_vars['row_no']->value;?>
" data-row-num="<?php echo $_smarty_tpl->tpl_vars['row_no']->value;?>
" class="lineItemRow"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("partials/LineItemsContent.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('row_no'=>$_smarty_tpl->tpl_vars['row_no']->value,'data'=>$_smarty_tpl->tpl_vars['data']->value), 0);?>
</tr><?php } ?></table></div></div><?php }?><br><div><div><div><div class="btn-toolbar"><span class="btn-group"><button type="button" class="btn btn-default" id="addProduct" data-module-name="Products" ><i class="fa fa-plus"></i>&nbsp;&nbsp;<strong><?php echo vtranslate('LBL_ADD_PRODUCT_OR_SALES_ORDER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></span><!--<span class="btn-group"><button type="button" class="btn btn-default" id="addProduct" data-module-name="Products" ><i class="fa fa-plus"></i>&nbsp;&nbsp;<strong><?php echo vtranslate('LBL_ADD_PRODUCT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></span><span class="btn-group"><button type="button" class="btn btn-default" id="addSalesOrder" data-module-name="SalesOrder" ><i class="fa fa-plus"></i>&nbsp;&nbsp;<strong><?php echo vtranslate('LBL_ADD_SALESORDER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></span>--></div></div></div></div></div>
<?php }} ?>