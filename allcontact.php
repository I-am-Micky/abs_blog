<?php 
include_once "abs/admin.php";

$obj = new Admin();

// reference
$output = $obj->allContact()


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 class="">All Contact</h2>
				<table class="table table-striped table-hover table-bordered" style="border:1px solid #fec309 ;color: black;background: white;">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Message</th>
						</tr>
					</thead>
					<tbody>
						
						<?php 
						foreach($output as $key =>$value){
							$contact_id = $value['CONTACT_ID'];

						?>
						<tr>
							<td>#</td>
							<td><?php echo $value['NAME']?></td>
							<td><?php echo $value['MESSAGE']?></td>
						</tr>
							<?php } ?>
					</tbody>


				</table>


</body>
</html>