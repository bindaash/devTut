{* modules/Dispatch/views/Detail.php *}
{assign var=LINE_ITEM_BLOCK_LABEL value="DISPATCH_RELATED_ITEM"}
{assign var=BLOCK_FIELDS value=$RECORD_STRUCTURE.$LINE_ITEM_BLOCK_LABEL}
{assign var=BLOCK_LABEL value=$LINE_ITEM_BLOCK_LABEL}
{assign var="LINE_ITEM_DETAIL" value=$RELATED_ITEMS}

<input type="hidden" class="isCustomFieldExists" value="false">
<div class="details block">
    <div class="lineItemTableDiv">
        <table class="table table-bordered lineItemsTable" style = "margin-top:15px">
            <thead>
            <th colspan="4" class="lineItemBlockHeader">
                {vtranslate($BLOCK_LABEL, $MODULE)}
            </th>
            </thead>
            <tbody>
				<tr>
					<td class="lineItemFieldName">
					<span class="redColor">*</span><strong>
					<strong>{vtranslate('LBL_PRODUCT_NAME',$MODULE)}</strong>
					</td>
					<td class="lineItemFieldName">
					<strong>{vtranslate('LBL_QUANTITY',$MODULE)}</strong>
					</td>
				</tr>
			    {foreach key=INDEX item=LINE_ITEM_DETAIL from=$RELATED_ITEMS}
				{*$RELATED_ITEMS|@var_dump*}
				<tr>
					<td>
					{$LINE_ITEM_DETAIL["productName$INDEX"]}
					</td>
					<td>
					{$LINE_ITEM_DETAIL["disp_quantity$INDEX"]}
					</td>
				</tr>
                {/foreach}
            </tbody>
        </table>
    </div>
 </div>