<?php /* Smarty version Smarty-3.1.7, created on 2019-11-06 07:30:01
         compiled from "D:\wamp64\www\sif\includes\runtime/../../layouts/v7\modules\Vtiger\partials\Topbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6070174095dc27679373c39-66392642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a49e75829ce30e3c850a1883361646d7c21feaf' => 
    array (
      0 => 'D:\\wamp64\\www\\sif\\includes\\runtime/../../layouts/v7\\modules\\Vtiger\\partials\\Topbar.tpl',
      1 => 1560974052,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6070174095dc27679373c39-66392642',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'SELECTED_MENU_CATEGORY' => 0,
    'APP_IMAGE_MAP' => 0,
    'COMPANY_LOGO' => 0,
    'GLOBAL_SEARCH_VALUE' => 0,
    'QUICK_CREATE_MODULES' => 0,
    'moduleModel' => 0,
    'quickCreateModule' => 0,
    'count' => 0,
    'singularLabel' => 0,
    'hideDiv' => 0,
    'moduleName' => 0,
    'CALENDAR_MODULE_MODEL' => 0,
    'USER_PRIVILEGES_MODEL' => 0,
    'REPORTS_MODULE_MODEL' => 0,
    'USER_MODEL' => 0,
    'IMAGE_DETAILS' => 0,
    'IMAGE_INFO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5dc27679901b8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dc27679901b8')) {function content_5dc27679901b8($_smarty_tpl) {?>

<?php echo $_smarty_tpl->getSubTemplate ("modules/Vtiger/Header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php $_smarty_tpl->tpl_vars['APP_IMAGE_MAP'] = new Smarty_variable(Vtiger_MenuStructure_Model::getAppIcons(), null, 0);?><nav class="navbar navbar-default navbar-fixed-top app-fixed-navbar"><!--Added by Biraj Sharma on date 02052019 for Custom Reports generations--><!--Start--><div id="report_new_popup" title="Report" style="display:none;"><table class="table table-bordered" width="100%" border="0" class="small" cellspacing="1" cellpadding="3"><tr><th class="dvtCellLabel" colspan="4"><strong>SELECT REPORT</strong></th></tr><tr><td class="dvtCellLabel"><strong>Report Title</strong></td><td class="dvtCellLabel" colspan="2"><strong>Condition</strong></td><td class="dvtCellLabel"><strong>PDF</strong></td></tr><tr><td class="dvtCellInfo">Summary reports for Warehouse</td><td class="dvtCellLabel" colspan="2"><input type="text" id="war_dat" name="war_dat" class="dateField form-control" placeholder="Select Date"></td><td class="dvtCellLabel"><input class="crmbutton small edit show_rep" type="button" id="batch_reports_ware" value="Show Report"/></td></tr><tr><td class="dvtCellInfo">Summary reports for Core</td><td class="dvtCellLabel"><input type="text" id="from_dat" name="from_dat" class="dateField form-control" placeholder="From Date"></td><td class="dvtCellLabel"><input type="text" id="to_dat" name="to_dat" class="dateField form-control" placeholder="To Date"></td><td class="dvtCellLabel"><input class="crmbutton small edit show_rep" type="button" id="batch_reports_core" value="Show Report"/></td><!--<td class="dvtCellLabel"><a href="javascript:void(0);" class="crmbutton small edit"  onclick="summary_of_batch_rep_xls()"></a></td>--></tr><tr><td class="dvtCellInfo">Summary reports for Batch</td><td class="dvtCellLabel"><select id="select_type" class="select_rep_bat small"><option value="default">Condition</option><option value="salesOrder_id">By Sales Order No.</option><option value="product_id">By Product Name</option></select></td><td class="dvtCellLabel"><select id="item_id" name="item_id" class="select_rep_bat small"><option value="default">Select one</option></select></td><td class="dvtCellLabel"><input class="crmbutton small edit show_rep" type="button" id="batch_reports" value="Show Report" /></td></tr></table><br><br></div><!--div id="report_popup" title="Report" style="display:none;"><table class="table table-bordered" width="100%" border="0" class="small" cellspacing="1" cellpadding="3"><tr><th class="dvtCellLabel" colspan="4"><strong>SELECT REPORT</strong></th></tr><tr><td class="dvtCellLabel"><strong>Report Title</strong></td><td class="dvtCellLabel"><strong>Condition</strong></td><td class="dvtCellLabel"><strong>Select one</strong></td><td class="dvtCellLabel"><strong>PDF</strong></td></tr><tr><td class="dvtCellInfo">Summary reports for Batch</td><td class="dvtCellLabel"><select id="select_type" class="select_rep_bat small"><option value="default">Select one</option><option value="salesOrder_id">By Sales Order No.</option><option value="product_id">By Product Name</option></select></td><td class="dvtCellLabel"><select id="item_id" name="item_id" class="select_rep_bat small" /></select></td><td class="dvtCellLabel"><input class="crmbutton small edit show_rep" type="button" id="batch_reports" value="Show Report" /></td></tr></table><br><br></div--><div id="report_result" title="Report Result" style="display:none;"></div><!--End--><div class="container-fluid global-nav"><div class="row"><div class="col-lg-3 col-md-3 col-sm-3 app-navigator-container"><div class="row"><div id="appnavigator" class="col-sm-2 col-xs-2 cursorPointer app-switcher-container" data-app-class="<?php if ($_smarty_tpl->tpl_vars['MODULE']->value=='Home'||!$_smarty_tpl->tpl_vars['MODULE']->value){?>fa-dashboard<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['APP_IMAGE_MAP']->value[$_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value];?>
<?php }?>"><div class="row app-navigator"><span class="app-icon fa fa-bars"></span></div></div><div class="logo-container col-lg-9 col-md-9 col-sm-9 col-xs-9"><div class="row"><a href="index.php" class="company-logo"><img src="<?php echo $_smarty_tpl->tpl_vars['COMPANY_LOGO']->value->get('imagepath');?>
" alt="<?php echo $_smarty_tpl->tpl_vars['COMPANY_LOGO']->value->get('alt');?>
"/></a></div></div></div></div><div class="search-links-container col-md-3 col-lg-3 hidden-sm"><div class="search-link hidden-xs"><span class="fa fa-search" aria-hidden="true"></span><input class="keyword-input" type="text" placeholder="<?php echo vtranslate('LBL_TYPE_SEARCH');?>
" value="<?php echo $_smarty_tpl->tpl_vars['GLOBAL_SEARCH_VALUE']->value;?>
"><span id="adv-search" class="adv-search fa fa-chevron-circle-down pull-right cursorPointer" aria-hidden="true"></span></div></div><!--Added by Biraj Sharma on date 02/05/2019--><div class="col-lg-3"><div class="crmbutton small edit" style="text-align: right;"><input id="openReportList" type="button" placeholder="<?php echo vtranslate('LBL_CUSTOM_REPORT');?>
" value="Custom Report" style="background:green; color:#fff; font-size:13px; padding:8px 15px;"></div></div><div id="navbar" class="col-sm-6 col-md-3 col-lg-3 collapse navbar-collapse navbar-right global-actions"><ul class="nav navbar-nav"><li><div class="dropdown"><div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><a href="#" id="menubar_quickCreate" class="qc-button fa fa-plus-circle" title="<?php echo vtranslate('LBL_QUICK_CREATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" aria-hidden="true"></a></div><ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="width:500px;"><li class="title" style="padding: 5px 0 0 15px;"><strong><?php echo vtranslate('LBL_QUICK_CREATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></li><hr/><li id="quickCreateModules" style="padding: 0 5px;"><div class="col-lg-12" style="padding-bottom:15px;"><?php  $_smarty_tpl->tpl_vars['moduleModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['moduleModel']->_loop = false;
 $_smarty_tpl->tpl_vars['moduleName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['QUICK_CREATE_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['moduleModel']->key => $_smarty_tpl->tpl_vars['moduleModel']->value){
$_smarty_tpl->tpl_vars['moduleModel']->_loop = true;
 $_smarty_tpl->tpl_vars['moduleName']->value = $_smarty_tpl->tpl_vars['moduleModel']->key;
?><?php if ($_smarty_tpl->tpl_vars['moduleModel']->value->isPermitted('CreateView')||$_smarty_tpl->tpl_vars['moduleModel']->value->isPermitted('EditView')){?><?php $_smarty_tpl->tpl_vars['quickCreateModule'] = new Smarty_variable($_smarty_tpl->tpl_vars['moduleModel']->value->isQuickCreateSupported(), null, 0);?><?php $_smarty_tpl->tpl_vars['singularLabel'] = new Smarty_variable($_smarty_tpl->tpl_vars['moduleModel']->value->getSingularLabelKey(), null, 0);?><?php ob_start();?><?php echo !$_smarty_tpl->tpl_vars['moduleModel']->value->isPermitted('CreateView')&&$_smarty_tpl->tpl_vars['moduleModel']->value->isPermitted('EditView');?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['hideDiv'] = new Smarty_variable($_tmp1, null, 0);?><?php if ($_smarty_tpl->tpl_vars['quickCreateModule']->value=='1'){?><?php if ($_smarty_tpl->tpl_vars['count']->value%3==0){?><div class="row"><?php }?><?php if ($_smarty_tpl->tpl_vars['singularLabel']->value=='SINGLE_Calendar'){?><?php $_smarty_tpl->tpl_vars['singularLabel'] = new Smarty_variable('LBL_TASK', null, 0);?><div class="<?php if ($_smarty_tpl->tpl_vars['hideDiv']->value){?>create_restricted_<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getName();?>
 hide<?php }else{ ?>col-lg-4<?php }?>"><a id="menubar_quickCreate_Events" class="quickCreateModule" data-name="Events"data-url="index.php?module=Events&view=QuickCreateAjax" href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getModuleIcon('Event');?>
<span class="quick-create-module"><?php echo vtranslate('LBL_EVENT',$_smarty_tpl->tpl_vars['moduleName']->value);?>
</span></a></div><?php if ($_smarty_tpl->tpl_vars['count']->value%3==2){?></div><br><div class="row"><?php }?><div class="<?php if ($_smarty_tpl->tpl_vars['hideDiv']->value){?>create_restricted_<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getName();?>
 hide<?php }else{ ?>col-lg-4<?php }?>"><a id="menubar_quickCreate_<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getName();?>
" class="quickCreateModule" data-name="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getName();?>
"data-url="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getQuickCreateUrl();?>
" href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getModuleIcon('Task');?>
<span class="quick-create-module"><?php echo vtranslate($_smarty_tpl->tpl_vars['singularLabel']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
</span></a></div><?php if (!$_smarty_tpl->tpl_vars['hideDiv']->value){?><?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_smarty_tpl->tpl_vars['count']->value+1, null, 0);?><?php }?><?php }elseif($_smarty_tpl->tpl_vars['singularLabel']->value=='SINGLE_Documents'){?><div class="<?php if ($_smarty_tpl->tpl_vars['hideDiv']->value){?>create_restricted_<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getName();?>
 hide<?php }else{ ?>col-lg-4<?php }?> dropdown"><a id="menubar_quickCreate_<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getName();?>
" class="quickCreateModuleSubmenu dropdown-toggle" data-name="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getName();?>
" data-toggle="dropdown"data-url="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getQuickCreateUrl();?>
" href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getModuleIcon();?>
<span class="quick-create-module"><?php echo vtranslate($_smarty_tpl->tpl_vars['singularLabel']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
<i class="fa fa-caret-down quickcreateMoreDropdownAction"></i></span></a><ul class="dropdown-menu quickcreateMoreDropdown" aria-labelledby="menubar_quickCreate_<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getName();?>
"><li class="dropdown-header"><i class="fa fa-upload"></i> <?php echo vtranslate('LBL_FILE_UPLOAD',$_smarty_tpl->tpl_vars['moduleName']->value);?>
</li><li id="VtigerAction"><a href="javascript:Documents_Index_Js.uploadTo('Vtiger')"><img style="  margin-top: -3px;margin-right: 4%;" title="Vtiger" alt="Vtiger" src="layouts/v7/skins//images/Vtiger.png"><?php ob_start();?><?php echo vtranslate('LBL_VTIGER',$_smarty_tpl->tpl_vars['moduleName']->value);?>
<?php $_tmp2=ob_get_clean();?><?php echo vtranslate('LBL_TO_SERVICE',$_smarty_tpl->tpl_vars['moduleName']->value,$_tmp2);?>
</a></li><li class="dropdown-header"><i class="fa fa-link"></i> <?php echo vtranslate('LBL_LINK_EXTERNAL_DOCUMENT',$_smarty_tpl->tpl_vars['moduleName']->value);?>
</li><li id="shareDocument"><a href="javascript:Documents_Index_Js.createDocument('E')">&nbsp;<i class="fa fa-external-link"></i>&nbsp;&nbsp; <?php ob_start();?><?php echo vtranslate('LBL_FILE_URL',$_smarty_tpl->tpl_vars['moduleName']->value);?>
<?php $_tmp3=ob_get_clean();?><?php echo vtranslate('LBL_FROM_SERVICE',$_smarty_tpl->tpl_vars['moduleName']->value,$_tmp3);?>
</a></li><li role="separator" class="divider"></li><li id="createDocument"><a href="javascript:Documents_Index_Js.createDocument('W')"><i class="fa fa-file-text"></i> <?php ob_start();?><?php echo vtranslate('SINGLE_Documents',$_smarty_tpl->tpl_vars['moduleName']->value);?>
<?php $_tmp4=ob_get_clean();?><?php echo vtranslate('LBL_CREATE_NEW',$_smarty_tpl->tpl_vars['moduleName']->value,$_tmp4);?>
</a></li></ul></div><?php }else{ ?><div class="<?php if ($_smarty_tpl->tpl_vars['hideDiv']->value){?>create_restricted_<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getName();?>
 hide<?php }else{ ?>col-lg-4<?php }?>"><a id="menubar_quickCreate_<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getName();?>
" class="quickCreateModule" data-name="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getName();?>
"data-url="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getQuickCreateUrl();?>
" href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getModuleIcon();?>
<span class="quick-create-module"><?php echo vtranslate($_smarty_tpl->tpl_vars['singularLabel']->value,$_smarty_tpl->tpl_vars['moduleName']->value);?>
</span></a></div><?php }?><?php if ($_smarty_tpl->tpl_vars['count']->value%3==2){?></div><br><?php }?><?php if (!$_smarty_tpl->tpl_vars['hideDiv']->value){?><?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_smarty_tpl->tpl_vars['count']->value+1, null, 0);?><?php }?><?php }?><?php }?><?php } ?></div></li></ul></div></li><?php $_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL'] = new Smarty_variable(Users_Privileges_Model::getCurrentUserPrivilegesModel(), null, 0);?><?php $_smarty_tpl->tpl_vars['CALENDAR_MODULE_MODEL'] = new Smarty_variable(Vtiger_Module_Model::getInstance('Calendar'), null, 0);?><?php if ($_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL']->value->hasModulePermission($_smarty_tpl->tpl_vars['CALENDAR_MODULE_MODEL']->value->getId())){?><li><div><a href="index.php?module=Calendar&view=<?php echo $_smarty_tpl->tpl_vars['CALENDAR_MODULE_MODEL']->value->getDefaultViewName();?>
" class="fa fa-calendar" title="<?php echo vtranslate('Calendar','Calendar');?>
" aria-hidden="true"></a></div></li><?php }?><?php $_smarty_tpl->tpl_vars['REPORTS_MODULE_MODEL'] = new Smarty_variable(Vtiger_Module_Model::getInstance('Reports'), null, 0);?><?php if ($_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL']->value->hasModulePermission($_smarty_tpl->tpl_vars['REPORTS_MODULE_MODEL']->value->getId())){?><li><div><a href="index.php?module=Reports&view=List" class="fa fa-bar-chart" title="<?php echo vtranslate('Reports','Reports');?>
" aria-hidden="true"></a></div></li><?php }?><?php if ($_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL']->value->hasModulePermission($_smarty_tpl->tpl_vars['CALENDAR_MODULE_MODEL']->value->getId())){?><li><div><a href="#" class="taskManagement vicon vicon-task" title="<?php echo vtranslate('Tasks','Vtiger');?>
" aria-hidden="true"></a></div></li><?php }?><li class="dropdown"><div style="margin-top: 15px;"><a href="#" class="userName dropdown-toggle" data-toggle="dropdown" role="button"><span class="fa fa-user" aria-hidden="true" title="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('first_name');?>
 <?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('last_name');?>
(<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('user_name');?>
)"></span><span class="link-text-xs-only hidden-lg hidden-md hidden-sm"><?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->getName();?>
</span></a><div class="dropdown-menu logout-content" role="menu"><div class="row"><div class="col-lg-4 col-sm-4"><div class="profile-img-container"><?php $_smarty_tpl->tpl_vars['IMAGE_DETAILS'] = new Smarty_variable($_smarty_tpl->tpl_vars['USER_MODEL']->value->getImageDetails(), null, 0);?><?php if ($_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value!=''&&$_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value[0]!=''&&$_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value[0]['path']==''){?><i class='vicon-vtigeruser' style="font-size:90px"></i><?php }else{ ?><?php  $_smarty_tpl->tpl_vars['IMAGE_INFO'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['IMAGE_INFO']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['IMAGE_INFO']->key => $_smarty_tpl->tpl_vars['IMAGE_INFO']->value){
$_smarty_tpl->tpl_vars['IMAGE_INFO']->_loop = true;
?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
<?php $_tmp5=ob_get_clean();?><?php if (!empty($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['path'])&&!empty($_tmp5)){?><img src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['path'];?>
_<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" width="100px" height="100px"><?php }?><?php } ?><?php }?></div></div><div class="col-lg-8 col-sm-8"><div class="profile-container"><h4><?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('first_name');?>
 <?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('last_name');?>
</h4><h5 class="textOverflowEllipsis" title='<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('user_name');?>
'><?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('user_name');?>
</h5><p><?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->getUserRoleName();?>
</p></div></div></div><div class="logout-footer clearfix"><hr style="margin: 10px 0 !important"><div class=""><span class="pull-left"><span class="fa fa-cogs"></span><a id="menubar_item_right_LBL_MY_PREFERENCES" href="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->getPreferenceDetailViewUrl();?>
"><?php echo vtranslate('LBL_MY_PREFERENCES');?>
</a></span><span class="pull-right"><span class="fa fa-power-off"></span><a id="menubar_item_right_LBL_SIGN_OUT" href="index.php?module=Users&action=Logout"><?php echo vtranslate('LBL_SIGN_OUT');?>
</a></span></div></div></div></div></li></ul></div></div></div><?php }} ?>