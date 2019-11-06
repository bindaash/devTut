<?php
$org_query = "SELECT * FROM  vtiger_organizationdetails";
$org_result = mysql_query($org_query) or die("There is an error in database please contact biraj.sharma@jhunsinfotech.com"); 
$org_records=mysql_fetch_array($org_result);
$organisation_name=$org_records['organizationname'];
$organisation_address=$org_records['address'];
$organisation_city=$org_records['city'];
$organisation_state=$org_records['state'];
$organisation_country=$org_records['country'];
$organisation_code=$org_records['code'];
$organisation_phone=$org_records['phone'];
$organisation_fax=$org_records['fax'];
$organisation_website=$org_records['website'];
$organisation_email=$org_records['email'];
$organisation_logoname=$org_records['logoname'];
$organisation_logo=$org_records['logo'];
?>