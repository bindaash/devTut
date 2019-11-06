<?php /* Smarty version Smarty-3.1.19, created on 2019-03-25 09:33:48
         compiled from "/home/onscreen/public_html/sif/customerportal/layouts/default/templates/Portal/Index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16294213935c98d8bc4316e3-56217876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c3c4428e41b7135c3bd6764c5beb9ee485fb4da' => 
    array (
      0 => '/home/onscreen/public_html/sif/customerportal/layouts/default/templates/Portal/Index.tpl',
      1 => 1520231416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16294213935c98d8bc4316e3-56217876',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c98d8bc4a80c5_20755741',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c98d8bc4a80c5_20755741')) {function content_5c98d8bc4a80c5_20755741($_smarty_tpl) {?>

<div class="container-fluid"  ng-controller="<?php echo portal_componentjs_class($_smarty_tpl->tpl_vars['MODULE']->value,'IndexView_Component');?>
">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php echo $_smarty_tpl->getSubTemplate (portal_template_resolve($_smarty_tpl->tpl_vars['MODULE']->value,"partials/IndexContentBefore.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php echo $_smarty_tpl->getSubTemplate (portal_template_resolve($_smarty_tpl->tpl_vars['MODULE']->value,"partials/IndexContent.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php echo $_smarty_tpl->getSubTemplate (portal_template_resolve($_smarty_tpl->tpl_vars['MODULE']->value,"partials/IndexContentAfter.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    </div>
</div>
<?php }} ?>
