<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("../../config.inc.php"); 
$connection = mysql_connect($dbconfig['db_server'], $dbconfig['db_username'], $dbconfig['db_password']) or die('Please contact biraj.sharma@jhunsinfotech.com !'); 
mysql_select_db($dbconfig['db_name'], $connection);
$THIS_DIR = dirname(__FILE__);
if (file_exists($THIS_DIR.'/date_format.php') && file_exists($THIS_DIR.'/organisation_details.php')) { 
	include("date_format.php"); include("organisation_details.php");
}
/* include autoloader */
require_once '../autoload.inc.php';
/* reference the Dompdf namespace */
use Dompdf\Dompdf;
/* instantiate and use the dompdf class */
	$dompdf = new Dompdf();
	$html_to_pdf ='';
	//$slno=1;
$html_org ='<table width="100%" border="0">
			  <tr>
				<td align="center"><img src="../../test/logo/'.$organisation_logoname.'" style="max-width:325px; max-height:90px;" alt="http://www.superironfoundry.com/wp-content/themes/sif/images/logo.jpg" /> </td>
			  </tr>
			</table>'; 
$select_type = $_REQUEST['node_type'];		
$item_id = $_REQUEST['node_id'];	
//echo($select_type.'///'.$item_id); die;
$today=date("d M Y");
	if($select_type =='salesOrder_id'){
	$salesOrder_id = $item_id;
		if($salesOrder_id != 0 && $salesOrder_id !=''){
			$sql_sale = "SELECT moven.id AS moven_id, 
							batch.id AS batch_id, 
							sales.salesorderid, 
							sales.salesorder_no,
							prd.productid, 
							prd.productname 
						FROM vtiger_movementrel as moven
							INNER JOIN vtiger_batch_item AS batch ON batch.id=moven.itemid
							INNER JOIN vtiger_salesorder AS sales ON sales.salesorderid = batch.salesorderid
							INNER JOIN vtiger_products AS prd ON prd.productid = batch.productid
							INNER JOIN vtiger_crmentity AS crm On crm.crmid = moven.id
						WHERE moven.lineItem_type ='Batch'  
						AND sales.salesorderid= '".$salesOrder_id."'
						AND crm.deleted = 0
						ORDER BY moven_id DESC"; 
			$query_sales = mysql_query($sql_sale); 
			$tot_record = mysql_num_rows($query_sales);   	
		} 
	} 
	if($select_type =='product_id'){
		$prod_id = $item_id;
		if($prod_id != 0 && $prod_id !=''){
			$sql_prod = "SELECT moven.id AS moven_id, 
							batch.id AS batch_id, 
							prd.productid, 
							prd.productname 
						FROM vtiger_movementrel as moven 
							INNER JOIN vtiger_batch_item AS batch ON batch.id=moven.itemid 
							INNER JOIN vtiger_products AS prd ON prd.productid = batch.productid 
							INNER JOIN vtiger_crmentity AS crm On crm.crmid = moven.id 
						WHERE moven.lineItem_type ='Batch' 
							AND batch.productid = ".$prod_id." 
							AND crm.deleted = 0 
						ORDER BY moven_id DESC";  
			$query_prod = mysql_query($sql_prod); 
			$tot_record = mysql_num_rows($query_prod);
		} 
	} 
	if($select_type =='salesOrder_id'){
		while($sales_result = mysql_fetch_assoc($query_sales)){
			$moven_id = $sales_result['moven_id'];
			$batch_id = $sales_result['batch_id'];
			$salesorderid = $sales_result['salesorderid'];
			$salesorder_no = $sales_result['salesorder_no'];
			$productid = $sales_result['productid'];
			$productname = $sales_result['productname'];
			$get_rel_batch[] = get_related_batch($moven_id, $batch_id);
		} 
		$html_body_data ='';	
		$counter = 1;
		foreach($get_rel_batch as $rel_b => $rel_batch){
			if(!empty($rel_batch[$rel_b]['moven_id'])){
				//echo"<pre>";print_r($rel_batch[$rel_b]['moven_id']);echo"</pre>";echo '-------------------';
			if($rel_batch[$counter-1]['quantity'] != ''){
				if($rel_batch[$counter-1]['select_frm'] =='Starts' && $rel_batch[$counter-1]['select_to'] == 'Molding'){
					$batch_molding = round($rel_batch[$counter-1]['quantity']);
					$batch_shot_blasting = 0;
					$fettling_grinding = 0;
					$painting = 0;
					$batch_rejection =0;
					$crating = 0;
					$warehouse = 0;
					$rejection = 0;	
					$total =$batch_molding;	
				}
				if($rel_batch[$counter-1]['select_frm'] =='Molding' && $rel_batch[$counter-1]['select_to'] == 'Shot blasting'){
					$batch_molding = round($total)-round($rel_batch[$counter-1]['quantity']);
					$batch_shot_blasting = round($rel_batch[$counter-1]['quantity']);
					$fettling_grinding = 0;
					$painting = 0;
					$batch_rejection =0;
					$crating = 0;
					$warehouse = 0;
					$rejection = 0;	
					$total;
				}
				if($rel_batch[$counter-1]['select_frm'] =='Molding' && $rel_batch[$counter-1]['select_to'] == 'Rejection'){
					$batch_rejection = round($rel_batch[$counter-1]['quantity']);
					$batch_molding = $batch_molding - $batch_rejection;
					$batch_shot_blasting;
					$fettling_grinding = 0;
					$painting = 0;
					$crating = 0;
					$warehouse = 0;
					$rejection = 0;	
					$total;	
				}
			}
			$html_body_data .='<tr>
				<td>'. ($counter) .'</td>
				<td>'. ($productname) .'</td>
				<td>'. ($batch_molding) .'</td>
				<td>'. ($batch_shot_blasting) .'</td>
				<td>'. ($fettling_grinding) .'</td>
				<td>'. ($painting) .'</td>
				<td>'. ($crating) .'</td>
				<td>'. ($warehouse) .'</td>
				<td>'.($batch_rejection).'</td>
				<td>'.($total).'</td></tr>';
			$counter++;
		}	//exit('Loop exit');
	} //exit('Loop exit');
		
		$html_header ='<br><br><div class="col-lg-12 frt">
				<table width="100%" border="0" class="small" cellspacing="1" cellpadding="3">
					<tr>
					<th style="font-weight:bold; text-align:left;"> <h1>Batch Report</h1> </th>
					</tr>';
		$html_subHeader ='<tr>
				<th style="font-weight:bold; text-align:left;"> <h3>Sales Order Number : '.getSalesOrderNo($salesOrder_id).' </h3> </th>
				</tr>
				<tr>
				<th style="font-weight:bold; text-align:left;"><h3>Batch Name  : '.getBatchName($salesOrder_id).' </h3> </th>
				</tr>
				<tr>
				<th style="font-weight:bold; text-align:left;"><h3>Date: '.$today.'</h3></th>
				</tr>';
		
		$html_body_head = '<div class="col-lg-12 batch_report">   
		<div class="table-responsive">          
			<table width="100%" border="1" class="small" cellspacing="1" cellpadding="3">
				<thead>
				  <tr>
					<th width="5%">Srl No.</th>
					<th width="15%">Product Name</th>
					<th width="8%">Molding</th>
					<th width="10%">Sh.Blasting</th>
					<th width="10%">Ft.Grinding</th>
					<th width="8%">Painting</th>
					<th width="8%">Crating</th>
					<th width="8%">Warehouse</th>
					<th width="10%">Rejection</th>
					<th width="8%">Dispatch</th>
					<th width="10%">Total</th>
				  </tr>
				</thead><tbody>';
			
	} 
	
