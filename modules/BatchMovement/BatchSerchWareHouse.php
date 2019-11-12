<?php

class BatchSerchWareHouse {
	protected $date_from = '';
	protected $date = '';

	public function __construct($date){
		require_once("../../config.inc.php");
		$this->con = mysqli_connect($dbconfig['db_server'], $dbconfig['db_username'], $dbconfig['db_password'],$dbconfig['db_name']) or die('Not Conected !');
		$this->date = date("Y-m-d", strtotime($date));
    }

    public function showRows(){
		$qr = mysqli_query($this->con, "SELECT * FROM vtiger_batchinventory WHERE invbatch_date = '".$this->date."'");
		
		if(mysqli_num_rows($qr) > 0){
			$html = '<table class="small" width="100%" cellspacing="1" cellpadding="3" border="1">';
			$html .= '<thead>
				 <tr>
					<th>Srl No.</th>
					<th>Product Name</th>
					<th>Weight</th>
					<th>Quantity</th>
				  </tr>
				</thead>';
			while($ro = mysqli_fetch_array($qr)){
				$qry = mysqli_query($this->con, "SELECT move.itemid as pro, move.quantity as qty FROM vtiger_movementrel AS move INNER JOIN vtiger_crmentity AS crm ON crm.crmid = move.id WHERE move.id = '".$ro['batchinventoryid']."' AND move.select_to = 'Warehouse' AND move.lineItem_type = 'Products' AND crm.deleted = 0  ORDER BY move.itemid") or die(mysqli_error($con));

				if(mysqli_num_rows($qry) > 0){
					$total_qty = 0;
					$total_wet = 0;
					$grand_total_weight = 0;
					$i=1;
					while($rr = mysqli_fetch_array($qry)){
						$qty = round($rr['qty']);
						$total_qty += $qty;
						$qrr = mysqli_query($this->con, "SELECT move.quantity as qnty FROM vtiger_movementrel AS move INNER JOIN vtiger_crmentity AS crm ON crm.crmid = move.id WHERE move.itemid = '".$rr['pro']."' AND move.select_frm = 'Warehouse' AND move.lineItem_type = 'Products' AND crm.deleted = 0") or die(mysqli_error($con));
						//$show .= "<br>";
						if(mysqli_num_rows($qrr) > 0){
							while($r = mysqli_fetch_array($qrr)){
								$qty -= round($r['qnty']);
								$total_qty -= $qty;
							}
						}

						$pro = mysqli_query($this->con, "SELECT * FROM vtiger_products WHERE productid = '".$rr['pro']."'");
						while ($pr = mysqli_fetch_array($pro)) {
							$pro_name = $pr['productname'];
							$pro_weight = $pr['prd_weight'];
						}
						$total_wet += ($pro_weight*$qty);
						$html .= '<tr>
								<td align="center">'.$i.'</td>
								<td>'.$pro_name.'</td>
								<td align="center">'.($pro_weight*$qty).'</td>
								<td align="center">'.$qty.'</td>
							  </tr>';
							
							$i++;
					}

				}else{
					$html = 'No data found';
				}
			}
			//$html .= '</table>';
			//$html .= '<table class="small" width="100%" cellspacing="1" cellpadding="3" border="1">';
			$html .= '<tr>
						<td colspan="4"></td>
					  </tr>';
			$html .= '<tr>
						<th colspan="2"></th>
						<th align="center">Total Weight: '.$total_wet.'</th>
						<th align="center">Total Quantity: '.$total_qty.'</th>
					  </tr>';
			$html .= '</table>';
		}else{
			$html = 'No data found';
		}
		return $html;
	}
}