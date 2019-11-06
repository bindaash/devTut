<?php
//require_once 'modules/Vtiger/CRMEntity.php';

class BatchMovementHandler {
	
	protected $id = 0;
	protected $totalRows = 0;
	protected $html = '';
	protected $moveId = '';
	
	protected $start = 0;
	protected $molding = 0;
	protected $shBlasting = 0;
	protected $ftGrinding = 0;
	protected $painting = 0;
	protected $crating = 0;
	protected $wareHouse = 0;
	protected $rejection = 0;
	protected $dispatch = 0;
	
	public function BatchMovementHandler($node_type, $node_id){
		if($node_type =='product_id'){
			$this->id = $node_id;
		}
		/*$select_type = $_REQUEST['node_type'];		
		$item_id = $_REQUEST['node_id'];
		if($select_type =='product_id'){
			$this->id = $item_id;
		}*/
		$sq = "SELECT * FROM vtiger_batch_item WHERE productid = '".$this->id."'";
		$qr = mysql_query($sq);
		$counter = 0;
		while($ro = mysql_fetch_array($qr)){
			$sql = "SELECT move.lineitem_id as id FROM vtiger_movementrel AS move INNER JOIN vtiger_crmentity AS crm ON crm.crmid = move.id WHERE move.itemid = '".$ro['id']."' AND crm.deleted = 0";

			$batch = mysql_query($sql);
			
			
			while($ba = mysql_fetch_array($batch)){
				$this->moveId[$counter] = $ba['id'];
				$counter++;
			}
		}

		$sql_batch = "SELECT move.lineitem_id as id FROM vtiger_movementrel AS move INNER JOIN vtiger_crmentity AS crm ON crm.crmid = move.id WHERE move.itemid = '".$this->id."' AND crm.deleted = 0";

		$select_batch = mysql_query($sql_batch);
		
		
		while($batch_ar = mysql_fetch_array($select_batch)){
			$this->moveId[$counter] = $batch_ar['id'];
			$counter++;
		}
		
		$this->totalRows = mysql_num_rows($select_batch); 
    }
	/*public function showTotalRows(){
		return $this->totalRows; 
	}*/
	public function showRows(){

		/*$sql = "SELECT productname FROM vtiger_products INNER JOIN vtiger_crmentity AS crm ON crm.crmid = vtiger_products.productid WHERE productid = '".$this->id."' AND crm.deleted = 0";*/
		$sql = "SELECT productname FROM vtiger_products WHERE productid = '".$this->id."'";
		$qry = mysql_query($sql);
		$prd_name = mysql_result($qry,0,'productname');

		$i = 1;
		foreach ($this->moveId as $key => $value) {
			$sql = "SELECT * FROM vtiger_movementrel WHERE lineitem_id = '".$value."'";
			$qry = mysql_query($sql);
			while($row = mysql_fetch_array($qry)){
				
				if($row['select_frm'] == 'Starts'){
					if($this->start != 0){
						$this->start = ($this->start-$row['quantity']);
					}
				}

				if($row['select_to'] == 'Starts'){
					$this->start = ($this->start+$row['quantity']);
				}

				if($row['select_frm'] == 'Molding'){
					if($this->molding != 0){
						$this->molding = ($this->molding-$row['quantity']);
					}
				}

				if($row['select_to'] == 'Molding'){
					$this->molding = ($this->molding+$row['quantity']);
				}

				if($row['select_frm'] == 'Shot blasting'){
					if($this->shBlasting != 0){
						$this->shBlasting = ($this->shBlasting-$row['quantity']);
					}
				}

				if($row['select_to'] == 'Shot blasting'){
					$this->shBlasting = ($this->shBlasting+$row['quantity']);
				}

				if($row['select_frm'] == 'Rejection'){
					if($this->rejection != 0){
						$this->rejection = ($this->rejection-$row['quantity']);
					}
				}

				if($row['select_to'] == 'Rejection'){
					$this->rejection = ($this->rejection+$row['quantity']);
				}

				if($row['select_frm'] == 'Fettling Grinding'){
					if($this->ftGrinding != 0){
						$this->ftGrinding = ($this->ftGrinding-$row['quantity']);
					}
				}

				if($row['select_to'] == 'Fettling Grinding'){
					$this->ftGrinding = ($this->ftGrinding+$row['quantity']);
				}

				if($row['select_frm'] == 'Crating'){
					if($this->crating != 0){
						$this->crating = ($this->crating-$row['quantity']);
					}
				}

				if($row['select_to'] == 'Crating'){
					$this->crating = ($this->crating+$row['quantity']);
				}

				if($row['select_frm'] == 'Painting'){
					if($this->painting != 0){
						$this->painting = ($this->painting-$row['quantity']);
					}
				}

				if($row['select_to'] == 'Painting'){
					$this->painting = ($this->painting+$row['quantity']);
				}

				if($row['select_frm'] == 'Warehouse'){
					if($this->wareHouse != 0){
						$this->wareHouse = ($this->wareHouse-$row['quantity']);
					}
				}

				if($row['select_to'] == 'Warehouse'){
					$this->wareHouse = ($this->wareHouse+$row['quantity']);
				}

				if($row['select_frm'] == 'Dispatch'){
					if($this->dispatch != 0){
						$this->dispatch = ($this->dispatch-$row['quantity']);
					}
				}

				if($row['select_to'] == 'Dispatch'){
					$this->dispatch = ($this->dispatch+$row['quantity']);
				}
			}
			$total = ($this->start+$this->molding+$this->shBlasting+$this->ftGrinding+$this->painting+$this->crating+$this->wareHouse+$this->rejection+$this->dispatch);
			$html .= '<tr>';
			$html .= '<td>'.$prd_name.'</td>
					<td>'.$this->start.'</td>
					<td>'.$this->molding.'</td>
					<td>'.$this->shBlasting.'</td>
					<td>'.$this->ftGrinding.'</td>
					<td>'.$this->painting.'</td>
					<td>'.$this->crating.'</td>
					<td>'.$this->wareHouse.'</td>
					<td>'.$this->rejection.'</td>
					<td>'.$this->dispatch.'</td>
					<td>'.$total.'</td>';
			$html .= '</tr>';
			$i++;
		}
		return $html;
	}
	
	public function showTotalRecord(){
		return print_r($this->moveId);
		//return count($this->moveId);
	}
	
	
        
}