//This script given below for Batch reports when select by product name <Begin here>
	if($select_type =='product_id'){
		while($prd_result = mysql_fetch_assoc($query_prod)){
			$moven_id = $prd_result['moven_id'];
			$batch_id = $prd_result['batch_id'];
			$productid = $prd_result['productid'];
			$productname = $prd_result['productname'];
			$get_rel_batch[] = get_relatedPrd_batch($moven_id, $batch_id);
			//echo"<pre>";print_r($get_rel_batch);exit('whileEx');
		} 
		$html_body_data ='';	
		$counter = 1;
		//echo"<pre>";print_r($get_rel_batch);exit('ExOut');
		foreach($get_rel_batch as $rel_b => $rel_batch){
			if(!empty($rel_batch[$rel_b]['moven_id'])){
				if($rel_batch[$counter-1]['quantity'] != ''){
					if($rel_batch[$counter-1]['select_frm'] =='Starts' && $rel_batch[$counter-1]['select_to'] == 'Molding'){
						$batch_molding = round($rel_batch[$counter-1]['quantity']);
						$batch_shot_blasting = 0;
						$fettling_grinding = 0;
						$painting = 0;
						$batch_rejection =0;
						$crating = 0;
						$warehouse = 0;
						$rejection = 0;	
						$total =$batch_molding;	
					}
					if($rel_batch[$counter-1]['select_frm'] =='Molding' && $rel_batch[$counter-1]['select_to'] == 'Shot blasting'){
						$batch_molding = round($total)-round($rel_batch[$counter-1]['quantity']);
						$batch_shot_blasting = round($rel_batch[$counter-1]['quantity']);
						$fettling_grinding = 0;
						$painting = 0;
						$batch_rejection =0;
						$crating = 0;
						$warehouse = 0;
						$rejection = 0;	
						$total;
					}
					if($rel_batch[$counter-1]['select_frm'] =='Molding' && $rel_batch[$counter-1]['select_to'] == 'Rejection'){
						$batch_rejection = round($rel_batch[$counter-1]['quantity']);
						$batch_molding = $batch_molding - $batch_rejection;
						$batch_shot_blasting;
						$fettling_grinding = 0;
						$painting = 0;
						$crating = 0;
						$warehouse = 0;
						$rejection = 0;	
						$total;	
					}
				}
			$html_body_data .='<tr>
				<td>'. ($counter) .'</td>
				<td>'. ($productname) .'</td>
				<td>'. ($batch_molding) .'</td>
				<td>'. ($batch_shot_blasting) .'</td>
				<td>'. ($fettling_grinding) .'</td>
				<td>'. ($painting) .'</td>
				<td>'. ($crating) .'</td>
				<td>'. ($warehouse) .'</td>
				<td>'.($batch_rejection).'</td>
				<td></td>
				<td>'.($total).'</td></tr>';
			$counter++;
		}	//exit('Loop exit');
	} //exit('Loop exit');
		
		$html_header ='<br><br><div class="col-lg-12 frt">
				<table width="100%" border="0" class="small" cellspacing="1" cellpadding="3">
					<tr>
					<th style="font-weight:bold; text-align:left;"> <h1>Batch Report</h1> </th>
					</tr>';
		$html_subHeader ='<tr>
				<th style="font-weight:bold; text-align:left;"> <h3>Sales Order Number : '.getSalesOrderNoByProduct($prod_id).' </h3> </th>
				</tr>
				<tr>
				<th style="font-weight:bold; text-align:left;"><h3>Batch Name  : '.getBatchNameByProduct($prod_id).' </h3> </th>
				</tr>
				<tr>
				<th style="font-weight:bold; text-align:left;"><h3>Date: '.$today.'</h3></th>
				</tr>';
		
		$html_body_head = '<div class="col-lg-12 batch_report">   
		<div class="table-responsive">          
			<table width="100%" border="1" class="small" cellspacing="1" cellpadding="3">
				<thead>
				 <tr>
					<th width="5%">Srl No.</th>
					<th width="15%">Product Name</th>
					<th width="8%">Molding</th>
					<th width="10%">Sh.Blasting</th>
					<th width="10%">Ft.Grinding</th>
					<th width="8%">Painting</th>
					<th width="8%">Crating</th>
					<th width="8%">Warehouse</th>
					<th width="10%">Rejection</th>
					<th width="8%">Dispatch</th>
					<th width="10%">Total</th>
				  </tr>
				</thead><tbody>';
			
	} 
