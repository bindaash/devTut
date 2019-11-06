<!DOCTYPE html>
<html>
<head>
	<title>PHP - Convert HTML to PDF using DomPDF Library</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="./src/Css/style.css">
</head>
<body>
<form action="examples/report_summary_of_products.php" method="POST">
<div class="container">
	<div class="col-lg-12 frt">
		<h1>Batch Report</h1>
		<span>Generate Report</span>
		<select>
			<option>Select One</option>
			<option>Product Name</option>
			<option>Sales Order</option>
		</select>
	</div>
	<div class="batch_report">   
	<div class="table-responsive">          
	  <table class="table table-bordered">
		<thead>
		  <tr>
			<th>SRL NO</th>
			<th>Product Name</th>
			<th>From</th>
			<th>To</th>
			<th>Date</th>
			<th>Quantity</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td>1</td>
			<td>Test demo</td>
			<td>Inhand</td>
			<td>WareHouse</td>
			<td>13-05-2019</td>
			<td>500</td>
		  </tr>
		  <tr>
			<td>2</td>
			<td>Test demo</td>
			<td>Inhand</td>
			<td>WareHouse</td>
			<td>13-05-2019</td>
			<td>500</td>
		  </tr>
		  <tr>
			<td>3</td>
			<td>Test demo</td>
			<td>Inhand</td>
			<td>WareHouse</td>
			<td>13-05-2019</td>
			<td>500</td>
		  </tr>
		  <tr>
			<td>4</td>
			<td>Test demo</td>
			<td>Inhand</td>
			<td>WareHouse</td>
			<td>13-05-2019</td>
			<td>500</td>
		  </tr>
		</tbody>
	  </table>
	  </div>
	  </div>
</div>
<div class="form-group text-center">
	<button class="btn btn-success">Generate PDF</button>
</div>
</form>


</body>

</html>