<?php /* Smarty version Smarty-3.1.19, created on 2019-03-25 09:33:14
         compiled from "/home/onscreen/public_html/sif/customerportal/layouts/default/templates/Documents/partials/IndexContentAfter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:843537235c98d89a2d4057-53886422%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65e3ee28af126f8f5bc50d2e03d093e9099da692' => 
    array (
      0 => '/home/onscreen/public_html/sif/customerportal/layouts/default/templates/Documents/partials/IndexContentAfter.tpl',
      1 => 1520231416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '843537235c98d89a2d4057-53886422',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c98d89a2eebc0_86546074',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c98d89a2eebc0_86546074')) {function content_5c98d89a2eebc0_86546074($_smarty_tpl) {?>


    <script type="text/ng-template" id="editRecordModalDocuments.template">
        <form class="form form-vertical" name="docForm" enctype='multipart/form-data' novalidate="novalidate">
        <div class="modal-header">
        <button type="button" class="close" ng-click="cancel()" title="Close">&times;</button>
        <h4 class="modal-title" >{{'Add New Document'|translate}}</h4>
        </div>
        <div class="modal-body">

        <div class="row">
        <div class="input-group col-sm-8 col-sm-offset-2">
        <input type="text" id="upload-file-info" class="form-control" ng-disabled="true">
        <span class="input-group-btn">
        <span class="btn btn-primary btn-file">
        {{'Browse'|translate}}&hellip;<input  type="file" name="file" file-input="editRecord.filename" ng-required="true" onchange='$("#upload-file-info").val($(this).val().replace("C:\\fakepath\\",""));'/></span>
        </span>
        </span>
        </div>
        <div class="col-sm-12 col-sm-offset-2" style="padding-left:0px;">
        <span ng-show="message" class="text-danger">{{'File size uploaded is greater than 25 MB'|translate}}</span>
        </div>
        <div ng-show="!editRecord.filename && !message" class="col-sm-8 col-sm-offset-2" style="padding-left:0px;"><span class="text-danger">{{'Maximum size for file upload is 25 MB'|translate}}</span></div>

        </div>
        </div>
        <div class="modal-footer">
        <a type="button" class="btn  btn-default" ng-click="cancel()" translate="Cancel">Cancel</a>
        <button type="submit" class="btn  btn-success" ng-disabled="message || !editRecord.filename ||saving" ng-click="save()" type="submit" translate="Save">Save</button>
        </div>
        </form>
    </script>

<?php }} ?>