//This script given above for Batch reports when select by product name <End here>
	
	
	
$html_subHeader .='<tr>
		<th style="font-weight:bold; text-align:left;"><h3>Total Record(s): '.($counter-1).'</h3></th>
		</tr>
		</table></div>';	
//print_r($counter); die;
//echo print_r($salesorder_no[0]); die;
$html_to_link ='<link rel="stylesheet" href="../src/Css/style.css">
<link rel="stylesheet" href="../src/Css/bootstrap.min.css">
<div class="container">';
$html_to_body =$html_org .$html_header .$html_subHeader. $html_body_head .$html_body_data;
$html_to_foot ='</tbody></table></div></div></div>';
$html_to_pdf = $html_to_link.$html_to_body.$html_to_foot;	

echo ($html_to_pdf);  die;
$dompdf->loadHtml($html_to_pdf);
/* set page layout in PDF */
//$dompdf->set_paper("a4", "portrait");
/* Render the HTML as PDF */
$dompdf->render();
/* Set pdf name or file name */
if($salesOrder_id){
	$recDate = date('d.m.Y').'_Batch Report_'.$salesOrder_id;
} else {
	$recDate = date('d.m.Y').'_Batch Report_'.$prod_id;	
}
$filename = $recDate . '.pdf';
/* Output the generated PDF to Browser */
$dompdf->stream($filename);
//============================================================+
// END OF FILE
//============================================================+

