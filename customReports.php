<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel='stylesheet' type='text/css'>
<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<?php
//header("Cache-Control: no-cache, must-revalidate");
ini_set('display_errors', TRUE);
require_once('include/utils/utils.php');
global $adb;
if(isset($_POST['btn_submit'])){
	
	print_r($_POST['sel_reports_type']);exit('Hy');
}
?>
<div class="container1" style="width:90%; margin:25px auto;">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary panel-table ">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-12">
              <h3 class="panel-title">Custom Reports For Batch</h3>
            </div>
          </div>

        </div>
        <div class="panel-body">
          <form action="" enctype="multipart/form-data" name="batch_report_search" method="post" class="form-inline">
            <div class="form-group">
              <div class="input-group">
                <label class="input-group-addon" for="sel_reports_type">Select</label>
                <select name="sel_reports_type" id="sel_reports_type" class="form-control">
                  <option value="-1">Select Name</option>
                  <option value="prd_typ">Product</option>
                  <option value="so_type">Sales Order</option>
                 </option>
				</select>
			  </div>
			</div>
            <input type="submit" class="btn btn-success" name="btn_submit" value="Search"/>
            <hr />
          </form>
          <table id="mytable" class="table table-striped table-bordered table-list">
            <thead>
				<tr>
				  <td>Sl &nbsp;No.</td>
				  <td>Batch</td>
				  <td>In Hand</td>
				  <td>Molding</td>
				  <td>Shot blasting</td>
				  <td>Fettling Grinding</td>
				  <td>Total</td>
				</tr>
            </thead>
			<tfoot>
				<tr>
				  <td>Sl &nbsp;No.</td>
				  <td>Batch</td>
				  <td>In Hand</td>
				  <td>Molding</td>
				  <td>Shot blasting</td>
				  <td>Fettling Grinding</td>
				  <td>Total</td>
				</tr>
			</tfoot>
            <tbody>
				<tr align="center">

				  <td><?php echo ($k);?></td>

				  <td><?=$totalrows['ev_date'];?></td>

				  <td><?=$totalrows['ev_code'];?></td>

				  <td><?=$totalrows['warehouse_name'];?></td>

				  <td><?=$totalrows['expc_name'];?></td>

				  <td><?=$totalrows['expsubcat_subcategoryname'];?></td>

				  <td><?=$totalrows['ev_amount'];?></td>
				</tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<style>

    body,table{font-size:12px;}

</style>

