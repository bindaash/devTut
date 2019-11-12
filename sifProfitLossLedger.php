<?php

header("Cache-Control: no-cache, must-revalidate");

ini_set('display_errors', TRUE);

require_once('include/utils/utils.php');

global $adb;
//print_r($_REQUEST); die;


function date_convert($date_convert)
{
		$date_array = explode("/",$date_convert);
		$var_month = $date_array[0]; //day seqment
		$var_day = $date_array[1]; //month segment
		$var_year = $date_array[2]; //year segment
		$new_date_format = "$var_year-$var_month-$var_day"; // join them together
		return $new_date_format;
}
function total_invoice_ammount($wid,$start_date,$end_date)
{
		global $adb;
		
		if($start_date!='' && $end_date!='')
		{
			$new_start_date_format=date_convert($start_date);
			$new_end_date_format=date_convert($end_date);
			$where_cluse.=" AND a.invoicedate BETWEEN '".$new_start_date_format."' AND '".$new_end_date_format."'" ;
		}
		elseif($start_date=='' && $end_date=='')
		{
			$where_cluse.="AND MONTH(a.invoicedate)=MONTH(CURDATE())" ;
		}
		elseif($start_date!='' && $end_date=='')
		{
			$new_start_date_format=date_convert($start_date);
			$where_cluse.=" AND a.invoicedate >= '".$new_start_date_format."'" ;
		}
		elseif($start_date=='' && $end_date!='')
		{
			$new_end_date_format=date_convert($end_date);
			$where_cluse.=" AND a.invoicedate <= '".$new_end_date_format."'" ;
		}
		//echo "select sum(a.total)as total_amount from vtiger_invoice a inner join vtiger_crmentity b on a.invoiceid=b.crmid and b.deleted=0 Where a.inv_warehouse=$wid ".$where_cluse."";
		$total_invoice_ammount=$adb->pquery("select sum(a.total)as total_amount from vtiger_invoice a inner join vtiger_crmentity b on a.invoiceid=b.crmid and b.deleted=0 Where a.inv_warehouse=$wid ".$where_cluse."");
		if($total_invoice_ammount->fields['total_amount']==NULL)
		{
			return 0;
		}
		else
		{
			$return_value=$total_invoice_ammount->fields['total_amount'];
			//$amount = money_format('%i', $return_value);
			return $return_value;
		}
}

function total_product_return_amount($wid,$start_date,$end_date)
{
	global $adb;
	
	if($start_date!='' && $end_date!='')
		{
			$new_start_date_format=date_convert($start_date);
			$new_end_date_format=date_convert($end_date);
			$where_cluse.=" AND a.invoicedate BETWEEN '".$new_start_date_format."' AND '".$new_end_date_format."'" ;
		}
		elseif($start_date=='' && $end_date=='')
		{
			$where_cluse.="AND MONTH(a.invoicedate)=MONTH(CURDATE())" ;
		}
		elseif($start_date!='' && $end_date=='')
		{
			$new_start_date_format=date_convert($start_date);
			$where_cluse.=" AND a.invoicedate >= '".$new_start_date_format."'" ;
		}
		elseif($start_date=='' && $end_date!='')
		{
			$new_end_date_format=date_convert($end_date);
			$where_cluse.=" AND a.invoicedate <= '".$new_end_date_format."'" ;
		}
	//echo "SELECT invoiceid from vtiger_invoice WHERE inv_warehouse=$wid ".$where_cluse."";
	$invoice_details=$adb->pquery("SELECT a.invoiceid as invoiceid  from vtiger_invoice a  WHERE a.inv_warehouse=$wid ".$where_cluse."");
	$total_records_of_invoice=$adb->num_rows($invoice_details);
    if($total_records_of_invoice>0)
    {
         while($totalrows=$adb->fetch_array($invoice_details))
         {
            $invoice_id=$totalrows[invoiceid];
            //echo "select sum(a.total)as total_amount from vtiger_productreturn a inner join vtiger_crmentity b on a.productreturnid=b.crmid and b.deleted=0 Where a.preturn_invoice=$invoice_id";
             $total_product_return_amount=$adb->pquery("select sum(a.total)as total_amount from vtiger_productreturn a inner join vtiger_crmentity b on a.productreturnid=b.crmid and b.deleted=0 Where a.preturn_invoice=$invoice_id");
            if($total_product_return_amount->fields['total_amount']==NULL)
            {
                return 0;
            }
            else
            {
             $return_value=$total_product_return_amount->fields['total_amount'];
             return $return_value;
            }
             
             $i++;
         }
    }
}

