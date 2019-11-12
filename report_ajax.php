<?php
require_once('config.inc.php');

$connection = mysql_connect($dbconfig['db_server'], $dbconfig['db_username'], $dbconfig['db_password']) 
or die("please contact biraj.sharma@jhunsinfotech.com");
mysql_select_db($dbconfig['db_name'], $connection);
 
$case = isset($_GET['case'])?$_GET['case']:'';

switch($case) {
	case 'get_products_id': get_products_id();break;
	case 'get_sales_order_no': get_sales_order_no();break;
};

function get_products_id(){
	//global $adb;
	$res_html='';
	$query="SELECT vtiger_products.*, vtiger_crmentity.* FROM vtiger_products
			INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_products.productid 
			ORDER BY vtiger_products.productname"; 
	$query_q = mysql_query($query); 	
	//echo"<pre>";print_r($result);die;	
	$res_html .= '<option value=0>-- All Products --</option>';
	while($result= mysql_fetch_array($query_q)){
		//echo"<pre>";print_r($result); die;
		$res_html .= '<option value='.$result['productid'].'>'.$result['productname'].'</option>';
	}
	echo $res_html;
}

function get_sales_order_no(){
	//global $adb;
	$res_html='';
	$query_sales="SELECT vtiger_salesorder.*, vtiger_crmentity.* FROM vtiger_salesorder
			INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_salesorder.salesorderid 
			ORDER BY vtiger_salesorder.salesorder_no"; 
	$query_s = mysql_query($query_sales); 	
	//echo"<pre>";print_r($result);die;	
	$res_html .= '<option value=0>-- All Sales Order --</option>';
	while($result= mysql_fetch_array($query_s)){
		//echo"<pre>";print_r($result); die;
		$res_html .= '<option value='.$result['salesorderid'].'>'.$result['salesorder_no'].'</option>';
	}
	echo $res_html;
}







?>