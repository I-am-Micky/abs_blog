<?php 
include_once "abs/admin.php";

$obj = new Admin();

// reference
$output = $obj->allNews()


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listing</title>
</head>
<body>

		<div class="container">
			<div class="row">
				
				<div class="col " style="overflow-x:auto;">
					<h2 class="" style="font-size:px; ">ALL NEWS</h2>

					
					<table class="table table-striped table-hover  table-bordered" style="border:1px solid #fec309 ;color: black;background: white;">
						<thead>
							<tr>
								<th>#</th>
								<th>TITLE</th>
								
								<th>PUBLISHER</th>
								<th>CATEGORY</th>
								<th>IMAGE</th>
								<th>DATE-POSTED</th>
								<th>ACTION</th>

							</tr>
							

						</thead>
						<tbody >
							<?php 

							foreach ($output as $key => $value) {
								
								$news_id = $value['NEWS_ID'];
								?>

								<tr>
									<td>#</td>
									<td>
										<?php echo $value['TITLE']?>
										
									</td>
						 			<td>
										<?php echo $value['FIRSTNAME'] . $value['LASTNAME']?>
										
									</td>
									<td>
										<?php echo $value['CAT_NAME']?>
										
									</td>
									<td> <?php if (!empty($value['FEATURED_IMAGE'])) {
                    ?>
                    <img src="newsphotos/<?php echo $value['FEATURED_IMAGE'] ?>" alt="IMG" class="img-fluid"/> 
                  <?php
                    }
                   ?></td>
									
									<td>
										<?php echo $value['DATE_POSTED']?>
										
									</td>
										
										
									<td>
										
										<a class="btn btn-link" href="editnews.php?newsid=<?php echo $news_id?>" id="edit"  name="edit">Edit</a>
										|
										<a class="btn btn-link" href="deletenews.php?newsid=<?php echo $news_id?>&title=<?php echo $value['TITLE']?>" id="delete" >Delete</a>
										
									</td>
									
								
								</tr>


							<?php } ?>



						

						</tbody>

					</table>
				</div>
			</div>
		</div>
</body>
</html>