function getSalesOrderNo($id){
		$sql_n ="SELECT sales.salesorder_no 
				FROM vtiger_salesorder AS sales 
					INNER JOIN vtiger_crmentity AS crm On crm.crmid = sales.salesorderid 
				WHERE crm.deleted = 0 AND salesorderid= ".$id;
		$select_sl=mysql_query($sql_n);
		$tot_record = mysql_num_rows($select_sl); 
		if($tot_record > 0){
			$result_salesOrder = mysql_result($select_sl, 0, 'salesorder_no');
		} else {
			$result_salesOrder = 'No Sales Order';
		}
		return $result_salesOrder;
}
function getSalesOrderNoByProduct($id){ 
		$sql_n ="SELECT 
					sales.salesorder_no
				FROM vtiger_inventoryproductrel AS rel
					INNER JOIN vtiger_crmentity AS crm ON crm.crmid = rel.productid
					INNER JOIN vtiger_salesorder AS sales ON sales.salesorderid = rel.id
				WHERE crm.deleted = 0 
					AND productid =".$id;
		$select_sl=mysql_query($sql_n);
		$tot_record = mysql_num_rows($select_sl); 
		if($tot_record > 0){
			$result_salesOrder = mysql_result($select_sl, 0, 'salesorder_no');
		} else {
			$result_salesOrder = 'No Sales Order';
		}
		return $result_salesOrder;
}

function getBatchName($id){ //echo $id; die; //2461
		$sql_b ="SELECT  
					ba.batch_name,
					ba.batch_id
				FROM vtiger_batch_item as item
					INNER JOIN vtiger_batch AS ba ON ba.batchid=item.id
					INNER JOIN vtiger_crmentity AS crm ON crm.crmid = item.id
				WHERE item.salesorderid = '".$id."'
					AND crm.deleted = 0 
					ORDER BY id DESC 
					LIMIT 0,1";  
		$select_batch=mysql_query($sql_b); 
		$tot_record = mysql_num_rows($select_batch); 
		if($tot_record > 0){
			$result_batch_name = mysql_result($select_batch, 0, 'batch_id'); 
		} else {
			$result_batch_name = 'No Batch name';
		}
		return $result_batch_name;
}
function getBatchNameByProduct($id){ //echo $id; die; //2461
		$sql_b ="SELECT 
					vtiger_batch.batch_id  
					FROM vtiger_batch_item AS item
						INNER JOIN vtiger_crmentity AS crm ON crm.crmid=item.productid
						INNER JOIN vtiger_batch ON vtiger_batch.batchid=item.id
					WHERE productid = ".$id."  
					GROUP BY sequence_no";  
		$select_batch=mysql_query($sql_b); 
		$tot_record = mysql_num_rows($select_batch); 
		if($tot_record > 0){
			$result_batch_name = mysql_result($select_batch, 0, 'batch_id'); 
		} else {
			$result_batch_name = 'No Batch name';
		}
		//echo"<pre>";print_r($result_batch_name); exit(0);
		return $result_batch_name;
}

function get_related_batch($moven_id, $batch_id){ 
	//2473//2457//2450//2202
	//echo $moven_id.'//'. $batch_id .'//'.$salesorderid.'//'.$productid; die;
	$sql_batch = "SELECT move.* 
					FROM vtiger_movementrel AS move
						INNER JOIN vtiger_crmentity AS crm ON crm.crmid = move.id
					WHERE move.id = '".$moven_id."' 
						AND move.itemid = '".$batch_id."'
						AND crm.deleted = 0";  
	$select_batch=mysql_query($sql_batch);
	//$rel_inv_item = array();
	$int = 0;
	while($result_batch=mysql_fetch_array($select_batch)){
		//echo"<pre>"; print_r($result_batch); 
		$rel_inv_item[$int]['moven_id']=$result_batch['id'];
		$rel_inv_item[$int]['quantity']=$result_batch['quantity'];
		$rel_inv_item[$int]['select_frm']=$result_batch['select_frm'];
		$rel_inv_item[$int]['select_to']=$result_batch['select_to'];
		$int++;
	}
	//echo"<pre>"; print_r($rel_inv_item); die;
	return $rel_inv_item; 
}

