{*********************************************************************************** * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************}
{strip}
	{assign var="productId" value=$data[$hdnProductId]}
    {assign var="productDeleted" value="productDeleted"|cat:$row_no}
    {assign var="hdnProductId" value="hdnProductId"|cat:$row_no}
    {assign var="productName" value="productName"|cat:$row_no}
    {assign var="disp_quantity" value="disp_quantity"|cat:$row_no}
	{assign var="image" value="SalesOrderImage"|cat:$row_no}
    {assign var="image" value="productImage"|cat:$row_no}
	{assign var="deleted" value="deleted"|cat:$row_no}
	{assign var="entityType" value=$data.$entityIdentifier}
    {assign var="entityIdentifier" value="entityType"|cat:$row_no}
{*debug*}
{*$data|@var_dump*}
	
	<td style="text-align:center;">		
	<i class="fa fa-trash deleteRow cursorPointer" title="{vtranslate('LBL_DELETE',$MODULE)}"></i>	
		&nbsp;<a><img src="{vimage_path('drag.png')}" border="0" title="{vtranslate('LBL_DRAG',$MODULE)}"/></a>		
		<input type="hidden" class="rowNumber" value="{$row_no}" />	
	</td>
	<!-- Product order Re-Ordering Feature Code Addition start -->
	<td>			
		<div class="itemNameDiv form-inline">				
			<div class="row">					
				<div class="col-lg-10">
					<div class="input-group" style="width:100%">
						<input type="text" id="{$productName}" name="{$productName}" value="{$data.$productName}" class="productName form-control {if $row_no neq 0} autoComplete {/if} " placeholder="{vtranslate('LBL_TYPE_SEARCH',$MODULE)}"
												   data-rule-required=true {if !empty($data.$productName)} disabled="disabled" {/if}>
					{if !$data.$productDeleted}
						<span class="input-group-addon cursorPointer clearLineItem" title="{vtranslate('LBL_CLEAR',$MODULE)}">
							<i class="fa fa-times-circle"></i>
						</span>
					{/if}														
						<input type="hidden" id="{$hdnProductId}" name="{$hdnProductId}" value="{$data.$hdnProductId}" class="selectedModuleId"/>
						<input type="hidden" id="lineItemType{$row_no}" name="lineItemType{$row_no}" value="{$data.$entityIdentifier}" class="lineItemType"/>						
						<div class="col-lg-2">
							<span class="lineItemPopup cursorPointer" data-popup="ProductsPopup" title="{vtranslate('Products',$MODULE)}" data-module-name="Products" data-field-name="productid">{Vtiger_Module_Model::getModuleIconPath('Products')}</span>
						</div>						
					</div>
				</div>				
			</div>			
		</div>
	</td>
	<!-- Product Re-Ordering Feature Code Addition end -->
	<td>		
	<input id="{$disp_quantity}" name="{$disp_quantity}" type="text" class="quantity smallInputBox" value="{$data.$disp_quantity}"/>
	</td>
{/strip}