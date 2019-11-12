<?php /* Smarty version Smarty-3.1.7, created on 2019-11-06 07:30:02
         compiled from "D:\wamp64\www\sif\includes\runtime/../../layouts/v7\modules\BatchInventory\partials\LineItemsEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6689712565dc2767adb13a7-97476955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab9b80fefc953dba00d09a9b9796be41f579df8d' => 
    array (
      0 => 'D:\\wamp64\\www\\sif\\includes\\runtime/../../layouts/v7\\modules\\BatchInventory\\partials\\LineItemsEdit.tpl',
      1 => 1556340392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6689712565dc2767adb13a7-97476955',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LINE_ITEM_BLOCK_LABEL' => 0,
    'RECORD_STRUCTURE' => 0,
    'RELATED_PRODUCTS' => 0,
    'BLOCK_FIELDS' => 0,
    'BLOCK_LABEL' => 0,
    'MODULE' => 0,
    'row_no' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5dc2767aebade',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dc2767aebade')) {function content_5dc2767aebade($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['LINE_ITEM_BLOCK_LABEL'] = new Smarty_variable("LBL_PRODMOV_DETAILS", null, 0);?><?php $_smarty_tpl->tpl_vars['BLOCK_FIELDS'] = new Smarty_variable($_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value[$_smarty_tpl->tpl_vars['LINE_ITEM_BLOCK_LABEL']->value], null, 0);?><?php $_smarty_tpl->tpl_vars['BLOCK_LABEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['LINE_ITEM_BLOCK_LABEL']->value, null, 0);?><?php $_smarty_tpl->tpl_vars["FINAL"] = new Smarty_variable($_smarty_tpl->tpl_vars['RELATED_PRODUCTS']->value, null, 0);?><input type="hidden" name="totalProductCount" id="totalProductCount" value="1" /><div name='editContent'><?php if (count($_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value)>0){?><div class="fieldBlockContainer" data-block="<?php echo $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value;?>
"><div class="row"><h4 class='fieldBlockHeader'><?php echo vtranslate($_smarty_tpl->tpl_vars['BLOCK_LABEL']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4></div><hr><div class="lineitemTableContainer"><table class="table table-bordered" id="lineItemTab"><tr><td><strong><?php echo vtranslate('LBL_TOOLS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></td><td><span class="redColor">*</span><strong><strong><?php echo vtranslate('LBL_ITEM_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></td><td><strong><?php echo vtranslate('LBL_QUANTITY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></td><td><strong><?php echo vtranslate('LBL_SELECT_FROM',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></td><td><strong><?php echo vtranslate('LBL_SELECT_TO',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></td></tr><?php if (count($_smarty_tpl->tpl_vars['RELATED_PRODUCTS']->value)==0){?><tr id="row1" class="lineItemRow" data-row-num="1"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("partials/LineItemsContent.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('row_no'=>1,'data'=>array(),'IGNORE_UI_REGISTRATION'=>true), 0);?>
</tr><?php }?><?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['row_no'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['RELATED_PRODUCTS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['row_no']->value = $_smarty_tpl->tpl_vars['data']->key;
?><tr id="row<?php echo $_smarty_tpl->tpl_vars['row_no']->value;?>
" data-row-num="<?php echo $_smarty_tpl->tpl_vars['row_no']->value;?>
" class="lineItemRow"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("partials/LineItemsContent.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('row_no'=>$_smarty_tpl->tpl_vars['row_no']->value,'data'=>$_smarty_tpl->tpl_vars['data']->value), 0);?>
</tr><?php } ?></table></div></div><?php }?><br><div><div><div><div class="btn-toolbar"><span class="btn-group"><button type="button" class="btn btn-default" id="addProduct" data-module-name="Products" ><i class="fa fa-plus"></i>&nbsp;&nbsp;<strong><?php echo vtranslate('LBL_ADD_PRODUCT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></span></div></div></div></div></div>
<?php }} ?>