function get_relatedPrd_batch($moven_id, $batch_id){ 
	//2473//2457//2450//2202
	//echo $moven_id.'//'. $batch_id .'//'.$salesorderid.'//'.$productid; die;
	$sql_batch = "SELECT move.* 
					FROM vtiger_movementrel AS move
						INNER JOIN vtiger_crmentity AS crm ON crm.crmid = move.id
					WHERE move.id = '".$moven_id."' 
						AND move.itemid = '".$batch_id."'
						AND crm.deleted = 0";  
	$select_batch=mysql_query($sql_batch);
	$int = 0;
	while($result_batch=mysql_fetch_array($select_batch)){
		//echo"<pre>"; print_r($result_batch); 
		$rel_inv_item[$int]['moven_id']=$result_batch['id'];
		$rel_inv_item[$int]['quantity']=$result_batch['quantity'];
		$rel_inv_item[$int]['select_frm']=$result_batch['select_frm'];
		$rel_inv_item[$int]['select_to']=$result_batch['select_to'];
		$int++;
	} //die('rel');
	//echo"<pre>"; print_r($rel_inv_item); die;
	return $rel_inv_item; 
}

//Only for Product data below here
function getSalesOrderNoPrd($prd_id){
		$sql_n ="SELECT inv.id, sales.salesorder_no 
				FROM vtiger_inventoryproductrel as inv
				INNER JOIN vtiger_salesorder AS sales On sales.salesorderid = inv.id 
				INNER JOIN vtiger_crmentity AS crm On crm.crmid = sales.salesorderid 
				WHERE crm.deleted = 0 AND productid= ".$prd_id; 
		$select_sl=mysql_query($sql_n);
		$tot_record = mysql_num_rows($select_sl); 
		if($tot_record > 0){
			$result_salesOrder = mysql_result($select_sl, 0, 'salesorder_no');
		} else {
			$result_salesOrder = 'No Sales Order';
		}
		//echo $result_salesOrder; die;
		return $result_salesOrder;
}

function getBatchNamePrd($prd_id){ //echo $prd_id; die; 
		$sql_p ="SELECT batch.batch_name
						FROM vtiger_batch_item AS item
							INNER JOIN vtiger_batch AS batch On batch.batchid = item.id
							INNER JOIN vtiger_crmentity AS crm On crm.crmid = item.id
						WHERE crm.deleted = 0 
						AND item.productid =".$prd_id; 
		$select_batch=mysql_query($sql_p); 
		$tot_record = mysql_num_rows($select_batch); 
		if($tot_record > 0){
			$result_batch_name = mysql_result($select_batch, 0, 'batch_name'); 
		} else {
			$result_batch_name = 'No Batch name';
		}
		//echo $result_batch_name; die;
		return $result_batch_name;
}

function get_related_prd_batch($product_id, $batch_id){
	$sql_batch = "SELECT item.productid, 
			ba.batch_id, 
			mov.quantity, 
			mov.select_frm, 
			mov.select_to, 
			mov.lineItem_type
		FROM vtiger_batch_item as item
		INNER JOIN vtiger_batch AS ba ON ba.batchid=item.id
		INNER JOIN vtiger_movementrel AS mov ON mov.itemid=item.productid
		WHERE item.productid = '".$product_id."' 
		AND item.id = '".$batch_id."' ";  
	$select_batch=mysql_query($sql_batch);
	$rel_inv_item = array();
	$int =0;
	while($result_batch=mysql_fetch_array($select_batch)){
		//print_r($result_batch); die;
		$rel_inv_item[$int]['productid']=$result_batch['productid'];
		$rel_inv_item[$int]['quantity']=$result_batch['quantity'];
		$rel_inv_item[$int]['select_frm']=$result_batch['select_frm'];
		$rel_inv_item[$int]['select_to']=$result_batch['select_to'];
		$rel_inv_item[$int]['lineItem_type']=$result_batch['lineItem_type'];
		$int++;
	}
	return $rel_inv_item;
}


?>


