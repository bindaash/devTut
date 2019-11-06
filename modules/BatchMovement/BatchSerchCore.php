<?php


class BatchSerchCore {
	
	protected $con = '';
	protected $html = '';
	protected $date_from = '';
	protected $date_to = '';

	
	public function __construct($from_date, $to_date){
		require_once("../../config.inc.php");
		$this->con = mysqli_connect($dbconfig['db_server'], $dbconfig['db_username'], $dbconfig['db_password'],$dbconfig['db_name']) or die('Not Conected !');
		$this->date_from = date("Y-m-d", strtotime($from_date));
		$this->date_to = date("Y-m-d", strtotime($to_date));
		$this->total_record = '';
    }
	
	public function showRows(){
		$qr = mysqli_query($this->con, "SELECT * FROM vtiger_batch WHERE batch_date BETWEEN '".$this->date_from."' AND '".$this->date_to."' ORDER BY batch_date");
		
		if(mysqli_num_rows($qr) > 0){
			$html = '<table class="small" width="100%" cellspacing="1" cellpadding="3" border="1">';
			$html .= '<thead>
				 <tr>
					<th>Srl No.</th>
					<th>Date</th>
					<th>Product Name</th>
					<th>Core Type</th>
					<th>Quantity</th>
				  </tr>
				</thead>';
			while($ro = mysqli_fetch_array($qr)){
				$date = date("d-m-Y", strtotime($ro['batch_date']));
				$batch = mysqli_query($this->con, "SELECT * FROM vtiger_batch_item WHERE id = '".$ro['batchid']."'");
				
				while($ba = mysqli_fetch_array($batch)){
					$core = mysqli_query($this->con, "SELECT vtiger_cork.* FROM vtiger_cork INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_cork.corkid WHERE prd_cork = '".$ba['productid']."' AND vtiger_crmentity.deleted = 0");
					$total = 0;
					$i=1;
					while($cor = mysqli_fetch_array($core)){
						$core_type = $cor['core_type'];
						$qty = $cor['cork_qty'];
						$total += $qty;
						$pro = mysqli_query($this->con, "SELECT * FROM vtiger_products WHERE productid = '".$cor['prd_cork']."'");
						while ($pr = mysqli_fetch_array($pro)) {
							$pro_name = $pr['productname'];
						}
						/*$cork = mysqli_query($this->con, "SELECT * FROM vtiger_cork WHERE corkid = '".$cor['']."'");
						while ($co = mysqli_fetch_array($cork)) {
							$pro_name = $co['productname'];
						}*/
						 $html .= '<tr>
							<td align="center">'.$i.'</td>
							<td>'.$date.'</td>
							<td>'.$pro_name.'</td>
							<td align="center">'.$core_type.'</td>
							<td align="center">'.$qty.'</td>
						  </tr>';
						
						$i++;
					}

				}
			}
			//$html .= '</table>';
			//$html .= '<table class="small" width="100%" cellspacing="1" cellpadding="3" border="1">';
			$html .= '<tr>
					
						<th colspan="4" style="text-align: right;padding: 0 7%;">Total:</th>
						<td align="center">'.$total.'</td>
						
						
					  </tr>';
			$html .= '</table>';
		}else{
			$html = 'No data found';
		}
		return $html;
		//return $qr.'Total Rows: '.mysql_num_rows($qr);
	}
	
	
	
	
	
        
}