function total_incoming_product_chalan_amount($wid,$start_date,$end_date)
{
	global $adb;
	
	if($start_date!='' && $end_date!='')
		{
			$new_start_date_format=date_convert($start_date);
			$new_end_date_format=date_convert($end_date);
			$where_cluse.=" AND c.cf_870 BETWEEN '".$new_start_date_format."' AND '".$new_end_date_format."'" ;
		}
		elseif($start_date=='' && $end_date=='')
		{
			$where_cluse.="AND MONTH(c.cf_870)= MONTH(CURDATE())" ;
		}
		elseif($start_date!='' && $end_date=='')
		{
			$new_start_date_format=date_convert($start_date);
			$where_cluse.=" AND c.cf_870 >= '".$new_start_date_format."'" ;
		}
		elseif($start_date=='' && $end_date!='')
		{
			$new_end_date_format=date_convert($end_date);
			$where_cluse.=" AND c.cf_870 <= '".$new_end_date_format."'" ;
		}
	//echo "select sum(a.ipc_bdtaka)as total_amount from vtiger_incomingproductchallan a inner join vtiger_crmentity b on a.incomingproductchallanid=b.crmid and b.deleted=0 left join vtiger_incomingproductchallancf c on a.incomingproductchallanid=c.incomingproductchallanid Where a.ipc_warehouse=$wid ".$where_cluse."";
	$total_incoming_product_chalan_amount=$adb->pquery("select sum(a.ipc_bdtaka)as total_amount from vtiger_incomingproductchallan a inner join vtiger_crmentity b on a.incomingproductchallanid=b.crmid and b.deleted=0 left join vtiger_incomingproductchallancf c on a.incomingproductchallanid=c.incomingproductchallanid Where a.ipc_warehouse=$wid ".$where_cluse."");
	if($total_incoming_product_chalan_amount->fields['total_amount']==NULL)
		{
			return 0;
		}
		else
		{
			$return_value=$total_incoming_product_chalan_amount->fields['total_amount'];
			//$amount = money_format('%!i', $return_value);
			return $return_value;
		}
}

function total_expense_amount($wid,$start_date,$end_date)
{
	global $adb;
	
	if($start_date!='' && $end_date!='')
		{
			$new_start_date_format=date_convert($start_date);
			$new_end_date_format=date_convert($end_date);
			$where_cluse.=" AND a.ev_date BETWEEN '".$new_start_date_format."' AND '".$new_end_date_format."'" ;
		}
		elseif($start_date=='' && $end_date=='')
		{
			$where_cluse.="AND MONTH(a.ev_date)= MONTH(CURDATE())" ;
		}
		elseif($start_date!='' && $end_date=='')
		{
			$new_start_date_format=date_convert($start_date);
			$where_cluse.=" AND a.ev_date >= '".$new_start_date_format."'" ;
		}
		elseif($start_date=='' && $end_date!='')
		{
			$new_end_date_format=date_convert($end_date);
			$where_cluse.=" AND a.ev_date <= '".$new_end_date_format."'" ;
		}
	//echo "select sum(a.ev_amount)as total_amount from vtiger_expensevoucher a inner join vtiger_crmentity b on a.expensevoucherid=b.crmid and b.deleted=0 Where a.ev_warehouse=$wid ".$where_cluse."";
	$total_expense_amount=$adb->pquery("select sum(a.ev_amount)as total_amount from vtiger_expensevoucher a inner join vtiger_crmentity b on a.expensevoucherid=b.crmid and b.deleted=0 Where a.ev_warehouse=$wid ".$where_cluse."");
	if($total_expense_amount->fields['total_amount']==NULL)
		{
			return 0;
		}
		else
		{
			$return_value=$total_expense_amount->fields['total_amount'];
			//$amount = money_format('%!i', $return_value);
			return $return_value;
		}
}



?>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel='stylesheet' type='text/css'>

<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script> 

$(document).ready(function() { 

	$("#datepicker_start_date").datepicker(); 

	$("#datepicker_end_date").datepicker(); 

	$('#mytable').DataTable();

}); 

</script>

