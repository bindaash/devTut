<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_REQUEST['from'])){
	unset($_SESSION['core']);
	$_SESSION['core'] = array("from_date"=>$_REQUEST['from'],"to_date"=>$_REQUEST['to']);
	echo 'Success';
	exit;
}else{
	include("../../modules/BatchMovement/BatchSerchCore.php");
}




if($_SESSION['core']['from_date']!='' || $_SESSION['core']['to_date']!=''){
	
	$core = new BatchSerchCore($_SESSION['core']['from_date'], $_SESSION['core']['to_date']);

	//unset($_SESSION['core']);
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
				 <strong>Core Report:  '.$_SESSION['core']['from_date'].' to '.$_SESSION['core']['to_date'].'</strong>
				</td>
				<td style="text-align:right;" class="hide-print"> 
					<button type="button" class="btn btn-primary" style="padding: 4px 14px;
    font-size: 18px;
    line-height: 1.3333333;
    border-radius: 6px;

    display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;

    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;" onClick="window.print();">Print</button>
				</td>
			  </tr>
			  
		</table>';
	echo '<div class="table-responsive">';
	echo $core->showRows();
	echo '</div>';
}else{
	echo '<h1>Sorry Your data is not valid</h1>';
}




//============================================================+
// END OF FILE
//============================================================+






?>


