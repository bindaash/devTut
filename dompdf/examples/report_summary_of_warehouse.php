<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_REQUEST['date'])){
	unset($_SESSION['warehouse']);
	$_SESSION['warehouse'] = array("date"=>$_REQUEST['date']);
	echo 'Success';
	exit;
}else{
	include("../../modules/BatchMovement/BatchSerchWareHouse.php");
}

if($_SESSION['warehouse']['date']!=''){
	$warehouse = new BatchSerchWareHouse($_SESSION['warehouse']['date']);
	//unset($_SESSION['warehouse']);
	echo '<style>
	@media print {
	  .hide-print {
	    display: none;
	  }
	}
	</style>';
	echo '<table width="100%" border="0">
		  <tr>
			<td align="left">
			<img src="../../test/logo/sif_logo_report.png"  alt="Sif" /> 
			</td>
		  </tr>
	</table>';
	echo '<table width="100%" border="0">
			  <tr>
				<td align="left">
				 <strong>Warehouse Report:  '.$_SESSION['warehouse']['date'].'</strong>
				</td>
				<td style="text-align:right;" class="hide-print"> 
					<button type="button" class="btn btn-primary" style="padding: 4px 14px;font-size: 18px;line-height: 1.3333333; border-radius: 6px;display: inline-block;
    margin-bottom: 0;
    font-weight: 400;text-align: center;white-space: nowrap;vertical-align: middle;-ms-touch-action: manipulation;touch-action: manipulation;cursor: pointer;background-image: none;border: 1px solid transparent;color: #fff;background-color: #337ab7;
    border-color: #2e6da4;" onClick="window.print();">Print</button>
				</td>
			  </tr>
			  
		</table>';
	echo '<div class="table-responsive">';
	echo $warehouse->showRows();
	echo '</div>';
}else{
	echo '<h1>Sorry Your data is not valid</h1>';
}
?>