<div class="container1" style="width:90%; margin:25px auto;">

  <div class="row">

    <div class="col-md-12">

      <div class="panel panel-primary panel-table ">

        <div class="panel-heading">

          <div class="row">

            <div class="col col-xs-12">

              <h3 class="panel-title">Reporting</h3>

            </div>

          </div>

        </div>

        <div class="panel-body">

         <!-- <form action="" enctype="multipart/form-data" name="warehouse_search" method="post" class="form-inline">

            <div class="form-group">
              <div class="input-group">

                <label class="input-group-addon" for="datepicker_start_date">From Date</label>

                <input id="datepicker_start_date" class="form-control" name="start_date" type="text" placeholder="Expense From Date" value="<?php if($_POST['start_date']!=''){echo $_POST['start_date'];}?>" />

              </div>

              <div class="input-group">

                <label class="input-group-addon" for="datepicker_end_date">To Date</label>

                <input id="datepicker_end_date" class="form-control" name="end_date" type="text" placeholder="Expense To Date" value="<?php if($_POST['end_date']!=''){echo $_POST['end_date'];}?>" />

              </div>

            </div>

            <input type="submit" class="btn btn-success" name="bttn_submit" value="Search"/>

            <hr />

          </form>-->

<?php 
if(isset($_POST['bttn_submit']))
{ 
?>

          <table id="mytable" class="table table-striped table-bordered table-list">

            <thead>
				 <tr>
                    <th>Sl&nbsp;No.</th>
                    <th>Product Name</th>
                    <th>InHand</th>
                    <th>Molding</th>
                    <th>Metal Melting</th>
                    <th>Fettle</th>
                    <th>Air Wash</th>
                    <th>Polishing</th>
                    <th>Warehouse</th>
                    <th>Dispatch</th>
                </tr>
             </thead>

             <tfoot>
                <tr>
                    <th>Sl&nbsp;No.</th>
                    <th>Product Name</th>
                    <th>InHand</th>
                    <th>Molding</th>
                    <th>Metal Melting</th>
                    <th>Fettle</th>
                    <th>Air Wash</th>
                    <th>Polishing</th>
                    <th>Warehouse</th>
                    <th>Dispatch</th>
                </tr>
             </tfoot>
            <?php
            /*$start_date=$_POST[start_date];
            $end_date=$_POST[end_date];
			$select_warehousename_sql="SELECT a.warehouseid, a.warehouse_name FROM `vtiger_warehouse` as a INNER join vtiger_crmentity as b on a.warehouseid=b.crmid WHERE b.deleted=0 Order By b.createdtime ASC";
			$warehousename_details=$adb->pquery($select_warehousename_sql);
			$toal_record_of_warehousename_details = $adb->num_rows($warehousename_details);*/
		    ?>
            
            <tbody>
            <?php
			 $k = 0;
				 foreach($warehousename_details as $value){
					 $arr_warehouse[] = $value['warehouseid'];
			?>

            <tr align="center">
              <td><?php echo ($k+1);?></td>
              <td><?=$value['warehouse_name'];?></td>
              <td><?php 
                      $total_invoice_amount=total_invoice_ammount($value['warehouseid'],$start_date,$end_date);
                      echo money_format('%!i', number_format((float)($total_invoice_amount),2, '.', ''));
                    ?></td>
              <td><?php
                $total_product_return_amount=total_product_return_amount($value['warehouseid'],$start_date,$end_date);
                echo money_format('%!i', number_format((float)($total_product_return_amount),2, '.', ''));
                ?></td>
              <td><?php 
                 $total_incoming_product_chalan_amount=total_incoming_product_chalan_amount($value['warehouseid'],$start_date,$end_date);
                 echo money_format('%!i', number_format((float)($total_incoming_product_chalan_amount),2, '.', ''));
                 ?></td>
              <td><?php 
               $total_expense_amount=total_expense_amount($value['warehouseid'],$start_date,$end_date);
               echo money_format('%!i', number_format((float)($total_expense_amount),2, '.', ''));
               ?></td>
              <td><?php
              $profit_loass=(($total_invoice_amount)-($total_product_return_amount+$total_incoming_product_chalan_amount+$total_expense_amount));
               $abc=money_format('%!i', number_format((float)($profit_loass),2, '.', ''));
               echo $abc;
               ?></td>
            </tr>
            <?php
					$k++;
                  	}
                    ?>

             </tbody>

          </table>

          <?php } ?>

        </div>

      </div>

    </div>

  </div>

</div>

<style>

    body,table{font-size:12px;}

</style>

