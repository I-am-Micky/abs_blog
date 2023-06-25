<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<?php 
include_once "portalheader.php";
?>

<div class="container">
	<h1 class="mt-4 mb-3">
		<small>Delete Products</small>
	</h1>
	<?php if (isset($_REQUEST['btndelete'])){
		#delete categories
		include_once 'abs/admin.php';
		//create object
		$obj = new Admin();
		//make use of delete method
		$obj->deleteNews($_REQUEST['NEWS_ID']);
		
		}


		if (isset($_REQUEST['btncancel'])) {
			#redirect to list categories
			$msg = "no action performed";
			header("Location:admindashboard.php?info=$msg");
			exit();
		}



	?>
		


	<div class="row">
		<div class="col-lg-8 mb-4">
			<?php 
			if (isset($_REQUEST['newsid'])){
			 ?>
			<div class="alert alert-danger">
				<h3>Are you sure u want to Delete "<?php echo $_REQUEST['title']; ?>"</h3>
			</div>
			<form method="post" action="deletenews.php?NEWS_ID=<?php echo $_REQUEST['newsid']?>&TITLE=<?php echo $_REQUEST['title']?>">
			<button type="submit" name="btndelete" class="btn btn-danger">Yes</button>
			<button type="submit" name="btncancel" class="btn btn-secondary">No</button>
			</form>
			<?php 
				}
			 ?>
		</div>
	</div>

</div>