<?php
function modifyDate($curdate){
	$date=date_create($curdate);
	return date_format($date,"d M Y");
}

?>