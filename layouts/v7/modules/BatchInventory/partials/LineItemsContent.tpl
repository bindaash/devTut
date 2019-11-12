{*********************************************************************************** * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************}
{strip}
	{assign var="productDeleted" value="productDeleted"|cat:$row_no}
	{assign var="deleted" value="deleted"|cat:$row_no}
    {assign var="entityType" value=$data.$entityIdentifier}
    {assign var="entityIdentifier" value="entityType"|cat:$row_no}
    {assign var="prd_mov_select_frm" value="prd_mov_select_frm"|cat:$row_no}
    {assign var="prd_mov_select_to" value="prd_mov_select_to"|cat:$row_no}
	{assign var="hdnItemId" value="hdnItemId"|cat:$row_no}
	{*assign var="batchId" value=$data[$hdnItemId]*}
    {assign var="prd_mov_itBatchName" value="prd_mov_itBatchName"|cat:$row_no}
    {assign var="prd_mov_qty" value="prd_mov_qty"|cat:$row_no}
	{assign var="image" value="productImage"|cat:$row_no}
{*debug*}
{*$data|@print_r*}
	
	<td style="text-align:center;">		
	<i class="fa fa-trash deleteRow cursorPointer" title="{vtranslate('LBL_DELETE',$MODULE)}"></i>	
		&nbsp;<a><img src="{vimage_path('drag.png')}" border="0" title="{vtranslate('LBL_DRAG',$MODULE)}"/></a>		
		<input type="hidden" class="rowNumber" value="{$row_no}" />	
	</td>
	<td>			
	<!-- Batch Re-Ordering Feature Code Addition ends -->			
	<div class="itemNameDiv form-inline">				
		<div class="row">					
				<div class="col-lg-10">
				<div class="input-group" style="width:100%">
					<input type="text" id="{$prd_mov_itBatchName}" name="{$prd_mov_itBatchName}" value="{$data.$prd_mov_itBatchName}" class="batchName form-control {if $row_no neq 0} autoComplete {/if} " placeholder="{vtranslate('LBL_TYPE_SEARCH',$MODULE)}"
											   data-rule-required=true {if !empty($data.$prd_mov_itBatchName)} disabled="disabled" {/if}>
				{if !$data.$productDeleted}
					<span class="input-group-addon cursorPointer clearLineItem" title="{vtranslate('LBL_CLEAR',$MODULE)}">
						<i class="fa fa-times-circle"></i>
					</span>
				{/if}														
					<input type="hidden" id="{$hdnItemId}" name="{$hdnItemId}" value="{$data.$hdnItemId}" class="selectedModuleId"/>							
					<input type="hidden" id="lineItemType{$row_no}" name="lineItemType{$row_no}" value="{$data.$entityIdentifier}" class="lineItemType"/>							
					<div class="col-lg-2">
						<span class="lineItemPopup cursorPointer" data-popup="BatchPopup" title="{vtranslate('Batch',$MODULE)}" data-module-name="Batch" data-field-name="BatchId">{Vtiger_Module_Model::getModuleIconPath('Batch')}</span>
					</div>						
				</div>					
			</div>				
		</div>			
	</div>
	</td>	
	<td>		
	<input id="{$prd_mov_qty}" name="{$prd_mov_qty}" type="text" class="qty smallInputBox" value="{$data.$prd_mov_qty}"/>
	</td>
	<td>
		<div align="left">
			<select id="{$prd_mov_select_frm}" name="{$prd_mov_select_frm}" data-fieldname="prd_mov_select_frm" data-fieldtype="picklist" class="select inputElement lineItem down" type="picklist">
				<option value="">Select an Option</option>
				<option value="Shot blasting"
				{if trim(decode_html($data.$prd_mov_select_frm)) eq trim('Shot blasting')} selected 
				{/if}>
				Shot blasting</option>
				<option value="Fettling Grinding"
				{if trim(decode_html($data.$prd_mov_select_frm)) eq trim('Fettling Grinding')} selected 
				{/if}>
				Fettling Grinding</option>
				<option value="Painting"
				{if trim(decode_html($data.$prd_mov_select_frm)) eq trim('Painting')} selected 
				{/if}>
				Painting</option>
				<option value="Crating"
				{if trim(decode_html($data.$prd_mov_select_frm)) eq trim('Crating')} selected 
				{/if}>
				Crating</option>
			</select>
		</div>
	</td>		
	<td>
		<div align="left">
			<select id="{$prd_mov_select_to}" name="{$prd_mov_select_to}" data-fieldname="{$prd_mov_select_to}" data-fieldtype="picklist" class="select inputElement lineItem down1" type="picklist">
				<option value="">Select an Option</option>
				<option 
				{if trim(decode_html($data.$prd_mov_select_to)) eq trim('Fettling Grinding')} selected 
				{else} disabled {/if} value='Fettling Grinding'>
				Fettling Grinding</option>
				<option 
				{if trim(decode_html($data.$prd_mov_select_to)) eq trim('Painting')} selected 
				{else} disabled {/if} value='Painting'>Painting
				</option>
				<option
				{if trim(decode_html($data.$prd_mov_select_to)) eq trim('Crating')} selected 
				{else} disabled {/if} value='Crating'>
				Crating</option>
				<option
				{if trim(decode_html($data.$prd_mov_select_to)) eq trim('Warehouse')} selected 
				{else} disabled {/if} value='Warehouse'>
				Warehouse</option>
			</select>
		</div>
	</td>
{/strip}