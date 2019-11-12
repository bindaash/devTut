Vtiger_Edit_Js("Batch_Edit_Js", { 
	
lineItemPopOverTemplate : '<div class="popover lineItemPopover" role="tooltip"><div class="arrow"></div>\n\
	<h3 class="popover-title"></h3>\n\
	<div class="popover-content"></div>\n\
		<div class="modal-footer lineItemPopupModalFooter">\n\
			<center>\n\
			<button class="btn btn-success popoverButton" type="button"><strong>'+app.vtranslate('JS_LBL_SAVE')+'</strong></button>\n\
			<a href="#" class="popoverCancel" type="reset">'+app.vtranslate('JS_LBL_CANCEL')+'</a>\n\
			</center>\n\
		</div>\n\
	</div>'
}, 
{
dummyLineItemRow : false,
lineItemsHolder : false,
numOfLineItems : false,
customLineItemFields : false,
customFieldsDefaultValues : false,
    
lineItemDetectingClass : 'lineItemRow',
    
    init : function() { 
       this._super();
       this.initializeVariables();
    },
	initializeVariables : function() {
        this.dummyLineItemRow = jQuery('#row1');
        this.lineItemsHolder = jQuery('#lineItemTab');
        this.numOfLineItems = this.lineItemsHolder.find('.'+ this.lineItemDetectingClass).length;
		if(typeof jQuery('#customFields').val() == 'undefined') { 
			this.customLineItemFields = [];
		}else { 
			this.customLineItemFields = JSON.parse(jQuery('#customFields').val());
		}
		
		if(typeof jQuery('#customFieldsDefaultValues').val() == 'undefined') {
			this.customFieldsDefaultValues = [];
		}else {
			this.customFieldsDefaultValues = JSON.parse(jQuery('#customFieldsDefaultValues').val());
		}
    },
	
	updateRowNumberForRow : function(lineItemRow, expectedSequenceNumber, currentSequenceNumber){
		if(typeof currentSequenceNumber == 'undefined') {
			//by default there will one current sequence number
			currentSequenceNumber = 1;
		}

		var idFields = new Array('hdnSalesOrderId','salesorder_no','hdnProductId','productName','totalItemCount');
		var expectedRowId = 'row'+expectedSequenceNumber;
		for(var idIndex in idFields ) {
			var elementId = idFields[idIndex];
			var actualElementId = elementId + currentSequenceNumber;
			var expectedElementId = elementId + expectedSequenceNumber;
			lineItemRow.find('#'+actualElementId).attr('id',expectedElementId)
					   .filter('[name="'+actualElementId+'"]').attr('name',expectedElementId);
			lineItemRow.find('#'+expectedElementId).val('').attr('disabled', false);
		}
		var total_tr = jQuery('#lineItemTab tr').length;
		jQuery('#totalItemCount').val(total_tr);
		lineItemRow.attr('id', expectedRowId).attr('data-row-num', expectedSequenceNumber);
        lineItemRow.find('input.rowNumber').val(expectedSequenceNumber);
        return lineItemRow;
	},
	registerAddProductSalesOrder : function() { 
        var self = this;
        var addLineItemEventHandler = function(e, data){
			if(jQuery('#lineItemTab').find('.lineItemRow').length>4){
				alert("You can't add more than five items !");
				return false;
			} else {
				var currentTarget = jQuery(e.currentTarget);
				var params = {'currentTarget' : currentTarget}
				var newLineItem = self.getNewLineItem(params);
				newLineItem = newLineItem.appendTo(self.lineItemsHolder);
				newLineItem.find('input.productName').addClass('autoComplete');
				newLineItem.find('input.salesorder_no').addClass('autoComplete');
				newLineItem.find('.ignore-ui-registration').removeClass('ignore-ui-registration');
				vtUtils.applyFieldElementsView(newLineItem);
				app.event.trigger('post.lineItem.New', newLineItem);
				self.updateLineItemElementByOrder();
				self.checkLineItemRow();
				self.registerLineItemAutoComplete(newLineItem);
				if(typeof data != "undefined") {
					self.mapResultsToFields(newLineItem,data);
				}
			}
		}
        jQuery('#addProduct').on('click', addLineItemEventHandler);
	},
	
	registerLineItemAutoComplete : function(container) {
		var self = this;
		if(typeof container == 'undefined') {
			container = this.lineItemsHolder;
		}
		container.find('input.autoComplete').autocomplete({
			'minLength' : '3',
			'source' : function(request, response){
				//element will be array of dom elements
				//here this refers to auto complete instance
				var inputElement = jQuery(this.element[0]);
				var tdElement = inputElement.closest('td');
				var searchValue = request.term;
				var params = {};
				var searchModule = tdElement.find('.lineItemPopup').data('moduleName');
				params.search_module = searchModule
				params.search_value = searchValue;
				self.searchModuleNames(params).then(function(data){
					var reponseDataList = new Array();
					var serverDataFormat = data;
					if(serverDataFormat.length <= 0) {
						serverDataFormat = new Array({
							'label' : app.vtranslate('JS_NO_RESULTS_FOUND'),
							'type'  : 'no results'
						});
					}
					for(var id in serverDataFormat){
						var responseData = serverDataFormat[id];
						reponseDataList.push(responseData);
					}
					response(reponseDataList);
				});
			},
			'select' : function(event, ui ){
				var selectedItemData = ui.item;
				//To stop selection if no results is selected
				if(typeof selectedItemData.type != 'undefined' && selectedItemData.type=="no results"){
					return false;
				}
				var element = jQuery(this);
				element.attr('disabled','disabled');
				var tdElement = element.closest('td');
				var selectedModule = tdElement.find('.lineItemPopup').data('moduleName');
				var popupElement = tdElement.find('.lineItemPopup');
			},
			'change' : function(event, ui) {
				var element = jQuery(this);
				//if you dont have disabled attribute means the user didnt select the item
				if(element.attr('disabled')== undefined) {
					element.closest('td').find('.clearLineItem').trigger('click');
				}
			}
		});
	},
	
	checkLineItemRow : function(){ 
        var numRows = this.lineItemsHolder.find('.'+this.lineItemDetectingClass).length;
		if(numRows > 1) { 
			var tr = jQuery('#totalItemCount').val(numRows);
			this.showLineItemsDeleteIcon();
		}else{ 
			var tr1 = jQuery('#totalItemCount').val(numRows);
			this.hideLineItemsDeleteIcon();
		}
	},
	showLineItemsDeleteIcon : function(){
		this.lineItemsHolder.find('.deleteRow').show();
	},
	hideLineItemsDeleteIcon : function(){
		this.lineItemsHolder.find('.deleteRow').hide();
	},
	
	getNewLineItem : function(params) {
        var currentTarget = params.currentTarget;
        var itemType = currentTarget.data('moduleName');
        var newRow = this.dummyLineItemRow.clone(true).removeClass('hide').addClass(this.lineItemDetectingClass).removeClass('lineItemCloneCopy');
		//newRow.find('.lineItemType').val(itemType);
        var newRowNum = this.getLineItemNextRowNumber();
		this.updateRowNumberForRow(newRow, newRowNum);
		return newRow
    },
	
    getLineItemNextRowNumber : function() {
        return ++this.numOfLineItems;
    },
	
	registerEventForCurrentDate : function(container){
		var thisInstance = this;
		var currentDate = jQuery.datepicker.formatDate('dd-mm-yy', new Date());
		jQuery("input[name='batch_date']").val(currentDate).prop('readonly', true);
	},	
	/**
	 * Function to search module names
	 */
	searchModuleNames : function(params) {
        var aDeferred = jQuery.Deferred();
		if(typeof params.module == 'undefined') {
			params.module = app.getModuleName();
		}
		if(typeof params.action == 'undefined') {
			params.action = 'BasicAjax';
		}
		
		if(typeof params.base_record == 'undefined') {
			var record = jQuery('[name="record"]');
			var recordId = app.getRecordId();
			if(record.length) { 
				params.base_record = record.val();
			} else if(recordId) { 
				params.base_record = recordId;
			} else if(app.view() == 'List') { 
				var editRecordId = jQuery('#listview-table').find('tr.listViewEntries.edited').data('id');
				if(editRecordId) {
					params.base_record = editRecordId;
				}
			}
		}
        
        // Added for overlay edit as the module is different
        if(params.search_module == 'Products' || params.search_module == 'SalesOrder') {
            params.module = 'Batch';
        }

		app.request.get({'data':params}).then(
			function(error, data){
                if(error == null) {
                    aDeferred.resolve(data);
                }
			},
			function(error){
				aDeferred.reject();
			}
		)
		return aDeferred.promise();
    },
	
	registerProductAndSalesOrderSelector : function() { 
        var self = this;
        this.lineItemsHolder.on('click','.lineItemPopup', function(e){ 
            var triggerer = jQuery(e.currentTarget);
			var sales_id = jQuery(this).parents('tr').find('.selectedModuleId').val();
			if(sales_id == ''){
				sales_id = 0;
			}
			self.showLineItemPopup({'view': triggerer.data('popup'),'saleOrderId':sales_id}); 
            //self.showLineItemPopup({'view': triggerer.data('popup')}); 
            var popupReferenceModule = triggerer.data('moduleName');
			var postPopupHandler = function(e, data){
                data = JSON.parse(data);
                if(!$.isArray(data)){
                    data = [data];
                }
                self.postLineItemSelectionActions(triggerer.closest('tr'), data, popupReferenceModule);
            }
			app.event.off('post.LineItemPopupSelection.click');
            app.event.one('post.LineItemPopupSelection.click', postPopupHandler);
        });
    },
	showLineItemPopup : function(callerParams) { 
		var params = {
            'module' : this.getModuleName(),
            'multi_select' : true
        };
		params = jQuery.extend(params, callerParams);
        var popupInstance = Vtiger_Popup_Js.getInstance();
		popupInstance.showPopup(params, 'post.LineItemPopupSelection.click');
	},
	postLineItemSelectionActions : function(itemRow, selectedLineItemsData, lineItemSelectedModuleName) { 
        for(var index in selectedLineItemsData) {
			if(index != 0) {
                if(lineItemSelectedModuleName == 'Products' || lineItemSelectedModuleName == 'SalesOrder') { 
                    jQuery('#addProduct').trigger('click', selectedLineItemsData[index]);
				}
            }else{ 
				itemRow.find('.lineItemType').val(lineItemSelectedModuleName);
				this.mapResultsToFields(itemRow, selectedLineItemsData[index]);
            }
        }
    },
	getLineItemSetype : function(row) {
        return row.find('.lineItemType').val();
    },
	/**
	 * Function which will set the image
	 * @params : lineItemRow - row which represents the line item
	 * @params : image source
	 * @return : current instance;
	 */
	setImageTag : function(lineItemRow, imgSrc) {
		var imgTag = '<img src='+imgSrc+' height="42" width="42">';
		lineItemRow.find('.lineItemImage').html(imgTag);
		return this;
	},
	mapResultsToFields: function(parentRow,responseData){ 
		var obj = Object.values(responseData);
		if(obj[0].module =='SalesOrder'){
		var lineItemNameElment = jQuery('input.salesorder_no',parentRow);
        }
		if(obj[0].module =='Products'){
		var lineItemNameElment = jQuery('input.productName',parentRow);
        }
		var referenceModule = this.getLineItemSetype(parentRow);
        //var lineItemRowNumber = parentRow.data('rowNum');
        //var lineItemRowNumber = jQuery(this)'.lineItemRow').length;
		var subs = parentRow.find('.salesorder_no').attr('id');
		var lineItemRowNumber = subs.replace('salesorder_no','');
		//console.log();
		//console.log(subs.substring(subs.length - 1, subs.length));
		for(var id in responseData){
			var recordId = id;
			var recordData = responseData[id];
			var selectedName = recordData.name;
			var imgSrc = recordData.imageSource;
			this.setImageTag(parentRow, imgSrc);
			if(obj[0].module =='SalesOrder'){
				jQuery('#hdnSalesOrderId'+lineItemRowNumber).val(recordId);
			}
			if(obj[0].module =='Products'){
				jQuery('#hdnProductId'+lineItemRowNumber).val(recordId);
				//console.log(recordId+'HelloWorld');
				//var prd_id = recordId;
				this.registerEventForBunchWeigt(recordId);
			}
			lineItemNameElment.val(selectedName);
			lineItemNameElment.attr('disabled', 'disabled');
		}
	},
	
	 /**
	 * Function which will handle the actions that need to be preformed once the qty is changed like below
	 *  - calculate line item total -> discount and tax -> net price of line item -> grand total
	 * @params : lineItemRow - element which will represent lineItemRow
	 */
	quantityChangeActions : function(lineItemRow) {
		this.lineItemRowCalculations(lineItemRow);
	},
	lineItemRowCalculations : function(lineItemRow) {
		this.calculateLineItemTotal(lineItemRow);
	},
	/**
	 * Function which will calculate line item total excluding discount and tax
	 * @params : lineItemRow - element which will represent lineItemRow
	 */
	calculateLineItemTotal : function (lineItemRow) {
		var quantity = this.getQuantityValue(lineItemRow);
		var lineItemTotal = parseFloat(quantity);
	},
	/**
	 * Function which gives quantity value
	 * @params : lineItemRow - row which represents the line item
	 * @return : string
	 */
	getQuantityValue : function(lineItemRow){
		return parseFloat(lineItemRow.find('.qty').val());
	},
	
	registerClearLineItemSelection : function() {
         var self = this;
         this.lineItemsHolder.on('click','.clearLineItem', function(e){
			var elem = jQuery(e.currentTarget);
            var parentElem = elem.closest('td');
            self.clearLineItemDetails(parentElem);
            parentElem.find('input.productName').removeAttr('disabled').val('');
            parentElem.find('input.salesorder_no').removeAttr('disabled').val('');
            e.preventDefault();
         });
	},
	clearLineItemDetails : function(parentElem) { 
		var lineItemRow = this.getClosestLineItemRow(parentElem);
		jQuery('.lineItemImage', lineItemRow).html('');
		jQuery('input.selectedModuleId',lineItemRow).val('');
		this.quantityChangeActions(lineItemRow);
	},
	/**
	 * Function which will give the closest line item row element
	 * @return : jQuery object
	 */
	getClosestLineItemRow : function(element){
		return element.closest('tr.'+this.lineItemDetectingClass);
	},
	
	registerQuantityChangeEvent : function() { 
        var self = this;
		this.lineItemsHolder.on('focusout','.qty',function(e){
			var element = jQuery(e.currentTarget);
			var lineItemRow = element.closest('tr.'+ self.lineItemDetectingClass);
			var quantityInStock = lineItemRow.data('quantityInStock');
			if(typeof quantityInStock  != 'undefined') {
				if(parseFloat(element.val()) > parseFloat(quantityInStock)) {
					lineItemRow.find('.stockAlert').removeClass('hide').find('.maxQuantity').text(quantityInStock);
				}else{
					lineItemRow.find('.stockAlert').addClass('hide');
				}
			}
			if(self.formValidatorInstance == false){
				self.quantityChangeActions(lineItemRow);
			} else {
			   if(self.formValidatorInstance.element(element)) {
					self.quantityChangeActions(lineItemRow);
				} 
			} 
		});
    },
	
	registerDeleteLineItemEvent : function(){
		var self = this;
        this.lineItemsHolder.on('click','.deleteRow',function(e){
		var element = jQuery(e.currentTarget);
		//removing the row
		self.getClosestLineItemRow(element).remove();
		self.updateLineItemElementByOrder();
		self.checkLineItemRow();
		var total_tr = jQuery('#lineItemTab tr').length;
		jQuery('#totalItemCount').val(total_tr-1);
		});
	},
	 
	registerLineItemEvents : function() {
        this.registerQuantityChangeEvent();
        this.registerDeleteLineItemEvent();
        this.registerClearLineItemSelection();
        var record = jQuery('[name="record"]').val();
        if (!record) {
            var container = this.lineItemsHolder;            
            jQuery('.qty',container).trigger('focusout');
        }
    },
	updateLineItemElementByOrder : function () { //console.log('Hello');
		var self = this;
		var lineItems = this.lineItemsHolder.find('tr.'+this.lineItemDetectingClass);
		lineItems.each(function(index,domElement){
			var lineItemRow = jQuery(domElement);
			var expectedRowIndex = (index+1);
			var expectedRowId = 'row'+expectedRowIndex;
			var actualRowId = lineItemRow.attr('id');
			if(expectedRowId != actualRowId) {
				var actualIdComponents = actualRowId.split('row');
				self.afterDeleteUpdateRow(lineItemRow, expectedRowIndex, actualIdComponents[1]);
			}
		});
	},
	afterDeleteUpdateRow : function(lineItemRow, expectedSequenceNumber, currentSequenceNumber){
		if(typeof currentSequenceNumber == 'undefined') { 
			//by default there will zero current sequence number
			currentSequenceNumber = 1;
		}
		var idFields = new Array('hdnSalesOrderId','salesorder_no','hdnProductId','productName','totalItemCount');
		var expectedRowId = 'row'+expectedSequenceNumber;
		for(var idIndex in idFields ) {
			var elementId = idFields[idIndex];
			var actualElementId = elementId + currentSequenceNumber;
			var expectedElementId = elementId + expectedSequenceNumber;
			lineItemRow.find('#'+actualElementId).attr('id',expectedElementId)
					   .filter('[name="'+actualElementId+'"]').attr('name',expectedElementId);
		}
		var total_tr = jQuery('#lineItemTab tr').length;
		jQuery('#totalItemCount').val(total_tr);
		lineItemRow.attr('id', expectedRowId).attr('data-row-num', expectedSequenceNumber);
        lineItemRow.find('input.rowNumber').val(expectedSequenceNumber);
        return lineItemRow;
	},

	registerEventForBunchWeigt : function(recordId){ alert(recordId);
		var thisInstance = this;
		jQuery("input[name='bunch_weight']").attr('readonly', true).css('background-color' , '#DEDEDE');
		//console.log(jQuery("#hdnProductId1").(this).val());
		//jQuery("<div class='alert alert-info'><strong>Info!</strong> Indicates a neutral informative change or action.</div>");
	},
	
	registerBasicEvents: function(container){
		this._super(container);
		this.registerEventForCurrentDate(container);
		this.registerAddProductSalesOrder();
		this.registerProductAndSalesOrderSelector();
		this.registerLineItemEvents();
		this.checkLineItemRow();
		this.registerLineItemAutoComplete();
		this.registerEventForBunchWeigt(); 
		 
	}
});