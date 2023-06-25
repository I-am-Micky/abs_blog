<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/absradio (2).png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<?php 
		include_once "frontheader.php";

	?>

	<!-- Breadcrumb -->
	<div class="container">
		<div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="index.html" class="breadcrumb-item f1-s-3 cl9">
					Home 
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
					Contact Us
				</span>
			</div>

		<!-- 	<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>

			</div> -->
		</div>
	</div>
<?php 

include_once "abs/admin.php";


?>
<?php 

	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['btnsubmit'])) {
		// code...

			if (empty($_POST['name'])) {
		
		$errors['name'] = "Name Cannot be Empty!";

		
	}
	if (empty($_POST['email'])) {
			$errors['email'] ="EMAIL Cannot be Empty!";
		}


		if (empty($errors)) {
			// code...
			$name=$_POST['name'];
			$email=$_POST['email'];
				$description =($_POST['msg']);

			$obj = new Admin();


			$output = $obj->addContact($name,$email,$description);
				//check if Successful 
			if ($output == true ) {
				// code...

				$msg =" Your Message Was Delivered Successfully ";

				//redirect

			echo "<script>
				alert('$msg');

			</script>";
				
			}else{
				$errors[] = "OOPS! Could Not Upload Message".$output;
			}

		}
		}
	





?>
	<!-- Page heading -->
	<div class="container p-t-4 p-b-40">
		<h2 class="f1-l-1 cl2">
			Contact Us
		</h2>
		 <?php 
            if (!empty($errors)){
                echo "<ul class='alert alert-danger'>";
                foreach($errors as $key => $value){
                  echo "<li>$value</li>";
                }
                echo "</ul>";
            }
          ?>
	</div>

	<!-- Content -->
	<section class="bg0 p-b-60">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-8 p-b-80">
					<div class="p-r-10 p-r-0-sr991">
					
						<form method="post">
							<input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="name" placeholder="Name*">

							<input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="email" placeholder="Email*">

							<textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="msg" placeholder="Your Message"></textarea>

							<button type="submit " class="size-a-20 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-20" name="btnsubmit">
								Send
							</button>
						</form>
					</div>
				</div>
				
				<!-- Sidebar -->
				<div class="col-md-5 col-lg-4 p-b-80">
					<div class="p-l-10 p-rl-0-sr991">
						<!-- Popular Posts -->
						<div class="p-b-30">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Latest Post
								</h3>
							</div>
							

							<ul class="p-t-35">
								<?php 
							include_once "abs/admin.php";

							$obj = new Admin();
							$data = $obj->moreNews();
							if(count($data)>0){

											//loop through
											foreach ($data as $key => $value) {
												// code...
												$news = $value['NEWS_ID'];
												$newstitle = $value['TITLE'];
										


							?><form method="post" action="news-detail.php?title=<?php echo $value['TITLE'] ?>" id="">
								<li class="flex-wr-sb-s p-b-30">
									<button type="submit" class="size-w-10 wrap-pic-w hov1 trans-03" name="title">
									<img src="newsphotos/<?php echo $value['FEATURED_IMAGE']?>" alt="IMG">
									</button>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<button type="submit" class="f1-s-5 cl3 hov-cl10 trans-03">
											<?php echo $value['TITLE']?>
											</button>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a  class="f1-s-6 cl8 hov-cl10 trans-03">
												<?php echo $value['SUBCAT_NAME']?>
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
													<?php 

																echo $value['DATE_POSTED'];
															?>
											</span>
										</span>
									</div>
								</li>
									<input type="hidden" name="title" value="<?php echo $value['TITLE']?>">

														<input type="hidden" name="newsid" value="<?php echo $value['NEWS_ID']?>">	
														<input type="hidden" name="featuredimage" value="<?php echo $value['FEATURED_IMAGE']?>">
														<input type="hidden" name="category" value="<?php echo $value['CAT_NAME']?>">
														<input type="hidden" name="sub-category" value="<?php echo $value['SUBCAT_NAME']?>">
														<input type="hidden" name="catid" value="<?php echo $value['CAT_ID']?>">	

														<input type="hidden" name="description" value="<?php echo $value['DESCRIPTION']?>">
														<input type="hidden" name="publisher" value="<?php echo $value['FIRSTNAME'] . $value['LASTNAME']?>">
														<input type="hidden" name="dateposted" value="<?php echo $value['DATE_POSTED']?>">
													</form>
								<?php }
							}?>

							</ul>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<?php 
		include_once "frontfooter.php";

	?>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="fas fa-angle-up"></span>
		</span>
	</div>


<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>